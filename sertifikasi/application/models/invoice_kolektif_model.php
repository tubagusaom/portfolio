<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Invoice_kolektif_model extends MY_Model {

    // protected $_table = 'lsp029_asesi';
    public function __construct() {
        $this->_table = kode_lsp() . "invoice";
        parent::__construct($this->_table);
    }

    protected $_table;
    protected $table_label = 'Data Invoice';
    protected $_columns = array(
        'nama_lembaga' => array(
            'label' => 'Nama Lembaga Pemohon',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 90
        ), 'tanggal_pembayaran' => array(
            'label' => 'Input Date',
            'rule' => 'trim|xss_clean',
            'formatter' => 'general_date',
            'save_formatter' => 'date',
            'width' => 130,
            'align' => 'center',
            'hidden' => 'true'
        ),
        'no_invoice' => array(
            'label' => 'No Invoice',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 270,
        ),
        'nama_kegiatan' => array(
            'label' => 'Nama Kegiatan',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 320,
        ),
        'jumlah_pembayaran' => array(
            'label' => 'Nominal',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'align' => 'center',
            'width' => 160,
        ),
        'description' => array(
            'label' => 'Versi',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'align' => 'center',
            'hidden' => 'true'
        ),
        'file_bukti' => array(
            'label' => 'Versi',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'align' => 'center',
            'hidden' => 'true'
        ),
        'status_tagihan' => array(
            'label' => 'Status',
            'rule' => 'trim||xss_clean',
            'formatter' => array('Lunas','Belum Lunas'),
            'save_formatter' => 'string',
            'width' => 110,
           
        )
    );
    protected $_order = array("id" => "DESC");
   
    protected $_unique = array('unique' => array('id'), 'group' => false);

   

}
