<?php

class Usermodel extends CI_Model{

	public function login_valid($email,$password)
	{
		$q=$this->db->where( ['email'=>$email,'password'=>$password] )
						->get('user');
		if($q->num_rows())
		{
			return $q->row()->user_id;
		}
		else
		{
			return FALSE;
		}
	}

	public function get_userdetail($id) // to load profile, to update profile
	{
		$q	=  $this->db
						->Select('*')
						->From('user')
						->Where('user_id',$id)
						->get();
		return $q->row();
	}

	public function delete_user($id)
	{
		return $this->db
						->delete('user',['user_id'=>$id]);
	}

	public function is_exist($email,$phone)
	{
		$q=$this->db
					->where('phone',$phone)
					->or_where('email',$email)
					->get('user');	
		if($q->num_rows()>0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function add_account(Array $post)
	{
		return $this->db->insert('user',$post);
	}

	public function update_profile($id,Array $post)
	{
		return $this->db
						->Where('user_id',$id)
						->UPDATE('user',$post);	//will return true or false	
	}

	public function num_rows()
	{	//count total user id for pagination
		$parent=$this->db
						->Select('*')
						->From('user')
						->where('acc_type','Parent')
						->get();
		return $parent->num_rows();
	}

	public function parent_list($limit,$offset)
	{	//it will return parents basis of pagination per page 
		$parent=$this->db
						->Select('user_id')
						->Select('first_name')
						->Select('last_name')
						->Select('email')
						->From('user')
						->where('acc_type','Parent')
						->limit($limit,$offset)
						->get();
		return $parent->result();
	}

	public function add_activity($post)
	{
		return $this->db->insert('diary',$post);
	}

	public function total_activity($id)
	{	//count total activity for a user for pagination
		$q=$this->db
					->Select('*')
					->From('diary')
					->where('user_id',$id)
					->get();
		return $q->num_rows();
	}

	public function activity_list($limit,$offset,$id)
	{	//it will return activities basis of pagination per page 
		$q=$this->db
					->Select('activity_title')
					->Select('activity_body')
					->Select('create_at')
					->From('diary')
					->where('user_id',$id)
					->limit($limit,$offset)
					->order_by('create_at','DESC')
					->get();
		return $q->result();
	}

	public function add_to_do($post)
	{
		return $this->db->insert('to_do_list',$post);
	}

	public function total_to_do($id)
	{
		//count total to do for a user for pagination
		$q=$this->db
					->Select('*')
					->From('to_do_list')
					->where('user_id',$id)
					->get();
		return $q->num_rows();
	}

	public function to_do_list($limit,$offset,$id)
	{	//it will return all to do works basis of pagination per page 
		$q=$this->db
					->Select('list_body')
					->Select('notify_date')
					->Select('notify_time')
					->From('to_do_list')
					->where('user_id',$id)
					->limit($limit,$offset)
					->order_by('notify_date','DESC')
					->get();
		return $q->result();
	}
}