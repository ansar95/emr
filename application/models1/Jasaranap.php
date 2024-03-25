<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jasaranap extends CI_Model {
	
	public function full() {
		$this->db->from("jasa_ranap");
		$data = $this->db->get();
		return $data->result();
	}
}
?>