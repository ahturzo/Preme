<?php

class Viewload extends MY_Controller
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
		$this->load->library('pagination');
		if(! $this->session->userdata('user_id'))
			return redirect('login');
	}

	public function home()
	{
		$id=$this->session->userdata('user_id');
		$name=$this->usermodel->get_userdetail($id);
		if($name->acc_type=='Parent')
		{
			$this->load->view('load/home',['name'=>$name]);
		}
		else
		{
			$this->load->view('load/adminhome',['name'=>$name]);
		}				
	}

	public function profile()//to load user profile page
	{
		$id=$this->session->userdata('user_id');
		$name=$this->usermodel->get_userdetail($id);
		$type=$name->acc_type;
		if($type=='Admin')
		{
			$this->load->view('load/profileadmin',['name'=>$name]);
		}
		else
		{
			$this->load->view('load/profile',['name'=>$name]);
		}
	}

	public function parent_list()//this function will load parent list for admin
	{
		$config = [ 	'base_url'			=>	base_url('viewload/parent_list'),
						'per_page'			=>	2,
						'total_rows'		=>	$this->usermodel->num_rows(),

						'full_tag_open'		=>	'<ul class="pagination">',
						'full_tag_close'	=>	'</ul>',

						'first_tag_open'	=>	'<li class="page-item page-link">',
						'first_tag_close'	=>	'</li>',

						'last_tag_open'		=>	'<li class="page-item page-link">',
						'last_tag_close'	=>	'</li>',

						'next_tag_open'		=>	" <li class='page-item page-link'> <a href='#'>",
						'next_tag_close'	=>	"</a></li>",

						'prev_tag_open'		=>	"<li class='page-item page-link'><a href='#'>",
						'prev_tag_close'	=>	"</a></li>",

						'num_tag_open'		=>	"<li class='page-item page-link'><a href='#'>",
						'num_tag_close'		=>	"</a></li>",

						'cur_tag_open'		=>	"<li class='page-item active'> <a class='page-link' href='#'>",
						'cur_tag_close'		=>	"</a></li>"
					];
		$this->pagination->initialize($config);
		$parents = $this->usermodel->parent_list($config['per_page'],$this->uri->segment(3));
		$this->load->view('load/parent_list',['parent'=>$parents]);
	}

	public function parent($id)//this function will load parent profile for admin
	{
		$parents=$this->usermodel->get_userdetail($id);
		$this->load->view('load/parentbio',['name'=>$parents]);
	}

	public function view_child_profile()
	{	
		$id=$this->session->userdata('user_id');
		$name=$this->childmodel->get_childdetail($id);
		$this->load->view('load/profile_child',['child'=>$name]);
	}

	public function all_activity()
	{
		$id=$this->session->userdata('user_id');
		$config = [ 	'base_url'			=>	base_url('viewload/all_activity'),
						'per_page'			=>	2,
						'total_rows'		=>	$this->usermodel->total_activity($id),

						'full_tag_open'		=>	'<ul class="pagination">',
						'full_tag_close'	=>	'</ul>',

						'first_tag_open'	=>	'<li class="page-item page-link">',
						'first_tag_close'	=>	'</li>',

						'last_tag_open'		=>	'<li class="page-item page-link">',
						'last_tag_close'	=>	'</li>',

						'next_tag_open'		=>	" <li class='page-item page-link'> <a href='#'>",
						'next_tag_close'	=>	"</a></li>",

						'prev_tag_open'		=>	"<li class='page-item page-link'><a href='#'>",
						'prev_tag_close'	=>	"</a></li>",

						'num_tag_open'		=>	"<li class='page-item page-link'><a href='#'>",
						'num_tag_close'		=>	"</a></li>",

						'cur_tag_open'		=>	"<li class='page-item active'> <a class='page-link' href='#'>",
						'cur_tag_close'		=>	"</a></li>"
					];
		$this->pagination->initialize($config);
		$activities = $this->usermodel->activity_list($config['per_page'],$this->uri->segment(3),$id);
		$this->load->view('load/all_activity',['activity'=>$activities]);
	}

	public function your_to_do_list()
	{
		$id=$this->session->userdata('user_id');
		$config = [ 	'base_url'			=>	base_url('viewload/your_to_do_list'),
						'per_page'			=>	2,
						'total_rows'		=>	$this->usermodel->total_to_do($id),

						'full_tag_open'		=>	'<ul class="pagination">',
						'full_tag_close'	=>	'</ul>',

						'first_tag_open'	=>	'<li class="page-item page-link">',
						'first_tag_close'	=>	'</li>',

						'last_tag_open'		=>	'<li class="page-item page-link">',
						'last_tag_close'	=>	'</li>',

						'next_tag_open'		=>	" <li class='page-item page-link'> <a href='#'>",
						'next_tag_close'	=>	"</a></li>",

						'prev_tag_open'		=>	"<li class='page-item page-link'><a href='#'>",
						'prev_tag_close'	=>	"</a></li>",

						'num_tag_open'		=>	"<li class='page-item page-link'><a href='#'>",
						'num_tag_close'		=>	"</a></li>",

						'cur_tag_open'		=>	"<li class='page-item active'> <a class='page-link' href='#'>",
						'cur_tag_close'		=>	"</a></li>"
					];
		$this->pagination->initialize($config);
		$works = $this->usermodel->to_do_list($config['per_page'],$this->uri->segment(3),$id);
		$this->load->view('load/all_to_do',['to'=>$works]);
	}

	public function childcare_list()
	{
		$config = [ 	'base_url'			=>	base_url('viewload/childcare_list'),
						'per_page'			=>	2,
						'total_rows'		=>	$this->childmodel->total_childcare(),

						'full_tag_open'		=>	'<ul class="pagination">',
						'full_tag_close'	=>	'</ul>',

						'first_tag_open'	=>	'<li class="page-item page-link">',
						'first_tag_close'	=>	'</li>',

						'last_tag_open'		=>	'<li class="page-item page-link">',
						'last_tag_close'	=>	'</li>',

						'next_tag_open'		=>	" <li class='page-item page-link'> <a href='#'>",
						'next_tag_close'	=>	"</a></li>",

						'prev_tag_open'		=>	"<li class='page-item page-link'><a href='#'>",
						'prev_tag_close'	=>	"</a></li>",

						'num_tag_open'		=>	"<li class='page-item page-link'><a href='#'>",
						'num_tag_close'		=>	"</a></li>",

						'cur_tag_open'		=>	"<li class='page-item active'> <a class='page-link' href='#'>",
						'cur_tag_close'		=>	"</a></li>"
					];
		$this->pagination->initialize($config);
		$childcare = $this->childmodel->get_all_childcare($config['per_page'],$this->uri->segment(3));
		$this->load->view('load/childcare_list',['list'=>$childcare]);
	}

	public function childcare_search()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); //error text danger color
		$this->form_validation->set_rules('query','Search','required');
		if(!$this->form_validation->run())
		{
			$this->childcare_list();
		}
		else
		{
			$query=$this->input->post('query');
			return redirect("viewload/childcare_searchresult/$query");
		}
	}

	public function childcare_searchresult($query)
	{
		$config = [ 	'base_url'			=>	base_url("viewload/childcare_searchresult/$query"),
						'per_page'			=>	2,
						'total_rows'		=>	$this->childmodel->count_search_childcare($query),

						'full_tag_open'		=>	'<ul class="pagination">',
						'full_tag_close'	=>	'</ul>',

						'first_tag_open'	=>	" <li class='page-item page-link'> <a href='#'>",
						'first_tag_close'	=>	'</a></li>',

						'last_tag_open'		=>	" <li class='page-item page-link'> <a href='#'>",
						'last_tag_close'	=>	'</a></li>',

						'next_tag_open'		=>	" <li class='page-item page-link'> <a href='#'>",
						'next_tag_close'	=>	"</a></li>",

						'prev_tag_open'		=>	"<li class='page-item page-link'><a href='#'>",
						'prev_tag_close'	=>	"</a></li>",

						'num_tag_open'		=>	"<li class='page-item page-link'><a href='#'>",
						'num_tag_close'		=>	"</a></li>",

						'cur_tag_open'		=>	"<li class='page-item active'> <a class='page-link' href='#'>",
						'cur_tag_close'		=>	"</a></li>"
					];
		$this->pagination->initialize($config);
		$childcare=$this->childmodel->search_childcare($query,$config['per_page'],$this->uri->segment(4));
		$this->load->view('load/childcare_search_result_list',['list'=>$childcare]);
	}

	public function child_problem_list()
	{
		$config = [ 	'base_url'			=>	base_url('viewload/child_problem_list'),
						'per_page'			=>	2,
						'total_rows'		=>	$this->childmodel->total_problem(),

						'full_tag_open'		=>	'<ul class="pagination">',
						'full_tag_close'	=>	'</ul>',

						'first_tag_open'	=>	'<li class="page-item page-link">',
						'first_tag_close'	=>	'</li>',

						'last_tag_open'		=>	'<li class="page-item page-link">',
						'last_tag_close'	=>	'</li>',

						'next_tag_open'		=>	" <li class='page-item page-link'> <a href='#'>",
						'next_tag_close'	=>	"</a></li>",

						'prev_tag_open'		=>	"<li class='page-item page-link'><a href='#'>",
						'prev_tag_close'	=>	"</a></li>",

						'num_tag_open'		=>	"<li class='page-item page-link'><a href='#'>",
						'num_tag_close'		=>	"</a></li>",

						'cur_tag_open'		=>	"<li class='page-item active'> <a class='page-link' href='#'>",
						'cur_tag_close'		=>	"</a></li>"
					];
		$this->pagination->initialize($config);
		$problem = $this->childmodel->get_all_problem($config['per_page'],$this->uri->segment(3));
		$this->load->view('load/child_problem_list',['list'=>$problem]);
	}

	public function child_problem_search()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); //error text danger color
		$this->form_validation->set_rules('query','Search','required');
		if(!$this->form_validation->run())
		{
			$this->child_problem_search();
		}
		else
		{
			$query=$this->input->post('query');
			return redirect("viewload/childproblem_searchresult/$query");
		}
	}

	public function childproblem_searchresult($query)
	{
		$config = [ 	'base_url'			=>	base_url("viewload/childproblem_searchresult/$query"),
						'per_page'			=>	2,
						'total_rows'		=>	$this->childmodel->count_search_problem($query),

						'full_tag_open'		=>	'<ul class="pagination">',
						'full_tag_close'	=>	'</ul>',

						'first_tag_open'	=>	" <li class='page-item page-link'> <a href='#'>",
						'first_tag_close'	=>	'</a></li>',

						'last_tag_open'		=>	" <li class='page-item page-link'> <a href='#'>",
						'last_tag_close'	=>	'</a></li>',

						'next_tag_open'		=>	" <li class='page-item page-link'> <a href='#'>",
						'next_tag_close'	=>	"</a></li>",

						'prev_tag_open'		=>	"<li class='page-item page-link'><a href='#'>",
						'prev_tag_close'	=>	"</a></li>",

						'num_tag_open'		=>	"<li class='page-item page-link'><a href='#'>",
						'num_tag_close'		=>	"</a></li>",

						'cur_tag_open'		=>	"<li class='page-item active'> <a class='page-link' href='#'>",
						'cur_tag_close'		=>	"</a></li>"
					];
		$this->pagination->initialize($config);
		$problem=$this->childmodel->search_problem($query,$config['per_page'],$this->uri->segment(4));
		$this->load->view('load/childproblem_search_result_list',['list'=>$problem]);
	}

	public function about_us()
	{
		$this->load->view('load/about_us');
	}
}