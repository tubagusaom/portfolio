<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class CI_acl
{

	protected $controller;
	protected $method;
	protected $role;

	function __construct()
	{
		$this->ci =& get_instance();
		$this->config =& get_config();
	}

	function check_permission($vars)
	{
		$this->ci->load->model('Vacl_Model');
		$permissions = $this->ci->Vacl_Model->get_by($vars);

		// var_dump(count(json_encode($permissions))); die();

		if(!empty($permissions->role_id) == 0)
		{
			if($vars['role_id'] == 1)
			{
				return false;
			}
			else
			{
				$vars['role_id'] = 2;

				$permissions = $this->ci->Vacl_Model->get_by($vars);

				if(!empty($permissions) == 0)
				{
					return false;
				}
				else
				{
					return true;
				}
			}
		}
		else
		{
			return true;
		}
	}

}
