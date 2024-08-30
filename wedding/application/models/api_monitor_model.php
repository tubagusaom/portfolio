<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_monitor_model extends MY_Model{

    public function create($unit,$output){
        $data = array('unit_id' => $unit,
        'output'=>$output,
        'monitor_created'=>date('Y-m-d H-i-s'));
        $query = $this->db->insert('a_monitor_client', $data);
        return $query;
    }
    public function getByUnitId($id){
        $this->db->where('unit_id', $id);
        $query = $this->db->get('a_monitor_client');
        return $query;
    }

}
