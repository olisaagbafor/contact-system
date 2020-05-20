<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users_Model extends CI_Model
{

	protected $users = 'users';

	public function register($form)
	{
		$user = $form;
		$this->db->insert($this->users,$user);
	}

	public function fetchUsers()
	{
		$query = $this->db->get($this->users);
		return $query->result_array();
	}

	public function viewUser($user)
	{
		$query = $this->db->get_where($this->users, array('id' => $user));
		return $query->result();
	}



	public function getUser($user)
	{
		$query = $this->db->get_where($this->users, array('id' => $user));
		return $query->row_array();
	}



	public function updateUser($user, $post)
	{
		$query = $this->db->update($this->users, $post, array('id' => $user));
		return $query->result();
	}



	public function destroyUser($user)
	{
		$query = $this->db->delete($this->users, array('id' => $user));
		return $query;
	}

}
