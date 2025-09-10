<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class V_merek_tahun_model extends MY_Model {

     public function __construct() {
        $this->_table = "v_merek_tahun";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Merek Mobil';
    protected $_columns = array(
        'merek_mobil_merek' => array(
            'label' => '<b>MEREK</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'tahun_mobil_merek' => array(
            'label' => '<b>TAHUN</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
    		'mt' =>	array(
    			'label'	=>	'Merek Tahun',
    			'rule'	=>	'trim|required|xss_clean',
    			'formatter'	=>	'string',
    			'save_formatter' => 'string',
    			'width' => 100,
          'hidden' => 'true'
    		)
    );

    protected $_order = array("id" => "DESC");
    protected $_unique = array('unique' => array('id'), 'group' => false);



}
