<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Tahun_mobil_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_tbl()."tahun_mobil";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Tahun Mobil';
    protected $_columns = array(
        'tahun_mobil' => array(
            'label' => '<b>TAHUN</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
    );

    protected $_order = array("tahun_mobil" => "DESC");
    protected $_unique = array('unique' => array('id'), 'group' => false);



}
