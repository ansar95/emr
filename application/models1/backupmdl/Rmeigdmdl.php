
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rmeigdmdl extends CI_Model {

    public function caripasienigd($unit) {    
		$this->db->select("register.no_rm as no_rm, register_detail.nama_kelas as nama_kelas, register_detail.kode_unit as kode_unit, register_detail.nama_unit as nama_unit, register.tgl_masuk as tgl_masuk, register.rujukan as rujukan, register.golongan as golongan, register_detail.no_transaksi_secondary as notransaksi, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register_detail.kode_dokter as kode_dokter, register_detail.nama_dokter as nama_dokter, register_detail.nama_unit, register_detail.id as id, register_detail.pindah as pindah,register_detail.status as status,register_detail.proses as proses, register_detail.pulang as pulang, register_detail.no_antrian as no_antrian, pasien.title as title, register.kode_booking as kode_booking, register.taskid4 as taskid4, register_detail.inap_to_poli as inap_to_poli, register.id as idregister, register.berkas as berkas, register.nosep, pasien.no_askes, pasien.nik ");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		$this->db->where("register_detail.kode_unit",$unit);
		// $this->db->where("register_detail.status",0);
		// $this->db->where("register_detail.pulang",0);
		$this->db->where("register.status",0);
		$this->db->order_by("register_detail.tgl_masuk", "DESC");
		$this->db->order_by("register_detail.jam_masuk", "DESC");
		$query = $this->db->get();
		if ($query) {
			return $query->result();
		} else {
			// Tangani kesalahan database di sini
			return array(); // atau kembalikan pesan kesalahan
		}
	}

    public function simpantriase() {
        $no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');

		$this->db->select("id");
		$this->db->from("emr_triase");
		$this->db->where("no_rm", $no_rm);
		$this->db->where("notransaksi", $notransaksi);
		$this->db->limit(1);
		$query = $this->db->get();
		$dtheader=$query->row();
		$num_rows = $query->num_rows();

        $datatriase = array(
            'no_rm' => $no_rm,
            'notransaksi' => $notransaksi,
            'kategori1' => $this->input->get("kategori1"),
            'kategori2' => $this->input->get("kategori2"),
            'kategori3' => $this->input->get("kategori3"),
            'kategori4' => $this->input->get("kategori4"),
            'kategori5' => $this->input->get("kategori5"),
            'airway11' => $this->input->get("airway11"),
            'airway12' => $this->input->get("airway12"),
            'airway21' => $this->input->get("airway21"),
            'airway31' => $this->input->get("airway31"),
            'airway41' => $this->input->get("airway41"),
            'airway51' => $this->input->get("airway51"),
            'breathing11' => $this->input->get("breathing11"),
            'breathing12' => $this->input->get("breathing12"),
            'breathing21' => $this->input->get("breathing21"),
            'breathing22' => $this->input->get("breathing22"),
            'breathing31' => $this->input->get("breathing31"),
            'breathing41' => $this->input->get("breathing41"),
            'breathing51' => $this->input->get("breathing51"),
            'circulation11' => $this->input->get("circulation11"),
            'circulation12' => $this->input->get("circulation12"),
            'circulation21' => $this->input->get("circulation21"),
            'circulation22' => $this->input->get("circulation22"),
            'circulation31' => $this->input->get("circulation31"),
            'circulation32' => $this->input->get("circulation32"),
            'circulation41' => $this->input->get("circulation41"),
            'circulation51' => $this->input->get("circulation51"),
            'disability11' => $this->input->get("disability11"),
            'disability21' => $this->input->get("disability21"),
            'disability31' => $this->input->get("disability31"),
            'disability41' => $this->input->get("disability41"),
            'disability51' => $this->input->get("disability51"),
            'user' => $this->session->userdata("nmuser"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );   
        if ($num_rows == 0) {
            $this->db->insert("emr_triase", $datatriase);
        } else {
            $this->db->where("no_rm", $no_rm);
            $this->db->where("notransaksi", $notransaksi);
            $this->db->limit(1);
            $dt = $this->db->update("emr_triase", $datatriase);
        }

        return array("sukses" => $dt);
    }

    public function simpanawal() {
        $no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
        $dataawal = array(
            'no_rm' => $no_rm,
            'notransaksi' => $notransaksi,
            'datangsendiri' => $this->input->get("datangsendiri"),
            'rujukandari' => $this->input->get("rujukandari"),
            'isian' => $this->input->get("isian"),
            'auto' => $this->input->get("auto"),
            'allo' => $this->input->get("allo"),
            'allotext' => $this->input->get("allotext"),
            'preventif' => $this->input->get("preventif"),
            'paliatif' => $this->input->get("paliatif"),
            'kuratif' => $this->input->get("kuratif"),
            'rehabilitatip' => $this->input->get("rehabilitatip"),
            'keluhanutama' => $this->input->get("keluhanutama"),
            'riwayatsekarang' => $this->input->get("riwayatsekarang"),
            'riwayatdahulu' => $this->input->get("riwayatdahulu"),
            'alergitidak' => $this->input->get("alergitidak"),
            'alergiya' => $this->input->get("alergiya"),
            'alergitext' => $this->input->get("alergitext"),
            'user' => $this->session->userdata("nmuser"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );   
            $this->db->where("no_rm", $no_rm);
            $this->db->where("notransaksi", $notransaksi);
            $this->db->limit(1);
            $dt = $this->db->update("emr_asmedigd", $dataawal);
        return array("sukses" => $dt);
    }
    
    public function simpanawalranap() {
        $no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
        $dataawal = array(
            'no_rm' => $no_rm,
            'notransaksi' => $notransaksi,
            'datangsendiri' => $this->input->get("datangsendiri"),
            'rujukan' => $this->input->get("rujukan"),
            'rujukandari' => $this->input->get("rujukandari"),
            'auto' => $this->input->get("auto"),
            'allo' => $this->input->get("allo"),
            'allotext' => $this->input->get("allotext"),
            'preventif' => $this->input->get("preventif"),
            'paliatif' => $this->input->get("paliatif"),
            'kuratif' => $this->input->get("kuratif"),
            'rehabilitatip' => $this->input->get("rehabilitatip"),
            'keluhanutama' => $this->input->get("keluhanutama"),
            'riwayatsekarang' => $this->input->get("riwayatsekarang"),
            'riwayatdahulu' => $this->input->get("riwayatdahulu"),
            'alergitidak' => $this->input->get("alergitidak"),
            'alergiya' => $this->input->get("alergiya"),
            'alergitext' => $this->input->get("alergitext"),
            'user' => $this->session->userdata("nmuser"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );   
            $this->db->where("no_rm", $no_rm);
            $this->db->where("notransaksi", $notransaksi);
            $this->db->limit(1);
            $dt = $this->db->update("emr_asmedranap", $dataawal);
        return array("sukses" => $dt);
    }

    public function simpanpemeriksaan() {
        $no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
        $data = array(
            'no_rm' => $this->input->get("no_rm"),
            'baik' => $this->input->get("baik"),
            'sakitringan' => $this->input->get("sakitringan"),
            'sakitsedang' => $this->input->get("sakitsedang"),
            'sakitberat' => $this->input->get("sakitberat"),
            'cm' => $this->input->get("cm"),
            'apatis' => $this->input->get("apatis"),
            'somnolen' => $this->input->get("somnolen"),
            'sopor' => $this->input->get("sopor"),
            'koma' => $this->input->get("koma"),
            'ttv_td' => $this->input->get("ttv_td"),
            'ttv_nadi' => $this->input->get("ttv_nadi"),
            'ttv_rr' => $this->input->get("ttv_rr"),
            'ttv_s' => $this->input->get("ttv_s"),
            'generalis' => $this->input->get("generalis"),
            'lokalis' => $this->input->get("lokalis"),
            'user' => $this->session->userdata("nmuser"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );   
            $this->db->where("no_rm", $no_rm);
            $this->db->where("notransaksi", $notransaksi);
            $this->db->limit(1);
            $dt = $this->db->update("emr_asmedigd", $data);
        return array("sukses" => $dt);
    }

    public function simpanpemeriksaanranap() {
        $no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
        $data = array(
            'no_rm' => $this->input->get("no_rm"),
            'baik' => $this->input->get("baik"),
            'sakitringan' => $this->input->get("sakitringan"),
            'sakitsedang' => $this->input->get("sakitsedang"),
            'sakitberat' => $this->input->get("sakitberat"),
            'cm' => $this->input->get("cm"),
            'apatis' => $this->input->get("apatis"),
            'somnolen' => $this->input->get("somnolen"),
            'sopor' => $this->input->get("sopor"),
            'koma' => $this->input->get("koma"),
            'ttv_td' => $this->input->get("ttv_td"),
            'ttv_nadi' => $this->input->get("ttv_nadi"),
            'ttv_rr' => $this->input->get("ttv_rr"),
            'ttv_s' => $this->input->get("ttv_s"),
            'generalis' => $this->input->get("generalis"),
            'lokalis' => $this->input->get("lokalis"),
            'user' => $this->session->userdata("nmuser"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );   
            $this->db->where("no_rm", $no_rm);
            $this->db->where("notransaksi", $notransaksi);
            $this->db->limit(1);
            $dt = $this->db->update("emr_asmedranap", $data);
        return array("sukses" => $dt);
    }

    public function simpanpenunjangranap() {
        $no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
        $data = array(
            'no_rm' => $this->input->get("no_rm"),
            'lab' => $this->input->get("lab"),
            'rad' => $this->input->get("rad"),
            'lain' => $this->input->get("lain"),
            'diagnosakerja' => $this->input->get("diagnosakerja"),
            'diagnosabanding' => $this->input->get("diagnosabanding"),
            'user' => $this->session->userdata("nmuser"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );   
            $this->db->where("no_rm", $no_rm);
            $this->db->where("notransaksi", $notransaksi);
            $this->db->limit(1);
            $dt = $this->db->update("emr_asmedranap", $data);
        return array("sukses" => $dt);
    }

    public function simpannyeri() {
        $no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
        $data = array(
            'nyeritidak' => $this->input->get("nyeritidak"),
            'nyeriiya' => $this->input->get("nyeriiya"),
            'akut' => $this->input->get("akut"),
            'kronis' => $this->input->get("kronis"),
            'nyeritumpul' => $this->input->get("nyeritumpul"),
            'nyeritajam' => $this->input->get("nyeritajam"),
            'panasterbakar' => $this->input->get("panasterbakar"),
            'menjalartidak' => $this->input->get("menjalartidak"),
            'menjalarya' => $this->input->get("menjalarya"),
            'menjalarke' => $this->input->get("menjalarke"),
            'skor' => $this->input->get("skor"),
            'jarang' => $this->input->get("jarang"),
            'hilangtimbul' => $this->input->get("hilangtimbul"),
            'terusmenerus' => $this->input->get("terusmenerus"),
            'tidur' => $this->input->get("tidur"),
            'aktiffisik' => $this->input->get("aktif"),
            'konsentrasi' => $this->input->get("konsentrasi"),
            'nafsumakan' => $this->input->get("nafsumakan"),
            'wajah' => $this->input->get("wajah"),
            'kaki' => $this->input->get("kaki"),
            'aktifitas' => $this->input->get("aktifitas"),
            'menangis' => $this->input->get("menangis"),
            'bersuara' => $this->input->get("bersuara"),
            'pencetus' => $this->input->get("pencetus"),
            'kualitasskrining' => $this->input->get("kualitas"),
            'lokasi' => $this->input->get("lokasi"),
            'skalanyeri' => $this->input->get("skalanyeri"),
            'lamanyeri' => $this->input->get("lamanyeri"),
            'lab' => $this->input->get("laboratorium"),
            'rad' => $this->input->get("radiologi"),
            'ekg' => $this->input->get("ekg"),
            'laintext' => $this->input->get("penunjanglain"),
            'diagnosakerja' => $this->input->get("diagnosakerja"),
            'user' => $this->session->userdata("nmuser"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );   
            $this->db->where("no_rm", $no_rm);
            $this->db->where("notransaksi", $notransaksi);
            $this->db->limit(1);
            $dt = $this->db->update("emr_asmedigd", $data);
        return array("sukses" => $dt);
    }

    public function simpankesimpulan() {
        $no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
        $data = array(
            'dirawat' => $this->input->get("dirawat"),
            'pulang' => $this->input->get("pulang"),
            'izinDokter' => $this->input->get("izinDokter"),
            'dirawatkonsul' => $this->input->get("konsul"),
            'terapipulang' => $this->input->get("terapipulang"),
            'kontrolpoli' => $this->input->get("kontrolpoli"),
            'rujuk' => $this->input->get("rujuk"),
            'user' => $this->session->userdata("nmuser"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );   
            $this->db->where("no_rm", $no_rm);
            $this->db->where("notransaksi", $notransaksi);
            $this->db->limit(1);
            $dt = $this->db->update("emr_asmedigd", $data);
        return array("sukses" => $dt);
    }
    
    public function simpanedukasi() {
        $no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
        $data = array(
            'edukasi' => $this->input->get("edukasi"),
            'edukasipasien' => $this->input->get("pasien"),
            'edukasikeluarga' => $this->input->get("keluarga"),
            'edukasitidak' => $this->input->get("tidak"),
            'edukasitidakkarena' => $this->input->get("edukasitidakkarena"),
            'membaik' => $this->input->get("membaik"),
            'memburuk' => $this->input->get("memburuk"),
            'tetap' => $this->input->get("tetapmasihsakit"),
            'meninggal' => $this->input->get("meninggal"),
            'jammeninggal' => $this->input->get("jammeninggal"),
            'pulangtd' => $this->input->get("pulangtd"),
            'pulangnadi' => $this->input->get("pulangnadi"),
            'pulangrr' => $this->input->get("pulangrr"),
            'pulangs' => $this->input->get("pulangs"),
            'user' => $this->session->userdata("nmuser"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );   
            $this->db->where("no_rm", $no_rm);
            $this->db->where("notransaksi", $notransaksi);
            $this->db->limit(1);
            $dt = $this->db->update("emr_asmedigd", $data);
        return array("sukses" => $dt);
    }
    



    public function simpanedukasiranap() {
        $no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
        $data = array(
            'edukasi' => $this->input->get("edukasi"),
            'anjuran' => $this->input->get("anjuran"),
            'terapi' => $this->input->get("terapi"),
            'kriteria' => $this->input->get("kriteria"),
            'konsul' => $this->input->get("konsul"),
            'rekonobatya' => $this->input->get("rekonobatya"),
            'rekonobattidak' => $this->input->get("rekonobattidak"),
            'user' => $this->session->userdata("nmuser"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );   
            $this->db->where("no_rm", $no_rm);
            $this->db->where("notransaksi", $notransaksi);
            $this->db->limit(1);
            $dt = $this->db->update("emr_asmedranap", $data);
        return array("sukses" => $dt);
    }
    

    public function penggildatatriase($no_rm,$notransaksi) {    
        $this->db->select("id");
		$this->db->from("emr_triase");
		$this->db->where("no_rm", $no_rm);
		$this->db->where("notransaksi", $notransaksi);
		$this->db->limit(1);
		$cari = $this->db->get();
		$dtheader=$cari->row();
		$num_rows = $cari->num_rows();
        if ($num_rows == 0) {
            $datatriase = array(
                'no_rm' => $no_rm,
                'notransaksi' => $notransaksi,
                'user' => $this->session->userdata("nmuser"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s")
            );
            $this->db->insert("emr_triase", $datatriase);
        }

        $this->db->from("emr_triase");
		$this->db->where("no_rm",$no_rm);
		$this->db->where("notransaksi",$notransaksi);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query) {
			return $query->row();
		} else {
			// Tangani kesalahan database di sini
			return array(); // atau kembalikan pesan kesalahan
		}
	}

    public function penggilassawal($no_rm,$notransaksi) {    
        $this->db->select("id");
		$this->db->from("emr_asmedigd");
		$this->db->where("no_rm", $no_rm);
		$this->db->where("notransaksi", $notransaksi);
		$this->db->limit(1);
		$cari = $this->db->get();
		$dtheader=$cari->row();
		$num_rows = $cari->num_rows();
        if ($num_rows == 0) {
            $datatriase = array(
                'no_rm' => $no_rm,
                'notransaksi' => $notransaksi,
                'user' => $this->session->userdata("nmuser"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s")
            );
            $this->db->insert("emr_asmedigd", $datatriase);
        }

        $this->db->from("emr_asmedigd");
		$this->db->where("no_rm",$no_rm);
		$this->db->where("notransaksi",$notransaksi);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query) {
			return $query->row();
		} else {
			// Tangani kesalahan database di sini
			return array(); // atau kembalikan pesan kesalahan
		}
	}


    public function panggilkesimpulan($no_rm,$notransaksi) {
		$this->db->from("emr_asmedigd");
		// $this->db->join("mdokter", "mdokter.kode_dokter = emr_terapiigd.kode_dokter");
		$this->db->where('no_rm', $no_rm);
		$this->db->where('notransaksi', $notransaksi);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->result();
	}


    public function panggiltarapi($no_rm,$notransaksi) {
        $this->db->select("emr_terapiigd.id as id, emr_terapiigd.no_rm as no_rm, emr_terapiigd.notransaksi as notransaksi, emr_terapiigd.kode_dokter as kode_dokter, emr_terapiigd.jam as jam, emr_terapiigd.tanggal as tanggal ,emr_terapiigd.terapi as terapi ,emr_terapiigd.evaluasi as evaluasi , emr_terapiigd.oleh as oleh, mdokter.nama_dokter as nama_dokter");
		$this->db->from("emr_terapiigd");
		$this->db->join("mdokter", "mdokter.kode_dokter = emr_terapiigd.kode_dokter");
		$this->db->where('no_rm', $no_rm);
		$this->db->where('notransaksi', $notransaksi);
		$this->db->order_by('tanggal', "desc");
		$this->db->order_by('jam', "desc");
		$data = $this->db->get();
		return $data->result();
	}

    public function panggilintegrasi($no_rm,$notransaksi) {
		$this->db->from("emr_tindakan");
		$this->db->where('no_rm', $no_rm);
		$this->db->where('notransaksi', $notransaksi);
		$this->db->order_by('tanggal', "desc");
		$this->db->order_by('jam', "desc");
		$data = $this->db->get();
		return $data->result();
	}
    
    public function panggilobatinfus($no_rm,$notransaksi) {
		$this->db->from("emr_obatinfus");
		$this->db->where('no_rm', $no_rm);
		$this->db->where('notransaksi', $notransaksi);
		$this->db->order_by('tanggal', "desc");
		$this->db->order_by('jam', "desc");
		$data = $this->db->get();
		return $data->result();
	}

    

    
    public function addrecordtindakan($no_rm,$notransaksi) {    
            $datatriase = array(
                'no_rm' => $no_rm,
                'notransaksi' => $notransaksi,
                'tindakan' =>'',
                'oleh' =>'',
                'tanggal' =>date("Y-m-d"),
                'jam' =>date("H:i:s"),
                'user' => $this->session->userdata("nmuser"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s")
            );
            $this->db->insert("emr_tindakan", $datatriase);
            // return 1;
        }

        public function simpandatatindakan($id) {    
            $datatriase = array(
                'tindakan' =>$this->input->get("tindakan"),
                'oleh' =>$this->input->get("oleh"),

                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s")
            );
            $this->db->where("id", $id);
            $this->db->limit(1);
            $dt = $this->db->update("emr_tindakan", $datatriase);
            // return 1;
        }    

        public function simpandataobatinfus($id) {    
            $datatriase = array(
                'namaobat' =>$this->input->get("namaobat"),
                'dosis' =>$this->input->get("dosis"),
                'oral' =>$this->input->get("oral"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s")
            );
            $this->db->where("id", $id);
            $this->db->limit(1);
            $dt = $this->db->update("emr_obatinfus", $datatriase);
            // return 1;
        }    

        public function datatindakanPerId() {
            $id = $this->input->get("id");
            $this->db->from("emr_tindakan");
            $this->db->where("id", $id);
            $this->db->limit(1);
            $data = $this->db->get();
            return $data->row();
        }


        public function dataobatPerId() {
            $id = $this->input->get("id");
            $this->db->from("emr_obatinfus");
            $this->db->where("id", $id);
            $this->db->limit(1);
            $data = $this->db->get();
            return $data->row();
        }

        public function hapusdata($id) {
            $id = $this->input->get("id");
            $this->db->where('id', $id);
            $this->db->limit(1);
            $dt = $this->db->delete('emr_tindakan');
            return $dt;
        }
        
        public function hapusdataobatinfus($id) {
            $id = $this->input->get("id");
            $this->db->where('id', $id);
            $this->db->limit(1);
            $dt = $this->db->delete('emr_obatinfus');
            return $dt;
        }

// =========== ass medis terapi
        public function addrecordterapi($no_rm,$notransaksi) {    
            $kode_dokter = $this->input->get("kode_dokter");
            $datatriase = array(
                'no_rm' => $no_rm,
                'notransaksi' => $notransaksi,
                'kode_dokter' => $kode_dokter,
                'jam' =>date("H:i:s"),
                'tanggal' =>date("Y-m-d"),
                'terapi' =>'',
                'evaluasi' =>'',
                'oleh' =>'',
                'user' => $this->session->userdata("nmuser"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s")
            );
            $this->db->insert("emr_terapiigd", $datatriase);
            // return 1;
        }

        public function dataterapiPerId() {
            $id = $this->input->get("id");
            $this->db->from("emr_terapiigd");
            $this->db->where("id", $id);
            $this->db->limit(1);
            $data = $this->db->get();
            return $data->row();
        }

        public function simpandataterapi($id) {    
            $datatriase = array(
                'terapi' =>$this->input->get("terapi"),
                'oleh' =>$this->input->get("oleh"),
                'evaluasi' =>$this->input->get("evaluasi"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s")
            );
            $this->db->where("id", $id);
            $this->db->limit(1);
            $dt = $this->db->update("emr_terapiigd", $datatriase);
            // return 1;
        }    

        public function hapusdataterapi($id) {
            $id = $this->input->get("id");
            $this->db->where('id', $id);
            $this->db->limit(1);
            $dt = $this->db->delete('emr_terapiigd');
            return $dt;
        }

        public function addrecordobat($no_rm,$notransaksi) {    
            $datatriase = array(
                'no_rm' => $no_rm,
                'notransaksi' => $notransaksi,
                'namaobat' =>'',
                'dosis' =>'',
                'oral' =>'',
                'tanggal' =>date("Y-m-d"),
                'jam' =>date("H:i:s"),
                'user' => $this->session->userdata("nmuser"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s")
            );
            $this->db->insert("emr_obatinfus", $datatriase);
            // return 1;
        }


        public function panggilsoap($no_rm,$notransaksi) {
            $this->db->from("emr_soapranap");
            $this->db->where('no_rm', $no_rm);
            $this->db->where('notransaksi', $notransaksi);
            $this->db->order_by('tanggal', "desc");
            $this->db->order_by('jam', "desc");
            $data = $this->db->get();
            return $data->result();
        }

        public function addrecordsoap($no_rm,$notransaksi) {    
            $kode_dokter = $this->input->get("kode_dokter");
            $datatriase = array(
                'no_rm' => $no_rm,
                'notransaksi' => $notransaksi,
                'kode_dokter' => $kode_dokter,
                'jam' =>date("H:i:s"),
                'tanggal' =>date("Y-m-d"),
                'profesi' =>'',
                'subjek' =>'',
                'objek' =>'',
                'analisis' =>'',
                'plan' =>'',
                'instruksi' =>'',
                'user' => $this->session->userdata("nmuser"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s")
            );
            $this->db->insert("emr_soapranap", $datatriase);
            // return 1;
        }

        public function datasoapPerId() {
            $id = $this->input->get("id");
            $this->db->from("emr_soapranap");
            $this->db->where("id", $id);
            $this->db->limit(1);
            $data = $this->db->get();
            return $data->row();
        }

        public function simpandatasoap_ranap($id) {    
            $datatriase = array(
                'profesi' =>$this->input->get("profesi"),
                'subjek' =>$this->input->get("subjek"),
                'objek' =>$this->input->get("objek"),
                'analisis' =>$this->input->get("analisis"),
                'plan' =>$this->input->get("plan"),
                'instruksi' =>$this->input->get("instruksi"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s")
            );
            $this->db->where("id", $id);
            $this->db->limit(1);
            $dt = $this->db->update("emr_soapranap", $datatriase);
            // return 1;
        }    
        
        public function hapusdatasoap($id) {
            $id = $this->input->get("id");
            $this->db->where('id', $id);
            $this->db->limit(1);
            $dt = $this->db->delete('emr_soapranap');
            return $dt;
        }

        public function addrecordasuhan($no_rm,$notransaksi) {    
            $kode_dokter = $this->input->get("kode_dokter");
            $datatriase = array(
                'no_rm' => $no_rm,
                'notransaksi' => $notransaksi,
                'kode_dokter' => $kode_dokter,
                'jam' =>date("H:i:s"),
                'tanggal' =>date("Y-m-d"),
                'implementasi' =>'',
                'oleh' =>'',
                'user' => $this->session->userdata("nmuser"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s")
            );
            $this->db->insert("emr_asuhan", $datatriase);
            // return 1;
        }
        public function panggilasuhan($no_rm,$notransaksi) {
            $this->db->from("emr_asuhan");
            $this->db->where('no_rm', $no_rm);
            $this->db->where('notransaksi', $notransaksi);
            $this->db->order_by('tanggal', "desc");
            $this->db->order_by('jam', "desc");
            $data = $this->db->get();
            return $data->result();
        }

        public function dataasuhanPerId() {
            $id = $this->input->get("id");
            $this->db->from("emr_asuhan");
            $this->db->where("id", $id);
            $this->db->limit(1);
            $data = $this->db->get();
            return $data->row();
        }

        public function simpandataasuhan($id) {    
            $datatriase = array(
                'tanggal' =>$this->input->get("tanggal"),
                'jam' =>$this->input->get("jam"),
                'implementasi' =>$this->input->get("implementasi"),
                'evaluasi' =>$this->input->get("implementasi"),
                'oleh' =>$this->input->get("oleh"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s")
            );
            $this->db->where("id", $id);
            $this->db->limit(1);
            $dt = $this->db->update("emr_asuhan", $datatriase);
            // return 1;
        }    

          
        public function hapusdataasuhan($id) {
            $id = $this->input->get("id");
            $this->db->where('id', $id);
            $this->db->limit(1);
            $dt = $this->db->delete('emr_asuhan');
            return $dt;
        }



        public function penggilassawalRanap($no_rm,$notransaksi) {    
            $this->db->select("id");
            $this->db->from("emr_asmedranap");
            $this->db->where("no_rm", $no_rm);
            $this->db->where("notransaksi", $notransaksi);
            $this->db->limit(1);
            $cari = $this->db->get();
            $dtheader=$cari->row();
            $num_rows = $cari->num_rows();
            if ($num_rows == 0) {
                $datatriase = array(
                    'no_rm' => $no_rm,
                    'notransaksi' => $notransaksi,
                    'user' => $this->session->userdata("nmuser"),
                    'user2' => $this->session->userdata("nmuser"),
                    'lastlogin' => date("Y-m-d H:i:s")
                );
                $this->db->insert("emr_asmedranap", $datatriase);
            }
    
            $this->db->from("emr_asmedranap");
            $this->db->where("no_rm",$no_rm);
            $this->db->where("notransaksi",$notransaksi);
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query) {
                return $query->row();
            } else {
                // Tangani kesalahan database di sini
                return array(); // atau kembalikan pesan kesalahan
            }
        }

// ======= asesmen awal keperawatan ============
public function cek_askep_saveriwayat($no_rm,$notransaksi) {
    $this->db->select("id");
    $this->db->from("emr_askepigd");
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
        $dt=$this->db->insert("emr_askepigd", $datacek);
        return array("sukses" => $dt);
    } else {
        return array("gagal" => 0);
    }
}

public function panggildataaskep($no_rm,$notransaksi) {
    $this->db->from(" emr_askepigd");
    $this->db->where("no_rm",$no_rm);
    $this->db->where("notransaksi",$notransaksi);
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query) {
        return $query->row();
    } else {
        // Tangani kesalahan database di sini
        return array(); // atau kembalikan pesan kesalahan
    }
}


        
public function askep_saveriwayat() {
    $no_rm = $this->input->get('no_rm');
    $notransaksi = $this->input->get('notransaksi');

    $dataawal = array(
        'no_rm' => $no_rm,
        'notransaksi' => $notransaksi,
        'hambatan' => $this->input->get("hambatan"),
        'keluhanutama' => $this->input->get("keluhanutama"),
        'airway' => $this->input->get("airway"),
        'airwaylain' => $this->input->get("airwaylain"),
        'breating' => $this->input->get("breating"),
        'breatinglain' => $this->input->get("breatinglain"),
        'rr' => $this->input->get("rr"),
        'pola' => $this->input->get("polapernapasan"),
        'polalain' => $this->input->get("polapernapasantext"),

        'td' => $this->input->get("td"),
        'nadi' => $this->input->get("nadi"),
        'naditeratur' => $this->input->get("naditeratur"),

        'suhu' => $this->input->get("suhu"), 
        'akral' => $this->input->get("akral"),
        'pendarahan' => $this->input->get("pendarahan"),
        'pendarahantext' => $this->input->get("pendarahantext"),

        'lukabakar' => $this->input->get("lukabakar"),
        'crt' => $this->input->get("crt"),
        'kulit' => $this->input->get("kulit"),
        'akralluka' => $this->input->get("akralluka"),
        'turgor' => $this->input->get("turgor"),

        'alergi' => $this->input->get("alergi"),
        'alergitext' => $this->input->get("alergitext"),

        'bukamata' => $this->input->get("bukamata"),
        'responmotorik' => $this->input->get("responmotorik"),
        'responverbal' => $this->input->get("responverbal"),
        
        'gcs_e' => $this->input->get("gcs_e"),
        'gcs_m' => $this->input->get("gcs_m"),
        'gcs_v' => $this->input->get("gcs_v"),

        'user2' => $this->session->userdata("nmuser"),
        'lastlogin' => date("Y-m-d H:i:s")
    );   
        $this->db->where("no_rm", $no_rm);
        $this->db->where("notransaksi", $notransaksi);
        $this->db->limit(1);
        $dt = $this->db->update("emr_askepigd", $dataawal);
    return array("sukses" => $dt);
}        

public function askep_savedissability() {
    $no_rm = $this->input->get('no_rm');
    $notransaksi = $this->input->get('notransaksi');

    $dataawal = array(
        'no_rm' => $no_rm,
        'notransaksi' => $notransaksi,

        'bukamata' => $this->input->get("bukamata"),
        'responmotorik' => $this->input->get("responmotorik"),
        'responverbal' => $this->input->get("responverbal"),
        
        'gcs_e' => $this->input->get("gcs_e"),
        'gcs_m' => $this->input->get("gcs_m"),
        'gcs_v' => $this->input->get("gcs_v"),

        'kesadaran' => $this->input->get("kesadaran"),
        'pupiltext' => $this->input->get("pupiltext"),
        'pupil' => $this->input->get("pupil"),
        'cahaya' => $this->input->get("cahaya"),
        'ototatas' => $this->input->get("ototatas"),
        'ototbawah' => $this->input->get("ototbawah"),
                
        'user2' => $this->session->userdata("nmuser"),
        'lastlogin' => date("Y-m-d H:i:s")
    );   
        $this->db->where("no_rm", $no_rm);
        $this->db->where("notransaksi", $notransaksi);
        $this->db->limit(1);
        $dt = $this->db->update("emr_askepigd", $dataawal);
    return array("sukses" => $dt);
}

public function askep_savepemeriksaanfisik() {
    $no_rm = $this->input->get('no_rm');
    $notransaksi = $this->input->get('notransaksi');

    $dataawal = array(
        'no_rm' => $no_rm,
        'notransaksi' => $notransaksi,

        'kesadaranfisik' => $this->input->get("kesadaranfisik"),
        'keadaanumum' => $this->input->get("keadaanumum"),
        'beratbadan' => $this->input->get("beratbadan"),

        'td_fisik' => $this->input->get("td_fisik"),
        'hr_fisik' => $this->input->get("hr_fisik"),
        'rr_fisik' => $this->input->get("rr_fisik"),
        'suhu_fisik' => $this->input->get("suhu_fisik"),

        'kepala' => $this->input->get("kepala"),
        'kepalatext' => $this->input->get("kepalatext"),
        
        'mata' => $this->input->get("mata"),
        'matatext' => $this->input->get("matatext"),

        'tht' => $this->input->get("tht"),
        'thttext' => $this->input->get("thttext"),

        'mulut' => $this->input->get("mulut"),
        'muluttext' => $this->input->get("muluttext"),

        'leher' => $this->input->get("leher"),
        'lehertext' => $this->input->get("lehertext"),

        'thorax' => $this->input->get("thorax"),
        'thoraxtext' => $this->input->get("thoraxtext"),

        'payudara' => $this->input->get("payudara"),
        'payudaratext' => $this->input->get("payudaratext"),
        
        'abdomen' => $this->input->get("abdomen"),
        'abdomentext' => $this->input->get("abdomentext"),

        'urogenital' => $this->input->get("urogenital"),
        'urogenitaltext' => $this->input->get("urogenitaltext"),

        'ekstermitas' => $this->input->get("ekstermitas"),

        'user2' => $this->session->userdata("nmuser"),
        'lastlogin' => date("Y-m-d H:i:s")
    );   
        $this->db->where("no_rm", $no_rm);
        $this->db->where("notransaksi", $notransaksi);
        $this->db->limit(1);
        $dt = $this->db->update("emr_askepigd", $dataawal);
    return array("sukses" => $dt);
}


public function askep_savenyeri() {
    $no_rm = $this->input->get('no_rm');
    $notransaksi = $this->input->get('notransaksi');

    $dataawal = array(
        'no_rm' => $no_rm,
        'notransaksi' => $notransaksi,

        'nyeri' => $this->input->get("nyeri"),
        'sifat' => $this->input->get("sifat"),
        'kualitasnyeri' => $this->input->get("kualitasnyeri"),
        'menjalar' => $this->input->get("menjalar"),
        'menjalartext' => $this->input->get("menjalartext"),

        'skornyeri' => $this->input->get("skornyeri"),

        'frekuensi' => $this->input->get("frekuensi"),
        'mempengaruhi' => $this->input->get("mempengaruhi"),
        'kesadaranfisik' => $this->input->get("kesadaranfisik"),

        'wajah' => $this->input->get("wajah"),
        'kaki' => $this->input->get("kaki"),
        'aktifitas' => $this->input->get("aktifitas"),
        'menangis' => $this->input->get("menangis"),
        'bersuara' => $this->input->get("bersuara"),

        'pencetus' => $this->input->get("pencetus"),
        'kualitasskrining' => $this->input->get("kualitasskrining"),
        'lokasi' => $this->input->get("lokasi"),
        'skalanyeri' => $this->input->get("skalanyeri"),
        'lamanyeri' => $this->input->get("lamanyeri"),


        'lab' => $this->input->get("lab"),
        'rad' => $this->input->get("rad"),
        'ekg' => $this->input->get("ekg"),
        'penunjanglain' => $this->input->get("penunjanglain"),
        'diagnosakerja' => $this->input->get("diagnosakerja"),



        'user2' => $this->session->userdata("nmuser"),
        'lastlogin' => date("Y-m-d H:i:s")
    );   
        $this->db->where("no_rm", $no_rm);
        $this->db->where("notransaksi", $notransaksi);
        $this->db->limit(1);
        $dt = $this->db->update("emr_askepigd", $dataawal);
    return array("sukses" => $dt);
}

public function askep_savejatuh() {
    $no_rm = $this->input->get('no_rm');
    $notransaksi = $this->input->get('notransaksi');

    $dataawal = array(
        'no_rm' => $no_rm,
        'notransaksi' => $notransaksi,

        'resikojatuhdewasa' => $this->input->get("resikojatuhdewasa"),
        'resikojatuhanak' => $this->input->get("resikojatuhanak"),
        'hasilskrinning' => $this->input->get("hasilskrinning"),
        'saran' => $this->input->get("saran"),
       
        'user2' => $this->session->userdata("nmuser"),
        'lastlogin' => date("Y-m-d H:i:s")
    );   
        $this->db->where("no_rm", $no_rm);
        $this->db->where("notransaksi", $notransaksi);
        $this->db->limit(1);
        $dt = $this->db->update("emr_askepigd", $dataawal);
    return array("sukses" => $dt);
}


public function askep_savegizi() {
    $no_rm = $this->input->get('no_rm');
    $notransaksi = $this->input->get('notransaksi');

    $dataawal = array(
        'no_rm' => $no_rm,
        'notransaksi' => $notransaksi,

        'bbgizi' => $this->input->get("bbgizi"),
        'tbgizi' => $this->input->get("tbgizi"),
        'imtgizi' => $this->input->get("imtgizi"),

        'kurusgizi' => $this->input->get("kurusgizi"),
        'naikturunberatgizi' => $this->input->get("naikturunberatgizi"),
        'asupangizi' => $this->input->get("asupangizi"),

        'hasilgizi' => $this->input->get("hasilgizi"),
        'sarangizi' => $this->input->get("sarangizi"),
       
        'user2' => $this->session->userdata("nmuser"),
        'lastlogin' => date("Y-m-d H:i:s")
    );   
        $this->db->where("no_rm", $no_rm);
        $this->db->where("notransaksi", $notransaksi);
        $this->db->limit(1);
        $dt = $this->db->update("emr_askepigd", $dataawal);
    return array("sukses" => $dt);
}

public function askep_savefungsi() {
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
        $dt = $this->db->update("emr_askepigd", $dataawal);
    return array("sukses" => $dt);
}

public function ObatSaatMasuk() {
    $notransaksi = $this->input->get("notransaksi");
    $no_rm = $this->input->get("no_rm");
    $this->db->from("emr_rekonsiliasiobat");
    $this->db->where("notransaksi", $notransaksi);
    $this->db->where("no_rm", $no_rm);
    $this->db->where("jenis", 1);
    $data = $this->db->get();
    return $data->result();
}

public function ObatSaatPindah() {
    $notransaksi = $this->input->get("notransaksi");
    $no_rm = $this->input->get("no_rm");
    $this->db->from("emr_rekonsiliasiobat");
    $this->db->where("notransaksi", $notransaksi);
    $this->db->where("no_rm", $no_rm);
    $this->db->where("jenis", 2);
    // $this->db->limit(1);
    $data = $this->db->get();
    return $data->result();
}

public function ObatSaatPulang() {
    $notransaksi = $this->input->get("notransaksi");
    $no_rm = $this->input->get("no_rm");
    $this->db->from("emr_rekonsiliasiobat");
    $this->db->where("notransaksi", $notransaksi);
    $this->db->where("no_rm", $no_rm);
    $this->db->where("jenis", 3);
    // $this->db->limit(1);
    $data = $this->db->get();
    return $data->result();
}

public function loaddataresep() {
    $notransaksi = $this->input->get("notransaksi");
    $no_rm = $this->input->get("no_rm");
    $this->db->select("resep_detail.kodeobat as kodeobat, resep_detail.namaobat as namaobat, resep_detail.pagi as pagi, resep_detail.siang as siang, resep_detail.malam as malam, resep_detail.keterangan as keterangan, resep_detail.caramakan as caramakan, resep_header.notraksaksi as notransaksi");
    $this->db->from("resep_detail");
	$this->db->join("resep_header", "resep_header.noresep = resep_detail.noresep");
    $this->db->where("resep_header.no_rm", $no_rm);
    $this->db->where("resep_header.notraksaksi", $notransaksi);
    $this->db->group_by("resep_detail.kodeobat");
    $this->db->order_by("resep_header.tglresep", 'DESC');
    $dataresep = $this->db->get();

    foreach ($dataresep->result() as $row) {
        $aturanpakai='';
        $ss=$row->pagi;
        if ($row->pagi != '') {
            $aturanpakai = $aturanpakai.' '.'Pagi : ' . $row->pagi;
        }
        if ($row->siang != '') {
            $aturanpakai = $aturanpakai.' '.'Siang : ' . $row->siang;
        }
        if ($row->malam != '') {
            $aturanpakai = $aturanpakai.' '.'Malam : ' . $row->malam;
        }
        if ($row->keterangan != '') {
            $aturanpakai = $aturanpakai.' '.$row->keterangan;
        }
        if ($row->caramakan != '') {
            $aturanpakai = $aturanpakai.' '.$row->caramakan.' Makan';
        }

        //cek dulu apakah sudah ada
        $kodeobat=$row->kodeobat;
        $this->db->select("id");
		$this->db->from("emr_rekonsiliasiobat");
		$this->db->where("no_rm", $no_rm);
		$this->db->where("notransaksi", $notransaksi);
		$this->db->where("kode_obat", $kodeobat);
		$this->db->where("jenis", 2);
		$this->db->limit(1);
		$query = $this->db->get();
		$dtheader=$query->row();
		$num_rows = $query->num_rows();
        if ($num_rows > 0) {
            //data sdh ada 
        } else {
            $datasave = array(
                'no_rm' => $no_rm,
                'notransaksi' => $row->notransaksi,
                'jenis' => 2,
                'kode_obat' => $row->kodeobat,
                'nama_obat' =>$row->namaobat,
                'aturanpakai' => $aturanpakai,
                'user' => $this->session->userdata("nmuser"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s")
            );
            $this->db->insert("emr_rekonsiliasiobat", $datasave);
        }    
    }
}

public function loaddatareseppulang() {
    $notransaksi = $this->input->get("notransaksi");
    $no_rm = $this->input->get("no_rm");
    $this->db->select("resep_detail.kodeobat as kodeobat, resep_detail.namaobat as namaobat, resep_detail.pagi as pagi, resep_detail.siang as siang, resep_detail.malam as malam, resep_detail.keterangan as keterangan, resep_detail.caramakan as caramakan, resep_header.notraksaksi as notransaksi");
    $this->db->from("resep_detail");
	$this->db->join("resep_header", "resep_header.noresep = resep_detail.noresep");
    $this->db->where("resep_header.no_rm", $no_rm);
    $this->db->where("resep_header.notraksaksi", $notransaksi);
    $this->db->group_by("resep_detail.kodeobat");
    $this->db->order_by("resep_header.tglresep", 'DESC');
    $dataresep = $this->db->get();

    foreach ($dataresep->result() as $row) {
        $aturanpakai='';
        $ss=$row->pagi;
        if ($row->pagi != '') {
            $aturanpakai = $aturanpakai.' '.'Pagi : ' . $row->pagi;
        }
        if ($row->siang != '') {
            $aturanpakai = $aturanpakai.' '.'Siang : ' . $row->siang;
        }
        if ($row->malam != '') {
            $aturanpakai = $aturanpakai.' '.'Malam : ' . $row->malam;
        }
        if ($row->keterangan != '') {
            $aturanpakai = $aturanpakai.' '.$row->keterangan;
        }
        if ($row->caramakan != '') {
            $aturanpakai = $aturanpakai.' '.$row->caramakan.' Makan';
        }

        //cek dulu apakah sudah ada
        $kodeobat=$row->kodeobat;
        $this->db->select("id");
		$this->db->from("emr_rekonsiliasiobat");
		$this->db->where("no_rm", $no_rm);
		$this->db->where("notransaksi", $notransaksi);
		$this->db->where("kode_obat", $kodeobat);
		$this->db->where("jenis", 3);
		$this->db->limit(1);
		$query = $this->db->get();
		$dtheader=$query->row();
		$num_rows = $query->num_rows();
        if ($num_rows > 0) {
            //data sdh ada 
        } else {
            $datasave = array(
                'no_rm' => $no_rm,
                'notransaksi' => $row->notransaksi,
                'jenis' => 3,
                'kode_obat' => $row->kodeobat,
                'nama_obat' =>$row->namaobat,
                'aturanpakai' => $aturanpakai,
                'user' => $this->session->userdata("nmuser"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s")
            );
            $this->db->insert("emr_rekonsiliasiobat", $datasave);
        }    
    }
}

public function updateDataobatrekon($id, $tindakLanjut, $perubahan) {
    // Lakukan proses update sesuai dengan data yang diterima dari controller
    $data = array(
        'tindaklanjut' => $tindakLanjut,
        'perubahan' => $perubahan
    );

    $this->db->where('id', $id); // Sesuaikan dengan nama kolom ID di tabel
    return $this->db->update('emr_rekonsiliasiobat', $data);
}


public function simpanobatmasuk() {
	$no_rm = $this->input->get('no_rm');
	$notransaksi = $this->input->get('notransaksi');
	$jenis = 1;
	$namaobat = $this->input->get('namaobat');
	$aturanpakai = $this->input->get('aturanpakai');
	$tindaklanjut = $this->input->get('tindaklanjut');
	$tindaklanjuttext = $this->input->get('tindaklanjuttext');
	$perubahan = $this->input->get('perubahan');
    $datacek = array(
        'no_rm' => $no_rm,
        'notransaksi' => $notransaksi,
        'jenis' => $jenis,
        'kode_obat' => '',
        'nama_obat' => $namaobat,
        'aturanpakai' => $aturanpakai,
        'tindaklanjut' => $tindaklanjut,
        'tindaklanjuttext' => $tindaklanjuttext,
        'perubahan' => $perubahan,
        'user' => $this->session->userdata("nmuser"),
        'user2' => $this->session->userdata("nmuser"),
        'lastlogin' => date("Y-m-d H:i:s")
    );
    $dt=$this->db->insert("emr_rekonsiliasiobat", $datacek);
    return array("sukses" => $dt);
}

public function hapusobatmasuk() {
    $id = $this->input->get("id");
    $this->db->where('id', $id);
    $this->db->limit(1);
    $dt = $this->db->delete('emr_rekonsiliasiobat');
    return array("sukses" => $dt);
}

public function hapusobatpindah() {
    $id = $this->input->get("id");
    $this->db->where('id', $id);
    $this->db->limit(1);
    $dt = $this->db->delete('emr_rekonsiliasiobat');
    return array("sukses" => $dt);
}

public function hapusobatpulang() {
    $id = $this->input->get("id");
    $this->db->where('id', $id);
    $this->db->limit(1);
    $dt = $this->db->delete('emr_rekonsiliasiobat');
    return array("sukses" => $dt);
}

public function panggildatapersalinan() {
    $notransaksi = $this->input->get("notransaksi");
    $no_rm = $this->input->get("no_rm");

    $this->db->select("id");
    $this->db->from("emr_persalinan");
    $this->db->where("no_rm", $no_rm);
    $this->db->where("notransaksi", $notransaksi);
    $this->db->limit(1);
    $cari = $this->db->get();
    $dtheader=$cari->row();
    $num_rows = $cari->num_rows();
    if ($num_rows == 0) {
        $datapersalinan = array(
            'no_rm' => $no_rm,
            'notransaksi' => $notransaksi,
            'user' => $this->session->userdata("nmuser"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );
        $this->db->insert("emr_persalinan", $datapersalinan);
    }
    //panggil

        $this->db->from(" emr_persalinan");
        $this->db->where("no_rm",$no_rm);
        $this->db->where("notransaksi",$notransaksi);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query) {
            return $query->row();
        } else {
            // Tangani kesalahan database di sini
            return array(); // atau kembalikan pesan kesalahan
        }
   
}

public function simpandatapersalinan() {
    $no_rm = $this->input->get('no_rm');
    $notransaksi = $this->input->get('notransaksi');

    $dataawal = array(
        'no_rm' => $no_rm,
        'notransaksi' => $notransaksi,
        'namasuami' => $this->input->get("namasuami"),
        'masukkarena' => $this->input->get("masukkarena"),
        'masuksejak' => $this->input->get("masuksejak"),
        'lendirdarah' => $this->input->get("lendirdarah"),
        'ketuban' => $this->input->get("ketuban"),
        'jantung' => $this->input->get("jantung"),
        'tekanan' => $this->input->get("tekanan"),
        'nadi' => $this->input->get("nadi"),
        'suhu' => $this->input->get("suhu"),
        'pernapasan' => $this->input->get("pernapasan"),
        'oedem' => $this->input->get("oedem"),
        'fundusi' => $this->input->get("fundusi"),
        'situsanak' => $this->input->get("situsanak"),
        'posisi' => $this->input->get("posisi"),
        'bagiandepan' => $this->input->get("bagiandepan"),
        'dda' => $this->input->get("dda"),
        'gemeli' => $this->input->get("gemeli"),
        'gerakan' => $this->input->get("gerakan"),
        'kalapembukaan' => $this->input->get("kalapembukaan"),
        'kalapengeluaran' => $this->input->get("kalapengeluaran"),
        'kalauritgl' => $this->input->get("kalauritgl"),
        'kalaurijam' => $this->input->get("kalaurijam"),
        'pendarahan' => $this->input->get("pendarahan"),
        'sebab' => $this->input->get("sebab"),
        'plasenta' => $this->input->get("plasenta"),
        'talipusat' => $this->input->get("talipusat"),
        'kala4tgl' => $this->input->get("kala4tgl"),
        'kala4jam' => $this->input->get("kala4jam"),
        'pendarahan4' => $this->input->get("pendarahan4"),
        'jumlah4' => $this->input->get("jumlah4"),
        'robekan' => $this->input->get("robekan"),
        'kontraksi' => $this->input->get("kontraksi"),
        'tinggi' => $this->input->get("tinggi"),
        'tekanan4' => $this->input->get("tekanan4"),
        'nadi4' => $this->input->get("nadi4"),
        'pernapasan4' => $this->input->get("pernapasan4"),
        'suhu4' => $this->input->get("suhu4"),
        'petugaspersalinan' => $this->input->get("petugaspersalinan"),
        'user' => $this->session->userdata("nmuser"),
        'user2' => $this->session->userdata("nmuser"),
        'lastlogin' => date("Y-m-d H:i:s")
    );   
        $this->db->where("no_rm", $no_rm);
        $this->db->where("notransaksi", $notransaksi);
        $this->db->limit(1);
        $dt = $this->db->update("emr_persalinan", $dataawal);
    return array("sukses" => $dt);
}

public function panggilresikojatuh($no_rm,$notransaksi) {
    // $this->db->select("id");
    // $this->db->from("emr_resikojatuh");
    // $this->db->where("no_rm", $no_rm);
    // $this->db->where("notransaksi", $notransaksi);
    // $this->db->limit(1);
    // $cari = $this->db->get();
    // $num_rows = $cari->num_rows();
    // if ($num_rows == 0) {
    //     $datajatuh = array(
    //         'no_rm' => $no_rm,
    //         'notransaksi' => $notransaksi,
    //         'user' => $this->session->userdata("nmuser"),
    //         'user2' => $this->session->userdata("nmuser"),
    //         'lastlogin' => date("Y-m-d H:i:s")
    //     );
    //     $this->db->insert("emr_resikojatuh", $datajatuh);
    // }

    $this->db->from("emr_resikojatuh");
    $this->db->where('no_rm', $no_rm);
    $this->db->where('notransaksi', $notransaksi);
    // $this->db->limit(1);
    $data = $this->db->get();
    return $data->result();
}

public function hapusresikojatuhranap() {
    $id = $this->input->get("id");
    $this->db->where('id', $id);
    $this->db->limit(1);
    $dt = $this->db->delete('emr_resikojatuh');
    return $dt;
}

public function ambildataresiko($id) {
    $this->db->from("emr_resikojatuh");
    $this->db->where('id', $id);
    $this->db->limit(1);
    $data = $this->db->get();
    return $data->row();
}

public function panggildatagiziranap($no_rm,$notransaksi) {
    $this->db->select("id");
    $this->db->from("emr_giziranap");
    $this->db->where("no_rm", $no_rm);
    $this->db->where("notransaksi", $notransaksi);
    $this->db->limit(1);
    $cari = $this->db->get();
    $num_rows = $cari->num_rows();
    if ($num_rows == 0) {
        $datajatuh = array(
            'no_rm' => $no_rm,
            'notransaksi' => $notransaksi,
            'user' => $this->session->userdata("nmuser"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );
        $this->db->insert("emr_giziranap", $datajatuh);
    }

    $this->db->from("emr_giziranap");
    $this->db->where('no_rm', $no_rm);
    $this->db->where('notransaksi', $notransaksi);
    $this->db->limit(1);
    $data = $this->db->get();
    return $data->row();
}

public function simpangiziranap() {
    $no_rm = $this->input->get('no_rm');
    $notransaksi = $this->input->get('notransaksi');
    $dataawal = array(
        'resikogizi' => $this->input->get("resikogizi"),
        'kondisikhusus' => $this->input->get("kondisikhusus"),
        'bb' => $this->input->get("bb"),
        'tb' => $this->input->get("tb"),
        'imt' => $this->input->get("imt"),
        'jk' => $this->input->get("jk"),
        'bbi' => $this->input->get("bbi"),
        'umur' => $this->input->get("umur"),
        'lila' => $this->input->get("lila"),
        'lilapersen' => $this->input->get("lilapersen"),
        'penurunanbb' => $this->input->get("penurunanbb"),
        'statusgizi' => $this->input->get("statusgizi"),
        'databiokimia' => $this->input->get("databiokimia"),
        'datafisik' => $this->input->get("datafisik"),
        'alergimakanan' => $this->input->get("alergimakanan"),
        'riwayatobat' => $this->input->get("riwayatobat"),
        'kebiasaanmakan' => $this->input->get("kebiasaanmakan"),
        'hasilrecall' => $this->input->get("hasilrecall"),
        'ee' => $this->input->get("ee"),
        'pp' => $this->input->get("pp"),
        'll' => $this->input->get("ll"),
        'kh' => $this->input->get("kh"),
        'riwayatkeluarga' => $this->input->get("riwayatkeluarga"),
        'riwayatpenyakit' => $this->input->get("riwayatpenyakit"),
        'diagnosagizi' => $this->input->get("diagnosagizi"),
        'pemberian' => $this->input->get("pemberian"),
        'konsistensi' => $this->input->get("konsistensi"),
        'terapi' => $this->input->get("terapi"),
        'energi' => $this->input->get("energi"),
        'protein' => $this->input->get("protein"),
        'lemak' => $this->input->get("lemak"),
        'karbo' => $this->input->get("karbo"),
        'konseling' => $this->input->get("konseling"),
        'evaluasi' => $this->input->get("evaluasi"),
        'user2' => $this->session->userdata("nmuser"),
        'lastlogin' => date("Y-m-d H:i:s")
    );   
        $this->db->where("no_rm", $no_rm);
        $this->db->where("notransaksi", $notransaksi);
        $this->db->limit(1);
        $dt = $this->db->update("emr_giziranap", $dataawal);
    return array("sukses" => $dt);
}


public function panggilresumeranap($no_rm,$notransaksi) {
    $this->db->select("id");
    $this->db->from(" emr_resume_ranap");
    $this->db->where("no_rm", $no_rm);
    $this->db->where("notransaksi", $notransaksi);
    $this->db->limit(1);
    $cari = $this->db->get();
    $num_rows = $cari->num_rows();
    if ($num_rows == 0) {
        $datajatuh = array(
            'no_rm' => $no_rm,
            'notransaksi' => $notransaksi,
            'user' => $this->session->userdata("nmuser"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );
        $this->db->insert(" emr_resume_ranap", $datajatuh);
    }

    $this->db->from(" emr_resume_ranap");
    $this->db->where('no_rm', $no_rm);
    $this->db->where('notransaksi', $notransaksi);
    $this->db->limit(1);
    $data = $this->db->get();
    return $data->row();
}

public function panggilcetakresumeranap($no_rm,$notransaksi) {
    $this->db->from(" emr_resume_ranap");
    $this->db->where('no_rm', $no_rm);
    $this->db->where('notransaksi', $notransaksi);
    $this->db->limit(1);
    $data = $this->db->get();
    return $data->row();
}


public function penggilaskepRanap($no_rm,$notransaksi) {    
    $this->db->select("id");
    $this->db->from(" emr_askepranap");
    $this->db->where("no_rm", $no_rm);
    $this->db->where("notransaksi", $notransaksi);
    $this->db->limit(1);
    $cari = $this->db->get();
    $num_rows = $cari->num_rows();
    if ($num_rows == 0) {
        $datatriase = array(
            'no_rm' => $no_rm,
            'notransaksi' => $notransaksi,
            'user' => $this->session->userdata("nmuser"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );
        $this->db->insert(" emr_askepranap", $datatriase);
    }

    $this->db->from(" emr_askepranap");
    $this->db->where("no_rm",$no_rm);
    $this->db->where("notransaksi",$notransaksi);
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query) {
        return $query->row();
    } else {
        // Tangani kesalahan database di sini
        return array(); // atau kembalikan pesan kesalahan
    }
}
// ===== end of models ======

public function simpanRanapRiwayat() {
    $no_rm = $this->input->get('no_rm');
    $notransaksi = $this->input->get('notransaksi');

    $dataawal = array(
        'riwayatsekarang' => $this->input->get("riwayatsekarang"),
        'penyakitdahulu' => $this->input->get("penyakitdahulu"),
        'user2' => $this->session->userdata("nmuser"),
        'lastlogin' => date("Y-m-d H:i:s")
    );   
        $this->db->where("no_rm", $no_rm);
        $this->db->where("notransaksi", $notransaksi);
        $this->db->limit(1);
        $dt = $this->db->update("emr_askepranap", $dataawal);
    return array("sukses" => $dt);
}

public function simpanRanapImunisasi() {
    $no_rm = $this->input->get('no_rm');
    $notransaksi = $this->input->get('notransaksi');

    $dataawal = array(
        'bcg' => $this->input->get("bcg"),
        'polio' => $this->input->get("polio"),
        'dpt' => $this->input->get("dpt"),
        'campak' => $this->input->get("campak"),
        'hepatitisb' => $this->input->get("hepatitisb"),
        'user2' => $this->session->userdata("nmuser"),
        'lastlogin' => date("Y-m-d H:i:s")
    );   
        $this->db->where("no_rm", $no_rm);
        $this->db->where("notransaksi", $notransaksi);
        $this->db->limit(1);
        $dt = $this->db->update("emr_askepranap", $dataawal);
    return array("sukses" => $dt);
}

public function simpanPersalinanRanap() {
    $no_rm = $this->input->get('no_rm');
    $notransaksi = $this->input->get('notransaksi');
    $dataawal = array(
        'caramelahirkan' => $this->input->get("caramelahirkan"),
        'tolongoleh' => $this->input->get("tolongoleh"),
        'bb' => $this->input->get("bb"),
        'pb' => $this->input->get("pb"),
        'operasi' => $this->input->get("operasi"),
        'operasitext' => $this->input->get("operasitext"),
        'transfusi' => $this->input->get("transfusi"),
        'transfusitext' => $this->input->get("transfusitext"),
        'user2' => $this->session->userdata("nmuser"),
        'lastlogin' => date("Y-m-d H:i:s")
    );   
        $this->db->where("no_rm", $no_rm);
        $this->db->where("notransaksi", $notransaksi);
        $this->db->limit(1);
        $dt = $this->db->update("emr_askepranap", $dataawal);
    return array("sukses" => $dt);
}

public function simpanFisikRanap() {
    $no_rm = $this->input->get('no_rm');
    $notransaksi = $this->input->get('notransaksi');
    $dataawal = array(
        'kesadaranfisik' => $this->input->get("kesadaranfisik"),
        'keadaanumum' => $this->input->get("keadaanumum"),
        'beratbadan' => $this->input->get("beratbadan"),
        'td_fisik' => $this->input->get("td_fisik"),
        'hr_fisik' => $this->input->get("hr_fisik"),
        'rr_fisik' => $this->input->get("rr_fisik"),
        'kepala' => $this->input->get("kepala"),
        'kepalatext' => $this->input->get("kepalatext"),
        'mata' => $this->input->get("mata"),
        'matatext' => $this->input->get("matatext"),
        'tht' => $this->input->get("tht"),
        'thttext' => $this->input->get("thttext"),
        'mulut' => $this->input->get("mulut"),
        'muluttext' => $this->input->get("muluttext"),
        'leher' => $this->input->get("leher"),
        'lehertext' => $this->input->get("lehertext"),
        'thorax' => $this->input->get("thorax"),
        'thoraxtext' => $this->input->get("thoraxtext"),
        'abdomen' => $this->input->get("abdomen"),
        'abdomentext' => $this->input->get("abdomentext"),
        'kepala' => $this->input->get("kepala"),
        'kepalatext' => $this->input->get("kepalatext"),
        'urogenital' => $this->input->get("urogenital"),
        'urogenitaltext' => $this->input->get("urogenitaltext"),
        'ekstermitas' => $this->input->get("ekstermitas"),
        'ekstermitasatas' => $this->input->get("ekstermitasatas"),
        'ekstermitasbawah' => $this->input->get("ekstermitasbawah"),
        'kulit' => $this->input->get("kulit"),
        'kulitturgor' => $this->input->get("kulitturgor"),
        'kulitluka' => $this->input->get("kulitluka"),
        'jantung' => $this->input->get("jantung"),
        'jantungnyeri' => $this->input->get("jantungnyeri"),
        'jantungbunyi' => $this->input->get("jantungbunyi"),
        'user2' => $this->session->userdata("nmuser"),
        'lastlogin' => date("Y-m-d H:i:s")
    );   
        $this->db->where("no_rm", $no_rm);
        $this->db->where("notransaksi", $notransaksi);
        $this->db->limit(1);
        $dt = $this->db->update("emr_askepranap", $dataawal);
    return array("sukses" => $dt);
}


public function simpanRanapAlergi() {
    $no_rm = $this->input->get('no_rm');
    $notransaksi = $this->input->get('notransaksi');

    $dataawal = array(
        'alergi' => $this->input->get("alergi"),
        'obat' => $this->input->get("obat"),
        'makanan' => $this->input->get("makanan"),
        'lainnya' => $this->input->get("lainnya"),
        'user2' => $this->session->userdata("nmuser"),
        'lastlogin' => date("Y-m-d H:i:s")
    );   
        $this->db->where("no_rm", $no_rm);
        $this->db->where("notransaksi", $notransaksi);
        $this->db->limit(1);
        $dt = $this->db->update("emr_askepranap", $dataawal);
    return array("sukses" => $dt);
}

public function panggilDataInfeksi($no_rm,$notransaksi) {
    $this->db->from("emr_infeksi_alat");
    $this->db->where('no_rm', $no_rm);
    $this->db->where('notransaksi', $notransaksi);
    $data = $this->db->get();
    return $data->result();
}

public function panggilDataInfeksiOperasi($no_rm,$notransaksi) {
    $this->db->from("emr_infeksi_operasi");
    $this->db->where('no_rm', $no_rm);
    $this->db->where('notransaksi', $notransaksi);
    $data = $this->db->get();
    return $data->result();
}


public function simpaninfeksi() {
    $datasave = array(
        'no_rm' => $this->input->get('no_rm'),
        'notransaksi' => $this->input->get('notransaksi'),
        'kode_unit' => $this->input->get('unitselect'),
        'nama_unit' => $this->input->get('nama_unit'),
        'tindakan' => $this->input->get('tindakan'),
        'nama_tindakan' => $this->input->get('nama_tindakan'),
        'tglpasang' => $this->input->get('tglpasang'),
        'tgllepas' => $this->input->get('tgllepas'),
        'hari' => $this->input->get('hari'),
        'jenisinfeksi' => $this->input->get('jenisinfeksi'),
        'tglinfeksi' => $this->input->get('tglinfeksi'),
        't1' => $this->input->get('satu'),
        't2' => $this->input->get('dua'),
        't3' => $this->input->get('tiga'),
        't4' => $this->input->get('empat'),
        't5' => $this->input->get('lima'),
        'keterangan' => $this->input->get('keterangan'),
        'umur' => $this->input->get('umurtahun'),
        'user' => $this->session->userdata("nmuser"),
        'user2' => $this->session->userdata("nmuser"),
        'lastlogin' => date("Y-m-d H:i:s")
    );   
    $dt =$this->db->insert("emr_infeksi_alat", $datasave);
    return array("sukses" => $dt);
}

public function updateinfeksi() {
    $datasave = array(
        'kode_unit' => $this->input->get('unitselect'),
        'nama_unit' => $this->input->get('nama_unit'),
        'tindakan' => $this->input->get('tindakan'),
        'nama_tindakan' => $this->input->get('nama_tindakan'),
        'tglpasang' => $this->input->get('tglpasang'),
        'tgllepas' => $this->input->get('tgllepas'),
        'hari' => $this->input->get('hari'),
        'jenisinfeksi' => $this->input->get('jenisinfeksi'),
        'tglinfeksi' => $this->input->get('tglinfeksi'),
        't1' => $this->input->get('satu'),
        't2' => $this->input->get('dua'),
        't3' => $this->input->get('tiga'),
        't4' => $this->input->get('empat'),
        't5' => $this->input->get('lima'),
        'keterangan' => $this->input->get('keterangan'),
        'umur' => $this->input->get('umurtahun'),
        'user2' => $this->session->userdata("nmuser"),
        'lastlogin' => date("Y-m-d H:i:s")
    );   
        $this->db->where("id",  $this->input->get('tambahedit'));
        $this->db->limit(1);
        $dt = $this->db->update("emr_infeksi_alat", $datasave);
        return array("sukses" => $dt);
}

public function hapusinfeksi($id) {
    $this->db->where('id', $id);
    $this->db->limit(1);
    $dt = $this->db->delete('emr_infeksi_alat');
    return $dt;
}

public function dataAlatInvasiveId($id) {
    $this->db->from("emr_infeksi_alat");
    $this->db->where('id', $id);
    $this->db->limit(1);
    $data = $this->db->get();
    return $data->row();
}


public function simpanoprIDO() {
    $datasave = array(
        'no_rm' => $this->input->get('no_rm'),
        'notransaksi' => $this->input->get('notransaksi'),
        'tgloperasi' => $this->input->get('tgloperasi'),
        'nama_operasi' => $this->input->get('nama_operasi'),
        'sifat' => $this->input->get('sifat'),
        'sifattext' => $this->input->get('sifattext'),
        'diagnosa' => $this->input->get('diagnosa'),
        'kategori' => $this->input->get('kategori'),
        'kategoritext' => $this->input->get('kategoritext'),
        'durasi' => $this->input->get('durasi'),
        'durasitext' => $this->input->get('durasitext'),
        'skorasa' => $this->input->get('skorasa'),
        'skorasatext' => $this->input->get('skorasatext'),
        'jenisanastesi' => $this->input->get('jenisanastesi'),
        'antibiotik' => $this->input->get('antibiotik'),
        'waktuberi' => $this->input->get('waktuberi'),
        'tglido' => $this->input->get('tglido'),
        'user' => $this->session->userdata("nmuser"),
        'user2' => $this->session->userdata("nmuser"),
        'lastlogin' => date("Y-m-d H:i:s")
    );   
    $dt =$this->db->insert("emr_infeksi_operasi", $datasave);
    return array("sukses" => $dt);
}

public function panggilDataOperasiIDO($no_rm,$notransaksi) {
    $this->db->from("emr_infeksi_operasi");
    $this->db->where('no_rm', $no_rm);
    $this->db->where('notransaksi', $notransaksi);
    $data = $this->db->get();
    return $data->result();
}

public function hapusoprido($id) {
    $this->db->where('id', $id);
    $this->db->limit(1);
    $dt = $this->db->delete('emr_infeksi_operasi');
    return $dt;
}

public function caripasienoperasi($tglperiksa) {    

}


}
