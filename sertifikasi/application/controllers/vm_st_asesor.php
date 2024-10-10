<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vm_st_asesor extends MY_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('vm_st_asesor_model');
        $this->load->library('pagination');
	}

	function index(){
        $data = [
			'konten' => 'vm_st_asesor/index',
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

		$data['record'] = $this->vm_st_asesor_model->data_surat_tugas_asesor();

		// var_dump($data); die();
        
        $view = $this->load->view('vm_st_asesor/grid',$data,TRUE);
        echo json_encode([
            'tabel' => $view
        ]);
    }

}