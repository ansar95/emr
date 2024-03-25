<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpjsantrolmodel extends CI_Model {
    
    public function ambilheader() {
        $sig = signatureantrol();
        $request_headers = array(
            "x-cons-id: " . $sig['consid'],
            "X-timestamp: " . $sig['timestamp'],
            "X-signature: " . $sig['signature'],
            "user_key: " . getenv("V_UKEY")
		);
		return $request_headers;
	}

    public function refjadwaldokter($param1, $param2) {
		// $url = getenv('V_URL_ANTROL') . "/ref/dokter";
		$url = getenv('V_URL_ANTROL'). "/jadwaldokter/kodepoli/" . $param1 . "/tanggal/" . $param2 . "";
		$request_headers = $this->ambilheader();
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => $request_headers,
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          return $response;
        }

	}


    public function refdokter() {
		$url = getenv('V_URL_ANTROL') . "/ref/dokter";
		$request_headers = $this->ambilheader();
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          // CURLOPT_SSL_CIPHER_LIST => "DEFAULT@SECLEVEL=1",
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => $request_headers,
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {

          echo "cURL Error #:" . $err;
        } else {
          return $response;
        }

	}

   
   
}
