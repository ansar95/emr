<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rmemdl extends CI_Model {
	
	public function panggilsoap() {
        $notrans = $this->input->get("notrans");
        $unit = $this->input->get("unit");
        $this->db->from("psoap");
		$this->db->where('notransaksi', $notrans);
		$this->db->where('kode_unit', $unit);
        $data = $this->db->get();
		return $data->row();
	}

	public function panggilhissoap($no_rm) {
        $this->db->from("psoap");
		$this->db->where('no_rm', $no_rm);
		$this->db->order_by('tanggal', "desc");
        $data = $this->db->get();
		return $data->result();
	}

	// public function panggilhisassesmen($no_rm) {
    //     $this->db->from("assesmen");
	// 	$this->db->where('no_rm', $no_rm);
	// 	$this->db->order_by('tglAssesmen', "desc");
    //     $data = $this->db->get();
	// 	return $data->result();
	// }

	public function panggilsoappasienhis() {
        $id = $this->input->get("id");
        $this->db->from("psoap");
		$this->db->where('id', $id);
        $data = $this->db->get();
		return $data->row();
	}

	

	public function pasiendata_soaphis() {
		$id = $this->input->get("id");
		$this->db->select("pasien.nama_pasien as nama_pasien, pasien.no_rm as no_rm, psoap.notransaksi as notransaksi , psoap.nama_unit as nama_unit, psoap.tanggal as tanggal, psoap.nama_dokter");
		$this->db->from("pasien");
		$this->db->join("psoap", "pasien.no_rm = psoap.no_rm");
		$this->db->where("psoap.id", $id);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function cariAssesmenAwal() {
		$notransaksi = $this->input->get("notransaksi");
		$no_rm = $this->input->get("no_rm");
		$no_askes = $this->input->get("no_askes");
		$query = $this->db->query("SELECT * from ");
		if ($query == null) {
			return 0;
		} else {
			return $query->result_array();
		}
	}

	public function panggilresepdetail($no_rm) {
		$tglhariini= date("Y-m-d");
		$this->db->select("resep_detail.namaobat,resep_detail.qty,resep_detail.satuanpakai,resep_detail.takaran,resep_detail.caramakan, resep_detail.idobat, resep_detail.kodeobat,resep_header.tglresep, resep_header.nama_unit, resep_header.kode_unit as kode_unit, resep_header.nama_dokter,resep_header.kode_dokter,resep_detail.idnoresep as id, resep_header.noresep as noresep, resep_detail.pagi as pagi, resep_detail.siang as siang, resep_detail.malam as malam, resep_detail.keterangan as keterangan, resep_detail.caramakan as caramakan, resep_detail.catatanracikan, resep_header.jamselesai");
		$this->db->from("resep_detail");
		$this->db->join("resep_header", "resep_header.noresep = resep_detail.noresep");
		$this->db->where("resep_header.no_rm", $no_rm);
		// $this->db->where("resep_header.tglresep <", $tglhariini);
		$this->db->where("resep_detail.komponen_racikan",0);
		$this->db->order_by("resep_header.tglresep", 'DESC');
		$this->db->order_by("resep_header.noresep", 'DESC');
		$data = $this->db->get();
		return $data->result();
	}

	public function panggilHistoryDiagnosa($no_rm) {
		$this->db->select("pdiagnosa.id, pdiagnosa.no_rm, pdiagnosa.tgl_masuk, pdiagnosa.type,pdiagnosa.diagnosa,pdiagnosa.nodaftar,pdiagnosa.nodtd, pdiagnosa.notransaksi, pdiagnosa.icdlatin");
		$this->db->from("pdiagnosa");
		$this->db->where('no_rm', $no_rm);
		$this->db->order_by('tgl_masuk', "desc");
		$this->db->order_by('type', "desc");
		$data = $this->db->get();
		return $data->result();
	}

	public function panggilHistoryDiagnosa_hariini($no_rm) {
		$tglHariIni=date("Y-m-d");
		$this->db->select("pdiagnosa.id, pdiagnosa.no_rm, pdiagnosa.tgl_masuk, pdiagnosa.type,pdiagnosa.diagnosa,pdiagnosa.nodaftar,pdiagnosa.nodtd, pdiagnosa.notransaksi, pdiagnosa.icdlatin");
		$this->db->from("pdiagnosa");
		$this->db->where("no_rm", $no_rm);
		$this->db->where("tgl_masuk", $tglHariIni);;
		$this->db->order_by("type", "DESC");
		$data = $this->db->get();
		return $data->result();
	}

	public function panggilHistoryDiagnosa_ranap($no_rm,$notransaksi) {
		// $tglHariIni=date("Y-m-d");
		$this->db->select("pdiagnosa.id, pdiagnosa.no_rm, pdiagnosa.tgl_masuk, pdiagnosa.type,pdiagnosa.diagnosa,pdiagnosa.nodaftar,pdiagnosa.nodtd, pdiagnosa.notransaksi, pdiagnosa.icdlatin");
		$this->db->from("pdiagnosa");
		$this->db->where("no_rm", $no_rm);
		$this->db->where("notransaksi", $notransaksi);
		$this->db->order_by("type", "DESC");
		$data = $this->db->get();
		return $data->result();
	}

	public function panggilHistoryDiagnosa_historitanggal($no_rm,$tglhistori) {
		$this->db->select("pdiagnosa.id, pdiagnosa.no_rm, pdiagnosa.tgl_masuk, pdiagnosa.type,pdiagnosa.diagnosa,pdiagnosa.nodaftar,pdiagnosa.nodtd, pdiagnosa.notransaksi, pdiagnosa.icdlatin");
		$this->db->from("pdiagnosa");
		$this->db->where("no_rm", $no_rm);
		$this->db->where("tgl_masuk", $tglhistori);;
		$this->db->order_by("type", "DESC");
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilDataOrderDiagId($id) {
		$this->db->select("pdiagnosa.id, pdiagnosa.no_rm, pdiagnosa.tgl_masuk, pdiagnosa.type,pdiagnosa.diagnosa, pdiagnosa.nodaftar,pdiagnosa.nodtd, pdiagnosa.notransaksi, pdiagnosa.icdlatin");
		$this->db->from("pdiagnosa");
		$this->db->where('id', $id);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function panggilresepdetail_hariini($no_rm,$kode_dokter) {
		$tglHariIni=date("Y-m-d");
		$this->db->select("resep_detail.namaobat,resep_detail.qty,resep_detail.satuanpakai,resep_detail.takaran,resep_detail.caramakan, resep_detail.idobat, resep_detail.kodeobat,resep_header.tglresep, resep_header.nama_unit, resep_header.nama_dokter,resep_header.kode_dokter,resep_detail.idnoresep as id, resep_detail.pagi, resep_detail.siang, resep_detail.malam, resep_detail.keterangan , resep_detail.catatanracikan ");
		$this->db->from("resep_detail");
		$this->db->join("resep_header", "resep_header.noresep = resep_detail.noresep",'left');
		$this->db->where("resep_header.no_rm", $no_rm);
		$this->db->where("resep_header.tglresep", $tglHariIni);
		$this->db->where("resep_header.kode_dokter", $kode_dokter);
		$this->db->where("resep_detail.komponen_racikan", 0);
		$this->db->order_by("resep_detail.idnoresep", 'ASC');
		$data = $this->db->get();
		return $data->result();
	}

	public function panggilresepdetail_hariini_ranap($no_rm) {
		$tglHariIni=date("Y-m-d");
		$this->db->select("resep_detail.namaobat,resep_detail.qty,resep_detail.satuanpakai,resep_detail.takaran,resep_detail.caramakan, resep_detail.idobat, resep_detail.kodeobat,resep_header.tglresep, resep_header.nama_unit, resep_header.nama_dokter,resep_header.kode_dokter,resep_detail.idnoresep as id, resep_detail.pagi, resep_detail.siang, resep_detail.malam, resep_detail.keterangan , resep_detail.catatanracikan,resep_header.noresep as noresep ");
		$this->db->from("resep_detail");
		$this->db->join("resep_header", "resep_header.noresep = resep_detail.noresep","right");
		$this->db->where("resep_header.no_rm", $no_rm);
		$this->db->where("resep_header.tglresep", $tglHariIni);
		// $this->db->where("resep_detail.komponen_racikan", 0);
		// $this->db->order_by("resep_detail.idnoresep", 'ASC');
		$data = $this->db->get();
		return $data->result();
	}

	public function panggilresepdetail_historitanggal($no_rm,$kode_dokter,$tglhistori) {
		// $tglHariIni=date("Y-m-d");
		$this->db->select("resep_detail.namaobat,resep_detail.qty,resep_detail.satuanpakai,resep_detail.takaran,resep_detail.caramakan, resep_detail.idobat, resep_detail.kodeobat,resep_header.tglresep, resep_header.nama_unit, resep_header.nama_dokter,resep_header.kode_dokter,resep_detail.idnoresep as id, resep_detail.pagi, resep_detail.siang, resep_detail.malam, resep_detail.keterangan , resep_detail.catatanracikan ");
		$this->db->from("resep_detail");
		$this->db->join("resep_header", "resep_header.noresep = resep_detail.noresep");
		$this->db->where("resep_header.no_rm", $no_rm);
		$this->db->where("resep_header.tglresep", $tglhistori);
		$this->db->where("resep_header.kode_dokter", $kode_dokter);
		$this->db->where("resep_detail.komponen_racikan", 0);
		$this->db->order_by("resep_detail.idnoresep", 'ASC');
		$data = $this->db->get();
		return $data->result();
	}

	public function panggilhislab($no_rm) {
		$this->db->select("ptindakan_instalasi.id,register_instalasi.tanggal,mtindakan.tindakan as namatindakan,mtindakan.jasas,mtindakan.jasap, register_instalasi.kode_dokter, register_instalasi.nama_dokter, register_instalasi.nama_unitR, register_instalasi.notransaksi as notransaksi, register_instalasi.notransaksi_IN as notransaksi_IN");
		$this->db->from("ptindakan_instalasi");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
		$this->db->join("register_instalasi", "register_instalasi.notransaksi_IN = ptindakan_instalasi.notransaksi_IN");
		$this->db->where("ptindakan_instalasi.no_rm", $no_rm);
		$this->db->where("ptindakan_instalasi.kode_unit", 'LABS');
		$this->db->order_by("ptindakan_instalasi.tanggal", 'DESC');
		$data = $this->db->get();
		return $data->result();
	}


	public function panggillabdetail_hariini($no_rm,$kode_dokter) {
		$tglHariIni=date("Y-m-d");
		$this->db->select("ptindakan_instalasi.id,register_instalasi.tanggal,mtindakan.tindakan as namatindakan,mtindakan.jasas,mtindakan.jasap, register_instalasi.kode_dokter, register_instalasi.nama_dokter, register_instalasi.nama_unitR , register_instalasi.notransaksi as notransaksi, register_instalasi.notransaksi_IN as notransaksi_IN");
		$this->db->from("ptindakan_instalasi");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
		$this->db->join("register_instalasi", "register_instalasi.notransaksi_IN = ptindakan_instalasi.notransaksi_IN");
		$this->db->where("ptindakan_instalasi.no_rm", $no_rm);
		$this->db->where("ptindakan_instalasi.kode_unit", 'LABS');
		$this->db->where("ptindakan_instalasi.tanggal", $tglHariIni);
		$this->db->where("register_instalasi.kode_dokter", $kode_dokter);
		$data = $this->db->get();
		return $data->result();
	}

	public function panggillabdetail_historitanggal($no_rm,$kode_dokter,$tglhistori) {
		$this->db->select("ptindakan_instalasi.id,register_instalasi.tanggal,mtindakan.tindakan as namatindakan,mtindakan.jasas,mtindakan.jasap, register_instalasi.kode_dokter, register_instalasi.nama_dokter, register_instalasi.nama_unitR , register_instalasi.notransaksi as notransaksi, register_instalasi.notransaksi_IN as notransaksi_IN");
		$this->db->from("ptindakan_instalasi");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
		$this->db->join("register_instalasi", "register_instalasi.notransaksi_IN = ptindakan_instalasi.notransaksi_IN");
		$this->db->where("ptindakan_instalasi.no_rm", $no_rm);
		$this->db->where("ptindakan_instalasi.kode_unit", 'LABS');
		$this->db->where("ptindakan_instalasi.tanggal", $tglhistori);
		$this->db->where("register_instalasi.kode_dokter", $kode_dokter);
		$data = $this->db->get();
		return $data->result();
	}

	public function panggilraddetail_hariini($no_rm,$kode_dokter) {
		$tglHariIni=date("Y-m-d");
		$this->db->select("ptindakan_instalasi.id,register_instalasi.tanggal,mtindakan.tindakan as namatindakan,mtindakan.jasas,mtindakan.jasap, register_instalasi.kode_dokter, register_instalasi.nama_dokter, register_instalasi.nama_unitR , register_instalasi.notransaksi as notransaksi, register_instalasi.notransaksi_IN as notransaksi_IN");
		$this->db->from("ptindakan_instalasi");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
		$this->db->join("register_instalasi", "register_instalasi.notransaksi_IN = ptindakan_instalasi.notransaksi_IN");
		$this->db->where("ptindakan_instalasi.no_rm", $no_rm);
		$this->db->where("ptindakan_instalasi.kode_unit", 'RDGL');
		$this->db->where("ptindakan_instalasi.tanggal", $tglHariIni);
		$this->db->where("register_instalasi.kode_dokter", $kode_dokter);
		$data = $this->db->get();
		return $data->result();
	}

	public function panggilraddetail_historitanggal($no_rm,$kode_dokter,$tglhistori) {
		$this->db->select("ptindakan_instalasi.id,register_instalasi.tanggal,mtindakan.tindakan as namatindakan,mtindakan.jasas,mtindakan.jasap, register_instalasi.kode_dokter, register_instalasi.nama_dokter, register_instalasi.nama_unitR , register_instalasi.notransaksi as notransaksi, register_instalasi.notransaksi_IN as notransaksi_IN");
		$this->db->from("ptindakan_instalasi");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
		$this->db->join("register_instalasi", "register_instalasi.notransaksi_IN = ptindakan_instalasi.notransaksi_IN");
		$this->db->where("ptindakan_instalasi.no_rm", $no_rm);
		$this->db->where("ptindakan_instalasi.kode_unit", 'RDGL');
		$this->db->where("ptindakan_instalasi.tanggal", $tglhistori);
		$this->db->where("register_instalasi.kode_dokter", $kode_dokter);
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilDataOrderLab($id) {
		$this->db->select("ptindakan_instalasi.id, mtindakan.tindakan as namatindakan");
		$this->db->from("ptindakan_instalasi");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
		$this->db->where("ptindakan_instalasi.id", $id);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function ambilDataOrderRad($id) {
		$this->db->select("ptindakan_instalasi.id, mtindakan.tindakan as namatindakan");
		$this->db->from("ptindakan_instalasi");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
		$this->db->where("ptindakan_instalasi.id", $id);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function panggilhisrad($no_rm) {
		$this->db->select("ptindakan_instalasi.id,register_instalasi.tanggal,mtindakan.tindakan as namatindakan,mtindakan.jasas,mtindakan.jasap, register_instalasi.kode_dokter, register_instalasi.nama_dokter, register_instalasi.nama_unitR");
		$this->db->from("ptindakan_instalasi");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
		$this->db->join("register_instalasi", "register_instalasi.notransaksi_IN = ptindakan_instalasi.notransaksi_IN");
		$this->db->where("ptindakan_instalasi.no_rm", $no_rm);
		$this->db->where("ptindakan_instalasi.kode_unit", 'RDGL');
		$this->db->order_by("ptindakan_instalasi.tanggal", 'DESC');
		$data = $this->db->get();
		return $data->result();
	}

	public function panggilhisinstalasi($no_rm) {
		$this->db->select("register_instalasi.id,register_instalasi.tanggal, register_instalasi.kode_dokter, register_instalasi.nama_dokter, register_instalasi.nama_unitR as nama_unit_pemesan, register_instalasi.kode_unit, register_instalasi.nama_unit");
		$this->db->from("register_instalasi");
		$this->db->where("register_instalasi.no_rm", $no_rm);
		$this->db->group_start(); // Mulai kelompok kondisi OR
			$this->db->where("register_instalasi.kode_unit", 'LABS');
			$this->db->or_where("register_instalasi.kode_unit", 'RDGL');
		$this->db->group_end(); // Selesai kelompok kondisi OR
		$this->db->order_by("register_instalasi.tanggal", 'DESC');
		$data = $this->db->get();
		return $data->result();
	}

	public function panggilhisinstalasiLAB($no_rm) {
		$this->db->select("register_instalasi.id,register_instalasi.tanggal, register_instalasi.kode_dokter, register_instalasi.nama_dokter, register_instalasi.nama_unitR as nama_unit_pemesan, register_instalasi.kode_unit, register_instalasi.nama_unit");
		$this->db->from("register_instalasi");
		$this->db->where("register_instalasi.no_rm", $no_rm);
		$this->db->group_start(); // Mulai kelompok kondisi OR
			$this->db->where("register_instalasi.kode_unit", 'LABS');
			// $this->db->or_where("register_instalasi.kode_unit", 'RDGL');
		$this->db->group_end(); // Selesai kelompok kondisi OR
		$this->db->order_by("register_instalasi.tanggal", 'DESC');
		$data = $this->db->get();
		return $data->result();
	}

	public function panggilhisinstalasiRAD($no_rm) {
		$this->db->select("ptindakan_instalasi.id as id,register_instalasi.tanggal, register_instalasi.kode_dokter, register_instalasi.nama_dokter, register_instalasi.nama_unitR as nama_unit_pemesan, register_instalasi.kode_unit, register_instalasi.nama_unit, mtindakan.tindakan as namatindakan");
		$this->db->from("ptindakan_instalasi");
		$this->db->join("register_instalasi", "register_instalasi.notransaksi_IN = ptindakan_instalasi.notransaksi_IN");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");

		$this->db->where("register_instalasi.no_rm", $no_rm);
		$this->db->where("register_instalasi.kode_unit", 'RDGL');

		$this->db->order_by("register_instalasi.tanggal", 'DESC');
		$data = $this->db->get();
		return $data->result();
	}

	public function dtObatId($id) {
		$this->db->select("resep_detail.idobat,resep_detail.noresep, resep_detail.idobat, resep_detail.namaobat,resep_detail.qty,resep_detail.satuanpakai, resep_detail.hargapakai, resep_detail.tuslag, resep_detail.dosis, resep_detail.noninacbg, resep_header.no_rm, resep_header.kode_dokter, resep_header.tglresep");
		$this->db->from("resep_detail");
		$this->db->where("resep_detail.idnoresep", $id);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function ambilDataObat($id) {
		$this->db->select("*");
		$this->db->from("resep_detail");
		$this->db->where("resep_detail.idnoresep", $id);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}


	public function saveObatId() {
		//cek apakah sdh ada nomor resepnya
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$kode_unit = $this->input->get('kode_unit');
		$kode_deponya='';
		$tglHariIni=date("Y-m-d");
		$this->db->select("resep_header.noresep as noresep");
		$this->db->from("resep_header");
		$this->db->where("resep_header.no_rm", $no_rm);
		$this->db->where("resep_header.kode_dokter", $kode_dokter);
		$this->db->where("resep_header.tglresep", $tglHariIni);
		$this->db->where("resep_header.kode_depo", $kode_deponya);
		$query = $this->db->get();
		$dtheader=$query->row();
		$num_rows = $query->num_rows();

		if ($num_rows > 0) {
			//ambil nomor resep saat ini
			$noresep=$dtheader->noresep;
			$resepbaru=0;
			// echo '<script>alert("resep lama");</script>';
		} else {
			$tgl = date("Y-m-d");
			$this->db->from("mresepnumber");
			$this->db->where("tgltransaksi", $tglHariIni);
			$this->db->limit(1);
			$data = $this->db->get();
			if ($data->result() == NULL) {
				$numstart = 1;
				$numdate = str_replace("-", "", $tgl);
				$numend = sprintf("%05d", $numstart);
				$numgabung = "AP" . substr($numdate, 2) . $numend;
				$dataubah = array(
                    "tgltransaksi" => $tglHariIni,
                    "no" => $numstart
                );
                $this->db->insert('mresepnumber', $dataubah);
			} else {
				$t = $data->row();
				$numstart = $t->no + 1;
				$numdate = str_replace("-", "", $tgl);
				$numend = sprintf("%05d", $numstart);
				$numgabung = "AP" . substr($numdate, 2) . $numend;
				$dataubah = array(
                    "tgltransaksi" => $tglHariIni,
                    "no" => $numstart
                );
                $this->db->where("tgltransaksi", $tglHariIni);
                $this->db->update('mresepnumber', $dataubah);
			}
			$noresep=$numgabung;
			$resepbaru=1;
			// echo '<script>alert("resep Baru");</script>';
		}
				// no_rm : no_rm,
				// kode_dokter : kode_dokter,
				// notransaksi : notransaksi
			
		$notransaksi=$this->input->get("notransaksi");
		$this->db->select("register_detail.kode_unit, register_detail.nama_unit, register_detail.nama_dokter, register_detail.kode_dokter, register.golongan, pasien.no_askes, pasien.nama_pasien");
		$this->db->from("register_detail");
		$this->db->join("register", "register_detail.notransaksi=register.notransaksi");
		$this->db->join("pasien", "register_detail.no_rm=pasien.no_rm");
		$this->db->where("register_detail.notransaksi", $notransaksi);
		$this->db->where("register_detail.kode_unit", $kode_unit);
		$this->db->limit(1);
		$data = $this->db->get();
		$dataregister=$data->row();
		if ($dataregister->golongan == 'UMUM') {
			$typenya = 'Umum';
		} else {
			$typenya = 'Jaminan';
		}

		//simpan datanya
		if ($resepbaru == 1) {
		 	$headerresep = array(
                'noresep' => $noresep,
                'no_rm' => $this->input->get("no_rm"),
                'rirj' => "",
                'tglresep' => $tglHariIni,
                'kode_unit'  => $dataregister->kode_unit,
                'nama_unit' => $dataregister->nama_unit,
                // 'kode_dokter' => $dataregister->kode_dokter,
                // 'nama_dokter' => $dataregister->nama_dokter,
				'kode_dokter' => $this->input->get('kode_dokter'),
                'nama_dokter' => $this->input->get('nama_dokter'),
                'golongan' => $dataregister->golongan,
                'idgolongan' => 0,
                'nosjp' => $dataregister->no_askes,
                'notraksaksi' => $notransaksi,
                'nama_umum' => $dataregister->nama_pasien,
                'noreg' => "",
				'user' => $this->session->userdata("nmuser"),
				'user2' => $this->session->userdata("nmuser"),
				'nama_umum' => $dataregister->nama_pasien,
				'kode_depo' => '',
				'nama_depo' => '',
				'shift' => '',
				'type' => $typenya,
				'lastlogin' => date("Y-m-d H:i:s")

            );   
            $this->db->insert("resep_header", $headerresep);
		}
		$idambil=$this->input->get("id");
		$this->db->select("*");
		$this->db->from("resep_detail");
		$this->db->where("resep_detail.idnoresep", $idambil);
		$this->db->limit(1);
		$data = $this->db->get();
		$dataobatpilih=$data->row();

            $detailresep = array(
                'noresep' => $noresep,
                'idobat' => $dataobatpilih->idobat,
                'namaobat' => $dataobatpilih->namaobat,
                'qty' => $dataobatpilih->qty,
                'satuanpakai' => $dataobatpilih->satuanpakai,
                'hargapakai' => $dataobatpilih->hargapakai,
                'tuslag' => "0",
                'jumlah' => $dataobatpilih->qty * $dataobatpilih->hargapakai,
                'dosis' => "",
                'iddetailresep' => "0",
                'user' => $this->session->userdata("nmuser"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s"),
                'noninacbg'  => 0,
                'kodeobat' => $this->input->get("kode_obat"),
                'stokjns' => "",
                'jkd' => "0",
                'pagi' => $dataobatpilih->pagi,
                'siang' => $dataobatpilih->siang,
                'malam' => $dataobatpilih->malam,
                'takaran' => $dataobatpilih->takaran,
                'caramakan' => $dataobatpilih->caramakan,
                'pendanaan' => "",
                'keterangan' => $dataobatpilih->keterangan,
                'racikan' => $dataobatpilih->racikan,
                'komponen_racikan' => $dataobatpilih->komponen_racikan,
                'kode_racikan' => $dataobatpilih->kode_racikan,
                'catatanracikan' => $dataobatpilih->catatanracikan,
                'proses' => "0"
            );
            $dt = $this->db->insert("resep_detail", $detailresep);
			return array("sukses" => $dt);
		// $this->db->select("*");
		// $this->db->from("resep_detail");
		// $this->db->where("resep_detail.noresep", $noresep);
		// $this->db->order_by("resep_detail.idnoresep");
		// $dataresephariini = $this->db->get();
		// return $dataresephariini->result();
	}
	
	public function ubahresep($id) {

        $detailresep = array(
            'qty' => $this->input->get("qtypakai"),
            'dosis' => "-",
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s"),
            'noninacbg'  => $this->input->get("noina"),
            'kodeobat' => $this->input->get("kodeobat"),
            'pagi' => $this->input->get("pagi"),
            'siang' => $this->input->get("siang"),
            'malam' => $this->input->get("malam"),
            'takaran' => $this->input->get("takaran"),
            'caramakan' => $this->input->get("caramakan"),
            'pendanaan' => $this->input->get("pendanaan"),
            'keterangan' => $this->input->get("keterangan"),
            'catatanracikan' => $this->input->get("catatanracikan")
        );
        $this->db->where("idnoresep", $id);
        $dt = $this->db->update("resep_detail", $detailresep);

        return array("sukses" => $dt);
    }
	

	public function hapusdetailresep($id) {
        $id = $this->input->get("id");
        $this->db->where('idnoresep', $id);
        $dt = $this->db->delete('resep_detail');
        return $dt;
    }

	public function hapusdetailLab($id) {
        $id = $this->input->get("id");
        $this->db->where('id', $id);
        $dt = $this->db->delete('ptindakan_instalasi');
        return $dt;
    }

	public function hapusdetailRad($id) {
        $id = $this->input->get("id");
        $this->db->where('id', $id);
        $dt = $this->db->delete('ptindakan_instalasi');
        return $dt;
    }

	public function hapusdetailDiag($id) {
        $id = $this->input->get("id");
        $this->db->where('id', $id);
        $dt = $this->db->delete('pdiagnosa');
        return $dt;
    }

	public function simpanDetailResepbaru() {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$tglHariIni=date("Y-m-d");

		$this->db->select("resep_header.noresep as noresep");
		$this->db->from("resep_header");
		$this->db->where("resep_header.no_rm", $no_rm);
		$this->db->where("resep_header.kode_dokter", $kode_dokter);
		$this->db->where("resep_header.tglresep", $tglHariIni);
		$query = $this->db->get();
		$dtheader=$query->row();
		$num_rows = $query->num_rows();
		
		if ($num_rows > 0) {
			//ambil nomor resep saat ini
			$noresep=$dtheader->noresep;
			$resepbaru=0;
			// echo '<script>alert("resep lama");</script>';
		} else {
			$tgl = date("Y-m-d");
			$this->db->from("mresepnumber");
			$this->db->where("tgltransaksi", $tglHariIni);
			$this->db->limit(1);
			$data = $this->db->get();
			if ($data->result() == NULL) {
				$numstart = 1;
				$numdate = str_replace("-", "", $tgl);
				$numend = sprintf("%05d", $numstart);
				$numgabung = "AP" . substr($numdate, 2) . $numend;
				$dataubah = array(
                    "tgltransaksi" => $tglHariIni,
                    "no" => $numstart
                );
                $this->db->insert('mresepnumber', $dataubah);
			} else {
				$t = $data->row();
				$numstart = $t->no + 1;
				$numdate = str_replace("-", "", $tgl);
				$numend = sprintf("%05d", $numstart);
				$numgabung = "AP" . substr($numdate, 2) . $numend;
				$dataubah = array(
                    "tgltransaksi" => $tglHariIni,
                    "no" => $numstart
                );
                $this->db->where("tgltransaksi", $tglHariIni);
                $this->db->update('mresepnumber', $dataubah);
			}
			$noresep=$numgabung;
			$resepbaru=1;
		}
			
		$notransaksi=$this->input->get("notransaksi");
		$this->db->select("register_detail.kode_unit, register_detail.nama_unit, register_detail.nama_dokter, register_detail.kode_dokter, register.golongan, pasien.no_askes, pasien.nama_pasien");
		$this->db->from("register_detail");
		$this->db->join("register", "register_detail.notransaksi=register.notransaksi");
		$this->db->join("pasien", "register_detail.no_rm=pasien.no_rm");
		$this->db->where("register_detail.notransaksi", $notransaksi);
		$this->db->limit(1);
		$data = $this->db->get();
		$dataregister=$data->row();
		if ($dataregister->golongan == 'UMUM') {
			$typenya = 'Umum';
		} else {
			$typenya = 'Jaminan';
		}

		//simpan datanya
		if ($resepbaru == 1) {
		 	$headerresep = array(
                'noresep' => $noresep,
                'no_rm' => $this->input->get("no_rm"),
                'rirj' => "",
                'tglresep' => $tglHariIni,
                'kode_unit'  => $dataregister->kode_unit,
                'nama_unit' => $dataregister->nama_unit,
                'kode_dokter' => $dataregister->kode_dokter,
                'nama_dokter' => $dataregister->nama_dokter,
                'golongan' => $dataregister->golongan,
                'idgolongan' => 0,
                'nosjp' => $dataregister->no_askes,
                'notraksaksi' => $notransaksi,
                'nama_umum' => $dataregister->nama_pasien,
                'noreg' => "",
				'user' => $this->session->userdata("nmuser"),
				'user2' => $this->session->userdata("nmuser"),
				'nama_umum' => $dataregister->nama_pasien,
				'kode_depo' => '',
				'nama_depo' => '',
				'shift' => '',
				'type' => $typenya,
				'lastlogin' => date("Y-m-d H:i:s")

            );   
            $this->db->insert("resep_header", $headerresep);
		}

		//disini data yang di inputkan
		$idobat=$this->input->get("idobat");
		$kodeobat=$this->input->get("kodeobat");
		$namaobat=$this->input->get("namaobat");
		$qty=$this->input->get("qtypakai");
		$satuanpakai=$this->input->get("satpakai");
		$racikan=$this->input->get("racikan");
		if ($racikan == 1) {
			$hargapakai=0;
		} else {
			$hargapakai=$this->input->get("harga");
		}
		$pagi=$this->input->get("pagi");
		$siang=$this->input->get("siang");
		$malam=$this->input->get("malam");
		$takaran=$this->input->get("takaran");
		$caramakan=$this->input->get("caramakan");
		$keterangan=$this->input->get("keterangan");
		$kode_racikan=$this->input->get("kode_racikan");
		$catatanracikan=$this->input->get("catatanracikan");
	
            $detailresep = array(
                'noresep' => $noresep,
                'idobat' => $idobat,
                'namaobat' => $namaobat,
                'qty' => $qty,
                'satuanpakai' => $satuanpakai,
                'hargapakai' => $hargapakai,
                'tuslag' => "0",
                'jumlah' => $qty * $hargapakai,
                'dosis' => "",
                'iddetailresep' => "0",
                'user' => $this->session->userdata("nmuser"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s"),
                'noninacbg'  => 0,
                'kodeobat' => $kodeobat,
                'stokjns' => "",
                'jkd' => "0",
                'pagi' => $pagi,
                'siang' => $siang,
                'malam' => $malam,
                'takaran' => $takaran,
                'caramakan' => $caramakan,
                'pendanaan' => "",
                'keterangan' => $keterangan,
                'racikan' => $racikan,
                'kode_racikan' => $kode_racikan,
                'catatanracikan' => $catatanracikan,
                'proses' => "0"
            );
            $dt = $this->db->insert("resep_detail", $detailresep);
			return array("sukses" => $dt);
	}

	
	public function pasiendata() {
		$no = $this->input->get("notrans");
		$unit = $this->input->get("unit");
		$this->db->select("pasien.nama_pasien as nama_pasien, register.no_rm as no_rm, register_detail.no_transaksi_secondary as notransaksi, register_detail.kode_dokter as kode_dokter, register_detail.nama_dokter as nama_dokter, register_detail.inap_to_poli as inap_to_poli,register.golongan as golongan,register.tgl_masuk as tgl_masuk, register_detail.pindah as pindah, register_detail.status as status, pasien.title as title, register.kode_booking as kode_booking, register.taskid4 as taskid4, , register_detail.inap_to_poli as inap_to_poli, register_detail.kode_unit as kode_unitnya ");
		$this->db->from("register");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		// if ($unit='HMDL' || $unit='REME') {
		// 	$this->db->where("register_detail.no_transaksi", $no);	
		// } else {
		// 	$this->db->where("register_detail.no_transaksi_secondary", $no);
		// }
		$this->db->where("register_detail.no_transaksi_secondary", $no);
		$this->db->where("register_detail.kode_unit", $unit);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function datamtdsoap() {
		$no_rm = $this->input->get("no_rm");
		$this->db->from("psoap");
		$this->db->where("no_rm", $no_rm);
		$this->db->order_by("tanggal", "desc");
		$data = $this->db->get();
		return $data->result();
	}

	public function dataSoapPerId() {
		$id = $this->input->get("id");
		$this->db->from("psoap");
		$this->db->where("id", $id);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}
	public function dataAssesmenPerId() {
		$id = $this->input->get("id");
		$this->db->from("assesmen");
		$this->db->where("id", $id);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function tindakaninstalasi($kode_unit) {
		$this->db->select("kode_tindakan, tindakan, jasas, id");
		$this->db->from("mtindakan");
		$this->db->where("kode_unit", $kode_unit);
		$this->db->where("hapus", "0");
		$this->db->order_by("tindakan", "asc");
		$data = $this->db->get();
		return $data->result();
	}

	public function saveLabId($kd,$nm) {
		//cek apakah sdh ada nomor transaksi labnya, cek pada tanggal hari ini dan perbedaan 6 jam berikutnya,
		// cek dulu apakah ada pemeriksaan hari ini dengn dokter ini 

		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$notransaksi = $this->input->get('notransaksi');

		$tglHariIni=date("Y-m-d");
		$this->db->select("id,notransaksi,notransaksi_IN");
		$this->db->from("register_instalasi");
		$this->db->where("register_instalasi.no_rm", $no_rm);
		$this->db->where("register_instalasi.kode_dokter", $kode_dokter);
		$this->db->where("register_instalasi.tanggal", $tglHariIni);
		$this->db->where("register_instalasi.kode_unit",$kd);
		$query = $this->db->get();
		$dtregInst=$query->row();
		$num_rows = $query->num_rows();
		
		if ($num_rows > 0) {
			//berarti sudah ada
			$orderbaru=0;
			$notransaksi=$dtregInst->notransaksi;
			$numgabung=$dtregInst->notransaksi_IN;
			$resepbaru=0;
			// echo '<script>alert("resep lama");</script>';
		} else {
			//berarti buat data register baru
			$orderbaru=1;

			$this->db->select("nama_pasien");
			$this->db->from("pasien");
			$this->db->where("no_rm", $no_rm);
			$query = $this->db->get();
			$dtpas=$query->row();

			$tgl = date("Y-m-d");
			$this->db->from("mtransaksiins");
			$this->db->where("tgltransaksi", $tgl);
			$this->db->limit(1);
			$data = $this->db->get();
			if ($data->result() == NULL) {
				$numstart = 1;
				$numdate = str_replace("-", "", $tgl);
				$numend = sprintf("%05d", $numstart);
				$numgabung = "IN" . substr($numdate, 2) . $numend;
				//update notransaksi_IN --> insert data baru nomor 1
				$dataubah = array(
					"tgltransaksi" => $tgl,
					"nomor" => $numstart
				);
				$this->db->insert('mtransaksiins', $dataubah);
			} else {
				$t = $data->row();
				$numstart = $t->nomor + 1;
				$numdate = str_replace("-", "", $tgl);
				$numend = sprintf("%05d", $numstart);
				$numgabung = "IN" . substr($numdate, 2) . $numend;
				//update notransaksi_IN
				$dataubah = array(
					"nomor" => $numstart
				);
				$this->db->where("tgltransaksi", $tgl);
				$this->db->limit(1);
				$this->db->update('mtransaksiins', $dataubah);
			}

			//buat record pada register_instalasi
			$rj = "RJ";
	
			$datasimpan = array(
				'no_rm' => $no_rm,
				'nama_pasien' => $dtpas->nama_pasien, 
				'golongan' => $this->input->get("golongan"), 
				'tanggal' =>  $tgl, //date("Y-m-d"), 
				'kode_unit' => $kd, 
				'nama_unit' => $nm,
				'kode_dokter' => $this->input->get("kode_dokter"), 
				'nama_dokter' => $this->input->get("nama_dokter"), 
				'rujukan' => $rj, 
				'tgl_masuk' => $this->input->get("tgl_masuk"), 
				'kode_unitR' => $this->input->get("kode_unit"), 
				'nama_unitR' => $this->input->get("nama_unit"), 
				'user1' => $this->session->userdata("nmuser"), 
				'user2' => $this->session->userdata("nmuser"), 
				'lastlogin' => date("Y-m-d H:i:s"), 
				'kode_dokter_periksa' => '', 
				'nama_dokter_periksa' => '',
				'kode_analis' => "",
				'nama_analis' => "",
				'kode_radiografer' => '',
				'nama_radiografer' => '',
				'kode_hemodialis' => "",
				'nama_hemodialis' => "",
				'kode_kelas' => "", 
				'nama_kelas' => "", 
				'notransaksi' => $notransaksi, 
				'notransaksi_IN' => $numgabung, 
				'idrjalan' => "0", 
				'idrinap' => "0", 
				'barulama' => "0"
			);
			$result = $this->db->insert('register_instalasi', $datasimpan);
		}
				//lanjut menyimpan data	detail ptindakan_instalasi
				// cek tindakan berdasarkan id
				$id = $this->input->get('id');				
				$this->db->select("kode_tindakan,tindakan,jasas,jasap");
				$this->db->from("mtindakan");
				$this->db->where("id", $id);
				$query = $this->db->get();
				$dtmtindakan=$query->row();

				$kode_tindakan=$dtmtindakan->kode_tindakan;
				$jasas=$dtmtindakan->jasas;
				$jasap=$dtmtindakan->jasap;

				$date = date_create($this->input->get("radtgl"));
				$tgl = date_format($date,"Y-m-d");
				$datasimpan = array(
					'kode_unit' => $kd, 
					'nama_unit' =>$nm, 
					'no_rm' => $no_rm, 
					'tanggal' => $tgl,   //date("Y-m-d"), 
					'tindakan' => $kode_tindakan, 
					'jasas' => $jasas, 
					'jasap' => $jasap, 
					'jasam' => "0", 
					'jasaa' => "0",
					'perawatsaja' => "0", 
					'type' => "0", 
					'tanggungaskes' => "0", 
					'user1' => $this->session->userdata("nmuser"), 
					'user2' => $this->session->userdata("nmuser"), 
					'lastlogin' => date("Y-m-d H:i:s"), 
					'notransaksi' => $notransaksi, 
					'notransaksi_IN' => $numgabung,
					'hasil' => "", 
					'hasilfoto' => "", 
					'cnama' => "", 
					'cumur' => "", 
					'cjk' => "", 
					'calamat' => "", 
					'cjenispemeriksaan' => '', 
					'ctanggal' => "", 
					'cnofoto' => '', 
					'cruangan' => "", 
					'cklinis' => '', 
					'cdokter' => "", 
					'judul' => "", 
					'Hepar' => "", 
					'GB' => "", 
					'Pancreas' => "", 
					'Lien' => "", 
					'ren' => "", 
					'Urinaria' => "", 
					'hasil_pemeriksaan' => '', 
					'kesan' => '',
					'jenis' => "0", 
					'tambahan' => "", 
					'jam' => date("H:i:s"), 
					'qty' => "1",
					'nonasuransi' => 0,
					'diskon' => 0
				);
				$dt = $this->db->insert('ptindakan_instalasi', $datasimpan);
		
	}

	public function saveDiagId($id) {
		//cek apakah sdh ada nomor transaksi labnya, cek pada tanggal hari ini dan perbedaan 6 jam berikutnya,
		// cek dulu apakah ada pemeriksaan hari ini dengn dokter ini 

		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$notransaksi = $this->input->get('notransaksi');
		$tgl_masuk = $this->input->get('tgl_masuk');
		
		$tglHariIni=date("Y-m-d");
		$this->db->from("pdiagnosa");
		$this->db->where("pdiagnosa.id", $id);
		$query = $this->db->get();
		$dtDiagId=$query->row();
	// ========
		$icd_code = $dtDiagId->nodaftar;
		$type = $this->input->get('type');
		$this->db->from("micd1");
		$this->db->where("micd1.icd_code", $icd_code);
		$this->db->limit(1);
		$query2 = $this->db->get();
		$dtDiagId2=$query2->row();
		if ( $dtDiagId2->jenis_penyakit !== NULL){
			$diagnosa_save=$dtDiagId2->jenis_penyakit;
		} elseif( $dtDiagId2->sebabpenyakit !== NULL){
			$diagnosa_save=$dtDiagId2->sebabpenyakit;
		} else {
			$diagnosa_save=$dtDiagId2->jenis_penyakit_local;
		}
	// ========
		//cek dulu apakah sudah ada diagnosa utama hari ini, untuk memubah type menjadi 0 jika sdh ada
		$tglHariIni=date("Y-m-d");
		$this->db->select("id");
		$this->db->from("pdiagnosa");
		$this->db->where("type", 1);
		// $this->db->where("tgl_masuk", $tglHariIni);
		$this->db->where("tgl_masuk", $tgl_masuk);
		$this->db->where("no_rm", $no_rm);
		$query = $this->db->get();
		$num_rows = $query->num_rows();
		if ($num_rows > 0) {
			$type =0;
		} else {
			$type =1;
		}
			$datasimpan = array(
				'no_rm' => $no_rm,
				'tgl_masuk' => $tgl_masuk,
				'type' => $type,
				// 'diagnosa' => $dtDiagId->diagnosa,
				'diagnosa' => $diagnosa_save,
				'nodaftar' => $dtDiagId->nodaftar,
				'nodtd' => $dtDiagId->nodtd,
				'notransaksi' => $notransaksi, 
				'icdlatin' => $dtDiagId->icdlatin,
				'user1' => $this->session->userdata("nmuser"), 
				'user2' => $this->session->userdata("nmuser"), 
				'lastlogin' => date("Y-m-d H:i:s")
			);
			$result = $this->db->insert('pdiagnosa', $datasimpan);
	}

	public function saveDiagIdranap($id) {
		//cek apakah sdh ada nomor transaksi labnya, cek pada tanggal hari ini dan perbedaan 6 jam berikutnya,
		// cek dulu apakah ada pemeriksaan hari ini dengn dokter ini 

		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$notransaksi = $this->input->get('notransaksi');
		$tgl_masuk = $this->input->get('tgl_masuk');
		
		$tglHariIni=date("Y-m-d");
		$this->db->from("pdiagnosa");
		$this->db->where("pdiagnosa.id", $id);
		$query = $this->db->get();
		$dtDiagId=$query->row();
	// ========
		$icd_code = $dtDiagId->nodaftar;
		$type = $this->input->get('type');
		$this->db->from("micd1");
		$this->db->where("micd1.icd_code", $icd_code);
		$this->db->limit(1);
		$query2 = $this->db->get();
		$dtDiagId2=$query2->row();
		if ( $dtDiagId2->jenis_penyakit !== NULL){
			$diagnosa_save=$dtDiagId2->jenis_penyakit;
		} elseif( $dtDiagId2->sebabpenyakit !== NULL){
			$diagnosa_save=$dtDiagId2->sebabpenyakit;
		} else {
			$diagnosa_save=$dtDiagId2->jenis_penyakit_local;
		}
	// ========
		//cek dulu apakah sudah ada diagnosa utama hari ini, untuk memubah type menjadi 0 jika sdh ada
		$tglHariIni=date("Y-m-d");
		$this->db->select("id");
		$this->db->from("pdiagnosa");
		$this->db->where("type", 1);
		// $this->db->where("tgl_masuk", $tglHariIni);
		$this->db->where("notransaksi", $notransaksi);
		$this->db->where("no_rm", $no_rm);
		$query = $this->db->get();
		$num_rows = $query->num_rows();
		if ($num_rows > 0) {
			$type =0;
		} else {
			$type =1;
		}
			$datasimpan = array(
				'no_rm' => $no_rm,
				'tgl_masuk' => $tgl_masuk,
				'type' => $type,
				// 'diagnosa' => $dtDiagId->diagnosa,
				'diagnosa' => $diagnosa_save,
				'nodaftar' => $dtDiagId->nodaftar,
				'nodtd' => $dtDiagId->nodtd,
				'notransaksi' => $notransaksi, 
				'icdlatin' => $dtDiagId->icdlatin,
				'user1' => $this->session->userdata("nmuser"), 
				'user2' => $this->session->userdata("nmuser"), 
				'lastlogin' => date("Y-m-d H:i:s")
			);
			$result = $this->db->insert('pdiagnosa', $datasimpan);
	}

	public function simpanDiagnosainput() {
		//simpan diagnosa yang di inputkan
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$notransaksi = $this->input->get('notransaksi');
		$tgl_masuk = $this->input->get('tgl_masuk');
		$icd_code = $this->input->get('diag');
		$type = $this->input->get('type');
		$this->db->from("micd1");
		$this->db->where("micd1.icd_code", $icd_code);
		$this->db->limit(1);
		$query = $this->db->get();
		$dtDiagId=$query->row();
		if ( $dtDiagId->jenis_penyakit !== NULL){
			$diagnosa_save=$dtDiagId->jenis_penyakit;
		} elseif( $dtDiagId->sebabpenyakit !== NULL){
			$diagnosa_save=$dtDiagId->sebabpenyakit;
		} else {
			$diagnosa_save=$dtDiagId->jenis_penyakit_local;
		}
		//cek dulu apakah sudah ada diagnosa utama hari ini, untuk memubah type menjadi 0 jika sdh ada
		$tglHariIni=date("Y-m-d");
		$this->db->select("id");
		$this->db->from("pdiagnosa");
		$this->db->where("type", 1);
		// $this->db->where("tgl_masuk", $tglHariIni);
		$this->db->where("tgl_masuk", $tgl_masuk);
		$this->db->where("no_rm", $no_rm);
		$query = $this->db->get();
		$num_rows = $query->num_rows();
		if ($num_rows > 0) {
			$type =0;
		}
			$datasimpan = array(
				'no_rm' => $no_rm,
				'tgl_masuk' => $tgl_masuk,
				'type' => $type,
				'diagnosa' => $diagnosa_save,
				'nodaftar' => $dtDiagId->icd_code,
				'nodtd' => $dtDiagId->dtd,
				'notransaksi' => $notransaksi, 
				'icdlatin' => $dtDiagId->jenis_penyakit_local,
				'user1' => $this->session->userdata("nmuser"), 
				'user2' => $this->session->userdata("nmuser"), 
				'lastlogin' => date("Y-m-d H:i:s")
			);
			$result = $this->db->insert('pdiagnosa', $datasimpan);
	}

	public function dataIcdX() {
		// $this->db->select("icd_code,jenis_penyakit_local, id");
        $this->db->from("micd1");
		$this->db->order_by("icd_code", "ASC");
        $data = $this->db->get();
        return $data->result();

    }

	public function obatdanbhporder() {
        $this->db->select("kodeobat, namaobat, id");
        $this->db->from("mobat");
        $this->db->order_by("bhp", "ASC");
        $data = $this->db->get();
        return $data->result();
    }

	public function racikanOrder() {
		$kode_dokter = $this->input->get('kode_dokter');
        $this->db->select("kode_racikan as kodeobat, nama_racikan as namaobat, id");
        $this->db->from("racikan_header");
		$this->db->where("kode_dokter", $kode_dokter);
        $this->db->order_by("id", "ASC");
        $data = $this->db->get();
        return $data->result();
    }

	public function pilihtakaran() {
        $this->db->select('takaran');
        $this->db->from('mtakaran');
        $data = $this->db->get();
        return $data->result();
    }

    public function pilihcaramakan() {
        $this->db->select('caramakan');
        $this->db->from('mcaramakan');
        $data = $this->db->get();
        return $data->result();
    }

	public function untukapotik() {
        list($kdobat, $idobat) = explode("_", $this->input->get("produk"), 2);
        $this->db->select("satuanpakai, hargapakai, kodeobat");
        $this->db->from("mobat");
        $this->db->where("kodeobat", $kdobat);
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row();
    }

	public function untukracikan() {
        list($kdobat, $idobat) = explode("_", $this->input->get("produk"), 2);
        $this->db->select("satuan_racikan as satuanpakai, kode_racikan");
        $this->db->from("racikan_header");
        $this->db->where("kode_racikan", $kdobat);
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row();
    }

	public function panggilMasterRacikDokter($kode_dokter) {
        $this->db->select("racikan_header.kode_racikan as kodeobatracikan, racikan_header.nama_racikan as nama_racikan, racikan_header.id as idheader, racikan_detail.kode_obat as kode_obat, racikan_detail.nama_obat as nama_obat, racikan_detail.qty as qty, racikan_detail.satuan as satuan");
        $this->db->from("racikan_detail");
		$this->db->join("racikan_header", "racikan_detail.kode_racikan = racikan_header.kode_racikan");
		$this->db->where("racikan_header.kode_dokter", $kode_dokter);
        $this->db->order_by("racikan_header.id", "ASC");
        $this->db->order_by("racikan_detail.id", "ASC");
        $data = $this->db->get();
        return $data->result();
    }

	public function panggilHeaderRacikan($kode_dokter,$kode_racikan) {
        $this->db->from("racikan_header");
		$this->db->where("kode_dokter", $kode_dokter);
		$this->db->where("kode_racikan", $kode_racikan);
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row();
    }

	public function ambilDataMasterObat() {
        $this->db->select("kodeobat, namaobat, satuanpakai , id");
        $this->db->from("mobat");
        $this->db->where("bhp", "0");
        $data = $this->db->get();
        return $data->result();
    }
	

	public function simpanDetailRacikbaru() {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$tglHariIni=date("Y-m-d");
		$koderacikan = strtoupper($this->input->get('koderacikan'));
		$namaracikan = $this->input->get('namaracikan');
		$satuanracikan = $this->input->get('satuanracik');
		$idobat = $this->input->get('idobat');
		$kodeobat = $this->input->get('kodeobat');
		$namaobat = $this->input->get('namaobat');
		$satuanpakai = $this->input->get('satuanpakai');
		$qty = $this->input->get('qty');

		$this->db->select("id");
		$this->db->from("racikan_header");
		$this->db->where("kode_dokter", $kode_dokter);
		$this->db->where("kode_racikan", $koderacikan);
		$query = $this->db->get();
		$dtheader=$query->row();
		$num_rows = $query->num_rows();
		if ($num_rows > 0) {
			// sudah ada -------
		} else {
			//save headernya
			$headerracik = array(
                'kode_dokter' => $kode_dokter,
                'kode_racikan' => $koderacikan,
                'nama_racikan' => $namaracikan,
                'satuan_racikan' => $satuanracikan,
            );   
            $this->db->insert("racikan_header", $headerracik);
		}		
            $detailracik = array(
                'kode_racikan' => $koderacikan,
                'kode_obat ' => $kodeobat ,
                'nama_obat' => $namaobat,
                'qty' => $qty,
                'satuan' => $satuanpakai
            );
            $dt = $this->db->insert("racikan_detail", $detailracik);
			return array("sukses" => $dt);
	}

	public function pilihsatuan() {
		$this->db->select("satuanobat, id");
		$this->db->from("msatuan");
		$data = $this->db->get();
		return $data->result();
	}

	public function panggilracikan_perkode($kode_dokter,$koderacikan){
		$this->db->select("racikan_header.kode_racikan as kodeobatracikan, racikan_header.nama_racikan as nama_racikan, racikan_header.id as idheader, racikan_detail.kode_obat as kode_obat, racikan_detail.nama_obat as nama_obat, racikan_detail.qty as qty, racikan_detail.satuan as satuan, racikan_detail.id as id ");
        $this->db->from("racikan_detail");
		$this->db->join("racikan_header", "racikan_detail.kode_racikan = racikan_header.kode_racikan");
		$this->db->where("racikan_header.kode_dokter", $kode_dokter);
		$this->db->where("racikan_header.kode_racikan", $koderacikan);
        $this->db->order_by("racikan_detail.id", "ASC");
        $data = $this->db->get();
        return $data->result();
	}

	public function hapusDetailRacikbaru() {
        $id = $this->input->get("id");
        $this->db->where('id', $id);
        $dt = $this->db->delete('racikan_detail');
        return $dt;
    }

	public function hapusDetailRacikbaru_perkode() {
		$kode_dokter = $this->input->get('kode_dokter');
		$kode_racikan = $this->input->get('koderacikan');
        $this->db->where('kode_dokter', $kode_dokter);
        $this->db->where('kode_racikan', $kode_racikan);
        $this->db->limit(1);
        $dt = $this->db->delete('racikan_header');

        $this->db->where('kode_racikan', $kode_racikan);
        $dt = $this->db->delete('racikan_detail');

        return $dt;
    }

	public function panggilHistoryKonsul($no_rm) {
        $this->db->from("plembarkonsul");
		$this->db->where("no_rm", $no_rm);
        $this->db->order_by("tanggal", "DESC");
        $data = $this->db->get();
        return $data->result();
    }

	public function panggilHistoryKonsulRanap($no_rm,$notransaksi) {
        $this->db->from("plembarkonsulranap");
		$this->db->where("no_rm", $no_rm);
		$this->db->where("notransaksi", $notransaksi);
        $this->db->order_by("tanggal", "DESC");
        $data = $this->db->get();
        return $data->result();
    }

	public function panggilHistoryKonsulIDranap($id) {
        $this->db->from("plembarkonsulranap");
		$this->db->where("id", $id);
        $data = $this->db->get();
        return $data->row();
    }

	public function panggilHistoryKonsulID($id) {
        $this->db->from("plembarkonsul");
		$this->db->where("id", $id);
        $data = $this->db->get();
        return $data->row();
    }

	public function simpanKonsulDokter() {
		//simpan diagnosa yang di inputkan
		$no_rm = $this->input->get('no_rm');
		$idnyapasien = $this->input->get('idnyapasien');
		$notransaksi = $this->input->get('notransaksi');
		$kode_dokter = $this->input->get('kode_dokter');
		$nama_dokter = $this->input->get('nama_dokter');
		$kode_unit = $this->input->get('kode_unit');
		$nama_unit = $this->input->get('nama_unit');
		$tanggal = $this->input->get('tanggal');
		$jam = $this->input->get('jam');
		$konsul = $this->input->get('konsul');
		$kode_unit_tujuan = $this->input->get('kode_unit_tujuan');
		$nama_unit_tujuan = $this->input->get('nama_unit_tujuan');
		$rirj = 'RJ';
			$datasimpan = array(
				'no_rm' => $no_rm,
				'kode_dokter' => $kode_dokter,
				'nama_dokter' => $nama_dokter,
				'kode_unit' => $kode_unit,
				'nama_unit' => $nama_unit, 
				'kode_unit_tujuan' => $kode_unit_tujuan,
				'nama_unit_tujuan' => $nama_unit_tujuan, 
				'tanggal' => $tanggal, 
				'konsul' => $konsul, 
				'rirj' => $rirj, 
				'lastlogin' => date("Y-m-d H:i:s"),
				'user' => $this->session->userdata("nmuser"),
				'user2' => $this->session->userdata("nmuser")
			);
			$result = $this->db->insert('plembarkonsul', $datasimpan);
			
			// -----simpan di register detail----

				$datasimpan = array(
					'no_rm' => $no_rm, 
					'kode_kelas' => "",
					'nama_kelas' => "",
					'kode_unit' => $kode_unit_tujuan, 
					'nama_unit' => $nama_unit_tujuan, 
					'tgl_masuk_kamar' => $tanggal, 
					'tgl_keluar_kamar' => "0000-00-00", 
					'tgl_masuk' => $tanggal, 
					'status' => "0", 
					'user1' => $this->session->userdata("nmuser"), 
					'user2' => $this->session->userdata("nmuser"), 
					'lastlogin' => date("Y-m-d H:i:s"), 
					'rujukandetail' => '0', 
					'kode_unitR' => $kode_unit, 
					'nama_unitR' => $nama_unit,
					'statuskeluar' => 0, 
					'nokamar' => '', 
					'kamarkeluar' => 0, 
					'notransaksi' => $notransaksi,
					'nama_pasien_sjp' => '', 
					'prosesdaftar' => 0, 
					'jam_masuk' => $jam, 
					'jam_keluar' => "", 
					'ruanganaktif' => '', 
					'pulang' => 0, 
					'kode_kamar' => '', 
					'hapus' => 0, 
					'idasal' => $idnyapasien, 
					'pindah'  => "0"
				);
		
				$dts = $this->db->insert('register_detail', $datasimpan);
				$idInsert = $this->db->insert_id();
		
				$dataubah = array(
					'status' => "1",
					'tgl_keluar_kamar' => $tanggal,
					'jam_keluar' => $jam,
					'user2' => $this->session->userdata("nmuser"),
					'lastlogin' => date("Y-m-d H:i:s"),
					'pindah' => "1"
				);
		
				$this->db->where('id', $idnyapasien);
				$dt = $this->db->update('register_detail', $dataubah);
		
				//simpan data jam keluar dari poli pertama
				$dataubah3 = array(
					'jam_selesai' => $tanggal.' '.$jam,
				);
				$this->db->where('notransaksi', $notransaksi);
				$dt3 = $this->db->update('register', $dataubah3);
		
				//-- taskid 5
				//cek dulu apakah sdh ada taskid5 //sementara di hapus dulu nanti baru di proses lagi karena untuk tes RME
				// ----------- tutup disini -----
				// $kodebooking=$dtregis->kode_booking;
				// $qry21=$this->db->query("select kodebooking from y_updatewaktu where kodebooking='$kodebooking' and taskid=5 limit 1 ");
				// $ada=$qry21->num_rows();
				// if ($ada > 0) {
				// 	//taskid 5 sdh ada jgn di save lagi
				// } else {
				// 	date_default_timezone_set('Asia/Makassar');
				// 	$waktusekarang=date("Y-m-d h:i:sa");
				// 	$simpantaskid5 = array(
				// 		'kodebooking' => $kodebooking,
				// 		'taskid' => 5,
				// 		'waktu' => $waktusekarang,
				// 		'flag' => 0
				// 	);
				// 	$this->db->insert('y_updatewaktu', $simpantaskid5);
				// }
				// ----------- buka disini -----
		
		
				//-----------------
			// 	$this->load->model("FilterJalan");
			// 	$idParent = $this->FilterJalan->getidparent($dtregis->id);
			// 	if ($idParent == null) {
			// 		$this->FilterJalan->filterpindahkamar($idInsert, $dtregis->id);
			// 	} else {
			// 		if ($idParent->id_parent == 0) {
			// 			$this->FilterJalan->filterpindahkamar($idInsert, $dtregis->id);
			// 		} else {
			// 			$this->FilterJalan->filterpindahkamar($idInsert, $idParent->id_parent);
			// 		}
			// 	}
		
			// return array($dt, "1");
	}

	public function simpanKonsulDokterRanap() {
		//simpan diagnosa yang di inputkan
		$no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
		$kode_dokter = $this->input->get('kode_dokter');
		$nama_dokter = $this->input->get('nama_dokter');
		$kode_unit = $this->input->get('kode_unit');
		$nama_unit = $this->input->get('nama_unit');
		$tanggal = $this->input->get('tanggal');
		$jam = $this->input->get('jam');
		$konsul = $this->input->get('konsul');
		$kode_dokter_tujuan = $this->input->get('kode_dokter_tujuan');
		$nama_dokter_tujuan = $this->input->get('nama_dokter_tujuan');
		$rirj = 'RJ';
			$datasimpan = array(
				'no_rm' => $no_rm,
				'notransaksi' => $notransaksi,
				'kode_dokter' => $kode_dokter,
				'nama_dokter' => $nama_dokter,
				'kode_unit' => $kode_unit,
				'nama_unit' => $nama_unit, 
				'kode_dokter_jawab' => $kode_dokter_tujuan,
				'nama_dokter_jawab' => $nama_dokter_tujuan, 
				'tanggal' => $tanggal, 
				'jam' => $jam, 
				'konsul' => $konsul, 
				'rirj' => $rirj, 
				'lastlogin' => date("Y-m-d H:i:s"),
				'user' => $this->session->userdata("nmuser"),
				'user2' => $this->session->userdata("nmuser")
			);
			$result = $this->db->insert('plembarkonsulranap', $datasimpan);
	}

	public function simpanJawabKonsulDokter($id) {
		$kode_dokter_jawab =$this->input->get("kode_dokter_jawab");
		$nama_dokter_jawab =$this->input->get("nama_dokter_jawab");
		$jawaban =$this->input->get("jawaban");
        $detailresep = array(
			'kode_dokter_jawab' => $kode_dokter_jawab,
			'nama_dokter_jawab'=> $nama_dokter_jawab,
            'jawaban' => $jawaban,
			'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );
        $this->db->where("id", $id);
        $this->db->limit(1);
        $dt = $this->db->update("plembarkonsul", $detailresep);
        return array("sukses" => $dt);
    }

	public function simpanIsiKonsulDokter($id) {
		$konsul =$this->input->get("konsul");
        $detailresep = array(
            'konsul' => $konsul,
			'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );
        $this->db->where("id", $id);
        $this->db->limit(1);
        $dt = $this->db->update("plembarkonsul", $detailresep);
        return array("sukses" => $dt);
    }

	public function simpanIsiKonsulDokterRanap($id) {
		$tanggal = $this->input->get('tanggal');
		$jam = $this->input->get('jam');
		$konsul = $this->input->get('konsul');
		$kode_dokter_jawab =$this->input->get("kode_dokter_tujuan");
		$nama_dokter_jawab =$this->input->get("nama_dokter_tujuan");
        $detailresep = array(
            'tanggal' => $tanggal,
            'jam' => $jam,
            'kode_dokter_jawab' => $kode_dokter_jawab,
            'nama_dokter_jawab' => $nama_dokter_jawab,
            'konsul' => $konsul,
			'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );
        $this->db->where("id", $id);
        $this->db->limit(1);
        $dt = $this->db->update("plembarkonsulranap", $detailresep);
        return array("sukses" => $dt);
    }

	public function simpanIsiJawabKonsul($id) {
		$tanggal = $this->input->get('tanggal');
		$jam = $this->input->get('jam');
		$jawaban = $this->input->get('jawaban');
        $detailresep = array(
            'jawaban' => $jawaban,
			'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );
        $this->db->where("id", $id);
        $this->db->limit(1);
        $dt = $this->db->update("plembarkonsulranap", $detailresep);
        return array("sukses" => $dt);
    }

	public function simpanIsiJawabKonsulranap($id) {
		$tanggaljawab = $this->input->get('tanggaljawab');
		$jamjawab = $this->input->get('jamjawab');
		$jawaban = $this->input->get('jawaban');
        $detailresep = array(
            'jawaban' => $jawaban,
            'tanggaljawab' => $tanggaljawab,
            'jamjawab' => $jamjawab,
			'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );
        $this->db->where("id", $id);
        $this->db->limit(1);
        $dt = $this->db->update("plembarkonsulranap", $detailresep);
        return array("sukses" => $dt);
    }

	public function hapusisikonsul() {
        $id = $this->input->get("id");
		//cek dulu apakah ada isi jawabannya
		$this->db->select("jawaban");
		$this->db->from("plembarkonsul");
		$this->db->where("id", $id);
		$data = $this->db->get();
		$isinya=$data->row();
		if (empty($isinya->jawaban)) {
			$this->db->where('id', $id);
			$this->db->limit(1);
			$dt = $this->db->delete('plembarkonsul');
			return $dt;
		}

		//kembalikan posisi 
    }

	public function hapusisikonsulranap() {
        $id = $this->input->get("id");
		//cek dulu apakah ada isi jawabannya
		$this->db->select("jawaban");
		$this->db->from("plembarkonsulranap");
		$this->db->where("id", $id);
		$data = $this->db->get();
		$isinya=$data->row();
		if (empty($isinya->jawaban)) {
			$this->db->where('id', $id);
			$this->db->limit(1);
			$dt = $this->db->delete('plembarkonsulranap');
			return $dt;
		}
    }

	public function datapasien($no_rm) {
        $this->db->from("pasien");
		$this->db->where('no_rm', $no_rm);
		$this->db->limit(1);
        $data = $this->db->get();
		return $data->row();
	}


	public function penggilassawalrajal($no_rm,$notransaksi) {
		$this->db->from("emr_asawalrajal");
		$this->db->where('no_rm', $no_rm);
		$this->db->where('notransaksi', $notransaksi);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}
	
	public function simpanriwayat() {
		$no_rm =$this->input->get("no_rm");
		$notransaksi =$this->input->get("notransaksi");
        $isidata = array(
			'keluhanutama' => $this->input->get("keluhanutama"),
			'keluhansekarang' => $this->input->get("keluhansekarang"),
			'riwayatdahulu' => $this->input->get("riwayatdahulu"),
			'alergi' => $this->input->get("alergi"),
			'alergitext' => $this->input->get("alergitext"),
			'kesadaran' => $this->input->get("kesadaran"),
			'kesadarantext' => $this->input->get("kesadarantext"),
			'keadaanumum' => $this->input->get("keadaanumum"),
			'bb' => $this->input->get("bb"),
			'td' => $this->input->get("td"),
			'hr' => $this->input->get("hr"),
			'hrteratur' => $this->input->get("hrteratur"),
			'rr' => $this->input->get("rr"),
			'suhu' => $this->input->get("suhu"),
			'user' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );
        $this->db->where("no_rm", $no_rm);
        $this->db->where("notransaksi", $notransaksi);
        $this->db->limit(1);
        $dt = $this->db->update("emr_asawalrajal", $isidata);
        return array("sukses" => $dt);
    }
	
	public function simpanstatus() {
		$no_rm =$this->input->get("no_rm");
		$notransaksi =$this->input->get("notransaksi");
        $isidata = array(
			'kandung' => $this->input->get("kandung"),
			'tiri' => $this->input->get("tiri"),
			'tinggal' => $this->input->get("tinggal"),
			'tinggaltext' => $this->input->get("tinggaltext"),
			'bicara' => $this->input->get("bicara"),
			'komunikasi' => $this->input->get("komunikasi"),
			'emosional' => $this->input->get("emosional"),
			'jiwa' => $this->input->get("jiwa"),
			'jiwatahun' => $this->input->get("jiwatahun"),
			'trauma' => $this->input->get("trauma"),
			'traumatext' => $this->input->get("traumatext"),
			'perasaan' => $this->input->get("perasaan"),
			'interaksi' => $this->input->get("interaksi"),
			'spiritual' => $this->input->get("spiritual"),
			'spiritualtext' => $this->input->get("spiritualtext"),
			'spiritualagama' => $this->input->get("spiritualagama"),
			'spiritualagamatext' => $this->input->get("spiritualagamatext"),
			'ibadah' => $this->input->get("ibadah"),
			'user' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );
        $this->db->where("no_rm", $no_rm);
        $this->db->where("notransaksi", $notransaksi);
        $this->db->limit(1);
        $dt = $this->db->update("emr_asawalrajal", $isidata);
        return array("sukses" => $dt);
    }


	public function simpannyeri() {
		$no_rm =$this->input->get("no_rm");
		$notransaksi =$this->input->get("notransaksi");
        $isidata = array(
			'nyeri' => $this->input->get("nyeri"),
			'sifat' => $this->input->get("sifat"),
			'kualitasnyeri' => $this->input->get("kualitasnyeri"),
			'menjalar' => $this->input->get("menjalar"),
			'menjalartext' => $this->input->get("menjalartext"),
			'skornyeri' => $this->input->get("skornyeri"),
			'frekuensi' => $this->input->get("frekuensi"),
			'mempengaruhi' => $this->input->get("mempengaruhi"),
			'saran' => $this->input->get("saran"),
			'user' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );
        $this->db->where("no_rm", $no_rm);
        $this->db->where("notransaksi", $notransaksi);
        $this->db->limit(1);
        $dt = $this->db->update("emr_asawalrajal", $isidata);
        return array("sukses" => $dt);
    }


	public function simpanjatuh() {
		$no_rm =$this->input->get("no_rm");
		$notransaksi =$this->input->get("notransaksi");
        $isidata = array(
			'resikojatuh' => $this->input->get("resikojatuh"),
			'hasilskrinning' => $this->input->get("hasilskrinning"),
			'jatuhsaran' => $this->input->get("jatuhsaran"),
			'user' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );
        $this->db->where("no_rm", $no_rm);
        $this->db->where("notransaksi", $notransaksi);
        $this->db->limit(1);
        $dt = $this->db->update("emr_asawalrajal", $isidata);
        return array("sukses" => $dt);
    }
	
	public function simpangizirajal() {
		$no_rm =$this->input->get("no_rm");
		$notransaksi =$this->input->get("notransaksi");
        $isidata = array(
			'bbgizi' => $this->input->get("bbgizi"),
			'tbgizi' => $this->input->get("tbgizi"),
			'imtgizi' => $this->input->get("imtgizi"),
			'kurusgizi' => $this->input->get("kurusgizi"),
			'naikturunberatgizi' => $this->input->get("naikturunberatgizi"),
			'asupangizi' => $this->input->get("asupangizi"),
			'hasilgizi' => $this->input->get("hasilgizi"),
			'sarangizi' => $this->input->get("sarangizi"),
			'user' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );
        $this->db->where("no_rm", $no_rm);
        $this->db->where("notransaksi", $notransaksi);
        $this->db->limit(1);
        $dt = $this->db->update("emr_asawalrajal", $isidata);
        return array("sukses" => $dt);
    }
	
	public function savefungsirajal() {
		$no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
	
		$dataawal = array(
			'no_rm' => $no_rm,
			'notransaksi' => $notransaksi,
	
			'penglihatan' => $this->input->get("penglihatan"),
			'penciuman' => $this->input->get("penciuman"),
			'pendengaran' => $this->input->get("pendengaran"),
	
			'kognitif' => $this->input->get("kognitif"),
	
			'aktifitasharian' => $this->input->get("aktifitasharian"),
			'berjalan' => $this->input->get("berjalan"),
	
			'homecare' => $this->input->get("homecare"),
			'rawatdirumah' => $this->input->get("rawatdirumah"),
	
			'hasilplanning' => $this->input->get("hasilplanning"),
			'saranplanning' => $this->input->get("saranplanning"),
		   
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s")
		);   
			$this->db->where("no_rm", $no_rm);
			$this->db->where("notransaksi", $notransaksi);
			$this->db->limit(1);
			$dt = $this->db->update("emr_asawalrajal", $dataawal);
		return array("sukses" => $dt);
	}

	public function simpanpengkajianmedis() {
		$no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
	
		$dataawal = array(
			'no_rm' => $no_rm,
			'notransaksi' => $notransaksi,
	
			'statusgeneralis' => $this->input->get("statusgeneralis"),
			'statuslokalis' => $this->input->get("statuslokalis"),
			'diagnosa' => $this->input->get("diagnosa"),
			'diagnosabanding' => $this->input->get("diagnosabanding"),
			'penunjang' => $this->input->get("penunjang"),
			'terapi' => $this->input->get("terapi"),
			'kontrolulang' => $this->input->get("kontrolulang"),
			'rujukke' => $this->input->get("rujukke"),
			'rujukketext' => $this->input->get("rujukketext"),
			'edukasi' => $this->input->get("edukasi"),
			'edukasitext' => $this->input->get("edukasitext"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s")
		);   
			$this->db->where("no_rm", $no_rm);
			$this->db->where("notransaksi", $notransaksi);
			$this->db->limit(1);
			$dt = $this->db->update("emr_asawalrajal", $dataawal);
		return array("sukses" => $dt);
	}


	public function cek_asesmen_awal_rajal($no_rm,$notransaksi) {
		$this->db->select("id");
		$this->db->from("emr_asawalrajal");
		$this->db->where("no_rm", $no_rm);
		$this->db->where("notransaksi", $notransaksi);
		$this->db->limit(1);
		$query = $this->db->get();
		$num_rows = $query->num_rows();
		$datacek = array(
			'no_rm' => $no_rm,
			'notransaksi' => $notransaksi,
			'user' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s")
		);
		if ($num_rows == 0) {
			$dt=$this->db->insert("emr_asawalrajal", $datacek);
			return array("sukses" => $dt);
		} else {
			return array("gagal" => 0);
		}
	}

	public function panggillembarfisio($no_rm) {
		$tglhariini= date("Y-m-d");
		$this->db->from("emr_fisio");
		$this->db->where("no_rm", $no_rm);
		$this->db->order_by("tgllembar", 'DESC');
		$data = $this->db->get();
		return $data->result();
	}

	public function addlembarfisio($no_rm) {    
		$tgl = date("Ymd");
		$nolembar=$tgl.$no_rm;
		//cek dulu apakah sdh ada
		$this->db->select("id");
		$this->db->from("emr_fisio");
		$this->db->where("nolembar", $nolembar);
		$this->db->limit(1);
		$query = $this->db->get();
		$num_rows = $query->num_rows();
		if ($num_rows == 0) {
			$datasave = array(
				'no_rm' => $no_rm,
				'nolembar' => $nolembar,
				'tgllembar' =>date("Y-m-d"),
				'gambar' =>'',
				'user' => $this->session->userdata("nmuser"),
				'user2' => $this->session->userdata("nmuser"),
				'lastlogin' => date("Y-m-d H:i:s")
			);
			$this->db->insert(" emr_fisio", $datasave);
		}	
		// return 1;
	}

	public function addpemeriksaan() {    
		
		$datasave = array(
			'no_rm' => $this->input->get('no_rm'),
			'nolembar' => $this->input->get('nolembar'),
			'tglperiksa' =>date("Y-m-d"),
			'jenis' => '',
			'diagnosa' => '',
			'terapi' => '',
			'keterangan' => '',
			'user' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s")
		);
		$this->db->insert(" emr_fisioperiksa", $datasave);
	}


	public function panggillembarsoapfisio($nolembar) {
		$tglhariini= date("Y-m-d");
		$this->db->from("emr_fisio");
		$this->db->where("nolembar", $nolembar);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function simpansoapfisio() {    
		$datasave = array(
			'vitalsign' => $this->input->get("vitalsign"),
			'riwayat' => $this->input->get("riwayat"),
			'subjek' => $this->input->get("subjek"),
			'objek' => $this->input->get("objek"),
			'asesmen' => $this->input->get("asesmen"),
			'plan' => $this->input->get("plan"),
			'diagfisio' => $this->input->get("diagfisio"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s")
		);
		$this->db->where("nolembar", $this->input->get("nolembar"));
		$this->db->limit(1);
		$dt = $this->db->update("emr_fisio", $datasave);
		return array("sukses" => $dt);
	}

	public function panggilfisioperiksa($no_rm) {
		$this->db->from("emr_fisioperiksa");
		$this->db->where("no_rm", $no_rm);
		$this->db->order_by("tglperiksa", "DESC");
		$data = $this->db->get();
		return $data->result();
	}

	public function datapemeriksaanID($id) {
		$this->db->from("emr_fisioperiksa");
		$this->db->where("id", $id);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}
	

	public function simpanpemeriksaan($id) {    
		$datasave = array(
			'nolembar' => $this->input->get("nolembar"),
			'tglperiksa' => $this->input->get("tglperiksa"),
			'jenis' => $this->input->get("jenis"),
			'diagnosa' => $this->input->get("diagnosa"),
			'terapi' => $this->input->get("terapi"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s")
		);
		$this->db->where("id", $id);
		$this->db->limit(1);
		$dt = $this->db->update("emr_fisioperiksa", $datasave);
		return array("sukses" => $dt);
	}

	public function hapusdatapemeriksaan($id) {
        $id = $this->input->get("id");
        $this->db->where('id', $id);
		$this->db->limit(1);
        $dt = $this->db->delete('emr_fisioperiksa');
        return $dt;
    }

	public function panggillembarResumeMedis($no_rm,$notransaksi,$kode_dokter) {

		$this->db->select("id");
		$this->db->from("emr_resume_rajal");
		$this->db->where("no_rm", $no_rm);
		$this->db->where("notransaksi", $notransaksi);
		$this->db->where("kode_dokter", $kode_dokter);
		$this->db->limit(1);
		$cari = $this->db->get();
		$num_rows = $cari->num_rows();
		if ($num_rows == 0) {
			$datajatuh = array(
				'no_rm' => $no_rm,
				'notransaksi' => $notransaksi,
				'kode_dokter' => $kode_dokter,
				'user' => $this->session->userdata("nmuser"),
				'user2' => $this->session->userdata("nmuser"),
				'lastlogin' => date("Y-m-d H:i:s")
			);
			$this->db->insert("emr_resume_rajal", $datajatuh);
		}

		$this->db->from("emr_resume_rajal");
		$this->db->where("no_rm", $no_rm);
		$this->db->where("notransaksi", $notransaksi);
		$this->db->where("kode_dokter", $kode_dokter);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function simpanresumerajal() {    
		//cek dulu aopakah sudah ada recordnya
		$no_rm = $this->input->get("no_rm");
		$notransaksi = $this->input->get("notransaksi");
		$kode_dokter = $this->input->get("kode_dokter");
		$this->db->select("id");
		$this->db->from("emr_resume_rajal");
		$this->db->where("no_rm", $no_rm);
		$this->db->where("notransaksi", $notransaksi);
		$this->db->where("kode_dokter", $kode_dokter);
		$this->db->limit(1);
		$query = $this->db->get();
		$num_rows = $query->num_rows();
		if ($num_rows == 0) {
			$datasave = array(
				'no_rm' => $no_rm,
				'notransaksi' => $notransaksi,
				'kode_dokter' => $kode_dokter,
				'user' => $this->session->userdata("nmuser"),
				'user2' => $this->session->userdata("nmuser"),
				'lastlogin' => date("Y-m-d H:i:s")
			);
			$this->db->insert("emr_resume_rajal", $datasave);
		}	

		$datasave = array(
			
			'anamnesis' => $this->input->get("anamnesis"),
			'fisik' => $this->input->get("fisik"),
			'penunjang' => $this->input->get("penunjang"),
			'diagnosis' => $this->input->get("diagnosis"),
			'terapi' => $this->input->get("terapi"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s")
		);
		$this->db->where("no_rm", $this->input->get("no_rm"));
		$this->db->where("notransaksi", $this->input->get("notransaksi"));
		$this->db->where("kode_dokter", $this->input->get("kode_dokter"));
		$this->db->limit(1);
		$dt = $this->db->update("emr_resume_rajal", $datasave);
		return array("sukses" => $dt);
	}

	public function panggilDiagnosisResume($no_rm,$notransaksi) {
		$this->db->select("nodaftar,diagnosa");
		$this->db->from("pdiagnosa");
		$this->db->where("no_rm", $no_rm);
		$this->db->where("notransaksi", $notransaksi);
		$this->db->order_by('type', "desc");
		$data = $this->db->get();
		return $data->result();
	}

	public function simpanresikojatuhranap() {    
		//cek dulu aopakah sudah ada recordnya
		$idnya = $this->input->get("idnya");
		if ($idnya == 0) {
			$no_rm = $this->input->get("no_rm");
			$notransaksi = $this->input->get("notransaksi");
			$datasave = array(
				'no_rm' => $no_rm,
				'notransaksi' => $notransaksi,
				'tanggal' => $this->input->get("tanggal"),
				'jam' => $this->input->get("jam"),
				'riwayatjatuh' => $this->input->get("riwayatjatuh"),
				'diagnosa' => $this->input->get("diagnosa"),
				'alatbantu' => $this->input->get("alatbantu"),
				'terpasanginfus' => $this->input->get("terpasanginfus"),
				'gayaberjalan' => $this->input->get("gayaberjalan"),
				'statusmental' => $this->input->get("statusmental"),
				'hasilskrining' => $this->input->get("hasilskrining"),
				'saran' => $this->input->get("saran"),
				'intervensi' => $this->input->get("intervensi"),
				'user' => $this->session->userdata("nmuser"),
				'user2' => $this->session->userdata("nmuser"),
				'lastlogin' => date("Y-m-d H:i:s")
			);
			$dt = $this->db->insert("emr_resikojatuh", $datasave);
		} else {
			$no_rm = $this->input->get("no_rm");
			$notransaksi = $this->input->get("notransaksi");
			$datasave = array(
				'tanggal' => $this->input->get("tanggal"),
				'jam' => $this->input->get("jam"),
				'riwayatjatuh' => $this->input->get("riwayatjatuh"),
				'diagnosa' => $this->input->get("diagnosa"),
				'alatbantu' => $this->input->get("alatbantu"),
				'terpasanginfus' => $this->input->get("terpasanginfus"),
				'gayaberjalan' => $this->input->get("gayaberjalan"),
				'statusmental' => $this->input->get("statusmental"),
				'hasilskrining' => $this->input->get("hasilskrining"),
				'saran' => $this->input->get("saran"),
				'intervensi' => $this->input->get("intervensi"),
				'user2' => $this->session->userdata("nmuser"),
				'lastlogin' => date("Y-m-d H:i:s")
			);
			$this->db->where("id", $idnya);
			$this->db->limit(1);
			$dt = $this->db->update("emr_resikojatuh", $datasave);
		}	
		return array("sukses" => $dt);
	}
				
	public function simpanresumeranap() {    
		$datasave = array(
			'kode_dokter' => $this->input->get("kode_dokter"),
			'alasan' => $this->input->get("alasan"),
			'riwayat' => $this->input->get("riwayat"),
			'fisik' => $this->input->get("fisik"),
			'penunjang' => $this->input->get("penunjang"),
			'obatdirs' => $this->input->get("obatdirs"),
			'konsul' => $this->input->get("konsul"),
			'diagnosautama' => $this->input->get("diagnosautama"),
			'diagnosasekunder' => $this->input->get("diagnosasekunder"),
			'tindakan' => $this->input->get("tindakan"),
			'diet' => $this->input->get("diet"),
			'followup' => $this->input->get("followup"),
			'kondisipulang' => $this->input->get("kondisipulang"),
			'tensi' => $this->input->get("tensi"),
			'suhu' => $this->input->get("suhu"),
			'nadi' => $this->input->get("nadi"),
			'lanjut' => $this->input->get("lanjut"),
			'tglkontrol' => $this->input->get("tglkontrol"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s")
		);
		$this->db->where("no_rm", $this->input->get("no_rm"));
		$this->db->where("notransaksi", $this->input->get("notransaksi"));
		$this->db->limit(1);
		$dt = $this->db->update("emr_resume_ranap", $datasave);
		return array("sukses" => $dt);
	}

	public function panggilasesmenoperasi($notransaksi_IN,$no_rm,$notransaksi) {    
		//cek dulu aopakah sudah ada recordnya

		$this->db->select("id");
		$this->db->from("emr_operasi_asesmen");
		$this->db->where("notransaksi_IN", $notransaksi_IN);
		$this->db->limit(1);
		$cari = $this->db->get();
		$num_rows = $cari->num_rows();
		if ($num_rows == 0) {
			$datatriase = array(
				'no_rm' => $no_rm,
				'notransaksi' => $notransaksi,
				'notransaksi_IN' => $notransaksi_IN,
				'user' => $this->session->userdata("nmuser"),
				'user2' => $this->session->userdata("nmuser"),
				'lastlogin' => date("Y-m-d H:i:s")
			);
			$this->db->insert("emr_operasi_asesmen", $datatriase);
		}
	
		$this->db->from("emr_operasi_asesmen");
		$this->db->where("notransaksi_IN",$notransaksi_IN);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query) {
			return $query->row();
		} else {
			// Tangani kesalahan database di sini
			return array(); // atau kembalikan pesan kesalahan
		}
	}

	public function simpanassopr() {
		$no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
		$notransaksi_IN = $this->input->get('notransaksi_IN');
		$dataawal = array(
			'ringkasan' => $this->input->get("ringkasan"),
			'fisik' => $this->input->get("fisik"),
			'diagnostik' => $this->input->get("diagnostik"),
			'diagpreoperasi' => $this->input->get("diagpreoperasi"),
			'rencana' => $this->input->get("rencana"),
			'hal' => $this->input->get("hal"),
			'terapi' => $this->input->get("terapi"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s")
		);   
			$this->db->where("no_rm", $no_rm);
			$this->db->where("notransaksi", $notransaksi);
			$this->db->where("notransaksi_IN", $notransaksi_IN);
			$this->db->limit(1);
			$dt = $this->db->update("emr_operasi_asesmen", $dataawal);
		return array("sukses" => $dt);
	}

	public function panggilinstruksiopr($no_rm,$notransaksi_IN,$notransaksi) {    
		//cek dulu aopakah sudah ada recordnya
		$this->db->select("id");
		$this->db->from("emr_operasi_asesmen");
		$this->db->where("notransaksi_IN", $notransaksi_IN);
		$this->db->limit(1);
		$cari = $this->db->get();
		$num_rows = $cari->num_rows();
		if ($num_rows == 0) {
			$datatriase = array(
				'no_rm' => $no_rm,
				'notransaksi' => $notransaksi,
				'notransaksi_IN' => $notransaksi_IN,
				'user' => $this->session->userdata("nmuser"),
				'user2' => $this->session->userdata("nmuser"),
				'lastlogin' => date("Y-m-d H:i:s")
			);
			$this->db->insert("emr_operasi_asesmen", $datatriase);
		}
	
		$this->db->from("emr_operasi_asesmen");
		$this->db->where("notransaksi_IN",$notransaksi_IN);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query) {
			return $query->row();
		} else {
			// Tangani kesalahan database di sini
			return array(); // atau kembalikan pesan kesalahan
		}
	}

	public function simpanpascaoperasi() {
		$no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
		$notransaksi_IN = $this->input->get('notransaksi_IN');
		$dataawal = array(
			'tglpengisian' => $this->input->get("tglpengisian"),
			'jampengisian' => $this->input->get("jampengisian"),
			'diagnosapost' => $this->input->get("diagnosapost"),
			'rawatdi' => $this->input->get("rawatdi"),
			'kesadaran' => $this->input->get("kesadaran"),
			'kesadaranselama' => $this->input->get("kesadaranselama"),
			'tekanan' => $this->input->get("tekanan"),
			'tekananselama' => $this->input->get("tekananselama"),
			'nadi' => $this->input->get("nadi"),
			'nadiselama' => $this->input->get("nadiselama"),
			'pernapasan' => $this->input->get("pernapasan"),
			'pernapasanselama' => $this->input->get("pernapasanselama"),
			'suhu' => $this->input->get("suhu"),
			'suhuselama' => $this->input->get("suhuselama"),
			'darah' => $this->input->get("darah"),
			'darahselama' => $this->input->get("darahselama"),
			'posisi' => $this->input->get("posisi"),
			'posisilain' => $this->input->get("posisilain"),
			'infus' => $this->input->get("infus"),
			'cairan' => $this->input->get("cairan"),
			'puasa' => $this->input->get("puasa"),
			'minum' => $this->input->get("minum"),
			'makan' => $this->input->get("makan"),
			'analgetika' => $this->input->get("analgetika"),
			'antibiotika' => $this->input->get("antibiotika"),
			'mual' => $this->input->get("mual"),
			'obat' => $this->input->get("obat"),
			'instruksilain' => $this->input->get("instruksilain"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s")
		);   
			$this->db->where("no_rm", $no_rm);
			$this->db->where("notransaksi", $notransaksi);
			$this->db->where("notransaksi_IN", $notransaksi_IN);
			$this->db->limit(1);
			$dt = $this->db->update("emr_operasi_asesmen", $dataawal);
		return array("sukses" => $dt);
	}

	public function simpanlaporanoperasi() {
		$no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
		$notransaksi_IN = $this->input->get('notransaksi_IN');
		$dataawal = array(
			'kode_dokter_opr' => $this->input->get("kode_dokter_opr"),
			'nama_dokter_opr' => $this->input->get("nama_dokter_opr"),
			'kode_asisten' => $this->input->get("kode_asisten"),
			'nama_asisten' => $this->input->get("nama_asisten"),
			'kode_perawat' => $this->input->get("kode_perawat"),
			'nama_perawat' => $this->input->get("nama_perawat"),
			'kode_omlop' => $this->input->get("kode_omlop"),
			'nama_omlop' => $this->input->get("nama_omlop"),
			'kode_anastesi' => $this->input->get("kode_anastesi"),
			'nama_anastesi' => $this->input->get("nama_anastesi"),
			'kode_penata' => $this->input->get("kode_penata"),
			'nama_penata' => $this->input->get("nama_penata"),
			'jenis_operasi' => $this->input->get("jenis_operasi"),
			'jaringan' => $this->input->get("jaringan"),
			'pa' => $this->input->get("pa"),
			'tindakan' => $this->input->get("tindakan"),
			'tgloperasi' => $this->input->get("tgloperasi"),
			'jamoperasimulai' => $this->input->get("jamoperasimulai"),
			'jamoperasiselesai' => $this->input->get("jamoperasiselesai"),
			'laporanoperasi' => $this->input->get("laporanoperasi"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s")
		);   
			$this->db->where("no_rm", $no_rm);
			$this->db->where("notransaksi", $notransaksi);
			$this->db->where("notransaksi_IN", $notransaksi_IN);
			$this->db->limit(1);
			$dt = $this->db->update("emr_operasi_asesmen", $dataawal);
		return array("sukses" => $dt);
	}

	public function panggilObatUntukSoap($no_rm,$notransaksi,$kode_dokter) {
		$tglhariini= date("Y-m-d");
		$this->db->select("resep_detail.namaobat,resep_detail.qty,resep_detail.satuanpakai,resep_detail.takaran,resep_detail.caramakan, resep_detail.idobat, resep_detail.kodeobat,resep_header.tglresep, resep_header.nama_unit, resep_header.kode_unit as kode_unit, resep_header.nama_dokter,resep_header.kode_dokter,resep_detail.idnoresep as id, resep_header.noresep as noresep, resep_detail.pagi as pagi, resep_detail.siang as siang, resep_detail.malam as malam, resep_detail.keterangan as keterangan, resep_detail.caramakan as caramakan, resep_detail.racikan, resep_detail.catatanracikan");
		$this->db->from("resep_detail");
		$this->db->join("resep_header", "resep_header.noresep = resep_detail.noresep");
		$this->db->where("resep_header.no_rm", $no_rm);
		$this->db->where("resep_header.tglresep", $tglhariini);
		$this->db->where("resep_header.kode_dokter", $kode_dokter);
		$this->db->where("resep_header.notraksaksi", $notransaksi);
		$this->db->order_by("resep_detail.idnoresep", 'ASC');
		$data = $this->db->get();
		return $data->result();
	}

	public function simpanHeaderResepbaru() {
		$no_rm = $this->input->get('no_rm');
		$kode_dokterf = $this->input->get('dokterf');
		$dokterftext = $this->input->get('dokterftext');
		$kode_unit = $this->input->get('kode_unit');
		$nama_unit = $this->input->get('nama_unit');
		$tglHariIni=date("Y-m-d");

			$tgl = date("Y-m-d");
			$this->db->from("mresepnumber");
			$this->db->where("tgltransaksi", $tglHariIni);
			$this->db->limit(1);
			$data = $this->db->get();
			if ($data->result() == NULL) {
				$numstart = 1;
				$numdate = str_replace("-", "", $tgl);
				$numend = sprintf("%05d", $numstart);
				$numgabung = "AP" . substr($numdate, 2) . $numend;
				$dataubah = array(
                    "tgltransaksi" => $tglHariIni,
                    "no" => $numstart
                );
                $this->db->insert('mresepnumber', $dataubah);
			} else {
				$t = $data->row();
				$numstart = $t->no + 1;
				$numdate = str_replace("-", "", $tgl);
				$numend = sprintf("%05d", $numstart);
				$numgabung = "AP" . substr($numdate, 2) . $numend;
				$dataubah = array(
                    "tgltransaksi" => $tglHariIni,
                    "no" => $numstart
                );
                $this->db->where("tgltransaksi", $tglHariIni);
                $this->db->update('mresepnumber', $dataubah);
			}
			$noresep=$numgabung;

			
		$notransaksi=$this->input->get("notransaksi");
		$this->db->select("register_detail.kode_unit, register_detail.nama_unit, register_detail.nama_dokter, register_detail.kode_dokter, register.golongan, pasien.no_askes, pasien.nama_pasien");
		$this->db->from("register_detail");
		$this->db->join("register", "register_detail.notransaksi=register.notransaksi");
		$this->db->join("pasien", "register_detail.no_rm=pasien.no_rm");
		$this->db->where("register_detail.notransaksi", $notransaksi);
		$this->db->limit(1);
		$data = $this->db->get();
		$dataregister=$data->row();
		if ($dataregister->golongan == 'UMUM') {
			$typenya = 'Umum';
		} else {
			$typenya = 'Jaminan';
		}

		//simpan datanya
		 	$headerresep = array(
                'noresep' => $noresep,
                'no_rm' => $no_rm,
                'rirj' => "",
                'tglresep' => $tglHariIni,
                'kode_unit'  => $kode_unit,
                'nama_unit' => $nama_unit,
                'kode_dokter' => $kode_dokterf,
                'nama_dokter' => $dokterftext,
                'golongan' => $dataregister->golongan,
                'idgolongan' => 0,
                'nosjp' => $dataregister->no_askes,
                'notraksaksi' => $notransaksi,
                'nama_umum' => $dataregister->nama_pasien,
                'noreg' => "",
				'user' => $this->session->userdata("nmuser"),
				'user2' => $this->session->userdata("nmuser"),
				'nama_umum' => $dataregister->nama_pasien,
				'kode_depo' => '',
				'nama_depo' => '',
				'shift' => '',
				'type' => $typenya,
				'lastlogin' => date("Y-m-d H:i:s")

            );   
            $dt=$this->db->insert("resep_header", $headerresep);

		return array("sukses" => $dt);
	}

	public function panggilresepheader_hariini_ranap($no_rm,$notransaksi) {
		$tglHariIni=date("Y-m-d");
		$this->db->from("resep_header");
		$this->db->where("resep_header.no_rm", $no_rm);
		$this->db->where("resep_header.notraksaksi", $notransaksi);
		$this->db->where("resep_header.tglresep", $tglHariIni);
		// $this->db->where("resep_header.dariunit", 0);
		$this->db->where("resep_header.kode_depo", '');
		if ($this->session->userdata("kodedokter") != 'XXXXXX'){
			$this->db->where("resep_header.kode_dokter",$this->session->userdata("kodedokter") );
		}
		$this->db->order_by("resep_header.noresep", 'DESC');
		$data = $this->db->get();
		return $data->result();
	}

	public function simpanDetailResepbaru_ranap() {
		$noresep = $this->input->get('noresep');
		//disini data yang di inputkan
		$idobat=$this->input->get("idobat");
		$kodeobat=$this->input->get("kodeobat");
		$namaobat=$this->input->get("namaobat");
		$qty=$this->input->get("qtypakai");
		$satuanpakai=$this->input->get("satpakai");
		$racikan=$this->input->get("racikan");
		if ($racikan == 1) {
			$hargapakai=0;
		} else {
			$hargapakai=$this->input->get("harga");
		}
		$pagi=$this->input->get("pagi");
		$siang=$this->input->get("siang");
		$malam=$this->input->get("malam");
		$takaran=$this->input->get("takaran");
		$caramakan=$this->input->get("caramakan");
		$keterangan=$this->input->get("keterangan");
		$kode_racikan=$this->input->get("kode_racikan");
		$catatanracikan=$this->input->get("catatanracikan");
	
            $detailresep = array(
                'noresep' => $noresep,
                'idobat' => $idobat,
                'namaobat' => $namaobat,
                'qty' => $qty,
                'satuanpakai' => $satuanpakai,
                'hargapakai' => $hargapakai,
                'tuslag' => "0",
                'jumlah' => $qty * $hargapakai,
                'dosis' => "",
                'iddetailresep' => "0",
                'user' => $this->session->userdata("nmuser"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s"),
                'noninacbg'  => 0,
                'kodeobat' => $kodeobat,
                'stokjns' => "",
                'jkd' => "0",
                'pagi' => $pagi,
                'siang' => $siang,
                'malam' => $malam,
                'takaran' => $takaran,
                'caramakan' => $caramakan,
                'pendanaan' => "",
                'keterangan' => $keterangan,
                'racikan' => $racikan,
                'kode_racikan' => $kode_racikan,
                'catatanracikan' => $catatanracikan,
                'proses' => "0"
            );
            $dt = $this->db->insert("resep_detail", $detailresep);
			return array("sukses" => $dt);
	}


	public function hapusheaderresep($noresep) {
		//cek dulu apakah detail sudah tidak ada
		$this->db->select("idnoresep");
		$this->db->from("resep_detail");
		$this->db->where("resep_detail.noresep", $noresep);
		$data = $this->db->get();
		$baris=$data->num_rows();
		if ($baris == 0 ) {
			$this->db->where('noresep', $noresep);
			$this->db->limit(1);
			$dt = $this->db->delete('resep_header');
		} else {	
			$dt=false;
		} 
        return $dt;
    }

	public function sendToApotik($noresep) {
		$inapjalanigd = $this->input->get('inapjalanigd');
        $dtskrg=date("Y-d-m H:i:s");
		$jam_sekarang = date("H:i"); // Mengambil waktu saat ini dalam format Jam:Menit (misalnya 08:30)
		if ($jam_sekarang >= "08:00" && $jam_sekarang < "14:00") {
			$shift = 'PAGI';
		} elseif ($jam_sekarang >= "14:00" && $jam_sekarang < "21:00") {
			$shift = 'SIANG';
		} else {
			$shift = 'MALAM';
		}
		if ($inapjalanigd == 'JALAN') {
			$kode_depo = 'IAPOTI';
			$nama_depo = 'APOTEK RAWAT JALAN';
		} else {
			$kode_depo = 'IAPORU';
			$nama_depo = 'APOTEK RAWAT INAP DAN UGD';
		}
        $headerresep = array(
			'kode_depo' => $kode_depo,
			'shift' => $shift,
			'nama_depo' => $nama_depo,
			'dariunit' => 1,
			'urutdepo' => $dtskrg,
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s"),
        );
        $this->db->where("noresep", $noresep);
        $dt = $this->db->update("resep_header", $headerresep);

        return array("sukses" => $dt);
    }

	public function panggilRiwayatResume($no_rm,$notransaksi,$kode_dokter) {
		$this->db->from("psoap");
		$this->db->where("no_rm", $no_rm);
		$this->db->where("notransaksi", $notransaksi);
		$this->db->where("kode_dokter", $kode_dokter);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function panggilresepheader_resume($no_rm,$notransaksi,$kode_dokter) {
		// $tglHariIni=date("Y-m-d");

		$this->db->select("resep_detail.namaobat, resep_detail.qty, resep_detail.satuanpakai, resep_detail.pagi, resep_detail.siang, resep_detail.malam, resep_detail.takaran, resep_detail.caramakan, resep_detail.keterangan");
		$this->db->from("resep_header");
		$this->db->join("resep_detail", "resep_header.noresep = resep_detail.noresep");
		$this->db->where("resep_header.no_rm", $no_rm);
		$this->db->where("resep_header.notraksaksi", $notransaksi);
		// $this->db->where("resep_header.tglresep", $tglHariIni);
		// $this->db->where("resep_header.kode_dokter",$this->session->userdata("kodedokter") );
		$this->db->where("resep_header.kode_dokter",$kode_dokter);
		$this->db->where("resep_detail.komponen_racikan",0);
		// $this->db->where("resep_detail.proses",1);
		$this->db->order_by("resep_header.noresep", 'DESC');
		$data = $this->db->get();
		return $data->result();
	}

	public function panggilLembarKonsulRanap($id) {

		$this->db->from("plembarkonsulranap");
		$this->db->where("id", $id);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

}
