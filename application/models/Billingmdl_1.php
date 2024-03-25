<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billingmdl extends CI_Model {

	public function caridtbilling() {

	    /**
	     * cari data berdasarkan no RM di kotak pencarian
         */

	    $no = $this->input->get("norm");
	    $this->db->select("register.notransaksi as notransaksi, pasien.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register.golongan as golongan, register.keluarpada as keluarpada, register.tgl_masuk as tgl_masuk, register.tgl_keluar as tgl_keluar, register.totalbayar as totalbayar, register.selisih as selisih, register.ket_keluar as ket_keluar, register.id as id");
		$this->db->from("register");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		$this->db->where("register.no_rm", "".$no."");
		$this->db->where('register.tgltutup < DATE_FORMAT(NOW(), "%Y-%m-%d")');
		$this->db->where("register.billing", "0");
		$this->db->order_by("register.tgl_keluar", "DESC");
		$data = $this->db->get();
		return $data->result();
	}

    public function detcaridtbilling() {

        /**
         * panggil data biling dari tombol billing di list
         */

        $no = $this->input->get("id");
        $this->db->select("register.notransaksi as notransaksi, pasien.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register.golongan as golongan, register.keluarpada as keluarpada, register.tgl_masuk as tgl_masuk, register.tgl_keluar as tgl_keluar, register.totalbayar as totalbayar, register.selisih as selisih, register.ket_keluar as ket_keluar");
        $this->db->select("register.id as id, register.nama_dokter as nama_dokter, register.pulang as statuspulang ");
        $this->db->from("register");
        $this->db->join("pasien", "pasien.no_rm = register.no_rm");
        $this->db->where("register.id", $no);
        $data = $this->db->get();
        return $data->row();
    }

    public function berkasbayar() {
        /**
         * panggil data billing dari tombol di list untuk form bayar
         */

        $no = $this->input->get("id");
        $this->db->select("register.notransaksi as notransaksi, pasien.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register.golongan as golongan, register.keluarpada as keluarpada, register.tgl_masuk as tgl_masuk, register.tgl_keluar as tgl_keluar, register.totalbayar as totalbayar, register.selisih as selisih, register.ket_keluar as ket_keluar, register.id as id, register.nama_dokter as nama_dokter, register.asuransi as asuransi");
        $this->db->from("register");
        $this->db->join("pasien", "pasien.no_rm = register.no_rm");
        $this->db->where("register.id", $no);
        $data = $this->db->get();
        return $data->row();
    }

    public function kondisikamarpersen($totalbilling, $asuransi) {
        $qry1 = $this->db->query("SELECT `persen_kamar`, `persen_obat` FROM `masuransi` WHERE `nama_asuransi`='".$asuransi."' LIMIT 1 ");
        $qry1row = $qry1->row();
        if ($qry1row == null) { 
            return 0;
        } else {
            $temp = ($totalbilling * $qry1->persen_kamar) / 100;
            return ($totalbilling - $temp);   
        }
    }

    public function kondisiobatpersen($totalbilling, $asuransi) {
        $qry1 = $this->db->query("SELECT `persen_kamar`, `persen_obat` FROM `masuransi` WHERE `nama_asuransi`='".$asuransi."' LIMIT 1 ");
        $qry1row = $qry1->row();
        if ($qry1row == null) { 
            return 0;
        } else {
            $temp = ($totalbilling * $qry1->persen_obat) / 100;
            return ($totalbilling - $temp);
        }
    }

    public function berkasjumlahbayar_old($no) {

        /**
         * hitung total billing untuk form bayar
         * dengan keluaran [sisa, jumlahBayar, jumlahDitanggung]
         */

        $this->db->select("notrx, nilai, asuransi, nonasuransi, selisih, lunas, terbayar, sisabayar");
        $this->db->from("billing_rekap");
        $this->db->where("notrx", $no);
        $trx = $this->db->get();
        $trxdata = $trx->row();

        if ($trxdata == null) {

            //hitung total billing
            $qry21 = $this->db->query("SELECT sum((jasas*qty)-(jasas*qty*diskon*0.01)) as jumbil from billing WHERE notransaksi = '".$no."' LIMIT 1 ");
            $qry21row = $qry21->row();
            if ($qry21row->jumbil == null) { $xtotalbillling = 0; } else { $xtotalbillling = $qry21row->jumbil; }

            //hitung total asuransi
            $qry22 = $this->db->query("SELECT sum((jasas*qty)-(jasas*qty*diskon*0.01)) as jumbil from billing WHERE notransaksi = '".$no."' AND nonasuransi = 0 LIMIT 1 ");
            $qry22row = $qry22->row();
            if ($qry22row->jumbil == null) { $xtotalbilllingasuransi = 0; } else { $xtotalbilllingasuransi = $qry22row->jumbil; }

            //hitung total nonasuransi
            $qry23 = $this->db->query("SELECT sum((jasas*qty)-(jasas*qty*diskon*0.01)) as jumbil from billing WHERE notransaksi = '".$no."' AND nonasuransi = 1 LIMIT 1 ");
            $qry23row = $qry23->row();
            if ($qry23row->jumbil == null) { $xtotalbilllingnonasuransi = 0; } else { $xtotalbilllingnonasuransi = $qry23row->jumbil; }
            
            // get golongan
            $qry24 = $this->db->query("SELECT asuransi, golongan from register WHERE notransaksi = '".$no."' LIMIT 1");
            $qry24row = $qry24->row();
            $xgolongan = $qry24row->golongan;
            
            // $tanggungasuransi = 0;
            if ($xgolongan == 'BPJS') { $tanggungasuransi = $xtotalbillling; } else { $tanggungasuransi = $xtotalbilllingasuransi; }
            // $sisabayar = $xtotalbillling - $tanggungasuransi;

            if (($xgolongan == "INHEALTH") || ($xgolongan == "PERUSAHAAN")) {
                $selisih = $this->kondisikamarpersen($xtotalbillling, $qry24row->asuransi);
            } else if ($xgolongan == "BPJS") {
                $selisih = "";
            } else {
                $selisih = 0;
            }

           

            $sudahdibayarkan=0;
            return array($xtotalbilllingnonasuransi, $xtotalbillling, $tanggungasuransi, $selisih, false, 0);

        } else {
            // get golongan
            $qry24 = $this->db->query("SELECT asuransi, golongan, selisih from register WHERE notransaksi = '".$no."' LIMIT 1");
            $qry24row = $qry24->row();
            $xgolongan = $qry24row->golongan;

            // $tanggungasuransi = 0;
            if ($xgolongan == 'BPJS'){ $tanggungasuransi = $trxdata->nilai; } else { $tanggungasuransi = $trxdata->asuransi; }
            // $sisabayar = $trxdata->nilai - $tanggungasuransi;

            if (($xgolongan == "INHEALTH") || ($xgolongan == "PERUSAHAAN")) {
                $selisih = $this->kondisikamarpersen($xtotalbillling, $qry24row->asuransi);
            } else if ($xgolongan == "BPJS") {
                $selisih = "";
            } else {
                $selisih = 0;
            }

            // $selisih = $qry24row->selisih;
            return array($trxdata->nonasuransi, $trxdata->nilai, $tanggungasuransi, $trxdata->selisih, true, $trxdata->sisabayar);
        }
    }


    public function berkasjumlahbayar($no) {

        /**
         * hitung total billing untuk form bayar
         * dengan keluaran [sisa, jumlahBayar, jumlahDitanggung]
         */

        $this->db->select("notrx, nilai, asuransi, nonasuransi, lunas, terbayar, sisabayar");
        $this->db->from("billing_rekap");
        $this->db->where("notrx", $no);
        $trx = $this->db->get();
        $trxdata = $trx->row();

        if ($trxdata == null) {

            //hitung total billing
            $qry21 = $this->db->query("SELECT sum((jasas*qty)-(jasas*qty*diskon*0.01)) as jumbil from billing WHERE notransaksi = '".$no."' LIMIT 1 ");
            $qry21row = $qry21->row();
            if ($qry21row->jumbil == null) { $xtotalbillling = 0; } else { $xtotalbillling = $qry21row->jumbil; }

            //hitung total asuransi
            $qry22 = $this->db->query("SELECT sum((jasas*qty)-(jasas*qty*diskon*0.01)) as jumbil from billing WHERE notransaksi = '".$no."' AND nonasuransi = 0 LIMIT 1 ");
            $qry22row = $qry22->row();
            if ($qry22row->jumbil == null) { $xtotalbilllingasuransi = 0; } else { $xtotalbilllingasuransi = $qry22row->jumbil; }

            //hitung total nonasuransi
            $qry23 = $this->db->query("SELECT sum((jasas*qty)-(jasas*qty*diskon*0.01)) as jumbil from billing WHERE notransaksi = '".$no."' AND nonasuransi = 1 LIMIT 1 ");
            $qry23row = $qry23->row();
            if ($qry23row->jumbil == null) { $xtotalbilllingnonasuransi = 0; } else { $xtotalbilllingnonasuransi = $qry23row->jumbil; }
            
            // get golongan
            $qry24 = $this->db->query("SELECT asuransi, golongan from register WHERE notransaksi = '".$no."' LIMIT 1");
            $qry24row = $qry24->row();
            $xgolongan = $qry24row->golongan;


            if ($xgolongan == 'BPJS') { $tanggungasuransi = $xtotalbilllingasuransi; } else { $tanggungasuransi = 0; }
            // $sisabayar = $xtotalbillling - $tanggungasuransi;

            if (($xgolongan == "INHEALTH") || ($xgolongan == "PERUSAHAAN")) {
                $selisih = $this->kondisikamarpersen($xtotalbillling, $qry24row->asuransi);
            } else if ($xgolongan == "BPJS") {
                $selisih = "";
            } else {
                $selisih = 0;
            }
            
            $qry24 = $this->db->query("SELECT selisih from register WHERE notransaksi = '".$no."' LIMIT 1");
            $qry24row = $qry24->row();
            $selisih = $qry24row->selisih;
            //sudah dibayarkan=0 krn billing baru
            $sudahdibayarkan=0;
            return array($xtotalbilllingnonasuransi, $xtotalbillling, $tanggungasuransi, $selisih, false, 0, $sudahdibayarkan);

        } else {
            // get golongan
            $qry24 = $this->db->query("SELECT asuransi, golongan,selisih from register WHERE notransaksi = '".$no."' LIMIT 1");
            $qry24row = $qry24->row();
            $xgolongan = $qry24row->golongan;

            // $tanggungasuransi = 0;
            if ($xgolongan == 'BPJS'){ $tanggungasuransi = $trxdata->asuransi; } else { $tanggungasuransi = 0; }
            // $sisabayar = $trxdata->nilai - $tanggungasuransi;

            if (($xgolongan == "INHEALTH") || ($xgolongan == "PERUSAHAAN")) {
                $selisih = $this->kondisikamarpersen($xtotalbillling, $qry24row->asuransi);
            } else if ($xgolongan == "BPJS") {
                $selisih = "";
            } else {
                $selisih = 0;
            }
            $qry25 = $this->db->query("SELECT sum(terbayar) as xterbayar from billing_rekap WHERE notrx = '".$no."' LIMIT 1");
            $qry25row = $qry25->row();
            $sudahdibayarkan = $qry25row->xterbayar;

            return array($trxdata->nonasuransi, $trxdata->nilai, $tanggungasuransi, $qry24row->selisih, true, $trxdata->sisabayar, $sudahdibayarkan);
        }
    }

    public function jumlahbayarapotik() {
        $noresep = $this->input->get("noresep");
        $qry21 = $this->db->query("SELECT sum((hargapakai+tuslag)*qty) as jumhargaresep from resep_detail WHERE noresep = '$noresep' LIMIT 1 ");
        // $qry21row = $qry21->row();
        // if ($qry21row->jumhargaresep == null) { $xtotalhargaresep = 0; } else { $xtotalhargaresep = $qry21row->jumhargaresep; }

        return $qry21->row();
    }

    public function jumlahbayarinst() {
        $notrx_IN = $this->input->get("notrx_IN");
        $qry21 = $this->db->query("SELECT sum((jasas*qty)-(jasas*qty*diskon*0.01)) as jumharga from ptindakan_instalasi WHERE notransaksi_IN = '$notrx_IN' LIMIT 1 ");
        // $qry21row = $qry21->row();
        // if ($qry21row->jumhargaresep == null) { $xtotalhargaresep = 0; } else { $xtotalhargaresep = $qry21row->jumhargaresep; }

        return $qry21->row();
    }



    public function ambilsetupkwitansipelayanan() {

        /**
         * proses ambil no kwitansi terakhir
         */

        $this->db->select("id, no_kwitansi");
        $this->db->from("setup_kwitansi_billing");
        $data = $this->db->get();
        return $data->row();
    }

    public function prosesbayarpelayanan($kwitansi) {

        /**
         * proses simpan pembayaran ke rekap billing
         */
        $tglhariini=date('Y-m-d');

        $shift = $this->input->get("shift");
        $rm = $this->input->get("rm");
        $shifttext = $this->input->get("shifttext");
        $trx = $this->input->get("trx");
        $ps = $this->input->get("ps");
        $nb = $this->input->get("nb");
        $as = $this->input->get("as");
        $pb = $this->input->get("pb");
        $sbs = $this->input->get("sbs");
        $cat = $this->input->get("cat");
        $sisa = $this->input->get("sisa");
        $sb = $this->input->get("sb");
        $st = $this->input->get("st");
        $jhd = $this->input->get("jhd");
        $sbs_x = $this->input->get("sbs");
        $sbs=preg_replace('/\D/', '', $sbs_x);
        $ceksbs=(int)$sbs;

   
     if ($ceksbs <> 0 ) {     
        $this->db->select("id, notrx, nilai, asuransi, selisih, lunas");
        $this->db->from("billing_rekap");
        $this->db->where("notrx", $trx);
        $this->db->where("tglbayar", $tglhariini);
        $notrx = $this->db->get();
        $notrxdata = $notrx->row();

        $this->db->select("id, tanggal");
        $this->db->from("billing");
        $this->db->where("notransaksi", $trx);
        $billing = $this->db->get();
        $billingdata = $billing->row();

        $this->db->select("bagian");
        $this->db->from("register");
        $this->db->where("notransaksi", $trx);
        $bagian = $this->db->get();
        $bagiandata = $bagian->row();

        $no_kwi = sprintf("%06d", (int)$kwitansi->no_kwitansi + 1);

        if ($sbs == "0") {
            $lunas = "1";
        } else {
            $lunas = "0";
        }

        if ($notrxdata == null) {
            $simpan = array(
                "nokwi" => "" . date("Y") . "" . date("m") . "" . $no_kwi . "",
                "tglbiling" => $billingdata->tanggal,
                "tglbayar" => date("Y-m-d"),
                "notrx" => $trx,
                "norm" => $rm,
                "bagian" => $bagiandata->bagian,
                "nilai" => $nb,
                "asuransi" => $as,
                "nonasuransi" => $pb,
                "selisih" => $sb,
                "terbayar" => $sbs,
                "sisabayar" => $sisa,
                "lunas" => $lunas,
                "catatan" => $cat,
                "user" => $this->session->userdata("nmuser"),
                "lastlogin" => date("Y-m-d H:i:s"),
                "shift" => $shift,
            );
            $stat = $this->db->insert('billing_rekap', $simpan);
            if ($stat) {
                $ubahkwi = array(
                    'no_kwitansi' => (int)$kwitansi->no_kwitansi + 1
                );

                $this->db->where('id', $kwitansi->id);
                $this->db->update('setup_kwitansi_billing', $ubahkwi);

                return $stat;
            } else {
                return $stat;
            }
        } else {
            $ubah = array(
                "tglbayar" => date("Y-m-d"),
                "nilai" => $nb,
                "asuransi" => $as,
                "nonasuransi" => $pb,
                "selisih" => $sb,
                "terbayar" => $sbs,
                "sisabayar" => $sisa,
                "lunas" => $lunas,
                "catatan" => $cat,
                "user" => $this->session->userdata("nmuser"),
                "lastlogin" => date("Y-m-d H:i:s"),
            );
            $this->db->where('id', $notrxdata->id);
            $stat = $this->db->update('billing_rekap', $ubah);
            if ($stat) {
//                $ubahkwi = array(
//                    'no_kwitansi' => (int)$kwitansi->no_kwitansi + 1
//                );
//
//                $this->db->where('id', $kwitansi->id);
//                $this->db->update('setup', $ubahkwi);

                return $stat;
            } else {
                return $stat;
            }
        }
        
     } 

    }

    
    public function prosesbayarapotik($kwitansi) {
        
        /**
         * proses simpan pembayaran ke rekap billing
         */
        $tglhariini=date('Y-m-d');

        $shift = $this->input->get("shift");
        $rm = $this->input->get("rm");
        $shifttext = $this->input->get("shifttext");
        $trx = $this->input->get("trx");

        $dpjp = $this->input->get("dpjp");
        $noresep = $this->input->get("noresep");
        $tglresep = $this->input->get("tglresep");
        $carabayar = $this->input->get("carabayar");
        $byr = $this->input->get("bayar");
        $byr1=preg_replace('/\D/', '', $byr);
        $bayar=(int)$byr1;

     if ($bayar <> 0 ) {     
        $this->db->select("id, notrx, nilai, asuransi, selisih, lunas");
        $this->db->from("billing_rekap");
        $this->db->where("notrx", $noresep);
        $this->db->where("tglbayar", $tglhariini);
        $notrx = $this->db->get();
        $notrxdata = $notrx->row();

        // $this->db->select("id, tanggal");
        // $this->db->from("billing");
        // $this->db->where("notransaksi", $trx);
        // $billing = $this->db->get();
        // $billingdata = $billing->row();

        // $this->db->select("bagian");
        // $this->db->from("register");
        // $this->db->where("notransaksi", $trx);
        // $bagian = $this->db->get();
        // $bagiandata = $bagian->row();
        $bagiandata = "Umum";
        $no_kwi = sprintf("%06d", (int)$kwitansi->no_kwitansi + 1);
        $lunas = "1";
      
        // nomor transaksi sengaja diisikan nomor resep untuk pengujian nomor resep
        // notrx diisikan di catatan

        if ($notrxdata == null) {
            $simpan = array(
                "nokwi" => "" . date("Y") . "" . date("m") . "" . $no_kwi . "",
                "tglbiling" => date("Y-m-d"),
                "tglbayar" => date("Y-m-d"),
                "notrx" => $noresep,
                "norm" => $rm,
                "bagian" => $bagiandata,
                "nilai" => $bayar,
                "asuransi" => 0,
                "nonasuransi" => $bayar,
                "selisih" => 0,
                "terbayar" => $bayar,
                "sisabayar" => 0,
                "lunas" => $lunas,
                "catatan" => $trx,
                "user" => $this->session->userdata("nmuser"),
                "lastlogin" => date("Y-m-d H:i:s"),
                "shift" => $shift,
            );
            $stat = $this->db->insert('billing_rekap', $simpan);
            if ($stat) {
                $ubahkwi = array(
                    'no_kwitansi' => (int)$kwitansi->no_kwitansi + 1
                );

                $this->db->where('id', $kwitansi->id);
                $this->db->update('setup_kwitansi_billing', $ubahkwi);

                return $stat;
            } else {
                return $stat;
            }
        } else {
            $ubah = array(
                "tglbayar" => date("Y-m-d"),
                "nilai" => $bayar,
                "asuransi" => 0,
                "nonasuransi" => $bayar,
                "selisih" => 0,
                "terbayar" => $bayar,
                "sisabayar" => 0,
                "lunas" => $lunas,
                "catatan" => $trx,
                "user" => $this->session->userdata("nmuser"),
                "lastlogin" => date("Y-m-d H:i:s"),
            );
            $this->db->where('notrx', $noresep);
            $stat = $this->db->update('billing_rekap', $ubah);
            if ($stat) {
                return $stat;
            } else {
                return $stat;
            }
        }
        
     } 

    }


    public function prosesbayarinst($kwitansi) {
        
        /**
         * proses simpan pembayaran ke rekap billing
         */
        $tglhariini=date('Y-m-d');

        $shift = $this->input->get("shift");
        $rm = $this->input->get("rm");
        $shifttext = $this->input->get("shifttext");
        $trx = $this->input->get("trx");

        $dpjp = $this->input->get("dpjp");
        $notrx_IN = $this->input->get("notrx_IN");
        $tglperiksa = $this->input->get("tglperiksa");
        $carabayar = $this->input->get("carabayar");
        $byr = $this->input->get("bayar");
        $byr1=preg_replace('/\D/', '', $byr);
        $bayar=(int)$byr1;

     if ($bayar <> 0 ) {     
        $this->db->select("id, notrx, nilai, asuransi, selisih, lunas");
        $this->db->from("billing_rekap");
        $this->db->where("notrx", $notrx_IN);
        $this->db->where("tglbayar", $tglhariini);
        $notrx = $this->db->get();
        $notrxdata = $notrx->row();

        // $this->db->select("id, tanggal");
        // $this->db->from("billing");
        // $this->db->where("notransaksi", $trx);
        // $billing = $this->db->get();
        // $billingdata = $billing->row();

        // $this->db->select("bagian");
        // $this->db->from("register");
        // $this->db->where("notransaksi", $trx);
        // $bagian = $this->db->get();
        // $bagiandata = $bagian->row();
        $bagiandata = "Umum";
        $no_kwi = sprintf("%06d", (int)$kwitansi->no_kwitansi + 1);
        $lunas = "1";
      
        // nomor transaksi sengaja diisikan nomor resep untuk pengujian nomor resep
        // notrx diisikan di catatan

        if ($notrxdata == null) {
            $simpan = array(
                "nokwi" => "" . date("Y") . "" . date("m") . "" . $no_kwi . "",
                "tglbiling" => date("Y-m-d"),
                "tglbayar" => date("Y-m-d"),
                "notrx" => $notrx_IN,
                "norm" => $rm,
                "bagian" => $bagiandata,
                "nilai" => $bayar,
                "asuransi" => 0,
                "nonasuransi" => $bayar,
                "selisih" => 0,
                "terbayar" => $bayar,
                "sisabayar" => 0,
                "lunas" => $lunas,
                "catatan" => $trx,
                "user" => $this->session->userdata("nmuser"),
                "lastlogin" => date("Y-m-d H:i:s"),
                "shift" => $shift,
            );
            $stat = $this->db->insert('billing_rekap', $simpan);
            if ($stat) {
                $ubahkwi = array(
                    'no_kwitansi' => (int)$kwitansi->no_kwitansi + 1
                );

                $this->db->where('id', $kwitansi->id);
                $this->db->update('setup_kwitansi_billing', $ubahkwi);

                return $stat;
            } else {
                return $stat;
            }
        } else {
            $ubah = array(
                "tglbayar" => date("Y-m-d"),
                "nilai" => $bayar,
                "asuransi" => 0,
                "nonasuransi" => $bayar,
                "selisih" => 0,
                "terbayar" => $bayar,
                "sisabayar" => 0,
                "lunas" => $lunas,
                "catatan" => $trx,
                "user" => $this->session->userdata("nmuser"),
                "lastlogin" => date("Y-m-d H:i:s"),
            );
            $this->db->where('notrx', $notrx_IN);
            $stat = $this->db->update('billing_rekap', $ubah);
            if ($stat) {
                return $stat;
            } else {
                return $stat;
            }
        }
        
     } 

    }


    public function ambilrekapbillingpelayanan() {

        /**
         * Ambil data rekap billing perhari
         * Backup, tidak dipakai
         */
        $shift = $this->input->get("shift");
        $this->db->select("pasien.no_rm as norm, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, billing_rekap.nokwi as nokwi, billing_rekap.tglbiling as tglbiling, billing_rekap.tglbayar as tglbayar, billing_rekap.notrx as notrx, billing_rekap.bagian as bagian, billing_rekap.nilai as nilai, billing_rekap.asuransi as asuransi, billing_rekap.selisih as selisih,billing_rekap.nonasuransi as nonasuransi ,billing_rekap.catatan as catatan");
        $this->db->from("billing_rekap");
        $this->db->join("pasien", "pasien.no_rm = billing_rekap.norm");
        $this->db->where("tglbayar", date("Y-m-d"));
        $this->db->where("shift", $shift);
        $this->db->order_by("billing_rekap.tglbayar", "DESC");
        $data = $this->db->get();
        return $data->result();
    }

    public function totaljumlahBayarpelyanan_old() {

        /**
         * total jumlah pembayaran billing perhari
         */

        $shift = $this->input->get("shift");
        $user = $this->session->userdata("nmuser");
        $this->db->select_sum("terbayar");
        // $this->db->select("terbayar as total");
        $this->db->from("billing_rekap");
        $this->db->where("tglbayar", date("Y-m-d"));
        $this->db->where("shift", $shift);
        $this->db->where("user", $user);
        $data = $this->db->get();
        return $data->row();
    }


    public function totaljumlahBayarpelyanan() {

        /**
         * total jumlah pembayaran billing perhari
         */

        $shift = $this->input->get("shift");
        $user = $this->session->userdata("nmuser");
        $hariini=date("Y-m-d");
        $data=$this->db->query("SELECT SUM(terbayar) as total FROM billing_rekap where tglbayar='$hariini' and  shift='$shift' and user='$user' ");

        // $this->db->select_sum("terbayar");
        // // $this->db->select("terbayar as total");
        // $this->db->from("billing_rekap");
        // $this->db->where("tglbayar", date("Y-m-d"));
        // $this->db->where("shift", $shift);
        // $this->db->where("user", $user);
        // $data = $this->db->get();
        return $data->row();
    }
    

    public function count_all_billing() {

        /**
         * jumlah total pagination billing rekap
         */

        $shift = $this->input->get("shift");
        $user = $this->session->userdata("nmuser");
        $this->db->select("billing_rekap.id as id");
        $this->db->from("billing_rekap");
        $this->db->where("tglbayar", date("Y-m-d"));
        $this->db->where("shift", $shift);
        $this->db->where("user", $user);
        $this->db->order_by("billing_rekap.tglbayar", "DESC");
        $data = $this->db->get();
        return $data->num_rows();
    }

    function fetch_details_rekap_billing($limit, $start) {

        /**
         * Fetch data billing rekap perhari untuk pagination
         */

        $tot = $this->totaljumlahBayarpelyanan();
        $total = "0";
        if ($tot->total == null) {
            $total = "0";
        } else {
            $total = "".$tot->total."";
        }

        $output = '';
        $shift = $this->input->get("shift");
        $user = $this->session->userdata("nmuser");
        $this->db->select("pasien.no_rm as norm, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, billing_rekap.nokwi as nokwi, billing_rekap.tglbiling as tglbiling, billing_rekap.tglbayar as tglbayar, billing_rekap.notrx as notrx, billing_rekap.bagian as bagian, billing_rekap.nilai as nilai, billing_rekap.asuransi as asuransi, billing_rekap.nonasuransi as nonasuransi, billing_rekap.selisih as selisih, billing_rekap.terbayar as terbayar, billing_rekap.sisabayar as sisabayar, billing_rekap.catatan as catatan");
        $this->db->from("billing_rekap");
        $this->db->join("pasien", "pasien.no_rm = billing_rekap.norm");
        $this->db->where("billing_rekap.tglbayar", date("Y-m-d"));
        $this->db->where("billing_rekap.shift", $shift);
        $this->db->where("billing_rekap.user", $user);
        $this->db->order_by("billing_rekap.tglbayar", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $output .= '
        <div class="row">
            <div class="col-sm-12 text-right">
                <h4>Total Penerimaan: '.groupangka($total).'</h4>  
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
        <table class="table table-bordered" id="">
            <thead>
                <tr>
                    <th width=3% >No.</th>
                    <th width=7%>No. Kwitansi</th>
                    <th width=7%>No. Transaksi</th>
                    <th width=5%>No. RM</th>
                    <th width=14%>Nama</th>
                    <th width=6% style="text-align:center;">Tgl.Billing</th>
                    <th width=6% style="text-align:center;">Tgl.Bayar</th>
                    <th width=7% style="text-align:right;">Jumlah Harga</th>
                    <th width=7% style="text-align:right;">Asuransi</th>
                    <th width=7% style="text-align:right;">Non Asuransi</th>
                    <th width=7% style="text-align:right;">Selisih Kelas</th>
                    <th width=10% style="text-align:right;">Sudah Terbayar</th>
                    <th width=7% style="text-align:right;">Bayar Skrg</th>
                    <th width=7% style="text-align:right;">Sisa</th>
                </tr>
            </thead>
            <tbody>
		';
        $no = $start;
        if ($query->result() == null) {
            $output .='
             <tr>
                <td colspan="14" class="text-center">
                    Tidak Ada Data
                </td>
            </tr>            
            ';
        } else {
            
            foreach($query->result() as $row) {
                   
                $notrxnya=$row->notrx;
                // $sisa = (int)$row->nilai - (int)$row->selisih;
                // $sisa = (int)$row->nonasuransi - (int)$row->selisih;
                $qry2=$this->db->query("SELECT sum(terbayar) as xjumlah FROM billing_rekap where notrx = '$notrxnya' group by notrx ");
                foreach ($qry2->result_array() as $brs2) {
                    $sdhdibayar =$brs2['xjumlah'];
                }           
                $sisabayar=$row->nonasuransi+$row->selisih-$sdhdibayar;

                $output .= '
                <td>'. ++$no .'</td>
                <td>'.$row->nokwi.'</td>
                <td>'.$row->notrx.'</td>
                <td>'.$row->norm.'</td>
                <td>'.$row->nama_pasien.'</td>
                <td align="center">'.tanggaldua($row->tglbiling).'</td>
                <td align="center">'.tanggaldua($row->tglbayar).'</td>
                <td align="right">'.groupangka($row->nilai).'</td>
                <td align="right">'.groupangka($row->asuransi).'</td>
                <td align="right">'.groupangka($row->nonasuransi).'</td>
                <td align="right">'.groupangka($row->selisih).'</td>
                <td align="right">'.groupangka($sdhdibayar).'</td>
                <td align="right">'.groupangka($row->terbayar).'</td>
                <td align="right">'.groupangka($sisabayar).'</td>
                </tr>
                ';
            }
        }
        $output .= '</tbody></table></div></div>';
        return $output;
    }

    public function tutuprekapbilling() {

        /**
         * tutup pembayaran di rekap billing
         */

        $this->db->select("id, notrx");
        $this->db->from("billing_rekap");
        $this->db->where("tglbayar", date("Y-m-d"));
        $this->db->order_by("tglbayar", "DESC");
        $data = $this->db->get();
        $result = $data->result();
        if ($result == null) {
            return false;
        } else {
            foreach ($result as $row) {
                $ubahregis = array(
                    "tgltutup" => date("Y-m-d"),
                    "billing" => "1",
                    "user2" => $this->session->userdata("nmuser"),
                    "lastlogin" => date("Y-m-d H:i:s"),
                );
                $this->db->where('notransaksi', $row->notrx);
                $this->db->update('register', $ubahregis);

                $ubahrekap = array(
                    "tutup" => "1",
                    "user" => $this->session->userdata("nmuser"),
                    "lastlogin" => date("Y-m-d H:i:s"),
                );
                $this->db->where('id', $row->id);
                $this->db->update('billing_rekap', $ubahrekap);
            }
            return true;
        }
    }

    public function cekjumlahrekapinihari() {

        /**
         * Cek jumlah Rekanp Billing ini hari
         */

        $shift = $this->input->get("shift");
        $user = $this->session->userdata("nmuser");
        $this->db->select("billing_rekap.id as id");
        $this->db->from("billing_rekap");
        $this->db->where("tglbayar", date("Y-m-d"));
        $this->db->where("tutup", "1");
        $this->db->where("shift", $shift);
        $this->db->where("user", $user);
        $this->db->order_by("billing_rekap.tglbayar", "DESC");
        $data = $this->db->get();
        return $data->num_rows();
    }

    public function postingdataproses() {

        /**
         * Posting data untuk rekap billing
         */

        $notrx = $this->input->get("trx");
        $norm = $this->input->get("rm");
        $stat = $this->input->get("st");
        $carabayar = $this->input->get("cb");
        $selisihkelas_s = $this->input->get("selisihkelas");
        $selisihkelas=preg_replace('/\D/', '', $selisihkelas_s);

        $xnotransaksi=$notrx;
        $xnotransaksi1=$notrx;
        $xno_rm=$norm;
        $this->db->delete('billing',array('notransaksi'=>$xnotransaksi,'no_rm'=>$xno_rm));

        $qry1=$this->db->query("update register set status_billing='".$stat."', selisih='".$selisihkelas."' where notransaksi='".$xnotransaksi."' AND no_rm='".$xno_rm."' LIMIT 1");        
        $qry1=$this->db->query("update register_instalasi set status_billing='".$stat."' where notransaksi='".$xnotransaksi."' AND no_rm='".$xno_rm."'");        
        
        $qry2=$this->db->query("SELECT register.golongan as golongan,register.status as xstatusregister FROM register where notransaksi='".$xnotransaksi."' AND no_rm='".$xno_rm."' LIMIT 1");

        foreach ($qry2->result_array() as $brs9) {
            $xgil9=$brs9['golongan'];
            $xgolongannya=trim($xgil9);
            $xstatusregister=$brs9['xstatusregister'];
        }

        $qry1=$this->db->query("SELECT *, register_detail.id as idnya, register_detail.status as xstatusnya,register.bagian as bagian FROM register_detail INNER JOIN pasien ON register_detail.no_rm=pasien.no_rm INNER JOIN register ON register.notransaksi = register_detail.notransaksi WHERE register_detail.notransaksi='".$xnotransaksi."' AND register_detail.no_rm='".$xno_rm."'  ORDER BY register_detail.tgl_keluar_kamar ASC, register_detail.id ASC");
        
        foreach ($qry1->result_array() as $brs1) {
            $xkode_kamar=$brs1['kode_kamar'];
            $xtglmsk=$brs1['tgl_masuk_kamar'];
            $pecahkan = explode('-', $xtglmsk);
            $xtglmsk1=$pecahkan[0] . '-' . $pecahkan[1] . '-' . $pecahkan[2];
            $xtglklr=$brs1['tgl_keluar_kamar'];
            $pecahkan1 = explode('-', $xtglklr);
            $xtglklr1=$pecahkan1[0] . '-' . $pecahkan1[1] . '-' . $pecahkan1[2];

            $xkode_unit=$brs1['kode_unit'];
            $xkode_kelas=$brs1['kode_kelas'];
            $xno_rm1=$brs1['no_rm'];
            $xregisterdetailstatus=$brs1['xstatusnya'];
            $xidnya=$brs1['idnya'];

            //coba ambil ini $brs1['bagian'] dari register
            $xpelayanannya=$brs1['bagian'];

            if ($xpelayanannya=='JALAN'){
                $xtglklr=$brs1['tgl_masuk_kamar'];
                $pecahkan = explode('-', $xtglklr);
                $xtglklr1=$pecahkan[0] . '-' . $pecahkan[1] . '-' . $pecahkan[2];
            }
            
            if ($xtglklr1=='0000-00-00') {
                $xtglklr=date("Y-m-d");
                $pecahkan = explode('-', $xtglklr);
                $xtglklr1=$pecahkan[0] . '-' . $pecahkan[1] . '-' . $pecahkan[2];
            }

            $xnama_pasien = "";
            $xnama_unit = "";

            $xnotransaksi=$brs1['notransaksi'];
            $xno_transaksi_secondary=$brs1['no_transaksi_secondary'];

            //=======RAWAT INAP=======
            if ($xpelayanannya<>'JALAN' and $xnotransaksi==$xno_transaksi_secondary) {
                //*-------------------kamar perawatan
                $xjasas=0;
                $qry2=$this->db->query("SELECT * FROM mkamar WHERE kode_kamar = '".$xkode_kamar."' LIMIT 1");               
                foreach ($qry2->result_array() as $brs2) {
                    $xnama_kamar=$brs2['nama_kamar'];
                    $xjasas=$brs2['harga'];
                }
                $qry31=$this->db->query("SELECT * FROM munit WHERE kode_unit = '". $xkode_unit."' LIMIT 1");               
                foreach ($qry31->result_array() as $brs31) {
                    $xilahir=$brs31['ILAHIR'];
                    $xigd=$brs31['IGD'];
                }

                $xnotransaksi=$brs1['notransaksi'];
                $xnama_pasien=$brs1['nama_pasien'];
                $xtanggal=$brs1['tgl_masuk'];
                

                $xtgl_masuknya=$brs1['tgl_masuk_kamar'];

                if ($xregisterdetailstatus <> 0){
                    $qry19=$this->db->query("SELECT tgl_keluar_kamar,(tgl_keluar_kamar-tgl_masuk_kamar) as xqty FROM register_detail WHERE id='".$xidnya."'");
                    foreach ($qry19->result_array() as $brs19) {
                        $xqty=$brs19['xqty'];
                        $xtgl_keluarnya=$brs19['tgl_keluar_kamar'];                       
                    }  
                } else {    
                    $qry19=$this->db->query("SELECT (CURDATE()-tgl_masuk_kamar) as xqty FROM register_detail WHERE id='".$xidnya."'");
                    foreach ($qry19->result_array() as $brs19) {
                        $xqty=$brs19['xqty'];
                        $xtgl_keluarnya=date("Y-m-d");
                    }                  
                }
                
                $xket1=substr($xtgl_masuknya,8,2).'-'.substr($xtgl_masuknya,5,2).'-'.substr($xtgl_masuknya,0,4).' s/d '.substr($xtgl_keluarnya,8,2).'-'.substr($xtgl_keluarnya,5,2).'-'.substr($xtgl_keluarnya,0,4);

                if (($xilahir<>'1' or $xigd<>'1') and  $xqty==0) {$xqty=1;} 
                    
                $xket2='Hari';
                $xkode=0;
                $xrincian='KAMAR PERAWATAN';
                $xnama_unit=$brs1['nama_unit'];
                
                $data = array('no_rm'=>$xno_rm,
                                'nama_pasien'=>$xnama_pasien,
                                'tanggal'=>$xtanggal,
                                'ket1'=>$xket1,
                                'qty'=>$xqty,
                                'ket2'=>$xket2,
                                'kode'=>$xkode,
                                'rincian'=>$xrincian,
                                'jasas'=>$xjasas,
                                'kode_unit'=>$xkode_unit,
                                'nama_unit'=>$xnama_unit,
                                'notransaksi'=>$xnotransaksi);
                $this->db->insert('billing',$data);

                //*-------------------visite
                //$qry2=$this->db->query("SELECT * FROM t_visite WHERE tanggal = '".$xkode_kelas."' ");
                
                $qry3=$this->db->query("select * from t_visite where tanggal>='".$xtglmsk."' and tanggal<='".$xtglklr."' and kode_unit='".$xkode_unit."' and notransaksi='".$xnotransaksi."' order by tanggal");
                // $qry3=$this->db->query("select * from t_visite where tanggal>='2018-05-21' and tanggal<='2018-05-21' and kode_unit='".$xkode_unit."' and notransaksi='".$xnotransaksi."' order by tanggal");
                //$qry3=$this->db->query("select * from t_visite where notransaksi='".$xnotransaksi."' and kode_unit='".$xkode_unit."' order by tanggal");
                
                foreach ($qry3->result_array() as $brs3) {
                    //$xnama_kelas=$brs3['nama_kelas'];  hA RUS DITAU NAMA KELASNYA UNTUK DIAMBIL BILAINYA
                    
                    $xnotransaksi=$brs3['notransaksi'];
                    $xtanggal=$brs3['tanggal'];
                    $xket1=$brs3['visite'];
                    $xqty2=1;
                    $xket2=$brs3['nama_dokter'];
                    $xkode2=1;
                    $xrincian='KUNJUNGAN DOKTER';
                    
                
                    //mencari nilai dari kunjungan dokter
                    
                    $xvis=0;
                    $xkds=0;
                    $xkdu=0;
                    $xkdc=0;
                    $xkdss=0;
                    $xkdi=0;

                    $qry31=$this->db->query("SELECT * FROM mkelas WHERE kode_kelas = '". $xkode_kelas."' LIMIT 1");
                    //$qry31=$this->db->query("SELECT * FROM mkelas WHERE kode_kelas = '02' LIMIT 1 ");
                    foreach ($qry31->result_array() as $brs31) {
                        //$xnama_kamar=$brs31['nama_kamar'];
                        $xvis=$brs31['vis'];
                        $xkds=$brs31['kds'];
                        $xkdu=$brs31['kdu'];
                        $xkdc=$brs31['kdc'];
                        $xkdss=$brs31['kdss'];
                        $xkdi=$brs31['kdi'];
                    }

                    //cari nilai kunjungan dokter...
                    
                    $xjasas=0;
                    
                    if($xket1=='VISITE') {$xjasas=$xvis;}
                    if($xket1=='KONSUL SPESIALIS') {$xjasas=$xkds;}
                    if($xket1=='DOKTER UGD') {$xjasas=$xkdi;}
                    if($xket1=='DOKTER UMUM') {$xjasas=$xkdu;}
                    if($xket1=='KONSUL SUB SPESIALIS') {$xjasas=$xkdss;}
                    if($xket1=='KONSUL CYTO-DOKTER IGD') {$xjasas=$xkdc;}
                /*
                    if($xket2=='VISITE') {$xjasas=100;}
                    if($xket2=='KONSUL SPESIALIS') {$xjasas=200;}
                    if($xket2=='DOKTER UGD') {$xjasas=80;}
                    if($xket2=='DOKTER UMUM') {$xjasas=90;}
                    if($xket2=='KONSUL SUB SPESIALIS') {$xjasas=200;}
                    if($xket2=='KONSUL CYTO-DOKTER IGD') {$xjasas=130;}
                    */
                    $data = array('no_rm'=>$xno_rm,
                                    'nama_pasien'=>$xnama_pasien,
                                    'tanggal'=>$xtanggal,
                                    'ket1'=>$xket1,
                                    'qty'=>$xqty2,
                                    'ket2'=>$xket2,
                                    'kode'=>$xkode2,
                                    'rincian'=>$xrincian,
                                    'jasas'=>$xjasas,
                                    'kode_unit'=>$xkode_unit,
                                    'nama_unit'=>$xnama_unit,
                                    'notransaksi'=>$xnotransaksi);
                    $this->db->insert('billing',$data);				
                } 

                //*-------------------tindakan keperawatan
                
                $qry4=$this->db->query("select * from ptindakanperawat where tanggal>='".$xtglmsk."' and tanggal<='".$xtglklr."' and kode_unit='".$xkode_unit."' and no_rm='".$xno_rm1."' order by tanggal");
                
                foreach ($qry4->result_array() as $brs4) {
                    
                    $xjasas=$brs4['jasas'];				
                    $xnotransaksi=$brs4['notransaksi'];
                    $xtanggal=$brs4['tanggal'];
                    $xket1=$brs4['tindakan'];
                    $xqty2=$brs4['qty'];
                    $xket2=$brs4['nama_dokter'];
                    $xkode2=2;
                    $xrincian1='TINDAKAN KEPERAWATAN';
                    $xjasas=$brs4['jasas'];
                    $xjasap=$brs4['jasap'];
                    $xnonasuransi=$brs4['nonasuransi'];
                    $xdiskon=$brs4['diskon'];

                
                    $data = array('no_rm'=>$xno_rm,
                                    'nama_pasien'=>$xnama_pasien,
                                    'tanggal'=>$xtanggal,
                                    'ket1'=>$xket1,
                                    'qty'=>$xqty2,
                                    'ket2'=>$xket2,
                                    'kode'=>$xkode2,
                                    'rincian'=>$xrincian1,
                                    'jasas'=>$xjasas,
                                    'jasap'=>$xjasap,
                                    'kode_unit'=>$xkode_unit,
                                    'nama_unit'=>$xnama_unit,
                                    'notransaksi'=>$xnotransaksi,
                                    'nonasuransi'=>$xnonasuransi,
                                    'diskon'=>$xdiskon);
                    $this->db->insert('billing',$data);	             			
                }		
            } else {

                //*-------------------tindakan poli                
                //$qry4=$this->db->query("select * from ptindakan where tanggal>='".$xtglmsk1."' and tanggal<='".$xtglklr1."' and kode_unit='".$xkode_unit."' and no_rm='".$xno_rm1."' order by tanggal");
                //diganti karena lebih mudah dgn nomor transaksi
                $qry4=$this->db->query("select * from ptindakan where (notransaksi='".$xnotransaksi."' or notransaksi='".$xno_transaksi_secondary."') and kode_unit='".$xkode_unit."' and no_rm='".$xno_rm1."' order by tanggal");
                
                foreach ($qry4->result_array() as $brs4) {
                    
                    $xjasas=$brs4['jasas'];				
                    //$xnotransaksi=$brs4['notransaksi']; diarahkan ke $xnotransaks1
                    $xtanggal=$brs4['tanggal'];
                    $xket1=$brs4['tindakan'];
                    $xqty2=$brs4['qty'];
                    $xket2=$brs4['nama_dokter'];
                    $xkode2=2;
                    $xrincian1='TINDAKAN';
                    $xjasas=$brs4['jasas'];
                    $xjasap=$brs4['jasap'];
                    $xnonasuransi=$brs4['nonasuransi'];


                    $xdiskon=$brs4['diskon']*($xjasas+$xjasap)/100;
                    $xnama_unit=$brs4['nama_unit'];

                
                    $data = array('no_rm'=>$xno_rm,
                                    'nama_pasien'=>$xnama_pasien,
                                    'tanggal'=>$xtanggal,
                                    'ket1'=>$xket1,
                                    'qty'=>$xqty2,
                                    'ket2'=>$xket2,
                                    'kode'=>$xkode2,
                                    'rincian'=>$xrincian1,
                                    'jasas'=>$xjasas,
                                    'jasap'=>$xjasap,
                                    'kode_unit'=>$xkode_unit,
                                    'nama_unit'=>$xnama_unit,
                                    'notransaksi'=>$xnotransaksi1,
                                    'nonasuransi'=>$xnonasuransi,
                                    'diskon'=>$xdiskon);
                    $this->db->insert('billing',$data);	             			
                }


            }

            // //*-------------------BHP
            // // 8 meret 2020 coba di hapus dulu ini karena pembacaannya dibuat secara keseluruhan saja
            // $qry6=$this->db->query("select * from pbhp where nonbill=0 and notransaksi='".$xnotransaksi."' and kode_unit='".$xkode_unit."' order by tanggal");

            // foreach ($qry6->result_array() as $brs6) {
            //     $xnotransaksi=$brs6['notransaksi'];
            //     $xtanggal=$brs6['tanggal'];
            //     $xket1=$brs6['namaobat'];
            //     $xqty2=$brs6['qty'];
            //     $xket2='' ;//$brs6['satuanpakai'];
            //     $xkode2=3;
            //     $xrincian1='PEMAKAIAN BHP';
            //     $xjasas=$brs6['hargapakai'];
            //     $xjasap=0;

            //     $data = array('no_rm'=>$xno_rm,
            //                     'nama_pasien'=>$xnama_pasien,
            //                     'tanggal'=>$xtanggal,
            //                     'ket1'=>$xket1,
            //                     'qty'=>$xqty2,
            //                     'ket2'=>$xket2,
            //                     'kode'=>$xkode2,
            //                     'rincian'=>$xrincian1,
            //                     'jasas'=>$xjasas,
            //                     'jasap'=>$xjasap,
            //                     'kode_unit'=>$xkode_unit,
            //                     'nama_unit'=>$xnama_unit,
            //                     'notransaksi'=>$xnotransaksi);
            //     $this->db->insert('billing',$data);
            // }      
                
            //*-------------------O2
            //$qry2=$this->db->query("SELECT * FROM t_visite WHERE tanggal = '".$xkode_kelas."' ");				
            $qry5=$this->db->query("select * from po2 where tgl_pakai>='".$xtglmsk."' and tgl_pakai<='".$xtglklr."' and kode_unit='".$xkode_unit."' and no_rm='".$xno_rm1."' order by tgl_pakai");
            
            foreach ($qry5->result_array() as $brs5) {
                $xnotransaksi=$brs5['notransaksi'];
                $xtanggal=$brs5['tgl_pakai'];
                $xket1='PEMAKAIAN O2';
                $xqty2=$brs5['qty'];
                $xket2='';
                $xkode2=4;
                $xrincian1='PEMAKAIAN O2';
                //ambil harga 02
                $xhargaO2=0;
                $qry31=$this->db->query("SELECT * FROM mharga02 LIMIT 1");
                foreach ($qry31->result_array() as $brs31) {
                    //$xnama_kamar=$brs31['nama_kamar'];
                    $xhargaO2=$brs31['liter'];
                }
                $xjasas=$xhargaO2;
                $xjasap=0;             
                $data = array('no_rm'=>$xno_rm,
                                'nama_pasien'=>$xnama_pasien,
                                'tanggal'=>$xtanggal,
                                'ket1'=>$xket1,
                                'qty'=>$xqty2,
                                'ket2'=>$xket2,
                                'kode'=>$xkode2,
                                'rincian'=>$xrincian1,
                                'jasas'=>$xjasas,
                                'jasap'=>$xjasap,
                                'kode_unit'=>$xkode_unit,
                                'nama_unit'=>$xnama_unit,
                                'notransaksi'=>$xnotransaksi);
                $this->db->insert('billing',$data);           				
            }		
          
            
        } //end billing process looping kamar
        	
        
        //*-------------------LABORATORIUM
        // $qry6=$this->db->query("select * from ptindakan_instalasi where tanggal>='".$xtglmsk1."' and tanggal<='".$xtglklr1."' and kode_unit='0301' and no_rm='".$xno_rm1."' order by tanggal");

        $qry6=$this->db->query("select * from ptindakan_instalasi where (notransaksi='".$xnotransaksi."' or notransaksi='".$xno_transaksi_secondary."') and kode_unit='LABS' and no_rm='".$xno_rm1."' order by tanggal");

        foreach ($qry6->result_array() as $brs6) {
            $xnotransaksi=$brs6['notransaksi'];
            $xnotransaksi_IN=$brs6['notransaksi_IN'];
            $xtanggal=$brs6['tanggal'];
            $xkode_tindakan=$brs6['tindakan'];
            $qry21=$this->db->query("SELECT * FROM mtindakan WHERE kode_tindakan = '".$xkode_tindakan."' LIMIT 1");
            $xtindakan='';
            foreach ($qry21->result_array() as $brs21) {
                $xtindakan=$brs21['tindakan'];
            }
            $nama_dokter_periksa1='';
            $qry22=$this->db->query("SELECT * FROM register_instalasi WHERE notransaksi_IN = '".$xnotransaksi_IN."' LIMIT 1");
            foreach ($qry22->result_array() as $brs22) {
                $nama_dokter_periksa1=$brs22['nama_dokter_periksa'];
                $nama_dokter_pemesan=$brs22['nama_dokter'];
                $nama_unit_pemesan=$brs22['nama_unitR'];
            }

            $xket1=strtoupper($xtindakan);
            $xqty2=$brs6['qty'];
            $xket2=$nama_dokter_periksa1;
            $xkode2=5;
            $xrincian1='LABORATORIUM';
            $xjasas=$brs6['jasas'];
            $xjasap=$brs6['jasap'];
            $kdun=$brs6['kode_unit'];
            $xnonasuransi=$brs6['nonasuransi'];
            $xdiskon=$brs6['diskon']*($xjasas+$xjasap)/100;


            $data = array('no_rm'=>$xno_rm,
                            'nama_pasien'=>$xnama_pasien,
                            'tanggal'=>$xtanggal,
                            'ket1'=>$xket1,
                            'qty'=>$xqty2,
                            'ket2'=>$xket2,
                            'ket3'=>$nama_unit_pemesan,
                            'ket4'=>$xnotransaksi_IN,
                            'kode'=>$xkode2,
                            'rincian'=>$xrincian1,
                            'jasas'=>$xjasas,
                            'jasap'=>$xjasap,
                            'kode_unit'=>$kdun,
                            'nama_unit'=>$xrincian1, 
                            'notransaksi'=>$xnotransaksi,
                            'nonasuransi'=>$xnonasuransi,
                            'diskon'=>$xdiskon);
            $this->db->insert('billing',$data);
        }

        //*-------------------RADIOLOGI
        $qry7=$this->db->query("select * from ptindakan_instalasi where (notransaksi='".$xnotransaksi."' or notransaksi='".$xno_transaksi_secondary."') and kode_unit='RDLG' and no_rm='".$xno_rm1."' order by tanggal");
        foreach ($qry7->result_array() as $brs7) {
            $xnotransaksi=$brs7['notransaksi'];
            $xnotransaksi_IN=$brs7['notransaksi_IN'];
            $xtanggal=$brs7['tanggal'];
            $xkode_tindakan=$brs7['tindakan'];
            $qry21=$this->db->query("SELECT * FROM mtindakan WHERE kode_tindakan = '".$xkode_tindakan."' LIMIT 1");
            foreach ($qry21->result_array() as $brs21) {
                $xtindakan=$brs21['tindakan'];
            }
            $nama_dokter_periksa1='';
            $qry22=$this->db->query("SELECT * FROM register_instalasi WHERE notransaksi_IN = '".$xnotransaksi_IN."' LIMIT 1");
            foreach ($qry22->result_array() as $brs22) {
                $nama_dokter_periksa1=$brs22['nama_dokter_periksa'];
                $nama_dokter_pemesan=$brs22['nama_dokter'];
                $nama_unit_pemesan=$brs22['nama_unitR'];
            }

            $xket1=$xtindakan;
            $xqty2=$brs7['qty'];
            $xket2=$nama_dokter_periksa1;
            $xkode2=6;
            $xrincian1='RADIOLOGI';
            $xjasas=$brs7['jasas'];
            $xjasap=$brs7['jasap'];
            $kdun=$brs7['kode_unit'];
            $xnonasuransi=$brs7['nonasuransi'];
            $xdiskon=$brs7['diskon']*($xjasas+$xjasap)/100;

            $data = array('no_rm'=>$xno_rm,
                            'nama_pasien'=>$xnama_pasien,
                            'tanggal'=>$xtanggal,
                            'ket1'=>$xket1,
                            'qty'=>$xqty2,
                            'ket2'=>$xket2,
                            'ket3'=>$nama_unit_pemesan,
                            'ket4'=>$xnotransaksi_IN,
                            'kode'=>$xkode2,
                            'rincian'=>$xrincian1,
                            'jasas'=>$xjasas,
                            'jasap'=>$xjasap,
                            'kode_unit'=>$kdun,
                            'nama_unit'=>$xrincian1,
                            'notransaksi'=>$xnotransaksi,
                            'nonasuransi'=>$xnonasuransi,
                            'diskon'=>$xdiskon);
            $this->db->insert('billing',$data);
        }


        
        //*-------------------TINDAKAN BANK DARAH ????????????????????????????????
        $qry71=$this->db->query("select * from mhargadarah ");
        foreach ($qry71->result_array() as $brs71) { 
            $xhargadarah=$brs71['hargadarah'];
        }    

        $qry7=$this->db->query("select * from pdarah where tanggal>='".$xtglmsk."' and tanggal<='".$xtglklr."' and (notransaksi='".$xnotransaksi."' or notransaksi='".$xno_transaksi_secondary."') and no_rm='".$xno_rm1."' order by tanggal");

        foreach ($qry7->result_array() as $brs7) {
            $xnotransaksi=$brs7['notransaksi'];
            $xtanggal=$brs7['tanggal'];
            $xket1="Pemakaian Kantong Darah";
            $xqty2=$brs7['qty'];
            $xket2=$brs7['goldarah'];
            $xkode2=7;
            $xrincian1='UTDRS';
            $xjasas=$xhargadarah;
            $xjasap=0;
            $xnonasuransi=$brs7['nonasuransi'];
            $xdiskon=$brs7['diskon']*($xjasas+$xjasap)/100;
            $data = array('no_rm'=>$xno_rm,
                            'nama_pasien'=>$xnama_pasien,
                            'tanggal'=>$xtanggal,
                            'ket1'=>$xket1,
                            'qty'=>$xqty2,
                            'ket2'=>$xket2,
                            'kode'=>$xkode2,
                            'rincian'=>$xrincian1,
                            'jasas'=>$xjasas,
                            'jasap'=>$xjasap,
                            'kode_unit'=>$xkode_unit,
                            'nama_unit'=>$xnama_unit,
                            'notransaksi'=>$xnotransaksi,
                            'nonasuransi'=>$xnonasuransi,
                            'diskon'=>$xdiskon);
            $this->db->insert('billing',$data);
        }

        //---------HEMODIALISA
        $qry4=$this->db->query("select * from ptindakan where tanggal>='".$xtglmsk."' and tanggal<='".$xtglklr."' and kode_unit='HMDL' and no_rm='".$xno_rm1."' order by tanggal");
                
        foreach ($qry4->result_array() as $brs4) {
            
            $xjasas=$brs4['jasas'];				
            //$xnotransaksi=$brs4['notransaksi']; diarahkan ke $xnotransaks1
            $xtanggal=$brs4['tanggal'];
            $xket1=$brs4['tindakan'];
            $xqty2=$brs4['qty'];
            $xket2=$brs4['nama_dokter'];
            $xkode2=8;
            $xrincian1='HEMODIALISA';
            $xjasas=$brs4['jasas'];
            $xjasap=$brs4['jasap'];
            $xnonasuransi=$brs4['nonasuransi'];


            $xdiskon=$brs4['diskon']*($xjasas+$xjasap)/100;
            $xnama_unit=$brs4['nama_unit'];

        
            $data = array('no_rm'=>$xno_rm,
                            'nama_pasien'=>$xnama_pasien,
                            'tanggal'=>$xtanggal,
                            'ket1'=>$xket1,
                            'qty'=>$xqty2,
                            'ket2'=>$xket2,
                            'kode'=>$xkode2,
                            'rincian'=>$xrincian1,
                            'jasas'=>$xjasas,
                            'jasap'=>$xjasap,
                            'kode_unit'=>$xkode_unit,
                            'nama_unit'=>$xnama_unit,
                            'notransaksi'=>$xnotransaksi1,
                            'nonasuransi'=>$xnonasuransi,
                            'diskon'=>$xdiskon);
            $this->db->insert('billing',$data);	             			
        }
    


        //*-------------------KAMAR OPERASI 
        
        
        // //*--ruang operasi ---> ruamg operasi diahapus krn thn 2017 dipakai skrg tidak
        // $xadaoperasi=0;
        // $qry71=$this->db->query("select * from register_instalasi where tanggal>='".$xtglmsk."' and tanggal<='".$xtglklr."' and kode_unit='0313' and no_rm='".$xno_rm1."' and notransaksi='".$xnotransaksi."' order by tanggal");
        // foreach ($qry71->result_array() as $brs71) {
        //     $xadaoperasi=1;
        //     //ambil harga kamar iperasi
        //     $hargakamaroperasi=1200000;
        //     //masukkan penggunaan kamar operasi
        //    //*-------------------kamar perawatan
        //    $xnotransaksi=$brs71['notransaksi'];
        //    $xnama_pasien=$brs71['nama_pasien'];
        //    $xtanggal=$brs71['tanggal'];
           
          
        //    $xket1=$brs71['tanggal'];
           
        //    $xqty=1;               
        //    $xket2='Opr';
        //    $xkode=0;
        //    $xrincian='KAMAR OPERASI';
        //    $xnama_unit=$brs71['nama_unit'];
           
        //    $data = array('no_rm'=>$xno_rm,
        //                    'nama_pasien'=>$xnama_pasien,
        //                    'tanggal'=>$xtanggal,
        //                    'ket1'=>$xket1,
        //                    'qty'=>$xqty,
        //                    'ket2'=>$xket2,
        //                    'kode'=>$xkode,
        //                    'rincian'=>$xrincian,
        //                    'jasas'=>$hargakamaroperasi,
        //                    'kode_unit'=>$xkode_unit,
        //                    'nama_unit'=>$xnama_unit,
        //                    'notransaksi'=>$xnotransaksi);
        //    $this->db->insert('billing',$data);              
        // }

        //tindakan kamar operasi
        // $qry72=$this->db->query("select * from ptindakanopr where tgl_periksa>='".$xtglmsk."' and tgl_periksa<='".$xtglklr."' and no_rm='".$xno_rm1."' and notransaksi='".$xnotransaksi."' order by tgl_periksa ");
        $qry72=$this->db->query("select * from ptindakanopr where no_rm='".$xno_rm1."' and notransaksi='".$xnotransaksi."' order by tgl_periksa ");
        foreach ($qry72->result_array() as $brs72) {
            $xnotransaksi=$brs72['notransaksi'];
            $xtanggal=$brs72['tgl_periksa'];
            $kode_tindakan=$brs72['tindakan'];
            $xket1='';
            $qry2=$this->db->query("SELECT tindakan FROM mtindakan WHERE kode_tindakan = '".$kode_tindakan."' LIMIT 1");          
            foreach ($qry2->result_array() as $brs2) {
                $xket1=$brs2['tindakan'];
            }
            $xqty2=1;
            $xket2=$brs72['nama_dokter'];
            $xkode2=9;
            $xrincian1='KAMAR OPERASI';
            $xjasas=$brs72['jasas'];
            $xjasap=$brs72['jasap'];
            $xkode_unit=$brs72['kode_unit'];
            $xnama_unit=$brs72['nama_unit'];
            $xdiskon=$brs72['diskon']*($xjasas+$xjasap)/100;
            $data = array('no_rm'=>$xno_rm,
                            'nama_pasien'=>$xnama_pasien,
                            'tanggal'=>$xtanggal,
                            'ket1'=>$xket1,
                            'qty'=>$xqty2,
                            'ket2'=>$xket2,
                            'kode'=>$xkode2,
                            'rincian'=>$xrincian1,
                            'jasas'=>$xjasas,
                            'jasap'=>$xjasap,
                            'kode_unit'=>$xkode_unit,
                            'nama_unit'=>$xnama_unit,
                            'notransaksi'=>$xnotransaksi,
                            'nonasuransi'=>$xnonasuransi,
                            'diskon'=>$xdiskon);
            $this->db->insert('billing',$data);
        }

         //*-------------------BHP KESELURUHAN
            // $xkode_unitcek='0313';
            // $qry6=$this->db->query("select * from pbhp where notransaksi='".$xnotransaksi."' and kode_unit='".$xkode_unitcek."' order by tanggal");
            // 8 maret 2020 dibuka secara keseluruhan untuk penggabungan satu kali baca
            // $qry6=$this->db->query("select * from pbhp where nonbill=0 and notransaksi='".$xnotransaksi."' order by tanggal");
            

            // foreach ($qry6->result_array() as $brs6) {
            //     $xnotransaksi=$brs6['notransaksi'];
            //     $xtanggal=$brs6['tanggal'];
            //     $xket1=$brs6['namaobat'];
            //     $xqty2=$brs6['qty'];
            //     $xket2='' ;//$brs6['satuanpakai'];
            //     $xkode2=3;
            //     $xrincian1='PEMAKAIAN BHP';
            //     $xjasas=$brs6['hargapakai'];
            //     $xjasap=0;
            //     $xkode_unit_all=$brs6['kode_unit'];
            //     $xnama_unit_all=$brs6['nama_unit'];

            //     $data = array('no_rm'=>$xno_rm,
            //                     'nama_pasien'=>$xnama_pasien,
            //                     'tanggal'=>$xtanggal,
            //                     'ket1'=>$xket1,
            //                     'qty'=>$xqty2,
            //                     'ket2'=>$xket2,
            //                     'kode'=>$xkode2,
            //                     'rincian'=>$xrincian1,
            //                     'jasas'=>$xjasas,
            //                     'jasap'=>$xjasap,
            //                     'kode_unit'=>$xkode_unit_all,
            //                     'nama_unit'=>$xnama_unit_all,
            //                     'notransaksi'=>$xnotransaksi);
            //     $this->db->insert('billing',$data);
            // }      

    //         if ($carabayar <> 'UMUM') {
    //     //*-------------------APOTIK
    //     $qry8=$this->db->query("select * from resep_header where tglresep>='".$xtglmsk1."' and tglresep<='".$xtglklr1."' and no_rm='".$xno_rm1."' order by tglresep,noresep ");
    //     foreach ($qry8->result_array() as $brs8) {
    //         $xnoresep=$brs8['noresep'];
    //         $xtanggal=$brs8['tglresep'];
    //         $xket1=$brs8['noresep'];
    //         $xqty2=1;
    //         $xket2=$brs8['nama_dokter'];
    //         $xkode2=12;
    //         $xrincian1='APOTIK';
    //         $xkode_unit=$brs8['kode_depo'];
    //         // $xnama_unit=$brs8['nama_depo'];
    //         $xnama_unit='APOTIK FARMASI';
    //         //--hitung jumlah nilai obat dan r
    //         $qry24=$this->db->query("SELECT sum(qty*hargapakai) as xjumhrg,sum(tuslag) as xjumr FROM resep_detail WHERE noresep = '".$xnoresep."' group by noresep ");
    //         foreach ($qry24->result_array() as $brs24) {
    //             $xjasas=$brs24['xjumhrg'];
    //             $xjasap=$brs24['xjumr'];
    //         }


    //         $data = array('no_rm'=>$xno_rm,
    //                         'nama_pasien'=>$xnama_pasien,
    //                         'tanggal'=>$xtanggal,
    //                         'ket1'=>$xket1,
    //                         'qty'=>$xqty2,
    //                         'ket2'=>$xket2,
    //                         'kode'=>$xkode2,
    //                         'rincian'=>$xrincian1,
    //                         'jasas'=>$xjasas,
    //                         'jasap'=>$xjasap,
    //                         'kode_unit'=>$xkode_unit,
    //                         'nama_unit'=>$xnama_unit,
    //                         'notransaksi'=>$xnotransaksi);
    //         $this->db->insert('billing',$data);
    //     }
    // }
        //-------------------Administrasi Loket
        
        $qry2=$this->db->query("SELECT tgl_keluar FROM register WHERE notransaksi = '".$xnotransaksi1."' LIMIT 1");          
            foreach ($qry2->result_array() as $brs2) {
                $xtgl_keluar_rs=$brs2['tgl_keluar'];
            }
            $xtanggal=$xtgl_keluar_rs;

            if ($xtanggal == '0000-00-00'){ 
                // ambil tgl terakhir billing
                $qry25=$this->db->query("SELECT tanggal FROM billing WHERE notransaksi = '".$xnotransaksi1."' order by tanggal desc LIMIT 1");          
                foreach ($qry25->result_array() as $brs25) {
                    $xtgl_nya=$brs25['tanggal'];
                }
                $xtanggal=$xtgl_nya; 
            }
            
            
            $xket1='Administrasi Loket';
            $xqty2=1;
            $xket2='';
            $xkode2=99;
            $xrincian1='Loket';
            $xjasas=0;

            if ($xpelayanannya=='JALAN'){ $xid=2; } else  { $xid=1; }


            $qry27=$this->db->query("SELECT * FROM madminloket where id=".$xid." Limit 1");
            foreach ($qry27->result_array() as $brs27) {
                $xtarifloket=$brs27['tarif'];
            }        
            $xjasas=$xtarifloket;
            $xjasap=0;
            $xkode_unit='';
            $xnama_unit='Administrasi RJ/RI';

            $data = array('no_rm'=>$xno_rm,
                            'nama_pasien'=>$xnama_pasien,
                            'tanggal'=>$xtanggal,
                            'ket1'=>$xket1,
                            'qty'=>$xqty2,
                            'ket2'=>$xket2,
                            'kode'=>$xkode2,
                            'rincian'=>$xrincian1,
                            'jasas'=>$xjasas,
                            'jasap'=>$xjasap,
                            'kode_unit'=>$xkode_unit,
                            'nama_unit'=>$xnama_unit,
                            'notransaksi'=>$xnotransaksi1);
            $this->db->insert('billing',$data);
        
        //masukkan non asuransi untuk semua yg golongan umum
        // if ($xgolongannya == "UMUM      ") {
        if ($xgolongannya == "UMUM") {
            $qry1=$this->db->query("update billing set nonasuransi='1' where notransaksi='".$xnotransaksi1."' AND no_rm='".$xno_rm."'");
            //$qry1=$this->db->query("update billing set nonasuransi='1'");
        }

    
            // $qry1=$this->db->query("update billing set nonasuransi='1'");
    

        //hitung total billing
        $qry21 = $this->db->query("SELECT sum(jasas*qty) as jumbil from billing WHERE notransaksi = '".$xnotransaksi1."' LIMIT 1 ");
        $qry21row = $qry21->row();
        if ($qry21row->jumbil == null) { $xtotalbillling = 0; } else { $xtotalbillling = $qry21row->jumbil; }

        //hitung total asuransi
        $qry22 = $this->db->query("SELECT sum(jasas*qty) as jumbil from billing WHERE notransaksi = '".$xnotransaksi1."' AND nonasuransi = 0 LIMIT 1 ");
        $qry22row = $qry22->row();
        if ($qry22row->jumbil == null) { $xtotalbilllingasuransi = 0; } else { $xtotalbilllingasuransi = $qry22row->jumbil; }

        //hitung total nonasuransi
        $qry23 = $this->db->query("SELECT sum(jasas*qty) as jumbil from billing WHERE notransaksi = '".$xnotransaksi1."' AND nonasuransi = 1 LIMIT 1 ");
        $qry23row = $qry23->row();
        if ($qry23row->jumbil == null) { $xtotalbilllingnonasuransi = 0; } else { $xtotalbilllingnonasuransi = $qry23row->jumbil; }
        
        // get golongan
        $qry24 = $this->db->query("SELECT asuransi, golongan from register WHERE notransaksi = '".$xnotransaksi1."' LIMIT 1");
        $qry24row = $qry24->row();
        $xgolongan = $qry24row->golongan;

        $tanggungasuransi = 0;
        if ($xgolongan == 'BPJS') { $tanggungasuransi = $xtotalbilllingasuransi; } else { $tanggungasuransi = 0; }
        // $sisabayar = $xtotalbillling - $tanggungasuransi;
        
  

        return array($xtotalbilllingnonasuransi, $xtotalbillling, $tanggungasuransi);
        //end billing process END    
    }

    // untuk apotek
    public function caridtbillingapotik() {
        $noresep = $this->input->get("noresep");
        $this->db->from("resep_header");
        $this->db->where("noresep", "".$noresep."");
        $data = $this->db->get();
        return $data->result();
    }



    public function caridtbillinginst() {
        $kode_unit = $this->input->get("kode_unit");
        $norminst = $this->input->get("norminst");
        $tglinst = $this->input->get("tglinst");
        $time = strtotime($tglinst);
        $tanggal = date('Y-m-d',$time);

        $this->db->from("register_instalasi");
        $this->db->where("kode_unit", "".$kode_unit."");
        $this->db->where("no_rm", "".$norminst."");
        $this->db->where("tanggal", "".$tanggal."");
        $data = $this->db->get();
        return $data->result();
    }

    public function detcaridtbillingapotik() {
        /**
         * panggil data biling dari tombol billing di list (Apotek)
         */

        $no = $this->input->get("id");
        $this->db->select("resep_header.noresep as noresep, resep_header.notraksaksi as notraksaksi, pasien.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, resep_header.golongan as golongan, resep_header.tglresep as tglresep, resep_header.idnoresep as idnoresep, resep_header.nama_dokter as nama_dokter");
        $this->db->from("resep_header");
        $this->db->join("pasien", "pasien.no_rm = resep_header.no_rm");
        $this->db->where("resep_header.idnoresep", $no);
        $data = $this->db->get();
        return $data->row();
    }

    public function caribayarapotik() {
        $noresep = $this->input->get("noresep");
        $this->db->from("resep_header");
        $this->db->where("noresep", "".$noresep."");
        $data = $this->db->get();
        return $data->row();
    }

    public function caribayarinst() {
        $notrx_IN = $this->input->get("notrx_IN");
        $this->db->from("register_instalasi");
        $this->db->where("notransaksi_IN", "".$notrx_IN."");
        $data = $this->db->get();
        return $data->row();
    }

    public function hitungapotikbilling() {

        /**
         * Hitung pada form billing apotek
         */

        $nores = $this->input->get("res");
        $norm = $this->input->get("rm");
    }

    public function bayarapotikbilling() {

        /**
         * Bayar pada form apotek
         */

        $nores = $this->input->get("res");
        $norm = $this->input->get("rm");
        $catatan = $this->input->get("cat");
        $nilai = $this->input->get("nr");
        $bayar = $this->input->get("pb");
    }

    
}


