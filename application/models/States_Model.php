<?php
defined('BASEPATH') or exit('No direct script access allowed');


class States_Model extends CI_Model
{

	protected $states = 'states';

	public function fetchStates()
	{
		$query = $this->db->get($this->states);
		return $query->result_array();
	}
}
