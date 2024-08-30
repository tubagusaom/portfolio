<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Detail_member_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_tbl()."detail_kendaraan";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Data Customer';
    protected $_columns = array(
        'nopol_kendaraan' => array(
            'label' => '<b>Nama</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'jenis_kendaraan' => array(
            'label' => '<b>No.HP</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'jumlah_bangku' => array(
            'label' => '<b>Email</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'spidometer_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130
        ),
        'bbm_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130
        ),
        'jumlah_kepemilikan_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130
        ),
        'status_pajak_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130
        ),
        'pajak_ditanggung_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130
        ),
        'asuransi_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130
        ),
        'harga_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130
        ),
        'catatan_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130
        ),
        'id_member' => array(
            'label' => '<b>Tahun</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'tahun_mobil',
            'save_formatter' => 'string',
            'width' => 50
        ),
    );

//
//    function url2images($url)
//    {
//        return "<img width=100px height=130px src='" . base_url() . "assets/img/karyawan/" . $url . "'/>";
//    }
//
    protected $_order = array("id" => "DESC");
    // protected $_unique = array('unique' => array('id'), 'group' => false);
    protected $_unique = array('unique' => array('id'), 'group'=>false);



}
