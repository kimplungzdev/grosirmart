<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('side_bar_menu')) 
{
	function side_bar_menu($KdRole, $KdParent = '')
	{
		$CI =& get_instance();
		$menunav = '';
		
		if (!empty($KdParent))
		{
			$parent_text = 'AND b.KdParent = '.$KdParent;
		}
		else
		{
			$parent_text = 'AND b.KdParent IS NULL';
		}

		$CI->db = $CI->load->database('default',TRUE);

		$text = '
			SELECT a.KdMenu, a.KdRole, b.KdParent, b.NamaMenu, b.UrlMenu, b.NoUrut 
			FROM m_rolemenu a
			JOIN m_menu b ON a.KdMenu = b.KdMenu
			WHERE a.KdRole = '.$KdRole.' '.$parent_text.' 
			ORDER BY b.NoUrut ASC
		';

		$data_list = $CI->db->query($text);

		if ($data_list->num_rows() > 0)
		{
			$ul = '<ul class="sidebar-menu" data-widget="tree">';
			if (!empty($KdParent))
			{
				$ul = '<ul class="treeview-menu">';
			}

			$menunav .= $ul;

			foreach ($data_list->result_object() as  $value) 
			{
				if ($value->UrlMenu != '#')
				{
					$menunav .= '
					<li id="menu-'.$value->KdMenu.'">
						<a href="'.base_url().'admin_home/'.$value->UrlMenu.'">
        					<i class="fa fa-circle-o"></i><span>'.$value->NamaMenu.'</span>
						</a>';	
				}
				else
				{
					$menunav .= '
					<li id="menu-'.$value->KdMenu.'" class="treeview">
					    <a href="#">
            				<i class="fa fa-share"></i><span>'.$value->NamaMenu.'</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
        				</a>'; 
				}

				$menunav .= side_bar_menu($KdRole, $value->KdMenu);
				$menunav .= '</li>';	
			}

			$menunav .= '</ul>';
		}

		return $menunav;
	}
}