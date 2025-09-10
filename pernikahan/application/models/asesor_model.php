<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
Class Asesor_model extends MY_Model {

    public function __construct() {
        $this->_table = kode_lsp()."users"; 
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Data Asesor Kompetensi';
    protected $_columns = array(
        'users' => array(
            'label' => 'Nama Asesor',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'no_reg' => array(
            'label' => 'No Registrasi',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'email' => array(
            'label' => 'Email',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'hp' => array(
            'label' => 'HP',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'is_users' => array(
            'label' => 'Akun ',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 50,
            'align' => 'center'
        ),
        'id_group_users' => array(
            'label' => 'Akun Users',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 50,
            'hidden' => true
        ),
        'tgl_expired' => array(
            'label' => 'Expired Date',
            'rule' => 'trim|xss_clean',
            'formatter' => 'general_date',
            'save_formatter' => 'date',
            'width' => 90,
            'align' =>'center',
        )

    );
    protected $_order = array("id" => "DESC");

    protected $_unique = array('unique' => array('no_reg'), 'group' => false);

     
}
