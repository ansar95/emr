<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bridginglis extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){

    //  Calling cURL Library
    $this->load->library('curl');

    //  Setting URL To Fetch Data From
    $this->curl->create("http://demo.bryanlis.com/ws/");

    //  To Temporarily Store Data Received From Server
    $this->curl->option('buffersize', 10);

    //  To Receive Data Returned From Server
    $this->curl->option('returntransfer', 1);

    //  To follow The URL Provided For Website
    $this->curl->option('CUSTOMREQUEST', "GET");

    $this->curl->option('followlocation', 1);

    //  To Retrieve Server Related Data
    $headers = [
		"x-user : Dummy_useer",	
		"x-secret : 123qwe",
		"x-mod : auth",
		"x-cid : 4301202030080002",
		"Content-Type : application/json"
		];
    // $this->curl->option('HEADER',  true);
    $this->curl->option(CURLOPT_HTTPHEADER,  $headers);
    //  To Set Time For Process Timeout
    
    //  To Execute 'option' Array Into cURL Library & Store Returned Data Into $data
    $data = $this->curl->execute();
    $a=json_decode($data);
    // echo json_encode(array('respon'=>$send),JSON_UNESCAPED_SLASHES);
    // echo $a->token;
    
    //  To Display Returned Data
    echo $data;
    }


}

?>

