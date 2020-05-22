<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Controller
{
	protected $data;
	protected $validate;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model', 'User');
		$this->load->model('states_model', 'States');
		$this->load->model('lga_model', 'LGA');

		$this->data['users'] = $this->User->fetchUsers();
		$this->data['states'] = $this->States->fetchStates();
		$this->data['lga'] = $this->LGA->fetchLGA();
	}


	public function index()
	{
		$this->load->view('users/layout/master');
		$this->load->view('users/register/index', $this->data);
		$this->load->view('users/layout/footer');
	}


	public function store()
	{
		$config['upload_path']          = './photo/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 1024;
		//$config['max_width']            = 1024;
		//$config['max_height']           = 768;

		$this->load->library('upload', $config);


		if (($this->form_validation->run('user') === FALSE) || (!$this->upload->do_upload('userfile'))) :
			$data['error'] = $this->upload->display_errors();
			$data['states'] = $this->data['states'];
			$data['lgas'] = $this->data['lga'];
		else :
			$input = $this->input->post();
			$input['photo'] = $this->upload->data('file_name');
			if (!($this->User->register($input))) :
				$data['error'] = "Failed to Register this User!, Contact system Admin for help!";
				$data['states'] = $this->data['states'];
				$data['lgas'] = $this->data['lga'];
			else:
				$data['success'] = "User's Registration is Successful, Thank you!";
			endif;
		endif;

		$this->load->view('users/layout/master');
		$this->load->view('users/register/index', $data);
		$this->load->view('users/layout/footer');
	}


	public function view($userID, $message = FALSE)
	{
		$user = $this->User->fetchUsers($userID);
		if ($message) :
			$user['message'] = $message;
		endif;
		$user['state'] = $this->States->fetchStates($user['state_of_origin']);
		$user['lga'] = $this->LGA->fetchLGA($user['local_government_area']);

		$this->load->view('users/layout/master');
		$this->load->view('users/view/index', compact('user'));
		$this->load->view('users/layout/footer');
	}


	public function edit($user, $error = FALSE, $success = FALSE)
	{
		if ($error) :
			$data['errors'] = $error;
		endif;
		if ($success) :
			$data['success'] = $success;
		endif;
		$data['user'] = $this->User->fetchUsers($user);
		$data['states'] = $this->data['states'];
		$data['lgas'] = $this->LGA->getLGA($data['user']['state_of_origin']);

		$this->load->view('users/layout/master');
		$this->load->view('users/edit/index', $data);
		$this->load->view('users/layout/footer');
	}


	public function update($user)
	{
		if ($this->form_validation->run('user') === FALSE) :
			$error = array('Failed to Update!.    !!! Please all fields are required !!!');
			$this->edit($user, $error, FALSE);
		else :
			$post = $this->input->post();
			if ($this->User->updateUser($user, $post)) :
				$success = 'User Updated Successfully! Thank you.';
				$this->edit($user, FALSE, $success);
			endif;
		endif;
	}


	public function destroy($user, $key = FALSE)
	{
		if ($key === FALSE) :
			$message = 'You are about to DELETE this User, Please...';
			$this->view($user, $message);
		else :
			if($this->User->destroyUser($user, $key)) :
				$this->data['success'] = 'Contact Record has been deleted successfully!';
				$this->data['users'] = $this->User->fetchUsers();
			else :
				$this->data['error'] = 'Contact Record Failed to delete!';
			endif;
			$this->load->view('users/layout/master');
			$this->load->view('users/index', $this->data);
			$this->load->view('users/layout/footer');
		endif;
	}

}

