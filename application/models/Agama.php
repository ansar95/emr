<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agama extends CI_Model {
	
	public function full() {
		$this->db->from("agama");
		$data = $this->db->get();
		return $data->result();
	}

}
