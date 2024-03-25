<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ugd extends CI_Controller {

	public function index() {
		if ($this->session->userdata("login") == TRUE) {
			
			// $data['menu'] = $menu;
			
			$idUser = $this->session->userdata("idx");
			if (ceksess("PIL", $idUser) == FALSE) {
				$this->load->model("unit");
				$dtunit = $this->unit->fulligd();
			} else {
				$this->load->model("unit");
				$dtunit = $this->unit->fulligd();
			}
			$data['include'] = "layanan/pelayanan/ugd/listugd";
			$data['unit'] = $dtunit;
			$data['menusamping'] = "menuugd";
			$data['backhome'] = "tiga";
			$data['js'] = "pelayanan/ugd/listugd";
			$data['css'] = "pelayanan/ugd/listugd";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function caripasienugd() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ugdmdl");
			$dtpasien = $this->ugdmdl->carinamapasienugd();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/ugd/tdlistugd', $data);
		} else {
			redirect('login');
		}
	}

	public function panggilugdform() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ugdmdl");
			$dtpasien = $this->ugdmdl->pasiendata();
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$dtperawat = $this->dokter->dataperawat();
			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->full();
			$this->load->model("unit");
			$dtunit = $this->unit->unitpindakamar("inap");
			$dtkirimins = $this->unit->unitkiriminstalasi();
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			$this->load->model("datapulang");
			$carakeluar = $this->datapulang->ambilcarakeluar();
			$this->load->model("kondisi");
			$kondisikeluar = $this->kondisi->ambilkondisi();
			$kondisikeluarrm = $this->kondisi->ambilkondisirm();

			$this->load->model("ugdmdl");
			$dttdtindakan = $this->ugdmdl->datamtdtindakan();
			$dttdbhp = $this->ugdmdl->datamtdbhp();
			$dttdobat = $this->ugdmdl->datamtdobat();
			$dttdobatallcek = $this->ugdmdl->datamtdobatallcek();
			$dttdodua = $this->ugdmdl->datamtdodua();
			$dttdvisite = $this->ugdmdl->datamtdvisite();
			$dttddarah = $this->ugdmdl->datamtddarah();
            $dtregis = $this->ugdmdl->ambildatapindahlast();
			$dttdhistory = $this->ugdmdl->datamtdhistory();
			$dttdinst = $this->ugdmdl->datainst();

            $tindakanlab = $this->ugdmdl->tindakanlab();
            $tindakanrad = $this->ugdmdl->tindakanrad();
            $tindakanhem = $this->ugdmdl->tindakanhem();
            $tindakanopr = $this->ugdmdl->tindakanopr();
            $tindakanbsr = $this->ugdmdl->tindakanbsr();
			$ambildosis= $this->ugdmdl->ambildosis();

			$data["dtpasien"] = $dtpasien;
			$data["dtdokter"] = $dtdokter;
			$data["dttindakan"] = $dttindakan;
			$data["dtunit"] = $dtunit;
			$data["dtobat"] = $dtobat;

			$data["dttdtindakan"] = $dttdtindakan;
			$data["dttdbhp"] = $dttdbhp;
			$data["dttdobat"] = $dttdobat;
			$data["dttdobatallcek"] = $dttdobatallcek;
			$data["dttdodua"] = $dttdodua;
			$data["dttdvisite"] = $dttdvisite;
			$data["dttddarah"] = $dttddarah;
			$data["dttdhistory"] = $dttdhistory;
			$data["pindah"] = $dtregis->pindah;
			$data["carakeluar"] = $carakeluar;
			$data["dtkirimins"] = $dtkirimins;
			$data["kondisikeluar"] = $kondisikeluar;
			$data["kondisikeluarrm"] = $kondisikeluarrm;
			$data["dttdinst"] = $dttdinst;
			$data["dtperawat"] = $dtperawat;

            $data["tindakanlab"] = $tindakanlab;
            $data["tindakanrad"] = $tindakanrad;
            $data["tindakanhem"] = $tindakanhem;
            $data["tindakanopr"] = $tindakanopr;
            $data["tindakanbsr"] = $tindakanbsr;
			$data["ambildosis"] = $ambildosis;

			$this->load->model("rmmdl");
			$data["diagnosa"] = $this->rmmdl->ambilicd();
            $data["diagdata"] = $this->rmmdl->datadiagnosaread($dtpasien->notransaksi);
			
			$this->load->view('layanan/pelayanan/ugd/formprosesugd', $data);
		} else {
			redirect('login');
		}
	}

    public function ambilpindahkamar() {
        $this->load->model("ugdmdl");
        $data = $this->ugdmdl->ambilkamarpindah();
        echo json_encode($data);
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
			$dttindakan = $this->tindakan->full();
			
			$data["dtdokter"] = $dtdokter;
			$data["dttindakan"] = $dttindakan;
			$data["pilihform"] = 0;
			$data["dtperawat"] = $dtperawat;

			$this->load->view('layanan/pelayanan/ugd/prosestindakan', $data);
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
			$this->load->model("ugdmdl");
			$ptind = $this->ugdmdl->ambileditdatatindakan();
			
			$data["dtdokter"] = $dtdokter;
			$data["dttindakan"] = $dttindakan;
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;
			$data["dtperawat"] = $dtperawat;

			$this->load->view('layanan/pelayanan/ugd/prosestindakan', $data);
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

			$this->load->view('layanan/pelayanan/ugd/prosesbhp', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformbhpedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			$this->load->model("ugdmdl");
			$ptind = $this->ugdmdl->ambileditdatabhp();
			
			$data["dtobat"] = $dtobat;
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/ugd/prosesbhp', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformodua() {
		if ($this->session->userdata("login") == TRUE) {
			$data["pilihform"] = 0;

			$this->load->view('layanan/pelayanan/ugd/prosesodua', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformoduaedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ugdmdl");
			$ptind = $this->ugdmdl->ambileditdataodua();
			
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/ugd/prosesodua', $data);
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

			$this->load->view('layanan/pelayanan/ugd/prosesdokter', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformdokteredit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ugdmdl");
			$ptind = $this->ugdmdl->ambileditdatadokter();
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$data["dtdokter"] = $dtdokter;
			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/ugd/prosesdokter', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformdarah() {
		if ($this->session->userdata("login") == TRUE) {
			$data["pilihform"] = 0;

			$this->load->view('layanan/pelayanan/ugd/prosesdarah', $data);
		} else {
			redirect('login');
		}
	}

	public function kelolaformdarahedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ugdmdl");
			$ptind = $this->ugdmdl->ambileditdatadarah();

			$data["pilihform"] = 1;
			$data["dataedit"] = $ptind;

			$this->load->view('layanan/pelayanan/ugd/prosesdarah', $data);
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
			$this->load->model("ugdmdl");
			$dthargatindakan = $this->ugdmdl->ambilhargatindakan();
			$dtsimpan = $this->ugdmdl->simpanpelayanantindakan($dtpasien, $dthargatindakan);
			$dttdtindakan = $this->ugdmdl->datamtdtindakan();
			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/mtdtindakan', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanantindakanubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ugdmdl");
			$dthargatindakan = $this->ugdmdl->ambilhargatindakan();
			$dtsimpan = $this->ugdmdl->ubahpelayanantindakan($dthargatindakan);
			$dttdtindakan = $this->ugdmdl->datamtdtindakan();
			
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			$dtperawat = $this->dokter->dataperawat();
			$this->load->model("tindakan");
			$dttindakan = $this->tindakan->full();
			
			$dataform["dtdokter"] = $dtdokter;
			$dataform["dttindakan"] = $dttindakan;
			$dataform["pilihform"] = 0;
			$dataform["dtperawat"] = $dtperawat;

			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/mtdtindakan', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/ugd/prosestindakan', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanantindakanhapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ugdmdl");
			$dtsimpan = $this->ugdmdl->hapuspelayanantindakan();
			$dttdtindakan = $this->ugdmdl->datamtdtindakan();
			
			$data["hasil"] = $dttdtindakan;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/mtdtindakan', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananbhp() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasi();

			$this->load->model("ugdmdl");
			$dtsimpan = $this->ugdmdl->simpanpelayananbhp($dtpasien);
			$dttdbhp = $this->ugdmdl->datamtdbhp();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/mtdbhp', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananbhpubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ugdmdl");
			$dtsimpan = $this->ugdmdl->ubahpelayananbhp();
			$dttdbhp = $this->ugdmdl->datamtdbhp();
			$this->load->model("bhp");
			$dtobat = $this->bhp->pilihbhp();
			
			$data["hasil"] = $dttdbhp;

			$dataform["dtobat"] = $dtobat;
			$dataform["pilihform"] = 0;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/mtdbhp', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/ugd/prosesbhp', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananbhphapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ugdmdl");
			$dtsimpan = $this->ugdmdl->hapuspelayananbhp();
			$dttdbhp = $this->ugdmdl->datamtdbhp();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/mtdbhp', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananodua() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasi();

			$this->load->model("ugdmdl");
			$dtsimpan = $this->ugdmdl->simpanpelayananodua($dtpasien);
			$dttdbhp = $this->ugdmdl->datamtdodua();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/mtdodua', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananoduaubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ugdmdl");
			$dtsimpan = $this->ugdmdl->ubahpelayananodua();
			$dttdbhp = $this->ugdmdl->datamtdodua();
			
			$data["hasil"] = $dttdbhp;

			$dataform["pilihform"] = 0;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/mtdodua', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/ugd/prosesodua', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananoduahapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ugdmdl");
			$dtsimpan = $this->ugdmdl->hapuspelayananodua();
			$dttdbhp = $this->ugdmdl->datamtdodua();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/mtdodua', $data, TRUE);

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
			$this->load->model("ugdmdl");
			$dtsimpan = $this->ugdmdl->simpanpelayanandokter($dtpasien, $dtunit);

			$dttdbhp = $this->ugdmdl->datamtdvisite();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/mtddokter', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanandokterubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ugdmdl");
			$dtsimpan = $this->ugdmdl->ubahpelayanandokter();
			$dttdbhp = $this->ugdmdl->datamtdvisite();
			$this->load->model("dokter");
			$dtdokter = $this->dokter->full();
			
			$data["hasil"] = $dttdbhp;

			$dataform["dtdokter"] = $dtdokter;
			$dataform["pilihform"] = 0;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/mtddokter', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/ugd/prosesdokter', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanandokterhapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ugdmdl");
			$dtsimpan = $this->ugdmdl->hapuspelayanandokter();
			$dttdbhp = $this->ugdmdl->datamtdvisite();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/mtddokter', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanandarah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->ambildataregistrasi();

			$this->load->model("ugdmdl");
			$dtsimpan = $this->ugdmdl->simpanpelayanandarah($dtpasien);
			$dttdbhp = $this->ugdmdl->datamtddarah();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/mtdkantong', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanandarahubah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ugdmdl");
			$dtsimpan = $this->ugdmdl->ubahpelayanandarah();
			$dttdbhp = $this->ugdmdl->datamtddarah();
			
			$data["hasil"] = $dttdbhp;

			$dataform["pilihform"] = 0;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/mtdkantong', $data, TRUE);
			$dt["formnya"] = $this->load->view('layanan/pelayanan/ugd/prosesdarah', $dataform, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layanandarahhapus() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ugdmdl");
			$dtsimpan = $this->ugdmdl->hapuspelayanandarah();
			$dttdbhp = $this->ugdmdl->datamtddarah();
			$data["hasil"] = $dttdbhp;

			$dt["stat"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/mtdkantong', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function layananpindahkamar() {
		if ($this->session->userdata("login") == TRUE) {

			$this->load->model("ugdmdl");
			$dtregis = $this->ugdmdl->ambildatapindah();
			$dtsimpan = $this->ugdmdl->simpanpindahkamar($dtregis);

			$dttdbhp = $this->ugdmdl->datamtdhistory();
			$data["hasil"] = $dttdbhp;
			$data["pindah"] = $dtsimpan[1];

			$dt["stat"] = $dtsimpan[0];
			$dt["pindah"] = $dtsimpan[1];
			$dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/mtdpindah', $data, TRUE);

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function panggilurjdokterform() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("dokter");
            $dtdokter = $this->dokter->datadokterugd();
			$dtid = explode("_", $this->input->get("id"));
			$data["dtdokter"] = $dtdokter;
			$data["dtidp"] = $dtid[0];
			$data["dtkode"] = $dtid[1];

			$this->load->view('layanan/pelayanan/ugd/formpilihdokter', $data);
		} else {
			redirect('login');
		}
	}
	
	public function simpandkterregis() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ugdmdl");
			$dtubah = $this->ugdmdl->gantidokter();
			$dtpasien = $this->ugdmdl->carinamapasienugd();
			
			$data["hasil"] = $dtpasien;

			$dt["dtubah"] = $dtubah;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/tdlistugd', $data, TRUE);;

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function simpankiriminstalasi() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("irad");
			$this->load->model("ugdmdl");
			$dtnotrans = $this->irad->ambilnotrans();
			$dtsimpan = $this->ugdmdl->simpaninstalasi($dtnotrans);
            $dttdbhp = $this->ugdmdl->datainst();
            $data["hasil"] = $dttdbhp;

            $dt["stat"] = $dtsimpan;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/mtdinstalasi', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function hapuskiriminstalasi() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("ugdmdl");
            $dtsimpan = $this->ugdmdl->hapusinstalasi();
            $dttdbhp = $this->ugdmdl->datainst();
            $data["hasil"] = $dttdbhp;

            $dt["stat"] = $dtsimpan;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/ugd/mtdinstalasi', $data, TRUE);
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

	public function laporanharian() {
		$r = date("Ymd");
		$this->load->model('lapregrawatugd');
		$data['l'] = $this->lapregrawatugd->ambilharian();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "ugd".$r.".pdf";
		$this->load->view('laporan/laporanregrawatugd/laporanharian', $data);
		// $this->pdf->load_view('laporan/laporanregrawatugd/laporanharian', $data);
		// $this->pdf->render();
		// $this->pdf->output();
	}

	public function laporanharianecel() {
		$this->load->model('lapregrawatugd');
		$data['l'] = $this->lapregrawatugd->ambilharian();
		$this->load->view('laporan/laporanregrawatugd/excel/laporanharian', $data);
	}

	public function panggilcetak() {
		$post = $this->input->post();
		if(isset($post["cet"])) {
			$this->laporanharian();
		} else if(isset($post["cete"])) {
			$this->laporanharianecel();
		} 
		// else if(isset($post["cetrawat"])) {
		// 	$this->laporantindakan();
		// } else if(isset($post["ceterawat"])) {
		// 	$this->laporantindakanexcel();
		// }
	}
	
	        // untuk laporan register ugd
			public function laporanregisterugd() { 
				$this->load->model('unit');
				$this->load->model('golongan');
				$data['unit'] = $this->unit->full();
				$data['golongan'] = $this->golongan->full();
				$data['menusamping'] = "menuugd";
				$data['backhome'] = "tiga";
				$data['include'] = "laporan/laporanregrawatugd";
				$data['js'] = "laporan/laporanregrawatugd/laporanharian";
				$data['css'] = "laporan/datepickerselectdua";
				$this->load->view('templatesidebar/content', $data);
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
			

	public function berkassampaipoli() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ugdmdl");
			$dt['dtantrian'] = $this->ugdmdl->berkastibadipoli();
			$this->load->model("ugdmdl");
			$dtpasien = $this->ugdmdl->carinamapasienugd();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/ugd/tdlistugd', $data);
		} else {
			redirect('login');
		}

	}

	public function berkaskembalikerm() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ugdmdl");
			$dt['dtantrian'] = $this->ugdmdl->berkastibadirm();
			$this->load->model("ugdmdl");
			$dtpasien = $this->ugdmdl->carinamapasienugd();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/ugd/tdlistugd', $data);
		} else {
			redirect('login');
		}
	}

	public function get_user()
	{
		try {
			$this->load->model('user');
			$result = $this->user->getSelect(['id','nama','username']);
			echo json_encode([
				'status'=>true,
				'data'=>$result
			]);
		} catch (\Throwable $th) {
			$this->ouput->set_status_header(500);
			echo json_encode([
				'status'=>true,
				'data'=>$th->getMessage()
			]);
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

