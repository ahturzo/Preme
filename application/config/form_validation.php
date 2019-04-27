<?php

$config=[
			'login_rules' => [
										[
											'field' => 'email',
											'label' => 'Email ID',
											'rules' => 'trim|required|valid_email'
										],
										[
											'field' => 'password',
											'label' => 'Password',
											'rules' => 'required'
										]
									],

			'signup_rules' =>[
										[
											'field' => 'first_name',
											'label' => 'First Name',
											'rules' => 'required|alpha_numeric_spaces'
										],
										[
											'field' => 'last_name',
											'label' => 'Last Name',
											'rules' => 'required|alpha_numeric_spaces'
										],
										[
											'field' => 'email',
											'label' => 'Email ID',
											'rules' => 'trim|required|valid_email'
										],
										[
											'field' => 'password',
											'label' => 'Password',
											'rules' => 'required'
										],
										[
											'field' => 'phone',
											'label' => 'Phone Number',
											'rules' => 'required'
										],					
							],

			'add_child_rules' =>[
										[
											'field' => 'baby_name',
											'label' => 'Child Name',
											'rules' => 'required|alpha_numeric_spaces'
										],
										[
											'field' => 'date_of_birth',
											'label' => 'Birthday',
											'rules' => 'required'
										],
										[
											'field' => 'weight',
											'label' => 'Weight',
											'rules' => 'required|numeric'
										],
										[
											'field' => 'height',
											'label' => 'Height',
											'rules' => 'required|numeric'
										],
										[
											'field' => 'head_size',
											'label' => 'Head Size',
											'rules' => 'required|numeric'
										],		
										[
											'field' => 'special_case',
											'label' => 'Special Case',
											'rules' => 'required'
										],			
							],

			'add_activity_rules' => [
										[
											'field' => 'activity_title',
											'label' => 'Title',
											'rules' => 'trim|required|alpha_numeric_spaces'
										],
										[
											'field' => 'activity_body',
											'label' => 'Activity Body',
											'rules' => 'required'
										]
									],

			'add_to_do_rules' => [
										[
											'field' => 'list_body',
											'label' => 'Work About',
											'rules' => 'trim|required|alpha_numeric_spaces'
										],
									],

			'add_childcare_rules' => [
										[
											'field' => 'childcare_name',
											'label' => 'Child Care Name',
											'rules' => 'trim|required|alpha_numeric_spaces'
										],
										[
											'field' => 'location',
											'label' => 'Location',
											'rules' => 'trim|required|alpha_numeric_spaces'
										],
									],	

			'problem_rules' =>[
										[
											'field' => 'problem_name',
											'label' => 'Problem Name',
											'rules' => 'required'
										],
										[
											'field' => 'symptoms',
											'label' => 'Symptoms',
											'rules' => 'required'
										],
										[
											'field' => 'problem_details',
											'label' => 'Problem Details',
											'rules' => 'required'
										],
										[
											'field' => 'prevention',
											'label' => 'Prevention',
											'rules' => 'required'
										]					
							],					
];