<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Skema_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_lsp()."skema";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Data Skema Sertifikasi';
    protected $_columns = array(
        'kode_skema' => array(
            'label' => 'Kode Skema',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 70
        ),
        'skema' => array(
            'label' => 'Skema Sertifikasi',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 190
        ),
        'kategori_skema' => array(
            'label' => 'Kategori',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 80
        ),
        'jumlah_unit' => array(
            'label' => 'Jumlah Unit',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 90,
            'align' => 'center'
        ),
        'description' => array(
            'label' => 'description',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => 'true'
        ),
        'bidang_title' => array(
            'label' => 'description',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => 'true'
        ),
        'bidang' => array(
            'label' => 'description',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => 'true'
        ),
        'link_download' => array(
            'label' => 'Download Skema',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => 'true'
        ),
        'link_skkni' => array(
            'label' => 'Download Skema',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'hidden' => 'true'
        ),
        'title_skema' => array(
            'label' => 'Download Skema',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'hidden' => 'true'
        ),

        'kblui' => array(
            'label' => 'KBLUI',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 80,
            'align' => 'center'
        ),
        'kbji' => array(
            'label' => 'KBJI',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 80,
            'align' => 'center'
        ),
        'jenjang' => array(
            'label' => 'Jenjang',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 80,
            'align' => 'center'
        ),
        'kode_sektor' => array(
            'label' => 'Kode Sektor',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 80,
            'align' => 'center'
        ),
        'foto' => array(
            'label' => 'Images',
            'rule' => 'trim|xss_clean',
            'formatter' => 'url2images',
            'save_formatter' => 'string',
            'width' => 150,

        ),
    );
    protected $_order = array("id" => "ASC");

    protected $_unique = array('unique' => array('kode_skema'), 'group' => false);

    function url2images($url)
    {
      if(!is_null($url) && !empty($url)) {
        return "<img width=180px height=120px src='" . base_url() . "assets/img/icons/" . $url . "' class='img-thumbnail' />";
      } else {
        return "";
      }
    }

}
