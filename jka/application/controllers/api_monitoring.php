<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require APPPATH . '/libraries/REST_Controller.php';//lokasi library rest
require (APPPATH.'/libraries/REST_Controller.php');

class Api_monitoring extends REST_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model(array('api_monitor_model'));
    }

    function unit_get(){
        $data = array('respon : '.$this->get('id'));
        $this->response($data);
    }
    function unit_put(){
        $intruksi = $this->model_monitor->create($this->put('unit_id'),$this->put('output'));
        if ($intruksi==FALSE) {
            $this->set_response(array('status'=>'error'));
        }else{
            $this->set_response(REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
    }
    function unit_post(){
        $data = array('respon : '.$this->post('id'));
        $this->response($data);
    }
    function unit_delete(){
        $data = array('respon : '.$this->delete('id'));
        $this->response($data);
    }

}
