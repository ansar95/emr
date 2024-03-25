<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lappasienkeluar extends CI_Model {
	
	public function ambildaftar() {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dKond = $this->input->post('kond');
		$dKondPilih = $this->input->post('kondpilih');
		$dKunjung = $this->input->post('kunjungan');

		$this->db->select('register.golongan as golongan, register.tgl_masuk as tglmasuk, register.tgl_keluar as tglkeluar, register.no_rm as norm, pasien.nama_pasien as nama, pasien.alamat as alamat, register.barulama as barulama, register.diag as diag, pasien.tgl_lahir as tgl_lahir, pasien.sex as sex, register.keluarpada as keluarpada, register.nama_dokter as dokter, register.kondisi_keluar as kondisi');
		$this->db->from('register');
		$this->db->join('pasien', 'pasien.no_rm = register.no_rm');
		$this->db->where('register.tgl_keluar BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		if ($dUnit == "pilih") {
			// $this->db->where('register_detail.kode_unit', $dUnitPilih);
			$this->db->where('register.kode_keluarpada', $dUnitPilih);
		}
		if ($dGol == "pilih") {
			$this->db->where('register.golongan', $dGolPilih);
		}
		if ($dKunjung == "0") {
			$this->db->where('register.barulama', $dKunjung);
		} else if ($dKunjung == "1") {
			$this->db->where('register.barulama', $dKunjung);
		}
		// $this->db->where('register.status', '1');
		$this->db->where('register.pulang', '1');

		$this->db->group_start();			
		$this->db->group_start();	
		$this->db->where("register.bagian", "IGD");
		$this->db->where("register.kode_keluarpada !=", "IGDD");
		$this->db->where("register.kode_keluarpada !=", "IGDP");
		$this->db->group_end();
		$this->db->or_where("register.bagian", "INAP");
		$this->db->group_end();
		
		$this->db->order_by('register.tgl_keluar');
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilruangan($d) {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dKunjung = $this->input->post('kunjungan');

		$this->db->select('register.golongan as golongan, register.tgl_masuk as tgl, register.no_rm as norm, pasien.nama_pasien as nama, pasien.alamat as alamat,  pasien.sex as sex, pasien.tgl_lahir as tgl_lahir, register.kondisi_keluar as kondisi');
		$this->db->from('register');
		$this->db->join('register_detail', 'register_detail.notransaksi = register.notransaksi');
		$this->db->join('pasien', 'pasien.no_rm = register.no_rm');
		$this->db->where('register.tgl_keluar BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		if ($dUnit == "pilih") {
			$this->db->where('register_detail.kode_unit', $dUnitPilih);
			$this->db->where('register_detail.kamarkeluar', 1);
		}
		if ($dGol == "pilih") {
			$this->db->where('register.golongan', $dGolPilih);
		}
		if ($dKunjung == "0") {
			$this->db->where('register.barulama', $dKunjung);
		} else if ($dKunjung == "1") {
			$this->db->where('register.barulama', $dKunjung);
		}
		// $this->db->where('register.status', '1');
		$this->db->where('register.pulang', '1');
		$this->db->where('register_detail.kode_unit', $d);
		// $this->db->order_by('register_detail.nama_unit');
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

		$this->db->select('munit.nama_unit as unit, munit.kode_unit as kode_unit');
		$this->db->from('register');
		$this->db->join('register_detail', 'register_detail.notransaksi = register.notransaksi');
		$this->db->join('pasien', 'pasien.no_rm = register.no_rm');
		$this->db->join('munit', 'munit.kode_unit = register_detail.kode_unit');
		$this->db->where('register.tgl_keluar BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		if ($dUnit == "pilih") {
			$this->db->where('register_detail.kode_unit', $dUnitPilih);
			$this->db->where('register_detail.kamarkeluar', 1);
		}
		if ($dGol == "pilih") {
			$this->db->where('register.golongan', $dGolPilih);
		}
		if ($dKunjung == "0") {
			$this->db->where('register.barulama', $dKunjung);
		} else if ($dKunjung == "1") {
			$this->db->where('register.barulama', $dKunjung);
		}
		 $this->db->where('register.pulang', '1');
		$this->db->group_by('munit.nama_unit, munit.kode_unit');
		$data = $this->db->get();
		return $data->result();
	}

}
