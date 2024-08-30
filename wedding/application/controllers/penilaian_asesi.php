<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Penilaian_asesi extends MY_Controller {
function __construct() {
        parent::__construct();
        ini_set('memory_limit', '8192M');
        $this->load->model('penilaian_asesi_model');
    }

    function index() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->load->library('grid');
            $grid = $this->grid->set_properties(array('model' => 'penilaian_asesi_model', 'controller' => 'penilaian_asesi', 'options' => array('id' => 'penilaian_asesi', 'pagination', 'rows_number')))->load_model()->set_grid();
            $view = $this->load->view('penilaian_asesi/index', array('grid' => $grid), true);
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

            if ($jenis_user == 3) {
                $asesi_id = $this->auth->get_user_data()->pegawai_id;
                $where[kode_lsp() . 'asesi.id_tuk ='] = $asesi_id;
                //$where['administrasi_ujk ='] = '1';
            } else if ($jenis_user == 2) {
                $asesi_id = $this->auth->get_user_data()->pegawai_id;
                $where['id_asesor ='] = $asesi_id;
            } else if ($jenis_user == 1) {
                $asesi_id = $this->auth->get_user_data()->id;
                $where[kode_lsp() . 'asesi.id_users ='] = $asesi_id;
            }

            // var_dump($jenis_user); die();

            if (isset($_POST['nama_lengkap']) && !empty($_POST['nama_lengkap'])) {
                $where['nama_lengkap like'] = '%' . $this->input->post('nama_lengkap') . '%';
            }
            // $where['rekomendasi_asesor !='] = '0';
            if (isset($where))
                $params['_where'] = $where;
            $data['total'] = isset($where) ? $this->penilaian_asesi_model->count_by($where) : $this->penilaian_asesi_model->count_all();
            $this->penilaian_asesi_model->limit($row, $offset);
            $order = $this->penilaian_asesi_model->get_params('_order');
            $rows = $this->penilaian_asesi_model->set_params($params)->with(array('skema','user','jadwal_asesmen','tuk','asesor'));
            $data['rows'] = $this->penilaian_asesi_model->get_selected()->data_formatter($rows);
            echo json_encode($data);
        } else {
            block_access_method();
        }
    }

    function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->penilaian_asesi_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->penilaian_asesi_model->check_unique($data)) {
                    if ($this->penilaian_asesi_model->insert($data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->penilaian_asesi_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            echo json_encode(array('msgType' => 'success', 'msgValue' => $this->load->view('asesi/add', array('penilaian_asesi' => array('-Pilih-', 'Lanjut', 'Tidak Lanjut')), TRUE)));
        }
    }

    function edit($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->penilaian_asesi_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->penilaian_asesi_model->check_unique($data, intval($id))) {
                    $data['mak01'] = serialize($this->input->post('mak01'));
                    $data['mak02'] = serialize($this->input->post('mak02'));
                    $data['mak02a'] = serialize($this->input->post('mak02a'));
                    $data['mak03'] = serialize($this->input->post('mak03'));
                    $data['mak04'] = serialize($this->input->post('mak04'));
                    $data['mak04a'] = serialize($this->input->post('mak04a'));
                    $data['mak05'] = serialize($this->input->post('mak05'));
                    $data['mak05a'] = serialize($this->input->post('mak05a'));
                    $data['mak06'] = serialize($this->input->post('mak06'));
                    $data['mak06a'] = serialize($this->input->post('mak06a'));
                    $data['mak06b'] = serialize($this->input->post('mak06b'));
                    $data['mak07'] = serialize($this->input->post('mak07'));

                    if ($this->penilaian_asesi_model->update(intval($id), $data) !== false) {
                        $this->db->where('asesi_id',$id);
                        $asesi= $this->db->get(kode_lsp().'asesi_detail')->result_array();
                        $v = $this->input->post('v');
                        $a = $this->input->post('a');
                        $t = $this->input->post('t');
                        $m = $this->input->post('m');

                        foreach($asesi as $key=>$value){
                            if(isset($v[$value['id']])){
                                $v_value = '1';
                            }else{
                                $v_value = '0';
                            }
                            if(isset($a[$value['id']])){
                                $a_value = '1';
                            }else{
                                $a_value = '0';
                            }
                            if(isset($t[$value['id']])){
                                $t_value = '1';
                            }else{
                                $t_value = '0';
                            }
                            if(isset($m[$value['id']])){
                                $m_value = '1';
                            }else{
                                $m_value = '0';
                            }
                            $data_update = array(
                                       'v' => $v_value,
                                       'a' => $a_value,
                                       't' => $t_value,
                                       'm' => $m_value,
                                    );

                            $this->db->where('id', $value['id']);
                            $this->db->update(kode_lsp().'asesi_detail', $data_update);
                        }
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->penilaian_asesi_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $asesi = $this->penilaian_asesi_model->get(intval($id));
            if (sizeof($asesi) == 1) {
                $this->load->model('asesi_model');
                $this->load->library('combogrid');
                $jadwal_grid = $this->combogrid->set_properties(array('model' => 'jadwal_asesmen_model', 'controller' => 'jadwal_asesmen', 'fields' => array('jadual', 'tanggal'), 'options' => array('id' => 'jadwal_id', 'pagination', 'rownumber', 'idField' => 'id', 'textField' => 'jadual', 'panelWidth' => 500)))->load_model()->set_grid();
                $asesor_grid = $this->combogrid->set_properties(array('model' => 'asesor_model', 'controller' => 'asesor', 'fields' => array('users', 'no_reg'), 'options' => array('id' => 'id_asesor', 'pagination', 'rownumber', 'idField' => 'id', 'textField' => 'users', 'panelWidth' => 500)))->load_model()->set_grid();
                $tuk_grid = $this->combogrid->set_properties(array('model' => 'tuk_model', 'controller' => 'tuk', 'fields' => array('tuk', 'alamat'), 'options' => array('id' => 'id_tuk', 'pagination', 'rownumber', 'idField' => 'id', 'textField' => 'tuk', 'panelWidth' => 500)))->load_model()->set_grid();
                $this->db->where('asesi_id',$id);
                //Nama bukti pendukung
                $detail_asesi = $this->db->get(kode_lsp().'asesi_detail')->result_array();

                foreach($detail_asesi as $key=>$value){
                    $jenis_bukti[]=$value['jenis_bukti'];
                }
                $jenis_bukti = implode(',',array_unique($jenis_bukti));
                $unit_kompetensi = $this->asesi_model->data_unit_kompetensi($asesi->skema_sertifikasi);
                //unserialize data mak
                $mak01 = unserialize($asesi->mak01);
                $mak02 = unserialize($asesi->mak02);
                $mak02a = unserialize($asesi->mak02a);
                $mak03 = unserialize($asesi->mak03);
                $mak04 = unserialize($asesi->mak04);
                $mak04a = unserialize($asesi->mak04a);
                $mak05 = unserialize($asesi->mak05);
                $mak05a = unserialize($asesi->mak05a);
                $mak06 = @unserialize($asesi->mak06);
                $mak06a = @unserialize($asesi->mak06a);
                $mak06b = @unserialize($asesi->mak06b);
                $mak07 = @unserialize($asesi->mak07);

                //var_dump($mak04);die();
                $view = $this->load->view('penilaian_asesi/edit', array('detail_asesi'=>$detail_asesi,'data' => $this->penilaian_asesi_model->get_single($asesi)
                ,'jadwal_grid' => $jadwal_grid
                ,'asesor_grid' => $asesor_grid
                ,'tuk_grid' => $tuk_grid
                ,'mak01' => $mak01
                ,'mak02' => $mak02
                ,'mak02a' => $mak02a
                ,'mak03' => $mak03
                ,'mak04' => $mak04
                ,'mak04a' => $mak04a
                ,'mak05' => $mak05
                ,'mak05a' => $mak05a
                ,'mak06' => $mak06
                ,'mak06a' => $mak06a
                ,'mak06b' => $mak06b
                ,'mak07' => $mak07
                ,'jenis_bukti' => $jenis_bukti
                ,'unit_kompetensi' => $unit_kompetensi
                ,'rekomendasi_asesor' => array('-Pilih-','Kompeten','Belum Kompeten')
                ), TRUE);
                echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan !'));
            }
        }
    }
    function edit_upload($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->penilaian_asesi_model->set_validation()->validate();

            if ($data !== false) {
                if ($this->penilaian_asesi_model->check_unique($data, intval($id))) {
                    if (isset($_FILES['fileToUpload']['tmp_name']) && !empty($_FILES['fileToUpload']['tmp_name'])) {
                        $siswa = $this->penilaian_asesi_model->get(intval($id));
                        $data['bukti_pembayaran'] = $siswa->no_identitas. '_' . str_replace(' ', '_', $_FILES['fileToUpload']['name']);
                        $config['upload_path'] = substr(__dir__, 0, strpos(__dir__, "application")) . 'assets/files/administrasi/';
                        $config['allowed_types'] = 'bmp|jpg|png|gif|jpeg|pdf|doc|docx';
                        $config['file_name'] = $data['bukti_pembayaran'];
                        $config['max_size'] = '51200000';

                        $this->load->library('upload', $config);

                        if ($this->upload->do_upload('fileToUpload')) {
                            $current_file = substr(__dir__, 0, strpos(__dir__, "application")) . 'assets/files/administrasi/' . $siswa->bukti_pembayaran;
                            if (is_file($current_file)) {
                                unlink($current_file);
                            }
                        } else {
                            echo json_encode(array('msgType' => 'error', 'msgValue' => strip_tags($this->upload->display_errors())));
                            exit();
                        }
                    }else{
                        $data['bukti_pembayaran'] = $this->input->post('foto_hidden');
                    }
                    if ($this->penilaian_asesi_model->update(intval($id), $data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->penilaian_asesi_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        }
    }
    function delete($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $roles = $this->penilaian_asesi_model->get(intval($id));
            if (sizeof($roles) == 1) {
                if ($this->penilaian_asesi_model->delete(intval($id))) {
                    echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil dihapus'));
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak berhasil dihapus !'));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan !'));
            }
        } else {
            block_access_method();
        }
    }
    function combogrid($id = false)
	{
		$this->load->model('v_penilaian_asesi_model');
		$row = intval($this->input->post('rows')) == 0 ? 20 : intval($this->input->post('rows')) ;
		$page = intval($this->input->post('page'))== 0 ? 1 : intval($this->input->post('page'));
		$offset = $row * ($page - 1);
		$data = array();
		$params = array('_return'=>'data');
		if(isset($_POST['q']))
		{
			$where['asesi_name LIKE'] = "%" . $this->input->post('q') . "%";
		}
		if(isset($where)) $params['_where'] = $where;
		$data['total'] = isset($where) ? $this->v_penilaian_asesi_model->count_by($where) : $this->v_penilaian_asesi_model->count_all();
		$this->v_penilaian_asesi_model->limit($row, $offset);
		$order_criteria = "ASC";
		$_order_escape = TRUE;
		if($id)
		{
			$order = "FIELD(id, " . intval($id) . ")";
			$order_criteria = "DESC";
			$_order_escape = FALSE;
		}
		else
		{
			$order = $this->v_penilaian_asesi_model->get_params('_order');
		}
		$rows = isset($where) ? $this->v_penilaian_asesi_model->order_by($order, $order_criteria, $_order_escape)->get_many_by($where) : $this->v_penilaian_asesi_model->order_by($order, $order_criteria, $_order_escape)->get_all();
		$data['rows'] = $this->v_penilaian_asesi_model->get_selected()->data_formatter($rows);
        //var_dump($data);
		echo json_encode($data);
	}

    function cetak($id , $type = "pdf") {

        // error_reporting(E_ALL);
        // ini_set('display_errors', TRUE);
        // ini_set('display_startup_errors', TRUE);

        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $checklist = '<span style="font-family:zapfdingbats;">3</span>';
        $data['checklist'] = $checklist;

        $this->load->model('asesi_model');
        $this->load->model('real_asesmen_model');
        $asesi = $this->real_asesmen_model->data_asesi($id);

        $data['mak01'] = unserialize($asesi->mak01);
        $data['mak02'] = unserialize($asesi->mak02);
        $data['mak02a'] = unserialize($asesi->mak02a);
        $data['mak03'] = unserialize($asesi->mak03);
        $data['mak04'] = unserialize($asesi->mak04);
        $data['mak04a'] = unserialize($asesi->mak04a);
        $data['mak05'] = unserialize($asesi->mak05);
        $data['mak05a'] = unserialize($asesi->mak05a);
        $data['mak06'] = unserialize($asesi->mak06);
        $data['mak06a'] = unserialize($asesi->mak06a);
        $data['mak06b'] = unserialize($asesi->mak06b);
        $data['mak07'] = unserialize($asesi->mak07);
        $data['ch_observasi'] = @unserialize($asesi->ch_observasi);
        $data['penilaian_perangkat'] = unserialize($asesi->penilaian_perangkat);
        $data['keputusan_mak02'] = unserialize($asesi->keputusan_mak02);


        // if ($asesi->no_uji_kompetensi == "") {
        //     echo json_encode(array('msgType' => 'error', 'msgValue' => 'Belum di jadwalkan. Edit terlebih dahulu !'));
        //     exit;
        // }

        $data['data_asesi'] = $asesi;
        $unit_kompetensi = $this->asesi_model->data_unit_kompetensi($asesi->skema_sertifikasi);
        $data['unit_kompetensi'] = $unit_kompetensi;
        $asesi_detail = $this->asesi_model->asesi_detail_muk($id);
        $data['asesi_detail'] = $asesi_detail;
        //Nama Asesor dan No reg
        $this->db->where('id', $asesi->id_asesor);
        $data_asesor = $this->db->get(kode_lsp() . 'users')->row();
        $data['nama_asesor'] = $data_asesor->users;
        $data['no_reg_asesor'] = $data_asesor->no_reg;
        $kode_unit = '';
        $unit = '';
        $elemen_kuk = "";
        $unit_mak = "";

        // var_dump($data['keputusan_mak02']); die();


        $this->load->model('asesi_model');
        $this->db->where('pegawai_id',$id);
        $this->db->where('jenis_user','1');
        $row = $this->db->get('t_users')->row();

        $files_asesi = $this->asesi_model->files_asesi_muk($row->id);
        $files_bukti = $this->asesi_model->files_asesi($row->id);

        $bukti_pendukung = "<ul style=''>";
        foreach($files_asesi as $value){
            $bukti_pendukung .= $value->nama_dokumen;
            $buktipendukung = str_replace(
                "<li>".$value->nama_dokumen."</li>",
                    "<ul>
                        <li>CV</li>
                        <li>Ijazah</li>
                        <li>Sertifikat</li>
                     </ul>",
                "<li>".$value->nama_dokumen."</li>");
        }
        $bukti_pendukung .= "</ul>";

        $data['files_asesi'] = $files_asesi;
        $data['files_bukti'] = $files_bukti;
        $data['bukti_pendukung'] = $bukti_pendukung;
        $data['buktipendukung'] = $buktipendukung;

        // var_dump($files_asesi); die();

        $this->load->model('bukti_pendukung_model');
        $bukti_tambahan = $this->bukti_pendukung_model->bukti_pendukung($asesi->id_users);
        $jenis_portofolio = array('0' => 'Foto','1' => 'KTP', '2' => 'Ijazah', '3' => 'SKD', '4' => 'CP', '5' => 'SK', '6' => 'SR'
                                ,'7'=>'JD'
                                ,'8'=>'DE'
                                ,'9'=>'WS'
                                ,'10'=>'PE'
                                ,'11'=>'L'
                                ,'12'=>'SE'
                                );
        //$buktiTambahan = array();
        foreach($bukti_tambahan as $value){
            if($value->jenis_portofolio != '1' && $value->jenis_portofolio != '2' && $value->jenis_portofolio != '0' )
            $buktiTambahan[] = $jenis_portofolio[$value->jenis_portofolio];

            if(count($buktiTambahan) > 0){
                $data['buktiTambahan'] = implode(',',$buktiTambahan);
            }else{
                $data['buktiTambahan'] = '';
            }
        }
        // if(count($buktiTambahan) > 0){
        //     $data['buktiTambahan'] = implode(',',$buktiTambahan);
        // }else{
        //     $data['buktiTambahan'] = '';
        // }
        //var_dump($data['buktiTambahan']);die();


        foreach ($unit_kompetensi as $key => $value) {
            $kode_unit .= ($key + 1) . '. ' . $value->id_unit_kompetensi . '<br/>';
            $unit .= '<label style="font-size:10px;">' . ($key + 1) . '. ' . $value->unit_kompetensi . '</label><br/>';
            $query_elemen = $this->asesi_model->elemen($value->id_unit_kompetensi);
            $detail_elemen = "";
            $metode_asesmen_uji = $asesi->metode_asesmen;
            if (count($query_elemen) > 0) {
                foreach ($query_elemen as $keys => $values) {
                    $query_kuk = $this->asesi_model->kuk($values->id);
                    $index_key = count($query_kuk) * ($key + 1) + ($keys + 1);
                    // var_dump(count($query_kuk)); die();

                    if (count($query_kuk) > 0) {
                        $detail_kuk = "";
                        foreach ($query_kuk as $k => $v) {
                            $detail_kuk .= '<tr>
                            <td style="width:45%;">' . ($k + 1) . '. ' . $v->kuk . '</td>
                            <td style="width:13%;text-align:center;">
                                '. (isset($metode_asesmen_uji) && $metode_asesmen_uji=='1'?'DPW':'') .'
                            </td>
                            <td style="width:13%;text-align:center;">
                                '. (isset($metode_asesmen_uji) && $metode_asesmen_uji=='1'?'DPT , DPL':'') .'
                            </td>
                            <td style="width:13%;text-align:center;">
                                '. (isset($metode_asesmen_uji) && $metode_asesmen_uji=='2'?'CLP':'') .'
                            </td>

                            <td style="width:5%;text-align:center;">
                                '. (isset($data['keputusan_mak02'][$k]) && $data['keputusan_mak02'][$k]=='y'?$checklist:'') .'
                            </td>
                            <td style="width:5%;text-align:center;">
                                '. (isset($data['keputusan_mak02'][$k]) && $data['keputusan_mak02'][$k]=='n'?$checklist:'') .'
                            </td>
                            <td style="width:5%;text-align:center;"></td>
                          </tr>';
                        }
                    } else {
                        $detail_kuk .= '<tr>
                            <td></td>
                            <td style="width:13%"></td>
                            <td style="width:13%"></td>
                            <td style="width:13%"></td>
                            <td style="width:5%"></td>
                            <td style="width:5%"></td>
                            <td style="width:5%"></td>
                          </tr>';
                    }

                    $detail_elemen .= '<tr>
                            <td style="width:45%;font-weight:bold;"> Elemen Kompetensi </td>
                            <td colspan="7" style="width:55%;">' . ($keys + 1) . '. ' . $values->elemen_kompetensi . '</td>
                          </tr>
                          <tr>
                            <td rowspan="2" style="width:45%;text-align:center;background-color:grey;font-weight:bold;"> Kriteria Unjuk Kerja </td>
                            <td colspan="3" style="width:40%;text-align:center;background-color:grey;font-weight:bold;">Jenis Bukti</td>
                            <td colspan="3" style="width:15%;text-align:center;background-color:grey;font-weight:bold;">Keputusan</td>

                          </tr>
                          <tr>

                            <td style="width:13%;text-align:center;text-align:center;background-color:grey;font-weight:bold;">Bukti Langsung</td>
                            <td style="width:13%;text-align:center;text-align:center;background-color:grey;font-weight:bold;">Bukti Tidak Langsung</td>
                            <td style="width:13%;text-align:center;background-color:grey;font-weight:bold;">Bukti Tambahan</td>
                            <td style="width:5%;text-align:center;background-color:grey;font-weight:bold;">K</td>
                            <td style="width:5%;text-align:center;background-color:grey;font-weight:bold;">BK</td>
                            <td style="width:5%;text-align:center;background-color:grey;font-weight:bold;">AL</td>
                          </tr>
                          ' . $detail_kuk;
                }
            } else {
                $detail_elemen .= '<tr>
                            <td style="width:45%;font-weight:bold;"> Elemen Kompetensi </td>
                            <td colspan="7" style="width:55%;"></td>
                          </tr>
                          <tr>
                            <td rowspan="2" style="width:45%;text-align:center;background-color:grey;font-weight:bold;"> Kriteria Unjuk Kerja </td>
                            <td colspan="3" style="width:40%;text-align:center;background-color:grey;font-weight:bold;">Jenis Bukti</td>
                            <td colspan="3" style="width:15%;text-align:center;background-color:grey;font-weight:bold;">Keputusan</td>

                          </tr>
                          <tr>

                            <td style="width:13%;text-align:center;text-align:center;background-color:grey;font-weight:bold;">Bukti Langsung</td>
                            <td style="width:13%;text-align:center;text-align:center;background-color:grey;font-weight:bold;">Bukti Tidak Langsung</td>
                            <td style="width:13%;text-align:center;background-color:grey;font-weight:bold;">Bukti Tambahan</td>
                            <td style="width:5%;text-align:center;background-color:grey;font-weight:bold;">K</td>
                            <td style="width:5%;text-align:center;background-color:grey;font-weight:bold;">BK</td>
                            <td style="width:5%;text-align:center;background-color:grey;font-weight:bold;">AL</td>
                          </tr>';
            }

            $elemen_kuk .= '<table style="width:100%;font-size:10px;border-collapse: collapse;" border="1" >
                          <tr>
                            <td style="width:45%;font-weight:bold;"> Kode Unit Kompetensi </td>
                            <td colspan="7" style="width:55%;">' . $value->id_unit_kompetensi . '</td>
                          </tr>
                          <tr>
                            <td style="width:45%;font-weight:bold;"> Unit Kompetensi </td>
                            <td colspan="7" style="width:55%;">' . $value->unit_kompetensi . '</td>
                          </tr>
                          ' . $detail_elemen . '
                        </table><br/>';

            $unit_mak .= '<tr>
                            <td colspan="2" style="width:45%">
                            ' . $value->unit_kompetensi . '
                            </td>
                            <td style="width:10%; text-align: center;">
                                '. (isset($data['mak06'][$key]) && $data['mak06'][$key]=='K'?''. $checklist .'':'') .'
                            </td>
                            <td style="width:10%; text-align: center;">
                                '. (isset($data['mak06'][$key]) && $data['mak06'][$key]=='BK'?''. $checklist .'':'') .'
                            </td>
                            <td style="width:35%">
                                '. (isset($mak06a[$key])?$mak06a[$key]:'-') .'
                            </td>
                          </tr>';
        }
        //'.//$detail_elemen.'
        $data['unit_mak'] = $unit_mak;
        $data['elemen_kuk'] = $elemen_kuk;
        foreach ($asesi_detail as $key => $value) {
            $jenis_bukti[] = $value->jenis_bukti;
        }

        $jenis_bukti = implode(',', array_unique($jenis_bukti));
        $data['jenis_bukti'] = $jenis_bukti;
        $data['kode_unit'] = $kode_unit;
        $data['unit'] = $unit;
        $data['qr_asesi'] = $asesi->nama_lengkap . " - " . $asesi->no_uji_kompetensi . "\r\n\n\n" . $data['aplikasi']->url_aplikasi . "/qrcode/asesi/" . $id;
        $this->load->model('pra_asesmen_model');
        $data['asesor_pra_asesmen'] = $this->pra_asesmen_model->asesor_pra_asesmen($asesi->pra_asesmen_checked);
        $data['ttd_asesor'] = $data['asesor_pra_asesmen']->users . " - " . $data['asesor_pra_asesmen']->no_reg . "\r\n\n\n" . $data['aplikasi']->url_aplikasi . "/qrcode/asesor/" . $asesi->pra_asesmen_checked;

        $data['ttd_asesor_uji'] = $data['nama_asesor'] . " - " . $data['no_reg_asesor'] . "\r\n\n\n" . $data['aplikasi']->url_aplikasi . "/qrcode/asesor_uji/" . $asesi->id_asesor;

        // var_dump($asesi->id); die();

        $view = $this->load->view('penilaian_asesi/cetak_all', $data, true);
        if ($type == "pdf") {
            $this->load->library("htm12pdf");

            ini_set('memory_limit', '256M');
            $namefile = "data_asesi-" . $asesi->nama_lengkap;
            $this->htm12pdf->pdf_create($view, strtoupper($namefile) . ".pdf", false, true);
        }
    }

    function cetak_apl($id , $type = "pdf") {

        // error_reporting(E_ALL);
        // ini_set('display_errors', TRUE);
        // ini_set('display_startup_errors', TRUE);

        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $checklist = '<span style="font-family:zapfdingbats;">3</span>';
        $data['checklist'] = $checklist;

        $this->load->model('asesi_model');
        $this->load->model('real_asesmen_model');
        $asesi = $this->real_asesmen_model->data_asesi($id);

        $data['mak01'] = unserialize($asesi->mak01);
        $data['mak02'] = unserialize($asesi->mak02);
        $data['mak02a'] = unserialize($asesi->mak02a);
        $data['mak03'] = unserialize($asesi->mak03);
        $data['mak04'] = unserialize($asesi->mak04);
        $data['mak04a'] = unserialize($asesi->mak04a);
        $data['mak05'] = unserialize($asesi->mak05);
        $data['mak05a'] = unserialize($asesi->mak05a);
        $data['mak06'] = unserialize($asesi->mak06);
        $data['mak06a'] = unserialize($asesi->mak06a);
        $data['mak06b'] = unserialize($asesi->mak06b);
        $data['mak07'] = unserialize($asesi->mak07);
        $data['ch_observasi'] = @unserialize($asesi->ch_observasi);
        $data['penilaian_perangkat'] = unserialize($asesi->penilaian_perangkat);
        $data['keputusan_mak02'] = unserialize($asesi->keputusan_mak02);


        // if ($asesi->no_uji_kompetensi == "") {
        //     echo json_encode(array('msgType' => 'error', 'msgValue' => 'Belum di jadwalkan. Edit terlebih dahulu !'));
        //     exit;
        // }

        $data['data_asesi'] = $asesi;
        $unit_kompetensi = $this->asesi_model->data_unit_kompetensi($asesi->skema_sertifikasi);
        $data['unit_kompetensi'] = $unit_kompetensi;
        $asesi_detail = $this->asesi_model->asesi_detail_muk($id);
        $data['asesi_detail'] = $asesi_detail;
        //Nama Asesor dan No reg
        $this->db->where('id', $asesi->id_asesor);
        $data_asesor = $this->db->get(kode_lsp() . 'users')->row();
        $data['nama_asesor'] = $data_asesor->users;
        $data['no_reg_asesor'] = $data_asesor->no_reg;
        $kode_unit = '';
        $unit = '';
        $elemen_kuk = "";
        $unit_mak = "";

        // var_dump($data['keputusan_mak02']); die();


        $this->load->model('asesi_model');
        $this->db->where('pegawai_id',$id);
        $this->db->where('jenis_user','1');
        $row = $this->db->get('t_users')->row();

        $files_asesi = $this->asesi_model->files_asesi_muk($row->id);
        $files_bukti = $this->asesi_model->files_asesi($row->id);

        $bukti_pendukung = "<ul style=''>";
        foreach($files_asesi as $value){
            $bukti_pendukung .= $value->nama_dokumen;
            $buktipendukung = str_replace(
                "<li>".$value->nama_dokumen."</li>",
                    "<ul>
                        <li>CV</li>
                        <li>Ijazah</li>
                        <li>Sertifikat</li>
                     </ul>",
                "<li>".$value->nama_dokumen."</li>");
        }
        $bukti_pendukung .= "</ul>";

        $data['files_asesi'] = $files_asesi;
        $data['files_bukti'] = $files_bukti;
        $data['bukti_pendukung'] = $bukti_pendukung;
        $data['buktipendukung'] = $buktipendukung;

        // var_dump($files_asesi); die();

        $this->load->model('bukti_pendukung_model');
        $bukti_tambahan = $this->bukti_pendukung_model->bukti_pendukung($asesi->id_users);
        $jenis_portofolio = array('0' => 'Foto','1' => 'KTP', '2' => 'Ijazah', '3' => 'SKD', '4' => 'CP', '5' => 'SK', '6' => 'SR'
                                ,'7'=>'JD'
                                ,'8'=>'DE'
                                ,'9'=>'WS'
                                ,'10'=>'PE'
                                ,'11'=>'L'
                                ,'12'=>'SE'
                                );
        //$buktiTambahan = array();
        foreach($bukti_tambahan as $value){
            if($value->jenis_portofolio != '1' && $value->jenis_portofolio != '2' && $value->jenis_portofolio != '0' )
            $buktiTambahan[] = $jenis_portofolio[$value->jenis_portofolio];

            if(count($buktiTambahan) > 0){
                $data['buktiTambahan'] = implode(',',$buktiTambahan);
            }else{
                $data['buktiTambahan'] = '';
            }
        }
        // if(count($buktiTambahan) > 0){
        //     $data['buktiTambahan'] = implode(',',$buktiTambahan);
        // }else{
        //     $data['buktiTambahan'] = '';
        // }
        //var_dump($data['buktiTambahan']);die();


        foreach ($unit_kompetensi as $key => $value) {
            $kode_unit .= ($key + 1) . '. ' . $value->id_unit_kompetensi . '<br/>';
            $unit .= '<label style="font-size:10px;">' . ($key + 1) . '. ' . $value->unit_kompetensi . '</label><br/>';
            $query_elemen = $this->asesi_model->elemen($value->id_unit_kompetensi);
            $detail_elemen = "";
            $metode_asesmen_uji = $asesi->metode_asesmen;
            if (count($query_elemen) > 0) {
                foreach ($query_elemen as $keys => $values) {
                    $query_kuk = $this->asesi_model->kuk($values->id);
                    $index_key = count($query_kuk) * ($key + 1) + ($keys + 1);
                    // var_dump(count($query_kuk)); die();

                    if (count($query_kuk) > 0) {
                        $detail_kuk = "";
                        foreach ($query_kuk as $k => $v) {
                            $detail_kuk .= '<tr>
                            <td style="width:45%;">' . ($k + 1) . '. ' . $v->kuk . '</td>
                            <td style="width:13%;text-align:center;">
                                '. (isset($metode_asesmen_uji) && $metode_asesmen_uji=='1'?'DPW':'') .'
                            </td>
                            <td style="width:13%;text-align:center;">
                                '. (isset($metode_asesmen_uji) && $metode_asesmen_uji=='1'?'DPT , DPL':'') .'
                            </td>
                            <td style="width:13%;text-align:center;">
                                '. (isset($metode_asesmen_uji) && $metode_asesmen_uji=='2'?'CLP':'') .'
                            </td>

                            <td style="width:5%;text-align:center;">
                                '. (isset($data['keputusan_mak02'][$k]) && $data['keputusan_mak02'][$k]=='y'?$checklist:'') .'
                            </td>
                            <td style="width:5%;text-align:center;">
                                '. (isset($data['keputusan_mak02'][$k]) && $data['keputusan_mak02'][$k]=='n'?$checklist:'') .'
                            </td>
                            <td style="width:5%;text-align:center;"></td>
                          </tr>';
                        }
                    } else {
                        $detail_kuk .= '<tr>
                            <td></td>
                            <td style="width:13%"></td>
                            <td style="width:13%"></td>
                            <td style="width:13%"></td>
                            <td style="width:5%"></td>
                            <td style="width:5%"></td>
                            <td style="width:5%"></td>
                          </tr>';
                    }

                    $detail_elemen .= '<tr>
                            <td style="width:45%;font-weight:bold;"> Elemen Kompetensi </td>
                            <td colspan="7" style="width:55%;">' . ($keys + 1) . '. ' . $values->elemen_kompetensi . '</td>
                          </tr>
                          <tr>
                            <td rowspan="2" style="width:45%;text-align:center;background-color:grey;font-weight:bold;"> Kriteria Unjuk Kerja </td>
                            <td colspan="3" style="width:40%;text-align:center;background-color:grey;font-weight:bold;">Jenis Bukti</td>
                            <td colspan="3" style="width:15%;text-align:center;background-color:grey;font-weight:bold;">Keputusan</td>

                          </tr>
                          <tr>

                            <td style="width:13%;text-align:center;text-align:center;background-color:grey;font-weight:bold;">Bukti Langsung</td>
                            <td style="width:13%;text-align:center;text-align:center;background-color:grey;font-weight:bold;">Bukti Tidak Langsung</td>
                            <td style="width:13%;text-align:center;background-color:grey;font-weight:bold;">Bukti Tambahan</td>
                            <td style="width:5%;text-align:center;background-color:grey;font-weight:bold;">K</td>
                            <td style="width:5%;text-align:center;background-color:grey;font-weight:bold;">BK</td>
                            <td style="width:5%;text-align:center;background-color:grey;font-weight:bold;">AL</td>
                          </tr>
                          ' . $detail_kuk;
                }
            } else {
                $detail_elemen .= '<tr>
                            <td style="width:45%;font-weight:bold;"> Elemen Kompetensi </td>
                            <td colspan="7" style="width:55%;"></td>
                          </tr>
                          <tr>
                            <td rowspan="2" style="width:45%;text-align:center;background-color:grey;font-weight:bold;"> Kriteria Unjuk Kerja </td>
                            <td colspan="3" style="width:40%;text-align:center;background-color:grey;font-weight:bold;">Jenis Bukti</td>
                            <td colspan="3" style="width:15%;text-align:center;background-color:grey;font-weight:bold;">Keputusan</td>

                          </tr>
                          <tr>

                            <td style="width:13%;text-align:center;text-align:center;background-color:grey;font-weight:bold;">Bukti Langsung</td>
                            <td style="width:13%;text-align:center;text-align:center;background-color:grey;font-weight:bold;">Bukti Tidak Langsung</td>
                            <td style="width:13%;text-align:center;background-color:grey;font-weight:bold;">Bukti Tambahan</td>
                            <td style="width:5%;text-align:center;background-color:grey;font-weight:bold;">K</td>
                            <td style="width:5%;text-align:center;background-color:grey;font-weight:bold;">BK</td>
                            <td style="width:5%;text-align:center;background-color:grey;font-weight:bold;">AL</td>
                          </tr>';
            }

            $elemen_kuk .= '<table style="width:100%;font-size:10px;border-collapse: collapse;" border="1" >
                          <tr>
                            <td style="width:45%;font-weight:bold;"> Kode Unit Kompetensi </td>
                            <td colspan="7" style="width:55%;">' . $value->id_unit_kompetensi . '</td>
                          </tr>
                          <tr>
                            <td style="width:45%;font-weight:bold;"> Unit Kompetensi </td>
                            <td colspan="7" style="width:55%;">' . $value->unit_kompetensi . '</td>
                          </tr>
                          ' . $detail_elemen . '
                        </table><br/>';

            $unit_mak .= '<tr>
                            <td colspan="2" style="width:45%">
                            ' . $value->unit_kompetensi . '
                            </td>
                            <td style="width:10%; text-align: center;">
                                '. (isset($data['mak06'][$key]) && $data['mak06'][$key]=='K'?''. $checklist .'':'') .'
                            </td>
                            <td style="width:10%; text-align: center;">
                                '. (isset($data['mak06'][$key]) && $data['mak06'][$key]=='BK'?''. $checklist .'':'') .'
                            </td>
                            <td style="width:35%">
                                '. (isset($mak06a[$key])?$mak06a[$key]:'-') .'
                            </td>
                          </tr>';
        }
        //'.//$detail_elemen.'
        $data['unit_mak'] = $unit_mak;
        $data['elemen_kuk'] = $elemen_kuk;
        foreach ($asesi_detail as $key => $value) {
            $jenis_bukti[] = $value->jenis_bukti;
        }

        $jenis_bukti = implode(',', array_unique($jenis_bukti));
        $data['jenis_bukti'] = $jenis_bukti;
        $data['kode_unit'] = $kode_unit;
        $data['unit'] = $unit;
        $data['qr_asesi'] = $asesi->nama_lengkap . " - " . $asesi->no_uji_kompetensi . "\r\n\n\n" . $data['aplikasi']->url_aplikasi . "/qrcode/asesi/" . $id;
        $this->load->model('pra_asesmen_model');
        $data['asesor_pra_asesmen'] = $this->pra_asesmen_model->asesor_pra_asesmen($asesi->pra_asesmen_checked);
        $data['ttd_asesor'] = $data['asesor_pra_asesmen']->users . " - " . $data['asesor_pra_asesmen']->no_reg . "\r\n\n\n" . $data['aplikasi']->url_aplikasi . "/qrcode/asesor/" . $asesi->pra_asesmen_checked;

        $data['ttd_asesor_uji'] = $data['nama_asesor'] . " - " . $data['no_reg_asesor'] . "\r\n\n\n" . $data['aplikasi']->url_aplikasi . "/qrcode/asesor_uji/" . $asesi->id_asesor;

        // var_dump($asesi->id); die();

        $view = $this->load->view('penilaian_asesi/cetak_apl', $data, true);
        if ($type == "pdf") {
            $this->load->library("htm12pdf");

            ini_set('memory_limit', '256M');
            $namefile = "data_apl_asesi-" . $asesi->nama_lengkap;
            $this->htm12pdf->pdf_create($view, strtoupper($namefile) . ".pdf", false, true);
        }
    }

    function cetak_muk($id , $type = "pdf") {

        // error_reporting(E_ALL);
        // ini_set('display_errors', TRUE);
        // ini_set('display_startup_errors', TRUE);

        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $checklist = '<span style="font-family:zapfdingbats;">3</span>';
        $data['checklist'] = $checklist;

        $this->load->model('asesi_model');
        $this->load->model('real_asesmen_model');
        $asesi = $this->real_asesmen_model->data_asesi($id);

        $data['mak01'] = unserialize($asesi->mak01);
        $data['mak02'] = unserialize($asesi->mak02);
        $data['mak02a'] = unserialize($asesi->mak02a);
        $data['mak03'] = unserialize($asesi->mak03);
        $data['mak04'] = unserialize($asesi->mak04);
        $data['mak04a'] = unserialize($asesi->mak04a);
        $data['mak05'] = unserialize($asesi->mak05);
        $data['mak05a'] = unserialize($asesi->mak05a);
        $data['mak06'] = unserialize($asesi->mak06);
        $data['mak06a'] = unserialize($asesi->mak06a);
        $data['mak06b'] = unserialize($asesi->mak06b);
        $data['mak07'] = unserialize($asesi->mak07);
        $data['ch_observasi'] = @unserialize($asesi->ch_observasi);
        $data['penilaian_perangkat'] = unserialize($asesi->penilaian_perangkat);
        $data['keputusan_mak02'] = unserialize($asesi->keputusan_mak02);


        // if ($asesi->no_uji_kompetensi == "") {
        //     echo json_encode(array('msgType' => 'error', 'msgValue' => 'Belum di jadwalkan. Edit terlebih dahulu !'));
        //     exit;
        // }

        $data['data_asesi'] = $asesi;
        $unit_kompetensi = $this->asesi_model->data_unit_kompetensi($asesi->skema_sertifikasi);
        $data['unit_kompetensi'] = $unit_kompetensi;
        $asesi_detail = $this->asesi_model->asesi_detail_muk($id);
        $data['asesi_detail'] = $asesi_detail;
        //Nama Asesor dan No reg
        $this->db->where('id', $asesi->id_asesor);
        $data_asesor = $this->db->get(kode_lsp() . 'users')->row();
        $data['nama_asesor'] = $data_asesor->users;
        $data['no_reg_asesor'] = $data_asesor->no_reg;
        $kode_unit = '';
        $unit = '';
        $elemen_kuk = "";
        $unit_mak = "";

        // var_dump($data['keputusan_mak02']); die();


        $this->load->model('asesi_model');
        $this->db->where('pegawai_id',$id);
        $this->db->where('jenis_user','1');
        $row = $this->db->get('t_users')->row();

        $files_asesi = $this->asesi_model->files_asesi_muk($row->id);
        $files_bukti = $this->asesi_model->files_asesi($row->id);

        $bukti_pendukung = "<ul style=''>";
        foreach($files_asesi as $value){
            $bukti_pendukung .= $value->nama_dokumen;
            $buktipendukung = str_replace(
                "<li>".$value->nama_dokumen."</li>",
                    "<ul>
                        <li>CV</li>
                        <li>Ijazah</li>
                        <li>Sertifikat</li>
                     </ul>",
                "<li>".$value->nama_dokumen."</li>");
        }
        $bukti_pendukung .= "</ul>";

        $data['files_asesi'] = $files_asesi;
        $data['files_bukti'] = $files_bukti;
        $data['bukti_pendukung'] = $bukti_pendukung;
        $data['buktipendukung'] = $buktipendukung;

        // var_dump($files_asesi); die();

        $this->load->model('bukti_pendukung_model');
        $bukti_tambahan = $this->bukti_pendukung_model->bukti_pendukung($asesi->id_users);
        $jenis_portofolio = array('0' => 'Foto','1' => 'KTP', '2' => 'Ijazah', '3' => 'SKD', '4' => 'CP', '5' => 'SK', '6' => 'SR'
                                ,'7'=>'JD'
                                ,'8'=>'DE'
                                ,'9'=>'WS'
                                ,'10'=>'PE'
                                ,'11'=>'L'
                                ,'12'=>'SE'
                                );
        //$buktiTambahan = array();
        foreach($bukti_tambahan as $value){
            if($value->jenis_portofolio != '1' && $value->jenis_portofolio != '2' && $value->jenis_portofolio != '0' )
            $buktiTambahan[] = $jenis_portofolio[$value->jenis_portofolio];

            if(count($buktiTambahan) > 0){
                $data['buktiTambahan'] = implode(',',$buktiTambahan);
            }else{
                $data['buktiTambahan'] = '';
            }
        }
        // if(count($buktiTambahan) > 0){
        //     $data['buktiTambahan'] = implode(',',$buktiTambahan);
        // }else{
        //     $data['buktiTambahan'] = '';
        // }
        //var_dump($data['buktiTambahan']);die();


        foreach ($unit_kompetensi as $key => $value) {
            $kode_unit .= ($key + 1) . '. ' . $value->id_unit_kompetensi . '<br/>';
            $unit .= '<label style="font-size:10px;">' . ($key + 1) . '. ' . $value->unit_kompetensi . '</label><br/>';
            $query_elemen = $this->asesi_model->elemen($value->id_unit_kompetensi);
            $detail_elemen = "";
            $metode_asesmen_uji = $asesi->metode_asesmen;
            if (count($query_elemen) > 0) {
                foreach ($query_elemen as $keys => $values) {
                    $query_kuk = $this->asesi_model->kuk($values->id);
                    $index_key = count($query_kuk) * ($key + 1) + ($keys + 1);
                    // var_dump(count($query_kuk)); die();

                    if (count($query_kuk) > 0) {
                        $detail_kuk = "";
                        foreach ($query_kuk as $k => $v) {
                            $detail_kuk .= '<tr>
                            <td style="width:45%;">' . ($k + 1) . '. ' . $v->kuk . '</td>
                            <td style="width:13%;text-align:center;">
                                '. (isset($metode_asesmen_uji) && $metode_asesmen_uji=='1'?'DPW':'') .'
                            </td>
                            <td style="width:13%;text-align:center;">
                                '. (isset($metode_asesmen_uji) && $metode_asesmen_uji=='1'?'DPT , DPL':'') .'
                            </td>
                            <td style="width:13%;text-align:center;">
                                '. (isset($metode_asesmen_uji) && $metode_asesmen_uji=='2'?'CLP':'') .'
                            </td>

                            <td style="width:5%;text-align:center;">
                                '. (isset($data['keputusan_mak02'][$k]) && $data['keputusan_mak02'][$k]=='y'?$checklist:'') .'
                            </td>
                            <td style="width:5%;text-align:center;">
                                '. (isset($data['keputusan_mak02'][$k]) && $data['keputusan_mak02'][$k]=='n'?$checklist:'') .'
                            </td>
                            <td style="width:5%;text-align:center;"></td>
                          </tr>';
                        }
                    } else {
                        $detail_kuk .= '<tr>
                            <td></td>
                            <td style="width:13%"></td>
                            <td style="width:13%"></td>
                            <td style="width:13%"></td>
                            <td style="width:5%"></td>
                            <td style="width:5%"></td>
                            <td style="width:5%"></td>
                          </tr>';
                    }

                    $detail_elemen .= '<tr>
                            <td style="width:45%;font-weight:bold;"> Elemen Kompetensi </td>
                            <td colspan="7" style="width:55%;">' . ($keys + 1) . '. ' . $values->elemen_kompetensi . '</td>
                          </tr>
                          <tr>
                            <td rowspan="2" style="width:45%;text-align:center;background-color:grey;font-weight:bold;"> Kriteria Unjuk Kerja </td>
                            <td colspan="3" style="width:40%;text-align:center;background-color:grey;font-weight:bold;">Jenis Bukti</td>
                            <td colspan="3" style="width:15%;text-align:center;background-color:grey;font-weight:bold;">Keputusan</td>

                          </tr>
                          <tr>

                            <td style="width:13%;text-align:center;text-align:center;background-color:grey;font-weight:bold;">Bukti Langsung</td>
                            <td style="width:13%;text-align:center;text-align:center;background-color:grey;font-weight:bold;">Bukti Tidak Langsung</td>
                            <td style="width:13%;text-align:center;background-color:grey;font-weight:bold;">Bukti Tambahan</td>
                            <td style="width:5%;text-align:center;background-color:grey;font-weight:bold;">K</td>
                            <td style="width:5%;text-align:center;background-color:grey;font-weight:bold;">BK</td>
                            <td style="width:5%;text-align:center;background-color:grey;font-weight:bold;">AL</td>
                          </tr>
                          ' . $detail_kuk;
                }
            } else {
                $detail_elemen .= '<tr>
                            <td style="width:45%;font-weight:bold;"> Elemen Kompetensi </td>
                            <td colspan="7" style="width:55%;"></td>
                          </tr>
                          <tr>
                            <td rowspan="2" style="width:45%;text-align:center;background-color:grey;font-weight:bold;"> Kriteria Unjuk Kerja </td>
                            <td colspan="3" style="width:40%;text-align:center;background-color:grey;font-weight:bold;">Jenis Bukti</td>
                            <td colspan="3" style="width:15%;text-align:center;background-color:grey;font-weight:bold;">Keputusan</td>

                          </tr>
                          <tr>

                            <td style="width:13%;text-align:center;text-align:center;background-color:grey;font-weight:bold;">Bukti Langsung</td>
                            <td style="width:13%;text-align:center;text-align:center;background-color:grey;font-weight:bold;">Bukti Tidak Langsung</td>
                            <td style="width:13%;text-align:center;background-color:grey;font-weight:bold;">Bukti Tambahan</td>
                            <td style="width:5%;text-align:center;background-color:grey;font-weight:bold;">K</td>
                            <td style="width:5%;text-align:center;background-color:grey;font-weight:bold;">BK</td>
                            <td style="width:5%;text-align:center;background-color:grey;font-weight:bold;">AL</td>
                          </tr>';
            }

            $elemen_kuk .= '<table style="width:100%;font-size:10px;border-collapse: collapse;" border="1" >
                          <tr>
                            <td style="width:45%;font-weight:bold;"> Kode Unit Kompetensi </td>
                            <td colspan="7" style="width:55%;">' . $value->id_unit_kompetensi . '</td>
                          </tr>
                          <tr>
                            <td style="width:45%;font-weight:bold;"> Unit Kompetensi </td>
                            <td colspan="7" style="width:55%;">' . $value->unit_kompetensi . '</td>
                          </tr>
                          ' . $detail_elemen . '
                        </table><br/>';

            $unit_mak .= '<tr>
                            <td colspan="2" style="width:45%">
                            ' . $value->unit_kompetensi . '
                            </td>
                            <td style="width:10%; text-align: center;">
                                '. (isset($data['mak06'][$key]) && $data['mak06'][$key]=='K'?''. $checklist .'':'') .'
                            </td>
                            <td style="width:10%; text-align: center;">
                                '. (isset($data['mak06'][$key]) && $data['mak06'][$key]=='BK'?''. $checklist .'':'') .'
                            </td>
                            <td style="width:35%">
                                '. (isset($mak06a[$key])?$mak06a[$key]:'-') .'
                            </td>
                          </tr>';
        }
        //'.//$detail_elemen.'
        $data['unit_mak'] = $unit_mak;
        $data['elemen_kuk'] = $elemen_kuk;
        foreach ($asesi_detail as $key => $value) {
            $jenis_bukti[] = $value->jenis_bukti;
        }

        $jenis_bukti = implode(',', array_unique($jenis_bukti));
        $data['jenis_bukti'] = $jenis_bukti;
        $data['kode_unit'] = $kode_unit;
        $data['unit'] = $unit;
        $data['qr_asesi'] = $asesi->nama_lengkap . " - " . $asesi->no_uji_kompetensi . "\r\n\n\n" . $data['aplikasi']->url_aplikasi . "/qrcode/asesi/" . $id;
        $this->load->model('pra_asesmen_model');
        $data['asesor_pra_asesmen'] = $this->pra_asesmen_model->asesor_pra_asesmen($asesi->pra_asesmen_checked);
        $data['ttd_asesor'] = $data['asesor_pra_asesmen']->users . " - " . $data['asesor_pra_asesmen']->no_reg . "\r\n\n\n" . $data['aplikasi']->url_aplikasi . "/qrcode/asesor/" . $asesi->pra_asesmen_checked;

        $data['ttd_asesor_uji'] = $data['nama_asesor'] . " - " . $data['no_reg_asesor'] . "\r\n\n\n" . $data['aplikasi']->url_aplikasi . "/qrcode/asesor_uji/" . $asesi->id_asesor;

        // var_dump($asesi->id); die();

        $view = $this->load->view('penilaian_asesi/cetak_muk', $data, true);
        if ($type == "pdf") {
            $this->load->library("htm12pdf");

            ini_set('memory_limit', '256M');
            $namefile = "data_muk_asesi-" . $asesi->nama_lengkap;
            $this->htm12pdf->pdf_create($view, strtoupper($namefile) . ".pdf", false, true);
        }
    }

  function search() {
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
          $this->load->model('asesi_model');
          $view = $this->load->view('penilaian_asesi/search', array(), TRUE);
          echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
      } else {
          block_access_method();
      }
  }

}
