<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Jadwal_asesor_model extends MY_Model {

    protected $_table;
    protected $table_label = 'Data Jadwal Asesor';
    protected $_columns = array(

        'tanggal_bersedia' => array(
            'label' => 'Available date',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'general_date',
            'save_formatter' => 'date',
            'width' => 150
        ),
        'id_asesor' => array(
            'label' => 'Nama Asesor',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'users',
            'save_formatter' => 'string',
            'width' => 280
        )
    );

    protected $belongs_to = array(
        'user' => array(
            'model' => 'asesor_model',
            'primary_key' => 'id_asesor',
            'retrieve_columns' => array('users'),
            'join_type' => 'left'
        )
    );

    protected $_order = array("tanggal_bersedia" => "DESC");
    protected $_unique = array('unique' => array('id'), 'group' => false);
    function __construct() {
        parent::__construct();
        $this->_table = kode_lsp()."jadwal_asesor";
        parent::__construct($this->_table);
    }
   
}