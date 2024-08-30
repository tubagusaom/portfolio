<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Pendaftaran_dealer_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_tbl()."dealer";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Data Dealer';
    protected $_columns = array(
        'nama_dealer' => array(
            'label' => 'Dealer',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'pemilik_dealer' => array(
            'label' => 'Pemilik',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'no_hp_dealer' => array(
            'label' => 'No.HP',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'email_dealer' => array(
            'label' => 'Email',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'alamat_dealer' => array(
            'label' => 'Alamat',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'akun_dealer' => array(
            'label' => 'Akun',
            'rule' => 'trim|xss_clean',
            'formatter' => array('<label style="background-color:red;color:white;">N</label>', '<label style="background-color:green;color:white;">Y</label>'),
            'save_formatter' => 'string',
            'width' => 50,
            'align' =>'center',
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
    protected $_order = array("id" => "DESC");
    // protected $_unique = array('unique' => array('id'), 'group' => false);
    protected $_unique = array('unique' => array('no_hp_dealer'), 'group'=>false);



}
