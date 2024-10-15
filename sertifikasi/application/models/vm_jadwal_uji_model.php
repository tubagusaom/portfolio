<?php

class Vm_jadwal_uji_model extends MY_Model
{
    // function __construct()
    // {
    //     parent::__construct();
    // }

    public function __construct() {
        $this->_table = kode_lsp() . "jadual_asesmen";
        parent::__construct($this->_table);
    }

    protected $_table;
    protected $table_label = 'Data Jadwal Asesmen';

    function data_jadwal(){
        $this->db->select('a.*,b.tuk');
        $this->db->from(kode_lsp().'jadual_asesmen a');
        $this->db->join(kode_lsp().'tuk b','a.id_tuk=b.id');
        $query = $this->db->get()->result();
        return $query;
    }

    // function data_jadwal() {
    //     $query = $this->db->get(kode_lsp() . 'jadual_asesmen')->result();
    //     return $query;
    // }

    function data_view(){
        $this->db->select('*');
        $this->db->from(kode_lsp().'jadual_asesmen');
        $query = $this->db->get()->row();
        return $query;
    }
}