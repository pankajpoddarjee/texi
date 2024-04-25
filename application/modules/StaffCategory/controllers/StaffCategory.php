<?php defined('BASEPATH') or exit('No direct script access allowed');

class StaffCategory extends BackendController
{
    //
    public $CI;

    /**
     * An array of variables to be passed through to the
     * view, layout,....
     */
    protected $data = array();

    /**
     * [__construct description]
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct();
		$this->load->model('StaffCategory_model');		
    }

	public function save($id=''){
               if($this->input->post()){
			
                        $post['category_name'] =$this->input->post('category_name');
			
			//*****************************************	
			
			if(!empty($id)){
				$post['modifiedBy'] =$this->session->userdata('user_id');
			}else{
				$post['addedBy'] =$this->session->userdata('user_id');
				$post['addedOn'] =gmdate('Y-m-d H:i:s');
			}
			$result = $this->StaffCategory_model->saveStaffCategory($post,$id);
			if(!empty($result)){
				$this->session->set_flashdata('success_msg', 'Successfully Updated');							
			}else{
				$this->session->set_flashdata('error_msg', 'Updation Unsuccessful');				
			}
			redirect('StaffCategory/listing');
		} 
	}
    public function listing()
    {
		authenticate();	
                
		$data['header']['site_title'] = 'Category List';			
		$data['datas'] = $this->StaffCategory_model->getStaffCategory();
                $this->render('admin/listing', $data);
		
    }
	
    public function statusChange($id)
    {
		//authenticate();	
		$id= base64_decode($id);
		$result = $this->StaffCategory_model->projectcategoryStatusChange($id);
		if(!empty($result)){
			$this->session->set_flashdata('success_msg', 'Successfully Updated');							
		}else{
			$this->session->set_flashdata('error_msg', 'Updation Unsuccessful');				
		}
		redirect('StaffCategory/listing');
    }
	
	public function remove($id){
		$result = $this->StaffCategory_model->projectcategoryRemove($id);
		return $result;
	}
	
	
}
