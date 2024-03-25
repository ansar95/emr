<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapinstalasi extends CI_Model {
	
	public function ambilfaktur() {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		// $dUnit = $this->input->post('unit');
		// $dUnitPilih = $this->input->post('unitpilih');
		// $dGol = $this->input->post('golongan');
		// $dGolPilih = $this->input->post('golpilih');
		// $dRujuk = $this->input->post('rujuk');
		// $dRujukPilih = $this->input->post('rujukpilih');

		$this->db->select('pfakturheader.nofak as nofak');
		$this->db->from('pfakturheader');
		$this->db->join('pfakturdetail', 'pfakturdetail.nofak = pfakturheader.nofak');
		$this->db->where('pfakturheader.tglbeli BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		// if ($dUnit == "pilih") {
		// 	$this->db->where('ptindakan_instalasi.kode_unit', $dUnitPilih);
		// }
		// if ($dGol == "pilih") {
		// 	$this->db->where('register_instalasi.golongan', $dGolPilih);
		// }
		// if ($dRujuk == "pilih") {
		// 	$this->db->where('register_instalasi.nama_unitR', $dRujukPilih);
		// }
		$this->db->group_by('pfakturheader.nofak');
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilfakturfull() {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		// $dUnit = $this->input->post('unit');
		// $dUnitPilih = $this->input->post('unitpilih');
		// $dGol = $this->input->post('golongan');
		// $dGolPilih = $this->input->post('golpilih');
		// $dRujuk = $this->input->post('rujuk');
		// $dRujukPilih = $this->input->post('rujukpilih');

		$this->db->select('pfakturheader.tglbeli as tgl, pfakturheader.nofak as nofak, pfakturdetail.carabayar as carabayar, pfakturdetail.namapbf as vendor, pfakturheader.namabarang as namabarang, pfakturheader.batch as batch, pfakturheader.expire as expire, pfakturheader.qty as qty, pfakturheader.harga as harga, pfakturheader.diskon as diskon, pfakturheader.bayar as bayar');
		$this->db->from('pfakturheader');
		$this->db->join('pfakturdetail', 'pfakturdetail.nofak = pfakturheader.nofak');
		$this->db->where('pfakturheader.tglbeli BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		// if ($dUnit == "pilih") {
		// 	$this->db->where('ptindakan_instalasi.kode_unit', $dUnitPilih);
		// }
		// if ($dGol == "pilih") {
		// 	$this->db->where('register_instalasi.golongan', $dGolPilih);
		// }
		// if ($dRujuk == "pilih") {
		// 	$this->db->where('register_instalasi.nama_unitR', $dRujukPilih);
		// }
		$this->db->group_by('pfakturheader.nofak');
		$data = $this->db->get();
		return $data->result();
	}

}
