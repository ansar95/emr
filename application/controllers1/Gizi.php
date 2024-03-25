
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gizi extends CI_Controller {

	// master Jenis
	public function masterjenis() {
		if ($this->session->userdata("login") == TRUE) {
			$data['include'] = "layanan/pelayanan/gizi/gudang/master/datajenis";
			$data['menusamping'] = "menugizigudang";
			$data['backhome'] = "gizi";
			$data['js'] = "pelayanan/gizi/masterjenis";
			$data['css'] = "pelayanan/gizi/masterjenis";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}


	public function paginationjenis() {
		$this->load->model("gizimdl");
		$config = array();
		$config["base_url"] = "#";
		$config["total_rows"] = $this->gizimdl->count_all_jenis();
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
			'country_table' => $this->gizimdl->fetch_details_jenis($config["per_page"], $start)
		);
		echo json_encode($output);
	}

	public function panggiltambahjenis() {
		if ($this->session->userdata("login") == TRUE) {
			$data["formpilih"] = 0;
			$this->load->view('layanan/pelayanan/gizi/gudang/master/formmasterjenis', $data);
		} else {
			redirect('login');
		}
	}

	public function simpandatajenis() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("gizimdl");
			$dtsimpan = $this->gizimdl->simpandatajenis();
			
			echo $dtsimpan;
		} else {
			redirect('login');
		}
	}

	public function panggileditjenis() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("gizimdl");
			$dtjenis = $this->gizimdl->ambildataedit();

			$data["dtjenis"] = $dtjenis;
			$data["formpilih"] = 1;
            $data["id"] = $this->input->get("id");
			$this->load->view('layanan/pelayanan/gizi/gudang/master/formmasterjenis', $data);
		} else {
			redirect('login');
		}
	}

	public function editdatajenis() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("gizimdl");
			$dtsimpan = $this->gizimdl->editdatajenis();
			
			echo $dtsimpan;
		} else {
			redirect('login');
		}
	}

	// master Bahan
	public function masterbahan() {
		if ($this->session->userdata("login") == TRUE) {
			$data['include'] = "layanan/pelayanan/gizi/gudang/master/databahan";
			$data['menusamping'] = "menugizigudang";
			$data['backhome'] = "gizi";
			$data['js'] = "pelayanan/gizi/masterbahan";
			$data['css'] = "pelayanan/gizi/masterbahan";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function paginationbahan() {
		$this->load->model("gizimdl");
		$config = array();
		$config["base_url"] = "#";
		$config["total_rows"] = $this->gizimdl->count_all_bahan();
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
			'country_table' => $this->gizimdl->fetch_details_bahan($config["per_page"], $start)
		);
		echo json_encode($output);
	}

	public function panggiltambahbahan() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("gizimdl");

			$data["formpilih"] = 0;
			$data["dtsatuan"] = $this->gizimdl->ambilsatuan();
			$data["dtjenis"] = $this->gizimdl->ambiljenis();
			$this->load->view('layanan/pelayanan/gizi/gudang/master/formmasterbahan', $data);
		} else {
			redirect('login');
		}
	}

	public function simpandatabahan() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("gizimdl");
			$dtsimpan = $this->gizimdl->simpandatabahan();
			
			echo $dtsimpan;
		} else {
			redirect('login');
		}
	}

	public function panggileditbahan() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("gizimdl");
			$dtbahan = $this->gizimdl->ambildataeditbahan();

			$data["dtbahan"] = $dtbahan;
			$data["formpilih"] = 1;
			$data["id"] = $this->input->get("id");
			$data["dtsatuan"] = $this->gizimdl->ambilsatuan();
			$data["dtjenis"] = $this->gizimdl->ambiljenis();
			$this->load->view('layanan/pelayanan/gizi/gudang/master/formmasterbahan', $data);
		} else {
			redirect('login');
		}
	}

	public function editdatabahan() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("gizimdl");
			$dtsimpan = $this->gizimdl->editdatabahan();
			
			echo $dtsimpan;
		} else {
			redirect('login');
		}
	}

	// untuk asuhan gizi
	public function asuhangizi() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ruangrawat");
			$ruang = $this->ruangrawat->untukcombo_gizi();
			$data['include'] = "layanan/pelayanan/gizi/asuhan/asuhan";
			$data['menusamping'] = "menugizi";
			$data['backhome'] = "gizi";
			$data['js'] = "pelayanan/gizi/asuhangizi";
			$data['css'] = "pelayanan/gizi/asuhangizi";
			$data['ruang'] = $ruang;
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function caripasiengizi() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("gizimdl");
			$dtpasien = $this->gizimdl->caripasiengizi();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/gizi/asuhan/tddataasuhangizi', $data);
		} else {
			redirect('login');
		}
	}

	public function ambildatasebelumnya() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("gizimdl");
			$dtpasien = $this->gizimdl->ambildatasebelumnya();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/gizi/asuhan/tddataasuhangizi', $data);
		} else {
			redirect('login');
		}
	}

	public function prosesgizi() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("gizimdl");
			$dtdiet = $this->gizimdl->ambildataeditgizi();
			$kdpagi = $dtdiet->kdpagi;
			$kdsiang = $dtdiet->kdsiang;
			$kdmalam = $dtdiet->kdmalam;
			$kdbentuk = $dtdiet->kdbentuk;
			$dtmakanan = $this->gizimdl->ambildatamakanan();
			$dtbentuk = $this->gizimdl->ambildatabentuk();
			$data["dtdiet"] = $dtdiet;
			$data["dtmakanan"] = $dtmakanan;
			$data["dtbentuk"] = $dtbentuk;
			$data["dtkdpagi"] = $kdpagi;
			$data["dtkdsiang"] = $kdsiang;
			$data["dtkdmalam"] = $kdmalam;
			$data["dtkdbentuk"] = $kdbentuk;
			$this->load->view('layanan/pelayanan/gizi/asuhan/formprosesgizi', $data);
		} else {
			redirect('login');
		}
	}	

	public function editdatadiet() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("gizimdl");
			$dtsimpan = $this->gizimdl->editdatadietpasien();
			// echo $dtsimpan;
			$dtpasien = $this->gizimdl->caripasiengizi();
			$data["hasil"] = $dtpasien;
			$dt["dtsimpan"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/gizi/asuhan/tddataasuhangizi', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function deletediet() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("gizimdl");
            $dtsimpan = $this->gizimdl->deletedietpasien();
            // echo $dtsimpan;

			$dtpasien = $this->gizimdl->caripasiengizi();
			$data["hasil"] = $dtpasien;
			$dt["dtsimpan"] = $dtsimpan;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/gizi/asuhan/tddataasuhangizi', $data, TRUE);
			echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

	// ================ LAPORAN GIZI ======================
	public function laporanpermintaan() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ruangrawat");
			$ruang = $this->ruangrawat->untukcombo_gizi();
			$data['include'] = "layanan/pelayanan/gizi/gizi/lappermintaan";
			$data['menusamping'] = "menugizi";
			$data['backhome'] = "gizi";
			$data['js'] = "pelayanan/gizi/asuhangizi";
			$data['css'] = "pelayanan/gizi/asuhangizi";
			$data['ruang'] = $ruang;
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function cetaklaporanpermintaan() {
		$r = date("Ymd");
		$tgl=$this->input->post("tgl");
		$kode_unit=$this->input->post("ruang");
		$waktu=$this->input->post("waktu");
		$data['tgl'] = $tgl;
		$data['kode_unit'] = $kode_unit;
		$data['waktu'] = $waktu;
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'Potrait');
		$this->pdf->filename = "gizi".$r.".pdf";
		$this->pdf->load_view('layanan/pelayanan/gizi/gizi/laporan/lappermkn', $data);
		$this->pdf->render();
		$this->pdf->output();
	}

	public function laporanrekapitulasi() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("ruangrawat");
			$ruang = $this->ruangrawat->untukcombo();
			$data['include'] = "layanan/pelayanan/gizi/gizi/laprekappermintaan";
			$data['menusamping'] = "menugizi";
			$data['backhome'] = "gizi";
			$data['js'] = "pelayanan/gizi/asuhangizi";
			$data['css'] = "pelayanan/gizi/asuhangizi";
			$data['ruang'] = $ruang;
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function cetaklaporanrekap() {
		$r = date("Ymd");
		$tgl=$this->input->post("tgl");
		$tgl2=$this->input->post("tgl2");
		$waktu=$this->input->post("waktu");
		$data['tgl'] = $tgl;
		$data['tgl2'] = $tgl2;
		$data['waktu'] = $waktu;
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'Landscape');
		$this->pdf->filename = "gizi".$r.".pdf";
		$this->pdf->load_view('layanan/pelayanan/gizi/gizi/laporan/laprekapmkn', $data);
		$this->pdf->render();
		$this->pdf->output();
	}
}
