<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Favorit extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

			$detail_dealer = kode_tbl().'detail_dealer';
			$detail_kendaraan = kode_tbl().'detail_kendaraan';
			$komponen_member = kode_tbl().'komponen_member';
			$tahun_mobil = kode_tbl().'tahun_mobil';
			$merek_mobil = kode_tbl().'merek_mobil';
			$model_mobil = kode_tbl().'model_mobil';
			$transmisi_mobil = kode_tbl().'transmisi_mobil';
			$user_id = $this->auth->get_user_data()->pegawai_id;

      $this->db->select('
				a.id,
				b.harga_kendaraan,
				b.jam_awal,
				b.jam_akhir,
        b.status_lelang,
				c.nama_komponen,
				c.file_komponen,
				d.tahun_mobil,
				e.merek_mobil,
				f.model_mobil,
				g.transmisi_mobil
			');

			$this->db->where('a.id_dealer', $user_id);
			// $this->db->where('b.status_lelang', '1');
			$this->db->where('c.status_gambar', '1');
			$this->db->join("$detail_kendaraan b",'a.id_kendaraan=b.id');
			$this->db->join("$komponen_member c",'b.id=c.id_detail_kendaraan');
			$this->db->join("$tahun_mobil d", "b.id_tahun = d.id");
			$this->db->join("$merek_mobil e","b.id_merek = e.id");
			$this->db->join("$model_mobil f","b.id_model = f.id");
			$this->db->join("$transmisi_mobil g","b.id_transmisi = g.id");
			$mobil_favorit = $this->db->get("$detail_dealer a")->result();

      $this->load->model('Welcome_model');
      $mf = $this->Welcome_model->count_bidding_favorit($user_id);
      $bidding_favorit=count($mf);

			// var_dump($bidding_favorit); die();

				$template_header  = 'templates/responsive/showroom/header';
				$template_body    = 'templates/responsive/showroom/favorit';
				$template_bottom  = 'templates/responsive/showroom/footer';

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
          'mobil_favorit' => $mobil_favorit,
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
          _Asset_JS_ . 'cleditor/jquery.cleditor.min'))
				);
    }

		function detail($id){
			$lelang = kode_tbl().'lelang';
			$dealer = kode_tbl().'dealer';
			$detail_dealer = kode_tbl().'detail_dealer';
			$detail_kendaraan = kode_tbl().'detail_kendaraan';
			$komponen_member = kode_tbl().'komponen_member';
			$tahun_mobil = kode_tbl().'tahun_mobil';
			$merek_mobil = kode_tbl().'merek_mobil';
			$model_mobil = kode_tbl().'model_mobil';
			$transmisi_mobil = kode_tbl().'transmisi_mobil';
			$user_id = $this->auth->get_user_data()->pegawai_id;

			$this->db->select('
				a.id AS iddetaildealer,
				a.id_kendaraan,
				a.id_dealer AS iddealer,
				b.*,
				c.nama_komponen,
				c.file_komponen,
				d.tahun_mobil,
				e.merek_mobil,
				f.model_mobil,
				g.transmisi_mobil
			');

			$this->db->where('a.id', $id);
			$this->db->where('c.status_gambar', '1');
			$this->db->join("$detail_kendaraan b",'a.id_kendaraan=b.id');
			$this->db->join("$komponen_member c",'b.id=c.id_detail_kendaraan');
			$this->db->join("$tahun_mobil d", "b.id_tahun = d.id");
			$this->db->join("$merek_mobil e","b.id_merek = e.id");
			$this->db->join("$model_mobil f","b.id_model = f.id");
			$this->db->join("$transmisi_mobil g","b.id_transmisi = g.id");
			$mobil_favorit = $this->db->get("$detail_dealer a")->row();

      $this->load->model('Welcome_model');
      $mf = $this->Welcome_model->count_bidding_favorit($user_id);
      $bidding_favorit=count($mf);

			$idkendaraan=$mobil_favorit->id_kendaraan;
			$iddealer=$mobil_favorit->iddealer;

			$this->db->select('
        a.bid_ke,
				b.nama_dealer,
				b.pemilik_dealer
			');
			$this->db->order_by('jam_bidding','DESC');
      $this->db->where('a.id_dealer', $user_id);
			$this->db->where('a.id_detail_kendaraan', $idkendaraan);
			$this->db->join("$dealer b",'a.id_dealer=b.id');
			$data_dealer = $this->db->get("$lelang a")->row();

			$this->db->select('
				a.file_komponen
			');
			$this->db->group_by('a.id');
			$this->db->where('a.id_detail_kendaraan', $idkendaraan);
			$this->db->where('a.status_tampil', '1');
			$this->db->join("$detail_kendaraan b",'a.id_detail_kendaraan=b.id');
			$this->db->join("$detail_dealer c",'b.id=c.id_kendaraan');
			$dokumen_mobil = $this->db->get("$komponen_member a")->result();

			$this->db->select('
				a.file_komponen,
				a.nama_komponen,
				a.keterangan_komponen
			');
			$this->db->group_by('a.id');
			$this->db->where('a.id_detail_kendaraan', $idkendaraan);
			$this->db->where('a.status_tampil', '2');
			$this->db->join("$detail_kendaraan b",'a.id_detail_kendaraan=b.id');
			$this->db->join("$detail_dealer c",'b.id=c.id_kendaraan');
			$foto_kerusakan = $this->db->get("$komponen_member a")->result();


			// var_dump($id_kendaraan); die();

				$template_header  = 'templates/responsive/showroom/header';
				$template_body    = 'templates/responsive/showroom/detail';
				$template_bottom  = 'templates/responsive/showroom/footer';

        //var_dump($data_aktivitas); die();
        $this->load->view($template_header, array(
          'bidding_favorit' => $bidding_favorit,
          'aplikasi' => $this->aplikasi,
          '_css_tag' => array(_Asset_JS_ . 'cleditor/jquery.cleditor', _Asset_CSS_ . 'default', _Asset_CSS_ . 'themes/default/easyui', _Asset_CSS_ . 'themes/icon', _Asset_CSS_ . 'bootstraps/font-awesome.min'),
          'query_pesan' => $this->query_pesan,
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
          'mobil_favorit' => $mobil_favorit,
					'dokumen_mobil' => $dokumen_mobil,
					'foto_kerusakan' => $foto_kerusakan,
					'data_dealer' => $data_dealer,
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
          _Asset_JS_ . 'cleditor/jquery.cleditor.min'))
				);
		}

		function delete_favorit(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$id = $this->input->post('id_detail');

				if (!$id) {
						redirect(base_url() . 'mobil_tersedia');
				} else {
						$this->db->where('id', $id);
						$this->db->delete(kode_tbl().'detail_dealer');

						$this->session->set_flashdata('result', 'Mobil telah dihapus dari daftar favorit.');
						$this->session->set_flashdata('mode_alert', 'success');
						redirect(base_url() . 'favorit');
				}
			}
		}



}
