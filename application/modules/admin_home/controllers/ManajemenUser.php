<?php
class ManajemenUser extends Admin_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
	}

	public function index()
	{
		$data['title'] = 'Manajemen User';
		$data['breadcump'] = breadcrumb('ManajemenUser');
		$this->template->admin('user', $data);
	}
}