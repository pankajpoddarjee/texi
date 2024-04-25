<?php

class Vehicle_model extends CI_Model {

    public function __construct() {		
		parent::__construct();
    }
	
	public function saveType($post,$id=""){
            if(!empty($id)){
			$this->db->where('id', $id);
			$res = $this->db->update('vehicles_type', $post);
		}else{
			$res = $this->db->insert('vehicles_type', $post);
		}
                //echo $this->db->last_query();die();
		return $res;
	}

	public function saveVehicle($post){
	$res = $this->db->insert('vehicles', $post);
		$user_id = $this->db->insert_id();
		return $user_id;
	}

	public function updateVehicleDetails($post,$user_id){
		
		$this->db->where('id', $user_id);
		$res = $this->db->update('vehicles', $post);
		//pr($this->db->last_query());
		
		return $res;
	}
        
	public function getVehiclesTypeDetails($id){
		$this->db->select('vehicles.*');
		$this->db->from('vehicles');
		$this->db->where("vehicles.deleted","0");
		$this->db->where("vehicles.id",$id);
		$this->db->order_by("id", "desc");
		$data = $this->db->get()->row();
		return $data;
	} 
	public function getTypes()
	{
		$this->db->select('vehicles_type.*');
                $this->db->from('vehicles_type');
		$this->db->where("vehicles_type.deleted","0");
		$this->db->order_by("id", "desc");
                return $datas = $this->db->get()->result();
				
	} 
	public function getVehicles()
	{
		$this->db->select('vehicles.*');
                $this->db->from('vehicles');
		$this->db->where("vehicles.deleted","0");
		$this->db->order_by("id", "desc");
                return $datas = $this->db->get()->result();
				
	} 
	public function VehiclesTypeStatusChange($id)
	{
		$this->db->select('vehicles_type.*');
		$this->db->from('vehicles_type');
		$this->db->where("vehicles_type.id",$id);
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
		return $this->db->update("vehicles_type");	
	}

	public function VehiclesStatusChange($id)
	{
		$this->db->select('vehicles.*');
		$this->db->from('vehicles');
		$this->db->where("vehicles.id",$id);
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
		return $this->db->update("vehicles");	
	}
	public function staff_categoryRemove($id)
	{
		$this->db->set("status", '0');
		$this->db->set("deleted", '1');
		$this->db->set("modifiedBy", $this->session->userdata('user_id'));
		$this->db->where("id", $id);
		return $this->db->update("staff_category");	
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

