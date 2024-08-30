<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class V_detail_kendaraan_model extends MY_Model {

     public function __construct() {
        $this->_table = "v_detail_kendaraan";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Detail Kendaraan';
    protected $_columns = array(
        'nama_member' => array(
            'label' => '<b>Customer</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'tahun_mobil' => array(
            'label' => '<b>Tahun</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
    		'merek_mobil' =>	array(
    			'label' => '<b>Merek</b>',
    			'rule'	=>	'trim|xss_clean',
    			'formatter'	=>	'string',
    			'save_formatter' => 'string',
    			'width' => 100,
    		),
    		'model_mobil' =>	array(
    			'label' => '<b>Model</b>',
    			'rule'	=>	'trim|xss_clean',
    			'formatter'	=>	'string',
    			'save_formatter' => 'string',
    			'width' => 100,
    		),
    		'transmisi_mobil' =>	array(
    			'label' => '<b>Transmisi</b>',
    			'rule'	=>	'trim|xss_clean',
    			'formatter'	=>	'string',
    			'save_formatter' => 'string',
    			'width' => 100
    		),
    		'status_member' =>	array(
    			'label' => '<b>Status</b>',
    			'rule'	=>	'trim|xss_clean',
    			'formatter'	=>	'string',
    			'save_formatter' => 'string',
    			'width' => 100,
          'hidden' => true
    		),
    		'status_rekomendasi' =>	array(
    			'label' => '<b>Rekomendasi</b>',
    			'rule'	=>	'trim|xss_clean',
          'formatter' => array(
              '<b style="background: grey; color:#fff; padding: 3px; border-radius: 3px; font-size:10px">&#9866;</b>', // 0 baru
              '<b style="background: red; color:#fff; padding: 3px; border-radius: 3px; font-size:10px">&#10006;</b>', // 1 ditolak
              '<b style="background: green; color:#fff; padding: 3px; border-radius: 3px; font-size:10px">&#10004;</b>' // 2 diterima
            ),
    			'save_formatter' => 'string',
    			'width' => 80
    		)
    );

    protected $_order = array("id" => "DESC");
    protected $_unique = array('unique' => array('id'), 'group' => false);



}
