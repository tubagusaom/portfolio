<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Dokumen_tambahan_model extends MY_Model {

   // protected $_table = 'tbl3133_asesi';

    protected $_table;

    protected $table_label = 'Data Upload Dokumen Tambahan';
    protected $_columns = array(
        'id_asesi' => array(
            'label' => 'Nama Asesi',
            'rule' => 'trim|xss_clean',
            'formatter' => 'nama_lengkap',
            'save_formatter' => 'string',
            'width' => 250,
            'hidden' => true
        ),
        'nama_dokumen' => array(
            'label' => 'Nama Dokumen',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 170,

        ),
        'file' => array(
            'label' => 'File Dokumen',
            'rule' => 'trim|xss_clean',
            'formatter' => 'url2images',
            'save_formatter' => 'string',
            'width' => 170,

        ),
        'jenis_dok' => array(
            'label' => 'Jenis Dokumen',
            'rule' => 'trim|xss_clean',
            'formatter' => array(
                                '0' => 'Foto'
                                ,'1' => 'Kartu Pelajar'
                                ,'2' => 'Raport'
                                ,'3' => 'Sertifikat Pelatihan'
                                ,'4' => 'Penghargaan'
                                ,'5' => 'Tugas / Pra Karya'
                                ,'6' => 'Lain-lain'
            ),
            'save_formatter' => 'string',
            'width' => 170,
		)
    );


    protected $belongs_to = array(
          'nama_lengkap' =>  array(
          	'model' => 'asesi_model',
          	'primary_key' => 'id_asesi',
          	'retrieve_columns' => array('nama_lengkap')
          ),
      );

    protected $_order = array("id" => "DESC");
	protected $_unique = array('unique' => array('id'), 'group' => false);

    public function __construct() {
        $this->_table = 't_dokumen_tambahan';
        parent::__construct($this->_table);
    }

    function url2images($url)
    {
        if(!is_null($url) && !empty($url)) {
            return "<img width=180px height=120px src='" . base_url() . "assets/files/dokumen_tambahan/" . $url . "' class='img-thumbnail' />";
        } else {
            return "";
        }
    }
}
