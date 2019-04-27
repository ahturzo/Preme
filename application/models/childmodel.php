<?php

class Childmodel extends CI_Model
{
	public function is_exist($id,$name)
	{
		$q=$this->db
					->where('parent_id',$id)
					->where('baby_name',$name)
					->get('baby');
		if($q->num_rows()>0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function add_child_account($post)
	{
		return $this->db->insert('baby',$post);
	}

	public function get_childdetail($id) // to load profile, to update profile
	{
		$q	=  $this->db
						->Select('*')
						->From('baby')
						->Where('parent_id',$id)
						->get();
			return $q->result();
	}

	public function get_child($id)
	{
		$q	=  $this->db
						->Select('*')
						->From('baby')
						->Where('baby_id',$id)
						->get();
			return $q->row();
	}

	public function update_child_profile($id,$post)
	{
		return $this->db
						->Where('baby_id',$id)
						->UPDATE('baby',$post);
	}

	public function delete_child($id)
	{
		return $this->db
						->delete('baby',['baby_id'=>$id]);
	}

	public function is_childcare_exist($name,$location)
	{
		$q=$this->db
					->where('childcare_name',$name)
					->or_where('location',$location)
					->get('child_care');
		if($q->num_rows()>0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function add_childcare($post)
	{
		return $this->db->insert('child_care',$post);
	}

	public function total_childcare()
	{	//count total child care for a user for pagination
		$q=$this->db
					->select('*')
					->from('child_care')
					->get();
		return $q->num_rows();
	}

	public function get_all_childcare($limit,$offset)
	{	//it will return all child care basis of pagination per page 
		$q=$this->db
					->Select('*')
					->limit($limit,$offset)
					->order_by('childcare_name','DESC')
					->get('child_care');
		return $q->result();
	}

	public function count_search_childcare($query)
	{
		$q=$this->db->from('child_care')
					->like('childcare_name',$query)
					->or_like('location',$query)
					->get();
		return $q->num_rows();
	}

	public function search_childcare($query,$limit,$offset) //will search article and return results
	{
		$q = $this->db
					->from('child_care')
					->like('childcare_name',$query)
					->or_like('location',$query)
					->limit($limit,$offset)
					->get();
		return $q->result();
	}

	public function is_problem_exist($name)
	{
		$q=$this->db
					->where('problem_name',$name)
					->get('problem');
		if($q->num_rows()>0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function add_problem($post)
	{
		return $this->db->insert('problem',$post);
	}

	public function total_problem()
	{	//count total child problem for a user for pagination
		$q=$this->db
					->select('*')
					->from('problem')
					->get();
		return $q->num_rows();

	}

	public function get_all_problem($limit,$offset)
	{	//it will return all child problem basis of pagination per page 
		$q=$this->db
					->Select('*')
					->limit($limit,$offset)
					->order_by('problem_name','DESC')
					->get('problem');
		return $q->result();
	}

	public function count_search_problem($query)
	{
		$q=$this->db->from('problem')
					->like('symptoms',$query)
					->or_like('problem_name',$query)
					->get();
		return $q->num_rows();
	}

	public function search_problem($query,$limit,$offset)
	{
		$q = $this->db
					->from('problem')
					->like('symptoms',$query)
					->or_like('problem_name',$query)
					->limit($limit,$offset)
					->get();
		return $q->result();
	}
}