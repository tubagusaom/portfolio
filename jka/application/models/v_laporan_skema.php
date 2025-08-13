<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class V_laporan_skema extends MY_Model {

     public function __construct() {
        $this->_table = 'v_laporan_skema';
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Data Laporan Skema';
    protected $_columns = array(
        'skema' => array(
            'label' => '<b>Skema Sertifikasi</b>',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 190
        ),
    		'k'	=>	array(
    			'label'	=> 	'<b>K</b>',
    			'rule'	=>	'trim|required|xss_clean',
    			'formatter'	=>	'string',
    			'save_formatter' => 'string',
    			'width' => 50,
    			'align'=>'center'
    		),
    		'bk'	=>	array(
    			'label'	=> 	'<b>BK</b>',
    			'rule'	=>	'trim|required|xss_clean',
    			'formatter'	=>	'string',
    			'save_formatter' => 'string',
    			'width' => 50,
    			'align'=>'center'
    		),
    		'BR'	=>	array(
    			'label'	=> 	'<b>Belum di Rekomendasi</b>',
    			'rule'	=>	'trim|required|xss_clean',
    			'formatter'	=>	'string',
    			'save_formatter' => 'string',
    			'width' => 150,
    			'align'=>'center'
    		),
    		'jumlah_asesi'	=>	array(
    			'label'	=> 	'<b>Total Asesi</b>',
    			'rule'	=>	'trim|required|xss_clean',
    			'formatter'	=>	'string',
    			'save_formatter' => 'string',
    			'width' => 100,
    			'align'=>'center'
    		)
    );
    protected $_order = array("id" => "ASC");
    protected $_unique = array('unique' => array('id'), 'group' => false);

    function daftar_asesi($id) {
        $this->db->select('
            a.id,
            a.nama_lengkap,
            a.no_identitas,
            a.tempat_lahir,
            a.tgl_lahir,
            a.jadwal_id,
            a.jenis_kelamin,
            a.jenis_kelamin as klamin,
            a.alamat,
            a.telp,
            a.email,
            a.id_pendidikan,
            a.id_pekerjaan,
            e.kode_skema as skema,
            b.tanggal,
            d.no_cab,
            c.no_reg,
            a.id_provinsi,
            a.id_kabupaten,
            a.id_instansi_anggaran,
            a.id_sumber_anggaran,
            a.rekomendasi_asesor as rekomendasi_asesor

        ');

        $this->db->from(kode_lsp() . 'asesi a');
        $this->db->join(kode_lsp() . 'jadual_asesmen b', 'b.id=a.jadwal_id', 'LEFT');
        $this->db->join(kode_lsp() . 'users c', 'c.id=a.id_asesor', 'LEFT');
        $this->db->join(kode_lsp() . 'tuk d', 'c.id=a.id_tuk', 'LEFT');
        $this->db->join(kode_lsp() . 'skema e', 'a.skema_sertifikasi=e.id', 'LEFT');
        $this->db->where('a.pra_asesmen', '1');
        $this->db->where('a.skema_sertifikasi', $id);
        // $this->db->order_by('c.users', 'ASC');
        $detail_asesi = $this->db->get()->result_array();
        //var_dump($detail_asesi);
        //die();
        return $detail_asesi;
    }

}
