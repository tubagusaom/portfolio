<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Master_mobil_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_tbl()."detail_mobil";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Data Mobil';
    protected $_columns = array(
        'id_tahun' => array(
            'label' => 'Tahun',
            'rule' => 'trim|xss_clean',
            'formatter' => 'tahun_mobil',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'id_merek' => array(
            'label' => 'Merek',
            'rule' => 'trim|xss_clean',
            'formatter' => 'merek_mobil',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'id_model' => array(
            'label' => 'Model',
            'rule' => 'trim|xss_clean',
            'formatter' => 'model_mobil',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'id_transmisi' => array(
            'label' => 'Transmisi',
            'rule' => 'trim|xss_clean',
            'formatter' => 'transmisi_mobil',
            'save_formatter' => 'string',
            'width' => 150
        ),
    );

    protected $belongs_to = array(
        'tahun_mobil' => array(
            'model' => 'tahun_mobil_model',
            'primary_key' => 'id_tahun',
            'retrieve_columns' => array('tahun_mobil'),
            'join_type' => 'left'
        ),
        'merek_mobil' => array(
            'model' => 'merek_mobil_model',
            'primary_key' => 'id_merek',
            'retrieve_columns' => array('merek_mobil'),
            'join_type' => 'left'
        ),
        'model_mobil' => array(
            'model' => 'model_mobil_model',
            'primary_key' => 'id_model',
            'retrieve_columns' => array('model_mobil'),
            'join_type' => 'left'
        ),
        'transmisi_mobil' => array(
            'model' => 'transmisi_mobil_model',
            'primary_key' => 'id_transmisi',
            'retrieve_columns' => array('transmisi_mobil'),
            'join_type' => 'left'
        )
    );

    protected $_order = array("id" => "DESC");
    protected $_unique = array('unique' => array('id'), 'group' => false);


    function get_tahun_mobil() {
      $tahun_mobil = kode_tbl().'tahun_mobil';
      $this->db->select('*');
      $this->db->from("$tahun_mobil");
      $this->db->order_by('id','DESC');

      $query = $this->db->get();
      return $query->result();
    }

    function get_mobil($idtable) {

      $detail_mobil = kode_tbl().'detail_mobil';
      $tahun_mobil = kode_tbl().'tahun_mobil';
      $merek_mobil = kode_tbl().'merek_mobil';
      $model_mobil = kode_tbl().'model_mobil';
      $transmisi_mobil = kode_tbl().'transmisi_mobil';

      $this->db->select('a.*, b.tahun_mobil, c.merek_mobil, d.model_mobil, e.transmisi_mobil');
      $this->db->from("$detail_mobil a");
      $this->db->join("$tahun_mobil b", "a.id_tahun = b.id");
      $this->db->join("$merek_mobil c","a.id_merek = c.id");
      $this->db->join("$model_mobil d","a.id_model = d.id");
      $this->db->join("$transmisi_mobil e","a.id_transmisi = e.id");
      // $this->db->group_by('a.id');

      $this->db->where("b.id", $idtable);
      // $this->db->order_by('id','DESC');
      $query = $this->db->get();
      return $query->result();
    }


}
