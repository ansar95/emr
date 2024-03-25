<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kondisi extends CI_Model {
	
	public function ambilkondisi() {
		$data = $this->db->get("mkondisi");
		return $data->result();
	}

	public function ambilkondisirm() {
		$data = $this->db->get("mkondisirm");
		return $data->result();
	}

}
