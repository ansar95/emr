<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lappasienrawat extends CI_Model {

	public function ambilruangan($d) {
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');

		$this->db->select('register.golongan as golongan, register.tgl_masuk as tgl, register.tgl_keluar as tgl_klr, register.no_rm as norm, pasien.nama_pasien as nama, pasien.alamat as alamat,  pasien.sex as sex, pasien.tgl_lahir as tgl_lahir, register.kondisi_keluar as kondisi');
		$this->db->from('register_detail');
		$this->db->join('register', 'register.notransaksi = register_detail.notransaksi');
		$this->db->join('pasien', 'pasien.no_rm = register.no_rm');
		if ($dUnit == "pilih") {
			$this->db->where('register_detail.kode_unit', $dUnitPilih);
		}
		if ($dGol == "pilih") {
			$this->db->where('register.golongan', $dGolPilih);
		}
		$this->db->where('register_detail.status', '0');
		$this->db->where('register_detail.pulang', '0');
		$this->db->where('register.bagian', 'INAP');
		$this->db->where('register_detail.kode_unit', $d);
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilunit() {
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');

		$this->db->select('munit.nama_unit as unit, munit.kode_unit as kode_unit');
		$this->db->from('register_detail');
		$this->db->join('register', 'register.notransaksi = register_detail.notransaksi');
		$this->db->join('pasien', 'pasien.no_rm = register.no_rm');
		$this->db->join('munit', 'munit.kode_unit = register_detail.kode_unit');
		if ($dUnit == "pilih") {
			$this->db->where('register_detail.kode_unit', $dUnitPilih);
		}
		if ($dGol == "pilih") {
			$this->db->where('register.golongan', $dGolPilih);
		}
		$this->db->where('register_detail.status', '0');
		$this->db->where('register_detail.pulang', '0');
		$this->db->where('register.bagian', 'INAP');
		$this->db->group_by('munit.nama_unit, munit.kode_unit');
		$data = $this->db->get();
		return $data->result();
	}

}
