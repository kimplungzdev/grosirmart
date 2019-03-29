<?php

class template 
{
	public function admin($views, $data = '')
	{
		$this->CI =& get_instance();
		$data['sidebar_menu'] = side_bar_menu($this->CI->session->userdata('KdRole'));
		$this->CI->load->view('header', $data);
		$this->CI->load->view($views, $data);
		$this->CI->load->view('footer');
	}
}