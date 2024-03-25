<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelashak extends CI_Model {
	
	public function full() {
		$this->db->from("kelashak");
		$data = $this->db->get();
		return $data->result();
	}

}
