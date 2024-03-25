<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayahchain extends CI_Controller {

	public function ambilkabupaten() {
		$this->load->model("wilayah");
		$data = $this->wilayah->ambilkabupaten();
		echo json_encode($data);
	}

	public function ambilkecamatan() {
		$this->load->model("wilayah");
		$data = $this->wilayah->ambilkecamatan();
		echo json_encode($data);
	}

	public function akmbilkelurahan() {
		$this->load->model("wilayah");
		$data = $this->wilayah->ambilkelurahan();
		echo json_encode($data);
	}
	
}
