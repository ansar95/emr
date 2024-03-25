<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		$this->load->view('login');
	}

	public function masuk() {
		$this->load->model("logindata");
		$datalogin = $this->logindata->masuk();
		if (!$datalogin){
			$this->session->set_flashdata('pesan', 'Username dan Password Tidak Cocok!');
			redirect('login');
		} else {
			$row = $datalogin;
			if (!$row->is_active) {
				$this->session->set_flashdata('pesan', 'User tidak aktif!');
				redirect('login');
			}
			$dsession = array(
				'idx' => $row->id,
				'nama' => $row->nama,
				'nmuser' => $row->username,
                'kodeunit' => $row->kode_unit,
                'kodedokter' => $row->kode_dokter,
				'PL' => $row->PL,
				'INFO' => $row->INFO,
				'BO' => $row->BO,
				'ADM' => $row->ADM,
				'REGIS'=> $row->REGIS,
				'FO' => $row->FO,
				'LP' => $row->LP,
				'UGD' => $row->UGD,
				'RJ' => $row->RJ,
				'RI' => $row->RI,
				'RINS' => $row->RINS,
				'SEP' => $row->SEP,
				'AMP' => $row->AMP,
				'RM' => $row->RM,
				'APT' => $row->APT,
				'FARM' => $row->FARM,
				'RT' => $row->RT,
				'GIZI' => $row->GIZI,
				'MD' => $row->MD,
				'NEW' => $row->NEW,
				'EDIT' => $row->EDIT,
				'DEL' => $row->DEL,
				'PIL' => $row->PIL,
				'LAB' => $row->LAB,
				'RAD' => $row->RAD,
				'HEM' => $row->HEM,
				'JEN' => $row->JEN,
				'AMB' => $row->AMB,
				'USR' => $row->USR,
				'IBS' => $row->IBS,
				'KMB' => $row->KMB,
				'APADM' => $row->APADM,
				'BJASA' => $row->BJASA,
				'BKEU' => $row->BKEU,
				'BASET' => $row->BASET,
				'BPG' => $row->BPG,
				'BDE' => $row->BDE,
				'MNJMN' => $row->MNJMN,
				'IDOK' => $row->IDOK,
				'IUM' => $row->IUM,
				'BRM' => $row->BRM,
				'RL' => $row->ADM,
				'SEPBPJS' => $row->SEPBPJS,
				'BRIDGING' => $row->BRIDGING,
				'FOBT' => $row->FOBT,
				'AOBT' => $row->AOBT,
				'FBHP' => $row->FBHP,
				'ABHP' => $row->ABHP,
				'PGIZI' => $row->PGIZI,
				'GGIZI' => $row->GGIZI,
				'PPI' => $row->PPI,
				'MUTU' => $row->MUTU,
				'BILLALL' => $row->BILLALL,
				'SITB' => $row->SITB,
				'login' => TRUE,
			);

			$this->session->set_userdata($dsession);
			$id=$row->id;
			$this->logindata->ip($id);
			
			redirect("".site_url()."/rme/rme_new");
		}
	}

	public function keluar() {
		$this->session->sess_destroy();
		redirect('login');
	}
}
