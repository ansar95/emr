<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpjs extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		if ($this->session->userdata("login") != TRUE) {
			redirect('login');
		}
		$this->load->model('bpjsmodel');
    }

	public function index() {
		$data['include'] = "layanan/pelayanan/urj/listurj";
		$data['unit'] = $dtunit;
		$data['menusamping'] = "menubpjs";
		$data['backhome'] = "tiga";
		$data['js'] = "pelayanan/urj/listurj";
		$data['css'] = "pelayanan/urj/listurj";
		$this->load->view('templatesidebar/content', $data);
	}
	
	// ==================

	// untuk billing pelayanan
    public function insertsep() {
        $data['include'] = "layanan/pelayanan/bpjs/sep/insert/forminsert";
		$data['menusamping'] = "menubpjs";
		$data['backhome'] = "tiga";
		$data['js'] = "pelayanan/bpjs/jsbpjs";
		$data['css'] = "pelayanan/bpjs/cssbpjs";
		$this->load->model("billingmdl");
		// $jumlahrekpatutup = $this->billingmdl->cekjumlahrekapinihari();
		// $data["jumlah"] = $jumlahrekpatutup;
		$data["txtTanggal"] = date("Y-m-d");
		$this->load->view('templatesidebar/content', $data);
    }
	
	public function insertsep_tes() {
		$data = $this->bpjsmodel->insertSEP();
		// var_dump($data);
		$res=json_decode($data,true);
		$kode=$res['metaData']['code'];
		$pesan=$res['metaData']['message'];
		if ($kode == 200 ){
			$responnya=trim($res["response"]);
			$ss=stringDecrypt($responnya);
			$cc=decompress($ss);
			$ccdecode=json_decode($cc,true);
			echo 'hasil : '.$ccdecode;
			// $options = array();
			// foreach ($ccdecode["faskes"] as $arrayForEach) {
			// 	// $i++;
			// 	// var_dump($arrayForEach);
			// 	$o = [
			// 		"id" => $arrayForEach['kode'],
			// 		"text" => $arrayForEach['nama']
			// 	];
			// 	// echo $i;
			// 	array_push($options, $o);
			// }
			// echo json_encode(['items' => $options]);
		} else {
			echo $pesan;
		}	
	}

	public function insertsepigd() {
        $notransaksi = $this->input->get("notransaksi");
		$data = $this->bpjsmodel->insertSEP();
		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);
		$kode=$res['metaData']['code'];
		$pesan=$res['metaData']['message'];
		if ($kode == 200){
			$responnya=trim($res["response"]);
			$ss=stringDecrypt_SEP($responnya,$timestampSEP);
			$cc=decompress($ss);
			$ccdecode=json_decode($cc,true);
			$noSep=$ccdecode['sep']['noSep'];
			$tglSep=$ccdecode['sep']['tglSep'];
			$jnsPelayanan= $ccdecode['sep']['jnsPelayanan'];
			$kelasRawat=$ccdecode['sep']['kelasRawat'];
			$diagnosa=$ccdecode['sep']['diagnosa'];
			$noRujukan=$ccdecode['sep']['noRujukan'];
			$poli=$ccdecode['sep']['poli'];
			$poliEksekutif=$ccdecode['sep']['poliEksekutif'];
			$catatan=$ccdecode['sep']['catatan'];
			$penjamin=$ccdecode['sep']['penjamin'];
			$noKartu=$ccdecode['sep']['peserta']['noKartu'];
			$nama=$ccdecode['sep']['peserta']['nama'];
			$tglLahir=$ccdecode['sep']['peserta']['tglLahir'];
			$noMr=$ccdecode['sep']['peserta']['noMr'];
			$kelamin=$ccdecode['sep']['peserta']['kelamin'];
			$jnsPeserta=$ccdecode['sep']['peserta']['jnsPeserta'];
			$hakKelas=$ccdecode['sep']['peserta']['hakKelas'];
			$asuransi=$ccdecode['sep']['peserta']['asuransi'];
			$dinsos=$ccdecode['sep']['informasi']['dinsos'];
			$prolanisPRB=$ccdecode['sep']['informasi']['prolanisPRB'];
			$noSKTM=$ccdecode['sep']['informasi']['noSKTM'];

			//ambil data form
			$poli=$this->input->get("tujuan", TRUE); 
			$poli_eksekutif=$this->input->get("eksekutif", TRUE);
			$tgl_rujukan=$this->input->get("tglRujukan", TRUE);
			$no_rujukan=$this->input->get("noRujukan", TRUE);
			$ppk_rujukan=$this->input->get("ppkRujukan", TRUE);
			$ppk_rujukan_nama=$this->input->get("namappkRujukan", TRUE);

			//----buka nanti
			$kodedokterbpjs = $this->input->get("dpjpLayan", TRUE);
			$namadokterbpjs = $this->input->get("namadpjpLayan", TRUE);
			$nama_dokter = $this->input->get("dpjpLayan", TRUE);
			$no_hp = $this->input->get("noHp", TRUE);  
			$nama_poli = $this->input->get("namaTujuan", TRUE); 
			$noTelpDPJP = $this->input->get("noTelpDPJP", TRUE);  

			//data kecelakaan, katarak dan lainnya
			$eksekutif = $this->input->get("eksekutif", TRUE);  
			$cob = $this->input->get("cob", TRUE);  
			$katarak = $this->input->get("katarak", TRUE);  
			$lakaLantas = $this->input->get("lakaLantas", TRUE);  
			$noLP = $this->input->get("noLP", TRUE);  
			$tglKejadian = $this->input->get("tglKejadian", TRUE);  
			$keterangan = $this->input->get("keterangan", TRUE);  
			$suplesi = $this->input->get("suplesi", TRUE);  
			$noSepSuplesi = $this->input->get("noSepSuplesi", TRUE);  
			$kdPropinsi = $this->input->get("kdPropinsi", TRUE);  
			$nmPropinsi = $this->input->get("nmPropinsi", TRUE);  
			$kdKabupaten = $this->input->get("kdKabupaten", TRUE);  
			$nmKabupaten = $this->input->get("nmKabupaten", TRUE);  
			$kdKecamatan = $this->input->get("kdKecamatan", TRUE);  
			$nmKecamatan = $this->input->get("nmKecamatan", TRUE);  

			//simpan dalam database sep di simrs
			$datasimpan = array(
				'catatan' => $catatan, 
				'diagnosa' => $diagnosa,
				'kodedokterbpjs' => $kodedokterbpjs,
				'nama_dokter' => $namadokterbpjs,
				'jns_pelayanan' => $jnsPelayanan,
				'kelas_rawat' => $kelasRawat,
				'no_sep' => $noSep,
				'penjamin' => $penjamin,
				'peserta_asuransi' => $asuransi,
				'peserta_hak_kelas' => $hakKelas,
				'peserta_jns_peserta' => $jnsPeserta,
				'peserta_kelamin' => $kelamin,
				'peserta_nama' => $nama,
				'peserta_no_kartu' => $noKartu,
				'peserta_no_mr' => $noMr,
				'peserta_tgl_lahir' => $tglLahir,
				'informasi_dinsos' => $dinsos,
				'informasi_prolanis_prb' => $prolanisPRB,
				'informasi_no_sktm' => $noSKTM,
				'poli' => $poli,
				'nama_poli' => $nama_poli,
				'poli_eksekutif' => $poli_eksekutif,
				'tgl_sep' => $tglSep,
				'tgl_rujukan' => $tgl_rujukan,
				'no_rujukan' => $no_rujukan,
				'ppk_rujukan' => $ppk_rujukan,
				'ppk_rujukan_nama' => $ppk_rujukan_nama,
				'no_hp' => $no_hp,
				'cetakan' => '1',
				'tgl_pulang' => '0000-00-00',
				'user1' => $this->session->userdata("nmuser"), 
				'user2' => $this->session->userdata("nmuser"), 
				'lastlogin' => date("Y-m-d H:i:s"), 
				'notransaksi' => $notransaksi,
				'katarak' => $katarak,
				'kecelakaan' => $lakaLantas,
				'tglkejadian' => $tglKejadian,
				'suplesi' => $suplesi,
				'nosepsuplesi' => $noSepSuplesi,
				'lp' => $noLP,
				'provinsi' => $kdPropinsi,
				'nmprovinsi' =>$nmPropinsi,
				'kabupaten' => $kdKabupaten,
				'nmkabupaten' => $nmKabupaten,
				'kecamatan' => $kdKecamatan,
				'nmkecamatan' => $nmKecamatan,
				'ketkejadian' => $keterangan
			);
			$dt = $this->db->insert('sep_resources', $datasimpan);
			if ($jnsPelayanan == 2) {
				$datasimpanreg = array(
					'nosep' => $noSep
				);
			} else {
				$nosepigd = $this->input->get("nosepigd");
				$datasimpanreg = array(
					'nosep_igd' => $nosepigd,
					'nosep' => $noSep
				);
			}	
			$this->db->where("notransaksi", $notransaksi);
			$this->db->limit(1);
			$dtr = $this->db->update("register", $datasimpanreg);
			
			$output = [
				'stat' => true,
				'datasep' => $datasimpan
			];
			echo json_encode($output);  //kirim ke form sep
            // $data['datasimpan']=$datasimpan;
            // $this->load->view('laporan/sep/sepformat_igd', $data);
			// -----cetak kertas SEP
			// $this->load->library('pdf');
            // $this->pdf->setPaper('A4', 'potrait');
            // $this->pdf->filename = "sep".$noSep.".pdf";
            // $this->pdf->load_view('laporan/sep/sepformat_igd', $data);
            // $this->pdf->render();
            // $this->pdf->output();
		} else {
			$output = [
				'stat' => false,
				'code' => $kode,
				'message' => $pesan
			];
			echo json_encode($output);  //kirim ke form sep
		}	
	}

	public function insertnonjamkordat() {
        $notransaksi = 'tesjamkordat';
		$data = $this->bpjsmodel->insertSEP();
		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);
		$kode=$res['metaData']['code'];
		$pesan=$res['metaData']['message'];
		if ($kode == 200){
			$responnya=trim($res["response"]);
			$ss=stringDecrypt_SEP($responnya,$timestampSEP);
			$cc=decompress($ss);
			$ccdecode=json_decode($cc,true);
			$noSep=$ccdecode['sep']['noSep'];
			$tglSep=$ccdecode['sep']['tglSep'];
			$jnsPelayanan= $ccdecode['sep']['jnsPelayanan'];
			$kelasRawat=$ccdecode['sep']['kelasRawat'];
			$diagnosa=$ccdecode['sep']['diagnosa'];
			$noRujukan=$ccdecode['sep']['noRujukan'];
			$poli=$ccdecode['sep']['poli'];
			$poliEksekutif=$ccdecode['sep']['poliEksekutif'];
			$catatan=$ccdecode['sep']['catatan'];
			$penjamin=$ccdecode['sep']['penjamin'];
			$noKartu=$ccdecode['sep']['peserta']['noKartu'];
			$nama=$ccdecode['sep']['peserta']['nama'];
			$tglLahir=$ccdecode['sep']['peserta']['tglLahir'];
			$noMr=$ccdecode['sep']['peserta']['noMr'];
			$kelamin=$ccdecode['sep']['peserta']['kelamin'];
			$jnsPeserta=$ccdecode['sep']['peserta']['jnsPeserta'];
			$hakKelas=$ccdecode['sep']['peserta']['hakKelas'];
			$asuransi=$ccdecode['sep']['peserta']['asuransi'];
			$dinsos=$ccdecode['sep']['informasi']['dinsos'];
			$prolanisPRB=$ccdecode['sep']['informasi']['prolanisPRB'];
			$noSKTM=$ccdecode['sep']['informasi']['noSKTM'];

			//ambil data form
			$poli=$this->input->get("tujuan", TRUE); 
			$poli_eksekutif=$this->input->get("eksekutif", TRUE);
			$tgl_rujukan=$this->input->get("tglRujukan", TRUE);
			$no_rujukan=$this->input->get("noRujukan", TRUE);
			$ppk_rujukan=$this->input->get("ppkRujukan", TRUE);
			$ppk_rujukan_nama=$this->input->get("namappkRujukan", TRUE);

			//----buka nanti
			$kodedokterbpjs = $this->input->get("dpjpLayan", TRUE);
			$namadokterbpjs = $this->input->get("namadpjpLayan", TRUE);
			$nama_dokter = $this->input->get("dpjpLayan", TRUE);
			$no_hp = $this->input->get("noHp", TRUE);  
			$nama_poli = $this->input->get("namaTujuan", TRUE); 
			$noTelpDPJP = $this->input->get("noTelpDPJP", TRUE);  

			//data kecelakaan, katarak dan lainnya
			$eksekutif = $this->input->get("eksekutif", TRUE);  
			$cob = $this->input->get("cob", TRUE);  
			$katarak = $this->input->get("katarak", TRUE);  
			$lakaLantas = $this->input->get("lakaLantas", TRUE);  
			$noLP = $this->input->get("noLP", TRUE);  
			$tglKejadian = $this->input->get("tglKejadian", TRUE);  
			$keterangan = $this->input->get("keterangan", TRUE);  
			$suplesi = $this->input->get("suplesi", TRUE);  
			$noSepSuplesi = $this->input->get("noSepSuplesi", TRUE);  
			$kdPropinsi = $this->input->get("kdPropinsi", TRUE);  
			$nmPropinsi = $this->input->get("nmPropinsi", TRUE);  
			$kdKabupaten = $this->input->get("kdKabupaten", TRUE);  
			$nmKabupaten = $this->input->get("nmKabupaten", TRUE);  
			$kdKecamatan = $this->input->get("kdKecamatan", TRUE);  
			$nmKecamatan = $this->input->get("nmKecamatan", TRUE);  

			//simpan dalam database sep di simrs
			$datasimpan = array(
				'catatan' => $catatan, 
				'diagnosa' => $diagnosa,
				'kodedokterbpjs' => $kodedokterbpjs,
				'nama_dokter' => $namadokterbpjs,
				'jns_pelayanan' => $jnsPelayanan,
				'kelas_rawat' => $kelasRawat,
				'no_sep' => $noSep,
				'penjamin' => $penjamin,
				'peserta_asuransi' => $asuransi,
				'peserta_hak_kelas' => $hakKelas,
				'peserta_jns_peserta' => $jnsPeserta,
				'peserta_kelamin' => $kelamin,
				'peserta_nama' => $nama,
				'peserta_no_kartu' => $noKartu,
				'peserta_no_mr' => $noMr,
				'peserta_tgl_lahir' => $tglLahir,
				'informasi_dinsos' => $dinsos,
				'informasi_prolanis_prb' => $prolanisPRB,
				'informasi_no_sktm' => $noSKTM,
				'poli' => $poli,
				'nama_poli' => $nama_poli,
				'poli_eksekutif' => $poli_eksekutif,
				'tgl_sep' => $tglSep,
				'tgl_rujukan' => $tgl_rujukan,
				'no_rujukan' => $no_rujukan,
				'ppk_rujukan' => $ppk_rujukan,
				'ppk_rujukan_nama' => $ppk_rujukan_nama,
				'no_hp' => $no_hp,
				'cetakan' => '1',
				'tgl_pulang' => '0000-00-00',
				'user1' => $this->session->userdata("nmuser"), 
				'user2' => $this->session->userdata("nmuser"), 
				'lastlogin' => date("Y-m-d H:i:s"), 
				'notransaksi' => $notransaksi,
				'katarak' => $katarak,
				'kecelakaan' => $lakaLantas,
				'tglkejadian' => $tglKejadian,
				'suplesi' => $suplesi,
				'nosepsuplesi' => $noSepSuplesi,
				'lp' => $noLP,
				'provinsi' => $kdPropinsi,
				'nmprovinsi' =>$nmPropinsi,
				'kabupaten' => $kdKabupaten,
				'nmkabupaten' => $nmKabupaten,
				'kecamatan' => $kdKecamatan,
				'nmkecamatan' => $nmKecamatan,
				'ketkejadian' => $keterangan
			);
			$dt = $this->db->insert('sep_resources', $datasimpan);
			if ($jnsPelayanan == 2) {
				$datasimpanreg = array(
					'nosep' => $noSep
				);
			} else {
				$nosepigd = $this->input->get("nosepigd");
				$datasimpanreg = array(
					'nosep_igd' => $nosepigd,
					'nosep' => $noSep
				);
			}	
			$this->db->where("notransaksi", $notransaksi);
			$this->db->limit(1);
			$dtr = $this->db->update("register", $datasimpanreg);
			
			$output = [
				'stat' => true,
				'datasep' => $datasimpan
			];
			echo json_encode($output);  //kirim ke form sep
            // $data['datasimpan']=$datasimpan;
            // $this->load->view('laporan/sep/sepformat_igd', $data);
			// -----cetak kertas SEP
			// $this->load->library('pdf');
            // $this->pdf->setPaper('A4', 'potrait');
            // $this->pdf->filename = "sep".$noSep.".pdf";
            // $this->pdf->load_view('laporan/sep/sepformat_igd', $data);
            // $this->pdf->render();
            // $this->pdf->output();
		} else {
			$output = [
				'stat' => false,
				'code' => $kode,
				'message' => $pesan
			];
			echo json_encode($output);  //kirim ke form sep
		}	
	}

	public function saveeditsepigd() {
        // $notransaksi = $this->input->get("notransaksi");
		// $data = $this->bpjsmodel->insertSEP();
		$data = $this->bpjsmodel->updateSEP();

		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);
		$kode=$res['metaData']['code'];
		$pesan=$res['metaData']['message'];
		if ($kode == 200){
			$responnya=trim($res["response"]);
			$ss=stringDecrypt_SEP($responnya,$timestampSEP);
			$cc=decompress($ss);
			$ccdecode=json_decode($cc,true);

			$noSep=$ccdecode['sep']['noSep'];
			$tglSep=$ccdecode['sep']['tglSep'];
			$jnsPelayanan= $ccdecode['sep']['jnsPelayanan'];
			$kelasRawat=$ccdecode['sep']['kelasRawat'];
			$diagnosa=$ccdecode['sep']['diagnosa'];
			$noRujukan=$ccdecode['sep']['noRujukan'];
			$poli=$ccdecode['sep']['poli']; //nama poli ini yg di dapat
			$poliEksekutif=$ccdecode['sep']['poliEksekutif'];  // hasil : tidak
			$catatan=$ccdecode['sep']['catatan'];
			$penjamin=$ccdecode['sep']['penjamin'];
			$noKartu=$ccdecode['sep']['peserta']['noKartu'];
			$nama=$ccdecode['sep']['peserta']['nama'];
			$tglLahir=$ccdecode['sep']['peserta']['tglLahir'];
			$noMr=$ccdecode['sep']['peserta']['noMr'];
			$kelamin=$ccdecode['sep']['peserta']['kelamin'];
			$jnsPeserta=$ccdecode['sep']['peserta']['jnsPeserta'];
			$hakKelas=$ccdecode['sep']['peserta']['hakKelas'];
			$asuransi=$ccdecode['sep']['peserta']['asuransi'];
			$dinsos=$ccdecode['sep']['informasi']['dinsos'];
			$prolanisPRB=$ccdecode['sep']['informasi']['prolanisPRB'];
			$noSKTM=$ccdecode['sep']['informasi']['noSKTM'];

//ambil data form
			$notransaksi=$this->input->get("notransaksi", TRUE); 
			$poli=$this->input->get("tujuan", TRUE); 
			$poli_eksekutif=$this->input->get("eksekutif", TRUE);
			$tgl_rujukan=$this->input->get("tglRujukan", TRUE);
			$no_rujukan=$this->input->get("noRujukan", TRUE);
			$ppk_rujukan=$this->input->get("ppkRujukan", TRUE);
			$ppk_rujukan_nama=$this->input->get("namappkRujukan", TRUE);
			
			//----buka nanti
			$kodedokterbpjs = $this->input->get("dpjpLayan", TRUE);
			$namadokterbpjs = $this->input->get("namadpjpLayan", TRUE);
			$nama_dokter = $this->input->get("dpjpLayan", TRUE);
			$no_hp = $this->input->get("noHp", TRUE);  
			$nama_poli = $this->input->get("namaTujuan", TRUE); 
			$noTelpDPJP = $this->input->get("noTelpDPJP", TRUE);  

			//data kecelakaan, katarak dan lainnya
			$eksekutif = $this->input->get("eksekutif", TRUE);  
			$cob = $this->input->get("cob", TRUE);  
			$katarak = $this->input->get("katarak", TRUE);  
			$lakaLantas = $this->input->get("lakaLantas", TRUE);  
			$noLP = $this->input->get("noLP", TRUE);  
			$tglKejadian = $this->input->get("tglKejadian", TRUE);  
			$keterangan = $this->input->get("keterangan", TRUE);  
			$suplesi = $this->input->get("suplesi", TRUE);  
			$noSepSuplesi = $this->input->get("noSepSuplesi", TRUE);  
			$kdPropinsi = $this->input->get("kdPropinsi", TRUE);  
			$nmPropinsi = $this->input->get("nmPropinsi", TRUE);  
			$kdKabupaten = $this->input->get("kdKabupaten", TRUE);  
			$nmKabupaten = $this->input->get("nmKabupaten", TRUE);  
			$kdKecamatan = $this->input->get("kdKecamatan", TRUE);  
			$nmKecamatan = $this->input->get("nmKecamatan", TRUE);  

			$datasimpan = array(
				'catatan' => $catatan,
				'diagnosa' => $diagnosa,
				'kodedokterbpjs' => $kodedokterbpjs,
				'nama_dokter' => $namadokterbpjs,
				'jns_pelayanan' => $jnsPelayanan,
				'kelas_rawat' => $kelasRawat,
				'no_sep' => $noSep,
				'penjamin' => $penjamin,
				'peserta_asuransi' => $asuransi,
				'peserta_hak_kelas' => $hakKelas,
				'peserta_jns_peserta' => $jnsPeserta,
				'peserta_kelamin' => $kelamin,
				'peserta_nama' => $nama,
				'peserta_no_kartu' => $noKartu,
				'peserta_no_mr' => $noMr,
				'peserta_tgl_lahir' => $tglLahir,
				'informasi_dinsos' => $dinsos,
				'informasi_prolanis_prb' => $prolanisPRB,
				'informasi_no_sktm' => $noSKTM,
				'poli' => $poli,
				'nama_poli' => $nama_poli,
				'poli_eksekutif' => $poli_eksekutif,
				'tgl_sep' => $tglSep,
				'tgl_rujukan' => $tgl_rujukan,
				'no_rujukan' => $no_rujukan,
				'ppk_rujukan' => $ppk_rujukan,
				'ppk_rujukan_nama' => $ppk_rujukan_nama,
				'no_hp' => $no_hp,
				'cetakan' => '1',
				'tgl_pulang' => '0000-00-00',
				'user1' => $this->session->userdata("nmuser"), 
				'user2' => $this->session->userdata("nmuser"), 
				'lastlogin' => date("Y-m-d H:i:s"), 
				'notransaksi' => $notransaksi,
				'katarak' => $katarak,
				'kecelakaan' => $lakaLantas,
				'tglkejadian' => $tglKejadian,
				'suplesi' => $suplesi,
				'nosepsuplesi' => $noSepSuplesi,
				'lp' => $noLP,
				'provinsi' => $kdPropinsi,
				'nmprovinsi' =>$nmPropinsi,
				'kabupaten' => $kdKabupaten,
				'nmkabupaten' => $nmKabupaten,
				'kecamatan' => $kdKecamatan,
				'nmkecamatan' => $nmKecamatan,
				'ketkejadian' => $keterangan
			);
			$this->db->where('no_sep', $noSep);
			$this->db->update('sep_resources', $datasimpan);
			$output = [
				'stat' => true,
				'datasep' => $datasimpan
			];
			echo json_encode($output);  
		} else {
			$output = [
				'stat' => false,
				'code' => $kode,
				'message' => $pesan
			];
			echo json_encode($output);  //kirim ke form sep
		}	
	}

	public function hapussepigd() {
		$this->load->model("bpjsmodel");
		$data = $this->bpjsmodel->deleteSEP();
		$this->load->model("pasien");
		$nosep_igd = $this->pasien->ambilnosep_igd();

		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);
		$kode=$res['metaData']['code'];
		$pesan=$res['metaData']['message'];
		// $noSep==$this->input->get("nosep1");

		if ($kode == 200){

			$datasimpan = array(
				'nosep' => $nosep_igd,
				'nosep_igd' => '',
			);
			$responnya=trim($res["response"]);

			$this->db->where('nosep', $responnya);
			$this->db->update('register', $datasimpan);


			$this->db->where('no_sep', $responnya);
			$this->db->delete('sep_resources');

			$output = [
				'stat' => true,
				'datasep' => $responnya
			];
			echo json_encode($output);  
		} else {
			$output = [
				'stat' => false,
				'code' => $kode,
				'message' => $pesan
			];
			echo json_encode($output);  //kirim ke form sep
		}	
	}

	public function cetaksepigd($nosepnya) {
        if ($this->session->userdata("login") == TRUE) {
			// $search_term = $this->input->post('dataString');
			// $nosepnya = $this->input->post('nosepnya');
			// $nosepnya=$_GET['nosepnya'];
            $data["nosepnya"] = $nosepnya;
        	//-----cetak kertas SEP
			$this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = $nosepnya.".pdf";
            $this->pdf->load_view('laporan/sep/sepformat_igd_sep', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }
	
	public function cetakspri($nosprinya) {
        if ($this->session->userdata("login") == TRUE) {
            $data["nospri"] = $nosprinya;
        	//-----cetak kertas SEP
            // $this->load->view('laporan/sep/rencanainap', $data);

			$this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = $nosprinya.".pdf";
            $this->pdf->load_view('laporan/sep/rencanainap', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }

	public function cetakspri_surkon($nosprinya) {
        if ($this->session->userdata("login") == TRUE) {
            $data["nospri"] = $nosprinya;
        	//-----cetak kertas SEP
            // $this->load->view('laporan/sep/rencanainap', $data);

			$this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = $nosprinya.".pdf";
            $this->pdf->load_view('laporan/sep/suratkontrol', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }

	

	public function hapussurkon() {
		$data = $this->bpjsmodel->deleteSPRI();
		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);
		$kode=$res['metaData']['code'];
		$pesan=$res['metaData']['message'];
		$nospri=$this->input->get("nospri");
		
		if ($kode == 200){
			$this->db->where('nospri', $nospri);
			$this->db->delete('spri_resources');

			$output = [
				'stat' => true,
				'datasep' => ''
			];
			echo json_encode($output);  
		} else {
			$output = [
				'stat' => false,
				'code' => $kode,
				'message' => $pesan
			];
			echo json_encode($output);  //kirim ke form sep
		}	
	}

	public function cetakrujukan($norujukan) {
        if ($this->session->userdata("login") == TRUE) {
			// $search_term = $this->input->post('dataString');
			// $nosepnya = $this->input->post('nosepnya');
			// $nosepnya=$_GET['nosepnya'];
            $data["norujukan"] = $norujukan;
        	//-----cetak kertas SEP
			$this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = $norujukan.".pdf";
            $this->pdf->load_view('laporan/sep/suratrujukan', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }
	
	public function ambillppk_old() {
		$param1 = $this->input->get("search", TRUE);
		$param2 = $this->input->get("param", TRUE);
		$data = $this->bpjsmodel->referensifaskes($param1, $param2);
		$options = array();
		foreach ($data["faskes"] as $arrayForEach) {
			$o = [
				"id" => $arrayForEach["kode"],
				"text" => $arrayForEach["nama"]
			];
			array_push($options, $o);
		}
		echo json_encode(['items' => $options]);
	}

	public function ambillppk() {
		// $param1 = "MAKASSAR";
		// $param2 = "2";
		$param1 = $this->input->get("search", TRUE);
		$param2 = $this->input->get("param", TRUE);
		$data = $this->bpjsmodel->referensifaskes($param1, 1);
		$res=json_decode($data,true);
		$responnya=trim($res["response"]);
		$ss=stringDecrypt($responnya);
		$cc=decompress($ss);
		$ccdecode=json_decode($cc,true);
		$options = array();
		foreach ($ccdecode["faskes"] as $arrayForEach) {
			// $i++;
			// var_dump($arrayForEach);
			$o = [
				"id" => $arrayForEach['kode'],
				"text" => $arrayForEach['nama']
			];
			// echo $i;
			array_push($options, $o);
		}
		echo json_encode(['items' => $options]);
	}

	public function ambillppk_tes() {
		$param1 = "RSUD";
		$param2 = "2";
		$data = $this->bpjsmodel->referensifaskes($param1, $param2);
		$res=json_decode($data,true);
		var_dump($res);
		echo "<br>";
		echo "<br>";
		$responnya=trim($res["response"]);
		echo "responnya ".$responnya;
		echo "<br>";
		echo "<br>";
		$ss=stringDecrypt($responnya);
		echo "stringDecrypt ".$ss;
		echo "<br>";
		echo "<br>";


		$cc=decompress($ss);
		$ccdecode=json_decode($cc,true);
		echo "ccdecode ";
		var_dump($ccdecode);
		echo "<br>";
		echo "<br>";
		$options = array();
		$i=-1;
		foreach ($ccdecode["faskes"] as $arrayForEach) {
			$i++;
			$o = [
				"id" => $arrayForEach['kode'],
				"text" => $arrayForEach['nama']
			];
			echo $i;
			array_push($options, $o);
		}
		echo "<br>"."xxxxxxxx-------";
		echo json_encode(['items' => $options]);
	}

	// ==================

	public function ambildetail_tes() {
		$idBPJS='7371122501700005';
		$tgl='2023-03-20';
		$dataPeserta1 = $this->bpjsmodel->getpesertabpjsnik($idBPJS, $tgl);
		//buka enscripsi
		$res=json_decode($dataPeserta1,true);
		$responnya=trim($res["response"]);
		$ss=stringDecrypt($responnya);
		$cc=decompress($ss);
		$dataPeserta=json_decode($cc,true);
		var_dump($dataPeserta);
		echo "<br>";
		echo "<br>";
		echo $dataPeserta['peserta']['noKartu'];
		// echo json_decode($cc,true);

	}

	public function ambilkartu() {
		// $idBPJS='0000154175051';
		// $idBPJS='0002059944524';
		$cek=cekinternet();
			// alertWindow($cek);
			$idBPJS='0002045650173';
			$tgl='2023-07-13';
			$dataPeserta1 = $this->bpjsmodel->getpesertabpjs($idBPJS, $tgl);
			if ($dataPeserta1 != 99) {
				//buka enscripsi
				$res=json_decode($dataPeserta1,true);
				$code=$res["metaData"]["code"];
				$message=$res["metaData"]["message"];
				echo "<br>";
				echo $code.' '.$message;
				$responnya=trim($res["response"]);
				$ss=stringDecrypt($responnya);
				$cc=decompress($ss);
				$dataPeserta=json_decode($cc,true);
				// array_push( $dataPeserta, $code);
				var_dump($dataPeserta);
				echo "<br>";
				echo "<br>";
				echo $dataPeserta['peserta']['statusPeserta']['keterangan'];
				// echo json_decode($cc,true);
			} else {
				
			}
		
	}

	public function cekkartu() {
		// $idBPJS='0000154175051';
		// $tgl='2023-06-09';
		$idBPJS = $this->input->get("nokartu", TRUE);
		$tgl1 = $this->input->get("tglmasuk", TRUE);
		$tgl=substr($tgl1,6,4).'-'.substr($tgl1,3,2).'-'.substr($tgl1,0,2);
		$dataPeserta1 = $this->bpjsmodel->getpesertabpjs($idBPJS, $tgl);
		//buka enscripsi
		$res=json_decode($dataPeserta1,true);
		$code=$res["metaData"]["code"];
		$message=$res["metaData"]["message"];
		if ($code == 200 ){
			$responnya=trim($res["response"]);
			$ss=stringDecrypt($responnya);
			$cc=decompress($ss);
			$dataPeserta=json_decode($cc,true);
			// echo json_encode($dataPeserta);
			$output = [
				'stat' => true,
				'code' => $code,
				'message' => $dataPeserta
			];
			echo json_encode($output);
		} else {
			$output = [
				'stat' => false,
				'code' => $code,
				'message' => $message
			];
			echo json_encode($output);  //kirim ke form regis cek kartu
			// echo json_encode($res);
		}

	}

	public function ceknik() {
		$idBPJS='7371052501700001';
		$tgl='2023-06-21';
		// $idBPJS = $this->input->get("nik", TRUE);
		// $tgl1 = $this->input->get("tglmasuk", TRUE);
		// $tgl=substr($tgl1,6,4).'-'.substr($tgl1,3,2).'-'.substr($tgl1,0,2);
		$dataPeserta1 = $this->bpjsmodel->getpesertabpjsnik($idBPJS, $tgl);
		//buka enscripsi
		$res=json_decode($dataPeserta1,true);
		$code=$res["metaData"]["code"];
		$message=$res["metaData"]["message"];
		if ($code == 200 ){
			$responnya=trim($res["response"]);
			$ss=stringDecrypt($responnya);
			$cc=decompress($ss);
			$dataPeserta=json_decode($cc,true);
			// echo json_encode($dataPeserta);
			$output = [
				'stat' => true,
				'code' => $code,
				'message' => $dataPeserta
			];
			echo json_encode($output);
		} else {
			$output = [
				'stat' => false,
				'code' => $code,
				'message' => $message
			];
			echo json_encode($output);  //kirim ke form regis cek kartu
			// echo json_encode($res);
		}

	}

	public function ambildetail() {
		$statusForm = $this->input->post("rdpilih", TRUE);
		if ($statusForm == 0) {
			$idDari = $this->input->post("rbnomor", TRUE);
			if ($idDari == 0) {
				$idBPJS = $this->input->post("txtNokartu", TRUE);
				$gettgl = $this->input->post("txtTanggal", TRUE);
				$date = date_create($gettgl);
				$tgl = date_format($date,"Y-m-d");

				$ppk = $this->input->post("txtppkasalrujukan_OL", TRUE);
				$ppkText = $this->input->post("_2ppkText", TRUE);

				$dataPeserta1 = $this->bpjsmodel->getpesertabpjsnik($idBPJS, $tgl);
				//buka enscripsi
				$res=json_decode($dataPeserta1,true);
				$responnya=trim($res["response"]);
				$ss=stringDecrypt($responnya);
				$cc=decompress($ss);
				$dataPeserta=json_decode($cc,true);
				// echo json_decode($cc,true);
				
				$dataCetakan = $this->bpjsmodel->cetakanKe($idBPJS);
				$datarujukan['ppk'] = $ppk;
				$datarujukan['ppkText'] = $ppkText;
				$datarujukan['txtTanggal'] = $gettgl;
				$datarujukan['cetakan'] = $dataCetakan;

				$data["peserta"] = $dataPeserta;
				$data["viewrujukan"] = $this->load->view('layanan/pelayanan/bpjs/sep/insert/formrujukan', $datarujukan, TRUE);
				$data["additional"] = "";

				$dt["stat"] = true;
				$dt["dtview"] = $this->load->view('layanan/pelayanan/bpjs/sep/insert/detailsep', $data, TRUE);
	
				echo json_encode($dt);
			} else if ($idDari == 1) {
				$idNik = $this->input->post("txtNokartu", TRUE);
				$gettgl = $this->input->post("txtTanggal", TRUE);
				$date = date_create($gettgl);
				$tgl = date_format($date,"Y-m-d");

				$ppk = $this->input->post("txtppkasalrujukan_OL", TRUE);
				$ppkText = $this->input->post("_2ppkText", TRUE);

				$dataPeserta1 = $this->bpjsmodel->getpesertabpjs($idNik, $tgl);
				//buka enscripsi
				$res=json_decode($dataPeserta1,true);
				$responnya=trim($res["response"]);
				$ss=stringDecrypt($responnya);
				$cc=decompress($ss);
				$dataPeserta=json_decode($cc,true);
				// echo json_decode($cc,true);
				$dataCetakan = $this->bpjsmodel->cetakanKe($idNik);

				$datarujukan['ppk'] = $ppk;
				$datarujukan['ppkText'] = $ppkText;
				$datarujukan['txtTanggal'] = $gettgl;
				$datarujukan['cetakan'] = $dataCetakan;

				$data["peserta"] = $dataPeserta;
				$data["viewrujukan"] = $this->load->view('layanan/pelayanan/bpjs/sep/insert/formrujukan', $datarujukan, TRUE);
				$data["additional"] = "";

				$dt["stat"] = true;
				$dt["dtview"] = $this->load->view('layanan/pelayanan/bpjs/sep/insert/detailsep', $data, TRUE);
	
				echo json_encode($dt);
			}
		} else if ($statusForm == 2) {
			$rujukNo = $this->input->post("txtNoRujukan_0", TRUE);

			$asalRujukan = $this->input->post("cbasalrujukan_0", TRUE);

			$dataPeserta = $this->bpjsmodel->getpesertarujukan($rujukNo);
			$dataCetakan = $this->bpjsmodel->cetakanKe($dataPeserta['rujukan']["peserta"]["noKartu"]);
			$datarujukan['ppk'] = $dataPeserta['rujukan']['provPerujuk']['kode'];
			$datarujukan['ppkText'] = $dataPeserta['rujukan']['provPerujuk']['nama'];
			$date = date_create($dataPeserta['rujukan']['tglKunjungan']);
			$tgl = date_format($date,"m/d/Y");
			$datarujukan['txtTanggal'] = $tgl;

			$data["peserta"] = $dataPeserta['rujukan'];
			$data["viewrujukan"] = $this->load->view('layanan/pelayanan/bpjs/sep/insert/formrujukan', $datarujukan, TRUE);
			$data['cetakan'] = $dataCetakan;
			$data["additional"] = ''.
			'<input type="hidden" class="form-control" id="nokartu" name="nokartu" value="'.$dataPeserta['rujukan']['peserta']['noKartu'].'">'.
			'<input type="hidden" class="form-control" id="tglpelayanan" name="tglpelayanan" value="'.$dataPeserta['rujukan']['tglKunjungan'].'">'.
			'<input type="hidden" class="form-control" id="pelayanan" name="pelayanan" value="'.$dataPeserta['rujukan']['pelayanan']['kode'].'">'.
			'<input type="hidden" class="form-control" id="ppk" name="ppk" value="'.$dataPeserta['rujukan']['provPerujuk']['kode'].'">'
			.'';

			$dt["stat"] = true;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/bpjs/sep/insert/detailsep', $data, TRUE);

			echo json_encode($dt);
		}
	}


	public function ambillpoliinsert() {
		// $param1 = "INST";
		$param1 = trim($this->input->get("search", TRUE));
		$data = $this->bpjsmodel->referensipoli($param1);
		$res=json_decode($data,true);
		$responnya=trim($res["response"]);
		$ss=stringDecrypt($responnya);
		$cc=decompress($ss);
		$ccdecode=json_decode($cc,true);
		// var_dump($ccdecode);
		$options = array();
		foreach ($ccdecode["poli"] as $arrayForEach) {
			$cek=$arrayForEach['nama'];
				$o = [
					"id" => $arrayForEach['kode'],
					"text" => $arrayForEach['nama']
				];
				array_push($options, $o);
		}
		echo json_encode(['items' => $options]);
	}

	public function ambil1poli() {
		// $param1 = trim($this->input->get("search", TRUE));
		$param1="INT";
		$data = $this->bpjsmodel->referensipoli($param1);
		$res=json_decode($data,true);
		$responnya=trim($res["response"]);
		$ss=stringDecrypt($responnya);
		$cc=decompress($ss);
		$ccdecode=json_decode($cc,true);
		// var_dump($ccdecode);
		// $options = array();
		// foreach ($ccdecode["poli"] as $arrayForEach) {
		// 	$cek=$arrayForEach['nama'];
		// 		$o = [
		// 			"id" => $arrayForEach['kode'],
		// 			"text" => $arrayForEach['nama']
		// 		];
		// 		array_push($options, $o);
		// }
		echo json_encode(['items' => $options]);
	}

	public function ambilldpjpinsert() {
		$param1 = $this->input->get("rawat", TRUE);
		$param2 = $this->input->get("tgl", TRUE);
		$param3 = $this->input->get("search", TRUE);
		// $param3 = 'tenaga';
		// $param1 = 1;
		// $tgl = '2023-07-13';


		$date = date_create($param2);
		$tgl = date('Y-m-d');
		$tgl = date_format($date,"Y-m-d");
		$data = $this->bpjsmodel->getdpjp($param1, $tgl, $param3);
		
		$res=json_decode($data,true);
		$responnya=trim($res["response"]);
		$ss=stringDecrypt($responnya);
		$cc=decompress($ss);
		$ccdecode=json_decode($cc,true);
		// var_dump($ccdecode);
		$options = array();
		foreach ($ccdecode["list"] as $arrayForEach) {
			// $cek=$arrayForEach['nama'];
			// if (strpos(strtoupper($cek),strtoupper($param1)) > 0) {
				$o = [
					"id" => $arrayForEach["kode"],
					"text" => $arrayForEach["nama"]
				];
				array_push($options, $o);
			// }	
		}
		echo json_encode(['items' => $options]);
	}

	public function ambilldpjpinsert_surkon() {
		$param1 = $this->input->get("rawat", TRUE);
		$param2 = $this->input->get("tgl", TRUE);
		$param3 = $this->input->get("kdpoli", TRUE);
		$data = $this->bpjsmodel->cekjadwaldokter($param1,$param2,$param3);

		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);

		$code=$res['metaData']['code'];
		$message=$res['metaData']['message'];

		$responnya=trim($res["response"]);
		$ss=stringDecrypt_SEP($responnya,$timestampSEP);
		$cc=decompress($ss);
		
		$ccdecode=json_decode($cc,true);
		// var_dump($ccdecode);
		$options = array();
		foreach ($ccdecode["list"] as $arrayForEach) {
			// $cek=$arrayForEach['nama'];
			// if (strpos(strtoupper($cek),strtoupper($param1)) > 0) {
				$o = [
					// "id" => $arrayForEach["kodeDokter"],
					// "text" => $arrayForEach["namaDokter"]
					"id" => $arrayForEach["kode"],
					"text" => $arrayForEach["nama"]
				];
				array_push($options, $o);
			// }	
		}
		echo json_encode(['items' => $options]);
	}


	public function ambilldpjpinsert_tes() {
		$param1 = 'tenaga';
		$param2 = 1;
		// $param3 = $this->input->get("tgl", TRUE);
		// $date = date_create($param3);
		$tgl = '2023-07-13';
		$data = $this->bpjsmodel->getdpjp($param2, $tgl, $param1);
		$res=json_decode($data,true);
		$responnya=trim($res["response"]);
		// echo $responnya;
		$ss=stringDecrypt($responnya);
		$cc=decompress($ss);
		$ccdecode=json_decode($cc,true);
		var_dump($ccdecode);
		$options = array();
		foreach ($ccdecode["list"] as $arrayForEach) {
			$cek=$arrayForEach['nama'];
			if (strpos($cek,$param1) > 0 ) {
			echo $cek.'.....'.$param1.'......'.strpos($cek,'Hasan').'<br>';

				$o = [
					"id" => $arrayForEach["kode"],
					"text" => $arrayForEach["nama"]
				];
				array_push($options, $o);
			}	
		}
		// echo json_encode(['items' => $options]);
	}

	public function ambilrujukaninsert() {
		$param1 = $this->input->get("search", TRUE);
		$param2 = $this->input->get("param", TRUE);
		$data = $this->bpjsmodel->referensifaskes($param1, $param2);
		$options = array();
		foreach ($data["poli"] as $arrayForEach) {
			$o = [
				"id" => $arrayForEach["kode"],
				"text" => $arrayForEach["nama"]
			];
			array_push($options, $o);
		}
		echo json_encode(['items' => $options]);
	}

	public function ambilldiagnosainsert() {
		$param1 = $this->input->get("search", TRUE);
		$data = $this->bpjsmodel->referensidiagnosa($param1);
		$res=json_decode($data,true);
		$responnya=trim($res["response"]);
		$ss=stringDecrypt($responnya);
		$cc=decompress($ss);
		$ccdecode=json_decode($cc,true);
		$options = array();
		foreach ($ccdecode["diagnosa"] as $arrayForEach) {
			// $i++;
			// var_dump($arrayForEach);
			$o = [
				"id" => $arrayForEach['kode'],
				"text" => $arrayForEach['nama']
			];
			// echo $i;
			array_push($options, $o);
		}
		echo json_encode(['items' => $options]);
	}


	public function ambilfaksesdirujuk() {
		$param1 = $this->input->get("search", TRUE);
		// $param1 = "DAYA";
		$data = $this->bpjsmodel->reffaskes($param1);
		$res=json_decode($data,true);
		$responnya=trim($res["response"]);
		$ss=stringDecrypt($responnya);
		$cc=decompress($ss);
		$ccdecode=json_decode($cc,true);
		$options = array();
		foreach ($ccdecode["faskes"] as $arrayForEach) {
			// $i++;
			// var_dump($arrayForEach);
			$o = [
				"id" => $arrayForEach['kode'],
				"text" => $arrayForEach['nama']
			];
			// echo $i;
			array_push($options, $o);
		}
		echo json_encode(['items' => $options]);
	}

	public function ambillprovinsiinsert() {
		$param1 = strtoupper(trim($this->input->get("search", TRUE)));
		// $param1= 'BAL';
		$data = $this->bpjsmodel->getprovinsi($param1);
		$res=json_decode($data,true);
		$responnya=trim($res["response"]);
		$ss=stringDecrypt($responnya);
		$cc=decompress($ss);
		// echo $cc;
		$ccdecode=json_decode($cc,true);
		$options = array();
		foreach ($ccdecode["list"] as $arrayForEach) {
			$cek=$arrayForEach['nama'];
			if (strpos($cek,$param1) !== false) {
				$o = [
					"id" => $arrayForEach['kode'],
					"text" => $arrayForEach['nama']
				];
				array_push($options, $o);
			}
		}
		echo json_encode(['items' => $options]);
	}


	public function getjaminan() {
		$value = $this->input->get('statusjaminan', TRUE);
		if (($value == "1") || ($value == "2") || ($value == "3")) {
			$data["tes"] = TRUE;
			$dt["stat"] = true;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/bpjs/sep/insert/jaminan', $data, TRUE);
	
			echo json_encode($dt);
		} else {
			$dt["stat"] = true;
			$dt["dtview"] = "";
	
			echo json_encode($dt);
		}
	}

	public function ambillinsertkabupaten() {
		$param1 = strtoupper(trim($this->input->get("search", TRUE)));
		$param2 = strtoupper(trim($this->input->get("provinsi", TRUE)));
		$data = $this->bpjsmodel->getkabupaten($param2);
		$res=json_decode($data,true);
		$responnya=trim($res["response"]);
		$ss=stringDecrypt($responnya);
		$cc=decompress($ss);
		// echo $cc;
		$ccdecode=json_decode($cc,true);
		$options = array();
		foreach ($ccdecode["list"] as $arrayForEach) {
			$cek=$arrayForEach['nama'];
			if (strpos($cek,$param1) !== false) {
				$o = [
					"id" => $arrayForEach['kode'],
					"text" => $arrayForEach['nama']
				];
				array_push($options, $o);
			}
		}
		echo json_encode(['items' => $options]);
	}

	public function ambillinsertkecamatan() {
		$param1 = strtoupper(trim($this->input->get("search", TRUE)));
		$param2 = strtoupper(trim($this->input->get("kabupaten", TRUE)));
		$data = $this->bpjsmodel->getkecamatan($param2);
		$res=json_decode($data,true);
		$responnya=trim($res["response"]);
		$ss=stringDecrypt($responnya);
		$cc=decompress($ss);
		// echo $cc;
		$ccdecode=json_decode($cc,true);
		$options = array();
		foreach ($ccdecode["list"] as $arrayForEach) {
			$cek=$arrayForEach['nama'];
			if (strpos($cek,$param1) !== false) {
				$o = [
					"id" => $arrayForEach['kode'],
					"text" => $arrayForEach['nama']
				];
				array_push($options, $o);
			}
		}
		echo json_encode(['items' => $options]);
	}

	public function ambilrujukannoka() {
		// $param1 = strtoupper(trim($this->input->get("search", TRUE)));
		// $param2 = strtoupper(trim($this->input->get("kabupaten", TRUE)));
		$param2 = "0001226512383";
		$param2 = "0001226512383";
		
		$data = $this->bpjsmodel->getrujukannoka($param2);
		$res=json_decode($data,true);
		$responnya=trim($res["response"]);
		$ss=stringDecrypt($responnya);
		$cc=decompress($ss);
		echo $cc;
		$ccdecode=json_decode($cc,true);
		// var_dump($ccdecode);
		echo "<br>";
		echo "<br>";
		echo $ccdecode['rujukan']['noKunjungan']."<br>";
		echo $ccdecode['rujukan']['tglKunjungan']."<br>";
		echo $ccdecode['rujukan']['provPerujuk']['kode']."<br>";
		echo $ccdecode['rujukan']['provPerujuk']['nama']."<br>";
		echo $ccdecode['rujukan']['peserta']['noKartu']."<br>";
		echo $ccdecode['rujukan']['peserta']['nik']."<br>";
		echo $ccdecode['rujukan']['peserta']['nama']."<br>";
		echo $ccdecode['rujukan']['peserta']['statusPeserta']['kode']."<br>";
		echo $ccdecode['rujukan']['diagnosa']['kode']."<br>";
		echo $ccdecode['rujukan']['keluhan']."<br>";
		echo $ccdecode['rujukan']['poliRujukan']['kode']."<br>";
		echo $ccdecode['rujukan']['poliRujukan']['nama']."<br>";
		echo $ccdecode['rujukan']['pelayanan']['kode']."<br>";
		echo $ccdecode['rujukan']['pelayanan']['nama']."<br>";
	}

	public function postinsertsep() {
		$statusForm = $this->input->post("jenForm", TRUE);
		if ($statusForm == 0) {
			$idDari = $this->input->post("_2kartu", TRUE);
			if ($idDari == 0) {
				$_2nomor = $this->input->post("_2nomor", TRUE);
				$_2tglPelayanan = $this->input->post("_2tglPelayanan", TRUE);
				$_2tglPelayanan_date = date_create($_2tglPelayanan);
				$_2tglPelayanan_ = date_format($_2tglPelayanan_date,"Y-m-d");
				$_2pelayanan = $this->input->post("_2pelayanan", TRUE);
				$_2ppk = $this->input->post("_2ppk", TRUE);
				$txtkdklspst = $this->input->post("txtkdklspst", TRUE);
				$txtpisa = $this->input->post("txtpisa", TRUE);
				$txtnomr = $this->input->post("txtnomr", TRUE);
				$jenForm = $this->input->post("jenForm", TRUE);
				$cbasalrujukan = $this->input->post("cbasalrujukan", TRUE);
				$txtppkasalrujukan = $this->input->post("txtppkasalrujukan", TRUE);
				$txtppkasalrujukantxt = $this->input->post("txtppkasalrujukantxt", TRUE);
				$txtnorujukan = $this->input->post("txtnorujukan", TRUE);
				$txttglrujukan = $this->input->post("txttglrujukan", TRUE);
				$txttglrujukan_date = date_create($txttglrujukan);
				$txttglrujukan_ = date_format($txttglrujukan_date,"Y-m-d");
				$txtcatatan = $this->input->post("txtcatatan", TRUE);
				$txtnmdiagnosa = $this->input->post("txtnmdiagnosa", TRUE);
				$chkpoliesekutif = $this->input->post("chkpoliesekutif", TRUE);
				if ($chkpoliesekutif) {
					$chkpoliesekutif_ = 1;
				} else {
					$chkpoliesekutif_ = 0;
				}
				$txtnmpoli = $this->input->post("txtnmpoli", TRUE);
				$chkCOB = $this->input->post("chkCOB", TRUE);
				if ($chkCOB) {
					$chkCOB_ = 1;
				} else {
					$chkCOB_ = 0;
				}
				$cbstatuskll = $this->input->post("cbstatuskll", TRUE);
				if (($cbstatuskll == "") || ($cbstatuskll == "0")) {
					$cbstatuskll_ = 0;
					$txtTglKejadian_ = "";
					$cbpropinsi = "";
					$cbkabupaten = "";
					$cbkecamatan = "";
					$txtketkejadian = "";
				} else {
					$cbstatuskll_ = 1;
					$txtTglKejadian = $this->input->post("txtTglKejadian", TRUE);
					$txtTglKejadian_date = date_create($txtTglKejadian);
					$txtTglKejadian_ = date_format($txtTglKejadian_date,"Y-m-d");
					$cbpropinsi = $this->input->post("cbpropinsi", TRUE);
					$cbkabupaten = $this->input->post("cbkabupaten", TRUE);
					$cbkecamatan = $this->input->post("cbkecamatan", TRUE);
					$txtketkejadian = $this->input->post("txtketkejadian", TRUE);
				}
				$txtnotelp = $this->input->post("txtnotelp", TRUE);
				$txtnmdpjp = $this->input->post("txtnmdpjp", TRUE);
				$txtnoskdp = $this->input->post("txtnoskdp", TRUE);
				$chkkatarak = $this->input->post("chkkatarak", TRUE);
				if ($chkkatarak) {
					$chkkatarak = 1;
				} else {
					$chkkatarak = 0;
				}

				$data = array (
					'request' => 
					array (
					  't_sep' => 
					  array (
						'noKartu' => ''.$_2nomor.'',
						'tglSep' => ''.$_2tglPelayanan_.'',
						'ppkPelayanan' => '1801R014',
						'jnsPelayanan' => ''.$_2pelayanan.'',
						'klsRawat' => ''.$txtkdklspst.'',
						'noMR' => ''.$txtnomr.'',
						'rujukan' => 
						array (
						  'asalRujukan' => ''.$cbasalrujukan.'',
						  'tglRujukan' => ''.$txttglrujukan_.'',
						  'noRujukan' => ''.$txtnorujukan.'',
						  'ppkRujukan' => ''.$_2ppk.'',
						),
						'catatan' => ''.$txtcatatan.'',
						'diagAwal' => ''.$txtnmdiagnosa.'',
						'poli' => 
						array (
						  'tujuan' => ''.$txtnmpoli.'',
						  'eksekutif' => ''.$chkpoliesekutif_.'',
						),
						'cob' => 
						array (
						  'cob' => ''.$chkCOB_.'',
						),
						'katarak' => 
						array (
						  'katarak' => ''.$chkkatarak.'',
						),
						'jaminan' => 
						array (
							// di tes isikan angka nol
						  'lakaLantas' => ''.$cbstatuskll_.'', 
						  'penjamin' => 
						  array (
							'penjamin' => '',
							'tglKejadian' => ''.$txtTglKejadian_.'',
							'keterangan' => ''.$txtketkejadian.'',
							'suplesi' => 
							array (
							  'suplesi' => '0',
							  'noSepSuplesi' => '',
							  'lokasiLaka' => 
							  array (
								'kdPropinsi' => ''.$cbpropinsi.'',
								'kdKabupaten' => ''.$cbkabupaten.'',
								'kdKecamatan' => ''.$cbkecamatan.'',
							  ),
							),
						  ),
						),
						'skdp' => 
						array (
						  'noSurat' => '',
						  'kodeDPJP' => '',
						),
						'noTelp' => ''.$txtnotelp.'',
						'user' => ''.$this->session->userdata("nmuser").'',
					  ),
					),
				);
				$sendToModel = $this->bpjsmodel->insertSEP($data);
				$dataCetakan = $this->bpjsmodel->cetakanKe($_2nomor);
				if ($sendToModel[0] == V_SUKSES_STATUS) {
					$getFromModel = $sendToModel[1];
					$readyInsert = array (
						'catatan' => $getFromModel['sep']['catatan'],
						'diagnosa' => $getFromModel['sep']['diagnosa'],
						'jns_pelayanan' => $getFromModel['sep']['jnsPelayanan'],
						'kelas_rawat' => $getFromModel['sep']['kelasRawat'],
						'no_sep' => $getFromModel['sep']['noSep'],
						'penjamin' => $getFromModel['sep']['penjamin'],
						'peserta_asuransi' => $getFromModel['sep']['peserta']['asuransi'],
						'peserta_hak_kelas' => $getFromModel['sep']['peserta']['hakKelas'],
						'peserta_jns_peserta' => $getFromModel['sep']['peserta']['jnsPeserta'],
						'peserta_kelamin' => $getFromModel['sep']['peserta']['kelamin'],
						'peserta_nama' => $getFromModel['sep']['peserta']['nama'],
						'peserta_no_kartu' => $getFromModel['sep']['peserta']['noKartu'],
						'peserta_no_mr' => $getFromModel['sep']['peserta']['noMr'],
						'peserta_tgl_lahir' => $getFromModel['sep']['peserta']['tglLahir'],
						'informasi_dinsos' => handlingnullstring($getFromModel['sep']['informasi']['dinsos']),
						'informasi_prolanis_prb' => handlingnullstring($getFromModel['sep']['informasi']['prolanisPRB']),
						'informasi_no_sktm' => handlingnullstring($getFromModel['sep']['informasi']['noSKTM']),
						'poli' => $getFromModel['sep']['poli'],
						'poli_eksekutif' => $getFromModel['sep']['poliEksekutif'],
						'tgl_sep' => $getFromModel['sep']['tglSep'],
						'no_rujukan' => $txtnorujukan,
						'ppk_rujukan' => $txtppkasalrujukan,
						'ppk_rujukan_nama' => $txtppkasalrujukantxt,
						'no_hp' => $txtnotelp,
						'cetakan' => $dataCetakan[0]->cetakan + 1,
						'user1' => $this->session->userdata("nmuser"),
						'user2' => $this->session->userdata("nmuser"),
						'lastlogin' => date("Y-m-d H:i:s")
					);
					$prosesdb = $this->db->insert('sep_resources', $readyInsert);

					if ($prosesdb) {
						$insert_id = $this->db->insert_id();

						$dataSep = $this->bpjsmodel->getNoSep($insert_id);

						$dt["stat"] = $prosesdb;
						$dt["message"] = "Sukses";
						$dt["link"] = site_url('bpjs/cetaksep/') . $dataSep->no_sep;
						echo json_encode($dt);
					} else {
						$dt["stat"] = $prosesdb;
						$dt["message"] = "Terjadi Kesalahan";
						echo json_encode($dt);
					}
				} else if ($sendToModel[0] == V_REQUIRED_STATUS) {
					$dt["stat"] = false;
					$dt["message"] = $sendToModel[1];
					echo json_encode($dt);
				}
			} else if ($idDari == 1) {
				$_2nomor = $this->input->post("_2nomor", TRUE);
				$_2tglPelayanan = $this->input->post("_2tglPelayanan", TRUE);
				$_2tglPelayanan_date = date_create($_2tglPelayanan);
				$_2tglPelayanan_ = date_format($_2tglPelayanan_date,"Y-m-d");
				$_2pelayanan = $this->input->post("_2pelayanan", TRUE);
				$_2ppk = $this->input->post("_2ppk", TRUE);
				$txtkdklspst = $this->input->post("txtkdklspst", TRUE);
				$txtpisa = $this->input->post("txtpisa", TRUE);
				$txtnomr = $this->input->post("txtnomr", TRUE);
				$jenForm = $this->input->post("jenForm", TRUE);
				$cbasalrujukan = $this->input->post("cbasalrujukan", TRUE);
				$txtppkasalrujukan = $this->input->post("txtppkasalrujukan", TRUE);
				$txtppkasalrujukantxt = $this->input->post("txtppkasalrujukantxt", TRUE);
				$txtnorujukan = $this->input->post("txtnorujukan", TRUE);
				$txttglrujukan = $this->input->post("txttglrujukan", TRUE);
				$txttglrujukan_date = date_create($txttglrujukan);
				$txttglrujukan_ = date_format($txttglrujukan_date,"Y-m-d");
				$txtcatatan = $this->input->post("txtcatatan", TRUE);
				$txtnmdiagnosa = $this->input->post("txtnmdiagnosa", TRUE);
				$chkpoliesekutif = $this->input->post("chkpoliesekutif", TRUE);
				if ($chkpoliesekutif) {
					$chkpoliesekutif_ = 1;
				} else {
					$chkpoliesekutif_ = 0;
				}
				$txtnmpoli = $this->input->post("txtnmpoli", TRUE);
				$chkCOB = $this->input->post("chkCOB", TRUE);
				if ($chkCOB) {
					$chkCOB_ = 1;
				} else {
					$chkCOB_ = 0;
				}
				$cbstatuskll = $this->input->post("cbstatuskll", TRUE);
				if (($cbstatuskll == "") || ($cbstatuskll == "0")) {
					$cbstatuskll_ = 0;
					$txtTglKejadian_ = "";
					$cbpropinsi = "";
					$cbkabupaten = "";
					$cbkecamatan = "";
					$txtketkejadian = "";
				} else {
					$cbstatuskll_ = 1;
					$txtTglKejadian = $this->input->post("txtTglKejadian", TRUE);
					$txtTglKejadian_date = date_create($txtTglKejadian);
					$txtTglKejadian_ = date_format($txtTglKejadian_date,"Y-m-d");
					$cbpropinsi = $this->input->post("cbpropinsi", TRUE);
					$cbkabupaten = $this->input->post("cbkabupaten", TRUE);
					$cbkecamatan = $this->input->post("cbkecamatan", TRUE);
					$txtketkejadian = $this->input->post("txtketkejadian", TRUE);
				}
				$txtnotelp = $this->input->post("txtnotelp", TRUE);
				$txtnmdpjp = $this->input->post("txtnmdpjp", TRUE);
				$txtnoskdp = $this->input->post("txtnoskdp", TRUE);
				$chkkatarak = $this->input->post("chkkatarak", TRUE);
				if ($chkkatarak) {
					$chkkatarak = 1;
				} else {
					$chkkatarak = 0;
				}

				$data = array (
					'request' => 
					array (
					  't_sep' => 
					  array (
						'noKartu' => ''.$_2nomor.'',
						'tglSep' => ''.$_2tglPelayanan_.'',
						'ppkPelayanan' => '1801R014',
						'jnsPelayanan' => ''.$_2pelayanan.'',
						'klsRawat' => ''.$txtkdklspst.'',
						'noMR' => ''.$txtnomr.'',
						'rujukan' => 
						array (
						  'asalRujukan' => ''.$cbasalrujukan.'',
						  'tglRujukan' => ''.$txttglrujukan_.'',
						  'noRujukan' => ''.$txtnorujukan.'',
						  'ppkRujukan' => ''.$_2ppk.'',
						),
						'catatan' => ''.$txtcatatan.'',
						'diagAwal' => ''.$txtnmdiagnosa.'',
						'poli' => 
						array (
						  'tujuan' => ''.$txtnmpoli.'',
						  'eksekutif' => ''.$chkpoliesekutif_.'',
						),
						'cob' => 
						array (
						  'cob' => ''.$chkCOB_.'',
						),
						'katarak' => 
						array (
						  'katarak' => ''.$chkkatarak.'',
						),
						'jaminan' => 
						array (
							// di tes isikan angka nol
						  'lakaLantas' => ''.$cbstatuskll_.'', 
						  'penjamin' => 
						  array (
							'penjamin' => '',
							'tglKejadian' => ''.$txtTglKejadian_.'',
							'keterangan' => ''.$txtketkejadian.'',
							'suplesi' => 
							array (
							  'suplesi' => '0',
							  'noSepSuplesi' => '',
							  'lokasiLaka' => 
							  array (
								'kdPropinsi' => ''.$cbpropinsi.'',
								'kdKabupaten' => ''.$cbkabupaten.'',
								'kdKecamatan' => ''.$cbkecamatan.'',
							  ),
							),
						  ),
						),
						'skdp' => 
						array (
						  'noSurat' => '',
						  'kodeDPJP' => '',
						),
						'noTelp' => ''.$txtnotelp.'',
						'user' => ''.$this->session->userdata("nmuser").'',
					  ),
					),
				);
				$sendToModel = $this->bpjsmodel->insertSEP($data);
				$dataCetakan = $this->bpjsmodel->cetakanKe($_2nomor);
				if ($sendToModel[0] == V_SUKSES_STATUS) {
					$getFromModel = $sendToModel[1];
					$readyInsert = array (
						'catatan' => $getFromModel['sep']['catatan'],
						'diagnosa' => $getFromModel['sep']['diagnosa'],
						'jns_pelayanan' => $getFromModel['sep']['jnsPelayanan'],
						'kelas_rawat' => $getFromModel['sep']['kelasRawat'],
						'no_sep' => $getFromModel['sep']['noSep'],
						'penjamin' => $getFromModel['sep']['penjamin'],
						'peserta_asuransi' => $getFromModel['sep']['peserta']['asuransi'],
						'peserta_hak_kelas' => $getFromModel['sep']['peserta']['hakKelas'],
						'peserta_jns_peserta' => $getFromModel['sep']['peserta']['jnsPeserta'],
						'peserta_kelamin' => $getFromModel['sep']['peserta']['kelamin'],
						'peserta_nama' => $getFromModel['sep']['peserta']['nama'],
						'peserta_no_kartu' => $getFromModel['sep']['peserta']['noKartu'],
						'peserta_no_mr' => $getFromModel['sep']['peserta']['noMr'],
						'peserta_tgl_lahir' => $getFromModel['sep']['peserta']['tglLahir'],
						'informasi_dinsos' => handlingnullstring($getFromModel['sep']['informasi']['dinsos']),
						'informasi_prolanis_prb' => handlingnullstring($getFromModel['sep']['informasi']['prolanisPRB']),
						'informasi_no_sktm' => handlingnullstring($getFromModel['sep']['informasi']['noSKTM']),
						'poli' => $getFromModel['sep']['poli'],
						'poli_eksekutif' => $getFromModel['sep']['poliEksekutif'],
						'tgl_sep' => $getFromModel['sep']['tglSep'],
						'no_rujukan' => $txtnorujukan,
						'ppk_rujukan' => $txtppkasalrujukan,
						'ppk_rujukan_nama' => $txtppkasalrujukantxt,
						'no_hp' => $txtnotelp,
						'cetakan' => $dataCetakan[0]->cetakan + 1,
						'user1' => $this->session->userdata("nmuser"),
						'user2' => $this->session->userdata("nmuser"),
						'lastlogin' => date("Y-m-d H:i:s")
					);
					$prosesdb = $this->db->insert('sep_resources', $readyInsert);

					if ($prosesdb) {
						$insert_id = $this->db->insert_id();

						$dataSep = $this->bpjsmodel->getNoSep($insert_id);

						$dt["stat"] = $prosesdb;
						$dt["message"] = "Sukses";
						$dt["link"] = site_url('bpjs/cetaksep/') . $dataSep->no_sep;
						echo json_encode($dt);
					} else {
						$dt["stat"] = $prosesdb;
						$dt["message"] = "Terjadi Kesalahan";
						echo json_encode($dt);
					}
				} else if ($sendToModel[0] == V_REQUIRED_STATUS) {
					$dt["stat"] = false;
					$dt["message"] = $sendToModel[1];
					echo json_encode($dt);
				}
			}
		} else if ($statusForm == 2) {
			$_2nomor = $this->input->post("nokartu", TRUE);
			$_2tglPelayanan = $this->input->post("tglpelayanan", TRUE);
			$_2tglPelayanan_date = date_create($_2tglPelayanan);
			$_2tglPelayanan_ = date_format($_2tglPelayanan_date,"Y-m-d");
			$_2pelayanan = $this->input->post("pelayanan", TRUE);
			$_2ppk = $this->input->post("ppk", TRUE);
			$txtkdklspst = $this->input->post("txtkdklspst", TRUE);
			$txtpisa = $this->input->post("txtpisa", TRUE);
			$txtnomr = $this->input->post("txtnomr", TRUE);
			$jenForm = $this->input->post("jenForm", TRUE);
			$cbasalrujukan = $this->input->post("cbasalrujukan", TRUE);
			$txtppkasalrujukan = $this->input->post("txtppkasalrujukan", TRUE);
			$txtppkasalrujukantxt = $this->input->post("txtppkasalrujukantxt", TRUE);
			$txtnorujukan = $this->input->post("txtnorujukan", TRUE);
			$txttglrujukan = $this->input->post("txttglrujukan", TRUE);
			$txttglrujukan_date = date_create($txttglrujukan);
			$txttglrujukan_ = date_format($txttglrujukan_date,"Y-m-d");
			$txtcatatan = $this->input->post("txtcatatan", TRUE);
			$txtnmdiagnosa = $this->input->post("txtnmdiagnosa", TRUE);
			$chkpoliesekutif = $this->input->post("chkpoliesekutif", TRUE);
			if ($chkpoliesekutif) {
				$chkpoliesekutif_ = 1;
			} else {
				$chkpoliesekutif_ = 0;
			}
			$txtnmpoli = $this->input->post("txtnmpoli", TRUE);
			$chkCOB = $this->input->post("chkCOB", TRUE);
			if ($chkCOB) {
				$chkCOB_ = 1;
			} else {
				$chkCOB_ = 0;
			}
			$cbstatuskll = $this->input->post("cbstatuskll", TRUE);
			if (($cbstatuskll == "") || ($cbstatuskll == "0")) {
				$cbstatuskll_ = 0;
				$txtTglKejadian_ = "";
				$cbpropinsi = "";
				$cbkabupaten = "";
				$cbkecamatan = "";
				$txtketkejadian = "";
			} else {
				$cbstatuskll_ = 1;
				$txtTglKejadian = $this->input->post("txtTglKejadian", TRUE);
				$txtTglKejadian_date = date_create($txtTglKejadian);
				$txtTglKejadian_ = date_format($txtTglKejadian_date,"Y-m-d");
				$cbpropinsi = $this->input->post("cbpropinsi", TRUE);
				$cbkabupaten = $this->input->post("cbkabupaten", TRUE);
				$cbkecamatan = $this->input->post("cbkecamatan", TRUE);
				$txtketkejadian = $this->input->post("txtketkejadian", TRUE);
			}
			$txtnotelp = $this->input->post("txtnotelp", TRUE);
			$txtnmdpjp = $this->input->post("txtnmdpjp", TRUE);
			$txtnoskdp = $this->input->post("txtnoskdp", TRUE);
			$chkkatarak = $this->input->post("chkkatarak", TRUE);
			if ($chkkatarak) {
				$chkkatarak = 1;
			} else {
				$chkkatarak = 0;
			}

			$data = array (
				'request' => 
				array (
					't_sep' => 
					array (
					'noKartu' => ''.$_2nomor.'',
					'tglSep' => ''.$_2tglPelayanan_.'',
					'ppkPelayanan' => '1801R014',
					'jnsPelayanan' => ''.$_2pelayanan.'',
					'klsRawat' => ''.$txtkdklspst.'',
					'noMR' => ''.$txtnomr.'',
					'rujukan' => 
					array (
						'asalRujukan' => ''.$cbasalrujukan.'',
						'tglRujukan' => ''.$txttglrujukan_.'',
						'noRujukan' => ''.$txtnorujukan.'',
						'ppkRujukan' => ''.$_2ppk.'',
					),
					'catatan' => ''.$txtcatatan.'',
					'diagAwal' => ''.$txtnmdiagnosa.'',
					'poli' => 
					array (
						'tujuan' => ''.$txtnmpoli.'',
						'eksekutif' => ''.$chkpoliesekutif_.'',
					),
					'cob' => 
					array (
						'cob' => ''.$chkCOB_.'',
					),
					'katarak' => 
					array (
						'katarak' => ''.$chkkatarak.'',
					),
					'jaminan' => 
					array (
						// di tes isikan angka nol
						'lakaLantas' => ''.$cbstatuskll_.'', 
						'penjamin' => 
						array (
						'penjamin' => '',
						'tglKejadian' => ''.$txtTglKejadian_.'',
						'keterangan' => ''.$txtketkejadian.'',
						'suplesi' => 
						array (
							'suplesi' => '0',
							'noSepSuplesi' => '',
							'lokasiLaka' => 
							array (
							'kdPropinsi' => ''.$cbpropinsi.'',
							'kdKabupaten' => ''.$cbkabupaten.'',
							'kdKecamatan' => ''.$cbkecamatan.'',
							),
						),
						),
					),
					'skdp' => 
					array (
						'noSurat' => '',
						'kodeDPJP' => '',
					),
					'noTelp' => ''.$txtnotelp.'',
					'user' => ''.$this->session->userdata("nmuser").'',
					),
				),
			);
			$sendToModel = $this->bpjsmodel->insertSEP($data);
			$dataCetakan = $this->bpjsmodel->cetakanKe($_2nomor);
			if ($sendToModel[0] == V_SUKSES_STATUS) {
				$getFromModel = $sendToModel[1];
				$readyInsert = array (
					'catatan' => $getFromModel['sep']['catatan'],
					'diagnosa' => $getFromModel['sep']['diagnosa'],
					'jns_pelayanan' => $getFromModel['sep']['jnsPelayanan'],
					'kelas_rawat' => $getFromModel['sep']['kelasRawat'],
					'no_sep' => $getFromModel['sep']['noSep'],
					'penjamin' => $getFromModel['sep']['penjamin'],
					'peserta_asuransi' => $getFromModel['sep']['peserta']['asuransi'],
					'peserta_hak_kelas' => $getFromModel['sep']['peserta']['hakKelas'],
					'peserta_jns_peserta' => $getFromModel['sep']['peserta']['jnsPeserta'],
					'peserta_kelamin' => $getFromModel['sep']['peserta']['kelamin'],
					'peserta_nama' => $getFromModel['sep']['peserta']['nama'],
					'peserta_no_kartu' => $getFromModel['sep']['peserta']['noKartu'],
					'peserta_no_mr' => $getFromModel['sep']['peserta']['noMr'],
					'peserta_tgl_lahir' => $getFromModel['sep']['peserta']['tglLahir'],
					'informasi_dinsos' => handlingnullstring($getFromModel['sep']['informasi']['dinsos']),
					'informasi_prolanis_prb' => handlingnullstring($getFromModel['sep']['informasi']['prolanisPRB']),
					'informasi_no_sktm' => handlingnullstring($getFromModel['sep']['informasi']['noSKTM']),
					'poli' => $getFromModel['sep']['poli'],
					'poli_eksekutif' => $getFromModel['sep']['poliEksekutif'],
					'tgl_sep' => $getFromModel['sep']['tglSep'],
					'no_rujukan' => $txtnorujukan,
					'ppk_rujukan' => $txtppkasalrujukan,
					'ppk_rujukan_nama' => $txtppkasalrujukantxt,
					'no_hp' => $txtnotelp,
					'cetakan' => $dataCetakan[0]->cetakan + 1,
					'user1' => $this->session->userdata("nmuser"),
					'user2' => $this->session->userdata("nmuser"),
					'lastlogin' => date("Y-m-d H:i:s")
				);
				$prosesdb = $this->db->insert('sep_resources', $readyInsert);

				if ($prosesdb) {
					$insert_id = $this->db->insert_id();

					$dataSep = $this->bpjsmodel->getNoSep($insert_id);

					$dt["stat"] = $prosesdb;
					$dt["message"] = "Sukses";
					$dt["link"] = site_url('bpjs/cetaksep/') . $dataSep->no_sep;
					echo json_encode($dt);
				} else {
					$dt["stat"] = $prosesdb;
					$dt["message"] = "Terjadi Kesalahan";
					echo json_encode($dt);
				}
			} else if ($sendToModel[0] == V_REQUIRED_STATUS) {
				$dt["stat"] = false;
				$dt["message"] = $sendToModel[1];
				echo json_encode($dt);
			}
		} else {
			echo json_encode(['1dar' => "kosong"]);
		}
	}

	public function cetaksep($no) {
		$this->db->from("sep_resources");	
		$this->db->where("no_sep", $no);
		$data = $this->db->get();
		$sepData["sep"] = $data->row();
		$this->load->view('layanan/pelayanan/bpjs/sep/cetak/cetakan_sep', $sepData);
	}

	// Update SEP

	public function readsep() {
        $data['include'] = "layanan/pelayanan/bpjs/sep/listbpjs";
		$data['menusamping'] = "menubpjs";
		$data['backhome'] = "tiga";
		$data['js'] = "pelayanan/bpjs/jslistbpjs";
		$data['css'] = "pelayanan/bpjs/csslistbpjs";
		$this->load->view('templatesidebar/content', $data);
	}
	
	public function loadsep() {
		// $dataSep = $this->bpjsmodel->ambilListSep();
		$no = $this->input->post('sep');
		$dataSep = $this->bpjsmodel->readSEP($no);
		$arrData = $dataSep[1];

		if (strtolower($arrData['poli']) == "instalasi gawat darurat") {
			$dataRujuk = $this->bpjsmodel->readRujukan($arrData['noRujukan']);
		
			$dataCetakan = $this->bpjsmodel->viewCetakanKe($no);
	
			$getRujukan = $dataRujuk[1];
	
			$data["rujukan"] = $getRujukan;
			$data["hasil"] = $dataSep[1];
			$data["form"] = 0;
	
			$dt["stat"] = true;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/bpjs/sep/update/formupdate', $data, TRUE);
	
			echo json_encode($dt);
		} else {
			$dataRujuk = $this->bpjsmodel->readRujukan($arrData['noRujukan']);
		
			$dataCetakan = $this->bpjsmodel->viewCetakanKe($no);
	
			$getRujukan = $dataRujuk[1];
			$datarujukan['ppk'] = $getRujukan['rujukan']['provPerujuk']['kode'];
			$datarujukan['faskes'] = $getRujukan['asalFaskes'];
			$datarujukan['ppkText'] = $getRujukan['rujukan']['provPerujuk']['nama'];
			$datarujukan['txtTanggal'] = $getRujukan['rujukan']['tglKunjungan'];
			$datarujukan['norujukan'] = $arrData['noRujukan'];
			$datarujukan['cetakan'] = $dataCetakan;
	
			$data["viewrujukan"] = $this->load->view('layanan/pelayanan/bpjs/sep/update/formrujukan', $datarujukan, TRUE);
	
			$data["rujukan"] = $getRujukan;
			$data["hasil"] = $dataSep[1];
			$data["form"] = 1;
	
			$dt["stat"] = true;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/bpjs/sep/update/formupdate', $data, TRUE);
	
			echo json_encode($dt);
		}
	}

	public function modaldetail() {
		$no = $this->input->get('no');
		$dataSep = $this->bpjsmodel->readSEP($no);
		$data["hasil"] = $dataSep[1];
		$this->load->view('layanan/pelayanan/bpjs/sep/formdetailsep', $data);
	}

	public function modalubah() {
		$no = $this->input->get('no');
		$dataSep = $this->bpjsmodel->readSEP($no);
		$dataSepLocal = $this->bpjsmodel->getAllNoSep($no);

		$arrData = $dataSep[1];
		$dataRujuk = $this->bpjsmodel->readRujukan($arrData['noRujukan']);

		$dataCetakan = $this->bpjsmodel->viewCetakanKe($no);

		$getRujukan = $dataRujuk[1];
		$datarujukan['ppk'] = $getRujukan['rujukan']['provPerujuk']['kode'];
		$datarujukan['ppkText'] = $getRujukan['rujukan']['provPerujuk']['nama'];
		$datarujukan['txtTanggal'] = $getRujukan['rujukan']['tglKunjungan'];
		$datarujukan['cetakan'] = $dataCetakan;

		$data['cetakan'] = $dataCetakan;
		$data["viewrujukan"] = $this->load->view('layanan/pelayanan/bpjs/sep/update/formrujukan', $datarujukan, TRUE);
		$data['peserta'] = $dataSepLocal;
		$data["hasil"] = $dataSep[1];
		$this->load->view('layanan/pelayanan/bpjs/sep/update/formubahsep', $data);
	}

	public function ubahsepugd() {
		$nosep = $this->input->post("nosep", TRUE);
		$txtnomr = $this->input->post("txtnomr", TRUE);
		$chkCOB = $this->input->post("chkCOB", TRUE);
		if ($chkCOB) {
			$chkCOB_ = 1;
		} else {
			$chkCOB_ = 0;
		}
		$txtnmdiagnosa = $this->input->post("txtnmdiagnosa", TRUE);
		if ($txtnmdiagnosa == "") {
			$txtkddiagnosa_ = $this->input->post("txtkddiagnosa", TRUE);
		} else {
			$txtkddiagnosa_ = $txtnmdiagnosa;
		}
		$txtnotelp = $this->input->post("txtnotelp", TRUE);
		$txtcatatan = $this->input->post("txtcatatan", TRUE);
		$cbstatuskll = $this->input->post("cbstatuskll", TRUE);
		if (($cbstatuskll == "") || ($cbstatuskll == "0")) {
			$cbstatuskll_ = 0;
			$txtTglKejadian_ = "";
			$cbpropinsi = "";
			$cbkabupaten = "";
			$cbkecamatan = "";
			$txtketkejadian = "";
		} else {
			$cbstatuskll_ = 1;
			$txtTglKejadian = $this->input->post("txtTglKejadian", TRUE);
			$txtTglKejadian_date = date_create($txtTglKejadian);
			$txtTglKejadian_ = date_format($txtTglKejadian_date,"Y-m-d");
			$cbpropinsi = $this->input->post("cbpropinsi", TRUE);
			$cbkabupaten = $this->input->post("cbkabupaten", TRUE);
			$cbkecamatan = $this->input->post("cbkecamatan", TRUE);
			$txtketkejadian = $this->input->post("txtketkejadian", TRUE);
		}
		$txtnotelp = $this->input->post("txtnotelp", TRUE);
		
		$data = array (
			'request' => array (
				't_sep' => array (
					'noSep' => ''.$nosep.'',
					'klsRawat' => '',
					'noMR' => ''.$txtnomr.'',
					'rujukan' => array (
						'asalRujukan' => '',
						'tglRujukan' => '',
						'noRujukan' => '',
						'ppkRujukan' => '',
					),
					'catatan' => ''.$txtcatatan.'',
					'diagAwal' => ''.$txtkddiagnosa_.'',
					'poli' => array (
						'eksekutif' => '',
					),
					'cob' => array (
						'cob' => ''.$chkCOB_.'',
					),
					'katarak' =>  array (
						'katarak' => '',
					),
					'skdp' => array (
						'noSurat' => '',
						'kodeDPJP' => '',
					),
					'jaminan' => array (
						'lakaLantas' => ''.$cbstatuskll_.'', 
						'penjamin' => array (
							'penjamin' => '',
							'tglKejadian' => ''.$txtTglKejadian_.'',
							'keterangan' => ''.$txtketkejadian.'',
							'suplesi' => array (
								'suplesi' => '0',
								'noSepSuplesi' => '',
								'lokasiLaka' => array (
									'kdPropinsi' => ''.$cbpropinsi.'',
									'kdKabupaten' => ''.$cbkabupaten.'',
									'kdKecamatan' => ''.$cbkecamatan.'',
								),
							),
						),
					),
					'noTelp' => ''.$txtnotelp.'',
					'user' => ''.$this->session->userdata("nmuser").'',
				),
			),
		);
		$sendToModel = $this->bpjsmodel->updateSEP($data);
		if ($sendToModel[0] == V_SUKSES_STATUS) {
			$dt["stat"] = true;
			$dt["message"] = "Sukses";
			echo json_encode($dt);
		} else if ($sendToModel[0] == V_REQUIRED_STATUS) {
			$dt["stat"] = false;
			$dt["message"] = $sendToModel[1];
			echo json_encode($dt);
		}
	}

	public function ubahsep() {
		$nosep = $this->input->post("nosep", TRUE);
		$txtnomr = $this->input->post("txtnomr", TRUE);
		$chkCOB = $this->input->post("chkCOB", TRUE);
		if ($chkCOB) {
			$chkCOB_ = 1;
		} else {
			$chkCOB_ = 0;
		}
		$txtnmdiagnosa = $this->input->post("txtnmdiagnosa", TRUE);
		if ($txtnmdiagnosa == "") {
			$txtkddiagnosa_ = $this->input->post("txtkddiagnosa", TRUE);
		} else {
			$txtkddiagnosa_ = $txtnmdiagnosa;
		}
		$txtnotelp = $this->input->post("txtnotelp", TRUE);
		$txtcatatan = $this->input->post("txtcatatan", TRUE);
		$cbstatuskll = $this->input->post("cbstatuskll", TRUE);
		if (($cbstatuskll == "") || ($cbstatuskll == "0")) {
			$cbstatuskll_ = 0;
			$txtTglKejadian_ = "";
			$cbpropinsi = "";
			$cbkabupaten = "";
			$cbkecamatan = "";
			$txtketkejadian = "";
		} else {
			$cbstatuskll_ = 1;
			$txtTglKejadian = $this->input->post("txtTglKejadian", TRUE);
			$txtTglKejadian_date = date_create($txtTglKejadian);
			$txtTglKejadian_ = date_format($txtTglKejadian_date,"Y-m-d");
			$cbpropinsi = $this->input->post("cbpropinsi", TRUE);
			$cbkabupaten = $this->input->post("cbkabupaten", TRUE);
			$cbkecamatan = $this->input->post("cbkecamatan", TRUE);
			$txtketkejadian = $this->input->post("txtketkejadian", TRUE);
		}
		$txtnotelp = $this->input->post("txtnotelp", TRUE);
		
		$data = array (
			'request' => array (
				't_sep' => array (
					'noSep' => ''.$nosep.'',
					'klsRawat' => '',
					'noMR' => ''.$txtnomr.'',
					'rujukan' => array (
						'asalRujukan' => '',
						'tglRujukan' => '',
						'noRujukan' => '',
						'ppkRujukan' => '',
					),
					'catatan' => ''.$txtcatatan.'',
					'diagAwal' => ''.$txtkddiagnosa_.'',
					'poli' => array (
						'eksekutif' => '',
					),
					'cob' => array (
						'cob' => ''.$chkCOB_.'',
					),
					'katarak' =>  array (
						'katarak' => '',
					),
					'skdp' => array (
						'noSurat' => '',
						'kodeDPJP' => '',
					),
					'jaminan' => array (
						'lakaLantas' => ''.$cbstatuskll_.'', 
						'penjamin' => array (
							'penjamin' => '',
							'tglKejadian' => ''.$txtTglKejadian_.'',
							'keterangan' => ''.$txtketkejadian.'',
							'suplesi' => array (
								'suplesi' => '0',
								'noSepSuplesi' => '',
								'lokasiLaka' => array (
									'kdPropinsi' => ''.$cbpropinsi.'',
									'kdKabupaten' => ''.$cbkabupaten.'',
									'kdKecamatan' => ''.$cbkecamatan.'',
								),
							),
						),
					),
					'noTelp' => ''.$txtnotelp.'',
					'user' => ''.$this->session->userdata("nmuser").'',
				),
			),
		);
		$sendToModel = $this->bpjsmodel->updateSEP($data);
		if ($sendToModel[0] == V_SUKSES_STATUS) {
			$dt["stat"] = true;
			$dt["message"] = "Sukses";
			echo json_encode($dt);
		} else if ($sendToModel[0] == V_REQUIRED_STATUS) {
			$dt["stat"] = false;
			$dt["message"] = $sendToModel[1];
			echo json_encode($dt);
		}
	}

	public function hapussep() {
		$no = $this->input->get('no');
		$data = array(
			"request" => array(
				"t_sep" => array(
					"noSep" => $no,
					"user" => ''.$this->session->userdata("nmuser").''
				)
			)
		);

		$dataSep = $this->bpjsmodel->hapusSEP($data);

		if ($dataSep[0] == V_SUKSES_STATUS) {
			$hapus = $this->db->delete('sep_resources', array('no_sep' => $no));
			$dt["stat"] = $hapus;
			$dt["msg"] = "Sukses hapus SEP";
			echo json_encode($dt);
		} else {
			$dt["stat"] = false;
			$dt["msg"] = "Gagal hapus SEP";
			echo json_encode($dt);
		}
	}

	public function pulangsep() {
		$no = $this->input->get('no');
		$tglSekarang = date("Y-m-d h:i:s");
		$data = array(
			"request" => array(
				"t_sep" => array(
					"noSep" => $no,
					"tglPulang" => $tglSekarang,
					"user" => ''.$this->session->userdata("nmuser").''
				)
			)
		);

		$dataSep = $this->bpjsmodel->pulangSEP($data);

		if ($dataSep[0] == V_SUKSES_STATUS) {
			$dataedit = array(
				'tgl_pulang' => $tglSekarang
			);
			$this->db->where("no_sep", $no);
			$hasil = $this->db->update("user_master", $dataedit);

			$dt["stat"] = $hasil;
			$dt["msg"] = "Sukses update tanggal pulang SEP";
			echo json_encode($dt);
		} else {
			$dt["stat"] = false;
			$dt["msg"] = "Gagal update tanggal pulang SEP";
			echo json_encode($dt);
		}
	}

	public function cetakseprud($no) {
		$dataSep = $this->bpjsmodel->readSEP($no);
		$dataRujuk = $this->bpjsmodel->readRujukan($dataSep[1]['noRujukan']);

		$sepData["dataSep"] = $dataSep[1];
		$sepData["dataRujuk"] = $dataRujuk[1];
		$this->load->view('layanan/pelayanan/bpjs/sep/cetak/cetakan_sep_rud', $sepData);
	}

	public function inserSPRI() {
		$notransaksi = $this->input->get("notransaksi");
		$kodedokterbpjs = $this->input->get("dpjpLayan");
		$tujuan = $this->input->get("tujuan");
		$namaTujuan = $this->input->get("namaTujuan");

		$data = $this->bpjsmodel->inserSPRI();
		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);
		$kode=$res['metaData']['code'];
		$pesan=$res['metaData']['message'];
		if ($kode == 200 ){
			$responnya=trim($res["response"]);
			$ss=stringDecrypt_SEP($responnya,$timestampSEP);
			$cc=decompress($ss);
			$ccdecode=json_decode($cc,true);
			// var_dump($ccdecode);
			$noSPRI=$ccdecode['noSPRI'];
			$tglRencanaKontrol=$ccdecode['tglRencanaKontrol'];
			$namaDokter=$ccdecode['namaDokter'];
			$noKartu=$ccdecode['noKartu'];
			$nama=$ccdecode['nama'];
			$kelamin=$ccdecode['kelamin'];
			$tglLahir=$ccdecode['tglLahir'];
			$namaDiagnosa=$ccdecode['namaDiagnosa'];
			$datasimpan = array(
				'nospri' => $noSPRI,
				'tglrencanakontrol' => $tglRencanaKontrol,
				'kodedokterbpjs' => $kodedokterbpjs,
				'namadokter' => $namaDokter,
				'nokartu' => $noKartu,
				'nama' => $nama,
				'kelamin' => $kelamin,
				'tglLahir' => $tglLahir,
				'namadiagnosa' => $namaDiagnosa,
				'notransaksi' => $notransaksi,
				'poli' => $tujuan,
				'nama_poli' => $namaTujuan,
				'user1' => $this->session->userdata("nmuser"), 
				'user2' => $this->session->userdata("nmuser"), 
				'lastlogin' => date("Y-m-d H:i:s")
			);
			$dt = $this->db->insert('spri_resources', $datasimpan);
			$output = [
				'stat' => true,
				'dataspri' => $datasimpan
			];
			echo json_encode($output);  
		} else {
			$output = [
				'stat' => false,
				'code' => $kode,
				'message' => $pesan
			];
			echo json_encode($output);  //kirim ke form spri
		}	
	}

	public function inserSurkon() {
		$notransaksi = $this->input->get("notransaksi");
		$kodedokterbpjs = $this->input->get("dpjpLayan");
		$tujuan = $this->input->get("tujuan");
		$namaTujuan = $this->input->get("namaTujuan");
		$nosep = $this->input->get("nosep");

		$data = $this->bpjsmodel->inserSurkon();
		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);
		
		$kode=$res['metaData']['code'];
		$pesan=$res['metaData']['message'];
		if ($kode == 200 ){
			$responnya=trim($res["response"]);
			$ss=stringDecrypt_SEP($responnya,$timestampSEP);
			$cc=decompress($ss);
			$ccdecode=json_decode($cc,true);

			$noSPRI=$ccdecode['noSuratKontrol'];
			$tglRencanaKontrol=$ccdecode['tglRencanaKontrol'];
			$namaDokter=$ccdecode['namaDokter'];
			$noKartu=$ccdecode['noKartu'];
			$nama=$ccdecode['nama'];
			$kelamin=$ccdecode['kelamin'];
			$tglLahir=$ccdecode['tglLahir'];
			// $namaDiagnosa=$ccdecode['namaDiagnosa'];
			$namaDiagnosa=$ccdecode['namaDiagnosa'];
			$datasimpan = array(
				'nospri' => $noSPRI,
				'tglrencanakontrol' => $tglRencanaKontrol,
				'kodedokterbpjs' => $kodedokterbpjs,
				'namadokter' => $namaDokter,
				'nokartu' => $noKartu,
				'nama' => $nama,
				'kelamin' => $kelamin,
				'tglLahir' => $tglLahir,
				'namadiagnosa' => $namaDiagnosa,
				'notransaksi' => $notransaksi,
				'poli' => $tujuan,
				'nama_poli' => $namaTujuan,
				'nosep' => $nosep,
				'user1' => $this->session->userdata("nmuser"), 
				'user2' => $this->session->userdata("nmuser"), 
				'lastlogin' => date("Y-m-d H:i:s")
			);
			$dt = $this->db->insert('spri_resources', $datasimpan);
			$output = [
				'stat' => true,
				'dataspri' => $datasimpan
			];
			echo json_encode($output);  
		} else {
			$output = [
				'stat' => false,
				'code' => $kode,
				'message' => $pesan
			];
			echo json_encode($output);  //kirim ke form spri
		}	
	}

	public function editSPRI() {
		$notransaksi = $this->input->get("notransaksi");
		$kodedokterbpjs = $this->input->get("dpjpLayan");
		$namadpjpLayan = $this->input->get("namadpjpLayan");
		$tujuan = $this->input->get("tujuan");
		$namaTujuan = $this->input->get("namaTujuan");
		$nospri = $this->input->get("nospri");
		$tglspri = $this->input->get("tglSep");

		$data = $this->bpjsmodel->editSPRI();
		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);
		$kode=$res['metaData']['code'];
		$pesan=$res['metaData']['message'];
		if ($kode == 200 ){
			$responnya=trim($res["response"]);
			$ss=stringDecrypt_SEP($responnya,$timestampSEP);
			$cc=decompress($ss);
			$ccdecode=json_decode($cc,true);
			// var_dump($ccdecode);

			$noSPRI=$ccdecode['noSPRI'];
			$tglRencanaKontrol=$ccdecode['tglRencanaKontrol'];
			$namaDokter=$ccdecode['namaDokter'];
			$noKartu=$ccdecode['noKartu'];
			$nama=$ccdecode['nama'];
			$kelamin=$ccdecode['kelamin'];
			$tglLahir=$ccdecode['tglLahir'];
			$namaDiagnosa=$ccdecode['namaDiagnosa'];
			$datasimpan = array(
				'nospri' => $noSPRI,
				'tglrencanakontrol' => $tglRencanaKontrol,
				'kodedokterbpjs' => $kodedokterbpjs,
				'namadokter' => $namaDokter,
				'nokartu' => $noKartu,
				'nama' => $nama,
				'kelamin' => $kelamin,
				'tglLahir' => $tglLahir,
				'namadiagnosa' => $namaDiagnosa,
				'notransaksi' => $notransaksi,
				'poli' => $tujuan,
				'nama_poli' => $namaTujuan,
				'user1' => $this->session->userdata("nmuser"), 
				'user2' => $this->session->userdata("nmuser"), 
				'lastlogin' => date("Y-m-d H:i:s")
			);
			$this->db->where('nospri', $noSPRI);
			$dt = $this->db->update('spri_resources', $datasimpan);
			$output = [
				'stat' => true,
				'dataspri' => $datasimpan
			];
			echo json_encode($output);  
		} else {
			$output = [
				'stat' => false,
				'code' => $kode,
				'message' => $pesan
			];
			echo json_encode($output);  //kirim ke form spri
		}	
	}

	public function tes_ambilrujukan() { //uji coba saja ini....
		// $norujukan='0300S0010423B000001';
		$norujukan='200414020723P000001';
		
		$faskes=1;
		if ($faskes == 1) {
			$dtrujukan = $this->bpjsmodel->ambilrujukan($norujukan);
		} else {
			$dtrujukan = $this->bpjsmodel->ambilrujukanRS($norujukan);
		}
			$a=$dtrujukan[1]; 
			$timestampSEP=$a['x-timestamp'];
			$res=json_decode($dtrujukan[0],true);
			$code=$res["metaData"]["code"];
			$message=$res["metaData"]["message"];
			if ($code == 200 ){
				$responnya=trim($res["response"]);
				$ss=stringDecrypt_SEP($responnya,$timestampSEP);
				$cc=decompress($ss);
				$isirujukan=json_decode($cc,true);
				// var_dump($isirujukan);
				echo json_encode($isirujukan);  //kirim kembali ke pemanggil SEP IRJ

			} else {
				$output = [
					'stat' => false,
					'code' => $code,
					'message' => $message
				];
				// echo json_encode($output);  //kirim kembali ke pemanggil SEP IRJ
			}
	}


	public function ambilSEP() {
		// $nosep = $this->input->get("nokartu", TRUE);
		$nosep = '1801R0170623V000019';

		$data = $this->bpjsmodel->getSEP($nosep);
		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);
		$code=$res['metaData']['code'];
		$message=$res['metaData']['message'];

		if ($code == 200 ){
			$responnya=trim($res["response"]);
			$ss=stringDecrypt_SEP($responnya,$timestampSEP);
			$cc=decompress($ss);
			$dataPeserta=json_decode($cc,true);
			// echo json_encode($dataPeserta);
			// var_dump($dataPeserta);
			$output = [
				'stat' => true,
				'code' => $code,
				'message' => $dataPeserta
			];
			echo json_encode($output);
		} else {
			$output = [
				'stat' => false,
				'code' => $code,
				'message' => $message
			];
			echo json_encode($output);  //kirim ke form regis cek kartu
			// echo json_encode($res);
		}

	}

	public function persetujuanSEP() {
		// $nosep = $this->input->get("nokartu", TRUE);

		$data = $this->bpjsmodel->persetujuanSEP();
		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);
		$code=$res['metaData']['code'];
		$message=$res['metaData']['message'];

		if ($code == 200 ){
			$responnya=trim($res["response"]);
			$ss=stringDecrypt_SEP($responnya,$timestampSEP);
			$cc=decompress($ss);
			$dataPeserta=json_decode($cc,true);
			// echo json_encode($dataPeserta);
			// var_dump($dataPeserta);
			$output = [
				'stat' => true,
				'code' => $code,
				'message' => $dataPeserta
			];
			echo json_encode($output);
		} else {
			$output = [
				'stat' => false,
				'code' => $code,
				'message' => $message
			];
			echo json_encode($output);  //kirim ke form regis cek kartu
			// echo json_encode($res);
		}

	}

	public function approvalSEP() {
		// $nosep = $this->input->get("nokartu", TRUE);

		$data = $this->bpjsmodel->approvalSEP();
		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);
		$code=$res['metaData']['code'];
		$message=$res['metaData']['message'];

		if ($code == 200 ){
			$responnya=trim($res["response"]);
			$ss=stringDecrypt_SEP($responnya,$timestampSEP);
			$cc=decompress($ss);
			$dataPeserta=json_decode($cc,true);
			echo json_encode($dataPeserta);
			// var_dump($dataPeserta);
			$output = [
				'stat' => true,
				'code' => $code,
				'message' => $dataPeserta
			];
			echo json_encode($output);
		} else {
			$output = [
				'stat' => false,
				'code' => $code,
				'message' => $message
			];
			echo json_encode($output);  //kirim ke form regis cek kartu
			// echo json_encode($res);
		}

	}

	public function listPersetujuan() {
		// $nosep = $this->input->get("nokartu", TRUE);

		$data = $this->bpjsmodel->listPersetujuan();
		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);
		$code=$res['metaData']['code'];
		$message=$res['metaData']['message'];

		if ($code == 200 ){
			$responnya=trim($res["response"]);
			$ss=stringDecrypt_SEP($responnya,$timestampSEP);
			$cc=decompress($ss);
			$dataPeserta=json_decode($cc,true);
			echo json_encode($dataPeserta);
			// var_dump($dataPeserta);
			$output = [
				'stat' => true,
				'code' => $code,
				'message' => $dataPeserta
			];
			echo json_encode($output);
		} else {
			$output = [
				'stat' => false,
				'code' => $code,
				'message' => $message
			];
			echo json_encode($output);  //kirim ke form regis cek kartu
			// echo json_encode($res);
		}

	}


	public function formpersetujuan() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("unit");
            $data['include'] = "layanan/pelayanan/bpjs/form/persetujuan/formpersetujuan";
			$data['menusamping'] = "menubpjs";
			$data['backhome'] = "tiga";
			$data['js'] = "pelayanan/bpjs/listbpjs";
			$data['css'] = "pelayanan/urj/listurj";
			$this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

	public function tambahpersetujuan() {
        if ($this->session->userdata("login") == TRUE) {
			$data["txtTanggal"] = date('Y-m-d');
            $data["formpilih"] = 0;
            $this->load->view('layanan/pelayanan/bpjs/form/persetujuan/formtambah', $data);
        } else {
            redirect('login');
        }
    }

	
	public function carinama() {
		$this->load->model("pasien");
		$data = $this->pasien->carinama();
		echo json_encode($data);  //kirim ke form regis cek kartu

    }

	public function updatetglpulang() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/bpjs/form/persetujuan/updatetglpulang";
			$data['menusamping'] = "menubpjs";
			$data['backhome'] = "tiga";
			$data['js'] = "pelayanan/bpjs/listbpjs";
			$data['css'] = "pelayanan/urj/listurj";
			$this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

	public function caridatapulang() {
		$this->load->model("pasien");
		$data = $this->pasien->caridatapulang();
		echo json_encode($data); 
    }

	public function caridatarujukan() {
		$this->load->model("pasien");
		$data = $this->pasien->caridatarujukan();
		
		echo json_encode($data); 
    }

	public function simpantglpulang() {
		$this->load->model("bpjsmodel");
		$data = $this->bpjsmodel->simpantglpulang();
		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);
		$code=$res['metaData']['code'];
		$message=$res['metaData']['message'];

		if ($code == 200 ){
			$responnya=trim($res["response"]);
			$ss=stringDecrypt_SEP($responnya,$timestampSEP);
			$cc=decompress($ss);
			$dataPeserta=json_decode($cc,true);
			echo json_encode($dataPeserta);
			// var_dump($dataPeserta);
			$output = [
				'stat' => true,
				'code' => $code,
				'message' => $dataPeserta
			];
			echo json_encode($output);
		} else {
			$output = [
				'stat' => false,
				'code' => $code,
				'message' => $message
			];
			echo json_encode($output);  //kirim ke form regis cek kartu
			// echo json_encode($res);
		}

	}
	
	public function rujukan() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/bpjs/form/persetujuan/rujukan";
			$data['menusamping'] = "menubpjs";
			$data['backhome'] = "tiga";
			$data['js'] = "pelayanan/bpjs/listbpjs";
			$data['css'] = "pelayanan/urj/listurj";
			$this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

	public function simpanrujukan() {
		$notransaksi = $this->input->get("notrx");
		$nosep = $this->input->get("nosep");
		$pelayanan = $this->input->get("pelayanan");
		$tipeRujukan = $this->input->get("tipeRujukan");
		$catatan = $this->input->get("catatan");
		$this->load->model("bpjsmodel");
		$data = $this->bpjsmodel->simpanrujukan();
		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);
		$code=$res['metaData']['code'];
		$message=$res['metaData']['message'];
		if ($code == 200 ){
			$responnya=trim($res["response"]);
			$ss=stringDecrypt_SEP($responnya,$timestampSEP);
			$cc=decompress($ss);
			$datarujukan=json_decode($cc,true);
			$norujukan=$datarujukan["rujukan"]["noRujukan"];
			$tglrujukan=$datarujukan["rujukan"]["tglRujukan"];
			$tglberlaku=$datarujukan["rujukan"]["tglBerlakuKunjungan"];
			$tglkunjungan=$datarujukan["rujukan"]["tglRencanaKunjungan"];
			$diagnosa=$datarujukan["rujukan"]["diagnosa"]["kode"];

			$namadiagnosa=$datarujukan["rujukan"]["diagnosa"]["nama"];
			// $namadiagnosa2 = explode("-", $namadiagnosa1);
			// $namadiagnosa = trim($namadiagnosa2[1]);
			$koders=$datarujukan["rujukan"]["tujuanRujukan"]["kode"];
			$namars=$datarujukan["rujukan"]["tujuanRujukan"]["nama"];
			$poli=$datarujukan["rujukan"]["poliTujuan"]["kode"];
			$namapoli=$datarujukan["rujukan"]["poliTujuan"]["nama"];
			// $catatan=$datarujukan["rujukan"]["noRujukan"];

			$nokartu=$datarujukan["rujukan"]["peserta"]["noKartu"];
			$nama=$datarujukan["rujukan"]["peserta"]["nama"];
			$tgllahir=$datarujukan["rujukan"]["peserta"]["tglLahir"];
			$nomr=$datarujukan["rujukan"]["peserta"]["noMr"];
			$kelamin=$datarujukan["rujukan"]["peserta"]["kelamin"];
			$jnspeserta=$datarujukan["rujukan"]["peserta"]["jnsPeserta"];
			$hakkelas=$datarujukan["rujukan"]["peserta"]["hakKelas"];
			$asuransi=$datarujukan["rujukan"]["peserta"]["asuransi"];

			$datasimpan = array(
				'notransaksi' => $notransaksi,
				'norujukan' => $norujukan,
				'tglrujukan'  => $tglrujukan,
				'tglberlaku'  => $tglberlaku,
				'pelayanan'  => $pelayanan,
				'tipe'  => $tipeRujukan,
				'nosep'  => $nosep,
				'tglkunjungan'  => $tglkunjungan,
				'diagnosa'  => $diagnosa,
				'namadiagnosa'  => $namadiagnosa,
				'koders'  => $koders,
				'namars'  => $namars,
				'poli'  => $poli,
				'namapoli'  => $namapoli,
				'catatan'  => $catatan,

				'nokartu'  => $nokartu,
				'nama'  => $nama,
				'tgllahir'  => $tgllahir,
				'nomr'  => $nomr,
				'kelamin'  => $kelamin,
				'jnspeserta'  => $jnspeserta,
				'hakkelas'  => $hakkelas,
				'asuransi'  => $asuransi
			);
			$dt = $this->db->insert('vclaim_rujukan', $datasimpan);
			$output = [
				'stat' => true,
				'dataspri' => $datarujukan
			];
			echo json_encode($output);  
		} else {
			$output = [
				'stat' => false,
				'code' => $code,
				'message' => $message
			];
			echo json_encode($output); 
		}

	}


	public function updaterujukan() {
		$notransaksi = $this->input->get("notrx");
		$norujukan = $this->input->get("norujukan");
		$nosep = $this->input->get("nosep");
		$txttglrujukan = $this->input->get("txttglrujukan");
		$txttglkunjungan = $this->input->get("txttglkunjungan");

		$pelayanan = $this->input->get("pelayanan");
		$tipeRujukan = $this->input->get("tipeRujukan");
		$diagRujukan = $this->input->get("diagRujukan");
		$namadiagRujukan = $this->input->get("namadiagRujukan");
		$ppkDirujuk = $this->input->get("ppkDirujuk");
		$namappkDirujuk = $this->input->get("namappkDirujuk");
		$catatan = $this->input->get("catatan");
		$poliRujukan = $this->input->get("poliRujukan");
		$namapoliRujukan = $this->input->get("namapoliRujukan");


		$this->load->model("bpjsmodel");
		$data = $this->bpjsmodel->updaterujukan();
		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);
		$code=$res['metaData']['code'];
		$message=$res['metaData']['message'];
		if ($code == 200 ){
			$datasimpan = array(
				'notransaksi' => $notransaksi,
				'norujukan' => $norujukan,
				'tglrujukan'  => $tglrujukan,
				'tglberlaku'  => $tglberlaku,
				'pelayanan'  => $pelayanan,
				'tipe'  => $tipeRujukan,
				'nosep'  => $nosep,
				'tglkunjungan'  => $tglkunjungan,
				'diagnosa'  => $diagRujukan,
				'namadiagnosa'  => $namadiagRujukan,
				'koders'  => $ppkDirujuk,
				'namars'  => $namappkDirujuk,
				'poli'  => $poliRujukan,
				'namapoli'  => $namapoliRujukan,
				'catatan'  => $catatan

				// 'nokartu'  => $nokartu,
				// 'nama'  => $nama,
				// 'tgllahir'  => $tgllahir,
				// 'nomr'  => $nomr,
				// 'kelamin'  => $kelamin,
				// 'jnspeserta'  => $jnspeserta,
				// 'hakkelas'  => $hakkelas,
				// 'asuransi'  => $asuransi
			);
			$this->db->where("norujukan", $norujukan);
			$this->db->limit(1);
			$dt = $this->db->update('vclaim_rujukan', $datasimpan);
			
			$output = [
				'stat' => true,
				'dataspri' => $datarujukan
			];
			echo json_encode($output);  
		} else {
			$output = [
				'stat' => false,
				'code' => $code,
				'message' => $message
			];
			echo json_encode($output); 
		}

	}

	public function hapusrujukan() {
		$this->load->model("bpjsmodel");
		$data = $this->bpjsmodel->hapusrujukan();
		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);
		$kode=$res['metaData']['code'];
		$pesan=$res['metaData']['message'];
		if ($kode == 200){
			$norujukan=$this->input->get("norujukan");
			$this->db->where('norujukan', $norujukan);
			$this->db->delete('vclaim_rujukan');
			$output = [
				'stat' => true,
				'datasep' => $responnya
			];
			echo json_encode($output);  
		} else {
			$output = [
				'stat' => false,
				'code' => $kode,
				'message' => $pesan
			];
			echo json_encode($output);  //kirim ke form sep
		}	
	}

	public function listSepInternal() { //uji coba saja ini....
		$norujukan='1806R0010623V000036';
			$dtrujukan = $this->bpjsmodel->ambilRujukanInternal($norujukan);
			// var_dump($dtrujukan);
			$a=$dtrujukan[1]; 
			$timestampSEP=$a['x-timestamp'];
			$res=json_decode($dtrujukan[0],true);
			$code=$res['metaData']['code'];
			$pesan=$res['metaData']['message'];
			if ($code == 200 ){
				$responnya=trim($res["response"]); 
				$ss=stringDecrypt($responnya);
				$cc=decompress($ss);
				$isirujukan=json_encode(json_decode($cc,true));
				
				echo $isirujukan;

			} else {
				$output = [
					'stat' => false,
					'code' => $code,
					'message' => $message
				];
				// echo json_encode($output);  //kirim kembali ke pemanggil SEP IRJ
			}
	}

	public function lembarKlaim() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/bpjs/form/persetujuan/lembar_klaim";
			$data['menusamping'] = "menubpjs";
			$data['backhome'] = "tiga";
			$data['js'] = "pelayanan/bpjs/listbpjs";
			$data['css'] = "pelayanan/urj/listurj";
			$this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

	public function ambilruangrawat() {
		$data = $this->bpjsmodel->ruangrawat();
		$res=json_decode($data,true);
		$responnya=trim($res["response"]);
		$ss=stringDecrypt($responnya);
		$cc=decompress($ss);
		$ccdecode=json_decode($cc,true);
		// var_dump($ccdecode);
		$options = array();
		foreach ($ccdecode["list"] as $arrayForEach) {
				$o = [
					"id" => $arrayForEach["kode"],
					"text" => $arrayForEach["nama"]
				];
				array_push($options, $o);
		}
		echo json_encode(['items' => $options]);
	}

	public function ambilspesialistik() {
		$data = $this->bpjsmodel->spesialistik();
		$res=json_decode($data,true);
		$responnya=trim($res["response"]);
		$ss=stringDecrypt($responnya);
		$cc=decompress($ss);
		$ccdecode=json_decode($cc,true);
		// var_dump($ccdecode);
		$options = array();
		foreach ($ccdecode["list"] as $arrayForEach) {
				$o = [
					"id" => $arrayForEach["kode"],
					"text" => $arrayForEach["nama"]
				];
				array_push($options, $o);
		}
		echo json_encode(['items' => $options]);
	}

	public function ambilkelasrawat() {
		$data = $this->bpjsmodel->kelasrawat();
		$res=json_decode($data,true);
		$responnya=trim($res["response"]);
		$ss=stringDecrypt($responnya);
		$cc=decompress($ss);
		$ccdecode=json_decode($cc,true);
		// var_dump($ccdecode);
		$options = array();
		foreach ($ccdecode["list"] as $arrayForEach) {
				$o = [
					"id" => $arrayForEach["kode"],
					"text" => $arrayForEach["nama"]
				];
				array_push($options, $o);
		}
		echo json_encode(['items' => $options]);
	}

	public function ambilcarakeluar() {
		$data = $this->bpjsmodel->carakeluar();
		$res=json_decode($data,true);
		$responnya=trim($res["response"]);
		$ss=stringDecrypt($responnya);
		$cc=decompress($ss);
		$ccdecode=json_decode($cc,true);
		// var_dump($ccdecode);
		$options = array();
		foreach ($ccdecode["list"] as $arrayForEach) {
				$o = [
					"id" => $arrayForEach["kode"],
					"text" => $arrayForEach["nama"]
				];
				array_push($options, $o);
		}
		echo json_encode(['items' => $options]);
	}

	public function ambilpascapulang() {
		$data = $this->bpjsmodel->pascapulang();
		$res=json_decode($data,true);
		$responnya=trim($res["response"]);
		$ss=stringDecrypt($responnya);
		$cc=decompress($ss);
		$ccdecode=json_decode($cc,true);
		// var_dump($ccdecode);
		$options = array();
		foreach ($ccdecode["list"] as $arrayForEach) {
				$o = [
					"id" => $arrayForEach["kode"],
					"text" => $arrayForEach["nama"]
				];
				array_push($options, $o);
		}
		echo json_encode(['items' => $options]);
	}

	public function ambilprocedure() {
		// $param1 = $this->input->get("search", TRUE);
		$param1 = '21.05';
		$data = $this->bpjsmodel->refprocedure($param1);
		$res=json_decode($data,true);
		$responnya=trim($res["response"]);
		$ss=stringDecrypt($responnya);
		$cc=decompress($ss);
		$ccdecode=json_decode($cc,true);
		$options = array();
		foreach ($ccdecode["procedure"] as $arrayForEach) {
			// $i++;
			// var_dump($arrayForEach);
			$o = [
				"id" => $arrayForEach['kode'],
				"text" => $arrayForEach['nama']
			];
			// echo $i;
			array_push($options, $o);
		}
		echo json_encode(['items' => $options]);
	}

	public function jadwalpolispesialistik() {
		// $param1 = $this->input->get("search", TRUE);
		// $param1 = '1';
		$param1 = '2';
		// $param2 = '0001226512383'; 
		$param2 = '1806R0010623V000041'; 
		// $param3 = '2023-06-26';
		$data = $this->bpjsmodel->jadwalpolispesialistik($param1,$param2,$param3);
		$res=json_decode($data,true);
		$responnya=trim($res["response"]);
		$ss=stringDecrypt($responnya);
		$cc=decompress($ss);
		$ccdecode=json_decode($cc,true);
		// var_dump($ccdecode);
		$options = array();
		foreach ($ccdecode["list"] as $arrayForEach) {
			// $i++;
			// var_dump($arrayForEach);
			$o = [
				"id" => $arrayForEach['kodePoli'],
				"text" => $arrayForEach['namaPoli'],
				"kapasitas" => $arrayForEach['kapasitas'],
				"jmlRencanaKontroldanRujukan" => $arrayForEach['jmlRencanaKontroldanRujukan'],
				"persentase" => $arrayForEach['persentase']
			];
			// echo $i;
			array_push($options, $o);
		}
		echo json_encode(['items' => $options]);
	}

	public function cekjadwaldokter() {
		$param1 = $this->input->get("jeniskontrol", TRUE);
		$param2 = $this->input->get("txtkdpoli", TRUE);
		$param3 = $this->input->get("txttglsep", TRUE);

		// $param1 = '1';
		// $param2 = 'ORT';
		// $param3 = '2023-07-07';

		$data = $this->bpjsmodel->cekjadwaldokter($param1,$param2,$param3);

		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);

		$code=$res['metaData']['code'];
		$message=$res['metaData']['message'];

			$responnya=trim($res["response"]);
			$ss=stringDecrypt_SEP($responnya,$timestampSEP);
			$cc=decompress($ss);

		$ccdecode=json_decode($cc,true);
		$data["hasil"] = $ccdecode;
		$this->load->view('layanan/pelayanan/bpjs/form/tdjadwaldokter', $data);
	}

	public function cekjadwaldokter_tes() {
		// $param1 = $this->input->get("jeniskontrol", TRUE);
		// $param2 = $this->input->get("txtkdpoli", TRUE);
		// $param3 = $this->input->get("txttglsep", TRUE);

		$param1 = '1';
		$param2 = '2023-08-21';
		$param3 = 'INT';

		$data = $this->bpjsmodel->cekjadwaldokter($param1,$param2,$param3);

		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);

		$code=$res['metaData']['code'];
		$message=$res['metaData']['message'];

			$responnya=trim($res["response"]);
			$ss=stringDecrypt_SEP($responnya,$timestampSEP);
			$cc=decompress($ss);

		$ccdecode=json_decode($cc,true);
		var_dump($ccdecode);
		// $data["hasil"] = $ccdecode;

		// $this->load->view('layanan/pelayanan/bpjs/form/tdjadwaldokter', $data);
	}

	public function listsurkonspri() {
		$data['include'] = "layanan/pelayanan/bpjs/form/listsurkonspri";
		// $data['unit'] = $dtunit;
		$data['menusamping'] = "menuregistrasi";
		$data['backhome'] = "tiga";
		$data['js'] = "pelayanan/urj/listurj";
		$data['css'] = "pelayanan/urj/listurj";
		$this->load->view('templatesidebar/content', $data);
	}

	public function ceklistsurkonspri() {
		$param1 = $this->input->get("txtawal", TRUE);
		$param2 = $this->input->get("txtakhir", TRUE);
		$param3 = $this->input->get("filter", TRUE);

		$data = $this->bpjsmodel->ceklistsurkonspri($param1,$param2,$param3);

		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);

		$code=$res['metaData']['code'];
		$message=$res['metaData']['message'];

			$responnya=trim($res["response"]);
			$ss=stringDecrypt_SEP($responnya,$timestampSEP);
			$cc=decompress($ss);

		$ccdecode=json_decode($cc,true);
		$data["hasil"] = $ccdecode;
		$this->load->view('layanan/pelayanan/bpjs/form/tdlistsurkonspri', $data);
	}

	public function cekHistorySEP_tes() {
		$data = $this->bpjsmodel->cekHistorySEP();
		$res=json_decode($data,true);
		$responnya=trim($res["response"]);
		$ss=stringDecrypt($responnya);
		$cc=decompress($ss);
		$ccdecode=json_decode($cc,true);
		// var_dump($ccdecode);
		$options = array();
		foreach ($ccdecode["list"] as $arrayForEach) {
				$o = [
					"id" => $arrayForEach["kode"],
					"text" => $arrayForEach["nama"]
				];
				array_push($options, $o);
		}
		echo json_encode(['items' => $options]);
	}

	public function cekRencanaKontrol_tes() {
		$param1='07';
		$param2='2023';
		$param3='0000129515894';
		$param4='1';
		$data = $this->bpjsmodel->cekRencanaKontrol_tes($param1,$param2,$param3,$param4);
		// var_dump($data);
		$a=$data[1]; 
		$timestampSEP=$a['x-timestamp'];
		$res=json_decode($data[0],true);

		$code=$res['metaData']['code'];
		$message=$res['metaData']['message'];

			$responnya=trim($res["response"]);
			$ss=stringDecrypt_SEP($responnya,$timestampSEP);
			$cc=decompress($ss);

		$ccdecode=json_decode($cc,true);
		var_dump($ccdecode);
		$noSepAsalKontrol = $ccdecode["list"][0]["noSepAsalKontrol"];
		$jumlahArray = count($ccdecode["list"]);
		echo "<br>";
		echo $noSepAsalKontrol;
		echo "<br>";
		echo $jumlahArray;
	}
}

