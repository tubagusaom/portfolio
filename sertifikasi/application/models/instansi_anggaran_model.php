<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Instansi_anggaran_model extends MY_Model {

     public function __construct() {
        $this->_table = "master_instansi_anggaran";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Data Instansi Anggaran';
    protected $_columns = array(
        'instansi_pemberi_anggaran' => array(
            'label' => 'Instansi Pemberi Anggaran',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 450,

        )
    );

    protected $_order = array("id" => "DESC");

    protected $_unique = array('unique' => array('id'), 'group' => false);

    function get_instansi_anggaran(){
      $instansi = 'master_instansi_anggaran';
      $this->db->select('*');
      $this->db->from("$instansi a");
      $query = $this->db->get();
      return $query->result();
    }

}
