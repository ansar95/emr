<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uri extends CI_Controller {

	public function index() {
		if ($this->session->userdata("login") == TRUE) {
			
			// $data['menu'] = $menu;
			
			$idUser = $this->session->userdata("idx");
			if (ceksess("PIL", $idUser) == FALSE) {
				$this->load->model("unit");
				$dtunit = $this->unit->fulluri_unit();
			} else {
				$this->load->model("unit");
				$dtunit = $this->unit->fulluri_unit();
			}
			$data['include'] = "layanan/pelayanan/uri/listuri";
			$data['unit'] = $dtunit;
			$data['menusamping'] = "menuuri";
			$data['backhome'] = "tiga";
			$data['js'] = "pelayanan/uri/listuri";
			$data['css'] = "pelayanan/uri/listuri";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function caripasienuri() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$dtpasien = $this->urimdl->carinamapasienuri();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/uri/tdlisturi', $data);
		} else {
			redirect('login');
		}
	}

	public function panggiluribillingform() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$dtid = explode("_", $this->input->get("id"));
			$data["dtidp"] = $dtid[0];
			$data["dtnotrans"] = $dtid[1];
			$data["databilling"] = $this->urimdl->geibillingdata($dtid[0]);

			$this->load->view('layanan/pelayanan/uri/formBilling', $data);
		} else {
			redirect('login');
		}
	}

	public function panggilurjestimasiform() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$id = $this->input->get("id");
			$data["dtidp"] = $id;
			$data["dataEstimasi"] = $this->urimdl->getestimatedata($id);

			$this->load->view('layanan/pelayanan/uri/formEstimasi', $data);
		} else {
			redirect('login');
		}
	}

	public function panggilurjdokterform() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("dokter");
            $dtdokter = $this->dokter->full();
			$dtid = explode("_", $this->input->get("id"));
			$data["dtdokter"] = $dtdokter;
			$data["dtidp"] = $dtid[0];
			$data["dtkode"] = $dtid[1];

			$this->load->view('layanan/pelayanan/uri/formpilihdokter', $data);
		} else {
			redirect('login');
		}
	}

    public function panggilurjkamarform() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("kamarrawat");
            $this->load->model("unit");
            $this->load->model("urimdl");
            $dtkamar = $this->kamarrawat->kamar();
			$dtunit = $this->unit->unitpindakamar("inap"); 
            $dtid = explode("_", $this->input->get("id"));
			$idregdetail=$dtid[0];
			$kode_kelas_hak=$this->urimdl->kelashak($idregdetail);
			// $kode_kelas_hak=$this->urimdl->kelashak();
            $data["dtkamar"] = $dtkamar;
            $data["dtunit"] = $dtunit;
            $data["dtidp"] = $dtid[0];
            $data["dtkode"] = $dtid[1];
            $data["dtkodekelashak"] = $kode_kelas_hak;

            $this->load->view('layanan/pelayanan/uri/formpilihkamar', $data);
        } else {
            redirect('login');
        }
    }


    public function gettitipan() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("urimdl");
            $dtid = explode("_", $this->input->post("id"));
			$idregdetail=$dtid[0];
			$kode_kelas_hak=$this->urimdl->kelashak($idregdetail);
			// $kode_kelas_hak=$this->urimdl->kelashak();
            $data["dtkodekelashak"] = $kode_kelas_hak;
            echo json_encode($data);
        } else {
            redirect('login');
        }
    }

	

	public function prosesbillinglisturi() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$hasil = $this->urimdl->getcollectbilling();
			echo json_encode($hasil);
		} else {
			redirect('login');
		}
	}

	public function simpanestimasiregis() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$dtubah = $this->urimdl->gantiestimasi();
			$dtpasien = $this->urimdl->carinamapasienuri();

			$data["hasil"] = $dtpasien;

			$dt["dtubah"] = $dtubah;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/tdlisturi', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function simpandkterregis() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$dtubah = $this->urimdl->gantidokter();
			$dtpasien = $this->urimdl->carinamapasienuri();
			
			$data["hasil"] = $dtpasien;

			$dt["dtubah"] = $dtubah;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/tdlisturi', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

    public function simpankamarregis() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("urimdl");
            $dtubah = $this->urimdl->gantikamar();
            $dtpasien = $this->urimdl->carinamapasienuri();

            $data["hasil"] = $dtpasien;

            $dt["dtubah"] = $dtubah;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/uri/tdlisturi', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

	public function panggiltarikdata() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("unit");
			$dtunit = $this->unit->untuktarikpasien();
			$data["dtunit"] = $dtunit;
			$this->load->view('layanan/pelayanan/uri/formtarikpasien', $data);
		} else {
			redirect('login');
		}
	}

    public function simpantarikpasien() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("urimdl");
            // $dtubah = $this->urimdl->gantikamar();

            $dtcek = $this->urimdl->cekkdatapasien();
			$dtubah="";
			if ($dtcek > 0) {
            	$dtubah = $this->urimdl->tarikdatapasien();
			}
            $dtpasien = $this->urimdl->carinamapasienuri();
            $data["hasil"] = $dtpasien;
			$dt["dtcek"] = $dtcek;
            $dt["dtubah"] = $dtubah;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/uri/tdlisturi', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }
	

	public function panggiluriform() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$dtpasien = $this->urimdl->pasiendata();
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$dtperawat = $this->dokter->dataperawat();
			$this->load->model("tindakan");
            $dttindakan = $this->tindakan->fullfilter("inap");
			$this->load->model("unit");
			$dtunit = $this->unit->unitpindakamar("inap");
            $dtunitrujukan = $this->unit->untuktujuanperawatanregis("jalan");
			$dtkirimins = $this->unit->unitkiriminstalasi();
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			$this->load->model("datapulang");
			$carakeluar = $this->datapulang->ambilcarakeluar();
			$this->load->model("kondisi");
			$kondisikeluar = $this->kondisi->ambilkondisi();
			$kondisikeluarrm = $this->kondisi->ambilkondisirm();

			$this->load->model("urimdl");
			$dttdtindakan = $this->urimdl->datamtdtindakan();
			$dttdbhp = $this->urimdl->datamtdbhp();
			$dttdobat = $this->urimdl->datamtdobat();
			$dttdobatallcek = $this->urimdl->datamtdobatallcek();
			$dttdodua = $this->urimdl->datamtdodua();
			$dttdvisite = $this->urimdl->datamtdvisite();
			$dttddarah = $this->urimdl->datamtddarah();
            $dtregis = $this->urimdl->ambildatapindahlast();
			$dttdhistory = $this->urimdl->datamtdhistory();
            $dttdhistoryrujukanpoly = $this->urimdl->datamtdhistoryrujukanpoly();
			$dttdinst = $this->urimdl->datainst();

            $tindakanlab = $this->urimdl->tindakanlab();
            $tindakanrad = $this->urimdl->tindakanrad();
            $tindakanhem = $this->urimdl->tindakanhem();
            $tindakanopr = $this->urimdl->tindakanopr();
            $tindakanbsr = $this->urimdl->tindakanbsr();
			$ambildosis= $this->urimdl->ambildosis();
			//tambahan diagnosa
			$this->load->model("rmmdl");
			$data["diagnosa"] = $this->rmmdl->ambilicd();
            $data["diagdata"] = $this->rmmdl->datadiagnosaread($dtpasien->notransaksi);

			$data["dtpasien"] = $dtpasien;
			$data["dtdokter"] = $dtdokter;
			$data["dttindakan"] = $dttindakan;
			$data["dtunit"] = $dtunit;
            $data["dtunitrujukan"] = $dtunitrujukan;
			$data["dtobat"] = $dtobat;

			$data["dttdtindakan"] = $dttdtindakan;
			$data["dttdbhp"] = $dttdbhp;
			$data["dttdobat"] = $dttdobat;
			$data["dttdobatallcek"] = $dttdobatallcek;
			$data["dttdodua"] = $dttdodua;
			$data["dttdvisite"] = $dttdvisite;
			$data["dttddarah"] = $dttddarah;
            $data["pindah"] = $dtregis->pindah;
			$data["dttdhistory"] = $dttdhistory;
            $data["dttdhistoryrujukanpoly"] = $dttdhistoryrujukanpoly;
			$data["carakeluar"] = $carakeluar;
			$data["kondisikeluar"] = $kondisikeluar;
			$data["kondisikeluarrm"] = $kondisikeluarrm;
			$data["dttdinst"] = $dttdinst;
			$data["dtkirimins"] = $dtkirimins;
			$data["dtperawat"] = $dtperawat;

            $data["tindakanlab"] = $tindakanlab;
            $data["tindakanrad"] = $tindakanrad;
            $data["tindakanhem"] = $tindakanhem;
            $data["tindakanopr"] = $tindakanopr;
            $data["tindakanbsr"] = $tindakanbsr;
			$data["ambildosis"] = $ambildosis;

			$this->load->view('layanan/pelayanan/uri/formprosesuri', $data);
		} else {
			redirect('login');
		}
	}

    public function untukpilihantindakan() {
        $this->load->model("tindakan");
        $data = $this->tindakan->pilihtindakansatuan();
        echo json_encode($data);
    }

	public function cekdiagnosanya() {
        $this->load->model("urimdl");
        $data = $this->urimdl->cekdiagnosaada();
        echo json_encode($data);
    }

	// manajemen Form
	public function kelolaformtindakan() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$dtperawat = $this->dokter->dataperawat();
			$this->load->model("tindakan");
            $dttindakan = $this->tindakan->fullfilter("inap");
			
			$data["dtdokter"] = $dtdokter;
			$data["dttindakan"] = $dttindakan;
			$data["pilihform"] = 0;
			$data["dtperawat"] = $dtperawat;

			$this->load->view('layanan/pelayanan/uri/prosestindakan', $data);
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
            $dttindakan = $this->tindakan->fullfilter("inap");
			$this->load->model("urimdl");
			$ptind = $this->urimdl->ambileditdatatindakan();
			
			$data["dtdokter"] = $dtdokter;
			$data["dttindakan"] = $dttindakan;
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;
			$data["dtperawat"] = $dtperawat;

			$this->load->view('layanan/pelayanan/uri/prosestindakan', $data);
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

			$this->load->view('layanan/pelayanan/uri/prosesbhp', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformbhpedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			$this->load->model("urimdl");
			$ptind = $this->urimdl->ambileditdatabhp();
			
			$data["dtobat"] = $dtobat;
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/uri/prosesbhp', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformodua() {
		if ($this->session->userdata("login") == TRUE) {
			$data["pilihform"] = 0;

			$this->load->view('layanan/pelayanan/uri/prosesodua', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformoduaedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$ptind = $this->urimdl->ambileditdataodua();
			
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/uri/prosesodua', $data);
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

			$this->load->view('layanan/pelayanan/uri/prosesdokter', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformdokteredit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$ptind = $this->urimdl->ambileditdatadokter();
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$data["dtdokter"] = $dtdokter;
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/uri/prosesdokter', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformdarah() {
		if ($this->session->userdata("login") == TRUE) {
			$data["pilihform"] = 0;

			$this->load->view('layanan/pelayanan/uri/prosesdarah', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformdarahedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$ptind = $this->urimdl->ambileditdatadarah();

			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/uri/prosesdarah', $data);
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
			$dtpasien = $this->pasien->ambildataregistrasi();
			$this->load->model("urimdl");
			$dthargatindakan = $this->urimdl->ambilhargatindakan();
			$dtsimpan = $this->urimdl->simpanpelayanantindakan($dtpasien, $dthargatindakan);
			$dttdtindakan = $this->urimdl->datamtdtindakan();
			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdtindakan', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanantindakanubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$dthargatindakan = $this->urimdl->ambilhargatindakan();
			$dtsimpan = $this->urimdl->ubahpelayanantindakan($dthargatindakan);
			$dttdtindakan = $this->urimdl->datamtdtindakan();
			
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$dtperawat = $this->dokter->dataperawat();
			$this->load->model("tindakan");
            $dttindakan = $this->tindakan->fullfilter("inap");
			
			$dataform["dtdokter"] = $dtdokter;
			$dataform["dttindakan"] = $dttindakan;
			$dataform["pilihform"] = 0;
			$dataform["dtperawat"] = $dtperawat;

			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdtindakan', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/uri/prosestindakan', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanantindakanhapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$dtsimpan = $this->urimdl->hapuspelayanantindakan();
			$dttdtindakan = $this->urimdl->datamtdtindakan();
			
			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdtindakan', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananobat() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasiforpoli();

			$this->load->model("urimdl");
			$dtsimpan = $this->urimdl->simpanpelayananobat($dtpasien);
			$dttdobat = $this->urimdl->datamtdobat();
			$dtcarinoresep = $this->urimdl->datanoresep();
			$dtnoresep = $dtcarinoresep->noresep;
			$data["hasil"] = $dttdobat;

			$dt["noresep"] = $dtnoresep ;
			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdobat', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananbhp() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasi();

			$this->load->model("urimdl");
			$dtsimpan = $this->urimdl->simpanpelayananbhp($dtpasien);
			$dttdbhp = $this->urimdl->datamtdbhp();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdbhp', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananbhpubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$dtsimpan = $this->urimdl->ubahpelayananbhp();
			$dttdbhp = $this->urimdl->datamtdbhp();
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			
			$data["hasil"] = $dttdbhp;

			$dataform["dtobat"] = $dtobat;
			$dataform["pilihform"] = 0;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdbhp', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/uri/prosesbhp', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananbhphapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$dtsimpan = $this->urimdl->hapuspelayananbhp();
			$dttdbhp = $this->urimdl->datamtdbhp();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdbhp', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananobathapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$dtsimpan = $this->urimdl->hapuspelayananobat();
			$dttdobat = $this->urimdl->datamtdobat();
			$data["hasil"] = $dttdobat;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdobat', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}


	public function layananodua() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasi();

			$this->load->model("urimdl");
			$dtsimpan = $this->urimdl->simpanpelayananodua($dtpasien);
			$dttdbhp = $this->urimdl->datamtdodua();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdodua', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananoduaubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$dtsimpan = $this->urimdl->ubahpelayananodua();
			$dttdbhp = $this->urimdl->datamtdodua();
			
			$data["hasil"] = $dttdbhp;

			$dataform["pilihform"] = 0;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdodua', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/uri/prosesodua', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananoduahapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$dtsimpan = $this->urimdl->hapuspelayananodua();
			$dttdbhp = $this->urimdl->datamtdodua();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdodua', $data, TRUE);

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
			$this->load->model("urimdl");
			$dtsimpan = $this->urimdl->simpanpelayanandokter($dtpasien, $dtunit);

			$dttdbhp = $this->urimdl->datamtdvisite();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtddokter', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanandokterubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$dtsimpan = $this->urimdl->ubahpelayanandokter();
			$dttdbhp = $this->urimdl->datamtdvisite();
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			
			$data["hasil"] = $dttdbhp;

			$dataform["dtdokter"] = $dtdokter;
			$dataform["pilihform"] = 0;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtddokter', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/uri/prosesdokter', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanandokterhapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$dtsimpan = $this->urimdl->hapuspelayanandokter();
			$dttdbhp = $this->urimdl->datamtdvisite();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtddokter', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanandarah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasi();

			$this->load->model("urimdl");
			$dtsimpan = $this->urimdl->simpanpelayanandarah($dtpasien);
			$dttdbhp = $this->urimdl->datamtddarah();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdkantong', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanandarahubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$dtsimpan = $this->urimdl->ubahpelayanandarah();
			$dttdbhp = $this->urimdl->datamtddarah();
			
			$data["hasil"] = $dttdbhp;

			$dataform["pilihform"] = 0;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdkantong', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/uri/prosesdarah', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanandarahhapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("urimdl");
			$dtsimpan = $this->urimdl->hapuspelayanandarah();
			$dttdbhp = $this->urimdl->datamtddarah();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdkantong', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananpindahkamar() {
		if ($this->session->userdata("login") == TRUE) {
			// $this->load->model("pasien");
			// $dtpasien = $this->pasien->ambildataregistrasi();

			$this->load->model("urimdl");
			$dtregis = $this->urimdl->ambildatapindah();
			$dtsimpan = $this->urimdl->simpanpindahkamar($dtregis);
			$dtpasien = $this->urimdl->carinamapasienuri();
			

			$dttdbhp = $this->urimdl->datamtdhistory();
			$data["hasilpindah"] = $dttdbhp;
			$data["pindah"] = $dtsimpan[1];
			$data["hasil"] = $dtpasien;

			$dt["stat"] = $dtsimpan;
			// $dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdpindah', $data, TRUE);
			// $dt["dtviewuri"] =$this->load->view('layanan/pelayanan/uri/tdlisturi', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

    public function layananrujukanpoli() {
        if ($this->session->userdata("login") == TRUE) {
            // $this->load->model("pasien");
            // $dtpasien = $this->pasien->ambildataregistrasi();

            $this->load->model("urimdl");
            $dtrujukanpoli = $this->urimdl->ambildatarujukanpoli();
            $dtsimpan = $this->urimdl->simpanrujukanpoli($dtrujukanpoli);

            $historyrujukanpoly = $this->urimdl->datamtdhistoryrujukanpoly();
            $data["hasil"] = $historyrujukanpoly;

            $dt["stat"] = $dtsimpan;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdrujukpoli', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

	// untuk laporan
	public function laporanregister() {
		$this->load->model('unit');
		$this->load->model('golongan');
		$data['unit'] = $this->unit->full();
		$data['golongan'] = $this->golongan->full();
		$data['menusamping'] = "menuuri";
		$data['backhome'] = "tiga";
		$data['include'] = "laporan/laporanregrawatinap";
		$data['js'] = "laporan/laporanregrawatinap/laporanharian";
		$data['css'] = "laporan/datepickerselectdua";
		$this->load->view('templatesidebar/content', $data);
	}

	public function panggilcetak() {
		if($this->input->post("cet") != null) {
			$this->laporanharian();
		} else if($this->input->post("cete") != null) {
			$this->laporanharianecel();
		} else if($this->input->post("cetrawat") != null) {
			$this->laporantindakan();
		} else if($this->input->post("ceterawat") != null) {
			$this->laporantindakanexcel();
		}
	}

	public function laporanharian() {
		$r = date("Ymd");
		$this->load->model('lapregrawatinap');
		$data['l'] = $this->lapregrawatinap->ambilharian();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "rawatinap".$r.".pdf";
		$this->load->view('laporan/laporanregrawatinap/laporanharian', $data);
		// $this->pdf->load_view('laporan/laporanregrawatinap/laporanharian', $data);
		// $this->pdf->render();
		// $this->pdf->output();
	}

	public function laporanharianecel() {
		$this->load->model('lapregrawatinap');
		$data['l'] = $this->lapregrawatinap->ambilharian();
		$this->load->view('laporan/laporanregrawatinap/excel/laporanharian', $data);
	}

	public function laporantindakan() {
		$r = date("Ymd");
		$this->load->model('lapregrawatinap');
		$lunit = $this->lapregrawatinap->ambilunit();
		$g = [];
		foreach($lunit as $row) {
			$y = $row->unit;
			$yk = $row->kode_unit;
			$g[] = array (
				"unit" => $y,
				"data" => $this->lapregrawatinap->ambiltindakan($yk)
			); 
		}
		$data['l'] = $g;
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporantindakanrawatinap".$r.".pdf";
		$this->pdf->load_view('laporan/regrawatinap/laporantindakan', $data);
		$this->pdf->render();
		$this->pdf->output();
	}

	public function laporantindakanexcel() {
		$this->load->model('lapregrawatinap');
		$lunit = $this->lapregrawatinap->ambilunit();
		$g = [];
		foreach($lunit as $row) {
			$y = $row->unit;
			$yk = $row->kode_unit;
			$g[] = array (
				"unit" => $y,
				"data" => $this->lapregrawatinap->ambiltindakan($yk)
			); 
		}
		$data['l'] = $g;
		$this->load->view('laporan/laporanregrawatinap/excel/laporantindakan', $data);
	}
	// ====================
	
	public function simpankiriminstalasi() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("irad");
			$this->load->model("urimdl");
			$dtnotrans = $this->irad->ambilnotrans();
			$dtsimpan = $this->urimdl->simpaninstalasi($dtnotrans);
            $dttdbhp = $this->urimdl->datainst();
            $data["hasil"] = $dttdbhp;

            $dt["stat"] = $dtsimpan;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdinstalasi', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

    public function hapuskiriminstalasi() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("urimdl");
            $dtsimpan = $this->urimdl->hapusinstalasi();
            $dttdbhp = $this->urimdl->datainst();
            $data["hasil"] = $dttdbhp;

            $dt["stat"] = $dtsimpan;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/uri/mtdinstalasi', $data, TRUE);
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
  
	public function prosessimpandiagnosa() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("urimdl");
            $notrans = $this->input->get("notrans");
            $datasimpan = $this->urimdl->simpandiagnosa();
            $dataform["diagnosa"] = $this->urimdl->datadiagnosa();
            $dataform["form"] = 0;
            $data["diagdata"] = $this->urimdl->datadiagnosaread($notrans);
            $dt["stat"] = $datasimpan;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/uri/kondisitddiagnosa', $data, TRUE);
            $dt["dtform"] = $this->load->view('layanan/pelayanan/uri/proseskondisidiagnosa', $dataform, TRUE);
            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

	public function tampilkanpilihandiagnosa() {

        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmmdl");
            $diag = $this->input->get("diagnosa");
            // $data = $this->rmmdl->datadiagnosabaris($diag);
            $data = $this->rmmdl->datadiagnosabaris2($diag);

            $dt["stat"] = true;
            $dt["data"] = $data;

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

	public function proseshapusdiagnosa() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("urimdl");
            $notrans = $this->input->get("notrans");
            $datahapus = $this->urimdl->hapusdiagnosa();
            $data["diagdata"] = $this->urimdl->datadiagnosaread($notrans);
            $dt["stat"] = $datahapus;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/rekam/berkas/kondisitddiagnosa', $data, TRUE);
            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

}
