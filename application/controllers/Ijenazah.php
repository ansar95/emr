<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ijenazah extends CI_Controller {

	public function index() {
		if ($this->session->userdata("login") == TRUE) {
			$data['include'] = "layanan/pelayanan/instalasi/jenazah/dtlistjen";
			$data['menusamping'] = "menujen";
			$data['backhome'] = "inst";
			$data['js'] = "pelayanan/instalasi/listjen";
			$data['css'] = "pelayanan/instalasi/listjen";
			$this->load->model("ijen");
			// $unitinstalasi = $this->ijen->unitinstalasikamarjenazah();
			$unitinstalasi = $this->ijen->unitinstalasi();
			$data["unitinstalasi"] = $unitinstalasi;
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function panggiltambahjen() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("dokter");
			$dtdokterpengirim = $this->dokter->datadokterpemberi();
			$dtdokterpemeriksa = $this->dokter->datadokterpemeriksa();
			$data["dtdokterpengirim"] = $dtdokterpengirim;
			$data["dtdokterpemeriksa"] = $dtdokterpemeriksa;
			$data["formpilih"] = 0;
			$this->load->view('layanan/pelayanan/instalasi/jenazah/formtambahjen', $data);
		} else {
			redirect('login');
		}
	}

    public function panggileditjen() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("dokter");
            $this->load->model("ijen");
            $dtdokterpengirim = $this->dokter->datadokterpemberi();
            $dtdokterpemeriksa = $this->dokter->datadokterpemeriksa();
            $data["dtdokterpengirim"] = $dtdokterpengirim;
            $data["dtdokterpemeriksa"] = $dtdokterpemeriksa;
            $data["formpilih"] = 1;
            $data["dt"] = $this->ijen->ambiledit();
            $this->load->view('layanan/pelayanan/instalasi/jenazah/formtambahjen', $data);
        } else {
            redirect('login');
        }
    }

	public function caridatajen() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ijen");
			$dtpasien = $this->ijen->datajen();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/instalasi/jenazah/tddtlistjen', $data);
		} else {
			redirect('login');
		}
	}

	public function caridatarm() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ijen");
			$dtpasien = $this->ijen->pencarianrm();
			echo json_encode($dtpasien);
		} else {
			redirect('login');
		}
	}

	public function panggilformprosesjen() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ijen");
			$dtprosesjen = $this->ijen->dtprosesjen();
			$datatindakaninstalasi = $this->ijen->datatindakaninstalasi();
			$databhpinstalasi = $this->ijen->databhpinstalasi();
			$this->load->model("tindakan");
			$this->load->model("dokter");
			//$dttindakan = $this->tindakan->fullfilterunit("instalasi", "301");
			$dttindakan = $this->tindakan->ambildatatindakanjen();
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			$data["dtobat"] = $dtobat;
			$data["dtdokter"] = $this->dokter->filterdokter();
			$data["dtperawat"] = $this->dokter->dataperawat();
			$data["dtprosesjen"] = $dtprosesjen;
			$data["datatindakaninstalasi"] = $datatindakaninstalasi;
			$data["databhpinstalasi"] = $databhpinstalasi;
			$data["dttindakan"] = $dttindakan;
			$data["dtobat"] = $dtobat;
			$this->load->view('layanan/pelayanan/instalasi/jenazah/formprosesjen', $data);
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

	public function simpanregisinstalasijen() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ijen");
			$dtnotrans = $this->ijen->ambilnotrans();
			$dtsimpan = $this->ijen->simpanjenbaru($dtnotrans);
			$dt["stat"] = $dtsimpan;
			$dt["dtnotrans"] = $dtnotrans[2];
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

    public function ubahregisinstalasijen() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("ijen");
            $dtsimpan = $this->ijen->ubahjen();
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
			$dttindakan = $this->tindakan->ambildatatindakanjen();
			$data["dttindakan"] = $dttindakan;
			$data["pilihform"] = 0;
			$this->load->view('layanan/pelayanan/instalasi/jenazah/prosestindakan', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformtindakanedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->ambildatatindakanjen(); 
			$this->load->model("ijen");
			$this->load->model("dokter");
			$ptind = $this->ijen->ambileditdatatindakan();
			$data["dtdokter"] = $this->dokter->filterdokter();
			$data["dtperawat"] = $this->dokter->dataperawat();
			$data["dttindakan"] = $dttindakan;
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/instalasi/jenazah/prosestindakan', $data);
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

			$this->load->view('layanan/pelayanan/instalasi/jenazah/prosesbhp', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformbhpedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			$this->load->model("ijen");
			$ptind = $this->ijen->ambileditdatabhp();
			
			$data["dtobat"] = $dtobat;
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/instalasi/jenazah/prosesbhp', $data);
		} else {
			redirect('login');
		}
	}
	//===========

	// proses jen
	public function layanantindakan() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasi();
			$this->load->model("ijen");
			$dthargatindakan = $this->ijen->ambilhargatindakan();
			$ambilnotrans = $this->ijen->ambilnotrans();

			$dtsimpan = $this->ijen->simpantindakanjen($dtpasien, $dthargatindakan, $ambilnotrans);
			
			$dttdtindakan = $this->ijen->datatindakanins();
			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/jenazah/tdjentindakan', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanantindakanubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ijen");
			$dthargatindakan = $this->ijen->ambilhargatindakan();
			$dtsimpan = $this->ijen->ubahpelayanantindakan($dthargatindakan);
			$dttdtindakan = $this->ijen->datatindakanins();
			
			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->ambildatatindakanjen();
			
			$dataform["dttindakan"] = $dttindakan;
			$dataform["pilihform"] = 0;

			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/jenazah/tdjentindakan', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/instalasi/jenazah/prosestindakan', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanantindakanhapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ijen");
			$dtsimpan = $this->ijen->hapuspelayanantindakan();
			$dttdtindakan = $this->ijen->datatindakanins();
			
			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/jenazah/tdjentindakan', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananbhp() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasi();

			$this->load->model("ijen");
			$dtsimpan = $this->ijen->simpanbhpjen($dtpasien);
			
			$dttdbhp = $this->ijen->datamtdbhp();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/jenazah/tdjenbhp', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananbhpubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ijen");
			$dtsimpan = $this->ijen->ubahpelayananbhp();
			$dttdbhp = $this->ijen->datamtdbhp();
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			
			$data["hasil"] = $dttdbhp;

			$dataform["dtobat"] = $dtobat;
			$dataform["pilihform"] = 0;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/jenazah/tdjenbhp', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/instalasi/jenazah/prosesbhp', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananbhphapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ijen");
			$dtsimpan = $this->ijen->hapuspelayananbhp();
			$dttdbhp = $this->ijen->datamtdbhp();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/jenazah/tdjenbhp', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}
	///========

	// Untuk Laporan
	public function laporanregister() {
		$this->load->model('ijen');
		$this->load->model('golongan');
		$this->load->model('unitrujukan');
		$data['unit'] = $this->ijen->unitinstalasi();
		$data['golongan'] = $this->golongan->full();
		$data['unitrujukan'] = $this->unitrujukan->ambilunitrujuk();
		$data['include'] = "laporan/laporaninstalasi";
		$data['menusamping'] = "menujen";
		$data['backhome'] = "inst";
		$data['kode'] = "jenazah";
		$data['tujuan'] = "ijenazah";
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
            $this->load->model("ijen");
            $dtsimpan = $this->ijen->hapusinstalasi();
            $dttdbhp = $this->ijen->datajenhapus();
            $data["hasil"] = $dttdbhp;

            $dt["stat"] = $dtsimpan;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/jenazah/tddtlistjen', $data, TRUE);
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
