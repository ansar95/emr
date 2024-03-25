<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakturmdl extends CI_Model {

    public function fullpelayanan() {
        $this->db->from("agama");
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

    public function ambilheaderfaktur($id) {

        /**
         * ambil header faktur
         * sekaligus cek ketersediaan faktur header
         */

        $this->db->from("pfakturheader");
        $this->db->where("noterima", $id);
        $data = $this->db->get();
        if ($data->row() == null) {
            return array("sukses" => false, "header" => null);
        } else {
            return array("sukses" => true, "header" => $data->row());
        }
    }

    public function ambildetail($id) {

        /**
         * ambil detail faktur
         */

        $this->db->select("id, kodebarang, namabarang, satuan, qty, harga, diskon, potlangsung, bayar, isisatuan, batch, expire, hargasementara, hargaperolehan");
        $this->db->from("pfakturdetail");
        $this->db->where("hapus", "0");
        $this->db->where("noterima", $id);
        $data = $this->db->get();
        return $data->result();
    }

    public function ambilppn($id) {
        $this->db->select("ppn");
        $this->db->from("pfakturheader");
        $this->db->where("noterima", $id);
        $data = $this->db->get();
        return $data->result();
    }

    public function cektandaterima() {

        /**
         * cari data tanda terima d DB
         */
        $noterima = $this->input->get("tanda");
        $this->db->select("noterima, tglterima, kodepbf, namapbf, ppn");
        $this->db->from("pfakturheader");
        $this->db->where("noterima", $noterima);
        $this->db->where("nofak", "");
        $data = $this->db->get();
        return $data->row();
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
            $numstart = $t->nomor + 1;
            $numdate = str_replace("-", "", $tgl);
            $numend = sprintf("%05d", $numstart);
            $numgabung = "AP" . substr($numdate, 2) . $numend;
            return array($tgl, $numstart, $numgabung);
        }
    }

    public function simpanfaktur() {
        $date = date_create($this->input->get("tgl"));
        $tglfaktur = date_format($date,"Y-m-d");
        $date1 = date_create($this->input->get("terima"));
        $tglterima = date_format($date1,"Y-m-d");
        $date2 = date_create($this->input->get("exp"));
        $tglexp = date_format($date2,"Y-m-d");
        $nofaktur = $this->input->get("no");
        $noterima = $this->input->get("sj");
        $arrtanda = json_decode(stripcslashes($this->input->get("arrtanda")));
        $this->db->from("pfakturheader");
        $this->db->where("noterima", $noterima);
        $this->db->limit(1);
        $data = $this->db->get();
        if ($data->result() == NULL) {
            $headerfaktur = array(
                'noterima' => $this->input->get("sj"),
                'nofak' => $this->input->get("no"),
                'tglbeli' => $tglfaktur,
                'kodepbf' => $this->input->get("vendor"),
                'namapbf' => $this->input->get("vendortext"),
                'jumlah' => "0",
                'ppn' => $this->input->get("ppn"),
                'kondisi' => "",
                'carabayar' => "",
                'bank' => "",
                'user' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s"),
                'norek' => "",
                'bhp' => "",
                'tglterima' => $tglterima,
                'jkd' => "0",
                'keuangan' => "0"
            );
            $this->db->insert("pfakturheader", $headerfaktur);
            $insert_id = $this->db->insert_id();

            $detailfaktur = array(
                'kodebarang' => $this->input->get("kode"),
                'namabarang' => $this->input->get("barangtext"),
                'qty' => $this->input->get("qty"),
                'satuan' => $this->input->get("sat"),
                'harga' => $this->input->get("hrg"),
                'bayar' => $this->input->get("jum"),
                'diskon' => $this->input->get("disc"),
                'potlangsung' => $this->input->get("pot"),
                'noterima' => $this->input->get("sj"),
                'idnoterima' => $insert_id,
                'user' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s"),
                'jkd' => "0",
                'jkm' => "0",
                'askes' => "0",
                'swasta' => "0",
                'bhp' => "0",
                'isisatuan' => $this->input->get("isi"),
                'hargaperolehan' => "0",
                'postingharga' => "0",
                'hargasementara' => "0",
                'batch' => $this->input->get("batch"),
                'expire' => $tglexp,
                'idkartustok' => "0"
            );
            $dt = $this->db->insert("pfakturdetail", $detailfaktur);

            if (($nofaktur == "") || ($nofaktur == null)) {

            } else {
                foreach ($arrtanda as $item) {

                    $this->db->select("nofak");
                    $this->db->from("pfakturheader");
                    $this->db->where("noterima", $item);
                    $datafaktur = $this->db->get();
                    $nofaktur = $datafaktur->row();

                    if ($nofaktur->nofak == "") {
                        $updatenofak = array(
                            'nofak' => $this->input->get("no")
                        );
                        $this->db->where("noterima", $item);
                        $this->db->update("pfakturheader", $updatenofak);
                    } else {

                    }

                }
            }

            return array("sukses" => $dt, "noterima" => $noterima);
        } else {
            $hasil = $data->row();
            $id = $hasil->id;
            $detailfaktur = array(
                'kodebarang' => $this->input->get("kode"),
                'namabarang' => $this->input->get("barangtext"),
                'qty' => $this->input->get("qty"),
                'satuan' => $this->input->get("sat"),
                'harga' => $this->input->get("hrg"),
                'bayar' => $this->input->get("jum"),
                'diskon' => $this->input->get("disc"),
                'potlangsung' => $this->input->get("pot"),
                'noterima' => $this->input->get("sj"),
                'idnoterima' => $id,
                'user' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s"),
                'jkd' => "0",
                'jkm' => "0",
                'askes' => "0",
                'swasta' => "0",
                'bhp' => "0",
                'isisatuan' => $this->input->get("isi"),
                'hargaperolehan' => "0",
                'postingharga' => "0",
                'hargasementara' => "0",
                'batch' => $this->input->get("batch"),
                'expire' => $tglexp,
                'idkartustok' => "0"
            );
            $dt = $this->db->insert("pfakturdetail", $detailfaktur);

            if (($nofaktur == "") || ($nofaktur == null)) {

            } else {
                foreach ($arrtanda as $item) {
                    $this->db->select("nofak");
                    $this->db->from("pfakturheader");
                    $this->db->where("noterima", $item);
                    $datafaktur = $this->db->get();
                    $nofaktur = $datafaktur->row();

                    if ($nofaktur->nofak == "") {
                        $updatenofak = array(
                            'nofak' => $this->input->get("no")
                        );
                        $this->db->where("noterima", $item);
                        $this->db->update("pfakturheader", $updatenofak);
                    } else {

                    }
                }
            }

            return array("sukses" => $dt, "noterima" => $noterima);
        }
    }

    public function updatenofaktur($terima, $nofak) {

        /**
         * ubah no faktur yg kosong
         */

        $updatenofak = array(
            'nofak' => $nofak
        );
        $this->db->where("noterima", $terima);
        $data = $this->db->update("pfakturheader", $updatenofak);
        return $data;
    }

    public function updatefaktur() {
        $date = date_create($this->input->get("tgl"));
        $tglfaktur = date_format($date,"Y-m-d");
        $date1 = date_create($this->input->get("terima"));
        $tglterima = date_format($date1,"Y-m-d");
        $date2 = date_create($this->input->get("exp"));
        $tglexp = date_format($date2,"Y-m-d");
        $ppn = $this->input->get("ppn");
        $nofaktur = $this->input->get("no");
        $noterima = $this->input->get("sj");
        //$this->db->from("pfakturheader");
        //$this->db->where("noterima", $noterima);
        //$this->db->limit(1);
        //$data = $this->db->get();
        //if ($data->result() == NULL) {
            $headerfaktur1 = array(
                'noterima' => $this->input->get("sj"),
                'nofak' => $this->input->get("no"),
                'tglbeli' => $tglfaktur,
                'kodepbf' => $this->input->get("vendor"),
                'namapbf' => $this->input->get("vendortext"),
                'jumlah' => "0",
                'ppn' => $ppn,
                'kondisi' => "",
                'carabayar' => "",
                'bank' => "",
                'user' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s"),
                'norek' => "",
                'bhp' => "",
                'tglterima' => $tglterima,
                'jkd' => "0",
                'keuangan' => "0"
            );
            $this->db->where("noterima", $noterima);
            $dt = $this->db->update("pfakturheader", $headerfaktur1);
            //return $dt;
            return array("sukses" => $dt, "noterima" => $noterima);

        //} 
    }

    public function deletedetailfaktur() {
        $id = $this->input->get("id");

        $this->db->select("noterima");
		$this->db->from("pfakturdetail");
        $this->db->where('id', $id);
        $data = $this->db->get();
        $noterima = $data->row();

        $this->db->select("id");
		$this->db->from("pfakturdetail");
        $this->db->where('id', $id);
        $this->db->where('status_ampra', 0);
        $datadetail = $this->db->count_all_results();

        $this->db->select("id");
		$this->db->from("pfakturheader");
        $this->db->where('noterima', $noterima->noterima);
        $this->db->where('keuangan', 0);
        $dataheader = $this->db->count_all_results();

        if (($datadetail != 0) && ($dataheader != 0)) {
            $data = array(
                'hapus' => "1",
                'lastlogin' => date("Y-m-d H:i:s"),
                'user' => $this->session->userdata('nmuser')
            );
    
            $this->db->where("id", $id);
            $dt = $this->db->update("pfakturdetail", $data);
            return $dt;
        } else {
            return "0";
        }
    }

    public function ubahdatainfoheader() {
        $sj = $this->input->get("sj");
        $date = date_create($this->input->get("tgl"));
        $tglfaktur = date_format($date,"Y-m-d");
        $date1 = date_create($this->input->get("terima"));
        $tglterima = date_format($date1,"Y-m-d");
        $vendor = $this->input->get("vendor");
        $ppn = $this->input->get("ppn");

        $updatedata = array(
            'tglbeli' => $tglfaktur,
            'ppn' => $ppn,
            'tglterima' => $tglterima,
            'user' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s"),
            'kodepbf' => $this->input->get("vendor"),
            'namapbf' => $this->input->get("vendortext")
        );
        $this->db->where("noterima", $sj);
        $status = $this->db->update("pfakturheader", $updatedata);
        return $status;
    }

    public function hapusdatafaktur() {
        $sj = $this->input->get("sj");

        $this->db->select("id");
		$this->db->from("pfakturdetail");
        $this->db->where('noterima', $sj);
        $this->db->where('hapus', 0);
        $datadetail = $this->db->count_all_results();
        
        if ($datadetail == 0) {
			$this->db->where('noterima', $sj);
			$dt = $this->db->delete('pfakturheader');
			return $dt;
        } else {
            return false;
        }
    }

    //kebutuhan retur
    public function ambildetailretur() {
        $date = date_create($this->input->get("awal"));
        $awal = date_format($date,"Y-m-d");
        $date1 = date_create($this->input->get("akhir"));
        $akhir = date_format($date1,"Y-m-d");
        $vendor = $this->input->get("vendor");

        // $this->db->select("id, kodebarang, namabarang, satuan, qty, harga, diskon, potlangsung, bayar, isisatuan, batch, expire, hargasementara, hargaperolehan");
        $this->db->from("pfakturretur");
        // $this->db->where("kodevendor", $vendor);
        // $this->db->where("tglretur >=", $awal);
        // $this->db->where("tglretur <=", $akhir);
        $data = $this->db->get();
        // return $data->row();

        return $data->result();
    }

    public function untukretur() {
        $nosj = $this->input->get("nosj");
	    $this->db->from("pfakturheader");
        $this->db->where("noterima", $nosj);
        $data = $this->db->get();
        // return $data->result();
        return $data->row();

    }

    public function simpanretur() {
        $date = date_create($this->input->get("tglretur"));
        $tglretur = date_format($date,"Y-m-d");
            $headerfaktur = array(
                'tglretur' => $tglretur,
                'kodevendor' => $this->input->get("detailvendor"),
                'nosj' => $this->input->get("nosj"),
                'kodebarang' => $this->input->get("barang"),
                'qty' => $this->input->get("qty"),
                'satuan' => $this->input->get("sat"),
                'isi' => $this->input->get("isi"),
                'batch' => $this->input->get("batch"),
                'expire' => $this->input->get("exp"),
                'sebab' => $this->input->get("sebab"),
                'user' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s")
            );
            $result=$this->db->insert("pfakturretur", $headerfaktur);
            // $insert_id = $this->db->insert_id();
            return $result;
             
    }
}