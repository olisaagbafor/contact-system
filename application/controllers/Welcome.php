<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model', 'Users');
		$this->load->model('states_model', 'States');
		$this->load->model('lga_model', 'LGA');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['users'] = $this->Users->fetchUsers();
		$data['states'] = $this->States->fetchStates();
		$data['lga'] = $this->LGA->fetchLGA();

		$this->load->view('users/layout/master');
		$this->load->view('users/index', $data);
		$this->load->view('users/layout/footer');
	}

	public function getLGA($state_id)
	{
		$data = $this->LGA->getLGA($state_id);
		$this->load->view('request', compact('data'));
	}
}
