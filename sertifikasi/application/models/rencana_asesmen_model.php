<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Rencana_asesmen_model extends MY_Model {

     public function __construct() {
        $this->_table = kode_lsp()."asesi_uji";
        parent::__construct($this->_table);
    }
    protected $_table;
    protected $table_label = 'Data Perencanaan Asesmen';
    protected $_columns = array(
        // 'id_asesi' => array(
        //     'label' => 'Complete Name',
        //     'rule' => 'trim|xss_clean',
        //     'formatter' => 'string',
        //     'save_formatter' => 'string',
        //     'width' => 170,
        // ),
        // 'is_perpanjangan' => array(
        //     'label' => 'RCC',
        //     'rule' => 'trim|xss_clean',
        //     'formatter' => array('N','Y','RPL','Pelatihan','Lainnya'),
        //     'save_formatter' => 'string',
        //     'align' =>'center',
        //     'width' => 50,
        // ),
        'ins_clo' => array(
            'label' => 'CLO',
            'rule' => 'trim|xss_clean',
            'formatter' => array('1','2','3','4','5'),
            'save_formatter' => 'string',
            'align' =>'center',
            'width' => 50,
        ),
        'ins_praktik' => array(
            'label' => 'CLO',
            'rule' => 'trim|xss_clean',
            'formatter' => array('1','2','3','4','5'),
            'save_formatter' => 'string',
            'align' =>'center',
            'width' => 50,
        ),
        'ins_observasi' => array(
            'label' => 'CLO',
            'rule' => 'trim|xss_clean',
            'formatter' => array('1','2','3','4','5'),
            'save_formatter' => 'string',
            'align' =>'center',
            'width' => 50,
        ),
        'ins_portofolio' => array(
            'label' => 'CLO',
            'rule' => 'trim|xss_clean',
            'formatter' => array('1','2','3','4','5'),
            'save_formatter' => 'string',
            'align' =>'center',
            'width' => 50,
        ),
        'ins_pg' => array(
            'label' => 'CLO',
            'rule' => 'trim|xss_clean',
            'formatter' => array('1','2','3','4','5'),
            'save_formatter' => 'string',
            'align' =>'center',
            'width' => 50,
        ),
        'ins_esai' => array(
            'label' => 'CLO',
            'rule' => 'trim|xss_clean',
            'formatter' => array('1','2','3','4','5'),
            'save_formatter' => 'string',
            'align' =>'center',
            'width' => 50,
        ),
        'ins_lisan' => array(
            'label' => 'CLO',
            'rule' => 'trim|xss_clean',
            'formatter' => array('1','2','3','4','5'),
            'save_formatter' => 'string',
            'align' =>'center',
            'width' => 50,
        ),
        'ins_vportofolio' => array(
            'label' => 'CLO',
            'rule' => 'trim|xss_clean',
            'formatter' => array('1','2','3','4','5'),
            'save_formatter' => 'string',
            'align' =>'center',
            'width' => 50,
        ),
        'ins_wawancara' => array(
            'label' => 'CLO',
            'rule' => 'trim|xss_clean',
            'formatter' => array('1','2','3','4','5'),
            'save_formatter' => 'string',
            'align' =>'center',
            'width' => 50,
        ),
        'ins_pihak3' => array(
            'label' => 'CLO',
            'rule' => 'trim|xss_clean',
            'formatter' => array('1','2','3','4','5'),
            'save_formatter' => 'string',
            'align' =>'center',
            'width' => 50,
        ),
        'ins_materi' => array(
            'label' => 'CLO',
            'rule' => 'trim|xss_clean',
            'formatter' => array('1','2','3','4','5'),
            'save_formatter' => 'string',
            'align' =>'center',
            'width' => 50,
        ),
        'ins_ulasan' => array(
            'label' => 'CLO',
            'rule' => 'trim|xss_clean',
            'formatter' => array('1','2','3','4','5'),
            'save_formatter' => 'string',
            'align' =>'center',
            'width' => 50,
        ),
    );
    protected $_order = array("id" => "DESC");
    protected $_unique = array('unique' => array('instruktur_code'), 'group' => false);

    function data_asesi_uji($id){

      $this->db->select('*');
      $this->db->from(kode_lsp().'asesi_uji');
      $this->db->where('id_asesi',$id);
      $query = $this->db->get(kode_lsp().'asesi_uji')->row();

      if(count($query) > 0){
        return $query;
      }else{
        return array();
      }
    }

    // function asesi($id){
    //     $this->db->select('a.id,a.nama_lengkap,a.no_uji_kompetensi,a.no_identitas,a.skema_sertifikasi,a.jenis_kelamin,b.skema,c.tuk');
    //     $this->db->from(kode_lsp().'asesi a');
    //     $this->db->join(kode_lsp().'skema b','b.id=a.skema_sertifikasi');
    //     $this->db->join(kode_lsp().'tuk c','c.id=a.id_tuk');
    //     $this->db->where('a.id',$id);
    //     $query = $this->db->get(kode_lsp().'asesi')->row();
    //     if(count($query) > 0){
    //         return $query;
    //     }else{
    //         return array();
    //     }
    // }
    //
    // function perangkat_uji($data){
    //
    //   $array_perangkat = array('Pertanyaan Lisan','Pertanyaan Tulisan','Observasi / Praktek','Wawancara','Cek Portofolio');
    //
    //   if($data != ""){
    //       $perangkat = @unserialize($data);
    //   }else{
    //       $perangkat = array();
    //   }
    //
    //   if (isset($perangkat)) {
    //     foreach ($perangkat as $key => $value) {
    //       $filedata[] = $array_perangkat[$value];
    //     }
    //   }
    //
    //   return $filedata;
    // }
}
