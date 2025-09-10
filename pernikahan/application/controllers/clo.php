<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clo extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('clo_model');
        $this->load->model('User_Model');
    }

    function index() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->load->library('grid');
            $grid = $this->grid->set_properties(array('model' => 'clo_model', 'controller' => 'clo', 'options' => array('id' => 'clo', 'pagination', 'rows_number')))->load_model()->set_grid();
            $view = $this->load->view('clo/index', array('grid' => $grid), true);
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
            $data['total'] = isset($where) ? $this->clo_model->count_by($where) : $this->clo_model->count_all();
            $this->clo_model->limit($row, $offset);
            $order = $this->clo_model->get_params('_order');
            //$rows = isset($where) ? $this->clo_model->order_by($order)->get_many_by($where) : $this->clo_model->order_by($order)->get_all();
            $rows = $this->clo_model->set_params($params)->with(array('skema', 'asesor'));
            $data['rows'] = $this->clo_model->get_selected()->data_formatter($rows);
            echo json_encode($data);
        } else {
            block_access_method();
        }
    }

    function search() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->load->model('asesi_model');
            $view = $this->load->view('clo/search', array(), TRUE);
            echo json_encode(array('msgType' => 'success', 'msgValue' => $view));

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
            $data = $this->clo_model->set_validation()->validate();

            $buktiPendukung = str_replace("|", '"', $data['bukti_pendukung']);
            if ($data !== false) {
                if ($this->clo_model->check_unique($data, intval($id))) {
                    $data['ch_observasi'] = serialize($this->input->post('ch_observasi'));
                    $data['catatan_observasi_serial'] = serialize($this->input->post('catatan_observasi_serial'));
                    if ($this->clo_model->update(intval($id), $data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->clo_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $clo = $this->clo_model->get(intval($id));
            if (sizeof($clo) == 1) {
                $this->load->library('combogrid');
                $ch_observasi = @unserialize($clo->ch_observasi);
                $jawaban_observasi = @unserialize($clo->jawaban_observasi);
                $catatan_observasi_serial = @unserialize($clo->catatan_observasi_serial);
                $checklist_observasi = $this->tabel_clo($clo->skema_sertifikasi, $ch_observasi, $catatan_observasi_serial);
                // var_dump($catatan_observasi_serial); die();

                $this->db->select('c.*');
                $this->db->from(kode_lsp() . 'perangkat_asesmen a');
                $this->db->join(kode_lsp() . 'perangkat_asesmen_detail b', 'a.id=b.id_perangkat_asesmen');
                $this->db->join(kode_lsp() . 'soal c', 'b.id=c.id_perangkat_detail');
                $this->db->where('a.id', $clo->id_perangkat);
                $this->db->where('b.jenis_perangkat', '2');
                $query_soal_observasi = $this->db->get()->result();

                // var_dump($query_soal_observasi);die();

                $view = $this->load->view('clo/edit',
                  array(
                    'data' => $this->clo_model->get_single($clo),
                    'query_soal_observasi' => $query_soal_observasi,
                    'checklist_observasi' => $checklist_observasi,
                    'jawaban_observasi' => $jawaban_observasi
                  ), TRUE);
                echo json_encode(array('msgType' => 'success', 'msgValue' => $view, 'dtbukti_pendukung' => $data_clo->bukti_pendukung));
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan !'));
            }
        }
    }

    function tabel_clo($id, $ch_observasi, $catatan_observasi_serial) {
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
                $table_unit .= "<tr><td>" . ($keys + 1) . "</td><td  width='20%'>" . $values->elemen_kompetensi . "</td><td>" . $list_kuk . "</td>
                <td style='text-align:center;'><input type='radio'  class='ch_ch_observasi_y' name='ch_observasi[" . $index_key . "]' value='y' " . $checked_y . " /></td>
                <td style='text-align:center;'><input type='radio'  class='ch_ch_observasi_n' name='ch_observasi[" . $index_key . "]' value='n' " . $checked_n . " /></td></tr>";
            }
            $table_unit .= "<tr><td  colspan='5'><textarea placeholder='Catatan terhadap langkah kerja pada unit kompetensi' rows='2' style='width:100%;' width='100%' name='catatan_observasi_serial[]'>" . $catatan_observasi_serial[$key] . "</textarea></td></tr>";
            $table_unit .= "</table><br/>";
        }

        return $table_unit;
    }

    function cetak($id, $type = "pdf", $email_attachment = false) {
        $asesmen_clo = $this->clo_model->get(intval($id));
        $data_asesmen_clo = $asesmen_clo;

        $this->db->select('c.*,b.waktu_pengerjaan');
        $this->db->from(kode_lsp() . 'perangkat_asesmen a');
        $this->db->join(kode_lsp() . 'perangkat_asesmen_detail b', 'a.id=b.id_perangkat_asesmen');
        $this->db->join(kode_lsp() . 'soal c', 'b.id=c.id_perangkat_detail');
        $this->db->where('a.id', $asesmen_clo->id_perangkat);
        $this->db->where('b.jenis_perangkat', '2');
        $query_soal_clo = $this->db->get()->result();
        $ch_observasi = @unserialize($asesmen_clo->ch_observasi);
        //var_dump($query_soal_clo); die();
        $clo = $this->uji_kompetensi_skema_cetak($asesmen_clo->skema_sertifikasi, $query_soal_clo, $asesmen_clo->is_observasi_kompeten,$ch_observasi);
        //var_dump($clo[1]);die();
        $this->db->select('a.pra_asesmen_checked,a.no_identitas,a.nama_lengkap,a.catatan_portofolio,a.vat_portofolio,a.is_observasi_kompeten,'
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
        $view = $this->load->view('clo/cetak', array('data' => $this->clo_model->get_single($asesmen_clo)
            , 'clo' => $clo[0]
            , 'langkah_kerja' => $clo[1]
            , 'msg' => $msg
            , 'ttd_asesor' => $ttd_asesor
            , 'data_asesi' => $data_asesi
            , 'query_soal_clo' => $query_soal_clo
                ), true);
        if ($type == "pdf") {
            $this->load->library("htm12pdf");
            $this->htm12pdf->pdf_create($view, "st-" . $id . ".pdf", $email_attachment, true);
        }
    }

    function uji_kompetensi_skema_cetak($id, $query_soal_clo, $is_observasi_kompeten,$ch_observasi) {
        $trans = array("Apakah anda dapat " => "", "?" => "");

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
        $table_cetak_clo = "";
        $elemen_array = array();
        foreach ($d as $key => $value) {

            $table_cetak_clo .= "<table style='width:100%;margin-top:20px;border-collapse: collapse;background-color:#f2f2f2;' border='1' >"
                    . "<tr><td rowspan='2' style='padding: 5px;font-size:11px;width:19.6%;'>Unit Nomor." . ($key + 1) . "</td>"
                    . "<td width='13%' style='padding: 5px;'>Kode Unit</td>"
                    . "<td width='2%' style='padding: 5px;'>:</td>"
                    . "<td style='padding: 5px;'>" . $value->id_unit_kompetensi . "</td></tr>
                <tr><td style='padding: 5px;border-left:none;'>Judul Unit</td>
                <td style='padding: 5px;'>:</td><td style='padding: 5px;font-size:11px;width:66.2%;'>" . $value->unit_kompetensi . "</td></tr>
            </table>";
            $table_elemen = "";
            $this->db->group_by('elemen_kompetensi');
            $this->db->where('id_unit_kompetensi', $value->id_unit);
            $rows_elemen = $this->db->get(kode_lsp() . 'elemen_kompetensi')->result();
            $table_elemen .= "<table border='1' style='width:100%;margin-top:0px;border-collapse: collapse;' >"
                    . "<tr style='background-color:#b8cce4;'>"
                    . "<th rowspan='2' style='text-align:center;padding:5px;'>No</th>"
                    . "<th rowspan='2' style='text-align:center;padding:5px;width:26%;'>Elemen Kompetensi</th>"
                    . "<th rowspan='2' style='text-align:center;padding:5px;width:58.9%'>Poin yang diobservasi</th>"
                    . "<th colspan='2' style='text-align:center;width:10%'>Penilaian</th></tr>"
                    . "<tr style='background-color:#b8cce4;text-align:center;padding:5px;'>"
                    . "<th style='text-align:center;border-left:none;padding:5px;width:5%'>K</th>"
                    . "<th style='text-align:center;padding:5px;width:5%'>BK</th></tr>";
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
                        //echo strtr("hi all, I said hello", $trans);
                        $list_kuk .= '<li>' . strtr($valuex->kuk, $trans) . '</li>';
                    }
                    $list_kuk .= '</ul>';
                } else {
                    $list_kuk = '<ul>';
                    $list_kuk .= '<li>' .$values->elemen_kompetensi. '</li>';
                    $list_kuk .= '</ul>';
                }
                $table_elemen .= "<tr><td style='text-align:center;padding:5px;'>" . ($keys + 1) . "</td>"
                        . "<td  style='width:26%'>" . $values->elemen_kompetensi . "</td>"
                        . "<td style='width:58.4%'>" . $list_kuk . "</td>
                <td style='text-align:center;width:5%;'>" . $checked_y . "</td>
                <td style='text-align:center;width:5%;'>" . $checked_n . "</td></tr>";
            }


            $table_elemen .= "</table>";
            $table_cetak_clo .= $table_elemen;
         }
        return array($table_cetak_clo,$elemen_array);
    }

}
