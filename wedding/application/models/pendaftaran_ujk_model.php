<?php

class Pendaftaran_ujk_model extends MY_Model {

    // protected $_table = 'lsp029_asesi';
     public function __construct() {
         $this->_table = kode_lsp()."asesi";
         parent::__construct($this->_table);
     }
     protected $_table;
 
     protected $table_label = 'Data Pendaftaran UJK';
     protected $_columns = array(
         'u_date_create' => array(
             'label' => 'Registration Date',
             'rule' => 'trim|xss_clean',
             'formatter' => 'datetime',
             'save_formatter' => 'string',
             'width' => 80,
             'align' => 'center'
         ),
         'skema_sertifikasi' => array(
             'label' => 'Skema Sertifikasi',
             'rule' => 'trim|xss_clean',
             'formatter' => 'skema',
             'save_formatter' => 'string',
             'width' => 200,
         ),
         'nama_lengkap' => array(
             'label' => 'Nama Lengkap asesi',
             'rule' => 'trim|xss_clean',
             'formatter' => 'string',
             'save_formatter' => 'string',
             'width' => 200,        ),
         'no_identitas' => array(
             'label' => 'Identity Number',
             'rule' => 'trim|xss_clean',
             'formatter' => 'string',
             'save_formatter' => 'string',
             'width' => 170,
             'hidden' => 'true'
         ),
         'no_uji_kompetensi' => array(
             'label' => 'UJK Number',
             'rule' => 'trim|xss_clean',
             'formatter' => 'string',
             'save_formatter' => 'string',
             'width' => 170,
             'hidden' => 'true'
         ),
         'tempat_lahir' => array(
             'label' => 'Birth Place',
             'rule' => 'trim|xss_clean',
             'formatter' => 'string',
             'save_formatter' => 'string',
             'width' => 120,
             'hidden' => 'true',
         ),
         'tgl_lahir' => array(
             'label' => 'Birth Date',
             'rule' => 'trim|xss_clean',
             'formatter' => 'general_date',
             'save_formatter' => 'date',
             'width' => 100,
             'align' =>'center',
             'hidden' => 'true',
         ),
         'jenis_kelamin' => array(
             'label' => 'Sex',
             'rule' => 'trim|xss_clean',
             'formatter' => array(''=>'-','1'=>'Pria','2'=>'Wanita'),
             'save_formatter' => 'string',
             'width' => 60,
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
         'email' => array(
             'label' => 'Email',
             'rule' => 'trim|xss_clean',
             'formatter' => 'string',
             'save_formatter' => 'string',
             'width' => 150,
             'hidden' => 'true'
         ),
         'alamat' => array(
             'label' => 'Pra ',
             'rule' => 'trim|xss_clean',
             'formatter' => 'string',
             'save_formatter' => 'string',
             'hidden' => 'true',
 
         ),
         'jadwal_id' => array(
             'label' => 'Jadwal Asesmen',
             'rule' => 'trim|xss_clean',
             'formatter' => 'jadual',
             'save_formatter' => 'string',
             'width' => 170,
         ),
         'tuk_usulan' => array(
             'label' => 'TUK Pilihan ',
             'rule' => 'trim|xss_clean',
             'formatter' => 'string',
             'save_formatter' => 'string',
             'width' => 150,
             'hidden' => 'true',
         ),
         'id_tuk' => array(
             'label' => 'TUK Jadwal',
             'rule' => 'trim|xss_clean',
             'formatter' => 'tuk',
             'save_formatter' => 'string',
             'width' => 170,
         ),
         'file_bukti_pendukung' => array(
             'label' => 'Bukti Pendukung ',
             'rule' => 'trim|xss_clean',
             'formatter' => 'string',
             'save_formatter' => 'string',
             'width' => 210,
             'hidden' => 'true',
         ),
         'organisasi' => array(
             'label' => 'Lembaga/Organisasi ',
             'rule' => 'trim|xss_clean',
             'formatter' => 'string',
             'save_formatter' => 'string',
             'width' => 210,
         ),
         'marketing' => array(
             'label' => 'Pendaftar',
             'rule' => 'trim|xss_clean',
             'formatter' => array('umum_pskk'=>'umum_pskk','mahasiswa_pskk'=>'mahasiswa_pskk','umum'=>'umum'),
             'save_formatter' => 'string',
             'width' => 110,
 
         ),
         'pra_asesmen_checked' => array(
             'label' => 'Checked Pra Asesmen',
             'rule' => 'trim|xss_clean',
             'formatter' => 'nama_user',
             'save_formatter' => 'string',
             'width' => 150,
 
         ),
         'is_perpanjangan' => array(
             'label' => '*',
             'rule' => 'trim|xss_clean',
             'formatter' => array(''=>'','0'=>'N','1'=>'Y'),
             'save_formatter' => 'string',
             'align' =>'center',
             'width' => 30,
             'hidden' => 'true',
         ),
         'bukti_pendukung' => array(
             'label' => 'Checked Pra Asesmen',
             'rule' => 'trim|xss_clean',
             'formatter' => 'string',
             'save_formatter' => 'string',
             'width' => 210,
             'hidden' => 'true',
         ),
         'jabatan' => array(
             'label' => 'Checked Pra Asesmen',
             'rule' => 'trim|xss_clean',
             'formatter' => 'string',
             'save_formatter' => 'string',
             'width' => 210,
             'hidden' => 'true',
         ),
         'pendidikan_terakhir' => array(
             'label' => 'Checked Pra Asesmen',
             'rule' => 'trim|xss_clean',
             'formatter' => 'string',
             'save_formatter' => 'string',
             'width' => 210,
             'hidden' => 'true',
         ),
         'validitas_dokumen' => array(
             'label' => 'Checked Pra Asesmen',
             'rule' => '',
             'formatter' => 'string',
             'save_formatter' => 'string',
             'width' => 210,
             'hidden' => 'true',
         ),
         'catatan_validitas_dokumen' => array(
             'label' => 'Asesor',
             'rule' => '',
             'formatter' => 'string',
             'save_formatter' => 'string',
             'width' => 210,
             'hidden' => 'true',
         ),
         'rekomendasi_apl01' => array(
             'label' => 'Rekomendasi',
             'rule' => '',
             'formatter' => array('Baru','<label style="color:white;background-color:green;">Disetujui</label>','<label style="color:white;background-color:red;">Ditolak</label>','<label style="color:black;background-color:yellow;">Diperbaiki</label>'),
             'save_formatter' => 'string',
             'width' => 80,
             'align'=>'center'
 
         ),
         'catatan_rekomendasi_apl01' => array(
             'label' => 'catatan_rekomendasi_apl01',
             'rule' => '',
             'formatter' => 'string',
             'save_formatter' => 'string',
             'width' => 210,
             'hidden' => 'true',
         ),
         'id_users' => array(
             'label' => 'catatan_rekomendasi_apl01',
             'rule' => '',
             'formatter' => 'string',
             'save_formatter' => 'string',
             'width' => 210,
             'hidden' => 'true',
         ),
         'metode_bayar' => array(
             'label' => 'catatan_rekomendasi_apl01',
             'rule' => '',
             'formatter' => 'string',
             'save_formatter' => 'string',
             'width' => 10,
             'hidden' => 'true',
         ),
         'tanggal_praasesmen' => array(
             'label' => 'catatan_rekomendasi_apl01',
             'rule' => '',
             'formatter' => 'string',
             'save_formatter' => 'string',
             'width' => 10,
             'hidden' => 'true',
         ),
         'jumlah_pembayaran' => array(
             'label' => 'catatan_rekomendasi_apl01',
             'rule' => '',
             'formatter' => 'string',
             'save_formatter' => 'string',
             'width' => 10,
             'hidden' => 'true',
             'align'=>'center'
         )
     );
     protected $_order = array("u_date_create" => "DESC","id"=>"DESC");
 
       protected $belongs_to = array(
 
           'skema' =>  array(
           'model' => 'skema_model',
           'primary_key' => 'skema_sertifikasi',
           'retrieve_columns' => array('skema'),
           'join_type' => 'left'
           ),
         'jadwal' => array(
             'model' => 'jadwal_asesmen_model',
             'primary_key' => 'jadwal_id',
             'retrieve_columns' => array('jadual', 'tanggal'),
             'join_type' => 'left'
         ),'nama_tuk' => array(
             'model' => 'tuk_model',
             'primary_key' => 'id_tuk',
             'retrieve_columns' => array('tuk'),
             'join_type' => 'left'
         ),
           'asesor_praasesmen' =>  array(
           'model' => 'user_model',
           'primary_key' => 'pra_asesmen_checked',
           'retrieve_columns' => array('nama_user','jenis_user'),
           'join_type' => 'left'
           ),
       );
 
     protected $_unique = array('unique' => array('instruktur_code'), 'group' => false);

    function data_pendaftaran(){
        $this->db->select('a.*,b.jadual,c.skema');
        $this->db->from(kode_lsp().'mapping_skema a');
        $this->db->join(kode_lsp().'jadual_asesmen b','a.id_jadwal=b.id');
        $this->db->join(kode_lsp().'skema c','a.id_skema=c.id');
        $query = $this->db->get();
        return $query->result();
    }

    function data_view(){
        $this->db->select('*');
        $this->db->from(kode_lsp().'mapping_skema');
        $query = $this->db->get()->row();
        return $query;
    }
}