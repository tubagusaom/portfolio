<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Asesi_temp extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('asesi_temp_model');
          $this->load->model('User_Model');
    }

    function index() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->load->library('grid');
            $grid = $this->grid->set_properties(array('model' => 'asesi_temp_model', 'controller' => 'asesi_temp', 'options' => array('id' => 'asesi_temp', 'pagination', 'rows_number')))->load_model()->set_grid();
            $view = $this->load->view('asesi_temp/index', array('grid' => $grid), true);
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
            
            if($jenis_user == 3){
                $user_id = $this->auth->get_user_data()->pegawai_id;
                $where['id_tuk ='] = $user_id;
            }
            if(isset($_POST['nama_lengkap']) && !empty($_POST['nama_lengkap']))
            {
                $where['nama_lengkap like'] = '%' . $this->input->post('nama_lengkap') . '%';
            }
             if(isset($_POST['no_identitas']) && !empty($_POST['no_identitas']))
            {
                $where['no_identitas like'] = '%' . $this->input->post('no_identitas') . '%';
            }
            if(isset($_POST['no_uji_kompetensi']) && !empty($_POST['no_uji_kompetensi']))
            {
                $where['no_uji_kompetensi like'] = '%' . $this->input->post('no_uji_kompetensi') . '%';
            }
            if(isset($_POST['from_time']) && !empty($_POST['from_time']))
            {
                $from_time = mysql_date($this->input->post('from_time'));
                $to_time = mysql_date($this->input->post('to_time')); 
                $where['u_date_create BETWEEN "'.$from_time.'" AND'] = $to_time;
            }
            if (isset($where))
                $params['_where'] = $where;
            $data['total'] = isset($where) ? $this->asesi_temp_model->count_by($where) : $this->asesi_temp_model->count_all();
            $this->asesi_temp_model->limit($row, $offset);
            $order = $this->asesi_temp_model->get_params('_order');
            //$rows = isset($where) ? $this->asesi_temp_model->order_by($order)->get_many_by($where) : $this->asesi_temp_model->order_by($order)->get_all();
            $rows = $this->asesi_temp_model->set_params($params)->with(array('tuk','skema','user'));
            $data['rows'] = $this->asesi_temp_model->get_selected()->data_formatter($rows);
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
            $roles = $this->asesi_temp_model->get(intval($id));
            if (sizeof($roles) == 1) {
                if ($this->asesi_temp_model->delete(intval($id))) {
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
            $this->load->model('asesi_temp_model');
            $view = $this->load->view('asesi_temp/search', array(), TRUE);
            echo json_encode(array('msgType' => 'success', 'msgValue' => $view));

        } else {
            block_access_method();
        }
    }
   
    function add()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            echo json_encode(array('msgType'=>'success', 'msgValue'=>$this->load->view('asesi_temp/add','', TRUE)));
        }
        else
        {
            block_access_method();
        }
    }
    
    function upload()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $config['upload_path'] = substr(__dir__,0, strpos( __dir__,"application")) . 'assets/files/excels';
            $config['allowed_types'] = 'xlsx|xls|csv';
            $config['max_size'] = '1024';

            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('fileToUpload'))
            {
                echo json_encode(array('msgType'=>'error','msgValue'=>$this->upload->display_errors()));
            }
            else
            {
                $uploaded = $this->upload->data();
                $files = substr(__dir__,0, strpos( __dir__,"application")) . 'assets/files/excels/' . $uploaded['file_name'];
                $this->load->library('excel');
                $objReader = $this->load->library('PHPExcel/Reader/PHPExcel_Reader_Excel5', $files);
                $objReader = new PHPExcel_Reader_Excel5();             
                $objReader->setReadDataOnly(true);
                $objPHPExcel = $objReader->load($files);
                $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                $this->db->query("TRUNCATE TABLE lsp080_asesi_temp");
                for($x=2; $x <= sizeof($sheetData); $x++)
                {
                        $data = array();
                        $data['nama_lengkap'] = $sheetData[$x]['A'];
                        $data['no_identitas'] = $sheetData[$x]['B'];
                        $data['email'] = $sheetData[$x]['C'];
                        $data['telp'] = $sheetData[$x]['D'];
                        $data['skema_sertifikasi'] = $sheetData[$x]['E'];
                        $data['id_tuk'] = $sheetData[$x]['F'];
                        $data['alamat'] = $sheetData[$x]['G'];
                        $data['bukti_pendukung'] = serialize(explode(',',$sheetData[$x]['H']));
                        $data['jenis_kelamin'] = $sheetData[$x]['I'];
                        $data['tempat_lahir'] = $sheetData[$x]['J'];
                        $data['tgl_lahir'] = $sheetData[$x]['K'];
                        $data['pendidikan_terakhir'] = $sheetData[$x]['L'];
                        $data['jabatan'] = $sheetData[$x]['M'];
                        $data['alamat_company'] = $sheetData[$x]['N'].' - '.$sheetData[$x]['O'];
                        $data['telp_company'] = $sheetData[$x]['P'];
                        

                        $this->db->insert('lsp080_asesi_temp',$data);
                    
                }
                echo json_encode(array('msgType'=>'success','msgValue'=>"Data sukses diimport"));
            }
        }
        else
        {
            block_access_method();
        }
    }
    function posting(){
        echo json_encode(array('msgType'=>'success','msgValue'=>"Data sukses diimport"));
    }
    function proses(){
        $this->db->query("INSERT INTO lsp080_asesi(nama_lengkap,no_identitas,email,telp,skema_sertifikasi,id_tuk,bukti_pendukung,jenis_kelamin,tempat_lahir,tgl_lahir,pendidikan_terakhir,jabatan,alamat_company,telp_company) SELECT nama_lengkap,no_identitas,email,telp,skema_sertifikasi,id_tuk,bukti_pendukung,jenis_kelamin,tempat_lahir,tgl_lahir,pendidikan_terakhir,jabatan,alamat_company,telp_company FROM lsp080_asesi_temp");
        $this->db->query("TRUNCATE TABLE lsp080_asesi_temp");
    }
       
}
