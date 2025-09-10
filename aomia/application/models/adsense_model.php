<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Adsense_model extends MY_Model {

  public function __construct() {
      $this->_table = kode_tbl()."adsense";
      parent::__construct($this->_table);
  }
  protected $_table;
  protected $table_label = 'Adsense Data';

	protected $_columns = array(
		'adsense'		=>	array(
			'label'	=> '<b>Adsense</b>',
			'rule' => 'required|xss_clean',
			'formatter'	=>	'string',
			'save_formatter' => 'string',
			'width' => 150
		),
      'script_adsense'		=>	array(
			'label'	=> '<b>Script</b>',
			'rule' => 'required|xss_clean',
			'formatter'	=>	'string',
			'save_formatter' => 'string',
			'width' => 150,
      'hidden' => true
		),
    'id_posisi' => array(
        'label' => '<b>Posisi</b>',
        'rule' => 'trim|required|xss_clean',
        'formatter' => 'posisi',
        'save_formatter' => 'string',
        'width' => 60
    ),
	);

	protected $_order = "id";
	protected $_unique = array('unique'=>array('id'), 'group'=>false);

  protected $belongs_to = array(
      'posisi' => array(
          'model' => 'posisi_adsense_model',
          'primary_key' => 'id_posisi',
          'retrieve_columns' => array('posisi')
      )
  );

  function adsense_top() {
      $adsense = kode_tbl().'adsense';

      $this->db->select('script_adsense');
      $this->db->from($adsense);
      $this->db->where('id_posisi', 2);
      $query = $this->db->get();
      return $query->result();
  }
  function adsense_bottom() {
      $adsense = kode_tbl().'adsense';

      $this->db->select('script_adsense');
      $this->db->from($adsense);
      $this->db->where('id_posisi', 7);
      $query = $this->db->get();
      return $query->result();
  }

}
