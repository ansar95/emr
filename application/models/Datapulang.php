<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapulang extends CI_Model {

	public function ambilcarakeluar() {
		$this->db->from("mcarakeluar");
		$data = $this->db->get();
		return $data->result();
	}

}
