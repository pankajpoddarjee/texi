<?php

class Job_model extends CI_Model {

    public function __construct() {		
		parent::__construct();
    }
	
	public function saveJob($post,$id=""){
		if(!empty($id)){
			$this->db->where('id', $id);
			$res = $this->db->update('jobs', $post);
		}else{
			$res = $this->db->insert('jobs', $post);
		}
		return $res;
	}
	
	public function getJobDetails($id){
		$this->db->select('jobs.*');
		$this->db->from('jobs');
		$this->db->where("jobs.deleted","0");
		$this->db->where("jobs.id",$id);
		$this->db->order_by("id", "desc");
		$data = $this->db->get()->row();
		return $data;
	} 
	public function getJobs($uid)
	{
		$this->db->select('projects_assign.*, user_profiles.full_name, projects.project_name, project_work_category.category_name');
		$this->db->from('projects_assign');
		$this->db->where("projects_assign.deleted","0");
                $this->db->where("projects_assign.user_id",$uid);
                $this->db->join('user_profiles', 'user_profiles.user_id=projects_assign.user_id' , 'LEFT');
                $this->db->join('projects', 'projects.id=projects_assign.p_id' , 'LEFT');
                $this->db->join('project_work_category', 'project_work_category.id=projects_assign.work_id' , 'LEFT');
		$this->db->order_by("id", "desc");
		$datas = $this->db->get()->result();
                //echo $this->db->last_query();
                return $datas;
				
	} 
	
	public function JobsRemove($id)
	{
		$this->db->set("status", '0');
		$this->db->set("deleted", '1');
		$this->db->set("modifiedBy", $this->session->userdata('user_id'));
		$this->db->where("id", $id);
		return $this->db->update("jobs");	
	}
	public function roleList($parent_id="0")
	{
		$this->db->select('roles.*');
		$this->db->from('roles');
		$this->db->where("roles.deleted","0");
		$this->db->where("roles.parent_id",$parent_id);
		$this->db->order_by("id", "asc");
		$datas = $this->db->get()->result();
		//echo $this->db->last_query();
		return $datas;
				
	}
	
}

