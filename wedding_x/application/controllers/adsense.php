<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adsense extends MY_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('Adsense_model');
	}

    function index()
    {
        $this->load->library('grid');
        //$grid['foto'] = $this->Adsense_model->galeri();
        $grid = $this->grid->set_properties(array('model' => 'Adsense_model', 'controller' => 'adsense', 'options' => array('id' => 'adsense', 'pagination', 'rownumber')))->load_model()->set_grid();
        $view = $this->load->view('adsense/index', array('grid' => $grid), true);
        echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
    }

    function datagrid()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $row = intval($this->input->post('rows')) == 0 ? 20 : intval($this->input->post('rows'));
            $page = intval($this->input->post('page')) == 0 ? 1 : intval($this->input->post('page'));
            $offset = $row * ($page - 1);

            // if(isset($_POST['id_posisi']) && !empty($_POST['id_posisi']))
						// {
            //     if($_POST['id_posisi']==0){
            //         $where['id_posisi LIKE'] = '%%';
            //     }else{
            //         $where['id_posisi ='] = $this->input->post('id_posisi');
            //     }
						// }

            $data = array();
            $params = array('_return' => 'data');
            if (isset($where))
                $params['_where'] = $where;
            $data['total'] = isset($where) ? $this->Adsense_model->count_by($where) : $this->Adsense_model->count_all();
            $this->Adsense_model->limit($row, $offset);
            $order = $this->Adsense_model->get_params('_order');
            $rows = $this->Adsense_model->set_params($params)->with(array('posisi', 'id_posisi'));
            //$rows = isset($where) ? $this->Adsense_model->order_by($order)->get_many_by($where) : $this->Adsense_model->order_by($order)->get_all();
            $data['rows'] = $this->Adsense_model->get_selected()->data_formatter($rows);
            echo json_encode($data);
        }
        else
        {
            block_access_method();
        }
    }

    function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = $this->Adsense_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->Adsense_model->check_unique($data)) {

                    if ($this->Adsense_model->insert($data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->Adsense_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $this->load->model('Posisi_Adsense_Model');
            $posisi = $this->Posisi_Adsense_Model->dropdown('id', 'posisi');

            $view = $this->load->view('adsense/add', array('posisi' => $posisi,'url' => base_url() . 'adsense/upload'), TRUE);
            echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
        }
    }

    function edit($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->Adsense_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->Adsense_model->check_unique($data, intval($id))) {
                    if ($this->Adsense_model->update(intval($id), $data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->Adsense_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $con_method = $this->Adsense_model->get(intval($id));
            if (sizeof($con_method) == 1) {
                $this->load->model('Posisi_adsense_model');
                $posisi = $this->Posisi_adsense_model->dropdown('id', 'posisi');

                $data = $this->Adsense_model->get_single($con_method);
                $view = $this->load->view('adsense/edit', array('posisi' => $posisi, 'data' => $data,
                'url' => base_url() . 'adsense/edit_upload/' . $id), TRUE);
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
            $roles = $this->Adsense_model->get(intval($id));
            if (sizeof($roles) == 1) {
                if ($this->Adsense_model->delete(intval($id))) {
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

            $this->load->model('Posisi_adsense_model');
            $posisi = $this->Posisi_adsense_model->dropdown('id', 'posisi');
            array_unshift($posisi,"-Semua Posisi-");

            $view = $this->load->view('adsense/search', array('posisi' => $posisi, 'hidden' => true), TRUE);
            //var_dump($view); die();
            echo json_encode(array('msgType' => 'success', 'msgValue' => $view));

        } else {
            block_access_method();
        }
    }

    // function posisi($id=false){
    //     if($id==false){
    //         $data['data'] = $this->db->get(kode_tbl().'adsense_posisi')->result();
    //         $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
    //         $this->load->view('templates/bootstraps/header',$data);
    //         $this->load->view('adsense/vcategory',$data);
    //         $this->load->view('templates/bootstraps/bottom');
    //     }else{
    //         $data['data'] = $this->Adsense_model->category($id);
    //         $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
    //         $this->load->view('templates/bootstraps/header',$data);
    //         $this->load->view('adsense/vcategory_article',$data);
    //         $this->load->view('templates/bootstraps/bottom');
    //     }
		//
    // }

}
