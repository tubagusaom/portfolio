<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Pegawai_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_tbl()."karyawan";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Data Anggota';
    protected $_columns = array(
				'nama' => array(
						'label' => '<b>Nama</b>',
						'rule' => 'trim|xss_clean',
						'formatter' => 'string',
						'save_formatter' => 'string',
						'width' => 150
				),
        'nik' => array(
            'label' => '<b>NIK</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
				'telepon' => array(
            'label' => '<b>No.HP</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
				'email' => array(
            'label' => '<b>Email</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
				'gender' => array(
            'label' => '<b>Klamin</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => array('Pria', 'Wanita'),
            'save_formatter' => 'string',
            'width' => 150
        ),
				'jabatan_id' => array(
            'label' => '<b>Bagian</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => array(4 => 'Admin', 17 => 'Appraisal', 18 => 'Marketing', 19 => 'Operator', 20 => 'Super visior'),
            'save_formatter' => 'string',
            'width' => 150
        ),
				'akun_karyawan' => array(
            'label' => '<b>Akun</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => array('<label style="background-color:red;color:white;">N</label>', '<label style="background-color:green;color:white;">Y</label>', '<label style="background-color:green;color:white;">Y</label>'),
            'save_formatter' => 'string',
            'width' => 150
        ),
				'alamat' => array(
            'label' => '<b>Alamat</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),

    );

    protected $_order = array("id" => "DESC");
    protected $_unique = array('unique' => array('id'), 'group' => false);



}
