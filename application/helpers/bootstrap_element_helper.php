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