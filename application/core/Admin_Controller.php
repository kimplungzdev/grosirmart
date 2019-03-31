<?php (defined('BASEPATH')) OR exit('No direct script access allowed');


class Admin_Controller extends CI_Controller
{
	function __consturct() 
	{
		parent::__consturct();
		$this->load->library('pagination');
	}

	public function initial_pagination()
	{
		$config = [];
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['attributes'] = ['class' => 'page-link'];
		return $config;
	}	
}