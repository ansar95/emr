<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rumahtangga extends CI_Controller {

    public function datafaktur() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("aset");
            $this->load->model("ppn");
            $data['include'] = "layanan/pelayanan/rt/formfaktur";
            $data['menusamping'] = "menurt";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/rt/faktur";
            $data['css'] = "pelayanan/rt/faktur";
            $data["dtpbf"] = $this->aset->datapbf();
            $data["dtppn"] = $this->ppn->full();
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function tambahfaktur() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("aset");
            $this->load->model("satuan");
            $data['dtobat'] = $this->aset->pilihobatbhp_all();
            $data['dtsatuan'] = $this->satuan->pilihsatuan();
            $data["formpilih"] = 0;
            $this->load->view('layanan/pelayanan/rt/formdetailfaktur', $data);
        } else {
            redirect('login');
        }
    }

    public function obatcari() {
        $this->load->model("Aset");
        $dt["dtapotik"] = $this->Aset->untukapotik();
        echo json_encode($dt);
    }


    
    public function simpanfakturheader() {

        /**
         * proses simpan dan cek header faktur
         * tampilkan detail dari faktur header
         */

        if ($this->session->userdata("login") == TRUE) {
            $id = $this->input->get("sj");
            $this->load->model("Rtmdl");
            $dtheader = $this->Rtmdl->ambilheaderfaktur($id);
            if ($dtheader["header"] == null) {
                $dt["stat"] = $dtheader;
                echo json_encode($dt);
            } else {
                $nilaippn = $this->Rtmdl->ambilppn($id);
                $data["nilaippn"] = $nilaippn;
                $detail = $this->Rtmdl->ambildetail($id);
                $data["hasil"] = $detail;
                $dt["stat"] = $dtheader;
                $dt["dtview"] = $this->load->view('layanan/pelayanan/rt/tabledetailfaktur', $data, TRUE);
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
            $this->load->model("Rtmdl");
            $dt = $this->Rtmdl->updatenofaktur($terima, $nofak);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function simpanfaktur() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("Rtmdl");
            $dtresep = $this->Rtmdl->simpanfaktur();
            $id = $dtresep["noterima"];
            $detail = $this->Rtmdl->ambildetail($id);
            $nilaippn = $this->Rtmdl->ambilppn($id);
            $data["nilaippn"] = $nilaippn;
            $data["hasil"] = $detail;
            $dt["stat"] = $dtresep;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/rt/tabledetailfaktur', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function ubahheaderfaktur() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("Rtmdl");
            $dt = $this->Rtmdl->ubahdatainfoheader();

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function hapusfaktur() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("Rtmdl");
            $dt = $this->Rtmdl->hapusdatafaktur();

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function deletedetailfaktur() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("Rtmdl");
            $dtdelete = $this->Rtmdl->deletedetailfaktur();

            echo $dtdelete;
        } else {
            redirect('login');
        }
    }

    //kebutuhan retur

    public function dataretur() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("Aset");
            $data['include'] = "layanan/pelayanan/farmasi/pelayanan/rumahtangga/formretur";
            $data['menusamping'] = "menufarpelayanan";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/farmasi/rumahtangga/faktur";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtpbf"] = $this->Aset->datapbfkode();
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
            $this->load->model("Rtmdl");
            $detail = $this->Rtmdl->ambildetailretur();
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
            $this->load->model("Aset");
            $data['include'] = "laporan/rumahtangga/form/laporanfaktur";
            $data['menusamping'] = "menurt";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/rt/faktur";
            $data['css'] = "pelayanan/rt/faktur";
            $data["dtpbf"] = $this->Aset->datapbf();
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
            $this->load->model("Aset");
            $data['include'] = "laporan/rumahtangga/form/laporanretur";
            $data['menusamping'] = "menurt";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/rt/faktur";
            $data['css'] = "pelayanan/rt/faktur";
            $data["dtpbf"] = $this->Aset->datapbf();
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function kartustok() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("Aset");
            $data['include'] = "laporan/gudang/form/kartustok";
            $data['menusamping'] = "menufarpelayanan";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/farmasi/faktur/faktur";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtobat"] = $this->Aset->obatAsetsatuan();
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function posisistok() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("Aset");
            $data["dtgen"] = $this->Aset->obatjenis("GENERIK");
            $data["dtgol"] = $this->Aset->obatjenis("GOLONGAN");
            $data["dtkla"] = $this->Aset->obatjenis("KLASIFIKASI");

            $data["dtsatuan"] = $this->Aset->obatsatuan();
            $data["dtpbf"] = $this->Aset->datapbf();
            $data["dtmerk"] = $this->Aset->merk();

            $data['include'] = "laporan/gudang/form/posisistok";
            $data['menusamping'] = "menufarpelayanan";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/farmasi/faktur/faktur";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtobat"] = $this->Aset->obatbhpsatuan();

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
            $this->load->model("Aset");
            $this->load->model("satuan");
            $this->load->model("Aset");
            // $data['dtobat'] = $this->Aset->pilihobat();
            $data['dtobat'] = $this->Aset->pilihobatbhp_all();
            $data['dtsatuan'] = $this->satuan->pilihsatuan();
            $data["dtpbf"] = $this->Aset->datapbf();
            $data["formpilih"] = 0;
            $this->load->view('layanan/pelayanan/farmasi/pelayanan/faktur/formdetailretur', $data);
        } else {
            redirect('login');
        }
    }

    public function simpanretur() {
        if ($this->session->userdata("login") == TRUE) {

            $this->load->model("Rtmdl");
            // $dtresep = $this->Rtmdl->simpanfaktur();
            $dtresep = $this->Rtmdl->simpanretur();

            $id = $dtresep["noterima"];
            $detail = $this->Rtmdl->ambildetail($id);

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
