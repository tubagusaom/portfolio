<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Training extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('training_model');
        $this->load->model('artikel_model');
        // $this->load->model('training_model_user');
        // $this->load->library('pagination');
    }

		function index() {

        if ($_SERVER['REQUEST_METHOD'] == 'GET'){

                $this->load->library('grid');
                $grid = $this->grid->set_properties(array('model' => 'training_model', 'controller' => 'training', 'options' => array('id' => 'training', 'pagination', 'rownumber')))->load_model()->set_grid();
                $view = $this->load->view('training/index', array('grid' => $grid), true);
                echo json_encode(array('msgType' => 'success', 'msgValue' => $view));

        } else {
					block_access_method();
        }

    }


     function datagrid() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $row        = intval($this->input->post('rows')) == 0 ? 20 : intval($this->input->post('rows'));
            $page       = intval($this->input->post('page')) == 0 ? 1 : intval($this->input->post('page'));
            $offset     = $row * ($page - 1);
            $data       = array();
            $params     = array('_return' => 'data');

            if (isset($where))
            $params['_where']   = $where;
            $data['total']      = isset($where) ? $this->training_model->count_by($where) : $this->training_model->count_all();
            $this->training_model->limit($row, $offset);
            $order              = $this->training_model->get_params('_order');
		        $rows               = $this->training_model->set_params($params)->with(array('jadwal_pelatihan'));
            $data['rows']       = $this->training_model->get_selected()->data_formatter($rows);

            echo json_encode($data);

        } else {
            block_access_method();
        }

    }

    function delete($id = false) {

         if (!$id) {
            data_not_found();
            exit;
         }


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dokumen = $this->training_model->get(intval($id));
            if(sizeof($dokumen) == 1) {
                if($this->training_model->delete(intval($id))) {
                  echo json_encode(array('msgType'=>'success', 'msgValue'=>'Data berhasil dihapus'));
                } else {
                  echo json_encode(array('msgType'=>'error', 'msgValue'=>'Data tidak berhasil dihapus !'));
                }
            } else {
              echo json_encode(array('msgType'=>'error', 'msgValue'=>'Data tidak dapat ditemukan !'));

            }

        } else {
          block_access_method();
				}

    }


		    function view($id = false){

		      if (!$id) {
		          data_not_found();
		          exit;
		      }
		      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		          $data = $this->training_model->set_validation()->validate();
		          if ($data !== false) {
		              if ($this->training_model->check_unique($data, intval($id))) {
		                  if ($this->training_model->update(intval($id), $data) !== false) {
		                      echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
		                  } else {
		                      echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
		                  }
		              } else {
		                  echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->training_model->get_validation())));
		              }
		          } else {
		              echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
		          }
		      } else {
		          $training = $this->training_model->get(intval($id));
		          if (sizeof($training) == 1) {

		              $this->db->select('jadwal_id');
		              $this->db->from('peserta_pelatihan');
		              $this->db->where('id',$id);
		              $row = $this->db->get()->row();

		              $this->db->where('id',$row->jadwal_id);
		              $jadwal = $this->db->select('jadual,tanggal,tanggal_akhir')->get('lsp275_jadual_asesmen')->row();

		              $view = $this->load->view('training/edit', array(
		                'jadual' => $jadwal,
		                'data' => $this->training_model->get_single($training)), TRUE);
		              echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
		          } else {
		              echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan !'));
		          }
		      }

		    }

    function registrasi(){

        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $data['data_jadwal'] = $this->training_model->get_jadwal();
				$data['berita_lainnya'] = $this->artikel_model->berita_lainnya();

        $this->load->view('templates/bootstraps/header',$data);
        $this->load->view('training/view',$data);
        $this->load->view('templates/bootstraps/bottom');
    }

    public function save(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama','Nama harus Di isi','trim|required' );
            $this->form_validation->set_rules('no_identitas','No Identitas harus Di isi','trim|required' );
            $this->form_validation->set_rules('jenis_klamin','Jenis Kelamin harus Di isi','trim|required' );
            $this->form_validation->set_rules('usia','Usia harus diisi','trim|required' );
            $this->form_validation->set_rules('pendidikan', 'pendidikan Harus Diisi', 'trim|required' );
            $this->form_validation->set_rules('jurusan', 'jurusan harus Di isi', 'trim|required' );
            $this->form_validation->set_rules('jabatan', 'jabatan harus Di isi', 'trim|required');
            $this->form_validation->set_rules('lama_menjabat', 'lama menjabat harus Di isi', 'trim|required' );
            $this->form_validation->set_rules('divisi', 'divisi harus Di isi', 'trim|required' );
            $this->form_validation->set_rules('email', 'email harus Di isi', 'trim|required|valid_email' );
            $this->form_validation->set_rules('no_hp', 'Nomor Hp harus Di isi', 'trim|required' );
            $this->form_validation->set_rules('nama_perusahaan', 'Nama perusahaan harus Di isi', 'trim|required' );
            $this->form_validation->set_rules('alamat', 'alamat perusahaan harus Di isi', 'trim|required' );
            $this->form_validation->set_rules('jadwal_id', 'jadwal Di isi', 'trim|required' );
            $this->form_validation->set_rules('pembayaran', 'pembayaran harus diisi', 'trim|required' );
            $this->form_validation->set_rules('alamat_invoice', 'alamat invoice harus Di isi', 'trim|required' );
            $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
            if($this->form_validation->run()){
                $this->load->helper('postinger');
                $this->load->library('upload');
                $nama_dokumen   = $this->input->post('nama_dokumen');
                $post           = $_FILES['file_data'];

                //var_dump($post);die();


                foreach ($nama_dokumen as $key => $nmdokumen)
                {
                    $file_data = array( "name"      => $post['name'][$key],
                                        "type"      => $post['type'][$key],
                                        "tmp_name"  => $post['tmp_name'][$key],
                                        "error"     => $post['error'][$key],
                                        "size"      => $post['size'][$key]
                                    );
                    $dataUpload[$nmdokumen][]   = $file_data;
                    $nama_filenya[]             = $nmdokumen . "-" . time() . "-" . str_replace(" ", "_", $post['name'][$key]);
                    $dataName[$nmdokumen][]     = $nama_filenya[$key];
                    $_FILES[$nama_filenya[$key]]= $file_data;
                    $fileupload[$nmdokumen][]   = $this->upload_image_tb($nama_filenya[$key], $nama_filenya[$key],'document');
                    // $config['upload_path'] = substr(__dir__, 0, strpos(__dir__, "application")) . 'document';
                    //echo $nama_filenya[$key];

										// var_dump($fileupload[$nmdokumen][]); die();
                }
                $bukti_pendukung = json_encode($dataName);
                //var_dump($bukti_pendukung);die();

                $data = array(
                                'nama'              => $this->input->post('nama'),
                                'no_identitas'      => $this->input->post('no_identitas'),
                                'jenis_klamin'      => $this->input->post('jenis_klamin'),
                                'usia'              => $this->input->post('usia'),
                                'pendidikan'        => $this->input->post('pendidikan'),
                                'jurusan'           => $this->input->post('jurusan'),
                                'jabatan'           => $this->input->post('jabatan'),
                                'lama_menjabat'     => $this->input->post('lama_menjabat'),
                                'divisi'            => $this->input->post('divisi'),
                                'email'             => $this->input->post('email'),
                                'no_hp'             => $this->input->post('no_hp'),
                                'nama_perusahaan'   => $this->input->post('nama_perusahaan'),
                                'alamat'            => $this->input->post('alamat'),
                                'jadwal_id'         => $this->input->post('jadwal_id'),
                                'pembayaran'        => $this->input->post('pembayaran'),
                                'alamat_invoice'    => $this->input->post('alamat_invoice'),
                                'document_pendukung'=> $bukti_pendukung,
                                'tanggal_daftar'    => date('Y-m-d g:i:a')

                            );
                $res = $this->training_model->insert_peserta($data);

                if ($res == true) {
                    $this->session->set_flashdata('result', 'TERIMAKASIH <br> Pendaftaran Kerjasama Sukses. Kami akan memverifikasi data anda');
                      $this->session->set_flashdata('mode_alert', 'success');
                      redirect(base_url() . 'training/registrasi');
                    }
            }

            else
            {
                $this->session->set_flashdata('result', 'training Kerjasama gagal !.');
                $this->session->set_flashdata('mode_alert', 'warning');
                $this->daftar();


            }

        }
    }

    // Public function calendar(){
  	// 	$data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
		//
  	// 	$this->load->view('templates/bootstraps/header', $data);
  	// 	$this->load->view('jadwal_calender/view', $data);
  	// }


}
