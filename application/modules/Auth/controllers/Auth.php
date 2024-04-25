<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends BackendController
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
		$this->load->model('Auth_model');	
		$config = array(
                'protocol'  => 'smtp',
                'smtp_host' => 'mail.sos-development.com.au',
                'smtp_port' => 465,
                'smtp_user' => 'no-reply@sos-development.com.au',
                'smtp_pass' => 'Password!@#123',
                'mailtype'  => 'html',
                'charset'   => 'utf-8'
			);
				
		$this->load->library('email', $config);		
    }

   
    public function index()
    {
		if(!empty($this->session->userdata("user_id"))){
			$id=base64_encode($this->session->userdata("user_id"));
			redirect('Auth/dashboard');
		}
		$data['site_title'] = get_settings_value('system_name');
		$result=array();
		if($this->input->post()){
			//echo '<pre>';print_r($this->input->post());
			$post['login_id'] =$this->input->post('login_id');
			$post['password'] = md5($this->input->post('password'));
			
			//pr($post);die;
			
			$checkUser=$this->Auth_model->checkUser($post);
			if ($this->Auth_model->is_max_login_attempts_exceeded($post['login_id']))
			{
				$this->session->set_flashdata('error_msg', 'Temporarily Locked Out.  Try again later.');
				redirect('Auth');
			}
			if($checkUser->status=='0')
			{
				$this->session->set_flashdata('error_msg', 'Account Blocked.  Contact with Admin please.');
				redirect('Auth');
			}
			if(!empty($checkUser)){
				$res=$this->Auth_model->getUserLoginData($checkUser->id);
				
				
				
				
				// Lockout Function
				if($this->Auth_model->is_max_login_attempts_exceeded($res->login_id))
				{
					$this->session->set_flashdata('error_msg', 'Temporarily Locked Out.  Try again later.');
					redirect('Auth');
				}
				$this->Auth_model->clear_login_attempts($res->login_id);
				$MAC = exec('getmac');  
				// Storing 'getmac' value in $MAC 
				$MAC = strtok($MAC, ' ');
				
				$login['session_id'] = session_id();
				$login['user_email'] = $res->login_id;
				$login['ip_address'] = $this->input->ip_address();
				$login['login_time'] = time();
				$login['user_agent'] = $this->agent->agent_string();
				$login['browser'] = $this->agent->browser();
				$login['version'] = $this->agent->version();
				$login['platform'] = $this->agent->platform();
				$login['mac_id'] = $MAC;
				
				//pr($login);die;
				$this->Auth_model->save_login_records($login);
				
				$user_id=base64_encode($res->id);
				if($res->multifactor_authenticate=='1'){
					if($res->authenticate_using_google=='1'){							
						redirect('Auth/authenticate/'.$user_id);
					}
				}else{
					$this->session->set_flashdata('success_msg', 'Login Successful');
					if ($this->agent->is_referral())
					{
						redirect($this->agent->referrer());
					}else{
						redirect('Auth/dashboard');
					}
				}
			}else{
				$this->Auth_model->increase_login_attempts($post['login_id']);
				$this->session->set_flashdata('error_msg', 'Wrong Authentication!!');
				redirect('Auth');	
			}			
		}
		
		$this->load->view('admin/login', $data);   
    }
	
	public function authenticate($user_id)
    {
		$data['site_title'] = 'Google Authenticate';
		$id=base64_decode($user_id);
		$res=$this->Auth_model->getUserLoginData($id);
		$system_name = get_settings_value('system_name');
		$secret=$res->google_auth_code;
		$qrCodeUrl = $this->googleauthenticator->getQRCodeGoogleUrl($system_name, $res->login_id, $secret);
		$data['qrCode'] = $qrCodeUrl;
		//echo '<pre>';print_r($res);die;
		if(!empty($res)){
			$data['details'] = $res;
			if($this->input->post()){
				$code = $this->input->post('code');
				$checkResult = $this->googleauthenticator->verifyCode($secret, $code, 2); // 2 = 2*30sec clock tolerance

				if ($checkResult) {
					$this->session->set_flashdata('success_msg', 'Login Successful');
					if ($this->agent->is_referral())
					{
						redirect($this->agent->referrer());
					}else{
						redirect('Auth/dashboard');
					}
				} else {
					$this->session->set_flashdata('error_msg', 'Wrong Code!!');
					redirect('Auth/authenticate/'.$user_id);
				}
			}			
		}else{
			$this->session->set_flashdata('error_msg', 'User not available');
			redirect('Auth');
		}
		
		$this->load->view('admin/authenticate', $data);   
	}
	public function logout()
	{
		$login['logout_time'] = time();
		$this->Auth_model->save_login_records($login);
					
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_role_ids');
		$this->session->unset_userdata('user_role');
		$this->session->unset_userdata('user_login_id');
		$this->session->unset_userdata('user_fname');
		$this->session->unset_userdata('user_lname');
		$this->session->unset_userdata('user_image');
		$this->session->unset_userdata('user_time_zone');
		$this->session->unset_userdata('login_id');
		
		$this->session->sess_destroy();
		redirect('Auth');
	}
	public function dashboard()
        {
		authenticate();
		$data['header']['site_title'] = 'Dashboard';
		//$user_id = base64_encode($this->session->userdata("user_id"));
                //pr($data['order_products']);die;
                //$data['total_projects'] = $this->Auth_model->getAllprojectCount();
                //$data['total_running_projects'] = $this->Auth_model->getAllRunningProjectCount();
                //$data['total_completed_projects'] = $this->Auth_model->getAllCompletedProjectCount();
                //$data['total_employee_count'] = $this->Auth_model->getAllEmployeeCount(2);
                //$data['total_staff_count'] = $this->Auth_model->getAllEmployeeCount(3);
                $getProjectData=$this->Auth_model->getProjectsAsigned();
                foreach ($getProjectData as $key => $value) 
                {
                    $data['data'][$key]['title'] = $value->fname;
                    $data['data'][$key]['start'] = $value->start_date;
                    //$data['data'][$key]['end'] = $value->end_date;
                    $data['data'][$key]['backgroundColor'] = "#00a65a";
                    $data['data'][$key]['url'] = "Jobs/listing/".base64_encode($value->user_id);
                }   
                //$data['chart'] = $calander;
		$this->render('admin/dashboard', $data);   
	}
	public function forgot_password()
    {
		//$this->session->unset_userdata('forgot_otp');
		//$this->session->unset_userdata('forgot_user_id');
		$data['header']['site_title'] = get_settings_value('system_name').' Forgot Password';
		$result=array();
		if($this->input->post()){
			$post['login_id'] =$this->input->post('login_id');
			$checkUser=$this->Auth_model->checkUsername($post);
			if(!empty($checkUser)){
				$otp =substr( $this->googleauthenticator->createSecret(),0,6);	
				$this->session->set_userdata('forgot_otp',$otp);
				$this->session->set_userdata('forgot_user_id',$checkUser->id);
				//*******Email Sent to User*******//
				$this->email->set_mailtype("html");
				$this->email->set_newline("\r\n");
				
				$email_temp = get_email_template('user_forgot_password');
				$msg = $email_temp->content;
				$msg = str_replace("[var.pass_otp]",$otp,$msg);
				$msg = str_replace("[var.system_name]",get_settings_value('system_name'),$msg);
				
				
				$this->email->to($post['email']);
				$this->email->bcc('developer@gmail.com');
				$this->email->from($email_temp->email_from);
				$this->email->subject($email_temp->email_subject);
				$this->email->message($msg);
				$this->email->send();
				//*******************************//
				$this->session->set_flashdata('success_msg', 'Please check email for OTP!!');
			}else{				
				$this->session->set_flashdata('error_msg', 'Wrong Login Id!!');					
			}
			redirect('Auth/forgot_password');
		}
		
		$this->load->view('admin/forgot_password', $data);   
	}
	public function changeForgotEmail(){
		$this->session->unset_userdata('forgot_otp');
		$this->session->unset_userdata('forgot_user_id');
		redirect('Auth/forgot_password');
	}
	public function changePassword(){
		$user_id = $this->session->userdata("forgot_user_id");
		$profile = $this->Auth_model->getUserData($user_id);
		if(!empty($profile)){
			$data['profile']=$profile;
			if($this->input->post()){
				$verify_password = $this->input->post('verify_password');
				$new_password = $this->input->post('new_password');
				$otp = $this->input->post('otp');
				if($otp==$this->session->userdata("forgot_otp")){
					if($new_password==$verify_password){					
						$passwordChange = $this->Auth_model->changePassword($verify_password,$user_id);
						if($passwordChange==TRUE){
							$this->session->set_flashdata('success_msg', 'Password updated successfully');							
						}else{
							$this->session->set_flashdata('error_msg', 'Error! Password not changed!');
						}
						$this->session->unset_userdata('forgot_otp');
						$this->session->unset_userdata('forgot_user_id');
					}else{
						$this->session->set_flashdata('error_msg', 'Error! Verify Password is not same as New Password!');
					}
				}else{
					$this->session->set_flashdata('error_msg', 'Error! OTP not match!!');
				}				
				//die;	
				redirect('Auth/forgot_password');
			}			
		}else{
			$this->session->set_flashdata('error_msg', 'User not available');
			redirect('Auth/forgot_password');
		}		
	}
        
       
	
}
