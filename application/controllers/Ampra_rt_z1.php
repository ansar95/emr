<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ampra_rt extends CI_Controller {

    public function amprabhp() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("unit");
            $data['include'] = "layanan/pelayanan/ampra_rt/bhp/amprabhplist";
            $data['menusamping'] = "menurt";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/ampra_rt/amprabhp";
            $data['css'] = "pelayanan/ampra_rt/amprabhp";
            $data['unit'] = $this->unit->unitumum();
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function caritglorder() {
        if ($this->session->userdata("login") == TRUE) {

            $this->load->model("ampramdl_rt");
            $detail = $this->ampramdl_rt->ambiltanggalorder();
            $data["hasil"] = $detail;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/ampra_rt/bhp/tabletanggalamprabhp', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function tambahamprabhp() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("aset");
            $this->load->model("satuan");

            $data['dtampra'] = $this->aset->full();
            $data['dtsatuan'] = $this->satuan->pilihsatuan();
            $data["tgl"] = $this->input->get("tgl");
            $data["formpilih"] = 0;
            $this->load->view('layanan/pelayanan/ampra_rt/bhp/formbhpampra', $data);
        } else {
            redirect('login');
        }
    }

    public function amprabhpcari() {
        $this->load->model("ampramdl_rt");
        $dt["dtampra"] = $this->ampramdl_rt->ambilfakturdetailharga();
        echo json_encode($dt);
    }

    public function simpanamprabhp() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("ampramdl_rt");
            $dtresep = $this->ampramdl_rt->simpanamprabhp();
            $date = date_create($this->input->get("tgl"));
            $tglorder = date_format($date,"Y-m-d");
            $detail = $this->ampramdl_rt->ambildetailamprabhp($tglorder);
            $data["hasil"] = $detail;
            $dt["stat"] = $dtresep;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/ampra_rt/bhp/tableamprabhp', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function ubahamprabhp() {
        if ($this->session->userdata("login") == TRUE) {

            $this->load->model("ampramdl_rt");
            $dtubah = $this->ampramdl_rt->ubahamprabhp();
            $date = date_create($this->input->get("tgl"));
            $tglorder = date_format($date,"Y-m-d");
            $detail = $this->ampramdl_rt->ambildetailamprabhp($tglorder);
            $data["hasil"] = $detail;
            $dt["stat"] = $dtubah;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/ampra_rt/bhp/tableamprabhp', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function hapusamprabhp() {
        if ($this->session->userdata("login") == TRUE) {

            $this->load->model("ampramdl_rt");
            $dtubah = $this->ampramdl_rt->hapusdetailamprabhp();
            $date = date_create($this->input->get("tgl"));
            $tglorder = date_format($date,"Y-m-d");
            $detail = $this->ampramdl_rt->ambildetailamprabhp($tglorder);
            $data["hasil"] = $detail;
            $dt["stat"] = $dtubah;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/ampra_rt/bhp/tableamprabhp', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function ambildatatanggalamprabhp() {
        if ($this->session->userdata("login") == TRUE) {

            $this->load->model("ampramdl_rt");
            $date = date_create($this->input->get("tgl"));
            $tglorder = date_format($date,"Y-m-d");
            $detail = $this->ampramdl_rt->ambildetailamprabhp($tglorder);
            $data["hasil"] = $detail;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/ampra_rt/bhp/tableamprabhp', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function editamprabhp() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("aset");
            $this->load->model("satuan");
            $this->load->model("ampramdl_rt");

            $detail = $this->ampramdl_rt->ambildetaileditamprabhp();
            if ($detail == null) {
                // $data['dtdetail'] = $detail;
                // echo json_encode($data);
            } else {
                $data['dtdetail'] = $detail;
                // echo json_encode($data);
                $data['dtampra'] = $this->aset->full();
                $data['dtsatuan'] = $this->satuan->pilihsatuan();
                $data["tgl"] = $this->input->get("tgl");
                $data["formpilih"] = 1;
                $this->load->view('layanan/pelayanan/ampra_rt/bhp/formbhpampra', $data);
            }
        } else {
            redirect('login');
        }
    }

}
