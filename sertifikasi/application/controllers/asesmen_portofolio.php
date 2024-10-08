<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Asesmen_portofolio extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('asesmen_portofolio_model');
        $this->load->model('User_Model');
    }

    function index() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->load->library('grid');
            $grid = $this->grid->set_properties(array('model' => 'asesmen_portofolio_model', 'controller' => 'asesmen_portofolio', 'options' => array('id' => 'asesmen_portofolio', 'pagination', 'rows_number')))->load_model()->set_grid();
            $view = $this->load->view('asesmen_portofolio/index', array('grid' => $grid), true);
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
            //var_dump($jenis_user);
            if ($jenis_user == 3) {
                $user_id = $this->auth->get_user_data()->nama_user;
                $where['id_tuk ='] = $user_id;
            }
            if ($jenis_user == 2) {
//                $user = $this->auth->get_user_data()->nama_user;
//                //var_dump($user);
//                $where['id_asesor LIKE ='] = $user_id;
                $asesi_id = $this->auth->get_user_data()->pegawai_id;
                $where['id_asesor ='] = $asesi_id;
            }
            $where[kode_lsp().'asesi.metode_asesmen ='] = '2';

            if (isset($_POST['nama_lengkap']) && !empty($_POST['nama_lengkap'])) {
                $where['nama_lengkap like'] = '%' . $this->input->post('nama_lengkap') . '%';
            }
            // if (isset($_POST['no_identitas']) && !empty($_POST['no_identitas'])) {
            //     $where['no_identitas like'] = '%' . $this->input->post('no_identitas') . '%';
            // }
            // if (isset($_POST['no_uji_kompetensi']) && !empty($_POST['no_uji_kompetensi'])) {
            //     $where['no_uji_kompetensi like'] = '%' . $this->input->post('no_uji_kompetensi') . '%';
            // }
            // if (isset($_POST['from_time']) && !empty($_POST['from_time'])) {
            //     $from_time = mysql_date($this->input->post('from_time'));
            //     $to_time = mysql_date($this->input->post('to_time'));
            //     $where['u_date_create BETWEEN "' . $from_time . '" AND'] = $to_time;
            // }
            if (isset($where))
                $params['_where'] = $where;
            $data['total'] = isset($where) ? $this->asesmen_portofolio_model->count_by($where) : $this->asesmen_portofolio_model->count_all();
            $this->asesmen_portofolio_model->limit($row, $offset);
            $order = $this->asesmen_portofolio_model->get_params('_order');
            //$rows = isset($where) ? $this->asesmen_portofolio_model->order_by($order)->get_many_by($where) : $this->asesmen_portofolio_model->order_by($order)->get_all();
            $rows = $this->asesmen_portofolio_model->set_params($params)->with(array('skema', 'asesor'));
            $data['rows'] = $this->asesmen_portofolio_model->get_selected()->data_formatter($rows);
            echo json_encode($data);
        } else {
            block_access_method();
        }
    }

    function search() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->load->model('asesi_model');
            $view = $this->load->view('asesmen_portofolio/search', array(), TRUE);
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
            $data = $this->asesmen_portofolio_model->set_validation()->validate();

            $buktiPendukung = str_replace("|", '"', $data['bukti_pendukung']);
            //$buktiPendukung = json_decode($buktiPendukung);
            //var_dump($buktiPendukung);die();
            if ($data !== false) {
                if ($this->asesmen_portofolio_model->check_unique($data, intval($id))) {
                    //$post_bukti = $this->input->post('bukti_pendukung');
                    //$data['bukti_pendukung'] = str_replace('|', '"', $post_bukti);
                    $data['vat_portofolio'] = serialize($this->input->post('vat_portofolio'));
                    $data['vatm_portofolio'] = serialize($this->input->post('memadai_y'));
                    $data['catatan_vatm'] = serialize($this->input->post('catatan_vatm'));
                    $data['kesimpulan_jawaban_wawancara'] = serialize($this->input->post('kesimpulan_jawaban_wawancara'));

                    //var_dump($this->input->post('vat_portofolio'));die();
                    if ($this->asesmen_portofolio_model->update(intval($id), $data) !== false) {
                        $sms = isset($_POST['kirim_notifikasi']) ? $this->input->post('kirim_notifikasi') : "";
                        $akses_login = isset($_POST['akses_login']) ? $this->input->post('akses_login') : "";



                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->asesmen_portofolio_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $asesmen_portofolio = $this->asesmen_portofolio_model->get(intval($id));
            //var_dump($asesmen_portofolio->skema_sertifikasi);die();
            $data_asesmen_portofolio = $asesmen_portofolio;
            if (sizeof($asesmen_portofolio) == 1) {
                $this->load->library('combogrid');

                //var_dump($asesmen_portofolio->pra_asesmen_checked);
                if ($asesmen_portofolio->pra_asesmen_checked == "0" || empty($asesmen_portofolio->pra_asesmen_checked)) {
                    $nama_asesor = '';
                } else {
                    $asesor = $this->User_Model->get($asesmen_portofolio->pra_asesmen_checked);
                    $nama_asesor = $asesor->nama_user;
                }
                $buktiPendukung = str_replace("|", '"', $asesmen_portofolio->bukti_pendukung);
                $bukti_pendukung = json_decode($buktiPendukung);
                foreach ($bukti_pendukung as $key => $value) {
                    if ($key != 'foto' && $key != 'ktp' && $key != 'ijazah') {
                        $dropdown[] = $key;
                    }
                }
                // var_dump($dropdown);die();
                $asesmen_portofolio->bukti_pendukung = str_replace('"', '|', $asesmen_portofolio->bukti_pendukung);
                //$asesmen_portofolio->vatm_portofolio = str_replace('"', '|', $asesmen_portofolio->bukti_pendukung);
                $vatm_portofolio = @unserialize($asesmen_portofolio->vatm_portofolio);
                $catatan_vatm = @unserialize($asesmen_portofolio->catatan_vatm);
                $kesimpulan_jawaban_wawancara = @unserialize($asesmen_portofolio->kesimpulan_jawaban_wawancara);

                $this->db->where('created_by', $asesmen_portofolio->id_users);
                $repo = $this->db->get('t_repositori')->result();

                $this->db->select('c.*');
                $this->db->from(kode_lsp() . 'perangkat_asesmen a');
                $this->db->join(kode_lsp() . 'perangkat_asesmen_detail b', 'a.id=b.id_perangkat_asesmen');
                $this->db->join(kode_lsp() . 'soal c', 'b.id=c.id_perangkat_detail');
                $this->db->where('a.id', $asesmen_portofolio->id_perangkat);
                $this->db->where('b.jenis_perangkat', '4');
                $query_soal_wawancara = $this->db->get()->result();

                //var_dump($this->db->last_query()); die();
                $vatm = $this->uji_kompetensi_skema($asesmen_portofolio->skema_sertifikasi, $dropdown, $vatm_portofolio, $catatan_vatm, $query_soal_wawancara, $kesimpulan_jawaban_wawancara);
                $view = $this->load->view('asesmen_portofolio/edit', array('data' => $this->asesmen_portofolio_model->get_single($asesmen_portofolio), 'vatm' => $vatm, 'pra_asesmen' => array('-Pilih-', 'Lanjut', 'Tidak Lanjut'), 'jenis_kelamin' => array('-Pilih-', 'Pria', 'Wanita'), 'nama_asesor' => $nama_asesor, 'dtbukti_pendukung' => $data_asesmen_portofolio->bukti_pendukung, 'repo' => $repo), TRUE);
                echo json_encode(array('msgType' => 'success', 'msgValue' => $view, 'dtbukti_pendukung' => $data_asesmen_portofolio->bukti_pendukung));
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan !'));
            }
        }
    }

    function uji_kompetensi_skema_cetak($id, $dropdown, $memadai_y, $catatan_vatm, $query_soal_wawancara, $kesimpulan_jawaban_wawancara, $is_memadai) {
        $checklist = '<img style="width: 10px;" src="assets/img/cl.png" />';
        $skema = kode_lsp() . 'skema';
        $skema_detail = kode_lsp() . 'skema_detail';
        $unit_kompetensi = kode_lsp() . 'unit_kompetensi';
        $elemen_kompetensi = kode_lsp() . 'elemen_kompetensi';
        $kuk = kode_lsp() . 'kuk';
        $asesi = kode_lsp() . 'asesi';
        $asesi_detail = kode_lsp() . 'asesi_detail';


        $this->db->select("c.id_unit_kompetensi,c.unit_kompetensi,c.id as id_unit,b.no_urut", false);
        $this->db->from("$skema a");
        $this->db->join("$skema_detail b", "b.id_skema=a.id");
        $this->db->join("$unit_kompetensi c", "c.id=b.id_unit_kompetensi");
        $this->db->order_by("b.no_urut","ASC");
        //$this->db->join("$elemen_kompetensi d", "d.id_unit_kompetensi=c.id");
        //$this->db->join("$kuk e", "e.id_elemen_kompetensi=d.id");
        $this->db->where("a.id", $id);
        $d = $this->db->get()->result();
        //var_dump($d);die();

        $table_unit = "";
        $table_cetak_vatm = "";
        //$key_soal
        foreach ($query_soal_wawancara as $k => $v) {
                $array_id_unit_kompetensi[] = $v->id_unit_kompetensi ;
                }
                //var_dump($array_id_unit_kompetensi);die();
                //var_dump(array_search('30',$array_id_unit_kompetensi));die();
         //var_dump($array_id_unit_kompetensi);die();   
        foreach ($d as $key => $value) {
            //var_dump($value->id_unit);
            if (is_numeric(array_search($value->id_unit,$array_id_unit_kompetensi))){
                $table_unit .= "<table style='width:100%;margin-top:20px;border-collapse: collapse;background-color:#f2f2f2;' border='1' >"
                    . "<tr><td rowspan='2' style='padding: 5px;font-size:11px;width:23.5%;'>Unit Kompetensi No." . ($key + 1) . "</td>"
                    . "<td width='13%' style='padding: 5px;'>Kode Unit</td>"
                    . "<td width='2%' style='padding: 5px;'>:</td>"
                    . "<td style='padding: 5px;width:62.5%;'>" . $value->id_unit_kompetensi . "</td></tr>
                <tr><td style='padding: 5px;border-left:none;'>Judul Unit</td>
                <td style='padding: 5px;font-size:11px;'>:</td><td style='padding: 5px;font-size:11px;width:48%;' >" . $value->unit_kompetensi . "</td></tr>
            </table>";
             $table_unit .= '<table style="width:100%;font-size:12px;border-collapse: collapse;" border="1" class="table_cetak" >'
                    . '<tr style="background-color:#b8cce4;"><th rowspan="2" style="padding:5px;">No</th>'
                    . '<th rowspan="2" style="padding:5px;text-align:center;width:43.5%;">Daftar Pertanyaan</th>'
                    . '<th rowspan="2" style="padding:5px;text-align:center;width:40%;">Kesimpulan Jawaban<br/>Peserta Sertifikasi</th>'
                    . '<th colspan="2" style="padding:5px;text-align:center;">Keputusan</th></tr>'
                    . '<tr style="background-color:#b8cce4;"><th style="padding:5px;text-align:center;width:5%;border-left:none;">K</th>'
                    . '<th style="padding:5px;text-align:center;width:5%;">BK</th></tr>';
            $no_urut = 1;

            foreach ($query_soal_wawancara as $k => $v) {
                if ($v->id_unit_kompetensi == $value->id_unit) {
                    $table_unit .= "<tr><td style='padding:5px;text-align:center;'><b>" . $no_urut . " </b></td>"
                            . "<td style='width:43.5%;padding:5px;'>" . $v->pertanyaan . "</td>"
                            . "<td style='width:40%;padding:5px;'>" . $kesimpulan_jawaban_wawancara[($key + 1) * 10 + $no_urut] . "</td>"
                            . "<td style='text-align:center;'>" . $ch . "</td>"
                            . "<td style='text-align :center;'>" . $ch_bk . "</td></tr>";
                    //$table_unit .= "<tr><td colspan='5'><textarea placeholder='Kesimpulan Jawaban Peserta Sertifikasi' rows='3' style='width:100%;' width='100%' name='kesimpulan_jawaban_wawancara[" . (($key + 1) * 10 + $no_urut) . "]'>" . $kesimpulan_jawaban_wawancara[($key + 1) * 10 + $no_urut] . "</textarea></td></tr>";
                    $no_urut++;
                }
            }
             $table_unit .= '</table><br/>';
            }

            
            $table_cetak_vatm .= "<table style='width:100%;margin-top:20px;border-collapse: collapse;background-color:#f2f2f2;' border='1' >"
                    . "<tr><td rowspan='2' style='padding: 5px;width:15%;text-align:center;'>Unit  No." . ($key + 1) . "</td>"
                    . "<td width='13%' style='padding: 5px;'>Kode Unit</td>"
                    . "<td width='2%' style='padding: 5px;'>:</td>"
                    . "<td style='padding: 5px;width:70.8%;'>" . $value->id_unit_kompetensi . "</td></tr>
                <tr><td style='padding: 5px;border-left:none;'>Judul Unit</td>
                <td style='padding: 5px;'>:</td><td style='padding: 5px;font-size:10px;' >" . $value->unit_kompetensi . "</td></tr>
            </table>";
            $table_elemen = "";
            $this->db->group_by('elemen_kompetensi');
            $this->db->where('id_unit_kompetensi', $value->id_unit);
            $rows_elemen = $this->db->get(kode_lsp() . 'elemen_kompetensi')->result();
            $table_elemen .= "<table border='1' style='width:100%;margin-top:0px;border-collapse: collapse;' >"
                    . "<tr style='background-color:#b8cce4;'>"
                    . "<th rowspan='2' style='text-align:center;padding:5px;'>No</th>"
                    . "<th rowspan='2' style='text-align:center;padding:5px;'>Elemen Kompetensi</th>"
                    . "<th rowspan='2' style='text-align:center;padding:5px;'>Bukti Kompetensi</th>"
                    . "<th colspan='2' style='text-align:center;'>Memadai</th></tr>"
                    . "<tr style='background-color:#b8cce4;text-align:center;padding:5px;'>"
                    . "<th style='text-align:center;border-left:none;'>Ya</th>"
                    . "<th style='text-align:center;padding:5px;'>Tidak</th></tr>";
            $substansi_portofolio = array();
            foreach ($rows_elemen as $keys => $values) {
                if ($values->perangkat_bukti_tambahan == 'DPW') {
                    $substansi_portofolio[] = '<input type="checkbox" name="ch[]" value="1" checked /><img style="width: 10px;margin-left:-10px;margin-top:4px;" src="assets/img/cl.png" /> '.$values->no_kuk . '-' . $values->bukti_dpl;
                }
                $index_key = 10 * ($key + 1) + ($keys + 1);
                $checked_y = isset($memadai_y[$index_key]) && $memadai_y[$index_key] == 'y' ? $checklist : '';
                $checked_n = isset($memadai_y[$index_key]) && $memadai_y[$index_key] == 'n' ? $checklist : '';

                $table_elemen .= "<tr><td style='text-align:center;padding:5px;'>" . ($keys + 1) . "</td>"
                        . "<td  style='width:44.5%'>" . $values->elemen_kompetensi . "</td>"
                        . "<td style='width:37%'>" . implode($dropdown, ',') . "</td>
                <td style='text-align:center;width:5%;'>" . $checked_y . "</td>
                <td style='text-align:center;width:5%;'>" . $checked_n . "</td></tr>";
            }
            if (count($substansi_portofolio) > 0) {
                $detail_substansi = "";
                foreach ($substansi_portofolio as $x => $y) {
                    $detail_substansi .= $y . '<br/>';
                }
            } else {
                $detail_substansi = "";
            }
            $table_elemen .= "<tr><td colspan='5' style='width:100%'>Sebagai tindak lanjut hasil verifikasi terhadap bukti bukti, substansi dari materi di bawah ini diklarifikasi pada saat wawancara <br/><br/>" . $detail_substansi . "</td></tr>";

            $table_elemen .= "</table>";
            $table_cetak_vatm .= $table_elemen;
            $this->db->group_by('elemen_kompetensi');
            $this->db->where('id_unit_kompetensi', $value->id_unit);

            $ch = $is_memadai == '1' ? $checklist : '';
            $ch_bk = $is_memadai != '1' ? $checklist : '';
            //$checklist_kompeten = 
            $rows_elemen = $this->db->get(kode_lsp() . 'elemen_kompetensi')->result();

            $substansi_portofolio = array();
            foreach ($rows_elemen as $keys => $values) {
                if ($values->perangkat_bukti_tambahan == 'DPW') {
                    $substansi_portofolio[] = $values->no_kuk . '-' . $values->bukti_dpl;
                }
                $index_key = 10 * ($key + 1) + ($keys + 1);
                $checked_y = isset($memadai_y[$index_key]) && $memadai_y[$index_key] == 'y' ? 'checked' : '';
                $checked_n = isset($memadai_y[$index_key]) && $memadai_y[$index_key] == 'n' ? 'checked' : '';
            }
           
        }
        return array($table_unit, $table_cetak_vatm);
    }

    function uji_kompetensi_skema($id, $dropdown, $memadai_y, $catatan_vatm, $query_soal_wawancara, $kesimpulan_jawaban_wawancara) {
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
        $this->db->order_by("b.no_urut","ASC");
        //$this->db->join("$elemen_kompetensi d", "d.id_unit_kompetensi=c.id");
        //$this->db->join("$kuk e", "e.id_elemen_kompetensi=d.id");
        $this->db->where("a.id", $id);
        $d = $this->db->get()->result();
        $table_unit = "";
        foreach ($d as $key => $value) {
            //var_dump($value);
            $table_unit .= "<table width='100%' border='1' style='border-collapse: collapse;background-color:grey;color:white;' ><tr><td rowspan='2' width='23%'>Unit Kompetensi No." . ($key + 1) . "</td><td width='13%'>Kode Unit</td><td width='2%'>:</td><td>" . $value->id_unit_kompetensi . "</td></tr>
                <tr><td>Judul Unit</td><td>:</td><td style='font-size:10px;'>" . $value->unit_kompetensi . "</td></tr>
            </table><br/>";
            $this->db->group_by('elemen_kompetensi');
            $this->db->where('id_unit_kompetensi', $value->id_unit);

            $rows_elemen = $this->db->get(kode_lsp() . 'elemen_kompetensi')->result();
            $table_unit .= "<table width='100%' border='1' ><tr><th rowspan='2' style='text-align:center;'>No.</th><th rowspan='2'>Elemen Kompetensi</th><th rowspan='2'>Bukti Kompetensi</th><th colspan='2' style='text-align:center;'>Memadai</th></tr><tr><th style='text-align:center;'>Ya</th><th style='text-align:center;'>Tidak</th></tr>";
            $substansi_portofolio = array();
            foreach ($rows_elemen as $keys => $values) {
                if ($values->perangkat_bukti_tambahan == 'DPW') {
                    $substansi_portofolio[] = $values->no_kuk . '-' . $values->bukti_dpl;
                }
                $index_key = 10 * ($key + 1) + ($keys + 1);
                $checked_y = isset($memadai_y[$index_key]) && $memadai_y[$index_key] == 'y' ? 'checked' : '';
                $checked_n = isset($memadai_y[$index_key]) && $memadai_y[$index_key] == 'n' ? 'checked' : '';

                $table_unit .= "<tr><td>" . ($keys + 1) . "</td><td  width='60%'>" . $values->elemen_kompetensi . "</td><td>" . form_dropdown('dropdown_bukti_pendukung[]', $dropdown) . "</td>
                <td style='text-align:center;'><input type='radio'  class='ch_memadai_y' name='memadai_y[" . $index_key . "]' value='y' " . $checked_y . " /></td>
                <td style='text-align:center;'><input type='radio'  class='ch_memadai_n' name='memadai_y[" . $index_key . "]' value='n' " . $checked_n . " /></td></tr>";
            }
            if (count($substansi_portofolio) > 0) {
                $detail_substansi = "";
                foreach ($substansi_portofolio as $x => $y) {
                    $detail_substansi .= $y . '<br/>';
                }
            } else {
                $detail_substansi = "";
            }
            $table_unit .= "<tr><td colspan='5'>Sebagai tindak lanjut hasil verifikasi terhadap bukti-bukti, substansi dari materi di bawah ini diklarifikasi pada saat wawancara <br/>" . $detail_substansi . "<textarea placeholder='Catatan Klarifikasi' rows='3' style='width:100%;' width='100%' name='catatan_vatm[]'>" . $catatan_vatm[$key] . "</textarea></td></tr>";

            $no_urut = 1;
            foreach ($query_soal_wawancara as $k => $v) {
                if ($v->id_unit_kompetensi == $value->id_unit) {
                    $table_unit .= "<tr><td colspan='5'><b>" . $no_urut . " ." . $v->pertanyaan . "(<label style='color:green;'>".$v->jawaban_a."</label>)</td></td></tr>";
                    $table_unit .= "<tr><td colspan='5'><textarea placeholder='Kesimpulan Jawaban Peserta Sertifikasi' rows='3' style='width:100%;' width='100%' name='kesimpulan_jawaban_wawancara[" . (($key + 1) * 10 + $no_urut) . "]'>" . $kesimpulan_jawaban_wawancara[($key + 1) * 10 + $no_urut] . "</textarea></td></tr>";
                    $no_urut++;
                }
            }
            $table_unit .= "</table><br/>";
        }
        return $table_unit;
    }

    function cetak($id, $type = "pdf", $email_attachment = false) {
        $asesmen_portofolio = $this->asesmen_portofolio_model->get(intval($id));
        $data_asesmen_portofolio = $asesmen_portofolio;
        //Data asesi yang akan di uji
        if ($asesmen_portofolio->pra_asesmen_checked == "0" || empty($asesmen_portofolio->pra_asesmen_checked)) {
            $nama_asesor = '';
        } else {
            $asesor = $this->User_Model->get($asesmen_portofolio->pra_asesmen_checked);
            $nama_asesor = $asesor->nama_user;
        }
        $buktiPendukung = str_replace("|", '"', $asesmen_portofolio->bukti_pendukung);
        $bukti_pendukung = json_decode($buktiPendukung);
        foreach ($bukti_pendukung as $key => $value) {
            if ($key != 'foto' && $key != 'ktp' && $key != 'ijazah') {
                $dropdown[] = $key;
            }
        }
        // var_dump($dropdown);die();
        $asesmen_portofolio->bukti_pendukung = str_replace('"', '|', $asesmen_portofolio->bukti_pendukung);
        //$asesmen_portofolio->vatm_portofolio = str_replace('"', '|', $asesmen_portofolio->bukti_pendukung);
        $vatm_portofolio = @unserialize($asesmen_portofolio->vatm_portofolio);
        $catatan_vatm = @unserialize($asesmen_portofolio->catatan_vatm);
        $kesimpulan_jawaban_wawancara = @unserialize($asesmen_portofolio->kesimpulan_jawaban_wawancara);

        $this->db->where('created_by', $asesmen_portofolio->id_users);
        $repo = $this->db->get('t_repositori')->result();

        $this->db->select('c.*,b.waktu_pengerjaan');
        $this->db->from(kode_lsp() . 'perangkat_asesmen a');
        $this->db->join(kode_lsp() . 'perangkat_asesmen_detail b', 'a.id=b.id_perangkat_asesmen');
        $this->db->join(kode_lsp() . 'soal c', 'b.id=c.id_perangkat_detail');
        $this->db->where('a.id', $asesmen_portofolio->id_perangkat);
        $this->db->where('b.jenis_perangkat', '4');
        $query_soal_wawancara = $this->db->get()->result();

        //var_dump($query_soal_wawancara); die();
        $vatm = $this->uji_kompetensi_skema_cetak($asesmen_portofolio->skema_sertifikasi, $dropdown, $vatm_portofolio, $catatan_vatm, $query_soal_wawancara, $kesimpulan_jawaban_wawancara, $asesmen_portofolio->is_memadai);

        $this->db->select('a.pra_asesmen_checked,a.no_identitas,a.nama_lengkap,a.catatan_portofolio,a.vat_portofolio,a.is_memadai,'
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
        $view = $this->load->view('asesmen_portofolio/cetak', array('data' => $this->asesmen_portofolio_model->get_single($asesmen_portofolio)
            , 'vatm' => $vatm[0], 'vatm_cetak' => $vatm[1]
            , 'msg' => $msg
            , 'ttd_asesor' => $ttd_asesor
            , 'pra_asesmen' => array('-Pilih-', 'Lanjut', 'Tidak Lanjut')
            , 'jenis_kelamin' => array('-Pilih-', 'Pria', 'Wanita'), 'nama_asesor' => $nama_asesor
            , 'dtbukti_pendukung' => $data_asesmen_portofolio->bukti_pendukung, 'repo' => $repo,
            'data_asesi' => $data_asesi
            , 'query_soal_wawancara' => $query_soal_wawancara
                ), true);
        if ($type == "pdf") {
            $this->load->library("htm12pdf");
            $this->htm12pdf->pdf_create($view, "st-" . $id . ".pdf", $email_attachment, true);
        }
    }

}
