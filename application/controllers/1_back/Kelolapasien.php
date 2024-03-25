<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolapasien extends CI_Controller {

	public function kembalikanpasien() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("kelolapasienmdl");
			$dtregis = $this->kelolapasienmdl->ambildatapindah();
			$dtsimpan = $this->kelolapasienmdl->pasienkembali($dtregis);

			$this->load->model("ugdmdl");
			$dttdbhp = $this->ugdmdl->datamtdhistory();
			$data["hasil"] = $dttdbhp;
			$data["pindah"] = $dtregis->pindah;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/mtdpindah', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	
	public function pulangkanpasien() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("kelolapasienmdl");
			$dtregis = $this->kelolapasienmdl->ambildatapindah();
			$dtsimpan = $this->kelolapasienmdl->pasienpulang($dtregis);

			$this->load->model("ugdmdl");
			$dttdbhp = $this->ugdmdl->datamtdhistory();
			$data["hasil"] = $dttdbhp;
			$data["pindah"] = $dtregis->pindah;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/mtdpindah', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function kembalikanpasieninap() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("kelolapasienmdl");
			$dtregis = $this->kelolapasienmdl->ambildatapindah();
			$dtsimpan = $this->kelolapasienmdl->pasienkembali($dtregis);

			$this->load->model("urimdl");
			$dthistory = $this->urimdl->datamtdhistory();
			$data["hasil"] = $dthistory;
			$data["pindah"] = $dtregis->pindah;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdpindah', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	
	public function pulangkanpasieninap() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("kelolapasienmdl");
			$dtregis = $this->kelolapasienmdl->ambildatapindah();
			$dtsimpan = $this->kelolapasienmdl->pasienpulang($dtregis);
			
			$this->load->model("urimdl");
			$dthistory = $this->urimdl->datamtdhistory();
			$dtpasien = $this->urimdl->carinamapasienuri();

			$data["hasilpindah"] = $dthistory;
			$data["pindah"] = $dtregis->pindah;
			$data["hasil"] = $dtpasien;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdpindah', $data, TRUE);
			$dt["dtviewuri"] =$this->load->view('layanan/pelayanan/uri/tdlisturi', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function hapusrujukanpasien() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("kelolapasienmdl");
			$dtregis = $this->kelolapasienmdl->ambildatapindah();
			$dtsimpan = $this->kelolapasienmdl->pasienrujukanhapus($dtregis);

			$this->load->model("urimdl");
			$historyrujukanpoly = $this->urimdl->datamtdhistoryrujukanpolyafter($dtregis);
			$data["hasil"] = $historyrujukanpoly;
			$data["pindah"] = $dtregis->pindah;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdrujukpoli', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function pulangkanrujukanpasien() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("kelolapasienmdl");
			$dtregis = $this->kelolapasienmdl->ambildatapindah();
			$dtsimpan = $this->kelolapasienmdl->pasienpulang($dtregis);

			$this->load->model("urimdl");
			$historyrujukanpoly = $this->urimdl->datamtdhistoryrujukanpolyafter($dtregis);
			$data["hasil"] = $historyrujukanpoly;
			$data["pindah"] = $dtregis->pindah;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdrujukpoli', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function kembalikanpasienjalan() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("kelolapasienmdl");
			$dtregis = $this->kelolapasienmdl->ambildatapindah();
			$dtsimpan = $this->kelolapasienmdl->pasienkembali($dtregis);

			$this->load->model("urjmdl");
			$dthistory = $this->urjmdl->datamtdhistory();
			$data["hasil"] = $dthistory;
			$data["pindah"] = $dtregis->pindah;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/urj/mtdpindah', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function pulangkanpasienjalan() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("kelolapasienmdl");
			$dtregis = $this->kelolapasienmdl->ambildatapindah();
			$dtsimpan = $this->kelolapasienmdl->pasienpulang($dtregis);

			$this->load->model("urjmdl");
			$dthistory = $this->urjmdl->datamtdhistory();
			$data["hasil"] = $dthistory;
			$data["pindah"] = $dtregis->pindah;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/urj/mtdpindah', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function kembalikanpasienopr() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("kelolapasienmdl");
			$dtregis = $this->kelolapasienmdl->ambildatapindah();
			$dtsimpan = $this->kelolapasienmdl->pasienkembali($dtregis);

			$this->load->model("urimdl");
			$dthistory = $this->urimdl->datamtdhistory();
			$data["hasil"] = $dthistory;
			$data["pindah"] = $dtregis->pindah;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/operasi/mtdpindah', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}
	
}
