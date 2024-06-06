<?php
$config = array(
	'login_form' => array(
		array(
			'field' => 'username',
			'label' => 'Email address',
			'rules' => 'trim|required',
		), array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required'
		),
	),
	'forgot_password_form' => array(
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email',
			'errors' => array(
                'is_unique' => 'This %s already exists.'
			)
		),
	),
	'reset_password_form' => array(
		array(
			'field' => 'reset_code',
			'label' => 'Reset Code',
			'rules' => 'required'
		), array(
			'field' => 'new_password',
			'label' => 'New Password',
			'rules' => 'required'
		), array(
			'field' => 'confirm_password',
			'label' => 'Confirm Password',
			'rules' => 'required|matches[new_password]'
		),
	),
	'change_password_form' => array(
		array(
			'field' => 'current_password',
			'label' => 'Current Password',
			'rules' => 'required'
		), array(
			'field' => 'new_password',
			'label' => 'New Password',
			'rules' => 'required'
		), array(
			'field' => 'confirm_password',
			'label' => 'Confirm Password',
			'rules' => 'required|matches[new_password]'
		),
	),
	'add-user' => array(
		array(
			'field' => 'first_name',
			'label' => 'First Name',
			'rules' => 'required'
		), array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email',
			'errors' => array(
                'is_unique' => 'This %s already exists.'
			)
		)
	),
	'edit-user' => array(
		array(
			'field' => 'user_id',
			'label' => 'User ID',
			'rules' => 'required'
		), array(
			'field' => 'first_name',
			'label' => 'First Name',
			'rules' => 'required'
		), array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email',
			'errors' => array(
                'is_unique' => 'This %s already exists.'
			)
		)
	),
	'add-category' => array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required'
		)
	),
	'edit-category' => array(
		array(
			'field' => 'category_id',
			'label' => 'Category ID',
			'rules' => 'required'
		), array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required'
		)
	),
	'add-activity' => array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required'
		)
	),
	'edit-activity' => array(
		array(
			'field' => 'activity_id',
			'label' => 'Activity ID',
			'rules' => 'required'
		), array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required'
		)
	),
);

$config['error_prefix'] = '';
$config['error_suffix'] = '';