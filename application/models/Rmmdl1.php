<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rmmdl extends CI_Model {
	
	public function full() {
		$this->db->from("agama");
		$data = $this->db->get();
		return $data->result();
	}

	public function ambiltampilkan() {

		$date = date_create($this->input->get("tglmulai"));
		$tgl1 = date_format($date,"Y-m-d");
		$date1 = date_create($this->input->get("tglselese"));
		$tgl2 = date_format($date1,"Y-m-d");
		$pelayanan = $this->input->get("pelayanan");

        $this->db->select("register.id as id, register.no_rm as no_rm, register.tglsetor as tglsetor, register.tgl_masuk as tgl_masuk, register.tgl_keluar as tgl_keluar, pasien.nama_pasien as nama, pasien.title as title, register.keluarpada as keluarpada, register.golongan as golongan, register.notransaksi as notransaksi, register.nama_dokter as nama_dokter, register.tgl_proses as tgl_proses");
        $this->db->from("register");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		$this->db->where('register.tgl_keluar >=', $tgl1);
		$this->db->where('register.tgl_keluar <=', $tgl2);
		
		if ($pelayanan == "JALAN") {	
			$this->db->where("register.bagian", "JALAN");
		}
		
		if ($pelayanan == "INAP") {
			$this->db->group_start();			
			$this->db->group_start();	
			$this->db->where("register.bagian", "IGD");
			$this->db->where("register.kode_keluarpada !=", "IGDD");
			$this->db->where("register.kode_keluarpada !=", "IGDP");
			$this->db->group_end();
			$this->db->or_where("register.bagian", "INAP");
			$this->db->group_end();
		}

		if ($pelayanan == "IGD") {
			$this->db->where("register.bagian", "IGD");
			$this->db->group_start();	
			$this->db->where("register.kode_keluarpada", "IGDD");
			$this->db->or_where("register.kode_keluarpada", "IGDP");
			$this->db->group_end();
		}

		$this->db->order_by('register.tgl_keluar', 'ASC');
		$this->db->order_by('register.no_rm', 'ASC');
        $data = $this->db->get();
        return $data->result();
	}
	
	public function ambiltampilkanrm() {
		$date = date_create($this->input->get("tglmulai"));
		$tgl1 = date_format($date,"Y-m-d");
		$date1 = date_create($this->input->get("tglselese"));
		$tgl2 = date_format($date1,"Y-m-d");
		$pelayanan = $this->input->get("pelayanan");
		$rm = $this->input->get("rm");
		
        $this->db->select("register.id as id, register.no_rm as no_rm, register.tglsetor as tglsetor, register.tgl_masuk as tgl_masuk, register.tgl_keluar as tgl_keluar, pasien.nama_pasien as nama, register.keluarpada as keluarpada, register.golongan as golongan, register.notransaksi as notransaksi, register.nama_dokter as nama_dokter, register.tgl_proses as tgl_proses");
        $this->db->from("register");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		// $this->db->where('register.bagian', $pelayanan);
		if ($pelayanan == "JALAN") {	
			$this->db->where("register.bagian", "JALAN");
		}
		
		if ($pelayanan == "INAP") {
			$this->db->group_start();			
			$this->db->group_start();	
			$this->db->where("register.bagian", "IGD");
			$this->db->where("register.kode_keluarpada !=", "IGDD");
			$this->db->where("register.kode_keluarpada !=", "IGDP");
			$this->db->group_end();
			$this->db->or_where("register.bagian", "INAP");
			$this->db->group_end();
		}

		if ($pelayanan == "IGD") {
			$this->db->where("register.bagian", "IGD");
			$this->db->group_start();	
			$this->db->where("register.kode_keluarpada", "IGDD");
			$this->db->or_where("register.kode_keluarpada", "IGDP");
			$this->db->group_end();
		}

		$this->db->where('register.no_rm', $rm);
		$this->db->where('register.tgl_keluar >=', $tgl1);
		$this->db->where('register.tgl_keluar <=', $tgl2);
		$this->db->order_by('register.tgl_keluar', 'ASC');
		$this->db->order_by('register.no_rm', 'ASC');
        $data = $this->db->get();
        return $data->result();
	}
	
	public function ambilheadproses() {

		$id = $this->input->get("id");
		
        $this->db->select("register.id as id, register.no_rm as no_rm, register.tglsetor as tglsetor, register.tgl_masuk as tgl_masuk, register.tgl_keluar as tgl_keluar, pasien.nama_pasien as nama, register.keluarpada as keluarpada, register.golongan as golongan, register.notransaksi as notransaksi, register.nama_dokter as nama_dokter, register.tgl_proses as tgl_proses");
        $this->db->from("register");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		$this->db->where('register.id', $id);
        $data = $this->db->get();
        return $data->row();
	}

	// public function datadiagnosa() {
	// 	$this->db->select("id, sebab2, icd_code, jenis_penyakit_local");
	// 	$this->db->from("mdiagnosa");
	// 	$data = $this->db->get();
	// 	return $data->result();
	// }

	public function datadiagnosa() {
		$this->db->select("id,icd_code, jenis_penyakit_local");
        $this->db->from("micd1");
        $this->db->where("jenis_penyakit_local is NOT NULL");
        $data = $this->db->get();
        return $data->result();
	}

	public function ambilicd() {
        $this->db->select("id,icd_code, jenis_penyakit_local");
        $this->db->from("micd1");
        $this->db->where("jenis_penyakit_local is NOT NULL");
		$this->db->order_by('icd_code', "asc");
        $data = $this->db->get();
        return $data->result();
    }

	public function datadiagnosabaris($id) {
		$this->db->select("id, sebab2, sebab, nodtd, icdlatin, nodaftar");
		$this->db->from("mdiagnosa");
		$this->db->where('id', $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function datadiagnosabaris2($id) {
		// $this->db->select("id, sebab2, sebab, nodtd, icdlatin, nodaftar");
		$this->db->from("micd1");
		$this->db->where('id', $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function datadiagnosaread($id) {
		$this->db->select("`id`, `no_rm`, `tgl_masuk`, `type`, `diagnosa`, `nodaftar`, `nodtd`, `notransaksi`, `icdlatin`");
		$this->db->from("pdiagnosa");
		$this->db->where('notransaksi', $id);
		$this->db->order_by('type', "desc");
		$data = $this->db->get();
		return $data->result();
	}

	public function simpandiagnosa() {
		$irm = $this->input->get("irm");
		$inp = $this->input->get("inp");
		$notrans = $this->input->get("notrans");
		$diag = $this->input->get("diag");
		$utama = $this->input->get("utama");
		$dtd = $this->input->get("dtd");
		$date1 = date_create($this->input->get("tglm"));
		$tglm = date_format($date1,"Y-m-d");
		$date2 = date_create($this->input->get("tglk"));
		$tglk = date_format($date2,"Y-m-d");
		$diagnosa=$this->input->get("diagindonesia");
		$datadiag = $this->datadiagnosabaris2($diag);
		$icdnya = $datadiag->icd_code;

		$datasimpan = array(
			'no_rm' => $irm,
			'tgl_masuk' => $tglm,
			'type' => gantiangka($utama),
			// 'diagnosa' => $datadiag->jenis_penyakit,
			'diagnosa' => $diagnosa,
			'nodaftar' => $datadiag->icd_code,
			// 'nodtd' => $datadiag->dtd,
			'nodtd' => $dtd,
			'notransaksi' => $notrans, 
			'icdlatin' => $datadiag->jenis_penyakit_local,
			'user1' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s")
		);
		$dt = $this->db->insert('pdiagnosa', $datasimpan);

		$dataubah = array(
			'jenis_penyakit' => $diagnosa,
			'dtd' => $dtd

		);
		$this->db->where('icd_code', $icdnya);
		$this->db->limit(1);
		$dt2 = $this->db->update('micd1', $dataubah);

		return $dt;
	}

	public function datadiagnosaeditread() {
		$id = $this->input->get("id");
		$this->db->select("`id`, `no_rm`, `tgl_masuk`, `type`, `diagnosa`, `nodaftar`, `nodtd`, `notransaksi`, `icdlatin`");
		$this->db->from("pdiagnosa");
		$this->db->where('id', $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function ubahdiagnosa() {
		$irm = $this->input->get("irm");
		$inp = $this->input->get("inp");
		$notrans = $this->input->get("notrans");
		$diag = $this->input->get("diag");
		$utama = $this->input->get("utama");
		$date1 = date_create($this->input->get("tglm"));
		$tglm = date_format($date1,"Y-m-d");
		$date2 = date_create($this->input->get("tglk"));
		$tglk = date_format($date2,"Y-m-d");

		$datadiag = $this->datadiagnosabaris2($diag);

		$dataubah = array(
			'type' => gantiangka($utama),
			'diagnosa' => $datadiag->sebab2,
			'nodaftar' => $datadiag->nodaftar,
			'nodtd' => $datadiag->nodtd,
			'notransaksi' => $notrans, 
			'icdlatin' => $datadiag->icdlatin,
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s")
		);
		$this->db->where('id', $this->input->get("id"));
		$dt = $this->db->update('pdiagnosa', $dataubah);
		return $dt;
	}

	public function hapusdiagnosa() {
		$id = $this->input->get("id");
		$this->db->where('id', $id);
		$dt = $this->db->delete('pdiagnosa');
		return $dt;
	}

	public function databrmread($id) {
		$this->db->select("`id`, `tglsetor`, `kondisistatus`, `lengkap`, `waktusetor`, `operasi`, `notransaksi`, `nama_dokter`, `jenislayanan`, tgl_proses");
		$this->db->from("register");
		$this->db->where('notransaksi', $id);
		$data = $this->db->get();
		return $data->result();
	}

	public function databrmreadtransaksi() {
		$id = $this->input->get("id");
		$this->db->select("`id`, tglsetor, `kondisistatus`, `lengkap`, `waktusetor`, `operasi`, `notransaksi`, identitastfrs, laporanpenting, autentifikasi, pencatatanbaik, diagnosautama, resume, ceknamadokter, cekttddokter, laporanoperasi, laporananastesi, persetujuanoperasi, jenislayanan, kode_dokter, nama_dokter, tgl_proses");
		$this->db->from("register");
		$this->db->where('id', $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function getdifftwodates() {
		$notrans = $this->input->get("notrans");
		$date = date_create($this->input->get("tglsetor"));
		$tgl = date_format($date,"Y-m-d");
		$query = $this->db->query("SELECT DATEDIFF('".$tgl."', tgl_keluar) as d FROM register WHERE notransaksi = '".$notrans."'");
		if ($query == null) {
			return 0;
		} else {
			return $query->result_array();
		}
	}

	public function ubahbrm() {
		$date = date_create($this->input->get("tglsetor"));
		$tgl = date_format($date,"Y-m-d");

		$date2 = date_create($this->input->get("tglproses"));
		$tgl_proses = date_format($date2,"Y-m-d");

		$op = $this->input->get("op");
		$kb = $this->input->get("kb");

		$kode_dokter=$this->input->get("kode_dokter");
		$nama_dokter=$this->input->get("nama_dokter");

		$jenislayanan=$this->input->get("jptext");

		if ($op == "2") {
			$dataop = array(
				'laporanoperasi' => gantiangka($this->input->get("lapo")),
				'laporananastesi' => gantiangka($this->input->get("lapa")),
				'persetujuanoperasi' => gantiangka($this->input->get("pero"))
			);
		} else {
			$dataop = array();
		}

		if ($kb == "2") {
			$datakb = array(
				'identitastfrs' => gantiangka($this->input->get("idtfrs")),
				'diagnosautama' => gantiangka($this->input->get("diagu")),
				'laporanpenting' => gantiangka($this->input->get("lapor")),
				'resume' => gantiangka($this->input->get("resume")),
				'autentifikasi' => gantiangka($this->input->get("aut")),
				'ceknamadokter' => gantiangka($this->input->get("nd")),
				'pencatatanbaik' => gantiangka($this->input->get("pb")),
				'cekttddokter' => gantiangka($this->input->get("ttd"))
			);
		} else {
			$datakb = array();
		}

		$dataubah = array(
			'tglsetor' => $tgl,
			'tgl_proses' => $tgl_proses,
			'kondisistatus' => $this->input->get("ks"),
			'lengkap' => $kb,
			'waktusetor' => $this->input->get("ts"),
			'operasi' => $op, 
			'kode_dokter' => $kode_dokter,
			'nama_dokter' => $nama_dokter,
			'jenislayanan' => $jenislayanan,
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s")
		);
		$resone = array_merge($dataubah, $datakb);
		$restwo = array_merge($resone, $dataop);
		$this->db->where('id', $this->input->get("id"));
		$dt = $this->db->update('register', $restwo);
		return $dt;
	}

}
