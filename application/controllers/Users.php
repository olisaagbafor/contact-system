<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Controller
{
	protected $data;
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




	public function view($user, $message = FALSE)
	{
		if ($message === FALSE)
		{
			$user = $this->User->getUser($user);
			$user['state'] = $this->States->fetchStates($user['state_of_origin']);
			$user['lga'] = $this->LGA->fetchLGA($user['local_government_area']);

			$this->load->view('users/layout/master');
			$this->load->view('users/view/index', compact('user'));
			$this->load->view('users/layout/footer');

		} else {

			$user = $this->User->getUser($user);
			$user['message'] = $message;
			$user['state'] = $this->States->fetchStates($user['state_of_origin']);
			$user['lga'] = $this->LGA->fetchLGA($user['local_government_area']);

			$this->load->view('users/layout/master');
			$this->load->view('users/view/index', compact('user'));
			$this->load->view('users/layout/footer');
		}

	}




	public function edit($user)
	{

		$data['user'] = $this->User->getUser($user);
		$data['states'] = $this->States->fetchStates();
		$data['lgas'] = $this->LGA->getLGA($data['user']['state_of_origin']);

		$this->load->view('users/layout/master');
		$this->load->view('users/edit/index', $data);
		$this->load->view('users/layout/footer');

	}


	public function update($user)
	{

		$this->form_validation->set_rules('first_name','First Name','required|trim');
		$this->form_validation->set_rules('surname','Surname','required|trim');
		$this->form_validation->set_rules('gender','Gender','required|trim');
		$this->form_validation->set_rules('address','Address','required|trim');
		$this->form_validation->set_rules('contact','Contact','required|min_length[11]|max_length[13]|numeric|trim');
		$this->form_validation->set_rules('email','Email','required|valid_email|trim');
		$this->form_validation->set_rules('state_of_origin','State of Origin','required|trim');
		$this->form_validation->set_rules('local_government_area','Local Government of Origin','required|trim');

		if ($this->form_validation->run() === FALSE)
		{
			$errors = array('Failed to Update!. Please all fields are required, '.anchor('/','click here to try again!'));

			$this->load->view('users/layout/master');
			$this->load->view('users/error', compact('errors'));
			$this->load->view('users/layout/footer');

		} else {
			$post = $this->input->post();

			$data['user'] = $this->User->updateUser($user, $post);
			$data['states'] = $this->States->fetchStates();
			$data['lgas'] = $this->LGA->getLGA($data['user']['state_of_origin']);

			$data['success'] = 'User Updated Successfully! Thank you.';

			$this->load->view('users/layout/master');
			$this->load->view('users/edit/index', $data);
			$this->load->view('users/layout/footer');

		}

	}



	public function destroy($user, $key = FALSE)
	{
		if ($key === FALSE)
		{
			$message = 'You are about to DELETE this User, Please...';
			$this->view($user, $message);
		} else {

			if($this->User->destroyUser($user, $key))
			{
				$this->data['success'] = 'Contact Record has been deleted successfully!';
				$this->data['users'] = $this->User->fetchUsers();

				$this->load->view('users/layout/master');
				$this->load->view('users/index', $this->data);
				$this->load->view('users/layout/footer');
			} else {
				$this->data['error'] = 'Contact Record Failed to delete!';

				$this->load->view('users/layout/master');
				$this->load->view('users/index', $this->data);
				$this->load->view('users/layout/footer');
			}
		}

	}
}

