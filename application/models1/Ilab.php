<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ilab extends CI_Model {

	public function datalab() {
		$date = date_create($this->input->get("tgl"));
		$tgl = date_format($date,"Y-m-d");
		$this->db->select("register_instalasi.no_rm as no_rm, register_instalasi.nama_pasien as nama_pasien, register_instalasi.nama_unitR as nama_unitR, register_instalasi.kode_unitR as kode_unitR, register_instalasi.kode_unit as kode_unit, register_instalasi.nama_unit as nama_unit, register.golongan as golongan, register_instalasi.nama_dokter as nama_dokter, register_instalasi.nama_dokter_periksa as nama_dokter_periksa, register_instalasi.id as id, register_instalasi.notransaksi as notransaksi, register_instalasi.notransaksi_IN as notransaksi_IN, register_instalasi.tanggal as tanggal, register_instalasi.no_lab as  no_lab");
		$this->db->from("register_instalasi");
		$this->db->join("register", "register_instalasi.notransaksi = register.notransaksi");
		$this->db->where("register_instalasi.tanggal", $tgl);
		$this->db->where("register_instalasi.kode_unit", $this->input->get("kdunit"));
		$this->db->where("register_instalasi.status_billing", 0);
		$data = $this->db->get();
		return $data->result();
	}

	public function pencarianrm_old() {
		$no = $this->input->get("rm");
		$this->db->select("pasien.no_rm as no_rm, pasien.nama_pasien as nama_pasien, register_detail.nama_unit as nama_unit, register_detail.kode_unit as kode_unit, register.golongan as golongan, register_detail.kode_unitR as kode_unitR, register_detail.nama_unitR as nama_unitR, register_detail.notransaksi as notransaksi");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->join("pasien", "pasien.no_rm = register_detail.no_rm");
		$this->db->where("register_detail.no_rm", $no);
		$this->db->where("register_detail.statuskeluar", "0"); //ini dihapus
		$data = $this->db->get();
		return $data->result();
	}
	
	public function pencarianrm() {
		$no = $this->input->get("rm");
		// $tgli = $this->input->get("tgli");
		$date = date_create($this->input->get("tgli"));
		$tgl = date_format($date,"Y-m-d");


		$this->db->from("register");
		$this->db->where("no_rm", $no);
		$this->db->where("status", 0);
		// $this->db->where("tgl_masuk >=", $tgl);
		$datac = $this->db->get();
		$ada= $datac->num_rows();


		$this->db->select("pasien.no_rm as no_rm, pasien.nama_pasien as nama_pasien, register_detail.nama_unit as nama_unit, register_detail.kode_unit as kode_unit, register.golongan as golongan, register_detail.kode_unitR as kode_unitR, register_detail.nama_unitR as nama_unitR, register_detail.notransaksi as notransaksi");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->join("pasien", "pasien.no_rm = register_detail.no_rm");
		$this->db->where("register_detail.no_rm", $no);
		$this->db->order_by("register_detail.id", "asc");
		if ($ada > 0) {
			$this->db->where("register.status", "0");
			// $this->db->where('register_detail.tgl_masuk_kamar <=', $tgl);
		} else {
			$this->db->where('register_detail.tgl_masuk_kamar <=', $tgl);
			$this->db->where('register_detail.tgl_keluar_kamar >=', $tgl);
		}
		// $this->db->where("register_detail.statuskeluar", "0");

		$data = $this->db->get();
		return $data->result();
	}


	public function simpanlabbaru($dtnotrans) {
		$dt = $this->input->get("dataadd");
		$date = date_create($this->input->get("instgl"));
		$tgl = date_format($date,"Y-m-d");
		$this->db->select("inap, jalan, IGD, instalasi");
		$this->db->from("munit");
		$this->db->where("kode_unit", $this->input->get("unitasal"));
		$this->db->limit(1);
		$datamunit = $this->db->get();
		$dtget = $datamunit->row();

		if ($dtget->inap == 1) {
			$rj = "RI";
		} else if ($dtget->jalan == 1) {
			$rj = "RJ";
		} else if ($dtget->IGD == 1) {
			$rj = "GD";
		} else if ($dtget->instalasi == 1) {
			$rj = "GD";
		}

		$datasimpan = array(
			'no_rm' => $this->input->get("rm"),
			'nama_pasien' => $this->input->get("nmpas"), 
			'golongan' => $this->input->get("gol"),
			'tanggal' => $tgl, //date("Y-m-d"), 
			'kode_unit' => $this->input->get("unitdepan"), 
			'nama_unit' => $this->input->get("unitdepantext"), 
			'kode_dokter' => $this->input->get("dpengirim"), 
			'nama_dokter' => $this->input->get("dpengirimtext"), 
			'rujukan' => $rj, 
			'tgl_masuk' => date("Y-m-d H:i:s"), 
			'kode_unitR' => $dt[1], 
			'nama_unitR' => $dt[2], 
			'user1' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"), 
			'kode_dokter_periksa' => $this->input->get("dpemeriksa"), 
			'nama_dokter_periksa' => $this->input->get("dpemeriksatext"), 
			'kode_analis' => $this->input->get("analis"),
			'nama_analis' => $this->input->get("analistext"),
			'kode_radiografer' => "",
			'nama_radiografer' => "",
			'kode_hemodialis' => "",
			'nama_hemodialis' => "",
			'kode_kelas' => "", 
			'nama_kelas' => "", 
			'notransaksi' => $dt[0], 
			'notransaksi_IN' => $dtnotrans[2], 
			'idrjalan' => "0", 
			'idrinap' => "0", 
			'barulama' => "0",
			'diagnosa' => $this->input->get("diagnosa")
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

	public function dtproseslab() {
		$id = $this->input->get("id");
		$dt = explode("_", $id);
		$this->db->select("register_instalasi.no_rm as no_rm, register_instalasi.nama_pasien as nama_pasien, register_instalasi.nama_unitR as nama_unitR, register.golongan as golongan, register_instalasi.nama_dokter as nama_dokter, register_instalasi.nama_dokter_periksa as nama_dokter_periksa, register_instalasi.id as id, register_instalasi.notransaksi as notransaksi, register_instalasi.notransaksi_IN as notransaksi_IN,register_instalasi.tanggal as tanggal ");
		$this->db->from("register");
		$this->db->join("register_instalasi", "register_instalasi.notransaksi = register.notransaksi");
		$this->db->where("register_instalasi.id", $dt[0]);
		$data = $this->db->get();
		return $data->row();
	}

	public function unitinstalasi() {
		$this->db->from("munit");
		$this->db->where("lab", "1");
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function datatindakaninstalasi() {
		$id = $this->input->get("id");
		$dt = explode("_", $id);
		$this->db->select("mtindakan.tindakan as tindakan, mtindakan.jasas as jasas, ptindakan_instalasi.id as id, ptindakan_instalasi.nonasuransi, ptindakan_instalasi.diskon, ptindakan_instalasi.idlis");
		$this->db->from("ptindakan_instalasi");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
		$this->db->where("ptindakan_instalasi.notransaksi", $dt[1]);
		$this->db->where("ptindakan_instalasi.notransaksi_IN", $dt[2]);
		$this->db->where("ptindakan_instalasi.kode_unit", $this->input->get("kdunit"));
		$data = $this->db->get();
		return $data->result();
	}

	public function dtchecktindakan() {
		$id = $this->input->get("id");
		$dt = explode("_", $id);
		$this->db->select("tindakan as tindakan");
		$this->db->from("ptindakan_instalasi");
		$this->db->where("ptindakan_instalasi.notransaksi", $dt[1]);
		$this->db->where("ptindakan_instalasi.notransaksi_IN", $dt[2]);
		$this->db->where("ptindakan_instalasi.kode_unit", $this->input->get("kdunit"));
		$data = $this->db->get();
		return $data->result();
	}

	public function databhpinstalasi() {
		$id = $this->input->get("id");
		$dt = explode("_", $id);
		$this->db->select("tanggal, namaobat, satuanpakai, hargapakai, qty, id, nonasuransi, diskon");
		$this->db->from("pbhp");
		$this->db->where("notransaksi", $dt[1]);
		$this->db->where("kode_unit", $this->input->get("kdunit"));
		$data = $this->db->get();
		return $data->result();
	}

	public function datamtdbhp() {
		$no = $this->input->get("notrans");
		$unit = $this->input->get("kdunit");
		$this->db->select("tanggal, namaobat, satuanpakai, hargapakai, qty, id, nonasuransi, diskon");
		$this->db->from("pbhp");
		$this->db->where("notransaksi", $no);
		$this->db->where("kode_unit", $unit);
		$data = $this->db->get();
		return $data->result();
	}

	public function datatindakanins() {

		$this->db->select("mtindakan.tindakan as tindakan, mtindakan.jasas as jasas, ptindakan_instalasi.id as id, ptindakan_instalasi.nonasuransi, ptindakan_instalasi.diskon, ptindakan_instalasi.idlis");
		$this->db->from("ptindakan_instalasi");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
		$this->db->where("ptindakan_instalasi.notransaksi", $this->input->get("notrans"));
		$this->db->where("ptindakan_instalasi.notransaksi_IN", $this->input->get("notransin"));
		// $this->db->where("ptindakan_instalasi.kode_unit", $this->input->get("kdunit"));
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilhargatindakan() {
		$no = $this->input->get("tdtindakan");
		$this->db->select("jasas, jasap");
		$this->db->from("mtindakan");
		$this->db->where("kode_tindakan", $no);
		$data = $this->db->get();
		return $data->row();
	}

	public function ambilhargatindakanarray() {
		$no = $this->input->get("tdtindakan");
		$this->db->select("jasas, jasap");
		$this->db->from("mtindakan");
		$this->db->where("kode_tindakan", $no);
		$data = $this->db->get();
		return $data->row();
	}

	public function ambilnotrans() {
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
			return array($tgl, $numstart, $numgabung);
		} else {
			$t = $data->row();
			$numstart = $t->nomor + 1;
			$numdate = str_replace("-", "", $tgl);
			$numend = sprintf("%05d", $numstart);
			$numgabung = "TR" . substr($numdate, 2) . $numend;
			return array($tgl, $numstart, $numgabung);
		}
	}

	public function simpantindakanlab($dtpasien, $dthargatindakan, $ambilnotrans) {
		$um = $this->input->get("tdumum");
		$date = date_create($this->input->get("labtgl"));
		$tgl = date_format($date,"Y-m-d");
		$tindakannya = $this->input->get("tindakannya");
		$datasimpan = array(
			'kode_unit' => $this->input->get("kdunit"), 
			'nama_unit' => $this->input->get("unit"), 
			'no_rm' => $dtpasien->no_rm, 
			'tanggal' =>  $tgl,  //date("Y-m-d"), 
			// 'tindakan' => $this->input->get("tdtindakan"), 
			'tindakan' => $this->input->get("tindakannya"), 
			'jasas' => $dthargatindakan->jasas, 
			'jasap' => $dthargatindakan->jasap, 
			'jasam' => "0", 
			'jasaa' => "0",
			'perawatsaja' => "0", 
			'type' => "0", 
			'tanggungaskes' => "0", 
			'user1' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"), 
			'notransaksi' => $this->input->get("notrans"), 
			'notransaksi_IN' => $this->input->get("notransin"), 
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
			'nonasuransi' => gantiangka($um),
			'diskon' => $this->input->get("tddiskon")
			// 'sampel' => $this->input->get("tdsampel"),
			// 'diagnosa' => $this->input->get("tddiag")
		);

		$dt = $this->db->insert('ptindakan_instalasi', $datasimpan);
		return $dt;
	}


	public function cariharga($kodelab) {
		$this->db->select("jasas,idpaketlis");
		$this->db->from("mtindakan");
		$this->db->where("kode_tindakan", $kodelab);
		$data = $this->db->get();
		return $data->row();
	}

	public function cektindakanada($kodelab,$noinst) {
		$this->db->from("ptindakan_instalasi");
		$this->db->where("tindakan", $kodelab);
		$this->db->where("notransaksi_IN", $noinst);
		$data = $this->db->get();
		return $data->num_rows();
	}

	public function simpantindakanlab_new($rm, $tindakannya, $notransin, $notrans, $labtgl) {
		$um = '';
		$date = $labtgl;
		// $tgl = date_format($date,"Y-m-d");
		$pecah=explode("_",$tindakannya);
		// echo $tindakannya;
		// $jumlah=
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
				// 'sampel' => $this->input->get("tdsampel"),
				// 'diagnosa' => $this->input->get("tddiag")
				
				);

				$dt = $this->db->insert('ptindakan_instalasi', $datasimpan);
			}
		}
		return $dt;
	}




	public function simpantindakanlabarray($rm, $tdn, $notransin, $notrans, $labtgl) {
		$um = '';
		$date = $labtgl;
		// $tgl = date_format($date,"Y-m-d");


		for($i=0; $i < count($tdn); $i++){
			$kode_tindakan=$tdn[$i];
			//------------cari harga dan idlis-------------
			$harganya= $this->cariharga($kode_tindakan)->jasas;
			$idlisnya= $this->cariharga($kode_tindakan)->idlis;
			// $harganya = 100;  //

			// echo $kode_tindakan.'<br>';
			// echo $rm.'<br>';
			// echo $notransin.'<br>';
			// echo $notrans.'<br>';
			// echo $labtgl.'<br>';
			// echo $harganya.'<br>';
			// echo $idlisnya.'<br>';
			

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
				// 'sampel' => $this->input->get("tdsampel"),
				// 'diagnosa' => $this->input->get("tddiag")
				
			);

			$dt = $this->db->insert('ptindakan_instalasi', $datasimpan);
		
		}



		// return $dt;
	}


	public function ambileditdatatindakan_old() {
		$id = $this->input->get("id");
		$this->db->select("mtindakan.tindakan as tindakan, mtindakan.kode_tindakan as kode_tindakan, mtindakan.jasas as jasas, ptindakan_instalasi.id as id,ptindakan_instalasi.nonasuransi as nonasuransi,ptindakan_instalasi.diskon as diskon,ptindakan_instalasi.sampel as sampel,ptindakan_instalasi.diagnosa as diagnosa");
		$this->db->from("ptindakan_instalasi");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
		$this->db->where("ptindakan_instalasi.id", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function ambileditdatatindakan() {
		$id = $this->input->get("id");
		$this->db->select("mtindakan.tindakan as tindakan, mtindakan.kode_tindakan as kode_tindakan, mtindakan.jasas as jasas, ptindakan_instalasi.id as id,ptindakan_instalasi.nonasuransi as nonasuransi,ptindakan_instalasi.diskon as diskon");
		$this->db->from("ptindakan_instalasi");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
		$this->db->where("ptindakan_instalasi.id", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function ubahpelayanantindakan($dthargatindakan) {
		$um = $this->input->get("tdumum");
		$datasimpan = array(
			'tindakan' => $this->input->get("tdtindakan"), 
			'jasas' => $dthargatindakan->jasas, 
			'jasap' => $dthargatindakan->jasap, 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"), 
			'nonasuransi' => gantiangka($um),
			'diskon' => $this->input->get("tddiskon")
			// 'sampel' => $this->input->get("tdsampel"),
			// 'diagnosa' => $this->input->get("tddiag")

		);
		$this->db->where("id", $this->input->get("id"));
		$dt = $this->db->update('ptindakan_instalasi', $datasimpan);
		return $dt;
	}

	public function hapuspelayanantindakan() {
		$id = $this->input->get("id");
		$this->db->where('id', $id);
		$dt = $this->db->delete('ptindakan_instalasi');
		return $dt;
	}

	public function simpanbhplab($dtpasien) {
		list($kdobat, $idobat) = explode("_", $this->input->get("bhpbhp"), 2);
		$um = $this->input->get("bhpumum");
		$date = date_create($this->input->get("labtgl"));
		$tgl = date_format($date,"Y-m-d");
		$datasimpan = array(
			'kode_unit' => $this->input->get("kdunit"), 
			'nama_unit' => $this->input->get("unit"), 
			'no_rm' => $dtpasien->no_rm, 
			'tanggal' => $tgl, //date("Y-m-d"), 
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
			'diskon' => $this->input->get("bhpdiskon")
		);

		$dt = $this->db->insert('pbhp', $datasimpan);
		return $dt;
	}

	public function ambileditdatabhp() {
		$id = $this->input->get("id");
		$this->db->select("tanggal, namaobat, satuanpakai, hargapakai, qty, id, kodeobat, nonasuransi, diskon");
		$this->db->from("pbhp");
		$this->db->where("id", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function ubahpelayananbhp() {
		$date = date_create($this->input->get("labtgl"));
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
			'diskon' => $this->input->get("bhpdiskon")
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

/*  yg lama diedit	
	public function ambiledit() {
        $no = $this->input->get("id");
        $this->db->select("no_rm, nama_pasien, golongan, nama_unitR, kode_dokter, kode_dokter_periksa, id, tanggal as tanggal");
        $this->db->from("register_instalasi");
        $this->db->where("id", $no);
        $data = $this->db->get();
        return $data->row();
    }
*/
	public function ambiledit() {
        $no = $this->input->get("id");
		$this->db->select("register_instalasi.no_rm as no_rm, register_instalasi.nama_pasien as nama_pasien, register_instalasi.nama_unitR as nama_unitR, register_instalasi.kode_unitR as kode_unitR, register_instalasi.kode_unit as kode_unit, register_instalasi.nama_unit as nama_unit, register.golongan as golongan, register_instalasi.kode_dokter as kode_dokter, register_instalasi.kode_dokter_periksa as kode_dokter_periksa, register_instalasi.id as id, register_instalasi.notransaksi as notransaksi, register_instalasi.notransaksi_IN as notransaksi_IN, register_instalasi.tanggal as tanggal, register_instalasi.kode_analis as kode_analis, register_instalasi.nama_analis as nama_analis,register_instalasi.tgl_selesai as tgl_selesai,register_instalasi.jam_selesai jam_selesai,register_instalasi.tgl_ambil as tgl_ambil,register_instalasi.jam_ambil as jam_ambil,register_instalasi.diagnosa as diagnosa");
		$this->db->from("register_instalasi");
		$this->db->join("register", "register_instalasi.notransaksi = register.notransaksi");
		$this->db->where("register_instalasi.id", $no);
        $data = $this->db->get();
        return $data->row();
    }

/*
	public function datalab() {
		$date = date_create($this->input->get("tgl"));
		$tgl = date_format($date,"Y-m-d");
		$this->db->select("register_instalasi.no_rm as no_rm, register_instalasi.nama_pasien as nama_pasien, register_instalasi.nama_unitR as nama_unitR, register_instalasi.kode_unitR as kode_unitR, register_instalasi.kode_unit as kode_unit, register_instalasi.nama_unit as nama_unit, register.golongan as golongan, register_instalasi.nama_dokter as nama_dokter, register_instalasi.nama_dokter_periksa as nama_dokter_periksa, register_instalasi.id as id, register_instalasi.notransaksi as notransaksi, register_instalasi.notransaksi_IN as notransaksi_IN, register_instalasi.tanggal as tanggal");
		$this->db->from("register_instalasi");
		$this->db->join("register", "register_instalasi.notransaksi = register.notransaksi");
		$this->db->where("register_instalasi.tanggal", $tgl);
		$this->db->where("register_instalasi.kode_unit", $this->input->get("kdunit"));
		$this->db->where("register_instalasi.status_billing", 0);
		$data = $this->db->get();
		return $data->result();
	}
*/

    public function ubahlab() {
		$date = date_create($this->input->get("tgli"));
		$tgl = date_format($date,"Y-m-d");

		$dates = date_create($this->input->get("tgl_selesai"));
		$tgls = date_format($dates,"Y-m-d");
		$tis = date_create($this->input->get("jam_selesai"));
		$jams = date_format($tis,"H:i:s");

		$datea = date_create($this->input->get("tgl_ambil"));
		$tgla = date_format($datea,"Y-m-d");
		$tia = date_create($this->input->get("jam_ambil"));
		$jama = date_format($tia,"H:i:s");

        $datasimpan = array(
            'kode_dokter' => $this->input->get("dpengirim"),
            'nama_dokter' => $this->input->get("dpengirimtext"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s"),
            'kode_dokter_periksa' => $this->input->get("dpemeriksa"),
			'nama_dokter_periksa' => $this->input->get("dpemeriksatext"),
			'kode_analis' => $this->input->get("analis"),
			'nama_analis' => $this->input->get("analistext"),
			'tanggal' => $tgl,
			'tgl_selesai' => $tgls,
			'jam_selesai' => $jams,
			'tgl_ambil' => $tgla,
			'jam_ambil' => $jama,
			'diagnosa' => $this->input->get("diagnosa")
        );
        $this->db->where("id", $this->input->get("id"));
        $dt = $this->db->update('register_instalasi', $datasimpan);
        return $dt;
    }

    public function hapusinstalasi() {
        $id = $this->input->get("id");
        $this->db->select("register_instalasi.notransaksi_IN as notransaksi_IN, register_instalasi.notransaksi as notransaksi,register_instalasi.kode_unit as kode_unit, munit.lab as lab");
        $this->db->from("register_instalasi");
        $this->db->join("munit", "munit.kode_unit = register_instalasi.kode_unit");
        $this->db->where("register_instalasi.id", $id);
        $q = $this->db->get();
        $no = $q->row();

        if ($no->lab == "1") {
            $this->db->select("notransaksi");
            $this->db->from("ptindakan_instalasi");
			$this->db->where("notransaksi", $no->notransaksi);
			$this->db->where("kode_unit", $no->kode_unit);
            $qu = $this->db->get();
            $jum = $qu->num_rows();
        } else {
            $this->db->select("notransaksi_IN");
            $this->db->from("ptindakan_instalasi");
			$this->db->where("notransaksi_IN", $no->notransaksi_IN);
			$this->db->where("kode_unit", $no->kode_unit);
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

    public function datalabhapus() {
        $date = date_create($this->input->get("tgl"));
        $tgl = date_format($date,"Y-m-d");
        $this->db->select("register_instalasi.no_rm as no_rm, register_instalasi.nama_pasien as nama_pasien, register_instalasi.nama_unitR as nama_unitR, register_instalasi.kode_unitR as kode_unitR, register_instalasi.kode_unit as kode_unit, register_instalasi.nama_unit as nama_unit, register.golongan as golongan, register_instalasi.nama_dokter as nama_dokter, register_instalasi.nama_dokter_periksa as nama_dokter_periksa, register_instalasi.id as id, register_instalasi.notransaksi as notransaksi, register_instalasi.notransaksi_IN as notransaksi_IN, register_instalasi.tanggal as tanggal");
        $this->db->from("register_instalasi");
        $this->db->join("register", "register_instalasi.notransaksi = register.notransaksi");
        $this->db->where("register_instalasi.tanggal", $tgl);
        $this->db->where("register_instalasi.kode_unit", $this->input->get("unit"));
        $this->db->where("register_instalasi.status_billing", 0);
        $data = $this->db->get();
        return $data->result();
	}
	
	// ==========================
	public function datahasilpemeriksaan() {
		$id = $this->input->get("id");
		$dt = explode("_", $id);
		$this->db->select("mlab_jenis.nama_labjenis as nama_labjenis, mlab_item.nama_item as nama_item, plab_hasil.result as result, plab_hasil.id as id, mlab_item.referensi as referensi");
		$this->db->from("plab_hasil");
		$this->db->join("mlab_item", "plab_hasil.kode_labitem = mlab_item.kode_labitem");
		$this->db->join("mlab_jenis", "plab_hasil.kode_labjenis = mlab_jenis.kode_labjenis");
		$this->db->where("plab_hasil.notransaksi", $dt[1]);
		$this->db->where("plab_hasil.notransaksi_IN", $dt[2]);
		$data = $this->db->get();
		return $data->result();
	}
	
	public function datahasilpemeriksaan_lis() {
		$id = $this->input->get("id");
		$dt = explode("_", $id);
		$this->db->from("plab_hasil_lis");
		$this->db->where("notransaksi", $dt[1]);
		$this->db->where("notransaksi_IN", $dt[2]);
		$data = $this->db->get();
		return $data->result();
	}

	public function datahasilpemeriksaan_lis_next($no_lab) {
		$this->db->from("plab_hasil_lis");
		$this->db->where("nolab", $no_lab);
		$data = $this->db->get();
		return $data->result();
	}

	//dedy
	public function datahasillabcetak($t) {
		// $noti = $this->input->get("notransaksi_IN");
		$noti = $t;
		// printf($noti);
		$this->db->select("mlab_jenis.nama_labjenis as nama_labjenis, mlab_item.nama_item as nama_item, plab_hasil.result as result, plab_hasil.id as id, mlab_item.referensi as referensi, mlab_item.unit as unit, plab_hasil.notransaksi_in as notransaksi_in ");
		$this->db->from("plab_hasil");
		$this->db->join("mlab_item", "plab_hasil.kode_labitem = mlab_item.kode_labitem");
		$this->db->join("mlab_jenis", "plab_hasil.kode_labjenis = mlab_jenis.kode_labjenis");
		// $this->db->join("pasien", "pasien.no_rm = plab_hasil.no_rm");
		// $this->db->join("ptindakan_instalasi", "ptindkan_instalasi.no_rm = plab_hasil.no_rm");
		// $this->db->where("plab_hasil.notransaksi", $dt[1]);
		$this->db->where("plab_hasil.notransaksi_IN", $noti);
		$data = $this->db->get();
		return $data->result();
	}
	//==

	public function datahasilpemeriksaannext() {
		$this->db->select("mlab_jenis.nama_labjenis as nama_labjenis, mlab_item.nama_item as nama_item, plab_hasil.result as result, plab_hasil.id as id, mlab_item.referensi as referensi");
		$this->db->from("plab_hasil");
		$this->db->join("mlab_item", "plab_hasil.kode_labitem = mlab_item.kode_labitem");
		$this->db->join("mlab_jenis", "plab_hasil.kode_labjenis = mlab_jenis.kode_labjenis");
		$this->db->where("plab_hasil.notransaksi", $this->input->get("notrans"));
		$this->db->where("plab_hasil.notransaksi_IN", $this->input->get("notransin"));
		$data = $this->db->get();
		return $data->result();
	}

	public function masterlabjenis() {
		$this->db->from("mlab_jenis");
		$data = $this->db->get();
		return $data->result();
	}

	public function masterlabitem($kode) {
		$this->db->from("mlab_item");
        $this->db->where("kode_labjenis", $kode);
		$data = $this->db->get();
		return $data->result();
	}

	public function simpanhasillab($dtpasien) {
		// $date = date_create($this->input->get("labtgl"));
		// $tgl = date_format($date,"Y-m-d");
		$datasimpan = array(
			'notransaksi_IN' => $this->input->get("notransin"), 
			'notransaksi' => $this->input->get("notrans"), 
			'no_rm' => $dtpasien->no_rm, 
			'kode_labitem' => $this->input->get("hsitem"),
			'kode_labjenis' => $this->input->get("hsjenis"), 
			'result' => $this->input->get("resul") 
		);

		$dt = $this->db->insert('plab_hasil', $datasimpan);
		return $dt;
	}

	public function ambileditdatahasil() {
		$id = $this->input->get("id");
		$this->db->from("plab_hasil");
		$this->db->where("id", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function ubahpelayananhasil() {
		$datasimpan = array(
			'kode_labitem' => $this->input->get("hsitem"),
			'kode_labjenis' => $this->input->get("hsjenis"), 
			'result' => $this->input->get("resul") 
		);
		$this->db->where("id", $this->input->get("id"));
		$dt = $this->db->update('plab_hasil', $datasimpan);
		return $dt;
	}

	public function hapuspelayananhasilperiksa() {
		$id = $this->input->get("id");
		$this->db->where('id', $id);
		$dt = $this->db->delete('plab_hasil');
		return $dt;
	}

	public function datapasien_lis($no_rm) {
		$norm = $no_rm;
		$this->db->select("no_rm as no_rekam, nik as no_ref, no_askes as no_bpjs, title as sebutan, nama_pasien as nama_pasien,sex as jenis_kelamin, tgl_lahir as tgl_lahir, alamat as alamat, telp as no_telp");	
		$this->db->from("pasien");
        $this->db->where("no_rm", $norm);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->result();
	}

	public function dataorder_lis($notransin) {
		$noin = $notransin;
		$this->db->select("rujukan,kode_unitR,kode_dokter,kode_dokter_periksa,diagnosa,cito,no_rm,notransaksi,no_lab");
		$this->db->from("register_instalasi");
        $this->db->where("notransaksi_IN", $noin);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->result();
	}

	public function dataregister($notransaksi) {
		$notrx= $notransaksi;
		$this->db->select("golongan,asuransi,ketdiagawal as diagnosa");
		$this->db->from("register");
        $this->db->where("notransaksi", $notrx);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->result();
	}

	
	public function carikodegol($golnya) {
		$golongan= $golnya;
		$this->db->select("idlis");
		$this->db->from("golongan");
        $this->db->where("golongan", $golongan);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->result();
	}


	public function simpan_nolab($notransin,$nolabnya) {
		$datasimpan = array(
			'no_lab' => $nolabnya
		);
		$this->db->where("notransaksi_IN", $notransin);
		$dt = $this->db->update('register_instalasi', $datasimpan);
		return $dt;
	}

	public function carinolab($notransin) {
		$notrins= $notransin;
		$this->db->select("no_lab,no_rm,notransaksi");
		$this->db->from("register_instalasi");
        $this->db->where("notransaksi_IN", $notrins);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->result();
	}

	public function datapemeriksaan_lis($notransin) {
		$noin = $notransin;
		// $this->db->select("idpaketlis as id_pemeriksaan");
		$this->db->select("idlis as id_pemeriksaan");
		$this->db->from("ptindakan_instalasi");
        $this->db->where("notransaksi_IN", $noin);
		$data = $this->db->get();
		return $data->result();
	}

	public function datadokterpemesan($kode_dokter) {
		$koded = $kode_dokter;
		$this->db->select("kode_dokter_lis as dokter_pengirim");
		$this->db->from("mdokter");
        $this->db->where("kode_dokter", $koded);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->result();
	}

	public function datadokterpemeriksa($kode_dokter) {
		$koded = $kode_dokter;
		$this->db->select("kode_dokter_lis as dokter_pk");
		$this->db->from("mdokter");
        $this->db->where("kode_dokter", $koded);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->result();
	}
	
	public function dataruang($kdr) {
		$kode_ruang = $kdr;
		$this->db->select("idlis as idlis");
		$this->db->from("munit");
        $this->db->where("kode_unit", $kode_ruang);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->result();
	}

	public function save_dari_lis($data,$notransin,$no_lab,$notransaksi,$no_rm) {

		$this->db->where('nolab', $no_lab);
		$dt = $this->db->delete('plab_hasil_lis');

		foreach ($data as $value) {
			$idlisnya=$value['id'];
			$pemeriksaannya=$value['NmTestInd'];
			$unittesnya=$value['UnitTest'];
			$nilainormalnya=$value['nilnor'];
			$hasilnya=$value['hasil'];		
			$flagnya=$value['flag'];		
			$kritisnya=$value['kritis'];		

			$datasimpan = array(
				'notransaksi_IN' => $notransin, 
				'notransaksi' => $notransaksi, 
				'no_rm' => $no_rm, 
				'idlis' => $idlisnya,
				'pemeriksaan' => $pemeriksaannya,
				'hasil' => $hasilnya,
				'nilainormal' => $nilainormalnya,
				'unittes' => $unittesnya,
				'nolab' => $no_lab,
				'flag' => $flagnya,
				'kritis' => $kritisnya
			);
	
			$dt = $this->db->insert('plab_hasil_lis', $datasimpan);
		}   
		return $dt;
	}	
}
