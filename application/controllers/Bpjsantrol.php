<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpjsantrol extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		if ($this->session->userdata("login") != TRUE) {
			redirect('login');
		}
		$this->load->model('bpjsantrolmodel');
    }

    public function ceksignature() {
        $sig = signatureantrol();
        // echo json_encode('$sig ');
        var_dump($sig);
	}

    public function ambildokter() {
		$response = $this->bpjsantrolmodel->refdokter();
        $data = json_decode($response);
        $xdd=$data->response;
        // echo $xdd;
        $hasil=stringDecrypt($xdd);
        // var_dump($hasil);
        echo decompress($hasil);
	}

    public function ambiljadwaldokter() {
        $param1='INT';
        $param2='2022-03-05';
		$response = $this->bpjsantrolmodel->refjadwaldokter($param1, $param2);
        $data = json_decode($response);
        $xdd=$data->response;
        // echo $xdd;
        $hasil=stringDecrypt($xdd);
        // var_dump($hasil);
        echo decompress($hasil);


	}
}



?>
