<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Transmisi_mobil_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_tbl()."transmisi_mobil";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Transmisi Mobil';
    protected $_columns = array(
        'id_model' => array(
            'label' => 'Mobil',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'mmt',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'transmisi_mobil' => array(
            'label' => 'Transmisi Mobil',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 30
        ),
        'description' => array(
            'label' => 'Description',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 30
        )
    );

    protected $belongs_to = array(
        'mmt' => array(
            'model' => 'V_model_mobil',
            'primary_key' => 'id_model',
            'retrieve_columns' => array('mmt'),
            'join_type' => 'left'
        )
    );

    protected $_order = array("id" => "DESC");
    protected $_unique = array('unique' => array('id'), 'group' => false);



}
