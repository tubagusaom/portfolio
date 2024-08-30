<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Model_mobil_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_tbl()."model_mobil";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Model Mobil';
    protected $_columns = array(
        'id_merek' => array(
            'label' => 'Merek Tahun',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'model_mobil' => array(
            'label' => 'Model Mobil',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        )
    );

    // protected $belongs_to = array(
    //     'mt' => array(
    //         'model' => 'V_merek_tahun_model',
    //         'primary_key' => 'id_merek',
    //         'retrieve_columns' => array('mt'),
    //         'join_type' => 'left'
    //     )
    // );

    protected $_order = array("id" => "DESC");
    protected $_unique = array('unique' => array('id'), 'group' => false);



}
