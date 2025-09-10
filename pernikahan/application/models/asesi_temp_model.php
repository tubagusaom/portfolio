<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class asesi_temp_model extends MY_Model {

   // protected $_table = 'lsp029_asesi_temp';
    public function __construct() {
        $this->_table = kode_lsp()."asesi_temp"; 
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
            'label' => 'Complete Name',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 170,
            
        ),
        'id_tuk' => array(
            'label' => 'TUK',
            'rule' => 'trim|xss_clean',
            'formatter' => 'tuk',
            'save_formatter' => 'string',
            'width' => 170,
            
        ),'no_identitas' => array(
            'label' => 'Identity Number',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 170
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
            'rule' => 'trim||xss_clean',
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
            'formatter' => array('-','Pria','Wanita'),
            'save_formatter' => 'string',
            'width' => 60,
            
        ),
        'telp' => array(
            'label' => 'Telp',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 120,
            
        ),
        'email' => array(
            'label' => 'Email',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 120,
            'hidden' => 'true',
        ),
        'alamat' => array(
            'label' => 'Pra ',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'hidden' => 'true',
            
        ),
        'file_bukti_pendukung' => array(
            'label' => 'Bukti Pendukung ',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 210,
            'hidden' => 'true',
        ),
        'pra_asesmen_checked' => array(
            'label' => 'Checked Pra Asesmen',
            'rule' => 'trim|xss_clean',
            'formatter' => 'nama_user',
            'save_formatter' => 'string',
            'width' => 210,
            
        ),
        'is_perpanjangan' => array(
            'label' => '*',
            'rule' => 'trim|xss_clean',
            'formatter' => array('N','Y'),
            'save_formatter' => 'string',
            'align' =>'center',
            'width' => 30,
        ),
        'bukti_pendukung' => array(
            'label' => 'Checked Pra Asesmen',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 210,
            'hidden' => 'true',
        )
    );
    protected $_order = array("id" => "ASC");

      protected $belongs_to = array(
          'tuk' =>  array(
          'model' => 'tuk_model',
          'primary_key' => 'id_tuk',
          'retrieve_columns' => array('tuk'),
          'join_type' => 'left'
          ),
          'skema' =>  array(
          'model' => 'skema_model',
          'primary_key' => 'skema_sertifikasi',
          'retrieve_columns' => array('skema')
          ),
          'user' =>  array(
          'model' => 'user_model',
          'primary_key' => 'pra_asesmen_checked',
          'retrieve_columns' => array('nama_user','jenis_user'),
          'join_type' => 'left'
          ),
      );
      
    protected $_unique = array('unique' => array('instruktur_code'), 'group' => false);

    
    function data_asesi_temp($id){
        $asesi_temp = kode_lsp().'asesi_temp';
        $skema = kode_lsp().'skema';
        $this->db->select('a.*,b.skema,b.kode_skema');
        $this->db->from($asesi_temp.' a');
        $this->db->join($skema .' b','a.skema_sertifikasi=b.id');
        $this->db->where('a.id',$id);
        $detail_asesi_temp = $this->db->get()->row();
        return $detail_asesi_temp;
    }
    
    function data_unit_kompetensi($id){
        $unit_kompetensi = kode_lsp().'unit_kompetensi';
        $skema_detail = kode_lsp().'skema_detail';
        $query = $this->db->query("select a.id_unit_kompetensi,a.unit_kompetensi
    from $unit_kompetensi a
    JOIN $skema_detail b ON b.id_unit_kompetensi=a.id
    WHERE b.id_skema =$id");
    return $query->result();
    }
    
    function asesi_temp_detail($id){
        $this->db->where('asesi_temp_id',$id);
        $detail_asesi_temp = $this->db->get(kode_lsp().'asesi_temp_detail')->result();
        return $detail_asesi_temp;
    }
    function elemen($id){
        $elemen_kompetensi = kode_lsp().'elemen_kompetensi';
        $skema_detail = kode_lsp().'skema_detail';
        $unit_kompetensi = kode_lsp().'unit_kompetensi';
        $query = $this->db->query("SELECT a.*
        FROM $elemen_kompetensi a
        WHERE a.id_unit_kompetensi=(SELECT id
        FROM $unit_kompetensi WHERE id_unit_kompetensi='$id')");
        return $query->result();
    }
    function kuk($id){
        $kuk = kode_lsp().'kuk';
        $query = $this->db->query("SELECT *
        FROM $kuk a
        WHERE a.id_elemen_kompetensi=$id");
        return $query->result();
    }
    function detail_elemen_kuk($kode_skema){
        $skema = kode_lsp().'skema';
        $skema_detail = kode_lsp().'skema_detail';
        $unit_kompetensi = kode_lsp().'unit_kompetensi';
        $elemen_kompetensi = kode_lsp().'elemen_kompetensi';
        
        $data = $this->db->query("SELECT a.id,a.skema,c.id_unit_kompetensi,c.unit_kompetensi,d.id as id_elemen,d.elemen_kompetensi
            FROM $skema a
            JOIN $skema_detail b ON a.id=b.id_skema
            JOIN $unit_kompetensi c ON b.id_unit_kompetensi=c.id
            JOIN $elemen_kompetensi d ON c.id=d.id_unit_kompetensi
            WHERE a.id=".$kode_skema);
        return $data->result();
    }
}
