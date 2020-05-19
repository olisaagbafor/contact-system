<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users_Model extends CI_Model
{

	protected $users = 'users';

	public function register()
	{
		$user = $this->input->post();
		$this->db->insert($this->users,$user);
	}

	public function fetchUsers()
	{
		$query = $this->db->get($this->users);
		return $query->result_array();
	}

}
