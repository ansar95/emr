<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ioperasi extends CI_Controller {

	public function index() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("iopr");
			$unitinstalasi = $this->iopr->kamaropr();
			$data["unitinstalasi"] = $unitinstalasi;
			$data['include'] = "layanan/pelayanan/instalasi/operasi/dtlistopr";
			$data['menusamping'] = "menuopr";
			$data['backhome'] = "inst";
			$data['js'] = "pelayanan/instalasi/listopr";
			$data['css'] = "pelayanan/instalasi/listopr";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function panggiltambahopr() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("dokter");
			$this->load->model("iopr");
			$dtdokterpengirim = $this->dokter->datadokterpemberi();
			$dtdokterpemeriksa = $this->dokter->datadokterpemeriksa();
			$unitpelaksana = $this->iopr->fullopr();
			$data["dtdokterpengirim"] = $dtdokterpengirim;
			$data["dtdokterpemeriksa"] = $dtdokterpemeriksa;
			$data["dtunitpelaksana"] = $unitpelaksana;
			$data["formpilih"] = 0;
			$this->load->view('layanan/pelayanan/instalasi/operasi/formtambahopr', $data);
		} else {
			redirect('login');
		}
	}

	public function panggileditopr() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("dokter");
            $this->load->model("iopr");
			$unitpelaksana = $this->iopr->fullopr();
            $dtdokterpengirim = $this->dokter->datadokterpemberi();
            $dtdokterpemeriksa = $this->dokter->datadokterpemeriksa();
            $data["dtdokterpengirim"] = $dtdokterpengirim;
            $data["dtdokterpemeriksa"] = $dtdokterpemeriksa;
			$data["dtunitpelaksana"] = $unitpelaksana;
            $data["formpilih"] = 1;
            $data["dt"] = $this->iopr->ambiledit();
            $this->load->view('layanan/pelayanan/instalasi/operasi/formtambahopr', $data);
        } else {
            redirect('login');
        }
	}
	
	public function caridataopr() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("iopr");
			$dtpasien = $this->iopr->dataopr();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/instalasi/operasi/tddtlistopr', $data);
		} else {
			redirect('login');
		}
	}

	public function caridatarm() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("iopr");
			$dt["dtpasien"] = $this->iopr->pencarianrm();
			if ($this->input->get("rujuk") == "UM") {
				$this->load->model("unit");
				$dt["dtunit"] = $this->unit->fulloprfix();
			}
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function kelaspilih() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("kamarrawat");
			$dtkelas = $this->kamarrawat->pilihkamar();
			echo json_encode($dtkelas);
		} else {
			redirect('login');
		}
	}

	public function panggilformprosesopr() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("iopr");
			$dtprosesopr = $this->iopr->dtprosesopr();
			$datatindakaninstalasi = $this->iopr->datatindakaninstalasi();
			$databhpinstalasi = $this->iopr->databhpinstalasi();
			$dttdodua = $this->iopr->datamtdoduapertama();

			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->ambildatatindakanopr();
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			$this->load->model("dokter");
			$dtdokter = $this->dokter->filterdokter();
			$dtdokterasisten = $this->dokter->filterdokterasisten();
			$dtpenata = $this->dokter->filterpenata();
            $dtperawat = $this->dokter->filterperawatopr();
            $dttdhistory = $this->iopr->datamtdhistory();
            $this->load->model("unit");
            $dtunit = $this->unit->unitpindakamar("inap");


			$data["dtobat"] = $dtobat;
			$data["dtprosesopr"] = $dtprosesopr;
			$data["datatindakaninstalasi"] = $datatindakaninstalasi;
			$data["databhpinstalasi"] = $databhpinstalasi;
			$data["dttdodua"] = $dttdodua;
			$data["dttindakan"] = $dttindakan;
			$data["dtobat"] = $dtobat;
			$data["dtdokter"] = $dtdokter;
			$data["dtdokterasisten"] = $dtdokterasisten;
			$data["dtpenata"] = $dtpenata;
            $data["dtperawat"] = $dtperawat;
            $data["dttdhistory"] = $dttdhistory;
            $data["dtunit"] = $dtunit;

			$this->load->view('layanan/pelayanan/instalasi/operasi/formprosesopr', $data);
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

	public function simpanregisinstalasiopr() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("iopr");
			$dtnotrans = $this->iopr->ambilnotrans();
			$dtsimpan = $this->iopr->simpanoprbaru($dtnotrans);
			$dt["stat"] = $dtsimpan;
			$dt["dtnotrans"] = $dtnotrans[2];
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

    public function ubahregisinstalasiopr() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("iopr");
            $dtsimpan = $this->iopr->ubahopr();
            $dt["stat"] = $dtsimpan;
            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

	// manajemen Form
	public function kelolaformopr() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("dokter");
			$dtdokter = $this->dokter->filterdokter();
			$dtpenata = $this->dokter->filterpenata();
			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->ambildatatindakan();

			$data["dttindakan"] = $dttindakan;
			$data["dtdokter"] = $dtdokter;
			$data["dtpenata"] = $dtpenata;
			$data["pilihform"] = 0;

			$this->load->view('layanan/pelayanan/instalasi/operasi/prosesoprtindakan', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformopredit() {
		if ($this->session->userdata("login") == TRUE) {
		    $id = $this->input->get('id');
            $this->load->model("dokter");
            $dtdokter = $this->dokter->filterdokter();
			$dtdokterasisten = $this->dokter->filterdokterasisten();
            $dtpenata = $this->dokter->filterpenata();
            $dtperawat = $this->dokter->filterperawatopr();
			$this->load->model("iopr");
			$ptind = $this->iopr->ambiltindakanopredit($id);
            $this->load->model("tindakan");
            $dttindakan = $this->tindakan->ambildatatindakan();

            $data["dttindakan"] = $dttindakan;
            $data["dtdokter"] = $dtdokter;
			$data["dtdokterasisten"] = $dtdokterasisten;
            $data["dtpenata"] = $dtpenata;
            $data["dtperawat"] = $dtperawat;
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/instalasi/operasi/prosesoprtindakan', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformodua() {
		if ($this->session->userdata("login") == TRUE) {
			$data["pilihform"] = 0;

			$this->load->view('layanan/pelayanan/instalasi/operasi/prosesodua', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformoduaedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("iopr");
			$ptind = $this->iopr->ambileditdataodua();
			
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/instalasi/operasi/prosesodua', $data);
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
			$this->load->view('layanan/pelayanan/instalasi/operasi/prosesbhp', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformbhpedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			$this->load->model("iopr");
			$ptind = $this->iopr->ambileditdatabhp();			
			$data["dtobat"] = $dtobat;
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;
			$this->load->view('layanan/pelayanan/instalasi/operasi/prosesbhp', $data);
		} else {
			redirect('login');
		}
	}
	//===========

	// proses opr
	public function layanantindakan() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasi();
			$this->load->model("iopr");
			$dthargatindakan = $this->iopr->ambilhargatindakan();
			$dtsimpan = $this->iopr->simpantindakanopr($dtpasien, $dthargatindakan);			
			$dttdtindakan = $this->iopr->datatindakanins();
			$data["hasil"] = $dttdtindakan;
			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/operasi/tdoprtindakan', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananoprubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("iopr");
			//    $id = $this->input->get('id');
            $dthargatindakan = $this->iopr->ambilhargatindakan();
			$dtsimpan = $this->iopr->ubahpelayanantindakan($dthargatindakan);
			$dttdbhp = $this->iopr->datatindakanins();
			
			$this->load->model("dokter");
            $dtdokter = $this->dokter->filterdokter();
			$dtdokterasisten = $this->dokter->filterdokterasisten();
            $dtpenata = $this->dokter->filterpenata();
            $dtperawat = $this->dokter->filterperawatopr();
            $this->load->model("tindakan");
            $dttindakan = $this->tindakan->ambildatatindakan();

            $dataform["dttindakan"] = $dttindakan;
            $dataform["dtdokter"] = $dtdokter;
			$dataform["dtdokterasisten"] = $dtdokterasisten;
            $dataform["dtpenata"] = $dtpenata;
            $dataform["dtperawat"] = $dtperawat;


			$data["hasil"] = $dttdbhp;

			$dataform["pilihform"] = 0;



			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/operasi/tdoprtindakan', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/instalasi/operasi/prosesoprtindakan', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananoprhapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("iopr");
			$dtsimpan = $this->iopr->hapuspelayanantindakan();
			$dttdbhp = $this->iopr->datatindakanins();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/operasi/tdoprtindakan', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananodua() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasi();

			$this->load->model("iopr");
			$dtsimpan = $this->iopr->simpanpelayananodua($dtpasien);
			$dttdbhp = $this->iopr->datamtdodua();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/operasi/mtdodua', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananoduaubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("iopr");
			$dtsimpan = $this->iopr->ubahpelayananodua();
			$dttdbhp = $this->iopr->datamtdodua();
			
			$data["hasil"] = $dttdbhp;

			$dataform["pilihform"] = 0;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/operasi/mtdodua', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/instalasi/operasi/prosesodua', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananoduahapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("iopr");
			$dtsimpan = $this->iopr->hapuspelayananodua();
			$dttdbhp = $this->iopr->datamtdodua();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/operasi/mtdodua', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananbhp() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasi();

			$this->load->model("iopr");
			$dtsimpan = $this->iopr->simpanbhpopr($dtpasien);
			
			$dttdbhp = $this->iopr->datamtdbhp();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/operasi/tdoprbhp', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananbhpubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("iopr");
			$dtsimpan = $this->iopr->ubahpelayananbhp();
			$dttdbhp = $this->iopr->datamtdbhp();
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			
			$data["hasil"] = $dttdbhp;

			$dataform["dtobat"] = $dtobat;
			$dataform["pilihform"] = 0;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/operasi/tdoprbhp', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/instalasi/operasi/prosesbhp', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananbhphapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("iopr");
			$dtsimpan = $this->iopr->hapuspelayananbhp();
			$dttdbhp = $this->iopr->datamtdbhp();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/operasi/tdoprbhp', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}
	///========

	// Untuk Laporan
	public function laporanregister() {
		$this->load->model('iopr');
		$this->load->model('golongan');
		$this->load->model('unitrujukan');
		$data['unit'] = $this->iopr->unitinstalasi();
		$data['golongan'] = $this->golongan->full();
		$data['unitrujukan'] = $this->unitrujukan->ambilunitrujuk();
		$data['include'] = "laporan/laporaninstalasi";
		$data['menusamping'] = "menuopr";
		$data['backhome'] = "inst";
		$data['kode'] = "operasi";
		$data['tujuan'] = "ioperasi";
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

	public function tindakan() {
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
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporantindakanrawatinap".$r.".pdf";
		$this->pdf->load_view('laporan/laporaninstalasi/laporandaftartindakan', $data);
		$this->pdf->render();
		$this->pdf->output();
	}

	public function tindakanexcel() {
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
		$this->pdf->view('laporan/laporaninstalasi/laporandaftartindakan', $data);
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
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporantindakanrawatinap".$r.".pdf";
		$this->pdf->load_view('laporan/laporaninstalasi/laporanrekapitulasitindakan', $data);
		$this->pdf->render();
		$this->pdf->output();
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
		$this->pdf->view('laporan/laporaninstalasi/laporanrekapitulasitindakan', $data);
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
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporantindakanrawatinap".$r.".pdf";
		$this->pdf->load_view('laporan/laporaninstalasi/laporanrekapitulasikunjungan', $data);
		$this->pdf->render();
		$this->pdf->output();
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
		$this->pdf->view('laporan/laporaninstalasi/laporanrekapitulasikunjungan', $data);
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
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporantindakanrawatinap".$r.".pdf";
		$this->pdf->load_view('laporan/laporaninstalasi/laporandokterpemeriksa', $data);
		$this->pdf->render();
		$this->pdf->output();
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
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporantindakanrawatinap".$r.".pdf";
		$this->pdf->load_view('laporan/laporaninstalasi/laporandokterpengirim', $data);
		$this->pdf->render();
		$this->pdf->output();
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
            $this->load->model("iopr");
            $dtsimpan = $this->iopr->hapusinstalasi();
            $dttdbhp = $this->iopr->dataoprhapus();
            $data["hasil"] = $dttdbhp;

            $dt["stat"] = $dtsimpan;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/operasi/tddtlistopr', $data, TRUE);
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

    public function layananpindahkamar() {
        if ($this->session->userdata("login") == TRUE) {

            $this->load->model("iopr");
            $dtregis = $this->iopr->ambildatapindah();
            $dtsimpan = $this->iopr->simpanpindahkamar($dtregis);

            $dttdbhp = $this->iopr->datamtdhistorysave();
            $data["hasil"] = $dttdbhp;

            $dt["stat"] = $dtsimpan;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/operasi/mtdpindah', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function ambilpindahkamar() {
        $this->load->model("iopr");
        $data = $this->iopr->ambilkamarpindah();
        echo json_encode($data);
    }

	

}
