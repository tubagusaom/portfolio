<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Clo_model extends MY_Model {

   // protected $_table = 'lsp029_asesi';
    public function __construct() {
        $this->_table = kode_lsp()."asesi";
        parent::__construct($this->_table);
    }
    protected $_table;

    protected $table_label = 'Data Checklist Observasi';
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
        'is_observasi' => array(
            'label' => 'CLO',
            'rule' => 'trim|xss_clean',
            'formatter' => array('N','Y'),
            'save_formatter' => 'string',
            'align' =>'center',
            'width' => 50,
            'hidden' => 'true',
        ),
        'is_observasi_kompeten' => array(
            'label' => 'K/BK',
            'rule' => 'trim|xss_clean',
            'formatter' => array('-','K','BK'),
            'save_formatter' => 'string',
            'align' =>'center',
            'width' => 30,
        ),
        'catatan_observasi' => array(
            'label' => 'Checked Pra Asesmen',
            'rule' => '',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 210,
            'hidden' => 'true',
        ),
        'ch_observasi' => array(
            'label' => 'Checked Pra Asesmen',
            'rule' => '',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 210,
            'hidden' => 'true',
        ),
        'id_perangkat' => array(
            'label' => 'Checked Pra Asesmen',
            'rule' => '',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 210,
            'hidden' => 'true',
        ),
        'catatan_observasi_serial' => array(
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
