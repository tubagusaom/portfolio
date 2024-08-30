<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class V_model_mobil extends MY_Model {

     public function __construct() {
        $this->_table = "v_model_mobil";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Model Mobil';
    protected $_columns = array(
        'model_mobil_model' => array(
            'label' => '<b>MODEL</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'merek_mobil_model' => array(
            'label' => '<b>MEREK</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'tahun_mobil_model' => array(
            'label' => '<b>TAHUN</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'mmt' => array(
            'label' => '<b>TAHUN</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => 'true'
        )
    );

    protected $_order = array("id" => "DESC");
    protected $_unique = array('unique' => array('id'), 'group' => false);



}
