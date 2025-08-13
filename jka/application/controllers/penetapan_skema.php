<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penetapan_skema extends MY_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('penetapan_skema_model');
        $this->load->library('pagination');
	}

	function index(){
        $data = [
			'konten' => 'penetapan_skema/index',
			'uri_segmen' => $this->uri->segment(1),
			'menus' => $this->menus
		];

		// var_dump($data); die();

        $this->load->view('templates/users/app',$data);
    }

	function datagrid(){

        $this->db->select('*');
        $this->db->from(kode_lsp().'mapping_skema');
        $query = $this->db->get()->result();

        // $data['record'] = $query;

		$data['record'] = $this->penetapan_skema_model->data_penetapan_skema();

		// var_dump($data); die();
        
        $view = $this->load->view('penetapan_skema/grid',$data,TRUE);
        echo json_encode([
            'tabel' => $view
        ]);
    }

}