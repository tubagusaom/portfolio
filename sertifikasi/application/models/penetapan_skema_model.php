<?php

class Penetapan_skema_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function data_penetapan_skema(){
        $this->db->select('a.*');
        $this->db->from(kode_lsp().'mapping_skema a');
        // $this->db->join(kode_lsp().'tuk b','a.id_tuk=b.id');
        $query = $this->db->get();
        return $query->result();
    }

    function data_view(){
        $this->db->select('*');
        $this->db->from(kode_lsp().'mapping_skema');
        $query = $this->db->get()->row();
        return $query;
    }
}