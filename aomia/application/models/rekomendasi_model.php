<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Rekomendasi_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_tbl()."detail_kendaraan";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Data Rekomendasi';
    protected $_columns = array(
        'id_member' => array(
            'label' => '<b>Customer</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'nama_member',
            'save_formatter' => 'string',
            'width' => 100
        ),
        'harga_kendaraan' => array(
            'label' => '<b>Harga</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130
        ),
        'status_rekomendasi' => array(
            'label' => '<b>Rekomendasi</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130
        ),

        //batas
        'nopol_kendaraan' => array(
            'label' => '<b>No.Pol</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 50,
            'hidden' => true
        ),
        'jenis_kendaraan' => array(
            'label' => '<b>Jenis</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),
        'jumlah_bangku' => array(
            'label' => '<b>Jumlah Bangku</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),
        'spidometer_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        ),
        'bbm_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        ),
        'jumlah_kepemilikan_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        ),
        'status_pajak_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        ),
        'pajak_ditanggung_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        ),
        'asuransi_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        ),
        'catatan_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        )
    );

    protected $belongs_to = array(
        'nama_member' => array(
            'model' => 'member_model',
            'primary_key' => 'id_member',
            'retrieve_columns' => array('nama_member')
        )
        // ,
        // 'nama' => array(
        //     'model' => 'pegawai_model',
        //     'primary_key' => 'id_appraisal',
        //     'retrieve_columns' => array('nama')
        // )
    );

//
//    function url2images($url)
//    {
//        return "<img width=100px height=130px src='" . base_url() . "assets/img/karyawan/" . $url . "'/>";
//    }
//
    protected $_order = array("id" => "DESC");
    // protected $_unique = array('unique' => array('id'), 'group' => false);
    protected $_unique = array('unique' => array('id'), 'group'=>false);

    function dokumen_member($id){
        $this->db->where('id_detail_kendaraan',$id);
        // $this->db->where('status_tampil','1');
        $query = $this->db->get('tbl3133_komponen_member')->result();
        return $query;
    }

    function jenis_komponen($id){

        $jenis     = 'tbl3133_jenis_komponen';
        $komponen  = 'tbl3133_komponen_member';

        $this->db->select('a.*');
        $this->db->from("$jenis a");
        $this->db->join("$komponen b", "a.id = b.id_jenis");
        $this->db->where("b.id_detail_kendaraan", $id);
        // $this->db->where('b.status_tampil',1);
        $this->db->group_by('b.id_jenis');

        $query = $this->db->get();
        return $query->result();
    }

    function detail_kendaraan($id){
      $detail_kendaraan = kode_tbl().'detail_kendaraan';
      $tahun_mobil = kode_tbl().'tahun_mobil';
      $merek_mobil = kode_tbl().'merek_mobil';
      $model_mobil = kode_tbl().'model_mobil';
      $transmisi_mobil = kode_tbl().'transmisi_mobil';
      $member = kode_tbl().'member';

      $this->db->select('a.*, b.tahun_mobil, c.merek_mobil, d.model_mobil, e.transmisi_mobil, f.nama_member');
      $this->db->from("$detail_kendaraan a");
      $this->db->join("$tahun_mobil b", "a.id_tahun = b.id");
      $this->db->join("$merek_mobil c","a.id_merek = c.id");
      $this->db->join("$model_mobil d","a.id_model = d.id");
      $this->db->join("$transmisi_mobil e","a.id_transmisi = e.id");
      $this->db->join("$member f","a.id_member = f.id");
      // $this->db->group_by('a.id');

      $this->db->where("a.id", $id);
      // $this->db->order_by('id','DESC');
      $query = $this->db->get();
      return $query->row();
    }



}
