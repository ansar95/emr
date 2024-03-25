<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Depoapotik extends CI_Controller {

    public function listresepobat() {
        if ($this->session->userdata("login") == TRUE) {
            $idUser = $this->session->userdata("idx");
			if (ceksess("PIL", $idUser) == FALSE) {
				$this->load->model("unit");
				$dtunit = $this->unit->fulldepo();
			} else {
				$this->load->model("unit");
				$dtunit = $this->unit->fulldepo();
			}

            // $this->load->model("unit");
            // $dtunit = $this->unit->fulldepo();

            $data['include'] = "layanan/pelayanan/apotik/resep/listresep";
            $data['menusamping'] = "menuapotik";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/apotik/listresep";
            $data['css'] = "pelayanan/apotik/listresep";
            $data['dtunit'] = $dtunit;
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function resepobat($shift, $depo, $depotext) {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("unit");
            $dtunit = $this->unit->fulldepo();
            $this->load->model("golongan");
            $this->load->model("unit");
            $this->load->model("dokter");

            $data['include'] = "layanan/pelayanan/apotik/resep/formresep";
            $data['menusamping'] = "menuapotik";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/apotik/resepobat";
            $data['css'] = "pelayanan/apotik/resepobat";
            $data['dtunit'] = $dtunit;
            $data['golongan'] = $this->golongan->full();
            $data['unit'] = $this->unit->unitumum();
            $data['dokter'] = $this->dokter->datadokter();
            $data['shift'] = $shift;
            $data['depo'] = $depo;
            $data['depotext'] = str_replace('%20', ' ', $depotext);

            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function editresepobat($id) {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("unit");
            $dtunit = $this->unit->fulldepo();
            $this->load->model("golongan");
            $this->load->model("unit");
            $this->load->model("dokter");
            $this->load->model("apotik");
            $dtheader = $this->apotik->ambildataresepheader($id);
            $dtdetail = $this->apotik->ambildataresepdetail($dtheader->noresep);

            $data['include'] = "layanan/pelayanan/apotik/resep/editformresep";
            $data['menusamping'] = "menuapotik";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/apotik/editresepobat";
            $data['css'] = "pelayanan/apotik/resepobat";
            $data['dtunit'] = $dtunit;
            $data['golongan'] = $this->golongan->full();
            $data['unit'] = $this->unit->unitumum();
            $data['dokter'] = $this->dokter->datadokter();
            $data['dtheader'] = $dtheader;
            $data['dtdetail'] = $dtdetail;

            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function hapusresep() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("apotik");
            $dtresep = $this->apotik->hapusresepdarilist();
            
            echo json_encode($dtresep);
        } else {
            redirect('login');
        }
    }

    public function batalkanresepunit() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("apotik");
            $dtresep = $this->apotik->batalkanresepunit();
            
            echo json_encode($dtresep);
        } else {
            redirect('login');
        }
    }

    public function tambahobat() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("apotik");
            $data['dtobat'] = $this->bhp->obatdanbhporder();
            $data['dttakaran'] = $this->apotik->pilihtakaran();
            $data['dtdosis'] = $this->apotik->ambildosis();
            $data['dtcaramkn'] = $this->apotik->pilihcaramakan();
            $data["formpilih"] = 0;
            $this->load->view('layanan/pelayanan/apotik/resep/formdetailresep', $data);
        } else {
            redirect('login');
        }
    }

    public function caridatarm() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("apotik");
            $dt["dtpasien"] = $this->apotik->pencarianrm();
            if ($this->input->get("tipe") == "Umum") {
                $this->load->model("unit");
                $dt["dtunit"] = $this->unit->unitumum();
            }
            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function unitheader() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("unit");
            $dt["dtunit"] = $this->unit->unitumum();
            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function obatcari() {
        $this->load->model("bhp");
        $dt["dtapotik"] = $this->bhp->untukapotik();
        echo json_encode($dt);
    }

    public function simpandepo() {
        if ($this->session->userdata("login") == TRUE) {

            $this->load->model("apotik");
            $dtnotrans = $this->apotik->ambilnoresep();
            $dtresep = $this->apotik->simpanresep($dtnotrans);

            $id = $dtresep["noresep"];
            $detail = $this->apotik->ambildetail($id);
            $data["hasil"] = $detail;
            $dt["stat"] = $dtresep;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/apotik/resep/tabledetailresep', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function editobat() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("apotik");
            $data['dtobat'] = $this->bhp->obatdanbhporder();
            $data['dtedit'] = $this->apotik->ambileditresepdetail();
            $data['dtdosis'] = $this->apotik->ambildosis();
            $data['dttakaran'] = $this->apotik->pilihtakaran();
            $data['dtcaramkn'] = $this->apotik->pilihcaramakan();
            $data["formpilih"] = 1;
            $this->load->view('layanan/pelayanan/apotik/resep/formdetailresep', $data);
        } else {
            redirect('login');
        }
    }

    public function editdepo() {
        if ($this->session->userdata("login") == TRUE) {

            $this->load->model("apotik");
            $dtresep = $this->apotik->ubahresep($this->input->get('id'));

            $detail = $this->apotik->ambildetail($this->input->get('norep'));
            $data["hasil"] = $detail;
            $dt["stat"] = $dtresep;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/apotik/resep/tabledetailresep', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function hapusdepo() {
        if ($this->session->userdata("login") == TRUE) {

            $this->load->model("apotik");
            $dtresep = $this->apotik->hapusdetailresep();

            $detail = $this->apotik->ambildetail($this->input->get('norep'));
            $data["hasil"] = $detail;
            $dt["stat"] = $dtresep;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/apotik/resep/tabledetailresep', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    // Daftar Obat

    public function daftarobat() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('apotik');

            $data['include'] = "layanan/pelayanan/apotik/resep/daftarobat";
            $data['menusamping'] = "menuapotik";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/apotik/daftarobat";
            $data['css'] = "pelayanan/apotik/daftarobat";
            $data['obat'] = $this->apotik->listobat();
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    // untuk ambil data resep

    public function datalistresep() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("apotik");
            $dtlist = $this->apotik->ambilresep();
            $dt["dtstatus"] = false;
            $data["hasil"] = $dtlist;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/apotik/resep/tableresep', $data, TRUE);
            echo json_encode($dt);

        } else {
            redirect('login');
        }
    }

    public function dataresep() {
        if ($this->session->userdata("login") == TRUE) {

            $this->load->model("apotik");
            $dtheader = $this->apotik->ambildataresepheader();
            $dtdetail = $this->apotik->ambildataresepdetail();

            if ($dtheader == null) {
                $dt["dtstatus"] = false;
                $dt["dtheader"] = $dtheader;
                $data["hasil"] = $dtdetail;
                $dt["dtview"] = $this->load->view('layanan/pelayanan/apotik/resep/tabledetailresep', $data, TRUE);
                echo json_encode($dt);
            } else {
                $dt["dtstatus"] = true;
                $dt["dtheader"] = $dtheader;
                $data["hasil"] = $dtdetail;
                $dt["dtview"] = $this->load->view('layanan/pelayanan/apotik/resep/tabledetailresep', $data, TRUE);
                echo json_encode($dt);
            }

        } else {
            redirect('login');
        }
    }


    public function cetakresep_old() {
        if ($this->session->userdata("login") == TRUE) {
            $id = $this->input->post('norep');
            $this->load->model('apotik');
            $resepheader = $this->apotik->ambilresepheadercetak($id);
            $resepdetail = $this->apotik->ambilresepdetailcetak($id);
            $data['resepheader'] = $resepheader;
            $data['resepdetail'] = $resepdetail;
            $data['id']=$id;
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "".date("Ymdhms")."resep.pdf";
            $this->pdf->load_view('layanan/pelayanan/apotik/resep/cetakresep', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }

    public function cetakresep() {
        if ($this->session->userdata("login") == TRUE) {
            $id = $this->input->post('norep');
            $data['id']=$id;
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "".date("Ymdhms")."resep.pdf";
            $this->pdf->load_view('layanan/pelayanan/apotik/resep/cetakresep', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }

    
    public function cetakresep_tes() {
        if ($this->session->userdata("login") == TRUE) {
            $id = $_POST['norep'];
            $shift = 'adsadsdsa';
            print_r($shift);
            // $shift = $this->input->post('shift');
            $this->load->model('apotik');
            $resepheader = $this->apotik->ambilresepheadercetak($id);
            $resepdetail = $this->apotik->ambilresepdetailcetak($id);
            // $data['resepheader'] = $resepheader;
            // $data['resepdetail'] = $resepdetail;
            $data['id']=$id;
            // $data['shift']=$shift;
            $this->load->view('layanan/pelayanan/apotik/resep/cetakresep_tes', $data);
        } else {
            redirect('login');
        }
    }

    public function panggilformresepdariunit() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("unit");
            $dtunit = $this->unit->full();
            $dtid = explode("_", $this->input->get("id"));
            $data["dtunit"] = $dtunit;
            $data["dtidp"] = $dtid[0];
            // $data["dtkode"] = $dtid[1];

            $this->load->view('layanan/pelayanan/apotik/resep/formaddresepunit', $data);
        } else {
            redirect('login');
        }
    }

    public function simpanaddresepunit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("apotik");
			$dtubah = $this->apotik->isidepo();

            $dtpasien = $this->apotik->ambilresep();
			$data["hasil"] = $dtpasien;

			$dt["dtubah"] = $dtubah;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/apotik/resep/tableresep', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}


    public function prosescekresep() {
        if ($this->session->userdata("login") == TRUE) {

            $this->load->model("apotik");
            $dtresep = $this->apotik->cekobat();

            $detail = $this->apotik->ambildetail($this->input->get('norep'));
            $data["hasil"] = $detail;
            $dt["stat"] = $dtresep;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/apotik/resep/tabledetailresep', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function editheader() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("apotik");
            $dtheader = $this->apotik->editheader();
            return $dtheader;
        } else {
            redirect('login');
        }
    }

    //kebutuhan laporan
	public function laporandepo() { 
		$this->load->model('unit');
		$this->load->model('golongan');
		$data['unit'] = $this->unit->fulldepo();
		$data['golongan'] = $this->golongan->full();
        $data['menusamping'] = "menuapotik";
		$data['backhome'] = "tiga";
		$data['include'] = "laporan/apotik/form/laporandepo";
        $data['js'] = "pelayanan/apotik/listresep";
        $data['css'] = "pelayanan/apotik/listresep";
		$this->load->view('templatesidebar/content', $data);
	}

    public function panggilcetak() {
        if ($this->session->userdata("login") == TRUE) {
            $awal=$this->input->post("awal");
            $akhir=$this->input->post("akhir");
            $cekunit=$this->input->post("cekunit");
            $depo=$this->input->post("depo");
            $cekgolongan=$this->input->post("cekgolongan");
            $golongan=$this->input->post("golongan");
            $data['awal']=$awal;
            $data['akhir']=$akhir;
            $data['cekunit']=$cekunit;
            $data['depo']=$depo;
            $data['cekgolongan']=$cekgolongan;
            $data['golongan']=$golongan;
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'Potrait');
            $this->pdf->filename = "".date("Ymdhms")."resep.pdf";
            $this->pdf->load_view('laporan/apotik/laporan/laporandepo', $data);
            $this->pdf->render();
            $this->pdf->output();
        // $this->load->view('laporan/apotik/laporan/laporandepo', $data);
    } else {
        redirect('login');
    }
	}

    public function laporanrekapobat() { 
		$this->load->model('unit');
		$this->load->model('golongan');
		$data['unit'] = $this->unit->fulldepo();
		$data['golongan'] = $this->golongan->full();
        $data['menusamping'] = "menuapotik";
		$data['backhome'] = "tiga";
		$data['include'] = "laporan/apotik/form/laporanrekapobat";
        $data['js'] = "pelayanan/apotik/listresep";
        $data['css'] = "pelayanan/apotik/listresep";
		$this->load->view('templatesidebar/content', $data);
	}


    public function panggilcetakrekapobat() {
        if ($this->session->userdata("login") == TRUE) {
            $awal=$this->input->post("awal");
            $akhir=$this->input->post("akhir");
            $cekunit=$this->input->post("cekunit");
            $depo=$this->input->post("depo");
            $cekgolongan=$this->input->post("cekgolongan");
            $golongan=$this->input->post("golongan");
            $data['awal']=$awal;
            $data['akhir']=$akhir;
            $data['cekunit']=$cekunit;
            $data['depo']=$depo;
            $data['cekgolongan']=$cekgolongan;
            $data['golongan']=$golongan;
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'Potrait');
            $this->pdf->filename = "".date("Ymdhms")."resep.pdf";
            $this->pdf->load_view('laporan/apotik/laporan/laporanrekapobat', $data);
            $this->pdf->render();
            $this->pdf->output();
        // $this->load->view('laporan/apotik/laporan/laporandepo', $data);
    } else {
        redirect('login');
    }
	}

	public function cetaketiket($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('tracer', 'potrait');
			$this->pdf->filename = "etiket".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/etiket/etiketresep', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}


    
    public function cetakresepxxxx_contoh_atas() {
        if ($this->session->userdata("login") == TRUE) {
            $id = $this->input->post('norep');
            $data['id']=$id;
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'Potrait');
            $this->pdf->filename = "".date("Ymdhms")."resep.pdf";
            $this->pdf->load_view('layanan/pelayanan/apotik/resep/cetakresep', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }

}
