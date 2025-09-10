<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Posisi_Adsense_Model extends MY_Model {

     public function __construct() {
        $this->_table = kode_tbl()."adsense_posisi";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Posisi';
    protected $_columns = array(
        'posisi' => array(
            'label' => '<b>Posisi</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
    );

//    protected $belongs_to = array(
//        'jabatan' => array(
//            'model' => 'jabatan_model',
//            'primary_key' => 'jabatan_id',
//            'retrieve_columns' => array('jabatan')
//        )
//    );
//
//    function url2images($url)
//    {
//        return "<img width=100px height=130px src='" . base_url() . "assets/img/karyawan/" . $url . "'/>";
//    }
//
    protected $_order = "id";
    protected $_unique = array('unique' => array('id'), 'group' => false);



}
