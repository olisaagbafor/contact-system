<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users_Model extends CI_Model
{

	protected $users = 'users';
	protected $states = 'states';
	protected $lga = 'local_government_area';

	public function __construct()
	{
		parent::__construct();
	}

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

	public function fetchStates()
	{
		$query = $this->db->get($this->states);
		return $query->result_array();
	}


	public function fetchLGA()
	{
		$query = $this->db->get($this->lga);
		return $query->result_array();
	}
}
