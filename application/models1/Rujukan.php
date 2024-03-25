<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rujukan extends CI_Model {
	
	public function full() {
		$this->db->from("mrujukan");
		$data = $this->db->get();
		return $data->result();
	}

}
