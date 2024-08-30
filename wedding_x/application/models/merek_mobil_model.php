<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Merek_mobil_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_tbl()."merek_mobil";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Merek Mobil';
    protected $_columns = array(
        'merek_mobil' => array(
            'label' => 'Merek Mobil',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'id_tahun' => array(
            'label' => 'Tahun Mobil',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'tahun_mobil',
            'save_formatter' => 'string',
            'width' => 150
        )
    );

    protected $belongs_to = array(
        'tahun_mobil' => array(
            'model' => 'tahun_mobil_model',
            'primary_key' => 'id_tahun',
            'retrieve_columns' => array('tahun_mobil'),
            'join_type' => 'left'
        )
    );

    protected $_order = array("id" => "DESC");
    protected $_unique = array('unique' => array('id'), 'group' => false);



}
