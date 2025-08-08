<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Real_asesmen_model extends MY_Model {

    public function __construct() {
        $this->_table = kode_lsp() . "asesi";
        parent::__construct($this->_table);
    }

    protected $_table;
    protected $table_label = 'Data Real Asesmen';
    protected $_columns = array(
        'skema_sertifikasi' => array(
            'label' => 'Skema Sertifikasi',
            'rule' => 'trim|xss_clean',
            'formatter' => 'skema',
            'save_formatter' => 'string',
            'width' => 150,
        ),
        'id_users' => array(
            'label' => 'Skema Sertifikasi',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 250,
            'hidden' => 'true'
        ),
        'telp' => array(
            'label' => 'Telp',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 120,
            'hidden' => 'true'
        ),
        'nama_lengkap' => array(
            'label' => 'Complete Name',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
        ),
        'no_uji_kompetensi' => array(
            'label' => 'No Uji Kompetensi',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 100,
            'hidden' => 'true'
        ),
        'jadwal_id' => array(
            'label' => 'Jadwal Asesmen',
            'rule' => 'trim|xss_clean',
            'formatter' => 'jadual',
            'save_formatter' => 'string',
            'width' => 220,
        ),
        'administrasi_ujk' => array(
            'label' => 'Adm Status',
            'rule' => 'trim|xss_clean',
            'formatter' => array('-', 'Selesai', 'Belum Selesai'),
            'save_formatter' => 'string',
            'width' => 120,
            'hidden' => 'true'
        ),
        'id_asesor' => array(
            'label' => 'Nama Asesor',
            'rule' => 'trim|xss_clean',
            'formatter' => 'users',
            'save_formatter' => 'string',
            'width' => 120
        ),
        'id_tuk' => array(
            'label' => 'TUK',
            'rule' => 'trim|xss_clean',
            'formatter' => 'tuk',
            'save_formatter' => 'string',
            'width' => 120
        ),
        'id_perangkat' => array(
            'label' => 'MUK',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 40,
            'align' => 'center'
        )
    );
    protected $_order = array("jadwal_id" => "DESC");
    protected $belongs_to = array(
        'skema' => array(
            'model' => 'skema_model',
            'primary_key' => 'skema_sertifikasi',
            'retrieve_columns' => array('skema'),
            'join_type' => 'left'
        ),
        'jadwal_asesmen' => array(
            'model' => 'jadwal_asesmen_model',
            'primary_key' => 'jadwal_id',
            'retrieve_columns' => array('jadual', 'tanggal'),
            'join_type' => 'left'
        ),
        'asesor' => array(
            'model' => 'asesor_model',
            'primary_key' => 'id_asesor',
            'retrieve_columns' => array('users', 'no_reg'),
            'join_type' => 'left'
        ),
        'tuk' => array(
            'model' => 'tuk_model',
            'primary_key' => 'id_tuk',
            'retrieve_columns' => array('tuk'),
            'join_type' => 'left'
        )
    );
    protected $_unique = array('unique' => array('instruktur_code'), 'group' => false);

    // function data_asesi($id) {
    //     $asesi = kode_lsp() . 'asesi';
    //     $jadual_asesmen = kode_lsp() . 'jadual_asesmen';
    //     $tuk = kode_lsp() . 'tuk';
    //     $skema = kode_lsp() . 'skema';
    //     $pendidikan = 'master_pendidikan';
    //     $pekerjaan = 'master_pekerjaan';

    //     $query = $this->db->query("SELECT c.tuk,c.alamat as alamat_tuk,c.telp as telp_tuk,
    //     d.skema,d.kode_skema,a.*,b.tanggal as tanggal_mulai,b.tanggal_akhir,e.nama_pendidikan as pendidikan,f.nama_pekerjaan as pekerjaan
    //     FROM $asesi a
    //     JOIN $jadual_asesmen b ON a.jadwal_id=b.id
    //     JOIN $tuk c ON c.id=a.id_tuk
    //     JOIN $skema d ON d.id=a.skema_sertifikasi
    //     JOIN $pendidikan e ON e.id=a.id_pendidikan
    //     JOIN $pekerjaan f ON f.id=a.id_pekerjaan
    //     WHERE a.id=$id
    //     ");
    //     return $query->row();
    // }

    function data_asesi($id){

        $asesi = kode_lsp() . 'asesi';
        $jadual_asesmen = kode_lsp() . 'jadual_asesmen';
        $tuk = kode_lsp() . 'tuk';
        $skema = kode_lsp() . 'skema';
        $pendidikan = 'master_pendidikan';
        $pekerjaan = 'master_pekerjaan';

        $this->db->select('
            c.tuk,
            c.alamat as alamat_tuk,
            c.telp as telp_tuk,
            d.skema,
            d.kode_skema,
            a.*,
            b.tanggal as tanggal_mulai,
            b.tanggal_akhir,
            e.nama_pendidikan as pendidikan,
            f.nama_pekerjaan as pekerjaan
        ');
        $this->db->from(kode_lsp().'asesi a');
        $this->db->join(kode_lsp().'jadual_asesmen b', 'a.jadwal_id = b.id', 'left');
        $this->db->join(kode_lsp().'tuk c', 'c.id = a.id_tuk', 'left');
        $this->db->join(kode_lsp().'skema d', 'd.id = a.skema_sertifikasi', 'left');
        $this->db->join('master_pendidikan e', 'e.id = a.id_pendidikan', 'left');
        $this->db->join('master_pekerjaan f', 'f.id = a.id_pekerjaan', 'left');

        $this->db->where('a.id', $id);
        $query = $this->db->get();

        return $query->row();
    }

    function pra_asesmen_checked($id) {
        $this->db->where('id', $id);
        $data = $this->db->get('t_users')->row();
        return $data;
    }

}
