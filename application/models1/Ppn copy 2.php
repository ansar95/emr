<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppn extends CI_Model {
	
	public function full() {
		$this->db->from("mppn");
		$data = $this->db->get();
		return $data->result();
	}

	public function pendanaan() {
		$this->db->from("mpendanaan");
		$data = $this->db->get();
		return $data->result();
	}

}
