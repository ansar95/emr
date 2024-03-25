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

	public function ambildatasep_rinap($notransaksi) {
		$this->db->from("sep_resources");
		$this->db->where("notransaksi", $notransaksi);
		$this->db->where("jns_pelayanan", 'R.Inap');
		$data = $this->db->get();
		return $data->row();
	}

	public function ambildatasep_nosep() {
        $nosep = $this->input->get("nosep");
		$this->db->from("sep_resources");
		$this->db->where("nosep", $nosep);
		$data = $this->db->get();
		return $data->row();
	}

	public function ambildataspri($notransaksi) {
		$this->db->from("spri_resources");
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
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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

	public function reffaskes($param1) {
		$url = getenv('V_URL') . "referensi/faskes/". $param1 . "/2";
		$request_headers = $this->ambilheader();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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

	public function ambilrujukanRS($param2) {
		$url = getenv('V_URL') . "Rujukan/RS/" . $param2 . "";
		$request_headers = $this->ambilheader();
		//-----baca disini timestame nya
		$timestampsep= $this->ambiltimestamp();

		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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

		//----diatur pada form sep
		$jnsPelayanan=$_GET['jnsPelayanan'];
		$penanggungJawab=$_GET['penanggungJawab'];
		$klsRawatNaik=$_GET['klsRawatNaik'];
		$pembiayaan=$_GET['pembiayaan'];
		$penanggungJawab=$_GET['penanggungJawab'];
		$asalRujukan=$_GET['asalRujukan'];
		$tglRujukan=$_GET['tglRujukan'];
		$noRujukan=$_GET['noRujukan'];
		$ppkRujukan=$_GET['ppkRujukan'];
		$eksekutif=$_GET['eksekutif'];
		$cob=$_GET['cob'];
		$katarak=$_GET['katarak'];
		$pembiayaan=$_GET['pembiayaan'];
		$noLP=$_GET['noLP'];
		$lakaLantas=$_GET['lakaLantas'];
		$tglKejadian=$_GET['tglKejadian'];
		$keterangan=$_GET['keterangan'];
		$suplesi=$_GET['suplesi'];
		$noSepSuplesi=$_GET['noSepSuplesi'];
		$kdPropinsi=$_GET['kdPropinsi'];
		$kdKabupaten=$_GET['kdKabupaten'];
		$kdKecamatan=$_GET['kdKecamatan'];
		$tujuanKunj=$_GET['tujuanKunj'];
		$flagProcedure=$_GET['flagProcedure'];
		$kdPenunjang=$_GET['kdPenunjang'];
		$assesmentPel=$_GET['assesmentPel'];
		$noSurat=$_GET['noSurat'];
		
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
				'jnsPelayanan' => $jnsPelayanan,
				'klsRawat' => 
				array (
				  'klsRawatHak' => $klsRawatHak,
				  'klsRawatNaik' => $klsRawatNaik,
				  'pembiayaan' => $pembiayaan,
				  'penanggungJawab' => $penanggungJawab,
				),
				'noMR' => $noMR,
				'rujukan' => 
				array (
				  'asalRujukan' => $asalRujukan,
				  'tglRujukan' => $tglRujukan,
				  'noRujukan' => $noRujukan,
				  'ppkRujukan' => $ppkRujukan,
				),
				'catatan' => $catatan,
				'diagAwal' => $diagAwal,
				'poli' => 
				array (
				  'tujuan' => $politujuan,
				  'eksekutif' => $eksekutif,
				),
				'cob' => 
				array (
				  'cob' => $cob,
				),
				'katarak' => 
				array (
				  'katarak' => $katarak,
				),
				'jaminan' => 
				array (
				  'lakaLantas' => $lakaLantas,
				  'noLP' => $noLP,
				  'penjamin' => 
				  array (
					'tglKejadian' => $tglKejadian,
					'keterangan' => $keterangan,
					'suplesi' => 
					array (
					  'suplesi' => $suplesi,
					  'noSepSuplesi' => $noSepSuplesi,
					  'lokasiLaka' => 
					  array (
						'kdPropinsi' => $kdPropinsi,
						'kdKabupaten' => $kdKabupaten,
						'kdKecamatan' => $kdKecamatan,
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
				  'noSurat' => $noSurat,
				  'kodeDPJP' => $kodeDPJP,
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
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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


	public function deleteSEP() {
		// $nosep=$_GET['nosep'];
		$nosep1=$this->input->get("nosep1");
		// alertWindow($nosep1);
		$url = getenv('V_URL') . "SEP/2.0/delete";
		$ppkPelayanan = getenv('V_PPK');
		$request_headers = $this->ambilheaderurlencode();
		$timestampsep= $this->ambiltimestamp();
		$curl = curl_init();
		$datanya = json_encode(array(
			'request' => 
			array (
			  't_sep' => 
			  array (
				'noSep' =>$nosep1,
				'user' => $this->session->userdata("nmuser")
			  ),
			),
		  ));
		  curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
			CURLOPT_ENCODING => "",
			CURLOPT_CUSTOMREQUEST => "DELETE",
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

	public function deleteSPRI() {
		// $nosep=$_GET['nosep'];
		$nospri=$this->input->get("nospri");
		// alertWindow($nosep1);
		$url = getenv('V_URL') . "RencanaKontrol/Delete";
		$ppkPelayanan = getenv('V_PPK');
		$request_headers = $this->ambilheaderurlencode();
		$timestampsep= $this->ambiltimestamp();
		$curl = curl_init();
		$datanya = json_encode(array(
			'request' => 
			array (
			  't_suratkontrol' => 
			  array (
				'noSuratKontrol' =>$nospri,
				'user' => $this->session->userdata("nmuser")
			  ),
			),
		  ));
		  curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
			CURLOPT_ENCODING => "",
			CURLOPT_CUSTOMREQUEST => "DELETE",
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
		$poliKontrol="UMU";
		// $poliKontrol=$tujuan;
		// $noKartu = '0002059944524';
		// $tglSep = '2023-06-03';
		// $dpjpLayan = '22070';


		$datanya = json_encode(array (
			'request' => 
			array (
			  'noKartu' => $noKartu,
			  'kodeDokter' => $dpjpLayan,
			  'poliKontrol' =>  $poliKontrol,
			  'tglRencanaKontrol' => $tglSep,
			  'user' => $this->session->userdata("nmuser")
			),
		  ));

		curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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


	public function editSPRI() {
		$url = getenv('V_URL') . "RencanaKontrol/UpdateSPRI";
		$ppkPelayanan = getenv('V_PPK');
		$request_headers = $this->ambilheaderurlencode();
		$timestampsep= $this->ambiltimestamp();
		$curl = curl_init();

		$nospri = $this->input->get("nospri");
		$tglspri = $this->input->get("tglSep");
		$tujuan = $this->input->get("tujuan");
		$namaTujuan = $this->input->get("namaTujuan");
		$dpjpLayan = $this->input->get("dpjpLayan");
		$namadpjpLayan = $this->input->get("namadpjpLayan");
		$notransaksi = $this->input->get("notransaksi");
		$namadpjpLayan = $this->input->get("namadpjpLayan");
		$poliKontrol="UMU";

		$datanya = json_encode(array (
			'request' => 
			array (
			  'noSPRI' => $nospri,
			  'kodeDokter' => $dpjpLayan,
			  'poliKontrol' =>  $poliKontrol,
			  'tglRencanaKontrol' => $tglspri,
			  'user' => $this->session->userdata("nmuser")
			),
		  ));

		curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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

	public function inserSurkon() {
		$url = getenv('V_URL') . "RencanaKontrol/insert";
		$ppkPelayanan = getenv('V_PPK');
		$request_headers = $this->ambilheaderurlencode();
		$timestampsep= $this->ambiltimestamp();
		$curl = curl_init();

		$notransaksi = $this->input->get("notransaksi");
		$nosep = $this->input->get("nosep");
		$noKartu = $this->input->get("noKartu");
		$tglSep = $this->input->get("tglSep");
		$tujuan = $this->input->get("tujuan");
		$namaTujuan = $this->input->get("namaTujuan");
		$dpjpLayan = $this->input->get("dpjpLayan");
		$namadpjpLayan = $this->input->get("namadpjpLayan");
		$poliKontrol=$tujuan;

		$datanya = json_encode(array (
			'request' => 
			array (
			  'noSEP' => $nosep,
			  'kodeDokter' => $dpjpLayan,
			  'poliKontrol' =>  $poliKontrol,
			  'tglRencanaKontrol' => $tglSep,
			  'user' => $this->session->userdata("nmuser")
			),
		  ));

		curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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

	public function getSEP($param1) {
		$url = getenv('V_URL') . "SEP/" . $param1 . "";
		$request_headers = $this->ambilheaderurlencode();
		$timestampsep= $this->ambiltimestamp();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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
			return array($response,$timestampsep);
		}
	}


	public function persetujuanSEP() {
		$noKartu = $this->input->get("noKartu");
		$tglSep = $this->input->get("tglSep");
		$jnsPelayanan = $this->input->get("jnsPelayanan");
		$jnsPengajuan = $this->input->get("jnsPengajuan");
		$keterangan = $this->input->get("keterangan");

		$url = getenv('V_URL') . "Sep/pengajuanSEP";
		$ppkPelayanan = getenv('V_PPK');
		$request_headers = $this->ambilheaderurlencode();
		$timestampsep= $this->ambiltimestamp();
		$curl = curl_init();

		$datanya = json_encode(array (
			'request' => 
			array (
			  't_sep' => 
			  array (
				'noKartu' => $noKartu,
				'tglSep' => $tglSep,
				'jnsPelayanan' => $jnsPelayanan,
				'jnsPengajuan' => $jnsPengajuan,
				'keterangan' => $keterangan,
				'user' => $this->session->userdata("nmuser")
			  ),
			),
		));

		curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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

	public function approvalSEP() {
		$url = getenv('V_URL') . "Sep/aprovalSEP";
		$ppkPelayanan = getenv('V_PPK');
		$request_headers = $this->ambilheaderurlencode();
		$timestampsep= $this->ambiltimestamp();
		$curl = curl_init();

		$datanya = json_encode(array (
			'request' => 
			array (
			  't_sep' => 
			  array (
				'noKartu' => '0001226512383',
				'tglSep' => '2023-06-13',
				'jnsPelayanan' => '2',
				'jnsPengajuan' => '2',
				'keterangan' => 'Hari libur',
				'user' => $this->session->userdata("nmuser")
			  ),
			),
		));

		
		curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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


	public function listPersetujuan() {
		$param1='12';
		$param2='2022';

		$url = getenv('V_URL') . "Sep/persetujuanSEP/list/bulan/" . $param1 . "/tahun"."/" . $param2 . "";
		$ppkPelayanan = getenv('V_PPK');
		$request_headers = $this->ambilheaderurlencode();
		$timestampsep= $this->ambiltimestamp();
		$curl = curl_init();
		
		curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
			CURLOPT_ENCODING => "",
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
			return array($response,$timestampsep);
		}
	}

	public function simpantglpulang() {
		$noSep = $this->input->get("nosep");
		$statusPulang = $this->input->get("txtpelayanan");
		$noSuratMeninggal = $this->input->get("nosurat");
		$tglMeninggal = $this->input->get("tglmeninggal");
		$tglPulang = $this->input->get("tglpulang");
		$noLPManual = '';

		$url = getenv('V_URL') . "SEP/2.0/updtglplg";
		$ppkPelayanan = getenv('V_PPK');
		$request_headers = $this->ambilheaderurlencode();
		$timestampsep= $this->ambiltimestamp();
		$curl = curl_init();

		$datanya = json_encode(array (
			'request' => 
			array (
			  't_sep' =>
			  array (
				'noSep' => $noSep,
				'statusPulang' => $statusPulang,
				'noSuratMeninggal' => $noSuratMeninggal,
				'tglMeninggal' => $tglMeninggal,
				'tglPulang' => $tglPulang,
				'noLPManual' => $noLPManual,
				'user' => $this->session->userdata("nmuser")
			  ),
			),
		));

		curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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


	public function simpanrujukan() {
		$noSep = $this->input->get("nosep");
		$txttglrujukan = $this->input->get("txttglrujukan");
		$txttglkunjungan = $this->input->get("txttglkunjungan");
		$pelayanan = $this->input->get("pelayanan");
		$tipeRujukan = $this->input->get("tipeRujukan");
		$diagRujukan = $this->input->get("diagRujukan");
		$ppkDirujuk = $this->input->get("ppkDirujuk");
		$catatan = $this->input->get("catatan");
		$diagRujukan = $this->input->get("diagRujukan");
		$poliRujukan = $this->input->get("poliRujukan");
		$catatan = $this->input->get("catatan");
		
		$url = getenv('V_URL') . "Rujukan/2.0/insert";
		$ppkPelayanan = getenv('V_PPK');
		$request_headers = $this->ambilheaderurlencode();
		$timestampsep= $this->ambiltimestamp();
		$curl = curl_init();

		$datanya = json_encode(array (
			'request' => 
			array (
			  't_rujukan' => 
			  array (
				'noSep' => $noSep,
				'tglRujukan' => $txttglrujukan,
				'tglRencanaKunjungan' => $txttglkunjungan,
				'ppkDirujuk' => $ppkDirujuk,
				'jnsPelayanan' => $pelayanan,
				'catatan'=> $catatan,
				'diagRujukan'=> $diagRujukan,
				'tipeRujukan'=> $tipeRujukan,
				'poliRujukan'=> $poliRujukan,
				'user' => $this->session->userdata("nmuser")
			  ),
			),
		));

		
		curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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


	public function updaterujukan() {
		$noSep = $this->input->get("nosep");
		$norujukan = $this->input->get("norujukan");
		$txttglrujukan = $this->input->get("txttglrujukan");
		$txttglkunjungan = $this->input->get("txttglkunjungan");
		$pelayanan = $this->input->get("pelayanan");
		$tipeRujukan = $this->input->get("tipeRujukan");
		$diagRujukan = $this->input->get("diagRujukan");
		$ppkDirujuk = $this->input->get("ppkDirujuk");
		$catatan = $this->input->get("catatan");
		$diagRujukan = $this->input->get("diagRujukan");
		$poliRujukan = $this->input->get("poliRujukan");
		$catatan = $this->input->get("catatan");
		
		$url = getenv('V_URL') . "Rujukan/2.0/Update";
		$ppkPelayanan = getenv('V_PPK');
		$request_headers = $this->ambilheaderurlencode();
		$timestampsep= $this->ambiltimestamp();
		$curl = curl_init();

		$datanya = json_encode(array (
			'request' => 
			array (
			  't_rujukan' => 
			  array (
				'noRujukan' => $norujukan,
				'tglRujukan' => $txttglrujukan,
				'tglRencanaKunjungan' => $txttglkunjungan,
				'ppkDirujuk' => $ppkDirujuk,
				'jnsPelayanan' => $pelayanan,
				'catatan'=> $catatan,
				'diagRujukan'=> $diagRujukan,
				'tipeRujukan'=> $tipeRujukan,
				'poliRujukan'=> $poliRujukan,
				'user' => $this->session->userdata("nmuser")
			  ),
			),
		));

		
		curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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

	public function hapusrujukan() {
		// $nosep=$_GET['nosep'];
		$norujukan=$this->input->get("norujukan");
		// alertWindow($nosep1);
		$url = getenv('V_URL') . "Rujukan/delete";
		$ppkPelayanan = getenv('V_PPK');
		$request_headers = $this->ambilheaderurlencode();
		$timestampsep= $this->ambiltimestamp();
		$curl = curl_init();
		$datanya = json_encode(array(
			'request' => 
			array (
			  't_rujukan' => 
			  array (
				'noRujukan' =>$norujukan,
				'user' => $this->session->userdata("nmuser")
			  ),
			),
		  ));

		  curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
			CURLOPT_ENCODING => "",
			CURLOPT_CUSTOMREQUEST => "DELETE",
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

	public function ambilRujukanInternal($param2) {
		$url = getenv('V_URL') . "SEP/Internal/" . $param2 . "";
		$request_headers = $this->ambilheader();
		//-----baca disini timestame nya
		$timestampsep= $this->ambiltimestamp();

		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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

	public function ruangrawat() {
		$url = getenv('V_URL') . "referensi/ruangrawat";
		$request_headers = $this->ambilheader();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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

	public function spesialistik() {
		$url = getenv('V_URL') . "referensi/spesialistik";
		$request_headers = $this->ambilheader();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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

	public function kelasrawat() {
		$url = getenv('V_URL') . "referensi/kelasrawat";
		$request_headers = $this->ambilheader();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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

	public function carakeluar() {
		$url = getenv('V_URL') . "referensi/carakeluar";
		$request_headers = $this->ambilheader();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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

	public function pascapulang() {
		$url = getenv('V_URL') . "referensi/pascapulang";
		$request_headers = $this->ambilheader();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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
	
	public function refprocedure($param1) {
		$url = getenv('V_URL') . "referensi/procedure/" . $param1 . "";
		$request_headers = $this->ambilheader();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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

	public function jadwalpolispesialistik($param1,$param2,$param3) {
		// $url = getenv('V_URL') . "RencanaKontrol/ListSpesialistik/JnsKontrol/1/nomor/0001226512383/TglRencanaKontrol/". $param3 ."";
		$url = getenv('V_URL') . "RencanaKontrol/ListSpesialistik/JnsKontrol/2/nomor/1806R0010623V000042/TglRencanaKontrol/2023-06-26";
		// RencanaKontrol/ListSpesialistik/JnsKontrol/{parameter 1}/nomor/{parameter 2}/TglRencanaKontrol/{parameter 3}
		$request_headers = $this->ambilheader();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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

	public function cekjadwaldokter($param1,$param2,$param3) {
		// $url = getenv('V_URL') . "RencanaKontrol/JadwalPraktekDokter/JnsKontrol/2/KdPoli/BED/TglRencanaKontrol/2023-07-21";
		// $url = getenv('V_URL') . "RencanaKontrol/JadwalPraktekDokter/JnsKontrol/".$param1."/KdPoli/".$param2."/TglRencanaKontrol/".$param3."";  --->ini yang lama yg di uji saat uat
		$url = getenv('V_URL') ."referensi/dokter/pelayanan/".$param1."/tglPelayanan/".$param2."/Spesialis/".$param3."";
		// $url = getenv('V_URL') ."referensi/dokter/pelayanan/2/tglPelayanan/2023-08-21/Spesialis/INT";
		$request_headers = $this->ambilheaderurlencode();
		$timestampsep= $this->ambiltimestamp();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
		  CURLOPT_ENCODING => "",
		  CURLOPT_TIMEOUT => 60,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => $request_headers
		]);
		$response = curl_exec($curl);
		// var_dump($response);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			return array($response,$timestampsep);
			// return $response;
		}
	}

	
	public function ceklistsurkonspri($param1,$param2,$param3) {
		$url = getenv('V_URL') . "RencanaKontrol/ListRencanaKontrol/tglAwal/".$param1."/tglAkhir/".$param2."/filter/".$param3."";
		$request_headers = $this->ambilheaderurlencode();
		$timestampsep= $this->ambiltimestamp();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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
			return array($response,$timestampsep);
			// return $response;
		}
	}


	public function cekHistorySEP_tes($param1,$param2,$param3) {
		// $url = getenv('V_URL') . "RencanaKontrol/ListRencanaKontrol/tglAwal/".$param1."/tglAkhir/".$param2."/filter/".$param3."";
		$url = getenv('V_URL') . "monitoring/HistoriPelayanan/NoKartu/0002041375241/tglMulai/2023-08-01/tglAkhir/2023-09-01";

		$request_headers = $this->ambilheaderurlencode();
		$timestampsep= $this->ambiltimestamp();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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
			return array($response,$timestampsep);
			// return $response;
		}
	}

	public function cekRencanaKontrol_tes($param1,$param2,$param3,$param4) {
		// $url = getenv('V_URL') . "RencanaKontrol/ListRencanaKontrol/tglAwal/".$param1."/tglAkhir/".$param2."/filter/".$param3."";
		$url = getenv('V_URL') . "RencanaKontrol/ListRencanaKontrol/Bulan/".$param1."/Tahun/".$param2."/Nokartu/".$param3."/filter/".$param4."";
		
		$request_headers = $this->ambilheaderurlencode();
		$timestampsep= $this->ambiltimestamp();
		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
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
			return array($response,$timestampsep);
			// return $response;
		}
	}

}

		
