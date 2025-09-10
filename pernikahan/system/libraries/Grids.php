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
	
	function __construct()
	{
		$this->ci =& get_instance();
		$this->config =&  get_config();
		$this->ci->load->library('auth');
		$this->ci->load->library('grids_format');
        // $this->load->library('grids_format');
	}
	
	public function set_properties()
	{
		$properties = func_get_args();
		$dprop = '';
        $dpropv = '';
		if(count($properties) == 1 && is_array($properties[0]))
		{
            
			foreach($properties[0] as $property => $value)
			{
				if(property_exists(get_class($this), $property))
				{
					$dprop .= $this->{$property} = $value;
                    $dpropv .=$value;
				}
			}
			
		}

        // var_dump($properties); die();
        // var_dump($dpropv); die();
        // $this->options

		return $this;
	}
	
	public function get_property($property)
	{
		if(property_exists(get_class($this), $property))
		{
			return $this->{$property};
		}
		else
		{
			return false;
		}
	}
	
	public function load_model()
	{
		$this->ci->load->model($this->model);
		return $this;
	}
	
	public function set_columns()
	{
		$this->columns = array();
		
		$columns = $this->ci->{$this->model}->get_params('_columns');
		
		if(!isset($this->fields))
		{
			$this->fields = array_keys($columns);
		}
				
		$grid_column = array();
		
		// $grid_column[] =  "field: " . $this->ci->{$this->model}->get_params('primary_key') . ", hidden: true";
        $grid_column[] =  $this->ci->{$this->model}->get_params('primary_key');
		
		foreach($this->fields as $field)
		{
			if(array_key_exists($field, $columns)) {
				if(!array_key_exists('hidden', $columns[$field]))
				{
					// $align = array_key_exists('align', $columns[$field]) ? ", align: '" . $columns[$field]['align'] . "" : "";
					// $grid_column[] = "field: " . $field . ", title: " . $columns[$field]['label'] . ", width: " . $columns[$field]['width'] . $align . "";

                    $align = array_key_exists('align', $columns[$field]) ? "," . $columns[$field]['align'] : "";
                    $grid_column[] = $field . ',' . $columns[$field]['label'] . "," . $columns[$field]['width'] . $align ;
				}
			} else {
				$in_relation_status = false;
				$belongs = $this->ci->{$this->model}->get_params("belongs_to");
				if($belongs !== false) {
					foreach($belongs as $key_belong=>$val_belong) {
						if(!$in_relation_status){
							if(!isset($this->ci->{$key_belong})) {
								$this->ci->load->model($val_belong['model'], $key_belong);
							}		
							$bel_columns = $this->ci->{$key_belong}->get_params("_columns");
							if(array_key_exists($field, $bel_columns)){
								$align = array_key_exists('align', $bel_columns[$field]) ? ", align: '" . $bel_columns[$field]['align'] . "'" : "";
								$grid_column[] = "{ field: '" . $field . "', title: '" . $bel_columns[$field]['label'] . "', width: " . $bel_columns[$field]['width'] . $align . "}";

                                // $align = array_key_exists('align', $bel_columns[$field]) ? "," . $bel_columns[$field]['align'] : "";
                                // $grid_column[] = $field . "," . $bel_columns[$field]['label'] . "," . $bel_columns[$field]['width'] . $align ;

								$in_relation_status = true;
								break;
							}
						} else {
							break;
						}
					}
				}
				$has_many = $this->ci->{$this->model}->get_params("has_many");
				if(!$in_relation_status && $has_many !== false){
					foreach($has_many as $key_many=>$val_many){
						if(!isset($this->ci->{$key_many})) {
							$this->load->model($val_many['model'], $key_many);
						}						
						if(array_key_exists($field, $this->ci->{$key_many}->_columns)){
							$select[] = $field;
							$formatter[] = $this->ci->{$key_many}->_columns[$field]['formatter'];
							$in_relation_status = true;
							break;
						}						
					}
				}
			}
		}

        $columns_format = $this->ci->grids_format->columns_format($grid_column);
        
		// $this->columns = $grid_column;

        $this->columns = $grid_column;

        // var_dump($grid_column); die();
        
	}
	
	public function set_toolbar() 
    {
		$title = isset($this->title) ? $this->title : $this->ci->{$this->model}->get_params('table_label');
		
		$this->ci->load->model('V_Toolbar_Model');
		
		// $this->toolbars = array();
		
		$where = array('controller_name'=>$this->controller, 'role_id'=>array($this->ci->auth->get_role_id(), 2));
		
		/* get many by toolbar dengan criteria controller name dan role id */
		$toolbars_data = $this->ci->V_Toolbar_Model->order_by($this->ci->V_Toolbar_Model->get_params('_order'))->get_many_by($where);
        $toolbars_format = $this->ci->grids_format->toolbars_format($toolbars_data);

        $this->toolbars = $toolbars_format;

        // var_dump(($toolbars_data)); die();
	}
	
	public function set_grid() {

		$this->set_columns();
		$this->set_toolbar();

        $data_toolbars = $this->toolbars;
        $data_columns = $this->columns;

		$title = isset($this->title) ? $this->title : $this->ci->{$this->model}->get_params('table_label');

        $list = "list_:[title:" . $title . ",id: " . $this->options['id'] . "]],";

        // toolbar & field
		if(sizeof($data_toolbars) > 0){
            $list .= "toolbar_:[" . ($data_toolbars) . "]],";
		}
		$list .= "columns_:[" .  implode(',', $this->columns) . "]";

		$this->columns = array();
		$this->toolbars = array();

        $lists = $this->ci->grids_format->data_format($list);

		unset($this->model);
		unset($this->fields);

        return $lists;

        // var_dump(($lists)); die();
	}
	
}