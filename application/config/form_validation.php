<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config = array(
	'user' => array(
		array(
			'field' => 'first_name',
			'label' => 'First Name',
			'rules' => 'required|trim'
		),
		array(
			'field' => 'surname',
			'label' => 'Surname',
			'rules' => 'required|trim'
		),
		array(
			'field' => 'gender',
			'label' => 'Gender',
			'rules' => 'required|trim'
		),
		array(
			'field' => 'address',
			'label' => 'Address',
			'rules' => 'required|trim'
		),
		array(
			'field' => 'contact',
			'label' => 'Contact',
			'rules' => 'required|min_length[11]|max_length[13]|numeric|trim'
		),
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email|trim'
		),
		array(
			'field' => 'state_of_origin',
			'label' => 'State of Origin',
			'rules' => 'required|trim'
		),
		array(
			'field' => 'local_government_area',
			'label' => 'Local Government of Origin',
			'rules' => 'required|trim'
		),
	),

	'location' => array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required|trim'
		),
	),
);
