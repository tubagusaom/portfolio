<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal_uji extends MY_Controller {

	function __construct() {
		parent::__construct();
		// has_privilege($this->uri->segment(1));
		$this->load->model('jadwal_uji_model');
        $this->load->library('pagination');
	}

	function index(){
        $data = [
			'konten' => 'jadwal_uji/index',
			'uri_segmen' => $this->uri->segment(1),
			'menus' => $this->menus
		];

		// var_dump($data); die();

        $this->load->view('templates/users/app',$data);
    }

	function datagrid(){

        $this->db->select('*');
        $this->db->from(kode_lsp().'jadual_asesmen');
        $query = $this->db->get()->result();

        // $data['record'] = $query;

		$data['record'] = $this->jadwal_uji_model->data_jadwal();

		// var_dump($data); die();
        
        $view = $this->load->view('jadwal_uji/grid',$data,TRUE);
        echo json_encode([
            'tabel' => $view
        ]);
    }

    function tambah(){
        // $data = ['about' => ci_get('t_about')->result()];
        $view = $this->load->view('jadwal_uji/tambah',TRUE);
        echo json_encode($view);
    }

    function edit($id){
        $data = [
            'about' => ci_get_where(kode_lsp().'jadual_asesmen',['id'=>$id])->row(),
        ];

        $view = $this->load->view('jadwal_uji/edit',$data,TRUE);
        echo json_encode($view);
    }

    function save($id = ""){
        $data = [
          'about_us' => input_post('about_us'),
          'address' => input_post('address'),
          'phone' => input_post('phone'),
          'email' => input_post('email'),
          'linkedin' => input_post('linkedin'),
        ];
    
        if($id == ""){
          ci_insert(kode_lsp().'jadual_asesmen', $data);
          $data = ['type' => 'success', 'msg' => 'Data berhasi disimpan'];
          echo json_encode($data);
        }else {
          ci_update(kode_lsp().'jadual_asesmen', $data, ['id' => $id]);
          $data = ['type' => 'success', 'size' => 'mini', 'text' => 'Data berhasi diupdate'];
          echo json_encode($data);
        }
    }
    
    function hapus($id){
        $data = ci_delete(kode_lsp().'jadual_asesmen',['id'=>$id]);
        if($data){
            $data = ['type' => 'success', 'size' => 'mini', 'text' => 'Data berhasil di hapus'];
        echo json_encode($data);
        }
    }

}