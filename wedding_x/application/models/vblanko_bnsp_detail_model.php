<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Vblanko_bnsp_detail_model extends MY_Model {

    
    protected $_table = 'vblanko_detail';
    protected $table_label = 'Detail blanko';
    protected $_columns = array(
         'no_seri_blanko' => array(
            'label' => 'No Seri',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 100,
            'align' => 'center'
        ),
        'status_blanko' => array(
            'label' => 'Status',
            'rule' => 'trim|xss_clean',
            'formatter' => array('Blanko Kosong','Sudah di cetak','Blanko Rusak'),
            'save_formatter' => 'string',
            'width' => 100,
             'align' => 'center'
        ),
        'nama_lengkap' => array(
            'label' => 'Nama Pemegang Sertifikat',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 200,
            
        ),
        'no_registrasi' => array(
            'label' => 'No Registrasi',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 120,
             'align' => 'center'
            
        ),
        'no_sertifikat' => array(
            'label' => 'No Sertifikat',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
             'align' => 'center'
            
        ),
        'status_kondisi' => array(
            'label' => 'Keterangan',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 100,
             'align' => 'center'
            
        )
    );

    
    protected $_order = array("no_seri_blanko" => "DESC");

    //protected $_unique = array('unique' => array('id'), 'group' => false);
}
