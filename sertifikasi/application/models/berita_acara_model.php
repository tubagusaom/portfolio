<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Berita_acara_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_lsp()."jadual_asesmen";
        parent::__construct($this->_table);
    }
    protected $_table;

    protected $table_label = 'Berita Acara Asesmen';
    protected $_columns = array(
        'kode_jadwal' => array(
            'label' => '<b>Kode Jadwal</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 200,
        ),
        'nomor_permohonan' => array(
            'label' => 'No Permohonan',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => 'true'
        ),
        'nomor_keputusan' => array(
            'label' => 'No Keputusan',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 100,
            'hidden' => 'true'
        ),
        'tgl_permohonan' => array(
            'label' => 'No Keputusan',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 100,
            'hidden' => 'true'
        ),
        'jadual' => array(
            'label' => 'Nama Jadwal',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 500,
        ),
        'tanggal' => array(
            'label' => 'Start Date',
            'rule' => 'trim|xss_clean',
            'formatter' => 'general_date',
            'save_formatter' => 'date',
            'width' => 100,
            'align' =>'center',
        ),
        'status_jadwal' => array(
            'label' => 'Status',
            'rule' => 'trim|xss_clean',
            'formatter' => array('-','Sudah Selesai','Dibatalkan','Pending'),
            'save_formatter' => 'string',
            'width' => 100,
            'align' =>'center',

        ),
        'dokumen_berita_acara' => array(
            'label' => 'Dokumen Lampiran',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 250,
            'hidden' => 'true'

        ),
        'ringkasan_asesmen' => array(
            'label' => 'Ringkasan Asesmen',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 250,

        )
    );
    protected $_order = array("id" => "DESC");

    protected $_unique = array('unique' => array('jadual'), 'group' => false);

    function daftar_hadir($id){
        $this->db->where('jadwal_id',$id);
        $detail_asesi = $this->db->get('lsp029_asesi')->result_array();
        return $detail_asesi;
    }
    function jadwal_asesmen($id){
        $this->db->where('id',$id);
        $jadwal_asesmen = $this->db->get(kode_lsp().'jadual_asesmen a')->row();
        return $jadwal_asesmen;
    }
    function no_registrasi($id){
        $aplikasi = $this->db->get('r_konfigurasi_aplikasi')->row();

        $this->db->select('b.kode_sektor');
        $this->db->from(kode_lsp().'asesi a');
        $this->db->join(kode_lsp().'skema b','a.skema_sertifikasi=b.id');
        $this->db->where('a.id',$id);
        $query = $this->db->get()->row();

        $this->db->where('tahun_penerbitan_sertifikat',date('Y'));
        $q = $this->db->get(kode_lsp().'asesi');
        $record = ($q->num_rows()) + ($aplikasi->no_urut_sertifikat);
        $no_urut = sprintf('%05s', $record);
        $no_registrasi = $query->kode_sektor.' '.$aplikasi->kode_lsp.' '.$no_urut.' '.date('Y');
        return $no_registrasi;
    }
    function no_sertifikat($id){
        $aplikasi = $this->db->get('r_konfigurasi_aplikasi')->row();
        $this->db->where('terbitkan_sertifikat','on');
        $q = $this->db->get(kode_lsp().'asesi');
        $record = $q->num_rows() +  $aplikasi->no_urut_sertifikat;
        $no_urut = sprintf('%07s', $record);

        $this->db->select('b.skema,b.kblui,b.kbji,b.jenjang');
        $this->db->from(kode_lsp().'asesi a');
        $this->db->join(kode_lsp().'skema b','a.skema_sertifikasi=b.id');
        $this->db->where('a.id',$id);
        $query = $this->db->get()->row();

        $no_sertifikat = $query->kblui.' '.$query->kbji.' '.$query->jenjang.' '.$no_urut.' '.date('Y');
        return $no_sertifikat;
    }

    function no_jadwal($id) {
      $this->db->select('a.*');
      $this->db->from(kode_lsp().'jadual_asesmen a');
      $this->db->where('a.id',$id);
      $query = $this->db->get()->row();

      if ($query->no_urut == "" OR $query->no_urut == 0) {
        $no_urut = sprintf('%04s', 0);
      }else {
        $no_urut = sprintf('%04s', $query->no_urut);
      }

      $no_jadwal = 'LSP-ITK_.UJK-'.$no_urut. '.' .substr($query->tanggal,0,4). '' .substr($query->tanggal,5,2). '' .substr($query->tanggal,8,2);
      return $no_jadwal;
    }

    function no_keputusan_surat($id){

      $bulan = date('n');
      $tahun = date('Y');

      $this->db->select_max('nomor_keputusan');
      $this->db->from(kode_lsp().'jadual_asesmen');
      $this->db->where('id !=',$id);
      $this->db->where('YEAR(tanggal)', $tahun);
      $query = $this->db->get()->row();
      $data = substr($query->nomor_keputusan,0,3);

      // $no_urut_permohonan = $query->nomor_keputusan + 1;
      if ($data == "" || $data == 0) {
        $no_urut = 1;
      }else {
        $no_urut = $data + 1;
      }

      $number = sprintf('%03d',$no_urut);

      $no_keputusan = $number . "/SK" . "/" . getRomawi($bulan) . '/' .$tahun;
      return $no_keputusan;
    }

    // 019/P-BLANKO/VII/2019
    function no_permohonan_blanko($id){

      $bulan = date('n');
      $tahun = date('Y');

      $this->db->select_max('nomor_permohonan');
      $this->db->from(kode_lsp().'jadual_asesmen');
      $this->db->where('id !=',$id);
      $this->db->where('YEAR(tanggal)', $tahun);
      $query = $this->db->get()->row();
      $data = substr($query->nomor_permohonan,0,3);

      if ($data == "" || $data == 0) {
        $no_urut = 1;
      }else {
        $no_urut = $data + 1;
      }

      $number = sprintf('%03d',$no_urut);

      $no_urut_permohonan = $number . "/P-BLANKO" . "/" . getRomawi($bulan) . '/' .$tahun;
      return $no_urut_permohonan;
    }

    function get_by_id($id){
        $this->db->select('*');
        $this->db->from(kode_lsp().'jadual_asesmen');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
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
    function get_skema($id){
    	$this->db->select('a.skema_sertifikasi, b.skema, b.bidang');
    	$this->db->from(kode_lsp().'asesi a');
        $this->db->join(kode_lsp().'skema b','a.skema_sertifikasi=b.id');
    	$this->db->where('a.jadwal_id', $id);
    	$query = $this->db->get()->row();
    	return $query;
    }
    function get_tanggal_uji($id){
        $this->db->select('a.tanggal');
        $this->db->from(kode_lsp().'jadual_asesmen a');
        $this->db->where('a.id', $id);
        $query = $this->db->get()->row();
        return $query->tanggal;
    }
    function info_jadwal($id){
		$this->db->select('a.*, b.*');
		$this->db->from(kode_lsp().'jadual_asesmen a');
		$this->db->join(kode_lsp().'tuk b', 'a.id_tuk = b.id');

		$this->db->where('a.id', $id);
		$result = $this->db->get();
		return $result->row();
    }
    function get_asesi($id){

    	$this->db->select('a.nama_lengkap, a.organisasi,a.skema_sertifikasi, a.rekomendasi_asesor, a.jadwal_id, b.skema, b.bidang');
    	$this->db->from(kode_lsp().'asesi a');
        $this->db->join(kode_lsp().'skema b', 'a.skema_sertifikasi = b.id');
    	$this->db->where('a.jadwal_id', $id);
    	$query = $this->db->get();
    	return $query->result();
    }
    function get_id_asesor($id){
        $this->db->select('id_asesor');
        $this->db->where('jadwal_id', $id);
        $this->db->group_by('id_asesor');
        return $this->db->get(kode_lsp().'asesi')->result();
    }
    function get_asesor($id){
    	$this->db->select('b.users,b.no_reg');
    	$this->db->from(kode_lsp().'users b');
    	$this->db->where_in('b.id', $id);
    	$query = $this->db->get()->result();

    	return $query;
    }
    function get_tuk($id){
        $this->db->select('b.tuk, b.sk_tuk, b.ketua_tuk, b.bid_mutu, b.bid_teknis');
        $this->db->from(kode_lsp().'jadual_asesmen a');
        $this->db->join(kode_lsp().'tuk b','a.id_tuk=b.id');
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


}
