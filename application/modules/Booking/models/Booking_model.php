<?php

class Booking_model extends CI_Model {

    public function __construct() {		
		parent::__construct();
    }
	
	
	public function getBooking()
	{
		$this->db->select('booking.*');
                $this->db->from('booking');
		$this->db->order_by("booking_id", "desc");
                return $datas = $this->db->get()->result();
				
	} 
	
}

