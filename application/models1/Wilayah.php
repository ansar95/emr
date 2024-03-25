<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends CI_Model {
	
	public function ambilprovinsi() {
		$this->db->select("id, name");
		$this->db->from("provinces");
		$this->db->order_by("urut");
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilkabupaten() {
		$id = $this->input->get("prov");
		$this->db->select("id, name");
		$this->db->from("regencies");
		$this->db->where("province_id", $id);
		$this->db->order_by("urut");
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilkecamatan() {
		$id = $this->input->get("kab");
		$this->db->select("id, name");
		$this->db->from("districts");
		$this->db->where("regency_id", $id);
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilkelurahan() {
		$id = $this->input->get("kec");
		$this->db->select("id, name");
		$this->db->from("villages");
		$this->db->where("district_id", $id);
		$data = $this->db->get();
		return $data->result();
	}

}
