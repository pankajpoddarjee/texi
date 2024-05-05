<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * CodeIgniter-HMVC
 *
 * @package    CodeIgniter-HMVC
 * @author     N3Cr0N (N3Cr0N@list.ru)
 * @copyright  2019 N3Cr0N
 * @license    https://opensource.org/licenses/MIT  MIT License
 * @link       <URI> (description)
 * @version    GIT: $Id$
 * @since      Version 0.0.1
 * @filesource
 *
 */
require FCPATH .'vendor/autoload.php';
use Twilio\Rest\Client;
		
class Frontend extends FrontendController
{
    /**
     * [__construct description]
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct();
		$this->load->model('Frontend_model');
		
		
    }

    
    public function index()
    {
       $data = array();		
		
        $data['header']['site_title'] = 'Home';
        $data['header']['og_title'] = 'Home';
		$vehicle = $this->Frontend_model->getVehicleDetails();
        $data['vehicle'] = $vehicle;
        // echo "<pre>";
        // print_r($data['vehicle']);
                 //pr($data['journals']);die();
        $this->load->view('home', $data);
    }
    public function booking()
    {
        //echo "<pre>";
       ///print_r($this->input->post());
       
    $trip_type = $this->input->post('trip_type');

    $duration = $this->input->post('duration');
    $hour_order_type = $this->input->post('hour_order_type');
    $hour_pickup_date_time = $this->input->post('hour_pickup_date_time');
    $hour_pickup_address_type = $this->input->post('hour_pickup_address_type');
    $hour_pickup_address = $this->input->post('hour_pickup_address');
    $hour_dropup_address_type = $this->input->post('hour_dropup_address_type');
    $hour_dropup_address = $this->input->post('hour_dropup_address');
    $hour_passenger_count = $this->input->post('hour_passenger_count');

    $one_order_type = $this->input->post('one_order_type');
    $one_pickup_date_time = $this->input->post('one_pickup_date_time');
    $one_pickup_address_type = $this->input->post('one_pickup_address_type');
    $one_pickup_address = $this->input->post('one_pickup_address');
    $one_dropup_address_type = $this->input->post('one_dropup_address_type');
    $one_dropup_address = $this->input->post('one_dropup_address');
    $one_passenger_count = $this->input->post('one_passenger_count');

    $return_order_type = $this->input->post('return_order_type');
    $return_one_pickup_date_time = $this->input->post('return_one_pickup_date_time');
    $return_one_pickup_address_type = $this->input->post('return_one_pickup_address_type');
    $return_one_pickup_address = $this->input->post('return_one_pickup_address');
    $return_one_dropup_address_type = $this->input->post('return_one_dropup_address_type');
    $return_one_dropup_address = $this->input->post('return_one_dropup_address');
    $return_one_passenger_count = $this->input->post('return_one_passenger_count');
    $return_two_pickup_date_time = $this->input->post('return_two_pickup_date_time');
    $return_two_pickup_address_type = $this->input->post('return_two_pickup_address_type');
    $return_two_pickup_address = $this->input->post('return_two_pickup_address');
    $return_two_dropup_address_type = $this->input->post('return_two_dropup_address_type');
    $return_two_dropup_address = $this->input->post('return_two_dropup_address');
    $return_two_passenger_count = $this->input->post('return_two_passenger_count');

    $vehicle_id = $this->input->post('vehicle_id');

    $email = $this->input->post('email');
    $mobile = $this->input->post('mobile');
    $first_name = $this->input->post('first_name');
    $last_name = $this->input->post('last_name');
    if($trip_type==1){

        $data = array(
            'trip_type'=>$trip_type,
            'duration'=>$duration,
            'order_type'=>$hour_order_type,
            'pickup_date_time'=>$hour_pickup_date_time,
            'pickup_address_type'=>$hour_pickup_address_type,
            'pickup_address'=>$hour_pickup_address,
            'dropup_address_type'=>$hour_dropup_address_type,
            'dropup_address'=>$hour_dropup_address,
            'passenger_count'=>$hour_passenger_count,
            'vehicle_id'=>$vehicle_id,
            'email'=>$email,
            'mobile'=>$mobile,
            'first_name'=>$first_name,
            'last_name'=>$last_name
        );
    
    }elseif($trip_type==2){
        $data = array(
            'trip_type'=>$trip_type,
            'order_type'=>$one_order_type,
            'pickup_date_time'=>$one_pickup_date_time,
            'pickup_address_type'=>$one_pickup_address_type,
            'pickup_address'=>$one_pickup_address,
            'dropup_address_type'=>$one_dropup_address_type,
            'dropup_address'=>$one_dropup_address,
            'passenger_count'=>$one_passenger_count,
            'vehicle_id'=>$vehicle_id,
            'email'=>$email,
            'mobile'=>$mobile,
            'first_name'=>$first_name,
            'last_name'=>$last_name
        );

    }else{
        $data = array(
            'trip_type'=>$trip_type,
            'order_type'=>$return_order_type,
            'pickup_date_time'=>$return_one_pickup_date_time,
            'pickup_address_type'=>$return_one_pickup_address_type,
            'pickup_address'=>$return_one_pickup_address,
            'dropup_address_type'=>$return_one_dropup_address_type,
            'dropup_address'=>$return_one_dropup_address,
            'passenger_count'=>$return_one_passenger_count,

            'return_pickup_date_time'=>$return_two_pickup_date_time,
            'return_pickup_address_type'=>$return_two_pickup_address_type,
            'return_pickup_address'=>$return_two_pickup_address,
            'return_dropup_address_type'=>$return_two_dropup_address_type,
            'return_dropup_address'=>$return_two_dropup_address,
            'return_passenger_count'=>$return_two_passenger_count,
            'vehicle_id'=>$vehicle_id,
            'email'=>$email,
            'mobile'=>$mobile,
            'first_name'=>$first_name,
            'last_name'=>$last_name
        );
    }
    $insert = $this->db->insert('booking',$data);
    if($insert){
        $arr["status"]=1;
        $arr["msg"]="Booking Successfull"; 
    }else{
        $arr["status"]=0;
        $arr["msg"]="Something went to wrong"; 
    }
      
      echo json_encode($arr);
    }

    public function thankyou()
    {
        $this->load->view('thankyou');
    }

    
    	
}
        

