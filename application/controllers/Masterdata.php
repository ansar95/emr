<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterdata extends CI_Controller {

	// master Unit
	public function masterunit() {
		if ($this->session->userdata("login") == TRUE) {
			$data['include'] = "layanan/pelayanan/master/unit/dataunit";
			$data['menusamping'] = "menumasterdata";
			$data['backhome'] = "tiga";
			$data['js'] = "pelayanan/master/masterunit";
			$data['css'] = "pelayanan/master/masterunit";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function paginationunit() {
		$this->load->model("unit");
		$config = array();
		$config["base_url"] = "#";
		$config["total_rows"] = $this->unit->count_all();
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
			'country_table' => $this->unit->fetch_details($config["per_page"], $start)
		);
		echo json_encode($output);
	}

	public function panggiltambahunit() {
		if ($this->session->userdata("login") == TRUE) {
			$data["formpilih"] = 0;
			$this->load->view('layanan/pelayanan/master/unit/formmasterunit', $data);
		} else {
			redirect('login');
		}
	}

	public function simpandataunit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("unit");
			$dtsimpan = $this->unit->simpandataunit();
			
			echo $dtsimpan;
		} else {
			redirect('login');
		}
	}

	public function panggileditunit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("unit");
			$dtunit = $this->unit->ambildataedit();

			$data["dtunit"] = $dtunit;
			$data["formpilih"] = 1;
            $data["id"] = $this->input->get("id");
			$this->load->view('layanan/pelayanan/master/unit/formmasterunit', $data);
		} else {
			redirect('login');
		}
	}

	public function editdataunit() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("unit");
			$dtsimpan = $this->unit->editdataunit();
			
			echo $dtsimpan;
		} else {
			redirect('login');
		}
	}

    public function deleteunit() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("unit");
            $dtsimpan = $this->unit->deletedataunit();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

	// master ruang perawatan
	public function masterruangrawat() {
		if ($this->session->userdata("login") == TRUE) {
			$data['include'] = "layanan/pelayanan/master/ruangrawat/dataruangrawat";
			$data['menusamping'] = "menumasterdata";
			$data['backhome'] = "tiga";
			$data['js'] = "pelayanan/master/masterruangrawat";
			$data['css'] = "pelayanan/master/masterruangrawat";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function paginationruang() {
		$this->load->model("ruangrawat");
		$config = array();
		$config["base_url"] = "#";
		$config["total_rows"] = $this->ruangrawat->count_all();
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
			'country_table' => $this->ruangrawat->fetch_details($config["per_page"], $start)
		);
		echo json_encode($output);
	}

	public function panggiltambahruang() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("unit");
			$dtunit = $this->unit->untukmasterruang();
			$data["dtunit"] = $dtunit;
			$data["formpilih"] = 0;
			$this->load->view('layanan/pelayanan/master/ruangrawat/formmasterruangrawat', $data);
		} else {
			redirect('login');
		}
	}

	public function simpandataruang() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ruangrawat");
			$dtsimpan = $this->ruangrawat->simpandatarawat();
			
			echo $dtsimpan;
		} else {
			redirect('login');
		}
	}

    public function panggileditruang() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("unit");
            $dtunit = $this->unit->untukmasterruang();
            $this->load->model("ruangrawat");
            $dtruang = $this->ruangrawat->ambildataedit();

            $data["dtunit"] = $dtunit;
            $data["dtruang"] = $dtruang;
            $data["formpilih"] = 1;
            $data["id"] = $this->input->get("id");
            $this->load->view('layanan/pelayanan/master/ruangrawat/formmasterruangrawat', $data);
        } else {
            redirect('login');
        }
    }

    public function editdataruang() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("ruangrawat");
            $dtsimpan = $this->ruangrawat->editdatarawat();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

    public function deletedataruang() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("ruangrawat");
            $dtsimpan = $this->ruangrawat->deletedatarawat();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

	// master kamar perawatan
	public function masterkamarrawat() {
		if ($this->session->userdata("login") == TRUE) {
			$data['include'] = "layanan/pelayanan/master/kamarrawat/datakamarrawat";
			$data['menusamping'] = "menumasterdata";
			$data['backhome'] = "tiga";
			$data['js'] = "pelayanan/master/masterkamarrawat";
			$data['css'] = "pelayanan/master/masterkamarrawat";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function paginationkamar() {
		$this->load->model("kamarrawat");
		$config = array();
		$config["base_url"] = "#";
		$config["total_rows"] = $this->kamarrawat->count_all();
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
			'country_table' => $this->kamarrawat->fetch_details($config["per_page"], $start)
		);
		echo json_encode($output);
	}

	public function panggiltambahkamar() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("Ruangrawat");
			$dtkelas = $this->Ruangrawat->untukcombo_masterkamar();
			$data["dtkelas"] = $dtkelas;
			$data["formpilih"] = 0;
			$this->load->view('layanan/pelayanan/master/kamarrawat/formmasterruangrawat', $data);
		} else {
			redirect('login');
		}
	}

	public function simpandatakamar() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("kamarrawat");
			$dtsimpan = $this->kamarrawat->simpandatakamar();
			
			echo $dtsimpan;
		} else {
			redirect('login');
		}
	}

    public function panggileditkamar() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("Ruangrawat");
            $dtkelas = $this->Ruangrawat->untukcombo_masterkamar();
            $this->load->model("kamarrawat");
            $dtkamar = $this->kamarrawat->ambildataedit();

            $data["dtkelas"] = $dtkelas;
            $data["dtkamar"] = $dtkamar;
            $data["formpilih"] = 1;
            $data["id"] = $this->input->get("id");
            $this->load->view('layanan/pelayanan/master/kamarrawat/formmasterruangrawat', $data);
        } else {
            redirect('login');
        }
    }

    public function editdatakamar() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("kamarrawat");
            $dtsimpan = $this->kamarrawat->editdatakamar();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

    public function deletedatakamar() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("kamarrawat");
            $dtsimpan = $this->kamarrawat->deletedatakamar();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

	// master tindakan
	public function mastertindakan() {
		if ($this->session->userdata("login") == TRUE) {
			$data['include'] = "layanan/pelayanan/master/tindakan/datatindakan";
			$data['menusamping'] = "menumasterdata";
			$data['backhome'] = "tiga";
			$data['js'] = "pelayanan/master/mastertindakan";
			$data['css'] = "pelayanan/master/mastertindakan";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function paginationtindakan() {
		$this->load->model("tindakan");
		$config = array();
		$config["base_url"] = "#";
		$config["total_rows"] = $this->tindakan->count_all();
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
			'country_table' => $this->tindakan->fetch_details($config["per_page"], $start)
		);
		echo json_encode($output);
	}

	public function panggiltambahtindakan() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("unit");
			$this->load->model("tindakan");
			$dtunit = $this->unit->untukmaster();
			$dtjenis = $this->tindakan->jenistindakan();
			$data["dtunit"] = $dtunit;
			$data["dtjenis"] = $dtjenis;
			$data["formpilih"] = 0;
			$this->load->view('layanan/pelayanan/master/tindakan/formmastertindakan', $data);
		} else {
			redirect('login');
		}
	}

	public function simpandatatindakan() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("tindakan");
			$dtsimpan = $this->tindakan->simpandatatindakan();
			
			echo $dtsimpan;
		} else {
			redirect('login');
		}
	}

    public function panggiledittindakan() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("unit");
            $this->load->model("tindakan");
            $dttind = $this->tindakan->ambildataedit();

            $dtunit = $this->unit->untukmaster();
            $dtjenis = $this->tindakan->jenistindakan();
            $data["dtunit"] = $dtunit;
            $data["dtjenis"] = $dtjenis;
            $data["dttind"] = $dttind;
            $data["formpilih"] = 1;
            $data["id"] = $this->input->get("id");
            $this->load->view('layanan/pelayanan/master/tindakan/formmastertindakan', $data);
        } else {
            redirect('login');
        }
    }

    public function editdatatindakan() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("tindakan");
            $dtsimpan = $this->tindakan->editdatatindakan();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

    public function deletetindakan() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("tindakan");
            $dtsimpan = $this->tindakan->deletetindakan();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

	// master paramedis
	public function masterparamedis() {
		if ($this->session->userdata("login") == TRUE) {
			$data['include'] = "layanan/pelayanan/master/paramedis/dataparamedis";
			$data['menusamping'] = "menumasterdata";
			$data['backhome'] = "tiga";
			$data['js'] = "pelayanan/master/masterparamedis";
			$data['css'] = "pelayanan/master/masterparamedis";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function paginationmedis() {
		$this->load->model("dokter");
		$config = array();
		$config["base_url"] = "#";
		$config["total_rows"] = $this->dokter->count_all();
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
			'country_table' => $this->dokter->fetch_details($config["per_page"], $start)
		);
		echo json_encode($output);
	}

	public function panggiltambahmedis() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("dokter");
			$this->load->model("unit");
			$dtkategori = $this->dokter->datakategori();
			$dtklasifikasi = $this->dokter->datakualifikasi();
			$dtunit = $this->unit->unitumum();
			$data["dtkategori"] = $dtkategori;
			$data["dtunit"] = $dtunit;
			$data["dtklasifikasi"] = $dtklasifikasi;
			$data["formpilih"] = 0;
			$this->load->view('layanan/pelayanan/master/paramedis/formmasterparamedis', $data);
		} else {
			redirect('login');
		}
	}

	public function simpandatamedis() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("dokter");
			$dtsimpan = $this->dokter->simpandataparamedis();
			
			echo $dtsimpan;
		} else {
			redirect('login');
		}
	}

    public function panggileditmedis() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("unit");
            $this->load->model("dokter");
            $dtdok = $this->dokter->ambildataedit();
            $dtkategori = $this->dokter->datakategori();
            $dtunit = $this->unit->unitumum();
			$dtklasifikasi = $this->dokter->datakualifikasi();

            $data["dtunit"] = $dtunit;
            $data["dtkategori"] = $dtkategori;
			$data["dtklasifikasi"] = $dtklasifikasi;
            $data["dtdok"] = $dtdok;
            $data["formpilih"] = 1;
            $data["id"] = $this->input->get("id");
            $this->load->view('layanan/pelayanan/master/paramedis/formmasterparamedis', $data);
        } else {
            redirect('login');
        }
    }

    public function editdatamedis() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("dokter");
            $dtsimpan = $this->dokter->editdataparamedis();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

    public function deleteparamedis() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("dokter");
            $dtsimpan = $this->dokter->deletedokter();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

    // master paramedis
    public function masterdokterluar() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/master/dokterluar/datadokterluar";
            $data['menusamping'] = "menumasterdata";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/master/masterdokterluar";
            $data['css'] = "pelayanan/master/masterdokterluar";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function paginationdokterluar() {
        $this->load->model("dokterluar");
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->dokterluar->count_all();
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
            'country_table' => $this->dokterluar->fetch_details($config["per_page"], $start)
        );
        echo json_encode($output);
    }

    public function panggiltambahdokterluar() {
        if ($this->session->userdata("login") == TRUE) {
            $data["formpilih"] = 0;
            $this->load->view('layanan/pelayanan/master/dokterluar/formmasterdokterluar', $data);
        } else {
            redirect('login');
        }
    }

    public function simpandokterluar() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("dokterluar");
            $dtsimpan = $this->dokterluar->simpandataparamedis();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

    public function panggileditdokterluar() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("dokterluar");
            $dtdok = $this->dokterluar->ambildataedit();

            $data["dtdok"] = $dtdok;
            $data["formpilih"] = 1;
            $data["id"] = $this->input->get("id");
            $this->load->view('layanan/pelayanan/master/dokterluar/formmasterdokterluar', $data);
        } else {
            redirect('login');
        }
    }

    public function editdokterluar() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("dokterluar");
            $dtsimpan = $this->dokterluar->editdataparamedis();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

    public function deletedokterluar() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("dokterluar");
            $dtsimpan = $this->dokterluar->deletedokter();

            echo $dtsimpan;
        } else {
            redirect('login');
        }
    }

}
