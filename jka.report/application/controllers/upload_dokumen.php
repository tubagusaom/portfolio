<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload_dokumen extends MY_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('upload_dokumen_model');
    }
    
    function index() {
        $this->load->library('grid');
        $grid = $this->grid->set_properties(array('model' => 'upload_dokumen_model', 'controller' => 'upload_dokumen', 'options' => array('id' => 'upload_dokumen', 'pagination', 'rownumber')))->load_model()->set_grid();
        $view = $this->load->view('upload_dokumen/index', array('grid' => $grid), true);
        echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
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
                $where['id_tuk ='] = $asesi_id;
            }
            
            if (isset($where))
                $params['_where'] = $where;
            $data['total'] = isset($where) ? $this->upload_dokumen_model->count_by($where) : $this->upload_dokumen_model->count_all();
            $this->upload_dokumen_model->limit($row, $offset);
            $order = $this->upload_dokumen_model->get_params('_order');
            $rows = $this->upload_dokumen_model->set_params($params)->with(array('tuk'));
            //$rows = isset($where) ? $this->upload_dokumen_model->order_by($order)->get_many_by($where) : $this->upload_dokumen_model->order_by($order)->get_all();
            $data['rows'] = $this->upload_dokumen_model->get_selected()->data_formatter($rows);
            echo json_encode($data);
        }
        else {
            block_access_method();
        }
    }

    function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->upload_dokumen_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->upload_dokumen_model->check_unique($data)) {
                    if ($this->upload_dokumen_model->insert($data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->upload_dokumen_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            echo json_encode(array('msgType' => 'success', 'msgValue' => $this->load->view('upload_dokumen/add', array('url' => base_url() . 'upload_dokumen/upload'), TRUE)));
        }
    }
    
    function upload() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->upload_dokumen_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->upload_dokumen_model->check_unique($data)) {
                    if (isset($_FILES['fileToUpload']['tmp_name']) && !empty($_FILES['fileToUpload']['tmp_name'])) {
                        $data['foto'] = str_replace(' ', '_', $_FILES['fileToUpload']['name']);
                        $config['upload_path'] = substr(__dir__, 0, strpos(__dir__, "application")) . 'repo/unggah_dokumen/';
                        $config['allowed_types'] = 'bmp|jpg|png|gif|jpeg';
                        $config['max_size'] = '512000000';

                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('fileToUpload')) {
                            echo json_encode(array('msgType' => 'error', 'msgValue' => $this->upload->display_errors()));
                            exit();
                        }
                    } else {
                        $data['foto'] = "";
                    }
                    if ($this->upload_dokumen_model->insert($data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data Berhasil Disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", strip_tag($this->upload_dokumen_model->get_validation()))));
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
            $roles = $this->upload_dokumen_model->get(intval($id));
            if (sizeof($roles) == 1) {
                if ($this->upload_dokumen_model->delete(intval($id))) {
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
    
    function edit($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->upload_dokumen_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->upload_dokumen_model->check_unique($data, intval($id))) {
                    $upload_dokumenUpdate = $this->upload_dokumen_model->update(intval($id), $data);
                    if ($upload_dokumenUpdate !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !', 'hasil' => $upload_dokumenUpdate));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->upload_dokumen_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $con_method = $this->upload_dokumen_model->get(intval($id));
            if (sizeof($con_method) == 1) {
                $data = $this->upload_dokumen_model->get_single($con_method);
                $view = $this->load->view('upload_dokumen/edit', array('data' => $data), TRUE);
                echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan !'));
            }
        }
    }

    
}

