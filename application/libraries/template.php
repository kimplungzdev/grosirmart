<?php

class template 
{
	public function admin($views, $data = '')
	{
		$this->CI =& get_instance();
		$this->CI->load->view('header');
		$this->CI->load->view('menu');
		return $this->CI->load->view($views, $data);
	}
}