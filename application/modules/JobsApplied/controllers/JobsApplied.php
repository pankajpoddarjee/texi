<?php defined('BASEPATH') or exit('No direct script access allowed');

class JobsApplied extends BackendController
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
		$this->load->model('JobApplied_model');		
    }

	
    public function listing()
    {
		authenticate();		
		$data['header']['site_title'] = 'Job Applied List';			
		$data['datas'] = $this->JobApplied_model->getJobs_applied();
		$this->render('admin/listing', $data);
		
    }
	
    public function statusChange($id)
    {
		//authenticate();	
		$id= base64_decode($id);
		$result = $this->JobApplied_model->jobsStatusChange($id);
		if(!empty($result)){
			$this->session->set_flashdata('success_msg', 'Successfully Updated');							
		}else{
			$this->session->set_flashdata('error_msg', 'Updation Unsuccessful');				
		}
		redirect('JobsApplied/listing');
    }
	
    public function remove($id){
		$result = $this->JobApplied_model->JobsAppliedRemove($id);
		return $result;
	}	
}
