<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Asesi_model extends MY_Model {

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


    function data_asesi($id){
        $asesi = kode_lsp().'asesi';
        $skema = kode_lsp().'skema';
        $tuk = kode_lsp().'tuk';

        $this->db->select('a.*,b.skema,b.kode_skema,c.tuk,c.jenis_tuk');
        $this->db->from($asesi.' a');
        $this->db->join($skema .' b','a.skema_sertifikasi=b.id');
        $this->db->join($tuk .' c','a.id_tuk=c.id');
        //$this->db->join($skema .' b','a.skema_sertifikasi=b.id');
        $this->db->where('a.id',$id);
        $detail_asesi = $this->db->get()->row();
        return $detail_asesi;
    }

    function data_unit_kompetensi($id){
            $unit_kompetensi = kode_lsp().'unit_kompetensi';
            $skema_detail = kode_lsp().'skema_detail';
            $query = $this->db->query("select a.*
            from $unit_kompetensi a
            JOIN $skema_detail b ON b.id_unit_kompetensi=a.id
            WHERE b.id_skema =$id");
            return $query->result();
    }

    function asesi_detail($id){
        $this->db->select('a.*, b.skema');
        $this->db->from(kode_lsp().'asesi a');
        $this->db->join(kode_lsp().'skema b', 'a.skema_sertifikasi = b.id', 'left');
        $this->db->where('a.id', $id);
        $query = $this->db->get();

        return $query->result();
    }
    function asesi_detail_muk($id){
        $this->db->select('
            a.*,
            b.skema,
            c.jenis_bukti,
            c.elemen,
            c.unit_kompetensi_id,
            c.is_kompeten
        ');
        $this->db->from(kode_lsp().'asesi a');
        $this->db->join(kode_lsp().'skema b', 'a.skema_sertifikasi = b.id', 'left');
        $this->db->join(kode_lsp().'asesi_detail c', 'c.asesi_id = a.id', 'left');
        $this->db->where('a.id', $id);
        $query = $this->db->get();

        return $query->result();
    }
    function elemen($id){
        $elemen_kompetensi = kode_lsp().'elemen_kompetensi';
        $skema_detail = kode_lsp().'skema_detail';
        $unit_kompetensi = kode_lsp().'unit_kompetensi';
        $query = $this->db->query("SELECT a.*
        FROM $elemen_kompetensi a
        WHERE a.id_unit_kompetensi=(SELECT id
        FROM $unit_kompetensi WHERE id_unit_kompetensi='$id')");
        //dump($query->result()->elemen);
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
      function files_asesi($id){
        $this->db->where('id_asesi',$id);
        $this->db->limit(20);
        //$this->db->group_by('b.nama_dokumen');
        $query = $this->db->get('t_repositori')->result();

        //$this->db->select('a.*');
        //$this->db->from('t_repositori a');
        //$this->db->join(kode_lsp().'asesi b','a.id_asesi=b.id_users');
        //$this->db->where('b.id',$id);
        //$this->db->or_where('created_by',$id);
        //$query = $this->db->get();
        return $query;

    }
    function files_asesi_muk($id){
        $this->db->where('id_asesi',$id);
        $this->db->where('jenis_portofolio >', '2');
        //$this->db->group_by('b.nama_dokumen');
        $query = $this->db->get('t_repositori')->result();

        //$this->db->select('a.*');
        //$this->db->from('t_repositori a');
        //$this->db->join(kode_lsp().'asesi b','a.id_asesi=b.id_users');
        //$this->db->where('b.id',$id);
        //$this->db->or_where('created_by',$id);
        //$query = $this->db->get();
        return $query;

    }
     function foto($id){
        $query = $this->db->query("SELECT foto_profil
        FROM t_users  WHERE pegawai_id=$id AND jenis_user=1")->row();
        //var_dump($query);
        return $query->foto_profil;

    }

    function jadwal($jadwal_id){
        $this->db->where('id',$jadwal_id);
        $jadwal = $this->db->get(kode_lsp().'jadual_asesmen')->row();
        return $jadwal;
    }

    function nama_tuk($id_tuk){
        $this->db->where('id',$id_tuk);
        $tuk = $this->db->get(kode_lsp().'tuk')->row();
        return $tuk;
    }

    function askom($id){
        $this->db->where('id',$id);
        $asesor = $this->db->get('vst_askom')->row();
        return $asesor;
    }
    function asesor_bertugas($id){
        $this->db->select('b.id,b.users');
        $this->db->from(kode_lsp().'mapping_asesor a');
        $this->db->join(kode_lsp().'users b','b.id=a.id_asesor');
        $this->db->where('a.id_jadwal',$id);
        $query = $this->db->get()->result();
        return $query;
    }
    function asesi_lengkap($id){
        $this->db->select('a.*, b.skema, b.kode_skema, c.users, c.no_reg, d.tuk, d.jenis_tuk, e.tanggal,e.tanggal_akhir');
        $this->db->from(kode_lsp().'asesi a');
        $this->db->join(kode_lsp().'skema b', 'a.skema_sertifikasi = b.id');
        $this->db->join(kode_lsp().'users c', 'a.id_asesor = c.id', 'LEFT');
        $this->db->join(kode_lsp().'tuk d', 'a.id_tuk = d.id', 'LEFT');
        $this->db->join(kode_lsp().'jadual_asesmen e', 'a.jadwal_id = e.id', 'LEFT');
        $this->db->where('a.id',$id);
        $query = $this->db->get()->row();
        return  $query;
    }
    function bukti_bukti($bukti){

        $b   = str_replace('|', '"', $bukti);
        $buktibukti = json_decode($b);

        if (isset($buktibukti)) {
          foreach ($buktibukti as $key => $filebukti) {
            if ($key == 'foto' || $key == 'ktp' || $key == 'ijazah') {
               $buktipendukung[] = $key;
               $filependukung[] = $filebukti;
            }else {
               $buktitambahan[] = $key;
               $filetambahan[] = $filebukti;
            }
          }
        }

        if (isset($buktipendukung)) {
          $data['pendukung'] = $buktipendukung;
          $data['filependukung'] = $filependukung;
        }else {
          $data['pendukung'] = array();
          $data['filependukung'] = array();
        }


        if (isset($buktitambahan)) {
          $data['tambahan']  = $buktitambahan;
          $data['filetambahan'] = $filetambahan;
        }else {
          $data['tambahan']  = array();
          $data['filetambahan'] = array();
        }

        return $data;
      }

      function portofolio($id){

        if(is_null($id)){
            $data = array();
        }else{
            $data = $this->db->get_where('t_repositori',array('id_asesi'=>$id))->result();
        }

        return $data;
      }

      function jenis_bukti_asesi(){
        $data = array(
          '1' => 'KTP',
          '2' => 'Ijazah',
          '3' => 'Surat Keterangan Keaslian Dok',
          '4' => 'Contoh / Report Pekerjaan (CP)',
          '5' => 'Sertifikat Pelatihan (SK)',
          '6' => 'Surat Referensi dari Perusahaan',
          '7' => 'Job Description (JD)',
          '8' => 'Demonstrasi Pekerjaan (De)',
          '9' => 'Wawancara dg. Supervisor, teman atau klien',
          '10' => 'Pengalaman Industri (Pe)',
          '11' => 'Bukti-Bukti Lain yang Masih Relevan / CV',
          '12' => 'Sertifikat Expired',
        );

        return $data;
      }

      function kd_bukti(){
        $data = array(
          '' => '-',
          'foto' => 'FOTO',
          'ktp' => 'KTP',
          'ijazah' => 'IJAZAH',
          'skkd' => 'SKKD',
          'cp' => 'CP',
          'surat_pelatihan' => 'SK',
          'surat_referensi' => 'SR',
          'job_description' => 'JD',
          'demonstrasi_pekerjaan' => 'DP',
          'ws[]' => 'WS',
          'pengalaman_industri' => 'PE',
          'bukti_relevan' => 'BR',
          'sertifikat_expired' => 'SE'
        );

        return $data;
      }

      function jenis_kode_bukti(){
        $data = array(
          'SKKD' => 'Surat Keterangan Keaslian Dokumen',
          'CP' => 'Contoh / Report Pekerjaan / Report Sheet',
          'SK' => 'Sertifikat Pelatihan yang relevan dengan Skema sertifikasi',
          'SR' => 'Surat Referensi dari Perusahaan',
          'JD' => 'Job Description',
          'DE' => 'Demonstrasi Pekerjaan',
          'WS' => 'Wawancara dg. Supervisor, teman atau klien',
          'PE' => 'Pengalaman Industri',
          'CV' => 'Bukti-Bukti Lain yang Masih Relevan / CV',
          'BR' => 'Bukti-Bukti Lain yang Masih Relevan / CV',
          'SERKOM' => 'Sertifikat Kompetensi yang masih aktif/Expired'
        );

        return $data;
      }

      function kode_bukti(){
        $data = array(
          '1' => 'KTP',
          '2' => 'Ijazah',
          '3' => 'SKKD',
          '4' => 'CP',
          '5' => 'SP',
          '6' => 'SR',
          '7' => 'JD',
          '8' => 'DP',
          '9' => 'WS',
          '10' => 'PE',
          '11' => 'BR',
          '12' => 'SE',
        );

        return $data;
      }

      function bukti_jenis(){
        $data = array('1' => 'ktp'
            , '2' => 'ijazah'
            , '3' => 'skkd'
            , '4' => 'cp'
            , '5' => 'surat_pelatihan'
            , '6' => 'surat_referensi'
            , '7' => 'job_description'
            , '8' => 'demonstrasi_pekerjaan'
            , '9' => 'ws'
            , '10' => 'pengalaman_industri'
            , '11' => 'bukti_relevan'
            , '12' => 'sertifikat_expired'
        );

        return $data;
      }
}
