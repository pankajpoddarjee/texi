<?php

class Contact_model extends CI_Model {

    public function __construct() {		
		parent::__construct();
    }
	
	
	public function getContacts_applied()
	{
		$this->db->select('apply_contactus.*');
		$this->db->from('apply_contactus');
		$this->db->where("apply_contactus.deleted","0");
		$this->db->order_by("id", "desc");
		return $datas = $this->db->get()->result();
				
	} 
	public function ContactsStatusChange($id)
	{
		$this->db->select('apply_contactus.*');
		$this->db->from('apply_contactus');
		$this->db->where("apply_contactus.id",$id);
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
	public function ContactsRemove($id)
	{
		$this->db->set("status", '0');
		$this->db->set("deleted", '1');
		$this->db->set("modifiedBy", $this->session->userdata('user_id'));
		$this->db->where("id", $id);
		return $this->db->update("apply_contactus");	
	}
	
	
}
?>
