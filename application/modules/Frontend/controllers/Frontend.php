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
    $hour_flight_number = $this->input->post('hour_flight_number');
    $hour_wait_time = $this->input->post('hour_wait_time');
    $hour_terminal = $this->input->post('hour_terminal');

    $one_order_type = $this->input->post('one_order_type');
    $one_pickup_date_time = $this->input->post('one_pickup_date_time');
    $one_pickup_address_type = $this->input->post('one_pickup_address_type');
    $one_pickup_address = $this->input->post('one_pickup_address');
    $one_dropup_address_type = $this->input->post('one_dropup_address_type');
    $one_dropup_address = $this->input->post('one_dropup_address');
    $one_passenger_count = $this->input->post('one_passenger_count');
    $one_flight_number = $this->input->post('one_flight_number');
    $one_wait_time = $this->input->post('one_wait_time');
    $one_terminal = $this->input->post('one_terminal');

    

    $return_order_type = $this->input->post('return_order_type');
    $return_one_pickup_date_time = $this->input->post('return_one_pickup_date_time');
    $return_one_pickup_address_type = $this->input->post('return_one_pickup_address_type');
    $return_one_pickup_address = $this->input->post('return_one_pickup_address');
    $return_one_dropup_address_type = $this->input->post('return_one_dropup_address_type');
    $return_one_dropup_address = $this->input->post('return_one_dropup_address');
    $return_one_passenger_count = $this->input->post('return_one_passenger_count');
    $return_one_flight_number = $this->input->post('return_one_flight_number');
    $return_one_wait_time = $this->input->post('return_one_wait_time');
    $return_one_terminal = $this->input->post('return_one_terminal');


    $return_two_pickup_date_time = $this->input->post('return_two_pickup_date_time');
    $return_two_pickup_address_type = $this->input->post('return_two_pickup_address_type');
    $return_two_pickup_address = $this->input->post('return_two_pickup_address');
    $return_two_dropup_address_type = $this->input->post('return_two_dropup_address_type');
    $return_two_dropup_address = $this->input->post('return_two_dropup_address');
    $return_two_passenger_count = $this->input->post('return_two_passenger_count');
    $return_two_flight_number = $this->input->post('return_two_flight_number');
    $return_two_wait_time = $this->input->post('return_two_wait_time');
    $return_two_terminal = $this->input->post('return_two_terminal');

    $vehicle_id = $this->input->post('vehicle_id');
    $fare = $this->input->post('fare');
    $fare_return = $this->input->post('fare_return');

    $service_charge = $this->input->post('service_charge');
    $total_fare = $this->input->post('total_fare');
    $total_fare_return = $this->input->post('total_fare_return');

    $email = $this->input->post('email');
    $mobile = $this->input->post('mobile');
    $first_name = $this->input->post('first_name');
    $last_name = $this->input->post('last_name');

    $system_email = $this->input->post('system_email');
    $service_fee = $this->input->post('service_fee');
    $promo_code = $this->input->post('promo_code');

    $passenger_contact = $this->input->post('passenger_contact');
    $luggage_count = $this->input->post('luggage_count');
    $trip_note = $this->input->post('trip_note');
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
            'hour_flight_number'=>$hour_flight_number,
            'hour_wait_time'=>$hour_wait_time,
            'hour_terminal'=>$hour_terminal,
            'vehicle_id'=>$vehicle_id,
            'fare'=>$fare,
            'service_charge'=>$service_charge,
            'total_fare'=>$total_fare,
            'email'=>$email,
            'mobile'=>$mobile,
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'service_fee'=>$service_fee,
            'promo_code'=>$promo_code,
            'passenger_contact'=>$passenger_contact,
            'luggage_count'=>$luggage_count,
            'trip_note'=>$trip_note
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
            'one_flight_number'=>$one_flight_number,
            'one_wait_time'=>$one_wait_time,
            'one_terminal'=>$one_terminal,
            'vehicle_id'=>$vehicle_id,
            'fare'=>$fare,
            'service_charge'=>$service_charge,
            'total_fare'=>$total_fare,
            'email'=>$email,
            'mobile'=>$mobile,
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'service_fee'=>$service_fee,
            'promo_code'=>$promo_code,
            'passenger_contact'=>$passenger_contact,
            'luggage_count'=>$luggage_count,
            'trip_note'=>$trip_note
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
            'return_one_flight_number'=>$return_one_flight_number,
            'return_one_wait_time'=>$return_one_wait_time,
            'return_one_terminal'=>$return_one_terminal,

            'return_pickup_date_time'=>$return_two_pickup_date_time,
            'return_pickup_address_type'=>$return_two_pickup_address_type,
            'return_pickup_address'=>$return_two_pickup_address,
            'return_dropup_address_type'=>$return_two_dropup_address_type,
            'return_dropup_address'=>$return_two_dropup_address,
            'return_passenger_count'=>$return_two_passenger_count,
            'return_two_flight_number'=>$return_two_flight_number,
            'return_two_wait_time'=>$return_two_wait_time,
            'return_two_terminal'=>$return_two_terminal,
            'vehicle_id'=>$vehicle_id,
            'fare'=>$fare,
            'fare_return'=>$fare_return,
            'service_charge'=>$service_charge,
            'total_fare'=>$total_fare,
            'total_fare_return'=>$total_fare_return,
            'email'=>$email,
            'mobile'=>$mobile,
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'service_fee'=>$service_fee,
            'promo_code'=>$promo_code,
            'passenger_contact'=>$passenger_contact,
            'luggage_count'=>$luggage_count,
            'trip_note'=>$trip_note
        );
    }
    $insert = $this->db->insert('booking',$data);
    if($insert){

        if($trip_type==1){
            $src = $hour_pickup_address;
            $phpdate = strtotime( $hour_pickup_date_time );
            $time = date( 'l dS \o\f F Y h:i A', $phpdate );
        }elseif($trip_type==2){
            $src = $one_pickup_address;
            $phpdate = strtotime( $one_pickup_date_time );
            $time = date( 'l dS \o\f F Y h:i A', $phpdate );
        }else{
            $src = $return_one_pickup_date_time;
            $phpdate = strtotime( $return_one_pickup_date_time );
            $time = date( 'l dS \o\f F Y h:i A', $phpdate );
        }
        $html = '<body style="margin:0;background:#fff"><div style="background-color:#fff"><div style="background-color:#fff;padding:0;width:100%;max-width:800px;margin:0 auto"><table border="0" width="100%" cellpadding="0" cellspacing="0" align="center"><tr bgcolor="#1676f6"><td align="center"><a href="#"><img src="'.base_url('assets/frontend/img/Limo.png').'" alt="" style="margin:0 auto;width:100%;max-width:200px;height:auto;padding:10px 20px"></a></td></tr><tr bgcolor="#ffffff"><td style="padding-top:20px"><div style="min-height:200px;text-align:left;color:#000;font-size:16px;font-family:Helvetica,Arial,sans-serif;padding:10px 0 20px;line-height:24px"><p>Dear <b>'.$first_name.'</b>,</p><p>Thank you for booking in limo hire.</p><p>Your booking is confirmed.</p><p>Your chauffer will be at "<b>'.$src.'</b>" at "<b>'.$time.'</b>"</p><p>Thanks,<br><strong>Limo Hire Team</strong></p></div></td></tr><tr bgcolor="#fff"><td align="center" style="color:#333;font-size:14px;font-family:Helvetica,Arial,sans-serif;padding:10px 20px;line-height:24px;border-top:1px solid #ddd"><p>Phone:<a style="color:#333;text-decoration:none" href="tel:0452 347 263"><strong>0452 347 263</strong></a>,<a style="color:#333;text-decoration:none" href="tel:03 9013 4442"><strong>03 9013 4442</strong></a>, Email:<a style="color:#333;text-decoration:none" href="mailto:bookings@limohiremelbourne.au"><strong>bookings@limohiremelbourne.au</strong></a></p><p><a href="https://www.facebook.com/limohiremel/" target="_blank" class="icon" title="facebook"><img src="'.base_url('assets/frontend/img/facebook.png').'" alt=""></a><a href="https://www.instagram.com/limohiremelbournevic" target="_blank" class="icon" title="youtube"><img src="'.base_url('assets/frontend/img/instagram.png').'" alt=""></a></td></tr><tr bgcolor="#27293d"><td align="center" style="color:#fff;font-size:14px;font-family:Helvetica,Arial,sans-serif;padding:10px 20px;line-height:24px">Copyright ©<script>document.write((new Date).getFullYear())</script>. All Rights Reserved<br></td></tr></table></div></div></body>';
        $to = $email;
        $from_name = "Limo";
        $from = get_settings_value('email_from');

        $subject = 'Booking is confirmed.';
        
        $headers  = "From: " . $from_name . "\r\n";
        $headers .= "Reply-To: " . $from . "\r\n";
        $headers .= "CC: " . $system_email . "\r\n"; 
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        
        $message = $html;
        
        
        $flag = mail($to, $subject, $message, $headers);
        if($flag){
            $arr["status"]=1;
            $arr["msg"]="Booking Successfull"; 
        }else{
            $arr["status"]=0;
            $arr["msg"]="Email sending failed"; 
        }
       
        
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
        

