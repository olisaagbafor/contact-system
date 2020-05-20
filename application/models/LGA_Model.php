<?php
defined('BASEPATH') or exit('No direct script access allowed');



class LGA_Model extends CI_Model
{

	protected $lga = 'local_government_area';

	public function fetchLGA()
	{
		$query = $this->db->get($this->lga);
		return $query->result_array();
	}

	public function getLGA($state_id)
	{
		$query = $this->db->get_where($this->lga, array('state_id' => $state_id));
		return $query->result_array();
	}
}
