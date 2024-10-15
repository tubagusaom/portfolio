<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
Class Permohonan_blanko_model extends MY_Model {

    protected $_table = 't_permohonan_blanko';
    protected $table_label = 'Data Permohonan Blanko';
    protected $_columns = array(
        'nomor_permohonan' => array(
            'label' => 'Nomor Permohonan Blanko',
            'rule' => 'trim|xss_clean|required',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'nomor_keputusan' => array(
            'label' => 'Nomor Keputusan LSP',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'tgl_permohonan' => array(
            'label' => 'Tanggal Permohonan Blanko',
            'rule' => 'trim|xss_clean',
            'formatter' => 'general_date',
            'save_formatter' => 'date',
            'width' => 150
        ),
        'jadwal_id' => array(
            'label' => 'Jadwal Uji',
            'rule' => '',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 50,
            'hidden' => true
        ),
        'no_urut' => array(
            'label' => 'Jadwal Uji',
            'rule' => '',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 50,
            'hidden' => true
        ),
        'jumlah_kompeten' => array(
            'label' => 'Jumlah Kompeten',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 100,

        )
    );
    protected $_order = array("id" => "DESC");
    protected $belongs_to = array(
          'tuk' =>  array(
          	'model' => 'tuk_model',
          	'primary_key' => 'tuk_id',
          	'retrieve_columns' => array('tuk'),
          	'join_type' => 'left'
          ),
          'skema' =>  array(
          	'model' => 'skema_model',
          	'primary_key' => 'skema_id',
          	'retrieve_columns' => array('skema'),
          	'join_type' => 'left'
          )
      );
    protected $_unique = array('unique' => array('id'), 'group' => false);


    function __construct() {
        parent::__construct();
    }


    function get_skema($id){
    	$this->db->select('a.skema_sertifikasi, b.skema, b.bidang');
    	$this->db->from(kode_lsp().'asesi a');
        $this->db->join(kode_lsp().'skema b','a.skema_sertifikasi=b.id');
    	$this->db->where('a.jadwal_id', $id);
    	$query = $this->db->get()->row();
    	return $query;
    }
    function get_by_id($id){
        $this->db->select('a.*');
        $this->db->from('t_permohonan_blanko a');
        $this->db->where('a.id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    function get_tanggal_uji($id){
        $this->db->select('a.tanggal');
        $this->db->from(kode_lsp().'jadual_asesmen a');
        $this->db->where('a.id', $id);
        $query = $this->db->get()->row();
        return $query->tanggal;
    }
    function get_jadwal_uji($id){
        $this->db->select('a.*');
        $this->db->from(kode_lsp().'jadual_asesmen a');
        $this->db->where('a.id', $id);
        $query = $this->db->get()->row();
        return $query;
    }
    function get_sk_tuk($id){
    	$this->db->select('b.sk_tuk');
        $this->db->from(kode_lsp().'jadual_asesmen a');
        $this->db->join(kode_lsp().'tuk b','a.id_tuk=b.id');
        $this->db->where('a.id', $id);
        $query = $this->db->get()->row();
        return $query->sk_tuk;
    }
    function get_tuk($id){
        $this->db->select('b.tuk, b.sk_tuk, b.ketua_tuk, b.bid_mutu, b.bid_teknis');
        $this->db->from(kode_lsp().'jadual_asesmen a');
        $this->db->join(kode_lsp().'tuk b','a.id_tuk=b.id');
        $this->db->where('a.id', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    function get_asesor($id){
    	$this->db->select('b.users,b.no_reg');
    	$this->db->from(kode_lsp().'users b');
    	$this->db->where_in('b.id', $id);
    	$query = $this->db->get()->result();

    	return $query;
    }

    function get_id_asesor($id){
        $this->db->select('id_asesor');
        $this->db->where('jadwal_id', $id);
        $this->db->group_by('id_asesor');
        return $this->db->get(kode_lsp().'asesi')->result();
    }

    function get_asesi($id){

    	$this->db->select('a.nama_lengkap, a.organisasi,a.skema_sertifikasi, a.rekomendasi_asesor, a.jadwal_id, b.skema, b.bidang');
    	$this->db->from(kode_lsp().'asesi a');
        $this->db->join(kode_lsp().'skema b', 'a.skema_sertifikasi = b.id');
    	$this->db->where('a.jadwal_id', $id);
    	$query = $this->db->get();
    	return $query->result();
    }

    function info_jadwal($id){
		$this->db->select('a.*, b.*');
		$this->db->from(kode_lsp().'jadual_asesmen a');
		$this->db->join(kode_lsp().'tuk b', 'a.id_tuk = b.id');


		$this->db->where('a.id', $id);
		$result = $this->db->get();
		return $result->row();
    }
    function info_skema($id){
        $this->db->where('id', $id);
        $query = $this->db->get(kode_lsp().'skema');
        return $query->row();
    }
    function get_asesi_lengkap($id){
    	$this->db->select('a.nama_lengkap, a.no_identitas, a.tempat_lahir, a.tgl_lahir,a.jenis_kelamin, a.email, a.organisasi, a.jadwal_id, a.telp, a.rekomendasi_asesor, a.alamat, b.users, b.no_reg,a.id_provinsi,a.id_kabupaten,a.id_pendidikan,a.id_pekerjaan,a.id_instansi_anggaran,a.id_sumber_anggaran, c.tuk, c.no_cab, d.skema, d.kode_skema, e.tanggal, d.bidang');
    	$this->db->from(kode_lsp().'asesi a');
    	$this->db->join(kode_lsp().'users b', 'a.id_asesor = b.id', 'LEFT');
    	$this->db->join(kode_lsp().'tuk c', 'a.id_tuk = c.id', 'LEFT');
    	$this->db->join(kode_lsp().'skema d', 'a.skema_sertifikasi = d.id', 'LEFT');
    	$this->db->join(kode_lsp().'jadual_asesmen e', 'a.jadwal_id = e.id', 'LEFT');
    	$this->db->where_in('a.jadwal_id', $id);
    	$query = $this->db->get();
    	return $query->result_array();
    }
    function asesi_k($id){
        $this->db->select('id, jadwal_id');
        $this->db->where('jadwal_id', $id);
        $this->db->where('rekomendasi_asesor', '1');
        $query = $this->db->get(kode_lsp().'asesi');
        return $query->result();
    }
    function asesi_bk($id){
        $this->db->select('id, jadwal_id');
        $this->db->where('jadwal_id', $id);
        $this->db->where('rekomendasi_asesor', '2');
        $query = $this->db->get(kode_lsp().'asesi');
        return $query->result();
    }


    function no_urut_permohonan(){
      $tahun = date('Y');

      $this->db->select_max('no_urut');
      $this->db->from('t_permohonan_blanko');
      // $this->db->where('id !=',$id);
      $this->db->where('YEAR(tgl_permohonan)', $tahun);
      $query = $this->db->get()->row();

      $no_urut_permohonan = $query->no_urut + 1;
      if ($query->no_urut == "" || $query->no_urut == 0) {
        $no_urut_permohonan = 1;
      }else {
        $no_urut_permohonan = $query->no_urut + 1;
      }
      return $no_urut_permohonan;
    }
    function permohonan_blanko($id){
        $this->db->where('id',$id);
        $jadwal_asesmen = $this->db->get('t_permohonan_blanko a')->row();
        return $jadwal_asesmen;
    }
    function no_permohonan($id){
      $this->db->select('a.*');
      $this->db->from('t_permohonan_blanko a');
      $this->db->where('a.id',$id);
      $query = $this->db->get()->row();

      if ($query->no_urut == "" OR $query->no_urut == 0) {
        $no_urut = sprintf('%04s', 0);
      }else {
        $no_urut = sprintf('%04s', $query->no_urut);
      }

      $no_jadwal = 'LSP-ITK_.UJK-'.$no_urut. '.' .substr($query->tgl_permohonan,0,4). '' .substr($query->tgl_permohonan,5,2). '' .substr($query->tgl_permohonan,8,2);
      return $no_jadwal;
    }

}
