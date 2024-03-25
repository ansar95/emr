<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suku extends CI_Model {
	
	public function full() {
		$this->db->from("msuku");
		$data = $this->db->get();
		return $data->result();
	}

}
