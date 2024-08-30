<?php

class Penetapan_skema_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function data_penetapan_skema(){
        $this->db->select('a.*,b.jadual,c.skema');
        $this->db->from(kode_lsp().'mapping_skema a');
        $this->db->join(kode_lsp().'jadual_asesmen b','a.id_jadwal=b.id');
        $this->db->join(kode_lsp().'skema c','a.id_skema=c.id');
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