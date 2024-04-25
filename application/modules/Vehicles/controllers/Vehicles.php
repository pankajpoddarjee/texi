<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Vehicles extends BackendController {

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
        $this->load->model('Vehicle_model');
    }

    public function add_type($id = '') {
        authenticate();
        $result = array();
        $query = new stdClass();
        $car_images = realpath(APPPATH . '../assets/uploads/car_images/');
        if (!empty($id)) {
            $data['header']['site_title'] = 'Modify Type';
            $decode_id = base64_decode($id);
            $query = $this->Vehicle_model->getVehiclesTypeDetails($decode_id);
            //pr($query);die;
        } else {
            $data['header']['site_title'] = 'Add Type';
            $query->fname = '';
            $id = '';
        }

        if ($this->input->post()) {
            //pr($this->input->post());die;
            $post['type_name'] = $this->input->post('type_name');
            $post['addedOn'] = $this->input->post('addedOn');
            
            $image = $this->input->post('type_image');
            
            if ($_FILES['car_type_image']['name'] != "") {
                if (!empty($image))
                    unlink($car_images . '/' . $image);
                $value = $_FILES['car_type_image']['name'];
                //echo $value;

                $config = array(
                    'file_name' => 'avatar_' . date('Ymdhis'),
                    'allowed_types' => 'png|jpg|jpeg|gif|svg', //jpg|jpeg|gif|
                    'upload_path' => $car_images,
                    'max_size' => 20000
                );

                $this->upload->initialize($config);
                if (!$this->upload->do_upload('car_type_image')) {
                    // return the error message and kill the script
                    $this->session->set_flashdata('error_msg', $this->upload->display_errors());
                    redirect('Vehicles/type_listing/');
                }
                $image_data = $this->upload->data();
                $image = $image_data['file_name'];
            }
            $post['type_image'] = $image;
            if (!empty($id)) {
                $post['modifiedBy'] = $this->session->userdata('user_id');
                //$result = $this->Vehicle_model->updateProjectDetails($post, $decode_id);
            } else {
                $post['addedBy'] = $this->session->userdata('user_id');
                $post['addedOn'] = gmdate('Y-m-d H:i:s');
                //$result = $this->Vehicle_model->saveVehicles($post);
            }
            $result = $this->Vehicle_model->saveType($post,$id);
            if (!empty($result)) {
                $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
            }
            redirect('Vehicles/type_listing/');
        }
        //pr($data);die;
        $data['query'] = $query;
        $this->render('admin/add_type', $data);
    }

    public function add_vehicle($id = '') {
        authenticate();
        $result = array();
        $query = new stdClass();
        $documents_1 = realpath(APPPATH . '../assets/uploads/car_images/');
        if (!empty($id)) {
            $data['header']['site_title'] = 'Modify Vehicles';
            $decode_id = base64_decode($id);
            $query = $this->Vehicle_model->getVehiclesTypeDetails($decode_id);
            //pr($query);die;
        } else {
            $data['header']['site_title'] = 'Add Vehicle';
            $query->fname = '';
            $id = '';
        }

        if ($this->input->post()) {
            //pr($this->input->post());die;
            $post['registration_number']        = $this->input->post('registration_number');
            $post['make']                       = $this->input->post('make');
            $post['model']                      = $this->input->post('model');
            $post['year']                       = $this->input->post('year');
            $post['vehicle_type']               = $this->input->post('vehicle_type');
            $post['passenger_capacity']         = $this->input->post('passenger_capacity');
            $post['luggage_capacity']           = $this->input->post('luggage_capacity');
            $post['exterior_color']             = $this->input->post('exterior_color');
            $post['rwc_date']                   = $this->input->post('rwc_date');
            $post['general']                    = !empty($this->input->post('general')) ? implode(',', $this->input->post('general')) : '';
            
            $post['multimedia']                 = !empty($this->input->post('multimedia')) ? implode(',', $this->input->post('multimedia')) : '';
            $post['policies']                   = !empty($this->input->post('policies')) ? implode(',', $this->input->post('policies')) : '';
            $post['airport_authority']          = $this->input->post('airport_authority');

            $post['minimum_total_base_rate']    = $this->input->post('minimum_total_base_rate');
            $post['trip_rate_per_km']           = $this->input->post('trip_rate_per_km');
            $post['weekday_hourly_rate']        = $this->input->post('weekday_hourly_rate');
            $post['weekend_hourly_rate']        = $this->input->post('weekend_hourly_rate');
            $post['weekday_hourly_minimum']     = $this->input->post('weekday_hourly_minimum');
            $post['choose_your_weekend']        = !empty($this->input->post('choose_your_weekend')) ? implode(',', $this->input->post('choose_your_weekend')) : '';

            $post['addedOn']                    = $this->input->post('addedOn');
            $image                              = $this->input->post('type_image');
            
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
                    //$config['file_name'] = $_FILES['file']['name'] .'_'. date('Ymdhis');
                    $config['file_name'] = $_FILES['file']['name'];
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
                $post['car_image'] = implode(',', $project_document_1);
                //print_r($post['document_1']);
                //$post['image'] = $uploadData;
            }

            
            if (!empty($id)) {
                $post['modifiedBy'] = $this->session->userdata('user_id');
                //$result = $this->Vehicle_model->updateProjectDetails($post, $decode_id);
                $post['modifiedBy'] = $this->session->userdata('user_id');
                $result = $this->Vehicle_model->updateVehicleDetails($post, $id);

            } else {
                $post['addedBy'] = $this->session->userdata('user_id');
                $post['addedOn'] = gmdate('Y-m-d H:i:s');
                //$result = $this->Vehicle_model->saveVehicles($post);
                $result = $this->Vehicle_model->saveVehicle($post);
            }
            if (!empty($result)) {
                $this->session->set_flashdata('success_msg', 'Successfully Updated');
            } else {
                $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
            }
            redirect('Vehicles/vehicle_listing/');
        }
        //pr($data);die;
        $data['query'] = $query;
        $this->render('admin/add_vehicle', $data);
    }
    
     public function type_listing() {
        authenticate();

        $data['header']['site_title'] = 'Vehicles Type';
        $data['datas'] = $this->Vehicle_model->getTypes();
        $this->render('admin/type_listing', $data);
    }
    
    public function listing() {
        authenticate();

        $data['header']['site_title'] = 'Vehicles Type List';
        $data['datas'] = $this->Vehicle_model->getTypes();
        $this->render('admin/listing', $data);
    }

    public function vehicle_listing() {
        authenticate();

        $data['header']['site_title'] = 'Vehicles List';
        $data['datas'] = $this->Vehicle_model->getVehicles();
        $this->render('admin/vehicle_listing', $data);
    }

    public function TypeStatusChange($id) {
        //authenticate();	
        $id = base64_decode($id);
        $result = $this->Vehicle_model->VehiclesTypeStatusChange($id);
        if (!empty($result)) {
            $this->session->set_flashdata('success_msg', 'Successfully Updated');
        } else {
            $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
        }
        redirect('Vehicles/type_listing');
    }

    public function VehiclesStatusChange($id) {
        //authenticate();	
        $id = base64_decode($id);
        $result = $this->Vehicle_model->VehiclesStatusChange($id);
        if (!empty($result)) {
            $this->session->set_flashdata('success_msg', 'Successfully Updated');
        } else {
            $this->session->set_flashdata('error_msg', 'Updation Unsuccessful');
        }
        redirect('Vehicles/vehicle_listing');
    }
    

    public function remove($id) {
        $result = $this->Vehicle_model->projectcategoryRemove($id);
        return $result;
    }

    public function driver_payment() {
        authenticate();

        $data['header']['site_title'] = 'Vehicles Paymant';
        $data['datas'] = $this->Vehicle_model->getVehicles();
        $this->render('admin/driver_payment', $data);
    }

}
