<?php

class Jadwal_uji_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function data_jadwal(){
        $this->db->select('a.*,b.tuk');
        $this->db->from(kode_lsp().'jadual_asesmen a');
        $this->db->join(kode_lsp().'tuk b','a.id_tuk=b.id');
        $query = $this->db->get();
        return $query->result();
    }

    function data_view(){
        $this->db->select('*');
        $this->db->from(kode_lsp().'jadual_asesmen');
        $query = $this->db->get()->row();
        return $query;
    }
}