<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dpt_dpl extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('dpt_dpl_model');
        $this->load->model('User_Model');
    }

    function index() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->load->library('grid');
            $grid = $this->grid->set_properties(array('model' => 'dpt_dpl_model', 'controller' => 'dpt_dpl', 'options' => array('id' => 'dpt_dpl', 'pagination', 'rows_number')))->load_model()->set_grid();
            $view = $this->load->view('dpt_dpl/index', array('grid' => $grid), true);
            echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
        } else {
            block_access_method();
        }
    }

    function datagrid() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $row = intval($this->input->post('rows')) == 0 ? 20 : intval($this->input->post('rows'));
            $page = intval($this->input->post('page')) == 0 ? 1 : intval($this->input->post('page'));
            $offset = $row * ($page - 1);
            $data = array();
            $params = array('_return' => 'data');
            $jenis_user = $this->auth->get_user_data()->jenis_user;          
            if($jenis_user == 3){
                $asesi_id = $this->auth->get_user_data()->pegawai_id;
                $where[kode_lsp().'asesi.id_tuk ='] = $asesi_id;  
                //$where['administrasi_ujk ='] = '1';               
            }else if($jenis_user == 2){
                $asesi_id = $this->auth->get_user_data()->pegawai_id;
                $where['id_asesor ='] = $asesi_id;
            }else if($jenis_user == 1){
                $asesi_id = $this->auth->get_user_data()->id;
                $where[kode_lsp().'asesi.id_users ='] = $asesi_id;
            }
            if (isset($_POST['nama_lengkap']) && !empty($_POST['nama_lengkap'])) {
                $where['nama_lengkap like'] = '%' . $this->input->post('nama_lengkap') . '%';
            }
            if (isset($_POST['no_identitas']) && !empty($_POST['no_identitas'])) {
                $where['no_identitas like'] = '%' . $this->input->post('no_identitas') . '%';
            }
            if (isset($_POST['no_uji_kompetensi']) && !empty($_POST['no_uji_kompetensi'])) {
                $where['no_uji_kompetensi like'] = '%' . $this->input->post('no_uji_kompetensi') . '%';
            }
            if (isset($_POST['from_time']) && !empty($_POST['from_time'])) {
                $from_time = mysql_date($this->input->post('from_time'));
                $to_time = mysql_date($this->input->post('to_time'));
                $where['u_date_create BETWEEN "' . $from_time . '" AND'] = $to_time;
            }
            $where[kode_lsp().'asesi.metode_asesmen !='] = '2';
            if (isset($where))
                $params['_where'] = $where;
            $data['total'] = isset($where) ? $this->dpt_dpl_model->count_by($where) : $this->dpt_dpl_model->count_all();
            $this->dpt_dpl_model->limit($row, $offset);
            $order = $this->dpt_dpl_model->get_params('_order');
            //$rows = isset($where) ? $this->dpt_dpl_model->order_by($order)->get_many_by($where) : $this->dpt_dpl_model->order_by($order)->get_all();
            $rows = $this->dpt_dpl_model->set_params($params)->with(array('skema', 'asesor'));
            $data['rows'] = $this->dpt_dpl_model->get_selected()->data_formatter($rows);
            echo json_encode($data);
        } else {
            block_access_method();
        }
    }

    function edit($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->dpt_dpl_model->set_validation()->validate();

            if ($data !== false) {
                if ($this->dpt_dpl_model->check_unique($data, intval($id))) {
                    $data['ch_dpl'] = serialize($this->input->post('ch_dpl'));
                    $data['ch_dpt'] = serialize($this->input->post('ch_dpt'));

                    if ($this->dpt_dpl_model->update(intval($id), $data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->dpt_dpl_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $dpt_dpl = $this->dpt_dpl_model->get(intval($id));
            if (sizeof($dpt_dpl) == 1) {
                $this->db->select('c.*');
                $this->db->from(kode_lsp() . 'perangkat_asesmen a');
                $this->db->join(kode_lsp() . 'perangkat_asesmen_detail b', 'a.id=b.id_perangkat_asesmen');
                $this->db->join(kode_lsp() . 'soal c', 'b.id=c.id_perangkat_detail');
                $this->db->where('a.id', $dpt_dpl->id_perangkat);
                $this->db->where('b.jenis_perangkat', '3');
                $query_soal_dpl = $this->db->get()->result();

                $this->db->select('c.*,d.id_unit_kompetensi,d.unit_kompetensi');
                $this->db->from(kode_lsp() . 'perangkat_asesmen a');
                $this->db->join(kode_lsp() . 'perangkat_asesmen_detail b', 'a.id=b.id_perangkat_asesmen');
                $this->db->join(kode_lsp() . 'soal c', 'b.id=c.id_perangkat_detail');
                $this->db->join(kode_lsp() . 'unit_kompetensi d', 'd.id=c.id_unit_kompetensi');

                $this->db->where('a.id', $dpt_dpl->id_perangkat);
                $this->db->where('b.jenis_perangkat', '1');
                $query_soal_dpt = $this->db->get()->result();
                // Get jawaban asesi DPT
                $this->db->select('a.jawaban_asesi,jawaban_benar,a.jawaban_salah');
                $this->db->from('t_uji a');
                $this->db->join(kode_lsp() . 'perangkat_asesmen_detail b', 'a.id_perangkat_detail=b.id');
                $this->db->where('a.id_asesi', $id);
                $this->db->where('b.jenis_perangkat', '1');
                $this->db->order_by('a.id','DESC');
                $query_jawaban_dpt = $this->db->get()->row();
                //var_dump($query_jawaban_dpt);die();
                if (count($query_jawaban_dpt) > 0) {
                    $jawaban_dpt = unserialize($query_jawaban_dpt->jawaban_asesi);
                } else {
                    $jawaban_dpt = array();
                }
                $view = $this->load->view('dpt_dpl/edit', array('data' => $this->dpt_dpl_model->get_single($dpt_dpl), 'query_soal_dpl' => $query_soal_dpl,
                    'query_soal_dpt' => $query_soal_dpt, 'jawaban_dpt' => $jawaban_dpt, 'query_jawaban_dpt' => $query_jawaban_dpt), TRUE);
                echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan !'));
            }
        }
    }

    function tabel_dpt_dpl($id, $ch_observasi, $catatan) {
        $skema = kode_lsp() . 'skema';
        $skema_detail = kode_lsp() . 'skema_detail';
        $unit_kompetensi = kode_lsp() . 'unit_kompetensi';
        $elemen_kompetensi = kode_lsp() . 'elemen_kompetensi';
        $kuk = kode_lsp() . 'kuk';
        $asesi = kode_lsp() . 'asesi';
        $asesi_detail = kode_lsp() . 'asesi_detail';


        $this->db->select("a.*,c.id_unit_kompetensi,c.unit_kompetensi,c.id as id_unit", false);
        $this->db->from("$skema a");
        $this->db->join("$skema_detail b", "b.id_skema=a.id");
        $this->db->join("$unit_kompetensi c", "c.id=b.id_unit_kompetensi");
        //$this->db->join("$elemen_kompetensi d", "d.id_unit_kompetensi=c.id");
        //$this->db->join("$kuk e", "e.id_elemen_kompetensi=d.id");
        $this->db->where("a.id", $id);
        $d = $this->db->get()->result();
        $table_unit = "";
        foreach ($d as $key => $value) {
            $table_unit .= "<table width='100%' border='1' style='border-collapse: collapse;background-color:grey;color:white;' ><tr><td rowspan='2' width='23%'>Unit Kompetensi No." . ($key + 1) . "</td><td width='13%'>Kode Unit</td><td width='2%'>:</td><td>" . $value->id_unit_kompetensi . "</td></tr>
                <tr><td>Judul Unit</td><td>:</td><td>" . $value->unit_kompetensi . "</td></tr>
            </table><br/>";
            $this->db->group_by('elemen_kompetensi');
            $this->db->where('id_unit_kompetensi', $value->id_unit);

            $rows_elemen = $this->db->get(kode_lsp() . 'elemen_kompetensi')->result();
            $table_unit .= "<table width='100%' border='1' ><tr><th rowspan='2' style='text-align:center;'>No</th><th rowspan='2'>Langkah Kerja</th><th rowspan='2'>Poin yang di observasi</th><th colspan='2' style='text-align:center;'>Kompeten</th></tr><tr><th style='text-align:center;'>K</th><th style='text-align:center;'>BK</th></tr>";
            foreach ($rows_elemen as $keys => $values) {
                $index_key = 10 * ($key + 1) + ($keys + 1);
                $checked_y = isset($ch_observasi[$index_key]) && $ch_observasi[$index_key] == 'y' ? 'checked' : '';
                $checked_n = isset($ch_observasi[$index_key]) && $ch_observasi[$index_key] == 'n' ? 'checked' : '';

                $this->db->group_by('kuk');
                $this->db->where('id_elemen_kompetensi', $values->id);
                $rows_kuk = $this->db->get(kode_lsp() . 'kuk')->result();
                //var_dump($rows_kuk);die();
                if (count($rows_kuk) > 0) {
                    $list_kuk = '<ul>';
                    foreach ($rows_kuk as $keyx => $valuex) {
                        $list_kuk .= '<li>' . $valuex->kuk . '</li>';
                    }
                    $list_kuk .= '</ul>';
                } else {
                    $list_kuk = $values->elemen_kompetensi;
                }
                $table_unit .= "<tr><td>" . ($keys + 1) . "</td><td  width='40%'>" . $values->elemen_kompetensi . "</td><td>" . $list_kuk . "</td>
                <td style='text-align:center;'><input type='radio'  class='ch_ch_observasi' name='ch_observasi[" . $index_key . "]' value='y' " . $checked_y . " /></td>
                <td style='text-align:center;'><input type='radio'  class='ch_memadai_n' name='ch_observasi[" . $index_key . "]' value='n' " . $checked_n . " /></td></tr>";
            }
            $table_unit .= "<tr><td  colspan='5'><textarea placeholder='Catatan terhadap langkah kerja pada unit kompetensi' rows='2' style='width:100%;' width='100%' name='catatan_observasi_serial[]'>" . $catatan_observasi_serial[$key] . "</textarea></td></tr>";
            $table_unit .= "</table><br/>";
        }

        return $table_unit;
    }

    function cetak($id, $type = "pdf", $email_attachment = false) {
        $asesmen_dpt_dpl = $this->dpt_dpl_model->get(intval($id));
        $data_asesmen_dpt_dpl = $asesmen_dpt_dpl;

        $this->db->select('c.*,b.waktu_pengerjaan');
        $this->db->from(kode_lsp() . 'perangkat_asesmen a');
        $this->db->join(kode_lsp() . 'perangkat_asesmen_detail b', 'a.id=b.id_perangkat_asesmen');
        $this->db->join(kode_lsp() . 'soal c', 'b.id=c.id_perangkat_detail');
        $this->db->where('a.id', $asesmen_dpt_dpl->id_perangkat);
        $this->db->where('b.jenis_perangkat', '2');
        $query_soal_dpt_dpl = $this->db->get()->result();
        $ch_observasi = @unserialize($asesmen_dpt_dpl->ch_observasi);
        //var_dump($query_soal_dpt_dpl); die();
        $dpt_dpl = $this->uji_kompetensi_skema_cetak($asesmen_dpt_dpl->skema_sertifikasi, $query_soal_dpt_dpl, $asesmen_dpt_dpl->is_observasi_kompeten, $ch_observasi);
        //var_dump($dpt_dpl[1]);die();
        $this->db->select('a.pra_asesmen_checked,a.no_identitas,a.nama_lengkap,a.catatan_portofolio,a.vat_portofolio,'
                . 'b.users,c.tuk,'
                . 'd.skema,d.kode_skema,e.tanggal,f.nama_user,b.no_reg');
        $this->db->from(kode_lsp() . 'asesi a');
        $this->db->join(kode_lsp() . 'users b', 'a.id_asesor=b.id');
        $this->db->join(kode_lsp() . 'tuk c', 'a.id_tuk=c.id');
        $this->db->join(kode_lsp() . 'skema d', 'a.skema_sertifikasi=d.id');
        $this->db->join(kode_lsp() . 'jadual_asesmen e', 'a.jadwal_id=e.id');
        $this->db->join('t_users f', 'a.pra_asesmen_checked=f.id');
        $this->db->where('a.id', $id);
        $data_asesi = $this->db->get()->row();

        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $msg = $data_asesi->nama_lengkap . "\r\n\n\n" . $data['aplikasi']->url_aplikasi . "/qrcode/asesi/" . $id;
        $ttd_asesor = $data_asesi->nama_user . " - " . $data_asesi->no_reg . "\r\n\n\n" . $data['aplikasi']->url_aplikasi . "/qrcode/asesor/" . $data_asesi->pra_asesmen_checked;

        //var_dump($data_asesi);die();
        $view = $this->load->view('dpt_dpl/cetak', array('data' => $this->dpt_dpl_model->get_single($asesmen_dpt_dpl)
            , 'dpt_dpl' => $dpt_dpl[0]
            , 'langkah_kerja' => $dpt_dpl[1]
            , 'msg' => $msg
            , 'ttd_asesor' => $ttd_asesor
            , 'data_asesi' => $data_asesi
            , 'query_soal_dpt_dpl' => $query_soal_dpt_dpl
                ), true);
        if ($type == "pdf") {
            $this->load->library("htm12pdf");
            $this->htm12pdf->pdf_create($view, "st-" . $id . ".pdf", $email_attachment, true);
        }
    }

    function uji_kompetensi_skema_cetak($id, $query_soal_dpt_dpl, $is_observasi_kompeten, $ch_observasi) {
        $checklist = '<img style="width: 10px;" src="assets/img/cl.png" />';
        $skema = kode_lsp() . 'skema';
        $skema_detail = kode_lsp() . 'skema_detail';
        $unit_kompetensi = kode_lsp() . 'unit_kompetensi';
        $elemen_kompetensi = kode_lsp() . 'elemen_kompetensi';
        $kuk = kode_lsp() . 'kuk';
        $asesi = kode_lsp() . 'asesi';
        $asesi_detail = kode_lsp() . 'asesi_detail';

        $this->db->select("a.*,c.id_unit_kompetensi,c.unit_kompetensi,c.id as id_unit", false);
        $this->db->from("$skema a");
        $this->db->join("$skema_detail b", "b.id_skema=a.id");
        $this->db->join("$unit_kompetensi c", "c.id=b.id_unit_kompetensi");
        $this->db->where("a.id", $id);
        $d = $this->db->get()->result();
        $table_unit = "";
        $table_cetak_dpt_dpl = "";
        $elemen_array = array();
        foreach ($d as $key => $value) {

            $table_cetak_dpt_dpl .= "<table style='width:100%;margin-top:20px;border-collapse: collapse;background-color:#f2f2f2;' border='1' >"
                    . "<tr><td rowspan='2' width='23%' style='padding: 5px;'>Unit Kompetensi No." . ($key + 1) . "</td>"
                    . "<td width='13%' style='padding: 5px;'>Kode Unit</td>"
                    . "<td width='2%' style='padding: 5px;'>:</td>"
                    . "<td style='padding: 5px;width:62.5%;'>" . $value->id_unit_kompetensi . "</td></tr>
                <tr><td style='padding: 5px;border-left:none;'>Judul Unit</td>
                <td style='padding: 5px;'>:</td><td style='padding: 5px;' width='73%'>" . $value->unit_kompetensi . "</td></tr>
            </table>";
            $table_elemen = "";
            $this->db->group_by('elemen_kompetensi');
            $this->db->where('id_unit_kompetensi', $value->id_unit);
            $rows_elemen = $this->db->get(kode_lsp() . 'elemen_kompetensi')->result();
            $table_elemen .= "<table border='1' style='width:100%;margin-top:0px;border-collapse: collapse;' >"
                    . "<tr style='background-color:#b8cce4;'>"
                    . "<th rowspan='2' style='text-align:center;padding:5px;'>No</th>"
                    . "<th rowspan='2' style='text-align:center;padding:5px;'>Elemen Kompetensi</th>"
                    . "<th rowspan='2' style='text-align:center;padding:5px;'>Poin yang diobservasi</th>"
                    . "<th colspan='2' style='text-align:center;'>Penilaian</th></tr>"
                    . "<tr style='background-color:#b8cce4;text-align:center;padding:5px;'>"
                    . "<th style='text-align:center;border-left:none;'>K</th>"
                    . "<th style='text-align:center;padding:5px;'>BK</th></tr>";
            $substansi_portofolio = array();
            foreach ($rows_elemen as $keys => $values) {
                $elemen_array[] = $values->elemen_kompetensi;
                if ($values->perangkat_bukti_tambahan == 'DPW') {
                    $substansi_portofolio[] = '<input type="checkbox" name="ch[]" value="1" checked /><img style="width: 10px;margin-left:-10px;margin-top:4px;" src="assets/img/cl.png" /> ' . $values->no_kuk . '-' . $values->bukti_dpl;
                }
                $index_key = 10 * ($key + 1) + ($keys + 1);
                $checked_y = isset($ch_observasi[$index_key]) && $ch_observasi[$index_key] == 'y' ? $checklist : '';
                $checked_n = isset($ch_observasi[$index_key]) && $ch_observasi[$index_key] == 'n' ? $checklist : '';

                $list_kuk = "";
                $this->db->group_by('kuk');
                $this->db->where('id_elemen_kompetensi', $values->id);
                $rows_kuk = $this->db->get(kode_lsp() . 'kuk')->result();
                //var_dump($rows_kuk);die();
                if (count($rows_kuk) > 0) {
                    $list_kuk = '<ul>';
                    foreach ($rows_kuk as $keyx => $valuex) {
                        $list_kuk .= '<li>' . $valuex->kuk . '</li>';
                    }
                    $list_kuk .= '</ul>';
                } else {
                    $list_kuk = $values->elemen_kompetensi;
                }
                $table_elemen .= "<tr><td style='text-align:center;padding:5px;'>" . ($keys + 1) . "</td>"
                        . "<td  style='width:26%'>" . $values->elemen_kompetensi . "</td>"
                        . "<td style='width:58.4%'>" . $list_kuk . "</td>
                <td style='text-align:center;width:5%;'>" . $checked_y . "</td>
                <td style='text-align:center;width:5%;'>" . $checked_n . "</td></tr>";
            }


            $table_elemen .= "</table>";
            $table_cetak_dpt_dpl .= $table_elemen;
        }
        return array($table_cetak_dpt_dpl, $elemen_array);
    }
    function search() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
           
            $view = $this->load->view('dpt_dpl/search', array(), TRUE);
            echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
        } else {
            block_access_method();
        }
    }
}
