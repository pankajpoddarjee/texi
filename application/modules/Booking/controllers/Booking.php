<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends BackendController {

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
        $this->load->model('Booking_model');
    }

    
  

    public function booking_list() {
        authenticate();

        $data['header']['site_title'] = 'Booking List';
        $data['datas'] = $this->Booking_model->getBooking();
        $this->render('admin/booking_listing', $data);
    }

   

}
