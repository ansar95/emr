<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapregrawatugd extends CI_Model {
	
	public function ambilharian() {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dKunjung = $this->input->post('kunjungan');

		$this->db->select('register.golongan as golongan, register.tgl_masuk as tgl, register.no_rm as norm, pasien.nama_pasien as nama, pasien.alamat as alamat, register.barulama as barulama, register_detail.nama_unit as unit, pasien.tgl_lahir as tgl_lahir, pasien.sex as sex, pasien.tgl_daftar as tgl_daftar');
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
		$this->db->where('register.bagian', 'IGD');
		$this->db->where('register_detail.kode_unitR', 'ALOKET');
		// $this->db->where('register.kode_keluarpada', 'IGDD');
		// $this->db->or_where('register.kode_keluarpada', 'IGDP');
		$this->db->order_by('register.tgl_masuk');
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilharian_pasien_keluar_igd_saja() {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dKunjung = $this->input->post('kunjungan');

		$this->db->select('register.golongan as golongan, register.tgl_masuk as tgl, register.no_rm as norm, pasien.nama_pasien as nama, pasien.alamat as alamat, register.barulama as barulama, register_detail.nama_unit as unit, pasien.tgl_lahir as tgl_lahir, pasien.sex as sex, pasien.tgl_daftar as tgl_daftar');
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
		$this->db->where('register.bagian', 'IGD');
		$this->db->where('register.kode_keluarpada', 'IGDD');
		$this->db->or_where('register.kode_keluarpada', 'IGDP');
		$this->db->order_by('register.tgl_masuk');
		$data = $this->db->get();
		return $data->result();
	}
	
	public function ambilharian_old_19ok2022() {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dKunjung = $this->input->post('kunjungan');

		$this->db->select('register.golongan as golongan, register.tgl_masuk as tgl, register.no_rm as norm, pasien.nama_pasien as nama, pasien.alamat as alamat, register.barulama as barulama, register_detail.nama_unit as unit, pasien.tgl_lahir	 as tgl_lahir, pasien.sex as sex');
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
		$this->db->where('register.bagian', 'IGD');
		$this->db->where('register.kode_keluarpada', 'IGDD');
		$this->db->or_where('register.kode_keluarpada', 'IGDP');
		$this->db->order_by('register.tgl_masuk');
		$data = $this->db->get();
		return $data->result();
	}

	public function ambiltindakan($d) {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dKunjung = $this->input->post('kunjungan');

		$this->db->select('register.golongan as golongan, register.tgl_masuk as tgl, register.no_rm as norm, pasien.nama_pasien as nama, pasien.alamat as alamat,  pasien.sex as sex, ptindakanperawat.nama_dokter as dokter, mtindakan.tindakan as tindakan, ptindakanperawat.jasas as nilai');
		$this->db->from('register');
		$this->db->join('ptindakanperawat', 'ptindakanperawat.notransaksi = register.notransaksi');
		$this->db->join('pasien', 'pasien.no_rm = register.no_rm');
		$this->db->join('mtindakan', 'mtindakan.kode_tindakan = ptindakanperawat.tindakan');
		$this->db->where('register.tgl_masuk BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		if ($dUnit == "pilih") {
			$this->db->where('ptindakanperawat.kode_unit', $dUnitPilih);
		}
		if ($dGol == "pilih") {
			$this->db->where('register.golongan', $dGolPilih);
		}
		if ($dKunjung == "0") {
			$this->db->where('register.barulama', $dKunjung);
		} else if ($dKunjung == "1") {
			$this->db->where('register.barulama', $dKunjung);
		}
		$this->db->where('register.bagian', 'INAP');
		$this->db->where('ptindakanperawat.kode_unit', $d);
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
		$this->db->join('ptindakanperawat', 'ptindakanperawat.notransaksi = register.notransaksi');
		$this->db->join('munit', 'munit.kode_unit = ptindakanperawat.kode_unit');
		$this->db->where('register.tgl_masuk BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		if ($dUnit == "pilih") {
			$this->db->where('ptindakanperawat.kode_unit', $dUnitPilih);
		}
		if ($dGol == "pilih") {
			$this->db->where('register.golongan', $dGolPilih);
		}
		if ($dKunjung == "0") {
			$this->db->where('register.barulama', $dKunjung);
		} else if ($dKunjung == "1") {
			$this->db->where('register.barulama', $dKunjung);
		}
		$this->db->where('register.bagian', 'INAP');
		$this->db->group_by('munit.nama_unit, munit.kode_unit');
		$data = $this->db->get();
		return $data->result();
	}

}
