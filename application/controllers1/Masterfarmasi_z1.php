<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterfarmasi extends CI_Controller {

    // master obat
    public function masterobat() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/farmasi/faktur/master/dataobat";
            $data['menusamping'] = "menufarfaktur";
            $data['backhome'] = "gudang";
            $data['js'] = "pelayanan/farmasi/master/masterobat";
            $data['css'] = "pelayanan/farmasi/master/masterobat";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function paginationobat() {
        $this->load->model("bhp");
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->bhp->count_all();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li class="page-item">';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li class="page-item">';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&gt;';
        $config["next_tag_open"] = '<li class="page-item">';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&lt;";
        $config["prev_tag_open"] = '<li class="page-item">';
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='page-item active'><a class='page-link' href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li class='page-item'>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;
        $config['data_page_attr'] = "class='page-link' data-ci-pagination-page";
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config["per_page"];

        $output = array(
            'pagination_link' => $this->pagination->create_links(),
            'obat' => $this->bhp->fetch_details($config["per_page"], $start)
        );
        echo json_encode($output);
    }

    public function panggiltambahobat() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $data["dtjenis"] = $this->bhp->obatjenis("JENIS");
            $data["dtgol"] = $this->bhp->obatjenis("GOLONGAN");
            $data["dtkla"] = $this->bhp->obatjenis("KLASIFIKASI");
            $data["dtgen"] = $this->bhp->obatjenis("GENERIK");
            $data["dtsatuan"] = $this->bhp->obatsatuan();
            $data["dtpbf"] = $this->bhp->datapbf();
            $data["dtmerk"] = $this->bhp->merk();
            $data["formpilih"] = 0;
            $this->load->view('layanan/pelayanan/farmasi/faktur/master/formobat', $data);
        } else {
            redirect('login');
        }
    }

    public function simpandataobat() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $dtsimpan = $this->bhp->simpandataobat();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

    public function panggileditobat() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");

            $data["dtjenis"] = $this->bhp->obatjenis("JENIS");
            $data["dtgol"] = $this->bhp->obatjenis("GOLONGAN");
            $data["dtkla"] = $this->bhp->obatjenis("KLASIFIKASI");
            $data["dtgen"] = $this->bhp->obatjenis("GENERIK");
            $data["dtsatuan"] = $this->bhp->obatsatuan();
            $data["dtpbf"] = $this->bhp->datapbf();
            $data["dtmerk"] = $this->bhp->merk();
            $data["dtobat"] = $this->bhp->ambilobatedit();
            $data["formpilih"] = 1;
            $data["id"] = $this->input->get("id");
            $this->load->view('layanan/pelayanan/farmasi/faktur/master/formobat', $data);
        } else {
            redirect('login');
        }
    }

    public function editdataobat() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $dtsimpan = $this->bhp->editdataobat();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

    // master BHP
    public function masterbhp() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/farmasi/faktur/master/databhp";
            $data['menusamping'] = "menufarfaktur";
            $data['backhome'] = "gudang";
            $data['js'] = "pelayanan/farmasi/master/masterbhp";
            $data['css'] = "pelayanan/farmasi/master/masterbhp";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function paginationbhp() {
        $this->load->model("bhp");
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->bhp->count_all_bhp();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li class="page-item">';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li class="page-item">';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&gt;';
        $config["next_tag_open"] = '<li class="page-item">';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&lt;";
        $config["prev_tag_open"] = '<li class="page-item">';
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='page-item active'><a class='page-link' href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li class='page-item'>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;
        $config['data_page_attr'] = "class='page-link' data-ci-pagination-page";
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config["per_page"];

        $output = array(
            'pagination_link' => $this->pagination->create_links(),
            'obat' => $this->bhp->fetch_details_bhp($config["per_page"], $start)
        );
        echo json_encode($output);
    }

    public function panggiltambahbhp() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $data["dtjenis"] = $this->bhp->obatjenis("JENIS");
            $data["dtgol"] = $this->bhp->obatjenis("GOLONGAN");
            $data["dtkla"] = $this->bhp->obatjenis("KLASIFIKASI");
            $data["dtgen"] = $this->bhp->obatjenis("GENERIK");
            $data["dtsatuan"] = $this->bhp->obatsatuan();
            $data["dtpbf"] = $this->bhp->datapbf();
            $data["dtmerk"] = $this->bhp->merk();
            $data["formpilih"] = 0;
            $this->load->view('layanan/pelayanan/farmasi/faktur/master/formbhp', $data);
        } else {
            redirect('login');
        }
    }

    public function simpandatabhp() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $dtsimpan = $this->bhp->simpandatabhp();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

    public function panggileditbhp() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");

            $data["dtjenis"] = $this->bhp->obatjenis("JENIS");
            $data["dtgol"] = $this->bhp->obatjenis("GOLONGAN");
            $data["dtkla"] = $this->bhp->obatjenis("KLASIFIKASI");
            $data["dtgen"] = $this->bhp->obatjenis("GENERIK");
            $data["dtsatuan"] = $this->bhp->obatsatuan();
            $data["dtpbf"] = $this->bhp->datapbf();
            $data["dtmerk"] = $this->bhp->merk();
            $data["dtobat"] = $this->bhp->ambilobatedit();
            $data["formpilih"] = 1;
            $data["id"] = $this->input->get("id");
            $this->load->view('layanan/pelayanan/farmasi/faktur/master/formbhp', $data);
        } else {
            redirect('login');
        }
    }

    public function editdatabhp() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $dtsimpan = $this->bhp->editdatabhp();
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
        $this->load->model("bhp");
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->bhp->count_all_pbf();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li class="page-item">';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li class="page-item">';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&gt;';
        $config["next_tag_open"] = '<li class="page-item">';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&lt;";
        $config["prev_tag_open"] = '<li class="page-item">';
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='page-item active'><a class='page-link' href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li class='page-item'>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;
        $config['data_page_attr'] = "class='page-link' data-ci-pagination-page";
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
            $this->load->model("bhp");
            $data["formpilih"] = 0;
            $this->load->view('layanan/pelayanan/farmasi/faktur/master/formpbf', $data);
        } else {
            redirect('login');
        }
    }

    public function simpandatapbf() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $dtsimpan = $this->bhp->simpandatapbf();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

    public function panggileditpbf() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");

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
            $this->load->model("bhp");
            $dtsimpan = $this->bhp->editdatapbf();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

}
