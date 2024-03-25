<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faktur extends CI_Controller {
    public function datafaktur() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("ppn");
            $data['include'] = "layanan/pelayanan/farmasi/pelayanan/faktur/formfaktur";
            $data['menusamping'] = "menufakturobat";
            $data['backhome'] = "gudang";
            $data['js'] = "pelayanan/farmasi/faktur/faktur";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtpbf"] = $this->bhp->datapbf();
            $data["dtppn"] = $this->ppn->full();
            $data["dtdana"] = $this->ppn->pendanaan();
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function datafakturbhp() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("ppn");
            $data['include'] = "layanan/pelayanan/farmasi/pelayanan/fakturbhp/formfaktur";
            $data['menusamping'] = "menufakturbhp";
            $data['backhome'] = "gudang";
            $data['js'] = "pelayanan/farmasi/faktur/fakturbhp";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtpbf"] = $this->bhp->datapbf();
            $data["dtppn"] = $this->ppn->full();
            $data["dtdana"] = $this->ppn->pendanaan();
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
            // $data['dtobat'] = $this->bhp->pilihobatbhp_all();
            $data['dtobat'] = $this->bhp->pilihobatsaja();
            $data['dtsatuan'] = $this->satuan->pilihsatuan();
            $data["formpilih"] = 0;
            $this->load->view('layanan/pelayanan/farmasi/pelayanan/faktur/formdetailfaktur', $data);
        } else {
            redirect('login');
        }
    }

    public function editdetailfaktur() {
        /**
         * panggil form tambah obat
         */
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $data['dtobat'] = $this->bhp->pilihobatsaja();
            $this->load->model("satuan");
            $data['dtsatuan'] = $this->satuan->pilihsatuan();
            //ambil data faktur yg diedit
            $this->load->model("fakturmdl");
            $data['dtdetailfaktur'] = $this->fakturmdl->ambildetailfaktur();

            $data["formpilih"] = 1;
            $this->load->view('layanan/pelayanan/farmasi/pelayanan/faktur/formdetailfaktur', $data);
        } else {
            redirect('login');
        }
    }

    public function editdetailfakturbhp() {
        /**
         * panggil form tambah obat
         */
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $data['dtobat'] = $this->bhp->pilihbhpsaja();
            $this->load->model("satuan");
            $data['dtsatuan'] = $this->satuan->pilihsatuan();
            //ambil data faktur yg diedit
            $this->load->model("fakturmdl");
            $data['dtdetailfaktur'] = $this->fakturmdl->ambildetailfaktur();

            $data["formpilih"] = 1;
            $this->load->view('layanan/pelayanan/farmasi/pelayanan/fakturbhp/formdetailfaktur', $data);
        } else {
            redirect('login');
        }
    }

    public function tambahfakturbhp() {
        /**
         * panggil form tambah bhp
         */
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("satuan");
            // $data['dtobat'] = $this->bhp->pilihobat();
            // $data['dtobat'] = $this->bhp->pilihobatbhp_all();
            $data['dtobat'] = $this->bhp->pilihbhpsaja();
            $data['dtsatuan'] = $this->satuan->pilihsatuan();
            $data["formpilih"] = 0;
            $this->load->view('layanan/pelayanan/farmasi/pelayanan/fakturbhp/formdetailfaktur', $data);
        } else {
            redirect('login');
        }
    }

    public function editfakturbhp() {
        /**
         * panggil form tambah bhp
         */
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("satuan");
            // $data['dtobat'] = $this->bhp->pilihobat();
            // $data['dtobat'] = $this->bhp->pilihobatbhp_all();
            $data['dtobat'] = $this->bhp->pilihbhpsaja();
            $data['dtsatuan'] = $this->satuan->pilihsatuan();
            $data["formpilih"] = 0;
            $this->load->view('layanan/pelayanan/farmasi/pelayanan/fakturbhp/formdetailfaktur', $data);
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

    public function simpateditdatafaktur() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("fakturmdl");
            // $dtresep = $this->fakturmdl->simpanfaktur();
            $dtresep = $this->fakturmdl->simpaneditdatafaktur();
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
            $data['menusamping'] = "menufakturobat";
            $data['backhome'] = "gudang";
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

    //retur bhp
    public function datareturbhp() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $data['include'] = "layanan/pelayanan/farmasi/pelayanan/fakturbhp/formretur";
            $data['menusamping'] = "menufakturbhp";
            $data['backhome'] = "gudang";
            $data['js'] = "pelayanan/farmasi/faktur/fakturbhp";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtpbf"] = $this->bhp->datapbfkode();
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function tampilkanreturbhp() {
        if ($this->session->userdata("login") == TRUE) {
            $awal = $this->input->get("awal");
            $akhir = $this->input->get("akhir");
            $vendor = $this->input->get("vendor");
            $this->load->model("fakturmdl");
            $detail = $this->fakturmdl->ambildetailretur();
            $data["hasil"] = $detail;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/farmasi/pelayanan/fakturbhp/tabledetailretur', $data, TRUE);
            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    //kebutuhan laporan faktur
    public function laporanfaktur() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("ppn");
            $data['include'] = "laporan/gudang/form/laporanfaktur";
            $data['menusamping'] = "menufakturobat";
            $data['backhome'] = "gudang";
            $data['js'] = "pelayanan/farmasi/faktur/faktur";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtpbf"] = $this->bhp->datapbf();
            $data["dtobat"] = $this->bhp->pilihobatsaja();
            $data["dtdana"] = $this->ppn->pendanaan();
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
            $namecekobat=$this->input->post("namecekobat");
            $namecekdana=$this->input->post("namecekdana");
            $idvendor=$this->input->post("vendor");
            $pendanaan=$this->input->post("pendanaan");
            $obatnya=$this->input->post("obatnya");
            $data['awal']=$awal;
            $data['akhir']=$akhir;
            $data['kondisicekpbf']=$kondisicekpbf;
            $data['namecekobat']=$namecekobat;
            $data['namecekdana']=$namecekdana;
            $data['idvendor']=$idvendor;
            $data['pendanaan']=$pendanaan;
            $data['obatnya']=$obatnya;
            if ($this->input->post("cekprinter") == 3) {
                //excel
                $cekprinternya=3;
                $data['cekprinternya']=$cekprinternya;
                $this->load->view('laporan/gudang/laporan/laporanfaktur', $data);
            } elseif ($this->input->post("cekprinter") == 2) {
                $cekprinternya=2;
                $data['cekprinternya']=$cekprinternya;
                $r = date("Ymd");
                $this->load->library('pdf');
                $this->pdf->setPaper('A3', 'potrait');
                $this->pdf->filename = "laporan".$r.".pdf";
                $this->pdf->load_view('laporan/gudang/laporan/laporanfaktur', $data);
                $this->pdf->render();
                $this->pdf->output();
            } else { 
                $cekprinternya=1;
                $data['cekprinternya']=$cekprinternya;
                $this->load->view('laporan/gudang/laporan/laporanfaktur', $data);
            }

    } else {
        redirect('login');
    }
	}

    public function laporanretur() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $data['include'] = "laporan/gudang/form/laporanretur";
            $data['menusamping'] = "menufakturobat";
            $data['backhome'] = "gudang";
            $data['js'] = "pelayanan/farmasi/faktur/faktur";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtpbf"] = $this->bhp->datapbf();
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function kartustok() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("ppn");
            $data['include'] = "laporan/gudang/form/kartustok";
            $data['menusamping'] = "menufakturobat";
            $data['backhome'] = "gudang";
            $data['js'] = "pelayanan/farmasi/faktur/faktur";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtobat"] = $this->bhp->obatbhpkartustok();
            $data["dtdana"] = $this->ppn->pendanaan();
            $data['pilihjenis']=1;
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
            $pendanaan=$this->input->post("pendanaan");
            $data['awal']=$awal;
            $data['akhir']=$akhir;
            $data['idobat']=$idobat;
            $data['pendanaan']=$pendanaan;
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'Potrait');
            $this->pdf->filename = "".date("Ymdhms")."kartustok.pdf";
            $this->pdf->load_view('laporan/gudang/laporan/laporankartustok', $data);
            $this->pdf->render();
            $this->pdf->output();
    } else {
        redirect('login');
    }
	}

    public function posisistok() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("ppn");
            $data["dtgen"] = $this->bhp->obatjenis("GENERIK");
            $data["dtgol"] = $this->bhp->obatjenis("GOLONGAN");
            $data["dtkla"] = $this->bhp->obatjenis("KLASIFIKASI");

            $data["dtsatuan"] = $this->bhp->obatsatuan();
            $data["dtpbf"] = $this->bhp->datapbf();
            $data["dtmerk"] = $this->bhp->merk();
            $data["dtdana"] = $this->ppn->pendanaan();

            $data['include'] = "laporan/gudang/form/posisistok";
            $data['menusamping'] = "menufakturobat";
            $data['backhome'] = "gudang";
            $data['js'] = "pelayanan/farmasi/faktur/faktur";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtobat"] = $this->bhp->obatbhpkartustok();
            $data['pilihjenis']=1;


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
            
            $pilihjenisnya=$this->input->post("pilihjenis");

            $awal=$this->input->post("awal");
            $akhir=$this->input->post("akhir");
            
            $cekgen=$this->input->post("cekgen");
            $cekgol=$this->input->post("cekgol");
            $cekklas=$this->input->post("cekklas");
            $namecekdana=$this->input->post("namecekdana");
            $pendanaan=$this->input->post("pendanaan");
            $qtysaja=$this->input->post("qtysaja");

            if ( $pilihjenisnya==1) {
                $generik=$this->input->post("generik");
                $golongan=$this->input->post("golongan");
                $klasifikasi=$this->input->post("klasifikasi");
                $klasifikasi=$this->input->post("klasifikasi");
            } else {
                $generik='off';
                $golongan='off';
                $klasifikasi='off';
                $klasifikasi='off';
            }

            $data['pilihjenisnya']=$pilihjenisnya;

            $data['awal']=$awal;
            $data['akhir']=$akhir;

            $data['cekgen']=$cekgen;
            $data['cekgol']=$cekgol;
            $data['cekklas']=$cekklas;
            $data['namecekdana']=$namecekdana;

            $data['pendanaan']=$pendanaan;
            $data['generik']=$generik;
            $data['golongan']=$golongan;
            $data['klasifikasi']=$klasifikasi;
            $data['qtysaja']=$qtysaja;

            if ($this->input->post("cekprinter") == 3) {
                //excel
                $cekprinternya=3;
                $data['cekprinternya']=$cekprinternya;
                $this->load->view('laporan/gudang/laporan/laporanposisiharian', $data);
            } elseif ($this->input->post("cekprinter") == 2) {
                $cekprinternya=2;
                $data['cekprinternya']=$cekprinternya;
                $r = date("Ymd");
                $this->load->library('pdf');
                $this->pdf->setPaper('A3', 'potrait');
                $this->pdf->filename = "laporan".$r.".pdf";
                $this->pdf->load_view('laporan/gudang/laporan/laporanposisiharian', $data);
                $this->pdf->render();
                $this->pdf->output();
            } else { 
                $cekprinternya=1;
                $data['cekprinternya']=$cekprinternya;
                $this->load->view('laporan/gudang/laporan/laporanposisiharian', $data);
            }
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

    public function simpanfakturheaderbhp() {
        /**
         * proses simpan dan cek header faktur
         * tampilkan detail dari faktur header
         */
        if ($this->session->userdata("login") == TRUE) {
            $id = $this->input->get("sj");
            $this->load->model("fakturmdl");
            $dtheader = $this->fakturmdl->ambilheaderfakturbhp($id);
            if ($dtheader["header"] == null) {
                $dt["stat"] = $dtheader;
                echo json_encode($dt);
            } else {
                $nilaippn = $this->fakturmdl->ambilppn($id);
                $data["nilaippn"] = $nilaippn;
                $detail = $this->fakturmdl->ambildetail($id);
                $data["hasil"] = $detail;
                $dt["stat"] = $dtheader;
                $dt["dtview"] = $this->load->view('layanan/pelayanan/farmasi/pelayanan/fakturbhp/tabledetailfaktur', $data, TRUE);
                echo json_encode($dt);
            }
        } else {
            redirect('login');
        }
    }

    //bhp
    public function laporanfakturbhp() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("ppn");
            $data['include'] = "laporan/gudang/form/laporanfakturbhp";
            $data['menusamping'] = "menufakturbhp";
            $data['backhome'] = "gudang";
            $data['js'] = "pelayanan/farmasi/faktur/fakturbhp";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtpbf"] = $this->bhp->datapbf();
            $data["dtobat"] = $this->bhp->pilihbhpsaja();
            $data["dtdana"] = $this->ppn->pendanaan();
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function panggilcetakbhp_old() {
        if ($this->session->userdata("login") == TRUE) {
            $awal=$this->input->post("awal");
            $akhir=$this->input->post("akhir");
            $kondisicekpbf=$this->input->post("namecekpbf");
            $idvendor=$this->input->post("vendor");
            $data['awal']=$awal;
            $data['akhir']=$akhir;
            $data['kondisicekpbf']=$kondisicekpbf;
            $data['idvendor']=$idvendor;

            if ($this->input->post("cekprinter") == 3) {
                //excel
                $cekprinternya=3;
                $data['cekprinternya']=$cekprinternya;
                $this->load->view('laporan/gudang/laporan/laporanfakturbhp', $data);
            } elseif ($this->input->post("cekprinter") == 2) {
                $cekprinternya=2;
                $data['cekprinternya']=$cekprinternya;
                $r = date("Ymd");
                $this->load->library('pdf');
                $this->pdf->setPaper('A3', 'potrait');
                $this->pdf->filename = "laporan".$r.".pdf";
                $this->pdf->load_view('laporan/gudang/laporan/laporanfakturbhp', $data);
                $this->pdf->render();
                $this->pdf->output();
            } else { 
                $cekprinternya=1;
                $data['cekprinternya']=$cekprinternya;
                $this->load->view('laporan/gudang/laporan/laporanfakturbhp', $data);
            }
        } else {
            redirect('login');
        }
	}

    public function panggilcetakbhp() {
        if ($this->session->userdata("login") == TRUE) {
            $awal=$this->input->post("awal");
            $akhir=$this->input->post("akhir");
            $kondisicekpbf=$this->input->post("namecekpbf");
            $namecekobat=$this->input->post("namecekobat");
            $namecekdana=$this->input->post("namecekdana");
            $idvendor=$this->input->post("vendor");
            $pendanaan=$this->input->post("pendanaan");
            $obatnya=$this->input->post("obatnya");
            $data['awal']=$awal;
            $data['akhir']=$akhir;
            $data['kondisicekpbf']=$kondisicekpbf;
            $data['namecekobat']=$namecekobat;
            $data['namecekdana']=$namecekdana;
            $data['idvendor']=$idvendor;
            $data['pendanaan']=$pendanaan;
            $data['obatnya']=$obatnya;
            if ($this->input->post("cekprinter") == 3) {
                //excel
                $cekprinternya=3;
                $data['cekprinternya']=$cekprinternya;
                $this->load->view('laporan/gudang/laporan/laporanfakturbhp', $data);
            } elseif ($this->input->post("cekprinter") == 2) {
                $cekprinternya=2;
                $data['cekprinternya']=$cekprinternya;
                $r = date("Ymd");
                $this->load->library('pdf');
                $this->pdf->setPaper('A3', 'potrait');
                $this->pdf->filename = "laporan".$r.".pdf";
                $this->pdf->load_view('laporan/gudang/laporan/laporanfakturbhp', $data);
                $this->pdf->render();
                $this->pdf->output();
            } else { 
                $cekprinternya=1;
                $data['cekprinternya']=$cekprinternya;
                $this->load->view('laporan/gudang/laporan/laporanfakturbhp', $data);
            }

        } else {
            redirect('login');
        }
	}


    public function kartustokbhp() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("ppn");
            $data['include'] = "laporan/gudang/form/kartustok";
            $data['menusamping'] = "menufakturbhp";
            $data['backhome'] = "gudang";
            $data['js'] = "pelayanan/farmasi/faktur/faktur";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtobat"] = $this->bhp->obatbhpkartustok();
            $data["dtdana"] = $this->ppn->pendanaan();
            $data['pilihjenis']=2;
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function cetakkartustokbhp() {
        if ($this->session->userdata("login") == TRUE) {
            $awal=$this->input->post("awal");
            $akhir=$this->input->post("akhir");
            $idobat=$this->input->post("idobat");
            $pendanaan=$this->input->post("pendanaan");
            $data['awal']=$awal;
            $data['akhir']=$akhir;
            $data['idobat']=$idobat;
            $data['pendanaan']=$pendanaan;
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'Potrait');
            $this->pdf->filename = "".date("Ymdhms")."kartustok.pdf";
            $this->pdf->load_view('laporan/gudang/laporan/laporankartustok', $data);
            $this->pdf->render();
            $this->pdf->output();
    } else {
        redirect('login');
    }
	}


    public function posisistokbhp() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("ppn");
            $data["dtsatuan"] = $this->bhp->obatsatuan();
            $data["dtpbf"] = $this->bhp->datapbf();
            $data["dtmerk"] = $this->bhp->merk();
            $data["dtdana"] = $this->ppn->pendanaan();

            $data['include'] = "laporan/gudang/form/posisistok";
            $data['menusamping'] = "menufakturbhp";
            $data['backhome'] = "gudang";
            $data['js'] = "pelayanan/farmasi/faktur/faktur";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtobat"] = $this->bhp->obatbhpkartustok();
            $data['pilihjenis']=2;

            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }



    public function cekexpire() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");

            $data["dtsatuan"] = $this->bhp->obatsatuan();
            $data["dtpbf"] = $this->bhp->datapbf();
            $data["dtmerk"] = $this->bhp->merk();

            $data['include'] = "laporan/gudang/form/cekexpire";
            $data['menusamping'] = "menufakturobat";
            $data['backhome'] = "gudang";
            $data['js'] = "pelayanan/farmasi/faktur/faktur";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtobat"] = $this->bhp->obatbhpkartustok();
            $data['pilihjenis']=1;

            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }



    public function panggilcetakexpire() {
        if ($this->session->userdata("login") == TRUE) {
            $awal=$this->input->post("awal");
            $akhir=$this->input->post("akhir");
            $data['awal']=$awal;
            $data['akhir']=$akhir;
            // $data['jenis']=0; //0=obat 1=bhp 
            $data['jenis']=$this->input->post("jenis");
            if ($this->input->post("cekprinter") == 3) {
                //excel
                $cekprinternya=3;
                $data['cekprinternya']=$cekprinternya;
                $this->load->view('laporan/gudang/laporan/laporanexpire', $data);
            } elseif ($this->input->post("cekprinter") == 2) {
                $cekprinternya=2;
                $data['cekprinternya']=$cekprinternya;
                $r = date("Ymd");
                $this->load->library('pdf');
                $this->pdf->setPaper('A3', 'potrait');
                $this->pdf->filename = "laporan".$r.".pdf";
                $this->pdf->load_view('laporan/gudang/laporan/laporanexpire', $data);
                $this->pdf->render();
                $this->pdf->output();
            } else { 
                $cekprinternya=1;
                $data['cekprinternya']=$cekprinternya;
                $this->load->view('laporan/gudang/laporan/laporanexpire', $data);
            }
        }    
    }    

    public function cekexpirebhp() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");

            $data["dtsatuan"] = $this->bhp->obatsatuan();
            $data["dtpbf"] = $this->bhp->datapbf();
            $data["dtmerk"] = $this->bhp->merk();

            $data['include'] = "laporan/gudang/form/cekexpire";
            $data['menusamping'] = "menufakturbhp";
            $data['backhome'] = "gudang";
            $data['js'] = "pelayanan/farmasi/faktur/faktur";
            $data['css'] = "pelayanan/farmasi/faktur/faktur";
            $data["dtobat"] = $this->bhp->obatbhpkartustok();
            $data['pilihjenis']=2;

            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }
    
}
