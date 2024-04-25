<?php

class JobApplied_model extends CI_Model {

    public function __construct() {		
		parent::__construct();
    }
	
	
	public function getJobs_applied()
	{
		$this->db->select('apply_jobs.*');
		$this->db->from('apply_jobs');
		$this->db->where("apply_jobs.deleted","0");
		$this->db->order_by("id", "desc");
		return $datas = $this->db->get()->result();
				
	} 
	public function jobsStatusChange($id)
	{
		$this->db->select('apply_jobs.*');
		$this->db->from('apply_jobs');
		$this->db->where("apply_jobs.id",$id);
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
		return $this->db->update("jobs");	
	}
	public function JobsAppliedRemove($id)
	{
		$this->db->set("status", '0');
		$this->db->set("deleted", '1');
		$this->db->set("modifiedBy", $this->session->userdata('user_id'));
		$this->db->where("id", $id);
		return $this->db->update("apply_jobs");	
	}
	
	
}
?>
