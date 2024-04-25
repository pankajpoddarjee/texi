<?php defined('BASEPATH') or exit('No direct script access allowed');

class Jobs extends BackendController
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
		$this->load->model('Job_model');		
    }

	
    public function listing($uid='')
    {
		authenticate();	
                $id = base64_decode($uid);
		$data['header']['site_title'] = 'Job List';			
		$data['datas'] = $this->Job_model->getJobs($id);
		$this->render('admin/listing', $data);
		
    }
	
    public function statusChange($id)
    {
		//authenticate();	
		$id= base64_decode($id);
		$result = $this->Job_model->bannerStatusChange($id);
		if(!empty($result)){
			$this->session->set_flashdata('success_msg', 'Successfully Updated');							
		}else{
			$this->session->set_flashdata('error_msg', 'Updation Unsuccessful');				
		}
		redirect('Jobs/listing');
    }
	
	public function remove($id){
		$result = $this->Job_model->JobsRemove($id);
		return $result;
	}
	
	
}
