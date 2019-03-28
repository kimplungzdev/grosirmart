<?php

class m_user extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function get_user($username, $password)
	{
		$this->db->select('Username,Password,KdRole');
		$this->db->from('m_user');
		$this->db->where(['Username' => $username, 'Password' => md5($password)]);
		$data = $this->db->get();

		return $data;
	}
}