<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Urjmdl extends CI_Model {
	
	public function carinamapasienurj() {
		$unit = $this->input->get("unit");
		$nrp = trim($this->input->get("nrp"));
		$kodeDokter = $this->input->get('dokter');

		$date1 = $this->input->get("tglp1");
		$date2 = substr($date1,3,2).'/'.substr($date1,0,2).'/'.substr($date1,6,4);
		$date = date_create($date2);
		$tgl1 = date_format($date,"Y-m-d");

		$this->db->select("register.no_rm as no_rm, register_detail.nama_kelas as nama_kelas, register_detail.nama_unit as nama_unit, register.tgl_masuk as tgl_masuk, register.rujukan as rujukan, register.golongan as golongan, register_detail.no_transaksi_secondary as notransaksi, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register_detail.kode_dokter as kode_dokter, register_detail.nama_dokter as nama_dokter, register_detail.id as id, register_detail.pindah as pindah,register_detail.status as status,register_detail.proses as proses, register_detail.pulang as pulang, register_detail.no_antrian as no_antrian, pasien.title as title, register.kode_booking as kode_booking, register.taskid4 as taskid4, register_detail.inap_to_poli as inap_to_poli, register.id as idregister, register.berkas as berkas ");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		if ($unit !='000') {
			if (($unit != "") || ($unit != null)) {
				$this->db->where("register_detail.kode_unit", $unit);
			}
		}
		if (($nrp != "") || ($nrp != null)) {
			$this->db->like("register_detail.no_rm", $nrp, "both");
		}
		if ($kodeDokter) {
			$this->db->where("register_detail.kode_dokter = '".$kodeDokter."'");
		}
        $this->db->where("register.status_billing",0);
		// $this->db->where("register.tgl_masuk",$tgl1); dirubah tgl 1 seot 2021
		$this->db->where("register_detail.tgl_masuk_kamar",$tgl1);
		$this->db->order_by("register_detail.id");
        //$this->db->where("register_detail.pindah",0);  // dibatalkan tgl 5 september 2019 karena tidak tampil setelah di pindah
		$data = $this->db->get();
		return $data->result();
	}

	public function gantidokter() {
		$id = $this->input->get("id");
		$dokterf = $this->input->get("dokterf");
		$dokterftext = $this->input->get("dokterftext");
		$dataubah = array(
			'kode_dokter' => $dokterf,
			'nama_dokter' => $dokterftext
		);
		$this->db->where("id", $id);
		$dt = $this->db->update("register_detail", $dataubah);
		return $dt;
	}

	public function pasiendata() {
		$no = $this->input->get("notrans");
		$unit = $this->input->get("unit");
		$this->db->select("pasien.nama_pasien as nama_pasien, register.no_rm as no_rm, register_detail.no_transaksi_secondary as notransaksi, register_detail.kode_dokter as kode_dokter, register_detail.nama_dokter as nama_dokter, register_detail.inap_to_poli as inap_to_poli,register.golongan as golongan,register.tgl_masuk as tgl_masuk, register_detail.pindah as pindah, register_detail.status as status, pasien.title as title, register.kode_booking as kode_booking, register.taskid4 as taskid4, , register_detail.inap_to_poli as inap_to_poli ");
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

	// data unntuk form modal pelayanan
	public function datamtdtindakan() {
		$no = $this->input->get("notrans");
		$unit = $this->input->get("unit");
		$this->db->select("ptindakan.tanggal as tanggal, ptindakan.jam as jam, ptindakan.tindakan as tindakan, ptindakan.qty as qty, ptindakan.nama_dokter as nama_dokter, ptindakan.id as id, ptindakan.perawatsaja as perawatsaja, ptindakan.nonasuransi as nonasuransi,ptindakan.diskon as diskon, ptindakan.jasas as jasas ");
		$this->db->from("ptindakan");
		$this->db->where("ptindakan.notransaksi", $no);
		$this->db->where("ptindakan.kode_unit", $unit);
		$data = $this->db->get();
		return $data->result();
	}

	public function datamtdbhp() {
		$no = $this->input->get("notrans");
		$unit = $this->input->get("unit");
		$this->db->select("tanggal, namaobat, satuanpakai, hargapakai, qty, id,diskon, nonasuransi, diskon, nonbill");
		$this->db->from("pbhp");
		$this->db->where("notransaksi", $no);
		$this->db->where("kode_unit", $unit);
		$data = $this->db->get();
		return $data->result();
	}

	public function datamtdobat() {
		$no = $this->input->get("notrans");
		$unit = $this->input->get("unit");
		$this->db->select("resep_header.tglresep, resep_detail.namaobat, resep_detail.satuanpakai, resep_detail.hargapakai, resep_detail.qty, resep_detail.idnoresep,resep_detail.dosis,resep_detail.catatanresep, resep_header.noresep ");
		$this->db->from("resep_detail");
		$this->db->join("resep_header", "resep_header.noresep = resep_detail.noresep");
		$this->db->where("resep_header.notraksaksi", $no);
		$this->db->where("resep_header.kode_unit", $unit);
		$this->db->order_by("resep_detail.idnoresep");
		// $this->db->where("kode_unit", $unit);
		$data = $this->db->get();
		return $data->result();
	}


	public function datamtdobat_old() {
		$no = $this->input->get("notrans");
		// $unit = $this->input->get("unit");
		// $this->db->select("tanggal, namaobat, satuanpakai, hargapakai, qty, id,diskon, nonasuransi, diskon, nonbill");
		$this->db->from("resep_detail");
		// $this->db->where("notransaksi", $no);
		// $this->db->where("kode_unit", $unit);
		$data = $this->db->get();
		return $data->result();
	}


	public function datamtdodua() {
		$no = $this->input->get("notrans");
		$unit = $this->input->get("unit");
		$this->db->select("tgl_pakai, jam, qty, id,nonasuransi,diskon");
		$this->db->from("po2");
		$this->db->where("notransaksi", $no);
		$this->db->where("kode_unit", $unit);
		$data = $this->db->get();
		return $data->result();
	}

	// public function datamtdvisite() {
	// 	$no = $this->input->get("notrans");
	// 	$unit = $this->input->get("unit");
	// 	$this->db->select("tanggal, jam, nama_dokter, visite, id");
	// 	$this->db->from("t_visite");
	// 	$this->db->where("notransaksi", $no);
	// 	$this->db->where("kode_unit", $unit);
	// 	$data = $this->db->get();
	// 	return $data->result();
	// }

	public function datamtddarah() {
		$no = $this->input->get("notrans");
		$unit = $this->input->get("unit");
		$this->db->select("tanggal, qty, goldarah, id,nonasuransi,diskon");
		$this->db->from("pdarah");
		$this->db->where("notransaksi", $no);
		$this->db->where("kode_unit", $unit);
		$data = $this->db->get();
		return $data->result();
	}

	public function datamtdhistory() {
		$no = $this->input->get("notrans");
		$unit = $this->input->get("unit");
		$this->db->select("register.notransaksi as notransaksi, register_detail.kode_unit as kode_unit, register_detail.nama_unit as nama_unit, register_detail.tgl_masuk_kamar as tgl_masuk_kamar, register_detail.tgl_keluar_kamar as tgl_keluar_kamar, register_detail.jam_masuk as jam_masuk, register_detail.jam_keluar as jam_keluar, register_detail.id as id, register_detail.status as status, register_detail.pindah as pindah, register_detail.kode_unitR as kode_unitR ");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->where("register_detail.no_transaksi_secondary", $no);
//		$this->db->where("register_detail.kode_unit", $unit);
        $this->db->order_by("register_detail.id", "desc");
		$data = $this->db->get();
		return $data->result();
	}

	public function datainst() {
		$no = $this->input->get("notrans");
		$unit = $this->input->get("unit");
		$this->db->select("id, tanggal, nama_unit, nama_dokter, nama_unitR, nama_dokter_periksa, notransaksi_IN, catatan, kode_unit");
		$this->db->from("register_instalasi");
		$this->db->where("notransaksi", $no);
        $this->db->order_by("id", "desc");
		$data = $this->db->get();
		return $data->result();
	}
	//

	// untuk simpan tindakan
	public function ambilhargatindakan() {
		$no = $this->input->get("tdtindakan");
		$this->db->select("jasas, jasap");
		$this->db->from("mtindakan");
		$this->db->where("kode_tindakan", $no);
		$data = $this->db->get();
		return $data->row();
	}

	public function simpanpelayanantindakan($dtpasien, $dthargatindakan) {
		$rs = $this->input->get("tdrawat");
		$um = $this->input->get("tdumum");
		$date = date_create($this->input->get("tdtgl"));
		$tgl = date_format($date,"Y-m-d");
		$tim = date_create($this->input->get("tdjam"));
		$jam = date_format($tim,"H:i:s");

		$nt=$this->input->get("notrans"); 
		$ku=$this->input->get("unit");

		$datasimpan1 = array(
			'proses' => 1
		);
		$this->db->where("notransaksi",$nt);
		$this->db->where("kode_unit",$ku);
		$this->db->limit(1);
		$this->db->update('register_detail', $datasimpan1);


		$datasimpan = array(
			'kode_unit' => $this->input->get("unit"),
			'nama_unit' => $this->input->get("unittext"),
			'no_rm' => $dtpasien->no_rm, 
			'tanggal' => $tgl, 
			'kode_tindakan' => $this->input->get("tdtindakan"),
			'tindakan' => $this->input->get("tdtindakantext"),
			'jasas' => $dthargatindakan->jasas, 
			'jasap' => $dthargatindakan->jasap, 
			'jasam' => "0", 
			'jasaa' => "0",
			'perawatsaja' => gantiangka($rs), 
			'type' => "0", 
			'tanggungaskes' => "0", 
			'user1' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"), 
			'kode_dokter' => $this->input->get("tddokter"), 
			'nama_dokter' => $this->input->get("tddoktertext"), 
			'kode_pelaksana_satu' => $this->input->get("tdpel1"), 
			'nama_pelaksana_satu' => $this->input->get("tdpel1text"), 
			'kode_pelaksana_dua' => $this->input->get("tdpel2"), 
			'nama_pelaksana_dua' => $this->input->get("tdpel2text"), 
			'diagnosa' => "", 
			'nodaftar' => "", 
			'qty' => $this->input->get("tdjml"), 
			'bhprj' => "0", 
			'dokterahli' => "0", 
			'rujukan' => $dtpasien->rujukan, 
			'kode_anastesi' => "", 
			'nama_anastesi' => "", 
			'tdk_ditanggung' => "0", 
			'O2' => "0", 
			'bhptindakan' => "0", 
			'idinstalasi' => "0",
			'idruangpoli' => "0", 
			'notransaksi' => $this->input->get("notrans"), 
			'idrjalan' => "0", 
			'idrinap' => "0", 
			'hasil' => "", 
			'hasilfoto' => "", 
			'cnama' => "", 
			'cumur' => "", 
			'cjk' => "", 
			'calamat' => "", 
			'cjenispemeriksaan' => "", 
			'ctanggal' => "", 
			'cnofoto' => "", 
			'cruangan' => "", 
			'cklinis' => "", 
			'cdokter' => "", 
			'judul' => "", 
			'Hepar' => "", 
			'GB' => "", 
			'Pancreas' => "", 
			'Lien' => "", 
			'ren' => "", 
			'Urinaria' => "", 
			'kesan' => "", 
			'jenis' => "0", 
			'tambahan' => "", 
			'jam' => $jam, 
			'tipetindakan' => "2",
			'nonasuransi' => gantiangka($um),
			'diskon' => $this->input->get("tddiskon")
		);
		$dt = $this->db->insert('ptindakan', $datasimpan);
		return $dt;
	}

	public function ambileditdatatindakan() {
		$id = $this->input->get("id");
		$this->db->select("tanggal, jam, kode_tindakan, tindakan, qty, nama_dokter, id, perawatsaja,nonasuransi,diskon, jasas, kode_pelaksana_satu, kode_pelaksana_dua");
		$this->db->from("ptindakan");
		$this->db->where("id", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function ubahpelayanantindakan($dthargatindakan) {
		$rs = $this->input->get("tdrawat");
		$date = date_create($this->input->get("tdtgl"));
		$tgl = date_format($date,"Y-m-d");
		$tim = date_create($this->input->get("tdjam"));
		$jam = date_format($tim,"H:i:s");
		$um = $this->input->get("tdumum");

		$datasimpan = array(
			'tanggal' => $tgl, 
			'tindakan' => $this->input->get("tdtindakantext"),
			'jasas' => $dthargatindakan->jasas, 
			'jasap' => $dthargatindakan->jasap, 
			'kode_pelaksana_satu' => $this->input->get("tdpel1"), 
			'nama_pelaksana_satu' => $this->input->get("tdpel1text"), 
			'kode_pelaksana_dua' => $this->input->get("tdpel2"), 
			'nama_pelaksana_dua' => $this->input->get("tdpel2text"), 
			'perawatsaja' => gantiangka($rs), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"), 
			'qty' => $this->input->get("tdjml"),
			'jam' => $jam, 
			'nonasuransi' => gantiangka($um),
			'diskon' => $this->input->get("tddiskon")
		);
		$this->db->where("id", $this->input->get("id"));
		$dt = $this->db->update('ptindakan', $datasimpan);
		return $dt;
	}

	public function hapuspelayanantindakan() {
		$id = $this->input->get("id");
		$this->db->where('id', $id);
		$dt = $this->db->delete('ptindakan');
		return $dt;
	}

	public function simpanpelayananbhp($dtpasien) {
		$date = date_create($this->input->get("bhptgl"));
		$tgl = date_format($date,"Y-m-d");
		list($kdobat, $idobat) = explode("_", $this->input->get("bhpbhp"), 2);
		$um = $this->input->get("bhpumum");
		$datasimpan = array(
			'kode_unit' => $this->input->get("unit"), 
			'nama_unit' => $this->input->get("unittext"), 
			'no_rm' => $dtpasien->no_rm, 
			'tanggal' => $tgl, 
			'kodeobat' => $kdobat, 
			'namaobat' => $this->input->get("bhpbhptext"), 
			'qty' => $this->input->get("bhpqty"), 
			'satuanpakai' => $this->input->get("bhpstauan"), 
			'hargapakai' => $this->input->get("bhpharga"),
			'user1' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"), 
			'kelompok' => "", 
			'tgl_masuk' => $dtpasien->tgl_masuk, 
			'notransaksi' => $this->input->get("notrans"), 
			'idobat' => $idobat,
			'nonasuransi' => gantiangka($um),
			'diskon' => $this->input->get("bhpdiskon"),
			'nonbill' => gantiangka($this->input->get("nonbill"))
		);

		$dt = $this->db->insert('pbhp', $datasimpan);
		return $dt;
	}

	public function ambileditdatabhp() {
		$id = $this->input->get("id");
		$this->db->select("tanggal, namaobat, satuanpakai, hargapakai, qty, id, kodeobat,nonasuransi,diskon,nonbill");
		$this->db->from("pbhp");
		$this->db->where("id", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function ubahpelayananbhp() {
		$date = date_create($this->input->get("bhptgl"));
		$tgl = date_format($date,"Y-m-d");
		list($kdobat, $idobat) = explode("_", $this->input->get("bhpbhp"), 2);
		$um = $this->input->get("bhpumum");

		$datasimpan = array(
			'tanggal' => $tgl, 
			'kodeobat' => $kdobat, 
			'namaobat' => $this->input->get("bhpbhptext"), 
			'qty' => $this->input->get("bhpqty"), 
			'satuanpakai' => $this->input->get("bhpstauan"), 
			'hargapakai' => $this->input->get("bhpharga"),
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"), 
			'idobat' => $idobat,
			'nonasuransi' => gantiangka($um),
			'diskon' => $this->input->get("bhpdiskon"),
			// 'nonbill' => gantiangka($this->input->get("nonbill"))
			'nonbill' => gantiangka($this->input->get("nonbill"))
		);
		$this->db->where("id", $this->input->get("id"));
		$dt = $this->db->update('pbhp', $datasimpan);
		return $dt;
	}

	public function hapuspelayananbhp() {
		$id = $this->input->get("id");
		$this->db->where('id', $id);
		$dt = $this->db->delete('pbhp');
		return $dt;
	}

	public function hapuspelayananobat() {
		$id = $this->input->get("id");
		// console.log(id);
		$this->db->where('idnoresep', $id);
		$dt = $this->db->delete('resep_detail');
		return $dt;
	}


	public function simpanpelayananodua($dtpasien) {
		$date = date_create($this->input->get("otgl"));
		$tgl = date_format($date,"Y-m-d");
		$tim = date_create($this->input->get("ojam"));
		$jam = date_format($tim,"H:i:s");
		$um = $this->input->get("oumum");

		$datasimpan = array(
			'kode_unit' => $this->input->get("unit"), 
			'nama_unit' => $this->input->get("unittext"), 
			'no_rm' => $dtpasien->no_rm, 
			'tgl_pakai' => $tgl, 
			'jam' => $jam, 
			'qty' => $this->input->get("ojml"), 
			'jasas' => "0", 
			'jasap' => "0", 
			'hargapakai' => "0", 
			'user1' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"), 
			'tgl_masuk' => $dtpasien->tgl_masuk, 
			'notransaksi' => $this->input->get("notrans"), 
			'menit' => "0",
			'nonasuransi' => gantiangka($um),
			'diskon' => $this->input->get("odiskon")
		);

		$dt = $this->db->insert('po2', $datasimpan);
		return $dt;
	}

	public function ambileditdataodua() {
		$id = $this->input->get("id");
		$this->db->select("tgl_pakai, jam, qty, id, nonasuransi, diskon");
		$this->db->from("po2");
		$this->db->where("id", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function ubahpelayananodua() {
		$date = date_create($this->input->get("otgl"));
		$tgl = date_format($date,"Y-m-d");
		$tim = date_create($this->input->get("ojam"));
		$jam = date_format($tim,"H:i:s");
		$um = $this->input->get("oumum");
		$datasimpan = array(
			'tgl_pakai' => $tgl, 
			'jam' => $jam, 
			'qty' => $this->input->get("ojml"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"),
			'nonasuransi' => gantiangka($um),
			'diskon' => $this->input->get("odiskon")
		);
		$this->db->where("id", $this->input->get("id"));
		$dt = $this->db->update('po2', $datasimpan);
		return $dt;
	}

	public function hapuspelayananodua() {
		$id = $this->input->get("id");
		$this->db->where('id', $id);
		$dt = $this->db->delete('po2');
		return $dt;
	}

	public function simpanpelayanandokter($dtpasien, $dtunit) {
		$date = date_create($this->input->get("dtgl"));
		$tgl = date_format($date,"Y-m-d");
		$tim = date_create($this->input->get("djam"));
		$jam = date_format($tim,"H:i:s");

		$datasimpan = array(
			'tgl_masuk' => $dtpasien->tgl_masuk, 
			'no_rm' => $dtpasien->no_rm, 
			'tanggal' => $tgl, 
			'jam' => $jam, 
			'perjalanan' => "", 
			'instruksi' => "", 
			'kode_dokter' => $this->input->get("ddokter"), 
			'nama_dokter' => $this->input->get("ddoktertext"), 
			'visite' => $this->input->get("dvisit"), 
			'visitespesialis' => "", 
			'konsulspesialis' => "", 
			'kualifikasi' => "", 
			'user1' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"), 
			'kode_unit' => $this->input->get("unit"), 
			'nama_unit' => $this->input->get("unittext"), 
			'kode_kelas' => $dtunit->kode_kelas, 
			'notransaksi' => $this->input->get("notrans"), 
			'idruangri' => "0"
		);

		$dt = $this->db->insert('t_visite', $datasimpan);
		return $dt;
	}

	public function ambileditdatadokter() {
		$id = $this->input->get("id");
		$this->db->select("tanggal, jam, nama_dokter, kode_dokter, visite, id");
		$this->db->from("t_visite");
		$this->db->where("id", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function ubahpelayanandokter() {
		$date = date_create($this->input->get("dtgl"));
		$tgl = date_format($date,"Y-m-d");
		$tim = date_create($this->input->get("djam"));
		$jam = date_format($tim,"H:i:s");

		$datasimpan = array(
			'tanggal' => $tgl, 
			'jam' => $jam, 
			'kode_dokter' => $this->input->get("ddokter"), 
			'nama_dokter' => $this->input->get("ddoktertext"), 
			'visite' => $this->input->get("dvisit"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s")
		);
		$this->db->where("id", $this->input->get("id"));
		$dt = $this->db->update('t_visite', $datasimpan);
		return $dt;
	}

	public function hapuspelayanandokter() {
		$id = $this->input->get("id");
		$this->db->where('id', $id);
		$dt = $this->db->delete('t_visite');
		return $dt;
	}

	public function simpanpelayanandarah($dtpasien) {
		$date = date_create($this->input->get("drtgl"));
		$tgl = date_format($date,"Y-m-d");
		$um = $this->input->get("drhumum");
		$datasimpan = array(
			'kode_unit' => $this->input->get("unit"),
			'nama_unit' => $this->input->get("unittext"),
			'no_rm' => $dtpasien->no_rm,
			'tanggal' => $tgl,
			'qty' => $this->input->get("drjml"),
			'hargapakai' => "0",
			'tgl_masuk' => $dtpasien->tgl_masuk,
			'user1' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"),
			'notransaksi' => $this->input->get("notrans"),
			'goldarah' => $this->input->get("drgol"),
			'nonasuransi' => gantiangka($um),
			'diskon' => $this->input->get("drhdiskon")
		);

		$dt = $this->db->insert('pdarah', $datasimpan);
		return $dt;
	}

	public function ambileditdatadarah() {
		$id = $this->input->get("id");
		$this->db->select("tanggal, qty, goldarah, id, nonasuransi, diskon");
		$this->db->from("pdarah");
		$this->db->where("id", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function ubahpelayanandarah() {
		$date = date_create($this->input->get("drtgl"));
		$tgl = date_format($date,"Y-m-d");
		$um = $this->input->get("drhumum");
		$datasimpan = array(
			'tanggal' => $tgl,
			'qty' => $this->input->get("drjml"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"),
			'goldarah' => $this->input->get("drgol"),
			'nonasuransi' => gantiangka($um),
			'diskon' => $this->input->get("drhdiskon")
		);
		$this->db->where("id", $this->input->get("id"));
		$dt = $this->db->update('pdarah', $datasimpan);
		return $dt;
	}

	public function hapuspelayanandarah() {
		$id = $this->input->get("id");
		$this->db->where('id', $id);
		$dt = $this->db->delete('pdarah');
		return $dt;
	}

	public function ambildatapindah() {
		$no = $this->input->get("notrans");
		$this->db->from("register_detail");
		$this->db->where("no_transaksi_secondary", $no);
		$this->db->order_by("id desc");
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function ambildatapindahlast() {
		$no = $this->input->get("notrans");
		$id = $this->input->get("unit");
		$this->db->from("register_detail");
		$this->db->where("no_transaksi_secondary", $no);
		$this->db->where("kode_unit", $id);
		$this->db->order_by("id desc");
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
}

	public function simpanpindahkamar($dtregis) {
		$date = date_create($this->input->get("pktgl"));
		$tgl = date_format($date,"Y-m-d");
		$tim = date_create($this->input->get("pkjam"));
		$jam = date_format($tim,"H:i:s");
		list($kdunit, $nmunit) = explode("_", $this->input->get("pkunit"), 3);

		$datasimpan = array(
			'no_rm' => $dtregis->no_rm, 
			'kode_kelas' => "",
			'nama_kelas' => "",
			'kode_unit' => $kdunit, 
			'nama_unit' => $nmunit, 
			'tgl_masuk_kamar' => $tgl, 
			'tgl_keluar_kamar' => "0000-00-00", 
			'tgl_masuk' => $dtregis->tgl_masuk, 
			'status' => "0", 
			'user1' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"), 
			'rujukandetail' => $dtregis->rujukandetail, 

			// 'kode_unitR' => $dtregis->kode_unitR, 
			// 'nama_unitR' => $dtregis->nama_unitR, 
			'kode_unitR' => $dtregis->kode_unit, 
			'nama_unitR' => $dtregis->nama_unit, 

			'statuskeluar' => $dtregis->statuskeluar, 
			'nokamar' => $dtregis->nokamar, 
			'kamarkeluar' => $dtregis->kamarkeluar, 
			'notransaksi' => $dtregis->notransaksi, 
			'nama_pasien_sjp' => $dtregis->nama_pasien_sjp, 
			'prosesdaftar' => $dtregis->prosesdaftar, 
			'jam_masuk' => $jam, 
			'jam_keluar' => "", 
			'ruanganaktif' => $dtregis->ruanganaktif, 
			'pulang' => $dtregis->pulang, 
			'kode_kamar' => $dtregis->kode_kamar, 
			'hapus' => $dtregis->hapus, 
			'idasal' => $dtregis->id, 
			'pindah'  => "0"
		);

		$dts = $this->db->insert('register_detail', $datasimpan);
		$idInsert = $this->db->insert_id();

		$dataubah = array(
			'status' => "1",
			'tgl_keluar_kamar' => $tgl,
			'jam_keluar' => $jam,
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"),
			'pindah' => "1"
		);

		$this->db->where('id', $dtregis->id);
		$dt = $this->db->update('register_detail', $dataubah);

		$this->load->model("FilterJalan");
		$idParent = $this->FilterJalan->getidparent($dtregis->id);
		if ($idParent == null) {
			$this->FilterJalan->filterpindahkamar($idInsert, $dtregis->id);
		} else {
			if ($idParent->id_parent == 0) {
				$this->FilterJalan->filterpindahkamar($idInsert, $dtregis->id);
			} else {
				$this->FilterJalan->filterpindahkamar($idInsert, $idParent->id_parent);
			}
		}

    return array($dt, "1");
	}

	public function simpaninstalasi($dtnotrans) {
		$date = date_create($this->input->get("instgl"));
		$tgl = date_format($date,"Y-m-d");
		$datasimpan = array(
			'no_rm' => $this->input->get("irm"),
			'nama_pasien' => $this->input->get("inp"), 
			'golongan' => "",
			'tanggal' => $tgl, //date("Y-m-d"), 
			'kode_unit' => $this->input->get("iunit"), 
			'nama_unit' => $this->input->get("iunittext"), 
			'kode_dokter' => $this->input->get("idokter"), 
			'nama_dokter' => $this->input->get("idoktertext"), 
			'rujukan' => "RJ",
			'tgl_masuk' => date("Y-m-d H:i:s"), 
			'kode_unitR' => $this->input->get("unit"), 
			'nama_unitR' => $this->input->get("unittext"), 
			'user1' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"), 
			'kode_dokter_periksa' => "", 
			'nama_dokter_periksa' => "",
			'kode_kelas' => "", 
			'nama_kelas' => "", 
			'notransaksi' => $this->input->get("notrans"), 
			'notransaksi_IN' => $dtnotrans[2], 
			'idrjalan' => "0", 
			'idrinap' => "0", 
			'barulama' => "0",
            'catatan' => $this->input->get("icatatan")
		);

		if ($dtnotrans[1] == 1) {
			$dataubah = array(
				"tgltransaksi" => $dtnotrans[0],
				"nomor" => $dtnotrans[1]
			);
			$this->db->insert('mtransaksiins', $dataubah);
		} else {
			$dataubah = array(
				"tgltransaksi" => $dtnotrans[0],
				"nomor" => $dtnotrans[1]
			);
			$this->db->where("tgltransaksi", $dtnotrans[0]);
			$this->db->update('mtransaksiins', $dataubah);
		}

		$dt = $this->db->insert('register_instalasi', $datasimpan);
		return $dt;
	}

    public function hapusinstalasi() {
        $id = $this->input->get("id");
        $this->db->select("register_instalasi.notransaksi_IN as notransaksi_IN, register_instalasi.notransaksi as notransaksi, munit.IBS as IBS");
        $this->db->from("register_instalasi");
        $this->db->join("munit", "munit.kode_unit = register_instalasi.kode_unit");
        $this->db->where("id", $id);
        $q = $this->db->get();
        $no = $q->row();

        if ($no->IBS == "1") {
            $this->db->select("notransaksi");
            $this->db->from("ptindakanopr");
            $this->db->where("notransaksi", $no->notransaksi);
            $qu = $this->db->get();
            $jum = $qu->num_rows();
        } else {
            $this->db->select("notransaksi_IN");
            $this->db->from("ptindakan_instalasi");
            $this->db->where("notransaksi_IN", $no->notransaksi_IN);
            $qu = $this->db->get();
            $jum = $qu->num_rows();
        }

        if ($jum == 0) {
            $id = $this->input->get("id");
            $this->db->where('id', $id);
            $this->db->delete('register_instalasi');
            return true;
        } else {
            return false;
        }
    }

    public function tindakanlab_old() {
        $no = $this->input->get("notrans");
        $this->db->select("mtindakan.tindakan as tindakan, mtindakan.jasas as jasas, ptindakan_instalasi.id as id, ptindakan_instalasi.nonasuransi, ptindakan_instalasi.diskon");
        $this->db->from("ptindakan_instalasi");
        $this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
        $this->db->where("ptindakan_instalasi.notransaksi", $no);
        $this->db->where("ptindakan_instalasi.kode_unit", 'LABS ');
        $data = $this->db->get();
        return $data->result();
    }

	public function tindakanlab() {
        $no = $this->input->get("notrans");
		$this->db->select("tanggal,nama_dokter, nama_dokter_periksa, nama_unitR,id, nama_unit, notransaksi_IN");
        $this->db->from("register_instalasi");
        $this->db->where("notransaksi", $no);
        $this->db->where("register_instalasi.kode_unit", 'LABS ');
        $data = $this->db->get();
        return $data->result();
    }

	
	public function tindakanlab_header() {
        $no = $this->input->get("notrans");
        $this->db->select("mtindakan.tindakan as tindakan, mtindakan.jasas as jasas, ptindakan_instalasi.id as id, ptindakan_instalasi.nonasuransi, ptindakan_instalasi.diskon");
        $this->db->from("ptindakan_instalasi");
        $this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
        $this->db->where("ptindakan_instalasi.notransaksi", $no);
        $this->db->where("ptindakan_instalasi.kode_unit", 'LABS ');
        $data = $this->db->get();
        return $data->result();
	}
	
    public function tindakanrad_old() {
        $no = $this->input->get("notrans");
        $this->db->select("mtindakan.tindakan as tindakan, mtindakan.jasas as jasas, ptindakan_instalasi.id as id, ptindakan_instalasi.nonasuransi, ptindakan_instalasi.diskon,ptindakan_instalasi.tanggal as tanggal");
        $this->db->from("ptindakan_instalasi");
        $this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
        $this->db->where("ptindakan_instalasi.notransaksi", $no);
        $this->db->where("ptindakan_instalasi.kode_unit", 'RDGL ');
        $data = $this->db->get();
        return $data->result();
    }


	public function tindakanrad() {
        $no = $this->input->get("notrans");
		//cari no rmnya dulu
		$qry2=$this->db->query("select no_rm from register_instalasi where notransaksi='$no' limit 1 ");
		$rm='';
		foreach ($qry2->result_array() as $brs9) {
            $rm=$brs9['no_rm'];
        }

        $this->db->select("mtindakan.tindakan as tindakan, mtindakan.jasas as jasas, ptindakan_instalasi.id as id, ptindakan_instalasi.nonasuransi, ptindakan_instalasi.diskon,ptindakan_instalasi.tanggal as tanggal, register_instalasi.nama_dokter as nama_dokter, register_instalasi.nama_dokter_periksa as nama_dokter_periksa, register_instalasi.nama_unitR as nama_unitR, ptindakan_instalasi.no_rm as no_rm");
        $this->db->from("ptindakan_instalasi");
        $this->db->join("register_instalasi", "register_instalasi.notransaksi_IN = ptindakan_instalasi.notransaksi_IN");
        $this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
        $this->db->where("ptindakan_instalasi.kode_unit", 'RDLG ');
        $this->db->where("ptindakan_instalasi.no_rm", $rm);
        $data = $this->db->get();
        return $data->result();
    }

    public function tindakanhem() {
        $no = $this->input->get("notrans");
        $this->db->select("mtindakan.tindakan as tindakan, mtindakan.jasas as jasas, ptindakan_instalasi.id as id, ptindakan_instalasi.nonasuransi, ptindakan_instalasi.diskon");
        $this->db->from("ptindakan_instalasi");
        $this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
        $this->db->where("ptindakan_instalasi.notransaksi", $no);
        $this->db->where("ptindakan_instalasi.kode_unit", 'HMDL ');
        $data = $this->db->get();
        return $data->result();
    }

    public function tindakanopr() {
        $no = $this->input->get("notrans");
        $this->db->select("ptindakanopr.id as id, mtindakan.tindakan as tindakan, mtindakan.jasas as jasas, ptindakanopr.tgl_periksa as tgl_periksa, ptindakanopr.nama_dokter as nama_dokter, ptindakanopr.nama_anastesi as nama_anastesi, ptindakanopr.spe_anak as spe_anak, ptindakanopr.nama_penata as nama_penata, ptindakanopr.id as id,ptindakanopr.nonasuransi as nonasuransi,ptindakanopr.diskon as diskon ");
        $this->db->from("ptindakanopr");
        $this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakanopr.tindakan");
        $this->db->where("ptindakanopr.notransaksi", $no);
        $this->db->where("ptindakanopr.kode_unit", 'IBSS ');
        $data = $this->db->get();
        return $data->result();
    }

    public function tindakanbsr() {
        $no = $this->input->get("notrans");
        $this->db->select("tanggal, tindakan, jasas, jasap, kode_dokter, nama_dokter, kode_spe_anak, spe_anak, kode_bidan, nama_bidan, kode_dokanastesi, dokanastesi, id");
        $this->db->from("ptindakanlahir");
        $this->db->where("notransaksi", $no);
        $this->db->where("kode_unit", 'KMBS ');
        $data = $this->db->get();
        return $data->result();
    }

// tambahan untuk resep

	public function daftarheader() {
		$notrx = $this->input->get("notrans");
		$this->db->select('resep_detail.namaobat,resep_detail.noresep,resep_detail.satuanpakai,resep_detail.qty,resep_detail.hargapakai as hargapakai,resep_detail.dosis, resep_detail.idnoresep, resep_header.tglresep as tglresep,resep_header.notraksaksi as notraksaksi');
		$this->db->from("resep_detail");
		$this->db->join("resep_header", "resep_header.noresep = resep_detail.noresep");
		$this->db->where("notraksaksi", $notrx);
		$data = $this->db->get();
		return $data->result();
	}

	public function daftarresep1() {
		$this->db->from("resep_detail");
		$data = $this->db->get();
		return $data->row();
	}

	public function daftarresep_oldx() {
		$no = $this->input->get("notrans");
		$this->db->select("resep_detail.idnoresep as idnoresep, resep_detail.namaobat as namaobat, resep_header.noresep as noresep1, resep_detail.qty as qty, resep_detail.satuanpakai as satuanpakai, resep_detail.dosis as dosis, resep_header.notraksaksi as notransaksi, resep_header.tglresep as tglresep");
		$this->db->from("resep_detail");
		$this->db->join("resep_header", "resep_header.noresep = resep_detail.noresep");
		$this->db->where("resep_header.notraksaksi", $no);
		$data = $this->db->get();
		return $data->row();
	}

	public function ambildosis() {
        $this->db->select('*');
        $this->db->from('mdosis');
        $data = $this->db->get();
        return $data->result();
    }

	public function simpanpelayananobat($dtpasien) {
		$date = date_create($this->input->get("obattgl"));
		$tgl = date_format($date,"Y-m-d");
		list($kdobat, $idobat) = explode("_", $this->input->get("obatobat"), 2);
		$notrxnya=$this->input->get("notrans");
		$kode_unitnya = $this->input->get("unit");
		$golongan = $this->input->get("golongan");
		if ($golongan == 'UMUM') { $typenya='Umum';} else {$typenya='Jaminan';}
		$qry2=$this->db->query("select noresep from resep_header where notraksaksi='$notrxnya' and kode_unit='$kode_unitnya' limit 1 ");
		$ada=$qry2->num_rows();
		foreach ($qry2->result_array() as $brs9) {
            $noresepnya=$brs9['noresep'];
        }

		// $noresepnya=$this->input->get("norep");
		// if ($noresepnya == NULL) {
		if ($ada == 0 ){
			// $vn=$this->input->get("notrans");
			// // $tgl = date("Y-m-d");
			// printf($v);
			// printf($vn);
			$this->db->from("mresepnumber");
			$this->db->where("tgltransaksi", $tgl);
			$this->db->limit(1);
			$data = $this->db->get();
			if ($data->result() == NULL) {
				$numstart = 1;
				$numdate = str_replace("-", "", $tgl);
				$numend = sprintf("%05d", $numstart);
				$numgabung = "AP" . substr($numdate, 2) . $numend;
				// return array($tgl, $numstart, $numgabung);
				$qry2=$this->db->query("insert into mresepnumber(tgltransaksi,no) VALUES ('$tgl','$numstart')");;
			} else {
				$t = $data->row();
				$numstart = $t->no + 1;
				$numdate = str_replace("-", "", $tgl);
				$numend = sprintf("%05d", $numstart);
				$numgabung = "AP" . substr($numdate, 2) . $numend;
				// return array($tgl, $numstart, $numgabung);
				$qry2=$this->db->query("update mresepnumber set no='".$numstart."' where tgltransaksi='$tgl' limit 1");
			}
			$noresep= $numgabung;
			
			$datasimpanheader = array(
				'noresep' => $noresep, 
				'no_rm' => $this->input->get("irm"), 
				'rirj' => 'RJ', 
				'tglresep' => $this->input->get("obattgl"), 
				'kode_unit' => $this->input->get("unit"), 
				'nama_unit' => $this->input->get("unittext"),
				'kode_dokter' => $this->input->get("kode_dokter"),
				'nama_dokter' => $this->input->get("nama_dokter"),
				'idnoresep' => 0, 
				'golongan' => $golongan,
				'idgolongan' => 0, 
				'nosjp' => '', 
				'notraksaksi' =>$this->input->get("notrans"),
				'user' => $this->session->userdata("nmuser"),
				'user2' => $this->session->userdata("nmuser"),
				'nama_umum' => $this->input->get("nama_umum"),
				'kode_depo' => '',
				'nama_depo' => '',
				'shift' => '',
				'type' => $typenya,
				'lastlogin' => date("Y-m-d H:i:s")
			);
			$this->db->insert('resep_header', $datasimpanheader);		
		} else { $noresep=$noresepnya;}
		$datasimpan = array(
			'noresep' => $noresep, 
			// 'idobat' => $this->input->get("obatobat"), 
			'idobat' => $idobat, 
			'kodeobat' => $kdobat, 
			'namaobat' => $this->input->get("obatobattext"), 
			'qty' => $this->input->get("obatqty"), 
			'satuanpakai' => $this->input->get("obatstauan"), 
			'hargapakai' => $this->input->get("obatharga"),
			'tuslag' => 0,
			'jumlah' => $this->input->get("obatqty")*$this->input->get("obatharga"),
			'dosis' => $this->input->get("dosis"), 
			'catatanresep' =>$this->input->get("catatanresep"),
			'user' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s")
		);

		$dt = $this->db->insert('resep_detail', $datasimpan);
		return $dt;
		// return array($dt, $noresep);
	
	}

	//untuk antrian
	public function simpanantrian() {
		$tgl = date("Y-m-d");
		$id = $this->input->get("id");
		$idnya = $this->input->get("idnya");
		$unit = $this->input->get("unit");
		$qry2=$this->db->query("select huruppoli,suarapoli,lantai from munit where kode_unit='$unit' limit 1 ");
		foreach ($qry2->result_array() as $brs9) {
            // $huruppoli=$brs9['huruppoli'];
            $suarapoli=$brs9['suarapoli'];
            $lantai=$brs9['lantai'];

        }
		//cek kode dokter dulu
		$kode_dokter_rdetail = $this->db->query("SELECT * FROM register_detail WHERE id = '".$idnya."' LIMIT 1")->row();
		if (!isset($kode_dokter_rdetail)) {
			return;
		}
		$kode_dokternya = $kode_dokter_rdetail->kode_dokter;

		// $unitUrj = $this->db->query("SELECT * FROM munit_rj WHERE kode_unit = '".$unit."' LIMIT 1")->row();
		$unitUrj = $this->db->query("SELECT * FROM munit_rj WHERE kode_dokter = '".$kode_dokternya."' LIMIT 1")->row();
		if (!isset($unitUrj)) {
			return;
		}
		$huruppoli = $unitUrj->huruf_poli;
		
		$qry2=$this->db->query("select no_antrian,kode_booking from register_detail where id='$id' limit 1 ");
		foreach ($qry2->result_array() as $brs9) {
            $no_antrian=$brs9['no_antrian'];
            $kodebooking=$brs9['kode_booking'];
        }
		//masukkan di file antrian_poli
		$datasimpan = array(
			'nomor' => $no_antrian, 
			'huruppoli' => $huruppoli, 
			'suarapoli' => $suarapoli
		);
		
		// if ($lantai == 1){
		// 	$dt = $this->db->insert('antrian_poli', $datasimpan);
		// } else {
		// 	$dt = $this->db->insert('antrian_poli_l2', $datasimpan);
		// }	

		if ($lantai == 1){
			$dt = $this->db->insert('antrian_poli', $datasimpan);
		} elseif ($lantai == 2) {
			$dt = $this->db->insert('antrian_poli_l2', $datasimpan);
		} elseif ($lantai == 3) {
			$dt = $this->db->insert('antrian_poli_l3', $datasimpan);
		} elseif ($lantai == 4) {
			$dt = $this->db->insert('antrian_poli_l4', $datasimpan);
		} elseif ($lantai == 5) {
			$dt = $this->db->insert('antrian_poli_l5', $datasimpan);
		} else {
			$dt = $this->db->insert('antrian_poli_l6', $datasimpan);
		}	

		//simpan di taskid4
		//cari dulu di y_updatewaktu
		$qry21=$this->db->query("select kodebooking from y_updatewaktu where kodebooking='$kodebooking' and taskid=5 limit 1 ");
		$ada=$qry21->num_rows();
		if ($ada > 0) {
			//taskid 5 sdh ada jgn di save lagi
		} else {
			$qry23=$this->db->query("select kodebooking from y_updatewaktu where kodebooking='$kodebooking' and taskid=4 limit 1 ");
			$ada1=$qry23->num_rows();
			if ($ada1 > 0) {
				//berarti data sdh ada sebelumnya...update
				date_default_timezone_set('Asia/Makassar');
				$waktusekarang=date("Y-m-d H:i:sa");
				$this->db->query("update y_updatewaktu set waktu='".$waktusekarang."' where kodebooking='$kodebooking' and taskid=4 limit 1");
			}  else {
				date_default_timezone_set('Asia/Makassar');
				$waktusekarang=date("Y-m-d H:i:sa");
				$simpantaskid4 = array(
					'kodebooking' => $kodebooking,
					'taskid' => 4,
					'waktu' => $waktusekarang,
					'flag' => 0
				);
				$this->db->insert('y_updatewaktu', $simpantaskid4);
			}
		}
		$antriannya=$huruppoli.$no_antrian;
		$qry2=$this->db->query("update munit set antrian='$antriannya', tanggal='$tgl' where kode_unit='$unit' limit 1");

		$qry22=$this->db->query("update register set taskid4=1 where kode_booking='$kodebooking' limit 1");

		return $dt;
    }

	public function dtchecktindakan() {
		$this->db->select("tindakan as tindakan");
		$this->db->from("ptindakan_instalasi");
		$this->db->where("ptindakan_instalasi.kode_unit", 'LABS');
		$data = $this->db->get();
		return $data->result();
	}

	public function dtproseslab() {
		$id = $this->input->get("id");
		$this->db->select("register_instalasi.no_rm as no_rm, register_instalasi.nama_pasien as nama_pasien, register_instalasi.nama_unitR as nama_unitR, register.golongan as golongan, register_instalasi.nama_dokter as nama_dokter, register_instalasi.nama_dokter_periksa as nama_dokter_periksa, register_instalasi.id as id, register_instalasi.notransaksi as notransaksi, register_instalasi.notransaksi_IN as notransaksi_IN,register_instalasi.tanggal as tanggal,register_instalasi.diagnosa as diagnosa ");
		$this->db->from("register");
		$this->db->join("register_instalasi", "register_instalasi.notransaksi = register.notransaksi");
		$this->db->where("register_instalasi.id", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function dtproseslab_rj() {
		$id = $this->input->get("id");
		$this->db->select("register_instalasi.no_rm as no_rm, register_instalasi.nama_pasien as nama_pasien, register_instalasi.nama_unitR as nama_unitR, register.golongan as golongan, register_instalasi.nama_dokter as nama_dokter, register_instalasi.nama_dokter_periksa as nama_dokter_periksa, register_instalasi.id as id, register_instalasi.notransaksi as notransaksi, register_instalasi.notransaksi_IN as notransaksi_IN,register_instalasi.tanggal as tanggal, register_instalasi.diagnosa as diagnosa ");
		$this->db->from("register");
		$this->db->join("register_instalasi", "register_instalasi.notransaksi = register.notransaksi");
		$this->db->where("register_instalasi.id", $id);
		$data = $this->db->get();
		return $data->result();

	}

	public function datatindakaninstalasi() {
		$id = $this->input->get("id");
		$this->db->select("mtindakan.tindakan as tindakan, mtindakan.jasas as jasas, ptindakan_instalasi.id as id, ptindakan_instalasi.nonasuransi, ptindakan_instalasi.diskon, ptindakan_instalasi.idlis");
		$this->db->from("ptindakan_instalasi");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
		$this->db->where("ptindakan_instalasi.notransaksi_IN", $id);
		$data = $this->db->get();
		return $data->result();
	}

	public function masterlabjenis() {
		$this->db->from("mlab_jenis");
		$data = $this->db->get();
		return $data->result();
	}


	public function dtchecktindakanlab() {
		$id = $this->input->get("id");
		$qry2=$this->db->query("select notransaksi_IN from register_instalasi where id='$id' limit 1 ");
		foreach ($qry2->result_array() as $brs9) {
            $notransaksi_IN=$brs9['notransaksi_IN'];
        }
		$this->db->select("tindakan as tindakan");
		$this->db->from("ptindakan_instalasi");
		$this->db->where("ptindakan_instalasi.notransaksi_IN", $notransaksi_IN);
		$data = $this->db->get();
		return $data->result();
	}

	public function cektindakanada($kodelab,$noinst) {
		$this->db->from("ptindakan_instalasi");
		$this->db->where("tindakan", $kodelab);
		$this->db->where("notransaksi_IN", $noinst);
		$data = $this->db->get();
		return $data->num_rows();
	}

	public function cariharga($kodelab) {
		$this->db->select("jasas,idpaketlis");
		$this->db->from("mtindakan");
		$this->db->where("kode_tindakan", $kodelab);
		$data = $this->db->get();
		return $data->row();
	}

	public function simpantindakanlab() {
		$tindakannya = $this->input->get("hasil"); //array
		$notransin = $this->input->get("noinst");
		$diagnosa = $this->input->get("diag");
		
		//cari di file register_instalasi
		$qry2=$this->db->query("select tanggal,notransaksi,no_rm from register_instalasi where notransaksi_IN='$notransin' limit 1 ");
		foreach ($qry2->result_array() as $brs9) {
            $labtgl=$brs9['tanggal'];
            $notrans=$brs9['notransaksi'];
            $rm=$brs9['no_rm'];
        }

		$um = '';
		$date = $labtgl;
		$pecah=explode("_",$tindakannya);
		$dt=false;
		for($i=0; $i < count($pecah)-1; $i++){
			$kode_tindakan=$pecah[$i];
			//------------cari harga dan idlis-------------
			$harganya= $this->cariharga($kode_tindakan)->jasas;
			$idlisnya= $this->cariharga($kode_tindakan)->idpaketlis;

			//cek dulu apa sdh ada tindakannya atau belum
			$cek=$this->cektindakanada($kode_tindakan,$notransin);
			if ($cek == 0 || $cek == null) {
				$datasimpan = array(
				'kode_unit' => 'LABS', 
				'nama_unit' => 'LABORATORIUN', 
				'no_rm' => $rm, 
				'tanggal' =>  $date,  //date("Y-m-d"), 
				'tindakan' => $kode_tindakan, 
				'jasas' => $harganya, 
				'jasap' => "0", 
				'jasam' => "0", 
				'jasaa' => "0",
				'perawatsaja' => "0", 
				'type' => "0", 
				'tanggungaskes' => "0", 
				'user1' => $this->session->userdata("nmuser"), 
				'user2' => $this->session->userdata("nmuser"), 
				'lastlogin' => date("Y-m-d H:i:s"), 
				'notransaksi' => $notrans, 
				'notransaksi_IN' => $notransin, 
				'hasil' => "", 
				'hasilfoto' => "", 
				'cnama' => "", 
				'cumur' => "", 
				'cjk' => "", 
				'calamat' => "", 
				'cjenispemeriksaan' => "", 
				'ctanggal' => "", 
				'cnofoto' => "", 
				'cruangan' => "", 
				'cklinis' => "", 
				'cdokter' => "", 
				'judul' => "", 
				'Hepar' => "", 
				'GB' => "", 
				'Pancreas' => "", 
				'Lien' => "", 
				'ren' => "", 
				'Urinaria' => "", 
				'kesan' => "", 
				'jenis' => "0", 
				'tambahan' => "", 
				'jam' => date("H:i:s"), 
				'qty' => "1",
				'nonasuransi' => "0",
				'diskon' => "0",
				'idlis' => $idlisnya
				);
				$dt = $this->db->insert('ptindakan_instalasi', $datasimpan);
			}
		}
		$dataubah = array(
			'diagnosa' => $diagnosa
		);
		$this->db->where("notransaksi_IN", $notransin);
		$this->db->limit(1);
		$dt1 = $this->db->update("register_instalasi", $dataubah);
		return $dt;
	}


	//form radiologi

	public function simpantindakanrad() {
		$tindakannya = $this->input->get("hasil"); //array
		$notransin = $this->input->get("noinst");
		$diagnosa = $this->input->get("diag");
		
		//cari di file register_instalasi
		$qry2=$this->db->query("select tanggal,notransaksi,no_rm from register_instalasi where notransaksi_IN='$notransin' limit 1 ");
		foreach ($qry2->result_array() as $brs9) {
            $labtgl=$brs9['tanggal'];
            $notrans=$brs9['notransaksi'];
            $rm=$brs9['no_rm'];
        }

		$um = '';
		$date = $labtgl;
		$pecah=explode("_",$tindakannya);
		$dt=false;
		for($i=0; $i < count($pecah)-1; $i++){
			$kode_tindakan=$pecah[$i];
			//------------cari harga dan idlis-------------
			$harganya= $this->cariharga($kode_tindakan)->jasas;
			$idlisnya= $this->cariharga($kode_tindakan)->idpaketlis;

			//cek dulu apa sdh ada tindakannya atau belum
			$cek=$this->cektindakanada($kode_tindakan,$notransin);
			if ($cek == 0 || $cek == null) {
				$datasimpan = array(
				'kode_unit' => 'RDLG', 
				'nama_unit' => 'RADIOLOGI', 
				'no_rm' => $rm, 
				'tanggal' =>  $date,  //date("Y-m-d"), 
				'tindakan' => $kode_tindakan, 
				'jasas' => $harganya, 
				'jasap' => "0", 
				'jasam' => "0", 
				'jasaa' => "0",
				'perawatsaja' => "0", 
				'type' => "0", 
				'tanggungaskes' => "0", 
				'user1' => $this->session->userdata("nmuser"), 
				'user2' => $this->session->userdata("nmuser"), 
				'lastlogin' => date("Y-m-d H:i:s"), 
				'notransaksi' => $notrans, 
				'notransaksi_IN' => $notransin, 
				'hasil' => "", 
				'hasilfoto' => "", 
				'cnama' => "", 
				'cumur' => "", 
				'cjk' => "", 
				'calamat' => "", 
				'cjenispemeriksaan' => "", 
				'ctanggal' => "", 
				'cnofoto' => "", 
				'cruangan' => "", 
				'cklinis' => "", 
				'cdokter' => "", 
				'judul' => "", 
				'Hepar' => "", 
				'GB' => "", 
				'Pancreas' => "", 
				'Lien' => "", 
				'ren' => "", 
				'Urinaria' => "", 
				'kesan' => "", 
				'jenis' => "0", 
				'tambahan' => "", 
				'jam' => date("H:i:s"), 
				'qty' => "1",
				'nonasuransi' => "0",
				'diskon' => "0",
				'idlis' => $idlisnya
				);
				$dt = $this->db->insert('ptindakan_instalasi', $datasimpan);
			}
		}
		$dataubah = array(
			'diagnosa' => $diagnosa
		);
		$this->db->where("notransaksi_IN", $notransin);
		$this->db->limit(1);
		$dt1 = $this->db->update("register_instalasi", $dataubah);
		return $dt;
	}

		//untuk berkas tiba di poli
		public function berkastibadipoli() {
			// $tgl = date("Y-m-d");
			$idreg = $this->input->get("idreg");
			$qry22=$this->db->query("update register set berkas=2 where id='$idreg' limit 1");
	
			return $qry22;
		}

		public function berkastibadirm() {
			// $tgl = date("Y-m-d");
			$idreg = $this->input->get("idreg");
			$qry22=$this->db->query("update register set berkas=5 where id='$idreg' limit 1");
	
			return $qry22;
		}

		public function datamtdsoap() {
			$no_rm = $this->input->get("no_rm");
			$this->db->from("psoap");
			$this->db->where("no_rm", $no_rm);
			$this->db->order_by("tanggal", "desc");
			$data = $this->db->get();
			return $data->result();
		}
		public function ambildatasoap() {
			$id = $this->input->get("id");
			$this->db->from("psoap");
			$this->db->where("id", $id);
			$data = $this->db->get();
			// return $data->result();
			// return $data;
			return $data->row();
		}

		public function savedatasoap() {
			$id=$this->input->get("id");
			$datasimpan = array(
				'keluhanutama' => $this->input->get("keluhanutama"), 
				'riwayatsekarang' => $this->input->get("riwayatsekarang"), 
				'riwayatdahulu' => $this->input->get("riwayatdahulu"), 
				'alergi' => $this->input->get("alergi"), 
				'suhu' => $this->input->get("suhu"), 
				'tinggi' => $this->input->get("tinggi"), 
				'tensi' => $this->input->get("tensi"), 
				'respirasi' => $this->input->get("respirasi"), 
				'nadi' => $this->input->get("nadi"), 
				'spo2' => $this->input->get("spo2"), 
				'gcs' => $this->input->get("gcs"), 
				'kesadaran' => $this->input->get("kesadaran"), 
				'kesadaranlain' => $this->input->get("kesadaranlainnya"), 
				'objektif' => $this->input->get("objektif"), 
				'assesment' => $this->input->get("assesment"), 
				'plan' => $this->input->get("plan"), 
				'instruksi' => $this->input->get("instruksi"), 
				'evaluasi' => $this->input->get("evaluasi"),
				'diagnosa'=>$this->input->get('icd')
			);
			$this->db->where("id",$id);
			$this->db->limit(1);
			$dt = $this->db->update('psoap', $datasimpan);

	}
}
