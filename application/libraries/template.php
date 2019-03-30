<?php

class template 
{
	public function admin($views, $data = '')
	{
		$this->CI =& get_instance();

		if (!empty($this->CI->session->userdata('KdRole')))
		{
			$data['sidebar_menu'] = side_bar_menu($this->CI->session->userdata('KdRole'));
			$this->CI->load->view('header', $data);
			$this->CI->load->view($views, $data);
			$this->CI->load->view('footer');			
		}
		else
		{
			redirect('login','refresh');
		}
	}
}