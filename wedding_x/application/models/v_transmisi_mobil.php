<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class V_transmisi_mobil extends MY_Model {

     public function __construct() {
        $this->_table = "v_transmisi_mobil";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Transmisi Mobil';
    protected $_columns = array(
        'td' => array(
            'label' => '<b>TRANSMISI</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 100
        ),
        'merek_mobil_transmisi' => array(
            'label' => '<b>MEREK</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'model_mobil_transmisi' => array(
            'label' => '<b>MODEL</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'tahun_mobil_transmisi' => array(
            'label' => '<b>TAHUN</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 30
        )
    );

    protected $_order = array("id" => "DESC");
    protected $_unique = array('unique' => array('id'), 'group' => false);



}
