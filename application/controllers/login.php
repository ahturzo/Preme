<?php

class Login extends MY_Controller
{
	public function index()
	{	// will check the user is logged in
		if($this->session->userdata('user_id'))
			{
				return redirect("viewload/home");
			}
		else
		{
			$this->load->helper('form');
			$this->load->view('load/user_login');
		}
	}

	public function user_login()
	{	// user login function
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); //error text danger color
		if($this->form_validation->run('login_rules')){ //if form_validation true
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$this->load->model('usermodel');
			$login_id = $this->usermodel->login_valid($email,$password);
			if($login_id)
			{
				$this->session->set_userdata('user_id',$login_id);
				return redirect("viewload/home");	//redirect to viewload controller to load view
			}
			else
			{
				//flashdata
				$this->session->set_flashdata('login_failed','Email or Password maybe wrong.'); //if email or password wrong
				return redirect('login');
			}
		}
		else
		{
			$this->load->view('load/user_login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');

		return redirect('login');
	}

	public function signup()
	{	//to load sign up page
		$this->load->helper('form');
		$this->load->view('load/signingUp');
	}

	public function signing()
	{	//signup function
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); //error text danger color
		if($this->form_validation->run('signup_rules'))
		{ //if form_validation true			
			$this->load->model('usermodel');
			$post=$this->input->post();
			$sign_id = $this->usermodel->is_exist($this->input->post('email'),$this->input->post('phone'));
			if($sign_id)
			{
				//flashdata
				$this->session->set_flashdata('signin_failed','This Email or Phone Number may be used by another user.'); //if email or password wrong
				$this->load->view('load/signingUp');
			}
			else
			{
				$result= $this->usermodel->add_account($post);
				$this->flash($result,"User Account Created Successfully.",'Failed to Create User Account.Please try again.');
			}
		}
		else
		{
			$this->load->view('load/signingUp');
		}
	}

	public function flash($success,$successtext,$failertext)
	{
		// will show flash message
		if($success)
		{
			$this->session->set_flashdata('feedback',$successtext);
			$this->session->set_flashdata('feedback_class','alert-success');
		}
		else
		{
			$this->session->set_flashdata('feedback',$failertext);
			$this->session->set_flashdata('feedback_class','alert-danger');
		}
		$this->load->view('load/user_login');
	}
}