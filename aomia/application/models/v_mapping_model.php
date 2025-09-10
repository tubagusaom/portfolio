<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class V_mapping_model extends MY_Model {

     public function __construct() {
        $this->_table = "v_mapping";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Data Penugasan';
    protected $_columns = array(
        'nama_appraisal' => array(
            'label' => '<b>Appraisal</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'nama_member' => array(
            'label' => '<b>Customer</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'tahun_mobil' => array(
            'label' => '<b>Tahun Mobil</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'merek_mobil' => array(
            'label' => '<b>Merek Mobil</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'model_mobil' => array(
            'label' => '<b>Model Mobil</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'td' => array(
            'label' => '<b>Transmisi Mobil</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        )
    );

    protected $_order = array("id" => "DESC");
    protected $_unique = array('unique' => array('id'), 'group' => false);



}
