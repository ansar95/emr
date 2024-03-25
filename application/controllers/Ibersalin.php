<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ibersalin extends CI_Controller {

	public function index() {
		if ($this->session->userdata("login") == TRUE) {
			
			// $data['menu'] = $menu;
			
			$idUser = $this->session->userdata("idx");
			if (ceksess("PIL", $idUser) == TRUE) {
				$this->load->model("unit");
                $dtunit = $this->unit->fullbsr();
				
			} else {
				$this->load->model("unit");
                // $dtunit = $this->unit->untuktampilanunitigdperuserbersalin();
                $dtunit = $this->unit->unitkamarbersalin();
			}
			$data['include'] = "layanan/pelayanan/instalasi/bersalin/listbsr";
			$data['unit'] = $dtunit;
			$data['menusamping'] = "menubsr";
			$data['backhome'] = "inst";
			$data['js'] = "pelayanan/instalasi/listbsr";
			$data['css'] = "pelayanan/instalasi/listbsr";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function caripasienbsr() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ibsr");
			$dtpasien = $this->ibsr->carinamapasienbsr();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/instalasi/bersalin/tdlistbsr', $data);
		} else {
			redirect('login');
		}
	}

	public function panggilbsrform() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ibsr");
			$dtpasien = $this->ibsr->pasiendata();
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$dtbsrdokter = $this->dokter->filterdokter();
			$dtbsrbidan = $this->dokter->filterbidan();
            $dtperawat = $this->dokter->dataperawat();
			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->full();
			$this->load->model("unit");
			// $dtunit = $this->unit->unitpindakamar("ILAHIR");
			// $dtunit = $this->unit->fulluri();
			$dtunit = $this->unit->unitpindakamar("inap");
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();

			$this->load->model("ibsr");
			$dttdbersalin = $this->ibsr->datamtdtindakanbersalin();
			$dttdtindakan = $this->ibsr->datamtdtindakan();
			$dttdbhp = $this->ibsr->datamtdbhp();
			$dttdodua = $this->ibsr->datamtdodua();
			$dttdvisite = $this->ibsr->datamtdvisite();
			$dttddarah = $this->ibsr->datamtddarah();
			$dttdhistory = $this->ibsr->datamtdhistory();
			$dtregis = $this->ibsr->ambildatapindahlast();

			$dttdobat = $this->ibsr->datamtdobat();
			$dttdobatallcek = $this->ibsr->datamtdobatallcek();
			$ambildosis= $this->ibsr->ambildosis();

			$data["dtpasien"] = $dtpasien;
			$data["dtbsrdokter"] = $dtbsrdokter;
			$data["dtbsrbidan"] = $dtbsrbidan;
			$data["dtdokter"] = $dtdokter;
			$data["dttindakan"] = $dttindakan;
			$data["dtunit"] = $dtunit;
			$data["dtobat"] = $dtobat;
            $data["dtperawat"] = $dtperawat;

			$data["dttdbersalin"] = $dttdbersalin;
			$data["dttdtindakan"] = $dttdtindakan;
			$data["dttdbhp"] = $dttdbhp;
			$data["dttdodua"] = $dttdodua;
			$data["dttdvisite"] = $dttdvisite;
			$data["dttddarah"] = $dttddarah;
			$data["dttdhistory"] = $dttdhistory;
			$data["pindah"] = $dtregis->pindah;

			$data["dttdobat"] = $dttdobat;
			$data["dttdobatallcek"] = $dttdobatallcek;
			$data["ambildosis"] = $ambildosis;

			$this->load->view('layanan/pelayanan/instalasi/bersalin/formprosesbsr', $data);
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
	public function kelolaformtindakanbsr() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("dokter");
			$dtbsrdokter = $this->dokter->filterdokter();
			$dtbsrbidan = $this->dokter->filterbidan();
			$dtperawat = $this->dokter->dataperawat();
			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->full();
			
			$data["dtbsrdokter"] = $dtbsrdokter;
			$data["dtbsrbidan"] = $dtbsrbidan;
			$data["dttindakan"] = $dttindakan;
			$data["dtperawat"] = $dtperawat;
			
			$data["pilihform"] = 0;

			$this->load->view('layanan/pelayanan/instalasi/bersalin/prosesbsr', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformtindakanbsredit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("dokter");
			$dtbsrdokter = $this->dokter->filterdokter();
			$dtbsrbidan = $this->dokter->filterbidan();
			$dtperawat = $this->dokter->dataperawat();
			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->full();
			$this->load->model("ibsr");
			$ptind = $this->ibsr->ambileditdatatindakanbsr();
			
			$data["dtbsrdokter"] = $dtbsrdokter;
			$data["dtbsrbidan"] = $dtbsrbidan;
			$data["dttindakan"] = $dttindakan;
			$data["dtperawat"] = $dtperawat;

			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/instalasi/bersalin/prosesbsr', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformtindakan() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$dtperawat = $this->dokter->dataperawat();
			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->full();
			
			$data["dtdokter"] = $dtdokter;
			$data["dtperawat"] = $dtperawat;
			$data["dttindakan"] = $dttindakan;
			$data["pilihform"] = 0;

			$this->load->view('layanan/pelayanan/instalasi/bersalin/prosestindakan', $data);
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
			$dttindakan = $this->tindakan->full();
			$this->load->model("ibsr");
			$ptind = $this->ibsr->ambileditdatatindakan();
			
			$data["dtdokter"] = $dtdokter;
			$data["dtperawat"] = $dtperawat;
			$data["dttindakan"] = $dttindakan;
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/instalasi/bersalin/prosestindakan', $data);
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

			$this->load->view('layanan/pelayanan/instalasi/bersalin/prosesbhp', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformbhpedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			$this->load->model("ibsr");
			$ptind = $this->ibsr->ambileditdatabhp();
			
			$data["dtobat"] = $dtobat;
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/instalasi/bersalin/prosesbhp', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformodua() {
		if ($this->session->userdata("login") == TRUE) {
			$data["pilihform"] = 0;

			$this->load->view('layanan/pelayanan/instalasi/bersalin/prosesodua', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformoduaedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ibsr");
			$ptind = $this->ibsr->ambileditdataodua();
			
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/instalasi/bersalin/prosesodua', $data);
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

			$this->load->view('layanan/pelayanan/instalasi/bersalin/prosesdokter', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformdokteredit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ibsr");
			$ptind = $this->ibsr->ambileditdatadokter();
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$data["dtdokter"] = $dtdokter;
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/instalasi/bersalin/prosesdokter', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformdarah() {
		if ($this->session->userdata("login") == TRUE) {
			$data["pilihform"] = 0;

			$this->load->view('layanan/pelayanan/instalasi/bersalin/prosesdarah', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformdarahedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ibsr");
			$ptind = $this->ibsr->ambileditdatadarah();

			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/instalasi/bersalin/prosesdarah', $data);
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
	public function layanantindakanbersalin() {
		if ($this->session->userdata("login") == TRUE) {
			$no = $this->input->get("bstindakan");
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasi();
			$this->load->model("ibsr");
			$dthargatindakan = $this->ibsr->ambilhargatindakan($no);
			$dtsimpan = $this->ibsr->simpantindakanbersalin($dtpasien, $dthargatindakan);
			$dttdtindakan = $this->ibsr->datamtdtindakanbersalin();
			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/mtdtindakanbersalin', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}


			// $dtbsrdokter = $this->dokter->filterdokter();
			// $dtbsrbidan = $this->dokter->filterbidan();
			// $dtperawat = $this->dokter->filterperawat();
			// $this->load->model("tindakan");
			// $dttindakan = $this->tindakan->full();
			
			// $data["dtbsrdokter"] = $dtbsrdokter;
			// $data["dtbsrbidan"] = $dtbsrbidan;
			// $data["dttindakan"] = $dttindakan;
			// $data["dtperawat"] = $dtperawat;

	public function layanantindakanbsrubah() {
		if ($this->session->userdata("login") == TRUE) {
            $no = $this->input->get("bstindakan");
			$this->load->model("ibsr");
			$dthargatindakan = $this->ibsr->ambilhargatindakan($no);
			$dtsimpan = $this->ibsr->ubahpelayanantindakanbsr($dthargatindakan);
			$dttdtindakan = $this->ibsr->datamtdtindakanbersalin();
			
			$this->load->model("dokter");
			// $dtdokter = $this->dokter->full();
			$dtbsrdokter = $this->dokter->filterdokter();
			$dtbsrbidan = $this->dokter->filterbidan();
			$dtperawat = $this->dokter->dataperawat();

			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->full();
			
			$dataform["dtbsrdokter"] = $dtbsrdokter;
			$dataform["dtbsrbidan"] = $dtbsrbidan;
			$dataform["dttindakan"] = $dttindakan;
			$dataform["dtperawat"] = $dtperawat;
			$dataform["pilihform"] = 0;

			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/mtdtindakanbersalin', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/prosesbsr', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanantindakanbsrhapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ibsr");
			$dtsimpan = $this->ibsr->hapuspelayanantindakanbsr();
			$dttdtindakan = $this->ibsr->datamtdtindakanbersalin();
			
			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/mtdtindakanbersalin', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanantindakan() {
		if ($this->session->userdata("login") == TRUE) {
			$no = $this->input->get("tdtindakan");
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasi();
			$this->load->model("ibsr");
			$dthargatindakan = $this->ibsr->ambilhargatindakan($no);
			$dtsimpan = $this->ibsr->simpanpelayanantindakan($dtpasien, $dthargatindakan);
			$dttdtindakan = $this->ibsr->datamtdtindakan();
			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/mtdtindakan', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanantindakanubah() {
		if ($this->session->userdata("login") == TRUE) {
            $no = $this->input->get("tdtindakan");
			$this->load->model("ibsr");
			$dthargatindakan = $this->ibsr->ambilhargatindakan($no);
			$dtsimpan = $this->ibsr->ubahpelayanantindakan($dthargatindakan);
			$dttdtindakan = $this->ibsr->datamtdtindakan();
			
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$dtperawat = $this->dokter->dataperawat();
			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->full();
			
			$dataform["dtdokter"] = $dtdokter;
			$dataform["dtperawat"] = $dtperawat;
			$dataform["dttindakan"] = $dttindakan;
			$dataform["pilihform"] = 0;

			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/mtdtindakan', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/prosestindakan', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanantindakanhapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ibsr");
			$dtsimpan = $this->ibsr->hapuspelayanantindakan();
			$dttdtindakan = $this->ibsr->datamtdtindakan();
			
			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/mtdtindakan', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananbhp() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasi();

			$this->load->model("ibsr");
			$dtsimpan = $this->ibsr->simpanpelayananbhp($dtpasien);
			
			$this->load->model("ibsr");
			$dttdbhp = $this->ibsr->datamtdbhp();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/mtdbhp', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananbhpubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ibsr");
			$dtsimpan = $this->ibsr->ubahpelayananbhp();
			$dttdbhp = $this->ibsr->datamtdbhp();
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			
			$data["hasil"] = $dttdbhp;

			$dataform["dtobat"] = $dtobat;
			$dataform["pilihform"] = 0;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/mtdbhp', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/prosesbhp', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananbhphapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ibsr");
			$dtsimpan = $this->ibsr->hapuspelayananbhp();
			$dttdbhp = $this->ibsr->datamtdbhp();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/mtdbhp', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananodua() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasi();

			$this->load->model("ibsr");
			$dtsimpan = $this->ibsr->simpanpelayananodua($dtpasien);
			
			$this->load->model("ibsr");
			$dttdbhp = $this->ibsr->datamtdodua();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/mtdodua', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananoduaubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ibsr");
			$dtsimpan = $this->ibsr->ubahpelayananodua();
			$dttdbhp = $this->ibsr->datamtdodua();
			
			$data["hasil"] = $dttdbhp;

			$dataform["pilihform"] = 0;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/mtdodua', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/prosesodua', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananoduahapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ibsr");
			$dtsimpan = $this->ibsr->hapuspelayananodua();
			$dttdbhp = $this->ibsr->datamtdodua();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/mtdodua', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanandokter() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasi();
			$this->load->model("unit");
			$dtunit = $this->unit->untukambilkodekelas();
			$this->load->model("ibsr");
			$dtsimpan = $this->ibsr->simpanpelayanandokter($dtpasien, $dtunit);

			$dttdbhp = $this->ibsr->datamtdvisite();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/mtddokter', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanandokterubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ibsr");
			$dtsimpan = $this->ibsr->ubahpelayanandokter();
			$dttdbhp = $this->ibsr->datamtdvisite();
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			
			$data["hasil"] = $dttdbhp;

			$dataform["dtdokter"] = $dtdokter;
			$dataform["pilihform"] = 0;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/mtddokter', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/prosesdokter', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanandokterhapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ibsr");
			$dtsimpan = $this->ibsr->hapuspelayanandokter();
			$dttdbhp = $this->ibsr->datamtdvisite();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/mtddokter', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanandarah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasi();

			$this->load->model("ibsr");
			$dtsimpan = $this->ibsr->simpanpelayanandarah($dtpasien);

			$dttdbhp = $this->ibsr->datamtddarah();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/mtdkantong', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanandarahubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ibsr");
			$dtsimpan = $this->ibsr->ubahpelayanandarah();
			$dttdbhp = $this->ibsr->datamtddarah();
			
			$data["hasil"] = $dttdbhp;

			$dataform["pilihform"] = 0;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/mtdkantong', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/prosesdarah', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanandarahhapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ibsr");
			$dtsimpan = $this->ibsr->hapuspelayanandarah();
			$dttdbhp = $this->ibsr->datamtddarah();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/mtdkantong', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananpindahkamar() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ibsr");
			$dtregis = $this->ibsr->ambildatapindah();
			$dtsimpan = $this->ibsr->simpanpindahkamar($dtregis);

			$dttdbhp = $this->ibsr->datamtdhistory();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/mtdpindah', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	// data hapus instlasi

    public function hapusinstalasi() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("ibsr");
            $dtsimpan = $this->ibsr->hapusinstalasi();
            $dttdbhp = $this->ibsr->databersalinhapus();
            $data["hasil"] = $dttdbhp;

            $dt["stat"] = $dtsimpan;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/instalasi/bersalin/tdlistbsr', $data, TRUE);
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

    public function ambilpindahkamar() {
        $this->load->model("ibsr");
        $data = $this->ibsr->ambilkamarpindah();
        echo json_encode($data);
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

	public function simpanpelayananobat($dtpasien) {
		$date = date_create($this->input->get("obattgl"));
		$tgl = date_format($date,"Y-m-d");
		list($kdobat, $idobat) = explode("_", $this->input->get("obatobat"), 2);
		$notrxnya=$this->input->get("notrans");
		$kode_unitnya = $this->input->get("unit");
		$qry2=$this->db->query("select noresep from resep_header where notraksaksi='$notrxnya' and kode_unit='$kode_unitnya' limit 1 ");
		$ada=$qry2->num_rows();
		foreach ($qry2->result_array() as $brs9) {
            $noresepnya=$brs9['noresep'];
        }

		// $noresepnya=$this->input->get("norep");
		// if ($noresepnya == NULL) {
		if ($ada == 0 ){
			// $vn=$this->input->get("notrans");
			// // $tgl = date("Y-m-d");
			// printf($v);
			// printf($vn);
			$this->db->from("mresepnumber");
			$this->db->where("tgltransaksi", $tgl);
			$this->db->limit(1);
			$data = $this->db->get();
			if ($data->result() == NULL) {
				$numstart = 1;
				$numdate = str_replace("-", "", $tgl);
				$numend = sprintf("%05d", $numstart);
				$numgabung = "AP" . substr($numdate, 2) . $numend;
				// return array($tgl, $numstart, $numgabung);
				$qry2=$this->db->query("insert into mresepnumber(tgltransaksi,no) VALUES ('$tgl','$numstart')");;
			} else {
				$t = $data->row();
				$numstart = $t->no + 1;
				$numdate = str_replace("-", "", $tgl);
				$numend = sprintf("%05d", $numstart);
				$numgabung = "AP" . substr($numdate, 2) . $numend;
				// return array($tgl, $numstart, $numgabung);
				$qry2=$this->db->query("update mresepnumber set no='".$numstart."' where tgltransaksi='$tgl' limit 1");
			}
			$noresep= $numgabung;
			
			$datasimpanheader = array(
				'noresep' => $noresep, 
				'no_rm' => $this->input->get("irm"), 
				'rirj' => 'RJ', 
				'tglresep' => $this->input->get("obattgl"), 
				'kode_unit' => $this->input->get("unit"), 
				'nama_unit' => $this->input->get("unittext"),
				'kode_dokter' => $this->input->get("kode_dokter"),
				'nama_dokter' => $this->input->get("nama_dokter"),
				'idnoresep' => 0, 
				'idgolongan' => 0, 
				'nosjp' => '', 
				'notraksaksi' =>$this->input->get("notrans"),
				'user' => $this->session->userdata("nmuser"),
				'user2' => $this->session->userdata("nmuser"),
				'nama_umum' => $this->input->get("nama_umum"),
				'kode_depo' => 'APTK',
				'nama_depo' => 'APOTIK',
				'shift' => 'PAGI',
				'type' =>'Umum',
				'lastlogin' => date("Y-m-d H:i:s")
			);
			$this->db->insert('resep_header', $datasimpanheader);		
		} else { $noresep=$noresepnya;}
		$datasimpan = array(
			'noresep' => $noresep, 
			'idobat' => $this->input->get("obatobat"), 
			'namaobat' => $this->input->get("obatobattext"), 
			'qty' => $this->input->get("obatqty"), 
			'satuanpakai' => $this->input->get("obatstauan"), 
			'hargapakai' => $this->input->get("obatharga"),
			'tuslag' => 0,
			'jumlah' => $this->input->get("obatqty")*$this->input->get("obatharga"),
			'dosis' => $this->input->get("dosis"), 
			'catatanresep' =>$this->input->get("catatanresep"),
			'user' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s")
		);

		$dt = $this->db->insert('resep_detail', $datasimpan);
		return $dt;
		// return array($dt, $noresep);
	
	}

	public function ambilnoresep() {
        //sdh digabung diatas
    }
			

	public function simpanbayilahir() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ibsr");
			$dtsimpan = $this->ibsr->simpandatabayi();
			$dt["stat"] = $dtsimpan;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}
	
}
