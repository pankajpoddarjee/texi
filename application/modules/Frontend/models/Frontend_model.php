<?php

class Frontend_model extends CI_Model {

    public function __construct() {		
		parent::__construct();
    }
	
    public function getVehicleDetails()
    {
      $res = array();
      $this->db->select('*');
      $this->db->from('vehicles');
      $this->db->where("deleted","0");
      $this->db->where("status","1");
      $this->db->order_by("id", "desc");
      $datas = $this->db->get()->result();
                 
      if(!empty($datas)){
        foreach($datas as $k=>$data){
        $res[$k]= $data;
        
        }
      }
      return $res;
          
    }
	
        
}
?>
