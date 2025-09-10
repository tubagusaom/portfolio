<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
Class Welcome_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    function count_bidding_favorit($pegawai_id){
      $this->db->select('a.id');
      $this->db->from(kode_tbl().'detail_dealer a');
      $this->db->join(kode_tbl().'detail_kendaraan b','a.id_kendaraan=b.id');
      $this->db->where('a.id_dealer', $pegawai_id);
      $this->db->where('b.status_lelang', '1');
      $query = $this->db->get();
      return $query->result();
    }

    function get_data_faq(){
        $this->db->from('t_faq');
        $this->db->where('u_status','A');
        $query = $this->db->get();
        return $query->result();
    }
    function get_province(){
        $hasil = $this->db->query("SELECT * FROM provinces");
        return $hasil->result();
    }

    function get_kota($id){
        $hasil = $this->db->query("SELECT * FROM regencies WHERE province_id='$id'");
        return $hasil->result();
    }

    function dataPengunjung(){
        $tanggal = date('Y-m-d');

        $query = $this->db->query("SELECT * FROM t_counter WHERE tanggal='$tanggal'");
        return $query->num_rows();
    }
    function totalPengunjung(){
        //$query = $this->db->query("SELECT COUNT(hits) FROM t_counter");
        return $this->db->count_all('t_counter');
    }

}
