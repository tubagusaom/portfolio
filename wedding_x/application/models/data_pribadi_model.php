<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Data_pribadi_model extends MY_Model {
     public function __construct() {
        $this->_table = kode_tbl()."users"; 
        parent::__construct($this->_table);
    }
    protected $_table;
   
    protected $table_label = 'Data asesor';
    protected $_columns = array(
        'no_reg' => array(
            'label' => 'No Registrasi',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 80
        ),
        'sex' => array(
            'label' => 'Gender',
            'rule' => 'trim|xss_clean',
            'formatter' => array('','Laki-Laki','Perempuan'),
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),
        'tempat_lahir' => array(
            'label' => 'Tempat Lahir',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),
        'tgl_lahir' => array(
            'label' => 'Tanggal Lahir',
            'rule' => 'trim|xss_clean',
            'formatter' => 'general_date',
            'save_formatter' => 'date',
            'width' => 150
        ),
        'alamat' => array(
            'label' => 'Alamat',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),
        'email' => array(
            'label' => 'Email',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'hp' => array(
            'label' => 'Telepon',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'identity_number' => array(
            'label' => 'No Identitas',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),
        'identity_type' => array(
            'label' => 'Pekerjaan Orang Tua',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),
        'pos_code' => array(
            'label' => 'Pekerjaan Orang Tua',
            'rule' => 'trim|xss_clean',
            'formatter' => 'linkview',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
           
        ),
        'nationality' => array(
            'label' => 'Pekerjaan Orang Tua',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),
        'province' => array(
            'label' => 'Pekerjaan Orang Tua',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),
        'district' => array(
            'label' => 'Pekerjaan Orang Tua',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),
        'sub_district' => array(
            'label' => 'Pekerjaan Orang Tua',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),
        'village' => array(
            'label' => 'Pekerjaan Orang Tua',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),
        'rt' => array(
            'label' => 'Pekerjaan Orang Tua',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),
        'rw' => array(
            'label' => 'Pekerjaan Orang Tua',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),
        'deskripsi_bidang_asesor' => array(
            'label' => 'Pekerjaan Orang Tua',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'hidden' => true
        ),
        'foto_user' => array(
            'label' => 'Foto',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 90,
            'align' => 'center'
        ),
        'lampiran_cv' => array(
            'label' => 'Foto',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 90,
            'align' => 'center'
        ),
        'tahun_menjadi_asesor' => array(
            'label' => 'Foto',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 90,
            'align' => 'center'
        ),
        'lampiran_surat_pernyataan' => array(
            'label' => 'Foto',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 90,
            'align' => 'center'
        ),
        'lampiran_serkom1' => array(
            'label' => 'Foto',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 90,
            'align' => 'center'
        ),
        'lampiran_serkom2' => array(
            'label' => 'Foto',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 90,
            'align' => 'center'
        ),
        'lampiran_pakta_integritas' => array(
            'label' => 'Foto',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 90,
            'align' => 'center'
        ),
        'lampiran_seraskom' => array(
            'label' => 'Foto',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 90,
            'align' => 'center'
        )
        
    );
    protected $_order = array("id" => "ASC");

     	
     
	 

    
    protected $_unique = array('unique' => array('id'), 'group' => false);

    

    function siswa_profil($id){
        $this->db->select('a.*,b.batch_name,c.program_study');
        $this->db->from('t_siswa a');
        $this->db->join('t_angkatan b','b.id=a.batch_id');
        $this->db->join('t_program c','c.id=a.program_id');
        $this->db->where('a.id',$id);
        $query = $this->db->get()->row();
        return $query;
    }
    
    function siswa_program($id){
        $this->db->select("a.program_id,b.program_study,d.subject_name,d.general");
        $this->db->from('t_siswa a');
        $this->db->join('t_program b','b.id=a.program_id');
        $this->db->join('t_program_detail c','c.program_id=b.id');
        $this->db->join('t_subject d','d.id=c.program_id');
        $query = $this->db->get()->result();
        return $query;
    }

    function profil_asesor($id){
        $this->db->where('id',$id);
        $query = $this->db->get(kode_tbl().'users')->row();
        return $query;
    }

}
