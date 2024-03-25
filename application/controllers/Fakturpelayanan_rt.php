<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakturpelayanan_rt extends CI_Controller {

  	public function appgudangfaktur() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			$data['include'] = "layanan/pelayanan/farmasi/faktur/pfaktur";
			$data['menusamping'] = "menurt";
			$data['backhome'] = "gudang";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
  	}

  	public function dataunitdropping() {
		if ($this->session->userdata("login") == TRUE) {
			// $this->load->model("bhp");

			$data['include'] = "layanan/pelayanan/rt/ampra/dropping/listunitdropping";
			$data['menusamping'] = "menurt";
			$data['backhome'] = "tiga";
			$data['js'] = "pelayanan/rt/ampra/dropping/unitdropping";
			$data['css'] = "pelayanan/rt/dropping/unitdropping";
			// $data["dtpbf"] = $this->bhp->datapbf();
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function cariunitbydate() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("fakturpelayananmdl_rt");
            $dtunit = $this->fakturpelayananmdl_rt->unitbydate();
            if ($dtunit == null) {
                $dt["stat"] = false;
    
                echo json_encode($dt);
            } else {
                $data["hasil"] = $dtunit;
                $dt["stat"] = true;
                $dt["dtview"] = $this->load->view('layanan/pelayanan/rt/ampra/dropping/tabledroppingunit', $data, TRUE);
    
                echo json_encode($dt);
            }
        } else {
            redirect('login');
        }
	}
	
	public function ambildetailunit() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("fakturpelayananmdl_rt");
            $dtunit = $this->fakturpelayananmdl_rt->detailampraunit();
            if ($dtunit == null) {
                $dt["stat"] = false;
    
                echo json_encode($dt);
            } else {
                $data["hasil"] = $dtunit;
                $data["unit"] = $this->input->get("unit");
                $dt["stat"] = true;
                $dt["dtview"] = $this->load->view('layanan/pelayanan/rt/ampra/dropping/boxdetaildropping', $data, TRUE);
    
                echo json_encode($dt);
            }
        } else {
            redirect('login');
        }
	}
	
	public function tambahdetaildropping() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("ampramdl");
            $this->load->model("fakturpelayananmdl_rt");

            $dataRow = $this->fakturpelayananmdl_rt->detailampraunitrow();
            $data['dtobat'] = $this->fakturpelayananmdl_rt->ambilfakturdetail($dataRow->kodeobat);
            $data['dtrow'] = $dataRow;
            $data["formpilih"] = 0;
            $this->load->view('layanan/pelayanan/rt/ampra/dropping/formdropping', $data);
        } else {
            redirect('login');
        }
	}
	
	public function cariampradetail() {
        $this->load->model("fakturpelayananmdl_rt");
        $dt["dtampra"] = $this->fakturpelayananmdl_rt->ambilfakturdetailharga();
        echo json_encode($dt);
	}
	
	public function simpanupdateampra() {
        if ($this->session->userdata("login") == TRUE) {
			$this->load->model("fakturpelayananmdl_rt");
			$prosessimpan = $this->fakturpelayananmdl_rt->simpanupdateampra();
            if ($prosessimpan == false) {
                $dt["stat"] = false;
                echo json_encode($dt);
            } else {
				$dtunit = $this->fakturpelayananmdl_rt->detailampraunit();
                $data["hasil"] = $dtunit;
                $dt["stat"] = true;
                $dt["dtview"] = $this->load->view('layanan/pelayanan/rt/ampra/dropping/boxdetaildropping', $data, TRUE);
    
                echo json_encode($dt);
            }
        } else {
            redirect('login');
        }
	}
	
	public function hapusdropping() {
        if ($this->session->userdata("login") == TRUE) {
			$this->load->model("fakturpelayananmdl_rt");
			$prosessimpan = $this->fakturpelayananmdl_rt->hapusdetaildropping();
            if ($prosessimpan == false) {
                $dt["stat"] = false;
    
                echo json_encode($dt);
            } else {
				$dtunit = $this->fakturpelayananmdl_rt->detailampraunit();
                $data["hasil"] = $dtunit;
                $dt["stat"] = true;
                $dt["dtview"] = $this->load->view('layanan/pelayanan/rt/ampra/dropping/boxdetaildropping', $data, TRUE);
    
                echo json_encode($dt);
            }
        } else {
            redirect('login');
        }
	}
	
	public function panggiltambahdetaildropping() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("ampramdl");
			$this->load->model("fakturpelayananmdl_rt");
			$this->load->model("bhp");
			$this->load->model("satuan");

			$data['dtbhp'] = $this->bhp->halffull();
            // $data['dtobat'] = $this->ampramdl->ambilfakturdetail();
			$data['dtrow'] = $this->fakturpelayananmdl_rt->detailampraunitrow();
			$data['dtsatuan'] = $this->satuan->pilihsatuan();
            $data["formpilih"] = 1;
            $this->load->view('layanan/pelayanan/rt/ampra/dropping/formdropping', $data);
        } else {
            redirect('login');
        }
    }
    
    public function getoptionobatbyidobat() {
        $this->load->model("fakturpelayananmdl_rt");

        $id = $this->input->get("id");
        $data['hasil'] = $this->fakturpelayananmdl_rt->ambilfakturdetail($id);
        $dt["dtview"] = $this->load->view('layanan/pelayanan/rt/ampra/dropping/selectobatformdropping', $data, TRUE);
        echo json_encode($dt);
    }

	public function simpantambahampra() {
        if ($this->session->userdata("login") == TRUE) {
			$this->load->model("fakturpelayananmdl_rt");
			$prosessimpan = $this->fakturpelayananmdl_rt->simpantambahampra();
            if ($prosessimpan == false) {
                $dt["stat"] = false;
    
                echo json_encode($dt);
            } else {
				$dtunit = $this->fakturpelayananmdl_rt->detailampraunit();
                $data["hasil"] = $dtunit;
                $dt["stat"] = true;
                $dt["dtview"] = $this->load->view('layanan/pelayanan/rt/ampra/dropping/boxdetaildropping', $data, TRUE);
    
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
}