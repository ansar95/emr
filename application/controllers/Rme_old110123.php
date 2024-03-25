<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Rme extends CI_Controller {

	public function rme_new() {
		if ($this->session->userdata("login") == TRUE) {
			$idUser = $this->session->userdata("idx");
			$kodedokter = $this->session->userdata("kodedokter");
			$tglperiksa = date("Y-m-d");
			$this->load->model("rmmdl");
			$this->load->model("rmmdl");
			// Panggil metode model dengan parameter
			if  ($this->session->userdata("akses_rmefisio") == 1) {
				$data["dataPasienDokter"] = $this->rmmdl->cariPasienDokterFisio($tglperiksa);
				$data["dataPasienNext"] = $this->rmmdl->cariPasienDokterFisio_next($tglperiksa);
				$data["dataPasienRajalOld"] = $this->rmmdl->cariPasienRajalFisio_old($tglperiksa);
				$data["dataPasienRanap"] = $this->rmmdl->cariPasienRanap();
				$data["dataPasienRanapKonsul"] = $this->rmmdl->cariPasienRanapKonsul($kodedokter);
				$this->load->model("rmeigdmdl");
				$data["dataPasienDokter_igd"] = $this->rmeigdmdl->caripasienigd('IGDD');
				$data["dataPasienDokterObgyn"] = $this->rmeigdmdl->caripasienigd('IGDP');
				// $data["dataPasienOperasi"] = $this->rmeigdmdl->caripasienoperasi($tglperiksa);
			} else {
				$data["dataPasienDokter"] = $this->rmmdl->cariPasienDokter($kodedokter, $tglperiksa);
				$data["dataPasienNext"] = $this->rmmdl->cariPasienDokter_next($kodedokter, $tglperiksa);
				$data["dataPasienRajalOld"] = $this->rmmdl->cariPasienRajal_old($kodedokter, $tglperiksa);
				$data["dataPasienRanap"] = $this->rmmdl->cariPasienRanap();
				$data["dataPasienRanapKonsul"] = $this->rmmdl->cariPasienRanapKonsul($kodedokter);
				$this->load->model("rmeigdmdl");
				$data["dataPasienDokter_igd"] = $this->rmeigdmdl->caripasienigd('IGDD');
				$data["dataPasienDokterObgyn"] = $this->rmeigdmdl->caripasienigd('IGDP');
				// $data["dataPasienOperasi"] = $this->rmeigdmdl->caripasienoperasi($tglperiksa);
			}
			$data["kodedokternya"] = $kodedokter;

			$data['include'] = "layanan/pelayanan/urj/formdokter";
			$data['backhome'] = "dua";
			$data['js'] = "pelayanan/rme/listurjrme";
			$data['css'] = "pelayanan/rme/listurjrme";
			$data['kosong'] = 1;
	
			$this->load->view('templatesidebar/content_rme', $data);
		} else {
			redirect('login');
		}
	}

	public function rme_igd() {
		if ($this->session->userdata("login") == TRUE) {
			$idUser = $this->session->userdata("idx");
			$kodedokter = $this->session->userdata("kodedokter");
			$tglperiksa = date("Y-m-d");
			$this->load->model("rmeigdmdl");

			// Panggil metode model dengan parameter
			$data["dataPasienDokter"] = $this->rmeigdmdl->caripasienigd('IGDD');
			$data["dataPasienDokterObgyn"] = $this->rmeigdmdl->caripasienigd('IGDP');

			$data['include'] = "layanan/pelayanan/rmeigd/formdokter";
			$data['backhome'] = "dua";
			$data['js'] = "pelayanan/rme/listurjrme";
			$data['css'] = "pelayanan/rme/listurjrme";
			$data['kosong'] = 1;
	
			$this->load->view('templatesidebar/content_rme', $data);
		} else {
			redirect('login');
		}
	}

	public function rme_form_pasien() {
		if ($this->session->userdata("login") == TRUE) {
			// $kodePoli = $this->input->get('kodePoli');

			$id = $this->input->post('id');
			$notransaksi = $this->input->post('notransaksi');
			$nama_pasien = $this->input->post('nama');
			$no_rm = $this->input->post('no_rm');
			$kode_dokter = $this->input->post('kode_dokter');
			$angkatab = $this->input->post('angkatab');
			$editing = $this->input->post('editing');

			$this->load->model("rmemdl");
			// cek apakah apakah sudah ada recordnya, jika belum, buatkan
			$dtcek = $this->rmemdl->cek_asesmen_awal_rajal($no_rm,$notransaksi);

			// Lakukan operasi lain yang diperlukan dengan variabel ini
			// Contoh: Tampilkan variabel ke dalam view
			$data['id'] = $id;
			$data['notransaksi'] = $notransaksi;
			$data['nama_pasien'] = $nama_pasien;
			$this->load->model("rmmdl");
			$dataPasien = $this->rmmdl->cariDataPasienSesuaiID($id);
			$tglhistori=$dataPasien->tgl_masuk;
			$this->load->model("rmemdl");
			$filepasien=$this->rmemdl->datapasien($no_rm);

			$tgl_lahir = new DateTime($filepasien->tgl_lahir);
			$tgl_masuk = new DateTime($dataPasien->tgl_masuk);
			$selisih = $tgl_lahir->diff($tgl_masuk);

			$tahun = $selisih->y; // Umur dalam tahun
			$bulan = $selisih->m; // Umur dalam bulan
			$hari = $selisih->d; // Umur dalam hari

			
			$data['tgl_lahir'] = $filepasien->tgl_lahir;
			$data['umur'] = 'Umur : '.$tahun.' Tahun '.$bulan.' Bulan '.$hari.' Hari';
			

			$data['dataPasien'] = $dataPasien;
			$dtsoaphistory = $this->rmemdl->panggilhissoap($no_rm);
			// $dtassesmenhistory = $this->rmemdl->panggilhisassesmen($no_rm);
			$dtresepdetail = $this->rmemdl->panggilresepdetail($no_rm);
			$dttindakanlab = $this->rmemdl->tindakaninstalasi('LABS');
			$dttindakanrad = $this->rmemdl->tindakaninstalasi('RDGL');
			$dthasilinstalasiLAB = $this->rmemdl->panggilhisinstalasiLAB($no_rm);
			$dthasilinstalasiRAD = $this->rmemdl->panggilhisinstalasiRAD($no_rm);

			$dthistorydiagnosa = $this->rmemdl->panggilHistoryDiagnosa($no_rm);
			$dtlembarkonsul = $this->rmemdl->panggilHistoryKonsul($no_rm);

			$data['dtsoaphistory'] = $dtsoaphistory;
			// $data['dtassesmenhistory'] = $dtassesmenhistory;
			$data['dtresepdetail'] = $dtresepdetail;
			$data['dttindakanlab'] = $dttindakanlab;
			$data['dttindakanrad'] = $dttindakanrad;
			$data['dthasilinstalasiLAB'] = $dthasilinstalasiLAB;
			$data['dthasilinstalasiRAD'] = $dthasilinstalasiRAD;
			$data['dthistorydiagnosa'] = $dthistorydiagnosa;
			$data['dtlembarkonsul'] = $dtlembarkonsul;

			$data['angkatab'] = $angkatab;
			$data['editing'] = $editing;
			// $data['editing'] = 0;

			//panggil transaksi hari ini
			if ($editing == 1) {
				$dtresepdetail_hariini = $this->rmemdl->panggilresepdetail_hariini($no_rm,$kode_dokter);
				$dtlabdetail_hariini = $this->rmemdl->panggillabdetail_hariini($no_rm,$kode_dokter);
				$dtraddetail_hariini = $this->rmemdl->panggilraddetail_hariini($no_rm,$kode_dokter);
				$dtdiag_hariini = $this->rmemdl->panggilHistoryDiagnosa_hariini($no_rm);
			} else {
				$dtresepdetail_hariini = $this->rmemdl->panggilresepdetail_historitanggal($no_rm,$kode_dokter,$tglhistori);
				$dtlabdetail_hariini = $this->rmemdl->panggillabdetail_historitanggal($no_rm,$kode_dokter,$tglhistori);
				$dtraddetail_hariini = $this->rmemdl->panggilraddetail_historitanggal($no_rm,$kode_dokter,$tglhistori);
				$dtdiag_hariini = $this->rmemdl->panggilHistoryDiagnosa_historitanggal($no_rm,$tglhistori);
			}
			$data['dtresepdetail_hariini'] = $dtresepdetail_hariini;
			$data['dtlabdetail_hariini'] = $dtlabdetail_hariini;
			$data['dtraddetail_hariini'] = $dtraddetail_hariini;
			$data['dtdiag_hariini'] = $dtdiag_hariini;
			

			$dtmasterracikdokter = $this->rmemdl->panggilMasterRacikDokter($kode_dokter);
			$data['dtmasterracikdokter'] = $dtmasterracikdokter;
			$data['tglhistori'] = $tglhistori;
			
			
			$data['include'] = "layanan/pelayanan/rme/formpasien";
			$data['js'] = "pelayanan/rme/listurjrme";
			$data['css'] = "pelayanan/rme/listurjrme";
			$data['backhome'] = "dua";
			$this->load->view('templatesidebar/content_rme_noNav', $data);
		} else {
			redirect('login');
		}
	}


	public function index() {
		if ($this->session->userdata("login") == TRUE) {
			$idUser = $this->session->userdata("idx");
			if (ceksess("PIL", $idUser) == FALSE) {
				$this->load->model("unit");
				$dtunit = $this->unit->fullurj();
			} else {
				$this->load->model("unit");
				$dtunit = $this->unit->fullurj();
			}
			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->fullfilter("jalan");
			$this->load->model("unit");
			$dtkirimins = $this->unit->unitkiriminstalasi();
			$this->load->model("bhp");
            $data['dtobat'] = $this->bhp->obatdanbhporder();

            $this->load->model("apotik");
            $data['dtdosis'] = $this->apotik->ambildosis();

			$this->load->model("rmmdl");
			$data["diagnosa"] = $this->rmmdl->ambilicd();

			$data["dttindakan"] = $dttindakan;
			$data["dtkirimins"] = $dtkirimins;
			$data['include'] = "layanan/pelayanan/urj/formdokter_tes";
			$data['unit'] = $dtunit;

			$data['backhome'] = "dua";
			$data['js'] = "pelayanan/rme/listurjrme";
			$data['css'] = "pelayanan/rme/listurjrme";
			$data['kosong'] = 1;
			
			$this->load->view('templatesidebar/content_rme', $data);
		} else {
			redirect('login');
		}
	}

	public function caripasienurj() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtpasien = $this->urjmdl->carinamapasienurj();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/rme/tdlisturjrme', $data);
		} else {
			redirect('login');
		}
	}

	public function caripasienurjrme() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtpasien = $this->urjmdl->carinamapasienurj();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/urj/tdlisturj', $data);
		} else {
			redirect('login');
		}
	}

	public function caripasienurj_dokter() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtpasien = $this->urjmdl->carinamapasienurj();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/urj/tdlisturj_dokter', $data);
		} else {
			redirect('login');
		}
	}

	public function panggilurjdokterform() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("dokter");
			$dtdokter = $this->dokter->datadokterunit();
			$dtid = explode("_", $this->input->get("id"));
			$data["dtdokter"] = $dtdokter;
			$data["dtidp"] = $dtid[0];
			$data["dtkode"] = $dtid[1];
			$this->load->view('layanan/pelayanan/urj/formpilihdokter', $data);
		} else {
			redirect('login');
		}
	}

	public function simpandkterregis() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtubah = $this->urjmdl->gantidokter();
			$dtpasien = $this->urjmdl->carinamapasienurj();
			
			$data["hasil"] = $dtpasien;

			$dt["dtubah"] = $dtubah;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/urj/tdlisturj', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function panggilurjform() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtpasien = $this->urjmdl->pasiendata();
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$dtperawat = $this->dokter->dataperawat();
			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->fullfilter("jalan");
			$this->load->model("unit");
			$dtunit = $this->unit->untuktujuanperawatanregis("jalan");
			$dtkirimins = $this->unit->unitkiriminstalasi();
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			$this->load->model("datapulang");
			$carakeluar = $this->datapulang->ambilcarakeluar();
			$this->load->model("kondisi");
			$kondisikeluar = $this->kondisi->ambilkondisi();
			$kondisikeluarrm = $this->kondisi->ambilkondisirm();

			
			$this->load->model("urjmdl");
			$dttdtindakan = $this->urjmdl->datamtdtindakan();
			$dttdbhp = $this->urjmdl->datamtdbhp();
			$dttdobat = $this->urjmdl->datamtdobat();
			$dttdodua = $this->urjmdl->datamtdodua();


			// $dttdvisite = $this->urjmdl->datamtdvisite();
			$dttddarah = $this->urjmdl->datamtddarah();
			$dttdhistory = $this->urjmdl->datamtdhistory();
			$dttdinst = $this->urjmdl->datainst();
			$dtregis = $this->urjmdl->ambildatapindahlast();
			// $dtregis = $this->urjmdl->ambildatapindahlast();

            $tindakanlab = $this->urjmdl->tindakanlab();
            $tindakanrad = $this->urjmdl->tindakanrad();
            $tindakanhem = $this->urjmdl->tindakanhem();
            $tindakanopr = $this->urjmdl->tindakanopr();
            $tindakanbsr = $this->urjmdl->tindakanbsr();
			$daftarheader = $this->urjmdl->daftarheader();
			$ambildosis= $this->urjmdl->ambildosis();

			$this->load->model("tindakan");
            $dttindakanmasterlab = $this->tindakan->ambildatatindakanlab();

			$this->load->model("urjmdl");
			$dtchecklab = $this->urjmdl->dtchecktindakan();
			$pilihantind='';
			foreach($dtchecklab as $row) {
				$pilihantind=$pilihantind.$row->tindakan.',';
			}
			// $tindakanlab = $this->urjmdl->tindakanlab_header();
            // $tindakanrad = $this->urjmdl->tindakanrad_header();
            // $tindakanhem = $this->urjmdl->tindakanhem_header();
            // $tindakanopr = $this->urjmdl->tindakanopr_header();
			// $tindakanbsr = $this->urjmdl->tindakanbsr_header();
			
			$data["dtpasien"] = $dtpasien;
			$data["dtdokter"] = $dtdokter;
			$data["dttindakan"] = $dttindakan;
			$data["dtunit"] = $dtunit;
			$data["dtobat"] = $dtobat;

			
			$data["dttdtindakan"] = $dttdtindakan;
			$data["dttdbhp"] = $dttdbhp;
			$data["dttdobat"] = $dttdobat;
			$data["dttdodua"] = $dttdodua;
			// $data["dttdvisite"] = $dttdvisite;
			$data["dttddarah"] = $dttddarah;
			$data["dttdhistory"] = $dttdhistory;
			$data["carakeluar"] = $carakeluar;
			$data["kondisikeluar"] = $kondisikeluar;
			$data["kondisikeluarrm"] = $kondisikeluarrm;
			$data["dttdinst"] = $dttdinst;
			$data["dtkirimins"] = $dtkirimins;
			$data["pindah"] = $dtregis->pindah;
			$data["inap_to_poli"] = $dtregis->inap_to_poli;
			$data["dtperawat"] = $dtperawat;

            $data["tindakanlab"] = $tindakanlab;
            $data["tindakanrad"] = $tindakanrad;
            $data["tindakanhem"] = $tindakanhem;
            $data["tindakanopr"] = $tindakanopr;
            $data["tindakanbsr"] = $tindakanbsr;
			$data["daftarheader"] = $daftarheader;
			$data["ambildosis"] = $ambildosis;

			// $data["tindakanlab_header"] = $tindakanlab_header;
            // $data["tindakanrad_header"] = $tindakanrad_header;
            // $data["tindakanhem_header"] = $tindakanhem_header;
            // $data["tindakanopr_header"] = $tindakanopr_header;
			// $data["tindakanbsr_header"] = $tindakanbsr_header;
			$data["dttindakanlab"] = $dttindakanmasterlab;
			$data["dtpilihantind"] = $pilihantind;

			$this->load->model("rmmdl");
			$data["diagnosa"] = $this->rmmdl->ambilicd();
            $data["diagdata"] = $this->rmmdl->datadiagnosaread($dtpasien->notransaksi);
			
			$this->load->view('layanan/pelayanan/urj/formprosesurj', $data);
		} else {
			redirect('login');
		}
	}

	public function panggilurjform_dokter() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtpasien = $this->urjmdl->pasiendata();
			$dttdtindakan = $this->urjmdl->datamtdtindakan();
			$dttdinst = $this->urjmdl->datainst();
			$dttdobat = $this->urjmdl->datamtdobat();

			$dtlistresep = $this->urjmdl->dtlistresep($dtpasien->no_rm);
			$dttdinstlab = $this->urjmdl->datainst_lab($dtpasien->no_rm);
			$dttdinstrad = $this->urjmdl->datainst_rad($dtpasien->no_rm);

			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->fullfilter("jalan");

			$this->load->model("unit");
			// $dtunit = $this->unit->untuktujuanperawatanregis("jalan");
			$dtkirimins2 = $this->unit->unitkiriminstalasi();

			$no_rm=$dtpasien->no_rm;
			$this->load->model("rmemdl");
			$dtsoap = $this->rmemdl->panggilsoap();
			$dtsoaphistory = $this->rmemdl->panggilhissoap($no_rm);

			$this->load->model("rmmdl");
            $diagdata = $this->rmmdl->datadiagnosaread($dtsoap->notransaksi);
			
			$data["dtpasien"] = $dtpasien;
			$data["dtsoap"] = $dtsoap;
			$data["dtkirimins2"] = $dtkirimins2;
			$dt["dtsoaphistory"] = $dtsoaphistory;
			$data["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlisturjrme_soap', $dt, TRUE);
			$dt2["dttdtindakan"] = $dttdtindakan;
			$data["dtview2"] = $this->load->view('layanan/pelayanan/rme/mtdtindakanrme', $dt2, TRUE);

			$dt3["dttdinst"] = $dttdinst;
			$data["dtview3"] = $this->load->view('layanan/pelayanan/rme/mtdinstalasirme', $dt3, TRUE);

			$dt4["dttdinstlab"] = $dttdinstlab;
			$data["dtview4"] = $this->load->view('layanan/pelayanan/rme/mtdinstalasirme_lab', $dt4, TRUE);

			$dt5["dttdinstrad"] = $dttdinstrad;
			$data["dtview5"] = $this->load->view('layanan/pelayanan/rme/mtdinstalasirme_rad', $dt5, TRUE);


			$dt6["dttdobat"] = $dttdobat;
			$data["dtview6"] = $this->load->view('layanan/pelayanan/rme/mtdobatrme', $dt6, TRUE);


			$dt7["dtlistresep"] = $dtlistresep;
			$data["dtview7"] = $this->load->view('layanan/pelayanan/rme/mtdlistreseprme', $dt7, TRUE);

			$dt8["diagdata"] = $diagdata;
			$data["dtview8"] = $this->load->view('layanan/pelayanan/rme/mtddiagnosa_rme', $dt8, TRUE);

			echo json_encode($data);

		} else {
			redirect('login');
		}
	}

	public function isihistorysoappasien() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$dtpasien = $this->rmemdl->pasiendata_soaphis();
			$dtdetailsoaphistory = $this->rmemdl->panggilsoappasienhis();
			$data["dtpasien"] = $dtpasien;
			$data["dtdetailsoaphistory"] = $dtdetailsoaphistory;
			echo json_encode($data);

		} else {
			redirect('login');
		}
	}

	
	public function panggilurjform_dokter_old() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtpasien = $this->urjmdl->pasiendata();
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$dtperawat = $this->dokter->dataperawat();
			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->fullfilter("jalan");
			$this->load->model("unit");
			$dtunit = $this->unit->untuktujuanperawatanregis("jalan");
			$dtkirimins = $this->unit->unitkiriminstalasi();
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			$this->load->model("datapulang");
			$carakeluar = $this->datapulang->ambilcarakeluar();
			$this->load->model("kondisi");
			$kondisikeluar = $this->kondisi->ambilkondisi();
			$kondisikeluarrm = $this->kondisi->ambilkondisirm();

			
			$this->load->model("urjmdl");
			$dttdtindakan = $this->urjmdl->datamtdtindakan();
			$dttdbhp = $this->urjmdl->datamtdbhp();
			$dttdobat = $this->urjmdl->datamtdobat();
			$dttdodua = $this->urjmdl->datamtdodua();
			// $dttdvisite = $this->urjmdl->datamtdvisite();
			$dttddarah = $this->urjmdl->datamtddarah();
			$dttdhistory = $this->urjmdl->datamtdhistory();
			$dttdinst = $this->urjmdl->datainst();
			$dtregis = $this->urjmdl->ambildatapindahlast();
			$dtregis = $this->urjmdl->ambildatapindahlast();

            $tindakanlab = $this->urjmdl->tindakanlab();
            $tindakanrad = $this->urjmdl->tindakanrad();
            $tindakanhem = $this->urjmdl->tindakanhem();
            $tindakanopr = $this->urjmdl->tindakanopr();
            $tindakanbsr = $this->urjmdl->tindakanbsr();
			$daftarheader = $this->urjmdl->daftarheader();
			$ambildosis= $this->urjmdl->ambildosis();

			$this->load->model("tindakan");
            $dttindakanmasterlab = $this->tindakan->ambildatatindakanlab();

			$this->load->model("urjmdl");
			$dtchecklab = $this->urjmdl->dtchecktindakan();
			$pilihantind='';
			foreach($dtchecklab as $row) {
				$pilihantind=$pilihantind.$row->tindakan.',';
			}
			// $tindakanlab = $this->urjmdl->tindakanlab_header();
            // $tindakanrad = $this->urjmdl->tindakanrad_header();
            // $tindakanhem = $this->urjmdl->tindakanhem_header();
            // $tindakanopr = $this->urjmdl->tindakanopr_header();
			// $tindakanbsr = $this->urjmdl->tindakanbsr_header();
			
			$data["dtpasien"] = $dtpasien;
			$data["dtdokter"] = $dtdokter;
			$data["dttindakan"] = $dttindakan;
			$data["dtunit"] = $dtunit;
			$data["dtobat"] = $dtobat;

			
			$data["dttdtindakan"] = $dttdtindakan;
			$data["dttdbhp"] = $dttdbhp;
			$data["dttdobat"] = $dttdobat;
			$data["dttdodua"] = $dttdodua;
			// $data["dttdvisite"] = $dttdvisite;
			$data["dttddarah"] = $dttddarah;
			$data["dttdhistory"] = $dttdhistory;
			$data["carakeluar"] = $carakeluar;
			$data["kondisikeluar"] = $kondisikeluar;
			$data["kondisikeluarrm"] = $kondisikeluarrm;
			$data["dttdinst"] = $dttdinst;
			$data["dtkirimins"] = $dtkirimins;
			$data["pindah"] = $dtregis->pindah;
			$data["inap_to_poli"] = $dtregis->inap_to_poli;
			$data["dtperawat"] = $dtperawat;

            $data["tindakanlab"] = $tindakanlab;
            $data["tindakanrad"] = $tindakanrad;
            $data["tindakanhem"] = $tindakanhem;
            $data["tindakanopr"] = $tindakanopr;
            $data["tindakanbsr"] = $tindakanbsr;
			$data["daftarheader"] = $daftarheader;
			$data["ambildosis"] = $ambildosis;

			// $data["tindakanlab_header"] = $tindakanlab_header;
            // $data["tindakanrad_header"] = $tindakanrad_header;
            // $data["tindakanhem_header"] = $tindakanhem_header;
            // $data["tindakanopr_header"] = $tindakanopr_header;
			// $data["tindakanbsr_header"] = $tindakanbsr_header;
			$data["dttindakanlab"] = $dttindakanmasterlab;
			$data["dtpilihantind"] = $pilihantind;

			echo json_encode($data);
			// $this->load->view('layanan/pelayanan/urj/formprosesurj_dokter', $data);
		} else {
			redirect('login');
		}
	}

    public function untukpilihantindakan() {
        $this->load->model("tindakan");
        $data = $this->tindakan->pilihtindakansatuan();
        echo json_encode($data);
    }

	// manajemen Form
	public function kelolaformtindakan() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$dtperawat = $this->dokter->dataperawat();
			$this->load->model("tindakan");
            $dttindakan = $this->tindakan->fullfilter("jalan");
			
			$data["dtdokter"] = $dtdokter;
			$data["dttindakan"] = $dttindakan;
			$data["pilihform"] = 0;
			$data["dtperawat"] = $dtperawat;

			$this->load->view('layanan/pelayanan/urj/prosestindakan', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformtindakanedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$dtperawat = $this->dokter->dataperawat();
			$this->load->model("tindakan");
            $dttindakan = $this->tindakan->fullfilter("jalan");
			$this->load->model("urjmdl");
			$ptind = $this->urjmdl->ambileditdatatindakan();
			
			$data["dtdokter"] = $dtdokter;
			$data["dttindakan"] = $dttindakan;
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;
			$data["dtperawat"] = $dtperawat;

			$this->load->view('layanan/pelayanan/urj/prosestindakan', $data);
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

			$this->load->view('layanan/pelayanan/urj/prosesbhp', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformbhpedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			$this->load->model("urjmdl");
			$ptind = $this->urjmdl->ambileditdatabhp();
			
			$data["dtobat"] = $dtobat;
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/urj/prosesbhp', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformodua() {
		if ($this->session->userdata("login") == TRUE) {
			$data["pilihform"] = 0;

			$this->load->view('layanan/pelayanan/urj/prosesodua', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformoduaedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$ptind = $this->urjmdl->ambileditdataodua();
			
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/urj/prosesodua', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformdokter() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();

			$data["dtdokter"] = $dtdokter;
			$data["pilihform"] = 0;

			$this->load->view('layanan/pelayanan/urj/prosesdokter', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformdokteredit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$ptind = $this->urjmdl->ambileditdatadokter();
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$data["dtdokter"] = $dtdokter;
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/urj/prosesdokter', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformdarah() {
		if ($this->session->userdata("login") == TRUE) {
			$data["pilihform"] = 0;

			$this->load->view('layanan/pelayanan/urj/prosesdarah', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformdarahedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$ptind = $this->urjmdl->ambileditdatadarah();

			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/urj/prosesdarah', $data);
		} else {
			redirect('login');
		}
	}
	// ==============

	public function untukpilihanbihp() {
		$this->load->model("bhp");
		$data = $this->bhp->pilihbhpsatuan();
		echo json_encode($data);
	}

	// simpan data pelayanan
	public function layanantindakan() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasiforpoli();
			$this->load->model("urjmdl");
			$dthargatindakan = $this->urjmdl->ambilhargatindakan();
			$dtsimpan = $this->urjmdl->simpanpelayanantindakan($dtpasien, $dthargatindakan);

			$dttdtindakan = $this->urjmdl->datamtdtindakan();
			$data["dttdtindakan"] = $dttdtindakan;
			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/mtdtindakanrme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanantindakanubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dthargatindakan = $this->urjmdl->ambilhargatindakan();
			$dtsimpan = $this->urjmdl->ubahpelayanantindakan($dthargatindakan);
			$dttdtindakan = $this->urjmdl->datamtdtindakan();
			
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$dtperawat = $this->dokter->dataperawat();
			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->fullfilter("jalan");
			$dtpasien = $this->urjmdl->pasiendata();
			
			$dataform["dtdokter"] = $dtdokter;
			$dataform["dttindakan"] = $dttindakan;
			$dataform["pilihform"] = 0;
			$dataform["dtperawat"] = $dtperawat;
			$dataform["dtpasien"] = $dtpasien;

			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/urj/mtdtindakan', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/urj/prosestindakan', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}


	public function layananobat() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasiforpoli();

			$this->load->model("urjmdl");
			$dtsimpan = $this->urjmdl->simpanpelayananobat($dtpasien);
			$dttdobat = $this->urjmdl->datamtdobat();
			$data["hasil"] = $dttdobat;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/urj/mtdobat', $data, TRUE);
			// $dt["dtview"] = $this->load->view('layanan/pelayanan/urj/mtdbhp', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananbhp() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasiforpoli();

			$this->load->model("urjmdl");
			$dtsimpan = $this->urjmdl->simpanpelayananbhp($dtpasien);
			$dttdbhp = $this->urjmdl->datamtdbhp();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/urj/mtdbhp', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananbhpubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtsimpan = $this->urjmdl->ubahpelayananbhp();
			$dttdbhp = $this->urjmdl->datamtdbhp();
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			
			$data["hasil"] = $dttdbhp;

			$dataform["dtobat"] = $dtobat;
			$dataform["pilihform"] = 0;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/urj/mtdbhp', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/urj/prosesbhp', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananbhphapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtsimpan = $this->urjmdl->hapuspelayananbhp();
			$dttdbhp = $this->urjmdl->datamtdbhp();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/urj/mtdbhp', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananobathapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtsimpan = $this->urjmdl->hapuspelayananobat();
			$dttdobat = $this->urjmdl->datamtdobat();
			$data["hasil"] = $dttdobat;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/urj/mtdobat', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananodua() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasiforpoli();

			$this->load->model("urjmdl");
			$dtsimpan = $this->urjmdl->simpanpelayananodua($dtpasien);
			$dttdbhp = $this->urjmdl->datamtdodua();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/urj/mtdodua', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananoduaubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtsimpan = $this->urjmdl->ubahpelayananodua();
			$dttdbhp = $this->urjmdl->datamtdodua();
			
			$data["hasil"] = $dttdbhp;

			$dataform["pilihform"] = 0;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/urj/mtdodua', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/urj/prosesodua', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananoduahapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtsimpan = $this->urjmdl->hapuspelayananodua();
			$dttdbhp = $this->urjmdl->datamtdodua();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/urj/mtdodua', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanandarah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasiforpoli();

			$this->load->model("urjmdl");
			$dtsimpan = $this->urjmdl->simpanpelayanandarah($dtpasien);
			$dttdbhp = $this->urjmdl->datamtddarah();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/urj/mtdkantong', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanandarahubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtsimpan = $this->urjmdl->ubahpelayanandarah();
			$dttdbhp = $this->urjmdl->datamtddarah();
			
			$data["hasil"] = $dttdbhp;

			$dataform["pilihform"] = 0;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/urj/mtdkantong', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/urj/prosesdarah', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanandarahhapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtsimpan = $this->urjmdl->hapuspelayanandarah();
			$dttdbhp = $this->urjmdl->datamtddarah();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/urj/mtdkantong', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananpindahkamar() {
		if ($this->session->userdata("login") == TRUE) {
			// $this->load->model("pasien");
			// $dtpasien = $this->pasien->ambildataregistrasiforpoli();

			$this->load->model("urjmdl");
			$dtregis = $this->urjmdl->ambildatapindah();
			$dtsimpan = $this->urjmdl->simpanpindahkamar($dtregis);

			$dttdbhp = $this->urjmdl->datamtdhistory();
			$data["hasil"] = $dttdbhp;
			$data["pindah"] = $dtsimpan[1];
			$data["inap_to_poli"] = $dtregis->inap_to_poli;

			$dt["stat"] = $dtsimpan[0];
			$dt["dtview"] = $this->load->view('layanan/pelayanan/urj/mtdpindah', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}
	
	// untuk Laporan
	public function laporanregister() {
		$this->load->model('unit');
		$this->load->model('golongan');
		$data['unit'] = $this->unit->full();
		$data['golongan'] = $this->golongan->full();
		$data['menusamping'] = "menuurj";
		$data['backhome'] = "tiga";
		$data['include'] = "laporan/laporanregrawatjalan";
		$data['js'] = "laporan/laporanregrawatjalan/laporanharian";
		$data['addjs'] = "laporan/regrawatjalan";
		$data['css'] = "laporan/datepickerselectdua";
		$this->load->view('templatesidebar/content', $data);    
	}


	public function panggilcetak() {
		if($this->input->post("cet") != null) {
			$this->laporanharian();
		} else if($this->input->post("cete") != null) {
			$this->laporanharianecel();
		}
	}

	public function laporanharian() {
		$r = date("Ymd");
		$this->load->model('lapregrawatjalan');
		$lunit = $this->lapregrawatjalan->ambilunit();
		$g = [];
		foreach($lunit as $row) {
			$y = $row->unit;
			$g[] = array (
				"unit" => $y,
				"data" => $this->lapregrawatjalan->ambilgol($y)
			); 
		}
		$data['l'] = $g;
		
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporanregjalan".$r.".pdf";
		$this->load->view('laporan/laporanregrawatjalan/laporanharian', $data);
	}

	public function laporanharianecel() {
		$this->load->model('lapregrawatjalan');
		$lunit = $this->lapregrawatjalan->ambilunit();
		$g = [];
		foreach($lunit as $row) {
			$y = $row->unit;
			$g[] = array (
				"unit" => $y,
				"data" => $this->lapregrawatjalan->ambilgol($y)
			); 
		}
		$data['l'] = $g;
		$this->load->view('laporan/laporanregrawatjalan/excel/laporanharian', $data);
	}
	// =============
	
	public function simpankiriminstalasi() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("irad");
			$this->load->model("urjmdl");
			$dtnotrans = $this->irad->ambilnotrans();
			$dtsimpan = $this->urjmdl->simpaninstalasi($dtnotrans);
            $dttdbhp = $this->urjmdl->datainst();
            $data["dttdinst"] = $dttdbhp;

            $dt["stat"] = $dtsimpan;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/rme/mtdinstalasirme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

    public function hapuskiriminstalasi() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("urjmdl");
            $dtsimpan = $this->urjmdl->hapusinstalasi();
            $dttdbhp = $this->urjmdl->datainst();
            $data["hasil"] = $dttdbhp;

            $dt["stat"] = $dtsimpan;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/urj/mtdinstalasi', $data, TRUE);
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

	// tambahan untuk resep
	public function tambahobat() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("bhp");
			$this->load->model("apotik");
			$data['dtobat'] = $this->bhp->pilihobat();
			$data['dtdosis'] = $this->apotik->ambildosis();
			$data["formpilih"] = 0;
			$this->load->view('layanan/pelayanan/urj/formdetailresep', $data);
		} else {
			redirect('login');
		}
	}

// $this->load->model("Urjmdl");
// $dttdresep = $this->urjmdl->headerresep();

	// belum selesai disini simpan data ke database proses pembacaaan sdh ok mi tinggal simpan ke database baca file antrian_poli
	//tambahan untuk antrian  
	public function prosesantrian() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dt['dtantrian'] = $this->urjmdl->simpanantrian();
			$this->load->model("urjmdl");
			$dtpasien = $this->urjmdl->carinamapasienurj();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/rme/tdlisturjrme', $data);
		} else {
			redirect('login');
		}

	}

//kebutuhan isi tindakan instalasi
	public function tambahlab() {
		if ($this->session->userdata("login") == TRUE) {
			

			$this->load->model("aset");
			$this->load->model("satuan");
			$data['dtampra'] = $this->aset->full();
			$data['dtsatuan'] = $this->satuan->pilihsatuan();
			$data["tgl"] = '2022-01-01';
			$data["formpilih"] = 0;
			$this->load->view('layanan/pelayanan/urj/formtambahlab', $data);
		} else {
			redirect('login');
		}
	}


	//dari ilaboratorium
	public function panggilformlab() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("Urjmdl");
			$dtproseslab = $this->Urjmdl->dtproseslab_rj();
			$datatindakaninstalasi = $this->Urjmdl->datatindakaninstalasi();
			$dtjenislab = $this->Urjmdl->masterlabjenis();
			$dtchecklab = $this->Urjmdl->dtchecktindakanlab();
			$pilihantind='';
			foreach($dtchecklab as $row) {
				$pilihantind=$pilihantind.$row->tindakan.',';
			}
			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->ambildatatindakanlab();
			$dtsampel= $this->tindakan->fullsampel();
			$data["dtproseslab"] = $dtproseslab;
			$data["datatindakaninstalasi"] = $datatindakaninstalasi;
			$data["dttindakan"] = $dttindakan;
			$data["dtpilihantind"] = $pilihantind;
			// $data["dtobat"] = $dtobat;
			$data["dtjenislab"] = $dtjenislab;
			$data["dtsampel"] = $dtsampel;
			// $this->load->view('layanan/pelayanan/instalasi/laboratorium/formproseslab', $data);
			// $this->load->view('layanan/pelayanan/urj/formpilihdokter', $data);
			$this->load->view('layanan/pelayanan/urj/formtambahlab', $data);

		} else {
			redirect('login');
		}
	}

	public function simpanlab() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtsimpan = $this->urjmdl->simpantindakanlab();
			// echo json_encode($dtsimpan);
		} else {
			redirect('login');
		}
	}

	//dari ilaboratorium
	public function panggilformrad() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("Urjmdl");
			$dtproseslab = $this->Urjmdl->dtproseslab_rj();  //yg rad dianggap sama dengan lab
			$datatindakaninstalasi = $this->Urjmdl->datatindakaninstalasi();
			// $dtjenislab = $this->Urjmdl->masterlabjenis();
			$dtchecklab = $this->Urjmdl->dtchecktindakanlab();  
			$pilihantind='';
			foreach($dtchecklab as $row) {
				$pilihantind=$pilihantind.$row->tindakan.',';
			}
			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->ambildatatindakanrad();
			$dtsampel= $this->tindakan->fullsampel();
			$data["dtproseslab"] = $dtproseslab;
			$data["datatindakaninstalasi"] = $datatindakaninstalasi;
			$data["dttindakan"] = $dttindakan;
			$data["dtpilihantind"] = $pilihantind;
			// $data["dtobat"] = $dtobat;
			// $data["dtjenislab"] = $dtjenislab;
			$data["dtsampel"] = $dtsampel;
			// $this->load->view('layanan/pelayanan/instalasi/laboratorium/formproseslab', $data);
			// $this->load->view('layanan/pelayanan/urj/formpilihdokter', $data);
			$this->load->view('layanan/pelayanan/urj/formtambahrad', $data);

		} else {
			redirect('login');
		}
	}

	public function simpanrad() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtsimpan = $this->urjmdl->simpantindakanrad();
			// echo json_encode($dtsimpan);
		} else {
			redirect('login');
		}
	}

	public function berkassampaipoli() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dt['dtantrian'] = $this->urjmdl->berkastibadipoli();
			$this->load->model("urjmdl");
			$dtpasien = $this->urjmdl->carinamapasienurj();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/urj/tdlisturj', $data);
		} else {
			redirect('login');
		}

	}

	public function berkaskembalikerm() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dt['dtantrian'] = $this->urjmdl->berkastibadirm();
			$this->load->model("urjmdl");
			$dtpasien = $this->urjmdl->carinamapasienurj();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/urj/tdlisturj', $data);
		} else {
			redirect('login');
		}

	}

	//SOAP
	public function panggilsoap() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtpasien = $this->urjmdl->pasiendata();
			$dtsoap = $this->urjmdl->datamtdsoap();
			
			// $dts=$this->urjmdl->ambildatasoap();
			// $dtdiag = $this->urjmdl->ambildiagpasien($dts->notransaksi);

			$dtdiag = null;
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			
			$data["dtpasien"] = $dtpasien;
			$data["dtsoap"] = $dtsoap;
			$data["dtdiagsoap"] = $dtdiag;
			// $data["diagnosa"] = $dtdiagnosa;
			
			$this->load->view('layanan/pelayanan/urj/formsoap', $data);
		} else {
			redirect('login');
		}
	}

	public function panggildatasoap() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtsoap = $this->urjmdl->ambildatasoap();
			echo json_encode($dtsoap);
		} else {
			redirect('login');
		}
	}

	public function panggildiagnosa() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			// $data['$dtdiagsoap'] = $this->urjmdl->ambildatadiagsoap();
			$dtdiagsoap = $this->urjmdl->ambildatadiagsoap();
			echo json_encode($dtdiagsoap);
			// $this->load->view('layanan/pelayanan/urj/formsoap', $data);

		} else {
			redirect('login');
		}
	}	

	public function dokterPoli()
	{
		$this->load->model("dokter");
		$kodePoli = $this->input->get('kodePoli');
		$result = $this->dokter->dokterPoli($kodePoli);
		echo json_encode($result);
	}

	public function cekdiagnosanya() {
        $this->load->model("urjmdl");
        $data = $this->urjmdl->cekdiagnosaada();
        echo json_encode($data);
    }

	public function layanantindakanhapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtsimpan = $this->urjmdl->hapuspelayanantindakan();
			$dttdtindakan = $this->urjmdl->datamtdtindakan();
			$data["dttdtindakan"] = $dttdtindakan;
			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/mtdtindakanrme', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}
	
	public function cetaklistresep($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");

			$data["noresep"] = $id;
			$this->load->library('pdf');
			$this->pdf->setPaper('A4', 'potrait');
			$this->pdf->filename = "cetakhasillab".$r.".pdf";
			$this->pdf->load_view('layanan/pelayanan/rme/cetakresep_rme', $data);
			$this->pdf->render();
			$this->pdf->output();
		} else {
			redirect('login');
		}
	}



	public function save_image_fisio_old() {

		if (isset($_POST['image'])) {
			$dataURL = $_POST['image'];
			$fileName = 'image/png//hasil.png'; // Ganti dengan path dan nama file yang diinginkan

			// Menghapus awalan "data:image/png;base64," dari data URL
			$dataURL = str_replace('data:image/png;base64,', '', $dataURL);

			// Mengkonversi string base64 menjadi data biner gambar
			$imageData = base64_decode($dataURL);

			// Menyimpan gambar ke folder tertentu
			file_put_contents($fileName, $imageData);

			echo $fileName; // Mengembalikan path file yang berhasil disimpan
		}

	}

	public function save_image_fisio(){
        if ($this->input->post('image')) {
            $dataURL = $this->input->post('image');
			$fileName = '<?php echo site_url();?>/../assets/image/fisio/hasil_awal.png'; // Ganti dengan path dan nama file gambar latar belakang


            // Menghapus awalan "data:image/png;base64," dari data URL
            $dataURL = str_replace('data:image/png;base64,', '', $dataURL);



            // Mengkonversi string base64 menjadi data biner gambar
            $imageData = base64_decode($dataURL);

            // Menyimpan gambar ke folder tertentu
            file_put_contents($fileName, $imageData);

            echo $fileName; // Mengembalikan path file yang berhasil disimpan
        } else {
            echo "Tidak ada data gambar yang diterima.";
        }
    }

	public function copy_file()
    {
        $sourceFile = 'assets/image/hasil_awal.png';
        $destinationFolder = 'assets/image/fisio/';
        $newFileName = 'RM789876.png';

        // Mengcopy file ke folder tujuan dengan nama file baru
        if (copy($sourceFile, $destinationFolder . $newFileName)) {
            echo "File berhasil disalin ke folder fisio dengan nama baru: " . $newFileName;
        } else {
            echo "Gagal menyalin file.";
        }
    }
	
	public function simpandataassesmen() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtsoap = $this->urjmdl->savedataassesmen();
			// $dtpasien = $this->urjmdl->pasiendata();
			// $data["dtpasien"] = $dtpasien;
			// $data["dtsoap"] = $dtsoap;
			
			// $this->load->view('layanan/pelayanan/urj/formsoap', $data);
		} else {
			redirect('login');
		}
	}

	public function cariAssesmenAwal() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmmdl");
			$dtsoap = $this->rmemdl->cariAssesmenAwal();
		} else {
			redirect('login');
		}
	}

	public function panggilSoapDokter() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$dtsoap = $this->rmemdl->dataSoapPerId();
			$data["dtsoap"] = $dtsoap;
			$this->load->view('layanan/pelayanan/rme/formsoap', $data);
		} else {
			redirect('login');
		}
	}

	public function panggilAssesmen() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$dtsoap = $this->rmemdl->dataAssesmenPerId();
			$data["dtsoap"] = $dtsoap;
			$this->load->view('layanan/pelayanan/rme/formAssesmen', $data);
		} else {
			redirect('login');
		}
	}

	public function pilihObatId() {
		$id = $this->input->get('id');
		$kode_obat = $this->input->get('kode_obat');
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$nama_dokter = $this->input->get('nama_dokter');

		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$saveObatID = $this->rmemdl->saveObatId();

			//panggil data resep hari ini
			$detailResepHariIni = $this->rmemdl->panggilresepdetail_hariini($no_rm,$kode_dokter);
			$data['dtresepdetail_hariini']=$detailResepHariIni;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistresep_rme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}
	
	public function panggilFormObat() {
		if ($this->session->userdata("login") == TRUE) {
			$id = $this->input->get('id');
			$this->load->model("rmemdl");
			$dtDetailObat = $this->rmemdl->ambilDataObat($id);
			$data["dtDetailObat"] = $dtDetailObat;
			$this->load->model("apotik");
            $data['dttakaran'] = $this->apotik->pilihtakaran();
			$data['dtcaramkn'] = $this->apotik->pilihcaramakan();
			$this->load->view('layanan/pelayanan/rme/formObatId', $data);
		} else {
			redirect('login');
		}
	}

	public function editObatRme() {
			$no_rm = $this->input->get('no_rm');
			$kode_dokter = $this->input->get('kode_dokter');
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmemdl");
            $dtresep = $this->rmemdl->ubahresep($this->input->get('id'));
			//ambil kembali data resep
			$detailResepHariIni = $this->rmemdl->panggilresepdetail_hariini($no_rm,$kode_dokter);
			$data['dtresepdetail_hariini']=$detailResepHariIni;

			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistresep_rme', $data, TRUE);
			echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

	public function hapusObatRme() {
			$no_rm = $this->input->get('no_rm');
			$kode_dokter = $this->input->get('kode_dokter');
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$dtresep = $this->rmemdl->hapusdetailresep($this->input->get('id'));
			//ambil kembali data resep
			$detailResepHariIni = $this->rmemdl->panggilresepdetail_hariini($no_rm,$kode_dokter);
			$data['dtresepdetail_hariini']=$detailResepHariIni;

			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistresep_rme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function hapusLabRme() {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$dtlab = $this->rmemdl->hapusdetaillab($this->input->get('id'));
			//ambil kembali data lab

			
			$dtlabdetail_hariini = $this->rmemdl->panggillabdetail_hariini($no_rm,$kode_dokter);
			$data['dtlabdetail_hariini'] = $dtlabdetail_hariini;

			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistlab_rme', $data, TRUE);
			echo json_encode($dt);
			
		} else {
			redirect('login');
		}
	}

	public function hapusDiagRme() {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$tgl_masuk = $this->input->get('tgl_masuk');
		$tglhistori = $this->input->get('tgl_masuk');
		$tglHariIni=date("Y-m-d");
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$dtlab = $this->rmemdl->hapusdetailDiag($this->input->get('id'));
			if ($tgl_masuk === $tglHariIni) {
				$dtdiag_hariini = $this->rmemdl->panggilHistoryDiagnosa_hariini($no_rm);
			} else {
				$dtdiag_hariini = $this->rmemdl->panggilHistoryDiagnosa_historitanggal($no_rm,$tglhistori);
			}	

			$data['dtdiag_hariini'] = $dtdiag_hariini;

			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistdiag_rme', $data, TRUE);
			echo json_encode($dt);
			
		} else {
			redirect('login');
		}
	}


	public function hapusRadRme() {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$dtlab = $this->rmemdl->hapusdetailrad($this->input->get('id'));
			//ambil kembali data lab

			
			$dtraddetail_hariini = $this->rmemdl->panggilraddetail_hariini($no_rm,$kode_dokter);
			$data['dtraddetail_hariini'] = $dtraddetail_hariini;

			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistrad_rme', $data, TRUE);
			echo json_encode($dt);
			
		} else {
			redirect('login');
		}
	}

	public function tambahOrderObat() { //obat baru yg sebelumnya tdk ada di histori resep pasien
		if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmemdl");
            $data['dtobat'] = $this->rmemdl->obatdanbhporder();
			$data['dttakaran'] = $this->rmemdl->pilihtakaran();
			$data['dtcaramkn'] = $this->rmemdl->pilihcaramakan();
			$this->load->view('layanan/pelayanan/rme/formTambahObatId', $data);
		} else {
			redirect('login');
		}
	}

	public function tambahOrderObat_ranap() { //obat baru yg sebelumnya tdk ada di histori resep pasien
		if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmemdl");
            $data['dtobat'] = $this->rmemdl->obatdanbhporder();
			$data['dttakaran'] = $this->rmemdl->pilihtakaran();
			$data['dtcaramkn'] = $this->rmemdl->pilihcaramakan();
			$data['noresep'] = $this->input->get('noresep');
			$this->load->view('layanan/pelayanan/rme/formTambahObatId_ranap', $data);
		} else {
			redirect('login');
		}
	}
	public function tambahOrderRacikan() { //obat racikan
		if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmemdl");
            $data['dtobat'] = $this->rmemdl->racikanOrder();
			$data['dttakaran'] = $this->rmemdl->pilihtakaran();
			$data['dtcaramkn'] = $this->rmemdl->pilihcaramakan();
			$this->load->view('layanan/pelayanan/rme/formTambahRacikanId', $data);
		} else {
			redirect('login');
		}
	}

	public function tambahOrderObatHeader() { //obat baru yg sebelumnya tdk ada di histori resep pasien
		if ($this->session->userdata("login") == TRUE) {
            $this->load->model("dokter");
            $data['dtDPJP'] = $this->dokter->datadokter();
            $data['kode_dokter_cek'] = $this->input->get('kode_dokter');
            $data['notransaksi'] = $this->input->get('notransaksi');
            $data['kode_unit'] = $this->input->get('kode_unit');
			$this->load->view('layanan/pelayanan/rme/formOrderResep', $data);
		} else {
			redirect('login');
		}
	}

	public function tambahOrderDiag() { 
		if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmemdl");
            $data['dtdiagnosa'] = $this->rmemdl->dataIcdX();
			$this->load->view('layanan/pelayanan/rme/formTambahDiagId', $data);
		} else {
			redirect('login');
		}
	}

	public function tambahOrderDiagranap() { 
		if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmemdl");
            $data['dtdiagnosa'] = $this->rmemdl->dataIcdX();
			$this->load->view('layanan/pelayanan/rme/formTambahDiagIdranap', $data);
		} else {
			redirect('login');
		}
	}

	public function saveObatRme() {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$dtresep = $this->rmemdl->simpanDetailResepbaru();
			//ambil kembali data resep
			$detailResepHariIni = $this->rmemdl->panggilresepdetail_hariini($no_rm,$kode_dokter);
			$data['dtresepdetail_hariini']=$detailResepHariIni;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistresep_rme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function saveObatRme_ranap() {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$notransaksi = $this->input->get('notransaksi');
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$dtresep = $this->rmemdl->simpanDetailResepbaru_ranap();
			//ambil kembali data resep
			$dtresepheader_hariini = $this->rmemdl->panggilresepheader_hariini_ranap($no_rm,$notransaksi);
			$data['dtresepheader_hariini']=$dtresepheader_hariini;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistresep_rme_ranap', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function saveDiagnosa() {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$icd_code = $this->input->get('icd_code');
		$tgl_masuk = $this->input->get('tgl_masuk');
		$tglhistori = $this->input->get('tgl_masuk');
		$tglHariIni=date("Y-m-d");
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$dtresep = $this->rmemdl->simpanDiagnosainput();
			if ($tgl_masuk == $tglHariIni) {
				$dtdiag_hariini = $this->rmemdl->panggilHistoryDiagnosa_hariini($no_rm);
			} else {
				$dtdiag_hariini = $this->rmemdl->panggilHistoryDiagnosa_historitanggal($no_rm,$tglhistori);
			}	
			$data['dtdiag_hariini'] = $dtdiag_hariini;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistdiag_rme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function saveDiagnosaranap() {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$icd_code = $this->input->get('icd_code');
		$tgl_masuk = $this->input->get('tgl_masuk');
		$tglhistori = $this->input->get('tgl_masuk');
		$notransaksi = $this->input->get('notransaksi');
		$tglHariIni=date("Y-m-d");
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$dtresep = $this->rmemdl->simpanDiagnosainput();
			// if ($tgl_masuk == $tglHariIni) {
				$dtdiag_hariini = $this->rmemdl->panggilHistoryDiagnosa_ranap($no_rm,$notransaksi);
			// } else {
				// $dtdiag_hariini = $this->rmemdl->panggilHistoryDiagnosa_historitanggal($no_rm,$tglhistori);
			// }	
			$data['dtdiag_hariini'] = $dtdiag_hariini;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistdiag_rme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function simpandatasoap() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtsoap = $this->urjmdl->savedatasoap();
			$this->load->model("rmemdl");
			$no_rm=$this->input->get('no_rm');
			$dtsoaphistory = $this->rmemdl->panggilhissoap($no_rm);
			$data['dtsoaphistory']=$dtsoaphistory;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistsoap_rme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function pilihLabId() {
		$id = $this->input->get('id');
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$kd='LABS';
		$nm='LABORATORIUM';
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$saveObatID = $this->rmemdl->saveLabId($kd,$nm);
			// panggil data resep hari ini

			$dtlabdetail_hariini = $this->rmemdl->panggillabdetail_hariini($no_rm,$kode_dokter);
			$data['dtlabdetail_hariini'] = $dtlabdetail_hariini;

			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistlab_rme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	
	public function panggilFormLabRme() {
		if ($this->session->userdata("login") == TRUE) {
			$id = $this->input->get('id');
			$this->load->model("rmemdl");
			$dtDetailLab = $this->rmemdl->ambilDataOrderLab($id);
			$data['dtDetailLab'] = $dtDetailLab;
			$this->load->view('layanan/pelayanan/rme/formLabId', $data);
		} else {
			redirect('login');
		}
	}

	public function panggilFormDiagRme() {
		if ($this->session->userdata("login") == TRUE) {
			$id = $this->input->get('id');
			$this->load->model("rmemdl");
			$dtDetailDiad = $this->rmemdl->ambilDataOrderDiagId($id);
			$data['dtDetailDiad'] = $dtDetailDiad;
			$this->load->view('layanan/pelayanan/rme/formDiagId', $data);
		} else {
			redirect('login');
		}
	}

	public function pilihRadId() {
		$id = $this->input->get('id');
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$kd='RDGL';
		$nm='RADIOLOGI';
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$saveObatID = $this->rmemdl->saveLabId($kd,$nm); //ini sudah di gabung save labID dan radId
			// panggil data resep hari ini

			$dtraddetail_hariini = $this->rmemdl->panggilraddetail_hariini($no_rm,$kode_dokter);
			$data['dtraddetail_hariini'] = $dtraddetail_hariini;

			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistrad_rme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function panggilFormRadRme() {
		if ($this->session->userdata("login") == TRUE) {
			$id = $this->input->get('id');
			$this->load->model("rmemdl");
			$dtDetailRad = $this->rmemdl->ambilDataOrderRad($id);
			$data['dtDetailRad'] = $dtDetailRad;
			$this->load->view('layanan/pelayanan/rme/formRadId', $data);
		} else {
			redirect('login');
		}
	}

	public function pilihDiagId() {
		$id = $this->input->get('id');
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$saveObatID = $this->rmemdl->saveDiagId($id); //ini sudah di gabung save labID dan radId
			// panggil data resep hari ini

			$dtdiag_hariini = $this->rmemdl->panggilHistoryDiagnosa_hariini($no_rm);
			$data['dtdiag_hariini'] = $dtdiag_hariini;

			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistdiag_rme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}


	public function pilihDiagIdranap() {
		$id = $this->input->get('id');
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$notransaksi = $this->input->get('notransaksi');
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$saveObatID = $this->rmemdl->saveDiagIdranap($id); //ini sudah di gabung save labID dan radId
			// panggil data resep hari ini

			$dtdiag_hariini = $this->rmemdl->panggilHistoryDiagnosa_ranap($no_rm,$notransaksi);
			$data['dtdiag_hariini'] = $dtdiag_hariini;

			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistdiag_rme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function obatcari() {
        $this->load->model("rmemdl");
        $dt["dtapotik"] = $this->rmemdl->untukapotik();
        echo json_encode($dt);
    }

	public function racikancari() {
        $this->load->model("rmemdl");
        $dt["dtapotik"] = $this->rmemdl->untukracikan();
        echo json_encode($dt);
    }

	public function tambahMasterRacikan() {
		if ($this->session->userdata("login") == TRUE) {
			// $id = $this->input->get('id');
			
			$kode_dokter=$this->input->get("kode_dokter");
			
			$this->load->model("rmemdl");
			$dtmasterobat = $this->rmemdl->ambilDataMasterObat();
			$dtsatuan = $this->rmemdl->pilihsatuan();
			$data['dtmasterobat'] = $dtmasterobat;
			$data['dtsatuan'] = $dtsatuan;
			$data['kode_dokter'] = $kode_dokter;
			$this->load->view('layanan/pelayanan/rme/formTambahMasterRacikan', $data);
		} else {
			redirect('login');
		}
	}
	
	public function saveDetailRacikan() {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$koderacikan = $this->input->get('koderacikan');
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$dtresep = $this->rmemdl->simpanDetailRacikbaru();
			//ambil kembali data racikannya
			$dtracikandokter_perkode = $this->rmemdl->panggilracikan_perkode($kode_dokter,$koderacikan);
			$data['dtracikandokter_perkode']=$dtracikandokter_perkode;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistracik_rme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function panggilMasterRacikDokter() {
		$kode_dokter = $this->input->get('kode_dokter');
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			//ambil kembali data racikannya
			$dtmasterracikdokter = $this->rmemdl->panggilMasterRacikDokter($kode_dokter);
			$data['dtmasterracikdokter']=$dtmasterracikdokter;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistMasterRacik', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function hapusDetailRacikan() {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$koderacikan = $this->input->get('koderacikan');
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$dtresep = $this->rmemdl->hapusDetailRacikbaru();
			//ambil kembali data racikannya
			$dtracikandokter_perkode = $this->rmemdl->panggilracikan_perkode($kode_dokter,$koderacikan);
			$data['dtracikandokter_perkode']=$dtracikandokter_perkode;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistracik_rme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function editMasterRacikan() {
		if ($this->session->userdata("login") == TRUE) {
			// $id = $this->input->get('id');
			
			$kode_dokter=$this->input->get("kode_dokter");
			$kode_racikan=$this->input->get("kode_racikan");
			
			$this->load->model("rmemdl");
			$dtHeaderRacikan=$this->rmemdl->panggilHeaderRacikan($kode_dokter,$kode_racikan);
			$dtracikandokter_perkode = $this->rmemdl->panggilracikan_perkode($kode_dokter,$kode_racikan);
			$dtmasterobat = $this->rmemdl->ambilDataMasterObat();
			$dtsatuan = $this->rmemdl->pilihsatuan();
			$data['dtracikandokter_perkode']=$dtracikandokter_perkode;
			$data['dtmasterobat'] = $dtmasterobat;
			$data['dtsatuan'] = $dtsatuan;
			$data['kode_dokter'] = $kode_dokter;
			$data['dtHeaderRacikan'] = $dtHeaderRacikan;
			$this->load->view('layanan/pelayanan/rme/formEditMasterRacikan', $data);
		} else {
			redirect('login');
		}
	}

	public function hapusSemuaDetailRacikan_perkode() {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$koderacikan = $this->input->get('koderacikan');
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$dtresep = $this->rmemdl->hapusDetailRacikbaru_perkode();
			echo json_encode($dtresep);
		} else {
			redirect('login');
		}
	}

	public function FormTambahKonsul() {
		if ($this->session->userdata("login") == TRUE) {
			// $id = $this->input->get('id');
			// $this->load->model("rmemdl");
			// $dtDetailRad = $this->rmemdl->ambilDataOrderRad($id);
			$this->load->model("unit");
			$dtunit = $this->unit->fullurj();
			// $data['dtDetailRad'] = $dtDetailRad;
			$data['dtunit'] = $dtunit;
			$this->load->view('layanan/pelayanan/rme/formTambahKonsul', $data);
		} else {
			redirect('login');
		}
	}

	public function FormTambahKonsulRanap() {
		if ($this->session->userdata("login") == TRUE) {
			// $id = $this->input->get('id');
			// $this->load->model("rmemdl");
			// $dtDetailRad = $this->rmemdl->ambilDataOrderRad($id);
			$kode_dokter = $this->input->get('kode_dokter');
			$this->load->model("dokter");
			$dtdokter = $this->dokter->datadokter();
			// $data['dtDetailRad'] = $dtDetailRad;
			$data['dtdokter'] = $dtdokter;
			$data['kode_dokter'] = $kode_dokter;
			$this->load->view('layanan/pelayanan/rme/formTambahKonsulRanap', $data);
		} else {
			redirect('login');
		}
	}
	
	public function saveKonsul() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$kode_unit = $this->input->get('kode_unit');
			$this->load->model("rmemdl");
			$dtresep = $this->rmemdl->simpanKonsulDokter();
			$dtlembarkonsul = $this->rmemdl->panggilHistoryKonsul($no_rm);
			$data['dtlembarkonsul'] = $dtlembarkonsul;
			$data['kode_unit'] = $kode_unit;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistkonsul_rme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function saveKonsulRanap() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$kode_dokter = $this->input->get('kode_dokter');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmemdl");
			$dtresep = $this->rmemdl->simpanKonsulDokterRanap();
			$dtlembarkonsul = $this->rmemdl->panggilHistoryKonsulRanap($no_rm,$notransaksi);
			
			// $data['dataPasien'] = $dataPasien;
			$data['dtlembarkonsul'] = $dtlembarkonsul;
			$data['kode_dokter'] = $kode_dokter;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistkonsulranap_rme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function jawabkonsul() {
		if ($this->session->userdata("login") == TRUE) {
			//panggil dulu isi konsul
			$id = $this->input->get('id');
			$this->load->model("rmemdl");
			$dtkonsulid = $this->rmemdl->panggilHistoryKonsulID($id);
			$data["dtkonsulid"] = $dtkonsulid;
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$data["dtdokter"] = $dtdokter;
			$this->load->view('layanan/pelayanan/rme/formEditKonsul', $data);
		} else {
			redirect('login');
		}
	}

	public function jawabkonsulranap() {
		if ($this->session->userdata("login") == TRUE) {
			//panggil dulu isi konsul
			$id = $this->input->get('id');
			$this->load->model("rmemdl");
			$dtkonsulid = $this->rmemdl->panggilHistoryKonsulIDranap($id);
			$data["dtkonsulid"] = $dtkonsulid;
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$data["dtdokter"] = $dtdokter;
			$this->load->view('layanan/pelayanan/rme/formJawabKonsul', $data);
		} else {
			redirect('login');
		}
	}

	public function savejawabkonsul() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$kode_unit = $this->input->get('kode_unit');
			$id = $this->input->get('id');
			$this->load->model("rmemdl");
			$dtresep = $this->rmemdl->simpanJawabKonsulDokter($id);
			$dtlembarkonsul = $this->rmemdl->panggilHistoryKonsul($no_rm);
			$data['dtlembarkonsul'] = $dtlembarkonsul;
			$data['kode_unit'] = $kode_unit;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistkonsul_rme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}


	public function savejawabkonsulranap() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$kode_unit = $this->input->get('kode_unit');
			$id = $this->input->get('id');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmemdl");
			$dtresep = $this->rmemdl->simpanIsiJawabKonsulranap($id);
			// $dtlembarkonsul = $this->rmemdl->panggilHistoryKonsul($no_rm);
			$dtlembarkonsul = $this->rmemdl->panggilHistoryKonsulRanap($no_rm,$notransaksi);
			$data['dtlembarkonsul'] = $dtlembarkonsul;
			$data['kode_unit'] = $kode_unit;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistkonsulranap_rme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}
	public function editisikonsul() {
		if ($this->session->userdata("login") == TRUE) {
			//panggil dulu isi konsul
			$id = $this->input->get('id');
			$this->load->model("rmemdl");
			$dtkonsulid = $this->rmemdl->panggilHistoryKonsulID($id);
			$data["dtkonsulid"] = $dtkonsulid;
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$data["dtdokter"] = $dtdokter;
			$this->load->view('layanan/pelayanan/rme/formEditIsiKonsul', $data);
		} else {
			redirect('login');
		}
	}

	
	public function editisikonsulranap() {
		if ($this->session->userdata("login") == TRUE) {
			//panggil dulu isi konsul
			$id = $this->input->get('id');
			$this->load->model("rmemdl");
			$dtkonsulid = $this->rmemdl->panggilHistoryKonsulIDranap($id);
			$data["dtkonsulid"] = $dtkonsulid;
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$data["dtdokter"] = $dtdokter;
			$this->load->view('layanan/pelayanan/rme/formEditIsiKonsulRanap', $data);
		} else {
			redirect('login');
		}
	}

	public function saveisikonsul() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$id = $this->input->get('id');
			$kode_unit = $this->input->get('kode_unit');
			$this->load->model("rmemdl");
			$dtresep = $this->rmemdl->simpanIsiKonsulDokter($id);
			$dtlembarkonsul = $this->rmemdl->panggilHistoryKonsul($no_rm);
			$data['dtlembarkonsul'] = $dtlembarkonsul;
			$data['kode_unit'] = $kode_unit;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistkonsul_rme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function saveisikonsulranap() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$id = $this->input->get('id');
			$notransaksi = $this->input->get('notransaksi');
			$kode_dokter = $this->input->get('kode_dokter');
			$this->load->model("rmemdl");
			$dtresep = $this->rmemdl->simpanIsiKonsulDokterRanap($id);
			$dtlembarkonsul = $this->rmemdl->panggilHistoryKonsulRanap($no_rm,$notransaksi);

			$data['dtlembarkonsul'] = $dtlembarkonsul;
			$data['kode_dokter'] = $kode_dokter;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistkonsulranap_rme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function hapusisikonsul() {
		if ($this->session->userdata("login") == TRUE) {
			$id = $this->input->get('id');
			$kode_unit = $this->input->get('kode_unit');
			$no_rm = $this->input->get('no_rm');
			$this->load->model("rmemdl");
			$dtresep = $this->rmemdl->hapusisikonsul($id);
			$dtlembarkonsul = $this->rmemdl->panggilHistoryKonsul($no_rm);
			$data['dtlembarkonsul'] = $dtlembarkonsul;
			$data['kode_unit'] = $kode_unit;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistkonsul_rme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function hapusisikonsulranap() {
		if ($this->session->userdata("login") == TRUE) {
			$id = $this->input->get('id');
			$kode_unit = $this->input->get('kode_unit');
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmemdl");
			$dtresep = $this->rmemdl->hapusisikonsulranap($id);
			$dtlembarkonsul = $this->rmemdl->panggilHistoryKonsulRanap($no_rm,$notransaksi);
			$data['dtlembarkonsul'] = $dtlembarkonsul;
			$data['kode_unit'] = $kode_unit;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistkonsulranap_rme', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}
// ================ NEW IGD ============

public function rme_form_pasien_igd() {
	if ($this->session->userdata("login") == TRUE) {
		// $kodePoli = $this->input->get('kodePoli');

		$id = $this->input->post('id');
		$notransaksi = $this->input->post('notransaksi');
		$nama_pasien = $this->input->post('nama');
		$no_rm = $this->input->post('no_rm');
		$kode_dokter = $this->input->post('kode_dokter');
		$angkatab = $this->input->post('angkatab');
		$editing = $this->input->post('editing');

		// Lakukan operasi lain yang diperlukan dengan variabel ini
		// Contoh: Tampilkan variabel ke dalam view
		$data['id'] = $id;
		$data['notransaksi'] = $notransaksi;
		$data['nama_pasien'] = $nama_pasien;
		$this->load->model("rmmdl");
		$dataPasien = $this->rmmdl->cariDataPasienSesuaiID($id);
		$tglhistori=$dataPasien->tgl_masuk;

		$this->load->model("rmeigdmdl");

		$dtsoap = $this->rmeigdmdl->panggilsoap($no_rm,$notransaksi);
		$data['dtsoap'] = $dtsoap;

		// cek apakah apakah sudah ada recordnya, jika belum, buatkan
		$dtcek = $this->rmeigdmdl->cek_askep_saveriwayat($no_rm,$notransaksi);

		$dtterapi = $this->rmeigdmdl->panggiltarapi($no_rm,$notransaksi);
		$data['dtterapi'] = $dtterapi;

		
		$dtintegrasi = $this->rmeigdmdl->panggilintegrasi($no_rm,$notransaksi);
		$data['dtintegrasi'] = $dtintegrasi;

		$dtobatinfus = $this->rmeigdmdl->panggilobatinfus($no_rm,$notransaksi);
		$data['dtobatinfus'] = $dtobatinfus;


		$this->load->model("rmemdl");
		$filepasien=$this->rmemdl->datapasien($no_rm);

		$tgl_lahir = new DateTime($filepasien->tgl_lahir);
		$tgl_masuk = new DateTime($dataPasien->tgl_masuk);
		$selisih = $tgl_lahir->diff($tgl_masuk);

		$tahun = $selisih->y; // Umur dalam tahun
		$bulan = $selisih->m; // Umur dalam bulan
		$hari = $selisih->d; // Umur dalam hari

		
		
		$data['tgl_lahir'] = $filepasien->tgl_lahir;
		$data['umur'] = 'Umur : '.$tahun.' Tahun '.$bulan.' Bulan '.$hari.' Hari';

		

		$data['dataPasien'] = $dataPasien;

		// $dtsoaphistory = $this->rmemdl->panggilhissoap($no_rm); di hapus tgl 24 des
		
		$dtresepdetail = $this->rmemdl->panggilresepdetail($no_rm);
		$dttindakanlab = $this->rmemdl->tindakaninstalasi('LABS');
		$dttindakanrad = $this->rmemdl->tindakaninstalasi('RDGL');
		$dthasilinstalasiLAB = $this->rmemdl->panggilhisinstalasiLAB($no_rm);
		$dthasilinstalasiRAD = $this->rmemdl->panggilhisinstalasiRAD($no_rm);

		$dthistorydiagnosa = $this->rmemdl->panggilHistoryDiagnosa($no_rm);
		$dtlembarkonsul = $this->rmemdl->panggilHistoryKonsul($no_rm);

		$dttriase = $this->rmeigdmdl->penggildatatriase($no_rm,$notransaksi);
		$data['dttriase'] = $dttriase;

		$dtpulang = $this->rmeigdmdl->panggilkesimpulan($no_rm,$notransaksi);
		$data['dtpulang'] = $dtpulang;
		
		// $data['dtsoaphistory'] = $dtsoaphistory; //dihapus tgl 24 desember
		// $data['dtassesmenhistory'] = $dtassesmenhistory;
		$data['dtresepdetail'] = $dtresepdetail;
		$data['dttindakanlab'] = $dttindakanlab;
		$data['dttindakanrad'] = $dttindakanrad;
		$data['dthasilinstalasiLAB'] = $dthasilinstalasiLAB;
		$data['dthasilinstalasiRAD'] = $dthasilinstalasiRAD;
		$data['dthistorydiagnosa'] = $dthistorydiagnosa;
		$data['dtlembarkonsul'] = $dtlembarkonsul;

		$data['angkatab'] = $angkatab;
		$data['editing'] = $editing;

		//panggil transaksi hari ini
		if ($editing == 1) {
			// $dtresepdetail_hariini = $this->rmemdl->panggilresepdetail_hariini($no_rm,$kode_dokter);
			$dtresepheader_hariini = $this->rmemdl->panggilresepheader_hariini_ranap($no_rm,$notransaksi);

			$dtlabdetail_hariini = $this->rmemdl->panggillabdetail_hariini($no_rm,$kode_dokter);
			$dtraddetail_hariini = $this->rmemdl->panggilraddetail_hariini($no_rm,$kode_dokter);
			$dtdiag_hariini = $this->rmemdl->panggilHistoryDiagnosa_hariini($no_rm);
		} else {
			// $dtresepdetail_hariini = $this->rmemdl->panggilresepdetail_historitanggal($no_rm,$kode_dokter,$tglhistori);
			$dtresepheader_hariini = $this->rmemdl->panggilresepheader_hariini_ranap($no_rm,$notransaksi); //cek intuk kondisi ini

			$dtlabdetail_hariini = $this->rmemdl->panggillabdetail_historitanggal($no_rm,$kode_dokter,$tglhistori);
			$dtraddetail_hariini = $this->rmemdl->panggilraddetail_historitanggal($no_rm,$kode_dokter,$tglhistori);
			$dtdiag_hariini = $this->rmemdl->panggilHistoryDiagnosa_historitanggal($no_rm,$tglhistori);
		}
		// $data['dtresepdetail_hariini'] = $dtresepdetail_hariini;
		$data['dtresepheader_hariini'] = $dtresepheader_hariini;
		$data['dtlabdetail_hariini'] = $dtlabdetail_hariini;
		$data['dtraddetail_hariini'] = $dtraddetail_hariini;
		$data['dtdiag_hariini'] = $dtdiag_hariini;
		

		$dtmasterracikdokter = $this->rmemdl->panggilMasterRacikDokter($kode_dokter);
		$data['dtmasterracikdokter'] = $dtmasterracikdokter;
		$data['tglhistori'] = $tglhistori;
		
		
		$data['include'] = "layanan/pelayanan/rmeigd/formpasienigdnew";
		$data['js'] = "pelayanan/rme/listurjrme";
		$data['css'] = "pelayanan/rme/listurjrme";
		$data['backhome'] = "dua";
		$this->load->view('templatesidebar/content_rme_noNav', $data);
	} else {
		redirect('login');
	}
}
// ================ end new igd ========


	public function savetriase() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtresep = $this->rmeigdmdl->simpantriase();
			$dt["dtresep"] = $dtresep;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function saveawal() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtresep = $this->rmeigdmdl->simpanawal();
			$dt["dtresep"] = $dtresep;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function saveawalranap() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtresep = $this->rmeigdmdl->simpanawalranap();
			$dt["dtresep"] = $dtresep;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function savepemeriksaan() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtresep = $this->rmeigdmdl->simpanpemeriksaan();
			$dt["dtresep"] = $dtresep;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function savepemeriksaanranap() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtresep = $this->rmeigdmdl->simpanpemeriksaanranap();
			$dt["dtresep"] = $dtresep;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function savepenunjangranap() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtresep = $this->rmeigdmdl->simpanpenunjangranap();
			$dt["dtresep"] = $dtresep;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function savenyeri() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtresep = $this->rmeigdmdl->simpannyeri();
			$dt["dtresep"] = $dtresep;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function savekesimpulan() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtresep = $this->rmeigdmdl->simpankesimpulan();
			$dt["dtresep"] = $dtresep;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}


	public function saveedukasi() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtresep = $this->rmeigdmdl->simpanedukasi();
			$dt["dtresep"] = $dtresep;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function saveedukasiranap() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtresep = $this->rmeigdmdl->simpanedukasiranap();
			$dt["dtresep"] = $dtresep;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function addrecordtindakan() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtaddrecord = $this->rmeigdmdl->addrecordtindakan($no_rm,$notransaksi);

			$dtintegrasi = $this->rmeigdmdl->panggilintegrasi($no_rm,$notransaksi);
			$data['dtintegrasi'] = $dtintegrasi;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlisttindakan', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function addrecordobat() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtaddrecord = $this->rmeigdmdl->addrecordobat($no_rm,$notransaksi);

			$dtobatinfus = $this->rmeigdmdl->panggilobatinfus($no_rm,$notransaksi);
			$data['dtobatinfus'] = $dtobatinfus;
	
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistobatinfus', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}


	public function panggilformtindakan() {
		$no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmeigdmdl");
			$dttindakanid = $this->rmeigdmdl->datatindakanPerId();
			
			$this->load->model("dokter");
			$dtperawat = $this->dokter->filterperawatdanbidan();
			$data["dtperawat"] = $dtperawat;

			// $data["no_rm"] = $no_rm;
			// $data["notransaksi"] = $notransaksi;
			$data["dttindakanid"] = $dttindakanid;
			$this->load->view('layanan/pelayanan/rmeigd/formtindakan', $data);

			echo json_encode($dttindakanid);

		} else {
			redirect('login');
		}
	}

	public function panggilformobatinfus() {
		$no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmeigdmdl");
			$dtobatinfusid = $this->rmeigdmdl->dataobatPerId();
			// $data["no_rm"] = $no_rm;
			// $data["notransaksi"] = $notransaksi;
			$data["dtobatinfusid"] = $dtobatinfusid;
			$this->load->view('layanan/pelayanan/rmeigd/formobatinfus', $data);
		} else {
			redirect('login');
		}
	}

	public function simpandata() {
		if ($this->session->userdata("login") == TRUE) {
			$id = $this->input->get('id');
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$simpandatatindakan = $this->rmeigdmdl->simpandatatindakan($id);

			$dtintegrasi = $this->rmeigdmdl->panggilintegrasi($no_rm,$notransaksi);

			$data['dtintegrasi'] = $dtintegrasi;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlisttindakan', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function simpandataobatinfus() {
		if ($this->session->userdata("login") == TRUE) {
			$id = $this->input->get('id');
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$simpandatatindakan = $this->rmeigdmdl->simpandataobatinfus($id);

			$dtobatinfus = $this->rmeigdmdl->panggilobatinfus($no_rm,$notransaksi);
			$data['dtobatinfus'] = $dtobatinfus;

			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistobatinfus', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function hapusdata() {
		if ($this->session->userdata("login") == TRUE) {
			$id = $this->input->get('id');
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$simpandatatindakan = $this->rmeigdmdl->hapusdata($id);

			$dtintegrasi = $this->rmeigdmdl->panggilintegrasi($no_rm,$notransaksi);

			$data['dtintegrasi'] = $dtintegrasi;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlisttindakan', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function hapusdataobatinfus() {
		if ($this->session->userdata("login") == TRUE) {
			$id = $this->input->get('id');
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$simpandatatindakan = $this->rmeigdmdl->hapusdataobatinfus($id);

			$dtobatinfus = $this->rmeigdmdl->panggilobatinfus($no_rm,$notransaksi);
			$data['dtobatinfus'] = $dtobatinfus;

			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistobatinfus', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

// ============== ass. medis ====
	public function addrecordterapi() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtaddrecord = $this->rmeigdmdl->addrecordterapi($no_rm,$notransaksi);
			$dtterapi = $this->rmeigdmdl->panggiltarapi($no_rm,$notransaksi);
		
			$this->load->model("rmmdl");
			$dataPasien = $this->rmmdl->cariDataPasienSesuaiNormNotransaksi($no_rm,$notransaksi);
		
			$data['dataPasien'] = $dataPasien;
			$data['dtterapi'] = $dtterapi;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistterapi', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function panggilformterapi() {
		$no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmeigdmdl");
			$dttindakanid = $this->rmeigdmdl->dataterapiPerId();
			// $data["no_rm"] = $no_rm;
			// $data["notransaksi"] = $notransaksi;
			$data["dttindakanid"] = $dttindakanid;
			// $this->load->view('layanan/pelayanan/rmeigd/formtindakan', $data);
			$this->load->view('layanan/pelayanan/rmeigd/formterapi', $data);
		} else {
			redirect('login');
		}
	}

	public function simpandataterapi() {
		if ($this->session->userdata("login") == TRUE) {
			$id = $this->input->get('id');
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$simpandatatindakan = $this->rmeigdmdl->simpandataterapi($id);

			$dtterapi = $this->rmeigdmdl->panggiltarapi($no_rm,$notransaksi);
		
			$this->load->model("rmmdl");
			$dataPasien = $this->rmmdl->cariDataPasienSesuaiNormNotransaksi($no_rm,$notransaksi);
		
			$data['dataPasien'] = $dataPasien;
			$data['dtterapi'] = $dtterapi;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistterapi', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function hapusdataterapi() {
		if ($this->session->userdata("login") == TRUE) {
			$id = $this->input->get('id');
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$simpandatatindakan = $this->rmeigdmdl->hapusdataterapi($id);

			$dtterapi = $this->rmeigdmdl->panggiltarapi($no_rm,$notransaksi);
		
			$this->load->model("rmmdl");
			$dataPasien = $this->rmmdl->cariDataPasienSesuaiNormNotransaksi($no_rm,$notransaksi);
		
			$data['dataPasien'] = $dataPasien;
			$data['dtterapi'] = $dtterapi;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistterapi', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}
	
	public function panggilFormTriase() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$cektriase = $this->input->get('cektriase');
			$this->load->model("rmeigdmdl");
			$dttriase = $this->rmeigdmdl->penggildatatriase($no_rm,$notransaksi);
			$data['dttriase'] = $dttriase;
			$this->load->view('layanan/pelayanan/rmeigd/formTriase', $data);
			
		} else {
			redirect('login');
		}
	}

	public function panggilFormAsesmenMedis() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtassawal = $this->rmeigdmdl->penggilassawal($no_rm,$notransaksi);
			$data['dtassawal'] = $dtassawal;
			$dtterapi = $this->rmeigdmdl->panggiltarapi($no_rm,$notransaksi);
			$data['dtterapi'] = $dtterapi;
			$this->load->view('layanan/pelayanan/rmeigd/formAsesmenMedis', $data);
		} else {
			redirect('login');
		}
	}

	
	public function panggilFormAsesmenMedisRanap() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtassawal = $this->rmeigdmdl->penggilassawalRanap($no_rm,$notransaksi);
			$data['dtassawal'] = $dtassawal;
			// $dtterapi = $this->rmeigdmdl->panggiltarapi($no_rm,$notransaksi);
			// $data['dtterapi'] = $dtterapi;
			$this->load->view('layanan/pelayanan/rmeigd/formAsesmenMedisRanap', $data);
		} else {
			redirect('login');
		}
	}

	public function panggilFormAsesmenKeperawatan() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$cekaskep = $this->input->get('cekaskep');

				$this->load->model("rmeigdmdl");
				$dtassawal = $this->rmeigdmdl->penggilassawal($no_rm,$notransaksi);
				$dtterapi = $this->rmeigdmdl->panggiltarapi($no_rm,$notransaksi);
				$dtaskep = $this->rmeigdmdl->panggildataaskep($no_rm,$notransaksi);


				$data['dtassawal'] = $dtassawal;
				$data['dtterapi'] = $dtterapi;				
				$data['dtaskep'] = $dtaskep;
			
				$this->load->view('layanan/pelayanan/rmeigd/formAsesmenKeperawatan', $data);
			
		} else {
			redirect('login');
		}
	}


// ============== RAWAT INAP ==========

public function rme_form_pasien_ranap() {
	if ($this->session->userdata("login") == TRUE) {
		// $kodePoli = $this->input->get('kodePoli');

		$id = $this->input->post('id');
		$notransaksi = $this->input->post('notransaksi');
		$nama_pasien = $this->input->post('nama');
		$no_rm = $this->input->post('no_rm');
		$kode_dokter = $this->input->post('kode_dokter');
		$angkatab = $this->input->post('angkatab');
		$editing = $this->input->post('editing');

		// Lakukan operasi lain yang diperlukan dengan variabel ini
		// Contoh: Tampilkan variabel ke dalam view
		$data['id'] = $id;
		$data['notransaksi'] = $notransaksi;
		$data['nama_pasien'] = $nama_pasien;
		$this->load->model("rmmdl");
		$dataPasien = $this->rmmdl->cariDataPasienSesuaiID($id);
		$tglhistori=$dataPasien->tgl_masuk;

		$this->load->model("rmeigdmdl");
		$dtterapi = $this->rmeigdmdl->panggiltarapi($no_rm,$notransaksi);
		$data['dtterapi'] = $dtterapi;

		
		$dtintegrasi = $this->rmeigdmdl->panggilintegrasi($no_rm,$notransaksi);
		$data['dtintegrasi'] = $dtintegrasi;

		$dtobatinfus = $this->rmeigdmdl->panggilobatinfus($no_rm,$notransaksi);
		$data['dtobatinfus'] = $dtobatinfus;

		$dtsoap = $this->rmeigdmdl->panggilsoap($no_rm,$notransaksi);
		$data['dtsoap'] = $dtsoap;
		
		$dtasuhan = $this->rmeigdmdl->panggilasuhan($no_rm,$notransaksi);
		$data['dtasuhan'] = $dtasuhan;


		$this->load->model("rmemdl");
		$filepasien=$this->rmemdl->datapasien($no_rm);

		$tgl_lahir = new DateTime($filepasien->tgl_lahir);
		$tgl_masuk = new DateTime($dataPasien->tgl_masuk);
		$selisih = $tgl_lahir->diff($tgl_masuk);

		$tahun = $selisih->y; // Umur dalam tahun
		$bulan = $selisih->m; // Umur dalam bulan
		$hari = $selisih->d; // Umur dalam hari

		
		
		$data['tgl_lahir'] = $filepasien->tgl_lahir;
		$data['umur'] = 'Umur : '.$tahun.' Tahun '.$bulan.' Bulan '.$hari.' Hari';
		$data['tahun'] = $tahun;
		

		$data['dataPasien'] = $dataPasien;
		$dtsoaphistory = $this->rmemdl->panggilhissoap($no_rm);
		
		// $dtassesmenhistory = $this->rmemdl->panggilhisassesmen($no_rm);
		$dtresepdetail = $this->rmemdl->panggilresepdetail($no_rm);
		$dttindakanlab = $this->rmemdl->tindakaninstalasi('LABS');
		$dttindakanrad = $this->rmemdl->tindakaninstalasi('RDGL');
		$dthasilinstalasiLAB = $this->rmemdl->panggilhisinstalasiLAB($no_rm);
		$dthasilinstalasiRAD = $this->rmemdl->panggilhisinstalasiRAD($no_rm);

		$dthistorydiagnosa = $this->rmemdl->panggilHistoryDiagnosa($no_rm);
		$dtlembarkonsul = $this->rmemdl->panggilHistoryKonsulRanap($no_rm,$notransaksi);

		$dtpulang = $this->rmeigdmdl->panggilkesimpulan($no_rm,$notransaksi);
		$data['dtpulang'] = $dtpulang;

		$data['dtsoaphistory'] = $dtsoaphistory;
		// $data['dtassesmenhistory'] = $dtassesmenhistory;
		$data['dtresepdetail'] = $dtresepdetail;
		$data['dttindakanlab'] = $dttindakanlab;
		$data['dttindakanrad'] = $dttindakanrad;
		$data['dthasilinstalasiLAB'] = $dthasilinstalasiLAB;
		$data['dthasilinstalasiRAD'] = $dthasilinstalasiRAD;
		$data['dthistorydiagnosa'] = $dthistorydiagnosa;
		$data['dtlembarkonsul'] = $dtlembarkonsul;

		$data['angkatab'] = $angkatab;
		$data['editing'] = $editing;

		//panggil transaksi hari ini
		// if ($editing == 1) {
			// $dtresepdetail_hariini = $this->rmemdl->panggilresepdetail_hariini_ranap($no_rm,$notransaksi);
			$dtresepheader_hariini = $this->rmemdl->panggilresepheader_hariini_ranap($no_rm,$notransaksi);
			$dtlabdetail_hariini = $this->rmemdl->panggillabdetail_hariini($no_rm,$kode_dokter);
			$dtraddetail_hariini = $this->rmemdl->panggilraddetail_hariini($no_rm,$kode_dokter);
			$dtdiag_hariini = $this->rmemdl->panggilHistoryDiagnosa_ranap($no_rm,$notransaksi);
		// } else {
			// $dtresepdetail_hariini = $this->rmemdl->panggilresepdetail_historitanggal($no_rm,$kode_dokter,$tglhistori);
			// $dtlabdetail_hariini = $this->rmemdl->panggillabdetail_historitanggal($no_rm,$kode_dokter,$tglhistori);
			// $dtraddetail_hariini = $this->rmemdl->panggilraddetail_historitanggal($no_rm,$kode_dokter,$tglhistori);
			// $dtdiag_hariini = $this->rmemdl->panggilHistoryDiagnosa_historitanggal($no_rm,$tglhistori);
			// $dtresepdetail_hariini = '';
		// 	$dtlabdetail_hariini = '';
		// 	$dtraddetail_hariini = '';
		// 	$dtdiag_hariini = '';
		// }
		$data['dtresepheader_hariini'] = $dtresepheader_hariini;
		$data['dtlabdetail_hariini'] = $dtlabdetail_hariini;
		$data['dtraddetail_hariini'] = $dtraddetail_hariini;
		$data['dtdiag_hariini'] = $dtdiag_hariini;
		

		$dtmasterracikdokter = $this->rmemdl->panggilMasterRacikDokter($kode_dokter);
		$data['dtmasterracikdokter'] = $dtmasterracikdokter;
		$data['tglhistori'] = $tglhistori;
		
	
		$data['include'] = "layanan/pelayanan/rmeigd/formpasienranap";
		$data['js'] = "pelayanan/rme/listurjrme";
		$data['css'] = "pelayanan/rme/listurjrme";
		$data['backhome'] = "dua";
		$this->load->view('templatesidebar/content_rme_noNav', $data);
	} else {
		redirect('login');
	}
}


public function addrecordsoap() {
	if ($this->session->userdata("login") == TRUE) {
		$no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
		$this->load->model("rmeigdmdl");

		$dtaddrecord = $this->rmeigdmdl->addrecordsoap($no_rm,$notransaksi);

		$dtsoap = $this->rmeigdmdl->panggilsoap($no_rm,$notransaksi);

		$this->load->model("rmmdl");
		$dataPasien = $this->rmmdl->cariDataPasienSesuaiNormNotransaksi($no_rm,$notransaksi);
	
		$data['dataPasien'] = $dataPasien;
		$data['dtsoap'] = $dtsoap;
		$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistsoap', $data, TRUE);
		echo json_encode($dt);
	} else {
		redirect('login');
	}
}

public function panggilformsoap() {
	$no_rm = $this->input->get('no_rm');
	$notransaksi = $this->input->get('notransaksi');
	if ($this->session->userdata("login") == TRUE) {
		$this->load->model("rmeigdmdl");
		$dttindakanid = $this->rmeigdmdl->datasoapPerId();
		// $data["no_rm"] = $no_rm;
		// $data["notransaksi"] = $notransaksi;
		$data["dttindakanid"] = $dttindakanid;
		// $this->load->view('layanan/pelayanan/rmeigd/formtindakan', $data);
		$this->load->view('layanan/pelayanan/rmeigd/formsoap', $data);
	} else {
		redirect('login');
	}
}

public function simpandatasoap_ranap() {
	if ($this->session->userdata("login") == TRUE) {
		$id = $this->input->get('id');
		$no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
		$this->load->model("rmeigdmdl");
		$simpandatatindakan = $this->rmeigdmdl->simpandatasoap_ranap($id);

		$dtsoap = $this->rmeigdmdl->panggilsoap($no_rm,$notransaksi);

		$this->load->model("rmmdl");
		$dataPasien = $this->rmmdl->cariDataPasienSesuaiNormNotransaksi($no_rm,$notransaksi);
	
		$data['dataPasien'] = $dataPasien;
		$data['dtsoap'] = $dtsoap;
		$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistsoap', $data, TRUE);
		echo json_encode($dt);
	} else {
		redirect('login');
	}
}

public function hapusdatasoap() {
	if ($this->session->userdata("login") == TRUE) {
		$id = $this->input->get('id');
		$no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
		$this->load->model("rmeigdmdl");
		$simpandatatindakan = $this->rmeigdmdl->hapusdatasoap($id);
		
		$dtsoap = $this->rmeigdmdl->panggilsoap($no_rm,$notransaksi);

		$this->load->model("rmmdl");
		$dataPasien = $this->rmmdl->cariDataPasienSesuaiNormNotransaksi($no_rm,$notransaksi);
	
		$data['dataPasien'] = $dataPasien;
		$data['dtsoap'] = $dtsoap;
		$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistsoap', $data, TRUE);
		echo json_encode($dt);
	} else {
		redirect('login');
	}
}

public function addrecordasuhan() {
	if ($this->session->userdata("login") == TRUE) {
		$no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
		$this->load->model("rmeigdmdl");

		$dtaddrecord = $this->rmeigdmdl->addrecordasuhan($no_rm,$notransaksi);

		$dtasuhan = $this->rmeigdmdl->panggilasuhan($no_rm,$notransaksi);

		$this->load->model("rmmdl");
		$dataPasien = $this->rmmdl->cariDataPasienSesuaiNormNotransaksi($no_rm,$notransaksi);
	
		$data['dataPasien'] = $dataPasien;
		$data['dtasuhan'] = $dtasuhan;
		$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistasuhan', $data, TRUE);
		echo json_encode($dt);
	} else {
		redirect('login');
	}
}

public function panggilformasuhan() {
	$no_rm = $this->input->get('no_rm');
	$notransaksi = $this->input->get('notransaksi');
	if ($this->session->userdata("login") == TRUE) {
		$this->load->model("rmeigdmdl");
		$dttindakanid = $this->rmeigdmdl->dataasuhanPerId();
		// $data["no_rm"] = $no_rm;
		// $data["notransaksi"] = $notransaksi;
		$data["dttindakanid"] = $dttindakanid;
		$this->load->view('layanan/pelayanan/rmeigd/formasuhan', $data);
	} else {
		redirect('login');
	}
}


public function simpandataasuhan() {
	if ($this->session->userdata("login") == TRUE) {
		$id = $this->input->get('id');
		$no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
		$this->load->model("rmeigdmdl");
		$simpandatatindakan = $this->rmeigdmdl->simpandataasuhan($id);

		$dtasuhan = $this->rmeigdmdl->panggilasuhan($no_rm,$notransaksi);

		$this->load->model("rmmdl");
		$dataPasien = $this->rmmdl->cariDataPasienSesuaiNormNotransaksi($no_rm,$notransaksi);
	
		$data['dataPasien'] = $dataPasien;
		$data['dtasuhan'] = $dtasuhan;
		$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistasuhan', $data, TRUE);
		echo json_encode($dt);
	} else {
		redirect('login');
	}
}

public function hapusdataasuhan() {
	if ($this->session->userdata("login") == TRUE) {
		$id = $this->input->get('id');
		$no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
		$this->load->model("rmeigdmdl");
		$simpandatatindakan = $this->rmeigdmdl->hapusdataasuhan($id);
		
		$dtasuhan = $this->rmeigdmdl->panggilasuhan($no_rm,$notransaksi);

		$this->load->model("rmmdl");
		$dataPasien = $this->rmmdl->cariDataPasienSesuaiNormNotransaksi($no_rm,$notransaksi);
	
		$data['dataPasien'] = $dataPasien;
		$data['dtasuhan'] = $dtasuhan;
		$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistasuhan', $data, TRUE);
		echo json_encode($dt);
	} else {
		redirect('login');
	}
}


// ============= asesmen awal keperawatan ====================
public function askep_saveriwayat() {
	if ($this->session->userdata("login") == TRUE) {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$notransaksi = $this->input->get('notransaksi');
		$this->load->model("rmeigdmdl");
		$dtaskepigd = $this->rmeigdmdl->askep_saveriwayat();
		$dt["dtaskepigd"] = $dtaskepigd;
		echo json_encode($dt);
	} else {
		redirect('login');
	}
}

public function askep_savedissability() {
	if ($this->session->userdata("login") == TRUE) {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$notransaksi = $this->input->get('notransaksi');
		$this->load->model("rmeigdmdl");
		$dtaskepigd = $this->rmeigdmdl->askep_savedissability();
		$dt["dtaskepigd"] = $dtaskepigd;
		echo json_encode($dt);
	} else {
		redirect('login');
	}
}


public function askep_savepemeriksaanfisik() {
	if ($this->session->userdata("login") == TRUE) {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$notransaksi = $this->input->get('notransaksi');
		$this->load->model("rmeigdmdl");
		$dtaskepigd = $this->rmeigdmdl->askep_savepemeriksaanfisik();
		$dt["dtaskepigd"] = $dtaskepigd;
		echo json_encode($dt);
	} else {
		redirect('login');
	}
}

public function askep_savenyeri() {
	if ($this->session->userdata("login") == TRUE) {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$notransaksi = $this->input->get('notransaksi');
		$this->load->model("rmeigdmdl");
		$dtaskepigd = $this->rmeigdmdl->askep_savenyeri();
		$dt["dtaskepigd"] = $dtaskepigd;
		echo json_encode($dt);
	} else {
		redirect('login');
	}
}

public function askep_savejatuh() {
	if ($this->session->userdata("login") == TRUE) {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$notransaksi = $this->input->get('notransaksi');
		$this->load->model("rmeigdmdl");
		$dtaskepigd = $this->rmeigdmdl->askep_savejatuh();
		$dt["dtaskepigd"] = $dtaskepigd;
		echo json_encode($dt);
	} else {
		redirect('login');
	}
}

public function askep_savegizi() {
	if ($this->session->userdata("login") == TRUE) {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$notransaksi = $this->input->get('notransaksi');
		$this->load->model("rmeigdmdl");
		$dtaskepigd = $this->rmeigdmdl->askep_savegizi();
		$dt["dtaskepigd"] = $dtaskepigd;
		echo json_encode($dt);
	} else {
		redirect('login');
	}
}

public function askep_savefungsi() {
	if ($this->session->userdata("login") == TRUE) {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$notransaksi = $this->input->get('notransaksi');
		$this->load->model("rmeigdmdl");
		$dtaskepigd = $this->rmeigdmdl->askep_savefungsi();
		$dt["dtaskepigd"] = $dtaskepigd;
		echo json_encode($dt);
	} else {
		redirect('login');
	}
}
// =============gambar=================


    // public function tampilkan_gambar() {
    //     // Memuat model Gambar_model
    //     $this->load->model('Gambar_model');

    //     // Mendapatkan data gambar dari database
    //     $data['gambar_options'] = $this->Gambar_model->get_gambar_options();

    //     // Memuat view untuk menampilkan Select Option
	// 	$this->load->view('layanan/pelayanan/rme/gambar_select_option', $data);

    //     // $this->load->view('gambar_select_option', $data);
    // }




	public function saveCanvas()
    {
        $canvasData = $this->input->post('canvasData');
        $notransaksi = $this->input->post('notransaksi');

        // Validasi data jika diperlukan

        $this->load->model('CanvasModel');
        $result = $this->CanvasModel->saveCanvasData($canvasData, $notransaksi);
		

        // Mengembalikan response ke client, misalnya JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));
    }

	
	public function panggilFormAsesmenRajal() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');

			$this->load->model("rmemdl");
			$dtasawalrajal = $this->rmemdl->penggilassawalrajal($no_rm,$notransaksi);

			$data['dtasawalrajal'] = $dtasawalrajal;

			$this->load->view('layanan/pelayanan/rme/formAsesmenRajal', $data);
		} else {
			redirect('login');
		}
	}


	public function saveriwayat() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmemdl");
			$dtaskepigd = $this->rmemdl->simpanriwayat();
			$dt["dtaskepigd"] = $dtaskepigd;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function savestatus() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmemdl");
			$dtaskepigd = $this->rmemdl->simpanstatus();
			$dt["dtaskepigd"] = $dtaskepigd;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function savenyerirajal() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmemdl");
			$dtaskepigd = $this->rmemdl->simpannyeri();
			$dt["dtaskepigd"] = $dtaskepigd;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function savejatuhrajal() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmemdl");
			$dtaskepigd = $this->rmemdl->simpanjatuh();
			$dt["dtaskepigd"] = $dtaskepigd;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function savegizirajal() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmemdl");
			$dtaskepigd = $this->rmemdl->simpangizirajal();
			$dt["dtaskepigd"] = $dtaskepigd;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function savefungsirajal() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmemdl");
			$dtaskepigd = $this->rmemdl->savefungsirajal();
			$dt["dtaskepigd"] = $dtaskepigd;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function savepengkajianmedis() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmemdl");
			$dtaskepigd = $this->rmemdl->simpanpengkajianmedis();
			$dt["dtaskepigd"] = $dtaskepigd;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}


	public function panggilFormFisio() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');

			$this->load->model("rmemdl");
			$dtlambarfisio = $this->rmemdl->panggillembarfisio($no_rm);
			$data['dtlambarfisio'] = $dtlambarfisio;
			
			$dtfisioperiksa = $this->rmemdl->panggilfisioperiksa($no_rm);
			$data['dtfisioperiksa'] = $dtfisioperiksa;

			// $this->load->model('CanvasModel');
			// $data['backgroundImage2'] = $this->CanvasModel->getBackgroundImage();

			$this->load->view('layanan/pelayanan/rme/formFisioterapi', $data);
		} else {
			redirect('login');
		}
	}

	public function addlembarfisio() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmemdl");
			$dtaddrecord = $this->rmemdl->addlembarfisio($no_rm);

			$dtlambarfisio = $this->rmemdl->panggillembarfisio($no_rm);
			$data['dtlambarfisio'] = $dtlambarfisio;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistlembarfisio', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function addpemeriksaan() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmemdl");
			$dtaddrecord = $this->rmemdl->addpemeriksaan($no_rm);

			$dtlambarfisio = $this->rmemdl->panggilfisioperiksa($no_rm);
			$data['dtlambarfisio'] = $dtlambarfisio;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistpemeriksaan', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}
	

	public function bukalembarfisio() {
		if ($this->session->userdata("login") == TRUE) {
			$nolembar = $this->input->get('nolembar');
			$this->load->model("rmemdl");
			$dtlambarsoapfisio = $this->rmemdl->panggillembarsoapfisio($nolembar);
			$data['dtlambarsoapfisio'] = $dtlambarsoapfisio;
			echo json_encode($data);
		} else {
			redirect('login');
		}
	}

	public function simpansoapfisio() {
		if ($this->session->userdata("login") == TRUE) {

			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmemdl");
			$dtaddrecord = $this->rmemdl->simpansoapfisio($no_rm);
			$dt["dtaddrecord"] = $dtaddrecord;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}
	
	public function bukafisioperiksa() {
		$id = $this->input->get('id');
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$dtfisioperiksa = $this->rmemdl->datapemeriksaanID($id);
			$data["dtfisioperiksa"] = $dtfisioperiksa;
			$this->load->view('layanan/pelayanan/rme/formpemeriksaanfisio', $data);
		} else {
			redirect('login');
		}
	}


	public function simpandatapemeriksaan() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$id = $this->input->get('id');
			$this->load->model("rmemdl");
			$dtaddrecord = $this->rmemdl->simpanpemeriksaan($id);

			$dtlambarfisio = $this->rmemdl->panggilfisioperiksa($no_rm);
			$data['dtlambarfisio'] = $dtlambarfisio;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistpemeriksaan', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function hapusdatapemeriksaan() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$id = $this->input->get('id');
			$this->load->model("rmemdl");
			$dtaddrecord = $this->rmemdl->hapusdatapemeriksaan($id);

			$dtlambarfisio = $this->rmemdl->panggilfisioperiksa($no_rm);
			$data['dtlambarfisio'] = $dtlambarfisio;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistpemeriksaan', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}


	public function changeBackground() {
        $imageUrl = "../../assets/image/rm/fisio.png";

        // Set session data to store the image URL
        $this->session->set_userdata('background_image', $imageUrl);
    }


	//gambar

	public function saveCanvasToDatabase() {
        $data = $this->input->post('canvasData'); // Mendapatkan data gambar dari POST request
		$nolembar = $this->input->post("nolembar");

		$this->load->model("CanvasModel");

        // Panggil model untuk menyimpan data ke database
        $this->CanvasModel->saveToDatabase($data,$nolembar);

        // Respond jika penyimpanan berhasil
        echo json_encode(['status' => 'success']);
    }


	public function dtperawatedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmeigdmdl");
			$dtperawatedit = $this->rmeigdmdl->ambildatauser();

			$dt["dtperawatedit"] = $dtperawatedit;

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function panggilFormResumeMedis() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$kode_dokter = $this->input->get('kode_dokter');

			$this->load->model("rmemdl");
			$dtlambarResumeMedis = $this->rmemdl->panggillembarResumeMedis($no_rm,$notransaksi,$kode_dokter);
			$data['dtlambarResumeMedis'] = $dtlambarResumeMedis;
			

			$this->load->view('layanan/pelayanan/rme/formResumeMedis', $data);
		} else {
			redirect('login');
		}
	}

	public function panggilFormRekonsiliasi() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmeigdmdl");
			$dtobatmasuk = $this->rmeigdmdl->ObatSaatMasuk();
			$dtobatpindah = $this->rmeigdmdl->ObatSaatPindah();
			$dtobatpulang = $this->rmeigdmdl->ObatSaatPulang();
			
			$data["dtobatmasuk"] = $dtobatmasuk;
			$data["dtobatpindah"] = $dtobatpindah;
			$data["dtobatpulang"] = $dtobatpulang;
			
			$data["satu"] = 1;
			$this->load->view('layanan/pelayanan/rmeigd/formRekonsiliasiObat', $data);
		} else {
			redirect('login');
		}
	}

	public function loaddataobat() {
		$no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmeigdmdl");
			$loaddataresep = $this->rmeigdmdl->loaddataresep();
			//panggil data resep sesuai nomor transaksi
			$dtobatpindah = $this->rmeigdmdl->ObatSaatPindah();
			$data["dtobatpindah"] = $dtobatpindah;
			$dtobatpulang = $this->rmeigdmdl->ObatSaatPulang();
			$data["dtobatpulang"] = $dtobatpulang;

			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistreseprekon', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function loaddataobatpulang() {
		$no_rm = $this->input->get('no_rm');
		$notransaksi = $this->input->get('notransaksi');
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmeigdmdl");
			$loaddataresep = $this->rmeigdmdl->loaddatareseppulang();
			//panggil data resep sesuai nomor transaksi
			$dtobatpulang = $this->rmeigdmdl->ObatSaatPulang();
			$data["dtobatpulang"] = $dtobatpulang;

			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistreseprekon_pulang', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function updateData() {
		$id = $this->input->post('id');
		$tindaklanjut = $this->input->post('tindaklanjut');
		$perubahan = $this->input->post('perubahan');
		$rute = $this->input->post('rute');
		
		// Lakukan proses update ke dalam tabel emr_rekonsiliasi_obat sesuai dengan data yang diterima
		
		// Contoh: Update data menggunakan model
		$this->load->model('rmeigdmdl'); // Ganti 'RekonsiliasiObatModel' dengan nama model yang sesuai
		$this->rmeigdmdl->updateDataobatrekon($id, $tindaklanjut, $perubahan, $rute);
	
		// Response setelah pembaruan berhasil
		echo json_encode(['success' => true]);
	}

	public function simpanobatmasuk() { 
		if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmeigdmdl");
			$loaddataresep = $this->rmeigdmdl->simpanobatmasuk();
			$dtobatmasuk = $this->rmeigdmdl->ObatSaatMasuk();
			$data["dtobatmasuk"] = $dtobatmasuk;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistresepmasuk', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}
	public function hapusobatmasuk() { 
		if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmeigdmdl");
			$loaddataresep = $this->rmeigdmdl->hapusobatmasuk();
			$dtobatmasuk = $this->rmeigdmdl->ObatSaatMasuk();
			$data["dtobatmasuk"] = $dtobatmasuk;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistresepmasuk', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function hapusobatpindah() { 
		if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmeigdmdl");
			$loaddataresep = $this->rmeigdmdl->hapusobatpindah();
			$dtobatpindah = $this->rmeigdmdl->ObatSaatPindah();
			$data["dtobatpindah"] = $dtobatpindah;
			// $dtobatpulang = $this->rmeigdmdl->ObatSaatPulang();
			// $data["dtobatpulang"] = $dtobatpulang;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistreseprekon', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function hapusobatpulang() { 
		if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmeigdmdl");
			$loaddataresep = $this->rmeigdmdl->hapusobatpulang();
			// $dtobatpindah = $this->rmeigdmdl->ObatSaatPindah();
			// $data["dtobatpindah"] = $dtobatpindah;
			$dtobatpulang = $this->rmeigdmdl->ObatSaatPulang();
			$data["dtobatpulang"] = $dtobatpulang;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistreseprekon_pulang', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}
	
	public function panggilFormPersalinan() {
		if ($this->session->userdata("login") == TRUE) {

			$this->load->model("rmeigdmdl");
			$dtpersalinan = $this->rmeigdmdl->panggildatapersalinan();
			
			$data["dtpersalinan"] = $dtpersalinan;
			
			$this->load->view('layanan/pelayanan/rmeigd/formPersalinan', $data);
		} else {
			redirect('login');
		}
	}

	public function savepersalinan() {
		$this->load->model("rmeigdmdl");
        // Panggil model untuk menyimpan data ke database
        $this->rmeigdmdl->simpandatapersalinan();
        // Respond jika penyimpanan berhasil
        echo json_encode(['status' => 'success']);
    }


	public function simpanGambarAsmed() {
        $data = $this->input->post('canvasData'); // Mendapatkan data gambar dari POST request
		$no_rm = $this->input->post("no_rm");
		$notransaksi = $this->input->post("notransaksi");

		$this->load->model("CanvasModel");
        // Panggil model untuk menyimpan data ke database
        $this->CanvasModel->simpanKeTabelAsmed($data,$no_rm,$notransaksi);
        // Respond jika penyimpanan berhasil
        echo json_encode(['status' => 'success']);
    }

	public function simpanresumerajal() {
		if ($this->session->userdata("login") == TRUE) {

			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$kode_dokter = $this->input->get('kode_dokter');
			$this->load->model("rmemdl");
			$dtaddrecord = $this->rmemdl->simpanresumerajal();
			$dt["dtaddrecord"] = $dtaddrecord;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function panggilDiagnosisResume() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$kode_dokter = $this->input->get('kode_dokter');
			$this->load->model("rmemdl");
			$dtdiagnosaresume = $this->rmemdl->panggilDiagnosisResume($no_rm,$notransaksi);
			$data['dtdiagnosaresume'] = $dtdiagnosaresume;
			echo json_encode($data);
		} else {
			redirect('login');
		}
	}

	public function cetakResumeRajal($no_rm,$notransaksi,$kode_dokter) {
        if ($this->session->userdata("login") == TRUE) {
            
            $r = date("Ymd");
			$this->load->model("rmemdl");
			$dtdiagnosaresume = $this->rmemdl->panggillembarResumeMedis($no_rm,$notransaksi,$kode_dokter);

			$data['dtdiagnosaresume'] = $dtdiagnosaresume;
			$data['no_rm'] = $no_rm;
			$data['notransaksi'] = $notransaksi;
			$data['kode_dokter'] = $kode_dokter;

            // $this->load->library('pdf');
            // $this->pdf->setPaper('F4', 'potrait');
            // $this->pdf->filename = "resume".$no_rm.".pdf";
            // $this->pdf->load_view('layanan/pelayanan/rme/resume/resume_rajal', $data);
            // $this->pdf->render();
            // $this->pdf->output();
            $this->load->view('layanan/pelayanan/rme/resume/resume_rajal', $data);

        } else {
            redirect('login');
        }
    }

	public function panggilFormResikoJatuh() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtresikojatuh = $this->rmeigdmdl->panggilresikojatuh($no_rm,$notransaksi);
			$data['dtresikojatuh'] = $dtresikojatuh;
			$this->load->view('layanan/pelayanan/rmeigd/formResikoJatuhRanap', $data);
		} else {
			redirect('login');
		}
	}

	public function saveresikojatuhranap() {
		if ($this->session->userdata("login") == TRUE) {

			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$kode_dokter = $this->input->get('kode_dokter');
			$this->load->model("rmemdl");
			$this->load->model("rmeigdmdl");
			$dtaddrecord = $this->rmemdl->simpanresikojatuhranap();
			$dtresikojatuh = $this->rmeigdmdl->panggilresikojatuh($no_rm,$notransaksi);
			$data['dtresikojatuh'] = $dtresikojatuh;
			// $dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistreseprekon_pulang', $data, TRUE);
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdresikojatuh', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function hapusresikojatuhranap() { 
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
            $this->load->model("rmeigdmdl");
			$loaddataresep = $this->rmeigdmdl->hapusresikojatuhranap();
			$dtresikojatuh = $this->rmeigdmdl->panggilresikojatuh($no_rm,$notransaksi);
			$data['dtresikojatuh'] = $dtresikojatuh;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdresikojatuh', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function ambildataresiko() { 
		if ($this->session->userdata("login") == TRUE) {
			$id = $this->input->get('id');
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
            $this->load->model("rmeigdmdl");
			$dtresiko = $this->rmeigdmdl->ambildataresiko($id);
			$dt['dtresiko'] = $dtresiko;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}


	public function FormGiziRanap() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtgiziranap = $this->rmeigdmdl->panggildatagiziranap($no_rm,$notransaksi);
			$data['dtgiziranap'] = $dtgiziranap;
			$this->load->view('layanan/pelayanan/rmeigd/formGiziRanap', $data);
		} else {
			redirect('login');
		}
	}

	public function panggilFormPartograp() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');

			$this->load->model("rmemdl");
			// $dtlambarfisio = $this->rmemdl->panggillembarfisio($no_rm);
			// $data['dtlambarfisio'] = $dtlambarfisio;
			// $this->load->view('layanan/pelayanan/rme/formPartograph', $data);
		} else {
			redirect('login');
		}
	}

	public function savegisiranap() {
		if ($this->session->userdata("login") == TRUE) {

			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtaddrecord = $this->rmeigdmdl->simpangiziranap();
			$dt["dtaddrecord"] = $dtaddrecord;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function FormResumeRanap() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtresumeranap = $this->rmeigdmdl->panggilresumeranap($no_rm,$notransaksi);
			$data['dtresumeranap'] = $dtresumeranap;
			$this->load->view('layanan/pelayanan/rme/formResumeMedisRanap', $data);
		} else {
			redirect('login');
		}
	}

	public function simpanresumeranap() {
		if ($this->session->userdata("login") == TRUE) {

			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$kode_dokter = $this->input->get('kode_dokter');
			$this->load->model("rmemdl");
			$dtaddrecord = $this->rmemdl->simpanresumeranap();
			$dt["dtaddrecord"] = $dtaddrecord;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function cetakResumeRanap($no_rm,$notransaksi,$kode_dokter) {
        if ($this->session->userdata("login") == TRUE) {
            
            $r = date("Ymd");
			$this->load->model("rmeigdmdl");
			$dtdiagnosaresume = $this->rmeigdmdl->panggilcetakresumeranap($no_rm,$notransaksi);

			$data['dtdiagnosaresume'] = $dtdiagnosaresume;
			$data['no_rm'] = $no_rm;
			$data['notransaksi'] = $notransaksi;
			$data['kode_dokter'] = $kode_dokter;

            // $this->load->library('pdf');
            // $this->pdf->setPaper('F4', 'potrait');
            // $this->pdf->filename = "resume".$no_rm.".pdf";
            // $this->pdf->load_view('layanan/pelayanan/rme/resume/resume_rajal', $data);
            // $this->pdf->render();
            // $this->pdf->output();
            $this->load->view('layanan/pelayanan/rme/resume/resume_ranap', $data);

        } else {
            redirect('login');
        }
    }

	public function panggilFormAsesmenKeperawatanRanap() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
				$this->load->model("rmeigdmdl");
				$dtaskepranap = $this->rmeigdmdl->penggilaskepRanap($no_rm,$notransaksi);
				$data['dtaskepranap'] = $dtaskepranap;

			// $dtterapi = $this->rmeigdmdl->panggiltarapi($no_rm,$notransaksi);
			// $data['dtterapi'] = $dtterapi;
			$this->load->view('layanan/pelayanan/rmeigd/formAsesmenKeperawatanRanap', $data);
		} else {
			redirect('login');
		}
	}

	public function saveRanapRiwayat() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$kode_dokter = $this->input->get('kode_dokter');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtaskepigd = $this->rmeigdmdl->simpanRanapRiwayat();
			$dt["dtaskepigd"] = $dtaskepigd;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function saveRanapImunisasi() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$kode_dokter = $this->input->get('kode_dokter');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtaskepigd = $this->rmeigdmdl->simpanRanapImunisasi();
			$dt["dtaskepigd"] = $dtaskepigd;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function savePersalinanRanap() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$kode_dokter = $this->input->get('kode_dokter');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtaskepigd = $this->rmeigdmdl->simpanPersalinanRanap();
			$dt["dtaskepigd"] = $dtaskepigd;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function savefisikRanap() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$kode_dokter = $this->input->get('kode_dokter');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtaskepigd = $this->rmeigdmdl->simpanFisikRanap();
			$dt["dtaskepigd"] = $dtaskepigd;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function saveRanapAlergi() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$kode_dokter = $this->input->get('kode_dokter');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtaskepigd = $this->rmeigdmdl->simpanRanapAlergi();
			$dt["dtaskepigd"] = $dtaskepigd;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function cariDataHistori() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm_histori');
			$this->load->model("rmmdl");
			$dtrm=$this->rmmdl->caridataRM($no_rm);
			$dthistoripasien = $this->rmmdl->cariHistoriPasien($no_rm);
			$data["dthistoripasien"] = $dthistoripasien;
			$dt["dtnama_pasien"] = $dtrm->nama_pasien;;
			$dt["dtnik"] = $dtrm->nik;;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlisthistori', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}


	public function bukaFormHistoriIGD($no_rm,$nama_pasien,$kode_dokter,$notransaksi) {
		if ($this->session->userdata("login") == TRUE) {

			// $id = $this->input->post('id');
			$data["no_rm"] = $no_rm;
			$data["nama_pasien"] = $nama_pasien;
			$data["kode_dokter"] = $kode_dokter;
			$data["notransaksi"] = $notransaksi;

			$data['nama_pasien'] = $nama_pasien;
			// $data['id'] = $id;
			$cariIdIgdPasien=$this->rmmdl->cariDataIgdPasien($notransaksi);
			// $id = $this->input->post('id');
			
			$angkatab = 0;
			$editing = 1;
			// Lakukan operasi lain yang diperlukan dengan variabel ini
			// Contoh: Tampilkan variabel ke dalam view
			$this->load->model("rmmdl");
			$dataPasien = $this->rmmdl->cariDataPasienSesuaiID($id);
			$tglhistori=$dataPasien->tgl_masuk;
	
			$this->load->model("rmeigdmdl");
			
			$dtsoap = $this->rmeigdmdl->panggilsoap($no_rm,$notransaksi);
			$data['dtsoap'] = $dtsoap;

			// cek apakah apakah sudah ada recordnya, jika belum, buatkan
			$dtcek = $this->rmeigdmdl->cek_askep_saveriwayat($no_rm,$notransaksi);
	
			$dtterapi = $this->rmeigdmdl->panggiltarapi($no_rm,$notransaksi);
			$data['dtterapi'] = $dtterapi;
	
			
			$dtintegrasi = $this->rmeigdmdl->panggilintegrasi($no_rm,$notransaksi);
			$data['dtintegrasi'] = $dtintegrasi;
	
			$dtobatinfus = $this->rmeigdmdl->panggilobatinfus($no_rm,$notransaksi);
			$data['dtobatinfus'] = $dtobatinfus;
	
	
			$this->load->model("rmemdl");
			$filepasien=$this->rmemdl->datapasien($no_rm);
	
			$tgl_lahir = new DateTime($filepasien->tgl_lahir);
			$tgl_masuk = new DateTime($dataPasien->tgl_masuk);
			$selisih = $tgl_lahir->diff($tgl_masuk);
	
			$tahun = $selisih->y; // Umur dalam tahun
			$bulan = $selisih->m; // Umur dalam bulan
			$hari = $selisih->d; // Umur dalam hari
	
			
			
			$data['tgl_lahir'] = $filepasien->tgl_lahir;
			$data['umur'] = 'Umur : '.$tahun.' Tahun '.$bulan.' Bulan '.$hari.' Hari';
			
	
			$data['dataPasien'] = $dataPasien;
			$dtsoaphistory = $this->rmemdl->panggilhissoap($no_rm);
			
			// $dtassesmenhistory = $this->rmemdl->panggilhisassesmen($no_rm);
			$dtresepdetail = $this->rmemdl->panggilresepdetail($no_rm);
			$dttindakanlab = $this->rmemdl->tindakaninstalasi('LABS');
			$dttindakanrad = $this->rmemdl->tindakaninstalasi('RDGL');
			$dthasilinstalasiLAB = $this->rmemdl->panggilhisinstalasiLAB($no_rm);
			$dthasilinstalasiRAD = $this->rmemdl->panggilhisinstalasiRAD($no_rm);
	
			$dthistorydiagnosa = $this->rmemdl->panggilHistoryDiagnosa($no_rm);
			// $dtlembarkonsul = $this->rmemdl->panggilHistoryKonsul($no_rm);
			$dtlembarkonsul = $this->rmemdl->panggilHistoryKonsulRanap($no_rm,$notransaksi);
	
			$dttriase = $this->rmeigdmdl->penggildatatriase($no_rm,$notransaksi);
			$data['dttriase'] = $dttriase;
	
			$dtpulang = $this->rmeigdmdl->panggilkesimpulan($no_rm,$notransaksi);
			$data['dtpulang'] = $dtpulang;
			
			$data['dtsoaphistory'] = $dtsoaphistory;
			// $data['dtassesmenhistory'] = $dtassesmenhistory;
			$data['dtresepdetail'] = $dtresepdetail;
			$data['dttindakanlab'] = $dttindakanlab;
			$data['dttindakanrad'] = $dttindakanrad;
			$data['dthasilinstalasiLAB'] = $dthasilinstalasiLAB;
			$data['dthasilinstalasiRAD'] = $dthasilinstalasiRAD;
			$data['dthistorydiagnosa'] = $dthistorydiagnosa;
			$data['dtlembarkonsul'] = $dtlembarkonsul;
	
			$data['angkatab'] = $angkatab;
			$data['editing'] = $editing;
	
			//panggil transaksi hari ini
			if ($editing == 1) {
				$dtresepdetail_hariini = $this->rmemdl->panggilresepdetail_hariini($no_rm,$kode_dokter);
				$dtlabdetail_hariini = $this->rmemdl->panggillabdetail_hariini($no_rm,$kode_dokter);
				$dtraddetail_hariini = $this->rmemdl->panggilraddetail_hariini($no_rm,$kode_dokter);
				$dtdiag_hariini = $this->rmemdl->panggilHistoryDiagnosa_hariini($no_rm);
			} else {
				$dtresepdetail_hariini = $this->rmemdl->panggilresepdetail_historitanggal($no_rm,$kode_dokter,$tglhistori);
				$dtlabdetail_hariini = $this->rmemdl->panggillabdetail_historitanggal($no_rm,$kode_dokter,$tglhistori);
				$dtraddetail_hariini = $this->rmemdl->panggilraddetail_historitanggal($no_rm,$kode_dokter,$tglhistori);
				$dtdiag_hariini = $this->rmemdl->panggilHistoryDiagnosa_historitanggal($no_rm,$tglhistori);
			}
			$data['dtresepdetail_hariini'] = $dtresepdetail_hariini;
			$data['dtlabdetail_hariini'] = $dtlabdetail_hariini;
			$data['dtraddetail_hariini'] = $dtraddetail_hariini;
			$data['dtdiag_hariini'] = $dtdiag_hariini;
			
	
			$dtmasterracikdokter = $this->rmemdl->panggilMasterRacikDokter($kode_dokter);
			$data['dtmasterracikdokter'] = $dtmasterracikdokter;
			$data['tglhistori'] = $tglhistori;
			
			
			$data['include'] = "layanan/pelayanan/rmeigd/formpasienigdnew";
			$data['js'] = "pelayanan/rme/listurjrme";
			$data['css'] = "pelayanan/rme/listurjrme";
			$data['backhome'] = "dua";
			$this->load->view('templatesidebar/content_rme_noNav', $data);
		} else {
			redirect('login');
		}
	}
	// ================ end new igd ========

	public function FormInfeksi() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("unit");
			$unit = $this->unit->fulluri();
			$data['unit'] = $unit;

			
			
			$this->load->model("rmeigdmdl");
			$dttindakaninvasive = $this->rmeigdmdl->panggilDataInfeksi($no_rm,$notransaksi);
			$data['dttindakaninvasive'] = $dttindakaninvasive;
			
			$dtoperasiIDO = $this->rmeigdmdl->panggilDataInfeksiOperasi($no_rm,$notransaksi);
			$data['dtoperasiIDO'] = $dtoperasiIDO;

			$this->load->view('layanan/pelayanan/rmeigd/formInfeksi', $data);
		} else {
			redirect('login');
		}
	}

	public function saveDataInfeksi() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$kode_dokter = $this->input->get('kode_dokter');
			$notransaksi = $this->input->get('notransaksi');
			$tambahedit = $this->input->get('tambahedit'); //sama dengan id
			$this->load->model("rmeigdmdl");
			if ($tambahedit == 0) {
				$dtaskepigd = $this->rmeigdmdl->simpaninfeksi();
			} else {
				$dtaskepigd = $this->rmeigdmdl->updateinfeksi();
			}	
			//panggil data 
			$dttindakaninvasive = $this->rmeigdmdl->panggilDataInfeksi($no_rm,$notransaksi);
			$data['dttindakaninvasive'] = $dttindakaninvasive;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistAlatInvasive', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function hapusDataInf() {
		if ($this->session->userdata("login") == TRUE) {
			$id = $this->input->get('id');
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtaskepigd = $this->rmeigdmdl->hapusinfeksi($id);
			//panggil data 
			$dttindakaninvasive = $this->rmeigdmdl->panggilDataInfeksi($no_rm,$notransaksi);
			$data['dttindakaninvasive'] = $dttindakaninvasive;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistAlatInvasive', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function ambilDataAlatInvasive() {
		if ($this->session->userdata("login") == TRUE) {
			$id = $this->input->get('id');
			$this->load->model("rmeigdmdl");
			$dtinvasiveid = $this->rmeigdmdl->dataAlatInvasiveId($id);
			$dt["dtinvasiveid"] = $dtinvasiveid;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function saveDataIDO() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			// $kode_dokter = $this->input->get('kode_dokter');
			$notransaksi = $this->input->get('notransaksi');
			$tambahedit = $this->input->get('tambahedit'); //sama dengan id
			$this->load->model("rmeigdmdl");
			if ($tambahedit == 0) {
				$dtaskepigd = $this->rmeigdmdl->simpanoprIDO();
			} else {
				$dtaskepigd = $this->rmeigdmdl->updateinfeksi();
			}	
			//panggil data 
			$dtoperasiIDO = $this->rmeigdmdl->panggilDataInfeksiOperasi($no_rm,$notransaksi);
			$data['dtoperasiIDO'] = $dtoperasiIDO;

			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistOperasiIDO', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}
	
	public function hapusDataOprIdo() {
		if ($this->session->userdata("login") == TRUE) {
			$id = $this->input->get('id');
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtaskepigd = $this->rmeigdmdl->hapusoprido($id);
			//panggil data 
			$dtoperasiIDO = $this->rmeigdmdl->panggilDataInfeksiOperasi($no_rm,$notransaksi);
			$data['dtoperasiIDO'] = $dtoperasiIDO;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistOperasiIDO', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function FormOperasi() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("unit");
			$unit = $this->unit->fulluri();
			$data['unit'] = $unit;

			
			
			$this->load->model("rmeigdmdl");
			$dttindakaninvasive = $this->rmeigdmdl->panggilDataInfeksi($no_rm,$notransaksi);
			$data['dttindakaninvasive'] = $dttindakaninvasive;
			
			$dtoperasiIDO = $this->rmeigdmdl->panggilDataInfeksiOperasi($no_rm,$notransaksi);
			$data['dtoperasiIDO'] = $dtoperasiIDO;

			$this->load->view('layanan/pelayanan/rmeigd/formOperasi', $data);
		} else {
			redirect('login');
		}
	}

	public function cariDataPasienOperasi() {
		if ($this->session->userdata("login") == TRUE) {
			$tgl_operasi = $this->input->get('tgl_operasi');
			$no_rm_operasi = $this->input->get('no_rm_operasi');
			$this->load->model("rmmdl");
			$dtrm=$this->rmmdl->caridataRM($no_rm_operasi);
			if ($no_rm_operasi != '') { 
				$dtpasienoperasi = $this->rmmdl->cariPasienOperasiRM($tgl_operasi,$no_rm_operasi);
			} else {
				$dtpasienoperasi = $this->rmmdl->cariPasienOperasi($tgl_operasi);
			}	
			$data["dtpasienoperasi"] = $dtpasienoperasi;
			$dt["dtnama_pasien"] = $dtrm->nama_pasien;
			$dt["dtnik"] = $dtrm->nik;;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistoperasi', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function rme_form_operasi() {
		if ($this->session->userdata("login") == TRUE) {
			// $kodePoli = $this->input->get('kodePoli');

			$id = $this->input->post('id');
			$notransaksi = $this->input->post('notransaksi');
			$notransaksi_IN = $this->input->post('notransaksi_IN');
			$nama_pasien = $this->input->post('nama');
			$no_rm = $this->input->post('no_rm');
			$kode_dokter = $this->input->post('kode_dokter');
			$angkatab = $this->input->post('angkatab');
			$editing = $this->input->post('editing');

			$this->load->model("rmemdl");
			// cek apakah apakah sudah ada recordnya, jika belum, buatkan
			$dtcek = $this->rmemdl->cek_asesmen_awal_rajal($no_rm,$notransaksi);

			// Lakukan operasi lain yang diperlukan dengan variabel ini
			// Contoh: Tampilkan variabel ke dalam view
			$data['id'] = $id;
			$data['notransaksi'] = $notransaksi;
			$data['notransaksi_IN'] = $notransaksi_IN;
			$data['nama_pasien'] = $nama_pasien;

			$this->load->model("rmmdl");
			$dataPasien = $this->rmmdl->cariDataPasienSesuaiID($id);
			$tglhistori=$dataPasien->tgl_masuk;
			$this->load->model("rmemdl");
			$filepasien=$this->rmemdl->datapasien($no_rm);

			$tgl_lahir = new DateTime($filepasien->tgl_lahir);
			$tgl_masuk = new DateTime($dataPasien->tgl_masuk);
			$selisih = $tgl_lahir->diff($tgl_masuk);

			$tahun = $selisih->y; // Umur dalam tahun
			$bulan = $selisih->m; // Umur dalam bulan
			$hari = $selisih->d; // Umur dalam hari

			
			$data['tgl_lahir'] = $filepasien->tgl_lahir;
			$data['umur'] = 'Umur : '.$tahun.' Tahun '.$bulan.' Bulan '.$hari.' Hari';
			$data['dataPasien'] = $dataPasien;
			// $dtpasienoperasi = $this->rmmdl->cariPasienOperasiRM($tgl_operasi,$no_rm_operasi);
			

			$data['notransaksi'] = $notransaksi;
			$data['notransaksi_IN'] = $notransaksi_IN;
			$data['no_rm'] = $no_rm;

			$this->load->model("rmemdl");
			$dtasesopr = $this->rmemdl->panggilasesmenoperasi($notransaksi_IN,$no_rm,$notransaksi);
			$data['dtasesopr'] = $dtasesopr;

			$data['include'] = "layanan/pelayanan/rme/formoperasi";
			$data['js'] = "pelayanan/rme/listurjrme";
			$data['css'] = "pelayanan/rme/listurjrme";
			$data['backhome'] = "dua";
			$this->load->view('templatesidebar/content_rme_noNav', $data);
		} else {
			redirect('login');
		}
	}

	// public function panggilFormAsesmenOperasi() {
	// 	if ($this->session->userdata("login") == TRUE) {
	// 		$no_rm = $this->input->get('no_rm');
	// 		$notransaksi = $this->input->get('notransaksi');

	// 		$this->load->model("rmemdl");
	// 		$dtasawalrajal = $this->rmemdl->penggilassawalrajal($no_rm,$notransaksi);

	// 		$data['dtasawalrajal'] = $dtasawalrajal;

	// 		$this->load->view('layanan/pelayanan/rme/formAsesmenRajal', $data);
	// 	} else {
	// 		redirect('login');
	// 	}
	// }

	public function saveassopr() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			// Panggil model untuk menyimpan data ke database
			$this->rmemdl->simpanassopr();
			// Respond jika penyimpanan berhasil
			echo json_encode(['status' => 'success']);
		} else {
			redirect('login');
		}	
    }

	public function panggilFormInstruksiPascaOperasi() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$notransaksi_IN = $this->input->get('notransaksi_IN');

			$this->load->model("rmemdl");
			$dtinstrusipasca = $this->rmemdl->panggilinstruksiopr($no_rm,$notransaksi_IN,$notransaksi);

			$data['dtinstrusipasca'] = $dtinstrusipasca;

			$this->load->view('layanan/pelayanan/rme/operasi/formInstruksiPascaOperasi', $data);
		} else {
			redirect('login');
		}
	}

	public function savepascaoperasi() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			// Panggil model untuk menyimpan data ke database
			$this->rmemdl->simpanpascaoperasi();
			// Respond jika penyimpanan berhasil
			echo json_encode(['status' => 'success']);
		} else {
			redirect('login');
		}	
    }

	public function panggilFormLaporanOperasi() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$notransaksi_IN = $this->input->get('notransaksi_IN');

			$this->load->model("rmemdl");
			$dtlaporanopr = $this->rmemdl->panggilinstruksiopr($no_rm,$notransaksi_IN,$notransaksi);

			$this->load->model("dokter");
			$dtdokter = $this->dokter->filterdokter();
			$dtdokterasisten = $this->dokter->filterdokterasisten();
			$dtpenata = $this->dokter->filterpenata();
            $dtperawat = $this->dokter->filterperawatopr();

			$data['dtlaporanopr'] = $dtlaporanopr;
			$data['dtdokter'] = $dtdokter;
			$data['dtdokterasisten'] = $dtdokterasisten;
			$data['dtpenata'] = $dtpenata;
			$data['dtperawat'] = $dtperawat;


			$this->load->view('layanan/pelayanan/rme/operasi/formLaporanOperasi', $data);
		} else {
			redirect('login');
		}
	}

	public function savelaporanoperasi() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			// Panggil model untuk menyimpan data ke database
			$this->rmemdl->simpanlaporanoperasi();
			// Respond jika penyimpanan berhasil
			echo json_encode(['status' => 'success']);
		} else {
			redirect('login');
		}	
    }

	public function panggilObatSoap() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
			$kode_dokter = $this->input->get('kode_dokter');
			$this->load->model("rmemdl");
			$dtresepobat = $this->rmemdl->panggilObatUntukSoap($no_rm,$notransaksi,$kode_dokter);
			$data['dtresepobat'] = $dtresepobat;
			echo json_encode($data);
		} else {
			redirect('login');
		}
	}


	public function panggilFormPulang() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$notransaksi = $this->input->get('notransaksi');
				$this->load->model("rmeigdmdl");
				$dtpulang = $this->rmeigdmdl->penggildatapulang($no_rm,$notransaksi);
				$data['dtpulang'] = $dtpulang;
			$this->load->view('layanan/pelayanan/rmeigd/formPulang', $data);
		} else {
			redirect('login');
		}
	}

	
	public function savepulang() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$kode_dokter = $this->input->get('kode_dokter');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtaskepigd = $this->rmeigdmdl->simpanPulang();
			$dt["dtaskepigd"] = $dtaskepigd;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function saveNyeriAssRanap() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$kode_dokter = $this->input->get('kode_dokter');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtaskepigd = $this->rmeigdmdl->simpanNyeriAssRanap();
			$dt["dtaskepigd"] = $dtaskepigd;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function saveAskepGiziRanap() {
		if ($this->session->userdata("login") == TRUE) {
			$no_rm = $this->input->get('no_rm');
			$kode_dokter = $this->input->get('kode_dokter');
			$notransaksi = $this->input->get('notransaksi');
			$this->load->model("rmeigdmdl");
			$dtaskepigd = $this->rmeigdmdl->simpanAskepGiziRanap();
			$dt["dtaskepigd"] = $dtaskepigd;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function saveOrderHeader() {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$notransaksi = $this->input->get('notransaksi');
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$dtresep = $this->rmemdl->simpanHeaderResepbaru();
			//ambil kembali data resep
			// $detailResepHariIni = $this->rmemdl->panggilresepdetail_hariini($no_rm,$kode_dokter);
			$dtresepheader_hariini = $this->rmemdl->panggilresepheader_hariini_ranap($no_rm,$notransaksi);
			$data['dtresepheader_hariini']=$dtresepheader_hariini;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistresep_rme_ranap', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function panggilFormObat_ranap() {
		if ($this->session->userdata("login") == TRUE) {
			$id = $this->input->get('id');
			$this->load->model("rmemdl");
			$dtDetailObat = $this->rmemdl->ambilDataObat($id);
			$data["dtDetailObat"] = $dtDetailObat;
			$this->load->model("apotik");
            $data['dttakaran'] = $this->apotik->pilihtakaran();
			$data['dtcaramkn'] = $this->apotik->pilihcaramakan();
			$this->load->view('layanan/pelayanan/rme/formObatId_ranap', $data);
		} else {
			redirect('login');
		}
	}

	

	public function hapusObatRme_ranap() {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$notransaksi = $this->input->get('notransaksi');
	if ($this->session->userdata("login") == TRUE) {
		$this->load->model("rmemdl");
		$dtresep = $this->rmemdl->hapusdetailresep($this->input->get('id'));
		//ambil kembali data resep
		// $detailResepHariIni = $this->rmemdl->panggilresepdetail_hariini($no_rm,$kode_dokter);
		$dtresepheader_hariini = $this->rmemdl->panggilresepheader_hariini_ranap($no_rm,$notransaksi);

		$data['dtresepheader_hariini']=$dtresepheader_hariini;

		$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistresep_rme_ranap', $data, TRUE);
		echo json_encode($dt);
	} else {
		redirect('login');
	}
	}

	public function pilihObatId_ranap() {
		$id = $this->input->get('id');
		$kode_obat = $this->input->get('kode_obat');
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$nama_dokter = $this->input->get('nama_dokter');
		$notransaksi = $this->input->get('notransaksi');

		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("rmemdl");
			$saveObatID = $this->rmemdl->saveObatId();

			//panggil data resep hari ini
			// $detailResepHariIni = $this->rmemdl->panggilresepdetail_hariini($no_rm,$kode_dokter);
			$dtresepheader_hariini = $this->rmemdl->panggilresepheader_hariini_ranap($no_rm,$notransaksi);

			$data['dtresepheader_hariini']=$dtresepheader_hariini;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistresep_rme_ranap', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function editObatRme_ranap() {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$notransaksi = $this->input->get('notransaksi');
	if ($this->session->userdata("login") == TRUE) {
		$this->load->model("rmemdl");
		$dtresep = $this->rmemdl->ubahresep($this->input->get('id'));
		//ambil kembali data resep
		// $detailResepHariIni = $this->rmemdl->panggilresepdetail_hariini($no_rm,$kode_dokter);
		$dtresepheader_hariini = $this->rmemdl->panggilresepheader_hariini_ranap($no_rm,$notransaksi);

		$data['dtresepheader_hariini']=$dtresepheader_hariini;

		$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistresep_rme_ranap', $data, TRUE);
		echo json_encode($dt);
	} else {
		redirect('login');
	}
	}

	public function tambahOrderRacikan_ranap() { //obat racikan
		$noresep = $this->input->get('noresep');
		if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmemdl");
            $data['dtobat'] = $this->rmemdl->racikanOrder();
			$data['dttakaran'] = $this->rmemdl->pilihtakaran();
			$data['dtcaramkn'] = $this->rmemdl->pilihcaramakan();
			$data['noresep'] = $noresep;
			$this->load->view('layanan/pelayanan/rme/formTambahRacikanId_ranap', $data);
		} else {
			redirect('login');
		}
	}

	public function hapusResep_ranap() {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$notransaksi = $this->input->get('notransaksi');
		$noresep = $this->input->get('noresep');
	if ($this->session->userdata("login") == TRUE) {
		$this->load->model("rmemdl");
		$dtresep = $this->rmemdl->hapusheaderresep($noresep);
		//ambil kembali data resep
		// $detailResepHariIni = $this->rmemdl->panggilresepdetail_hariini($no_rm,$kode_dokter);
		$dtresepheader_hariini = $this->rmemdl->panggilresepheader_hariini_ranap($no_rm,$notransaksi);

		$data['dtresepheader_hariini']=$dtresepheader_hariini;

		$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistresep_rme_ranap', $data, TRUE);
		echo json_encode($dt);
	} else {
		redirect('login');
	}
	}

	public function kirimresepkeapotik() {
		$no_rm = $this->input->get('no_rm');
		$kode_dokter = $this->input->get('kode_dokter');
		$notransaksi = $this->input->get('notransaksi');
		$noresep = $this->input->get('noresep');
	if ($this->session->userdata("login") == TRUE) {
		$this->load->model("rmemdl");
		$dtresep = $this->rmemdl->sendToApotik($noresep);
		//ambil kembali data resep
		// $detailResepHariIni = $this->rmemdl->panggilresepdetail_hariini($no_rm,$kode_dokter);
		$dtresepheader_hariini = $this->rmemdl->panggilresepheader_hariini_ranap($no_rm,$notransaksi);

		$data['dtresepheader_hariini']=$dtresepheader_hariini;

		$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlistresep_rme_ranap', $data, TRUE);
		echo json_encode($dt);
	} else {
		redirect('login');
	}
	}

	public function refreshhistoryresep() {
		$no_rm = $this->input->get('no_rm');
		$this->load->model("rmemdl");
		$dtresepdetail = $this->rmemdl->panggilresepdetail($no_rm);
		$data['dtresepdetail'] = $dtresepdetail;
		$dt["dtview"] = $this->load->view('layanan/pelayanan/rme/tdlisthistoryresep', $data, TRUE);
		echo json_encode($dt);
	}


}