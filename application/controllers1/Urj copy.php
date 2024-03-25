<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Urj extends CI_Controller {

	public function index() {
		if ($this->session->userdata("login") == TRUE) {
			
			// $data['menu'] = $menu;
			
			$idUser = $this->session->userdata("idx");
			if (ceksess("PIL", $idUser) == FALSE) {
				$this->load->model("unit");
				$dtunit = $this->unit->fullurj();
			} else {
				$this->load->model("unit");
				$dtunit = $this->unit->fullurj();
			}
			$data['include'] = "layanan/pelayanan/urj/listurj";
			$data['unit'] = $dtunit;
			$data['menusamping'] = "menuurj";
			$data['backhome'] = "tiga";
			$data['js'] = "pelayanan/urj/listurj";
			$data['css'] = "pelayanan/urj/listurj";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}


	public function caripasienurj() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtpasien = $this->urjmdl->carinamapasienurj();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/urj/tdlisturj', $data);
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

			
			$this->load->view('layanan/pelayanan/urj/formprosesurj', $data);
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
			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/urj/mtdtindakan', $data, TRUE);

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

	public function layanantindakanhapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urjmdl");
			$dtsimpan = $this->urjmdl->hapuspelayanantindakan();
			$dttdtindakan = $this->urjmdl->datamtdtindakan();
			
			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/urj/mtdtindakan', $data, TRUE);

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
		// echo $this->input->post("tglmulai");
		if($this->input->post("cet") != null) {
			$this->laporanharian();
		} else if($this->input->post("cete") != null) {
			$this->laporanharianecel();
			// echo namafiletgl();
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
		$this->pdf->filename = "laporan-petanikode".$r.".pdf";
		$this->pdf->load_view('laporan/laporanregrawatjalan/laporanharian', $data);
		$this->pdf->render();
		$this->pdf->output();
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
            $data["hasil"] = $dttdbhp;

            $dt["stat"] = $dtsimpan;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/urj/mtdinstalasi', $data, TRUE);
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
			$this->load->view('layanan/pelayanan/urj/tdlisturj', $data);
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

}