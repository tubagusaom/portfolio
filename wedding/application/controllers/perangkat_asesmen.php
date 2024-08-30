<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perangkat_asesmen extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('perangkat_asesmen_model');
        //$this->load->model('t_pertanyaan');
        $this->load->model('artikel_model');
        // $this->load->model('User_Model');
        //$this->load->model('artikel_model');
        // $this->load->model('Sertifikasi_Model');
        //$this->load->library('pagination');
    }

    function index() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->load->library('grid');
            $grid = $this->grid->set_properties(array('model' => 'perangkat_asesmen_model', 'controller' => 'perangkat_asesmen', 'options' => array('id' => 'perangkat_asesmen', 'pagination', 'rows_number')))->load_model()->set_grid();
            $view = $this->load->view('perangkat_asesmen/index', array('grid' => $grid), true);
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
            $id_asesor = $this->auth->get_user_data()->pegawai_id;
            $id = $this->auth->get_user_data()->id;

            //var_dump($jenis_user);
            if($jenis_user == 2){
                $array_asesor = $this->perangkat_asesmen_model->get_id_asesor($id_asesor);

                $user_id = $this->auth->get_user_data()->id;
                $where[kode_lsp().'perangkat_asesmen.id IN ('.$array_asesor.') AND '.kode_lsp().'perangkat_asesmen.id !='] = '';
            }else if($jenis_user == 1){
                $data_perangkat = $this->perangkat_asesmen_model->get_id($id);

                $where[kode_lsp().'perangkat_asesmen.id'] = $data_perangkat->id_perangkat;
            }

            if(isset($_POST['nama_perangkat']) && !empty($_POST['nama_perangkat']))
            {
                $where['nama_perangkat like'] = '%' . $this->input->post('nama_perangkat') . '%';
            }


            if (isset($where))
                $params['_where'] = $where;
            $data['total'] = isset($where) ? $this->perangkat_asesmen_model->count_by($where) : $this->perangkat_asesmen_model->count_all();
            $this->perangkat_asesmen_model->limit($row, $offset);
            $order = $this->perangkat_asesmen_model->get_params('_order');
            //$rows = isset($where) ? $this->perangkat_asesmen_model->order_by($order)->get_many_by($where) : $this->perangkat_asesmen_model->order_by($order)->get_all();
            $rows = $this->perangkat_asesmen_model->set_params($params)->with(array('pembuat','skema'));
            $data['rows'] = $this->perangkat_asesmen_model->get_selected()->data_formatter($rows);
            echo json_encode($data);
        } else {
            block_access_method();
        }
    }

    function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->perangkat_asesmen_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->perangkat_asesmen_model->check_unique($data)) {
                    if ($this->perangkat_asesmen_model->insert($data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->perangkat_asesmen_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $this->load->model('skema_model');
            $skema = $this->skema_model->dropdown('id', 'skema');

            echo json_encode(array('msgType' => 'success', 'msgValue' => $this->load->view('perangkat_asesmen/add', array('skema_perangkat' => $skema), TRUE)));
        }
    }

    function edit($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->perangkat_asesmen_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->perangkat_asesmen_model->check_unique($data, intval($id))) {
                    $post_bukti = $this->input->post('bukti_pendukung');
                    $data['bukti_pendukung'] = str_replace('|', '"', $post_bukti);

                    if ($this->perangkat_asesmen_model->update(intval($id), $data) !== false) {
                        $sms = isset($_POST['kirim_notifikasi']) ? $this->input->post('kirim_notifikasi') : "";
                        $akses_login = isset($_POST['akses_login']) ? $this->input->post('akses_login') : "";

                        if ($akses_login != "") {
                            $nama_lengkap = $this->input->post('nama_lengkap');
                            $email = $this->input->post('email');
                            $hp = $this->input->post('telp');
                            $nama = str_replace(' ', '', strtolower($nama_lengkap));
                            if (strlen($nama) > 4) {
                                $datax['akun'] = substr($nama, 0, 4) . rand(1, 9999);
                            } else {
                                $datax['akun'] = $nama . rand(1, 9999);
                            }


                            $datax['email'] = $email;
                            $datax['hp'] = $hp;
                            $datax['nama_user'] = $nama_lengkap;
                            $datax['jenis_user'] = '1';
                            $datax['sandi'] = '123456';
                            $datax['sandi_asli'] = '123456';
                            $datax['aktif'] = '1';
                            $datax['pegawai_id'] = $id;

                            $this->load->model('User_Model');
                            $this->User_Model->insert($datax);
                            $user_id = $this->db->insert_id();

                            $datay['user_id'] = $user_id;
                            $datay['role_id'] = 17;
                            $this->load->model('User_Role_Model');
                            $this->User_Role_Model->insert($datay);

                            //if($jenis_user == '1'){
                            //$id_users = $this->db->insert_id();
                            $dataxy = array(
                                'id_users' => $user_id
                            );
                            $this->db->where('id', $id);
                            $this->db->update(kode_lsp() . 'perangkat_asesmen', $dataxy);

                            //}

                            $checked = $this->input->post('pra_asesmen_checked');
                            $this->sms($nama_lengkap, $checked, $user_id);
                        }

                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->perangkat_asesmen_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $perangkat_asesmen = $this->perangkat_asesmen_model->get(intval($id));
            if (sizeof($perangkat_asesmen) == 1) {
                $data_aplikasi = $this->db->get('r_konfigurasi_aplikasi')->row();
                $this->load->model('skema_model');
                $skema = $this->skema_model->dropdown('id', 'skema');

                $view = $this->load->view('perangkat_asesmen/edit', array('data_aplikasi' => $data_aplikasi, 'skema_perangkat' => $skema, 'data' => $this->perangkat_asesmen_model->get_single($perangkat_asesmen)), TRUE);
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
            $roles = $this->perangkat_asesmen_model->get(intval($id));
            if (sizeof($roles) == 1) {
                if ($this->perangkat_asesmen_model->delete(intval($id))) {
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

    function combogrid( $id = false) {
        $this->load->model('perangkat_asesmen_model');
        $row = intval($this->input->post('rows')) == 0 ? 20 : intval($this->input->post('rows'));
        $page = intval($this->input->post('page')) == 0 ? 1 : intval($this->input->post('page'));
        $offset = $row * ($page - 1);
        $data = array();
        $params = array('_return' => 'data');
        if (isset($_POST['q'])) {
            $where['nama_perangkat LIKE'] = "%" . $this->input->post('q') . "%";
        }


        if (isset($where))
            $params['_where'] = $where;
        $data['total'] = isset($where) ? $this->perangkat_asesmen_model->count_by($where) : $this->perangkat_asesmen_model->count_all();
        $this->perangkat_asesmen_model->limit($row, $offset);
        $order_criteria = "ASC";
        $_order_escape = TRUE;
        if ($id) {
            $order = "FIELD(id, " . intval($id) . ")";
            $order_criteria = "DESC";
            $_order_escape = FALSE;
        } else {
            $order = $this->perangkat_asesmen_model->get_params('_order');
        }
        $rows = isset($where) ? $this->perangkat_asesmen_model->order_by($order, $order_criteria, $_order_escape)->get_many_by($where) : $this->perangkat_asesmen_model->order_by($order, $order_criteria, $_order_escape)->get_all();
        $data['rows'] = $this->perangkat_asesmen_model->get_selected()->data_formatter($rows);
        //var_dump($data);
        echo json_encode($data);
    }

    function cetak($id, $type = "pdf") {
        ini_set('memory_limit', '51208M');
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $perangkat_asesmen = $this->perangkat_asesmen_model->data_perangkat_asesmen($id);
        $data['data_perangkat_asesmen'] = $perangkat_asesmen;
        $unit_kompetensi = $this->perangkat_asesmen_model->data_unit_kompetensi($perangkat_asesmen->skema_sertifikasi);
        $data['unit_kompetensi'] = $unit_kompetensi;
        $perangkat_asesmen_detail = $this->perangkat_asesmen_model->perangkat_asesmen_detail($id);
        $data['perangkat_asesmen_detail'] = $perangkat_asesmen_detail;

        $kode_unit = '';
        $unit = '';
        $elemen_kuk = "";
        $unit_mak = "";
        //var_dump($unit_kompetensi);die();
        foreach ($unit_kompetensi as $key => $value) {
            $kode_unit .= ($key + 1) . '. ' . $value->id_unit_kompetensi . '<br/>';
            $unit .= ($key + 1) . '. ' . $value->unit_kompetensi . '<br/>';
            $query_elemen = $this->perangkat_asesmen_model->elemen($value->id_unit_kompetensi);
            $detail_elemen = "";
            if (count($query_elemen) > 0) {
                foreach ($query_elemen as $keys => $values) {
                    $query_kuk = $this->perangkat_asesmen_model->kuk($values->id);
                    if (count($query_kuk) > 0) {
                        $detail_kuk = "";
                        foreach ($query_kuk as $k => $v) {
                            $detail_kuk .= '<tr>
                            <td style="width:45%;">' . ($k + 1) . '. ' . $v->kuk . '</td>
                            <td style="width:13%;"></td>
                            <td style="width:13%;"></td>
                            <td style="width:13%;"></td>
                            <td style="width:5%;"></td>
                            <td style="width:5%;"></td>
                            <td style="width:5%;"></td>
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
            <td style="width:10%">  </td>
            <td style="width:10%">  </td>
            <td style="width:35%">  </td>
            </tr>';
        }
        //'.//$detail_elemen.'
        $data['unit_mak'] = $unit_mak;
        $data['elemen_kuk'] = $elemen_kuk;
        foreach ($perangkat_asesmen_detail as $key => $value) {
            $jenis_bukti[] = $value->jenis_bukti;
        }
        $bukti = unserialize($perangkat_asesmen->bukti_pendukung);
        $jenis_bukti = implode(',', $bukti);
        $data['jenis_bukti'] = $jenis_bukti;
        $data['kode_unit'] = $kode_unit;
        $data['unit'] = $unit;
        $data['msg'] = $perangkat_asesmen->nama_lengkap . "\r\n\n\n" . $data['aplikasi']->url_aplikasi . "/qrcode/perangkat_asesmen/" . $id;

        $view = $this->load->view('perangkat_asesmen/cetak_perangkat_asesmen', $data, true);
        if ($type == "pdf") {
            $this->load->library("htm12pdf");
            $this->htm12pdf->pdf_create($view, "data_perangkat_asesmen" . date('YmdHis') . ".pdf", false, true);
        }
    }

    function cetak_pencarian($par1 = "", $par2 = "", $par3 = "", $type = "pdf") {
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $this->db->select('a.*,b.skema');
        $this->db->from(kode_lsp() . 'perangkat_asesmen a');
        $this->db->join(kode_lsp() . 'skema b', 'a.skema_sertifikasi=b.id');
        if ($par1 != "" && $par1 != "nama_lengkap") {
            $this->db->like('nama_lengkap', $par1);
        }
        if ($par2 != "" && $par1 == "nama_lengkap") {
            $this->db->where('u_date_create BETWEEN "' . $par2 . '" and "' . $par3 . '"');
        }
        if ($par2 != "" && $par1 != "nama_lengkap") {
            $this->db->where('u_date_create BETWEEN "' . $par2 . '" and "' . $par3 . '"');
            $this->db->like('nama_lengkap', $par1);
        }
        $data['data_perangkat_asesmen'] = $this->db->get()->result();
        $view = $this->load->view('perangkat_asesmen/cetak_pencarian_perangkat_asesmen', $data, true);
        if ($type == "pdf") {
            $this->load->library("htm12pdf");
            $this->htm12pdf->pdf_create($view, "data_perangkat_asesmen" . date('YmdHis') . ".pdf", false, true, 'L');
        }
    }

    function search() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->load->model('perangkat_asesmen_model');
            $view = $this->load->view('perangkat_asesmen/search', array(), TRUE);
            echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
        } else {
            block_access_method();
        }
    }

    function sms($nama_lengkap, $checked, $users) {
        $pesan = 'Anda Mendapat Tugas untuk memeriksa Dokumen pra asesmen atas nama ' . $nama_lengkap;

        $this->db->where('id', $checked);
        $row = $this->db->get('t_users')->row();

        $data['sender_id'] = 1;
        $data['reciepent_id'] = $checked;
        $data['title'] = 'Tugas Check Pra Asesmen';
        $data['message'] = $pesan;

        $this->load->model('Pesan_Model');
        $this->Pesan_Model->insert($data);
        smssend($row->hp, $pesan);


        $this->db->where('id', $users);
        $row = $this->db->get('t_users')->row();
        $username = $row->akun;
        $password = $row->sandi_asli;
        //var_dump($password);die();
        $admin = $this->db->get('r_konfigurasi_aplikasi')->row();
        $pesan = 'Login ' . $admin->url_aplikasi . ' User:' . $username . ' Pass:' . $password;
        $data['sender_id'] = $this->auth->get_user_data()->id;
        $data['reciepent_id'] = $users;
        $data['title'] = 'Akses Login Aplikasi Sertifikasi Online';
        $data['message'] = $pesan;

        $this->load->model('Pesan_Model');
        $this->Pesan_Model->insert($data);
        $hasil = smssend($row->hp, $pesan);
    }

    function email() {
        $data = $this->db->get('r_konfigurasi_aplikasi')->row();
        $this->load->library('email');
        $this->email->from($data->alamat_email, 'Sekretariat ' . $data->singkatan_unit);
        $this->email->to('tubagus.aom.swk@gmail.com');

        $this->email->subject($data->singkatan_unit);
        $pesan = 'OKOK';

        $this->email->message($pesan);

        if ($this->email->send()) {
            echo 'ok';
        } else {
            echo 'nok';
        }
        //echo $this->email->print_debugger();
    }

    function upload() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = $this->perangkat_asesmen_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->perangkat_asesmen_model->check_unique($data)) {
                    if (isset($_FILES['fileToUpload']['tmp_name']) && !empty($_FILES['fileToUpload']['tmp_name'])) {
                        $data['file_perangkat'] = str_replace(' ', '_', $_FILES['fileToUpload']['name']);
                        $config['upload_path'] = substr(__dir__, 0, strpos(__dir__, "application")) . 'assets/files/perangkat_asesmen/';
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '512000000';

                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('fileToUpload')) {
                            echo json_encode(array('msgType' => 'error', 'msgValue' => $this->upload->display_errors()));
                            exit();
                        }
                    } else {
                        $data['file_perangkat'] = "";
                    }
                    $data['author'] = $this->auth->get_user_data()->id;
                    if ($this->perangkat_asesmen_model->insert($data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", strip_tag($this->perangkat_asesmen_model->get_validation()))));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        }
    }

    function upload_ajax() {
        $deskripsi = $this->input->post('deskripsi');
        $file = $_FILES['file'];

        $id_asesor = $this->auth->get_user_data()->pegawai_id;
        $id_perangkat_detail = $this->input->post('id_perangkat_detail');

        $data = array('deskripsi' => $deskripsi, 'Files' => $file);

        echo json_encode($data);
    }

    function download($id = false) {
        if (!$id) {
            block_access_method();
        } else {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                $docs = $this->perangkat_asesmen_model->get(intval($id));
                if (sizeof($docs) == 1) {
                    $doc = $this->perangkat_asesmen_model->get_single($docs);
                    $files = substr(__dir__, 0, strpos(__dir__, "application")) . 'assets/files/perangkat_asesmen/' . $doc->file_perangkat;
                    if (file_exists($files)) {
                        header('Cache-Control: public');
                        header('Content-Disposition: attachment; filename="' . $doc->file_perangkat . '"');
                        readfile($files);
                        //$this->db->query("UPDATE t_repositori SET jumlah_download=jumlah_download+1 WHERE id= $id");
                        //
                        //redirect(base_url());
                        die();
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'File tidak dapat ditemukan'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan'));
                }
            }
        }
    }

    function view($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }

        $con_method = $this->perangkat_asesmen_model->get(intval($id));
        if (sizeof($con_method) == 1) {
            $this->db->where('id_perangkat_asesmen', $id);
            $detail_perangkat = $this->db->get(kode_lsp() . 'perangkat_asesmen_detail')->result_array();

            //$this->load->model('angkatan_model');
            //$this->load->model('program_model');
            //$angkatan = $this->angkatan_model->dropdown('id', 'batch_name');
            //$program = $this->program_model->dropdown('id', 'program_study');

            $data = $this->perangkat_asesmen_model->get_single($con_method);
            $view = $this->load->view('perangkat_asesmen/view', array(
                'detail_perangkat' => $detail_perangkat,
                //'angkatan' => $angkatan,
                'data' => $data,
                    //'url' => base_url() . 'siswa/edit_upload/' . $id
            ), TRUE);
            echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
        } else {
            echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan !'));
        }
    }

    function detail($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }

        $this->load->model('perangkat_asesmen_detail_model');
        $con_method = $this->perangkat_asesmen_detail_model->get(intval($id));
        if (sizeof($con_method) == 1) {
            $data_user = $this->auth->get_user_data();

            $detail_perangkat = $this->perangkat_asesmen_model->detail_soal($id);

            $this->db->select('id_asesor,skema_sertifikasi');
            $this->db->where('id', $data_user->pegawai_id);
            $detail_asesi = $this->db->get(kode_lsp() . 'asesi')->row();
            //var_dump($detail_asesi);
            //$this->load->model('angkatan_model');
            //$this->load->model('program_model');
            //$angkatan = $this->angkatan_model->dropdown('id', 'batch_name');
            //$program = $this->program_model->dropdown('id', 'program_study');


            $jenis_user = $this->auth->get_user_data()->jenis_user;
            if ($jenis_user == 1) {
                $views = 'detail_asesi';
            } else {
                $views = 'detail';
            }
            //$views = 'detail_asesi';

            $data = $this->perangkat_asesmen_detail_model->get_single($con_method);
//var_dump($detail_perangkat);die();
            $peserta_uji = $this->perangkat_asesmen_model->peserta_uji($id, $data_user->pegawai_id);
//var_dump($peserta_uji);
//die();

            $this->load->view('perangkat_asesmen/' . $views, array(
                'detail_perangkat' => $detail_perangkat,
                'data_user' => $data_user,
                'peserta_uji' => $peserta_uji,
                'id' => $id,
                'jenis_soal' => array('', 'Uji Teori', 'Observasi', 'Tes Lisan', 'Wawancara', 'Studi Kasus'),
                'detail_asesi' => $detail_asesi,
                'data' => $data,
                    //'url' => base_url() . 'siswa/edit_upload/' . $id
            ));
        } else {
            $this->load->view('perangkat_asesmen/detail', array(), TRUE);
        }
    }

    function uji($id = false,$id_asesi=false) {
        if (!$id) {
            data_not_found();
            exit;
        }

        $this->load->model('perangkat_asesmen_detail_model');
        $con_method = $this->perangkat_asesmen_detail_model->get(intval($id));
        if (sizeof($con_method) == 1) {
            $data_user = $this->auth->get_user_data();

            $detail_perangkat = $this->perangkat_asesmen_model->detail_soal($id);
            //$perangkat = $this->perangkat_asesmen_detail_model->get(intval($id));
            //var_dump($perangkat);die();
            $this->db->select('id_asesor,skema_sertifikasi');
            $this->db->where('id', $data_user->pegawai_id);
            $detail_asesi = $this->db->get(kode_lsp() . 'asesi')->row();

            $jenis_user = $this->auth->get_user_data()->jenis_user;
            if ($jenis_user == 1) {
                $views = 'templates/responsive/uji/start_uji'; //detail_asesi
            } else {
                $views = 'perangkat_asesmen/detail';
            }

            $data = $this->perangkat_asesmen_detail_model->get_single($con_method);

            $peserta_uji = $this->perangkat_asesmen_model->peserta_uji($id, $data_user->pegawai_id);

//            $data['data'] = $this->artikel_model->detail(@$id);
//            $data['berita_lainnya'] = $this->artikel_model->berita_lainnya();
//            $data['marquee'] = $this->artikel_model->marquee();

            $this->load->view($views, array(
                'aplikasi' => $this->db->get('r_konfigurasi_aplikasi')->row(),
                'detail_perangkat' => $detail_perangkat,
                'data_user' => $data_user,
                'peserta_uji' => $peserta_uji,
                'id' => $id,
                'id_asesi'=>$id_asesi,
                'jenis_soal' => array('', 'Uji Teori', 'Observasi', 'Tes Lisan', 'Wawancara', 'Studi Kasus'),
                'detail_asesi' => $detail_asesi,
                'data' => $data,
                    //'url' => base_url() . 'siswa/edit_upload/' . $id
            ));
        } else {
            $this->load->view('perangkat_asesmen/detail', array(), TRUE);
        }
    }

    function view_uji($id = false,$id_asesi) {
        if (!$id) {
            data_not_found();
            exit;
        }
        $this->load->model('perangkat_asesmen_detail_model');
        $con_method = $this->perangkat_asesmen_detail_model->get(intval($id));
        if (sizeof($con_method) == 1) {

            $data['pertanyaan'] = $this->db->get('t_pertanyaan')->result();
            $data['detail_perangkat'] = $this->perangkat_asesmen_model->detail_soal($id);
            $data['data'] = $this->perangkat_asesmen_detail_model->get_single($con_method);
            $data_user = $this->auth->get_user_data();
            $this->db->where('id', $data_user->pegawai_id);
            $data['data_asesi'] = $this->db->get(kode_lsp() . 'asesi')->row();
            $data['id_asesi'] = $data_user->pegawai_id;
            //$this->load->view('templates/responsive/uji/view', $data);
            $this->load->view('templates/responsive/uji/view_uji', $data);
        } else {
            $this->load->view('perangkat_asesmen/detail', array(), TRUE);
        }
    }

    function proses_uji() {
        $this->load->helper('postinger');
        $post = $this->input->post();

        $jawab_benar = 0;
        $jawab_salah = 0;
        $data = array();
        foreach ($post['idsoal'] as $key => $idsoal) {
            $cek_soal = $this->db
            ->where('id', $idsoal)
            ->where('jawaban', $post['opsi_' . $key])
            ->get('t_pertanyaan')->num_rows();
            if ($cek_soal > 0) {
                $jawab_benar++;
            } else {
                $jawab_salah++;
            }

            $data[] = array('id_soal' => $idsoal, 'opsi_asesi' => $post['opsi_' . $key]);
        }

        $data_soal = serialize($data);

        $dt['jawaban_asesi'] = $data_soal;
        $dt['jawaban_benar'] = $jawab_benar;
        $dt['jawaban_salah'] = $jawab_salah;
        $dt['tanggal_posting'] = date('Y-m-d H:i:s');
        $dt['created_by'] = 0;
        $dt['created_when'] = date('Y-m-d H:i:s');

        $result = $this->db->insert('t_uji', $dt);
        if ($result) {
            echo json_encode(array('msgType' => true, 'msgValue' => 'Terima kasih sudah melakukan Uji !'));
        } else {
            echo json_encode(array('msgType' => false, 'mshValue' => 'Maaf data Uji anda gagal disimpan !'));
        }
    }

    function save() {
        // $this->load->helper('postinger');
        // $this->load->library('upload');

        $pilihan = $this->input->post('pilihan');
        $id_asesi = $this->input->post('id_asesi');
        $id_asesor = $this->input->post('id_asesor');
        $id_skema = $this->input->post('id_skema');
        $id_perangkat_detail = $this->input->post('id_perangkat_detail');
        $data = array();



        if( $pilihan == 'observasi'){

            // $targetPath = getcwd() . '/assets/files/jawaban/';

            $file_data = $this->input->post('file_data', true);
            // Nama Bukti Pendukung
            $nama_dokumen = $this->input->post('nama_dokumen', true);

            foreach ($nama_dokumen as $key => $value) {
              $array_bukti[$value] = $file_data[$key];
            }

            // var_dump(json_encode($array_bukti)); die();

            $data = array(
              'jawaban_observasi' => @serialize($array_bukti),
            );
            $this->db->where('id', $id_asesi);

            if ($this->db->update(kode_lsp() . 'asesi', $data)) {
                echo json_encode(array('msgType' => true, 'msgValue' => 'Upload Jawaban Sukses'));
            } else {
                echo json_encode(array('msgType' => false, 'msgValue' => 'Upload Jawaban Gagal'));
            }

            // for($i=0;$i<$countfiles;$i++){
            //     if(!empty($_FILES['files']['name'][$i])){
            //         // Define new $_FILES array - $_FILES['file']
            //           $_FILES['files']['name'] = $_FILES['files']['name'][$i];
            //           $_FILES['files']['type'] = $_FILES['files']['type'][$i];
            //           $_FILES['files']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            //           $_FILES['files']['error'] = $_FILES['files']['error'][$i];
            //           $_FILES['files']['size'] = $_FILES['files']['size'][$i];
            //
            //           // Set preference
            //           $config['upload_path'] = substr(__dir__, 0, strpos(__dir__, "application")) . '/assets/files/jawaban/';
            //           $config['allowed_types'] = '*';
            //           $config['max_size'] = '512000000';
            //           $config['file_name'] = $_FILES['files']['name'][$i];
            //
            //           //Load upload library
            //           // $this->load->library('upload',$config);
            //           $this->load->library('upload', $config);
            //           $this->upload->do_upload();
            //           $hasil = $this->upload->data();
            //
            //           // if (!$this->upload->do_upload('file')) {
            //           //     echo json_encode(array('msgType' => 'error', 'msgValue' => $this->upload->display_errors()));
            //           //     exit();
            //           // }
            //
            //     }
            // }

            // var_dump($hasil); die();


            // $data['file_jawaban'] = str_replace(' ', '_', $_FILES['file']['name']);
            // $config['upload_path'] = substr(__dir__, 0, strpos(__dir__, "application")) . '/assets/files/jawaban/';
            // $config['allowed_types'] = '*';
            // $config['max_size'] = '512000000';

            // $this->load->library('upload', $config);
            // $this->upload->do_upload();
            // $hasil = $this->upload->data();

            // if (!$this->upload->do_upload('file')) {
            //     echo json_encode(array('msgType' => 'error', 'msgValue' => $this->upload->display_errors()));
            //     exit();
            // }

            // var_dump($hasil); die();

        } else {

        $opsi = $this->input->post('opsi');
            //var_dump($id_asesi);die();
        if (isset($opsi)) {
            $jumlah_soal = count($opsi);
            $jawaban = $this->perangkat_asesmen_model->jawaban($id_perangkat_detail);

                    //var_dump($jawaban);die();
            $jawaban_benar = 0;
            foreach ($opsi as $key => $value) {
                //var_dump($jawaban[$key]['jawaban_benar']);
                //die();

                if ($value == $jawaban[$key]['jawaban_benar']) {
                    $jawaban_benar++;
                }
            }
            //var_dump($jawaban_benar);
                //die();
            $jawaban_salah = $jumlah_soal - $jawaban_benar;

            $array_opsi = serialize($opsi);
            $data_update = array(
                'id_asesi' => $id_asesi,
                'id_asesor' => $id_asesor,
                'id_skema' => $id_skema,
                'id_perangkat_detail' => $id_perangkat_detail,
                'jawaban_asesi' => $array_opsi,
                'jawaban_benar' => $jawaban_benar,
                'jawaban_salah' => $jawaban_salah
            );
        } else {
            $data_update = array(
                'id_asesi' => $id_asesi,
                'id_asesor' => $id_asesor,
                'id_skema' => $id_skema,
                'id_perangkat_detail' => $id_perangkat_detail,
            );
        }
                //$this->db->where('id',$id_asesi);
        if ($this->db->insert('t_uji', $data_update)) {
                    //echo"Upload Jawaban Sukses";
            echo json_encode(array('msgType' => true, 'msgValue' => 'Upload Jawaban Sukses'));
        } else {
            echo json_encode(array('msgType' => false, 'msgValue' => 'Upload Jawaban Gagal'));
        }

    }
}

function edit_upload($id = false) {
    if (!$id) {
        data_not_found();
        exit;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = $this->perangkat_asesmen_model->set_validation()->validate();
        if ($data !== false) {
            if ($this->perangkat_asesmen_model->check_unique($data, intval($id))) {
                if (isset($_FILES['fileToUpload']['tmp_name']) && !empty($_FILES['fileToUpload']['tmp_name'])) {
                    $schedule = $this->perangkat_asesmen_model->get(intval($id));
                    $data['file_perangkat'] = rand() . '_' . str_replace(' ', '_', $_FILES['fileToUpload']['name']);
                    $config['upload_path'] = substr(__dir__, 0, strpos(__dir__, "application")) . 'assets/files/perangkat_asesmen/';
                    $config['allowed_types'] = '*';
                    $config['file_name'] = $data['file_perangkat'];
                    $config['max_size'] = '0';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('fileToUpload')) {
                        $current_file = substr(__dir__, 0, strpos(__dir__, "application")) . 'assets/files/perangkat_asesmen/' . $schedule->file_perangkat;
                        if (is_file($current_file)) {
                            unlink($current_file);
                        }
                        $data_upload = $this->upload->data();
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => strip_tags($this->upload->display_errors())));
                        exit();
                    }
                } else {
                    $data['file_perangkat'] = $this->input->post('foto_hidden');
                }
                if ($this->perangkat_asesmen_model->update(intval($id), $data) !== false) {
                    echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->perangkat_asesmen_model->get_validation())));
            }
        } else {
            echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
        }
    }
}

function save_asesor() {
    $jawaban = $this->input->post('jawaban');
    $jawaban_benar = 0;
    $jawaban_salah = 0;
    foreach ($jawaban as $value) {
        $value == 'K' ? $jawaban_benar++ : $jawaban_salah++;
    }
        //var_dump($jawaban);die();
    $array_opsi = serialize($jawaban);

    $asesiarray = $this->input->post('asesiarray');
        // var_dump($asesiarray);
        //die();
    $selectrekomendasi = $this->input->post('selectrekomendasi');
    $id_asesor = $this->auth->get_user_data()->pegawai_id;
    $id_skema = $this->input->post('id_skema');
    $id_perangkat_detail = $this->input->post('id_perangkat_detail');
    foreach ($asesiarray as $key => $value) {
        $this->db->select('id_asesor,skema_sertifikasi');
        $this->db->where('id', $value);
        $detail_asesi = $this->db->get(kode_lsp() . 'asesi')->row();

        $data_update = array(
            'id_asesi' => $value,
            'id_asesor' => $id_asesor,
            'id_skema' => $detail_asesi->skema_sertifikasi,
            'id_perangkat_detail' => $id_perangkat_detail,
            'jawaban_asesi' => $array_opsi,
            'jawaban_benar' => $jawaban_benar,
            'jawaban_salah' => $jawaban_salah,
            'penilaian_asesor' => $selectrekomendasi
        );
        $this->db->insert('t_uji', $data_update);
    }
    echo "Penilaian Sukses. Silahkan tutup halaman ini";
}
function portofolio($id = false) {
    if (!$id) {
        data_not_found();
        exit;
    }

    $this->load->model('perangkat_asesmen_detail_model');
    $con_method = $this->perangkat_asesmen_detail_model->get(intval($id));
    if (sizeof($con_method) == 1) {
        $data_user = $this->auth->get_user_data();

        $detail_perangkat = $this->perangkat_asesmen_model->detail_soal($id);
        $perangkat = $this->perangkat_asesmen_model->get(intval($con_method->id_perangkat_asesmen));
        $kuk = $this->uji_kompetensi_skema($perangkat->skema_perangkat,$detail_perangkat);

        $this->db->select('id_asesor,skema_sertifikasi');
        $this->db->where('id', $data_user->pegawai_id);
        $detail_asesi = $this->db->get(kode_lsp() . 'asesi')->row();

            //var_dump($kuk);die();

        $jenis_user = $this->auth->get_user_data()->jenis_user;
        if ($jenis_user == 1) {
            $views = 'detail_portofolio_asesi';
        } else {
            $views = 'detail_portofolio';
        }

        $data = $this->perangkat_asesmen_detail_model->get_single($con_method);
        $peserta_uji = $this->perangkat_asesmen_model->peserta_uji($id, $data_user->pegawai_id);
        $this->load->view('perangkat_asesmen/' . $views, array(
            'detail_perangkat' => $detail_perangkat,
            'data_user' => $data_user,
            'peserta_uji' => $peserta_uji,
            'id' => $id,
            'jenis_soal' => array('', 'Uji Teori', 'Observasi', 'Tes Lisan', 'Wawancara', 'Studi Kasus','Cek Portofolio'),
            'data' => $data,
            'kuk' => $kuk,
        ));
    } else {
        $this->load->view('perangkat_asesmen/detail', array(), TRUE);
    }
}
function save_asesor_portofolio() {
    $valid = $this->input->post('valid');
    $asli = $this->input->post('asli');
    $terkini = $this->input->post('terkini');
    $is_kompeten = $this->input->post('is_kompeten');
    $list_bukti = $this->input->post('list_bukti');
    $jawaban = array(
        "valid"=>serialize($valid),
        "asli"=>serialize($asli),
        "terkini"=>serialize($terkini),
        "is_kompeten"=>serialize($is_kompeten),
        "list_bukti"=>serialize($list_bukti),

    );
    $jawaban = serialize($jawaban);
    $asesiarray = $this->input->post('asesiarray');
    $selectrekomendasi = $this->input->post('selectrekomendasi');
    $id_asesor = $this->auth->get_user_data()->pegawai_id;
        //$id_skema = $this->input->post('id_skema');
    $id_perangkat_detail = $this->input->post('id_perangkat_detail');
        //var_dump($asesiarray); die();
    foreach ($asesiarray as $key => $value) {
        $this->db->select('id_asesor,skema_sertifikasi');
        $this->db->where('id', $value);
        $detail_asesi = $this->db->get(kode_lsp() . 'asesi')->row();

        $data_update = array(
            'id_asesi' => $value,
            'id_asesor' => $id_asesor,
            'id_skema' => $detail_asesi->skema_sertifikasi,
            'id_perangkat_detail' => $id_perangkat_detail,
            'jawaban_asesi' => $jawaban,
            'jawaban_salah' => "",
            'penilaian_asesor' => $selectrekomendasi
        );
        $this->db->insert('t_uji', $data_update);
    }
    echo "Penilaian Sukses. Silahkan tutup halaman ini";
}
function uji_kompetensi_skema($id,$detail_perangkat) {
    $combo = '<select name="list_bukti[]">';
    foreach ($detail_perangkat as $key => $value) {
        $combo .= '<option value='.$key.'>'.($key + 1).'</option>';
    }
    $combo .= '</select>';

    $skema = kode_lsp() . 'skema';
    $skema_detail = kode_lsp() . 'skema_detail';
    $unit_kompetensi = kode_lsp() . 'unit_kompetensi';
    $elemen_kompetensi = kode_lsp() . 'elemen_kompetensi';
    $kuk = kode_lsp() . 'kuk';
    $asesi = kode_lsp() . 'asesi';
    $asesi_detail = kode_lsp() . 'asesi_detail';
        //$id = $this->input->post('id');

    $this->db->select("a.*,c.id_unit_kompetensi,c.unit_kompetensi,d.elemen_kompetensi,e.id_elemen_kompetensi,e.kuk", false);
    $this->db->from("$skema a");
    $this->db->join("$skema_detail b", "b.id_skema=a.id");
    $this->db->join("$unit_kompetensi c", "c.id=b.id_unit_kompetensi");
    $this->db->join("$elemen_kompetensi d", "d.id_unit_kompetensi=c.id");
    $this->db->join("$kuk e", "e.id_elemen_kompetensi=d.id");
    $this->db->where("a.id", $id);
    $d = $this->db->get()->result();
    $table = '<table  width="100%" class="table table-stripped table-bordered" border="1">
    <tr align="center" style="font-weight:bold;">
    <td  align="center"> No </td>
    <td> Kode Unit </td>
    <td> Judul Unit Kompetensi / Elemen Kompetensi / <br/> Kriteria Unjuk Kerja(KUK)</td>
    <td width="30px" align="center"> Y<br/>
    <input type="checkbox" id="all_k" name="all_k" />
    </td>
    <td width="30px" align="center"> N<br/>
    <input type="checkbox" id="all_bk" name="all_k" /> </td>
    <td> Bukti No </td>
    </tr>';
    $no = 1;
    $real_unit = "";
    $real_elemen = "";
    foreach ($d as $key => $value) {
        if ($real_unit == $value->id_unit_kompetensi) {
            if ($real_elemen != $value->id_elemen_kompetensi) {
                $table .= ' <tr style="font-weight:normal;">
                <td align="center"></td>
                <td></td>
                <td> <b>' . ltrim($value->elemen_kompetensi) . '</b> </td>
                <td> </td>
                <td> </td>
                <td>
                </td>
                </tr>';
                    //if($real_elemen == $value->id_elemen_kompetensi){
                $table .= ' <tr style="font-weight:normal;">
                <td align="center"></td>
                <td></td>
                <td> ' . ltrim($value->kuk) . ' </td>
                <td align="center"> <input type="radio" required name="is_kompeten[' . $key . ']"  value="k" class="value_k"/> </td>
                <td align="center"> <input type="radio" required name="is_kompeten[' . $key . ']" value="bk" class="value_bk"/></td>
                <td class="select_bukti"> '.$combo.'
                </td>
                </tr>';
            } else {

                $table .= ' <tr style="font-weight:normal;">
                <td align="center"></td>
                <td></td>
                <td> ' . ltrim($value->kuk) . ' </td>
                <td align="center"> <input type="radio" required name="is_kompeten[' . $key . ']"  value="k" class="value_k"/> </td>
                <td align="center"> <input type="radio" required name="is_kompeten[' . $key . ']" value="bk" class="value_bk"/></td>
                <td class="select_bukti"> '.$combo.'
                </td>
                </tr>';
            }
        } else {
            $table .= ' <tr>
            <td align="center"> ' . $no . ' </td>
            <td> ' . $value->id_unit_kompetensi . ' </td>
            <td> <b>' . $value->unit_kompetensi . '</b> </td>
            <td align="center"> </td>
            <td align="center"> </td>
            <td>
            </td>
            </tr>';
            $table .= ' <tr style="font-weight:normal;">
            <td align="center"></td>
            <td></td>
            <td> <b>' . ltrim($value->elemen_kompetensi) . '</b> </td>
            <td> </td>
            <td> </td>
            <td>
            </td>
            </tr>';
            $table .= ' <tr style="font-weight:normal;">
            <td align="center"></td>
            <td></td>
            <td> ' . ltrim($value->kuk) . ' </td>
            <td align="center"> <input type="radio" required name="is_kompeten[' . $key . ']"  value="k" class="value_k"/> </td>
            <td align="center"> <input type="radio" required name="is_kompeten[' . $key . ']" value="bk" class="value_bk"/></td>
            <td class="select_bukti"> '.$combo.'
            </td>
            </tr>';
            $no++;
        }
        $real_unit = $value->id_unit_kompetensi;
        $real_elemen = $value->id_elemen_kompetensi;
    }
    $table .= '</table>';
    return $table;
}
function wawancara($id = false) {
    if (!$id) {
        data_not_found();
        exit;
    }

    $this->load->model('perangkat_asesmen_detail_model');
    $con_method = $this->perangkat_asesmen_detail_model->get(intval($id));
    if (sizeof($con_method) == 1) {
        $data_user = $this->auth->get_user_data();

        $detail_perangkat = $this->perangkat_asesmen_model->detail_soal($id);
        $perangkat = $this->perangkat_asesmen_model->get(intval($con_method->id_perangkat_asesmen));
        $kuk = $this->uji_kompetensi_skema($perangkat->skema_perangkat,$detail_perangkat);

        $this->db->select('id_asesor,skema_sertifikasi');
        $this->db->where('id', $data_user->pegawai_id);
        $detail_asesi = $this->db->get(kode_lsp() . 'asesi')->row();

            //var_dump($kuk);die();

        $jenis_user = $this->auth->get_user_data()->jenis_user;
        if ($jenis_user == 1) {
            $views = 'detail_wawancara_asesi';
        } else {
            $views = 'detail_wawancara';
        }

        $data = $this->perangkat_asesmen_detail_model->get_single($con_method);
        $peserta_uji = $this->perangkat_asesmen_model->peserta_uji($id, $data_user->pegawai_id);
        $this->load->view('perangkat_asesmen/' . $views, array(
            'detail_perangkat' => $detail_perangkat,
            'data_user' => $data_user,
            'peserta_uji' => $peserta_uji,
            'id' => $id,
            'jenis_soal' => array('', 'Uji Teori', 'Observasi', 'Tes Lisan', 'Wawancara', 'Studi Kasus','Cek Portofolio'),
            'data' => $data,
            'kuk' => $kuk,
        ));
    } else {
        $this->load->view('perangkat_asesmen/detail', array(), TRUE);
    }
}
function save_asesor_wawancara() {
    $jawaban_peserta = $this->input->post('jawaban_peserta');
    $is_kompeten = $this->input->post('is_kompeten');
    $jawaban = array(
        "jawaban_peserta"=>serialize($jawaban_peserta),
        "is_kompeten"=>serialize($is_kompeten),

    );
    $jawaban = serialize($jawaban);
    $asesiarray = $this->input->post('asesiarray');
    $selectrekomendasi = $this->input->post('selectrekomendasi');
    $id_asesor = $this->auth->get_user_data()->pegawai_id;
        //$id_skema = $this->input->post('id_skema');
    $id_perangkat_detail = $this->input->post('id_perangkat_detail');
        //var_dump($asesiarray); die();
    foreach ($asesiarray as $key => $value) {
        $this->db->select('id_asesor,skema_sertifikasi');
        $this->db->where('id', $value);
        $detail_asesi = $this->db->get(kode_lsp() . 'asesi')->row();

        $data_update = array(
            'id_asesi' => $value,
            'id_asesor' => $id_asesor,
            'id_skema' => $detail_asesi->skema_sertifikasi,
            'id_perangkat_detail' => $id_perangkat_detail,
            'jawaban_asesi' => $jawaban,
            'jawaban_salah' => "0",
            'jawaban_salah' => "0",
            'penilaian_asesor' => $selectrekomendasi
        );
        $this->db->insert('t_uji', $data_update);
    }
    echo "Penilaian Sukses. Silahkan tutup halaman ini";
}

public function upload_files($id,$filename="") {
    if (!empty($_FILES)) {
        $tempFile = $_FILES['file']['tmp_name'];
        $fileName = $id.'-'.time() . str_replace("(", "_", str_replace(")", "_", str_replace(' ', '_', $_FILES['file']['name'])));

        $folder = $this->input->post('folder');
        $targetPath = getcwd() . '/assets/files/jawaban/';
        $targetFile = $targetPath . $fileName;
        move_uploaded_file($tempFile, $targetFile);
    }
}

function save_essay($pilihan="essay") {
        //$namafile = $this->input->post('namafile');
        $id_asesi = $this->input->post('id_asesi');
        //var_dump($id_asesi);die();
        $id_asesor = $this->input->post('id_asesor');
        $id_skema = $this->input->post('id_skema');
        $id_perangkat_detail = $this->input->post('id_perangkat_detail');
        //$pilihan = $this->input->post('pilihan');
        //var_dump($id_perangkat_detail);die();
        if ($pilihan == 'essay') {
            $dir = "assets/files/jawaban";

// Open a directory, and read its contents
            if (is_dir($dir)){
                if ($dh = opendir($dir)){
                        while (($file = readdir($dh)) !== false){
                            $filename = explode('-', $file);
                            //var_dump($filename);die();
                            if($filename[0] > 0 && $filename[0]==$id_asesi){
                                $hasil_upload[] = $file;
                            }

                      }
                      closedir($dh);
                }
              }else{
                $hasil_upload[] = array();
              }
        //var_dump($hasil_upload);die();
    $data_update = array(
        'file_jawaban' => serialize($hasil_upload),
        'id_asesi' => $id_asesi,
        'id_asesor' => $id_asesor,
        'id_skema' => $id_skema,
        'id_perangkat_detail' => $id_perangkat_detail,
        'jawaban_benar' => '0',
        'jawaban_salah' => '0'
    );
//var_dump($data_update);die();
            //$this->db->where('id',$id_asesi);
    if ($this->db->insert('t_uji', $data_update)) {
        echo"<h3>Upload Jawaban Sukses!</h3>";
        header( "refresh:5;url=".base_url() );
        //redirect(base_url());
    }else{
        echo"Upload Jawaban Gagal!";

    }
} else {
    $opsi = $this->input->post('opsi');
            //var_dump($id_asesi);die();
    if (isset($opsi)) {
        $jumlah_soal = count($opsi);
        $jawaban = $this->perangkat_asesmen_model->jawaban($id_perangkat_detail);

                //var_dump($jawaban);die();
        $jawaban_benar = 0;
        foreach ($opsi as $key => $value) {
            //var_dump($jawaban[$key]['jawaban_benar']);
            //die();

            if ($value == $jawaban[$key]['jawaban_benar']) {
                $jawaban_benar++;
            }
        }
        //var_dump($jawaban_benar);
            //die();
        $jawaban_salah = $jumlah_soal - $jawaban_benar;

        $array_opsi = serialize($opsi);
        $data_update = array(
            'id_asesi' => $id_asesi,
            'id_asesor' => $id_asesor,
            'id_skema' => $id_skema,
            'id_perangkat_detail' => $id_perangkat_detail,
            'jawaban_asesi' => $array_opsi,
            'jawaban_benar' => $jawaban_benar,
            'jawaban_salah' => $jawaban_salah
        );
    } else {
        $data_update = array(
            'id_asesi' => $id_asesi,
            'id_asesor' => $id_asesor,
            'id_skema' => $id_skema,
            'id_perangkat_detail' => $id_perangkat_detail,
        );
    }
            //$this->db->where('id',$id_asesi);
    if ($this->db->insert('t_uji', $data_update)) {
                //echo"Upload Jawaban Sukses";
        echo json_encode(array('msgType' => true, 'msgValue' => 'Upload Jawaban Sukses'));
    } else {
        echo json_encode(array('msgType' => false, 'msgValue' => 'Upload Jawaban Gagal'));
    }
}
}
}
