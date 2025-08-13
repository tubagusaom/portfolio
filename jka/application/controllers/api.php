<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// require_once (APPPATH.'/libraries/REST_Controller.php');
// use Restserver\Libraries\REST_Controller;

class Api extends MY_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
		// $this->load->model(array('api_monitor_model'));

		$this->load->library('terabyte');
		// $this->load->library('rest_controller');
  }


    function index(){
			$request_method=$_SERVER["REQUEST_METHOD"];
				// $xxx = $this->terabyte->tbCode();

				if ($request_method == 'GET') {
					$response = $this->api_model->get_test();
				}else {
					$response["error_msg"] = "Method " . $request_method . " tidak diijinkan";

					// header('Content-Type: application/json');
	        echo json_encode($response);
				}

				// $response = $this->api_model->get_test();


				// echo json_encode($response);
				// header("HTTP/1.0 405 Method Not Allowed");
        // $this->response($response);

				// $data = array('respon : '.$this->get('id'));
        // $this->response($data);

				// var_dump($request_method); die();

    }


    function schedule_all(){
        header('Access-Control-Allow-Origin:*');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        header('Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding');

				header('Content-Type: application/json');

        // $this->db->get('t_repositori');
        // echo json_encode($this->db->get('v_users')->result());
    }
}
