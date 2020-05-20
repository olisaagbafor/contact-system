<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model', 'User');
		$this->load->model('states_model', 'States');

	}

	public function index()
	{
		$data['states'] = $this->States->fetchStates();
		$this->load->view('users/layout/master');
		$this->load->view('users/register/index', $data);
		$this->load->view('users/layout/footer');
	}

	public function store()
	{

		$config['upload_path']          = './photo/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1024;
		//$config['max_width']            = 1024;
		//$config['max_height']           = 768;

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('first_name','First Name','required|alpha|trim');
		$this->form_validation->set_rules('surname','Surname','required|alpha|trim');
		$this->form_validation->set_rules('gender','Gender','required|trim');
		$this->form_validation->set_rules('address','Address','required|trim');
		$this->form_validation->set_rules('contact','Contact','required|min_length[11]|max_length[13]|numeric|trim');
		$this->form_validation->set_rules('email','Email','required|valid_email|trim');
		$this->form_validation->set_rules('state_of_origin','State of Origin','required|trim');
		$this->form_validation->set_rules('local_government_area','Local Government of Origin','required|trim');

		if (($this->form_validation->run() === FALSE) || (!$this->upload->do_upload('userfile')))
		{
			$data['error'] = $this->upload->display_errors();

			$this->load->view('users/layout/master');
			$this->load->view('users/register/index', $data);
			$this->load->view('users/layout/footer');
		} else {
			$form = $this->input->post();
			$form['photo'] = $this->upload->data('file_name');
			$this->User->register($form);

			$data['success'] = "User's Registration is Successful, Thank you!";
			$this->load->view('users/layout/master');
			$this->load->view('users/register/index', $data);
			$this->load->view('users/layout/footer');
		}
	}


	public function view($user)
	{

		$user = $this->User->viewUser();

		$this->load->view('users/layout/master');
		$this->load->view('user/view', $user);
		$this->load->view('users/layout/footer');

	}


	public function edit($user)
	{

		$user = $this->User->getUser($user);

		$this->load->view('users/layout/master');
		$this->load->view('users/edit/index', compact('user'));
		$this->load->view('users/layout/footer');

	}


	public function update($user)
	{
		$post = $this->input->post();

		$user = $this->User->updateUser($user, $post);

		$this->load->view('users/layout/master');
		$this->load->view('user/edit/index', compact('user'));
		$this->load->view('users/layout/footer');

	}



	public function destroy($user)
	{
		$user = $this->User->destroyUser();

		$this->load->view('users/layout/master');
		$this->load->view('user/view', $user);
		$this->load->view('users/layout/footer');
	}
}

