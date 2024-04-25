<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends BackendController {

    public $CI;
    protected $data = array();

    /**
     * [__construct description]
     *
     * @method __construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.sos-development.com.au',
            'smtp_port' => 465,
            'smtp_user' => 'no-reply@sos-development.com.au',
            'smtp_pass' => 'Demo!@123',
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );
        $this->load->library('email', $config);
        $this->load->library(array('form_validation', 'image_lib'));
    }

    public function index() {
        
    }

    public function profile() {
        authenticate();
        if (!empty($this->session->userdata('user_role_ids'))) {
            if ($this->session->userdata('user_role_ids') == '3') {
                redirect('Users/restaurant_profile');
            }
        }

        $this->user_images = realpath(APPPATH . '../assets/uploads/user_images/');
        $data['header']['site_title'] = 'Profile Information';
        $result = array();
        $user_id = $this->session->userdata("user_id");
        $profile = $this->User_model->getUserData($user_id);

        if (!empty($profile)) {
            $data['profile'] = $profile;
            $loginRecords = $this->User_model->getLoginRecords($profile->user_email);
            $data['loginRecords'] = $loginRecords;

            if ($this->input->post()) {

                $post['modifiedBy'] = $this->session->userdata('user_id');
                $post['fname'] = $this->input->post('fname');
                $post['lname'] = $this->input->post('lname');
                $post['dob'] = $this->input->post('dob');
                $post['gender'] = $this->input->post('gender');
                $post['about'] = $this->input->post('about');
                $post['store'] = $this->input->post('store');
                $post['phone_no'] = $this->input->post('phone_no');
                $post['phone_code'] = $this->input->post('phone_code');

                // For Profile Image Upload Start
                $image = $this->input->post('profile_image');
                if ($_FILES['profile_avatar']['name'] != "") {
                    if (!empty($image))
                        unlink($this->user_images . '/' . $image);
                    $value = $_FILES['profile_avatar']['name'];
                    //echo $value;

                    $config = array(
                        'file_name' => 'avatar_' . $user_id . '_' . date('Ymdhis'),
                        'allowed_types' => 'png|jpg|jpeg|gif|', //jpg|jpeg|gif|
                        'upload_path' => $this->user_images,
                        'max_size' => 20000
                    );

                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('profile_avatar')) {
                        // return the error message and kill the script
                        $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                        redirect('Users/profile');
                    }
                    $image_data = $this->upload->data();
                    $image = $image_data['file_name'];
                }
                $post['profile_image'] = $image;
                //*****************************************	

                $result = $this->User_model->updateUser($user_id, $post);

                //die;
                if (!empty($result)) {
                    $this->session->set_flashdata('success_msg', 'Successfully Updated');
                } else {
                    $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
                }
                redirect('Users/profile');
            }
        } else {
            $this->session->set_flashdata('error_msg', 'User not available');
            redirect('Users');
        }
        $this->render('admin/profile', $data);
    }

    public function account_settings() {
        authenticate();
        $this->user_images = realpath(APPPATH . '../assets/uploads/user_images/');
        $data['header']['site_title'] = 'Account Settings';
        $result = array();
        $system_name = get_settings_value('system_name');
        $user_id = $this->session->userdata("user_id");
        $profile = $this->User_model->getUserData($user_id);
        $languageList = $this->User_model->languageList();

        if (!empty($profile)) {
            $data['profile'] = $profile;
            $data['languageList'] = $languageList;
            //pr($profile);die;
            $secret = !empty($profile->settings->google_auth_code) ? $profile->settings->google_auth_code : $this->googleauthenticator->createSecret();
            $data['google_auth_code'] = $secret;
            ;
            $qrCodeUrl = $this->googleauthenticator->getQRCodeGoogleUrl($system_name, $profile->user_login_id, $secret);
            $data['qrCode'] = $qrCodeUrl;
            //print_r($profile).'---'.$qrCodeUrl;
            //die;
            if ($this->input->post()) {
                //pr($this->input->post()); die;

                $post['modifiedBy'] = $this->session->userdata('user_id');
                $post['time_zone'] = $this->input->post('time_zone');
                $post['language_id'] = $this->input->post('language_id');
                $post['multifactor_authenticate'] = !empty($this->input->post('multifactor_authenticate')) ? '1' : '0';
                $post['authenticate_using_otp'] = !empty($this->input->post('authenticate_using_otp')) ? '1' : '0';
                $post['authenticate_using_google'] = !empty($this->input->post('authenticate_using_google')) ? '1' : '0';
                $post['otp_phone'] = !empty($this->input->post('otp_phone')) ? $this->input->post('otp_phone') : '';
                $post['google_auth_code'] = $this->input->post('google_auth_code');
                $code = $this->input->post('code');
                if (!empty($code)) {
                    $checkResult = $this->googleauthenticator->verifyCode($secret, $code, 2); // 2 = 2*30sec clock tolerance 

                    if ($checkResult) {
                        $result = $this->User_model->updateUserSettings($user_id, $post);
                        if (!empty($result)) {
                            $this->session->set_flashdata('success_msg', 'Successfully Updated');
                        } else {
                            $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
                        }
                    } else {
                        $this->session->set_flashdata('error_msg', 'Wrong Code!!');
                    }
                } else {
                    $result = $this->User_model->updateUserSettings($user_id, $post);
                    if (!empty($result)) {
                        $this->session->set_flashdata('success_msg', 'Successfully Updated');
                    } else {
                        $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
                    }
                }
                $this->session->set_userdata('user_time_zone', $post['time_zone']);
                //die;				
                redirect('Users/account_settings');
            }
        } else {
            $this->session->set_flashdata('error_msg', 'User not available');
            redirect('Users');
        }
        $this->render('admin/account_settings', $data);
    }

    public function change_password() {
        authenticate();
        $this->user_images = realpath(APPPATH . '../assets/uploads/user_images/');
        $data['header']['site_title'] = 'Change Password';
        $result = array();
        $user_id = $this->session->userdata("user_id");
        $profile = $this->User_model->getUserData($user_id);

        if (!empty($profile)) {
            $data['profile'] = $profile;
            if ($this->input->post()) {
                //echo '<pre>';print_r($this->input->post()); die;
                $current_password = $this->input->post('current_password');
                $verify_password = $this->input->post('verify_password');
                $new_password = $this->input->post('new_password');
                $password_strength = $this->input->post('password_strength');
                if ($password_strength == '0') {
                    $this->session->set_flashdata('error_msg', 'Error! Password should include alphabets, numbers and special characters!');
                } else {
                    if ($new_password == $verify_password) {
                        $current_password_chk = $this->User_model->checkCurrentPassword($current_password, $user_id);
                        if (empty($current_password_chk)) {
                            $this->session->set_flashdata('error_msg', 'Error! Old Password is Not Correct!');
                        } else {
                            $passwordChange = $this->User_model->changePassword($verify_password, $user_id);
                            if ($passwordChange == TRUE) {
                                $this->session->set_flashdata('success_msg', 'Password updated successfully');
                            } else {
                                $this->session->set_flashdata('error_msg', 'Error! Password not changed!');
                            }
                        }
                    } else {
                        $this->session->set_flashdata('error_msg', 'Error! Verify Password is not same as New Password!');
                    }
                }
                //die;	
                redirect('Users/change_password');
            }
        } else {
            $this->session->set_flashdata('error_msg', 'User not available');
            redirect('Users');
        }
        $this->render('admin/change_password', $data);
    }

    public function loginRecordsList($email) {
        $email = base64_decode($email);
        echo $loginRecords = $this->User_model->getLoginRecords($email);
    }

    public function listingStaff($role_id = "3", $search_user = '', $to = '', $from = '') {
        authenticate();
        $data['header']['site_title'] = 'Staff List';
        $data['role_id'] = $role_id;
        $search = [];
        //$to = '';
        //$from = '';
        $data['datas'] = $this->User_model->getUsers($role_id, $search, $search_user, $to, $from);
        //pr($data['datas']); die;
        $result = array();
        $this->render('admin/listingStaff', $data);
    }

    public function listingEmployee($role_id = "2", $search_user = '', $to = '', $from = '') {
        authenticate();

        $data['header']['site_title'] = 'Employee List';
        $data['role_id'] = $role_id;
        $search = [];
        // $to='';
        //$from='';
        $data['datas'] = $this->User_model->getUsers($role_id, $search, $search_user, $to, $from);

        //pr($data['levels']); die;
        $result = array();
        $this->render('admin/listingEmployee', $data);
    }
    
     public function listingClient($role_id = "4", $search_user = '', $to = '', $from = '') {
        authenticate();

        $data['header']['site_title'] = 'Clients List';
        $data['role_id'] = $role_id;
        $search = [];
        // $to='';
        //$from='';
        $data['datas'] = $this->User_model->getUsers($role_id, $search, $search_user, $to, $from);

        //pr($data['levels']); die;
        $result = array();
        $this->render('admin/listingClient', $data);
    }


    public function statusChange($id) {
        //authenticate();	
        $id = base64_decode($id);
        $result = $this->User_model->userStatusChange($id);
        if (!empty($result)) {
            $this->session->set_flashdata('success_msg', 'Successfully Updated');
        } else {
            $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
        }
        redirect('Users/listingstaff');
    }
    
    public function statusChangeClient($id) {
        //authenticate();	
        $id = base64_decode($id);
        $result = $this->User_model->userStatusChange($id);
        if (!empty($result)) {
            $this->session->set_flashdata('success_msg', 'Successfully Updated');
        } else {
            $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
        }
        redirect('Users/listingClient');
    }
    public function remove($id) {
        $result = $this->User_model->userRemove($id);
        return $result;
    }

    public function save($id = '') {
        authenticate();
        $result = array();
        $query = new stdClass();
        $user_images = realpath(APPPATH . '../assets/uploads/user_images/');
        $data['c_category'] = $this->User_model->StaffCategoryList();
        //$role_id = 3;
        //$role_ids = 13;
        //$data['levels'] = $this->User_model->getLevels($role_id);
        //$data['sales_persons'] = $this->User_model->getSalesPersons($role_ids);
        if (!empty($id)) {
            $data['header']['site_title'] = 'Modify Staff';
            $decode_id = base64_decode($id);
            $query = $this->User_model->getUserData($decode_id);
            //pr($query);die;
        } else {
            $data['header']['site_title'] = 'Add Staff';
            $query->fname = '';
            $query->lat = '-33.865143';
            $query->lng = '151.209900';
            $id = '';
        }

        if ($this->input->post()) {
            //pr($this->input->post());die;
            $password = substr($this->googleauthenticator->createSecret(), 0, 8);

            $post['login_id'] = $this->input->post('login_id');
            $post['addedOn'] = $this->input->post('addedOn');
            //$post['unregister_reason'] = $this->input->post('unregister_reason');
            if (empty($id)) {
                $post['password'] = md5($this->input->post('password'));
            }
            if (!empty($this->input->post('password'))) {
                $post['password'] = md5($this->input->post('password'));
                //die();
            }


            $post['role_ids'] = '3';

            //$post1['fname'] =$this->input->post('fname');
            //$post1['lname'] =$this->input->post('lname');
            $post1['full_name'] = $this->input->post('full_name');
            $post1['abbreviation'] = $this->input->post('abbreviation');
            $post1['email'] = $this->input->post('email');
            $post1['phone_code'] = $this->input->post('phone_code');
            $post1['phone_no'] = $this->input->post('phone_no');
            $post1['whatsapp_number'] = $this->input->post('whatsapp_number');
            $post1['staff_code'] = $this->input->post('staff_code');
            //$post['staff_category_id'] = $this->input->post('staff_category_id');
            $post1['address'] = $this->input->post('address');
            $post1['lat'] = $this->input->post('lat');
            $post1['lng'] = $this->input->post('lng');
            $post1['state_id'] = $this->input->post('state_id');
            $post1['country_id'] = $this->input->post('country_id');
            $post1['city_id'] = $this->input->post('city_id');
            $post1['pincode'] = $this->input->post('pincode');

            $checkUsername = $this->User_model->checkUsername($post['login_id']);
            //pr($password);die;
            // For Profile Image Upload Start
            $image = $this->input->post('profile_image');
            if ($_FILES['profile_avatar']['name'] != "") {
                if (!empty($image))
                    unlink($user_images . '/' . $image);
                $value = $_FILES['profile_avatar']['name'];
                //echo $value;

                $config = array(
                    'file_name' => 'avatar_' . date('Ymdhis'),
                    'allowed_types' => 'png|jpg|jpeg|gif|', //jpg|jpeg|gif|
                    'upload_path' => $user_images,
                    'max_size' => 20000
                );

                $this->upload->initialize($config);
                if (!$this->upload->do_upload('profile_avatar')) {
                    // return the error message and kill the script
                    $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                    redirect('Users/listingstaff/');
                }
                $image_data = $this->upload->data();
                $image = $image_data['file_name'];
            }
            $post1['profile_image'] = $image;
            //*****************************************	

            if (!empty($id)) {
                $post['modifiedBy'] = $this->session->userdata('user_id');

                $result = $this->User_model->updateUserDetails($post, $post1, $decode_id);
            } else {
                if (!empty($checkUsername)) {
                    $this->session->set_flashdata('error_msg', 'Duplicate User Found');
                    redirect('Users/save/' . $id);
                }
                $post['addedBy'] = $this->session->userdata('user_id');
                $post['addedOn'] = gmdate('Y-m-d H:i:s');

                //$post2['addedOn'] =gmdate('Y-m-d H:i:s');
                $result = $this->User_model->saveUser($post, $post1, $post2);

                //*******Email Sent to User*******//
                $this->email->set_mailtype("html");
                $this->email->set_newline("\r\n");

                $email_temp = get_email_template('new_user_registration');
                $msg = str_replace("[var.email]", $post['login_id'], $email_temp->content);
                $msg = str_replace("[var.password]", $password, $msg);
                $msg = str_replace("[var.first_name]", $post1['fname'], $msg);
                $msg = str_replace("[var.system_name]", get_settings_value('system_name'), $msg);

                $this->email->to($post['login_id']);
                //$this->email->bcc('demo@gmail.com');
                $this->email->from($email_temp->email_from);
                $this->email->subject($email_temp->email_subject);
                $this->email->message($msg);
                $this->email->send();
                //*******************************//
            }

            if (!empty($result)) {
                $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
            }
            redirect('Users/listingstaff/');
        }
        //pr($data);die;
        $data['query'] = $query;
        $this->render('admin/save', $data);
    }

    public function saveEmployee($id = '') {
        authenticate();
        $result = array();
        $query = new stdClass();
        $user_images = realpath(APPPATH . '../assets/uploads/user_images/');
        $data['c_category'] = $this->User_model->StaffCategoryList();
        $role_id = 3;
        //$data['levels'] = $this->User_model->getLevels($role_id);
        //$data['sales_persons'] = $this->User_model->getSalesPersons($role_ids);
        if (!empty($id)) {
            $data['header']['site_title'] = 'Modify Employee';
            $decode_id = base64_decode($id);
            $query = $this->User_model->getUserData($decode_id);
            //pr($query);die;
        } else {
            $data['header']['site_title'] = 'Add Employee';
            $query->fname = '';
            $query->lat = '-33.865143';
            $query->lng = '151.209900';
            $id = '';
        }

        if ($this->input->post()) {
            //pr($this->input->post());die;
            $password = substr($this->googleauthenticator->createSecret(), 0, 8);

            $post['login_id'] = $this->input->post('login_id');
            $post['addedOn'] = $this->input->post('addedOn');
            //$post['unregister_reason'] = $this->input->post('unregister_reason');
            if (empty($id)) {
                $post['password'] = md5($this->input->post('password'));
            }
            if (!empty($this->input->post('password'))) {
                $post['password'] = md5($this->input->post('password'));
                //die();
            }
            $post['role_ids'] = '2';

            //$post1['fname'] =$this->input->post('fname');
            //$post1['lname'] =$this->input->post('lname');
            $post1['full_name'] = $this->input->post('full_name');
            $post1['abbreviation'] = $this->input->post('abbreviation');
            $post1['email'] = $this->input->post('email');
            $post1['phone_code'] = $this->input->post('phone_code');
            $post1['phone_no'] = $this->input->post('phone_no');
            $post1['whatsapp_number'] = $this->input->post('whatsapp_number');
            $post1['staff_code'] = $this->input->post('staff_code');
            $post['staff_category_id'] = $this->input->post('staff_category_id');
            //$post1['position_work'] = $this->input->post('position_work');
            $post1['address'] = $this->input->post('address');
            $post1['lat'] = $this->input->post('lat');
            $post1['lng'] = $this->input->post('lng');
            $post1['state_id'] = $this->input->post('state_id');
            $post1['country_id'] = $this->input->post('country_id');
            $post1['city_id'] = $this->input->post('city_id');
            $post1['pincode'] = $this->input->post('pincode');

            $checkUsername = $this->User_model->checkUsername($post['login_id']);
            //pr($password);die;
            // For Profile Image Upload Start
            $image = $this->input->post('profile_image');
            if ($_FILES['profile_avatar']['name'] != "") {
                if (!empty($image))
                    unlink($user_images . '/' . $image);
                $value = $_FILES['profile_avatar']['name'];
                //echo $value;

                $config = array(
                    'file_name' => 'avatar_' . date('Ymdhis'),
                    'allowed_types' => 'png|jpg|jpeg|gif|', //jpg|jpeg|gif|
                    'upload_path' => $user_images,
                    'max_size' => 20000
                );

                $this->upload->initialize($config);
                if (!$this->upload->do_upload('profile_avatar')) {
                    // return the error message and kill the script
                    $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                    redirect('Users/listingstaff/');
                }
                $image_data = $this->upload->data();
                $image = $image_data['file_name'];
            }
            $post1['profile_image'] = $image;
            //*****************************************	

            if (!empty($id)) {
                $post['modifiedBy'] = $this->session->userdata('user_id');
                $result = $this->User_model->updateUserDetails($post, $post1, $decode_id);
            } else {
                if (!empty($checkUsername)) {
                    $this->session->set_flashdata('error_msg', 'Duplicate User Found');
                    redirect('Users/save/' . $id);
                }
                $post['addedBy'] = $this->session->userdata('user_id');
                $post['addedOn'] = gmdate('Y-m-d H:i:s');

                //$post2['addedOn'] =gmdate('Y-m-d H:i:s');
                $result = $this->User_model->saveUser($post, $post1, $post2);

                //*******Email Sent to User*******//
                /* $this->email->set_mailtype("html");
                  $this->email->set_newline("\r\n");

                  $email_temp = get_email_template('new_user_registration');
                  $msg = str_replace("[var.email]",$post['login_id'],$email_temp->content);
                  $msg = str_replace("[var.password]",$password,$msg);
                  $msg = str_replace("[var.first_name]",$post1['fname'],$msg);
                  $msg = str_replace("[var.system_name]",get_settings_value('system_name'),$msg);

                  $this->email->to($post['login_id']);
                  $this->email->bcc('demo.com');
                  $this->email->from($email_temp->email_from);
                  $this->email->subject($email_temp->email_subject);
                  $this->email->message($msg);
                  $this->email->send(); */
                //*******************************//
            }

            if (!empty($result)) {
                $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
            }
            redirect('Users/listingEmployee/');
        }
        //pr($data);die;
        $data['query'] = $query;
        $this->render('admin/saveEmployee', $data);
    }

    public function saveClient($id = '') {
        authenticate();
        $result = array();
        $query = new stdClass();
        $user_images = realpath(APPPATH . '../assets/uploads/user_images/');
        $data['c_category'] = $this->User_model->StaffCategoryList();
        $data['p_name'] = $this->User_model->ProjectNameList();
        $role_id = 3;
        //$data['levels'] = $this->User_model->getLevels($role_id);
        //$data['sales_persons'] = $this->User_model->getSalesPersons($role_ids);
        if (!empty($id)) {
            $data['header']['site_title'] = 'Modify Client';
            $decode_id = base64_decode($id);
            $query = $this->User_model->getUserData($decode_id);
            //pr($query);die;
        } else {
            $data['header']['site_title'] = 'Add Client';
            $query->fname = '';
            $query->lat = '-33.865143';
            $query->lng = '151.209900';
            $id = '';
        }

        if ($this->input->post()) {
            //pr($this->input->post());die;
            $password = substr($this->googleauthenticator->createSecret(), 0, 8);

            $post['login_id'] = $this->input->post('login_id');
            $post['addedOn'] = $this->input->post('addedOn');
            //$post['unregister_reason'] = $this->input->post('unregister_reason');
            if (empty($id)) {
                $post['password'] = md5($this->input->post('password'));
            }
            if (!empty($this->input->post('password'))) {
                $post['password'] = md5($this->input->post('password'));
                //die();
            }
            $post['role_ids'] = '4';
            $post['status'] = '1';

            //$post1['fname'] =$this->input->post('fname');
            //$post1['lname'] =$this->input->post('lname');
            $post1['full_name'] = $this->input->post('full_name');
            $post1['abbreviation'] = $this->input->post('abbreviation');
            $post1['email'] = $this->input->post('email');
            $post1['phone_code'] = $this->input->post('phone_code');
            $post1['phone_no'] = $this->input->post('phone_no');
            $post1['whatsapp_number'] = $this->input->post('whatsapp_number');

            $post1['address'] = $this->input->post('address');
            $post1['lat'] = $this->input->post('lat');
            $post1['lng'] = $this->input->post('lng');
            $post1['state_id'] = $this->input->post('state_id');
            $post1['country_id'] = $this->input->post('country_id');
            $post1['city_id'] = $this->input->post('city_id');
            $post1['pincode'] = $this->input->post('pincode');
            $post1['p_id'] = $this->input->post('p_id');

            $checkUsername = $this->User_model->checkUsername($post['login_id']);
            //pr($password);die;
            // For Profile Image Upload Start
            $image = $this->input->post('profile_image');
            if ($_FILES['profile_avatar']['name'] != "") {
                if (!empty($image))
                    unlink($user_images . '/' . $image);
                $value = $_FILES['profile_avatar']['name'];
                //echo $value;

                $config = array(
                    'file_name' => 'avatar_' . date('Ymdhis'),
                    'allowed_types' => 'png|jpg|jpeg|gif|', //jpg|jpeg|gif|
                    'upload_path' => $user_images,
                    'max_size' => 20000
                );

                $this->upload->initialize($config);
                if (!$this->upload->do_upload('profile_avatar')) {
                    // return the error message and kill the script
                    $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                    redirect('Users/listingstaff/');
                }
                $image_data = $this->upload->data();
                $image = $image_data['file_name'];
            }
            $post1['profile_image'] = $image;
            //*****************************************	

            if (!empty($id)) {
                $post['modifiedBy'] = $this->session->userdata('user_id');
                $result = $this->User_model->updateUserDetails($post, $post1, $decode_id);
            } else {
                if (!empty($checkUsername)) {
                    $this->session->set_flashdata('error_msg', 'Duplicate User Found');
                    redirect('Users/save/' . $id);
                }
                $post['addedBy'] = $this->session->userdata('user_id');
                $post['addedOn'] = gmdate('Y-m-d H:i:s');

                //$post2['addedOn'] =gmdate('Y-m-d H:i:s');
                $result = $this->User_model->saveClient($post, $post1, $post2);
            }

            if (!empty($result)) {
                $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
            }
            redirect('Users/listingClient/');
        }
        //pr($data);die;
        $data['query'] = $query;
        $this->render('admin/saveClient', $data);
    }

    public function getStateList($country_id) {
        echo state_list_dropdown('', $country_id);
    }

    public function getCityList($state_id, $country_id = '') {
        if ($state_id == '0') {
            $state_id = '';
        }
        echo city_list_dropdown('', $state_id, $country_id);
    }

}
