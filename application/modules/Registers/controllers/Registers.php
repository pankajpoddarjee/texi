<?php defined('BASEPATH') or exit('No direct script access allowed');

class Registers extends BackendController
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
		$this->load->model('Register_model');		
    }

	
    public function listing()
    {
		authenticate();		
		$data['header']['site_title'] = 'Registered Listing';			
		$data['datas'] = $this->Register_model->getRegisters_applied();
		$this->render('admin/listing', $data);
		
    }
	
    public function statusChange($id)
    {
		//authenticate();	
		$id= base64_decode($id);
		$result = $this->Register_model->RegistersStatusChange($id);
		if(!empty($result)){
			$this->session->set_flashdata('success_msg', 'Successfully Updated');	
                        
		}else{
			$this->session->set_flashdata('error_msg', 'Updation Unsuccessful');				
		}
		redirect('Registers/listing');
    }
	
    public function remove($id){
		$result = $this->Register_model->RegistersRemove($id);
		return $result;
	}	
}
