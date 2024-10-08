<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
Class Welcome_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }
    public function data_skema($idlsp) {
        $this->db->select('*', false);
        $this->db->from($idlsp . 'skema');
        // $this->db->limit(2);
        $query = $this->db->get();
        return $query->result();
    }
    public function tuk($idlsp) {
        $this->db->select('*', false);
        $this->db->from($idlsp . 'tuk');
        // $this->db->limit(2);
        $query = $this->db->get();
        return $query->result();
    }

    public function data_tuk($idlsp) {
        $this->db->select('*', false);
        $this->db->from($idlsp . 'tuk');
        $query = $this->db->get();
//        return $query->result();

        $dd[''] = 'Pilih TUK';
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd[$row->id] = $row->tuk. " (".$row->alamat.")";
            }
        }
        return $dd;

    }
    function get_data_faq(){
        $this->db->from('t_faq');
        $this->db->where('u_status','A');
        $query = $this->db->get();
        return $query->result();
    }
    function dataPengunjung(){
        $query = $this->db->query("SELECT * FROM t_counter WHERE tanggal=CURDATE() GROUP BY ip");
        return $query->num_rows();
    }
    function totalPengunjung(){
        //$query = $this->db->query("SELECT COUNT(hits) FROM t_counter");
        return $this->db->count_all('t_counter');
    }
    function total_skema(){
      $this->db->from(kode_lsp().'skema');
      $query = $this->db->get();
      return $query->num_rows();
    }
    function total_asesor(){
      $this->db->select('a.id_group_users');
      $this->db->from(kode_lsp().'users a');
      $this->db->where('a.id_group_users', 6);
      $query = $this->db->get();
      return $query->num_rows();
    }
    function total_tuk(){
      $this->db->from(kode_lsp().'tuk');
      $query = $this->db->get();
      return $query->num_rows();
    }

    function data_jadwal($id_tuk){

      date_default_timezone_set('Asia/Jakarta');

        // $hari_jadwal = date('d');
        // // $bulan_jadwal = date('m') + 1;
        // $bulan_jadwal = date('m');
        // $tahun_jadwal = date('Y');
        //
        // $tanggal_jadwal = date('Y-' .$bulan_jadwal. '-' . $hari_jadwal);

        // var_dump($tgl_acuan); die();

        //$this->db->from('t_faq');
//        $this->db->where('tanggal >',date('Y-m-d'));

//        $query = $this->db->get(kode_lsp().'jadual_asesmen');
//        return $query->result();

        // $query = $this->db->get_where(
        //   kode_lsp().'jadual_asesmen',
        //     array(
        //       'id_tuk' => $id_tuk,
        //       'month(tanggal)' => $bulan_jadwal,
        //       'year(tanggal)' => $tahun_jadwal
        //     )
        // );

        // $tgl_acuan = date('Y-m-d', strtotime('+0 month', strtotime( date('Y-m-d') )));

        $datetime_acuan = date('Y-m-d H:i:s');

        // var_dump(count($data)); die();

        $this->db->order_by('tanggal', 'ASC');
        $query = $this->db->get_where(
          kode_lsp().'jadual_asesmen',
            array(
              "id_tuk" => $id_tuk,
              "kuota_tersisa >" => 0,
              "CONCAT_WS(' ',tanggal,endtime) >=" => $datetime_acuan
            )
        );

        // $query = $this->db->get_where(kode_lsp().'jadual_asesmen', array('id_tuk' => $id_tuk, 'year(tanggal)' => $tahun_jadwal));
        return $query->result();

    }

}
