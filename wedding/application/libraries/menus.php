<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class CI_menus
{
	
	protected $ci;
	protected $options =  array();
	
	function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->model('V_Menu_Model');
		$this->ci->load->library(	'auth');
		$this->config =& get_config();
	}
	
	function display_menu() {

		$segmen_satu = $this->ci->uri->segment(1);
		$jenis_user = $this->ci->auth->get_jenis_user();

		// var_dump($where_group); die();
		
		if ($jenis_user == 2 || $jenis_user == 4) {

			$where['role_id'] = $this->ci->auth->get_role_id();
			$this->ci->db->select('group_name, group_icon, controller_name as ctrl_name , count(menu_name) as total');
			$this->ci->db->group_by('group_name');
			$this->ci->db->where_in('role_id', $where['role_id']);
			$query = $this->ci->db->get($this->ci->V_Menu_Model->get_params('_table'));
			$groups_order = array();
			
			foreach($query->result() as $rows)
			{
				$groups_order[$rows->group_name] = $rows->total;
			}
			$this->ci->V_Menu_Model->order_by($this->ci->V_Menu_Model->get_params('_order'));
			$menus = $this->ci->V_Menu_Model->get_many_by($where);

			$display = "";
			$group_name = "";

			$this->ci->db->select('group_name');
			$this->ci->db->where('controller_name', $segmen_satu);
			$query_menu = $this->ci->db->get($this->ci->V_Menu_Model->get_params('_table'))->row();
			$menu_name = $query_menu->group_name;

			if ($segmen_satu == "home") {
				$actvhm = "active open";
			}else {
				$actvhm = "";
			}

			$display .= '
				<li class="'.$actvhm.'">
				<a href="'.base_url('home').'"><i class="clip-home-3"></i>
				<span class="title"> Beranda <span class="selected"></span></span></a></li>
			';
			
			foreach($menus as $menu) {

				if($group_name == "" || $group_name !== $menu->group_name) {

					if($group_name !== "") {
						$display .= "</li>";
					}

					if ($menu_name == $menu->group_name) {
						$actv_m = "active";
					}else {
						$actv_m = "";
					}

					$group_name = $menu->group_name;
					
					$display .= "<li class='".$actv_m."'>
						<a href='javascript:void(0)'><i class='clip-".$menu->group_icon."'></i>
						<span class='title'>" . $menu->group_name ." <span class='selected'></span></span>
						<span class='icon-arrow'></span></a>
					";
				}

				if ($segmen_satu == $menu->controller_name) {
					$actv = "active";
				}else {
					$actv = "";
				}
				
				$display .= "
					<ul class='sub-menu '>\n<li class=".$actv.">\n
					<a href='" .$this->config['base_url'] . $menu->controller_name . "'>" . $menu->menu_name ."</a>\n
					</ul>\n";
			}
			
			if(sizeof($menus) > 0) {
				$display .= "</li>";
			}

		}else{

			$where['role_id'] = array(intval($this->ci->auth->get_role_id()), 2);
			$this->ci->db->select('group_name, group_icon, controller_name as ctrl_name , count(menu_name) as total');
			$this->ci->db->group_by('group_name');
			$this->ci->db->where_in('role_id', $where['role_id']);
			$query = $this->ci->db->get($this->ci->V_Menu_Model->get_params('_table'));
			$groups_order = array();
			
			foreach($query->result() as $rows)
			{
				$groups_order[$rows->group_name] = $rows->total;
			}
			$this->ci->V_Menu_Model->order_by($this->ci->V_Menu_Model->get_params('_order'));
			$menus = $this->ci->V_Menu_Model->get_many_by($where);

			$display = "";
			$group_name = "";
			
			foreach($menus as $menu)
			{
				if($group_name == "" || $group_name !== $menu->group_name)
				{
					if($group_name !== "")
					{
						$display .= "</ul></div>";
					}
					$group_name = $menu->group_name;
					$display .= "<div title=\"" . $menu->group_name . " <small class='label-group bg-blue pull-right'>" . $groups_order[$menu->group_name] . "</small>\" data-options=\"iconCls:'icon-view'\" style=\"overflow:auto;padding:0;\">\n<ul class=\"sidebar-group-menu\">\n";
				}
				
				$display .= "<li>\n<a href=\"" . $this->config['base_url'] . $menu->controller_name . "/" . $menu->method_name . "\"><i class=\"fa fa-" . $menu->icon_name . "\"></i>&nbsp;&nbsp;" . $menu->menu_name . "</a>\n</li>\n";
			}
			
			if(sizeof($menus) > 0)
			{
				$display .= "</ul>\n</div>";
			}

		}
		
		return $display;
		// var_dump($display); die();
		
	}

	function terabytee_menus() {
		
		
		// var_dump('tbCode OK'); die();
	}
	
}