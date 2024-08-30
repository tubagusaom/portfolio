<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Berita_acara extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('berita_acara_model');
    }

    function index() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->load->library('grid');
            $grid = $this->grid->set_properties(array('model' => 'berita_acara_model', 'controller' => 'berita_acara', 'options' => array('id' => 'berita_acara', 'pagination', 'rows_number')))->load_model()->set_grid();
            $view = $this->load->view('berita_acara/index', array('grid' => $grid), true);
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

            if (isset($_POST['id_jadwal']) && !empty($_POST['id_jadwal'])) {
                $where['id'] = $this->input->post('id_jadwal');
            }

            if (isset($where))
                $params['_where'] = $where;
            $data['total'] = isset($where) ? $this->berita_acara_model->count_by($where) : $this->berita_acara_model->count_all();
            $this->berita_acara_model->limit($row, $offset);
            $order = $this->berita_acara_model->get_params('_order');
            //$rows = isset($where) ? $this->berita_acara_model->order_by($order)->get_many_by($where) : $this->berita_acara_model->order_by($order)->get_all();
            $rows = $this->berita_acara_model->set_params($params)->with(array('skema','user'));
            $data['rows'] = $this->berita_acara_model->get_selected()->data_formatter($rows);
            echo json_encode($data);
        } else {
            block_access_method();
        }
    }

    function search() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->load->library('combogrid');
            $jadwal_grid = $this->combogrid->set_properties(array('model' => 'jadwal_asesmen_model', 'controller' => 'jadwal_asesmen', 'fields' => array('jadual', 'tanggal'), 'options' => array('id' => 'id_jadwal', 'pagination', 'rownumber', 'idField' => 'id', 'textField' => 'jadual', 'panelWidth' => 500)))->load_model()->set_grid();
            $view = $this->load->view('berita_acara/search', array('jadwal_grid' => $jadwal_grid
                , 'skema_grid' => $skema_grid), TRUE);
            echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
        } else {
            block_access_method();
        }
    }

    function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->berita_acara_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->berita_acara_model->check_unique($data)) {
                    if ($this->berita_acara_model->insert($data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->berita_acara_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $this->load->library('combogrid');

            echo json_encode(array('msgType' => 'success', 'msgValue' => $this->load->view('berita_acara/add', array(), TRUE)));
        }
    }

    function edit($id = false) {

        if (!$id) {
            data_not_found();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->berita_acara_model->set_validation()->validate();
            if ($this->berita_acara_model->update(intval($id), $data) !== false) {
                        $status_jadwal = $this->input->post('status_jadwal_hidden');
                        $status = $this->input->post('status_jadwal');
                        // $nomor_keputusan = $this->input->post('nomor_keputusan');
                        // $nomor_permohonan = $this->input->post('nomor_permohonan');
                        //var_dump($status);die();

                        if($status == '1'){
                            $terbitkan_sertifikat = $this->input->post('terbitkan_sertifikat');
                                foreach($terbitkan_sertifikat as $key=>$value){
                                    $no_registrasi =$this->berita_acara_model->no_registrasi($key);
                                    $no_sertifikat = $this->berita_acara_model->no_sertifikat($key);
                                    $dataa = array(
                                                   'terbitkan_sertifikat' => $value,
                                                   'tanggal_terbit' => date('Y-m-d'),
                                                   'tanggal_rcc' => date('Y-m-d', strtotime('+3 year')),
                                                   'no_registrasi' => $no_registrasi,
                                                   'no_sertifikat' => $no_sertifikat,

                                                   'tahun_penerbitan_sertifikat' => date('Y')
                                            );
                                    $this->db->where('id', $key);
                                    $this->db->update(kode_lsp().'asesi', $dataa);
                            }
                        }
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
        } else {
            $berita_acara = $this->berita_acara_model->get(intval($id));
            if (sizeof($berita_acara) == 1) {
                $this->load->library('combogrid');
                $users = $this->combogrid->set_properties(array('model'=>'User_Model', 'controller'=>'users', 'fields'=>array('nama_user','email'), 'options'=>array('id'=>'pra_asesmen_checked', 'pagination', 'rownumber', 'idField'=>'id', 'textField'=>'nama_user', 'panelWidth'=>400)))->load_model()->set_grid();


                //$this->db->where('rekomendasi_asesor','1');
                $this->db->where('jadwal_id',$id);
                $this->db->order_by('rekomendasi_asesor','DESC');
                $asesi_kompeten = $this->db->get(kode_lsp().'asesi')->result();

                $nomor_keputusan = $this->berita_acara_model->no_keputusan_surat($id);
                $nomor_permohonan = $this->berita_acara_model->no_permohonan_blanko($id);
                //var_dump($asesi_kompeten);

                $view = $this->load->view('berita_acara/edit', array(
                'data' => $this->berita_acara_model->get_single($berita_acara),
                'pra_asesmen_grid' => $users,
                'asesi_kompeten' => $asesi_kompeten,
                'nomor_keputusan' => $nomor_keputusan,
                'nomor_permohonan' => $nomor_permohonan,
                // 'asesi_kompeten' => $asesi_kompeten,
                'status_jadwal' => array('-','Sudah Selesai','Dibatalkan','Pending'), 'url' => base_url() . 'berita_acara/edit_upload/' . $id), TRUE);
                echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan !'));
            }
        }
    }

    function delete($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $roles = $this->berita_acara_model->get(intval($id));
            if (sizeof($roles) == 1) {
                if ($this->berita_acara_model->delete(intval($id))) {
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
        $this->load->model('berita_acara_model');
        $row = intval($this->input->post('rows')) == 0 ? 20 : intval($this->input->post('rows')) ;
        $page = intval($this->input->post('page'))== 0 ? 1 : intval($this->input->post('page'));
        $offset = $row * ($page - 1);
        $data = array();
        $params = array('_return'=>'data');
        if(isset($_POST['q']))
        {
            $where['jadual LIKE'] = "%" . $this->input->post('q') . "%";
        }
        if(isset($where)) $params['_where'] = $where;
        $data['total'] = isset($where) ? $this->berita_acara_model->count_by($where) : $this->berita_acara_model->count_all();
        $this->berita_acara_model->limit($row, $offset);
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
            $order = $this->berita_acara_model->get_params('_order');
        }
        $rows = isset($where) ? $this->berita_acara_model->order_by($order, $order_criteria, $_order_escape)->get_many_by($where) : $this->berita_acara_model->order_by($order, $order_criteria, $_order_escape)->get_all();
        $data['rows'] = $this->berita_acara_model->get_selected()->data_formatter($rows);
        //var_dump($data);
        echo json_encode($data);
    }
    function view($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }
        $con_method = $this->berita_acara_model->get(intval($id));
        if (sizeof($con_method) == 1) {
            $this->db->where('jadwal_id',$id);
            $detail_asesi = $this->db->get('lsp029_asesi')->result_array();

            //$this->load->model('angkatan_model');
            //$this->load->model('program_model');
            //$angkatan = $this->angkatan_model->dropdown('id', 'batch_name');
            //$program = $this->program_model->dropdown('id', 'program_study');

            $data = $this->berita_acara_model->get_single($con_method);
            $view = $this->load->view('berita_acara/view', array(
                'peserta' => $detail_asesi,
                //'angkatan' => $angkatan,
                'data' => $data,
                //'url' => base_url() . 'siswa/edit_upload/' . $id
                ), TRUE);
            echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
        } else {
            echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan !'));
        }
    }
    // function cetak($id,$type = "pdf") {
    //     $this->db->where('jadwal_id',$id);
    //     $asesi_kompeten = $this->db->get(kode_lsp().'asesi')->result();
    //
    //     $data['asesi_kompeten'] = $asesi_kompeten;
    //     $view = $this->load->view('berita_acara/cetak_ba',$data , true);
    //     if($type=="pdf") {
    //         $this->load->library("htm12pdf");
    //         $this->htm12pdf->pdf_create($view, "berita_acara" . date('YmdHis') . ".pdf", false, true);
    //     }
    // }
     function edit_upload($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->berita_acara_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->berita_acara_model->check_unique($data, intval($id))) {
                    if (isset($_FILES['fileToUpload']['tmp_name']) && !empty($_FILES['fileToUpload']['tmp_name'])) {
                        $siswa = $this->berita_acara_model->get(intval($id));
                        $data['dokumen_berita_acara'] = $siswa->id . '_' . str_replace(' ', '_', $_FILES['fileToUpload']['name']);
                        $config['upload_path'] = substr(__dir__, 0, strpos(__dir__, "application")) . 'assets/files/berita_acara/';
                        $config['allowed_types'] = '*';
                        $config['file_name'] = $data['dokumen_berita_acara'];
                        $config['max_size'] = '512000';

                        $this->load->library('upload', $config);

                        if ($this->upload->do_upload('fileToUpload')) {
                            $current_file = substr(__dir__, 0, strpos(__dir__, "application")) . 'assets/files/berita_acara/' . $siswa->dokumen_berita_acara;
                            if (is_file($current_file)) {
                                unlink($current_file);
                            }
                        } else {
                            echo json_encode(array('msgType' => 'error', 'msgValue' => strip_tags($this->upload->display_errors())));
                            exit();
                        }
                    }else{
                        $data['dokumen_berita_acara'] = $this->input->post('dokumen_berita_acara');
                    }
                    if ($this->berita_acara_model->update(intval($id), $data) !== false) {
                        $status_jadwal = $this->input->post('status_jadwal_hidden');
                        if($status_jadwal == '0'){
                            $terbitkan_sertifikat = $this->input->post('terbitkan_sertifikat');
                                foreach($terbitkan_sertifikat as $key=>$value){
                                    $no_registrasi =$this->berita_acara_model->no_registrasi($key);
                                    $no_sertifikat = $this->berita_acara_model->no_sertifikat($key);
                                    $dataa = array(
                                                   'terbitkan_sertifikat' => $value,
                                                   'tanggal_terbit' => date('Y-m-d'),
                                                   'tanggal_rcc' => date('Y-m-d', strtotime('+3 year')),
                                                   'no_registrasi' => $no_registrasi,
                                                   'no_sertifikat' => $no_sertifikat,
                                                   'no_urut_sertifikat' => substr($no_sertifikat,13),
                                                   'tahun_penerbitan_sertifikat' => date('Y')
                                            );
                                    $this->db->where('id', $key);
                                    $this->db->update(kode_lsp().'asesi', $dataa);
                            }
                        }
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->berita_acara_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        }
    }
    function download($id = false)
    {
        if(!$id)
        {
            block_access_method();
        }
        else
        {
            if($_SERVER['REQUEST_METHOD'] == "GET")
            {
                $docs = $this->berita_acara_model->get(intval($id));
                if(sizeof($docs) == 1)
                {
                    $doc = $this->berita_acara_model->get_single($docs);
                    $files = substr(__dir__,0, strpos( __dir__,"application")) . '/assets/files/berita_acara/' . $doc->dokumen_berita_acara;
                    if(file_exists($files))
                    {
                        header('Cache-Control: public');
                         header('Content-Disposition: attachment; filename="' . $doc->dokumen_berita_acara . '"');
                         readfile($files);
                         die();
                    }
                    else
                    {
                        echo json_encode(array('msgType'=>'error', 'msgValue'=>'File tidak dapat ditemukan'));
                    }
                }
                else
                {
                    echo json_encode(array('msgType'=>'error', 'msgValue'=>'Data tidak dapat ditemukan'));
                }
            }
        }
    }
    function  cetak_sertifikat($id,$type = "pdf") {

        // error_reporting(E_ALL);
        // ini_set('display_errors', TRUE);
        // ini_set('display_startup_errors', TRUE);

        ini_set('memory_limit', '51208M');
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $path = base_url();
        } else if (strtoupper(substr(PHP_OS, 0, 3)) === 'DAR') {
            $path = base_url();
        } else {
            $path = '/var/www/_tera_byte/';
        }
        $data['path_image'] = $path;

        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $data['konfigurasi'] = $data['aplikasi'];
        $this->load->model('asesi_model');
        $this->load->model('sertifikat_model');
        $this->db->where('jadwal_id',$id);
        $this->db->where('terbitkan_sertifikat','on');
        $this->db->order_by('no_registrasi','ASC');
        $peserta = $this->db->get(kode_lsp().'asesi')->result();
        $data['peserta'] = $peserta;
        //var_dump($data['peserta']);die();
        foreach ($peserta as $key => $value) {
            $data['sertifikat'][$key] = $this->sertifikat_model->sertifikat($value->id);
            $data['unit'] = $this->asesi_model->data_unit_kompetensi($value->skema_sertifikasi);
        }
        //var_dump($peserta);die();
        //$this->load->view('berita_acara/cetak_sertifikat',$data);
        $this->load->model('jadwal_asesmen_model');
        $data['daftar_hadir'] = $this->jadwal_asesmen_model->daftar_hadir($id);

        $data['daftar_kompeten'] = $this->jadwal_asesmen_model->daftar_kompeten($id);
        $this->db->where('id',$id);
        $data['jadwal'] = $this->db->get(kode_lsp().'jadual_asesmen')->row();
        $data['skema'] = $this->jadwal_asesmen_model->daftar_hadir($id);
        $data['jumlah_peserta'] = count($data['daftar_hadir']);

        $data['kompeten'] = count($data['daftar_hadir']);
        // $data['kompeten'] = $this->jadwal_asesmen_model->kompeten($id);
        $view = $this->load->view('berita_acara/cetak_sertifikat',$data , true);

        if($type=="pdf") {
            $this->load->library("htm12pdf");
            $this->htm12pdf->pdf_create($view, "sertifikat" . date('YmdHis') . ".pdf", false, true);

        }
    }
    function pesan($pesan,$id,$hp){
        $admin = $this->db->get('r_konfigurasi_aplikasi')->row();
       // $pesan = 'Anda Mendapat Tugas untuk memeriksa Dokumen pra asesmen atas nama '.$nama_lengkap;

        $data['sender_id'] = 1;
        $data['reciepent_id'] = $id ;
        $data['title'] = 'Keputusan Pleno Asesmen' ;
        $data['message'] = $pesan ;

        $this->load->model('Pesan_Model');
        $this->Pesan_Model->insert($data);
       // smssend($hp,$pesan);


    }
    function pesan_email($pesan,$id,$hp){
        $admin = $this->db->get('r_konfigurasi_aplikasi')->row();
       // $pesan = 'Anda Mendapat Tugas untuk memeriksa Dokumen pra asesmen atas nama '.$nama_lengkap;

        $data['sender_id'] = 1;
        $data['reciepent_id'] = $id ;
        $data['title'] = 'Keputusan Pleno Asesmen' ;
        $data['message'] = $pesan ;

        $this->load->model('Pesan_Model');
        $this->Pesan_Model->insert($data);
        //smssend($hp,$pesan);


    }
    function detail($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }
        $this->load->model('asesi_model');
        $con_method = $this->asesi_model->get(intval($id));
        if (sizeof($con_method) == 1) {
            //$detail_asesi = $this->db->get()->row();

            //$this->load->model('angkatan_model');
            //$this->load->model('program_model');
            //$angkatan = $this->angkatan_model->dropdown('id', 'batch_name');
            //$program = $this->program_model->dropdown('id', 'program_study');

            $data = $this->asesi_model->get_single($con_method);

            if($data->jenis_kelamin == '1'){
                $nama_lengkap = '<b>Bapak/Sdr '.strtoupper($data->nama_lengkap).' ('.$data->no_uji_kompetensi.')</b>';
                $nama = '<b>Bapak/Sdr '.strtoupper($data->nama_lengkap).'</b>';
            }else{
                $nama_lengkap = '<b>Ibu/Sdri '.strtoupper($data->nama_lengkap).' ('.$data->no_uji_kompetensi.')</b>';;
                $nama = '<b>Bapak/Sdr '.strtoupper($data->nama_lengkap).'</b>';
            }
            if($data->rekomendasi_asesor == '1'){
                $rekomendasi = 'KOMPETEN';
            }else{
                $rekomendasi = 'BELUM KOMPETEN';
            }
            //var_dump($data);
            $this->db->where('id',$data->skema_sertifikasi);
            $data_skema = $this->db->get(kode_lsp().'skema')->row();
            $skema = $data_skema->skema;
            $this->db->where('id_skema',$data->skema_sertifikasi);
            $jumlah_unit = count($this->db->get(kode_lsp().'skema_detail')->result());
            $this->load->model('jadwal_asesmen_model');
            $unit_kompetensi = $this->jadwal_asesmen_model->unit_kompetensi('4');
            // var_dump($unit_kompetensi);
            $array_hasil_bk = unserialize('a:6:{i:3;s:2:"BK";i:5;s:2:"BK";i:6;s:2:"BK";i:7;s:2:"BK";i:8;s:2:"BK";i:9;s:2:"BK";}');
            //$array_hasil_bk = unserialize($value_bk->mak04);

            $view = $this->load->view('berita_acara/format_email_bk', array(
                'tanggal' => tgl_indo(date('Y-m-d')),
                'tanggal_uji' => tgl_indo(date('Y-m-d')),
                'nama_lengkap' => $nama_lengkap,
                'data' => $data,
                'nama' => $nama,
                'skema' => $skema,
                'jumlah_unit' => $jumlah_unit,
                'rekomendasi' => $rekomendasi,
                'src_ttd' => base_url().'uploads/src_ttd.jpg',
                'tanggal_uji' => 'Surabaya, '.tgl_indo(date('Y-m-d')),
                'tuk' => 'NAMA TUK',
                                                    'unit_kompetensi'=>$unit_kompetensi,
                                                    'array_hasil_bk'=>$array_hasil_bk
                //'url' => base_url() . 'siswa/edit_upload/' . $id
                ));
            //echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
        } else {
            echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan !'));
        }
    }

    function pengajuan_blanko($id){

      // error_reporting(E_ALL);
      // ini_set('display_errors', TRUE);
      // ini_set('display_startup_errors', TRUE);

      $this->load->library("PHPExcel/PHPExcel");
      $this->load->library("PHPExcel/PHPExcel/IOFactory");

      $data_jadwal  = $this->berita_acara_model->jadwal_asesmen($id);
      // $no_jadwal    = $this->berita_acara_model->no_jadwal($id);
      // var_dump($data_jadwal); die();

      $jadwal = kode_lsp().'jadual_asesmen';
      $asesi = kode_lsp().'asesi';
      $users = kode_lsp().'users';
      $tuk = kode_lsp().'tuk';
      $skema = kode_lsp().'skema';
      $pendidikan = 'master_pendidikan';
      $pekerjaan = 'master_pekerjaan';
      $sumber_anggaran = 'master_sumber_anggaran';
      $instansi_anggaran = 'master_instansi_anggaran';
      $provinsi = 'master_provinsi';
      $kabupaten = 'master_kabupaten';

      $data['default']=$this->db->query("SELECT
        a.id,
        a.kode_jadwal,
        b.nama_lengkap,
        b.no_identitas,
        b.tempat_lahir,
        b.tgl_lahir,
        b.jadwal_id,
        b.jenis_kelamin,
        CASE b.jenis_kelamin WHEN '1' THEN 'L' WHEN '2' THEN 'P' ELSE ' NULL' END as klamin,
        b.alamat,
        b.telp,
        b.email,
        b.id_pendidikan,
        b.id_pekerjaan,
        e.skema as nama_skema,
        e.kode_skema as skema,
        a.tanggal,
        d.no_cab,
        c.no_reg,
        b.id_provinsi,
        b.id_kabupaten,
        b.id_instansi_anggaran,
        b.id_sumber_anggaran,
        CASE b.rekomendasi_asesor WHEN '1' THEN 'K' WHEN '2' THEN 'BK' ELSE '-' END as rekomendasi_asesor

        FROM $jadwal a
        LEFT JOIN $asesi b ON b.jadwal_id=a.id
        LEFT JOIN $users c ON c.id=b.id_asesor
        LEFT JOIN $tuk d ON d.id=b.id_tuk
        LEFT JOIN $skema e ON e.id=b.skema_sertifikasi

        WHERE a.id = $id")->result_array();

        // var_dump($data['default']); die();
    if ($data_jadwal->status_jadwal != 1) {
      echo '
        <title>JADWAL BELUM SELESAI !</title>
        <div style="width: 100%">
          <h1 style="text-align: center; font-family: calibri; color: red">JADWAL BELUM SELESAI !</h1>
        </div>
      ';
      exit;
    }else{
      $excel = new PHPExcel();
      $excel->setActiveSheetIndex(0);
      $page = $excel->getActiveSheet();
      $page->setTitle("Blanko Sertifikasi");
      $header_style = array(
                          "borders" => array(
                              "allborders" => array(
                                  "style" => PHPExcel_Style_Border::BORDER_THIN
                              )
                          ),
                          "alignment" => array(
                              "horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                              "vertical" => PHPExcel_Style_Alignment::VERTICAL_CENTER
                          ),
                          "font" => array(
                              "bold" => true
                          ),
                          'fill' => array(
                              'type' => PHPExcel_Style_Fill::FILL_SOLID,
                              'color' => array('rgb' => '#5bc0de')
                          )
      );
      $body_style_huruf = array(
                              "borders" => array(
                                  "allborders" => array(
                                      "style" => PHPExcel_Style_Border::BORDER_THIN
                                      )
                                  ),
                                  "alignment" => array(
                                      "horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                                      "vertical" => PHPExcel_Style_Alignment::VERTICAL_CENTER
                                  )
      );
      $italic_center = array(
                          "borders" => array(
                              "allborders" => array(
                                  "style" => PHPExcel_Style_Border::BORDER_THIN
                          )
                              ),
                          "alignment" => array(
                              "horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                              "vertical" => PHPExcel_Style_Alignment::VERTICAL_CENTER
                          ),
                          "font" => array(
                              "italic" => true,
                              "bold" => false
                          )
      );
      $center = array(
                  "borders" => array(
                      "allborders" => array(
                          "style" => PHPExcel_Style_Border::BORDER_THIN
                      )
                  ),
                  "alignment" => array(
                      "horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                      "vertical" => PHPExcel_Style_Alignment::VERTICAL_CENTER
                  )
      );
      $bordered = array(
                      "borders" => array(
                          "allborders" => array(
                          "style" => PHPExcel_Style_Border::BORDER_THIN
                          )
                      )
      );
      $page->getColumnDimension("A")->setWidth(5);
      $page->getColumnDimension("B")->setWidth(30);
      $page->getColumnDimension("C")->setWidth(20);
      $page->getColumnDimension("D")->setWidth(20);
      $page->getColumnDimension("E")->setWidth(20);
      $page->getColumnDimension("F")->setWidth(20);
      $page->getColumnDimension("G")->setWidth(60);
      $page->getColumnDimension("H")->setWidth(20);
      $page->getColumnDimension("I")->setWidth(20);
      $page->getColumnDimension("J")->setWidth(20);
      $page->getColumnDimension("K")->setWidth(30);
      $page->getColumnDimension("L")->setWidth(20);
      $page->getColumnDimension("M")->setWidth(20);
      $page->getColumnDimension("N")->setWidth(30);
      $page->getColumnDimension("O")->setWidth(20);
      $page->getColumnDimension("P")->setWidth(20);
      $page->getColumnDimension("Q")->setWidth(30);
      $page->getColumnDimension("R")->setWidth(20);
      $page->getColumnDimension("S")->setWidth(10);
      $page->getColumnDimension("T")->setWidth(40);
      // $page->getColumnDimension("T")->setWidth(10);
      // $a="A";
      // $g="G";
      // $k="K";
      // $t="T";
      // for($i=0;$i<=19;$i++){
      //         $a++;
      //         $g++;
      //         $k++;
      //         $t++;
      //         $page->getColumnDimension("$a")->setWidth(20);;
      // }
      $page->setCellValue("A1","No");
      //$page->mergeCells("A1:A1");
      $a="A";
      $abc=array(
        "NAMA ASESI",
        "NIK",
        "TEMPAT LAHIR",
        "TANGGAL LAHIR",
        "JENIS KLAMIN",
        "TEMPAT TINGGAL",
        "KODE KOTA",
        "KODE PROVINSI",
        "TELP",
        "EMAIL",
        "KODE PENDIDIKAN",
        "KODE PEKERJAAN",
        "KODE JADWAL",
        "TANGGAL UJI",
        // "KODE TUK",
        "NO REG ASESOR",
        "KODE SUMBER ANGGARAN",
        "KODE KEMENTERIAN",
        "K/BK"
      );
      for($i=0;$i<=18;$i++){
          $a++;
          $page->setCellValue($a."1",$abc[$i]);
          $page->mergeCells($a."1:".$a."1");
      }
      $page->getStyle("A1:T1")->applyFromArray($header_style);
      $pos = 2;
      $no=0;
      for($i=0;$i<count($data['default']);$i++){
          $page->getStyle("A". ($i+2))->applyFromArray($center);
          $page->getStyle("C". ($i+2))->applyFromArray($center);
          $page->getStyle("E". ($i+2))->applyFromArray($center);
          $page->getStyle("F". ($i+2))->applyFromArray($center);
          $page->getStyle("H". ($i+2))->applyFromArray($center);
          $page->getStyle("I". ($i+2))->applyFromArray($center);
          $page->getStyle("J". ($i+2))->applyFromArray($center);
          $page->getStyle("L". ($i+2))->applyFromArray($center);
          $page->getStyle("M". ($i+2))->applyFromArray($center);
          $page->getStyle("N". ($i+2))->applyFromArray($center);
          $page->getStyle("O". ($i+2))->applyFromArray($center);
          $page->getStyle("P". ($i+2))->applyFromArray($center);
          $page->getStyle("Q". ($i+2))->applyFromArray($center);
          $page->getStyle("R". ($i+2))->applyFromArray($center);
          $page->getStyle("S". ($i+2))->applyFromArray($center);
          // $page->getStyle("T". ($i+2))->applyFromArray($center);
      $no++;
          $page->setCellValue("A".($i+2), $i + 1);
          $page->setCellValue("B".($i+2), $data['default'][$i]['nama_lengkap']);
          $page->setCellValueExplicit("C".($i+2), $data['default'][$i]['no_identitas'], PHPExcel_Cell_DataType::TYPE_STRING);
          $page->setCellValue("D".($i+2), $data['default'][$i]['tempat_lahir']);
          $page->setCellValue("E".($i+2), date('d/m/Y', strtotime($data['default'][$i]['tgl_lahir'])));
          $page->setCellValue("F".($i+2), $data['default'][$i]['klamin']);
          $page->setCellValue("G".($i+2), $data['default'][$i]['alamat']);
          $page->setCellValue("H".($i+2), $data['default'][$i]['id_kabupaten']);
          $page->setCellValue("I".($i+2), $data['default'][$i]['id_provinsi']);
          $page->setCellValueExplicit("J".($i+2), $data['default'][$i]['telp'], PHPExcel_Cell_DataType::TYPE_STRING);
          $page->setCellValue("K".($i+2), $data['default'][$i]['email']);
          $page->setCellValue("L".($i+2), $data['default'][$i]['id_pendidikan']);
          $page->setCellValue("M".($i+2), $data['default'][$i]['id_pekerjaan']);
          $page->setCellValue("N".($i+2), $data['default'][$i]['kode_jadwal']);
          $page->setCellValue("O".($i+2), date('d/m/Y', strtotime($data['default'][$i]['tanggal'])));
          // $page->setCellValue("P".($i+2), $data['default'][$i]['no_cab']);
          $page->setCellValue("P".($i+2), $data['default'][$i]['no_reg']);
          // $page->setCellValue("Q".($i+2), $data['default'][$i]['id_sumber_anggaran']);
          // $page->setCellValue("R".($i+2), $data['default'][$i]['id_instansi_anggaran']);
          $page->setCellValue("Q".($i+2), '4');
          $page->setCellValue("R".($i+2), '102');
          $page->setCellValue("S".($i+2), $data['default'][$i]['rekomendasi_asesor']);
          $page->setCellValue("T".($i+2), $data['default'][$i]['nama_skema']);
          $pos++;
      }
      $page->getStyle("A1:T".($pos-1))->applyFromArray($bordered);
      //$date_export = date('Y-m-d H:i:s');
      $objWriter = IOFactory::createWriter($excel, 'Excel5');
      $objWriter->save("assets/files/permohonan_blanko/permohonan_blanko_sertifikat_".$id.".xls");
      redirect ("assets/files/permohonan_blanko/permohonan_blanko_sertifikat_".$id.".xls");

    }
  }

  function cetak($id, $option = false, $type = "pdf") {

    // error_reporting(E_ALL);
    // ini_set('display_errors', TRUE);
    // ini_set('display_startup_errors', TRUE);

        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $data['pb'] = $this->berita_acara_model->get_by_id($id);
            //var_dump(json_decode($data['pb']->jadwal_id));die();
            $array_jadwal_id = json_decode($data['pb']->id);
                 $asesi_k=0;
                 $asesi_bk=0;
                 $value = $array_jadwal_id;
                 // foreach ($array_jadwal_id as $key => $value) {
                     $asesi_k += count($this->berita_acara_model->asesi_k($value));
                     $asesi_bk += count($this->berita_acara_model->asesi_bk($value));
                     $id_asesor[$value] = $this->berita_acara_model->get_id_asesor($value);
                     $data['skema_uji'][$value] = $this->berita_acara_model->get_skema($value);
                     //$data['tuk_uji'][$value] = $this->berita_acara_model->get_tuk($value);
                     $data['tanggal_uji'][] = $this->berita_acara_model->get_tanggal_uji($value);
                     $data['info_jadwal'][$value] = $this->berita_acara_model->info_jadwal($value);
                     $data['asesi_ba'][$value] = $this->berita_acara_model->get_asesi($value);
                     foreach ($id_asesor[$value] as $asesor){
                        $test[$value][] = $asesor->id_asesor;
                        $data['asesor_uji'][$value] = $this->berita_acara_model->get_asesor($test[$value]);
                     }
                 // }
        $data['asesi_k'] = $asesi_k;
        $data['asesi_bk'] = $asesi_bk;
        $data['array_jadwal'] = $array_jadwal_id;

        // var_dump($data['asesi_ba']); die();
    if ($data['pb']->status_jadwal != 1) {
        echo '
          <title>JADWAL BELUM SELESAI !</title>
          <div style="width: 100%">
            <h1 style="text-align: center; font-family: calibri; color: red">JADWAL BELUM SELESAI !</h1>
          </div>
        ';
      exit;
    }else {
    $view = $this->load->view('berita_acara/cetak_ba', $data, true);
    if ($type == "pdf" && $option == 'download') {
      //$this->load->library("htm12pdf");
      //$this->htm12pdf->pdf_create($view, "pb-" . $id . ".pdf", false, true);
      $this->pdf = new HTML2PDF('P','A4','en');
      $this->pdf->WriteHTML($view);
      $this->pdf->Output('/var/www/_tera_byte/assets/files/permohonan_blanko/'.'surat_beritaacara_'. implode('_', $array_jadwal_id).'.pdf','F');
      }else{
      $this->load->library("htm12pdf");
      $this->htm12pdf->pdf_create($view, "pb-" . $id . ".pdf", false, true);
      }
    }

  }

  function cetak_keputusan($id, $option = false, $type = "pdf") {

    // error_reporting(E_ALL);
    // ini_set('display_errors', TRUE);
    // ini_set('display_startup_errors', TRUE);

    $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
    $data['pb'] = $this->berita_acara_model->get_by_id($id);
    // var_dump($data['pb']->id);die();

        $array_jadwal_id = json_decode($data['pb']->id);
             $asesi_k=0;
             $asesi_bk=0;
             $value = $array_jadwal_id;
             // foreach ($array_jadwal_id as $key => $value) {
                 $asesi_k += count($this->berita_acara_model->asesi_k($value));
                 $asesi_bk += count($this->berita_acara_model->asesi_bk($value));
                 $id_asesor[$value] = $this->berita_acara_model->get_id_asesor($value);
                 $data['skema_uji'][$value] = $this->berita_acara_model->get_skema($value);
                 //$data['tuk_uji'][$value] = $this->berita_acara_model->get_tuk($value);
                 $data['tanggal_uji'] = $this->berita_acara_model->get_tanggal_uji($value);
                 $data['info_jadwal'][$value] = $this->berita_acara_model->info_jadwal($value);
                 $data['asesi_ba'][$value] = $this->berita_acara_model->get_asesi($value);
                 foreach ($id_asesor[$value] as $asesor){
                    $test[$value][] = $asesor->id_asesor;
                    $data['asesor_uji'][$value] = $this->berita_acara_model->get_asesor($test[$value]);
                 }
                 // $data['asesor_uji'][$array_jadwal_id] = $this->berita_acara_model->get_asesor($id_asesor[$array_jadwal_id]->id_asesor);
             // }
    $data['asesi_k'] = $asesi_k;
    $data['asesi_bk'] = $asesi_bk;
    $data['array_jadwal'] = $array_jadwal_id;

    // var_dump($data['asesor_uji']); die();

    if ($data['pb']->status_jadwal != 1) {
      echo '
        <title>JADWAL BELUM SELESAI !</title>
        <div style="width: 100%">
          <h1 style="text-align: center; font-family: calibri; color: red">JADWAL BELUM SELESAI !</h1>
        </div>
      ';
      exit;
    }else {

      $view = $this->load->view('berita_acara/cetak_keputusan', $data, true);
      if ($type == "pdf" && $option == 'download') {
          //$this->load->library("htm12pdf");
          //$this->htm12pdf->pdf_create($view, "pb-" . $id . ".pdf", false, true);
          $this->pdf = new HTML2PDF('P','A4','en');
          $this->pdf->WriteHTML($view);
          $this->pdf->Output('/var/www/_tera_byte/assets/files/permohonan_blanko/'.'surat_keputusan_'. implode('_', $array_jadwal_id).'.pdf','F');
      }else{
          $this->load->library("htm12pdf");
          $this->htm12pdf->pdf_create($view, "pb-" . $id . ".pdf", false, true);
      }

    }
  }

  function cetak_permohonan($id, $option = false, $type = "pdf") {
    // error_reporting(E_ALL);
    // ini_set('display_errors', TRUE);
    // ini_set('display_startup_errors', TRUE);

    $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
    $data['pb'] = $this->berita_acara_model->get_by_id($id);

    $array_jadwal_id = json_decode($data['pb']->id);
    $asesi_k=0;
    $asesi_bk=0;
    $value = $array_jadwal_id;
             // foreach ($array_jadwal_id as $key => $value) {
                 $asesi_k += count($this->berita_acara_model->asesi_k($value));
                 $asesi_bk += count($this->berita_acara_model->asesi_bk($value));
                 $skema_uji = $this->berita_acara_model->get_skema($value);
                 $tuk_uji = $this->berita_acara_model->get_tuk($value);
                 $sk_tuk_uji = $this->berita_acara_model->get_sk_tuk($value);
                 $tanggal_uji = $this->berita_acara_model->get_tanggal_uji($value);
                 $data['info_jadwal'] = $this->berita_acara_model->info_jadwal($value);
                 $data['asesi_ba'] = $this->berita_acara_model->get_asesi($value);
                 $data['asesor_uji'] = $this->berita_acara_model->get_asesor($value);
             // }
             //var_dump($data['info_jadwal']);die();
    //$data['info_jadwal'] = $this->berita_acara_model->info_jadwal($value);
    // $data['asesi_ba'] = $this->berita_acara_model->get_asesi($jadwal_id);
    // $id_asesor = $this->berita_acara_model->get_id_asesor($jadwal_id);
    $data['asesi_k'] = $asesi_k;
    $data['asesi_bk'] = $asesi_bk;
    $data['skema_uji'] = $skema_uji;
    $data['tuk_uji'] = $tuk_uji;
    $data['sk_tuk_uji'] = $sk_tuk_uji;
    $data['tanggal_uji'] = $tanggal_uji;
    $data['array_jadwal'] = $array_jadwal_id;

    if ($data['pb']->status_jadwal != 1) {
      echo '
        <title>JADWAL BELUM SELESAI !</title>
        <div style="width: 100%">
          <h1 style="text-align: center; font-family: calibri; color: red">JADWAL BELUM SELESAI !</h1>
        </div>
      ';
      exit;
    }else {

      $view = $this->load->view('berita_acara/cetak_permohonan', $data, true);
      if ($type == "pdf" && $option == 'download') {
          //$this->load->library("htm12pdf");
          //$this->htm12pdf->pdf_create($view, "pb-" . $id . ".pdf", false, true);
          $this->pdf = new HTML2PDF('P','A4','en');
          $this->pdf->WriteHTML($view);
          $this->pdf->Output('/var/www/_tera_byte/assets/files/permohonan_blanko/'.'surat_permohonan_'. implode('_', $array_jadwal_id).'.pdf','F');
      }else{
          $this->load->library("htm12pdf");
          $this->htm12pdf->pdf_create($view, "pb-" . $id . ".pdf", false, true);
      }

    }
  }


  function unduh_user($id){

      // error_reporting(E_ALL);
      // ini_set('display_errors', TRUE);
      // ini_set('display_startup_errors', TRUE);

      $this->load->library("PHPExcel/PHPExcel");
      $this->load->library("PHPExcel/PHPExcel/IOFactory");

      $data_jadwal  = $this->berita_acara_model->jadwal_asesmen($id);
      // $no_jadwal    = $this->berita_acara_model->no_jadwal($id);
      // var_dump($data_jadwal); die();

      $jadwal = kode_lsp().'jadual_asesmen';
      $asesi = kode_lsp().'asesi';
      $users = kode_lsp().'users';
      $tuk = kode_lsp().'tuk';
      $skema = kode_lsp().'skema';
      $user = 't_users';

      $data['default']=$this->db->query("SELECT
        a.id,
        a.jadual,
        b.id_users,
        a.kode_jadwal,
        b.id_users,
        b.nama_lengkap,
        b.no_identitas,
        b.tempat_lahir,
        b.tgl_lahir,
        b.jadwal_id,
        b.jenis_kelamin,
        CASE b.jenis_kelamin WHEN '1' THEN 'L' WHEN '2' THEN 'P' ELSE ' NULL' END as klamin,
        b.alamat,
        b.telp,
        b.email,
        e.skema as skema,
        f.akun as akun,
        a.tanggal

        FROM $jadwal a
        LEFT JOIN $asesi b ON b.jadwal_id=a.id
        LEFT JOIN $users c ON c.id=b.id_asesor
        LEFT JOIN $tuk d ON d.id=b.id_tuk
        LEFT JOIN $skema e ON e.id=b.skema_sertifikasi
        LEFT JOIN $user f ON f.id=b.id_users

        WHERE a.id = $id")->result_array();

        // var_dump($data['default']); die();
    // if ($data_jadwal->status_jadwal != 1) {
    //   echo '
    //     <title>JADWAL BELUM SELESAI !</title>
    //     <div style="width: 100%">
    //       <h1 style="text-align: center; font-family: calibri; color: red">JADWAL BELUM SELESAI !</h1>
    //     </div>
    //   ';
    //   exit;
    // }else {
      $excel = new PHPExcel();
      $excel->setActiveSheetIndex(0);
      $page = $excel->getActiveSheet();
      $page->setTitle("User Asesi");
      $header_style = array(
                          "borders" => array(
                              "allborders" => array(
                                  "style" => PHPExcel_Style_Border::BORDER_THIN
                              )
                          ),
                          "alignment" => array(
                              "horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                              "vertical" => PHPExcel_Style_Alignment::VERTICAL_CENTER
                          ),
                          "font" => array(
                              "bold" => true
                          ),
                          'fill' => array(
                              'type' => PHPExcel_Style_Fill::FILL_SOLID,
                              'color' => array('rgb' => '#5bc0de')
                          )
      );
      $body_style_huruf = array(
                              "borders" => array(
                                  "allborders" => array(
                                      "style" => PHPExcel_Style_Border::BORDER_THIN
                                      )
                                  ),
                                  "alignment" => array(
                                      "horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                                      "vertical" => PHPExcel_Style_Alignment::VERTICAL_CENTER
                                  )
      );
      $italic_center = array(
                          "borders" => array(
                              "allborders" => array(
                                  "style" => PHPExcel_Style_Border::BORDER_THIN
                          )
                              ),
                          "alignment" => array(
                              "horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                              "vertical" => PHPExcel_Style_Alignment::VERTICAL_CENTER
                          ),
                          "font" => array(
                              "italic" => true,
                              "bold" => false
                          )
      );
      $center = array(
                  "borders" => array(
                      "allborders" => array(
                          "style" => PHPExcel_Style_Border::BORDER_THIN
                      )
                  ),
                  "alignment" => array(
                      "horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                      "vertical" => PHPExcel_Style_Alignment::VERTICAL_CENTER
                  )
      );
      $bordered = array(
                      "borders" => array(
                          "allborders" => array(
                          "style" => PHPExcel_Style_Border::BORDER_THIN
                          )
                      )
      );
      $page->getColumnDimension("A")->setWidth(5);
      $page->getColumnDimension("B")->setWidth(30);
      $page->getColumnDimension("C")->setWidth(20);
      $page->getColumnDimension("D")->setWidth(20);
      $page->getColumnDimension("E")->setWidth(20);
      $page->getColumnDimension("F")->setWidth(40);
      $page->getColumnDimension("G")->setWidth(50);
      $page->getColumnDimension("H")->setWidth(30);
      $page->getColumnDimension("I")->setWidth(20);
      // $page->getColumnDimension("T")->setWidth(10);
      // $a="A";
      // $g="G";
      // $k="K";
      // $t="T";
      // for($i=0;$i<=19;$i++){
      //         $a++;
      //         $g++;
      //         $k++;
      //         $t++;
      //         $page->getColumnDimension("$a")->setWidth(20);;
      // }
      $page->setCellValue("A1","No");
      //$page->mergeCells("A1:A1");
      $a="A";
      $abc=array(
        "NAMA ASESI",
        "NIK",
        "JENIS KLAMIN",
        "TELP",
        "EMAIL",
        "SKEMA",
        "USERNAME",
        "PASSWORD"
      );
      for($i=0;$i<=15;$i++){
          $a++;
          $page->setCellValue($a."1",$abc[$i]);
          $page->mergeCells($a."1:".$a."1");
      }
      $page->getStyle("A1:i1")->applyFromArray($header_style);
      $pos = 2;
      $no=0;
      for($i=0;$i<count($data['default']);$i++){
          $page->getStyle("A". ($i+2))->applyFromArray($center);
          $page->getStyle("C". ($i+2))->applyFromArray($center);
          $page->getStyle("D". ($i+2))->applyFromArray($center);
          $page->getStyle("E". ($i+2))->applyFromArray($center);
          $page->getStyle("H". ($i+2))->applyFromArray($center);
          $page->getStyle("I". ($i+2))->applyFromArray($center);
      $no++;
          $page->setCellValue("A".($i+2), $i + 1);
          $page->setCellValue("B".($i+2), $data['default'][$i]['nama_lengkap']);
          $page->setCellValueExplicit("C".($i+2), $data['default'][$i]['no_identitas'], PHPExcel_Cell_DataType::TYPE_STRING);
          $page->setCellValue("D".($i+2), $data['default'][$i]['klamin']);
          $page->setCellValueExplicit("E".($i+2), $data['default'][$i]['telp'], PHPExcel_Cell_DataType::TYPE_STRING);
          $page->setCellValue("F".($i+2), $data['default'][$i]['email']);
          $page->setCellValue("G".($i+2), $data['default'][$i]['skema']);
          $page->setCellValue("H".($i+2), $data['default'][$i]['akun']);
          $page->setCellValue("I".($i+2), '123456');
          $pos++;
      }
      $page->getStyle("A1:I".($pos-1))->applyFromArray($bordered);
      $date_export = date('Y-m-d_H-i-s');
      $objWriter = IOFactory::createWriter($excel, 'Excel5');
      $objWriter->save("assets/files/permohonan_blanko/user_".$id."_".$date_export.".xls");
      redirect ("assets/files/permohonan_blanko/user_".$id."_".$date_export.".xls");

    }
  // }


}
