<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Sumber_anggaran extends MY_Controller {
		function __construct() {
			parent::__construct();
				$this->load->model('sumber_anggaran_model');
		}

		function combogrid($id = false) {
			$row = intval($this->input->post('rows')) == 0 ? 20 : intval($this->input->post('rows')) ;
			$page = intval($this->input->post('page'))== 0 ? 1 : intval($this->input->post('page'));
			$offset = $row * ($page - 1);
			$data = array();
			$params = array('_return'=>'data');
			if(isset($_POST['q']))
			{
				$where['jenis_anggaran LIKE'] = "%" . $this->input->post('q') . "%";
			}
			if(isset($where)) $params['_where'] = $where;
			$data['total'] = isset($where) ? $this->sumber_anggaran_model->count_by($where) : $this->sumber_anggaran_model->count_all();
			$this->sumber_anggaran_model->limit($row, $offset);
			$order_criteria = "ASC";
			$_order_escape = TRUE;
			if($id)
			{
				$order = "FIELD(id, " . intval($id) . ")";
				$order_criteria = "DESC";
				$_order_escape = FALSE;
			}
			else
			{
				$order = $this->sumber_anggaran_model->get_params('_order');
			}
			$rows = isset($where) ? $this->sumber_anggaran_model->order_by($order, $order_criteria, $_order_escape)->get_many_by($where) : $this->sumber_anggaran_model->order_by($order, $order_criteria, $_order_escape)->get_all();
			$data['rows'] = $this->sumber_anggaran_model->get_selected()->data_formatter($rows);
	        //var_dump($data);
			echo json_encode($data);
		}


	}
