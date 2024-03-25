<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ilaboratorium extends CI_Controller {

	public function index() {
		if ($this->session->userdata("login") == TRUE) {

			$data['include'] = "layanan/pelayanan/instalasi/laboratorium/dtlistlab";
			$data['menusamping'] = "menulab";
			$data['backhome'] = "inst";
			$data['js'] = "pelayanan/instalasi/listlab";
			$data['css'] = "pelayanan/instalasi/listlab";
			$this->load->model("ilab");
			$unitinstalasi = $this->ilab->unitinstalasi();
			$data["unitinstalasi"] = $unitinstalasi;
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function kirim_ke_lis(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://192.168.1.202:773/ws/",
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"content-type: application/json",
			"x-cid: 4301202030080005",
			"x-mod: auth",
			'x-secret: P@ssw0rd$luwuk',
			"x-user: SIMRS@pemprov"
		  ),
		));
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}
	}	

	public function kirim_order_ambiltoken(){

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://192.168.1.202:773/ws/",
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"content-type: application/json",
			"x-cid: 4301202030080005",
			"x-mod: auth",
			'x-secret: P@ssw0rd$pemprov',
			"x-user: SIMRS@pemprov"
		  ),
		));
		$datatoken = curl_exec($curl);
	}

	public function kirim_order(){
	// oleh datanya dulu
		$notransin=$this->input->get("notransin");
		$tokennya= $this->input->get("token");
		echo 'token: '.$tokennya.'  ';
		echo 'trx_in: '.$notransin.'  ';
		$this->load->model("Ilab");
		$dtorder_send = $this->Ilab->dataorder_lis($notransin);
		$no_rm = $dtorder_send[0]->no_rm;
		$notransaksi=$dtorder_send[0]->notransaksi;
		$dtregister=$this->Ilab->dataregister($notransaksi);
		if ($dtorder_send[0]->rujukan == "RI") {$st = 2;} else {$st = 1;}
		$kdruang= $dtorder_send[0]->kode_unitR;
		$idruang = $this->Ilab->dataruang($kdruang);
		$kddokter= $dtorder_send[0]->kode_dokter;
		$dokterpengirim=  $this->Ilab->datadokterpemesan($kddokter);	
		$kdpp= $dtorder_send[0]->kode_dokter_periksa;
		$dokterpk=  $this->Ilab->datadokterpemeriksa($kdpp);	
		$diag = $dtorder_send[0]->diagnosa;
		$ct = $dtorder_send[0]->cito;
		$no_lab = trim($dtorder_send[0]->no_lab);
		
		$golnya = $dtregister[0]->golongan;
		$dtkodelisgol=$this->Ilab->carikodegol($golnya);
		// $gol = "1";
		$gol = $dtkodelisgol[0]->idlis;  

		$status_pasien = $st;
        $ruangtext = $idruang[0]->idlis;
		$ruang=(int)$ruangtext;
        $dokter_pengirim = $dokterpengirim[0]->dokter_pengirim;
        $dokter_pk = $dokterpk[0]->dokter_pk;
        $bahasa = "id";
        $diagnosa = $diag;
        $cito = $ct;
        $golongan = (int)$gol;
	
		$dtpasien_send = $this->Ilab->datapasien_lis($no_rm);
		$no_rekam = $no_rm;
        $no_ref = $dtpasien_send[0]->no_ref;
        $no_bpjs = $dtpasien_send[0]->no_bpjs;
        $sebutan = $dtpasien_send[0]->sebutan;
        // $nama_pasien = "ORDER TEST-4(ABAIKAN)";
        $nama_pasien = $dtpasien_send[0]->nama_pasien;
		if ($dtpasien_send[0]->jenis_kelamin=="L") {$jk=0;} else {$jk=1;}
        $jenis_kelamin = $jk;
        $tgl_lahir = $dtpasien_send[0]->tgl_lahir;
		$birthDate = new DateTime($tgl_lahir);
		$today = new DateTime("today");
		$y = $today->diff($birthDate)->y;
		$m = $today->diff($birthDate)->m;
		$d = $today->diff($birthDate)->d;
        $jam = 0;
        $alamat = $dtpasien_send[0]->alamat;
        $telp = $dtpasien_send[0]->no_telp;
		$dtpemeriksaan= $this->Ilab->datapemeriksaan_lis($notransin);
 		
		$jab = count($dtpemeriksaan)-1;
		$isi=array();
		for ($a = 0; $a <= $jab; $a ++) {
			$angka=(int)$dtpemeriksaan[$a]->id_pemeriksaan;
			$isi[]=array("id_pemeriksaan" => $angka , "status" => "add" );
		}
			$data5 = [
			'data_pasien' => [
				"no_rekam"=> $no_rm,
				"no_ref"=> $no_ref,
				"no_bpjs"=>  $no_bpjs,
				"sebutan"=> $sebutan,
				"nama_pasien"=>  $nama_pasien,
				"jenis_kelamin"=>  $jenis_kelamin,
				"tgl_lahir"=>  $tgl_lahir,
				"y"=> $y,
				"m"=> $m,
				"d"=> $d,
				"jam"=> 0,
				"alamat"=> $alamat,
				"telp"=> $telp
			],
			"data_order"=> [
				"status_pasien"=> $status_pasien,
				"ruang"=> $ruang,
				"dokter_pengirim"=>  $dokter_pengirim,
				"dokter_pk"=>  $dokter_pk,
				"bahasa"=> "id",
				"diagnosa"=> $diag,
				"cito"=>  $cito ,
				"golongan"=> $golongan
			],
			"pemeriksaan"=> $isi
			,
			"no_lab"=> $no_lab
		];
		$data4=json_encode($data5);
		echo $data4;
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://192.168.1.202:773/ws/",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "$data4",
		CURLOPT_HTTPHEADER => array(
			
			"x-mod: order",
			"x-token: $tokennya"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		echo "cURL Error #:" . $err;
		} else {
		echo $response;
		
		$result=json_decode($response,true);
		$nolabnya=$result['no_lab'];
		echo 'nolab nya :'.$nolabnya;
		$simpan_nolab = $this->Ilab->simpan_nolab($notransin,$nolabnya);
		}
	}


	public function get_hasil(){
		$notransin=$this->input->get("notransin");
		$tokennya= $this->input->get("token");
		// echo 'token: '.$tokennya.'  ';
		// echo 'trx_in: '.$notransin.'  ';
		$this->load->model("Ilab");
		$dtnolab = $this->Ilab->carinolab($notransin);
		$no_lab = $dtnolab[0]->no_lab;
		$notransaksi = $dtnolab[0]->notransaksi;
		$no_rm= $dtnolab[0]->no_rm;
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "192.168.1.202:773/ws/",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"x-mod: get_hasil",
			"x-noo: $no_lab",
			"x-token: $tokennya"
			// "x-token: 3335454445413344463336414239373741384235433736453345383138334342"
		  ),
		));
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		//   echo $response;
		}

		//parsing
		$array = json_decode($response,true);
		$data=$array['pemeriksaan'];
		$dtsimpan=$this->Ilab->save_dari_lis($data,$notransin,$no_lab,$notransaksi,$no_rm);

		$dttdhasil = $this->Ilab->datahasilpemeriksaan_lis_next($no_lab);
		$data["hasil"] = $dttdhasil;
		$dt["stat"] = $dtsimpan;
		$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/laboratorium/tdlabhasilperiksa_lis', $data, TRUE);
		echo json_encode($dt);
	}


	public function panggiltambahlab() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("dokter");
			$dtdokterpengirim = $this->dokter->datadokterpemberi();
			// $dtdokterpemeriksa = $this->dokter->datadokterpemeriksa();
			$dtdokterpemeriksa = $this->dokter->datadokterpemeriksalab();
			$dtanalis = $this->dokter->dataanalis();
			$data["dtdokterpengirim"] = $dtdokterpengirim;
			$data["dtdokterpemeriksa"] = $dtdokterpemeriksa;
			$data["dtanalis"] = $dtanalis;
			$data["formpilih"] = 0;
			$this->load->view('layanan/pelayanan/instalasi/laboratorium/formtambahlab', $data);
		} else {
			redirect('login');
		}
	}

    public function panggileditlab() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("dokter");
            $this->load->model("ilab");
            $dtdokterpengirim = $this->dokter->datadokterpemberi();
			$dtdokterpemeriksa = $this->dokter->datadokterpemeriksa();
			$dtanalis = $this->dokter->dataanalis();
            $data["dtdokterpengirim"] = $dtdokterpengirim;
			$data["dtdokterpemeriksa"] = $dtdokterpemeriksa;
			$data["dtanalis"] = $dtanalis;
            $data["formpilih"] = 1;
            $data["dt"] = $this->ilab->ambiledit();
            $this->load->view('layanan/pelayanan/instalasi/laboratorium/formtambahlab', $data);
        } else {
            redirect('login');
        }
    }

	public function caridatalab() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ilab");
			$dtpasien = $this->ilab->datalab();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/instalasi/laboratorium/tddtlistlab', $data);
		} else {
			redirect('login');
		}
	}

	public function caridatarm() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ilab");
			$dtpasien = $this->ilab->pencarianrm();
			echo json_encode($dtpasien);
		} else {
			redirect('login');
		}
	}

	public function panggilformproseslab() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ilab");
			$dtproseslab = $this->ilab->dtproseslab();
			$datatindakaninstalasi = $this->ilab->datatindakaninstalasi();
			$databhpinstalasi = $this->ilab->databhpinstalasi();
			// $datahasilperiksa = $this->ilab->datahasilpemeriksaan();
			$datahasilperiksa = $this->ilab->datahasilpemeriksaan_lis();
			$dtjenislab = $this->ilab->masterlabjenis();
			$dtchecklab = $this->ilab->dtchecktindakan();
			$pilihantind='';
			foreach($dtchecklab as $row) {
				$pilihantind=$pilihantind.$row->tindakan.',';
			}
			
			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->ambildatatindakanlab();
			$dtsampel= $this->tindakan->fullsampel();
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			$data["dtobat"] = $dtobat;
			$data["dtproseslab"] = $dtproseslab;
			$data["datatindakaninstalasi"] = $datatindakaninstalasi;
			$data["databhpinstalasi"] = $databhpinstalasi;
			$data["datahasilperiksa"] = $datahasilperiksa;
			$data["dttindakan"] = $dttindakan;
			$data["dtpilihantind"] = $pilihantind;
			$data["dtobat"] = $dtobat;
			$data["dtjenislab"] = $dtjenislab;
			$data["dtsampel"] = $dtsampel;
			$this->load->view('layanan/pelayanan/instalasi/laboratorium/formproseslab', $data);
		} else {
			redirect('login');
		}
	}
		
	public function untukpilihanbihp() {
		$this->load->model("bhp");
		$data = $this->bhp->pilihbhpsatuan();
		echo json_encode($data);
	}

	public function untukpilihantindakan() {
		$this->load->model("tindakan");
		$data = $this->tindakan->pilihtindakansatuan();
		echo json_encode($data);
	}

	public function untukpilihansampel() {
		$this->load->model("tindakan");
		$data = $this->tindakan->fullsampel();
		echo json_encode($data);
	}

	public function simpanregisinstalasilab() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ilab");
			$dtnotrans = $this->ilab->ambilnotrans();
			$dtsimpan = $this->ilab->simpanlabbaru($dtnotrans);
			$dt["stat"] = $dtsimpan;
			$dt["dtnotrans"] = $dtnotrans[2];
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

    public function ubahregisinstalasilab() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("ilab");
            $dtsimpan = $this->ilab->ubahlab();
            $dt["stat"] = $dtsimpan;
            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

	// manajemen Form
	public function kelolaformtindakan() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->ambildatatindakanlab();
			
			$data["dttindakan"] = $dttindakan;
			$data["pilihform"] = 0;

			$this->load->view('layanan/pelayanan/instalasi/laboratorium/prosestindakan', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformtindakanedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("tindakan");
			//$dttindakan = $this->tindakan->ambildatatindakan(); 
			$dttindakan = $this->tindakan->ambildatatindakanlab(); //ambildatatindakanlab
			$dtsampel= $this->tindakan->fullsampel();
			$this->load->model("ilab");
			$ptind = $this->ilab->ambileditdatatindakan();
			
			$data["dttindakan"] = $dttindakan;
			$data["dtsampel"] = $dtsampel;

			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/instalasi/laboratorium/prosestindakan', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformbhp() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			
			$data["dtobat"] = $dtobat;
			$data["pilihform"] = 0;

			$this->load->view('layanan/pelayanan/instalasi/laboratorium/prosesbhp', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformbhpedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			$this->load->model("ilab");
			$ptind = $this->ilab->ambileditdatabhp();
			
			$data["dtobat"] = $dtobat;
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/instalasi/laboratorium/prosesbhp', $data);
		} else {
			redirect('login');
		}
	}
	//===========

	// proses lab
	
	public function layanantindakan_new() {
		if ($this->session->userdata("login") == TRUE) {
			$tindakannya = $this->input->get("hasil"); //array
			$labtgl = $this->input->get("labtgl");
			$notransin = $this->input->get("notransin");
			$notrans = $this->input->get("notrans");
			$rm = $this->input->get("nrm");
			// unit: unit,
			// kdunit: kdunit,
			// $rm = $this->input->post("nrm1");
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasi();
			$this->load->model("ilab");
			$ambilnotrans = $this->ilab->ambilnotrans();
			$dtsimpan = $this->ilab->simpantindakanlab_new($rm, $tindakannya, $notransin, $notrans, $labtgl);
			// $dtsimpanheader = $this->ilab->simpantindakanheader($rm, $tindakannya, $notransin, $notrans);
			
			$dttdtindakan = $this->ilab->datatindakanins();
			$data["hasil"] = $dttdtindakan;

			$dt1["stat"] = $dtsimpan;
			$dt1["dtview"] = $this->load->view('layanan/pelayanan/instalasi/laboratorium/tdlabtindakan', $data, TRUE);
			echo json_encode($dt1);

		} else {
			redirect('login');
		}
	}

	// public function layanantindakan() {
	// 	if ($this->session->userdata("login") == TRUE) {
	// 		$tdn = $this->input->post("tnd1"); //array
	// 		$labtgl = $this->input->post("labtgl1");
	// 		$rm = $this->input->post("nrm1");
	// 		$notransin = $this->input->post("notransin1");
	// 		$notrans = $this->input->post("notrans1");
	// 		$this->load->model("pasien");
	// 		$dtpasien = $this->pasien->ambildataregistrasi();
	// 		$this->load->model("ilab");
	// 		$ambilnotrans = $this->ilab->ambilnotrans();
	// 		$dtsimpan = $this->ilab->simpantindakanlabarray($rm, $tdn, $notransin, $notrans, $labtgl);
			
		
	// 		$dttdtindakan = $this->ilab->datatindakanins();
	// 		$data["hasil"] = $dttdtindakan;

	// 		// $dt["stat"] = $dtsimpan;
	// 		$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/laboratorium/tdlabtindakan', $data, TRUE);
	// 		// $this->load->view('layanan/pelayanan/instalasi/laboratorium/tdlabtindakan', $data, TRUE);

	// 		// echo json_encode($dt);
			
	// 	} else {
	// 		redirect('login');
	// 	}
	// }


	public function layanantindakanubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ilab");
			$dthargatindakan = $this->ilab->ambilhargatindakan();
			$dtsimpan = $this->ilab->ubahpelayanantindakan($dthargatindakan);
			$dttdtindakan = $this->ilab->datatindakanins();
			
			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->ambildatatindakanlab();
			$dtsampel = $this->tindakan->fullsampel();
			
			$dataform["dttindakan"] = $dttindakan;
			$dataform["dtsampel"] = $dtsampel;
			$dataform["pilihform"] = 0;

			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/laboratorium/tdlabtindakan', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/instalasi/laboratorium/prosestindakan', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanantindakanhapus_xxx() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ilab");
			$dtsimpan = $this->ilab->hapuspelayanantindakan();
			$dttdtindakan = $this->ilab->datatindakanins();
			$dtchecklab = $this->ilab->dtchecktindakan();
			$pilihantind='';
			foreach($dtchecklab as $row) {
				$pilihantind=$pilihantind.$row->tindakan.',';
			}
			
			$this->load->model("tindakan");
			$dttindakan2 = $this->tindakan->ambildatatindakanlab();
			$dataform["dttindakan"] = $dttindakan2;
			$dataform["dtpilihantind"] = $pilihantind;

			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/laboratorium/tdlabtindakan', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/instalasi/laboratorium/prosestindakan', $dataform, TRUE);

			

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanantindakanhapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ilab");
			$dtsimpan = $this->ilab->hapuspelayanantindakan();
			$dttdtindakan = $this->ilab->datatindakanins();
			
			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/laboratorium/tdlabtindakan', $data, TRUE);
			

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}
	public function layananbhp() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasi();

			$this->load->model("ilab");
			$dtsimpan = $this->ilab->simpanbhplab($dtpasien);
			
			$dttdbhp = $this->ilab->datamtdbhp();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/laboratorium/tdlabbhp', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananbhpubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ilab");
			$dtsimpan = $this->ilab->ubahpelayananbhp();
			$dttdbhp = $this->ilab->datamtdbhp();
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			
			$data["hasil"] = $dttdbhp;

			$dataform["dtobat"] = $dtobat;
			$dataform["pilihform"] = 0;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/laboratorium/tdlabbhp', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/instalasi/laboratorium/prosesbhp', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananbhphapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ilab");
			$dtsimpan = $this->ilab->hapuspelayananbhp();
			$dttdbhp = $this->ilab->datamtdbhp();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/laboratorium/tdlabbhp', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function carijenislab($id) {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("ilab");
            $datalab = $this->ilab->masterlabitem($id);
            $options = array();
            foreach ($datalab as $arrayForEach) {
                $options += array($arrayForEach->kode_labitem => $arrayForEach->nama_item);
            }
            echo json_encode($options);
        } else {
            redirect('login');
        }
	}

	public function kelolaformhasil() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ilab");
			$datahasilperiksa = $this->ilab->datahasilpemeriksaannext();
			$dtjenislab = $this->ilab->masterlabjenis();
			
			$data["datahasilperiksa"] = $datahasilperiksa;
			$data["dtjenislab"] = $dtjenislab;
			$data["pilihform"] = 0;

			$this->load->view('layanan/pelayanan/instalasi/laboratorium/proseshasilperiksa', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformhasiledit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ilab");
			$phasil = $this->ilab->ambileditdatahasil();
			$datahasilperiksa = $this->ilab->datahasilpemeriksaannext();
			$dtjenislab = $this->ilab->masterlabjenis();
			
			$data["datahasilperiksa"] = $datahasilperiksa;
			$data["dtjenislab"] = $dtjenislab;
			
			$data["pilihform"] = 1;
			$data["dataedit"] = $phasil;

			$this->load->view('layanan/pelayanan/instalasi/laboratorium/proseshasilperiksa', $data);
		} else {
			redirect('login');
		}
	}
	
	public function layananhasil() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasi();

			$this->load->model("ilab");
			$dtsimpan = $this->ilab->simpanhasillab($dtpasien);
			
			$dttdhasil = $this->ilab->datahasilpemeriksaannext();
			$data["hasil"] = $dttdhasil;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/laboratorium/tdlabhasilperiksa', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananhasilubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ilab");
			$dtsimpan = $this->ilab->ubahpelayananhasil();
			$dttdhasil = $this->ilab->datahasilpemeriksaannext();
			$dtjenislab = $this->ilab->masterlabjenis();
			
			$data["hasil"] = $dttdhasil;

			$dataform["dtjenislab"] = $dtjenislab;
			$dataform["pilihform"] = 0;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/laboratorium/tdlabhasilperiksa', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/instalasi/laboratorium/proseshasilperiksa', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananhasilhapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ilab");
			$dtsimpan = $this->ilab->hapuspelayananhasilperiksa();
			$dtperiksa = $this->ilab->datahasilpemeriksaannext();
			$data["hasil"] = $dtperiksa;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/laboratorium/tdlabhasilperiksa', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananhasilcetak_old($notransaksiin) {

	}
//ini masalah
	public function layananhasilcetakxxx($notransaksiin) {
		printf($notransaksiin);
		$r = date("Ymd");
		$this->load->model('ilab');
		$lunit=  array($this->ilab->datahasillabcetak($notransaksiin));
	
		// $g = [];
		// foreach($lunit as $row) {
		// 	$yk = $row->kode_unit;
		// 	$g[] = array (
		// 		"unit" => $y,
		// 		"data" => $this->lapinstalasi->datahasillabcetak($notransaksiin)
		// 	); 
		// }
		$data['lx'] =$lunit;
		 $this->load->view('laporan/laporaninstalasi/cetakhasillab', $data);
		// echo json_encode($g);
		// $this->load->library('pdf');
		// $this->pdf->setPaper('A4', 'potrait');
		// $this->pdf->filename = "hasillab".$r.".pdf";
		// $this->pdf->load_view('laporan/laporaninstalasi/cetakhasillab', $data);
		// $this->pdf->render();
		// $this->pdf->output();
	}
	///========

    public function layananhasilcetak($notransaksiin) {
        if ($this->session->userdata("login") == TRUE) {
            $r = date("Ymd");

            $data["notransaksiin"] = $notransaksiin;
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "cetakhasillab".$r.".pdf";
            $this->pdf->load_view('laporan/laporaninstalasi/cetakhasillab', $data);
            $this->pdf->render();
            $this->pdf->output();
            // $this->$canvas = $this->pdf->get_canvas();
            // $this->$font = Font_Metrics::get_font("helvetica", "bold");
            // $this->$canvas->page_text(16, 800, "Page: {PAGE_NUM} of {PAGE_COUNT}", $font, 8, array(0,0,0));
            // $this->pdf->stream("cetakpostingbilling.pdf",array("Attachment"=>0));
            
        } else {
            redirect('login');
        }
    }

	// Untuk Laporan
	public function laporanregister() {
		$this->load->model('ilab');
		$this->load->model('golongan');
		$this->load->model('unitrujukan');
		$data['unit'] = $this->ilab->unitinstalasi();
		$data['golongan'] = $this->golongan->full();
		$data['unitrujukan'] = $this->unitrujukan->ambilunitrujuk();
		$data['include'] = "laporan/laporaninstalasi";
		$data['menusamping'] = "menulab";
		$data['backhome'] = "inst";
		$data['kode'] = "Laboratorium";
		$data['tujuan'] = "ilaboratorium";
		$data['js'] = "laporan/laporaninstalasi/laporaninstalasi";
		$data['css'] = "laporan/datepickerselectdua";
		$this->load->view('templatesidebar/content', $data);
	}

	public function panggilcetak() {
		if($this->input->post("ctindakan") != null) {
			$this->tindakan();
		} else if($this->input->post("ctindakanexcel") != null) {
			$this->tindakanexcel();
		} else if($this->input->post("cetrekap") != null) {
			$this->rekap();
		} else if($this->input->post("cetrekapexcel") != null) {
			$this->rekapexcel();
		} else if($this->input->post("cetkunjung") != null) {
			$this->kunjung();
		} else if($this->input->post("cetkunjungexcel") != null) {
			$this->kunjungexcel();
		} else if($this->input->post("cetpemeriksa") != null) {
			$this->pemeriksa();
		} else if($this->input->post("cetpemeriksaexcel") != null) {
			$this->pemeriksaexcel();
		} else if($this->input->post("cetpengirim") != null) {
			$this->pengirim();
		} else if($this->input->post("cetpengirimexcel") != null) {
			$this->pengirimexcel();
		}
	}

	public function tindakan_old() {
		$r = date("Ymd");
		$this->load->model('lapinstalasi');
		$lunit = $this->lapinstalasi->ambilunittindakan();
		// echo json_encode($lunit);
		$g = [];
		foreach($lunit as $row) {
			$y = $row->unit;
			$yk = $row->kode_unit;
			$g[] = array (
				"unit" => $y,
				"data" => $this->lapinstalasi->ambiltindakan($yk)
			); 
		}
		$data['l'] = $g;
		// $this->load->library('pdf');
		// $this->pdf->setPaper('A4', 'landscape');
		// $this->pdf->filename = "laporantindakanrawatinap".$r.".pdf";
		$this->load->view('laporan/laporaninstalasi/laporandaftartindakan', $data);
		// $this->pdf->load_view('laporan/laporaninstalasi/laporandaftartindakan', $data);
		// $this->pdf->render();
		// $this->pdf->output();
	}

	public function tindakan() {
		$this->load->model('lapinstalasi');

			$yk = $this->input->post('unitpilih');;
			$y = $this->input->post('unit');;
			$g[] = array (
				"unit" => $y,
				"data" => $this->lapinstalasi->ambiltindakan($yk)
			); 
		
		$data['l'] = $g;
		// $this->load->library('pdf');
		// $this->pdf->setPaper('A4', 'landscape');
		// $this->pdf->filename = "laporantindakanrawatinap".$r.".pdf";
		$this->load->view('laporan/laporaninstalasi/laporandaftartindakan', $data);
		// $this->pdf->load_view('laporan/laporaninstalasi/laporandaftartindakan', $data);
		// $this->pdf->render();
		// $this->pdf->output();
	}

	public function tindakanexcel() {
		$this->load->model('lapinstalasi');
		$yk = $this->input->post('unitpilih');;
			$y = $this->input->post('unit');;
			$g[] = array (
				"unit" => $y,
				"data" => $this->lapinstalasi->ambiltindakan($yk)
			); 
		
		$data['l'] = $g;
		$this->load->view('laporan/laporaninstalasi/excel/laporandaftartindakan', $data);
	}
	
	public function rekap() {
		$r = date("Ymd");
		$this->load->model('lapinstalasi');
		$lunit = $this->lapinstalasi->ambilrekaptindakan();
		$g = [];
		foreach($lunit as $row) {
			$y = $row->kode_tindakan;
			$g[] = array (
				"tindakan" => $y,
				"data" => $this->lapinstalasi->ambilrekaptindakansum($y)
			); 
		}
		// echo json_encode($g);
		$data['l'] = $g;
		// $this->load->library('pdf');
		// $this->pdf->setPaper('A4', 'potrait');
		// $this->pdf->filename = "laporantindakanrawatinap".$r.".pdf";
		$this->load->view('laporan/laporaninstalasi/laporanrekapitulasitindakan', $data);
		// $this->pdf->load_view('laporan/laporaninstalasi/laporanrekapitulasitindakan', $data);
		// $this->pdf->render();
		// $this->pdf->output();
	}
	
	public function rekapexcel() {
		$this->load->model('lapinstalasi');
		$lunit = $this->lapinstalasi->ambilrekaptindakan();
		$g = [];
		foreach($lunit as $row) {
			$y = $row->kode_tindakan;
			$g[] = array (
				"tindakan" => $y,
				"data" => $this->lapinstalasi->ambilrekaptindakansum($y)
			); 
		}
		// echo json_encode($g);
		$data['l'] = $g;
		$this->load->view('laporan/laporaninstalasi/excel/laporanrekapitulasitindakan', $data);
	}

	public function kunjung() {
		$r = date("Ymd");
		$this->load->model('lapinstalasi');
		$lunit = $this->lapinstalasi->ambilrekapkunjungan();
		$g = [];
		foreach($lunit as $row) {
			$y = $row->golongan;
			$t = $this->lapinstalasi->ambilrekapkunjungansum($y);
			$g[] = array (
				"golongan" => $y,
				"data" => $t[0]->qty
			); 
		}
		// echo json_encode($g);
		$data['l'] = $g;
		$this->load->view('laporan/laporaninstalasi/laporanrekapitulasikunjungan', $data);
		// $this->load->library('pdf');
		// $this->pdf->setPaper('A4', 'potrait');
		// $this->pdf->filename = "laporantindakanrawatinap".$r.".pdf";
		// $this->pdf->load_view('laporan/laporaninstalasi/laporanrekapitulasikunjungan', $data);
		// $this->pdf->render();
		// $this->pdf->output();
	}
	
	public function kunjungexcel() {
		$this->load->model('lapinstalasi');
		$lunit = $this->lapinstalasi->ambilrekapkunjungan();
		$g = [];
		foreach($lunit as $row) {
			$y = $row->golongan;
			$t = $this->lapinstalasi->ambilrekapkunjungansum($y);
			$g[] = array (
				"golongan" => $y,
				"data" => $t[0]->qty
			); 
		}
		// echo json_encode($g);
		$data['l'] = $g;
		$this->load->view('laporan/laporaninstalasi/excel/laporanrekapitulasikunjungan', $data);
	}

	public function pemeriksa() {
		$r = date("Ymd");
		$this->load->model('lapinstalasi');
		$lunit = $this->lapinstalasi->ambilpemeriksa();
		// echo json_encode($lunit);
		$g = [];
		foreach($lunit as $row) {
			$y = $row->dokter;
			$yk = $row->kode;
			$g[] = array (
				"periksa" => $y,
				"data" => $this->lapinstalasi->ambilpemeriksafull($yk)
			); 
		}
		// echo json_encode($g);
		$data['l'] = $g;
		$this->pdf->view('laporan/laporaninstalasi/laporandokterpemeriksa', $data);
		// $this->load->library('pdf');
		// $this->pdf->setPaper('A4', 'potrait');
		// $this->pdf->filename = "laporantindakanrawatinap".$r.".pdf";
		// $this->pdf->load_view('laporan/laporaninstalasi/laporandokterpemeriksa', $data);
		// $this->pdf->render();
		// $this->pdf->output();
	}
	
	public function pemeriksaexcel() {
		$this->load->model('lapinstalasi');
		$lunit = $this->lapinstalasi->ambilpemeriksa();
		// echo json_encode($lunit);
		$g = [];
		foreach($lunit as $row) {
			$y = $row->dokter;
			$yk = $row->kode;
			$g[] = array (
				"periksa" => $y,
				"data" => $this->lapinstalasi->ambilpemeriksafull($yk)
			); 
		}
		// echo json_encode($g);
		$data['l'] = $g;
		$this->pdf->view('laporan/laporaninstalasi/laporandokterpemeriksa', $data);
	}

	public function pengirim() {
		$r = date("Ymd");
		$this->load->model('lapinstalasi');
		$lunit = $this->lapinstalasi->ambilpengirim();
		// echo json_encode($lunit);
		$g = [];
		foreach($lunit as $row) {
			$y = $row->dokter;
			$yk = $row->kode;
			$g[] = array (
				"kirim" => $y,
				"data" => $this->lapinstalasi->ambilpengirimfull($yk)
			); 
		}
		// echo json_encode($g);
		$data['l'] = $g;
		// $this->load->library('pdf');
		// $this->pdf->setPaper('A4', 'potrait');
		// $this->pdf->filename = "laporantindakanrawatinap".$r.".pdf";
		// $this->pdf->load_view('laporan/laporaninstalasi/laporandokterpengirim', $data);
		// $this->pdf->render();
		// $this->pdf->output();
		$this->pdf->view('laporan/laporaninstalasi/laporandokterpengirim', $data);

	}
	
	public function pengirimexcel() {
		$this->load->model('lapinstalasi');
		$lunit = $this->lapinstalasi->ambilpengirim();
		// echo json_encode($lunit);
		$g = [];
		foreach($lunit as $row) {
			$y = $row->dokter;
			$yk = $row->kode;
			$g[] = array (
				"kirim" => $y,
				"data" => $this->lapinstalasi->ambilpengirimfull($yk)
			); 
		}
		// echo json_encode($g);
		$data['l'] = $g;
		$this->pdf->view('laporan/laporaninstalasi/laporandokterpengirim', $data);
	}
	//=============

    public function hapusinstalasi() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("ilab");
            $dtsimpan = $this->ilab->hapusinstalasi();
            $dttdbhp = $this->ilab->datalabhapus();
            $data["hasil"] = $dttdbhp;

            $dt["stat"] = $dtsimpan;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/laboratorium/tddtlistlab', $data, TRUE);
            if ($dtsimpan == true) {
                $dt["info"] = "Data telah Terhapus";
            } else {
                $dt["info"] = "Tidak dapat mengahpus Data, Pasien telah diberi tindakan";
            }
            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }
	
}
