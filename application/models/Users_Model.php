<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users_Model extends CI_Model
{

	protected $users = 'users';

	public function register($user)
	{
		$query = $this->db->insert($this->users, $user);
		return $query;
	}

	public function fetchUsers($user = FALSE)
	{
		if ($user === FALSE) :
			$query = $this->db->get($this->users);
			return $query->result_array();
		else:
			$query = $this->db->get_where($this->users, array('id' => $user));
			return $query->row_array();
		endif;
	}



	public function updateUser($user, $post)
	{
		$query = $this->db->update($this->users, $post, array('id' => $user));
		return $query;
	}



	public function destroyUser($user, $key = FALSE)
	{
		if ($key === FALSE) :
			return FALSE;
		elseif ($key === $this->input->post('key')) :
			$userData = $this->fetchUsers($user);
			unlink('photo/'.$userData['photo']);
			$query = $this->db->delete($this->users, array('id' => $user));
			return $query;
		else :
			return FALSE;
		endif;
	}

}
