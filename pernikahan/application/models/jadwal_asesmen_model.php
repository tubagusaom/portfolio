<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Jadwal_asesmen_model extends MY_Model {

    public function __construct() {
        $this->_table = kode_lsp() . "jadual_asesmen";
        parent::__construct($this->_table);
    }

    protected $_table;
    protected $table_label = 'Data Jadwal Asesmen';
    protected $_columns = array(
        'kode_jadwal' => array(
            'label' => 'Kode Jadwal',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 200,
        ),
        'jadual' => array(
            'label' => 'Jadwal',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 450,
        ),
        'tanggal' => array(
            'label' => 'Start Date',
            'rule' => 'trim|xss_clean',
            'formatter' => 'general_date',
            'save_formatter' => 'date',
            'width' => 100,
            'align' => 'center',
        ),
        'tanggal_akhir' => array(
            'label' => 'End Date',
            'rule' => 'trim|xss_clean',
            'formatter' => 'general_date',
            'save_formatter' => 'date',
            'width' => 100,
            'align' => 'center',
            'hidden' => true
        ),
        'starttime' => array(
            'label' => 'Start Date',
            'rule' => 'trim|xss_clean',
            'formatter' => 'general_date',
            'save_formatter' => 'time',
            'width' => 100,
            'align' => 'center',
            'hidden' => true
        ),
        'endtime' => array(
            'label' => 'Start Date',
            'rule' => 'trim|xss_clean',
            'formatter' => 'general_date',
            'save_formatter' => 'time',
            'width' => 100,
            'align' => 'center',
            'hidden' => true
        ),
        'persyaratan' => array(
            'label' => 'Persyaratan Pendaftaran',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 200,
            'hidden' => true
        ),
        'panitia' => array(
            'label' => 'Panitia UJK',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
        ),
        'kuota_peserta' => array(
            'label' => 'Kuota',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 80,
            'align' => 'center',
        ),
        'discount_event' => array(
            'label' => 'Potongan',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 80,
            'align' => 'center',
        ),

        'id_tuk' => array(
            'label' => 'TUK',
            'rule' => 'trim|xss_clean',
            'formatter' => 'tuk',
            'save_formatter' => 'string',
            'width' => 150,
        ),
        'id_perangkat' => array(
            'label' => 'Nama Perangkat',
            'rule' => 'trim|xss_clean',
            'formatter' => 'nama_perangkat',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true,
        ),
        'is_kolektif' => array(
            'label' => 'Kolektif?',
            'rule' => 'trim|xss_clean',
            'formatter' => array('N','Y'),
            'save_formatter' => 'string',
            'width' => 100,
            'align' => 'center'
        ),'status_permohonan_blanko' => array(
            'label' => 'Status <br/>Blanko',
            'rule' => 'trim|xss_clean',
            'formatter' => array('N','Y'),
            'save_formatter' => 'string',
            'width' => 50,
            'align' => 'center',
            'hidden' => true,
        ),


    );
    protected $belongs_to = array(
        'tuk' => array(
            'model' => 'tuk_model',
            'primary_key' => 'id_tuk',
            'retrieve_columns' => array('tuk')
        ),
        'nama_perangkat' => array(
            'model' => 'perangkat_asesmen_model',
            'primary_key' => 'id_perangkat',
            'retrieve_columns' => array('nama_perangkat')
        ),
    );
    protected $_order = array("tanggal" => "DESC");
    protected $_unique = array('unique' => array('id'), 'group' => false);

    function daftar_hadir($id) {
        $this->db->select('a.id,c.users,a.nama_lengkap,a.no_uji_kompetensi,a.rekomendasi_asesor,a.alamat,a.telp,a.organisasi,b.skema');
        $this->db->from(kode_lsp() . 'asesi a');
        $this->db->join(kode_lsp() . 'skema b', 'a.skema_sertifikasi=b.id', 'LEFT');
        $this->db->join(kode_lsp() . 'users c', 'c.id=a.id_asesor', 'LEFT');
        $this->db->where('a.jadwal_id', $id);
        $this->db->order_by('c.users', 'ASC');
        $detail_asesi = $this->db->get()->result();
        //var_dump($detail_asesi);
        //die();
        return $detail_asesi;
    }
    function daftar_kompeten($id) {
        $this->db->select('a.rekomendasi_asesor');
        $this->db->from(kode_lsp() . 'asesi a');
        $this->db->where('a.jadwal_id', $id);
        $daftar_kompeten = $this->db->get()->result();
        return $daftar_kompeten;
    }

    function daftar_hadir_asesor($id) {
        $mapping = kode_lsp() . 'mapping_asesor';
        $jadual_asesmen = kode_lsp() . 'jadual_asesmen';
        $users = kode_lsp() . 'users';
        $this->db->select('a.id_jadwal,a.id_asesor, b.jadual, c.users, c.id_group_users');
        $this->db->from($mapping . ' a');
        $this->db->join($jadual_asesmen . ' b', 'b.id = a.id_jadwal');
        $this->db->join($users . ' c', 'c.id = a.id_asesor');
        $this->db->where('a.id_jadwal', $id);
        $this->db->group_by('a.id_asesor');
        $detail_asesi = $this->db->get()->result();
        return $detail_asesi;
    }

    function get_jadwal_tuk($id_tuk) {
        $this->db->where('id_tuk', $id_tuk);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        return $this->db->get(kode_lsp() . 'jadual_asesmen')->row();
    }

    function get_jadwal_isi($id_jadwal) {
        $this->db->where('id', $id_jadwal);
        //$this->db->order_by('id','DESC');
        //$this->db->limit(1);
        return $this->db->get(kode_lsp() . 'jadual_asesmen')->row();
    }

    function get_asesor($id) {
        $asesi = kode_lsp() . 'asesi';
        $users = kode_lsp() . 'users';
        $skema = kode_lsp() . 'skema';

        $query = $this->db->query("SELECT a.nama_lengkap,a.id_asesor,b.users,b.no_reg,c.skema,c.id as id_skema
        FROM $asesi a
        JOIN $users b ON b.id=a.id_asesor
        JOIN $skema c ON c.id=a.skema_sertifikasi
        WHERE a.jadwal_id=$id
        GROUP BY b.users");
        return $query->result();
    }

    public function get_all_jadwal($perpage, $offset, $search = "") {
        if ($search == "") {
            $this->db->order_by('tanggal', 'ASC');
            $this->db->limit($perpage);
            $this->db->offset($offset);
            $query = $this->db->get(kode_lsp() . 'jadual_asesmen');
        } else {
            $this->db->like('jadual', $search);
            $this->db->order_by('tanggal', 'ASC');
            $this->db->limit($perpage);
            $this->db->offset($offset);
            $query = $this->db->get(kode_lsp() . 'jadual_asesmen');
        }
        return $query->result();
    }

    function unit_kompetensi($id) {
        $skema = kode_lsp() . 'skema';
        $skema_detail = kode_lsp() . 'skema_detail';
        $unit_kompetensi = kode_lsp() . 'unit_kompetensi';

        $this->db->select("c.id_unit_kompetensi,c.unit_kompetensi", false);
        $this->db->from("$skema a");
        $this->db->join("$skema_detail b", "b.id_skema=a.id");
        $this->db->join("$unit_kompetensi c", "c.id=b.id_unit_kompetensi");
        //$this->db->join("$elemen_kompetensi d","d.id_unit_kompetensi=c.id");
        $this->db->where("a.id", $id);
        return $this->db->get()->result();
    }

    function get_jadwal() {
        $query = $this->db->get(kode_lsp() . 'jadual_asesmen')->result();
        return $query;
    }

    function get_jadwal_popular() {
        $this->db->limit(3);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get(kode_lsp() . 'jadual_asesmen')->result();
        return $query;
    }
     function select_jadwal($status = false){
        $this->db->order_by('tanggal', 'ASC');
        // $this->db->where('YEAR(tanggal)', '2019');
        $this->db->where('status_jadwal','1');
        if($status == false){
            $this->db->where('status_permohonan_blanko', '');
        }
        $query = $this->db->get(kode_lsp().'jadual_asesmen');
        //echo $this->db->last_query();die();
        return $query->result();
    }
}
