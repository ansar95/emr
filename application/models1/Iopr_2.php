<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iopr extends CI_Model {

	public function dataopr() {
		$date = date_create($this->input->get("tgl"));
		$tgl = date_format($date,"Y-m-d");
		$this->db->select("register_instalasi.no_rm as no_rm, register_instalasi.nama_pasien as nama_pasien, register_instalasi.kode_unitR as kode_unitR, register_instalasi.nama_unitR as nama_unitR, register_instalasi.kode_unit as kode_unit, register_instalasi.nama_unit as nama_unit, register.golongan as golongan, register_instalasi.nama_dokter as nama_dokter, register_instalasi.id as id, register_instalasi.notransaksi as notransaksi, register_instalasi.notransaksi_IN as notransaksi_IN, register_instalasi.rujukan as rujukan, register_instalasi.tanggal as tanggal, register_instalasi.kode_unit_pelaksana as kode_unit_pelaksana, register_instalasi.nama_unit_pelaksana as nama_unit_pelaksana");
		$this->db->from("register_instalasi");
		$this->db->join("register", "register_instalasi.notransaksi = register.notransaksi");
		$this->db->where("register_instalasi.tanggal", $tgl);
		$this->db->where("register_instalasi.kode_unit", $this->input->get("kdunit"));
		$data = $this->db->get();
		return $data->result();
	}

	public function pencarianrm() {
		$no = $this->input->get("rm");
		$this->db->select("pasien.no_rm as no_rm, pasien.nama_pasien as nama_pasien, register_detail.nama_unit as nama_unit, register_detail.kode_unit as kode_unit");
		$this->db->select("register.golongan as golongan, register_detail.kode_unitR as kode_unitR, register_detail.nama_unitR as nama_unitR, register_detail.notransaksi as notransaksi");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->join("pasien", "pasien.no_rm = register_detail.no_rm");
		$this->db->where("register_detail.no_rm", $no);
		$this->db->where("register_detail.statuskeluar", "0");
		$data = $this->db->get();
		return $data->result();
	}

	public function simpanoprbaru($dtnotrans) {
		$dt = $this->input->get("dataadd");
		$date = date_create($this->input->get("instgl"));
		$tgl = date_format($date,"Y-m-d");

		if ($this->input->get("rujuk") == "UM") {
			$r = "";
		} else {
			$r = $this->input->get("rujuk");
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
			'rujukan' => $r,
			'tgl_masuk' => date("Y-m-d H:i:s"), 
			'kode_unitR' => $dt[1], 
			'nama_unitR' => $dt[2], 
			'user1' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"), 
			'kode_dokter_periksa' => "", 
			'nama_dokter_periksa' => "", 
			'kode_kelas' => $this->input->get("kelasdepan"), 
			'nama_kelas' => $this->input->get("kelasdepantext"), 
			'kode_hemodialis' => "",
			'nama_hemodialis' => "",
			'notransaksi' => $dt[0], 
			'notransaksi_IN' => $dtnotrans[2], 
			'idrjalan' => "0", 
			'idrinap' => "0", 
			'barulama' => "0",
			'kode_unit_pelaksana' =>$this->input->get("unitpelaksana"),
			'nama_unit_pelaksana' =>$this->input->get("unitpelaksanatext")
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

	public function dtprosesopr() {
		$id = $this->input->get("id");
		$dt = explode("_", $id);
		$this->db->select("register_instalasi.no_rm as no_rm, register_instalasi.nama_pasien as nama_pasien, register_instalasi.nama_unitR as nama_unitR, register.golongan as golongan, register_instalasi.nama_dokter as nama_dokter, register_instalasi.nama_dokter_periksa as nama_dokter_periksa, register_instalasi.id as id, register_instalasi.notransaksi as notransaksi, register_instalasi.notransaksi_IN as notransaksi_IN");
		$this->db->from("register");
		$this->db->join("register_instalasi", "register_instalasi.notransaksi = register.notransaksi");
		$this->db->where("register_instalasi.id", $dt[0]);
		$data = $this->db->get();
		return $data->row();
	}

	public function unitinstalasi() {
		$this->db->from("munit");
		$this->db->where("IBS", "1");
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function kamaropr() {
		$this->db->from("munit");
		$this->db->where("IBS", "1");
		// $this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function fullopr() {
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$this->db->where("IBS", "1");
		$data = $this->db->get();
		return $data->result();
	}


	public function datatindakaninstalasi() {
		$id = $this->input->get("id");
		$dt = explode("_", $id);
		$unit = $this->input->get("kdunit");
		$this->db->select("ptindakanopr.id as id, mtindakan.tindakan as tindakan, mtindakan.jasas as jasas, ptindakanopr.tgl_periksa as tgl_periksa, ptindakanopr.nama_dokter as nama_dokter, ptindakanopr.nama_anastesi as nama_anastesi, ptindakanopr.spe_anak as spe_anak, ptindakanopr.nama_penata as nama_penata, ptindakanopr.id as id,ptindakanopr.nonasuransi as nonasuransi,ptindakanopr.diskon as diskon ");
		$this->db->from("ptindakanopr");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakanopr.tindakan");
		$this->db->where("ptindakanopr.notransaksi", $dt[1]);
		$this->db->where("ptindakanopr.kode_unit", $unit);
		$data = $this->db->get();
		return $data->result();
	}

    public function ambiltindakanopredit($id) {
        $this->db->select("ptindakanopr.id as id, mtindakan.tindakan as tindakan, mtindakan.jasas as jasas, ptindakanopr.tgl_periksa as tgl_periksa, ptindakanopr.kode_dokter as kode_dokter, ptindakanopr.kode_dokter2 as kode_dokter2, ptindakanopr.kode_dokter3 as kode_dokter3, ptindakanopr.kode_anastesi as kode_anastesi, ptindakanopr.kode_spe_anak as kode_spe_anak, ptindakanopr.kode_penata as kode_penata, ptindakanopr.kode_perawat as kode_perawat, ptindakanopr.id as id,ptindakanopr.nonasuransi as nonasuransi, ptindakanopr.diskon as diskon, ptindakanopr.disc1 as disc1, ptindakanopr.disc2 as disc2, ptindakanopr.disc3 as disc3, ptindakanopr.catatan as catatan, ptindakanopr.tindakan as tind");
        $this->db->from("ptindakanopr");
        $this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakanopr.tindakan");
        $this->db->where("ptindakanopr.id", $id);
        $data = $this->db->get();
        return $data->row();
    }

	public function databhpinstalasi() {
		$id = $this->input->get("id");
		$dt = explode("_", $id);
		$unit = $this->input->get("kdunit");
		$this->db->select("tanggal, namaobat, satuanpakai, hargapakai, qty, id");
		$this->db->from("pbhp");
		$this->db->where("notransaksi", $dt[1]);
		$this->db->where("kode_unit", $unit);
		$data = $this->db->get();
		return $data->result();
	}

	public function datamtdbhp() {
		$no = $this->input->get("notrans");
		$unit = $this->input->get("kdunit");
		$this->db->select("tanggal, namaobat, satuanpakai, hargapakai, qty, id");
		$this->db->from("pbhp");
		$this->db->where("notransaksi", $no);
		$this->db->where("kode_unit", $unit);
		$data = $this->db->get();
		return $data->result();
	}

	public function datamtdodua() {
		$no = $this->input->get("notrans");
		$unit = $this->input->get("kdunit");
		$this->db->select("tgl_pakai, jam, qty, id");
		$this->db->from("po2");
		$this->db->where("notransaksi", $no);
		$this->db->where("kode_unit", $unit);
		$data = $this->db->get();
		return $data->result();
	}

	public function datamtdoduapertama() {
		$id = $this->input->get("id");
		$dt = explode("_", $id);
		$unit = $this->input->get("kdunit");
		$this->db->select("tgl_pakai, jam, qty, id");
		$this->db->from("po2");
		$this->db->where("notransaksi", $dt[1]);
		$this->db->where("kode_unit", $unit);
		$data = $this->db->get();
		return $data->result();
	}

	public function datatindakanins() { 
		$this->db->select("ptindakanopr.id as id, mtindakan.tindakan as tindakan, mtindakan.jasas as jasas, ptindakanopr.tgl_periksa as tgl_periksa, ptindakanopr.nama_dokter as nama_dokter, ptindakanopr.nama_anastesi as nama_anastesi, ptindakanopr.spe_anak as spe_anak, ptindakanopr.nama_penata as nama_penata,ptindakanopr.nonasuransi as nonasuransi, ptindakanopr.diskon as diskon ");
		$this->db->from("ptindakanopr");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakanopr.tindakan");
		$this->db->where("ptindakanopr.notransaksi", $this->input->get("notrans"));
		$this->db->where("ptindakanopr.kode_unit", $this->input->get("kdunit"));
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
			$numgabung = "IN" . substr($numdate, 2) . $numend;
			return array($tgl, $numstart, $numgabung);
		}
	}

	public function simpantindakanopr($dtpasien, $dthargatindakan) {
		$um = $this->input->get("tdumum");
		$date = date_create($this->input->get("tindakantgl"));
		$tgl = date_format($date,"Y-m-d");
		
		$datasimpan = array(
			'kode_unit' => $this->input->get("kdunit"),
			'nama_unit' => $this->input->get("unit"),
			'no_rm' => $this->input->get("rm"),
			'golongan' => "",
			'tgl_periksa' => $tgl,
			'jenis' => "",
			'tindakan' => $this->input->get("tdtindakan"),
			'jasas' => $dthargatindakan->jasas, 
			'jasap' => $dthargatindakan->jasap,
			'operator' => "0",
			'sanas' => "0",
			'penata' => "0",
			'speanak' => "0",
			'type' => "0",
			'tanggungaskes' => "0",
			'notransaksi' => $this->input->get("notrans"),
			'user1' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"),
			'kode_dokter' => $this->input->get("tddokter"),
			'nama_dokter' => $this->input->get("tddoktertext"),
            'disc1' => $this->input->get("disc1"),
			'kode_anastesi' => $this->input->get("tdspesialis"),
			'nama_anastesi' => $this->input->get("tdspesialistext"),
			'kode_spe_anak' => $this->input->get("tdanak"),
			'spe_anak' => $this->input->get("tdanaktext"),
			'kode_penata' => $this->input->get("tdpenata"),
			'nama_penata' => $this->input->get("tdpenatatext"),
			'idinstalasi' => "",
			'nonasuransi' => gantiangka($um),
			'diskon' => $this->input->get("tddiskon"),
            'kode_dokter2' => $this->input->get("tddokterdua"),
            'nama_dokter2' => $this->input->get("tddokterduatext"),
            'disc2' => $this->input->get("disc2"),
            'kode_dokter3' => $this->input->get("tddoktertiga"),
            'nama_dokter3' => $this->input->get("tddoktertigatext"),
            'disc3' => $this->input->get("disc3"),
            'kode_perawat' => $this->input->get("tdperawat"),
            'nama_perawat' => $this->input->get("tdperawattext"),
            'catatan' => $this->input->get("cat")
		);

		$dt = $this->db->insert('ptindakanopr', $datasimpan);
		return $dt;
	}

    public function ubahpelayanantindakan($dthargatindakan) {
		$um = $this->input->get("tdumum");
		$date = date_create($this->input->get("tindakantgl"));
		$tgl = date_format($date,"Y-m-d");
        $datasimpan = array(
            'tindakan' => $this->input->get("tdtindakan"),
            'jasas' => $dthargatindakan->jasas,
            'jasap' => $dthargatindakan->jasap,
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s"),
            'kode_dokter' => $this->input->get("tddokter"),
            'nama_dokter' => $this->input->get("tddoktertext"),
            'disc1' => $this->input->get("disc1"),
            'kode_anastesi' => $this->input->get("tdspesialis"),
            'nama_anastesi' => $this->input->get("tdspesialistext"),
            'kode_spe_anak' => $this->input->get("tdanak"),
            'spe_anak' => $this->input->get("tdanaktext"),
            'kode_penata' => $this->input->get("tdpenata"),
            'nama_penata' => $this->input->get("tdpenatatext"),
            'nonasuransi' => gantiangka($um),
            'diskon' => $this->input->get("tddiskon"),
            'kode_dokter2' => $this->input->get("tddokterdua"),
            'nama_dokter2' => $this->input->get("tddokterduatext"),
            'disc2' => $this->input->get("disc2"),
            'kode_dokter3' => $this->input->get("tddoktertiga"),
            'nama_dokter3' => $this->input->get("tddoktertigatext"),
            'disc3' => $this->input->get("disc3"),
            'kode_perawat' => $this->input->get("tdperawat"),
            'nama_perawat' => $this->input->get("tdperawattext"),
			'catatan' => $this->input->get("cat"),
			'tgl_periksa' => $tgl
        );
        $this->db->where("id", $this->input->get("id"));
        $dt = $this->db->update('ptindakanopr', $datasimpan);
        return $dt;
    }

    public function hapuspelayanantindakan() {
        $id = $this->input->get("id");
        $this->db->where('id', $id);
        $dt = $this->db->delete('ptindakanopr');
        return $dt;
    }

	public function simpanpelayananodua($dtpasien) {
		$date = date_create($this->input->get("otgl"));
		$tgl = date_format($date,"Y-m-d");
		$tim = date_create($this->input->get("ojam"));
		$jam = date_format($tim,"H:i:s");

		$datasimpan = array(
			'kode_unit' => $this->input->get("kdunit"), 
			'nama_unit' => $this->input->get("unit"), 
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
			'menit' => "0"
		);

		$dt = $this->db->insert('po2', $datasimpan);
		return $dt;
	}

	public function ambileditdatabhp() {
		$id = $this->input->get("id");
		$this->db->select("tanggal, namaobat, satuanpakai, hargapakai, qty, id, kodeobat");
		$this->db->from("pbhp");
		$this->db->where("id", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function ubahpelayananbhp() {
		$date = date_create($this->input->get("bhptgl"));
		$tgl = date_format($date,"Y-m-d");
		list($kdobat, $idobat) = explode("_", $this->input->get("bhpbhp"), 2);

		$datasimpan = array(
			'tanggal' => $tgl, 
			'kodeobat' => $kdobat, 
			'namaobat' => $this->input->get("bhpbhptext"), 
			'qty' => $this->input->get("bhpqty"), 
			'satuanpakai' => $this->input->get("bhpstauan"), 
			'hargapakai' => $this->input->get("bhpharga"),
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"), 
			'idobat' => $idobat
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



	public function simpanbhpopr($dtpasien) {
		list($kdobat, $idobat) = explode("_", $this->input->get("bhpbhp"), 2);
		$date = date_create($this->input->get("bhptgl"));
		$tgl = date_format($date,"Y-m-d");

		$datasimpan = array(
			'kode_unit' => $this->input->get("kdunit"), 
			'nama_unit' => $this->input->get("unit"), 
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
			'idobat' => $idobat
		);

		$dt = $this->db->insert('pbhp', $datasimpan);
		return $dt;
	}

	public function ambileditdataodua() {
		$id = $this->input->get("id");
		$this->db->select("tgl_pakai, jam, qty, id");
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

		$datasimpan = array(
			'tgl_pakai' => $tgl, 
			'jam' => $jam, 
			'qty' => $this->input->get("ojml"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"),
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

	//tambahan dedy untuk hapus edit opr

	public function ambiledit() {
        $no = $this->input->get("id");
		$this->db->select("register_instalasi.no_rm as no_rm, register_instalasi.nama_pasien as nama_pasien, register_instalasi.nama_unitR as nama_unitR, register_instalasi.kode_unitR as kode_unitR, register_instalasi.kode_unit as kode_unit, register_instalasi.nama_unit as nama_unit, register.golongan as golongan, register_instalasi.kode_dokter as kode_dokter, register_instalasi.kode_dokter_periksa as kode_dokter_periksa, register_instalasi.id as id, register_instalasi.notransaksi as notransaksi, register_instalasi.notransaksi_IN as notransaksi_IN, register_instalasi.tanggal as tanggal, register_instalasi.rujukan as rujukan, register_instalasi.kode_unit_pelaksana as kode_unit_pelaksana, register_instalasi.nama_unit_pelaksana as nama_unit_pelaksana");
		$this->db->from("register_instalasi");
		$this->db->join("register", "register_instalasi.notransaksi = register.notransaksi");
		$this->db->where("register_instalasi.id", $no);
        $data = $this->db->get();
        return $data->row();
	}
	
	public function ubahopr() {
		$date = date_create($this->input->get("tgli"));
		$tgl = date_format($date,"Y-m-d");
        $datasimpan = array(
            'kode_dokter' => $this->input->get("dpengirim"),
            'nama_dokter' => $this->input->get("dpengirimtext"),
			'kode_unit_pelaksana' => $this->input->get("kode_unit_pelaksana"),
			'nama_unit_pelaksana' => $this->input->get("nama_unit_pelaksana"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
            // 'kode_dokter_periksa' => $this->input->get("dpemeriksa"),
			// 'nama_dokter_periksa' => $this->input->get("dpemeriksatext"),
			// 'tanggal' => $tgl
        );
        $this->db->where("id", $this->input->get("id"));
        $dt = $this->db->update('register_instalasi', $datasimpan);
        return $dt;
    }

    //

    public function hapusinstalasi() {
        $id = $this->input->get("id");
        $this->db->select("register_instalasi.notransaksi_IN as notransaksi_IN, register_instalasi.notransaksi as notransaksi,register_instalasi.kode_unit as kode_unit, munit.IBS as IBS");
        $this->db->from("register_instalasi");
        $this->db->join("munit", "munit.kode_unit = register_instalasi.kode_unit");
        $this->db->where("id", $id);
        $q = $this->db->get();
        $no = $q->row();

        if ($no->IBS == "1") {
            $this->db->select("notransaksi");
            $this->db->from("ptindakanopr");
            $this->db->where("notransaksi", $no->notransaksi);
            $this->db->where("kode_unit", $no->kode_unit);
            $qu = $this->db->get();
            $jum = $qu->num_rows();

            // $this->db->from('pbhp');
            // $this->db->select('id');
            // $this->db->where('notransaks', $no->notransaksi);
            // $databhp = $this->db->get();
            // $bhp = $databhp->num_rows();

            // $this->db->from('po2');
            // $this->db->select('id');
            // $this->db->where('notransaksi', $no->notransaksi);
            // $databhp = $this->db->get();
            // $odua = $databhp->num_rows();
        } else {
            $this->db->select("notransaksi_IN");
            $this->db->from("ptindakanopr");
            $this->db->where("notransaksi_IN", $no->notransaksi_IN);
            $this->db->where("kode_unit", $no->kode_unit);
            $qu = $this->db->get();
            $jum = $qu->num_rows();

            // $this->db->from('pbhp');
            // $this->db->select('notransaksi_IN');
            // $this->db->where("notransaksi_IN", $no->notransaksi_IN);
            // $databhp = $this->db->get();
            // $bhp = $databhp->num_rows();

            // $this->db->from('po2');
            // $this->db->select('notransaksi_IN');
            // $this->db->where("notransaksi_IN", $no->notransaksi_IN);
            // $databhp = $this->db->get();
            // $odua = $databhp->num_rows();
        }

        if (($jum == 0)) {
					// if (($jum == 0) && ($bhp == 0) && ($odua == 0)) {
            $id = $this->input->get("id");
            $this->db->where('id', $id);
            $this->db->delete('register_instalasi');
            return true;
        } else {
            return false;
        }
    }

    public function dataoprhapus() {
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

    public function datamtdhistory() {
        $id = $this->input->get("id");
        $dt = explode("_", $id);
        $unit = $this->input->get("unit");
        $this->db->select("register.notransaksi as notransaksi, register_detail.kode_unit as kode_unit, register_detail.nama_unit as nama_unit, register_detail.tgl_masuk_kamar as tgl_masuk_kamar, register_detail.tgl_keluar_kamar as tgl_keluar_kamar, register_detail.jam_masuk as jam_masuk, register_detail.jam_keluar as jam_keluar, register_detail.id as id, register_detail.status as status");
        $this->db->from("register");
        $this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
        $this->db->where("register.notransaksi", $dt[1]);
        $this->db->order_by("register_detail.id", "desc");
        $data = $this->db->get();
        return $data->result();
    }

    public function ambildatapindah() {
        $no = $this->input->get("notrans");
        $this->db->from("register_detail");
        $this->db->where("notransaksi", $no);
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
            'kode_kamar' => $this->input->get("kamar"),
            'hapus' => $dtregis->hapus,
            'idasal' => $dtregis->id,
            'pindah'  => "0"
        );

        $dts = $this->db->insert('register_detail', $datasimpan);

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
        return $dt;
    }

    public function ambilkamarpindah() {
        list($kdunit, $kdkelas, $nmunit) = explode("_", $this->input->get("pkunit"), 3);
        $this->db->select("kode_kamar, nama_kamar");
        $this->db->from("mkamar");
        $this->db->where("kode_kelas", $kdkelas);
        $data = $this->db->get();
        return $data->result();
    }

    public function datamtdhistorysave() {
        $id = $this->input->get("notrans");
        $dt = explode("_", $id);
        $unit = $this->input->get("unit");
        $this->db->select("register.notransaksi as notransaksi, register_detail.kode_unit as kode_unit, register_detail.nama_unit as nama_unit, register_detail.tgl_masuk_kamar as tgl_masuk_kamar, register_detail.tgl_keluar_kamar as tgl_keluar_kamar, register_detail.jam_masuk as jam_masuk, register_detail.jam_keluar as jam_keluar, register_detail.id as id, register_detail.status as status");
        $this->db->from("register");
        $this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
        $this->db->where("register.notransaksi", $id);
        $this->db->order_by("register_detail.id", "desc");
        $data = $this->db->get();
        return $data->result();
    }

    public function unitpindah() {
        $this->db->from("munit");
        $this->db->where("inap", "1");
        $data = $this->db->get();
        return $data->result();
    }


}
