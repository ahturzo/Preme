<?php

class Work extends MY_Controller
{
	public function index()
	{
		if($this->session->userdata('user_id'))
			return redirect('login');
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usermodel');
		$this->load->model('childmodel');
		$this->load->helper('form');
		if(! $this->session->userdata('user_id'))
			return redirect('login');
	}

	public function delete_profile()
	{	// to delete user profile function
		$id=$this->session->userdata('user_id');
		$result=$this->usermodel->delete_user($id);
		return redirect('login/logout');
	}

	public function edit_profile()
	{	// to view edit user profile page
		$id=$this->session->userdata('user_id');
		$id=$this->usermodel->get_userdetail($id);
		$this->load->view('load/edit_profile',['num'=>$id]);
	}

	public function update_profile()
	{	// update user profile 
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run('signup_rules'))
		{ //if form_validation true	
			$post=$this->input->post();
			$id= $this->session->userdata('user_id');
			$this->flash($this->usermodel->update_profile($id,$post),"User profile updated Successfully.",'User Profile failed to update.Please try again.');
		}
		else
		{
			$this->load->view('load/edit_profile');
		}
	}

	public function flash($success,$successtext,$failertext)
	{
		// to show flash message
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
		return redirect('viewload/profile');
	}

	public function addParent()
	{
		$this->load->view('load/adminaddparent');
	}

	public function parent_added()
	{	//admin can add parent through this function
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); //error text danger color
		if($this->form_validation->run('signup_rules'))
		{ //if form_validation true			
			$post=$this->input->post();
			$sign_id = $this->usermodel->is_exist($this->input->post('email'),$this->input->post('phone'));
			if($sign_id)
			{
				//flashdata
				$this->session->set_flashdata('failed','This Email or Phone Number may be used by another user.'); //if email or password wrong
				$this->load->view('load/adminaddparent');
			}
			else
			{
				$result= $this->usermodel->add_account($post);
				$this->flash($result,"Parent Account Added Successfully.",'Failed to Adding Parent Account.Please try again.');
			}
		}
		else
		{
			$this->load->view('load/adminaddparent');
		}
	}

	public function admindeleteparent() //admin can delete a parent through this function
	{
		$post=$this->input->post('parent_id');
		$this->flash($this->usermodel->delete_user($post),"Parent deleted Successfully.",'Failed to delete Parent.Please try again.');
	}

	public function create_child_profile()
	{	//load child profile creation page
		$this->load->view('load/create_child_profile');
	}

	public function add_child()
	{	//create child profile
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); //error text danger color
		if($this->form_validation->run('add_child_rules'))
		{ 	//if form_validation true			
			$post=$this->input->post();
			$baby_id = $this->childmodel->is_exist($this->input->post('parent_id'),$this->input->post('baby_name'));
			if($baby_id)
			{
				//flashdata
				$this->session->set_flashdata('failed','You are already create this baby profile'); //if email or password wrong
				$this->load->view('load/create_child_profile');
			}
			else
			{
				$result= $this->childmodel->add_child_account($post);
				$this->flash($result,"Child Profile Added Successfully.",'Failed to Adding Child Profile.Please try again.');
			}
		}
		else
		{
			$this->load->view('load/create_child_profile');
		}
	}

	public function edit_child_profile($id)
	{	// to view edit child profile page
		$child=$this->childmodel->get_child($id);
		$this->load->view('load/edit_child_profile',['baby'=>$child]);
	}

	public function update_child_profile()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run('add_child_rules'))
		{ 	//if form_validation true	
			$post=$this->input->post();
			$id= $this->input->post('baby_id');
			unset($post['baby_id']);
			$this->flash($this->childmodel->update_child_profile($id,$post),"Child profile updated Successfully.",'Child Profile failed to update.Please try again.');
		}
		else
		{
			$this->load->view('load/edit_profile');
		}
	}

	public function delete_child_profile()
	{
		$post=$this->input->post('baby_id');
		$this->flash($this->childmodel->delete_child($post),"Child Profile deleted Successfully.",'Failed to delete Child Profile.Please try again.');
	}

	public function add_activity()
	{
		$this->load->view('load/add_activity');
	}

	public function user_activity()
	{	//add user activity
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run('add_activity_rules'))
		{ 	//if form_validation true	
			$post=$this->input->post();
			$this->flash($this->usermodel->add_activity($post),"Activity Added Successfully in Your Diary.",'Activity failed to Add in Your Diary.Please try again.');
		}
		else
		{
			$this->load->view('load/add_activity');
		}
	}

	public function add_to_do()
	{
		$this->load->view('load/add_to_do');
	}

	public function add_into_list()
	{	//add user activity
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run('add_to_do_rules'))
		{ 	//if form_validation true;	
			$post=$this->input->post();
			$this->flash($this->usermodel->add_to_do($post),"To Do Work Added Successfully.",'To Do Work failed to Add.Please try again.');
		}
		else
		{
			$this->load->view('load/add_to_do');
		}
	}

	public function add_care()
	{
		$this->load->view('load/add_child_care');
	}

	public function import_childcare()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); //error text danger color
		if($this->form_validation->run('add_childcare_rules'))
		{ 	//if form_validation true			
			$post=$this->input->post();
			$childcare = $this->childmodel->is_childcare_exist($this->input->post('childcare_name'),$this->input->post('location'));
			if($childcare)
			{
				//flashdata
				$this->session->set_flashdata('failed','This Child Care Already Exist'); //if email or password wrong
				$this->load->view('load/add_child_care');
			}
			else
			{
				$result= $this->childmodel->add_childcare($post);
				$this->flash($result,"Child Care Info Added Successfully.",'Failed to Adding Child Care Info.Please try again.');
			}
		}
		else
		{
			$this->load->view('load/add_child_care');
		}
	}

	public function add_problem()
	{
		$this->load->view('load/add_problem');
	}

	public function import_problem()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); //error text danger color
		if($this->form_validation->run('problem_rules'))
		{ 	//if form_validation true			;
			$post=$this->input->post();
			$problem = $this->childmodel->is_problem_exist($this->input->post('problem_name'));
			if($problem)
			{
				//flashdata
				$this->session->set_flashdata('failed','This Baby Problem Already Exist in Database'); //if email or password wrong
				$this->load->view('load/add_problem');
			}
			else
			{
				$result= $this->childmodel->add_problem($post);
				$this->flash($result,"Child Problem Info Added Successfully.",'Failed to Adding Child Problem Info.Please try again.');
			}
		}
		else
		{
			$this->load->view('load/add_problem');
		}
	}
}