<?php
class admin_home extends Admin_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		
	}

	public function index()
	{
		$data['halo'] = 'halo';
		$this->template->admin('page_index', $data);
	}

}
