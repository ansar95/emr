<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ijen extends CI_Model {

	public function datajen() {
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

	public function pencarianrm() {
		$no = $this->input->get("rm");
		$this->db->select("pasien.no_rm as no_rm, pasien.nama_pasien as nama_pasien, register_detail.nama_unit as nama_unit, register_detail.kode_unit as kode_unit, register.golongan as golongan, register_detail.kode_unitR as kode_unitR, register_detail.nama_unitR as nama_unitR, register_detail.notransaksi as notransaksi");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->join("pasien", "pasien.no_rm = register_detail.no_rm");
		$this->db->where("register_detail.no_rm", $no);
		$this->db->where("register_detail.statuskeluar", "0");
		$data = $this->db->get();
		return $data->result();
	}

	public function simpanjenbaru($dtnotrans) {
		$dt = $this->input->get("dataadd");
		$date = date_create($this->input->get("instgl"));
		$tgl = date_format($date,"Y-m-d");
		$this->db->select("inap, jalan, IGD");
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
			'kode_kelas' => "", 
			'nama_kelas' => "", 
			'kode_hemodialis' => "",
			'nama_hemodialis' => "",
			'notransaksi' => $dt[0], 
			'notransaksi_IN' => $dtnotrans[2], 
			'idrjalan' => "0", 
			'idrinap' => "0", 
			'barulama' => "0"
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

	public function dtprosesjen() {
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
		$this->db->where("jen", "1");
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function datatindakaninstalasi() {
		$id = $this->input->get("id");
		$dt = explode("_", $id);
		$this->db->select("mtindakan.tindakan as tindakan, mtindakan.jasas as jasas, ptindakan_instalasi.id as id, ptindakan_instalasi.nonasuransi, ptindakan_instalasi.diskon");
		$this->db->from("ptindakan_instalasi");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
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

		$this->db->select("mtindakan.tindakan as tindakan, mtindakan.jasas as jasas, ptindakan_instalasi.id as id, ptindakan_instalasi.nonasuransi, ptindakan_instalasi.diskon");
		$this->db->from("ptindakan_instalasi");
		$this->db->join("mtindakan", "mtindakan.kode_tindakan = ptindakan_instalasi.tindakan");
		$this->db->where("ptindakan_instalasi.notransaksi", $this->input->get("notrans"));
		$this->db->where("ptindakan_instalasi.notransaksi_IN", $this->input->get("notransin"));
		$this->db->where("ptindakan_instalasi.kode_unit", $this->input->get("kdunit"));
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
			$numgabung = "TR" . substr($numdate, 2) . $numend;
			return array($tgl, $numstart, $numgabung);
		}
	}

	public function simpantindakanjen($dtpasien, $dthargatindakan, $ambilnotrans) {
		$um = $this->input->get("tdumum");
		$date = date_create($this->input->get("jentgl"));
		$tgl = date_format($date,"Y-m-d");
		$datasimpan = array(
			'kode_unit' => $this->input->get("kdunit"), 
			'nama_unit' => $this->input->get("unit"), 
			'no_rm' => $dtpasien->no_rm, 
			'tanggal' =>  $tgl,  //date("Y-m-d"), 
			'tindakan' => $this->input->get("tdtindakan"), 
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
		);

		$dt = $this->db->insert('ptindakan_instalasi', $datasimpan);
		return $dt;
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

	public function simpanbhpjen($dtpasien) {
		list($kdobat, $idobat) = explode("_", $this->input->get("bhpbhp"), 2);
		$um = $this->input->get("bhpumum");
		$date = date_create($this->input->get("jentgl"));
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
		$date = date_create($this->input->get("jentgl"));
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
		$this->db->select("register_instalasi.no_rm as no_rm, register_instalasi.nama_pasien as nama_pasien, register_instalasi.nama_unitR as nama_unitR, register_instalasi.kode_unitR as kode_unitR, register_instalasi.kode_unit as kode_unit, register_instalasi.nama_unit as nama_unit, register.golongan as golongan, register_instalasi.kode_dokter as kode_dokter, register_instalasi.kode_dokter_periksa as kode_dokter_periksa, register_instalasi.id as id, register_instalasi.notransaksi as notransaksi, register_instalasi.notransaksi_IN as notransaksi_IN, register_instalasi.tanggal as tanggal");
		$this->db->from("register_instalasi");
		$this->db->join("register", "register_instalasi.notransaksi = register.notransaksi");
		$this->db->where("register_instalasi.id", $no);
        $data = $this->db->get();
        return $data->row();
    }

/*
	public function datajen() {
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

    public function ubahjen() {
		$date = date_create($this->input->get("tgli"));
		$tgl = date_format($date,"Y-m-d");
        $datasimpan = array(
            'kode_dokter' => $this->input->get("dpengirim"),
            'nama_dokter' => $this->input->get("dpengirimtext"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s"),
            'kode_dokter_periksa' => $this->input->get("dpemeriksa"),
			'nama_dokter_periksa' => $this->input->get("dpemeriksatext"),
			'tanggal' => $tgl
        );
        $this->db->where("id", $this->input->get("id"));
        $dt = $this->db->update('register_instalasi', $datasimpan);
        return $dt;
    }

    public function hapusinstalasi() {
        $id = $this->input->get("id");
        $this->db->select("register_instalasi.notransaksi_IN as notransaksi_IN, register_instalasi.notransaksi as notransaksi,register_instalasi.kode_unit as kode_unit, munit.jen as jen");
        $this->db->from("register_instalasi");
        $this->db->join("munit", "munit.kode_unit = register_instalasi.kode_unit");
        $this->db->where("id", $id);
        $q = $this->db->get();
        $no = $q->row();

        if ($no->jen == "1") {
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

    public function datajenhapus() {
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

}
