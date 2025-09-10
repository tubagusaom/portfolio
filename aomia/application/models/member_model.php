<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Member_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_tbl()."member";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Data Customer';
    protected $_columns = array(
        'nama_member' => array(
            'label' => '<b>Customer</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'no_hp_member' => array(
            'label' => '<b>No.HP</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'email_member' => array(
            'label' => '<b>Email</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'status_member' => array(
            'label' => '<b>Status</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => array(
                '<b style="background: grey; color:#fff; padding: 3px; border-radius: 3px; font-size:10px">Baru</b>',
                '<b style="background: red; color:#fff; padding: 3px; border-radius: 3px; font-size:10px">Ditolak</b>',
                '<b style="background: green; color:#fff; padding: 3px; border-radius: 3px; font-size:10px">Lanjut</b>'
              ),
            'save_formatter' => 'string',
            'width' => 70,
            'align' =>'center'
        ),
        'akun_member' => array(
            'label' => '<b>Akun</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => array(
                '<b style="background: red; color:#fff; padding: 3px; border-radius: 3px; font-size:10px">&#10006;</b>', //close
                '<b style="background: green; color:#fff; padding: 3px; border-radius: 3px; font-size:10px">&#10004;</b>', //check
                '<b style="background: green; color:#fff; padding: 3px; border-radius: 3px; font-size:10px">&#10004;</b>' //check
              ),
            'save_formatter' => 'string',
            'width' => 50,
            'align' =>'center'
        ),
    );

    protected $_order = array("id" => "DESC");
    protected $_unique = array('unique' => array('no_hp_dealer'), 'group'=>false);


    public function detail_kendaraan($id) {
        $this->db->select('c.tahun_mobil,d.merek_mobil,e.model_mobil,f.transmisi_mobil');
        $this->db->from(kode_tbl() . 'detail_kendaraan a');
        $this->db->join(kode_tbl() . 'member b', 'a.id_member=b.id');
        $this->db->join(kode_tbl() . 'tahun_mobil c', 'a.id_tahun=c.id');
        $this->db->join(kode_tbl() . 'merek_mobil d', 'a.id_merek=d.id');
        $this->db->join(kode_tbl() . 'model_mobil e', 'a.id_model=e.id');
        $this->db->join(kode_tbl() . 'transmisi_mobil f', 'a.id_transmisi=f.id');
        $this->db->where('a.id_member', $id);
        $query = $this->db->get();
        return $query->row();
    }



}
