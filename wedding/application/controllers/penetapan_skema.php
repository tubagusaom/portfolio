<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penetapan_skema extends MY_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('penetapan_skema_model');
        $this->load->library('pagination');
	}

	function index(){
        $data = [
			'uri_segmen' => $this->uri->segment(1),
            'controller' => $this->controller,
			'konten' => 'penetapan_skema/index',
			'menus' => $this->menus
		];

		// var_dump($data); die();

        $this->load->view('templates/users/app',$data);
    }

	function datagrid(){

		$data['record'] = $this->penetapan_skema_model->data_penetapan_skema();

		// var_dump($data); die();
        
        $view = $this->load->view('penetapan_skema/grid',$data,TRUE);
        echo json_encode([
            'tabel' => $view
        ]);
    }

}