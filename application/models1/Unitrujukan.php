<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unitrujukan extends CI_Model {
	
	public function ambilunitrujuk() {
		$data = $this->db->get("mrujukan");
		return $data->result();
	}

}
