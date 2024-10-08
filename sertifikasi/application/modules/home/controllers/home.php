<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $jenis_user = $this->auth->get_user_data()->jenis_user;

        // var_dump($this->auth->is_logged_in());die();
        // var_dump($jenis_user); die();

        if ($jenis_user == 2 || $jenis_user == 4) {

            $template_header = 'templates/users/header'; 
            // $template_menu = $this->load->view('templates/users/menu');
            $template_menu = 'templates/users/menu';
            $template_body = 'templates/users/body';
            $template_bottom = 'templates/users/footer';

            


            $jumlah_sertifikat = '';
            $jumlah_uji_kompetensi = '';
            $jumlah_repositori = "";
            $query_pesan = "";
            $data_aktivitas = "";
            $perangkat = "";
            $isbn = "";
            $tglskrng="";
        } else if ($jenis_user == 1) {

            $template_header = 'templates/responsive/header';
            $template_menu = '';
            $template_body = 'templates/responsive/body';
            $template_bottom = 'templates/responsive/footer_home';

            $this->db->select('a.id,b.skema,a.status_permohonan,a.deskripsi_permohonan,a.id_perangkat,c.tanggal,c.starttime,c.endtime,c.download_time,d.users,a.metode_asesmen,a.perangkat_yang_digunakan,a.isbn');
            $this->db->from(kode_lsp() . 'asesi a');
            $this->db->join(kode_lsp() . 'skema b', 'a.skema_sertifikasi=b.id');
            $this->db->join(kode_lsp() . 'jadual_asesmen c', 'a.jadwal_id=c.id');
            $this->db->join(kode_lsp() . 'users d', 'a.id_asesor=d.id');
            $this->db->where('a.id_users', $this->id);
            $query_row = $this->db->get()->result();
            $data_aktivitas = $query_row;

            // var_dump($data_aktivitas); die();

            $this->db->where('id_users', $this->id);
            $this->db->where('terbitkan_sertifikat', 'on');
            $query = $this->db->get(kode_lsp() . 'asesi')->result();
            $jumlah_sertifikat = count($query);

            $this->db->where('id_users', $this->id);
            //$this->db->where('terbitkan_sertifikat','on');
            $query_uji = $this->db->get(kode_lsp() . 'asesi')->result();
            $jumlah_uji_kompetensi = count($query_uji);

            $this->db->where('id_asesi', $this->id);
            //$this->db->where('terbitkan_sertifikat','on');
            $query_repositori = $this->db->get('t_repositori')->result();
            $jumlah_repositori = count($query_repositori);

            $val1 = $query_row->tanggal . ' ' . $query_row->download_time;
            date_default_timezone_set('Asia/Jakarta');
            $val2 = date('Y-m-d H:i:s');
            //var_dump($val2);
            $datetime1 = new DateTime($val1);
            $datetime2 = new DateTime($val2);
            // var_dump($val2); die();
            // echo ($datetime2);

            $tglskrng = $val2;

            // if($datetime1 < $datetime2){
            //     $this->db->where_in('id_perangkat_asesmen', $query_row->id_perangkat);
            //     $perangkat = $this->db->get(kode_lsp() . 'perangkat_asesmen_detail')->result();
            // } else {
            //     $perangkat = array();
            // }

            $isbn = is_array(unserialize($query_row->isbn)) ? count(unserialize($query_row->isbn)) : 0;
            // var_dump($isbn); die();

        } else {
            $template_header = 'templates/jeasyui/header';
            $template_menu = '';
            $template_body = 'templates/jeasyui/body';
            $template_bottom = 'templates/jeasyui/footer';

            $jumlah_sertifikat = '';
            $jumlah_uji_kompetensi = '';
            $jumlah_repositori = "";
            $query_pesan = "";
            $data_aktivitas = "";
            $perangkat = "";
            $isbn = "";
            $tglskrng="";
        }
        // var_dump($this->menus); die();
        $this->load->view(
            $template_header,
                array('aplikasi' => $this->aplikasi,'menus' => $this->menus,  '_css_tag' => array(_Asset_JS_ . 'cleditor/jquery.cleditor', _Asset_CSS_ . 'default', _Asset_CSS_ . 'themes/default/easyui', _Asset_CSS_ . 'themes/icon', _Asset_CSS_ . 'bootstraps/font-awesome.min'), 'query_pesan' => $this->query_pesan, 'query_pesan_unread' => $this->query_pesan_unread, 'rolename' => $this->auth->get_rolename(),'tglskrng' => $tglskrng , 'nama_user' => $this->auth->get_user_data()->nama, '_script_tag' => array(_Asset_JS_ . 'jquery.min', _Asset_JS_ . 'jquery-ui/jquery-ui.min', _Asset_JS_ . 'elfinder/elfinder.min', _Asset_JS_ . 'jquery.easyui.min' )));
        // if ($template_menu !== '') $this->load->view($template_menu);
        $this->load->view(
            $template_body,
                array('aplikasi' => $this->aplikasi, 'unread_message' => $this->unread_message, 'isbn' => $isbn,'perangkat' => $perangkat, 'rolename' => $this->auth->get_rolename(),'tglskrng' => $tglskrng , 'nama_user' => $this->auth->get_user_data()->nama, 'jumlah_sertifikat' => $jumlah_sertifikat, 'jumlah_uji_kompetensi' => $jumlah_uji_kompetensi, 'jumlah_repositori' => $jumlah_repositori, 'data_aktivitas' => $data_aktivitas));
        $this->load->view(
            $template_bottom,
                array('aplikasi' => $this->aplikasi, '_bottom_JS_' => array(_Asset_JS_ . 'member/jscript', _Asset_JS_ . 'member/default', _Asset_JS_ . 'easyui.form.extend', _Asset_JS_ . 'jquery.extend', _Asset_JS_ . 'member/serializeObject', _Asset_JS_ . 'jquery.easyui.lang.id', _Asset_JS_ . 'member/ajaxfileupload', _Asset_JS_ . 'cleditor/jquery.cleditor.min')));
    }

    function about() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            echo json_encode(array('msgType' => 'success', 'width' => 600, 'height' => 400, 'title' => 'Tentang Aplikasi', 'msgValue' => $this->load->view('home/about', '', TRUE)));
        }
    }

    function sukses() {
        $template_header = 'templates/responsive/header';
        $template_body = 'templates/responsive/sukses';
        $template_bottom = 'templates/responsive/footer';
        $this->load->view($template_header, array('aplikasi' => $this->aplikasi, 'query_pesan' => $this->query_pesan, 'query_pesan_unread' => $this->query_pesan_unread));
        $this->load->view($template_body, array('aplikasi' => $this->aplikasi, 'unread_message' => $this->unread_message, 'menus' => $this->menus, 'rolename' => $this->auth->get_rolename(), 'nama_user' => $this->auth->get_user_data()->nama));
        $this->load->view($template_bottom, array('aplikasi' => $this->aplikasi));
    }
}
