<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Projects extends BackendController {

    public $CI;
    protected $data = array();

    /**
     * [__construct description]
     *
     * @method __construct
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Project_model');
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.sos-development.com.au',
            'smtp_port' => 465,
            'smtp_user' => 'no-reply@sos-development.com.au',
            'smtp_pass' => 'Password!@#123',
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );
        $this->load->library('email', $config);
        $this->load->library(array('form_validation', 'image_lib'));
    }

    public function index() {
        
    }

    public function listing() {
        authenticate();
        $data['header']['site_title'] = 'Project List';
        $data['datas'] = $this->Project_model->getProjects();
        //pr($data['datas']); die;
        $result = array();
        $this->render('admin/listing', $data);
    }

    public function statusChange($id) {
        //authenticate();	
        $id = base64_decode($id);
        $result = $this->Project_model->ProjectStatusChange($id);
        if (!empty($result)) {
            $this->session->set_flashdata('success_msg', 'Successfully Updated');
        } else {
            $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
        }
        redirect('Projects/listing');
    }

    public function remove($id) {
        $result = $this->Project_model->userRemove($id);
        return $result;
    }

    public function save($id = '') {
        authenticate();
        $result = array();
        $query = new stdClass();
        $documents_1 = realpath(APPPATH . '../assets/uploads/projects_documents/');
        $data['client_name'] = $this->Project_model->ClientNameList();
        if (!empty($id)) {
            $data['header']['site_title'] = 'Modify Project';
            $decode_id = base64_decode($id);
            $query = $this->Project_model->getProjectData($decode_id);
            //pr($query);die;
        } else {
            $data['header']['site_title'] = 'Add Project';
            $query->fname = '';
            $query->lat = '-33.865143';
            $query->lng = '151.209900';
            $id = '';
        }

        if ($this->input->post()) {
            //pr($this->input->post());die;
            $post['addedOn'] = $this->input->post('addedOn');
            $post['project_name'] = $this->input->post('project_name');
            $post['type'] = $this->input->post('type');
            $post['c_id'] = $this->input->post('c_id');
            $post['address'] = $this->input->post('address');
            $post['plot_size'] = $this->input->post('plot_size');
            $post['unit_number'] = $this->input->post('unit_number');
            $post['start_date'] = $this->input->post('start_date');
            $post['end_date'] = $this->input->post('end_date');
            $post['latitude'] = $this->input->post('latitude');
            $post['longitude'] = $this->input->post('longitude');

            if (!empty($_FILES['files_1']['name']) && count(array_filter($_FILES['files_1']['name'])) > 0) {

                $filesCount = count($_FILES['files_1']['name']);
                for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['file']['name'] = $_FILES['files_1']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['files_1']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['files_1']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['files_1']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['files_1']['size'][$i];
                    // File upload configuration 

                    $uploadPath = $documents_1;
                    $config['file_name'] = 'project_details_1_' . date('Ymdhis');
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*';

                    //$config['max_size']    = '100'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                    // Load and initialize upload library 

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    // Upload file to server 
                    if ($this->upload->do_upload('file')) {

                        // Uploaded file data 
                        $fileData = $this->upload->data();
                        $uploadData[$i]['file_name'] = $fileData['file_name'];
                        $project_document_1[] = $fileData['file_name'];
                        $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                    } else {

                        //$errorUploadType .= $_FILES['file']['name'] . ' | ';
                    }
                }
                //print_r($project_document_1);
                $post['document_1'] = implode(',', $project_document_1);
                //print_r($post['document_1']);
                //$post['image'] = $uploadData;
            }
            if (!empty($_FILES['files_2']['name']) && count(array_filter($_FILES['files_2']['name'])) > 0) {

                $filesCount = count($_FILES['files_2']['name']);
                for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['file']['name'] = $_FILES['files_2']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['files_2']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['files_2']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['files_2']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['files_2']['size'][$i];
                    // File upload configuration 

                    $uploadPath = $documents_1;
                    $config['file_name'] = 'project_document_2_' . date('Ymdhis');
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*';

                    //$config['max_size']    = '100'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                    // Load and initialize upload library 

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    // Upload file to server 
                    if ($this->upload->do_upload('file')) {

                        // Uploaded file data 
                        $fileData = $this->upload->data();
                        $uploadData[$i]['file_name'] = $fileData['file_name'];
                        $project_document_2[] = $fileData['file_name'];
                        $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                    } else {

                        //$errorUploadType .= $_FILES['file']['name'] . ' | ';
                    }
                }
                //print_r($project_document_1);
                $post['document_2'] = implode(',', $project_document_2);
                //print_r($post['document_1']);
                //$post['image'] = $uploadData;
            }
            if (!empty($_FILES['files_3']['name']) && count(array_filter($_FILES['files_3']['name'])) > 0) {

                $filesCount = count($_FILES['files_3']['name']);
                for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['file']['name'] = $_FILES['files_3']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['files_3']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['files_3']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['files_3']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['files_3']['size'][$i];
                    // File upload configuration 

                    $uploadPath = $documents_1;
                    $config['file_name'] = 'project_document_3_' . date('Ymdhis');
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*';

                    //$config['max_size']    = '100'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                    // Load and initialize upload library 

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    // Upload file to server 
                    if ($this->upload->do_upload('file')) {

                        // Uploaded file data 
                        $fileData = $this->upload->data();
                        $uploadData[$i]['file_name'] = $fileData['file_name'];
                        $project_document_3[] = $fileData['file_name'];
                        $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                    } else {

                        //$errorUploadType .= $_FILES['file']['name'] . ' | ';
                    }
                }
                //print_r($project_document_1);
                $post['document_3'] = implode(',', $project_document_3);
                //print_r($post['document_1']);
                //$post['image'] = $uploadData;
            }
            if (!empty($id)) {
                $post['modifiedBy'] = $this->session->userdata('user_id');
                $result = $this->Project_model->updateProjectDetails($post, $decode_id);
            } else {
                $post['addedBy'] = $this->session->userdata('user_id');
                $post['addedOn'] = gmdate('Y-m-d H:i:s');
                $result = $this->Project_model->saveProject($post);
            }
            if (!empty($result)) {
                $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
            }
            redirect('Projects/listing/');
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
        $role_id = 3;
        //$data['levels'] = $this->Project_model->getLevels($role_id);
        //$data['sales_persons'] = $this->Project_model->getSalesPersons($role_ids);
        if (!empty($id)) {
            $data['header']['site_title'] = 'Modify Employee';
            $decode_id = base64_decode($id);
            $query = $this->Project_model->getUserData($decode_id);
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
                $post['password'] = md5($password);
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
            $post1['position_work'] = $this->input->post('position_work');
            $post1['address'] = $this->input->post('address');
            $post1['lat'] = $this->input->post('lat');
            $post1['lng'] = $this->input->post('lng');
            $post1['state_id'] = $this->input->post('state_id');
            $post1['country_id'] = $this->input->post('country_id');
            $post1['city_id'] = $this->input->post('city_id');
            $post1['pincode'] = $this->input->post('pincode');

            $checkUsername = $this->Project_model->checkUsername($post['login_id']);
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
                    redirect('Projects/listingstaff/');
                }
                $image_data = $this->upload->data();
                $image = $image_data['file_name'];
            }
            $post1['profile_image'] = $image;
            //*****************************************	

            if (!empty($id)) {
                $post['modifiedBy'] = $this->session->userdata('user_id');
                $result = $this->Project_model->updateUserDetails($post, $post1, $decode_id);
            } else {
                if (!empty($checkUsername)) {
                    $this->session->set_flashdata('error_msg', 'Duplicate User Found');
                    redirect('Projects/save/' . $id);
                }
                $post['addedBy'] = $this->session->userdata('user_id');
                $post['addedOn'] = gmdate('Y-m-d H:i:s');

                //$post2['addedOn'] =gmdate('Y-m-d H:i:s');
                $result = $this->Project_model->saveUser($post, $post1, $post2);

                //*******Email Sent to User*******//
                /* $this->email->set_mailtype("html");
                  $this->email->set_newline("\r\n");

                  $email_temp = get_email_template('new_user_registration');
                  $msg = str_replace("[var.email]",$post['login_id'],$email_temp->content);
                  $msg = str_replace("[var.password]",$password,$msg);
                  $msg = str_replace("[var.first_name]",$post1['fname'],$msg);
                  $msg = str_replace("[var.system_name]",get_settings_value('system_name'),$msg);

                  $this->email->to($post['login_id']);
                  $this->email->bcc('sayanoffline@gmail.com');
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
            redirect('Projects/listingEmployee/');
        }
        //pr($data);die;
        $data['query'] = $query;
        $this->render('admin/saveEmployee', $data);
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

    public function project_listing() {
        authenticate();
        $data['header']['site_title'] = 'Project Details';
        $data['datas'] = $this->Project_model->getProjectsDetails();
        //pr($data['datas']); die;
        $result = array();
        $this->render('admin/project_listing', $data);
    }

    public function saveProjectDetails($id = '') {
        authenticate();
        $result = array();
        $query = new stdClass();
        $documents_1 = realpath(APPPATH . '../assets/uploads/projects_documents/');
        $data['p_name'] = $this->Project_model->ProjectNameList();
        $data['work_type'] = $this->Project_model->WorkTypeList();
        if (!empty($id)) {
            $data['header']['site_title'] = 'Modify Project';
            $decode_id = base64_decode($id);
            $query = $this->Project_model->getProjectDetailsData($decode_id);
            //pr($query);die;
        } else {
            $data['header']['site_title'] = 'Add Project Details';
            $query->fname = '';
            $query->lat = '-33.865143';
            $query->lng = '151.209900';
            $id = '';
        }

        if ($this->input->post()) {
            //pr($this->input->post());die;
            $post['addedOn'] = $this->input->post('addedOn');
            $post['p_id'] = $this->input->post('p_id');
            $post['color_code'] = $this->input->post('color_code');
            $post['work_type'] = $this->input->post('work_type');
            $post['work_name'] = $this->input->post('work_name');
            $post['supplier_name'] = $this->input->post('supplier_name');
            $post['start_date'] = $this->input->post('start_date');
            $post['end_date'] = $this->input->post('end_date');
            $post['work_details'] = $this->input->post('work_details');
            $post['notes'] = $this->input->post('notes');
            $post['client_name'] = $this->input->post('client_name');
            $post['project_manager'] = $this->input->post('project_manager');

            if (!empty($_FILES['files_1']['name']) && count(array_filter($_FILES['files_1']['name'])) > 0) {

                $filesCount = count($_FILES['files_1']['name']);
                for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['file']['name'] = $_FILES['files_1']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['files_1']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['files_1']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['files_1']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['files_1']['size'][$i];
                    // File upload configuration 

                    $uploadPath = $documents_1;
                    $config['file_name'] = 'project_details_1_' . date('Ymdhis');
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*';

                    //$config['max_size']    = '100'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                    // Load and initialize upload library 

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    // Upload file to server 
                    if ($this->upload->do_upload('file')) {

                        // Uploaded file data 
                        $fileData = $this->upload->data();
                        $uploadData[$i]['file_name'] = $fileData['file_name'];
                        $project_document_1[] = $fileData['file_name'];
                        $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                    } else {

                        //$errorUploadType .= $_FILES['file']['name'] . ' | ';
                    }
                }
                //print_r($project_document_1);
                $post['document_1'] = implode(',', $project_document_1);
                //print_r($post['document_1']);
                //$post['image'] = $uploadData;
            }

            if (!empty($id)) {
                $post['modifiedBy'] = $this->session->userdata('user_id');
                $result = $this->Project_model->updateProjectAllDetails($post, $decode_id);
            } else {
                $post['addedBy'] = $this->session->userdata('user_id');
                $post['addedOn'] = gmdate('Y-m-d H:i:s');
                $result = $this->Project_model->saveProjectDetails($post);
            }
            if (!empty($result)) {
                $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
            }
            redirect('Projects/project_listing/');
        }
        //pr($data);die;
        $data['query'] = $query;
        $this->render('admin/saveProjectDetails', $data);
    }

    public function saveWorkType($id = '') {
        if ($this->input->post()) {

            $post['category_name'] = $this->input->post('category_name');

            //*****************************************	

            if (!empty($id)) {
                $post['modifiedBy'] = $this->session->userdata('user_id');
            } else {
                $post['addedBy'] = $this->session->userdata('user_id');
                $post['addedOn'] = gmdate('Y-m-d H:i:s');
            }
            $result = $this->Project_model->saveWorkCategory($post, $id);
            if (!empty($result)) {
                $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
            }
            redirect('Projects/listingWorkCategory');
        }
    }

    public function listingWorkCategory() {
        authenticate();

        $data['header']['site_title'] = 'Category List';
        $data['datas'] = $this->Project_model->getWorkCategory();
        $this->render('admin/listingWorkCategory', $data);
    }

    public function projectWorkCategoryremove($id) {
        $result = $this->Project_model->WorkCategoryRemove($id);
        return $result;
    }

    public function statusWorkCategoryChange($id) {
        //authenticate();	
        $id = base64_decode($id);
        $result = $this->Project_model->ProjectWorkCategoryStatusChange($id);
        if (!empty($result)) {
            $this->session->set_flashdata('success_msg', 'Successfully Updated');
        } else {
            $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
        }
        redirect('Projects/listingWorkCategory');
    }

    public function projectDetailsStatusChange($id) {
        //authenticate();	
        $id = base64_decode($id);
        $result = $this->Project_model->ProjectDetailStatusChange($id);
        if (!empty($result)) {
            $this->session->set_flashdata('success_msg', 'Successfully Updated');
        } else {
            $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
        }
        redirect('Projects/project_listing');
    }

    public function project_remove($id) {
        $result = $this->Project_model->ProjectRemove($id);
        return $result;
    }

    public function project_assigned_listing() {
        authenticate();
        $data['header']['site_title'] = 'Project Assigned Listing';
        $data['datas'] = $this->Project_model->getProjectsAssignedList();
        //pr($data['datas']); die;
        $result = array();
        $this->render('admin/project_assigned_listing', $data);
    }

    public function saveProjectAssign($id = '') {
        authenticate();
        $result = array();
        $query = new stdClass();
        $documents_1 = realpath(APPPATH . '../assets/uploads/projects_documents/');
        $data['p_name'] = $this->Project_model->ProjectNameList();
        $data['work_type'] = $this->Project_model->WorkTypeList();
        if (!empty($id)) {
            $data['header']['site_title'] = 'Modify Project';
            $decode_id = base64_decode($id);
            $query = $this->Project_model->getProjectAssignDetailsData($decode_id);
            $staff_name = $this->Project_model->getAllStaffNameByWork($query->work_id);
            $client_name = $this->Project_model->getClientNameByProjectName($query->p_id);
            //pr($query);die;
        } else {
            $data['header']['site_title'] = 'Add Project Assign';
            $id = '';
        }

        if ($this->input->post()) {
            //pr($this->input->post());die;
            $post['addedOn'] = $this->input->post('addedOn');
            $post['p_id'] = $this->input->post('p_id');
            $post['work_id'] = $this->input->post('work_id');
            $post['user_id'] = $this->input->post('staff_name_id');
            $post['client_id'] = $this->input->post('client_name_id');
            $post['notes'] = $this->input->post('notes');
            $post['start_date'] = $this->input->post('start_date');
            $post['end_date'] = $this->input->post('end_date');
            if (!empty($id)) {
                $post['modifiedBy'] = $this->session->userdata('user_id');
                $result = $this->Project_model->updateProjectAssign($post, $decode_id);
            } else {
                $post['addedBy'] = $this->session->userdata('user_id');
                $post['addedOn'] = gmdate('Y-m-d H:i:s');
                $result = $this->Project_model->saveProjectAssign($post);
            }
            if (!empty($result)) {
                $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
            }
            redirect('Projects/project_assigned_listing/');
        }
        //pr($data);die;
        $data['query'] = $query;
        $data['staff_name'] = $staff_name;
        $data['client_name'] = $client_name;
        $this->render('admin/saveProjectAssign', $data);
    }

    public function getStaffName($staff_name_id) {
        $staff_name = $this->Project_model->getAllStaffNameByWork($staff_name_id);
        $html = '<option value=""  >Select Employee</option>';
        if (!empty($staff_name)) {
            foreach ($staff_name as $k_m => $staffname) {
                $html .= '<option value="' . $staffname->id . '"  >' . $staffname->name . '</option>';
            }
        }
        echo $html;
    }
    
     public function projectAssignStatusChange($id) {
        //authenticate();	
        $id = base64_decode($id);
        $result = $this->Project_model->ProjectAssignStatusChange($id);
        if (!empty($result)) {
            $this->session->set_flashdata('success_msg', 'Successfully Updated');
        } else {
            $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
        }
        redirect('Projects/project_assigned_listing');
    }
    
     public function project_assign_remove($id) {
        $result = $this->Project_model->ProjectAssignRemove($id);
        return $result;
    }
    
    public function getClientName($client_name_id) {
        $client_name = $this->Project_model->getClientNameByProjectName($client_name_id);
        $html = '<option value=""  >Select Client</option>';
        if (!empty($client_name)) {
            foreach ($client_name as $k_m => $clientname) {
                $html .= '<option value="' . $clientname->c_id . '"  >' . $clientname->c_name . '</option>';
            }
        }
        echo $html;
    }

}
