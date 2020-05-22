<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class States extends CI_Controller
{
	protected $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('states_model', 'States');
		$this->data['states'] = $this->States->fetchStates();
	}

	public function index ()
	{
		$states = $this->data['states'];
		$this->load->view('users/layout/master');
		$this->load->view('states/index', compact('states'));
		$this->load->view('users/layout/footer');
	}

	public function edit($state = FALSE, $error = FALSE, $success = FALSE)
	{
		if ($state === FALSE) :
			if (($error) || ($success)) :
				$state['error'] = $error;
				$state['success'] = $success;
			endif;
			$this->load->view('users/layout/master');
			$this->load->view('states/edit', compact('state'));
			$this->load->view('users/layout/footer');
		else:
			$state = $this->States->fetchStates($state);
			if (($error) || ($success)) :
				$state['error'] = $error;
				$state['success'] = $success;
			endif;
			$this->load->view('users/layout/master');
			$this->load->view('states/edit', compact('state'));
			$this->load->view('users/layout/footer');
		endif;
	}

	public function update($state)
	{
		if ($this->form_validation->run('location') === FALSE) :
			$this->edit($state);
		else:
			if ($this->States->updateState($state)) :
				$message = 'State has been Updated Successfully! Thank you.';
				$this->edit($state, FALSE, $message);
			else:
				$message = 'State Failed to Update, Please try again or Contact Admin for help!';
				$this->edit($state, $message,FALSE);
			endif;
		endif;
	}


	public function store()
	{
		if ($this->form_validation->run('location') === FALSE) :
			$this->edit();
		else:
			if ($this->States->updateState()) :
				$message = 'State has been added Successfully';
				$this->edit(FALSE, FALSE, $message);
			else:
				$message = 'State Failed to Create, please try again or contact admin for help!';
				$this->edit(FALSE, $message, FALSE);
			endif;
		endif;
	}

}
