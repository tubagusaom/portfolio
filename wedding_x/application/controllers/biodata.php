<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biodata extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('biodata_model');
    }

		// function add(){
		// 	$xxx = $this->auth->get_user_data()->jenis_user;
		// 	var_dump($xxx); die();
		// }

    function index() {

			$template_header = 'templates/responsive/header';
			$template_body = 'templates/responsive/biodata/index';
			$template_bottom = 'templates/responsive/footer';

        $biodata = $this->biodata_model->biodata();

        $this->load->view($template_header, array('aplikasi' => $this->aplikasi, 'query_pesan' => $this->query_pesan, 'query_pesan_unread' => $this->query_pesan_unread));
        $this->load->view($template_body, array('aplikasi' => $this->aplikasi, 'unread_message' => $this->unread_message, 'menus' => $this->menus, 'rolename' => $this->auth->get_rolename(), 'nama_user' => $this->auth->get_user_data()->nama, 'biodata' => $biodata));
        $this->load->view($template_bottom, array('aplikasi' => $this->aplikasi));
    }

    function edit() {
				$tgl_wedding = $this->input->post('tgl_wedding');
        $biodata_pria = $this->input->post('biodata_pria');
        $hp_pria = $this->input->post('hp_pria');
        $alamat_pria = $this->input->post('alamat_pria');
        $desc_pria = $this->input->post('desc_pria');
				$biodata_perempuan = $this->input->post('biodata_perempuan');
        $hp_perempuan = $this->input->post('hp_perempuan');
        $alamat_perempuan = $this->input->post('alamat_perempuan');
        $desc_perempuan = $this->input->post('desc_perempuan');


        $data = array(
            'tgl_wedding' => $tgl_wedding,
            'biodata_pria' => $biodata_pria,
            'hp_pria' => $hp_pria,
            'alamat_pria' => $alamat_pria,
            'desc_pria' => $desc_pria,
            'biodata_perempuan' => $biodata_perempuan,
            'hp_perempuan' => $hp_perempuan,
            'alamat_perempuan' => $alamat_perempuan,
            'desc_perempuan' => $desc_perempuan
        );

        //var_dump($data);die();
        // $this->db->where('id_users', $this->id);
        if ($this->db->update(kode_tbl().'biodata', $data)) {
            $this->session->set_flashdata('result', 'Perbaharui biodata berhasil');
            $this->session->set_flashdata('mode_alert', 'success');
            redirect('profil/index');
        } else {
            return false;
        }
    }

		function family_pria(){

		}

		function family_perempuan(){

		}

    function foto() {
        if ($this->auth->get_user_data()->jenis_user === '2') {
            $template_header = 'templates/theme_asesor/header';
            $template_body = 'templates/responsive/profil/foto';
            $template_bottom = 'templates/theme_asesor/footer';
        } else {
            $template_header = 'templates/responsive/header';
            $template_body = 'templates/responsive/profil/foto';
            $template_bottom = 'templates/responsive/footer';
        }

        $biodata = $this->profil_model->biodata_profil($this->id);

        $this->load->view($template_header, array('aplikasi' => $this->aplikasi, 'query_pesan' => $this->query_pesan, 'query_pesan_unread' => $this->query_pesan_unread));
        $this->load->view($template_body, array('aplikasi' => $this->aplikasi, 'unread_message' => $this->unread_message, 'menus' => $this->menus, 'rolename' => $this->auth->get_rolename(), 'nama_user' => $this->auth->get_user_data()->nama, 'biodata' => $biodata));
        $this->load->view($template_bottom, array('aplikasi' => $this->aplikasi));
    }

    function foto_update() {
        if (isset($_FILES['foto_profil']['tmp_name']) && !empty($_FILES['foto_profil']['tmp_name'])) {
            $data['foto_profil'] = time() . str_replace(' ', '_', $_FILES['foto_profil']['name']);

            $config['upload_path'] = substr(__dir__, 0, strpos(__dir__, "application")) . 'assets/files/asesi/';
            $config['allowed_types'] = '*';
            $config['max_size'] = 1100000;
            $config['file_name'] = $data['foto_profil'];

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_profil')) {
                echo"gagal update";
            } else {
                $data_upload = $this->upload->data();
                $this->db->where('id', $this->id);
                $this->db->update('t_users', array('foto_profil' => $config['file_name']));
                redirect('profil/foto');
            }
        }
    }

}
