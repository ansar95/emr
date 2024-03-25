<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakturpelayanan extends CI_Controller {

  	public function appgudangfaktur() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			$data['include'] = "layanan/pelayanan/farmasi/faktur/pfaktur";
			$data['menusamping'] = "menufarfaktur";
			$data['backhome'] = "gudang";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
  	}

  	public function dataunitdropping() {
		if ($this->session->userdata("login") == TRUE) {
			// $this->load->model("bhp");

			$data['include'] = "layanan/pelayanan/farmasi/pelayanan/pelayanan/ampra/dropping/listunitdropping";
			$data['menusamping'] = "menufarfaktur";
			$data['backhome'] = "tiga";
			$data['js'] = "pelayanan/farmasi/faktur/pelayanan/ampra/dropping/unitdropping";
			$data['css'] = "pelayanan/farmasi/faktur/pelayanan/ampra/dropping/unitdropping";
			// $data["dtpbf"] = $this->bhp->datapbf();
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function cariunitbydate() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("fakturpelayananmdl");
            $dtunit = $this->fakturpelayananmdl->unitbydate();
            if ($dtunit == null) {
                $dt["stat"] = false;
    
                echo json_encode($dt);
            } else {
                $data["hasil"] = $dtunit;
                $dt["stat"] = true;
                $dt["dtview"] = $this->load->view('layanan/pelayanan/farmasi/pelayanan/pelayanan/ampra/dropping/tabledroppingunit', $data, TRUE);
    
                echo json_encode($dt);
            }
        } else {
            redirect('login');
        }
	}
	
	public function ambildetailunit() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("fakturpelayananmdl");
            $dtunit = $this->fakturpelayananmdl->detailampraunit();
            if ($dtunit == null) {
                $dt["stat"] = false;
    
                echo json_encode($dt);
            } else {
                $data["hasil"] = $dtunit;
                $data["unit"] = $this->input->get("unit");
                $dt["stat"] = true;
                $dt["dtview"] = $this->load->view('layanan/pelayanan/farmasi/pelayanan/pelayanan/ampra/dropping/boxdetaildropping', $data, TRUE);
    
                echo json_encode($dt);
            }
        } else {
            redirect('login');
        }
	}
	
	public function tambahdetaildropping() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("ampramdl");
            $this->load->model("fakturpelayananmdl");

            $dataRow = $this->fakturpelayananmdl->detailampraunitrow();
            $data['dtobat'] = $this->fakturpelayananmdl->ambilfakturdetail($dataRow->kodeobat);
            $data['dtrow'] = $dataRow;
            $data["formpilih"] = 0;
            $this->load->view('layanan/pelayanan/farmasi/pelayanan/pelayanan/ampra/dropping/formdropping', $data);
        } else {
            redirect('login');
        }
	}
	
	public function cariampradetail() {
        $this->load->model("fakturpelayananmdl");
        $dt["dtampra"] = $this->fakturpelayananmdl->ambilfakturdetailharga();
        echo json_encode($dt);
	}
	
	public function simpanupdateampra() {
        if ($this->session->userdata("login") == TRUE) {
			$this->load->model("fakturpelayananmdl");
			$prosessimpan = $this->fakturpelayananmdl->simpanupdateampra();
            if ($prosessimpan == false) {
                $dt["stat"] = false;
                echo json_encode($dt);
            } else {
				$dtunit = $this->fakturpelayananmdl->detailampraunit();
                $data["hasil"] = $dtunit;
                $dt["stat"] = true;
                $dt["dtview"] = $this->load->view('layanan/pelayanan/farmasi/pelayanan/pelayanan/ampra/dropping/boxdetaildropping', $data, TRUE);
    
                echo json_encode($dt);
            }
        } else {
            redirect('login');
        }
	}
	
	public function hapusdropping() {
        if ($this->session->userdata("login") == TRUE) {
			$this->load->model("fakturpelayananmdl");
			$prosessimpan = $this->fakturpelayananmdl->hapusdetaildropping();
            if ($prosessimpan == false) {
                $dt["stat"] = false;
    
                echo json_encode($dt);
            } else {
				$dtunit = $this->fakturpelayananmdl->detailampraunit();
                $data["hasil"] = $dtunit;
                $dt["stat"] = true;
                $dt["dtview"] = $this->load->view('layanan/pelayanan/farmasi/pelayanan/pelayanan/ampra/dropping/boxdetaildropping', $data, TRUE);
    
                echo json_encode($dt);
            }
        } else {
            redirect('login');
        }
	}
	
	public function panggiltambahdetaildropping() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("ampramdl");
			$this->load->model("fakturpelayananmdl");
			$this->load->model("bhp");
			$this->load->model("satuan");

			$data['dtbhp'] = $this->bhp->halffull();
            // $data['dtobat'] = $this->ampramdl->ambilfakturdetail();
			$data['dtrow'] = $this->fakturpelayananmdl->detailampraunitrow();
			$data['dtsatuan'] = $this->satuan->pilihsatuan();
            $data["formpilih"] = 1;
            $this->load->view('layanan/pelayanan/farmasi/pelayanan/pelayanan/ampra/dropping/formdropping', $data);
        } else {
            redirect('login');
        }
    }
    
    public function getoptionobatbyidobat() {
        $this->load->model("fakturpelayananmdl");

        $id = $this->input->get("id");
        $data['hasil'] = $this->fakturpelayananmdl->ambilfakturdetail($id);
        $dt["dtview"] = $this->load->view('layanan/pelayanan/farmasi/pelayanan/pelayanan/ampra/dropping/selectobatformdropping', $data, TRUE);
        echo json_encode($dt);
    }

	public function simpantambahampra() {
        if ($this->session->userdata("login") == TRUE) {
			$this->load->model("fakturpelayananmdl");
			$prosessimpan = $this->fakturpelayananmdl->simpantambahampra();
            if ($prosessimpan == false) {
                $dt["stat"] = false;
    
                echo json_encode($dt);
            } else {
				$dtunit = $this->fakturpelayananmdl->detailampraunit();
                $data["hasil"] = $dtunit;
                $dt["stat"] = true;
                $dt["dtview"] = $this->load->view('layanan/pelayanan/farmasi/pelayanan/pelayanan/ampra/dropping/boxdetaildropping', $data, TRUE);
    
                echo json_encode($dt);
            }
        } else {
            redirect('login');
        }
	}


    public function cetaklembarampra($ruang,$tglx) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('A3', 'potrait');
			$this->pdf->filename = "formampra".$r.".pdf";
			// $data["id"] = $id;
			$data["ruang"] = $ruang;
			$data["tglx"] = $tglx;
			$this->pdf->load_view('laporan/gudang/laporan/lembarampra', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}    

        //kebutuhan laporan ampra
        public function laporanampra() {
            if ($this->session->userdata("login") == TRUE) {
                $this->load->model("unit");
                $data['include'] = "layanan/pelayanan/farmasi/pelayanan/pelayanan/ampra/formlaporanampra";
                $data['menusamping'] = "menufarfaktur";
                $data['backhome'] = "tiga";
                $data['js'] = "pelayanan/farmasi/faktur/faktur";
                $data['css'] = "pelayanan/farmasi/faktur/faktur";
                $data["dtunit"] = $this->unit->unitumum();
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
                $idvendor=$this->input->post("vendor"); //vendor=>unit
                $data['awal']=$awal;
                $data['akhir']=$akhir;
                $data['kondisicekpbf']=$kondisicekpbf;
                $data['idvendor']=$idvendor; //idvendor=>kode_unit
                $data['pilihjenis']=$pilihjenis;
                // $this->load->library('pdf');
                // $this->pdf->setPaper('A4', 'Landscape');
                // $this->pdf->filename = "".date("Ymdhms")."lapfaktur.pdf";
                // $this->pdf->load_view('laporan/gudang/laporan/laporanfaktur', $data);
                // $this->pdf->render();
                // $this->pdf->output();
            $this->load->view('laporan/gudang/laporan/laporanampra', $data);
        } else {
            redirect('login');
        }
        }
    
}