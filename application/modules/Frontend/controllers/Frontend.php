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

    
    	
}
        

