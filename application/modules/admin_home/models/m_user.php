<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model 
{
	private $table = 'm_user';

	function __construct()
	{
		parent::__construct();
	}

	public function count_all()
	{
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	public function show_data($limit, $start)
	{
		$this->db->select('KdUser, Username, Password, KdRole');
		$this->db->from($this->table);
		$this->db->order_by('Username', 'ASC');
		$this->db->limit($limit, $start);
		return $this->db->get();
	}
}

/* End of file m_user.php */
/* Location: ./application/modules/admin_home/models/m_user.php */