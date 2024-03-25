<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Urimdl extends CI_Model
{
	public function carinamapasienuri()
	{
		$unit = $this->input->get("unit");
		$nrp = $this->input->get("nrp");
		$this->db->select("register.no_rm as no_rm, register_detail.nama_unit as nama_unit, register_detail.tgl_masuk_kamar as tgl_masuk_kamar, register.rujukan as rujukan, register.golongan as golongan, register.notransaksi as notransaksi, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register_detail.kode_dokter as kode_dokter, register_detail.nama_dokter as nama_dokter, register.id as idreg, register_detail.id as id, register_detail.kode_kamar as kode_kamar, register.diag_estimasi as diag_estimasi, register.tarif_estimasi as tarif_estimasi, register.tarifbilling as tarifbilling,register.billing as billing, register_detail.kode_kelas_hak as kode_kelas_hak");
		$this->db->select("mkamar.nama_kamar as nama_kamar,mkamar.nama_kelas as nama_kelas, register_detail.pindah as pindah, register_detail.pulang as pulang,register_detail.status as status, pasien.title as title ");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		$this->db->join("mkamar", "register_detail.kode_kamar = mkamar.kode_kamar", "left");
		if (($unit != "") || ($unit != null)) {
			$this->db->where("register_detail.kode_unit", $unit);
		}
		if (($nrp != "") || ($nrp != null)) {
			// $this->db->like("register_detail.no_rm", $nrp, "both");
			$this->db->like("register_detail.no_rm", $nrp);
		}
		// $this->db->where("register.status_billing",0);		
		$this->db->order_by("register_detail.status", "ASC");
		$this->db->order_by("register_detail.pulang", "ASC");
		$this->db->order_by("register.tgl_masuk", "DESC");
		$this->db->order_by("register.no_rm", "ASC");

		$data = $this->db->get();
		return $data->result();
	}


	public function geibillingdata($id)
	{
		$this->db->select("billing");
		$this->db->from("register");
		$this->db->where("id", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function getcollectbilling()
	{
		$id = $this->input->get("id");
		$notrx = $this->input->get("notrans");

		// isi disini




		return 'get Bill';
	}


	public function getestimatedata($id)
	{
		$this->db->select("diag_estimasi, tarif_estimasi");
		$this->db->from("register");
		$this->db->where("id", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function gantiestimasi()
	{
		$id = $this->input->get("id");
		$estDiag = $this->input->get("estDiag");
		$estBiaya = $this->input->get("estBiaya");
		$dataubah = array(
			'diag_estimasi' => $estDiag,
			'tarif_estimasi' => $estBiaya
		);
		$this->db->where("id", $id);
		$dt = $this->db->update("register", $dataubah);
		return $dt;
	}

	public function gantidokter()
	{
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

	public function gantikamar()
	{
		$id = $this->input->get("id");
		$kamarf = $this->input->get("kamarf");
		$cektitipan = gantiangka($this->input->get("cektitipan"));
		// cari kode_kelas dan nama_kelasnya untuk edit nama kelas di register detail
		$qry22 = $this->db->query("SELECT * FROM mkamar WHERE kode_kamar = '$kamarf' LIMIT 1");
		foreach ($qry22->result_array() as $brs22) {
			$kode_kelas = $brs22['kode_kelas'];
			$nama_kelas = $brs22['nama_kelas'];
		}

		if ($cektitipan == 1) {
			list($kdunit, $kdkelas, $nmunit) = explode("_", $this->input->get("pkunithak"), 3);
			$kode_kelas_hak = $kdkelas;
			$kode_kamar_hak = $this->input->get("kamarhak");
			$dataubah = array(
				'kode_kamar' => $kamarf,
				'kode_kelas' => $kode_kelas,
				'nama_kelas' => $nama_kelas,
				'titipan' => '1',
				'kode_kelas_hak' => $kode_kelas_hak,
				'kode_kamar_hak' => $kode_kamar_hak
			);
		} else {
			$dataubah = array(
				'kode_kamar' => $kamarf,
				'kode_kelas' => $kode_kelas,
				'nama_kelas' => $nama_kelas,
				'titipan' => '0',
				'kode_kelas_hak' => 'none',
				'kode_kamar_hak' => 'none'
			);
		}
		$this->db->where("id", $id);
		$dt = $this->db->update("register_detail", $dataubah);
		return $dt;
	}

	public function pasiendata()
	{
		$no = $this->input->get("notrans");
		$unit = $this->input->get("unit");
		$this->db->select("pasien.nama_pasien as nama_pasien, register.no_rm as no_rm, register.notransaksi as notransaksi, register_detail.kode_dokter as kode_dokter, register_detail.nama_dokter as nama_dokter, register_detail.pindah as pindah, register_detail.inap_to_poli as inap_to_poli,register.golongan as golongan");
		$this->db->from("register");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->where("register.notransaksi", $no);
		$this->db->where("register_detail.kode_unit", $unit);

		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	// data unntuk form modal pelayanan
	public function datamtdtindakan()
	{
		$no = $this->input->get("notrans");
		$unit = $this->input->get("unit");
		$this->db->select("ptindakanperawat.tanggal as tanggal, ptindakanperawat.jam as jam, ptindakanperawat.tindakan as tindakan, ptindakanperawat.qty as qty, ptindakanperawat.nama_dokter as nama_dokter, ptindakanperawat.id as id, ptindakanperawat.perawatsaja as perawatsaja, ptindakanperawat.nonasuransi as nonasuransi, ptindakanperawat.diskon as diskon");
		$this->db->from("ptindakanperawat");
		$this->db->where("ptindakanperawat.notransaksi", $no);
		$this->db->where("ptindakanperawat.kode_unit", $unit);
		$data = $this->db->get();
		return $data->result();
	}

	public function datamtdbhp()
	{
		$no = $this->input->get("notrans");
		$unit = $this->input->get("unit");
		$this->db->select("tanggal, namaobat, satuanpakai, hargapakai, qty, id, nonasuransi, diskon, nonbill");
		$this->db->from("pbhp");
		$this->db->where("notransaksi", $no);
		$this->db->where("kode_unit", $unit);
		$data = $this->db->get();
		return $data->result();
	}


	public function datamtdodua()
	{
		$no = $this->input->get("notrans");
		$unit = $this->input->get("unit");
		$this->db->select("tgl_pakai, jam, qty, id, nonasuransi, diskon");
		$this->db->from("po2");
		$this->db->where("notransaksi", $no);
		$this->db->where("kode_unit", $unit);
		$data = $this->db->get();
		return $data->result();
	}

	public function datamtdvisite()
	{
		$no = $this->input->get("notrans");
		$unit = $this->input->get("unit");
		$this->db->select("tanggal, jam, nama_dokter, visite, id, nonasuransi, diskon");
		$this->db->from("t_visite");
		$this->db->where("notransaksi", $no);
		$this->db->where("kode_unit", $unit);
		$data = $this->db->get();
		return $data->result();
	}

	public function datamtddarah()
	{
		$no = $this->input->get("notrans");
		$unit = $this->input->get("unit");
		$this->db->select("tanggal, qty, goldarah, id, nonasuransi, diskon");
		$this->db->from("pdarah");
		$this->db->where("notransaksi", $no);
		$this->db->where("kode_unit", $unit);
		$data = $this->db->get();
		return $data->result();
	}

	public function datamtdhistory()
	{
		$no = $this->input->get("notrans");
		$unit = $this->input->get("unit");
		$this->db->select("register.notransaksi as notransaksi, register_detail.kode_unit as kode_unit, register_detail.nama_unit as nama_unit, register_detail.tgl_masuk_kamar as tgl_masuk_kamar, register_detail.tgl_keluar_kamar as tgl_keluar_kamar, register_detail.jam_masuk as jam_masuk, register_detail.jam_keluar as jam_keluar, register_detail.id as id, register_detail.status as status");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->where("register.notransaksi", $no);
		$this->db->where("register_detail.inap_to_poli", 0);
		//		$this->db->where("register_detail.kode_unit", $unit);
		$this->db->order_by("register_detail.id", "desc");
		$data = $this->db->get();
		return $data->result();
	}

	public function datamtdhistoryrujukanpoly()
	{
		$no = $this->input->get("notrans");
		$unit = $this->input->get("unit");
		$this->db->select("register.notransaksi as notransaksi, register_detail.kode_unit as kode_unit, register_detail.nama_unit as nama_unit, register_detail.tgl_masuk_kamar as tgl_masuk_kamar, register_detail.tgl_keluar_kamar as tgl_keluar_kamar, register_detail.jam_masuk as jam_masuk, register_detail.jam_keluar as jam_keluar, register_detail.id as id, register_detail.status as status");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->where("register.notransaksi", $no);
		$this->db->where("register_detail.inap_to_poli", 1);
		//		$this->db->where("register_detail.kode_unit", $unit);
		$this->db->order_by("register_detail.id", "desc");
		$data = $this->db->get();
		return $data->result();
	}

	public function datamtdhistoryrujukanpolyafter($dtregis)
	{
		$no = $dtregis->notransaksi;
		$this->db->select("register.notransaksi as notransaksi, register_detail.kode_unit as kode_unit, register_detail.nama_unit as nama_unit, register_detail.tgl_masuk_kamar as tgl_masuk_kamar, register_detail.tgl_keluar_kamar as tgl_keluar_kamar, register_detail.jam_masuk as jam_masuk, register_detail.jam_keluar as jam_keluar, register_detail.id as id, register_detail.status as status");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->where("register.notransaksi", $no);
		$this->db->where("register_detail.inap_to_poli", 1);
		//		$this->db->where("register_detail.kode_unit", $unit);
		$this->db->order_by("register_detail.id", "desc");
		$data = $this->db->get();
		return $data->result();
	}

	public function datainst()
	{
		$no = $this->input->get("notrans");
		$unit = $this->input->get("unit");
		$this->db->select("id, tanggal, nama_unit, nama_dokter, nama_unitR, nama_dokter_periksa, notransaksi_IN, catatan,kode_unit");
		$this->db->from("register_instalasi");
		$this->db->where("notransaksi", $no);
		$this->db->where("kode_unitR", $unit);
		$this->db->order_by("id", "desc");
		$data = $this->db->get();
		return $data->result();
	}
	//

	// untuk simpan tindakan
	public function ambilhargatindakan()
	{
		$no = $this->input->get("tdtindakan");
		$this->db->select("jasas, jasap");
		$this->db->from("mtindakan");
		$this->db->where("kode_tindakan", $no);
		$data = $this->db->get();
		return $data->row();
	}

	public function simpanpelayanantindakan($dtpasien, $dthargatindakan)
	{
		$rs = $this->input->get("tdrawat");
		$date = date_create($this->input->get("tdtgl"));
		$tgl = date_format($date, "Y-m-d");
		$tim = date_create($this->input->get("tdjam"));
		$jam = date_format($tim, "H:i:s");
		$um = $this->input->get("tdumum");
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
		$dt = $this->db->insert('ptindakanperawat', $datasimpan);
		return $dt;
	}

	public function ambileditdatatindakan()
	{
		$id = $this->input->get("id");
		$this->db->select("tanggal, jam, kode_tindakan, tindakan, qty, nama_dokter, id, perawatsaja, nonasuransi, diskon, jasas, kode_pelaksana_satu, kode_pelaksana_dua");
		$this->db->from("ptindakanperawat");
		$this->db->where("id", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function ubahpelayanantindakan($dthargatindakan)
	{
		$rs = $this->input->get("tdrawat");
		$date = date_create($this->input->get("tdtgl"));
		$tgl = date_format($date, "Y-m-d");
		$tim = date_create($this->input->get("tdjam"));
		$jam = date_format($tim, "H:i:s");
		$um = $this->input->get("tdumum");

		$datasimpan = array(
			'tanggal' => $tgl,
			'tindakan' => $this->input->get("tdtindakantext"),
			'jasas' => $dthargatindakan->jasas,
			'jasap' => $dthargatindakan->jasap,
			'perawatsaja' => gantiangka($rs),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"),
			'kode_dokter' => $this->input->get("tddokter"),
			'nama_dokter' => $this->input->get("tddoktertext"),
			'kode_pelaksana_satu' => $this->input->get("tdpel1"),
			'nama_pelaksana_satu' => $this->input->get("tdpel1text"),
			'kode_pelaksana_dua' => $this->input->get("tdpel2"),
			'nama_pelaksana_dua' => $this->input->get("tdpel2text"),
			'qty' => $this->input->get("tdjml"),
			'jam' => $jam,
			'nonasuransi' => gantiangka($um),
			'diskon' => $this->input->get("tddiskon")
		);
		$this->db->where("id", $this->input->get("id"));
		$dt = $this->db->update('ptindakanperawat', $datasimpan);
		return $dt;
	}

	public function hapuspelayanantindakan()
	{
		$id = $this->input->get("id");
		$this->db->where('id', $id);
		$dt = $this->db->delete('ptindakanperawat');
		return $dt;
	}

	public function simpanpelayananbhp($dtpasien)
	{
		$date = date_create($this->input->get("bhptgl"));
		$tgl = date_format($date, "Y-m-d");
		list($kdobat, $idobat) = explode("_", $this->input->get("bhpbhp"), 2);
		$um = $this->input->get("bhpumum");
		$nb = $this->input->get("nonbill");
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
			'nonbill' => gantiangka($nb)
		);

		$dt = $this->db->insert('pbhp', $datasimpan);
		return $dt;
	}

	public function ambileditdatabhp()
	{
		$id = $this->input->get("id");
		$this->db->select("tanggal, namaobat, satuanpakai, hargapakai, qty, id, kodeobat, nonasuransi, diskon, nonbill");
		$this->db->from("pbhp");
		$this->db->where("id", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function ubahpelayananbhp()
	{
		$date = date_create($this->input->get("bhptgl"));
		$tgl = date_format($date, "Y-m-d");
		list($kdobat, $idobat) = explode("_", $this->input->get("bhpbhp"), 2);
		$um = $this->input->get("bhpumum");
		$nb = $this->input->get("nonbill");
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
			'nonbill' => gantiangka($nb)
		);
		$this->db->where("id", $this->input->get("id"));
		$dt = $this->db->update('pbhp', $datasimpan);
		return $dt;
	}

	public function hapuspelayananbhp()
	{
		$id = $this->input->get("id");
		$this->db->where('id', $id);
		$dt = $this->db->delete('pbhp');
		return $dt;
	}

	public function hapuspelayananobat()
	{
		$id = $this->input->get("id");
		// console.log(id);
		$this->db->where('idnoresep', $id);
		$dt = $this->db->delete('resep_detail');
		return $dt;
	}

	public function simpanpelayananodua($dtpasien)
	{
		$date = date_create($this->input->get("otgl"));
		$tgl = date_format($date, "Y-m-d");
		$tim = date_create($this->input->get("ojam"));
		$jam = date_format($tim, "H:i:s");
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

	public function ambileditdataodua()
	{
		$id = $this->input->get("id");
		$this->db->select("tgl_pakai, jam, qty, id, nonasuransi, diskon");
		$this->db->from("po2");
		$this->db->where("id", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function ubahpelayananodua()
	{
		$date = date_create($this->input->get("otgl"));
		$tgl = date_format($date, "Y-m-d");
		$tim = date_create($this->input->get("ojam"));
		$jam = date_format($tim, "H:i:s");
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

	public function hapuspelayananodua()
	{
		$id = $this->input->get("id");
		$this->db->where('id', $id);
		$dt = $this->db->delete('po2');
		return $dt;
	}

	public function simpanpelayanandokter($dtpasien, $dtunit)
	{
		$date = date_create($this->input->get("dtgl"));
		$tgl = date_format($date, "Y-m-d");
		$tim = date_create($this->input->get("djam"));
		$jam = date_format($tim, "H:i:s");
		$um = $this->input->get("drumum");
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
			'idruangri' => "0",
			'nonasuransi' => gantiangka($um),
			'diskon' => $this->input->get("drdiskon")
		);

		$dt = $this->db->insert('t_visite', $datasimpan);
		return $dt;
	}

	public function ambileditdatadokter()
	{
		$id = $this->input->get("id");
		$this->db->select("tanggal, jam, nama_dokter, kode_dokter, visite, id, nonasuransi, diskon");
		$this->db->from("t_visite");
		$this->db->where("id", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function ubahpelayanandokter()
	{
		$date = date_create($this->input->get("dtgl"));
		$tgl = date_format($date, "Y-m-d");
		$tim = date_create($this->input->get("djam"));
		$jam = date_format($tim, "H:i:s");
		$um = $this->input->get("drumum");
		$datasimpan = array(
			'tanggal' => $tgl,
			'jam' => $jam,
			'kode_dokter' => $this->input->get("ddokter"),
			'nama_dokter' => $this->input->get("ddoktertext"),
			'visite' => $this->input->get("dvisit"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"),
			'nonasuransi' => gantiangka($um),
			'diskon' => $this->input->get("drdiskon")
		);
		$this->db->where("id", $this->input->get("id"));
		$dt = $this->db->update('t_visite', $datasimpan);
		return $dt;
	}

	public function hapuspelayanandokter()
	{
		$id = $this->input->get("id");
		$this->db->where('id', $id);
		$dt = $this->db->delete('t_visite');
		return $dt;
	}

	public function simpanpelayanandarah($dtpasien)
	{
		$date = date_create($this->input->get("drtgl"));
		$tgl = date_format($date, "Y-m-d");
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

	public function ambileditdatadarah()
	{
		$id = $this->input->get("id");
		$this->db->select("tanggal, qty, goldarah, id, nonasuransi, diskon, nonasuransi, diskon");
		$this->db->from("pdarah");
		$this->db->where("id", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function ubahpelayanandarah()
	{
		$date = date_create($this->input->get("drtgl"));
		$tgl = date_format($date, "Y-m-d");
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

	public function hapuspelayanandarah()
	{
		$id = $this->input->get("id");
		$this->db->where('id', $id);
		$dt = $this->db->delete('pdarah');
		return $dt;
	}

	public function cekkdatapasien()
	{
		$norm = $this->input->get("nrp");
		$kamarf = $this->input->get("kamarf");
		$unit = $this->input->get("unit");
		// cari data di kamar perawatan
		$qry22 = $this->db->query("SELECT * FROM register_detail WHERE kode_unit = '$kamarf' and no_rm='$norm' and status=0 LIMIT 1");
		return $qry22->num_rows();
	}

	public function tarikdatapasien()
	{
		$norm = $this->input->get("nrp");
		$kamarf = $this->input->get("kamarf");
		$kamarftext = $this->input->get("kamarftext");
		$unit = $this->input->get("unit");
		//cari nama unit dulu
		$qry1 = $this->db->query("SELECT nama_unit FROM munit WHERE kode_unit = '$unit' LIMIT 1");
		foreach ($qry1->result_array() as $brs1) {
			$unittext = $brs1['nama_unit'];
		}

		// cari data di kamar perawatan
		$qry22 = $this->db->query("SELECT * FROM register_detail WHERE kode_unit = '$kamarf' and no_rm='$norm' and status=0 LIMIT 1");
		if ($qry22->num_rows() > 0) {
			foreach ($qry22->result_array() as $brs22) {
				$id = $brs22['id'];
				$tgl_masuk = $brs22['tgl_masuk'];
				$notransaksi = $brs22['notransaksi'];
				$nama_pasien_sjp = $brs22['nama_pasien_sjp'];
			}
			$date = date_create($this->input->get("tglp1"));
			$tgl = date_format($date, "Y-m-d");
			$tim = date_create($this->input->get("tdwaktu"));
			$jam = date_format($tim, "H:i:s");

			// list($kdunit, $kdkelas, $nmunit) = explode("_", $this->input->get("pkunit"), 3);

			$datasimpan = array(
				'no_rm' => $norm,
				'kode_kelas' => "",
				'nama_kelas' => "",
				'kode_unit' => $unit,
				'nama_unit' => $unittext,
				'tgl_masuk_kamar' => $tgl,
				'tgl_keluar_kamar' => "0000-00-00",
				'tgl_masuk' => $tgl_masuk,
				'status' => "0",
				'user1' => $this->session->userdata("nmuser"),
				'user2' => $this->session->userdata("nmuser"),
				'lastlogin' => date("Y-m-d H:i:s"),
				'rujukandetail' => 0,
				'kode_unitR' => $kamarf,
				'nama_unitR' => $kamarftext,
				'statuskeluar' => 0,
				'nokamar' => "",
				'kamarkeluar' => 0,
				'notransaksi' => $notransaksi,
				'nama_pasien_sjp' => $nama_pasien_sjp,
				'prosesdaftar' => 0,
				'jam_masuk' => $jam,
				'jam_keluar' => "",
				'ruanganaktif' => "",
				'pulang' => 0,
				'kode_kamar' => "",
				'hapus' => 0,
				'idasal' => $id,
				'pindah'  => "0",
				'catatan' => ""
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

			$this->db->where('id', $id);
			$dt = $this->db->update('register_detail', $dataubah);

			$this->load->model("FilterInap");
			$idParent = $this->FilterInap->getidparent($id);
			if ($idParent == null) {
				$this->FilterInap->filterpindahkamar($idInsert, $id);
			} else {
				if ($idParent->id_parent == 0) {
					$this->FilterInap->filterpindahkamar($idInsert, $id);
				} else {
					$this->FilterInap->filterpindahkamar($idInsert, $idParent->id_parent);
				}
			}
			return $dt;
		}
	}

	public function ambildatapindah()
	{
		$no = $this->input->get("notrans");
		$this->db->from("register_detail");
		$this->db->where("notransaksi", $no);
		$this->db->order_by("id desc");
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function ambildatarujukanpoli()
	{
		$no = $this->input->get("notrans");
		$this->db->from("register_detail");
		$this->db->where("notransaksi", $no);
		$this->db->order_by("id asc");
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function ambildatapindahlast()
	{
		$no = $this->input->get("notrans");
		$id = $this->input->get("unit");
		$this->db->from("register_detail");
		$this->db->where("notransaksi", $no);
		$this->db->where("kode_unit", $id);
		$this->db->order_by("id desc");
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function simpanpindahkamar($dtregis)
	{
		$date = date_create($this->input->get("pktgl"));
		$tgl = date_format($date, "Y-m-d");
		$tim = date_create($this->input->get("pkjam"));
		$jam = date_format($tim, "H:i:s");
		list($kdunit, $kdkelas, $nmunit) = explode("_", $this->input->get("pkunit"), 3);

		$datasimpan = array(
			'no_rm' => $dtregis->no_rm,
			'kode_kelas' => $kdkelas,
			'nama_kelas' => $this->input->get("pkunittext"),
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
			'kode_kamar' => "",
			'hapus' => $dtregis->hapus,
			'idasal' => $dtregis->id,
			'pindah'  => "0",
			'catatan' => ""
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

		$this->load->model("FilterInap");
		$idParent = $this->FilterInap->getidparent($dtregis->id);
		if ($idParent == null) {
			$this->FilterInap->filterpindahkamar($idInsert, $dtregis->id);
		} else {
			if ($idParent->id_parent == 0) {
				$this->FilterInap->filterpindahkamar($idInsert, $dtregis->id);
			} else {
				$this->FilterInap->filterpindahkamar($idInsert, $idParent->id_parent);
			}
		}

		return array($dt, "1");
	}

	public function ambilnotrans_to_poli()
	{
		$tgl = date("Y-m-d");
		$this->db->from("mtransaksi_to_poli");
		$this->db->where("tgltransaksi", $tgl);
		$this->db->limit(1);
		$data = $this->db->get();
		if ($data->result() == NULL) {
			$numstart = 1;
			$numdate = str_replace("-", "", $tgl);
			$numend = sprintf("%05d", $numstart);
			$numgabung = "TRP" . substr($numdate, 2) . $numend;
			return array($tgl, $numstart, $numgabung);
		} else {
			$t = $data->row();
			$numstart = $t->nomor + 1;
			$numdate = str_replace("-", "", $tgl);
			$numend = sprintf("%05d", $numstart);
			$numgabung = "TRP" . substr($numdate, 2) . $numend;
			return array($tgl, $numstart, $numgabung);
		}
	}

	public function simpanrujukanpoli($dtregis)
	{
		$date = date_create($this->input->get("pktgl"));
		$tgl = date_format($date, "Y-m-d");
		$tim = date_create($this->input->get("pkjam"));
		$jam = date_format($tim, "H:i:s");
		list($kdunit, $nmunit) = explode("_", $this->input->get("pkunit"), 2);
		$poli_transaksi = $this->ambilnotrans_to_poli();

		$datasimpan = array(
			'no_rm' => $dtregis->no_rm,
			'kode_kelas' => " ",
			'nama_kelas' => " ",
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
			'kode_unitR' => $dtregis->kode_unit,
			'nama_unitR' => $dtregis->nama_unit,
			'statuskeluar' => $dtregis->statuskeluar,
			'nokamar' => $dtregis->nokamar,
			'kamarkeluar' => $dtregis->kamarkeluar,
			'notransaksi' => $dtregis->notransaksi,
			'no_transaksi_secondary' => $poli_transaksi[2],
			'nama_pasien_sjp' => $dtregis->nama_pasien_sjp,
			'prosesdaftar' => $dtregis->prosesdaftar,
			'jam_masuk' => $jam,
			'jam_keluar' => "",
			'ruanganaktif' => $dtregis->ruanganaktif,
			'pulang' => $dtregis->pulang,
			'kode_kamar' => $dtregis->kode_kamar,
			'hapus' => $dtregis->hapus,
			'idasal' => $dtregis->id,
			'pindah'  => "0",
			'inap_to_poli' => "1"
		);

		$dts = $this->db->insert('register_detail', $datasimpan);

		if ($poli_transaksi[1] == 1) {
			$dataubah = array(
				"tgltransaksi" => $poli_transaksi[0],
				"nomor" => $poli_transaksi[1]
			);
			$this->db->insert('mtransaksi_to_poli', $dataubah);
		} else {
			$dataubah = array(
				"tgltransaksi" => $poli_transaksi[0],
				"nomor" => $poli_transaksi[1]
			);
			$this->db->where("tgltransaksi", $poli_transaksi[0]);
			$this->db->update('mtransaksi_to_poli', $dataubah);
		}

		//        $dataubah = array(
		//            'status' => "1",
		//            'tgl_keluar_kamar' => $tgl,
		//            'jam_keluar' => $jam,
		//            'user2' => $this->session->userdata("nmuser"),
		//            'lastlogin' => date("Y-m-d H:i:s"),
		//            'pindah' => "1"
		//        );
		//
		//        $this->db->where('id', $dtregis->id);
		//        $dt = $this->db->update('register_detail', $dataubah);
		return array($dts, "1");
	}

	public function simpaninstalasi($dtnotrans)
	{
		$date = date_create($this->input->get("instgl"));
		$tgl = date_format($date, "Y-m-d");
		$datasimpan = array(
			'no_rm' => $this->input->get("irm"),
			'nama_pasien' => $this->input->get("inp"),
			'golongan' => "",
			'tanggal'  => $tgl,  //=> date("Y-m-d"), 
			'kode_unit' => $this->input->get("iunit"),
			'nama_unit' => $this->input->get("iunittext"),
			'kode_dokter' => $this->input->get("idokter"),
			'nama_dokter' => $this->input->get("idoktertext"),
			'rujukan' => "RI",
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

	public function hapusinstalasi()
	{
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

	public function tindakanlab()
	{
		$no = $this->input->get("notrans");
		$this->db->select("mtindakan.tindakan as tindakan, mtindakan.jasas as jasas, ptindakan_instalasi.id as id, ptindakan_instalasi.nonasuransi, ptindakan_instalasi.diskon");
		$this->db->from("ptindakan_instalasi");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
		$this->db->where("ptindakan_instalasi.notransaksi", $no);
		$this->db->where("ptindakan_instalasi.kode_unit", '0301 ');
		$data = $this->db->get();
		return $data->result();
	}

	public function tindakanrad()
	{
		$no = $this->input->get("notrans");
		$this->db->select("mtindakan.tindakan as tindakan, mtindakan.jasas as jasas, ptindakan_instalasi.id as id, ptindakan_instalasi.nonasuransi, ptindakan_instalasi.diskon,ptindakan_instalasi.tanggal as tanggal");
		$this->db->from("ptindakan_instalasi");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
		$this->db->where("ptindakan_instalasi.notransaksi", $no);
		$this->db->where("ptindakan_instalasi.kode_unit", '0303 ');
		$data = $this->db->get();
		return $data->result();
	}

	public function tindakanhem()
	{
		$no = $this->input->get("notrans");
		$this->db->select("mtindakan.tindakan as tindakan, mtindakan.jasas as jasas, ptindakan_instalasi.id as id, ptindakan_instalasi.nonasuransi, ptindakan_instalasi.diskon");
		$this->db->from("ptindakan_instalasi");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
		$this->db->where("ptindakan_instalasi.notransaksi", $no);
		$this->db->where("ptindakan_instalasi.kode_unit", '0314 ');
		$data = $this->db->get();
		return $data->result();
	}

	public function tindakanopr()
	{
		$no = $this->input->get("notrans");
		$this->db->select("ptindakanopr.id as id, mtindakan.tindakan as tindakan, mtindakan.jasas as jasas, ptindakanopr.tgl_periksa as tgl_periksa, ptindakanopr.nama_dokter as nama_dokter, ptindakanopr.nama_anastesi as nama_anastesi, ptindakanopr.spe_anak as spe_anak, ptindakanopr.nama_penata as nama_penata, ptindakanopr.id as id,ptindakanopr.nonasuransi as nonasuransi,ptindakanopr.diskon as diskon ");
		$this->db->from("ptindakanopr");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakanopr.tindakan");
		$this->db->where("ptindakanopr.notransaksi", $no);
		$this->db->where("ptindakanopr.kode_unit", '0313 ');
		$data = $this->db->get();
		return $data->result();
	}

	public function tindakanbsr()
	{
		$no = $this->input->get("notrans");
		$this->db->select("tanggal, tindakan, jasas, jasap, kode_dokter, nama_dokter, kode_spe_anak, spe_anak, kode_bidan, nama_bidan, kode_dokanastesi, dokanastesi, id");
		$this->db->from("ptindakanlahir");
		$this->db->where("notransaksi", $no);
		$this->db->where("kode_unit", '0249 ');
		$data = $this->db->get();
		return $data->result();
	}

	// tambahan untuk resep

	public function daftarheader()
	{
		$notrx = $this->input->get("notrans");
		$this->db->select('resep_detail.namaobat,resep_detail.noresep,resep_detail.satuanpakai,resep_detail.qty,resep_detail.hargapakai as hargapakai,resep_detail.dosis, resep_detail.idnoresep, resep_header.tglresep as tglresep,resep_header.notraksaksi as notraksaksi');
		$this->db->from("resep_detail");
		$this->db->join("resep_header", "resep_header.noresep = resep_detail.noresep");
		$this->db->where("notraksaksi", $notrx);
		$data = $this->db->get();
		return $data->result();
	}

	public function daftarresep1()
	{
		$this->db->from("resep_detail");
		$data = $this->db->get();
		return $data->row();
	}

	public function daftarresep_oldx()
	{
		$no = $this->input->get("notrans");
		$this->db->select("resep_detail.idnoresep as idnoresep, resep_detail.namaobat as namaobat, resep_header.noresep as noresep1, resep_detail.qty as qty, resep_detail.satuanpakai as satuanpakai, resep_detail.dosis as dosis, resep_header.notraksaksi as notransaksi, resep_header.tglresep as tglresep");
		$this->db->from("resep_detail");
		$this->db->join("resep_header", "resep_header.noresep = resep_detail.noresep");
		$this->db->where("resep_header.notraksaksi", $no);
		$data = $this->db->get();
		return $data->row();
	}

	public function ambildosis()
	{
		$this->db->select('*');
		$this->db->from('mdosis');
		$data = $this->db->get();
		return $data->result();
	}
	//simpan layanan obat dengan cara cek dokter
	public function simpanpelayananobat_old($dtpasien)
	{
		$date = date_create($this->input->get("obattgl"));
		$tgl = date_format($date, "Y-m-d");
		list($kdobat, $idobat) = explode("_", $this->input->get("obatobat"), 2);
		$notrxnya = $this->input->get("notrans");
		$kode_unitnya = $this->input->get("unit");
		$kode_dokternya = $this->input->get("kode_dokter");
		$golongan = $this->input->get("golongan");
		if ($golongan == 'UMUM') {
			$typenya = 'Umum';
		} else {
			$typenya = 'Jaminan';
		}
		$qry2 = $this->db->query("select noresep from resep_header where notraksaksi='$notrxnya' and kode_unit='$kode_unitnya' and kode_dokter='$kode_dokternya' and tglresep='$tgl' limit 1 ");
		$ada = $qry2->num_rows();
		foreach ($qry2->result_array() as $brs9) {
			$noresepnya = $brs9['noresep'];
		}

		if ($ada == 0) {
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
				$qry2 = $this->db->query("insert into mresepnumber(tgltransaksi,no) VALUES ('$tgl','$numstart')");;
			} else {
				$t = $data->row();
				$numstart = $t->no + 1;
				$numdate = str_replace("-", "", $tgl);
				$numend = sprintf("%05d", $numstart);
				$numgabung = "AP" . substr($numdate, 2) . $numend;
				// return array($tgl, $numstart, $numgabung);
				$qry2 = $this->db->query("update mresepnumber set no='" . $numstart . "' where tgltransaksi='$tgl' limit 1");
			}
			$noresep = $numgabung;

			$datasimpanheader = array(
				'noresep' => $noresep,
				'no_rm' => $this->input->get("irm"),
				'rirj' => 'RI',
				'tglresep' => $tgl,
				'kode_unit' => $this->input->get("unit"),
				'nama_unit' => $this->input->get("unittext"),
				'kode_dokter' => $this->input->get("kode_dokter"),
				'nama_dokter' => $this->input->get("nama_dokter"),
				'idnoresep' => 0,
				'idgolongan' => 0,
				'golongan' => $golongan,
				'nosjp' => '',
				'notraksaksi' => $this->input->get("notrans"),
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
		} else {
			$noresep = $noresepnya;
		}
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
			'jumlah' => $this->input->get("obatqty") * $this->input->get("obatharga"),
			'dosis' => $this->input->get("dosis"),
			'catatanresep' => $this->input->get("catatanresep"),
			'user' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s")
		);

		$dt = $this->db->insert('resep_detail', $datasimpan);
		return $dt;
		// return array($dt, $noresep);
	}

	public function simpanpelayananobat($dtpasien)
	{
		$date = date_create($this->input->get("obattgl"));
		$tgl = date_format($date, "Y-m-d");
		list($kdobat, $idobat) = explode("_", $this->input->get("obatobat"), 2);
		$notrxnya = $this->input->get("notrans");
		$kode_unitnya = $this->input->get("unit");
		$kode_dokternya = $this->input->get("kode_dokter");
		$golongan = $this->input->get("golongan");
		if ($golongan == 'UMUM') {
			$typenya = 'Umum';
		} else {
			$typenya = 'Jaminan';
		}
		$qry2 = $this->db->query("select noresep from resep_header where notraksaksi='$notrxnya' and kode_unit='$kode_unitnya' and kode_dokter='$kode_dokternya' and tglresep='$tgl' limit 1 ");
		$ada = $qry2->num_rows();
		foreach ($qry2->result_array() as $brs9) {
			$noresepnya = $brs9['noresep'];
		}
		$noresepnya = trim($this->input->get("norep"));
		if ($noresepnya == '') {
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
				$qry2 = $this->db->query("insert into mresepnumber(tgltransaksi,no) VALUES ('$tgl','$numstart')");;
			} else {
				$t = $data->row();
				$numstart = $t->no + 1;
				$numdate = str_replace("-", "", $tgl);
				$numend = sprintf("%05d", $numstart);
				$numgabung = "AP" . substr($numdate, 2) . $numend;
				// return array($tgl, $numstart, $numgabung);
				$qry2 = $this->db->query("update mresepnumber set no='" . $numstart . "' where tgltransaksi='$tgl' limit 1");
			}
			$noresep = $numgabung;

			$datasimpanheader = array(
				'noresep' => $noresep,
				'no_rm' => $this->input->get("irm"),
				'rirj' => 'RI',
				'tglresep' => $tgl,
				'kode_unit' => $this->input->get("unit"),
				'nama_unit' => $this->input->get("unittext"),
				'kode_dokter' => $this->input->get("kode_dokter"),
				'nama_dokter' => $this->input->get("nama_dokter"),
				'idnoresep' => 0,
				'idgolongan' => 0,
				'golongan' => $golongan,
				'nosjp' => '',
				'notraksaksi' => $this->input->get("notrans"),
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
		} else {
			$noresep = $noresepnya;
		}
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
			'jumlah' => $this->input->get("obatqty") * $this->input->get("obatharga"),
			'dosis' => $this->input->get("dosis"),
			'catatanresep' => $this->input->get("catatanresep"),
			'user' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s")
		);

		$dt = $this->db->insert('resep_detail', $datasimpan);
		return $dt;
		// return array($dt, $noresep);

	}


	public function ambilnoresep()
	{
		//sdh digabung diatas
	}

	public function datamtdobat()
	{
		$no = $this->input->get("notrans");
		$unit = $this->input->get("unit");
		$this->db->select("resep_header.tglresep, resep_header.nama_dokter, resep_detail.namaobat, resep_detail.satuanpakai, resep_detail.hargapakai, resep_detail.qty, resep_detail.idnoresep,resep_detail.dosis, resep_header.noresep ");
		$this->db->from("resep_detail");
		$this->db->join("resep_header", "resep_header.noresep = resep_detail.noresep");
		$this->db->where("resep_header.notraksaksi", $no);
		$this->db->where("resep_header.kode_unit", $unit);
		$this->db->where("resep_detail.proses", "0");
		$this->db->order_by("resep_header.noresep", "desc");
		$data = $this->db->get();
		return $data->result();
	}

	public function datanoresep()
	{
		$no_rm = $this->input->get("irm");
		$this->db->select("noresep");
		$this->db->from("resep_header");
		$this->db->where("no_rm", $no_rm);
		$this->db->order_by("noresep", "desc");
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function datamtdobatallcek()
	{
		$no = $this->input->get("notrans");
		$unit = $this->input->get("unit");
		$this->db->select("resep_header.tglresep, resep_header.nama_dokter, resep_detail.namaobat, resep_detail.satuanpakai, resep_detail.hargapakai, resep_detail.qty, resep_detail.idnoresep,resep_detail.dosis, resep_header.noresep ");
		$this->db->from("resep_detail");
		$this->db->join("resep_header", "resep_header.noresep = resep_detail.noresep");
		$this->db->where("resep_header.notraksaksi", $no);
		$this->db->where("resep_header.kode_unit", $unit);
		$this->db->order_by("resep_header.noresep", "desc");
		$data = $this->db->get();
		return $data->result();
	}


	public function kelashakold($idregdetail)
	{
		$this->db->select("kode_kelas_hak");
		$this->db->from("register_detail");
		$this->db->where("id", $idregdetail);
		$data = $this->db->get();
		return $data->row();
	}
	// Fungsi Get Detail Titip Pasien
	public function kelashak($idregdetail)
	{
		$this->db->select("register_detail.kode_kelas_hak, mkelas.kode_kelas, munit.kode_unit, munit.nama_unit, mkamar.kode_kamar, mkamar.nama_kamar");
		$this->db->from("register_detail");
		$this->db->join("mkelas", "mkelas.kode_kelas = register_detail.kode_kelas_hak");
		$this->db->join("munit", "munit.kode_unit = mkelas.kode_unit");
		$this->db->join("mkamar", "mkamar.kode_kamar = register_detail.kode_kamar_hak");
		$this->db->where("register_detail.id", $idregdetail);
		$data = $this->db->get();
		if ($data->row()) {
			return $data->row();
		} else {
			return false;
		}
	}

	public function simpandiagnosa() {
		$irm = $this->input->get("irm");
		$inp = $this->input->get("inp");
		$notrans = $this->input->get("notrans");
		$diag = $this->input->get("diag");
		$utama = $this->input->get("utama");
		$dtd = $this->input->get("dtd");
		$tglmasukreg = $this->datareg($notrans);

		$date1 = date_create($tglmasukreg->tgl_masuk);
		$tglm = date_format($date1,"Y-m-d");
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
	public function datadiagnosa() {
		$this->db->select("id,icd_code, jenis_penyakit_local");
        $this->db->from("micd1");
        $this->db->where("jenis_penyakit_local is NOT NULL");
        $data = $this->db->get();
        return $data->result();
	}

	public function datadiagnosaread($id) {
		$this->db->select("`id`, `no_rm`, `tgl_masuk`, `type`, `diagnosa`, `nodaftar`, `nodtd`, `notransaksi`, `icdlatin`");
		$this->db->from("pdiagnosa");
		$this->db->where('notransaksi', $id);
		$this->db->order_by('type', "desc");
		$data = $this->db->get();
		return $data->result();
	}

	public function datadiagnosabaris2($id) {
		// $this->db->select("id, sebab2, sebab, nodtd, icdlatin, nodaftar");
		$this->db->from("micd1");
		$this->db->where('id', $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function datareg($notrans) {
		$this->db->select("tgl_masuk");
		$this->db->from("register");
		$this->db->where('notransaksi', $notrans);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function hapusdiagnosa() {
		$id = $this->input->get("id");
		$this->db->where('id', $id);
		$dt = $this->db->delete('pdiagnosa');
		return $dt;
	}
}

