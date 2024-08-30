<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Soal_model extends MY_Model {

    // protected $_table = 'lsp029_asesi';
    public function __construct() {
        $this->_table = kode_lsp() . "soal";
        parent::__construct($this->_table);
    }

    protected $_table;
    protected $table_label = 'Data Soal Asesmen';
    protected $_columns = array(
        'id_perangkat_detail' => array(
            'label' => 'Perangkat',
            'rule' => 'trim|xss_clean',
            'formatter' => 'perangkat_detail',
            'save_formatter' => 'string',
            'width' => 150,
            'align' => 'left'
        ), 'id_unit_kompetensi' => array(
            'label' => 'Unit Kompetensi',
            'rule' => 'trim|xss_clean',
            'formatter' => 'unit_kompetensi',
            'save_formatter' => 'string',
            'width' => 200,
            'align' => 'left'
        ),
        'jenis_soal' => array(
            'label' => 'Versi',
            'rule' => 'trim|xss_clean',
            'formatter' => array('-', 'Pilihan Ganda', 'Essay', 'Menjodohkan'),
            'save_formatter' => 'string',
            'width' => 90,
            'align' => 'center'
        ),
        'pertanyaan' => array(
            'label' => 'Pertanyaan',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
        ),
        'jawaban_a' => array(
            'label' => 'Versi',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'align' => 'center',
            'hidden' => 'true',
        ),
        'jawaban_b' => array(
            'label' => 'Jenis Uji',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'align' => 'center',
            'width' => 110,
            'hidden' => 'true',
        ),
        'jawaban_c' => array(
            'label' => 'Jumlah Soal',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'align' => 'center',
            'width' => 90,
            'hidden' => 'true',
        ),
        'jawaban_d' => array(
            'label' => 'Jumlah Soal',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'align' => 'center',
            'width' => 90,
            'hidden' => 'true',
        ),
        'jawaban_e' => array(
            'label' => 'Jumlah Soal',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'align' => 'center',
            'width' => 90,
            'hidden' => 'true',
        ),
        'file_soal' => array(
            'label' => 'Jumlah Soal',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'align' => 'center',
            'width' => 90,
            'hidden' => 'true',
        ),
        'jawaban_benar' => array(
            'label' => 'Jawaban',
            'rule' => '',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'align' => 'center',
            'width' => 90,
        ),
        'urutan' => array(
            'label' => 'No Urut',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'align' => 'center',
            'width' => 70
        ),
        'tipe_soal' => array(
            'label' => 'Jumlah Soal',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'align' => 'center',
            'width' => 90,
            'hidden' => 'true',
        )
    );
    protected $_order = "id_perangkat_detail, urutan";
    //protected $_order = array("id_perangkat_detail"=>"ASC");

    protected $belongs_to = array(
        'master_perangkat_detail' => array(
            'model' => 'perangkat_asesmen_detail_model',
            'primary_key' => 'id_perangkat_detail',
            'retrieve_columns' => array('perangkat_detail'),
            'join_type' => 'left'
        ),
        'master_unit_kompetensi' => array(
            'model' => 'unit_model',
            'primary_key' => 'id_unit_kompetensi',
            'retrieve_columns' => array('unit_kompetensi'),
            'join_type' => 'left'
        )
    );
    protected $_unique = array('unique' => array('id'), 'group' => false);

}
