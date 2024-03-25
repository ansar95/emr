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

    
    public function detcaridtbillingdokter($trx) {

        /**
         * ambil nama dokter
         */

        $this->db->select("nama_dokter");
        $this->db->from("register_detail");
        $this->db->where("notransaksi", $trx);
        $this->db->order_by("id", "DESC");
        $this->db->limit(1);
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


    public function berkasjumlahbayar_old2($no) {

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

            
            // get golongan
            $qry24 = $this->db->query("SELECT asuransi, golongan, tarifbilling from register WHERE notransaksi = '".$no."' LIMIT 1");
            $qry24row = $qry24->row();
            $xgolongan = $qry24row->golongan;
            //hitung total billing
            $xtotalbillling = $qry24row->tarifbilling;

            //hitung total asuransi
            if ($xgolongan == 'UMUM') { 
                $xtotalbilllingnonasuransi =  $xtotalbillling ;
                $xtotalbilllingasuransi =0 ;
                $tanggungasuransi = 0;
            } else {
                $xtotalbilllingnonasuransi =  0 ;
                $xtotalbilllingasuransi = $xtotalbillling ;
                $tanggungasuransi = $xtotalbillling ;
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
                    "status_billing" => "1",
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
        
        // $qry2=$this->db->query("SELECT register.golongan as golongan,register.status as xstatusregister FROM register where notransaksi='".$xnotransaksi."' AND no_rm='".$xno_rm."' LIMIT 1");

        // foreach ($qry2->result_array() as $brs9) {
        //     $xgil9=$brs9['golongan'];
        //     $xgolongannya=trim($xgil9);
        //     $xstatusregister=$brs9['xstatusregister'];
        // }


        $qry12=$this->db->query("SELECT register.golongan FROM register where notransaksi='".$xnotransaksi."' AND no_rm='".$xno_rm."' LIMIT 1");
        foreach ($qry12->result_array() as $brs10) {
            $xasuransi=$brs10['golongan'];
        }
        
        // ================= MULAI PROSES BILLING YG BARU ==========

     
        $xtotaltarip=0;   
        //kamar perawatan
        $xjumharga=0;
        // $qry1=$this->db->query("SELECT *, register.golongan as golongannya, register_detail.id as idnya, register_detail.status as xstatusnya,register.bagian as bagian FROM register_detail INNER JOIN pasien ON register_detail.no_rm=pasien.no_rm INNER JOIN register ON register.notransaksi = register_detail.notransaksi WHERE register_detail.notransaksi='$xnotransaksi' AND register_detail.no_rm='$xno_rm' and register_detail.kode_unit<>'IGDD' and register_detail.kode_unit<>'IGDP' and register_detail.kode_unit<>'KMBS' ORDER BY register_detail.tgl_keluar_kamar ASC, register_detail.id ASC");

        $qry1=$this->db->query("SELECT *, register.golongan as golongannya, register_detail.id as idnya, register_detail.status as xstatusnya,register.bagian as bagian FROM register_detail INNER JOIN pasien ON register_detail.no_rm=pasien.no_rm INNER JOIN register ON register.notransaksi = register_detail.notransaksi WHERE register_detail.notransaksi='$xnotransaksi' AND register_detail.no_rm='$xno_rm'  ORDER BY register_detail.tgl_keluar_kamar ASC, register_detail.id ASC");
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
                    $xgolongan=$brs1['golongannya'];
                    $xasuransi=$brs1['golongannya'];
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

                    $ztgl_keluar=$xtglklr1;
                    $xtgladmin=$ztgl_keluar;

                    $xnama_pasien = "";
                    $xnama_unit = "";

                    $xnotransaksi=$brs1['notransaksi'];
                    $xno_transaksi_secondary=$brs1['no_transaksi_secondary'];
                  
                    if ($xasuransi == 'UMUM') {
                        $keteranganbilling='PASIEN UMUM'; 
                        $nonas=0; 
                        $cetakumum=0;
                  } 
                  else {$keteranganbilling='JAMINAN'; $nonas=0; $cetakumum=1;}

                    //=======RAWAT INAP======= yg ditampilkan hanya yg bagian<>jalan
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
                            $qry19=$this->db->query("SELECT tgl_keluar_kamar,tgl_masuk_kamar FROM register_detail WHERE id='".$xidnya."'");
                            foreach ($qry19->result_array() as $brs19) {
                                $tglm=new DateTime($brs19['tgl_masuk_kamar']);
                                $tglk=new DateTime($brs19['tgl_keluar_kamar']);
                                $xqty = $tglk->diff($tglm)->days ;
                                $xtgl_keluarnya=$brs19['tgl_keluar_kamar'];                       
                            }  
                        } else {    
                        $qry19=$this->db->query("SELECT tgl_keluar_kamar,tgl_masuk_kamar FROM register_detail WHERE id='".$xidnya."'");
                            foreach ($qry19->result_array() as $brs19) {                            
                                $tglm=new DateTime($brs19['tgl_masuk_kamar']);
                                $tglk=new DateTime(date("Y-m-d"));
                                $xqty = $tglk->diff($tglm)->days ;
                                $xtgl_keluarnya=date("Y-m-d");
                            }    
                        }
                        
                        $xket1=substr($xtgl_masuknya,8,2).'-'.substr($xtgl_masuknya,5,2).'-'.substr($xtgl_masuknya,0,4).' s/d '.substr($xtgl_keluarnya,8,2).'-'.substr($xtgl_keluarnya,5,2).'-'.substr($xtgl_keluarnya,0,4);

                        if (($xilahir<>'1' or $xigd<>'1') and  $xqty==0) {$xqty=1;} 
                        $xket2='Hari';
                        $xkode=0;
                        $xrincian='KAMAR PERAWATAN';
                        $xnama_unit=$brs1['nama_unit'];
                        $xhargaqty=$xjasas*$xqty;
                        $xjumharga=$xjumharga+$xhargaqty;                        
                     }    
                }    
                    $xtotaltarip=$xtotaltarip+$xjumharga;

        // <!-- -------------------visite -->
        if ($xasuransi == 'UMUM') {  $this->db->query("update t_visite set nonasuransi=1 where notransaksi='$xnotransaksi' "); }   
        $qry3=$this->db->query("select * from t_visite where notransaksi='$xnotransaksi'");
        if($qry3->num_rows()>0) {
                $qry1=$this->db->query("SELECT kode_unit,kode_kelas,nama_unit from register_detail WHERE notransaksi='$xnotransaksi' AND no_rm='$xno_rm' ORDER BY id ASC");
                $xjumharga=0;
                foreach ($qry1->result_array() as $brs1) {
                $zkode_unit=$brs1['kode_unit'];
                $zkode_kelas=$brs1['kode_kelas'];
                $znama_unit=$brs1['nama_unit'];

                    $qry3=$this->db->query("select * from t_visite where notransaksi='$xnotransaksi' and kode_unit='$zkode_unit' order by tanggal");
                        foreach ($qry3->result_array() as $brs3) {
                            $xtanggal=$brs3['tanggal'];
                            $xket1=$brs3['visite'];
                            $xtindakan=$brs3['visite'];
                            $xqty=1;
                            $xdokter=$brs3['nama_dokter'];
                        
                            //mencari nilai dari kunjungan dokter
                            $xvis=0;
                            $xkds=0;
                            $xkdu=0;
                            $xkdc=0;
                            $xkdss=0;
                            $xkdi=0;
                            $xjasas=0;

                            $qry31=$this->db->query("SELECT * FROM mkelas WHERE kode_kelas = '$zkode_kelas' LIMIT 1");
                            foreach ($qry31->result_array() as $brs31) {
                                //$xnama_kamar=$brs31['nama_kamar'];
                                $xvis=$brs31['vis'];
                                $xkds=$brs31['kds'];
                                $xkdu=$brs31['kdu'];
                                $xkdc=$brs31['kdc'];
                                $xkdss=$brs31['kdss'];
                                $xkdi=$brs31['kdi'];
                            }
                            
                            if($xket1=='VISITE') {$xjasas=$xvis;}
                            if($xket1=='KONSUL SPESIALIS') {$xjasas=$xkds;}
                            if($xket1=='DOKTER UGD') {$xjasas=$xkdi;}
                            if($xket1=='DOKTER UMUM') {$xjasas=$xkdu;}
                            if($xket1=='KONSUL SUB SPESIALIS') {$xjasas=$xkdss;}
                            if($xket1=='KONSUL CYTO-DOKTER IGD') {$xjasas=$xkdc;}

                            if ( $zkode_unit =='IGDD' || $zkode_unit='IGDP') {
                                $qry31=$this->db->query("SELECT * FROM mtaripigd  where kode_unit= '$zkode_unit' LIMIT 1");
                                foreach ($qry31->result_array() as $brs31) {
                                    //$xnama_kamar=$brs31['nama_kamar'];
                                    $xvis=$brs31['vis'];
                                    $xkds=$brs31['kds'];
                                    $xkdu=$brs31['kdu'];
                                    $xkdc=$brs31['kdc'];
                                    $xkdss=$brs31['kdss'];
                                    $xkdi=$brs31['kdi'];
                                }
                                if($xket1=='VISITE') {$xjasas=$xvis;}
                                if($xket1=='KONSUL SPESIALIS') {$xjasas=$xkds;}
                                if($xket1=='DOKTER UGD') {$xjasas=$xkdi;}
                                if($xket1=='DOKTER UMUM') {$xjasas=$xkdu;}
                                if($xket1=='KONSUL SUB SPESIALIS') {$xjasas=$xkdss;}
                                if($xket1=='KONSUL CYTO-DOKTER IGD') {$xjasas=$xkdc;}
                            } 
                            $xhargaqty=$xjasas*$xqty;
                            $xjumharga=$xjumharga+$xhargaqty;
                        }
                    }     
                    $xtotaltarip=$xtotaltarip+$xjumharga;
        }
        
        // <!-- tindakan KEPERAWATAN -->
        if ($xasuransi == 'UMUM') {  $this->db->query("update ptindakanperawat set nonasuransi=1 where notransaksi='$xnotransaksi' "); }
                    $xjumharga=0;
                    $qry4=$this->db->query("select * from ptindakanperawat where notransaksi='$xnotransaksi' order by tanggal,id");
                        foreach ($qry4->result_array() as $brs4) {
                            $xtanggal=$brs4['tanggal'];
                            $xtindakan=$brs4['tindakan'];
                            $xqty=$brs4['qty'];
                            $xnama_dokter=$brs4['nama_dokter'];
                            $xnama_unittindakan=$brs4['nama_unit'];
                            $xjasas=$brs4['jasas'];
                            if ($brs4['diskon'] >0 ) { $xdiskon=$brs4['diskon']; } else { $xdiskon=0;}
                            $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
                            $xjumharga=$xjumharga+$xhargaqty;
                          
                        }
                        $xtotaltarip=$xtotaltarip+$xjumharga;  
                   
        // <!-- Laboratorium --> 
        // <!-- cari kode unit Laboratorium di munit -->
        
        $qry=$this->db->query("select kode_unit from munit where lab=1 and hapus=0 limit 1");
        foreach ($qry->result_array() as $brs) {
        $kode_unit_inst=$brs['kode_unit'];
        }
        
        if ($xasuransi == 'UMUM') {  $this->db->query("update ptindakan_instalasi set nonasuransi=1 where (notransaksi='$xnotransaksi' or notransaksi='$xno_transaksi_secondary') and kode_unit='$kode_unit_inst' "); }

        $qry7=$this->db->query("select * from ptindakan_instalasi where (notransaksi='$xnotransaksi' or notransaksi='$xno_transaksi_secondary') and kode_unit='$kode_unit_inst' order by tanggal");
        if($qry7->num_rows()>0) {
                $xjumharga=0;
            
                $qry7=$this->db->query("select * from ptindakan_instalasi where (notransaksi='$xnotransaksi' or notransaksi='$xno_transaksi_secondary') and kode_unit='$kode_unit_inst' order by tanggal");
                foreach ($qry7->result_array() as $brs7) {
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

                    $xqty=$brs7['qty'];
                    $xjasas=$brs7['jasas'];
                    if ($brs7['diskon'] >0 ) { $xdiskon=$brs7['diskon']; } else { $xdiskon=0;}
                    $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
                    $xjumharga=$xjumharga+$xhargaqty;
          
                }
                $xtotaltarip=$xtotaltarip+$xjumharga;  
        }

        // <!-- radiologi --> 
        // <!-- cari kode unit radiologi di munit -->
        $qry=$this->db->query("select kode_unit from munit where rad=1 and hapus=0 limit 1");
        foreach ($qry->result_array() as $brs) {
        $kode_unit_inst=$brs['kode_unit'];
        }
        if ($xasuransi == 'UMUM') {  $this->db->query("update ptindakan_instalasi set nonasuransi=1 where (notransaksi='$xnotransaksi' or notransaksi='$xno_transaksi_secondary') and kode_unit='$kode_unit_inst' "); }

        $qry7=$this->db->query("select * from ptindakan_instalasi where (notransaksi='$xnotransaksi' or notransaksi='$xno_transaksi_secondary') and kode_unit='$kode_unit_inst' order by tanggal");
        if($qry7->num_rows()>0) {
                $xjumharga=0;
                $qry7=$this->db->query("select * from ptindakan_instalasi where (notransaksi='$xnotransaksi' or notransaksi='$xno_transaksi_secondary') and kode_unit='$kode_unit_inst' order by tanggal");
                foreach ($qry7->result_array() as $brs7) {
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

                    $xqty=$brs7['qty'];
                    $xjasas=$brs7['jasas'];
                    if ($brs7['diskon'] >0 ) { $xdiskon=$brs7['diskon']; } else { $xdiskon=0;}
                    $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
                    $xjumharga=$xjumharga+$xhargaqty;
                }
                $xtotaltarip=$xtotaltarip+$xjumharga;  
        }
        
        // <!-- hemodialisa --> 
        $qry=$this->db->query("select kode_unit from munit where hem=1 and hapus=0 limit 1");
        foreach ($qry->result_array() as $brs) {
        $kode_unit_inst=$brs['kode_unit'];
        }
        $qry=$this->db->query("select no_transaksi_secondary from register_detail where notransaksi='$xnotransaksi' and kode_unit='$kode_unit_inst' order by tgl_masuk_kamar");
        if($qry->num_rows()>0) {
                $xjumharga=0;
                $qry=$this->db->query("select no_transaksi_secondary from register_detail where notransaksi='$xnotransaksi' and kode_unit='$kode_unit_inst' order by tgl_masuk_kamar");
                foreach ($qry->result_array() as $brs) {
                $zno_transaksi_secondary=$brs['no_transaksi_secondary'];

                if ($xasuransi == 'UMUM') {  $this->db->query("update ptindakan set nonasuransi=1 where notransaksi='$zno_transaksi_secondary'  and kode_unit='$kode_unit_inst' "); }

                $qry7=$this->db->query("select * from ptindakan where notransaksi='$zno_transaksi_secondary'  and kode_unit='$kode_unit_inst' order by tanggal");
                foreach ($qry7->result_array() as $brs7) 
                {
                    $xtanggal=$brs7['tanggal'];
                    $xunit='HEMODIALISA';
                    $xtindakan=$brs7['tindakan'];
                    $xnama_dokter=$brs7['nama_dokter'];
                    $xqty=$brs7['qty'];
                    $xjasas=$brs7['jasas'];
                    if ($brs7['diskon'] >0 ) { $xdiskon=$brs7['diskon']; } else { $xdiskon=0;}
                    $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
                    $xjumharga=$xjumharga+$xhargaqty;
                    }
                }  
                $xtotaltarip=$xtotaltarip+$xjumharga;  
        }
        // <!-- RUJUKAN KONSUL ke POLI --> 
                $qry=$this->db->query("select kode_unit from munit where hem=1 and hapus=0 limit 1");
                foreach ($qry->result_array() as $brs) {
                $kode_unit_hem=$brs['kode_unit'];
                }
                $qry=$this->db->query("select kode_unit from munit where rad=1 and hapus=0 limit 1");
                foreach ($qry->result_array() as $brs) {
                $kode_unit_rad=$brs['kode_unit'];
                }
                $qry=$this->db->query("select kode_unit from munit where lab=1 and hapus=0 limit 1");
                foreach ($qry->result_array() as $brs) {
                $kode_unit_lab=$brs['kode_unit'];
                }
                $qry=$this->db->query("select no_transaksi_secondary,kode_unit from register_detail where notransaksi='$xnotransaksi' and kode_unit<>'$kode_unit_hem' and kode_unit<>'$kode_unit_lab' and kode_unit<>'$kode_unit_rad' and inap_to_poli=1 order by tgl_masuk_kamar");
        if($qry->num_rows()>0) {
                $xjumharga=0;
                $qry=$this->db->query("select no_transaksi_secondary,kode_unit from register_detail where notransaksi='$xnotransaksi' and kode_unit<>'$kode_unit_hem' and kode_unit<>'$kode_unit_lab' and kode_unit<>'$kode_unit_rad' and inap_to_poli=1 order by tgl_masuk_kamar");
                foreach ($qry->result_array() as $brs) {
                $zno_transaksi_secondary=$brs['no_transaksi_secondary'];
                $zkode_unit=$brs['kode_unit'];

                if ($xasuransi == 'UMUM') {  $this->db->query("update ptindakan set nonasuransi=1 where notransaksi='$zno_transaksi_secondary'  and kode_unit='$zkode_unit' "); }

                $qry7=$this->db->query("select * from ptindakan where notransaksi='$zno_transaksi_secondary'  and kode_unit='$zkode_unit' order by tanggal");
                foreach ($qry7->result_array() as $brs7) 
                {
                    $xtanggal=$brs7['tanggal'];
                    $xunit=$brs7['nama_unit'];
                    $xtindakan=$brs7['tindakan'];
                    $xnama_dokter=$brs7['nama_dokter'];
                    $xqty=$brs7['qty'];
                    $xjasas=$brs7['jasas'];
                    if ($brs7['diskon'] >0 ) { $xdiskon=$brs7['diskon']; } else { $xdiskon=0;}
                    $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
                    $xjumharga=$xjumharga+$xhargaqty;
                   
                    }
                }  
                $xtotaltarip=$xtotaltarip+$xjumharga;  
           
        }
   
        // <!-- O2 -->
       if ($xasuransi == 'UMUM') {  $this->db->query("update po2 set nonasuransi=1 where notransaksi='$xnotransaksi'"); }

        $qry4=$this->db->query("select * from po2 where notransaksi='$xnotransaksi' order by tgl_pakai,id");
        if($qry4->num_rows()>0) {
                    // cek dulu harga o2 perliter
                    $qry=$this->db->query("select * from mharga02 limit 1");
                    foreach ($qry->result_array() as $brs) {
                    $hargao2=$brs['liter'];
                    }

                    $xjumharga=0;
                    $qry4=$this->db->query("select * from po2 where notransaksi='$xnotransaksi' order by tgl_pakai,id");
                        foreach ($qry4->result_array() as $brs4) {
                            $xtanggal=$brs4['tgl_pakai'];
                            $xunit=$brs4['nama_unit'];
                            $xqty=$brs4['qty'];
                            $xjasas= $hargao2;
                            if ($brs4['diskon'] >0 ) { $xdiskon=$brs4['diskon']; } else { $xdiskon=0;}
                            $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
                            $xjumharga=$xjumharga+$xhargaqty;
                 
                        }
                        $xtotaltarip=$xtotaltarip+$xjumharga;  
                   
        }
       
        // <!-- KANTONG DARAH -->
        if ($xasuransi == 'UMUM') {  $this->db->query("update pdarah set nonasuransi=1 where notransaksi='$xnotransaksi'"); }

        $qry4=$this->db->query("select * from pdarah where notransaksi='$xnotransaksi' order by tanggal,id");
        if($qry4->num_rows()>0) {
                    // cek dulu harga kantong darah
                    $qry=$this->db->query("select * from mhargadarah limit 1");
                    foreach ($qry->result_array() as $brs) {
                    $hargadarah=$brs['hargadarah'];
                    }

                    $xjumharga=0;
                    $qry4=$this->db->query("select * from pdarah where notransaksi='$xnotransaksi' order by tanggal,id");
                        foreach ($qry4->result_array() as $brs4) {
                            $xtanggal=$brs4['tanggal'];
                            $xunit=$brs4['nama_unit'];
                            $xqty=$brs4['qty'];
                            $xjasas= $hargadarah;
                            if ($brs4['diskon'] >0 ) { $xdiskon=$brs4['diskon']; } else { $xdiskon=0;}
                            $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
                            $xjumharga=$xjumharga+$xhargaqty;
                        }
                        $xtotaltarip=$xtotaltarip+$xjumharga;  
        }

        // <!-- kamar operasi --> 
        if ($xasuransi == 'UMUM') {  $this->db->query("update ptindakanopr set nonasuransi=1 where notransaksi='$xnotransaksi'"); }

        $qry7=$this->db->query("select * from ptindakanopr where notransaksi='$xnotransaksi' order by tgl_periksa");
        if($qry7->num_rows()>0) {
                $xjumharga=0;
                $qry7=$this->db->query("select * from ptindakanopr where notransaksi='$xnotransaksi' order by tgl_periksa");
                foreach ($qry7->result_array() as $brs7) {
                    $xtanggal=$brs7['tgl_periksa'];
                    $xkode_tindakan=$brs7['tindakan'];
                    $qry21=$this->db->query("SELECT * FROM mtindakan WHERE kode_tindakan = '".$xkode_tindakan."' LIMIT 1");
                    foreach ($qry21->result_array() as $brs21) {
                        $xtindakan=$brs21['tindakan'];
                    }
                    $xqty=1;
                    $xjasas=$brs7['jasas'];
                    if ($brs7['diskon'] >0 ) { $xdiskon=$brs7['diskon']; } else { $xdiskon=0;}
                    $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);

                    $xjumharga=$xjumharga+$xhargaqty;
                }
                $xtotaltarip=$xtotaltarip+$xjumharga;  
        }

        // <!-- kamar bersalin --> 
        if ($xasuransi == 'UMUM') {  $this->db->query("update ptindakanlahir set nonasuransi=1 where notransaksi='$xnotransaksi'"); }

        $qry7=$this->db->query("select * from ptindakanlahir where notransaksi='$xnotransaksi' order by tanggal");
        if($qry7->num_rows()>0) {
                $xjumharga=0;
                $qry7=$this->db->query("select * from ptindakanlahir where notransaksi='$xnotransaksi' order by tanggal");
                foreach ($qry7->result_array() as $brs7) {
                    $xtanggal=$brs7['tanggal'];
                    $xtindakan=$brs7['tindakan'];
                    $xqty=1;
                    $xjasas=$brs7['jasas'];
                    if ($brs7['diskon'] >0 ) { $xdiskon=$brs7['diskon']; } else { $xdiskon=0;}
                    $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
                    $xjumharga=$xjumharga+$xhargaqty;

                }
                $xtotaltarip=$xtotaltarip+$xjumharga;  
        }

        //MAKANAN/DIET
            $qry8=$this->db->query("select * from pgizi where notransaksi='$xnotransaksi' order by tanggal");
            if($qry8->num_rows()>0) {
                    $xjumharga=0;
                    $qry8=$this->db->query("select count(pgizi.kdpagi) as jumlahnya, pgizi.kdpagi, pgizi.kode_kamar,mgizi_makanan.nama_makanan, mgizi_makanan.harga from pgizi,mgizi_makanan where pgizi.kdpagi=mgizi_makanan.kode_makanan and notransaksi='$xnotransaksi' group by pgizi.kdpagi,pgizi.kode_kamar order by pgizi.kdpagi ");
                    foreach ($qry8->result_array() as $brs8) {
                        $xqty=$brs8['jumlahnya'];
                        $xkdpagi=$brs8['kdpagi'];
                        $harga=0;
                        if ($xkdpagi == 'MB') {
                            //cari harga makanan, liat kelasnya
                            $xkode_kamar=$brs8['kode_kamar'];
                            $qry9=$this->db->query("select mkelas.makanan as harga from mkamar,mkelas where mkamar.kode_kelas=mkelas.kode_kelas and mkamar.kode_kamar='$xkode_kamar' limit 1");
                            foreach ($qry9->result_array() as $brs9) {
                                $harga=$brs9['harga'];
                            }
                        } else {
                            $harga=$brs8['harga'];
                        }
                        $xjasas=$harga*$xqty;
                    }
                    $xjumharga=$xjumharga+$xjasas;
                    $xtotaltarip=$xtotaltarip+$xjumharga;
            } 


        // <!-- RESEP -->
        if ($xgolongan <> 'UMUM') {
        $qry8=$this->db->query("select * from resep_header where notraksaksi='$xnotransaksi' order by tglresep,noresep ");
        if($qry8->num_rows()>0) {
                $xjumharga=0;
                $qry8=$this->db->query("select * from resep_header where notraksaksi='$xnotransaksi' order by tglresep,noresep ");
                foreach ($qry8->result_array() as $brs8) {
                    $xnoresep=$brs8['noresep'];
                    $xtanggal=$brs8['tglresep'];
                    $xnama_dokter=$brs8['nama_dokter'];
                    $xnama_depo=$brs8['nama_depo'];
                    $xnama_unit_resep=$brs8['nama_unit'];

                    //--cari di resep_detail
                    $qry24=$this->db->query("SELECT sum(qty*hargapakai) as xjumhrg FROM resep_detail WHERE noresep = '$xnoresep' group by noresep ");
                    foreach ($qry24->result_array() as $brs24) {
                        $xjasas=$brs24['xjumhrg'];
                    }
                    $xjumharga=$xjumharga+$xjasas;

                            }    
                            
                            $xtotaltarip=$xtotaltarip+$xjumharga;
        } }
        // <!-------------------Administrasi Loket --> 
                $xjumharga=0;
                if ($xpelayanannya=='JALAN'){ $xid=2; } else  { $xid=1; }

                $qry27=$this->db->query("SELECT * FROM madminloket where id=".$xid." Limit 1");
                foreach ($qry27->result_array() as $brs27) {
                    $xtarifloket=$brs27['tarif'];
                }        
                $xjasas=$xtarifloket;
                $xhargaqty=$xjasas;

                // ========== tambahan perbaikan billing kembali dimasukkan 
                
                $xjasapz=0;
                $xkode_unitz='';
                $xnama_unitz='Administrasi RJ/RI';
                $xket1z='Rekam Medik';
                $xqty2z=1;
                $xket2z='';
                $xkode2z=99;
                $xrincian1z='Loket';
    
                $data = array('no_rm'=>$xno_rm,
                                'nama_pasien'=>$xnama_pasien,
                                'tanggal'=>$xtgladmin,
                                'ket1'=>$xket1z,
                                'qty'=>$xqty2z,
                                'ket2'=>$xket2z,
                                'kode'=>$xkode2z,
                                'rincian'=>$xrincian1z,
                                'jasas'=>$xjasas,
                                'jasap'=>0,
                                'kode_unit'=>$xkode_unitz,
                                'nama_unit'=>$xnama_unitz,
                                'notransaksi'=>$xnotransaksi1);
                $this->db->insert('billing',$data);
                // =============

                $xjumharga=$xjumharga+$xjasas;

                $qry27=$this->db->query("SELECT * FROM madminloket where id=4 Limit 1");
                foreach ($qry27->result_array() as $brs27) {
                    $xtarifloket=$brs27['tarif'];
                }        
                $xjasas=$xtarifloket;
                $xhargaqty=$xjasas;

                $xjasapz=0;
                $xkode_unitz='';
                $xnama_unitz='Administrasi RJ/RI';
                $xket1z='Administrasi';
                $xqty2z=1;
                $xket2z='';
                $xkode2z=99;
                $xrincian1z='Loket';
    
                $data = array('no_rm'=>$xno_rm,
                                'nama_pasien'=>$xnama_pasien,
                                'tanggal'=>$xtgladmin,
                                'ket1'=>$xket1z,
                                'qty'=>$xqty2z,
                                'ket2'=>$xket2z,
                                'kode'=>$xkode2z,
                                'rincian'=>$xrincian1z,
                                'jasas'=>$xjasas,
                                'jasap'=>0,
                                'kode_unit'=>$xkode_unitz,
                                'nama_unit'=>$xnama_unitz,
                                'notransaksi'=>$xnotransaksi1);
                $this->db->insert('billing',$data);
                // =============

                $xjumharga=$xjumharga+$xjasas;


                $qry27=$this->db->query("SELECT * FROM madminloket where id=5 Limit 1");
                foreach ($qry27->result_array() as $brs27) {
                    $xtarifloket=$brs27['tarif'];
                }        
                $xjasas=$xtarifloket;
                $xhargaqty=$xjasas;

                $xjasapz=0;
                $xkode_unitz='';
                $xnama_unitz='Administrasi RJ/RI';
                $xket1z='Materai';
                $xqty2z=1;
                $xket2z='';
                $xkode2z=99;
                $xrincian1z='Loket';
    
                $data = array('no_rm'=>$xno_rm,
                                'nama_pasien'=>$xnama_pasien,
                                'tanggal'=>$xtgladmin,
                                'ket1'=>$xket1z,
                                'qty'=>$xqty2z,
                                'ket2'=>$xket2z,
                                'kode'=>$xkode2z,
                                'rincian'=>$xrincian1z,
                                'jasas'=>$xjasas,
                                'jasap'=>0,
                                'kode_unit'=>$xkode_unitz,
                                'nama_unit'=>$xnama_unitz,
                                'notransaksi'=>$xnotransaksi1);
                $this->db->insert('billing',$data);
                // =============

                $xjumharga=$xjumharga+$xjasas;

                $xtotaltarip=$xtotaltarip+$xjumharga;



        // ========= TOTAL BILLING ===========     
        $xtotalbillling=$xtotaltarip;

        // ========= get golongan
        $qry24 = $this->db->query("SELECT asuransi, golongan from register WHERE notransaksi = '".$xnotransaksi1."' LIMIT 1");
        $qry24row = $qry24->row();
        $xgolongan = $qry24row->golongan;
        //masukkan non asuransi untuk semua yg golongan umum
        if ($xgolongan == "UMUM") {
            $xtotalbilllingnonasuransi=$xtotalbillling;
            $xtotalbilllingasuransi = 0; 
            $tanggungasuransi = 0;
        } else {
            $xtotalbilllingnonasuransi=0;
            $xtotalbilllingasuransi = $xtotalbillling;
            $tanggungasuransi = $xtotalbillling;
        }
      
                return array($xtotalbilllingnonasuransi, $xtotalbillling, $tanggungasuransi);
        //end billing process END    
    
    }

    public function postingdataproses_old2() {

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
        
        // $qry2=$this->db->query("SELECT register.golongan as golongan,register.status as xstatusregister FROM register where notransaksi='".$xnotransaksi."' AND no_rm='".$xno_rm."' LIMIT 1");

        // foreach ($qry2->result_array() as $brs9) {
        //     $xgil9=$brs9['golongan'];
        //     $xgolongannya=trim($xgil9);
        //     $xstatusregister=$brs9['xstatusregister'];
        // }


        $qry12=$this->db->query("SELECT register.golongan FROM register where notransaksi='".$xnotransaksi."' AND no_rm='".$xno_rm."' LIMIT 1");
        foreach ($qry12->result_array() as $brs10) {
            $xasuransi=$brs10['golongan'];
        }
        
        // ================= MULAI PROSES BILLING YG BARU ==========

     
        $xtotaltarip=0;   
        //kamar perawatan
        $xjumharga=0;
        // $qry1=$this->db->query("SELECT *, register.golongan as golongannya, register_detail.id as idnya, register_detail.status as xstatusnya,register.bagian as bagian FROM register_detail INNER JOIN pasien ON register_detail.no_rm=pasien.no_rm INNER JOIN register ON register.notransaksi = register_detail.notransaksi WHERE register_detail.notransaksi='$xnotransaksi' AND register_detail.no_rm='$xno_rm' and register_detail.kode_unit<>'IGDD' and register_detail.kode_unit<>'IGDP' and register_detail.kode_unit<>'KMBS' ORDER BY register_detail.tgl_keluar_kamar ASC, register_detail.id ASC");

        $qry1=$this->db->query("SELECT *, register.golongan as golongannya, register_detail.id as idnya, register_detail.status as xstatusnya,register.bagian as bagian FROM register_detail INNER JOIN pasien ON register_detail.no_rm=pasien.no_rm INNER JOIN register ON register.notransaksi = register_detail.notransaksi WHERE register_detail.notransaksi='$xnotransaksi' AND register_detail.no_rm='$xno_rm'  ORDER BY register_detail.tgl_keluar_kamar ASC, register_detail.id ASC");
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
                    $xgolongan=$brs1['golongannya'];
                    $xasuransi=$brs1['golongannya'];
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

                    $ztgl_keluar=$xtglklr1;
                    $xtgladmin=$ztgl_keluar;

                    $xnama_pasien = "";
                    $xnama_unit = "";

                    $xnotransaksi=$brs1['notransaksi'];
                    $xno_transaksi_secondary=$brs1['no_transaksi_secondary'];
                  
                    if ($xasuransi == 'UMUM') {
                        $keteranganbilling='PASIEN UMUM'; 
                        $nonas=0; 
                        $cetakumum=0;
                  } 
                  else {$keteranganbilling='JAMINAN'; $nonas=0; $cetakumum=1;}

                    //=======RAWAT INAP======= yg ditampilkan hanya yg bagian<>jalan
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
                            $qry19=$this->db->query("SELECT tgl_keluar_kamar,tgl_masuk_kamar FROM register_detail WHERE id='".$xidnya."'");
                            foreach ($qry19->result_array() as $brs19) {
                                $tglm=new DateTime($brs19['tgl_masuk_kamar']);
                                $tglk=new DateTime($brs19['tgl_keluar_kamar']);
                                $xqty = $tglk->diff($tglm)->days ;
                                $xtgl_keluarnya=$brs19['tgl_keluar_kamar'];                       
                            }  
                        } else {    
                        $qry19=$this->db->query("SELECT tgl_keluar_kamar,tgl_masuk_kamar FROM register_detail WHERE id='".$xidnya."'");
                            foreach ($qry19->result_array() as $brs19) {                            
                                $tglm=new DateTime($brs19['tgl_masuk_kamar']);
                                $tglk=new DateTime(date("Y-m-d"));
                                $xqty = $tglk->diff($tglm)->days ;
                                $xtgl_keluarnya=date("Y-m-d");
                            }    
                        }
                        
                        $xket1=substr($xtgl_masuknya,8,2).'-'.substr($xtgl_masuknya,5,2).'-'.substr($xtgl_masuknya,0,4).' s/d '.substr($xtgl_keluarnya,8,2).'-'.substr($xtgl_keluarnya,5,2).'-'.substr($xtgl_keluarnya,0,4);

                        if (($xilahir<>'1' or $xigd<>'1') and  $xqty==0) {$xqty=1;} 
                        $xket2='Hari';
                        $xkode=0;
                        $xrincian='KAMAR PERAWATAN';
                        $xnama_unit=$brs1['nama_unit'];
                        $xhargaqty=$xjasas*$xqty;
                        $xjumharga=$xjumharga+$xhargaqty;                        
                     }    
                }    
                    $xtotaltarip=$xtotaltarip+$xjumharga;

        // <!-- -------------------visite -->
        if ($xasuransi == 'UMUM') {  $this->db->query("update t_visite set nonasuransi=1 where notransaksi='$xnotransaksi' "); }   
        $qry3=$this->db->query("select * from t_visite where notransaksi='$xnotransaksi'");
        if($qry3->num_rows()>0) {
                $qry1=$this->db->query("SELECT kode_unit,kode_kelas,nama_unit from register_detail WHERE notransaksi='$xnotransaksi' AND no_rm='$xno_rm' ORDER BY id ASC");
                $xjumharga=0;
                foreach ($qry1->result_array() as $brs1) {
                $zkode_unit=$brs1['kode_unit'];
                $zkode_kelas=$brs1['kode_kelas'];
                $znama_unit=$brs1['nama_unit'];

                    $qry3=$this->db->query("select * from t_visite where notransaksi='$xnotransaksi' and kode_unit='$zkode_unit' order by tanggal");
                        foreach ($qry3->result_array() as $brs3) {
                            $xtanggal=$brs3['tanggal'];
                            $xket1=$brs3['visite'];
                            $xtindakan=$brs3['visite'];
                            $xqty=1;
                            $xdokter=$brs3['nama_dokter'];
                        
                            //mencari nilai dari kunjungan dokter
                            $xvis=0;
                            $xkds=0;
                            $xkdu=0;
                            $xkdc=0;
                            $xkdss=0;
                            $xkdi=0;

                            // $qry31=$this->db->query("SELECT * FROM mkelas WHERE kode_kelas = '$zkode_kelas' LIMIT 1");
                            // foreach ($qry31->result_array() as $brs31) {
                            //     //$xnama_kamar=$brs31['nama_kamar'];
                            //     $xvis=$brs31['vis'];
                            //     $xkds=$brs31['kds'];
                            //     $xkdu=$brs31['kdu'];
                            //     $xkdc=$brs31['kdc'];
                            //     $xkdss=$brs31['kdss'];
                            //     $xkdi=$brs31['kdi'];
                            // }

                            if ($zkode_unit == 'IGDD' or $zkode_unit == 'IGDP') {
                                $qry31=$this->db->query("SELECT * FROM mkelas WHERE kode_kelas = 'IGD1' LIMIT 1");
                                foreach ($qry31->result_array() as $brs31) {
                                    //$xnama_kamar=$brs31['nama_kamar'];
                                    $xvis=$brs31['vis'];
                                    $xkds=$brs31['kds'];
                                    $xkdu=$brs31['kdu'];
                                    $xkdc=$brs31['kdc'];
                                    $xkdss=$brs31['kdss'];
                                    $xkdi=$brs31['kdi'];
                                }
                              } else {
                                $qry31=$this->db->query("SELECT * FROM mkelas WHERE kode_kelas = '$zkode_kelas' LIMIT 1");
                                foreach ($qry31->result_array() as $brs31) {
                                    //$xnama_kamar=$brs31['nama_kamar'];
                                    $xvis=$brs31['vis'];
                                    $xkds=$brs31['kds'];
                                    $xkdu=$brs31['kdu'];
                                    $xkdc=$brs31['kdc'];
                                    $xkdss=$brs31['kdss'];
                                    $xkdi=$brs31['kdi'];
                                }
                              }

                            //cari nilai kunjungan dokter...
                            
                            $xjasas=0;
                            
                            if($xket1=='VISITE') {$xjasas=$xvis;}
                            if($xket1=='KONSUL SPESIALIS') {$xjasas=$xkds;}
                            if($xket1=='DOKTER UGD') {$xjasas=$xkdi;}
                            if($xket1=='DOKTER UMUM') {$xjasas=$xkdu;}
                            if($xket1=='KONSUL SUB SPESIALIS') {$xjasas=$xkdss;}
                            if($xket1=='KONSUL CYTO-DOKTER IGD') {$xjasas=$xkdc;}
                            $xhargaqty=$xjasas*$xqty;
                            $xjumharga=$xjumharga+$xhargaqty;
                        }
                    }     
                    $xtotaltarip=$xtotaltarip+$xjumharga;
        }
        
        // <!-- tindakan KEPERAWATAN -->
        if ($xasuransi == 'UMUM') {  $this->db->query("update ptindakanperawat set nonasuransi=1 where notransaksi='$xnotransaksi' "); }
                    $xjumharga=0;
                    $qry4=$this->db->query("select * from ptindakanperawat where notransaksi='$xnotransaksi' order by tanggal,id");
                        foreach ($qry4->result_array() as $brs4) {
                            $xtanggal=$brs4['tanggal'];
                            $xtindakan=$brs4['tindakan'];
                            $xqty=$brs4['qty'];
                            $xnama_dokter=$brs4['nama_dokter'];
                            $xnama_unittindakan=$brs4['nama_unit'];
                            $xjasas=$brs4['jasas'];
                            if ($brs4['diskon'] >0 ) { $xdiskon=$brs4['diskon']; } else { $xdiskon=0;}
                            $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
                            $xjumharga=$xjumharga+$xhargaqty;
                          
                        }
                        $xtotaltarip=$xtotaltarip+$xjumharga;  
                   
        // <!-- Laboratorium --> 
        // <!-- cari kode unit Laboratorium di munit -->
        
        $qry=$this->db->query("select kode_unit from munit where lab=1 and hapus=0 limit 1");
        foreach ($qry->result_array() as $brs) {
        $kode_unit_inst=$brs['kode_unit'];
        }
        
        if ($xasuransi == 'UMUM') {  $this->db->query("update ptindakan_instalasi set nonasuransi=1 where (notransaksi='$xnotransaksi' or notransaksi='$xno_transaksi_secondary') and kode_unit='$kode_unit_inst' "); }

        $qry7=$this->db->query("select * from ptindakan_instalasi where (notransaksi='$xnotransaksi' or notransaksi='$xno_transaksi_secondary') and kode_unit='$kode_unit_inst' order by tanggal");
        if($qry7->num_rows()>0) {
                $xjumharga=0;
            
                $qry7=$this->db->query("select * from ptindakan_instalasi where (notransaksi='$xnotransaksi' or notransaksi='$xno_transaksi_secondary') and kode_unit='$kode_unit_inst' order by tanggal");
                foreach ($qry7->result_array() as $brs7) {
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

                    $xqty=$brs7['qty'];
                    $xjasas=$brs7['jasas'];
                    if ($brs7['diskon'] >0 ) { $xdiskon=$brs7['diskon']; } else { $xdiskon=0;}
                    $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
                    $xjumharga=$xjumharga+$xhargaqty;
          
                }
                $xtotaltarip=$xtotaltarip+$xjumharga;  
        }

        // <!-- radiologi --> 
        // <!-- cari kode unit radiologi di munit -->
        $qry=$this->db->query("select kode_unit from munit where rad=1 and hapus=0 limit 1");
        foreach ($qry->result_array() as $brs) {
        $kode_unit_inst=$brs['kode_unit'];
        }
        if ($xasuransi == 'UMUM') {  $this->db->query("update ptindakan_instalasi set nonasuransi=1 where (notransaksi='$xnotransaksi' or notransaksi='$xno_transaksi_secondary') and kode_unit='$kode_unit_inst' "); }

        $qry7=$this->db->query("select * from ptindakan_instalasi where (notransaksi='$xnotransaksi' or notransaksi='$xno_transaksi_secondary') and kode_unit='$kode_unit_inst' order by tanggal");
        if($qry7->num_rows()>0) {
                $xjumharga=0;
                $qry7=$this->db->query("select * from ptindakan_instalasi where (notransaksi='$xnotransaksi' or notransaksi='$xno_transaksi_secondary') and kode_unit='$kode_unit_inst' order by tanggal");
                foreach ($qry7->result_array() as $brs7) {
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

                    $xqty=$brs7['qty'];
                    $xjasas=$brs7['jasas'];
                    if ($brs7['diskon'] >0 ) { $xdiskon=$brs7['diskon']; } else { $xdiskon=0;}
                    $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
                    $xjumharga=$xjumharga+$xhargaqty;
                }
                $xtotaltarip=$xtotaltarip+$xjumharga;  
        }
        
        // <!-- hemodialisa --> 
        $qry=$this->db->query("select kode_unit from munit where hem=1 and hapus=0 limit 1");
        foreach ($qry->result_array() as $brs) {
        $kode_unit_inst=$brs['kode_unit'];
        }
        $qry=$this->db->query("select no_transaksi_secondary from register_detail where notransaksi='$xnotransaksi' and kode_unit='$kode_unit_inst' order by tgl_masuk_kamar");
        if($qry->num_rows()>0) {
                $xjumharga=0;
                $qry=$this->db->query("select no_transaksi_secondary from register_detail where notransaksi='$xnotransaksi' and kode_unit='$kode_unit_inst' order by tgl_masuk_kamar");
                foreach ($qry->result_array() as $brs) {
                $zno_transaksi_secondary=$brs['no_transaksi_secondary'];

                if ($xasuransi == 'UMUM') {  $this->db->query("update ptindakan set nonasuransi=1 where notransaksi='$zno_transaksi_secondary'  and kode_unit='$kode_unit_inst' "); }

                $qry7=$this->db->query("select * from ptindakan where notransaksi='$zno_transaksi_secondary'  and kode_unit='$kode_unit_inst' order by tanggal");
                foreach ($qry7->result_array() as $brs7) 
                {
                    $xtanggal=$brs7['tanggal'];
                    $xunit='HEMODIALISA';
                    $xtindakan=$brs7['tindakan'];
                    $xnama_dokter=$brs7['nama_dokter'];
                    $xqty=$brs7['qty'];
                    $xjasas=$brs7['jasas'];
                    if ($brs7['diskon'] >0 ) { $xdiskon=$brs7['diskon']; } else { $xdiskon=0;}
                    $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
                    $xjumharga=$xjumharga+$xhargaqty;
                    }
                }  
                $xtotaltarip=$xtotaltarip+$xjumharga;  
        }
        // <!-- RUJUKAN KONSUL ke POLI --> 
                $qry=$this->db->query("select kode_unit from munit where hem=1 and hapus=0 limit 1");
                foreach ($qry->result_array() as $brs) {
                $kode_unit_hem=$brs['kode_unit'];
                }
                $qry=$this->db->query("select kode_unit from munit where rad=1 and hapus=0 limit 1");
                foreach ($qry->result_array() as $brs) {
                $kode_unit_rad=$brs['kode_unit'];
                }
                $qry=$this->db->query("select kode_unit from munit where lab=1 and hapus=0 limit 1");
                foreach ($qry->result_array() as $brs) {
                $kode_unit_lab=$brs['kode_unit'];
                }
                $qry=$this->db->query("select no_transaksi_secondary,kode_unit from register_detail where notransaksi='$xnotransaksi' and kode_unit<>'$kode_unit_hem' and kode_unit<>'$kode_unit_lab' and kode_unit<>'$kode_unit_rad' and inap_to_poli=1 order by tgl_masuk_kamar");
        if($qry->num_rows()>0) {
                $xjumharga=0;
                $qry=$this->db->query("select no_transaksi_secondary,kode_unit from register_detail where notransaksi='$xnotransaksi' and kode_unit<>'$kode_unit_hem' and kode_unit<>'$kode_unit_lab' and kode_unit<>'$kode_unit_rad' and inap_to_poli=1 order by tgl_masuk_kamar");
                foreach ($qry->result_array() as $brs) {
                $zno_transaksi_secondary=$brs['no_transaksi_secondary'];
                $zkode_unit=$brs['kode_unit'];

                if ($xasuransi == 'UMUM') {  $this->db->query("update ptindakan set nonasuransi=1 where notransaksi='$zno_transaksi_secondary'  and kode_unit='$zkode_unit' "); }

                $qry7=$this->db->query("select * from ptindakan where notransaksi='$zno_transaksi_secondary'  and kode_unit='$zkode_unit' order by tanggal");
                foreach ($qry7->result_array() as $brs7) 
                {
                    $xtanggal=$brs7['tanggal'];
                    $xunit=$brs7['nama_unit'];
                    $xtindakan=$brs7['tindakan'];
                    $xnama_dokter=$brs7['nama_dokter'];
                    $xqty=$brs7['qty'];
                    $xjasas=$brs7['jasas'];
                    if ($brs7['diskon'] >0 ) { $xdiskon=$brs7['diskon']; } else { $xdiskon=0;}
                    $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
                    $xjumharga=$xjumharga+$xhargaqty;
                   
                    }
                }  
                $xtotaltarip=$xtotaltarip+$xjumharga;  
           
        }
   
        // <!-- O2 -->
       if ($xasuransi == 'UMUM') {  $this->db->query("update po2 set nonasuransi=1 where notransaksi='$xnotransaksi'"); }

        $qry4=$this->db->query("select * from po2 where notransaksi='$xnotransaksi' order by tgl_pakai,id");
        if($qry4->num_rows()>0) {
                    // cek dulu harga o2 perliter
                    $qry=$this->db->query("select * from mharga02 limit 1");
                    foreach ($qry->result_array() as $brs) {
                    $hargao2=$brs['liter'];
                    }

                    $xjumharga=0;
                    $qry4=$this->db->query("select * from po2 where notransaksi='$xnotransaksi' order by tgl_pakai,id");
                        foreach ($qry4->result_array() as $brs4) {
                            $xtanggal=$brs4['tgl_pakai'];
                            $xunit=$brs4['nama_unit'];
                            $xqty=$brs4['qty'];
                            $xjasas= $hargao2;
                            if ($brs4['diskon'] >0 ) { $xdiskon=$brs4['diskon']; } else { $xdiskon=0;}
                            $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
                            $xjumharga=$xjumharga+$xhargaqty;
                 
                        }
                        $xtotaltarip=$xtotaltarip+$xjumharga;  
                   
        }
       
        // <!-- KANTONG DARAH -->
        if ($xasuransi == 'UMUM') {  $this->db->query("update pdarah set nonasuransi=1 where notransaksi='$xnotransaksi'"); }

        $qry4=$this->db->query("select * from pdarah where notransaksi='$xnotransaksi' order by tanggal,id");
        if($qry4->num_rows()>0) {
                    // cek dulu harga kantong darah
                    $qry=$this->db->query("select * from mhargadarah limit 1");
                    foreach ($qry->result_array() as $brs) {
                    $hargadarah=$brs['hargadarah'];
                    }

                    $xjumharga=0;
                    $qry4=$this->db->query("select * from pdarah where notransaksi='$xnotransaksi' order by tanggal,id");
                        foreach ($qry4->result_array() as $brs4) {
                            $xtanggal=$brs4['tanggal'];
                            $xunit=$brs4['nama_unit'];
                            $xqty=$brs4['qty'];
                            $xjasas= $hargadarah;
                            if ($brs4['diskon'] >0 ) { $xdiskon=$brs4['diskon']; } else { $xdiskon=0;}
                            $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
                            $xjumharga=$xjumharga+$xhargaqty;
                        }
                        $xtotaltarip=$xtotaltarip+$xjumharga;  
        }

        // <!-- kamar operasi --> 
        if ($xasuransi == 'UMUM') {  $this->db->query("update ptindakanopr set nonasuransi=1 where notransaksi='$xnotransaksi'"); }

        $qry7=$this->db->query("select * from ptindakanopr where notransaksi='$xnotransaksi' order by tgl_periksa");
        if($qry7->num_rows()>0) {
                $xjumharga=0;
                $qry7=$this->db->query("select * from ptindakanopr where notransaksi='$xnotransaksi' order by tgl_periksa");
                foreach ($qry7->result_array() as $brs7) {
                    $xtanggal=$brs7['tgl_periksa'];
                    $xkode_tindakan=$brs7['tindakan'];
                    $qry21=$this->db->query("SELECT * FROM mtindakan WHERE kode_tindakan = '".$xkode_tindakan."' LIMIT 1");
                    foreach ($qry21->result_array() as $brs21) {
                        $xtindakan=$brs21['tindakan'];
                    }
                    $xqty=1;
                    $xjasas=$brs7['jasas'];
                    if ($brs7['diskon'] >0 ) { $xdiskon=$brs7['diskon']; } else { $xdiskon=0;}
                    $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);

                    $xjumharga=$xjumharga+$xhargaqty;
                }
                $xtotaltarip=$xtotaltarip+$xjumharga;  
        }

        // <!-- kamar bersalin --> 
        if ($xasuransi == 'UMUM') {  $this->db->query("update ptindakanlahir set nonasuransi=1 where notransaksi='$xnotransaksi'"); }

        $qry7=$this->db->query("select * from ptindakanlahir where notransaksi='$xnotransaksi' order by tanggal");
        if($qry7->num_rows()>0) {
                $xjumharga=0;
                $qry7=$this->db->query("select * from ptindakanlahir where notransaksi='$xnotransaksi' order by tanggal");
                foreach ($qry7->result_array() as $brs7) {
                    $xtanggal=$brs7['tanggal'];
                    $xtindakan=$brs7['tindakan'];
                    $xqty=1;
                    $xjasas=$brs7['jasas'];
                    if ($brs7['diskon'] >0 ) { $xdiskon=$brs7['diskon']; } else { $xdiskon=0;}
                    $xhargaqty=($xjasas*$xqty)-($xjasas*$xqty*$xdiskon/100);
                    $xjumharga=$xjumharga+$xhargaqty;

                }
                $xtotaltarip=$xtotaltarip+$xjumharga;  
        }

        //MAKANAN/DIET
            $qry8=$this->db->query("select * from pgizi where notransaksi='$xnotransaksi' order by tanggal");
            if($qry8->num_rows()>0) {
                    $xjumharga=0;
                    $qry8=$this->db->query("select count(pgizi.kdpagi) as jumlahnya, pgizi.kdpagi, pgizi.kode_kamar,mgizi_makanan.nama_makanan, mgizi_makanan.harga from pgizi,mgizi_makanan where pgizi.kdpagi=mgizi_makanan.kode_makanan and notransaksi='$xnotransaksi' group by pgizi.kdpagi,pgizi.kode_kamar order by pgizi.kdpagi ");
                    foreach ($qry8->result_array() as $brs8) {
                        $xqty=$brs8['jumlahnya'];
                        $xkdpagi=$brs8['kdpagi'];
                        $harga=0;
                        if ($xkdpagi == 'MB') {
                            //cari harga makanan, liat kelasnya
                            $xkode_kamar=$brs8['kode_kamar'];
                            $qry9=$this->db->query("select mkelas.makanan as harga from mkamar,mkelas where mkamar.kode_kelas=mkelas.kode_kelas and mkamar.kode_kamar='$xkode_kamar' limit 1");
                            foreach ($qry9->result_array() as $brs9) {
                                $harga=$brs9['harga'];
                            }
                        } else {
                            $harga=$brs8['harga'];
                        }
                        $xjasas=$harga*$xqty;
                    }
                    $xjumharga=$xjumharga+$xjasas;
                    $xtotaltarip=$xtotaltarip+$xjumharga;
            } 


        // <!-- RESEP -->
        if ($xgolongan <> 'UMUM') {
        $qry8=$this->db->query("select * from resep_header where notraksaksi='$xnotransaksi' order by tglresep,noresep ");
        if($qry8->num_rows()>0) {
                $xjumharga=0;
                $qry8=$this->db->query("select * from resep_header where notraksaksi='$xnotransaksi' order by tglresep,noresep ");
                foreach ($qry8->result_array() as $brs8) {
                    $xnoresep=$brs8['noresep'];
                    $xtanggal=$brs8['tglresep'];
                    $xnama_dokter=$brs8['nama_dokter'];
                    $xnama_depo=$brs8['nama_depo'];
                    $xnama_unit_resep=$brs8['nama_unit'];

                    //--cari di resep_detail
                    $qry24=$this->db->query("SELECT sum(qty*hargapakai) as xjumhrg FROM resep_detail WHERE noresep = '$xnoresep' group by noresep ");
                    foreach ($qry24->result_array() as $brs24) {
                        $xjasas=$brs24['xjumhrg'];
                    }
                    $xjumharga=$xjumharga+$xjasas;

                            }    
                            
                            $xtotaltarip=$xtotaltarip+$xjumharga;
        } }
        // <!-------------------Administrasi Loket --> 
                $xjumharga=0;
                if ($xpelayanannya=='JALAN'){ $xid=2; } else  { $xid=1; }

                $qry27=$this->db->query("SELECT * FROM madminloket where id=".$xid." Limit 1");
                foreach ($qry27->result_array() as $brs27) {
                    $xtarifloket=$brs27['tarif'];
                }        
                $xjasas=$xtarifloket;
                $xhargaqty=$xjasas;

                // ========== tambahan perbaikan billing kembali dimasukkan 
                
                $xjasapz=0;
                $xkode_unitz='';
                $xnama_unitz='Administrasi RJ/RI';
                $xket1z='Rekam Medik';
                $xqty2z=1;
                $xket2z='';
                $xkode2z=99;
                $xrincian1z='Loket';
    
                $data = array('no_rm'=>$xno_rm,
                                'nama_pasien'=>$xnama_pasien,
                                'tanggal'=>$xtgladmin,
                                'ket1'=>$xket1z,
                                'qty'=>$xqty2z,
                                'ket2'=>$xket2z,
                                'kode'=>$xkode2z,
                                'rincian'=>$xrincian1z,
                                'jasas'=>$xjasas,
                                'jasap'=>0,
                                'kode_unit'=>$xkode_unitz,
                                'nama_unit'=>$xnama_unitz,
                                'notransaksi'=>$xnotransaksi1);
                $this->db->insert('billing',$data);
                // =============

                $xjumharga=$xjumharga+$xjasas;

                $xtotaltarip=$xtotaltarip+$xjumharga;



        // ========= TOTAL BILLING ===========     
        $xtotalbillling=$xtotaltarip;

        // ========= get golongan
        $qry24 = $this->db->query("SELECT asuransi, golongan from register WHERE notransaksi = '".$xnotransaksi1."' LIMIT 1");
        $qry24row = $qry24->row();
        $xgolongan = $qry24row->golongan;
        //masukkan non asuransi untuk semua yg golongan umum
        if ($xgolongan == "UMUM") {
            $xtotalbilllingnonasuransi=$xtotalbillling;
            $xtotalbilllingasuransi = 0; 
            $tanggungasuransi = 0;
        } else {
            $xtotalbilllingnonasuransi=0;
            $xtotalbilllingasuransi = $xtotalbillling;
            $tanggungasuransi = $xtotalbillling;
        }
      
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


