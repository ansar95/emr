<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jasamedikrawatjalanimport extends CI_Controller
{
    public function __construct(){
		parent::__construct();
		$this->load->library(array('excel','session'));
	}

    public function import_excel(){
        if (isset($_FILES["fileExcel"]["name"])) {
            //to do with file
            
        }else{
            echo 'tidak ada file';
        }
    }
}