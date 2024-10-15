<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Elemen_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_lsp()."elemen_kompetensi"; 
        //$this->_table = "lsp304_unit_kompetensi"; 
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Data Elemen';
    protected $_columns = array(
        'id_unit_kompetensi' => array(
            'label' => 'Unit',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 100,
            'align' => 'center'
        ),
        'elemen_kompetensi' => array(
            'label' => 'Elemen Kompetensi',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 250
        ),
        'dimensi_kompetensi' => array(
            'label' => 'Dimensi',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 50
        ),
        'pertanyaan' => array(
            'label' => 'Pertanyaan',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'jawaban' => array(
            'label' => 'Jawaban',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'no_kuk' => array(
            'label' => 'No KUK',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 50
        ),
        'bukti_dpl' => array(
            'label' => 'Bukti',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        )
    );

   

    protected $_order = array("id_unit_kompetensi" => "ASC");

    protected $belongs_to = array(
        'unit_kompetensi' =>  array(
            'model' => 'unit_model',
            'primary_key' => 'id',
            'retrieve_columns' => array('unit_kompetensi'),
            'join_type'=>'left'
        )
    );

    protected $_unique = array('unique' => array('id'), 'group' => false);

}
