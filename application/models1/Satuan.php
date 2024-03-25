<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Model {

	public function pilihsatuan() {
		$this->db->select("satuanobat, id");
		$this->db->from("msatuan");
		$data = $this->db->get();
		return $data->result();
	}

}