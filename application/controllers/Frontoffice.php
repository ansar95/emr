<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontoffice extends CI_Controller
{

    public function daftarpasien()
    {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/frontoffice/daftarpasien";
            $data['menusamping'] = "menufrontoffice";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/front/datapasien";
            $data['css'] = "pelayanan/front/datapasien";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function paginationpasien()
    {
        $this->load->model("frontmodel");
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->frontmodel->count_all_pasien();
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
            'pasien' => $this->frontmodel->fetch_details_pasien($config["per_page"], $start)
        );
        echo json_encode($output);
    }

    public function caripaginationpasien()
    {
        $this->load->model("frontmodel");
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->frontmodel->cari_count_all_pasien();
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
            'pasien' => $this->frontmodel->cari_fetch_details_pasien($config["per_page"], $start)
        );
        echo json_encode($output);
    }

    public function daftartempattidur()
    {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/frontoffice/tempattidur";
            $data['menusamping'] = "menufrontoffice";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/front/tempattidur";
            $data['css'] = "pelayanan/front/datapasien";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function paginationtempat()
    {
        $this->load->model("frontmodel");
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->frontmodel->count_all_tempat();
        $config["per_page"] = 15;
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
            'pasien' => $this->frontmodel->fetch_details_tempat($config["per_page"], $start)
        );
        echo json_encode($output);
    }

    public function refreshtempat()
    {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("frontmodel");
            $this->frontmodel->refreshkamar();
            $config = array();
            $config["base_url"] = "#";
            $config["total_rows"] = $this->frontmodel->count_all_tempat();
            $config["per_page"] = 15;
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
                'pasien' => $this->frontmodel->fetch_details_tempat($config["per_page"], $start)
            );
            echo json_encode($output);
        } else {
            redirect('login');
        }
    }
}
