<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Upload_dokumen_model extends MY_Model {
    
    protected $_table = 't_dokumen';
    protected $table_label = 'Data Dokumen';
    protected $_columns = array(
        'nama_dokumen' => array(
            'label' => 'Nama Dokumen',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'keterangan' => array(
            'label' => 'Keterangan',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'id_tuk' => array(
            'label' => 'TUK',
            'rule' => 'trim|xss_clean',
            'formatter' => 'tuk',
            'save_formatter' => 'string',
            'width' => 150,
        ),
        'foto' => array(
            'label' => 'Dokumen Unggah',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
        ),
        'created_when' => array(
            'label' => 'Tanggal Unggah',
            'rule' => 'trim|xss_clean',
            'formatter' => 'general_date',
            'save_formatter' => 'string',
            'width' => 150,
        ),
    );

    protected $belongs_to = array(
        'tuk' => array(
            'model' => 'tuk_model',
            'primary_key' => 'id_tuk',
            'retrieve_columns' => array('tuk')
        ),
    );
    
    protected $_order = array("id" => "DESC");
    protected $_unique = array('unique' => array('id'), 'group' => false);

    function __construct() {
        parent::__construct();
    }
    
}
