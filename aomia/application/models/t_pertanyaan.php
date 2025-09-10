<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of t_pertanyaan
 *
 * @author sa_pta
 */
class t_pertanyaan extends MY_Model {

    //put your code here
    protected $_table = 't_pertanyaan';
    protected $table_label = 'Questions Data';
    protected $_columns = array(
        'id_unit_kompetensi' => array(
            'label' => 'Employee Number',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'nama_pegawai' => array(
            'label' => 'Employee Name',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'nama_pegawai_gelar' => array(
            'label' => 'Full Name',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150
        ),
        'divisi_id' => array(
            'label' => 'Division',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'nama_singkat',
            'save_formatter' => 'int',
            'width' => 150
        )
    );
    protected $_order = array("no_pegawai" => "ASC");
    protected $belongs_to = array(
        'divisi' => array(
            'model' => 'Divisi_Model',
            'primary_key' => 'divisi_id',
            'retrieve_columns' => array('nama_singkat')
        )
    );
    protected $_unique = array('unique' => array('no_pegawai'), 'group' => false);

    function __construct() {
        parent::__construct();
    }

}
