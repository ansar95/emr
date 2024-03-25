<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapresep extends CI_Model {

	public function ambilunit() {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$urutData = $this->input->post('urutdata');
		$dRawat = $this->input->post('jenisrawat');
		$dRm = $this->input->post('jenisrawatrm');
		$dText = $this->input->post('jenisrawatrmtext');
		$dObat = $this->input->post('obat');

		$this->db->select('resep_header.nama_unit as unit, resep_header.kode_unit as kode_unit');
		$this->db->from('resep_header');
		$this->db->join('resep_detail', 'resep_detail.noresep = resep_header.noresep');
		$this->db->where('resep_header.tglresep BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		// if ($dUnit == "pilih") {
		// 	$this->db->where('ptindakan_instalasi.kode_unit', $dUnitPilih);
		// }
		// if ($dGol == "pilih") {
		// 	$this->db->where('register_instalasi.golongan', $dGolPilih);
		// }
		$this->db->group_by('resep_header.nama_unit, resep_header.kode_unit');
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilunitfull($d) {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$urutData = $this->input->post('urutdata');
		$dRawat = $this->input->post('jenisrawat');
		$dRm = $this->input->post('jenisrawatrm');
		$dText = $this->input->post('jenisrawatrmtext');
		$dObat = $this->input->post('obat');

		$this->db->select('resep_header.no_rm as norm, pasien.nama_pasien as pasien, resep_detail.namaobat as obat, resep_detail.qty as qty, resep_detail.hargapakai as hargapakai, resep_detail.tuslag as tuslag, resep_detail.jumlah as jumlah, resep_header.nama_dokter as dokter, resep_header.tglresep as tglresep');
		$this->db->from('resep_header');
		$this->db->join('resep_detail', 'resep_detail.noresep = resep_header.noresep');
		$this->db->join('pasien', 'pasien.no_rm = resep_header.no_rm');
		$this->db->where('resep_header.tglresep BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		// if ($dUnit == "pilih") {
		// 	$this->db->where('ptindakan_instalasi.kode_unit', $dUnitPilih);
		// }
		// if ($dGol == "pilih") {
		// 	$this->db->where('register_instalasi.golongan', $dGolPilih);
		// }
		$this->db->where('resep_header.kode_unit', $d);
		// $this->db->order_by('register_detail.nama_unit');
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilobatfull($d) {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$urutData = $this->input->post('urutdata');
		$dRawat = $this->input->post('jenisrawat');
		$dRm = $this->input->post('jenisrawatrm');
		$dText = $this->input->post('jenisrawatrmtext');
		$dObat = $this->input->post('obat');

		$this->db->select('resep_header.no_rm as norm,resep_detail.kodeobat as kodeobat, resep_detail.namaobat as obat, resep_detail.qty as qty, resep_detail.hargapakai as hargapakai, resep_detail.tuslag as tuslag, resep_detail.jumlah as jumlah, resep_header.golongan as golongan, resep_header.tglresep as tglresep');
		$this->db->from('resep_header');
		$this->db->join('resep_detail', 'resep_detail.noresep = resep_header.noresep');
		$this->db->join('pasien', 'pasien.no_rm = resep_header.no_rm');
		$this->db->where('resep_header.tglresep BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		// if ($dUnit == "pilih") {
		// 	$this->db->where('ptindakan_instalasi.kode_unit', $dUnitPilih);
		// }
		// if ($dGol == "pilih") {
		// 	$this->db->where('register_instalasi.golongan', $dGolPilih);
		// }
		$this->db->where('resep_header.kode_unit', $d);
		// $this->db->order_by('register_detail.nama_unit');
		$data = $this->db->get();
		return $data->result();
	}

	public function ambildokter() {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$urutData = $this->input->post('urutdata');
		$dRawat = $this->input->post('jenisrawat');
		$dRm = $this->input->post('jenisrawatrm');
		$dText = $this->input->post('jenisrawatrmtext');
		$dObat = $this->input->post('obat');

		$this->db->select('resep_header.kode_dokter as kode, resep_header.nama_dokter as dokter');
		$this->db->from('resep_header');
		$this->db->join('resep_detail', 'resep_detail.noresep = resep_header.noresep');
		$this->db->where('resep_header.tglresep BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		// if ($dUnit == "pilih") {
		// 	$this->db->where('ptindakan_instalasi.kode_unit', $dUnitPilih);
		// }
		// if ($dGol == "pilih") {
		// 	$this->db->where('register_instalasi.golongan', $dGolPilih);
		// }
		$this->db->group_by('resep_header.kode_dokter, resep_header.nama_dokter');
		$data = $this->db->get();
		return $data->result();
	}

	public function ambildokterfull($d) {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$urutData = $this->input->post('urutdata');
		$dRawat = $this->input->post('jenisrawat');
		$dRm = $this->input->post('jenisrawatrm');
		$dText = $this->input->post('jenisrawatrmtext');
		$dObat = $this->input->post('obat');

		$this->db->select('resep_detail.kodeobat as kodeobat, resep_detail.namaobat as obat, resep_detail.qty as qty');
		$this->db->from('resep_header');
		$this->db->join('resep_detail', 'resep_detail.noresep = resep_header.noresep');
		$this->db->where('resep_header.tglresep BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		// if ($dUnit == "pilih") {
		// 	$this->db->where('ptindakan_instalasi.kode_unit', $dUnitPilih);
		// }
		// if ($dGol == "pilih") {
		// 	$this->db->where('register_instalasi.golongan', $dGolPilih);
		// }
		// $this->db->group_by('resep_header.kode_dokter, resep_header.nama_dokter');
		$this->db->where('resep_header.kode_dokter', $d);

		$data = $this->db->get();
		return $data->result();
	}
}
