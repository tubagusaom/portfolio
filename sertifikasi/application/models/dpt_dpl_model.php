<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Dpt_dpl_model extends MY_Model {

   // protected $_table = 'lsp029_asesi';
    public function __construct() {
        $this->_table = kode_lsp()."asesi"; 
        parent::__construct($this->_table);
    }
    protected $_table;
        
    protected $table_label = 'Data DPT/DPL';
    protected $_columns = array(
        'u_date_create' => array(
            'label' => 'Registration Date',
            'rule' => 'trim|xss_clean',
            'formatter' => 'datetime',
            'save_formatter' => 'string',
            'width' => 170,
            'align' => 'center'
        ),
        'skema_sertifikasi' => array(
            'label' => 'Skema Sertifikasi',
            'rule' => 'trim|xss_clean',
            'formatter' => 'skema',
            'save_formatter' => 'string',
            'width' => 250,
            
        ),
        'nama_lengkap' => array(
            'label' => 'Nama Lengkap Asesi',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 170,
            
        ),
        'id_asesor' => array(
            'label' => 'Nama Asesor',
            'rule' => 'trim|xss_clean',
            'formatter' => 'users',
            'save_formatter' => 'string',
            'width' => 120
        ),
        'is_dpt' => array(
            'label' => 'DPT',
            'rule' => 'trim|xss_clean',
            'formatter' => array('N','Y'),
            'save_formatter' => 'string',
            'align' =>'center',
            'width' => 50,
            'hidden' => 'true',
        ),
        'is_dpt_kompeten' => array(
            'label' => 'DPT <br/>K/BK',
            'rule' => 'trim|xss_clean',
            'formatter' => array('-','K','BK'),
            'save_formatter' => 'string',
            'align' =>'center',
            'width' => 30,
        ),
        'catatan_dpt' => array(
            'label' => 'Checked Pra Asesmen',
            'rule' => '',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 210,
            'hidden' => 'true',
        ),
        'is_dpl' => array(
            'label' => 'DPL',
            'rule' => '',
            'formatter' => array('N','Y'),
            'save_formatter' => 'string',
            'width' => 50,
            'align' =>'center',
            'hidden' => 'true',
        ),
        'is_dpl_kompeten' => array(
            'label' => 'DPL <br/>K/BK',
            'rule' => '',
            'formatter' => array('-','K','BK'),
            'save_formatter' => 'string',
            'width' => 30,
            'align' =>'center',
        ),
        'catatan_dpl' => array(
            'label' => 'Checked Pra Asesmen',
            'rule' => '',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 210,
            'hidden' => 'true',
        ),
        'ch_dpl' => array(
            'label' => 'Checked Pra Asesmen',
            'rule' => '',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 210,
            'hidden' => 'true',
        ),
        'ch_dpt' => array(
            'label' => 'Checked Pra Asesmen',
            'rule' => '',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 210,
            'hidden' => 'true',
        )
    );
    protected $_order = array("u_date_create" => "DESC");

      protected $belongs_to = array(
          'skema' =>  array(
          'model' => 'skema_model',
          'primary_key' => 'skema_sertifikasi',
          'retrieve_columns' => array('skema')
          ),
          'asesor' =>  array(
          'model' => 'asesor_model',
          'primary_key' => 'id_asesor',
          'retrieve_columns' => array('users','no_reg'),
          'join_type' => 'left'
          )
      );
      
    protected $_unique = array('unique' => array('instruktur_code'), 'group' => false);
    
}