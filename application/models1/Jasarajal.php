<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jasarajal extends CI_Model {
	
	public function full() {
		$this->db->from("jasa_rajal");
		$data = $this->db->get();
		return $data->result();
	}
}
?>