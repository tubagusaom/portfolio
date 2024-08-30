<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Laporan_pelelangan_model extends MY_Model {

     public function __construct() {
        $this->_table = "v_laporan";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Data Laporan Pelelangan';
    protected $_columns = array(
        'tanggal_bid' => array(
            'label' => '<b>Bidding Date</b>',
            'rule' => 'trim|xss_clean',
            'formatter'	=>	'general_date',
            'save_formatter' => 'string',
            'width' => 80
        ),
        'customer' => array(
            'label' => '<b>Customer</b>',
            'rule' => 'trim|xss_clean',
            'formatter'	=>	'string',
            'save_formatter' => 'string',
            'width' => 100
        ),
        'mobil' => array(
            'label' => '<b>Cars</b>',
            'rule' => 'trim|xss_clean',
            'formatter'	=>	'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'dealer' => array(
            'label' => '<b>Dealer</b>',
            'rule' => 'trim|xss_clean',
            'formatter'	=>	'string',
            'save_formatter' => 'string',
            'width' => 100
        ),
        'total_harga' => array(
            'label' => '<b>Bid Amount</b>',
            'rule' => 'trim|xss_clean',
            'formatter'	=>	'rupiah',
            'save_formatter' => 'string',
            'width' => 80
        ),
        'status' => array(
            'label' => '<b>Status</b>',
            'rule' => 'trim|xss_clean',
            'formatter'	=>	'string',
            'save_formatter' => 'string',
            'width' => 50,
            'align' =>'center',
            'hidden' => true
        )
    );

    protected $_order = array("id" => "DESC");
    protected $_unique = array('unique' => array('id'), 'group'=>false);




}
