<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jadwal_asesmen extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('jadwal_asesmen_model');
        $this->load->model('artikel_model');
    }

    function index() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->load->library('grid');
            $grid = $this->grid->set_properties(array('model' => 'jadwal_asesmen_model', 'controller' => 'jadwal_asesmen', 'options' => array('id' => 'jadwal_asesmen', 'pagination', 'rows_number')))->load_model()->set_grid();
            $view = $this->load->view('jadwal_asesmen/index', array('grid' => $grid), true);
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
            // if ($jenis_user == 3) {
            //     $asesi_id = $this->auth->get_user_data()->pegawai_id;
            //     $where['id_tuk ='] = $asesi_id;
            // }

            if(isset($_POST['jadual']) && !empty($_POST['jadual']))
            {
                $where['jadual like'] = '%' . $this->input->post('jadual') . '%';
            }

            if (isset($where))
                $params['_where'] = $where;
            $data['total'] = isset($where) ? $this->jadwal_asesmen_model->count_by($where) : $this->jadwal_asesmen_model->count_all();
            $this->jadwal_asesmen_model->limit($row, $offset);
            $order = $this->jadwal_asesmen_model->get_params('_order');
            //$rows = isset($where) ? $this->jadwal_asesmen_model->order_by($order)->get_many_by($where) : $this->jadwal_asesmen_model->order_by($order)->get_all();
            $rows = $this->jadwal_asesmen_model->set_params($params)->with(array('tuk',));
            $data['rows'] = $this->jadwal_asesmen_model->get_selected()->data_formatter($rows);
            echo json_encode($data);
        } else {
            block_access_method();
        }
    }

    function search() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->load->model('asesi_model');
            $view = $this->load->view('jadwal_asesmen/search', array(), TRUE);
            echo json_encode(array('msgType' => 'success', 'msgValue' => $view));

        } else {
            block_access_method();
        }
    }

    function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $kode_skema_terpilih = array_unique($this->input->post('kode_skema_terpilih'));
            $kode_asesor_terpilih = array_unique($this->input->post('kode_asesor_terpilih'));

            $tanggaluji = $this->input->post('tanggal');
            $thnuji = substr($tanggaluji, 6, 4);
            $jadual_asesmen = kode_lsp() . 'jadual_asesmen';
            $rows_jadwal_tahun = $this->db->query("select * 
                        from $jadual_asesmen
                        WHERE YEAR(tanggal)='$thnuji'")->result();
            $nourutjadwal = count($rows_jadwal_tahun) + 1;
            if(count($kode_asesor_terpilih) == 0){
                 echo json_encode(array('msgType' => 'error', 'msgValue' => 'Asesor tidak boleh kosong!'));
                 die();
            }

            if(count($kode_skema_terpilih) == 0){
                 echo json_encode(array('msgType' => 'error', 'msgValue' => 'Skema tidak boleh kosong!'));
                 die();
            }

            $data = $this->jadwal_asesmen_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->jadwal_asesmen_model->check_unique($data)) {
                    $id_tuk = $this->input->post('id_tuk');
                    $jenis_user = $this->auth->get_user_data()->jenis_user;

                    if ($jenis_user == 3) {
                        $data['id_tuk'] = $this->auth->get_user_data()->pegawai_id;
                    } else {
                        $data['id_tuk'] = $id_tuk;
                    }
                    $id_tuk = $this->input->post('id_tuk');
                    //$id_skema = $this->input->post('id_skema');
                    $tanggal = $this->input->post('tanggal');

                    //$data['jadual'] = $this->nama_jadwal($id_tuk, $id_skema, $tanggal);
                    //var_dump($data['jadual']);die();
                    if ($this->jadwal_asesmen_model->insert($data) !== false) {

                        $last_id = $this->db->insert_id();
                        
                            $array_update_jadwal = array('urutan_jadwal'=>$nourutjadwal);
                            $this->db->where("id",$last_id);
                            $this->db->update(kode_lsp().'jadual_asesmen',$array_update_jadwal);

                        foreach ($kode_skema_terpilih as $key => $value) {
                            $array_row_skema = array('id_jadwal'=>$last_id,'id_skema'=>$value);
                            $this->db->insert(kode_lsp().'mapping_skema',$array_row_skema);
                        }
                        foreach ($kode_asesor_terpilih as $keys => $values) {
                            $array_row_asesor = array('id_jadwal'=>$last_id,'id_asesor'=>$values,'jenis_asesmen'=>'3');
                            $this->db->insert(kode_lsp().'mapping_asesor',$array_row_asesor);
                        }

                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->jadwal_asesmen_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {

            $this->load->model('skema_model');
            // $skemaa = $this->skema_model->dropdown('id', 'skema');
            $this->load->library('combogrid');
            $tuk_grid = $this->combogrid->set_properties(array('model' => 'tuk_model', 'controller' => 'tuk', 'fields' => array('tuk', 'alamat'), 'options' => array('id' => 'id_tuk', 'pagination', 'rownumber', 'idField' => 'id', 'textField' => 'tuk', 'panelWidth' => 500)))->load_model()->set_grid();

            $skema_grid = $this->combogrid->set_properties(array('model' => 'skema_model', 'controller' => 'skema', 'fields' => array('skema'), 'options' => array('id' => 'id_skema', 'pagination', 'rownumber', 'idField' => 'id', 'textField' => 'skema', 'panelWidth' => 500,
                                'queryParams' => array('name' => 'easui'))))->load_model()->set_grid();

            $asesor_grid = $this->combogrid->set_properties(array('model' => 'asesor_model', 'controller' => 'asesor', 'fields' => array('users', 'no_reg'), 'options' => array('id' => 'id_asesor', 'pagination', 'rownumber', 'idField' => 'id', 'textField' => 'users', 'panelWidth' => 500)))->load_model()->set_grid();
            // var_dump($skemaa); die();
            // $perangkat_grid = $this->combogrid->set_properties(array('model' => 'perangkat_asesmen_model', 'controller' => 'perangkat_asesmen', 'fields' => array('no_perangkat', 'nama_perangkat'), 'options' => array('id' => 'id_perangkat', 'pagination', 'rownumber', 'idField' => 'id', 'textField' => 'nama_perangkat', 'panelWidth' => 500)))->load_model()->set_grid();
            echo json_encode(array('msgType' => 'success', 'msgValue' => $this->load->view('jadwal_asesmen/add', array('asesor_grid' => $asesor_grid,'skema_grid' => $skema_grid,'tuk_grid' => $tuk_grid, 'url' => base_url() . 'jadwal_asesmen/upload'), TRUE)));
        }
    }

    function edit($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          // var_dump($this->input->post('endtime')); die();

            $data = $this->jadwal_asesmen_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->jadwal_asesmen_model->check_unique($data, intval($id))) {

                    $id_tuk = $this->input->post('id_tuk');
                    $jenis_user = $this->auth->get_user_data()->jenis_user;

                    if ($jenis_user == 3) {
                        $data['id_tuk'] = $this->auth->get_user_data()->pegawai_id;
                    } else {
                        $data['id_tuk'] = $id_tuk;
                    }
//                    $id_tuk = $this->input->post('id_tuk');
//                    $id_skema = $this->input->post('id_skema');
//                    $tanggal = $this->input->post('tanggal');
//
//                    $data['jadual'] = $this->nama_jadwal($id_tuk, $id_skema, $tanggal);
//                    var_dump($data); die();

                    if ($this->jadwal_asesmen_model->update(intval($id), $data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->jadwal_asesmen_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $con_method = $this->jadwal_asesmen_model->get(intval($id));
            if (sizeof($con_method) == 1) {
                $this->load->model('skema_model');
                $skema = $this->skema_model->dropdown('id', 'skema');
                $this->load->library('combogrid');
                $tuk_grid = $this->combogrid->set_properties(array('model' => 'tuk_model', 'controller' => 'tuk', 'fields' => array('tuk', 'alamat'), 'options' => array('id' => 'id_tuk', 'pagination', 'rownumber', 'idField' => 'id', 'textField' => 'tuk', 'panelWidth' => 500)))->load_model()->set_grid();
                $perangkat_grid = $this->combogrid->set_properties(array('model' => 'perangkat_asesmen_model', 'controller' => 'perangkat_asesmen', 'fields' => array('no_perangkat', 'nama_perangkat'), 'options' => array('id' => 'id_perangkat', 'pagination', 'rownumber', 'idField' => 'id', 'textField' => 'nama_perangkat', 'panelWidth' => 500)))->load_model()->set_grid();

                $data = $this->jadwal_asesmen_model->get_single($con_method);
                $view = $this->load->view('jadwal_asesmen/edit', array('id_tuk' => $tuk_grid, 'perangkat_grid' => $perangkat_grid, 'skema' => $skema, 'data' => $data), TRUE);
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
            $roles = $this->jadwal_asesmen_model->get(intval($id));
            if (sizeof($roles) == 1) {
                if ($this->jadwal_asesmen_model->delete(intval($id))) {
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

    function combogrid($id = false) {
        $this->load->model('jadwal_asesmen_model');
        $row = intval($this->input->post('rows')) == 0 ? 20 : intval($this->input->post('rows'));
        $page = intval($this->input->post('page')) == 0 ? 1 : intval($this->input->post('page'));
        $offset = $row * ($page - 1);
        $data = array();
        $params = array('_return' => 'data');
        if (isset($_POST['q'])) {
            $where['jadual LIKE'] = "%" . $this->input->post('q') . "%";
        }
        if (isset($where))
            $params['_where'] = $where;
        $data['total'] = isset($where) ? $this->jadwal_asesmen_model->count_by($where) : $this->jadwal_asesmen_model->count_all();
        $this->jadwal_asesmen_model->limit($row, $offset);
        $order_criteria = "ASC";
        $_order_escape = TRUE;
        if ($id) {
            $order = "FIELD(id, " . intval($id) . ")";
            $order_criteria = "DESC";
            $_order_escape = FALSE;
        } else {
            $order = $this->jadwal_asesmen_model->get_params('_order');
        }
        $rows = isset($where) ? $this->jadwal_asesmen_model->order_by($order, $order_criteria, $_order_escape)->get_many_by($where) : $this->jadwal_asesmen_model->order_by($order, $order_criteria, $_order_escape)->get_all();
        $data['rows'] = $this->jadwal_asesmen_model->get_selected()->data_formatter($rows);
        //var_dump($data);
        echo json_encode($data);
    }

    function view($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }
        $con_method = $this->jadwal_asesmen_model->get(intval($id));
        if (sizeof($con_method) == 1) {
            $this->db->where('jadwal_id', $id);
            $detail_asesi = $this->db->get(kode_lsp() . 'asesi')->result_array();
            $data = $this->jadwal_asesmen_model->get_single($con_method);
//            var_dump($data); die();
            $view = $this->load->view('jadwal_asesmen/view', array(
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

    function cetak($kategori = 1, $id, $type = "pdf") {
        $data['konfigurasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $this->db->where('id', $id);
        $data['jadwal'] = $this->db->get(kode_lsp() . 'jadual_asesmen')->row();
        $data['tuk'] = $this->db->get_where(kode_lsp() . 'tuk',['id' => $data['jadwal']->id_tuk])->row();
//        var_dump($data['jadwal']->id_tuk); die();
        $data['daftar_hadir'] = $this->jadwal_asesmen_model->daftar_hadir($id);
        $data['daftar_hadir_asesor'] = $this->jadwal_asesmen_model->daftar_hadir_asesor($id);
//                var_dump($data['daftar_hadir_asesor']); die();
        if ($kategori == 1) {
            $view = $this->load->view('jadwal_asesmen/cetak_daftar_hadir', $data, true);
        } else if ($kategori == 2) {
            $view = $this->load->view('jadwal_asesmen/cetak_penerima_atk', $data, true);
        } else if ($kategori == 3) {
            $view = $this->load->view('jadwal_asesmen/cetak_penerima_konsumsi', $data, true);
        } else if ($kategori == 4) {
            $view = $this->load->view('jadwal_asesmen/cetak_penerima_bahanuji', $data, true);
        } else if ($kategori == 5) {
            $view = $this->load->view('jadwal_asesmen/cetak_daftar_hadir_asesor', $data, true);
        } else if ($kategori == 6) {
            $view = $this->load->view('jadwal_asesmen/cetak_penerima_konsumsi_asesor', $data, true);
        } else if ($kategori == 10) {
            $view = $this->load->view('jadwal_asesmen/cetak_biodata', $data, true);
            if ($type == "pdf") {
                $this->load->library("html3pdf");
                $this->html3pdf->pdf_create($view, "daftar_hadir" . date('YmdHis') . ".pdf", false, true);
            }
        } else if($kategori == 11){
            $view = $this->load->view('jadwal_asesmen/cetak_penerima_all', $data, true);
            if ($type == "pdf") {
                $this->load->library("html3pdf");
                $this->html3pdf->pdf_create($view, "daftar_hadir" . date('YmdHis') . ".pdf", false, true);
            }
        } else if ($kategori == 7) {
            $this->db->where('id', $id);
            $jadwal_panitia = $this->db->get(kode_lsp() . 'jadual_asesmen')->row();
            if ($jadwal_panitia->panitia != '') {
//                var_dump($jadwal_panitia->panitia); die();
                $data['daftar_hadir_panitia'] = explode(',', $jadwal_panitia->panitia);
            } else {
                $data['daftar_hadir_panitia'] = array();
            }
            $view = $this->load->view('jadwal_asesmen/cetak_daftar_hadir_panitia', $data, true);
        } else if ($kategori == 8) {
            $this->db->where('id', $id);
            $jadwal_panitia = $this->db->get(kode_lsp() . 'jadual_asesmen')->row();
            if ($jadwal_panitia->panitia != '') {
                $data['daftar_hadir_panitia'] = explode(',', $jadwal_panitia->panitia);
            } else {
                $data['daftar_hadir_panitia'] = array();
            }
            $view = $this->load->view('jadwal_asesmen/cetak_penerima_konsumsi_panitia', $data, true);
        } else if ($kategori == 9) {
            $this->db->where('id', $id);
            $jadwal_panitia = $this->db->get(kode_lsp() . 'jadual_asesmen')->row();
            if ($jadwal_panitia->panitia != '') {
                $data['daftar_hadir_panitia'] = explode(',', $jadwal_panitia->panitia);
            } else {
                $data['daftar_hadir_panitia'] = array();
            }
            $view = $this->load->view('jadwal_asesmen/cetak_all', $data, true);
        }

        if ($type == "pdf") {
            $this->load->library("htm12pdf");

            $this->htm12pdf->pdf_create($view, "daftar_hadir" . date('YmdHis') . ".pdf", false, true);
        }
    }

    function upload() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->jadwal_asesmen_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->jadwal_asesmen_model->check_unique($data)) {
                    if (isset($_FILES['fileToUpload']['tmp_name']) && !empty($_FILES['fileToUpload']['tmp_name'])) {
                        $data['file_jadual'] = str_replace(' ', '_', $_FILES['fileToUpload']['name']);
                        $config['upload_path'] = substr(__dir__, 0, strpos(__dir__, "application")) . 'assets/files/jadwal_asesmen/';
                        $config['allowed_types'] = 'bmp|jpg|png|gif|jpeg|pdf|doc|docx|xls|xlsx|rar|zip';
                        $config['max_size'] = '5120000000';

                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('fileToUpload')) {
                            echo json_encode(array('msgType' => 'error', 'msgValue' => $this->upload->display_errors()));
                            exit();
                        }
                    }
                    $id_tuk = $this->input->post('id_tuk');
                    $id_skema = $this->input->post('id_skema');
                    $tanggal = $this->input->post('tanggal');

                    //$data['jadual'] = $this->nama_jadwal($id_tuk,$id_skema,$tanggal);

                    if ($this->jadwal_asesmen_model->insert($data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", strip_tag($this->jadwal_asesmen_model->get_validation()))));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        }
    }

    function nama_jadwal($id_tuk, $id_skema, $tanggal) {
        $this->db->where('id', $id_tuk);
        $nama_tuk = $this->db->get(kode_lsp() . 'tuk')->row()->tuk;
        $this->db->where('id', $id_skema);
        $nama_skema = $this->db->get(kode_lsp() . 'skema')->row()->skema;
        return 'Uji Kompetensi ' . $nama_skema . ' di ' . $nama_tuk . ' tanggal ' . tgl_indo($tanggal);
    }

    function download($id = false) {
        if (!$id) {
            block_access_method();
        } else {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                $docs = $this->jadwal_asesmen_model->get(intval($id));
                if (sizeof($docs) == 1) {
                    $doc = $this->jadwal_asesmen_model->get_single($docs);

                    $val1 = $doc->tanggal . ' ' . $doc->download_time;
                    date_default_timezone_set('Asia/Jakarta');
                    $val2 = date('Y-m-d H:i:s');
                    $datetime1 = new DateTime($val1);
                    $datetime2 = new DateTime($val2);

                    if ($datetime1 < $datetime2) {
                        $files = substr(__dir__, 0, strpos(__dir__, "application")) . 'assets/files/jadwal_asesmen/' . $doc->file_jadual;
                        if (file_exists($files)) {
                            header('Cache-Control: public');
                            header('Content-Disposition: attachment; filename="' . $doc->file_jadual . '"');
                            readfile($files);
                            die();
                        } else {
                            echo json_encode(array('msgType' => 'error', 'msgValue' => 'File tidak dapat ditemukan'));
                        }
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Anda Belum diizinkan Mengakses File Ini'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan'));
                }
            }
        }
    }

    function detail($id = 0, $offset = 0) {
        $data['marquee'] = $this->artikel_model->marquee();

        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();

        $keyword = $this->input->get('keyword');
        if ($keyword == "") {
            $offset = $this->uri->segment(4);
            $jml = $this->db->get(kode_lsp() . 'jadual_asesmen');
            $data['jmldata'] = $jml->num_rows();
            //pengaturan pagination
            $config['enable_query_strings'] = true;
            $config['base_url'] = base_url() . 'jadwal_asesmen/detail/' . $id;
            $config['total_rows'] = $jml->num_rows();
            $config['per_page'] = 10;
            $config['first_page'] = 'Awal';
            $config['last_page'] = 'Akhir';
            $config['next_page'] = '&laquo;';
            $config['prev_page'] = '&raquo;';
            $config['uri_segment'] = 4;
            //inisialisasi config
            $this->pagination->initialize($config);
            //buat pagination
            $data['halaman'] = $this->pagination->create_links();
            $data['data'] = $this->jadwal_asesmen_model->get_all_jadwal($config['per_page'], $offset);
        } else {
            $offset = $this->uri->segment(3);
            $jml = $this->db->get(kode_lsp() . 'jadual_asesmen');
            $data['jmldata'] = $jml->num_rows();

            //pengaturan pagination
            $config['enable_query_strings'] = true;
            if (!empty($keyword)) {
                $config['suffix'] = "?keyword=" . $keyword;
            }

            $config['base_url'] = base_url() . 'jadwal_asesmen/detail/' . $id;
            $config['total_rows'] = $jml->num_rows();
            $config['per_page'] = 10;
            $config['first_page'] = 'Awal';
            $config['last_page'] = 'Akhir';
            $config['next_page'] = '&laquo;';
            $config['prev_page'] = '&raquo;';
            $config['uri_segment'] = 4;
            //inisialisasi config
            $this->pagination->initialize($config);
            //buat pagination
            $data['halaman'] = $this->pagination->create_links();
            $data['data'] = $this->jadwal_asesmen_model->get_all_jadwal($config['per_page'], $offset, $keyword);
        }
        $this->load->view('templates/bootstraps/header', $data);
        $this->load->view('jadwal_asesmen/vjadwal', $data);
        $this->load->view('templates/bootstraps/bottom');
    }

    function download_jadwal($id = "") {

    }

}
