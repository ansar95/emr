<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faktur extends CI_Controller {
    public function datafaktur() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("ppn");
            $data['include'] = "layanan/pelayanan/farmasi/pelayanan/faktur/formfaktur";
            $data['menusamping'] = "menufarpelayanan";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/farmasi/faktur/faktur";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtpbf"] = $this->bhp->datapbf();
            $data["dtppn"] = $this->ppn->full();
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function tambahfaktur() {
        /**
         * panggil form tambah obat
         */
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("satuan");
            // $data['dtobat'] = $this->bhp->pilihobat();
            $data['dtobat'] = $this->bhp->pilihobatbhp_all();
            $data['dtsatuan'] = $this->satuan->pilihsatuan();
            $data["formpilih"] = 0;
            $this->load->view('layanan/pelayanan/farmasi/pelayanan/faktur/formdetailfaktur', $data);
        } else {
            redirect('login');
        }
    }

    public function cekdatatandaterima() {

        /**
         * dek data tanda terima
         */

        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("fakturmdl");
            $dt = $this->fakturmdl->cektandaterima();
            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function caridatarm() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("apotik");
            $dt["dtpasien"] = $this->apotik->pencarianrm();
            if ($this->input->get("depo") == "umum") {
                $this->load->model("unit");
                $dt["dtunit"] = $this->unit->unitumum();
            }
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

    public function carifaktur() {
        $this->load->model("fakturmdl");
        $dt["dtvendor"] = $this->fakturmdl->untukretur();
        echo json_encode($dt);
    }

    public function simpanfakturheader() {

        /**
         * proses simpan dan cek header faktur
         * tampilkan detail dari faktur header
         */

        if ($this->session->userdata("login") == TRUE) {
            $id = $this->input->get("sj");
            $this->load->model("fakturmdl");
            $dtheader = $this->fakturmdl->ambilheaderfaktur($id);
            if ($dtheader["header"] == null) {
                $dt["stat"] = $dtheader;
                echo json_encode($dt);
            } else {
                $nilaippn = $this->fakturmdl->ambilppn($id);
                $data["nilaippn"] = $nilaippn;
                $detail = $this->fakturmdl->ambildetail($id);
                $data["hasil"] = $detail;
                $dt["stat"] = $dtheader;
                $dt["dtview"] = $this->load->view('layanan/pelayanan/farmasi/pelayanan/faktur/tabledetailfaktur', $data, TRUE);
    
                echo json_encode($dt);
            }
        } else {
            redirect('login');
        }
    }

    public function ubahnofaktur() {

        /**
         * ubah data no faktur
         */

        if ($this->session->userdata("login") == TRUE) {
            $terima = $this->input->get("terima");
            $nofak = $this->input->get("no");
            $this->load->model("fakturmdl");
            $dt = $this->fakturmdl->updatenofaktur($terima, $nofak);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function simpanfaktur() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("fakturmdl");
            $dtresep = $this->fakturmdl->simpanfaktur();
            $id = $dtresep["noterima"];
            $detail = $this->fakturmdl->ambildetail($id);
            $nilaippn = $this->fakturmdl->ambilppn($id);
            $data["nilaippn"] = $nilaippn;
            $data["hasil"] = $detail;
            $dt["stat"] = $dtresep;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/farmasi/pelayanan/faktur/tabledetailfaktur', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function ubahheaderfaktur() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("fakturmdl");
            $dt = $this->fakturmdl->ubahdatainfoheader();

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function hapusfaktur() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("fakturmdl");
            $dt = $this->fakturmdl->hapusdatafaktur();

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function deletedetailfaktur() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("fakturmdl");
            $dtdelete = $this->fakturmdl->deletedetailfaktur();

            echo $dtdelete;
        } else {
            redirect('login');
        }
    }

    //kebutuhan retur

    public function dataretur() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $data['include'] = "layanan/pelayanan/farmasi/pelayanan/faktur/formretur";
            $data['menusamping'] = "menufarpelayanan";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/farmasi/faktur/faktur";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtpbf"] = $this->bhp->datapbfkode();
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function tampilkanretur() {
        if ($this->session->userdata("login") == TRUE) {
            $awal = $this->input->get("awal");
            $akhir = $this->input->get("akhir");
            $vendor = $this->input->get("vendor");
            $this->load->model("fakturmdl");
            $detail = $this->fakturmdl->ambildetailretur();
            $data["hasil"] = $detail;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/farmasi/pelayanan/faktur/tabledetailretur', $data, TRUE);
            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    //kebutuhan laporan faktur
    public function laporanfaktur() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $data['include'] = "laporan/gudang/form/laporanfaktur";
            $data['menusamping'] = "menufarpelayanan";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/farmasi/faktur/faktur";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtpbf"] = $this->bhp->datapbf();
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function panggilcetak() {
        if ($this->session->userdata("login") == TRUE) {
            $awal=$this->input->post("awal");
            $akhir=$this->input->post("akhir");
            $kondisicekpbf=$this->input->post("namecekpbf");
            $pilihjenis=$this->input->post("pilihjenis");
            //jika $kondisicekpbf=1 maka cetak semua, jika 2 maka pilih pbf
            $idvendor=$this->input->post("vendor");
            $data['awal']=$awal;
            $data['akhir']=$akhir;
            $data['kondisicekpbf']=$kondisicekpbf;
            $data['idvendor']=$idvendor;
            $data['pilihjenis']=$pilihjenis;
            // $this->load->library('pdf');
            // $this->pdf->setPaper('A4', 'Landscape');
            // $this->pdf->filename = "".date("Ymdhms")."lapfaktur.pdf";
            // $this->pdf->load_view('laporan/gudang/laporan/laporanfaktur', $data);
            // $this->pdf->render();
            // $this->pdf->output();
        $this->load->view('laporan/gudang/laporan/laporanfaktur', $data);
    } else {
        redirect('login');
    }
	}

    public function laporanretur() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $data['include'] = "laporan/gudang/form/laporanretur";
            $data['menusamping'] = "menufarpelayanan";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/farmasi/faktur/faktur";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtpbf"] = $this->bhp->datapbf();
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function cetakkartustok() {
        if ($this->session->userdata("login") == TRUE) {
            $awal=$this->input->post("awal");
            $akhir=$this->input->post("akhir");
            $idobat=$this->input->post("idobat");
            $data['awal']=$awal;
            $data['akhir']=$akhir;
            $data['idobat']=$idobat;
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'Potrait');
            $this->pdf->filename = "".date("Ymdhms")."kartustok.pdf";
            $this->pdf->load_view('laporan/gudang/laporan/laporankartustok', $data);
            $this->pdf->render();
            $this->pdf->output();
        // $this->load->view('laporan/gudang/laporan/laporankartustok', $data);
    } else {
        redirect('login');
    }
	}

    public function kartustok() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $data['include'] = "laporan/gudang/form/kartustok";
            $data['menusamping'] = "menufarpelayanan";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/farmasi/faktur/faktur";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtobat"] = $this->bhp->obatbhpsatuan();
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function posisistok() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $data["dtgen"] = $this->bhp->obatjenis("GENERIK");
            $data["dtgol"] = $this->bhp->obatjenis("GOLONGAN");
            $data["dtkla"] = $this->bhp->obatjenis("KLASIFIKASI");

            $data["dtsatuan"] = $this->bhp->obatsatuan();
            $data["dtpbf"] = $this->bhp->datapbf();
            $data["dtmerk"] = $this->bhp->merk();

            $data['include'] = "laporan/gudang/form/posisistok";
            $data['menusamping'] = "menufarpelayanan";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/farmasi/faktur/faktur";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtobat"] = $this->bhp->obatbhpsatuan();

            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function tambahretur() {

        /**
         * panggil form tambah obat
         */

        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("satuan");
            $this->load->model("bhp");
            // $data['dtobat'] = $this->bhp->pilihobat();
            $data['dtobat'] = $this->bhp->pilihobatbhp_all();
            $data['dtsatuan'] = $this->satuan->pilihsatuan();
            $data["dtpbf"] = $this->bhp->datapbf();
            $data["formpilih"] = 0;
            $this->load->view('layanan/pelayanan/farmasi/pelayanan/faktur/formdetailretur', $data);
        } else {
            redirect('login');
        }
    }

    public function simpanretur() {
        if ($this->session->userdata("login") == TRUE) {

            $this->load->model("fakturmdl");
            // $dtresep = $this->fakturmdl->simpanfaktur();
            $dtresep = $this->fakturmdl->simpanretur();


            $detail = $this->fakturmdl->ambildetailretur();

            $data["hasil"] = $detail;
            $dt["stat"] = $dtresep;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/farmasi/pelayanan/faktur/tabledetailfaktur', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function cetakposisistok() {
        if($this->input->post("cetposisi") != null) {
            $this->cetakstok();
        } else if($this->input->post("cetposisiada") != null) {
            $this->cetaknilai();
        }
    }
    
    public function cetakstok() {
        if ($this->session->userdata("login") == TRUE) {
            $awal=$this->input->post("awal");
            $akhir=$this->input->post("akhir");
            $kondisicekpbf=$this->input->post("namecekpbf");
            $pilihjenis=$this->input->post("pilihjenis");
            $idvendor=$this->input->post("vendor");

            if ($this->input->post("cekprinter") !=null) {
                $cekprinter=1;
            } else { 
                $cekprinter=0;
            }
            $data['awal']=$awal;
            $data['akhir']=$akhir;
            $data['kondisicekpbf']=$kondisicekpbf;
            $data['idvendor']=$idvendor;
            $data['pilihjenis']=$pilihjenis;
            $data['cekprinter']=$cekprinter;
            $this->load->view('laporan/gudang/laporan/laporanposisiharian', $data);
    } else {
        redirect('login');
    }
	}

    public function cetaknilai() {
        if ($this->session->userdata("login") == TRUE) {
            $awal=$this->input->post("awal");
            $akhir=$this->input->post("akhir");
            $kondisicekpbf=$this->input->post("namecekpbf");
            $pilihjenis=$this->input->post("pilihjenis");
            $idvendor=$this->input->post("vendor");
            if ($this->input->post("cekprinter") != null) {
                $cekprinter=1;
            } else { 
                $cekprinter=0;
            }
            $data['awal']=$awal;
            $data['akhir']=$akhir;
            $data['kondisicekpbf']=$kondisicekpbf;
            $data['idvendor']=$idvendor;
            $data['pilihjenis']=$pilihjenis;
            $data['cekprinter']=$cekprinter;
            $this->load->view('laporan/gudang/laporan/laporanposisinilai', $data);
    } else {
        redirect('login');
    }
	}
}
