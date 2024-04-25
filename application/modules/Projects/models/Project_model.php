<?php

class Project_model extends CI_Model {

    public function __construct() {		
		parent::__construct();
    }
	
	public function getProjectData($id)
	{
		$this->db->select('projects.*');
		$this->db->from('projects');
		$this->db->where("projects.id",$id);
		$query = $this->db->get()->row();
		return $query;
	}
	
	public function updateUser($user_id,$post1){
		
		$this->db->where('user_id', $user_id);
		$res = $this->db->update('user_profiles', $post1);
		return $res;
	}
	
	public function getProjects()
	{	
          
           //echo $from;
		$this->db->select('projects.*');
		$this->db->from('projects');
		//$this->db->where("(NOT find_in_set('2',role_ids) <> 0) && (NOT find_in_set('3',role_ids) <> 0)");
		$this->db->where("projects.deleted",'0');
		//$this->db->where("users.role_ids!=",'1');
		//$this->db->where("user_profiles.is_main",'1');
		$this->db->order_by("projects.id", "desc");
		$query = $this->db->get()->result();
		//echo $this->db->last_query();
		return $query;
	}
	
	public function ProjectStatusChange($id)
	{
		$this->db->select('projects.*');
		$this->db->from('projects');
		$this->db->where("projects.id",$id);
		$data = $this->db->get()->row();
		
		if($data->status=='1')
		{
			$this->db->set("status", '0');
		}
		else
		{
			$this->db->set("status", '1');
		}
		$this->db->where("id", $id);
		return $this->db->update("projects");	
	}
	
	public function userRemove($id)
	{
		$this->db->set("status", '0');
		$this->db->set("deleted", '1');
		$this->db->set("modifiedBy", $this->session->userdata('user_id'));
		$this->db->where("id", $id);
		return $this->db->update("users");	
	}
	
	public function checkUsername($email)
	{
		$this->db->select('* ');
		$this->db->from('users');
		$this->db->where("login_id",$email);
		$query = $this->db->get()->row();
		return $query;
	}
        public function checkDuplicateEmail($emailid)
	{
		$this->db->select('* ');
		$this->db->from('users');
		$this->db->where("email_id",$emailid);
		$query = $this->db->get()->row();
                //echo $this->db->last_query();
                //die();
		return $query;
	}
       
	public function saveProject($post){
		
		$res = $this->db->insert('projects', $post);
		$user_id = $this->db->insert_id();
		return $user_id;
	}
	public function updateProjectDetails($post,$user_id){
		
		$this->db->where('id', $user_id);
		$res = $this->db->update('projects', $post);
		//pr($this->db->last_query());
		
		return $res;
	}
	public function getUserDetails($user_id)
	{		
		$this->db->select('users.login_id,users.email_id,users.is_admin_verified,users.role_ids,user_profiles.fname,user_profiles.full_name,user_profiles.lname,');
		$this->db->from('users');
		$this->db->where("users.id",$user_id);
		$this->db->join('user_profiles', 'users.id = user_profiles.user_id' , 'LEFT');
		$this->db->where("user_profiles.is_main",'1');
		$query = $this->db->get()->row();
		//echo $this->db->last_query();
		//die();
		
		
		return $query;
	}
	public function ProjectNameList()
	{
		$data= array();
		$this->db->select('projects.*');
		$this->db->from('projects');
		$this->db->where("projects.deleted","0");
		$this->db->order_by("id", "asc");
		return $datas = $this->db->get()->result();
				
	}
        public function saveProjectDetails($post){
		
		$res = $this->db->insert('projects_details', $post);
		$user_id = $this->db->insert_id();
		return $user_id;
	}
        
        public function updateProjectAllDetails($post,$user_id){
		
		$this->db->where('id', $user_id);
		$res = $this->db->update('projects_details', $post);
		//pr($this->db->last_query());
		
		return $res;
	}
        public function getProjectsDetails()
	{	
          
           //echo $from;
		$this->db->select('projects_details.*,projects.project_name as pname,project_work_category.category_name as cname');
		$this->db->from('projects_details');
		$this->db->where("projects_details.deleted",'0');
		//$this->db->where("users.role_ids!=",'1');
		//$this->db->where("user_profiles.is_main",'1');
		$this->db->order_by("projects_details.id", "desc");
                $this->db->join('projects', 'projects.id = projects_details.p_id' , 'LEFT');
                $this->db->join('project_work_category', 'project_work_category.id = projects_details.work_type' , 'LEFT');
		$query = $this->db->get()->result();
		//echo $this->db->last_query();
		return $query;
	}
        public function getProjectDetailsData($id)
	{
		$this->db->select('projects_details.*');
		$this->db->from('projects_details');
		$this->db->where("projects_details.id",$id);
		$query = $this->db->get()->row();
		return $query;
	}
        public function saveWorkCategory($post,$id=""){
            if(!empty($id)){
			$this->db->where('id', $id);
			$res = $this->db->update('project_work_category', $post);
		}else{
			$res = $this->db->insert('project_work_category', $post);
		}
		return $res;
	}
        
       public function getWorkCategory()
	{
		$this->db->select('project_work_category.*');
                $this->db->from('project_work_category');
		$this->db->where("project_work_category.deleted","0");
		$this->db->order_by("id", "desc");
                return $datas = $this->db->get()->result();
				
	}
        
        public function getworkCategoryDetails($id){
		$this->db->select('project_work_category.*');
		$this->db->from('project_work_category');
		$this->db->where("project_work_category.deleted","0");
		$this->db->where("project_work_category.id",$id);
		$this->db->order_by("id", "desc");
		$data = $this->db->get()->row();
		return $data;
	} 
        
        public function WorkCategoryRemove($id)
	{
		$this->db->set("status", '0');
		$this->db->set("deleted", '1');
		$this->db->set("modifiedBy", $this->session->userdata('user_id'));
		$this->db->where("id", $id);
		return $this->db->update("project_work_category");	
	}
        
        public function ProjectWorkCategoryStatusChange($id)
	{
		$this->db->select('project_work_category.*');
		$this->db->from('project_work_category');
		$this->db->where("project_work_category.id",$id);
		$data = $this->db->get()->row();
		
		if($data->status=='1')
		{
			$this->db->set("status", '0');
		}
		else
		{
			$this->db->set("status", '1');
		}
		$this->db->where("id", $id);
		return $this->db->update("project_work_category");	
	}
	public function WorkTypeList()
	{
		$data= array();
		$this->db->select('project_work_category.*');
		$this->db->from('project_work_category');
		$this->db->where("project_work_category.deleted","0");
		$this->db->order_by("id", "asc");
		return $datas = $this->db->get()->result();
				
	}
         public function ProjectDetailStatusChange($id)
	{
		$this->db->select('projects_details.*');
		$this->db->from('projects_details');
		$this->db->where("projects_details.id",$id);
		$data = $this->db->get()->row();
		
		if($data->status=='0')
		{
			$this->db->set("status", '1');
		}
		else
		{
			$this->db->set("status", '0');
		}
		$this->db->where("id", $id);
		return $this->db->update("projects_details");	
	}
        
        public function ProjectRemove($id)
	{
		$this->db->set("status", '0');
		$this->db->set("deleted", '1');
		$this->db->set("modifiedBy", $this->session->userdata('user_id'));
		$this->db->where("id", $id);
		return $this->db->update("projects_details");	
	}
        public function getAllStaffNameByWork($staff_name_id)
	{
		$data= array();
		$this->db->select('users.*,user_profiles.full_name as name');
		$this->db->from('users');
		$this->db->where("users.deleted","0");
		$this->db->where("users.status","1");
		$this->db->where("users.staff_category_id",$staff_name_id);
                $this->db->where("users.role_ids ",2);
		$this->db->join('user_profiles', 'user_profiles.user_id = users.id' , 'LEFT');
                //echo $this->db->last_query();
		$datas = $this->db->get()->result();
                //echo $this->db->last_query();
                return $datas;
				
	}
        public function saveProjectAssign($post){
		
		$res = $this->db->insert('projects_assign', $post);
		$user_id = $this->db->insert_id();
		return $user_id;
	}
        public function getProjectAssignDetailsData($id)
	{
		$this->db->select('projects_assign.*');
		$this->db->from('projects_assign');
		$this->db->where("projects_assign.id",$id);
		$query = $this->db->get()->row();
                //echo $this->db->last_query();
		return $query;
	}
        public function getProjectsAssignedList()
	{	
          
           //echo $from;
		$this->db->select('projects_assign.*,projects.project_name as pname,project_work_category.category_name as cname,user_profiles.full_name as name,');
		$this->db->from('projects_assign');
		$this->db->where("projects_assign.deleted",'0');
		//$this->db->where("users.role_ids!=",'1');
		//$this->db->where("user_profiles.is_main",'1');
		$this->db->order_by("projects_assign.id", "desc");
                $this->db->join('projects', 'projects.id = projects_assign.p_id' , 'LEFT');
                $this->db->join('project_work_category', 'project_work_category.id = projects_assign.work_id' , 'LEFT');
                $this->db->join('user_profiles', 'user_profiles.user_id = projects_assign.user_id' , 'LEFT');
		$query = $this->db->get()->result();
		//echo $this->db->last_query();
		return $query;
	}
        
        public function updateProjectAssign($post,$user_id){
		
		$this->db->where('id', $user_id);
		$res = $this->db->update('projects_assign', $post);
		//pr($this->db->last_query());
		
		return $res;
	}
        public function ProjectAssignStatusChange($id)
	{
		$this->db->select('projects_assign.*');
		$this->db->from('projects_assign');
		$this->db->where("projects_assign.id",$id);
		$data = $this->db->get()->row();
		
		if($data->status=='0')
		{
			$this->db->set("status", '1');
		}
		else
		{
			$this->db->set("status", '0');
		}
		$this->db->where("id", $id);
		return $this->db->update("projects_assign");	
	}
        public function ProjectAssignRemove($id)
	{
		$this->db->set("status", '0');
		$this->db->set("deleted", '1');
		$this->db->set("modifiedBy", $this->session->userdata('user_id'));
		$this->db->where("id", $id);
		return $this->db->update("projects_assign");	
	}
        
        public function ClientNameList()
	{
		$data= array();
		$this->db->select('users.*,user_profiles.full_name as client_name');
		$this->db->from('users');
                 $this->db->where("users.role_ids","4");
		$this->db->where("users.deleted","0");
                $this->db->where("users.status","1");
                $this->db->join('user_profiles', 'users.id = user_profiles.user_id' , 'LEFT');
		$this->db->order_by("id", "desc");
		return $datas = $this->db->get()->result();
				
	}
        
        public function getClientNameByProjectName($client_name_id)
	{
		$data= array();
                $this->db->select('projects.c_id,user_profiles.full_name as c_name');
		$this->db->from('projects');
		$this->db->where("projects.deleted","0");
		$this->db->where("projects.status","1");
		$this->db->where("projects.id",$client_name_id);
                $this->db->join('user_profiles', 'user_profiles.user_id = projects.c_id' , 'LEFT');
                //echo $this->db->last_query();
		$datas = $this->db->get()->result();
                //echo $this->db->last_query();
                return $datas;
				
	}
	
}