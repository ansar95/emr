<?php
/**
 * ------------------------------------------------------------------------
 *
 * dDebug Helper
 *
 * Outputs the given variable(s) with formatting and location
 *
 * @access    public
 * @param    mixed    - variables to be output
 */

function inacbg_request($request){
  $json = inacbg_encrypt ($request, getenv('V_KEY'));  
  $header = array("Content-Type: application/x-www-form-urlencoded");        
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, getenv('V_URL'));
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
  $response = curl_exec($ch);
  $first = strpos($response, "\n")+1;
  $last = strrpos($response, "\n")-1;
  $hasilresponse = substr($response,$first,strlen($response) - $first - $last);
  $hasildecrypt = inacbg_decrypt($hasilresponse, getenv('V_KEY'));
  //echo $hasildecrypt;
  $msg = json_decode($hasildecrypt,true);
  return $msg;
}

function inacbg_encrypt($data, $strkey) {
  $key = hex2bin($strkey);
  if (mb_strlen($key, "8bit") !== 32) {
      throw new Exception("Needs a 256-bit key!");
  }

  $iv_size = openssl_cipher_iv_length("aes-256-cbc");
  $iv = openssl_random_pseudo_bytes($iv_size); 
  $encrypted = openssl_encrypt($data,"aes-256-cbc",$key,OPENSSL_RAW_DATA,$iv );
  $signature = mb_substr(hash_hmac("sha256",$encrypted,$key,true),0,10,"8bit");
  $encoded = chunk_split(base64_encode($signature.$iv.$encrypted));        
  return $encoded;
}

function inacbg_decrypt($str, $strkey){
  $key = hex2bin($strkey);
  if (mb_strlen($key, "8bit") !== 32) {
    throw new Exception("Needs a 256-bit key!");
  }
  
  $iv_size = openssl_cipher_iv_length("aes-256-cbc");
  $decoded = base64_decode($str);
  $signature = mb_substr($decoded,0,10,"8bit");
  $iv = mb_substr($decoded,10,$iv_size,"8bit");
  $encrypted = mb_substr($decoded,$iv_size+10,NULL,"8bit");
  $calc_signature = mb_substr(hash_hmac("sha256",$encrypted,$key,true),0,10,"8bit");        
  if(!inacbg_compare($signature,$calc_signature)) {
    return "SIGNATURE_NOT_MATCH"; 
  }
  
  $decrypted = openssl_decrypt($encrypted,"aes-256-cbc",$key,OPENSSL_RAW_DATA,$iv);
  return $decrypted;
}

function inacbg_compare($a, $b) {
  if (strlen($a) !== strlen($b)) {
    return false;
  }
  
  $result = 0;
  
  for($i = 0; $i < strlen($a); $i ++) {
    $result |= ord($a[$i]) ^ ord($b[$i]);
  }
  
  return $result == 0;
}

/**
  * "24/04/2012"
  */
function inacbg_date($tanggal)
{
    if (!$tanggal) {
      return '';
    }
    $date = DateTime::createFromFormat('Y-m-d', $tanggal);
    return $date->format('d/m/Y');
}

function inacbg_gender($jenisKelamin)
{
    return $jenisKelamin=='P'?'2':'1';
}

/**
 * JALAN, INAP, UGD
 * 1 = rawat inap, 2 = rawat jalan, 3 = rawat igd
 */
function inacbg_jenis_rawat($jenis_rawat)
{
    if ($jenis_rawat == 'INAP') {
      return 1;
    }

    if ($jenis_rawat == 'JALAN') {
      return 2;
    }

    if ($jenis_rawat == 'UGD') {
      return 3;
    }
    return 0;
}

/**
 * KELAS I
 * KELAS II
 * KELAS III
 * VIP
 * 3 = Kelas 3, 2 = Kelas 2, 1 = Kelas 1
 */

function inacbg_kelas_rawat($kelas_hak)
{
  if ($kelas_hak == 'KELAS I') {
    return 1;
  }

  if ($kelas_hak == 'KELAS II') {
    return 2;
  }

  if ($kelas_hak == 'KELAS III') {
    return 3;
  }

  return 0;

}

/**
 * LOKET, POLI, UGD
 * gp, mp, inp, born, psych, hosp-trans, outp, emd, nursing, rehab, other
 */
function inacbg_cara_masuk($cara_masuk)
{
  // if ($cara_masuk == 'LOKET') {
  //   return '';
  // }

  if ($cara_masuk == 'POLI') {
    return 'outp';
  }

  if ($cara_masuk == 'UGD') {
    return 'emd';
  }

  return 'other';

}

/**
 * Diijinkan
 * Pulang Paksa
 * Dirujuk Ke
 * Lari
 * Pindah ke RS Lain
 * Meninggal Dunia
 * Batal Pelayanan
 * Lanjut Perawatan
 * 
 * @return
 * 1 = Atas persetujuan dokter              
 * 2 = Dirujuk              
 * 3 = Atas permintaan sendiri              
 * 4 = Meninggal              
 * 5 = Lain-lain
 */
function inacbg_cara_keluar($cara_keluar)
{
  if (!$cara_keluar || $cara_keluar == '') {
    return '';
  }
  if ($cara_keluar == 'Diijinkan') {
    return 1;
  }

  if ($cara_keluar == 'Dirujuk Ke' || $cara_keluar == 'Pindah ke RS Lain') {
    return 2;
  }

  if ($cara_keluar == 'Pulang Paksa') {
    return 3;
  }

  if ($cara_keluar == 'Meninggal Dunia') {
    return 4;
  }

  return 5;
}

/**
 * @param $tanggal_masuk Y-m-d
 * $tanggal_keluar Y-m-d
 * 
 */
function inacbg_jumlah_hari_dirawat($tanggal_masuk, $tanggal_keluar)
{
  $tanggal_keluar = strtotime($tanggal_keluar);
  $tanggal_masuk = strtotime($tanggal_masuk);
  $datediff = $tanggal_keluar - $tanggal_masuk;
  return round($datediff / (60 * 60 * 24));
}