<?php

class Register_model extends CI_Model {

    public function __construct() {		
		parent::__construct();
    }
	
	
	public function getRegisters_applied()
	{
		$this->db->select('registrations.*');
		$this->db->from('registrations');
		$this->db->where("registrations.deleted","0");
		$this->db->order_by("id", "desc");
		return $datas = $this->db->get()->result();
				
	} 
	public function RegistersStatusChange($id)
	{
                $digits = 5;
                
                
		$this->db->select('registrations.*');
		$this->db->from('registrations');
		$this->db->where("registrations.id",$id);
		$data = $this->db->get()->row();
                $pass = $data->fname.'_'.rand(pow(10, $digits-1), pow(10, $digits)-1);
                $password = md5($pass);
              
                $username= trim($data->fname);
                if($data->status=='0')
		{
			$this->db->set("status", '1');
                        $this->db->set("password", $password);
                        $this->db->set("username", $username);
                        
                        $this->email->set_mailtype("html");
                        $this->email->set_newline("\r\n");
                       
                        $email_temp = get_email_template('registered_member');
                        $msg = str_replace("[var.member_name]",$data->fname,$email_temp->content);
                        $msg = str_replace("[var.username]",$data->fname,$msg);
                        $msg = str_replace("[var.password]",$pass,$msg);
                        //$msg = str_replace("[var.system_name]",get_settings_value('system_name'),$msg);
                        //$to='raviraok1986@gmail.com';
                        $to = $data->email;
                        $this->email->to($to,$post['fname']);
                        $this->email->from($email_temp->email_from);
                        $this->email->subject($email_temp->email_subject);
                        $this->email->message($msg);
                        $this->email->send();
		}
		else
		{
			$this->db->set("status", '0');
		}
		$this->db->where("id", $id);
		return $this->db->update("registrations");	
	}
	public function RegistersRemove($id)
	{
		$this->db->set("status", '0');
		$this->db->set("deleted", '1');
		$this->db->set("modifiedBy", $this->session->userdata('user_id'));
		$this->db->where("id", $id);
		return $this->db->update("registrations");	
	}
	
	
}
?>
