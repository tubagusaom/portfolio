<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Pra_asesmen_model extends MY_Model {

    public function __construct() {
        $this->_table = kode_lsp() . "asesi";
        parent::__construct($this->_table);
    }

    protected $_table;
    protected $table_label = 'Data Praasesmen UJK';
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
            'width' => 170,
            'hidden' => 'true'
        ),
        'nama_lengkap' => array(
            'label' => 'Complete Name',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 230,
        ),
        'no_identitas' => array(
            'label' => 'Identity Number',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 170,
            'hidden' => 'true'
        ),
        'tujuan_asesmen' => array(
            'label' => 'Jenis Asesmen',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
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
            'align' => 'center',
            'hidden' => 'true',
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
            'width' => 120,
            'hidden' => 'true',
        ),
        'alamat' => array(
            'label' => 'Alamat ',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'hidden' => 'true'
        ),
        'pra_asesmen_date' => array(
            'label' => 'Praasesmen Date ',
            'rule' => 'trim|xss_clean',
            'formatter' => 'pra_asesmen_date',
            'save_formatter' => 'date',
            'width' => 130,
        ),
        'pra_asesmen' => array(
            'label' => 'Rekomendasi',
            'rule' => 'trim|xss_clean',
            'formatter' => array('-', 'Lanjut', 'Tidak Lanjut'),
            'save_formatter' => 'string',
            'width' => 120,
        ),
        'pra_asesmen_description' => array(
            'label' => 'Praasesmen Date ',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 120,
            'hidden' => 'true'
        ),
        'pra_asesmen_checked' => array(
            'label' => 'Checked Praasesmen',
            'rule' => 'trim|xss_clean',
            'formatter' => 'nama_user',
            'save_formatter' => 'string',
            'width' => 210,
        ),
        'id_users' => array(
            'label' => 'Praasesmen Date ',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 120,
            'hidden' => 'true'
        ),
        'validitas_dokumen_pra_asesmen' => array(
            'label' => 'Checked Praasesmen',
            'rule' => '',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 210,
            'hidden' => 'true',
        ),
        'jadwal_id' => array(
            'label' => 'id jadwal',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 210,
            'hidden' => 'true'
        ),
        'metode_asesmen' => array(
            'label' => 'Metode Asesmen',
            'rule' => '',
            'formatter' => array('-','Uji Kompetensi', 'Asesmen Portofolio'),
            'save_formatter' => 'string',
            'width' => 110,
        ),
        'perangkat_yang_digunakan' => array(
            'label' => 'Checked Praasesmen',
            'rule' => '',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 210,
            'hidden' => 'true',
        ),
        'marketing' => array(
            'label' => 'Checked Praasesmen',
            'rule' => '',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 210,
            'hidden' => 'true',
        ),
        'jumlah_pembayaran' => array(
            'label' => 'Checked Praasesmen',
            'rule' => '',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 210,
            'hidden' => 'true',
        )
    );
    protected $_order = array("id" => "DESC");
    protected $belongs_to = array(
        'skema' => array(
            'model' => 'skema_model',
            'primary_key' => 'skema_sertifikasi',
            'retrieve_columns' => array('skema'),
            'join_type' => 'left'
        ),
        'user' => array(
            'model' => 'user_model',
            'primary_key' => 'pra_asesmen_checked',
            'retrieve_columns' => array('nama_user', 'jenis_user'),
            'join_type' => 'left'
        )
    );
    protected $_unique = array('unique' => array('instruktur_code'), 'group' => false);

    function pra_asesmen_date($datepra) {
        if (!is_null($datepra) && !empty($datepra)) {
            return "$datepra";
        } else {
            return "-";
        }
    }

    function asesor_pra_asesmen($id) {
        $this->db->select('a.id,b.users,b.no_reg');
        $this->db->from('t_users a');
        $this->db->join(kode_lsp() . 'users b', 'a.pegawai_id=b.id');
        $this->db->where('a.id', $id);
        $query = $this->db->get()->row();
        if (count($query) > 0) {
            return $query;
        } else {
            return array();
        }
    }

    function asesor_uji($id) {
        $this->db->select('*');
        $this->db->from(kode_lsp() . 'users a');
        $this->db->where('a.id', $id);
        $query = $this->db->get()->row();
        if (count($query) > 0) {
            return $query;
        } else {
            return array();
        }
    }

    function asesi($id) {
        $this->db->select('a.id,a.nama_lengkap,a.validitas_dokumen_pra_asesmen,a.no_uji_kompetensi,a.no_identitas,a.jenis_kelamin,b.skema,c.tuk');
        $this->db->from(kode_lsp() . 'asesi a');
        $this->db->join(kode_lsp() . 'skema b', 'b.id=a.skema_sertifikasi');
        $this->db->join(kode_lsp() . 'tuk c', 'c.id=a.id_tuk');
        $this->db->where('a.id', $id);
        $query = $this->db->get(kode_lsp() . 'asesi')->row();
        if (count($query) > 0) {
            return $query;
        } else {
            return array();
        }
    }

    function files_asesi($id) {
        $this->db->where('id_asesi', $id);
        //$this->db->or_where('created_by',$id);
        $query = $this->db->get('t_repositori');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    function perangkat_ygdipakai($id_skema) {
        $this->db->where('id_skema', $id_skema);
        $query = $this->db->get(kode_lsp() . 'skema_perangkat')->result();
        foreach ($query as $key => $value) {
            $perangkat[] = $value->nama_perangkat;
        }
        return implode(',', $perangkat);
    }

    function jadwal($jadwal_id){
        $this->db->where('id',$jadwal_id);
        $jadwal = $this->db->get(kode_lsp().'jadual_asesmen')->row();

        // $this->db->where('id',$jadwal->id_tuk);
        // $data_tuk = $this->db->get(kode_lsp().'tuk')->row();

        return $jadwal;
    }
    function perangkat_uji($data){

        $array_perangkat = array('Pertanyaan Lisan','Pertanyaan Tulisan','Observasi / Praktek','Wawancara','Cek Portofolio','Ceklis Ulasan Produk');
  
        if($data != ""){
            $perangkat = @unserialize($data);
        }else{
            $perangkat = array();
        }
  
        if (isset($perangkat)) {
          foreach ($perangkat as $key => $value) {
            $filedata[] = $array_perangkat[$value];
          }
        }
  
        return $filedata;
      }
      function detail_skema($idskema,$grouping){
        // $data = "ID Skema";
        // var_dump($jenisbukti); die();
  
        $this->db->select('
          id_unit AS id,
          skema,
          unit,
          elemen,
          kuk
        ');
        $this->db->from('v_skema_detail');
  
        $this->db->where('id_skema',$idskema);
        $this->db->group_by($grouping);
        $data = $this->db->get()->result();
  
        return $data;
      }
    function asesi_detail_uji($id){
        $this->db->select('*');
        $this->db->from(kode_lsp().'asesi_uji a');
        $this->db->where('a.id_asesi',$id);
        $query = $this->db->get()->row();
        if(count($query) > 0){
            return $query;
        }else{
            return array();
        }
      }

      function detail_asesi_asesmen($id){
        $this->db->select('a.*,b.nama_lengkap');
        $this->db->from(kode_lsp().'asesi_uji a');
        $this->db->join(kode_lsp().'asesi b','a.id_asesi=b.id');
        $this->db->where('a.id',$id);
        $query = $this->db->get()->row();
        // dump($query);die();

      }
    
}
