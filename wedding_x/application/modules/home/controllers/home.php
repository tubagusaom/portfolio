<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $jenis_user = $this->auth->get_user_data()->jenis_user;
        $pegawai_id = $this->auth->get_user_data()->pegawai_id;
        //var_dump($this->auth->is_logged_in());die();s
        // var_dump($jenis_user); die();

        if ($jenis_user == 4) { //WO

            $template_header  = 'templates/responsive/header';
            $template_body    = 'templates/responsive/body';
            $template_bottom  = 'templates/responsive/footer';

        }else {
            $template_header  = 'templates/jeasyui/header';
            $template_body    = 'templates/jeasyui/body';
            $template_bottom  = 'templates/jeasyui/footer';
            $jumlah_sertifikat = '';
            $jumlah_uji_kompetensi = '';
            $jumlah_repositori = "";
            $query_pesan = "";
            $data_aktivitas = "";
            $perangkat = "";
        }
        //var_dump($data_aktivitas); die();
        $this->load->view($template_header, array(
          'aplikasi' => $this->aplikasi,
          '_css_tag' => array(_Asset_JS_ . 'cleditor/jquery.cleditor', _Asset_CSS_ . 'default', _Asset_CSS_ . 'themes/default/easyui', _Asset_CSS_ . 'themes/icon', _Asset_CSS_ . 'bootstraps/font-awesome.min'),
          'query_pesan' => $this->query_pesan,
          'bidding_favorit' => $bidding_favorit,
          'query_pesan_unread' => $this->query_pesan_unread,
          '_script_tag' => array(_Asset_JS_ . 'jquery.min', _Asset_JS_ . 'jquery-ui/jquery-ui.min', _Asset_JS_ . 'elfinder/elfinder.min', _Asset_JS_ . 'jquery.easyui.min')));

        $this->load->view($template_body, array(
          'perangkat' => $perangkat,
          'aplikasi' => $this->aplikasi,
          'unread_message' => $this->unread_message,
          'menus' => $this->menus,
          'rolename' => $this->auth->get_rolename(),
          'nama_user' => $this->auth->get_user_data()->nama,
          'jumlah_sertifikat' => $jumlah_sertifikat,
          'jumlah_uji_kompetensi' => $jumlah_uji_kompetensi,
          'jumlah_repositori' => $jumlah_repositori,
          'data_aktivitas' => $data_aktivitas,
          'jumlah_penugasan' => $jumlah_penugasan,
          'mobil_tersedia' => $mobil_tersedia,
					'user_id' => $user_id
        ));

        $this->load->view($template_bottom, array(
          'aplikasi' => $this->aplikasi,
          '_bottom_JS_' => array(_Asset_JS_ .
          'member/jscript', _Asset_JS_ . 'member/default',
          _Asset_JS_ . 'easyui.form.extend',
          _Asset_JS_ . 'jquery.extend',
          _Asset_JS_ . 'member/serializeObject',
          _Asset_JS_ . 'jquery.easyui.lang.id',
          _Asset_JS_ . 'member/ajaxfileupload',
          _Asset_JS_ . 'cleditor/jquery.cleditor.min')));
    }

    function about() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            echo json_encode(array('msgType' => 'success', 'width' => 600, 'height' => 420, 'title' => 'Tentang Aplikasi', 'msgValue' => $this->load->view('home/about', '', TRUE)));
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
