<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Jenis_komponen_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_tbl()."jenis_komponen";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Jenis Komponen';
    protected $_columns = array(
        'nama_jenis' => array(
            'label' => '<b>Jenis Komponen</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
    );

    protected $_order = array("id" => "DESC");
    protected $_unique = array('unique' => array('id'), 'group' => false);



}
