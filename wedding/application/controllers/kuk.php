<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kuk extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('kuk_model');
	}

	function index() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->load->library('grid');
            $grid = $this->grid->set_properties(array('model' => 'kuk_model', 'controller' => 'kuk', 'options' => array('id' => 'kuk', 'pagination', 'rows_number')))->load_model()->set_grid();
            $view = $this->load->view('kuk/index', array('grid' => $grid), true);
            echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
        } else {
            block_access_method();
        }
    }

    function datagrid() 
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $row = intval($this->input->post('rows')) == 0 ? 20 : intval($this->input->post('rows'));
            $page = intval($this->input->post('page')) == 0 ? 1 : intval($this->input->post('page'));
            $offset = $row * ($page - 1);
            
            $data = array();
            $params = array('_return' => 'data');

            if(isset($_POST['kuk']) && !empty($_POST['kuk']))
            {
                $where['kuk like'] = '%' . $this->input->post('kuk') . '%';
            }
            if(isset($_POST['id_elemen_kompetensi']) && !empty($_POST['id_elemen_kompetensi']))
            {
                $where[kode_lsp().'kuk.id_elemen_kompetensi'] = $this->input->post('id_elemen_kompetensi');
            }
            
            if (isset($where))
                $params['_where'] = $where;
            $data['total'] = isset($where) ? $this->kuk_model->count_by($where) : $this->kuk_model->count_all();
            $this->kuk_model->limit($row, $offset);
            $order = $this->kuk_model->get_params('_order');
            $rows = $this->kuk_model->set_params($params)->with(array('elemen_kompetensi', 'id_elemen_kompetensi'));
            //$rows = isset($where) ? $this->kuk_model->order_by($order)->get_many_by($where) : $this->kuk_model->order_by($order)->get_all();
            $data['rows'] = $this->kuk_model->get_selected()->data_formatter($rows);
            echo json_encode($data);
        }
        else
        {
            block_access_method();
        }
    }

    function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $data = $this->kuk_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->kuk_model->check_unique($data)) {
                   
                    if ($this->kuk_model->insert($data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->kuk_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $this->load->model('elemen_model');
            $elemen = $this->elemen_model->dropdown('id', 'elemen_kompetensi');

            $view = $this->load->view('kuk/add', array('elemen' => $elemen), TRUE);
            echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
        }
    }

    function edit($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->kuk_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->kuk_model->check_unique($data, intval($id))) {
                    if ($this->kuk_model->update(intval($id), $data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->kuk_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $con_method = $this->kuk_model->get(intval($id));
            if (sizeof($con_method) == 1) {
                $this->load->model('elemen_model');
                $elemen = $this->elemen_model->dropdown('id', 'elemen_kompetensi');

                $data = $this->kuk_model->get_single($con_method);
                $view = $this->load->view('kuk/edit', array('elemen' => $elemen, 'data' => $data), TRUE);
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
            $roles = $this->kuk_model->get(intval($id));
            if (sizeof($roles) == 1) {
                if ($this->kuk_model->delete(intval($id))) {
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

    function search() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->load->model('elemen_model');
            $elemen = $this->elemen_model->dropdown('id','elemen_kompetensi');
            //$skema = array_unshift($skema, array(""=>"Pilih"));
            $elemen['']="-Pilih-";
            $view = $this->load->view('kuk/search', array('elemen'=>$elemen), TRUE);
            echo json_encode(array('msgType' => 'success', 'msgValue' => $view));

        } else {
            block_access_method();
        }
    }

}