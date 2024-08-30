<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Mapping_appraisal_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_tbl()."mapping_appraisal";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Data Penugasan';
    protected $_columns = array(
        'id_karyawan' => array(
            'label' => '<b>Appraisal</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'nama',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'id_detail_kendaraan' => array(
            'label' => '<b>Customer</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
    );

    protected $belongs_to = array(
        'nama' => array(
            'model' => 'Pegawai_model',
            'primary_key' => 'id_karyawan',
            'retrieve_columns' => array('nama'),
            'join_type' => 'left'
        )
        // ,
        // 'nama_member' => array(
        //     'model' => 'Member_model',
        //     'primary_key' => 'id_member',
        //     'retrieve_columns' => array('nama_member'),
        //     'join_type' => 'left'
        // )
    );

    protected $_order = array("id" => "DESC");
    protected $_unique = array('unique' => array('id'), 'group' => false);


    function get_member($id) {
      $member = kode_tbl().'member';
      $kendaraan = kode_tbl().'detail_kendaraan';
      $this->db->select('a.*,b.id AS id_detail_kendaraan');
      $this->db->from("$member a");
      $this->db->join("$kendaraan b", "b.id_member = a.id");
      $this->db->where("b.id", $id);

      $query = $this->db->get();
      return $query->row();
    }

    function detail_kendaraan($id) {
      $detail_kendaraan = kode_tbl().'detail_kendaraan';
      $this->db->select('*');
      $this->db->from("$detail_kendaraan");
      $this->db->where("id", $id);

      $query = $this->db->get();
      return $query->row();
    }

    function komponen_member($id) {
      $komponen = kode_tbl().'komponen_member';
      $this->db->select('*');
      $this->db->from("$komponen");
      $this->db->where("id_detail_kendaraan", $id);

      $query = $this->db->get();
      return $query->row();
    }

    function jenis_komponen() {
      $jenis_komponen = kode_tbl().'jenis_komponen';
      $this->db->select('*');
      $this->db->from("$jenis_komponen");
      $this->db->order_by('id','ASC');

      $query = $this->db->get();
      return $query->result();
    }

    function data_mapping($pegawai_id) {

      $mapping          = kode_tbl().'mapping_appraisal';
      $member           = kode_tbl().'member';
      $kendaraan        = kode_tbl().'detail_kendaraan';
      $tahun_mobil      = kode_tbl().'tahun_mobil';
      $merek_mobil      = kode_tbl().'merek_mobil';
      $model_mobil      = kode_tbl().'model_mobil';
      $transmisi_mobil  = kode_tbl().'transmisi_mobil';

      $this->db->select('a.*,c.id AS id_member,c.*,b.nopol_kendaraan,b.status_lelang, d.tahun_mobil, e.merek_mobil, f.model_mobil, g.transmisi_mobil');
      // $this->db->select('a.*');
      $this->db->from("$mapping a");
      $this->db->join("$kendaraan b", "a.id_detail_kendaraan = b.id");
      $this->db->join("$member c", "b.id_member = c.id");
      $this->db->join("$tahun_mobil d", "b.id_tahun = d.id");
      $this->db->join("$merek_mobil e","b.id_merek = e.id");
      $this->db->join("$model_mobil f","b.id_model = f.id");
      $this->db->join("$transmisi_mobil g","b.id_transmisi = g.id");
      // $this->db->group_by('a.id');

      $this->db->where("a.id_karyawan", $pegawai_id);
      // $this->db->order_by('id','DESC');
      $query = $this->db->get();
      return $query->result();
    }

    function file_komponen($id) {

      $jenis_komponen   = kode_tbl().'jenis_komponen';
      $komponen         = kode_tbl().'komponen_member';
      $member           = kode_tbl().'member';
      // $jenis            = kode_tbl().'jenis_komponen';

      // $this->db->select('a.*,b.*,c.*');
      $this->db->select('a.*,b.nama_jenis');
      // $this->db->from("$jenis_komponen a");
      // $this->db->join("$komponen b", "a.id = b.id_jenis");
      // $this->db->join("$member c", "b.id_member = c.id");
      // $this->db->join("$jenis d", "a.id_jenis = d.id");
      // $this->db->group_by('b.id_member');

      $this->db->from("$komponen a");
      $this->db->join("$jenis_komponen b", "a.id_jenis = b.id");
      // $this->db->join("$member c", "a.id_member = c.id");
      // $this->db->group_by('a.id_jenis');

      $this->db->where("a.id_detail_kendaraan", $id);
      // $this->db->order_by('id','DESC');
      $query = $this->db->get();
      return $query->result();
    }

    function jenis_komponen_mapping($id) {
      $jenis     = kode_tbl().'jenis_komponen';
      $komponen  = kode_tbl().'komponen_member';

      $this->db->select('a.*');
      $this->db->from("$jenis a");
      $this->db->join("$komponen b", "a.id = b.id_jenis");
      $this->db->where("b.id_detail_kendaraan", $id);
      $this->db->group_by('b.id_jenis');

      $query = $this->db->get();
      return $query->result();
    }


}
