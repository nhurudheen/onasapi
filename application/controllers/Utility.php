<?php 
class Utility extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, x-api-key,client-id');
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Origin: *');
        if ("OPTIONS" === $_SERVER['REQUEST_METHOD']) {
            die();
        }
    }

    public function list_email($email){
        $sqlQuery = $this->db->query("SELECT DISTINCT user_name, user_email FROM workshop where user_email ='$email'")->result();
       if(count($sqlQuery)>0){
        $response = array('status_code'=>200, 'message'=>'User Data Available', 'result'=>$sqlQuery);
       }
       else{
        $response = array('status_code'=>204, 'message'=>'User Email does not exist');
       }
        return $response;
    }
}
?>