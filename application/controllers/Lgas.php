<?php


class Lgas extends CI_Controller
{
	protected $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('lga_model', 'LGA');
		$this->load->model('states_model', 'States');
		$this->data['lgas'] = $this->LGA->fetchLGA();
	}

	public function index ()
	{
		$lgas = $this->data['lgas'];
		foreach ($lgas as $id) :
			$lgas['state'] = $this->States->fetchStates($id['state_id']);
		endforeach;
		$this->load->view('users/layout/master');
		$this->load->view('lgas/index', compact('lgas'));
		$this->load->view('users/layout/footer');
	}

}
