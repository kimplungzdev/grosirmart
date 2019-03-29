<?php (defined('BASEPATH')) OR exit('No direct script access allowed');


class Admin_Controller extends CI_Controller
{
	function __consturct() 
	{
		parent::__consturct();
	
		if (empty($this->session->userdata('Username')))
		{
			redirect('login','refresh');
		}
	}
}