<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolapasienmdl extends CI_Model {

	public function ambildatapindah() {
		$no = $this->input->get("id");
		$this->db->from("register_detail");
		$this->db->where("id", $no);
		$data = $this->db->get();
		return $data->row();
	}
	
	public function pasienkembali($dtregis) {
		$notransaksi = $dtregis->no_transaksi_secondary;
		$kode_unit = $dtregis->kode_unit;
		
		$totaldata = $this->detectprosesbynotransaksi($notransaksi, $kode_unit);

		if ($totaldata == 0) {
			$dataubah = array(
				'tgl_keluar_kamar' => "0000-00-00", 
				'status' => "0", 
				'user2' => $this->session->userdata("nmuser"), 
				'lastlogin' => date("Y-m-d H:i:s"), 
				'jam_keluar' => "", 
				'pindah'  => "0"
			);
			$this->db->where('id', $dtregis->idasal);
			$dts = $this->db->update('register_detail', $dataubah);
	
			$id = $this->input->get("id");
			$this->db->where('id', $id);
			$dt = $this->db->delete('register_detail');
	
			return $dt;
		} else {
			return false;
		}
	}

	public function pasienpulang($dtregis) {
		$date = date_create($this->input->get("datepicker"));
		$tgl = date_format($date,"Y-m-d");
		$tim = date_create($this->input->get("waktu"));
		$jam = date_format($tim,"H:i:s");
		$kk = $this->input->get("kk");
		$ck = $this->input->get("ck");

		$rm = $this->input->get("rm");
		$waktusekarang=$tgl.' '.$jam;
		$ubahregister = array(
			'status' => "1", 
			'tgl_keluar' => $tgl, 
			'jam_keluar' => $jam, 
			'kondisi_keluar' => $kk, 
			'kondisibrm' => $rm, 
			'cara_keluar' => $ck, 
			'keluarpada' => $dtregis->nama_unit, 
			'kode_keluarpada' => $dtregis->kode_unit, 
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"), 
			'pulang' => "1", 
			'jam_selesai' => $waktusekarang
		);
		$this->db->where('notransaksi', $dtregis->notransaksi);
		$dts = $this->db->update('register', $ubahregister);

		//cari kodebooking di register
		$kodebooking=$dtregis->kode_booking;
		date_default_timezone_set('Asia/Makassar');
		$waktusekarang=date("Y-m-d h:i:sa");
		$simpantaskid5 = array(
			'kodebooking' => $kodebooking,
			'taskid' => 5,
			'waktu' => $waktusekarang,
			'flag' => 0
		);
		$this->db->insert('y_updatewaktu', $simpantaskid5);

		$ubahpulang = array(
			'pulang' => "1",
			'status' => "1"
		);
		$this->db->where('notransaksi', $dtregis->notransaksi);
		$dtu = $this->db->update('register_detail', $ubahpulang);

		$ubahregisdetail = array(
			'tgl_keluar_kamar' =>$tgl, 
			'status' => "1", 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"),
			'statuskeluar' => "1", 
			'jam_keluar' => date("H:i:s"), 
			'pulang' => "1", 
			'kamarkeluar' => "1"
		);
		$no = $this->input->get("id");
		$this->db->where('id', $no);
		$dt = $this->db->update('register_detail', $ubahregisdetail);

		return $dt;
	}

	public function pasienrujukanhapus($dtregis) {
		$notransaksi = $dtregis->no_transaksi_secondary;
		$kode_unit = $dtregis->kode_unit;

		$totaldata = $this->detectprosesbynotransaksi($notransaksi, $kode_unit);

		if ($totaldata == 0) {
			$id = $this->input->get("id");
			$this->db->where('id', $id);
			$dt = $this->db->delete('register_detail');
			return $dt;
		} else {
			return false;
		}
	}

	public function detectprosesbynotransaksi($notransaksi, $kode_unit) {
		$this->db->select("id");
		$this->db->from("ptindakan");
		$this->db->where('notransaksi', $notransaksi);
		$this->db->where('kode_unit', $kode_unit);
		$datatindakan = $this->db->count_all_results();

		$this->db->select("id");
		$this->db->from("ptindakanlahir");
		$this->db->where('notransaksi', $notransaksi);
		$this->db->where('kode_unit', $kode_unit);
		$datatindakanlahir = $this->db->count_all_results();

		$this->db->select("id");
		$this->db->from("ptindakanopr");
		$this->db->where('notransaksi', $notransaksi);
		$this->db->where('kode_unit', $kode_unit);
		$datatindakanopr = $this->db->count_all_results();

		$this->db->select("id");
		$this->db->from("ptindakanperawat");
		$this->db->where('notransaksi', $notransaksi);
		$this->db->where('kode_unit', $kode_unit);
		$datatindakanperawat = $this->db->count_all_results();

		$this->db->select("id");
		$this->db->from("pbhp");
		$this->db->where('notransaksi', $notransaksi);
		$this->db->where('kode_unit', $kode_unit);
		$databhp = $this->db->count_all_results();

		$this->db->select("id");
		$this->db->from("po2");
		$this->db->where('notransaksi', $notransaksi);
		$this->db->where('kode_unit', $kode_unit);
		$datao2 = $this->db->count_all_results();

		$this->db->select("id");
		$this->db->from("t_visite");
		$this->db->where('notransaksi', $notransaksi);
		$this->db->where('kode_unit', $kode_unit);
		$datavisit = $this->db->count_all_results();

		$this->db->select("id");
		$this->db->from("pdarah");
		$this->db->where('notransaksi', $notransaksi);
		$this->db->where('kode_unit', $kode_unit);
		$datadarah = $this->db->count_all_results();

		$totaldata = $datatindakan + $databhp + $datao2 + $datavisit + $datadarah + $datatindakanlahir + $datatindakanopr + $datatindakanperawat;

		return $totaldata;
	}

	public function pasienbatalpulang($dtregis) {
		$date = date_create($this->input->get("datepicker"));
		$tgl = date_format($date,"Y-m-d");
		$tim = date_create($this->input->get("waktu"));
		$jam = date_format($tim,"H:i:s");
		$kk = $this->input->get("kk");
		$ck = $this->input->get("ck");
		$rm = $this->input->get("rm");

		$ubahregister = array(
			'status' => "1", 
			'tgl_keluar' => $tgl, 
			'jam_keluar' => $jam, 
			'kondisi_keluar' => $kk, 
			'kondisibrm' => $rm, 
			'cara_keluar' => $ck, 
			'keluarpada' => $dtregis->nama_unit, 
			'kode_keluarpada' => $dtregis->kode_unit, 
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"), 
			'pulang' => "1", 
		);
		$this->db->where('notransaksi', $dtregis->notransaksi);
		$dts = $this->db->update('register', $ubahregister);


		$ubahpulang = array(
			'pulang' => "1",
			'status' => "1"
		);
		$this->db->where('notransaksi', $dtregis->notransaksi);
		$dtu = $this->db->update('register_detail', $ubahpulang);

		$ubahregisdetail = array(
			'tgl_keluar_kamar' =>$tgl, 
			'status' => "1", 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"),
			'statuskeluar' => "1", 
			'jam_keluar' => date("H:i:s"), 
			'pulang' => "1", 
			'kamarkeluar' => "1"
		);
		$no = $this->input->get("id");
		$this->db->where('id', $no);
		$dt = $this->db->update('register_detail', $ubahregisdetail);

		return $dt;
	}

}
