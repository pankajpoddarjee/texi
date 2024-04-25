<?php

class Content_model extends CI_Model {

    public function __construct() {		
		parent::__construct();
    }
	
	public function saveContent($post,$id=""){
		if(!empty($id)){
			$this->db->where('id', $id);
			$res = $this->db->update('contents', $post);
		}else{
			$res = $this->db->insert('contents', $post);
		}
		return $res;
	}
	
	public function getContentDetails($id){
		$this->db->select('contents.*');
		$this->db->from('contents');
		$this->db->where("contents.deleted","0");
		$this->db->where("contents.id",$id);
		$this->db->order_by("id", "desc");
		$data = $this->db->get()->row();
		return $data;
	} 
	public function getContents()
	{
		$data= array();
		$this->db->select('contents.*');
		$this->db->from('contents');
		$this->db->where("contents.deleted","0");
		$this->db->order_by("id", "desc");
		return $datas = $this->db->get()->result();
				
	}
	public function contentStatusChange($id)
	{
		$this->db->select('contents.*');
		$this->db->from('contents');
		$this->db->where("contents.id",$id);
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
		return $this->db->update("contents");	
	}
	public function contentRemove($id)
	{
		$this->db->set("status", '0');
		$this->db->set("deleted", '1');
		$this->db->set("modifiedBy", $this->session->userdata('user_id'));
		$this->db->where("id", $id);
		return $this->db->update("contents");	
	}
        
    public function save_content($values)
    {
        foreach($values as $key=>$value)
        {
			$this->db->select('dynamic_contents.value ');
			$this->db->from('dynamic_contents');
			$this->db->where("dynamic_contents.name", $key);
			$this->db->order_by("dynamic_contents.id", "asc");
			$query = $this->db->get()->row();
			
			//pr($key.'---'.$value);
            //if the key currently exists, update the setting
            if(!empty($query))
            {
                $update = array('value'=>$value);
                $this->db->where('name',$key);
                $res = $this->db->update('dynamic_contents', $update);				
            }
            //if the key does not exist, add it
            else
            {
                $insert = array('name'=>$key, 'value'=>$value, 'addedOn'=>gmdate('Y-m-d H:i:s'));
                $res = $this->db->insert('dynamic_contents', $insert);
            }
			//echo $this->db->last_query().'<br>';			
        }
		
		return $res;
		
    }
    public function about_us($values)
    {
        foreach($values as $key=>$value)
        {
			$this->db->select('dynamic_contents.value ');
			$this->db->from('dynamic_contents');
			$this->db->where("dynamic_contents.name", $key);
			$this->db->order_by("dynamic_contents.id", "asc");
			$query = $this->db->get()->row();
			
			//pr($key.'---'.$value);
            //if the key currently exists, update the setting
            if(!empty($query))
            {
                $update = array('value'=>$value);
                $this->db->where('name',$key);
                $res = $this->db->update('dynamic_contents', $update);				
            }
            //if the key does not exist, add it
            else
            {
                $insert = array('name'=>$key, 'value'=>$value, 'addedOn'=>gmdate('Y-m-d H:i:s'));
                $res = $this->db->insert('dynamic_contents', $insert);
            }
			//echo $this->db->last_query().'<br>';			
        }
		
		return $res;
		
    }
    
      public function member($values)
    {
        foreach($values as $key=>$value)
        {
			$this->db->select('dynamic_contents.value ');
			$this->db->from('dynamic_contents');
			$this->db->where("dynamic_contents.name", $key);
			$this->db->order_by("dynamic_contents.id", "asc");
			$query = $this->db->get()->row();
			
			//pr($key.'---'.$value);
            //if the key currently exists, update the setting
            if(!empty($query))
            {
                $update = array('value'=>$value);
                $this->db->where('name',$key);
                $res = $this->db->update('dynamic_contents', $update);				
            }
            //if the key does not exist, add it
            else
            {
                $insert = array('name'=>$key, 'value'=>$value, 'addedOn'=>gmdate('Y-m-d H:i:s'));
                $res = $this->db->insert('dynamic_contents', $insert);
            }
			//echo $this->db->last_query().'<br>';			
        }
		
		return $res;
		
    }
	
	
}
?>
