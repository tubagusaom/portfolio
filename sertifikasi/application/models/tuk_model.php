<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Tuk_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_lsp()."tuk"; 
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Data TUK';
    protected $_columns = array(
        'no_cab' => array(
            'label' => 'Kode TUK',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 90,
            'align' => 'center'
        ),
        'tuk' => array(
            'label' => 'TUK',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 200
        ),
        'alamat' => array(
            'label' => 'Alamat',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 240
        ),
        'telp' => array(
            'label' => 'No. Telp',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 90
        ),
        'email_tuk' => array(
            'label' => 'Email',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 140
        ),
        'is_users' => array(
            'label' => 'Is Users?',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 40,
            'align' => 'center'
        ),
        'provinsi' => array(
            'label' => 'Is Users?',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 90,
            'hidden' => 'true'
        ),
        'kabupaten' => array(
            'label' => 'Is Users?',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 90,
            'hidden' => 'true'
        )
    );
    protected $_order = array("id" => "ASC");

    protected $_unique = array('unique' => array('no_cab'), 'group' => false);
    function url2images($url)
    {
        if(!is_null($url) && !empty($url)) {
            return "<img width=80px height=80px src='" . base_url() . "images/tuk/" . $url . "' class='img-circle' />";
        } else {
            return "";
        }
    }
}
