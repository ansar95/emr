<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpjsmodel extends CI_Model {

	public function getNoSep($id) {
		$this->db->select('no_sep');
		$this->db->from("sep_resources");
		$this->db->where("id", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function ambildatasep($notransaksi) {
		$this->db->from("sep_resources");
		$this->db->where("notransaksi", $notransaksi);
		$data = $this->db->get();
		return $data->row();
	}

	public function getAllNoSep($no) {
		$this->db->from("sep_resources");
		$this->db->where("no_sep", $no);
		$data = $this->db->get();
		return $data->row();
	}

	public function cetakanKe($no) {
		$this->db->select('cetakan');
		$this->db->from("sep_resources");
		$this->db->where("peserta_no_kartu", $no);
		$this->db->order_by('id', 'DESC');
		$data = $this->db->get();
        return $data->result();
	}

	public function viewCetakanKe($no) {
		$this->db->select('cetakan');
		$this->db->from("sep_resources");
		$this->db->where("no_sep", $no);
		$data = $this->db->get();
        return $data->row();
	}

	///

    public function ambilheader() {
        $sig = signaturevclaim();
        $request_headers = array(
            "x-cons-id: " . $sig['consid'],
            "x-timestamp: " . $sig['timestamp'],
            "x-signature: " . $sig['signature'],
			"user_key: ".$sig['userkey'],
            "Content-Type: application/json; charset=utf-8"
		);
		// var_dump($request_headers);
		return $request_headers;
	}
	
	public function ambilheaderurlencode() {
        $sig = signaturevclaim();
        $request_headers = array(
            "x-cons-id: " . $sig['consid'],
            "x-timestamp: " . $sig['timestamp'],
            "x-signature: " . $sig['signature'],
			"user_key: ".$sig['userkey'],
            "Content-Type: application/x-www-form-urlencoded"
		);
		return $request_headers;
    }

	public function ambiltimestamp() {
        $sig = signaturevclaim();
        $stamp = array(
            "x-timestamp" => $sig['timestamp']
		);
		return $stamp;
    }


	public function referensifaskes($param1, $param2) {
		// $param11='fauziah';
		// $param21='1';
		$url = getenv('V_URL') . "referensi/faskes/" . $param1 . "/" . $param2 . "";
		// $url = getenv('V_URL') . "referensi/faskes/" . $param1 . "/" . $param2 . "";
		$request_headers= $this->ambilheader();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_TIMEOUT => 60,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => $request_headers
		]);
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			return $response;
		}
	}


	
	public function referensipoli($param1) {
		$url = getenv('V_URL') . "referensi/poli/".$param1."";
		// $url = getenv('V_URL') . "referensi/poli/ANA";
		$request_headers = $this->ambilheader();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_TIMEOUT => 60,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => $request_headers
		]);
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			return $response;
		}
	}

	

	
	public function referensidiagnosa($param1) {
		$url = getenv('V_URL') . "referensi/diagnosa/" . $param1 . "";
		$request_headers = $this->ambilheader();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_TIMEOUT => 60,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => $request_headers
		]);
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			return $response;
		}
	}

	public function getpesertarujukan($param1) {
		$url = getenv('V_URL') . "Rujukan/" . $param1 . "";
		$request_headers = $this->ambilheader();
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$data = curl_exec($ch);

		if (curl_errno($ch)) {
			print "Error: " . curl_error($ch);
		} else {
			$transaction = json_decode($data, TRUE);
			curl_close($ch);
			$code = $transaction['metaData']['code'];

			if ($code == V_SUKSES_STATUS) {
				return $transaction['response'];
			}
		}
	}

	public function getpesertabpjs($param1, $param2) {
		$url = getenv('V_URL') . "Peserta/nokartu/" . $param1 . "/tglSEP/" . $param2 . "";
		$request_headers = $this->ambilheader();
		// $request_headers= $this->ambilheader();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_TIMEOUT => 60,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => $request_headers
		]);
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			// return  $err;
			echo "cURL Error #:" . $response;
		} else {
			return $response;
		}
	}

	public function getpesertabpjsnik($param1, $param2) {
		$url = getenv('V_URL') . "Peserta/nik/" . $param1 . "/tglSEP/" . $param2 . "";
		$request_headers = $this->ambilheader();
		// $request_headers= $this->ambilheader();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_TIMEOUT => 60,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => $request_headers
		]);
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			return $response;
		}
	}

	public function getprovinsi() {
		$url = getenv('V_URL') . "referensi/propinsi";
		$request_headers = $this->ambilheader();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_TIMEOUT => 60,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => $request_headers
		]);
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			return $response;
		}
	}

	public function getkabupaten($param2) {
		$url = getenv('V_URL') . "referensi/kabupaten/propinsi/" . $param2 . "";
		$request_headers = $this->ambilheader();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_TIMEOUT => 60,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => $request_headers
		]);
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			return $response;
		}
	}

	public function getkecamatan($param2) {
		$url = getenv('V_URL') . "referensi/kecamatan/kabupaten/" . $param2 . "";
		$request_headers = $this->ambilheader();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_TIMEOUT => 60,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => $request_headers
		]);
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			return $response;
		}
	}

	public function getdpjp($param1, $param2, $param3) {
		$url = getenv('V_URL') . "referensi/dokter/pelayanan/" . $param1 . "/tglPelayanan/" . $param2 . "/Spesialis/" . $param3 . "";
		$request_headers = $this->ambilheader();
		// $request_headers= $this->ambilheader();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_TIMEOUT => 60,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => $request_headers
		]);
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			return $response;
		}
	}


	public function getrujukannoka($param2) {
		$url = getenv('V_URL') . "Rujukan/Peserta/" . $param2 . "";
		$request_headers = $this->ambilheader();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_TIMEOUT => 60,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => $request_headers
		]);
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			return $response;
		}
	}

	public function ambilrujukan($param2) {
		$url = getenv('V_URL') . "Rujukan/" . $param2 . "";
		$request_headers = $this->ambilheader();
		//-----baca disini timestame nya
		$timestampsep= $this->ambiltimestamp();

		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_TIMEOUT => 60,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => $request_headers
		]);
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			return array($response,$timestampsep); //masukkan disini timestampnya
		}
	}

	public function insertSEP() {
		$noKartu=$_GET['noKartu'];
		$tglSep=$_GET['tglSep'];
		$klsRawatHak=$_GET['klsRawatHak'];
		$noMR=$_GET['noMR'];
		$catatan=$_GET['catatan'];
		$diagAwal=$_GET['diagAwal'];
		$politujuan=$_GET['tujuan'];
		$kodeDPJP=$_GET['kodeDPJP'];
		$dpjpLayan=$_GET['dpjpLayan'];
		$noTelpDPJP=$_GET['noTelpDPJP'];
		$noHp=$_GET['noHp'];
		

		$url = getenv('V_URL') . "SEP/2.0/insert";
		$ppkPelayanan = getenv('V_PPK');
		$request_headers = $this->ambilheaderurlencode();
		$timestampsep= $this->ambiltimestamp();
		$curl = curl_init();
		$datanya = json_encode(array(
			'request' => 
			array (
			  't_sep' => 
			  array (
				'noKartu' =>$noKartu,
				'tglSep' => $tglSep,
				'ppkPelayanan' => getenv('V_PPK'),
				'jnsPelayanan' => '2',
				'klsRawat' => 
				array (
				  'klsRawatHak' => $klsRawatHak,
				  'klsRawatNaik' => '',
				  'pembiayaan' => '',
				  'penanggungJawab' => '',
				),
				'noMR' => $noMR,
				'rujukan' => 
				array (
				  'asalRujukan' => '2',
				  'tglRujukan' => '',
				  'noRujukan' => '',
				  'ppkRujukan' => '',
				),
				'catatan' => $catatan,
				'diagAwal' => $diagAwal,
				'poli' => 
				array (
				  'tujuan' => $politujuan,
				  'eksekutif' => '0',
				),
				'cob' => 
				array (
				  'cob' => '0',
				),
				'katarak' => 
				array (
				  'katarak' => '0',
				),
				'jaminan' => 
				array (
				  'lakaLantas' => '0',
				  'noLP' => '',
				  'penjamin' => 
				  array (
					'tglKejadian' => '',
					'keterangan' => '',
					'suplesi' => 
					array (
					  'suplesi' => '0',
					  'noSepSuplesi' => '',
					  'lokasiLaka' => 
					  array (
						'kdPropinsi' => '',
						'kdKabupaten' => '',
						'kdKecamatan' => '',
					  ),
					),
				  ),
				),
				'tujuanKunj' => $tujuanKunj,
				'flagProcedure' => $flagProcedure,
				'kdPenunjang' => $kdPenunjang,
				'assesmentPel' => $assesmentPel,
				'skdp' => 
				array (
				  'noSurat' => '',
				  'kodeDPJP' => '',
				),
				'dpjpLayan' => $dpjpLayan,
				'noTelp' => $noTelpDPJP,
				'user' => $this->session->userdata("nmuser"),
			  ),
			),
		  ));
		//   var_dump($datanya);
		  curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $datanya,
			CURLOPT_HTTPHEADER => $request_headers
		  ]);

		$response = curl_exec($curl);

		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			return array($response,$timestampsep);
		}

	}

	public function updateSEP() {
		$nosep=$_GET['nosep'];
		$noKartu=$_GET['noKartu'];
		$tglSep=$_GET['tglSep'];
		$klsRawatHak=$_GET['klsRawatHak'];
		$noMR=$_GET['noMR'];
		$catatan=$_GET['catatan'];
		$diagAwal=$_GET['diagAwal'];
		$politujuan=$_GET['tujuan'];
		$kodeDPJP=$_GET['kodeDPJP'];
		$dpjpLayan=$_GET['dpjpLayan'];
		$noTelpDPJP=$_GET['noTelpDPJP'];
		$noHp=$_GET['noHp'];
	
		$url = getenv('V_URL') . "SEP/2.0/update";
		$ppkPelayanan = getenv('V_PPK');
		$request_headers = $this->ambilheaderurlencode();
		$timestampsep= $this->ambiltimestamp();
		$curl = curl_init();
		$datanya = json_encode(array(
			'request' => 
			array (
			  't_sep' => 
			  array (
				'noSep' =>$nosep,
				'klsRawat' => 
				array (
				  'klsRawatHak' => $klsRawatHak,
				  'klsRawatNaik' => '',
				  'pembiayaan' => '',
				  'penanggungJawab' => '',
				),
				'noMR' => $noMR,
				'catatan' => $catatan,
				'diagAwal' => $diagAwal,
				'poli' => 
				array (
				  'tujuan' => $politujuan,
				  'eksekutif' => '0',
				),
				'cob' => 
				array (
				  'cob' => '0',
				),
				'katarak' => 
				array (
				  'katarak' => '0',
				),
				'jaminan' => 
				array (
				  'lakaLantas' => '0',
				  'penjamin' => 
				  array (
					'tglKejadian' => '',
					'keterangan' => '',
					'suplesi' => 
					array (
					  'suplesi' => '0',
					  'noSepSuplesi' => '',
					  'lokasiLaka' => 
					  array (
						'kdPropinsi' => '',
						'kdKabupaten' => '',
						'kdKecamatan' => '',
					  ),
					),
				  ),
				),
				'dpjpLayan' => $dpjpLayan,
				'noTelp' => $noTelpDPJP,
				'user' => $this->session->userdata("nmuser"),
			  ),
			),
		  ));
		//   var_dump($datanya);
		  curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_CUSTOMREQUEST => "PUT",
			CURLOPT_POSTFIELDS => $datanya,
			CURLOPT_HTTPHEADER => $request_headers
		  ]);

		$response = curl_exec($curl);

		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			return array($response,$timestampsep);
		}

	}

	public function readSEP($no) {
		$url = getenv('V_URL') . "SEP/" . $no;
		$request_headers = $this->ambilheaderurlencode();
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$data = curl_exec($ch);

		if (curl_errno($ch)) {
			print "Error: " . curl_error($ch);
		} else {
			$transaction = json_decode($data, TRUE);
			curl_close($ch);
			$code = $transaction['metaData']['code'];

			if ($code == V_SUKSES_STATUS) {
				return array(
					$code,
					$transaction['response']
				);
			} else if ($code == V_REQUIRED_STATUS) {
				return array(
					$code,
					$transaction['metaData']['message']
				);
			}
		}
	}

	public function readRujukan($no) {
		$url = getenv('V_URL') . "Rujukan/" . $no;
		$request_headers = $this->ambilheaderurlencode();
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$data = curl_exec($ch);

		if (curl_errno($ch)) {
			print "Error: " . curl_error($ch);
		} else {
			$transaction = json_decode($data, TRUE);
			curl_close($ch);
			$code = $transaction['metaData']['code'];

			if ($code == V_SUKSES_STATUS) {
				return array(
					$code,
					$transaction['response']
				);
			} else if ($code == V_REQUIRED_STATUS) {
				return array(
					$code,
					$transaction['metaData']['message']
				);
			}
		}
	}


	public function hapusSEP($data) {
		$url = getenv('V_URL') . "SEP/Delete";
		$request_headers = $this->ambilheaderurlencode();
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$data = curl_exec($ch);

		if (curl_errno($ch)) {
			print "Error: " . curl_error($ch);
		} else {
			$transaction = json_decode($data, TRUE);
			curl_close($ch);
			$code = $transaction['metaData']['code'];

			if ($code == V_SUKSES_STATUS) {
				return array(
					$code,
					$transaction['response']
				);
			} else if ($code == V_REQUIRED_STATUS) {
				return array(
					$code,
					$transaction['metaData']['message']
				);
			}
		}
	}

	public function pulangSEP($data) {
		$url = getenv('V_URL') . "Sep/updtglplg";
		$request_headers = $this->ambilheaderurlencode();
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$data = curl_exec($ch);

		if (curl_errno($ch)) {
			print "Error: " . curl_error($ch);
		} else {
			$transaction = json_decode($data, TRUE);
			curl_close($ch);
			$code = $transaction['metaData']['code'];

			if ($code == V_SUKSES_STATUS) {
				return array(
					$code,
					$transaction['response']
				);
			} else if ($code == V_REQUIRED_STATUS) {
				return array(
					$code,
					$transaction['metaData']['message']
				);
			}
		}
	}

	// 

	public function ambilListSep() {
		$noSep = $this->input->post('sep');
		$nama = $this->input->post('nama');
		$rm = $this->input->post('rm');

		if (($noSep == null) || ($noSep == "") ) {
			if (($nama == null) || ($nama == "") ) {
				if (($rm == null) || ($rm == "") ) {
					return null;
				}
			}
		}

		$this->db->from("sep_resources");
		if (($noSep != null) || ($noSep != "") ) {
			$this->db->where("no_sep", $noSep);
		}
		if (($nama != null) || ($nama != "") ) {
			$this->db->where("peserta_nama", $nama);
		}
		if (($rm != null) || ($rm != "") ) {
			$this->db->where("peserta_no_mr", $rm);
		}
		$data = $this->db->get();
        return $data->result();
	}


	public function inserSPRI() {
		$url = getenv('V_URL') . "RencanaKontrol/InsertSPRI";
		$ppkPelayanan = getenv('V_PPK');
		$request_headers = $this->ambilheaderurlencode();
		$timestampsep= $this->ambiltimestamp();
		$curl = curl_init();

		$notransaksi = $this->input->get("notransaksi");
		$noKartu = $this->input->get("noKartu");
		$tglSep = $this->input->get("tglSep");
		$tujuan = $this->input->get("tujuan");
		$namaTujuan = $this->input->get("namaTujuan");
		$dpjpLayan = $this->input->get("dpjpLayan");
		$namadpjpLayan = $this->input->get("namadpjpLayan");

		$datanya = json_encode(array (
			'request' => 
			array (
			  'noKartu' => $noKartu,
			  'kodeDokter' => $dpjpLayan,
			  'poliKontrol' => 'UMU',
			  'tglRencanaKontrol' => $tglSep
			),
		  ));

		curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $datanya,
			CURLOPT_HTTPHEADER => $request_headers	
		]);
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			return array($response,$timestampsep);
		}
	}
}

		
