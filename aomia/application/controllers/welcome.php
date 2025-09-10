<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        // $this->load->model('welcome_model');
        // $this->load->model('link_model');
        // $this->load->model('artikel_model');
        // $this->load->model('master_mobil_model');
        // $this->load->model('adsense_model');
        $this->load->helper('text');
        $this->load->library('curl');
        $this->load->helper('cookie');

    }



    function update_counter($slug) {
// return current article views
        $this->db->where('article_slug', urldecode($slug));
        $this->db->select('article_views');
        $count = $this->db->get('articles')->row();

// then increase by one
        $this->db->where('article_slug', urldecode($slug));
        $this->db->set('article_views', ($count->article_views + 1));
        $this->db->update('articles');
    }

    public function upload_ajax_x() {
        $this->load->helper('postinger');
        $this->load->library('upload');

        $files = $_FILES['file'];
        $namafile = time() . "-" . str_replace(array(" ", "'", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "+", "=", ":", ";", "/", "?", "<", ">", "~", "`", "[", "]"), "", $files['name']);
        $kaboom = explode(".", $namafile);
        $fileExt = end($kaboom);
        $final_name = str_replace('.', '', $namafile) . '.' . $fileExt;
        $fileupload = $this->upload_allfile('file', $final_name);
        echo $fileupload;
    }

    // function upload_ajax(){
    //   $controller = fopen(dirname(__FILE__) . "/" . "xxx" . ".php", "w");
    //   $myFile = './application/views/files/ucapan.php';
    //
    //   var_dump($controller); die();
    //
    //   $fh = fopen($myFile, 'w') or die("can't open file");
    //   $stringData = "New Stuff 1\n";
    //   fwrite($fh, $stringData);
    //   $stringData = "New Stuff 2\n";
    //   fwrite($fh, $stringData);
    //   fclose($fh);
    // }

    function upload_ajax(){
      $this->load->helper('file');
      $this->load->library('user_agent');

      // $filename = base_url('application/views/files/ucapan.php');

      $newfile = './application/views/files/ucapan.php';
      // $newfile = APPPATH.'views/files/ucapan.php';

      // var_dump($create_waktu);die();

      $dataold = read_file(($newfile));
      $old_replace = str_replace(array('[', ']'), '', $dataold);

      // $create_waktu = date('Y-m-d');
      $create_waktu = date('d F Y - H:i:s a', time());

      $data['id'] = $this->input->post('id_pengunjung');
      $data['datetime'] = $create_waktu;
      $data['name'] = $this->input->post('name');
      $data['message'] = $this->input->post('message');
      $data['confirm'] = $this->input->post('confirm');

      $data['browser'] = $this->agent->browser();
      $data['browser_version'] = $this->agent->version();
      $data['os'] = $this->agent->platform();
      $data['ip_address'] = $this->tb_getip();
      $convjsn = json_encode($data);

      // var_dump($data['ip_address']);die();

      $php_string  = '['.$convjsn.','.$old_replace.']';

      // echo($create_waktu);

      // write_file($newfile, $php_string);
      write_file($newfile, $php_string, 'w');

      // if (! write_file('./application/views/files/ucapan.php', $php_string, 'w')) {
      // // if (! read_file('./application/views/files/ucapan.php')) {
      //   echo "nowrite";
      // }else {
      //   echo "write";
      // }

      // $rf = read_file(json_encode($newfile));
      // echo $data;
    }

    public function index()
    {

      $data['Tera_Byte_'] = 'Tera_Byte_';

      $someJSON = read_file('./application/views/files/ucapan.php');

      // Convert JSON string to Array
      $data['arraydata'] = json_decode($someJSON, true);
      // print_r($someArray);        // Dump all data of the Array
      // echo $someArray[0]["name"]; // Access Array data

      // Convert JSON string to Object
      $someObject = json_decode($someJSON);
      // print_r($someObject);      // Dump all data of the Object
      // echo $someObject[0]->name; // Access Object data

      // echo "<br><br>";
      //
      // foreach ($someArray as $key => $value) {
      //   echo $value["name"] . ", " . $value["message"] . "<br>";
      // }
      //
      // echo "<br><br>";
      //
      // foreach($someObject as $key => $value) {
      //   echo $value->name . ", " . $value->message . "<br>";
      // }

      // $waktu = date('Y-m-d h:i:s');
      // $ip_address = $this->tb_getip();
      // var_dump($ip_address); die();

      // echo "&nbsp;&nbsp;&nbsp;&nbsp;";
      // echo "<br><br>";
      // var_dump('___'); die();

      $this->load->view('templates/bootstraps/header',$data);
      $this->load->view('templates/bootstraps/body',$data);
      $this->load->view('templates/bootstraps/bottom',$data);

        // if(!$this->auth->is_logged_in())
        // {
        //     $visitor = $this->initCounter();
        //
        //     $this->load->model('artikel_model');
        //     $data['marquee'] = $this->artikel_model->marquee();
        //
            // $data['slideshow'] = $this->artikel_model->get_slideshow();
        //     $data['berita_lsp'] = $this->artikel_model->berita_lsp();
        //     $data['berita_bnsp'] = $this->artikel_model->berita_bnsp();
        //     $data['menu_profil'] = $this->artikel_model->menu();
        //     $data['berita_kompetensi'] = $this->artikel_model->berita_kompetensi();
        //     $data['berita_lainnya'] = $this->artikel_model->berita_lainnya();
        //     $data['adsense_top'] = $this->adsense_model->adsense_top();
        //     $data['adsense_bottom'] = $this->adsense_model->adsense_bottom();
        //     $data['data'] = $this->link_model->get_link();
        //     $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        //     $data['class_active'] = 'home';
        //     $data['berita_lsp_list'] = $this->artikel_model->berita_lsp_list();
        //
        //     $this->load->view('templates/bootstraps/header',$data);
        //     $this->load->view('templates/bootstraps/body',$data);
        //     $this->load->view('templates/bootstraps/bottom',$data);
        // }
        // else
        // {
        //     redirect(base_url() . 'home');
        // }
    }

    public function tamu_undangan() {
      $data['Tera_Byte_'] = 'Tera_Byte_';

      $this->load->view('templates/bootstraps/form_undangan',$data);
      // $this->load->view('templates/bootstraps/body',$data);
      // $this->load->view('templates/bootstraps/bottom',$data);
    }

    // function ex($message){
    //   throw new Exception($message);
    // }
    //
    // function read($file){
    //   try{
    //     @$handle = fopen($file, "rb") or ex("Read Error!");
    //     $contents = stream_get_contents($handle);
    //     fclose($handle);
    //     return htmlspecialchars($contents);
    //   } catch (Exception $e) {
    //     return "Creating new file.";
    //   }
    // }

    public function master_merek(){
      $idtahun = $this->input->post('idtahun');

      $tahun_mobil = kode_tbl().'tahun_mobil';
      $merek_mobil = kode_tbl().'merek_mobil';

      $this->db->select('a.id, a.merek_mobil');
      $this->db->from("$merek_mobil a");
      $this->db->join("$tahun_mobil b", "b.id = a.id_tahun");

      $this->db->where("b.id", $idtahun);

      $dm = $this->db->get()->result();

      $optmerek = '
          <option value="" selected>
            MEREK MOBIL
          </option>
      ';

      foreach ($dm as $key => $merek) {
        $optmerek .='
          <option value=' . $merek->id . '>
            ' . $merek->merek_mobil . '
          </option>
        ';
      }

      echo "$optmerek";

    }

    public function master_model(){
      $idmerek = $this->input->post('idmerek');

      $merek_mobil = kode_tbl().'merek_mobil';
      $model_mobil = kode_tbl().'model_mobil';

      $this->db->select('a.*');
      $this->db->from("$model_mobil a");
      $this->db->join("$merek_mobil b", "b.id = a.id_merek");

      $this->db->where("b.id", $idmerek);

      $dmodel = $this->db->get()->result();

      $optmodel = '
        <option value="" selected>
          MODEL MOBIL
        </option>
      ';

      if ($idmerek) {
        foreach ($dmodel as $key => $model) {
          $optmodel .='
            <option value=' . $model->id . '>
              ' . $model->model_mobil . '
            </option>
          ';
        }

        echo "$optmodel";
      }

    }

    public function master_transmisi(){
      $idmodel = $this->input->post('idmodel');

      $transmisi_mobil = kode_tbl().'transmisi_mobil';
      $model_mobil = kode_tbl().'model_mobil';

      $this->db->select('a.*');
      $this->db->from("$transmisi_mobil a");
      $this->db->join("$model_mobil b", "b.id = a.id_model");

      $this->db->where("b.id", $idmodel);

      $dtransmisi = $this->db->get()->result();

      $opttransmisi = '
        <option value="" selected>
          TRANSMISI MOBIL
        </option>
      ';

      foreach ($dtransmisi as $key => $transmisi) {
        $opttransmisi .='
          <option value=' . $transmisi->id . '>
            ' . $transmisi->transmisi_mobil . '
          </option>
        ';
      }

      echo "$opttransmisi";

    }

    function cek_harga_save(){
      $member           = kode_tbl() . 'member';
      $detail_member    = kode_tbl() . 'detail_member';
      $kendaraan        = kode_tbl() . 'detail_kendaraan';

      $nama_member = $this->input->post('nama_member', true);
      $no_hp_member = $this->input->post('no_hp_member', true);
      $nopol_member = $this->input->post('nopol_member', true);
      $email_member = $this->input->post('email_member', true);
      $id_tahun = $this->input->post('id_tahun', true);
      $id_merek = $this->input->post('id_merek', true);
      $id_model = $this->input->post('id_model', true);
      $id_transmisi = $this->input->post('id_transmisi', true);

      $data_member = array(
        'nama_member' => $nama_member,
        'no_hp_member' => $no_hp_member,
        'email_member' => $email_member,
        'status_member' => '0'
      );
      $simpan_member=$this->db->insert($member, $data_member);


      if ($simpan_member) {

        $id_member = $this->db->insert_id();

          $data_kendaraan = array(
            'nopol_kendaraan' => $nopol_member,
            'id_tahun' => $id_tahun,
            'id_merek' => $id_merek,
            'id_model' => $id_model,
            'id_transmisi' => $id_transmisi,
            'id_member' => $id_member
          );

          $simpan_kendaraan=$this->db->insert($kendaraan, $data_kendaraan);

          if ($simpan_kendaraan) {

            $id_kendaraan = $this->db->insert_id();

            $data_detail_member = array(
              'id_member' => $id_member,
              'id_detail_kendaraan' => $id_kendaraan
            );

            $simpan_detail_member=$this->db->insert($detail_member, $data_detail_member);

            if ($simpan_detail_member) {
              $this->session->set_flashdata('result', 'Pengecekan harga mobil tersimpan. Tunggu konfirmasi admin.');
              $this->session->set_flashdata('mode_alert', 'success');
              redirect('welcome/sukses');
            }else {
              $this->session->set_flashdata('result', 'Ada kesalahan dalam pengisian database. Hubungi bagian admin.');
              $this->session->set_flashdata('mode_alert', 'warning');
              redirect('welcome/sukses');
            }

          }else {
            $this->session->set_flashdata('result', 'Ada kesalahan dalam pengisian database. Hubungi bagian admin.');
            $this->session->set_flashdata('mode_alert', 'warning');
            redirect('welcome/sukses');
          }

      }else {
        $this->session->set_flashdata('result', 'Pengecekan harga mobil. Ada kesalahan dalam pengisian database. Hubungi bagian admin.');
        $this->session->set_flashdata('mode_alert', 'warning');
        redirect('welcome/sukses');
      }

    }

    function sukses(){
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $this->load->model('artikel_model');
        $data['menu_profil'] = $this->artikel_model->menu();
        $data['berita_lainnya'] = $this->artikel_model->berita_lainnya();

        $visitor = $this->initCounter();
        $data['pengunjung'] = $this->welcome_model->dataPengunjung();
        $data['total'] = $this->welcome_model->totalPengunjung();
        $data['rst'] = array();

        $this->load->view('templates/bootstraps/header',$data);
        $this->load->view('templates/bootstraps/sukses',$data);
        $this->load->view('templates/bootstraps/bottom',$data);
    }

    public function upload() {
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = time().str_replace("(","_",str_replace(")","_",str_replace(' ', '_', $_FILES['file']['name'])));

            $folder = $this->input->post('folder');
            $targetPath = getcwd() . '/share/temp/'.$folder.'/';
            $targetFile = $targetPath . $fileName ;
            move_uploaded_file($tempFile, $targetFile);
        }
    }

function send_email($kode_random,$email,$id,$nama_lengkap) {
    $this->load->library('email');
    $this->email->from('info@lspteknisiakuntansi.or.id', 'Sekretariat LSP Teknisi Akuntansi');
    $this->email->to($email);

    $this->email->subject('LSP Teknisi Akuntansi');
    $data['id'] = $id;
    $data['email'] = $email;
    $data['kode_random'] = $kode_random;
    $data['nama_lengkap'] = $nama_lengkap;
    $pesan = $this->load->view('com_lsp/vemail', $data, true);
            //$pesan = 'OKOK';

    $this->email->message($pesan);

    if ($this->email->send()) {
        return 'ok';
    } else {
        return 'nok';
    }
            //echo $this->email->print_debugger();
}
function generate_code(){
    $tahun = date('Y');
    $bulan = date('M');
    $tanggal = date('d');
    $docnumber=$this->db->query("select id from $asesi order by id desc limit 1")->row();

    if(count($docnumber) > 0){
        $maxdigitx=  substr($docnumber->id, -7)+1;
        if($maxdigitx < 10){
            $maxdigit="000000".$maxdigitx;
        }elseif($maxdigitx < 100){
            $maxdigit="00000".$maxdigitx;
        }elseif($maxdigitx < 1000){
            $maxdigit="0000".$maxdigitx;
        }elseif($maxdigitx < 10000){
            $maxdigit="000".$maxdigitx;
        }elseif($maxdigitx < 100000){
            $maxdigit="00".$maxdigitx;
        }elseif($maxdigitx < 1000000){
            $maxdigit="0".$maxdigitx;
        }elseif($maxdigitx < 10000000){
            $maxdigit=$maxdigitx;
        }
        return "APL/".$tanggal."/".$bulan."/".$tahun."/".$maxdigit;
    }else{
       return "APL/".$tanggal."/".$bulan."/".$tahun."/"."0000001";
   }
}

    function get_kota() {
        $id = $this->input->post('id');
        $data = $this->welcome_model->get_kota($id);
        echo json_encode($data);
    }

    function dropdown_array($id_field = FALSE, $list_field = FALSE) {
        $result = array();

        if ($id_field === FALSE || $list_field === FALSE)
            return $result;

        $array = $this->result_array();

        foreach ($array as $value) {
            $result[$value[$id_field]] = $value[$list_field];
        }
        return $result;
    }

    function kirim_sms($id = false) {

        if (!$id) {
            data_not_found();
            exit;
        }
        $this->db->where('id', $id);
        $row = $this->db->get('t_users')->row();
        $username = $row->akun;
        $password = $row->sandi_asli;
        //var_dump($password);die();
        $admin = $this->db->get('r_konfigurasi_aplikasi')->row();
        $pesan = 'Silahkan Login,  ' . $admin->url_aplikasi . ' User:' . $username . ' Pass:' . $password;
        $data['sender_id'] = '1';
        $data['reciepent_id'] = $id;
        $data['title'] = 'Akses Login Aplikasi';
        $data['message'] = $pesan;

        $this->load->model('Pesan_Model');
        $this->Pesan_Model->insert($data);
        $hasil = smssend_zenziva($row->hp, $pesan);

        $post = '{"personalizations": [{"to": [{"email": "' . $row->email . '"}],"subject": "' . $data['title'] . '"}],"from": {"email": "' . $admin->alamat_email . '"},"content": [{"type": "text/plain","value": "' . $pesan . '"}]}';
        //var_dump($post);die();
        sendgrid_api_text('https://api.sendgrid.com/v3/mail/send', $post);

        //echo json_encode(array('msgType' => 'success', 'msgValue' => 'Notifikasi Terkirim !'));
    }
    function generate_number($kode_jadwal) {
        //$id = $this->input->post('id');
        $jadwal = kode_tbl() . 'jadual_asesmen';
        $asesi = kode_tbl() . 'asesi';
        $data = $this->db->query("SELECT
        DATE_FORMAT(a.tanggal,'%m-%Y') as tanggal
         FROM $jadwal a
        WHERE a.id=$kode_jadwal")->row();
        $data_asesi = $this->db->query("SELECT count(a.id) as total
            FROM $asesi a
            WHERE a.jadwal_id =  $kode_jadwal
            ")->row();

        $prefix = "UJK-" . $kode_jadwal . "-";
        $digits = 3;
        $start = $data_asesi->total + 1;

        for ($i = $start; $i < $start + 1; $i++) {
            $result = str_pad($i, $digits, "0", STR_PAD_LEFT);
        }
        $no = $prefix . $result;

        return $no . '-' . $data->tanggal;
    }

    function initCounter() {
        $res = $this->db->query("SELECT * FROM t_counter")->num_rows();
        //var_dump($visitor); die();
        $ip = $this->input->ip_address();
        // $ip=$_SERVER['REMOTE_ADDR'];
        // $location = $this->input->server();
        // var_dump($location); die();
        $tanggal = date('Y-m-d');
        // $tanggal_awal = date('Y-m-d');
        // $tanggal = date('Y-m-d', strtotime('+1 days', strtotime( $tanggal_awal )));
        $hits = 1;
        $waktu = Date("H:i:s");
        // var_dump($waktu); die();

        $data = array(
            'ip' => $ip,
            'location' => $location,
            'tanggal' => $tanggal,
            'hits' => $hits,
            'waktu' => $waktu,
        );

        if ($res == 0) {
            $this->db->insert('t_counter',$data);
                //echo "data di input";
        } else {
                //var_dump($visitor); die();
            $this->db->query("UPDATE t_counter SET hits=hits+1, waktu='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
                //echo "data di update";
        }
    }

}
