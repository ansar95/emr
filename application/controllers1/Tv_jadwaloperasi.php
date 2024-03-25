<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tv_jadwaloperasi extends CI_Controller {

	public function index() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("iopr");
			$unitinstalasi = $this->iopr->kamaropr();
			$data["unitinstalasi"] = $unitinstalasi;
			$data['include'] = "layanan/pelayanan/instalasi/operasi/jadwaloperasi_display";
			// $data['menusamping'] = "menuopr";
			// $data['backhome'] = "inst";
			$data['js'] = "pelayanan/instalasi/listopr_jadwal_display";
			$data['css'] = "pelayanan/instalasi/listopr_jadwal_display";
			// $data['css'] = "pelayanan/instalasi/listopr";
			$this->load->view('templatesidebar/content_nomenu', $data);
		} else {
			redirect('login');
		}
	}

	public function caridatajadwalopr_display() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("iopr");
			$dtpasien = $this->iopr->datajadwalopr_display();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/instalasi/operasi/tddtlistjadwalopr_display', $data);
		} else {
			redirect('login');
		}
	}



}