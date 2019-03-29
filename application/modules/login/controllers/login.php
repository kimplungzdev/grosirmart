<?php
class login extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function index()
	{
		$this->load->view('page_login');
	}

	public function proses_login()
	{
		$this->form_validation->set_rules('Username', 'Username', 'required');
		$this->form_validation->set_rules('Password', 'Password', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{
			$username = $this->input->post('Username');
			$password = $this->input->post('Password');
			
			//GET DATA USER
            $data_user = $this->m_user->get_user($username, $password);

            if (count($data_user->result_array()) > 0)
            {
                foreach ($data_user->result_array() as $key => $value) {
                    $data['Username'] = $value['Username'];
                    $data['KdRole'] = $value['KdRole'];           
                }    

                $this->session->set_userdata($data); 
                redirect('admin_home/Dashboard');             
			}
			else
			{
				$this->session->set_flashdata('message', 'Maaf, username atau password Anda salah.');
				redirect('login');
			}
		}
		else
		{
			$this->session->set_flashdata('message', 'Username dan password harus diisi!');
			redirect('login');
		}
	}
}
