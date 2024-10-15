<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Detail_pegawai_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_tbl()."detail_karyawan";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Data Penanggung Jawab';
    protected $_columns = array(
				'id_karyawan' => array(
						'label' => '<b>Anggota</b>',
						'rule' => 'trim|xss_clean',
						'formatter' => 'string',
						'save_formatter' => 'string',
						'width' => 150
				),
        'id_penanggung_jawab' => array(
            'label' => '<b>Penanggung Jawab</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),

    );

    protected $_order = array("id_penanggung_jawab" => "ASC");
    protected $_unique = array('unique' => array('id'), 'group' => false);



}
