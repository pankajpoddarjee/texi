<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Driver extends BackendController {

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
    public function __construct() {
        parent::__construct();
        $this->load->model('Driver_model');
    }

    public function add_driver($id = '') {
        authenticate();
        $result = array();
        $query = new stdClass();
        $user_images = realpath(APPPATH . '../assets/uploads/user_images/');
        if (!empty($id)) {
            $data['header']['site_title'] = 'Modify Driver';
            $decode_id = base64_decode($id);
            $query = $this->Driver_model->getDriverDetails($decode_id);
            //pr($query);die;
        } else {
            $data['header']['site_title'] = 'Add Driver';
            $query->fname = '';
            $id = '';
        }

        if ($this->input->post()) {
            //pr($this->input->post());die;
            $post['fname'] = $this->input->post('fname');
            $post['lname'] = $this->input->post('lname');
            $post['pname'] = $this->input->post('pname');
            $post['mobile_number'] = $this->input->post('mobile_number');
            $post['email'] = $this->input->post('email');
            $post['birth_date'] = $this->input->post('birth_date');
            $post['address'] = $this->input->post('address');
            $post['emergency_contact_number'] = $this->input->post('emergency_contact_number');
            $post['license_number'] = $this->input->post('license_number');
            $post['license_expiry'] = $this->input->post('license_expiry');
            $post['state'] = $this->input->post('state');
            $post['driver_authority_number'] = $this->input->post('driver_authority_number');
            $post['airport_authority'] = $this->input->post('airport_authority');
            $post['driver_notes'] = $this->input->post('driver_notes');
            $post['account_name'] = $this->input->post('account_name');
            $post['account_number'] = $this->input->post('account_number');
            $post['ssb'] = $this->input->post('ssb');
            $post['abn_number'] = $this->input->post('abn_number');
            $post['gst_registered'] = $this->input->post('gst_registered');
            $post['addedOn'] = $this->input->post('addedOn');
            
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
                    redirect('Driver/listing/');
                }
                $image_data = $this->upload->data();
                $image = $image_data['file_name'];
            }
            $post['profile_image'] = $image;
            if (!empty($id)) {
                $post['modifiedBy'] = $this->session->userdata('user_id');
                //$result = $this->Driver_model->updateProjectDetails($post, $decode_id);
            } else {
                $post['addedBy'] = $this->session->userdata('user_id');
                $post['addedOn'] = gmdate('Y-m-d H:i:s');
                //$result = $this->Driver_model->saveDriver($post);
            }
            $result = $this->Driver_model->saveDriver($post,$id);
            if (!empty($result)) {
                $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
            }
            redirect('Driver/listing/');
        }
        //pr($data);die;
        $data['query'] = $query;
        $this->render('admin/add_driver', $data);
    }

    public function listing() {
        authenticate();

        $data['header']['site_title'] = 'Driver List';
        $data['datas'] = $this->Driver_model->getDriver();
        $this->render('admin/listing', $data);
    }

    public function statusChange($id) {
        //authenticate();	
        $id = base64_decode($id);
        $result = $this->Driver_model->DriverStatusChange($id);
        if (!empty($result)) {
            $this->session->set_flashdata('success_msg', 'Successfully Updated');
        } else {
            $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
        }
        redirect('Driver/listing');
    }

    public function remove($id) {
        $result = $this->Driver_model->projectcategoryRemove($id);
        return $result;
    }

    public function driver_payment() {
        authenticate();

        $data['header']['site_title'] = 'Driver Paymant';
        $data['datas'] = $this->Driver_model->getDriver();
        $this->render('admin/driver_payment', $data);
    }

}
