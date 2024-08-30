<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Pelelangan_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_tbl()."detail_kendaraan";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Data Pelelangan';
    protected $_columns = array(
        'id_member' => array(
            'label' => '<b>Customer</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'nama_member',
            'save_formatter' => 'string',
            'width' => 100
        ),
        'id_tahun' => array(
            'label' => '<b>Tahun</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'tahun_mobil',
            'save_formatter' => 'string',
            'width' => 100
        ),
        'id_merek' => array(
            'label' => '<b>Merek</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'merek_mobil',
            'save_formatter' => 'string',
            'width' => 100
        ),
        'id_model' => array(
            'label' => '<b>Model</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'model_mobil',
            'save_formatter' => 'string',
            'width' => 120
        ),
        'id_transmisi' => array(
            'label' => '<b>Transmisi</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'transmisi_mobil',
            'save_formatter' => 'string',
            'width' => 80
        ),
        'harga_kendaraan' => array(
            'label' => '<b>Harga</b>',
            'rule' => 'trim|xss_clean',
            'formatter' => 'rupiah',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'jam_awal' => array(
            'label' => '<b>Jam Awal</b>',
            'rule' => 'required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 100
        ),
        'jam_akhir' => array(
            'label' => '<b>Jam Akhir</b>',
            'rule' => 'required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 100
        ),
    		'status_lelang' =>	array(
    			'label' => '<b>Status Lelang</b>',
    			'rule'	=>	'trim|xss_clean',
          'formatter' => array(
              '<b style="background: grey; color:#fff; padding: 3px; border-radius: 3px; font-size:10px">&#9866;</b>', // 0 baru
              // '<b style="background: red; color:#fff; padding: 3px; border-radius: 3px; font-size:10px">&#10006;</b>', // 1 ditunda
              '<b style="background: orange; color:#fff; padding: 3px; border-radius: 3px; font-size:10px">LELANG</b>', // 1 lelang
              '<b style="background: green; color:#fff; padding: 3px; border-radius: 3px; font-size:10px">SELESAI</b>', // 2 terjual
              '<b style="background: blue; color:#fff; padding: 3px; border-radius: 3px; font-size:10px">LELANG ULANG</b>' // 3 terjual
            ),
    			'save_formatter' => 'string',
    			'width' => 80
    		),

        //batas
        'nopol_kendaraan' => array(
            'label' => '<b>No.Pol</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 50,
            'hidden' => true
        ),
        'jenis_kendaraan' => array(
            'label' => '<b>Jenis</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),
        'jumlah_bangku' => array(
            'label' => '<b>Jumlah Bangku</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),
        'spidometer_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        ),
        'bbm_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        ),
        'jumlah_kepemilikan_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        ),
        'status_pajak_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        ),
        'pajak_ditanggung_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        ),
        'asuransi_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        ),
        'catatan_kendaraan' => array(
            'label' => '<b>No.Pol Kendaraan</b>',
            'rule'	=>	'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 130,
            'hidden' => true
        )
    );

    protected $belongs_to = array(
        'nama_member' => array(
            'model' => 'member_model',
            'primary_key' => 'id_member',
            'retrieve_columns' => array('nama_member')
        ),
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

    function dokumen_member($id){
        $this->db->where('id_detail_kendaraan',$id);
        $this->db->where('status_tampil','1');
        $query = $this->db->get('tbl3133_komponen_member')->result();
        return $query;
    }

    function jenis_komponen($id){

        $jenis     = kode_tbl().'jenis_komponen';
        $komponen  = kode_tbl().'komponen_member';

        $this->db->select('a.*');
        $this->db->from("$jenis a");
        $this->db->join("$komponen b", "a.id = b.id_jenis");
        $this->db->where("b.id_detail_kendaraan", $id);
        $this->db->where('b.status_tampil','1');
        $this->db->group_by('b.id_jenis');

        $query = $this->db->get();
        return $query->result();
    }

    function detail_kendaraan($id){
      $detail_kendaraan = kode_tbl().'detail_kendaraan';
      $tahun_mobil = kode_tbl().'tahun_mobil';
      $merek_mobil = kode_tbl().'merek_mobil';
      $model_mobil = kode_tbl().'model_mobil';
      $transmisi_mobil = kode_tbl().'transmisi_mobil';
      $member = kode_tbl().'member';

      $this->db->select('a.*, b.tahun_mobil, c.merek_mobil, d.model_mobil, e.transmisi_mobil, f.nama_member');
      $this->db->from("$detail_kendaraan a");
      $this->db->join("$tahun_mobil b", "a.id_tahun = b.id");
      $this->db->join("$merek_mobil c","a.id_merek = c.id");
      $this->db->join("$model_mobil d","a.id_model = d.id");
      $this->db->join("$transmisi_mobil e","a.id_transmisi = e.id");
      $this->db->join("$member f","a.id_member = f.id");
      // $this->db->group_by('a.id');

      $this->db->where("a.id", $id);
      // $this->db->order_by('id','DESC');
      $query = $this->db->get();
      return $query->row();
    }

    function detail_lelang($id){
        $detail_kendaraan = kode_tbl().'detail_kendaraan';
        $lelang     = kode_tbl().'lelang';
        $dealer     = kode_tbl().'dealer';

        $this->db->select('a.id,a.jam_bidding, b.nama_dealer');
        $this->db->from("$lelang a");
        $this->db->join("$dealer b", "a.id_dealer = b.id");
        $this->db->join("$detail_kendaraan c", "a.id_detail_kendaraan = c.id");
        $this->db->where("c.id", $id);
        $this->db->order_by('jam_bidding','DESC');
        // $this->db->where('b.status_tampil','1');
        // $this->db->group_by('b.id_jenis');

        $query = $this->db->get();
        return $query->result();
    }

    function penyebut($nilai) {
      $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        if($nilai==0){
            return "Kosong";
        }elseif ($nilai < 12&$nilai!=0) {
            return "" . $huruf[$nilai];
        } elseif ($nilai < 20) {
            return Terbilang($nilai - 10) . " Belas ";
        } elseif ($nilai < 100) {
            return Terbilang($nilai / 10) . " Puluh " . Terbilang($nilai % 10);
        } elseif ($nilai < 200) {
            return " Seratus " . Terbilang($nilai - 100);
        } elseif ($nilai < 1000) {
            return Terbilang($nilai / 100) . " Ratus " . Terbilang($nilai % 100);
        } elseif ($nilai < 2000) {
            return " Seribu " . Terbilang($nilai - 1000);
        } elseif ($nilai < 1000000) {
            return Terbilang($nilai / 1000) . " Ribu " . Terbilang($nilai % 1000);
        } elseif ($nilai < 1000000000) {
            return Terbilang($nilai / 1000000) . " Juta " . Terbilang($nilai % 1000000);
        }elseif ($nilai < 1000000000000) {
            return Terbilang($nilai / 1000000000) . " Milyar " . Terbilang($nilai % 1000000000);
        }elseif ($nilai < 100000000000000) {
            return Terbilang($nilai / 1000000000000) . " Trilyun " . Terbilang($nilai % 1000000000000);
        }elseif ($nilai <= 100000000000000) {
            return "Maaf Tidak Dapat di Prose Karena Jumlah nilai Terlalu Besar ";
        }
    }

    // function terbilang($nilai) {
    //   if($nilai<0) {
    //     $hasil = "minus ". trim(penyebut($nilai));
    //   } else {
    //     $hasil = trim(penyebut($nilai));
    //   }
    //   return $hasil;
    // }



}
