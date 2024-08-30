<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Training_model extends MY_Model
{

		protected $_table = 'peserta_pelatihan';
    protected $table_label = 'Data Peserta';
    protected $_columns = array(

        'nama' => array(
            'label' => 'Nama',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 100,
            'align' =>'left',
        ),

        'email' => array(
            'label' => 'Email',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 100,

        ),

         'no_identitas' => array(
            'label' => 'No Identitas',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 200,
            'align' =>'left',
        ),
         'alamat' => array(
            'label' => 'Alamat',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 200,
            'align' =>'center',
            'hidden' => 'true'
        ),
        'jadwal_id' => array(
            'label' => 'Jadwal',
            'rule' => 'trim|xss_clean',
            'formatter' => 'jadual',
            'save_formatter' => 'string',
            'width' => 220,

        ),
        'tanggal_daftar' => array(
            'label' => 'Tanggal Daftar',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 200,
            'align' =>'center'

        ),

    );

		protected $belongs_to = array(
			'jadwal_pelatihan' =>  array(
			'model' => 'Jadwal_asesmen_model',
			'primary_key' => 'jadwal_id',
			'retrieve_columns' => array('jadual'),
			'join_type' => 'left'
			),
		);

    protected $_order = array("id" => "DESC");
    protected $_unique = array('unique' => array('id'), 'group' => false);

		function __construct() {
        parent::__construct();
    }

    public function get_jadwal($perpage = 10, $offset = 0, $search = "") {
        if ($search == "") {
            $this->db->select('a.*')
                    ->from('lsp275_jadual_asesmen a')
                    ->where('a.id !=', "")
                    ->order_by('a.tanggal', 'ASC')
                    ->offset($offset)
            ;
            $query = $this->db->get();
        } else {
            $this->db->select('a.*')
                    ->from('lsp275_jadual_asesmen a')
                    ->where('a.id !=', "")
                    ->like('a.jadual', $search)
                    ->order_by('a.tanggal', 'ASC')
                    ->offset($offset)
            ;
            $query = $this->db->get();
        }
        return $query->result();
    }

    public function insert_peserta($data)
    {
      $result = $this->db->insert('peserta_pelatihan', $data);
        return $result;
    }


}
