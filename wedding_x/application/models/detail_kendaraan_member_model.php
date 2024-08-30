<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Detail_kendaraan_member_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_tbl()."detail_kendaraan";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Kendaraan Customer';
    protected $_columns = array(
        'nopol_kendaraan' => array(
            'label' => '<b>No.Pol</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),
        'jenis_kendaraan' => array(
            'label' => '<b>Jenis</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),
        'jumlah_bangku' => array(
            'label' => '<b>Jumlah Bangku</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),
        'spidometer_kendaraan' => array(
            'label' => '<b>Spidometer</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        ),
        'bbm_kendaraan' => array(
            'label' => '<b>Bahan Bakar</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        ),
        'jumlah_kepemilikan_kendaraan' => array(
            'label' => '<b>Tangan Ke</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        ),
        'status_pajak_kendaraan' => array(
            'label' => '<b>Pajak</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        ),
        'pajak_ditanggung_kendaraan' => array(
            'label' => '<b>Pajak Di Tanggung</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        ),
        'asuransi_kendaraan' => array(
            'label' => '<b>Asuransi</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        ),
        'harga_kendaraan' => array(
            'label' => '<b>Harga</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        ),
        'catatan_kendaraan' => array(
            'label' => '<b>Catatan</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        ),
        'id_member' => array(
            'label' => '<b>Customer</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'nama_member',
            'save_formatter' => 'string',
            'width' => 50
        ),
        'id_tahun' => array(
            'label' => '<b>Tahun</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'tahun_mobil',
            'save_formatter' => 'string',
            'width' => 50
        ),
        'id_merek' => array(
            'label' => '<b>Merek</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'merek_mobil',
            'save_formatter' => 'string',
            'width' => 150,
            'align' =>'center',
        ),
        'id_model' => array(
            'label' => '<b>Model</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'model_mobil',
            'save_formatter' => 'string',
            'width' => 150,
            'align' =>'center',
        ),
        'id_transmisi' => array(
            'label' => '<b>Transmisi</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'transmisi_mobil',
            'save_formatter' => 'string',
            'width' => 70,
            'align' =>'center',
        ),
    );

    protected $belongs_to = array(
        'tahun_mobil' => array(
            'model' => 'tahun_mobil_model',
            'primary_key' => 'id_tahun',
            'retrieve_columns' => array('tahun_mobil')
        ),
        'merek_mobil' => array(
            'model' => 'merek_mobil_model',
            'primary_key' => 'id_merek',
            'retrieve_columns' => array('merek_mobil')
        ),
        'model_mobil' => array(
            'model' => 'model_mobil_model',
            'primary_key' => 'id_model',
            'retrieve_columns' => array('model_mobil')
        ),
        'transmisi_mobil' => array(
            'model' => 'transmisi_mobil_model',
            'primary_key' => 'id_transmisi',
            'retrieve_columns' => array('transmisi_mobil')
        ),
        'nama_member' => array(
            'model' => 'member_model',
            'primary_key' => 'id_member',
            'retrieve_columns' => array('nama_member')
        )
    );

//
//    function url2images($url)
//    {
//        return "<img width=100px height=130px src='" . base_url() . "assets/img/karyawan/" . $url . "'/>";
//    }
//
    protected $_order = array("id" => "DESC");
    // protected $_unique = array('unique' => array('id'), 'group' => false);
    protected $_unique = array('unique' => array('id'), 'group'=>false);



}
