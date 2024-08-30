<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $controller;
    protected $method;
    protected $isLogin;
    protected $totalPengunjung;

    //public $kode_tbl = 'tbl3133_';
    function __construct() {
        parent::__construct();

        // $this->load->library('acl');
        // $this->load->model('user_model');
        //
        // $data = array();
        //
        // /* tangkap nama controller class yang sedang diakses */
        // $this->controller = $this->router->fetch_class();
        //
        // /* jika method kosong isi dengan index */
        // $this->method = empty($this->router->fetch_method()) ? 'index' : $this->router->fetch_method();
        //
        // $role = intval($this->auth->get_role_id());
        //
        // $data['controller_name'] = $this->controller;
        // $data['method_name'] = $this->method;
        // $data['role_id'] = $role;
        //
        // if (is_ajax_request()) {
        //     $data['request_method'] = 1;
        // } else {
        //     $data['request_method'] = 2;
        // }
        // if (!$this->acl->check_permission($data)) {
        //     if ($this->controller == 'users' && $this->method == 'login' && $this->auth->get_role_id() > 1) {
        //         echo json_encode(array('msgType' => 'error', 'msgValue' => 'Anda sudah login menggunakan username ' . $this->auth->get_username()));
        //         exit;
        //     } else {
        //         block_access_method();
        //     }
        // }
        // if ($this->auth->is_logged_in()) {
        //     $this->aplikasi = $this->db->get('r_konfigurasi_aplikasi')->row();
        //     $this->id = $this->auth->get_user_data()->id;
        //     $this->id_asesi = $this->auth->get_user_data()->pegawai_id;
        //     $this->asesi = $this->user_model->get_idasesi($this->id);
        //     $this->jenis_user = $this->auth->get_user_data()->jenis_user;
        //
        //     $this->db->where('reciepent_id', $this->id);
        //     $this->db->where('status_read_recepient', '0');
        //     $this->db->where('parent_id', '0');
        //     $pesan = $this->db->get('t_pesan')->result();
        //     $this->unread_message = count($pesan);
        //     $this->load->library('menus');
        //     $this->menus = $this->menus->display_menu();
        //
        //     $this->db->where('reciepent_id', $this->id);
        //     $this->db->where('status_read_recepient', '0');
        //     $this->query_pesan_unread = $this->db->get('t_pesan')->result();
        //
        //     $this->db->where('reciepent_id', $this->id);
        //     $this->query_pesan = $this->db->get('t_pesan')->result();
        // } else {
        //     $this->aplikasi = $this->db->get('r_konfigurasi_aplikasi')->row();
        //     $this->load->helper('cookie');
        //      $check_visitor = get_cookie("docars");
        //      $ip = $this->input->ip_address();
        //      if ($check_visitor == false) {
        //         $db = array(
        //             "ip"  => $ip,
        //             "waktu" => date('h:i:s'),
        //             "tanggal" => date('Y-m-d'),
        //         );
        //         setcookie('docars',$ip,time()+86500,'/');
        //         $this->db->insert('t_counter',$db);
        //      }
        //      $pengunjungHariIni = count($this->db->where('tanggal',date('Y-m-d'))->get('t_counter')->result());
        //      //$pengunjungHariIni = $this->db->count('t_counter');
        //      $global_data = array('totalPengunjung'=>$this->db->count_all('t_counter'),'pengunjungHariIni'=>$pengunjungHariIni);
        //
        //  //Send the data into the current view
        //  //http://ellislab.com/codeigniter/user-guide/libraries/loader.html
        //  $this->load->vars($global_data);
        //     // $this->totalPengunjung = $this->db->count_all('t_counter');
        // }
    }

    public function tb_getip(){
      $ip_address = $_SERVER['REMOTE_ADDR'];
      return $ip_address;
    }

    // public function set_timezone() {
    //     if ($this->session->userdata('user_id')) {
    //         $this->db->select('timezone');
    //         $this->db->from($this->db->dbprefix . 'user');
    //         $this->db->where('user_id', $this->session->userdata('user_id'));
    //         $query = $this->db->get();
    //         if ($query->num_rows() > 0) {
    //             date_default_timezone_set($query->row()->timezone);
    //         } else {
    //             return false;
    //         }
    //     }
    // }

    public function upload_image($param = "", $filename = "") {
        $config['upload_path'] = './assets/files/asesi/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = 10048;
        $config['max_width'] = 8288;
        $config['max_height'] = 5068;
        $config['file_name'] = $filename;
        $config['remove_spaces'] = TRUE;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload($param)) {
            $error = array('error' => $this->upload->display_errors());

            $result = json_encode($error);
        } else {
            $data = array('upload_data' => $this->upload->data());

            $result = json_encode($data);
        }

        return $result;
    }

    public function upload_file($param = "", $filename = "") {
        $configFile['upload_path'] = './assets/files/asesi/';
        $configFile['allowed_types'] = 'rtf|doc|docx|xls|xlsx|pdf|gif|jpg|png|jpeg|bmp';
        $configFile['max_size'] = 50000 * 1024;
        $configFile['file_name'] = $filename;
        $configFile['remove_spaces'] = FALSE;

        $this->upload->initialize($configFile);

        if (!$this->upload->do_upload($param)) {
            $error = array('error' => $this->upload->display_errors());

            $result = json_encode($error);
        } else {
            $data = array('upload_data' => $this->upload->data());

            $result = json_encode($data);
        }

        return $result;
    }

    public function upload_allfile($param = "", $filename = "") {
        $configFile['upload_path'] = './assets/files/asesi/';
        $configFile['allowed_types'] = 'rtf|doc|docx|xls|xlsx|ppt|pptx|pdf|gif|jpg|png|jpeg|bmp|avi|flv|wmv|mp3|mp4';
        //rtf|doc|docx|xls|xlsx|ppt|pptx|pdf|gif|jpg|png|jpeg|bmp|avi|flv|wmv|mp3|mp4
        $configFile['max_size'] = 10 * 1024;
        $configFile['file_name'] = $filename;
        $configFile['remove_spaces'] = TRUE;

        $this->upload->initialize($configFile);

        if (!$this->upload->do_upload($param)) {
            $error = array('error' => $this->upload->display_errors());

            $result = json_encode($error);
        } else {
            $data = array('upload_data' => $this->upload->data());

            $result = json_encode($data);
        }
        //var_dump($result);
        return $result;
    }

    function note_count_date($data){

      $date1      = date_create($data);
      $date2      = date_create('2022-03-1 15:25:35');
      $diffs      = date_diff($date1,$date2);
      $dayss      = $diffs->format("%a")+1;

    }

    // function note_count_date(){
    //
    //   // $gettimezone = date_default_timezone_get();
    //   // $gettimezone = $this->config->item('time_zone');
    //
    //    // foreach ($timezones as $timezone)
    //    // {
    //    //    echo $timezone;
    //    //    echo "</br>";
    //    // }
    //
    //   $gettimezone = $this->config->item('gettimezone');
    //
    //   $kalender = CAL_GREGORIAN;
    //   $bulan    = '12';
    //   $tahun    = date('Y');
    //
    //   $jumlahharidalambulan = cal_days_in_month($kalender, $bulan, $tahun);
    //
    //   $days_h=0;
    //   for($month_h=1;$month_h<=12;$month_h++){
    //     $jumlahharidalamtahun = $days_h + cal_days_in_month(CAL_GREGORIAN,$month_h,'2022');
    //   }
    //
    //   // $date = new DateTime();
    //   // $date = date('d F Y || H:i:s a', time());
    //   $date = date('m/d/Y h:i:s a', time());
    //
    //   $awal = date('2022-02-28');
    //   $akhir = date('2022-03-1');
    //
    //   $diff = abs(strtotime($akhir) - strtotime($awal));
    //
    //   $years = floor($diff / (365*60*60*24));
    //   $months = floor(($diff - $years) / (30*60*60*24));
    //   $days = floor(($diff - $years)/ (60*60*24)+1);
    //
    //   $date1      = date_create('2022-02-27 09:34:21');
    //   $date2      = date_create('2022-03-1 15:25:35');
    //   $diffs      = date_diff($date1,$date2);
    //   $dayss      = $diffs->format("%a")+1;
    //
    //  $datadiff=date_diff($date1,$date2);
    //  // $x = $datadiff->format("%R%a days");
    //  $x = @($diffs->format('%R%a days')+1);
    //
    //  $datetime1 = date_create_from_format('Y-m-d', '2022-02-27');
    //  $datetime2 = date_create_from_format('Y-m-d', '2022-03-1');
    //
    //  $interval = date_diff($datetime1, $datetime2);
    //  $diffDays = (int) $interval->format('%a')+1;
    //
    // }


}
