<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapregrawatjalan extends CI_Model {
	
	public function ambilgol($d) {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dKunjung = $this->input->post('kunjungan');

		$this->db->select('register.golongan as golongan, register.tgl_masuk as tgl, register.no_rm as norm, pasien.nama_pasien as nama, pasien.alamat as alamat, pasien.sex as sex, register.barulama as barulama, register_detail.nama_unit as unit,pasien.tgl_daftar as tgl_daftar, register.notransaksi as notransaksi');
		$this->db->from('register');
		$this->db->join('register_detail', 'register_detail.notransaksi = register.notransaksi');
		$this->db->join('pasien', 'pasien.no_rm = register.no_rm');
		$this->db->where('register.tgl_masuk BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		if ($dUnit == "pilih") {
			$this->db->where('register_detail.kode_unit', $dUnitPilih);
		}
		if ($dGol == "pilih") {
			$this->db->where('register.golongan', $dGolPilih);
		}
		if ($dKunjung == "0") {
			$this->db->where('register.barulama', $dKunjung);
		} else if ($dKunjung == "1") {
			$this->db->where('register.barulama', $dKunjung);
		}
		$this->db->where('register.bagian', 'JALAN');
		$this->db->where('register_detail.nama_unit', $d);
		$this->db->where('register_detail.idasal', '0'); //untuk pengunjung, kunjungan hapus
		$this->db->order_by('register_detail.nama_unit');
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilunit() {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dKunjung = $this->input->post('kunjungan');

		$this->db->select('register_detail.nama_unit as unit');
		$this->db->from('register');
		$this->db->join('register_detail', 'register_detail.notransaksi = register.notransaksi');
		$this->db->where('register.tgl_masuk BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		if ($dUnit == "pilih") {
			$this->db->where('register_detail.kode_unit', $dUnitPilih);
		}
		if ($dGol == "pilih") {
			$this->db->where('register.golongan', $dGolPilih);
		}
		if ($dKunjung == "0") {
			$this->db->where('register.barulama', $dKunjung);
		} else if ($dKunjung == "1") {
			$this->db->where('register.barulama', $dKunjung);
		}
		$this->db->where('register.bagian', 'JALAN');
		$this->db->where('register_detail.kode_unit !=', 'LABS');
		$this->db->where('register_detail.kode_unit !=', 'RDGL');
		$this->db->group_by('register_detail.nama_unit');
		$data = $this->db->get();
		return $data->result();
	}

}
