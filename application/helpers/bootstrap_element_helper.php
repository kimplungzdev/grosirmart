<?php

function flashdata_message($type, $title, $message)
{
	$output = '';
	$body_theme = '';
	$icon = '';

	switch ($type) 
	{
		case 'alert':
			$body_theme = 'alert alert-danger alert-dismissible';
			$icon = 'icon fa fa-ban';
			break;
		case 'info':
			$body_theme = 'alert alert-info alert-dismissible';
			$icon = 'icon fa fa-info';
			break;
		case 'warning':
			$body_theme = 'alert alert-warning alert-dismissible';
			$icon = 'icon fa fa-warning';
			break;
		case 'success':
			$body_theme = 'alert alert-success alert-dismissible';
			$icon = 'icon fa fa-check';
			break;			
	}

	$output .= '
		<div class="'.$body_theme.'">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="'.$icon.'"></i> '.$title.'</h4>
			'.$message.'
		</div>
	';

	return $output;
}


function breadcrumb($menu_url)
{
	$CI =& get_instance();

	$query = '
	SELECT KdMenu, KdParent, NamaMenu, UrlMenu 
	FROM m_menu
	WHERE UrlMenu = \''.$menu_url.'\'
	LIMIT 1
	';

	$data = $CI->db->query($query)->row_array();
	
	$output = '  
	<section class="content-header">
    	<h1>'.$data['NamaMenu'].'</h1>
    	<ol class="breadcrumb">
    		'.list_breadcump($data['KdMenu'], $data['KdParent']).'
    	</ol>
  	</section>';

  	return $output;
}


function list_breadcump($KdMenu, $KdParent)
{
	$CI =& get_instance();
	$output = '';
	$where = ' WHERE KdMenu = '.$KdParent;

	if (empty($KdParent))
	{
		$where = ' WHERE KdMenu IS NULL';
	}

	$query_parent = '
	SELECT KdMenu, KdParent, NamaMenu, UrlMenu
	FROM m_menu '.$where;

	$data_parent = $CI->db->query($query_parent);

	$query_child = '
	SELECT KdMenu, KdParent, NamaMenu, UrlMenu 
	FROM m_menu
	WHERE KdMenu = '.$KdMenu;

	$data_child = $CI->db->query($query_child)->row_array();	

	if ($data_parent->num_rows() > 0)
	{
		$data_parent = $data_parent->row_array();	
		$output .= list_breadcump($data_parent['KdMenu'], $data_parent['KdParent']).'<li class="active">'.$data_child['NamaMenu'].'</li>';
 	}
	else
	{
		$output .= '<li><a href="#"><i class="fa fa-dashboard"></i> '.$data_child['NamaMenu'].'</a></li>';
	}

	return $output;
}