<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Artikel_Model extends MY_Model {

    public function __construct() {
        $this->_table = kode_tbl()."artikel";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Artikel Data';
    protected $_columns = array(
        'judul' => array(
            'label' => 'Judul',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'isi' => array(
            'label' => 'Artikel',
            'rule' => 'required',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true,
        ),
        'id_kategori' => array(
            'label' => 'Kategori',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'kategori',
            'save_formatter' => 'string',
            'width' => 60
        ),
        'headline' => array(
            'label' => 'Headline',
            'rule' => '',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 200
        ),
        'foto' => array(
            'label' => 'Images',
            'rule' => 'trim|xss_clean',
            'formatter' => 'url2images',
            'save_formatter' => 'string',
            'width' => 150,

        ),
        'show_image' => array(
            'label' => 'Photo',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => 'true'
        )
    );

    protected $belongs_to = array(
        'kategori' => array(
            'model' => 'artikel_kategori_model',
            'primary_key' => 'id_kategori',
            'retrieve_columns' => array('kategori')
        )
    );

    function url2images($url)
	{
		if(!is_null($url) && !empty($url)) {
			return "<img width=180px height=120px src='" . base_url() . "assets/files/artikel/" . $url . "' class='img-thumbnail' />";
		} else {
			return "";
		}
	}

    protected $_order = "id";
    protected $_unique = array('unique' => array('id'), 'group' => false);



    function galeri()
    {
        $this->db->select('a.foto');
        $this->db->from('$artikel a');
        $this->db->where('a.id_kategori',4);
        $query = $this->db->get();
        return $query->result();
    }

    function artikel()
    {
        $artikel = kode_tbl().'artikel';
        $artikel_kategori = kode_tbl().'artikel_kategori';

        $this->db->select('$artikel.id, $artikel.judul, $artikel.headline, $artikel.isi, $artikel_kategori.kategori');
        $this->db->from('$artikel');
        $this->db->join('$artikel_kategori','$artikel.id_kategori = $artikel_kategori.id');
        $this->db->where('$artikel.id_kategori', 1);
        $query = $this->db->get();
        return $query->result();
    }
    function berita_lainnya()
    {
        $artikel = kode_tbl().'artikel';
        $artikel_kategori = kode_tbl().'artikel_kategori';

        $this->db->select("a.id, a.judul, a.headline, a.isi, b.kategori");
        $this->db->from("$artikel a");
        $this->db->join("$artikel_kategori b","a.id_kategori = b.id");
        $this->db->where("a.id_kategori", 1);
        $this->db->limit(5);
        $this->db->order_by('a.id','RANDOM');
        $query = $this->db->get();
        return $query->result();
    }

    function detail($id)
    {
        $artikel = kode_tbl().'artikel';
        $this->db->select('*');
        $this->db->from("$artikel a");
        $this->db->where("id", $id);
        $query = $this->db->get();
        return $query->row();
    }

    function get_gallery()
    {
        $this->db->select('a.id, a.judul, a.headline, a.isi, b.kategori, a.foto');
        $this->db->from('$artikel a');
        $this->db->join('$artikel_kategori b', 'a.id_kategori = b.id');
        $this->db->where('a.id_kategori', 9);
        $query = $this->db->get();
        return $query->result();
    }

    function get_mitra()
    {
        $this->db->select('a.id, a.judul, a.headline, a.isi, b.kategori, a.foto');
        $this->db->from('$artikel a');
        $this->db->join('$artikel_kategori b', 'a.id_kategori = b.id');
        $this->db->where('a.id_kategori', 10);
        $query = $this->db->get();
        return $query->result();
    }
    function get_slideshow()
    {
        $artikel = kode_tbl().'artikel';
        $artikel_kategori = kode_tbl().'artikel_kategori';

        $this->db->select("a.*");
        $this->db->from("$artikel a");
        $this->db->join("$artikel_kategori b","a.id_kategori = b.id");
        $this->db->where("a.id_kategori", 4);
$this->db->order_by('id','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    function berita_lsp(){
        $artikel = kode_tbl().'artikel';
        $artikel_kategori = kode_tbl().'artikel_kategori';
        $this->db->select('a.id, a.judul, a.headline, a.isi, b.kategori, a.foto');
        $this->db->from("$artikel a");
        $this->db->join("$artikel_kategori b", "a.id_kategori = b.id");
        $this->db->where("a.id_kategori", 1);
        $this->db->limit(1);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        return $query->row();
    }
    function berita_lsp2(){
        $artikel = kode_tbl().'artikel';
        $artikel_kategori = kode_tbl().'artikel_kategori';
        $this->db->select('a.id, a.judul, a.headline, a.isi, b.kategori, a.foto');
        $this->db->from("$artikel a");
        $this->db->join("$artikel_kategori b", "a.id_kategori = b.id");
        $this->db->where("a.id_kategori", 1);
        $this->db->limit(1,1);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        return $query->row();
    }

	function berita_lsp_list(){
        $artikel = kode_tbl().'artikel';
        $artikel_kategori = kode_tbl().'artikel_kategori';
        $this->db->select('a.*, b.kategori');
        $this->db->from("$artikel a");
        $this->db->join("$artikel_kategori b", "a.id_kategori = b.id");
        $this->db->where("a.id_kategori", 1);
        $this->db->limit(4);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function berita_bnsp(){
        $artikel = kode_tbl().'artikel';
        $artikel_kategori = kode_tbl().'artikel_kategori';
        $this->db->select('a.id, a.judul, a.headline, a.isi, b.kategori, a.foto');
        $this->db->from("$artikel a");
        $this->db->join("$artikel_kategori b", "a.id_kategori = b.id");
        $this->db->where("a.id_kategori", 11);
        $this->db->limit(1);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        return $query->row();
    }
    function berita_kompetensi(){
        $artikel = kode_tbl().'artikel';
        $artikel_kategori = kode_tbl().'artikel_kategori';
        $this->db->select('a.id, a.judul, a.headline, a.isi, b.kategori, a.foto');
        $this->db->from("$artikel a");
        $this->db->join("$artikel_kategori b", "a.id_kategori = b.id");
        $this->db->where("a.id_kategori", 12);
        $this->db->limit(1);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        return $query->row();
    }
    function category($id){
        $artikel = kode_tbl().'artikel';
        $artikel_kategori = kode_tbl().'artikel_kategori';
        $this->db->select('a.*, b.kategori, c.nama_user');
        $this->db->from("$artikel a");
        $this->db->join("$artikel_kategori b", "a.id_kategori = b.id");
        $this->db->join("t_users c", "c.id = a.created_by","LEFT");
        $this->db->where("a.id_kategori", $id);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        return $query->result();
    }

	function marquee(){
        $artikel = kode_tbl().'artikel';
        $artikel_kategori = kode_tbl().'artikel_kategori';
        $this->db->select('a.id, a.judul, a.headline, a.isi, b.kategori, a.foto');
        $this->db->from("$artikel a");
        $this->db->join("$artikel_kategori b", "a.id_kategori = b.id");
        $this->db->where("a.id_kategori", 15);
        $this->db->limit(3);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function menu(){
          $artikel = kode_tbl().'artikel';
          $artikel_kategori = kode_tbl().'artikel_kategori';
          $this->db->select('a.id, a.judul, a.headline, a.isi, b.kategori, a.foto');
          $this->db->from("$artikel a");
          $this->db->join("$artikel_kategori b", "a.id_kategori = b.id");
          $this->db->where("a.id_kategori", 8);
          // $this->db->limit(3);
          $this->db->order_by('id','ASC');
          $query = $this->db->get();
          return $query->result();
      }
}
