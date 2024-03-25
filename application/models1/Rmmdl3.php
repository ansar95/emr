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
		$diagnosa=$this->input->get("latin");
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

	public function cariPasienDokter($kodedokter,$tglperiksa) {
		$this->db->select("register.no_rm as no_rm, register_detail.nama_kelas as nama_kelas, register_detail.kode_unit as kode_unit, register_detail.nama_unit as nama_unit, register.tgl_masuk as tgl_masuk, register.rujukan as rujukan, register.golongan as golongan, register_detail.no_transaksi_secondary as notransaksi, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register_detail.kode_dokter as kode_dokter, register_detail.nama_dokter as nama_dokter, register_detail.nama_unit, register_detail.id as id, register_detail.pindah as pindah,register_detail.status as status,register_detail.proses as proses, register_detail.pulang as pulang, register_detail.no_antrian as no_antrian, pasien.title as title, register.kode_booking as kode_booking, register.taskid4 as taskid4, register_detail.inap_to_poli as inap_to_poli, register.id as idregister, register.berkas as berkas, register.nosep, pasien.no_askes, pasien.nik ");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		$this->db->where("register.bagian","JALAN");
		$this->db->where("register_detail.kode_dokter",$kodedokter);
		$this->db->where("register_detail.tgl_masuk_kamar",$tglperiksa);
		$this->db->order_by("register_detail.kode_unit");
		$this->db->order_by("register_detail.id");
		$query = $this->db->get();
		if ($query) {
			return $query->result();
		} else {
			// Tangani kesalahan database di sini
			return array(); // atau kembalikan pesan kesalahan
		}
	}
	public function cariPasienDokterFisio($tglperiksa) {
		$this->db->select("register.no_rm as no_rm, register_detail.nama_kelas as nama_kelas, register_detail.kode_unit as kode_unit, register_detail.nama_unit as nama_unit, register.tgl_masuk as tgl_masuk, register.rujukan as rujukan, register.golongan as golongan, register_detail.no_transaksi_secondary as notransaksi, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register_detail.kode_dokter as kode_dokter, register_detail.nama_dokter as nama_dokter, register_detail.nama_unit, register_detail.id as id, register_detail.pindah as pindah,register_detail.status as status,register_detail.proses as proses, register_detail.pulang as pulang, register_detail.no_antrian as no_antrian, pasien.title as title, register.kode_booking as kode_booking, register.taskid4 as taskid4, register_detail.inap_to_poli as inap_to_poli, register.id as idregister, register.berkas as berkas, register.nosep, pasien.no_askes, pasien.nik ");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		$this->db->where("register.bagian","JALAN");
		$this->db->where("register_detail.kode_unit",'REME');
		$this->db->where("register_detail.tgl_masuk_kamar",$tglperiksa);
		$this->db->order_by("register_detail.kode_unit");
		$this->db->order_by("register_detail.id");
		$query = $this->db->get();
		if ($query) {
			return $query->result();
		} else {
			// Tangani kesalahan database di sini
			return array(); // atau kembalikan pesan kesalahan
		}
	}

	public function cariPasienDokter_next($kodedokter,$tglperiksa) {
		$this->db->select("register.no_rm as no_rm, register_detail.nama_kelas as nama_kelas, register_detail.kode_unit as kode_unit, register_detail.nama_unit as nama_unit, register.tgl_masuk as tgl_masuk, register.rujukan as rujukan, register.golongan as golongan, register_detail.no_transaksi_secondary as notransaksi, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register_detail.kode_dokter as kode_dokter, register_detail.nama_dokter as nama_dokter, register_detail.nama_unit, register_detail.id as id, register_detail.pindah as pindah,register_detail.status as status,register_detail.proses as proses, register_detail.pulang as pulang, register_detail.no_antrian as no_antrian, pasien.title as title, register.kode_booking as kode_booking, register.taskid4 as taskid4, register_detail.inap_to_poli as inap_to_poli, register.id as idregister, register.berkas as berkas, register.nosep, pasien.no_askes, pasien.nik ");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		$this->db->where("register_detail.kode_dokter",$kodedokter);
		$this->db->where("register.bagian","JALAN");
		$this->db->where("register_detail.tgl_masuk_kamar > ",$tglperiksa);
		$this->db->order_by("register_detail.kode_unit");
		$this->db->order_by("register_detail.tgl_masuk_kamar");
		$query = $this->db->get();
		if ($query) {
			return $query->result();
		} else {
			// Tangani kesalahan database di sini
			return array(); // atau kembalikan pesan kesalahan
		}
	}
	
	public function cariPasienDokterFisio_next($tglperiksa) {
		$this->db->select("register.no_rm as no_rm, register_detail.nama_kelas as nama_kelas, register_detail.kode_unit as kode_unit, register_detail.nama_unit as nama_unit, register.tgl_masuk as tgl_masuk, register.rujukan as rujukan, register.golongan as golongan, register_detail.no_transaksi_secondary as notransaksi, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register_detail.kode_dokter as kode_dokter, register_detail.nama_dokter as nama_dokter, register_detail.nama_unit, register_detail.id as id, register_detail.pindah as pindah,register_detail.status as status,register_detail.proses as proses, register_detail.pulang as pulang, register_detail.no_antrian as no_antrian, pasien.title as title, register.kode_booking as kode_booking, register.taskid4 as taskid4, register_detail.inap_to_poli as inap_to_poli, register.id as idregister, register.berkas as berkas, register.nosep, pasien.no_askes, pasien.nik ");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		// $this->db->where("register_detail.kode_dokter",$kodedokter);
		$this->db->where("register_detail.kode_unit",'REME');
		$this->db->where("register.bagian","JALAN");
		$this->db->where("register_detail.tgl_masuk_kamar > ",$tglperiksa);
		$this->db->order_by("register_detail.kode_unit");
		$this->db->order_by("register_detail.tgl_masuk_kamar");
		$query = $this->db->get();
		if ($query) {
			return $query->result();
		} else {
			// Tangani kesalahan database di sini
			return array(); // atau kembalikan pesan kesalahan
		}
	}

	public function cariPasienRajal_old($kodedokter,$tglperiksa) {
		$tglSebelumnya = date('Y-m-d', strtotime('-3 months', strtotime($tglperiksa)));
		$this->db->select("register.no_rm as no_rm, register_detail.nama_kelas as nama_kelas, register_detail.kode_unit as kode_unit, register_detail.nama_unit as nama_unit, register.tgl_masuk as tgl_masuk, register.rujukan as rujukan, register.golongan as golongan, register_detail.no_transaksi_secondary as notransaksi, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register_detail.kode_dokter as kode_dokter, register_detail.nama_dokter as nama_dokter, register_detail.nama_unit, register_detail.id as id, register_detail.pindah as pindah,register_detail.status as status,register_detail.proses as proses, register_detail.pulang as pulang, register_detail.no_antrian as no_antrian, pasien.title as title, register.kode_booking as kode_booking, register.taskid4 as taskid4, register_detail.inap_to_poli as inap_to_poli, register.id as idregister, register.berkas as berkas, register.nosep, pasien.no_askes, pasien.nik, register.bagian as bagian ");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		$this->db->where("register_detail.kode_dokter",$kodedokter);
		$this->db->where("register.bagian","JALAN");
		$this->db->where("register_detail.tgl_masuk_kamar < ",$tglperiksa);
		$this->db->where("register_detail.tgl_masuk_kamar >=", $tglSebelumnya);
		$this->db->order_by("register_detail.tgl_masuk_kamar","DESC");
		// $this->db->order_by("register_detail.kode_unit");
		$query = $this->db->get();
		if ($query) {
			return $query->result();
		} else {
			// Tangani kesalahan database di sini
			return array(); // atau kembalikan pesan kesalahan
		}
	}
	
	public function cariHistoriPasien($no_rm) {
		// $tglSebelumnya = date('Y-m-d', strtotime('-3 months', strtotime($tglperiksa)));
		$this->db->select("register.no_rm as no_rm, register_detail.nama_kelas as nama_kelas, register_detail.kode_unit as kode_unit, register_detail.nama_unit as nama_unit, register.tgl_masuk as tgl_masuk, register.rujukan as rujukan, register.golongan as golongan, register_detail.no_transaksi_secondary as notransaksi, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register_detail.kode_dokter as kode_dokter, register_detail.nama_dokter as nama_dokter, register_detail.nama_unit, register_detail.id as id, register_detail.pindah as pindah,register_detail.status as status,register_detail.proses as proses, register_detail.pulang as pulang, register_detail.no_antrian as no_antrian, pasien.title as title, register.kode_booking as kode_booking, register.taskid4 as taskid4, register_detail.inap_to_poli as inap_to_poli, register.id as idregister, register.berkas as berkas, register.nosep, pasien.no_askes, pasien.nik ");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		// $this->db->where("register_detail.kode_dokter",$kodedokter);
		// $this->db->where("register.status",1);
		$this->db->where("register.no_rm",$no_rm);
		$this->db->order_by("register_detail.tgl_masuk_kamar","DESC");
		$query = $this->db->get();
		if ($query) {
			return $query->result();
		} else {
			// Tangani kesalahan database di sini
			return array(); // atau kembalikan pesan kesalahan
		}
	}
	

	public function cariPasienRajalFisio_old($tglperiksa) {
		$tglSebelumnya = date('Y-m-d', strtotime('-3 months', strtotime($tglperiksa)));
		$this->db->select("register.no_rm as no_rm, register_detail.nama_kelas as nama_kelas, register_detail.kode_unit as kode_unit, register_detail.nama_unit as nama_unit, register.tgl_masuk as tgl_masuk, register.rujukan as rujukan, register.golongan as golongan, register_detail.no_transaksi_secondary as notransaksi, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register_detail.kode_dokter as kode_dokter, register_detail.nama_dokter as nama_dokter, register_detail.nama_unit, register_detail.id as id, register_detail.pindah as pindah,register_detail.status as status,register_detail.proses as proses, register_detail.pulang as pulang, register_detail.no_antrian as no_antrian, pasien.title as title, register.kode_booking as kode_booking, register.taskid4 as taskid4, register_detail.inap_to_poli as inap_to_poli, register.id as idregister, register.berkas as berkas, register.nosep, pasien.no_askes, pasien.nik ");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		// $this->db->where("register_detail.kode_dokter",$kodedokter);
		$this->db->where("register_detail.kode_unit",'REME');
		$this->db->where("register.bagian","JALAN");
		$this->db->where("register_detail.tgl_masuk_kamar < ",$tglperiksa);
		$this->db->where("register_detail.tgl_masuk_kamar >=", $tglSebelumnya);
		$this->db->order_by("register_detail.tgl_masuk_kamar","DESC");
		// $this->db->order_by("register_detail.kode_unit");
		$query = $this->db->get();
		if ($query) {
			return $query->result();
		} else {
			// Tangani kesalahan database di sini
			return array(); // atau kembalikan pesan kesalahan
		}
	}

	public function cariPasienRanap() {
		$this->db->select("register.no_rm as no_rm, register_detail.nama_kelas as nama_kelas, register_detail.kode_unit as kode_unit, register_detail.nama_unit as nama_unit, register.tgl_masuk as tgl_masuk, register.rujukan as rujukan, register.golongan as golongan, register_detail.no_transaksi_secondary as notransaksi, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register_detail.kode_dokter as kode_dokter, register_detail.nama_dokter as nama_dokter, register_detail.nama_unit, register_detail.id as id, register_detail.pindah as pindah,register_detail.status as status,register_detail.proses as proses, register_detail.pulang as pulang, register_detail.no_antrian as no_antrian, pasien.title as title, register.kode_booking as kode_booking, register.taskid4 as taskid4, register_detail.inap_to_poli as inap_to_poli, register.id as idregister, register.berkas as berkas, register.nosep, pasien.no_askes, pasien.nik ");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		$this->db->where('register.status', 0)
		->group_start()
			->where('register.bagian !=', 'JALAN')
			->or_group_start()
				->where('register.bagian', 'IGD')
				->group_start()
					->where('kode_keluarpada !=', 'IGDD')
					->where('kode_keluarpada !=', 'IGDDP')
					->where('kode_keluarpada !=', 'KMBS')
					->where('kode_keluarpada !=', '')
					->where('kode_keluarpada !=', NULL)
				->group_end()
			->group_end()
		->group_end();

		// $this->db->group_start();
        // 	$this->db->or_where("register.bagian", "IGD");
        // 	$this->db->group_start();
		// 	$this->db->where("kode_keluarpada !=", "IGDD");
		// 	$this->db->where("kode_keluarpada !=", "IGDDP");
		// 	$this->db->where("kode_keluarpada !=", "KMBS");
        // 	$this->db->group_end();
		// $this->db->group_end();
		$this->db->where("register_detail.kode_unit !=",'IGDD');
		$this->db->where("register_detail.kode_unit !=",'IGDP');
		$this->db->where("register_detail.kode_unit !=",'KMBS');
		$a=$this->session->userdata("kodedokter");
		$units = json_decode(stripslashes($this->session->userdata("kodeunit")));

		if ($this->session->userdata("kodedokter") == 'XXXXXX') {
			$this->db->where_in("register_detail.kode_unit",$units);
		} else if ($this->session->userdata("kodedokter") == 'GIZI') {
				// disini filter gizi
		} else {
			$this->db->where("register_detail.kode_dokter",$this->session->userdata("kodedokter"));
		}
		
		$this->db->order_by("register_detail.kode_unit");
		$this->db->order_by("register_detail.tgl_masuk","DESC");
		$this->db->order_by("register_detail.tgl_masuk_kamar","DESC");
		$query = $this->db->get();
		if ($query) {
			return $query->result();
		} else {
			// Tangani kesalahan database di sini
			return array(); // atau kembalikan pesan kesalahan
		}
	}

	public function cariDataPasienSesuaiID($id) {
		$this->db->select("register.no_rm as no_rm, register_detail.nama_kelas as nama_kelas, register_detail.kode_unit as kode_unit, register_detail.nama_unit as nama_unit, register.tgl_masuk as tgl_masuk, register.rujukan as rujukan, register.golongan as golongan, register_detail.no_transaksi_secondary as notransaksi, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register_detail.kode_dokter as kode_dokter, register_detail.nama_dokter as nama_dokter, register_detail.nama_unit, register_detail.id as id, register_detail.pindah as pindah,register_detail.status as status,register_detail.proses as proses, register_detail.pulang as pulang, register_detail.no_antrian as no_antrian, pasien.title as title, register.kode_booking as kode_booking, register.taskid4 as taskid4, register_detail.inap_to_poli as inap_to_poli, register.id as idregister, register.berkas as berkas, register.nosep, pasien.no_askes, pasien.nik, pasien.agama ");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		// $this->db->where("register_detail.kode_dokter",$kodedokter);
		// $this->db->where("register_detail.tgl_masuk_kamar > ",$tglperiksa);
		$this->db->where("register_detail.id",$id);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query) {
			// return $query->result();
			return $query->row();
		} else {
			// Tangani kesalahan database di sini
			return array(); // atau kembalikan pesan kesalahan
		}
	}

	public function cariDataIgdPasien($id) {
		$this->db->select("id");
		$this->db->from("register_detail");
		$this->db->where("register_detail.kode_unit",'IGD');


	}

	public function cariDataPasienSesuaiNormNotransaksi($no_rm,$notransaksi) {
		$this->db->select("register.no_rm as no_rm, register_detail.nama_kelas as nama_kelas, register_detail.kode_unit as kode_unit, register_detail.nama_unit as nama_unit, register.tgl_masuk as tgl_masuk, register.rujukan as rujukan, register.golongan as golongan, register_detail.no_transaksi_secondary as notransaksi, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register_detail.kode_dokter as kode_dokter, register_detail.nama_dokter as nama_dokter, register_detail.nama_unit, register_detail.id as id, register_detail.pindah as pindah,register_detail.status as status,register_detail.proses as proses, register_detail.pulang as pulang, register_detail.no_antrian as no_antrian, pasien.title as title, register.kode_booking as kode_booking, register.taskid4 as taskid4, register_detail.inap_to_poli as inap_to_poli, register.id as idregister, register.berkas as berkas, register.nosep, pasien.no_askes, pasien.nik ");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		$this->db->where("register_detail.notransaksi",$notransaksi);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query) {
			// return $query->result();
			return $query->row();
		} else {
			// Tangani kesalahan database di sini
			return array(); // atau kembalikan pesan kesalahan
		}
	}
	
	public function caridataRM($no_rm) {
        $this->db->select("nama_pasien,nik");
        $this->db->from("pasien");
		$this->db->where("no_rm", $no_rm);
        $data = $this->db->get();
        return $data->row();
    }

	public function cariPasienOperasi($tgl_operasi) {
			// $date = date_create($this->input->get("tgl"));
			// $tgl = date_format($tgl_operasi,"Y-m-d");
			$this->db->select("register_instalasi.no_rm as no_rm, register_instalasi.nama_pasien as nama_pasien, register_instalasi.kode_unitR as kode_unitR, register_instalasi.nama_unitR as nama_unitR, register_instalasi.kode_unit as kode_unit, register_instalasi.nama_unit as nama_unit, register.golongan as golongan, register_instalasi.nama_dokter as nama_dokter, register_instalasi.id as id, register_instalasi.notransaksi as notransaksi, register_instalasi.notransaksi_IN as notransaksi_IN, register_instalasi.rujukan as rujukan, register_instalasi.tanggal as tanggal, register_instalasi.kode_unit_pelaksana as kode_unit_pelaksana, register_instalasi.nama_unit_pelaksana as nama_unit_pelaksana, register_instalasi.kode_ruang as kode_ruang, register_instalasi.nama_ruang as nama_ruang");
			$this->db->from("register_instalasi");
			$this->db->join("register", "register_instalasi.notransaksi = register.notransaksi");
			$this->db->where("register_instalasi.tanggal", $tgl_operasi);
			$this->db->where("register_instalasi.kode_unit", 'IOPERA');
			$data = $this->db->get();
			return $data->result();
    }
	public function cariPasienOperasiRM($tgl_operasi,$no_rm_operasi) {
		// $date = date_create($this->input->get("tgl"));
		// $tgl = date_format($tgl_operasi,"Y-m-d");
		$this->db->select("register_instalasi.no_rm as no_rm, register_instalasi.nama_pasien as nama_pasien, register_instalasi.kode_unitR as kode_unitR, register_instalasi.nama_unitR as nama_unitR, register_instalasi.kode_unit as kode_unit, register_instalasi.nama_unit as nama_unit, register.golongan as golongan, register_instalasi.nama_dokter as nama_dokter, register_instalasi.id as id, register_instalasi.notransaksi as notransaksi, register_instalasi.notransaksi_IN as notransaksi_IN, register_instalasi.rujukan as rujukan, register_instalasi.tanggal as tanggal, register_instalasi.kode_unit_pelaksana as kode_unit_pelaksana, register_instalasi.nama_unit_pelaksana as nama_unit_pelaksana, register_instalasi.kode_ruang as kode_ruang, register_instalasi.nama_ruang as nama_ruang");
		$this->db->from("register_instalasi");
		$this->db->join("register", "register_instalasi.notransaksi = register.notransaksi");
		$this->db->where("register_instalasi.tanggal", $tgl_operasi);
		$this->db->where("register_instalasi.no_rm", $no_rm_operasi);
		$this->db->where("register_instalasi.kode_unit", 'IOPERA');
		$data = $this->db->get();
		return $data->result();
}


public function cariPasienRanapKonsul($kodedokter) {
	$this->db->select("register.no_rm as no_rm, register_detail.nama_kelas as nama_kelas, register_detail.kode_unit as kode_unit, register_detail.nama_unit as nama_unit, register.tgl_masuk as tgl_masuk, register.rujukan as rujukan, register.golongan as golongan, register_detail.no_transaksi_secondary as notransaksi, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register_detail.kode_dokter as kode_dokter, register_detail.nama_dokter as nama_dokter, register_detail.nama_unit, register_detail.id as id, register_detail.pindah as pindah,register_detail.status as status,register_detail.proses as proses, register_detail.pulang as pulang, register_detail.no_antrian as no_antrian, pasien.title as title, register.kode_booking as kode_booking, register.taskid4 as taskid4, register_detail.inap_to_poli as inap_to_poli, register.id as idregister, register.berkas as berkas, register.nosep, pasien.no_askes, pasien.nik ");
		$this->db->from("plembarkonsulranap");
		$this->db->join("register", "register.notransaksi = plembarkonsulranap.notransaksi");
		$this->db->join("register_detail", "register_detail.notransaksi = plembarkonsulranap.notransaksi");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
	$this->db->where("plembarkonsulranap.kode_dokter_jawab", $kodedokter);
	$this->db->order_by("plembarkonsulranap.no_rm", "DESC");
	$data = $this->db->get();
	return $data->result();
}

}
