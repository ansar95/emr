<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterrtangga extends CI_Controller {

    // master obat
    public function masteraset() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/rt/master/dataaset";
            $data['menusamping'] = "menurt";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/rt/master/masteraset";
            $data['css'] = "pelayanan/rt/master/masteraset";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function paginationobat() {
        $this->load->model("aset");
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->aset->count_all();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&gt;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&lt;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config["per_page"];

        $output = array(
            'pagination_link' => $this->pagination->create_links(),
            'obat' => $this->aset->fetch_details($config["per_page"], $start)
        );
        echo json_encode($output);
    }

    public function panggiltambahobat() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("aset");
            $data["dtjenis"] = $this->aset->obatjenis("JENIS");
            $data["dtgol"] = $this->aset->obatjenis("GOLONGAN");
            $data["dtkla"] = $this->aset->obatjenis("KLASIFIKASI");
            $data["dtgen"] = $this->aset->obatjenis("GENERIK");
            $data["dtsatuan"] = $this->aset->obatsatuan();
            $data["dtpbf"] = $this->aset->datapbf();
            $data["dtmerk"] = $this->aset->merk();
            $data["formpilih"] = 0;
            $this->load->view('layanan/pelayanan/rt/master/formaset', $data);
        } else {
            redirect('login');
        }
    }

    public function simpandataobat() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("aset");
            $dtsimpan = $this->aset->simpandataobat();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

   

    public function panggileditobat() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("aset");

            $data["dtjenis"] = $this->aset->obatjenis("JENIS");
            $data["dtgol"] = $this->aset->obatjenis("GOLONGAN");
            $data["dtkla"] = $this->aset->obatjenis("KLASIFIKASI");
            $data["dtgen"] = $this->aset->obatjenis("GENERIK");
            $data["dtsatuan"] = $this->aset->obatsatuan();
            $data["dtpbf"] = $this->aset->datapbf();
            $data["dtmerk"] = $this->aset->merk();
            $data["dtobat"] = $this->aset->ambilobatedit();
            $data["formpilih"] = 1;
            $data["id"] = $this->input->get("id");
            $this->load->view('layanan/pelayanan/rt/master/formaset', $data);
        } else {
            redirect('login');
        }
    }



    public function editdataobat() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("aset");
            $dtsimpan = $this->aset->editdataobat();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

    public function panggilhapusobat() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("aset");
            $dtsimpan = $this->aset->hapusdataobat();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

    // master PBF
    public function masterpbf() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/farmasi/faktur/master/datapbf";
            $data['menusamping'] = "menufarfaktur";
            $data['backhome'] = "gudang";
            $data['js'] = "pelayanan/farmasi/master/masterpbf";
            $data['css'] = "pelayanan/farmasi/master/masterpbf";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function paginationpbf() {
        $this->load->model("aset");
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->bhp->count_all_pbf();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&gt;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&lt;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config["per_page"];

        $output = array(
            'pagination_link' => $this->pagination->create_links(),
            'obat' => $this->bhp->fetch_details_pbf($config["per_page"], $start)
        );
        echo json_encode($output);
    }

    public function panggiltambahpbf() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("aset");
            $data["formpilih"] = 0;
            $this->load->view('layanan/pelayanan/farmasi/faktur/master/formpbf', $data);
        } else {
            redirect('login');
        }
    }

    public function simpandatapbf() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("aset");
            $dtsimpan = $this->bhp->simpandatapbf();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

    public function panggileditpbf() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("aset");

            $data["dtpbf"] = $this->bhp->ambilpbfedit();
            $data["formpilih"] = 1;
            $data["id"] = $this->input->get("id");
            $this->load->view('layanan/pelayanan/farmasi/faktur/master/formpbf', $data);
        } else {
            redirect('login');
        }
    }

    public function editdatapbf() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("aset");
            $dtsimpan = $this->bhp->editdatapbf();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

}
