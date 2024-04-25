<?php defined('BASEPATH') or exit('No direct script access allowed');

class Contents extends BackendController
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
		$this->load->model('Content_model');
		
		
    }

	public function save($id=''){		
		authenticate();	
		$this->content_images=realpath(APPPATH . '../assets/uploads/content_images/');		
		$result=array();
		
		if($this->input->post()){			
			$post['title'] =$this->input->post('title');
			$post['slug'] =!empty($this->input->post('slug'))?$this->input->post('slug'):url_title($this->input->post('title'), 'dash', TRUE);
			$post['description'] =$this->input->post('description');			
			$post['order_no'] =$this->input->post('order_no');			
			//$post['category_id'] =$this->input->post('category_id');			
			//$post['meta_title'] = $this->input->post('meta_title');		
			//$post['meta_key'] = $this->input->post('meta_key');	
			//$post['meta_description'] = $this->input->post('meta_description');
			
			if($_FILES['content_image']['name']!="")
			{
				$image=$this->input->post('image');
				if(!empty($image)){unlink($this->content_images.'/'.$image);}
				$value = $_FILES['content_image']['name'];
				//echo $value;
				
				$config1 = array(
						'file_name' => 'content_banner_'.date('Ymdhis'),
						'allowed_types' => 'png|jpg|jpeg|gif|ico|', //jpg|jpeg|gif|
						'upload_path' => $this->content_images,
						'max_size' => 20000
				);

				$this->upload->initialize($config1);
				if ( ! $this->upload->do_upload('content_image')) {
						 // return the error message and kill the script
						$this->session->set_flashdata('error_msg', $this->upload->display_errors());
						redirect('Contents/save/'.base64_encode($id));
				}
				$image_data = $this->upload->data();
				$image=$image_data['file_name'];
				$post['image'] = $image;
			}
			
			if(!empty($id)){
				$post['modifiedBy'] =$this->session->userdata('user_id');
			}else{
				$post['addedBy'] =$this->session->userdata('user_id');
				$post['addedOn'] =gmdate('Y-m-d H:i:s');
			}
			$result = $this->Content_model->saveContent($post,$id);
			if(!empty($result)){
				$this->session->set_flashdata('success_msg', 'Successfully Updated');							
			}else{
				$this->session->set_flashdata('error_msg', 'Updation Unsuccessful');				
			}
			redirect('Contents/listing');
		}
		
	}
    public function listing()
    {
		authenticate();
		$data['datas'] = $this->Content_model->getContents();
		$data['header']['site_title'] = 'Content List';
		$result=array();
		$this->render('admin/listing', $data);
    }
	
    public function statusChange($id)
    {
		//authenticate();	
		$id= base64_decode($id);
		$result = $this->Content_model->contentStatusChange($id);
		if(!empty($result)){
			$this->session->set_flashdata('success_msg', 'Successfully Updated');							
		}else{
			$this->session->set_flashdata('error_msg', 'Updation Unsuccessful');				
		}
		redirect('Contents/listing');
    }
	
public function remove($id){
        $result = $this->Content_model->contentRemove($id);
        return $return;
}
        
public function home_page(){
authenticate();			
$result=array();
$query = new stdClass();
$data['header']['site_title'] = 'Home Page Content';
$this->home_images=realpath(APPPATH . '../assets/uploads/home_images/');
if($this->input->post()){		

        $settings = array();
        //pr($_FILES); die;
        $settings = $this->input->post();
        //*************************************************				

                // For Purpose Image Upload Start

                if($_FILES['purpose_image']['name']!="")
                {
                        $purpose=$this->input->post('purpose_image');
                        if(!empty($purpose)){unlink($this->home_images.'/'.$purpose);}
                        $value = $_FILES['purpose_image']['name'];
                        //echo $value;

                        $config1 = array(
                                        'file_name' => 'purpose_image_'.date('Ymdhis'),
                                        'allowed_types' => 'png|jpg|jpeg|gif|ico|', //jpg|jpeg|gif|
                                        'upload_path' => $this->home_images,
                                        'max_size' => 20000
                        );

                        $this->upload->initialize($config1);
                        if ( ! $this->upload->do_upload('purpose_image')) {
                                         // return the error message and kill the script
                                        $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                                        redirect('Contents/home_page');
                        }
                        $image_data = $this->upload->data();
                        $purpose    = $image_data['file_name'];
                        $settings['purpose_image'] = $purpose;
                }				

                // For Purpose Image Upload End

                // For Vision Image Upload Start

                if($_FILES['vision_image']['name']!="")
                {
                        $vision=$this->input->post('vision_image');
                        if(!empty($vision)){unlink($this->home_images.'/'.$vision);}
                        $value = $_FILES['vision_image']['name'];
                        //echo $value;

                        $config2 = array(
                                        'file_name' => 'vision_image_'.date('Ymdhis'),
                                        'allowed_types' => 'png|jpg|jpeg|gif|ico|', //jpg|jpeg|gif|
                                        'upload_path' => $this->home_images,
                                        'max_size' => 20000
                        );

                        $this->upload->initialize($config2);
                        if ( ! $this->upload->do_upload('vision_image')) {
                                         // return the error message and kill the script
                                        $this->upload->display_errors(); //die();
                                        $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                                        redirect('Contents/home_page');
                        }
                        $image_data = $this->upload->data();
                        $vision=$image_data['file_name'];
                        $settings['vision_image'] = $vision;
                }
                
                if($_FILES['mission_image']['name']!="")
                {
                        $mission=$this->input->post('image');
                        if(!empty($mission_image)){unlink($this->home_images.'/'.$mission);}
                        $value = $_FILES['mission_image']['name'];
                        //echo $value;

                        $config3 = array(
                                        'file_name' => 'mission_image_'.date('Ymdhis'),
                                        'allowed_types' => 'png|jpg|jpeg|gif|ico|', //jpg|jpeg|gif|
                                        'upload_path' => $this->home_images,
                                        'max_size' => 20000
                        );

                        $this->upload->initialize($config3);
                        if ( ! $this->upload->do_upload('mission_image')) {
                                         // return the error message and kill the script
                                        $this->upload->display_errors(); //die();
                                        $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                                        redirect('Contents/home_page');
                        }
                        $image_data = $this->upload->data();
                        $mission=$image_data['file_name'];
                        $settings['mission_image'] = $mission;
                }
                
                if($_FILES['ceo_image']['name']!="")
                {
                        $ceo=$this->input->post('image');
                        if(!empty($ceo_image)){unlink($this->home_images.'/'.$ceo);}
                        $value = $_FILES['ceo_image']['name'];
                        //echo $value;

                        $config4 = array(
                                        'file_name' => 'ceo_image_'.date('Ymdhis'),
                                        'allowed_types' => 'png|jpg|jpeg|gif|ico|', //jpg|jpeg|gif|
                                        'upload_path' => $this->home_images,
                                        'max_size' => 20000
                        );

                        $this->upload->initialize($config4);
                        if ( ! $this->upload->do_upload('ceo_image')) {
                                         // return the error message and kill the script
                                        $this->upload->display_errors(); //die();
                                        $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                                        redirect('Contents/home_page');
                        }
                        $image_data = $this->upload->data();
                        $ceo=$image_data['file_name'];
                        $settings['ceo_image'] = $ceo;
                }
                if($_FILES['ceo_signature']['name']!="")
                {
                        $ceo_signature=$this->input->post('ceo_signature');
                        if(!empty($ceo_signature)){unlink($this->home_images.'/'.$ceo_image);}
                        $value = $_FILES['ceo_signature']['name'];
                        //echo $value;

                        $config5 = array(
                                        'file_name' => 'ceo_signature_'.date('Ymdhis'),
                                        'allowed_types' => 'png|jpg|jpeg|gif|ico|', //jpg|jpeg|gif|
                                        'upload_path' => $this->home_images,
                                        'max_size' => 20000
                        );

                        $this->upload->initialize($config5);
                        if ( ! $this->upload->do_upload('ceo_signature')) {
                                         // return the error message and kill the script
                                        $this->upload->display_errors(); //die();
                                        $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                                        redirect('Contents/home_page');
                        }
                        $image_data = $this->upload->data();
                        $ceo_signature=$image_data['file_name'];
                        $settings['ceo_signature'] = $ceo_signature;
                }

                // For Favicon Image Upload End

                //**************************************************

                //pr($settings); die;
                $res=$this->Content_model->save_content($settings);

                //die;
                if(!empty($res)){
                        $this->session->set_flashdata('success_msg', 'Successfully Updated');							
                }else{
                        $this->session->set_flashdata('error_msg', 'Updation unsuccessful');				
                }
        redirect('Contents/home_page');
}
		
		
    $this->render('admin/home_content', $data);  
}

public function about_us(){
authenticate();			
$result=array();
$query = new stdClass();
$data['header']['site_title'] = 'About Us Content';
$this->about_us=realpath(APPPATH . '../assets/uploads/about_us/');
if($this->input->post()){		

        $settings = array();
        //pr($_FILES); die;
        $settings = $this->input->post();
        //*************************************************				

                // For Purpose Image Upload Start

                if($_FILES['banner_image']['name']!="")
                {
                        $banner_image=$this->input->post('banner_image');
                        if(!empty($banner_image)){unlink($this->about_us.'/'.$banner_image);}
                        $value = $_FILES['banner_image']['name'];
                        //echo $value;

                        $config1 = array(
                                        'file_name' => 'banner_image'.date('Ymdhis'),
                                        'allowed_types' => 'png|jpg|jpeg|gif|ico|', //jpg|jpeg|gif|
                                        'upload_path' => $this->about_us,
                                        'max_size' => 20000
                        );

                        $this->upload->initialize($config1);
                        if ( ! $this->upload->do_upload('banner_image')) {
                                         // return the error message and kill the script
                                        $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                                        redirect('Contents/about_us');
                        }
                        $image_data = $this->upload->data();
                        $banner_image    = $image_data['file_name'];
                        $settings['banner_image'] = $banner_image;
                }				

                // For Purpose Image Upload End

                // For Vision Image Upload Start

                if($_FILES['section_1_image']['name']!="")
                {
                        $section_1_image=$this->input->post('section_1_image');
                        if(!empty($section_1_image)){unlink($this->about_us.'/'.$section_1_image);}
                        $section_1_image = $_FILES['section_1_image']['name'];
                        //echo $value;

                        $config2 = array(
                                        'file_name' => 'section_1_image_'.date('Ymdhis'),
                                        'allowed_types' => 'png|jpg|jpeg|gif|ico|', //jpg|jpeg|gif|
                                        'upload_path' => $this->about_us,
                                        'max_size' => 20000
                        );

                        $this->upload->initialize($config2);
                        if ( ! $this->upload->do_upload('section_1_image')) {
                                         // return the error message and kill the script
                                        $this->upload->display_errors(); //die();
                                        $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                                        redirect('Contents/about_us');
                        }
                        $image_data = $this->upload->data();
                        $section_1_image=$image_data['file_name'];
                        $settings['section_1_image'] = $section_1_image;
                }
                
                if($_FILES['about_ceo_image']['name']!="")
                {
                        $about_ceo_image=$this->input->post('about_ceo_image');
                        if(!empty($about_ceo_image)){unlink($this->about_us.'/'.$about_ceo_image);}
                        $value = $_FILES['about_ceo_image']['name'];
                        //echo $value;

                        $config3 = array(
                                        'file_name' => 'about_ceo_image_'.date('Ymdhis'),
                                        'allowed_types' => 'png|jpg|jpeg|gif|ico|', //jpg|jpeg|gif|
                                        'upload_path' => $this->about_us,
                                        'max_size' => 20000
                        );

                        $this->upload->initialize($config3);
                        if ( ! $this->upload->do_upload('about_ceo_image')) {
                                         // return the error message and kill the script
                                        $this->upload->display_errors(); //die();
                                        $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                                        redirect('Contents/about_us');
                        }
                        $image_data = $this->upload->data();
                        $about_ceo_image=$image_data['file_name'];
                        $settings['about_ceo_image'] = $about_ceo_image;
                }
                
                if($_FILES['team_1_image']['name']!="")
                {
                        $team_1_image=$this->input->post('team_1_image');
                        if(!empty($team_1_image)){unlink($this->about_us.'/'.$team_1_image);}
                        $value = $_FILES['team_1_image']['name'];
                        //echo $value;

                        $config4 = array(
                                        'file_name' => 'team_1_image_'.date('Ymdhis'),
                                        'allowed_types' => 'png|jpg|jpeg|gif|ico|', //jpg|jpeg|gif|
                                        'upload_path' => $this->about_us,
                                        'max_size' => 20000
                        );

                        $this->upload->initialize($config4);
                        if ( ! $this->upload->do_upload('team_1_image')) {
                                         // return the error message and kill the script
                                        $this->upload->display_errors(); //die();
                                        $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                                        redirect('Contents/about_us');
                        }
                        $image_data = $this->upload->data();
                        $team_1_image=$image_data['file_name'];
                        $settings['team_1_image'] = $team_1_image;
                }
                if($_FILES['team_2_image']['name']!="")
                {
                        $team_2_image=$this->input->post('team_2_image');
                        if(!empty($team_2_image)){unlink($this->about_us.'/'.$team_2_image);}
                        $value = $_FILES['team_2_image']['name'];
                        //echo $value;

                        $config5 = array(
                                        'file_name' => 'team_2_image_'.date('Ymdhis'),
                                        'allowed_types' => 'png|jpg|jpeg|gif|ico|', //jpg|jpeg|gif|
                                        'upload_path' => $this->about_us,
                                        'max_size' => 20000
                        );

                        $this->upload->initialize($config5);
                        if ( ! $this->upload->do_upload('team_2_image')) {
                                         // return the error message and kill the script
                                        $this->upload->display_errors(); //die();
                                        $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                                        redirect('Contents/about_us');
                        }
                        $image_data = $this->upload->data();
                        $team_2_image=$image_data['file_name'];
                        $settings['team_2_image'] = $team_2_image;
                }

               

                //**************************************************

                //pr($settings); die;
                $res=$this->Content_model->about_us($settings);

                //die;
                if(!empty($res)){
                        $this->session->set_flashdata('success_msg', 'Successfully Updated');							
                }else{
                        $this->session->set_flashdata('error_msg', 'Updation unsuccessful');				
                }
        redirect('Contents/about_us');
}
		
		
    $this->render('admin/about_us', $data);  
}

public function opportunities(){
authenticate();			
$result=array();
$query = new stdClass();
$data['header']['site_title'] = 'Opportunities';
$this->opportunities=realpath(APPPATH . '../assets/uploads/opportunities/');
if($this->input->post()){		

        $settings = array();
        //pr($_FILES); die;
        $settings = $this->input->post();
        //*************************************************				

                // For Purpose Image Upload Start

                if($_FILES['opportunities_banner_image']['name']!="")
                {
                        $banner_image=$this->input->post('opportunities_banner_image');
                        if(!empty($banner_image)){unlink($this->opportunities.'/'.$banner_image);}
                        $value = $_FILES['opportunities_banner_image']['name'];
                        //echo $value;

                        $config1 = array(
                                        'file_name' => 'opportunities_banner_image'.date('Ymdhis'),
                                        'allowed_types' => 'png|jpg|jpeg|gif|ico|', //jpg|jpeg|gif|
                                        'upload_path' => $this->opportunities,
                                        'max_size' => 20000
                        );

                        $this->upload->initialize($config1);
                        if ( ! $this->upload->do_upload('opportunities_banner_image')) {
                                         // return the error message and kill the script
                                        $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                                        redirect('Contents/opportunities');
                        }
                        $image_data = $this->upload->data();
                        $banner_image    = $image_data['file_name'];
                        $settings['opportunities_banner_image'] = $banner_image;
                }				

                // For Purpose Image Upload End

                // For Vision Image Upload Start

                if($_FILES['featured_image']['name']!="")
                {
                        $featured_image=$this->input->post('featured_image');
                        if(!empty($featured_image)){unlink($this->opportunities.'/'.$featured_image);}
                        $featured_image = $_FILES['featured_image']['name'];
                        //echo $value;

                        $config2 = array(
                                        'file_name' => 'featured_image_'.date('Ymdhis'),
                                        'allowed_types' => 'png|jpg|jpeg|gif|ico|', //jpg|jpeg|gif|
                                        'upload_path' => $this->opportunities,
                                        'max_size' => 20000
                        );

                        $this->upload->initialize($config2);
                        if ( ! $this->upload->do_upload('featured_image')) {
                                         // return the error message and kill the script
                                        $this->upload->display_errors(); //die();
                                        $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                                        redirect('Contents/opportunities');
                        }
                        $image_data = $this->upload->data();
                        $featured_1_image=$image_data['file_name'];
                        $settings['featured_image'] = $featured_1_image;
                }
                
                //**************************************************

                //pr($settings); die;
                $res=$this->Content_model->about_us($settings);

                //die;
                if(!empty($res)){
                        $this->session->set_flashdata('success_msg', 'Successfully Updated');							
                }else{
                        $this->session->set_flashdata('error_msg', 'Updation unsuccessful');				
                }
        redirect('Contents/opportunities');
}
		
		
    $this->render('admin/opportunities', $data);  
}

public function contacts(){
authenticate();			
$result=array();
$query = new stdClass();
$data['header']['site_title'] = 'Contact Us';
$this->opportunities=realpath(APPPATH . '../assets/uploads/opportunities/');
if($this->input->post()){		

        $settings = array();
        //pr($_FILES); die;
        $settings = $this->input->post();
        //*************************************************				

                // For Purpose Image Upload Start

                if($_FILES['contact_banner_image']['name']!="")
                {
                        $banner_image=$this->input->post('contact_banner_image');
                        if(!empty($banner_image)){unlink($this->opportunities.'/'.$banner_image);}
                        $value = $_FILES['contact_banner_image']['name'];
                        //echo $value;

                        $config1 = array(
                                        'file_name' => 'contact_banner_image_'.date('Ymdhis'),
                                        'allowed_types' => 'png|jpg|jpeg|gif|ico|', //jpg|jpeg|gif|
                                        'upload_path' => $this->opportunities,
                                        'max_size' => 20000
                        );

                        $this->upload->initialize($config1);
                        if ( ! $this->upload->do_upload('contact_banner_image')) {
                                         // return the error message and kill the script
                                        $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                                        redirect('Contents/contacts');
                        }
                        $image_data = $this->upload->data();
                        $banner_image    = $image_data['file_name'];
                        $settings['contact_banner_image'] = $banner_image;
                }				
                //pr($settings); die;
                $res=$this->Content_model->about_us($settings);

                //die;
                if(!empty($res)){
                        $this->session->set_flashdata('success_msg', 'Successfully Updated');							
                }else{
                        $this->session->set_flashdata('error_msg', 'Updation unsuccessful');				
                }
        redirect('Contents/contacts');
}
		
		
    $this->render('admin/contact-us', $data);  
}
public function member(){
authenticate();			
$result=array();
$query = new stdClass();
$data['header']['site_title'] = 'Member Content';
$this->member_images=realpath(APPPATH . '../assets/uploads/member_images/');
if($this->input->post()){		

        $settings = array();
        //pr($_FILES); die;
        $settings = $this->input->post();
        //*************************************************				

                // For Purpose Image Upload Start

                if($_FILES['member_cms_image']['name']!="")
                {
                        $member_cms_image=$this->input->post('member_cms_image');
                        if(!empty($member_cms_image)){unlink($this->member_images.'/'.$member_cms_image);}
                        $value = $_FILES['member_cms_image']['name'];
                        //echo $value;
                        //die();
                        $config1 = array(
                                        'file_name' => 'member_cms_image_'.date('Ymdhis'),
                                        'allowed_types' => 'png|jpg|jpeg|gif|ico|', //jpg|jpeg|gif|
                                        'upload_path' => $this->member_images,
                                        'max_size' => 20000
                        );

                        $this->upload->initialize($config1);
                        if ( ! $this->upload->do_upload('member_cms_image')) {
                                         // return the error message and kill the script
                                        $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                                        redirect('Contents/member');
                        }
                        $image_data = $this->upload->data();
                        $member_cms_image    = $image_data['file_name'];
                        $settings['member_cms_image'] = $member_cms_image;
                }				

                //**************************************************

                //pr($settings); die;
                $res=$this->Content_model->member($settings);

                //die;
                if(!empty($res)){
                        $this->session->set_flashdata('success_msg', 'Successfully Updated');							
                }else{
                        $this->session->set_flashdata('error_msg', 'Updation unsuccessful');				
                }
        redirect('Contents/member');
}
		
		
    $this->render('admin/member_content', $data);  
}	
		
}
