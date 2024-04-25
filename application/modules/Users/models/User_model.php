<?php

class User_model extends CI_Model {

    public function __construct() {		
		parent::__construct();
    }
	
	public function getUserData($user_id)
	{
		$this->db->select('users.login_id as user_login_id,users.status,users.addedOn,users.staff_category_id,user_profiles.*');
		$this->db->from('users');
		$this->db->where("users.id",$user_id);
		$this->db->join('user_profiles', 'users.id = user_profiles.user_id' , 'LEFT');
                
		$this->db->where("user_profiles.is_main",'1');
		$query = $this->db->get()->row();
		
		$this->db->select('user_settings.*');
		$this->db->from('user_settings');
		$this->db->where("user_settings.user_id",$user_id);
		$query5 = $this->db->get()->row();
		
		$query->settings = $query5;
		//echo $this->db->last_query();
		return $query;
	}
	
	public function updateUser($user_id,$post1){
		
		$this->db->where('user_id', $user_id);
		$res = $this->db->update('user_profiles', $post1);
		return $res;
	}
        	public function updateUserSettings($user_id,$post1){
		
		$this->db->where('user_id', $user_id);
		$res = $this->db->update('user_settings', $post1);
		return $res;
	}
	
	public function addUserContactNo($post){
		return $this->db->insert('user_phones', $post);
	}
	public function addUserEmailId($post){
		return $this->db->insert('user_emails', $post);
	}
	public function addUserIPAddresses($post){
		return $this->db->insert('user_ip_addresses', $post);
	}
	public function checkCurrentPassword($current_password,$user_id){		
		$this->db->select('users.*');
		$this->db->from('users');
		$this->db->where("users.id",$user_id);
		$this->db->where("users.password",md5($current_password));
		$res = $this->db->get()->row();
		return $res;
	}
    public function changePassword($password,$user_id)
	{
		$newPassword = md5($password);
		$id = $user_id;
		$this->db->set("password", $newPassword);
		$this->db->where("id", $id);
		return $this->db->update("users"); 
	}  
	public function getLoginRecords($user_email)
	{
		$post = $this->input->post();
		$this->db->select('login_records.*');
		$this->db->from('login_records');
		$this->db->where("login_records.user_email",$user_email);
		$this->db->order_by("id", "desc");
		$datas = $this->db->get()->result();
		foreach($datas as $k=> $rows)
        {
            $data[]= array(
                $k+1,
                $rows->ip_address,
                $rows->browser.'('.$rows->version.')',
                $rows->platform,
                date('d/m/Y h:i A',$rows->login_time),
                ($rows->logout_time>0)?date('d/m/Y h:i A',$rows->logout_time):'--'
            );     
        }
		$output = array(
            "data" => $data
        );
        return json_encode($output);		
	}
	
	public function getUsers($role_id,$search=[],$search_user,$from='',$to='')
	{	
          
           //echo $from;
		$this->db->select('users.login_id as user_login_id,users.role_ids,users.status,users.is_admin_verified,user_profiles.*,location_countries.name as country,location_states.name as state,location_cities.name as city,projects.project_name as p_name');
		$this->db->from('users');
		//$this->db->where("(NOT find_in_set('2',role_ids) <> 0) && (NOT find_in_set('3',role_ids) <> 0)");
		$this->db->where("users.deleted",'0');
		if(!empty($role_id)){
                    $this->db->where("users.role_ids",$role_id);
                    
                }
		$this->db->where("users.role_ids!=",'1');
		
		$this->db->join('user_profiles', 'users.id = user_profiles.user_id' , 'LEFT');
		//$this->db->join('roles', 'roles.id = users.role_ids' , 'LEFT');
		$this->db->join('location_countries', 'location_countries.id = user_profiles.country_id' , 'LEFT');
		$this->db->join('location_states', 'location_states.id = user_profiles.state_id' , 'LEFT');
		$this->db->join('location_cities', 'location_cities.id = user_profiles.city_id' , 'LEFT');
		
		$this->db->join('projects', 'projects.id = user_profiles.p_id' , 'LEFT');
		//$this->db->join('location_states as c_states', 'c_states.id = user_profiles.company_state_id' , 'LEFT');
		//$this->db->join('location_cities as c_cities', 'c_cities.id = user_profiles.company_city_id' , 'LEFT');
                
		
		
		
		//$this->db->where("user_profiles.is_main",'1');
		$this->db->order_by("users.id", "desc");
		$query = $this->db->get()->result();
		//echo $this->db->last_query();
		return $query;
	}
	
	public function userStatusChange($id)
	{
		$this->db->select('users.*');
		$this->db->from('users');
		$this->db->where("users.id",$id);
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
		return $this->db->update("users");	
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
       
	public function saveUser($post,$post1,$post2){
		
		$res = $this->db->insert('users', $post);
                //echo $this->db->last_query();
                //die();
		$user_id = $this->db->insert_id();
		
		$post1['user_id']=$user_id;		
		$post2['user_id']=$user_id;
		
		$this->db->insert('user_profiles', $post1);
                
		$this->db->insert('user_settings', $post2);
		
		return $user_id;
	}
        
        public function saveClient($post,$post1,$post2){
		
		$res = $this->db->insert('users', $post);
                //echo $this->db->last_query();
                //die();
		$user_id = $this->db->insert_id();
		
		$post1['user_id']=$user_id;		
		$post2['user_id']=$user_id;
		
		$this->db->insert('user_profiles', $post1);
                
		$this->db->insert('user_settings', $post2);
		
		return $user_id;
	}
	public function updateUserDetails($post,$post1,$user_id){
		
		$this->db->where('id', $user_id);
		$res = $this->db->update('users', $post);
		
		$post1['modifiedBy'] =$this->session->userdata('user_id');
		$this->db->where('user_id', $user_id);
		$res2 = $this->db->update('user_profiles', $post1);
		
		$post2['modifiedBy'] =$this->session->userdata('user_id');
		$this->db->where('user_id', $user_id);
		$res3 = $this->db->update('user_settings', $post2);
		
		//pr($this->db->last_query());
		
		return $res3;
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
	public function changePasswordTemporary($password,$user_id)
	{
		//$newPassword = md5($password);		
		$this->db->set("password", $password);
		$this->db->set("is_first_login", '0');
		$this->db->where("id", $user_id);
		$res = $this->db->update("users"); 
		//echo $this->db->last_query();
		return $res;
	} 
	
	public function languageList()
	{
		$this->db->select('*');
		$this->db->from('languages');
		$this->db->where("languages.deleted","0");
		$this->db->where("languages.status","1");
		$this->db->order_by("name", "asc");
		$datas = $this->db->get()->result();
		return $datas;
	}
	
	public function employeeList($user_id)
	{
		$this->db->select('users.login_id as user_login_id,users.role_ids,users.status,users.ip_address,users.device_id,user_profiles.id as user_profile_id,user_profiles.*');
		$this->db->from('users');
		$this->db->where("users.parent_id",$user_id);
		$this->db->join('user_profiles', 'users.id = user_profiles.user_id' , 'LEFT');
		$this->db->where("user_profiles.is_main",'1');
		$query = $this->db->get()->result();		
		return $query;
	}
         public function StaffCategoryList()
	{
		$data= array();
		$this->db->select('project_work_category.*');
		$this->db->from('project_work_category');
		$this->db->where("project_work_category.deleted","0");
		$this->db->order_by("id", "asc");
		return $datas = $this->db->get()->result();
				
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
}