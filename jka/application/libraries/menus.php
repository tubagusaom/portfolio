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

		$where['role_id'] = array(intval($this->ci->auth->get_role_id()), 2);
		$this->ci->db->select('group_name, count(menu_name) as total');
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
		
		$menu_name = "";

		$jenis_user = $this->ci->auth->get_jenis_user();
		
		if ($jenis_user == 2 || $jenis_user == 4) {

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

			$actv = '';
			foreach($menus as $menu)
			{

				if($group_name == "" || $group_name !== $menu->group_name)
				{
					if($group_name !== "")
					{
						$display .= "</li>";
					}

					$group_name = $menu->group_name;
					// $controller_name = $menu->controller_name;
					
					$display .= "<li class=".$actv.">
						<a href='javascript:void(0)'><i class='clip-".$menu->icon_name."'></i>
						<span class='title'>" . $menu->group_name . " <span class='selected'></span></span>
						<span class='icon-arrow'></span></a>
					";
				}

				$ctrl_name = $menu->controller_name;
				// var_dump($ctrl_name); die();

				if ($segmen_satu == $menu->controller_name) {
					$actv = "active";
				}else if ($segmen_satu !== $menu->controller_name) {
					$actv = "";
				}
				
				$display .= "
					<ul class='sub-menu '>\n<li class=".$actv.">\n
					<a href='" .$this->config['base_url'] . $menu->controller_name . "'>" . $menu->menu_name . "</a>\n
					</ul>\n";
			}
			
			if(sizeof($menus) > 0)
			{
				$display .= "</li>";
			}

		}else{
			
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