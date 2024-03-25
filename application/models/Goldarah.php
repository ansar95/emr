<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goldarah extends CI_Model {
	
	public function full() {
		$this->db->from("mgoldarah");
		$data = $this->db->get();
		return $data->result();
	}

}
