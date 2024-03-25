<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asuransi extends CI_Model {
	
	public function full() {
		$this->db->from("masuransi");
		$data = $this->db->get();
		return $data->result();
	}

}
