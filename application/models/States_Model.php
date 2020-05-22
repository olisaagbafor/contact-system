<?php
defined('BASEPATH') or exit('No direct script access allowed');


class States_Model extends CI_Model
{

	protected $states = 'states';

	public function fetchStates($state = FALSE)
	{
		if ($state === FALSE) :
			$query = $this->db->get($this->states);
			return $query->result_array();
		else :
			$query = $this->db->get_where($this->states, array('id' => $state))->row_array();
			return $query;
		endif;
	}

	public function updateState($state)
	{
		$query = $this->db->update($this->states, $this->input->post(), array('id' => $state));
		return $query;
	}
}
