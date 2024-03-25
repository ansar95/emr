<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inacbg extends CI_Model {
	
    public function defaultDataKlaim()
    {
        return array(
            "nomor_sep"=> '',
            "nomor_kartu"=> '',
            "tgl_masuk"=> '',//"26/10/2016",
            "tgl_pulang"=> '',// "26/10/2016",
            "cara_masuk"=> '',// gp, mp, inp, born, psych, hosp-trans, outp, emd, nursing, rehab, other
            "jenis_rawat"=> '',//1 = rawat inap, 2 = rawat jalan, 3 = rawat igd
            "kelas_rawat"=> '',//3 = Kelas 3, 2 = Kelas 2, 1 = Kelas 1
            "adl_sub_acute"=> 0,// 12 s/d 60
            "adl_chronic"=> 0,// 12 s/d 60
            "icu_indikator"=> 0,// 1, 0
            "icu_los"=> 0, // 0 , jumlah hari dirawat
            "ventilator_hour"=> 0, // 0, jumlah jam pemakaian
            "upgrade_class_ind"=>  0, // 1, 0
            "upgrade_class_class"=> '', // kelas_1, kelas_2, vip, vvip
            "upgrade_class_los"=> '',// ''
            "add_payment_pct"=> '',//''
            "birth_weight"=> 0,//0
            "discharge_status"=> '',// cara pulang 
            "diagnosa"=> '',
            "procedure"=> '',
            "diagnosa_inagrouper"=> '',
            "procedure_inagrouper"=> '',
            "tarif_rs"=> [
                "prosedur_non_bedah"=> '',
                "prosedur_bedah"=> '',
                "konsultasi"=> '',
                "tenaga_ahli"=> '',
                "keperawatan"=> '',
                "penunjang"=> 0,
                "radiologi"=> '',
                "laboratorium"=> '',
                "pelayanan_darah"=> 0,
                "rehabilitasi"=> 0,
                "kamar"=> '',
                "rawat_intensif"=> 0,
                "obat"=> '',
                "obat_kronis"=> '',
                "obat_kemoterapi"=> '',
                "alkes"=> 0,
                "bmhp"=> '',
                "sewa_alat"=> ''
            ],
            "tarif_poli_eks"=> 0,
            "nama_dokter"=> '',
            "kode_tarif"=> '',
            "payor_id"=> "3",
            "payor_cd"=> "JKN",
            "cob_cd"=> '',
            "coder_nik"=> '',// nomor NIK mandatory
        );
    }

    public function getDataByIdTransaksi($noTransaksi)
	{
		$this->db->select("register.id as id, register.no_rm as no_rm, register.tglsetor as tglsetor, register.tgl_masuk as tgl_masuk, register.tgl_keluar as tgl_keluar, pasien.nama_pasien as nama, pasien.title as title, register.keluarpada as keluarpada, register.golongan as golongan, register.notransaksi as notransaksi, register.nama_dokter, register.tgl_proses as tgl_proses, register.nosep AS nomor_sep, pasien.tgl_lahir, pasien.sex, pasien.no_askes AS nomor_kartu, pasien.nik AS coder_nik, pasien.kelashak AS kelas_rawat, register.cara_masuk, register.berat AS birth_weight, pdiagnosa.nodaftar AS diagnosa, register.cara_keluar");
        $this->db->from("register");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
        $this->db->join("pdiagnosa", "pdiagnosa.notransaksi = register.notransaksi",'left');
        // $this->db->join("micd1", "micd1.icd_code = pdiagnosa.nodaftar",'left');// duplicate mix
		$this->db->where('register.notransaksi', $noTransaksi);
		$data = $this->db->get();

        return $data->row_array();
	}

	public function simpanKlaimBaru($post)
    {
        return $this->db->insert('inacbg_klaim_baru',$post);
    }

}
