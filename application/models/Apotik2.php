<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apotik extends CI_Model {
	
	public function fullpelayanan() {
		$this->db->from("agama");
		$data = $this->db->get();
		return $data->result();
	}

	public function ambillistresep() {
	    $this->db->select('');
	    $this->db->from('resep_header');
        $data = $this->db->get();
        return $data->result();
    }

    public function hapusresepdarilist() {
        $id = $this->input->get("id");

        $this->db->select("idnoresep, noresep");
		$this->db->from("resep_header");
		$this->db->where('idnoresep', $id);
        $databasic = $this->db->get();
        $datasinggle = $databasic->row();

        $this->db->select("idnoresep");
		$this->db->from("resep_detail");
		$this->db->where('noresep', $datasinggle->noresep);
        $datadetail = $this->db->count_all_results();
        
        if ($datadetail == 0) {
			$this->db->where('idnoresep', $id);
            $dt = $this->db->delete('resep_header');
            
            return $dt;
        } else {
            return false;
        }
    }


    public function pencarianrm_old_ok() {
        $no = $this->input->get("rm");
        $this->db->select("pasien.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.no_askes as no_askes, register_detail.nama_unit as nama_unit, register_detail.kode_unit as kode_unit, register.golongan as golongan, register_detail.kode_unitR as kode_unitR, register_detail.nama_unitR as nama_unitR, register_detail.notransaksi as notransaksi");
        $this->db->from("register");
        $this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
        $this->db->join("pasien", "pasien.no_rm = register_detail.no_rm");
        $this->db->where("register_detail.no_rm", $no);
        $this->db->where("register_detail.statuskeluar", "0");
        $data = $this->db->get();
        return $data->result();
    }

    // dimodifikasi krn tdk bisa memanggil pasien yg sudah pulang

    public function pencarianrm() {
        $no = $this->input->get("rm");
        // cari di register nomor paling terakhir posisi idnya untuk mengambil nomor transaksi
        $qry2=$this->db->query("SELECT notransaksi FROM register where no_rm = '$no' order by id DESC LIMIT 1");
		foreach ($qry2->result_array() as $brs2) {
			$notransaksi=$brs2['notransaksi'];
        }            
        
        $this->db->select("pasien.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.no_askes as no_askes, register_detail.nama_unit as nama_unit, register_detail.kode_unit as kode_unit, register.golongan as golongan, register_detail.kode_unitR as kode_unitR, register_detail.nama_unitR as nama_unitR, register_detail.notransaksi as notransaksi");
        $this->db->from("register");
        $this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
        $this->db->join("pasien", "pasien.no_rm = register_detail.no_rm");
        if ( $notransaksi <> null ) {
            $this->db->where("register_detail.no_rm", $no);
            $this->db->where("register.notransaksi", $notransaksi);
        } else {
            $this->db->where("register_detail.statuskeluar", "0");
        }
        $data = $this->db->get();
        return $data->result();
    }

    public function ambildetail($id) {
        $this->db->select("namaobat, satuanpakai, qty, hargapakai, tuslag, jumlah, dosis, noninacbg, idnoresep, proses, pagi, siang, malam, takaran, caramakan, keterangan, pendanaan ");
        $this->db->from("resep_detail");
        $this->db->where("noresep", $id);
        $data = $this->db->get();
        return $data->result();
    }

    public function ambilnoresep() {
        $tgl = date("Y-m-d");
        $this->db->from("mresepnumber");
        $this->db->where("tgltransaksi", $tgl);
        $this->db->limit(1);
        $data = $this->db->get();
        if ($data->result() == NULL) {
            $numstart = 1;
            $numdate = str_replace("-", "", $tgl);
            $numend = sprintf("%05d", $numstart);
            $numgabung = "AP" . substr($numdate, 2) . $numend;
            return array($tgl, $numstart, $numgabung);
        } else {
            $t = $data->row();
            $numstart = $t->no + 1;
            $numdate = str_replace("-", "", $tgl);
            $numend = sprintf("%05d", $numstart);
            $numgabung = "AP" . substr($numdate, 2) . $numend;
            return array($tgl, $numstart, $numgabung);
        }
    }

    public function simpanresep($dtnotrans) {
        // $tgl = date("Y-m-d");
        $date = date_create($this->input->get("tglresep"));
		$tgl = date_format($date,"Y-m-d");

        if ($this->input->get("racik") == null) {
            $racik = 0;
        } else {
            $racik = $this->input->get("racik");
        }
        if ($this->input->get("nonracik") == null) {
            $nonracik = 0;
        } else {
            $nonracik = $this->input->get("nonracik");
        }
        $noresep = $this->input->get("norep");
        if ($noresep == "") {
            $headerresep = array(
                'noresep' => $dtnotrans[2],
                'no_rm' => $this->input->get("norm"),
                'rirj' => "",
                'tglresep' => $tgl,
                'kode_unit'  => $this->input->get("unit"),
                'nama_unit' => $this->input->get("unittext"),
                'kode_dokter' => $this->input->get("dokter"),
                'nama_dokter' => $this->input->get("doktertext"),
                'golongan' => $this->input->get("goltext"),
                'idgolongan' => $this->input->get("gol"),
                'nosjp' => $this->input->get("kartu"),
                'notraksaksi' => $this->input->get("sjp"),
                'racik' => $racik,
                'nonracik' => $nonracik,
                'user' => $this->session->userdata("nmuser"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s"),
                'shift' => $this->input->get("shift"),
                'nama_umum' => $this->input->get("nama"),
                'noreg' => "",
                'kode_depo' => $this->input->get("depo"),
                'nama_depo'  => $this->input->get("depotext"),
                'type'  => $this->input->get("tipe")
            );   
            $this->db->insert("resep_header", $headerresep);

            list($kdobat, $idobat) = explode("_", $this->input->get("produk"), 2);
            $detailresep = array(
                'noresep' => $dtnotrans[2],
                'idobat' => $idobat,
                'namaobat' => $this->input->get("produktext"),
                'qty' => $this->input->get("qtypakai"),
                'satuanpakai' => $this->input->get("satpakai"),
                'hargapakai' => $this->input->get("harga"),
                'tuslag' => "0",
                'jumlah' => $this->input->get("qtypakai") * $this->input->get("harga"),
                'dosis' => "",
                'iddetailresep' => "0",
                'user' => $this->session->userdata("nmuser"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s"),
                'noninacbg'  => $this->input->get("noina"),
                'kodeobat' => $kdobat,
                'stokjns' => "",
                'jkd' => "0",
                'pagi' => $this->input->get("pagi"),
                'siang' => $this->input->get("siang"),
                'malam' => $this->input->get("malam"),
                'takaran' => $this->input->get("takaran"),
                'caramakan' => $this->input->get("caramakan"),
                'pendanaan' => $this->input->get("pendanaan"),
                'keterangan' => $this->input->get("keterangan"),
                'proses' => "1"
            );
            $dt = $this->db->insert("resep_detail", $detailresep);

            if ($dtnotrans[1] == 1) {
                $dataubah = array(
                    "tgltransaksi" => $dtnotrans[0],
                    "no" => $dtnotrans[1]
                );
                $this->db->insert('mresepnumber', $dataubah);
            } else {
                $dataubah = array(
                    "tgltransaksi" => $dtnotrans[0],
                    "no" => $dtnotrans[1]
                );
                $this->db->where("tgltransaksi", $dtnotrans[0]);
                $this->db->update('mresepnumber', $dataubah);
            }

            return array("sukses" => $dt, "noresep" => $dtnotrans[2]);

        } else {
            $this->db->from("resep_header");
            $this->db->where("noresep", $noresep);
            $this->db->limit(1);
            $data = $this->db->get();
            if ($data->result() == NULL) {
                $headerresep = array(
                    'noresep' => $dtnotrans[2],
                    'no_rm' => $this->input->get("norm"),
                    'rirj' => "",
                    'tglresep' => $tgl,
                    'kode_unit'  => $this->input->get("unit"),
                    'nama_unit' => $this->input->get("unittext"),
                    'kode_dokter' => $this->input->get("dokter"),
                    'nama_dokter' => $this->input->get("doktertext"),
                    'golongan' => $this->input->get("goltext"),
                    'idgolongan' => $this->input->get("gol"),
                    'nosjp' => $this->input->get("kartu"),
                    'notraksaksi' => $this->input->get("sjp"),
                    'racik' => $racik,
                    'nonracik' => $nonracik,
                    'user' => $this->session->userdata("nmuser"),
                    'user2' => $this->session->userdata("nmuser"),
                    'lastlogin' => date("Y-m-d H:i:s"),
                    'shift' => $this->input->get("shift"),
                    'nama_umum' => $this->input->get("nama"),
                    'noreg' => "",
                    'kode_depo' => "",
                    'nama_depo'  => "",
                    'type'  => $this->input->get("tipe")
                );
                $this->db->insert("resep_header", $headerresep);

                list($kdobat, $idobat) = explode("_", $this->input->get("produk"), 2);
                $detailresep = array(
                    'noresep' => $dtnotrans[2],
                    'idobat' => $idobat,
                    'namaobat' => $this->input->get("produktext"),
                    'qty' => $this->input->get("qtypakai"),
                    'satuanpakai' => $this->input->get("satpakai"),
                    'hargapakai' => $this->input->get("harga"),
                    'tuslag' => "0",
                    'jumlah' => $this->input->get("qtypakai") * $this->input->get("harga"),
                    'dosis' => "",
                    'iddetailresep' => "0",
                    'user' => $this->session->userdata("nmuser"),
                    'user2' => $this->session->userdata("nmuser"),
                    'lastlogin' => date("Y-m-d H:i:s"),
                    'noninacbg'  => $this->input->get("noina"),
                    'kodeobat' => $kdobat,
                    'stokjns' => "",
                    'jkd' => "0",
                    'pagi' => $this->input->get("pagi"),
                    'siang' => $this->input->get("siang"),
                    'malam' => $this->input->get("malam"),
                    'takaran' => $this->input->get("takaran"),
                    'caramakan' => $this->input->get("caramakan"),
                    'keterangan' => $this->input->get("keterangan"),
                    'proses' => "1"
                );
                $dt = $this->db->insert("resep_detail", $detailresep);

                if ($dtnotrans[1] == 1) {
                    $dataubah = array(
                        "tgltransaksi" => $dtnotrans[0],
                        "no" => $dtnotrans[1]
                    );
                    $this->db->insert('mresepnumber', $dataubah);
                } else {
                    $dataubah = array(
                        "tgltransaksi" => $dtnotrans[0],
                        "no" => $dtnotrans[1]
                    );
                    $this->db->where("tgltransaksi", $dtnotrans[0]);
                    $this->db->update('mresepnumber', $dataubah);
                }

                return array("sukses" => $dt, "noresep" => $dtnotrans[2]);
            } else {
                list($kdobat, $idobat) = explode("_", $this->input->get("produk"), 2);
                $detailresep = array(
                    'noresep' => $noresep,
                    'idobat' => $idobat,
                    'namaobat' => $this->input->get("produktext"),
                    'qty' => $this->input->get("qtypakai"),
                    'satuanpakai' => $this->input->get("satpakai"),
                    'hargapakai' => $this->input->get("harga"),
                    'tuslag' => "0",
                    // 'jumlah' => ($this->input->get("qtypakai") * $this->input->get("harga") + $this->input->get("tuslag")),
                    'jumlah' => $this->input->get("qtypakai") * $this->input->get("harga"),
                    'dosis' => "",
                    'iddetailresep' => "0",
                    'user' => $this->session->userdata("nmuser"),
                    'user2' => $this->session->userdata("nmuser"),
                    'lastlogin' => date("Y-m-d H:i:s"),
                    'noninacbg'  => $this->input->get("noina"),
                    'kodeobat' => $kdobat,
                    'stokjns' => "",
                    'jkd' => "0",
                    'pagi' => $this->input->get("pagi"),
                    'siang' => $this->input->get("siang"),
                    'malam' => $this->input->get("malam"),
                    'takaran' => $this->input->get("takaran"),
                    'caramakan' => $this->input->get("caramakan"),
                    'keterangan' => $this->input->get("keterangan"),
                    'proses' => "1"
                );
                $dt = $this->db->insert("resep_detail", $detailresep);

                return array("sukses" => $dt, "noresep" => $noresep);
            }
        }
    }

    // ubah resep

    public function ambileditresepdetail() {
        $id = $this->input->get("id");
        $this->db->from("resep_detail");
        $this->db->where("idnoresep", $id);
        $data = $this->db->get();
        return $data->row();
    }

    public function ubahresep($id) {
        list($kdobat, $idobat) = explode("_", $this->input->get("produk"), 2);
        $detailresep = array(
            'idobat' => $idobat,
            'namaobat' => $this->input->get("produktext"),
            'qty' => $this->input->get("qtypakai"),
            'satuanpakai' => $this->input->get("satpakai"),
            'hargapakai' => $this->input->get("harga"),
            'tuslag' => "0",
            'jumlah' => $this->input->get("qtypakai") * $this->input->get("harga"),
            'dosis' => "-",
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s"),
            'noninacbg'  => $this->input->get("noina"),
            'kodeobat' => $kdobat,
            'pagi' => $this->input->get("pagi"),
            'siang' => $this->input->get("siang"),
            'malam' => $this->input->get("malam"),
            'takaran' => $this->input->get("takaran"),
            'caramakan' => $this->input->get("caramakan"),
            'pendanaan' => $this->input->get("pendanaan"),
            'keterangan' => $this->input->get("keterangan")
        );
        $this->db->where("idnoresep", $id);
        $dt = $this->db->update("resep_detail", $detailresep);

        return array("sukses" => $dt);
    }

    // Hapus detail resep

    public function hapusdetailresep() {
        $id = $this->input->get("id");
        $this->db->where('idnoresep', $id);
        $dt = $this->db->delete('resep_detail');
        return $dt;
    }

    // daftar obat

    public function listobat() {
        $this->db->from("mobat");
        $this->db->select("namaobat, satuanpakai, hargapakai");
        $this->db->where("bhp", "0");
        $data = $this->db->get();
        return $data->result();
    }

    // untuk cek data resep

    public function ambilresep_old() {
        $shift = $this->input->get("shift");
        $depo = $this->input->get("depo");
        $date = date_create($this->input->get("tgl"));
        $tgl = date_format($date,"Y-m-d");
        $this->db->select("resep_header.*, pasien.nama_pasien as nama, pasien.alamat as alamat, pasien.telp as telp");
        $this->db->from("resep_header");
        $this->db->join("pasien", "resep_header.no_rm = pasien.no_rm");
        $this->db->where("shift", $shift);
        $this->db->where("kode_depo", trim($depo));
        $this->db->where("tglresep", $tgl);
        $this->db->where("resep_header.user2", $this->session->userdata("nmuser"));
        // $this->db->where("resep_header.user2", $this->session->userdata("nmuser"));
        $data = $this->db->get();
        return $data->result();
    }

    public function ambilresep() {
        $shift = $this->input->get("shift");
        $depo = $this->input->get("depo");
        $date = date_create($this->input->get("tgl"));
        $tgl = date_format($date,"Y-m-d");
        $this->db->select("resep_header.*, pasien.nama_pasien as nama, pasien.alamat as alamat, pasien.telp as telp");
        $this->db->from("resep_header");
        $this->db->join("pasien", "resep_header.no_rm = pasien.no_rm");
        $this->db->where("shift", $shift);
        $this->db->where("kode_depo", trim($depo));
        $this->db->where("tglresep", $tgl);
        // $this->db->where("resep_header.user2", $this->session->userdata("nmuser"));
        // $this->db->where("resep_header.user2", $this->session->userdata("nmuser"));
        $data = $this->db->get();
        return $data->result();
    }
    public function ambildataresepheader($id) {
        $this->db->select("resep_header.*, pasien.nama_pasien as nama");
        $this->db->from("resep_header");
        $this->db->join("pasien", "resep_header.no_rm = pasien.no_rm");
        $this->db->where("idnoresep", $id);
        $data = $this->db->get();
        return $data->row();
    }

    public function ambildataresepdetail($id) {
        $this->db->from("resep_detail");
        $this->db->where("noresep", $id);
        $data = $this->db->get();
        return $data->result();
    }

    public function ambilresepheadercetak($no) {
        $this->db->select('*');
        $this->db->from('resep_header');
        $this->db->where("noresep", $no);
        $data = $this->db->get();
        return $data->row();
    }

    public function ambilresepdetailcetak($no) {
        $this->db->select('*');
        $this->db->from('resep_detail');
        $this->db->where("noresep", $no);
        $data = $this->db->get();
        return $data->result();
    }

    public function ambildosis() {
        $this->db->select('*');
        $this->db->from('mdosis');
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

    public function pilihpendanaan() {
        $this->db->select('pendanaan');
        $this->db->from('mpendanaan');
        $data = $this->db->get();
        return $data->result();
    }

    public function isidepo_old_ok() {
        $shift = $this->input->get("shift");
        $kodedp = $this->input->get("depo");
        $kode_depo =trim($kodedp);
        $kode_unit = $this->input->get("unit");
        $no_rm = $this->input->get("nrp");
        $user2= $this->session->userdata("nmuser");
        $dt = $this->db->query("update resep_header set kode_depo='$kode_depo', shift='$shift', user2='$user2' where no_rm='$no_rm' and kode_unit='$kode_unit' ");
        return $dt;
    }

    public function isidepo() {
        $shift = $this->input->get("shift");
        $kodedp = $this->input->get("depo");
        $kode_depo =trim($kodedp);
        $kode_unit = $this->input->get("unit");
        $no_rm = $this->input->get("nrp");
        //--cek dulu apakah sdh ada yg add sebelumnya
        $cek = $this->db->query("select no_rm from resep_header where no_rm='$no_rm' and kode_unit='$kode_unit' and kode_depo='' ");
        if($cek->num_rows()>0) {
            $cek = $this->db->query("select nama_unit from munit where kode_unit='$kode_depo' limit 1 ");
            foreach ($cek->result_array() as $brs2) {
                $nama_unit=$brs2['nama_unit'];
            }
            $user2= $this->session->userdata("nmuser");
            $dt = $this->db->query("update resep_header set kode_depo='$kode_depo', shift='$shift', nama_depo='$nama_unit' , user2='$user2', dariunit=1 where no_rm='$no_rm' and kode_unit='$kode_unit' and kode_depo='' ");
            return $dt;
        } else {
            return false;
        }

    }

    public function batalkanresepunit() {
     
        $id = $this->input->get("id");
    
        $this->db->select("idnoresep, noresep");
        $this->db->from("resep_header");
        $this->db->where('idnoresep', $id);
        $databasic = $this->db->get();
        $datasinggle = $databasic->row();
    
        $this->db->select("idnoresep");
        $this->db->from("resep_detail");
        $this->db->where('noresep', $datasinggle->noresep);
        $this->db->where('proses', 1);
        $datadetail = $this->db->count_all_results();
            
        if ($datadetail == 0) {
            $detailheader = array(
                'shift' => '',
                'kode_depo' =>'',
                'nama_depo' =>'',
            );
            $this->db->where('idnoresep', $id);
            $dt = $this->db->update("resep_header", $detailheader);
            return $dt;
        } else {
            return false;
        }
    }

        //cek obatnya diakui apotik
        public function cekobat() {
            $id = $this->input->get("id");
            $detailresep = array(
                'proses' => '1'
            );
            $this->db->where('idnoresep', $id);
            $dt = $this->db->update("resep_detail", $detailresep);
            return $dt;
        }

        public function editheader() {
            $norep = $this->input->get("norep");
            $date = date_create($this->input->get("tglresep"));
            $tglresep = date_format($date,"Y-m-d");
            $editheader= array(
                'type'  => $this->input->get("tipe"),
                'golongan' => $this->input->get("gol"),
                'tglresep' =>  $tglresep,
                'kode_unit' =>$this->input->get("unit"),
                'nama_unit' =>$this->input->get("unittext"),
                'kode_dokter' =>$this->input->get("dokter"),
                'nama_dokter' =>$this->input->get("doktertext"),
                'racik' =>$this->input->get("racik"),
                'nonracik' =>$this->input->get("nonracik")
            );
            $this->db->where('noresep', $norep);
            $dt = $this->db->update("resep_header", $editheader);
            return $dt;
        }    

}
