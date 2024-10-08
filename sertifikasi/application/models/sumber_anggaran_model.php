<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Sumber_anggaran_model extends MY_Model {

     public function __construct() {
        $this->_table = "master_sumber_anggaran";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Data Sumber Anggaran';
    protected $_columns = array(
        'jenis_anggaran' => array(
            'label' => 'Jenis Anggaran',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 450,

        )
    );

    protected $_order = array("id" => "DESC");

    protected $_unique = array('unique' => array('id'), 'group' => false);

    function get_sumber_anggaran(){
      $sumber = 'master_sumber_anggaran';
      $this->db->select('*');
      $this->db->from("$sumber a");
      $query = $this->db->get();
      return $query->result();
    }

}
