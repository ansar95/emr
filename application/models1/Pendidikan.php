<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Model {
	
	public function full() {
		$this->db->from("mpendidikan");
		$data = $this->db->get();
		return $data->result();
	}

}
