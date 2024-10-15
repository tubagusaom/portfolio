<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Kuk_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_lsp()."kuk"; 
        //$this->_table = "lsp304_unit_kompetensi"; 
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Data KUK';
    protected $_columns = array(
        'kuk' => array(
            'label' => 'KUK',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'pertanyaan' => array(
            'label' => 'Pertanyaan',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 100,
            
        ),
        'id_elemen_kompetensi' => array(
            'label' => 'Elemen Kompetensi',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'elemen_kompetensi',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'jawaban' => array(
            'label' => 'Jawaban',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 100,
            'hidden' => true,
        ),
        'jenis_bukti' => array(
            'label' => 'Jenis Bukti',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 100,
            'hidden' => true,
        ),

    );

    protected $belongs_to = array(
        'elemen_kompetensi' => array(
            'model' => 'elemen_model',
            'primary_key' => 'id_elemen_kompetensi',
            'retrieve_columns' => array('elemen_kompetensi')
        ),
    );

    protected $_order = array("elemen_kompetensi" => "ASC");

    protected $_unique = array('unique' => array('id'), 'group' => false);

}
