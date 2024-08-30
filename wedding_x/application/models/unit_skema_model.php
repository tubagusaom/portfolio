<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Unit_skema_model extends MY_Model {

    protected $_table = 'v_unitskema';
    protected $table_label = 'Data Skema Unit';
    protected $_columns = array(
        'unit_kompetensi' => array(
            'label' => 'Unit Kompetensi',
            'rule' => 'trim|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 150,
            'align' => 'center'
        ),
        'skema' => array(
            'label' => 'Skema',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 200
        ),
        'id_unit' => array(
            'label' => 'Skema',
            'rule' => 'trim|required|xss_clean',
            'formatter' => 'string',
            'save_formatter' => 'string',
            'width' => 200,
            'hidden' => 'true'
        )
    );
 protected $_order = array("id" => "ASC");

    protected $_unique = array('unique' => array('id'), 'group' => false);

}
