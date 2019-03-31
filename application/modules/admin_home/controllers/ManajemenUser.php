<?php
class ManajemenUser extends Admin_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->library('pagination');
		$this->load->model('m_user');
	}

	public function index()
	{
		$data['title'] = 'Manajemen User';
		$data['breadcump'] = breadcrumb('ManajemenUser');
		$data['active_menu'] = active_menu('ManajemenUser');
		$this->template->admin('user', $data);
	}

	public function table()
	{
		$config = $this->initial_pagination();

      	$config['base_url'] = base_url().'admin_home/ManajemenUser/table';
      	$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $this->m_user->count_all();
		$config['per_page'] = 10;

		$this->pagination->initialize($config);
		$page = $this->uri->segment(4);
		$start = ($page - 1 ) * $config['per_page'];
		$data = $this->m_user->show_data($config['per_page'], $start); 
		
		$output['pagination_link'] = $this->pagination->create_links();
		$output['contoh_table'] = $this->load_table($data->result(), $start);

		echo json_encode($output);
	}

	private function load_table($data, $start)
	{
		$output = '';
		$output .= '
		<table class="table table-hover">
			<tr>
				<th>No</th>
				<th>Username</th>
				<th>Aksi</th>
			</tr>
		';
		foreach($data as $row)
		{
			$start++;
			$output .= '
			<tr>
				<td>'.$start.'</td>
				<td>'.$row->Username.'</td>
				<td>'.$row->KdRole.'</td>
			</tr>
			';
		}
		$output .= '</table>';

		return $output;
	}	
}