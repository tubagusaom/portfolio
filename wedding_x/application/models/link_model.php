<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Link_Model extends MY_Model {

    protected $_table = 't_links';
    protected $table_label = 'Link';
    protected $_columns = array(
        'title' => array(
            'label' => 'Title',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'link' => array(
            'label' => 'Link',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
//        'id_kategori' => array(
//            'label' => 'Categories',
//            'rule' => 'trim|required|xss_clean',
//            'formatter' => 'kategori',
//            'save_formatter' => 'string',
//            'width' => 150
//        ),
        'image_description' => array(
            'label' => 'Image',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'target' => array(
            'label' => 'Target',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'id_lsp' => array(
            'label' => 'Kode LSP',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        )
    );

    protected $belongs_to = array(
        'kategori' => array(
            'model' => 'artikel_kategori_model',
            'primary_key' => 'id_kategori',
            'retrieve_columns' => array('kategori')
        )
    );

    function url2images($url)
	{
		if(!is_null($url) && !empty($url)) {
			return "<img width=80px height=80px src='" . base_url() . "uploads/slide/" . $url . "' class='img-circle' />";
		} else {
			return "<img width=80px height=80px src='" . base_url() . "uploads/slide/person_default.jpg' class='img-circle' />";
		}
	}

    protected $_order = array("id" => "ASC");
    protected $_unique = array('unique' => array('id'), 'group' => false);

    function __construct() {
        parent::__construct();
    }

    function get_link()
    {
        $this->db->select('a.id, a.title, a.link, a.image_description');
        $this->db->from('t_links a');
//        $this->db->join('tbl3133_artikel_kategori b','a.id_kategori = b.id');
        $this->db->where('a.id_lsp');
        $query = $this->db->get();
        return $query->result();
    }
    function data_lsp()
    {
        $DB2 = $this->load->database('bnsp',TRUE);

        $DB2->select('id,lsp');
        $DB2->from('lsp');
        $query = $DB2->get();
        return $query->result();
    }

}
