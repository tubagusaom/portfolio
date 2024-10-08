<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_unit extends MY_Model{

    public function getAll(){
        $query = $this->db->get('a_unit_client');
        return $query;
    }
    public function getMonitorByUnit($id){
        $this->db->select('*');
        $this->db->from('a_monitor_client');
        $this->db->where('unit_id', $id);
        $this->db->limit('100');
        $this->db->order_by('id_monitor','desc');
        $this->db->join('unit_client', 'unit_client.id_unit = monitor_client.unit_id');
        $query = $this->db->get('');
        return $query;
    }

}
