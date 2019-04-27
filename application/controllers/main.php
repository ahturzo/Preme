<?php

class MAIN extends MY_Controller
{	//will check the  user is logged in
	public function index()
	{
		if($this->session->userdata('user_id'))
			return redirect('login');
	}

	public function __construct()
	{
		//to redirect user
		parent::__construct();
		if(! $this->session->userdata('user_id'))
			return redirect('login');	
	}

}