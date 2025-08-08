<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class CI_grids {
    protected $ci;
	protected $config;
	protected $model;
	protected $columns;
	protected $fields;
	protected $controller;
	protected $toolbars;
	protected $gridtype;
	protected $title;
	protected $options =  array();

    function __construct() {
		$this->ci =& get_instance();
		$this->config =&  get_config();
		$this->ci->load->library('auth');
	}

    public function set_properties() {
		
		$properties = func_get_args();
		
		if(count($properties) == 1 && is_array($properties)){
			foreach($properties as $property=>$value) {
				$this->load_app($value);
			}
		}

    }

	public function load_model($data) {
		$model = $this->ci->load->model($data);

		// var_dump($model); die();
		return $model;
	}

	public function load_app($data) {

		$properties = $data;

		$model = $this->load_model($properties['model']);
		$title = $model->get_params('table_label');
		$field = $model->data_jadwal();

		// if(array_key_exists($field, $properties)) {

		// }

		// var_dump($model); die();

		$this->ci->load->view('templates/users/header',$properties);
		$this->ci->load->view('templates/users/data/app');
		$this->ci->load->view('templates/users/footer');
	}



}