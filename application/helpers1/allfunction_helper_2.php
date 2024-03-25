<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function signaturevclaim() {
	$consId = getenv("V_ID");
	$secretKey = getenv("V_KEY");
    date_default_timezone_set('UTC');
    $tStamp = strval(strtotime(date('Y-m-d H:i:s')));
	$signature = hash_hmac('sha256', $consId."&".$tStamp, $secretKey, true);
   	$encodedSignature = base64_encode($signature);
	return array(
		"consid" => $consId,
		"timestamp" => $tStamp,
		"signature" => $encodedSignature
	);
}

function signatureantrol() {
	$consId = getenv("V_CID");
	$secretKey = getenv("V_SKEY");
    date_default_timezone_set('UTC');
    $tStamp = strval(strtotime(date('Y-m-d H:i:s')));
	$signature = hash_hmac('sha256', $consId."&".$tStamp, $secretKey, true);
   	$encodedSignature = base64_encode($signature);
	return array(
		"consid" => $consId,
		"timestamp" => $tStamp,
		"signature" => $encodedSignature
	);
}


function stringDecrypt($string){
	$consid=getenv("V_CID");
	$conspwd=getenv("V_SKEY");
	date_default_timezone_set('UTC');
    $tStamp = strval(strtotime(date('Y-m-d H:i:s')));
	$key=$consid.$conspwd.$tStamp;
	$encrypt_method = 'AES-256-CBC';
	// hash
	$key_hash = hex2bin(hash('sha256', $key));
	// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	$iv = substr(hex2bin(hash('sha256', $key)), 0, 16);
	$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);
	return $output;
}

// function lzstring decompress 
// download libraries lzstring : https://github.com/nullpunkt/lz-string-php
function decompress($string){      
    return \LZCompressor\LZString::decompressFromEncodedURIComponent($string);
}

function hitungumur($dateOfBirth) {
	$today = date("Y-m-d");
	$diff = date_diff(date_create($dateOfBirth), date_create($today));
	return $diff->format('%y');
}

function hitungHARI($dateOfBirth) {
	$today = date("Y-m-d");
	$diff = date_diff(date_create($dateOfBirth), date_create($today));
	$t = $diff->format('%d');
	return $t;
}

function hitunglamainap($d1, $d2) {
	if ($d2 == "0000:00:00") {
		$today = date("Y-m-d");
		$diff = date_diff(date_create($d1), date_create($today));
		$t = $diff->format('%d');
		if ($t == 0) {
			return 1;
		} else {
			return $t;
		}
	} else {
		$diff = date_diff(date_create($d1), date_create($d2));
		$t = $diff->format('%d');
		return $t;
	}
}

function tanggalsatu($tgl) {
	$r = date_create($tgl);
	return date_format($r, "d M Y, H:m:s");
}

function tanggaltiga($tgl) {
	$r = date_create($tgl);
	return date_format($r, "d-m-Y");
}

function tanggaldua($tgl) {
	if ($tgl == "0000-00-00" || $tgl == null ) {
		return "";
	}
	$r = date_create($tgl);
	return date_format($r, "d-m-Y");
}

function tanggalblntgl($tgl) {
	if ($tgl == "0000-00-00") {
		return "";
	}
	$xtglback=substr($tgl,5,2).'/'.substr($tgl,8,2).'/'.substr($tgl,0,4);
	return $xtglback;
}

function tglind($tgl) {
	if ($tgl == "0000-00-00") {
		return "";
	}
	$xtglback = date("m-d-Y", strtotime($tgl));
	return $xtglback;
}


function tgl_format_indo_huruf($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function nama_bulan($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $bulan[ (int)$pecahkan[1] ];
}

function nama_bulan_indonesia($nomorbulan){

	if ($nomorbulan=="") {$namabulannya="";} 
	if ($nomorbulan=="01") {$namabulannya="JANUARI";}
	if ($nomorbulan=="02") {$namabulannya="FEBRUARI";}
	if ($nomorbulan=="03") {$namabulannya="MARET";}
	if ($nomorbulan=="04") {$namabulannya="APRIL";}
	if ($nomorbulan=="05") {$namabulannya="MEI";}
	if ($nomorbulan=="06") {$namabulannya="JUNI";}
	if ($nomorbulan=="07") {$namabulannya="JULI";}
	if ($nomorbulan=="08") {$namabulannya="AGUSTUS";}
	if ($nomorbulan=="09") {$namabulannya="SEPTEMBER";}
	if ($nomorbulan=="10") {$namabulannya="OKTOBER";}
	if ($nomorbulan=="11") {$namabulannya="NOVEMBER";}
	if ($nomorbulan=="12") {$namabulannya="DESEMBER";}

	return $namabulannya;
}

function tgl_format_indo($tanggal){
	
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . '-' . $pecahkan[1] . '-' . $pecahkan[0];
}

function barulama($tulisan) {
	if ($tulisan == "0") {
		return "Lama";
	} else {
		return "Baru";
	}
}

function namafiletgl() {
	$today = date("YmdHis");
	return $today;
}

function ceksess($dt, $id) {
	$ci =& get_instance();
	$ci->db->from("user_master");
	$ci->db->where("id", $id);
	$ci->db->where($dt, 1);
	$data = $ci->db->get();
	if ($data->num_rows() == 1) {
		return TRUE;
	} else {
		return FALSE;
	}
}

function gantiangka($dt) {
	if ($dt == "true") {
		return 1;
	}
	return 0;
}

function groupangka($dt) {
    $n = number_format($dt, 0, ',', '.');
    return $n;
}

function formatuang($uang) {
    $f = number_format($uang,0,",",".");
    return $f;
}

function comparebillingestimate($billing, $estimate) {
	if (($billing > ($estimate - (($estimate * 20) / 100))) && ($billing < $estimate))  {
		return "bg-warning";
	} else if ($billing > $estimate) {
		return "bg-danger";
	} else {
		return "";
	}
}

function tulisankondisistatus($val) {
	if ($val == 1) {
		return "Map";
	}
	return "Lembaran";
}

function tulisankelengkapan($val) {
	if ($val == 1) {
		return "Lengkap";
	}
	return "Tidak Lengkap";
}

function tulisanketepatan($val) {
	if ($val == 1) {
		return "Tepat Waktu";
	} else if ($val == 1) {
		return "> 2 - 14 Hari";
	}
	return "> 14 hari";
}

function tulisanoperasi($val) {
	if ($val == 1) {
		return "Tidak Ada";
	}
	return "Ada";
}

function handlingnullstring($var) {
	if (is_null($var)) {
		return "-";
	} else {
		return $var;
	}
}

function dd($var){
	echo "<pre>";
	print_r($var);
	echo "</pre>";die;
  }