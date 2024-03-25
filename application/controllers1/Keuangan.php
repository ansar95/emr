<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {

    // untuk Anggaran
    public function daftaranggaran() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/backoffice/akuntansi/anggaran/listanggaran";
            $data['menusamping'] = "menukeuangan";
            $data['backhome'] = "tiga";
            $data['js'] = "backoffice/keuangan/anggaran";
            $data['css'] = "backoffice/keuangan/anggaran";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function panggiltambahanggaran() {
        if ($this->session->userdata("login") == TRUE) {
            $data["formpilih"] = 0;
            $this->load->view('layanan/backoffice/akuntansi/anggaran/formanggaran', $data);
        } else {
            redirect('login');
        }
    }

    //untuk Bayar Invoice
    public function daftarbayarinvoice() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('keuanganmdl');

            $data['include'] = "layanan/backoffice/akuntansi/invoice/listinvoice";
            $data['menusamping'] = "menukeuangan";
            $data['backhome'] = "tiga";
            $data['js'] = "backoffice/keuangan/invoice";
            $data['css'] = "backoffice/keuangan/invoice";
            $data['pbf'] = $this->keuanganmdl->pbf();
            $data['koderek'] = $this->keuanganmdl->koderek();
            $data['rekakuntansi'] = $this->keuanganmdl->rekakuntansi();
            $data['reklra'] = $this->keuanganmdl->reklra();
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function panggiltambahinvoice() {
        if ($this->session->userdata("login") == TRUE) {
            $data["formpilih"] = 0;
            $this->load->view('layanan/backoffice/akuntansi/invoice/forminvoice', $data);
        } else {
            redirect('login');
        }
    }

    //untuk Master Rekening
    public function masterrekening() {
        if ($this->session->userdata("login") == TRUE) {

            $data['include'] = "layanan/backoffice/akuntansi/master/listrekening";
            $data['menusamping'] = "menukeuangan";
            $data['backhome'] = "tiga";
            $data['js'] = "backoffice/keuangan/rekening";
            $data['css'] = "backoffice/keuangan/rekening";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function pagingrekening() {
        $this->load->model("keuanganmdl");
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->keuanganmdl->count_rekening();
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
            'country_table' => $this->keuanganmdl->fetch_rek($config["per_page"], $start)
        );
        echo json_encode($output);
    }

    public function panggiltambahperkiraan() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("keuanganmdl");
            $data["formpilih"] = 0;
            $this->load->view('layanan/backoffice/akuntansi/master/formperkiraan', $data);
        } else {
            redirect('login');
        }
    }

    public function panggilanggaranrekening() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("keuanganmdl");
            $data["formpilih"] = 0;
            $data["id"] = $this->input->get('id');
            $data["data"] = $this->keuanganmdl->carianggaran();
            $this->load->view('layanan/backoffice/akuntansi/master/formanggaran', $data);
        } else {
            redirect('login');
        }
    }

    public function ubahanggaranrek() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("keuanganmdl");
            $dtsimpan = $this->keuanganmdl->ubahanggaranrek();
            $dt["stat"] = $dtsimpan;
            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

}
