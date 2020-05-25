<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Auth extends CI_Controller
{
	protected $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model', 'Users');
		$this->load->model('states_model', 'States');
		$this->load->model('lga_model', 'LGA');
	}

	public function index($error = FALSE)
	{
		if ($error)
		{
			$this->data['error'] = $error;
		}
		$this->load->view('index', $this->data);
	}

	public function authenticated()
	{
		$this->data['users'] = $this->Users->fetchUsers();
		$this->data['states'] = $this->States->fetchStates();
		$this->data['lga'] = $this->LGA->fetchLGA();

		$this->load->view('users/layout/master');
		$this->load->view('users/index', $this->data);
		$this->load->view('users/layout/footer');
	}

	public function login()
	{
		if ($this->form_validation->run('login') === FALSE)
		{
			$this->index();
		} else {
			$user = $this->Users->fetchUserByEmail($this->input->post('email'));
			if ($user && (password_verify($this->input->post('password'), $user['password'])))
			{
				session_start();
				$_SESSION = array(
					'email' => $user['email'],
					'photo' => $user['photo']
				);
				$this->userSession = $_SESSION;
				$this->authenticated();
			} else {
				$error = 'Invalid Credentials Please try again!';
				$this->index($error);
			}
		}

	}

	public function logout()
	{
		session_start();
		if (session_reset())
		{
			$this->index();
		} else {
			$this->authenticated();
		}
	}
}
