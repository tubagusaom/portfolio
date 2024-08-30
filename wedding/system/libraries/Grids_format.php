<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CI_Grids_format {

	public function __construct() {

	}

	public function data_format($data) {
		$list_data = explode('],', ($data));

        // $format_data[] = '';
		// $toolbar = '';
        foreach($list_data as $key => $v_list) {
            $split_list= preg_split('/_:/', ($v_list));
            $split1 = $split_list[0];
            $split2 = $split_list[1];

            $cari_huruf = array('[', ']');

            $arr2 = str_ireplace($cari_huruf, '', $split2);
            $format_data[$split1] = ($arr2);
            
        }

		return ($format_data);

		// var_dump(($format_data)); die();
	}

	public function columns_format($data) {
		

		// $column = '';
		foreach($data as $key => $v_columns) {

			$explode_cols= explode(',', ($v_columns));
			// $explode_cols2= explode(',',  ($v_columns));
			// $split1 = $explode_columns[0];
            // $split2 = $explode_columns[1];

			// $split_columns= preg_split('/:/', implode($explode_cols));
			
			$column[$key] = implode(',', $explode_cols);

			// foreach($explode_cols as $keyx => $v_xcols) {
			// 	$columnx[$key] = $v_xcols;
			// }

		}

		// $data_column = '';
		// foreach($column as $keyc => $columns) {

		// 	$explode_cols2= explode(',',  ($columns));
		// 	// $split_columns= preg_split('/:/', ($columns));

		// 	$data_column[$keyc] = ($columns);
			
		// }

		var_dump(($column)); die();
	}
    
	public function toolbars_format($data) {

		// var_dump(($data)); die();

		$users = [
			[
				'name' => 'sigit',
				'birthday' => [
					'city' => 'bandung',
					'month' => 'maret',
					'year' => '2000'
				]
			],
			[
				'name' => 'andi',
				'birthday' => [
					'city' => 'tasik',
					'month' => 'mei',
					'year' => '2001'
				]
			],
			[
				'name' => 'aidh',
				'birthday' => [
					'city' => 'ciamis',
					'month' => 'januari',
					'year' => '2002'
				]
			],
			[
				'name' => 'iqbal',
				'birthday' => [
				  'city' => 'banjar',
				  'month' => 'februari',
				  'year' => '2004'
				]
			],
			[
				'name' => 'iwan',
				'birthday' => [
					'city' => 'langen',
					'month' => 'april',
					'year' => '1999'
				]
			],
		  ];

		// $tool_bars = [];
		$toolbar = [];
		foreach($data as $keyt => $toolbars) {

			// $toolbar_arr[$keyt] = $toolbars;

			// $toolbar_arr[$keyt] .= $toolbars->icon_name;
			// $toolbar_arr[$keyt] .= $toolbars->toolbar_name;

			if ($toolbars->icon_name == 'add') {
				$t_icon = "plus";
				$t_class = 'primary';
			}elseif ($toolbars->icon_name == 'edit') {
				$t_icon = "edit";
				$t_class = 'teal';
			}elseif ($toolbars->icon_name == 'remove') {
				$t_icon = "times";
				$t_class = 'bricky';
			}elseif ($toolbars->icon_name == 'view') {
				$t_icon = "list-alt";
				$t_class = 'primary';
			}

			$toolbar[$keyt] .= '<a href="#" data-id="0" id="toolbar_'.$toolbars->icon_name.'" data-target="modal_'.$toolbars->icon_name.'" data-toggle="modal" class="btn btn-xs btn-' . $t_class .' tooltips" style="padding-top:5px;" data-original-title="'.$toolbars->toolbar_name.'">';
			$toolbar[$keyt] .= '<i class="fa fa-' . $t_icon .'"></i></a> ';
		}

		$toolbar_arr = (implode($toolbar));

        return (($toolbar_arr));

		// var_dump(implode($toolbar)); die();
	}

	public function test_format($data) {
		return $data;
	}

}