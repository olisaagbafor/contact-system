<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model', 'User');

	}

	public function index()
	{
		$this->load->view('users/layout/master');
		$this->load->view('users/register/index');
		$this->load->view('users/layout/footer');
	}

	public function store()
	{
		$this->form_validation->set_rules('first_name','First Name','required|alpha|trim');
		$this->form_validation->set_rules('surname','Surname','required|alpha|trim');
		$this->form_validation->set_rules('gender','Gender','required|trim');
		$this->form_validation->set_rules('address','Address','required|trim');
		$this->form_validation->set_rules('contact','Contact','required|min_length[11]|max_length[13]|numeric|trim');
		$this->form_validation->set_rules('email','Email','required|valid_email|trim');
		$this->form_validation->set_rules('state_of_origin','State of Origin','required|trim');
		$this->form_validation->set_rules('local_government_area','Local Government of Origin','required|trim');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('users/layout/master');
			$this->load->view('users/register/index');
			$this->load->view('users/layout/footer');
		} else {
			$this->User->register();
			$data['success'] = "User's Registration is Successful, Thank you!";
			$this->load->view('users/layout/master');
			$this->load->view('users/register/index', $data);
			$this->load->view('users/layout/footer');		}
	}
}
