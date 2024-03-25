<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ampra extends CI_Controller {

    public function ampraobat() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("unit");
            $data['include'] = "layanan/pelayanan/ampra/bhp/amprabhplist";
            $data['menusamping'] = "menuampra";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/ampra/amprabhp";
            $data['css'] = "pelayanan/ampra/amprabhp";
            $data['unit'] = $this->unit->unitumum();
            $data['bhp']=0;
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function amprabhp() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("unit");
            $data['include'] = "layanan/pelayanan/ampra/bhp/amprabhplist";
            $data['menusamping'] = "menuampra";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/ampra/amprabhp";
            $data['css'] = "pelayanan/ampra/amprabhp";
            $data['unit'] = $this->unit->unitumum();
            $data['bhp']=1;
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function caritglorder() {
        if ($this->session->userdata("login") == TRUE) {

            $this->load->model("ampramdl");
            $detail = $this->ampramdl->ambiltanggalorder();
            $data["hasil"] = $detail;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/ampra/bhp/tabletanggalamprabhp', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function tambahampra() {
        if ($this->session->userdata("login") == TRUE) {

            $this->load->model("bhp");
            $this->load->model("satuan");
            $this->load->model("ppn");
            if ($this->input->get("bhp") == 0) {
                $data['dtampra'] = $this->bhp->pilihobatsaja();
            } else {
                $data['dtampra'] = $this->bhp->pilihbhpsaja();
            }    
            $data['dtsatuan'] = $this->satuan->pilihsatuan();
            $data["tgl"] = $this->input->get("tgl");
            $data['bhp'] = $this->input->get("bhp");
            $data['dtdana'] = $this->ppn->pendanaan();
            $data["formpilih"] = 0;
            $this->load->view('layanan/pelayanan/ampra/bhp/formbhpampra', $data);
        } else {
            redirect('login');
        }
    }

    public function amprabhpcari() {
        $this->load->model("ampramdl");
        $dt["dtampra"] = $this->ampramdl->ambilfakturdetailharga();
        echo json_encode($dt);
    }

    public function simpanamprabhp() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("ampramdl");
            $dtresep = $this->ampramdl->simpanamprabhp();
            $date = date_create($this->input->get("tgl"));
            $tglorder = date_format($date,"Y-m-d");
            $detail = $this->ampramdl->ambildetailamprabhp($tglorder);
            $data["hasil"] = $detail;
            $dt["stat"] = $dtresep;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/ampra/bhp/tableamprabhp', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function ubahamprabhp() {
        if ($this->session->userdata("login") == TRUE) {

            $this->load->model("ampramdl");
            $dtubah = $this->ampramdl->ubahamprabhp();
            $date = date_create($this->input->get("tgl"));
            $tglorder = date_format($date,"Y-m-d");
            $detail = $this->ampramdl->ambildetailamprabhp($tglorder);
            $data["hasil"] = $detail;
            $dt["stat"] = $dtubah;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/ampra/bhp/tableamprabhp', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function hapusamprabhp() {
        if ($this->session->userdata("login") == TRUE) {

            $this->load->model("ampramdl");
            $dtubah = $this->ampramdl->hapusdetailamprabhp();
            $date = date_create($this->input->get("tgl"));
            $tglorder = date_format($date,"Y-m-d");
            $detail = $this->ampramdl->ambildetailamprabhp($tglorder);
            $data["hasil"] = $detail;
            $dt["stat"] = $dtubah;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/ampra/bhp/tableamprabhp', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function ambildatatanggalamprabhp() {
        if ($this->session->userdata("login") == TRUE) {

            $this->load->model("ampramdl");
            $date = date_create($this->input->get("tgl"));
            $tglorder = date_format($date,"Y-m-d");
            $detail = $this->ampramdl->ambildetailamprabhp($tglorder);
            $data["hasil"] = $detail;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/ampra/bhp/tableamprabhp', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function editamprabhp() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("satuan");
            $this->load->model("ampramdl");

            $detail = $this->ampramdl->ambildetaileditamprabhp();
            if ($detail == null) {
                // $data['dtdetail'] = $detail;
                // echo json_encode($data);
            } else {
                $data['dtdetail'] = $detail;
                // echo json_encode($data);
                $data['dtampra'] = $this->bhp->full();
                $data['dtsatuan'] = $this->satuan->pilihsatuan();
                $data["tgl"] = $this->input->get("tgl");
                $data["formpilih"] = 1;
                $this->load->view('layanan/pelayanan/ampra/bhp/formbhpampra', $data);
            }
        } else {
            redirect('login');
        }
    }

}
