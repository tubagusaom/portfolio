<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pendaftaran_ujk extends MY_Controller {

	function __construct() {
		parent::__construct();
		// has_privilege($this->uri->segment(1));
		$this->load->model('pendaftaran_ujk_model');
        $this->load->library('pagination');
	}

	function index(){

		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			

            $this->load->library('grids');
			
            $grid = $this->grids->set_properties(
				array(
						'model' => 'pendaftaran_ujk_model',
						'controller' => 'pendaftaran_ujk',
						'options' => array('id' => 'pendaftaran_ujk', 'pagination', 'rows_number'),
					)
			)->load_model()->set_grid();

			$data = [
				'uri_segmen' => $this->uri->segment(1),
				'controller' => $this->controller,
				'konten' => 'pendaftaran_ujk/index',
				'menus' => $this->menus,
				'grid' => ($grid)
			];

			// $view = $this->load->view('pendaftaran_ujk/index', $data);

			$this->load->view('templates/users/app',$data);
			// echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
			// echo json_encode($view);
			
            // $view = $this->load->view('templates/users/app', array('grid' => $grid), true);
			// $this->load->view('templates/users/app',$data);
            // echo json_encode(array('msgType' => 'success', 'msgValue' => $view));

			// echo json_encode([
			// 	'tabel' => $view
			// ]);

			

			// var_dump((($grid))); die();
        } else {
            block_access_method();
        }

        // $data = [
		// 	'uri_segmen' => $this->uri->segment(1),
        //     'controller' => $this->controller,
		// 	'konten' => 'pendaftaran_ujk/index',
		// 	'menus' => $this->menus
		// ];

		// var_dump($view); die();

        // $this->load->view('templates/users/app',$data);
    }

	function datagrid(){

        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $row = intval($this->input->post('rows')) == 0 ? 20 : intval($this->input->post('rows'));
            $page = intval($this->input->post('page')) == 0 ? 1 : intval($this->input->post('page'));
            $offset = $row * ($page - 1);
            $data = array();
            $params = array('_return' => 'data');
            $jenis_user = $this->auth->get_user_data()->jenis_user;

			// var_dump($jenis_user); die();

            // if ($jenis_user == 3) {
            //     $user_id = $this->auth->get_user_data()->pegawai_id;
            //     $where['id_tuk ='] = $user_id;
            // }
            // if (isset($_POST['nama_lengkap']) && !empty($_POST['nama_lengkap'])) {
            //     $where['nama_lengkap like'] = '%' . $this->input->post('nama_lengkap') . '%';
            // }
            // if (isset($_POST['no_identitas']) && !empty($_POST['no_identitas'])) {
            //     $where['no_identitas like'] = '%' . $this->input->post('no_identitas') . '%';
            // }
            // if (isset($_POST['no_uji_kompetensi']) && !empty($_POST['no_uji_kompetensi'])) {
            //     $where['no_uji_kompetensi like'] = '%' . $this->input->post('no_uji_kompetensi') . '%';
            // }
            // if (isset($_POST['from_time']) && !empty($_POST['from_time'])) {
            //     $from_time = mysql_date($this->input->post('from_time'));
            //     $to_time = mysql_date($this->input->post('to_time'));
            //     $where['u_date_create BETWEEN "' . $from_time . '" AND'] = $to_time;
            // }
            // if (isset($where))
            //     $params['_where'] = $where;
            // $data['total'] = isset($where) ? $this->asesi_model->count_by($where) : $this->asesi_model->count_all();
            // $this->asesi_model->limit($row, $offset);
            // $order = $this->asesi_model->get_params('_order');
            // //$rows = isset($where) ? $this->asesi_model->order_by($order)->get_many_by($where) : $this->asesi_model->order_by($order)->get_all();
            // $rows = $this->asesi_model->set_params($params)->with(array('skema', 'asesor_praasesmen','jadwal','nama_tuk'));
            // foreach ($rows as $key => $value) {
            //     foreach ($value as $keys => $values) {
            //         if ($keys == 'skema') {
            //             $rows_baru[$key]->skema = str_replace('SKEMA SERTIFIKASI ', '', $value->skema);
            //         } else if ($keys == 'jadual') {
            //             $rows_baru[$key]->jadual = '<label style="font-size:8px;">' . str_replace('Uji Kompetensi Skema Sertifikasi Sertifikat II Bidang', 'USK', $value->jadual . '</label>');
            //         } else {
            //             $rows_baru[$key]->$keys = $value->$keys;
            //         }
            //     }
            // }
            // $data['rows'] = $this->asesi_model->get_selected()->data_formatter($rows_baru);
            // echo json_encode($data);

			// $data['record'] = $this->load->view('jadwal_uji/grid',$data,TRUE);
			// echo json_encode([
			// 	'tabel' => $data
			// ]);
        // } else {
        //     block_access_method();
        // }

        // $data['record'] = $query;

		// $data['record'] = $this->jadwal_uji_model->data_jadwal();

		// var_dump(($data['rows'])); die();
        
        // $view = $this->load->view('jadwal_uji/grid',$data,TRUE);
        // echo json_encode([
        //     'tabel' => $view
        // ]);
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