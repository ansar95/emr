<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index() {
		if ($this->session->userdata("login") == TRUE) {
			$data['include'] = "layanan/adm/user/puser";
			$data['menusamping'] = "menuadmuser";
			$data['backhome'] = "tiga";
			// $data['js'] = "adm/user/admuser";
			// $data['css'] = "adm/user/admuser";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function datauser() {
		if ($this->session->userdata("login") == TRUE) {

			$this->load->model("user");

			// $dttop = $this->user->top();
			// $datarole = array();
			// foreach ($dttop as $row) {
			// 	if ($row->id == 1) {
			// 		$t = $this->user->pelayanan();
			// 		$subtop = array();
			// 		foreach ($t as $ti) {
			// 			$dsub = $this->user->subpelayanan($ti->id);
			// 			$subsub = array(
			// 				"id" => $ti->id,
			// 				"id_top_role" => $ti->id_top_role,
			// 				"kodemenu" => $ti->kodemenu,
			// 				"menu" => $ti->menu,
			// 				"link" => $ti->link,
			// 				"img" => $ti->img,
			// 				"urut" => $ti->urut,
			// 				"sub" => $dsub
			// 			);
			// 			array_push($subtop, $subsub);
			// 		}
			// 	} else if ($row->id == 2) {
			// 		$subtop = array();
			// 	} else if ($row->id == 3) {
			// 		$subtop = array();
			// 	} else if ($row->id == 4) {
			// 		$subtop = $this->user->administrasi();
			// 	}
			// 	$top = array(
			// 		"id" => $row->id,
			// 		"kode_top_role" => $row->kode_top_role,
			// 		"top_role" => $row->top_role,
			// 		"link" => $row->link,
			// 		"img" => $row->img,
			// 		"urut" => $row->urut,
			// 		"sub" => $subtop
			// 	);
			// 	array_push($datarole, $top);
			// }

			$this->load->model("unit");
			$dtunit = $this->unit->unitumum();
			
			// $data["filter"] = $datarole;
			$data["dtunit"] = $dtunit;
			$data['include'] = "layanan/adm/user/datauser";
			$data['menusamping'] = "menuadmuser";
			$data['backhome'] = "tiga";
			$data['js'] = "adm/user/admuser";
			$data['css'] = "adm/user/admuser";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function paginationunit() {
		$this->load->model("user");
		$config = array();
		$config["base_url"] = "#";
		$config["total_rows"] = $this->user->count_all();
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
			'datauser' => $this->user->fetch_details($config["per_page"], $start)
		);
		echo json_encode($output);
	}

	public function persiapanedit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("user");
			$dtuser = $this->user->ambildatauser();

			$dt["dtuser"] = $dtuser;

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function simpandatauser() {
		$http_header = 500;
		if ($this->session->userdata("login") == TRUE) {
			try {
				$this->load->model("user");
				$username = $this->input->get('us');
				if ($this->user->isUserRegistered($username)) {
					$http_header = 400;
					throw new Exception("Username telah digunakan", 1);
				}
				$dtsimpan = $this->user->usersimpan();

				$dt["dtsimpan"] = $dtsimpan;

				echo json_encode([
					'status' => true,
					'data'=> $dt
				]);
			} catch (\Throwable $th) {
				$this->output->set_status_header($http_header);
				echo json_encode([
					'status' => true,
					'message'=> $th->getMessage()
				]);
			}
			
		} else {
			redirect('login');
		}
	}


	public function editdatauser() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("user");
			$dtsimpan = $this->user->useredit();

			$dt["dtsimpan"] = $dtsimpan;

			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function ubahpassglobal() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/resetpass";
            $data['backhome'] = "pass";
            $data['js'] = "general/gantipass";
            $data['css'] = "general/gantipass";
            $this->load->view('templatetopbar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function prosespass() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("user");
            $dtsimpan = $this->user->ubahpass();

            $dt["dtsimpan"] = $dtsimpan;

            echo json_encode($dt);
        } else {
            redirect('login');
        }
	}
		
	public function aktifkanuser() {
		if ($this->session->userdata("login") == TRUE) {
            $this->load->model("user");
            $dtsimpan = $this->user->didactive();
            echo json_encode($dtsimpan);
        } else {
            redirect('login');
        }
	}
	
}
