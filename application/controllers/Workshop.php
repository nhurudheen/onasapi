<?php 
use Restserver\Libraries\REST_Controller;

require_once APPPATH . 'controllers/Utility.php'; 
require_once("application/libraries/Format.php");
require(APPPATH.'/libraries/REST_Controller.php');

class Workshop extends REST_Controller{
    function __construct() {
        parent::__construct();
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	    header('Access-Control-Allow-Headers: Content-Type, x-api-key');
        header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Origin: *');
	   	if ( "OPTIONS" === $_SERVER['REQUEST_METHOD'] ) {
		  	die();
			}
    }


    public function index_get(){
        $email = $this->input->get('email');
        if($email =="" ){
            $this->response(array('status_code'=>400, 'message'=>'Kindly enter user email'));
        }
        $utility = new Utility();
        return  $this->response($utility->list_email($email));
    }
}

?>