<?php defined('BASEPATH') or exit('No direct script access allowed');

class Contacts extends BackendController
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
		$this->load->model('Contact_model');		
    }

	
    public function listing()
    {
		authenticate();		
		$data['header']['site_title'] = 'Contact List';			
		$data['datas'] = $this->Contact_model->getContacts_applied();
		$this->render('admin/listing', $data);
		
    }
	
    public function statusChange($id)
    {
		//authenticate();	
		$id= base64_decode($id);
		$result = $this->Contact_model->ContactsStatusChange($id);
		if(!empty($result)){
			$this->session->set_flashdata('success_msg', 'Successfully Updated');							
		}else{
			$this->session->set_flashdata('error_msg', 'Updation Unsuccessful');				
		}
		redirect('Contacts/listing');
    }
	
    public function remove($id){
		$result = $this->Contact_model->ContactsRemove($id);
		return $result;
	}	
}
