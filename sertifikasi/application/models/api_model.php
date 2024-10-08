<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

header('Content-Type: application/json');

Class Api_Model extends MY_Model {

  function get_test(){

    $query = $this->db->get('a_unit_client');

    if ($query->num_rows() > 0) {

         $response = array();
         $response['status'] = false;
         $response['message'] = 'Success get '. $query->num_rows() .' data';

         foreach ($query->result() as $row) {
            $tempArray = array();
            $tempArray['id_user'] = (int)$row->id;
            $tempArray['nama_user'] = $row->unit;
            $response['data'][] = $tempArray;
         }

         // header('Content-Type: application/json');
         echo json_encode($response);

      }

   }



}
