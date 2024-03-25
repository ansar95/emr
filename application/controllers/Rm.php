<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rm extends CI_Controller {

    // form kondisi BRM
    public function kondisirm() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/rekam/berkas/kondisirmlist";
            $data['js'] = "pelayanan/rekam/jskondisi";
            $data['css'] = "pelayanan/rekam/kondisirm";
            $data['menusamping'] = "menurekammedik";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function tampilkanrekammedik() {

        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmmdl");
            $data["hasil"] = $this->rmmdl->ambiltampilkan();

            $this->load->view('layanan/pelayanan/rekam/berkas/kondisitdrmlist', $data);

            // echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function carirekammedik() {

        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmmdl");
            $data["hasil"] = $this->rmmdl->ambiltampilkanrm();

            $this->load->view('layanan/pelayanan/rekam/berkas/kondisitdrmlist', $data);

            // echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function prosesrm() {
		if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmmdl");
            $headdata = $this->rmmdl->ambilheadproses();
            $data["datahead"] = $headdata; 
            // $data["diagnosa"] = $this->rmmdl->datadiagnosa();
            $data["diagnosa"] = $this->rmmdl->ambilicd();
            $data["diagdata"] = $this->rmmdl->datadiagnosaread($headdata->notransaksi);
            $data["brmdata"] = $this->rmmdl->databrmread($headdata->notransaksi);

			$this->load->view('layanan/pelayanan/rekam/berkas/kondirirmproses', $data);
		} else {
			redirect('login');
		}
    }
    
    public function tampilkanpilihandiagnosa() {

        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmmdl");
            $diag = $this->input->get("diagnosa");
            // $data = $this->rmmdl->datadiagnosabaris($diag);
            $data = $this->rmmdl->datadiagnosabaris2($diag);

            $dt["stat"] = true;
            $dt["data"] = $data;

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function prosessimpandiagnosa() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmmdl");
            $notrans = $this->input->get("notrans");
            $datasimpan = $this->rmmdl->simpandiagnosa();
            $dataform["diagnosa"] = $this->rmmdl->datadiagnosa();
            $dataform["form"] = 0;
            $data["diagdata"] = $this->rmmdl->datadiagnosaread($notrans);
            $dt["stat"] = $datasimpan;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/rekam/berkas/kondisitddiagnosa', $data, TRUE);
            $dt["dtform"] = $this->load->view('layanan/pelayanan/rekam/berkas/proseskondisidiagnosa', $dataform, TRUE);
            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function panggilubahdiagnosa() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmmdl");
            $dataform["ambildata"] = $this->rmmdl->datadiagnosaeditread();
            $dataform["diagnosa"] = $this->rmmdl->datadiagnosa();
            $dataform["form"] = 1;
            $dt["stat"] = true;
            $dt["dtform"] = $this->load->view('layanan/pelayanan/rekam/berkas/proseskondisidiagnosa', $dataform, TRUE);
            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function bataldiagnosa() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmmdl");
            $dataform["diagnosa"] = $this->rmmdl->datadiagnosa();
            $dataform["form"] = 0;
            $dt["stat"] = true;
            $dt["dtform"] = $this->load->view('layanan/pelayanan/rekam/berkas/proseskondisidiagnosa', $dataform, TRUE);
            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function prosesubahdiagnosa() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmmdl");
            $notrans = $this->input->get("notrans");
            $dataubah = $this->rmmdl->ubahdiagnosa();
            $dataform["diagnosa"] = $this->rmmdl->datadiagnosa();
            $dataform["form"] = 0;
            $data["diagdata"] = $this->rmmdl->datadiagnosaread($notrans);
            $dt["stat"] = $dataubah;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/rekam/berkas/kondisitddiagnosa', $data, TRUE);
            $dt["dtform"] = $this->load->view('layanan/pelayanan/rekam/berkas/proseskondisidiagnosa', $dataform, TRUE);
            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function proseshapusdiagnosa() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmmdl");
            $notrans = $this->input->get("notrans");
            $datahapus = $this->rmmdl->hapusdiagnosa();
            $data["diagdata"] = $this->rmmdl->datadiagnosaread($notrans);
            $dt["stat"] = $datahapus;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/rekam/berkas/kondisitddiagnosa', $data, TRUE);
            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function panggilubahbrm() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("dokter");
			$dataform["dtdokter"] = $this->dokter->datadokter();
            $this->load->model("jnslayanan");
            $dataform["jnspelayanan"] = $this->jnslayanan->full();
            $this->load->model("rmmdl");
            $dataform["ambildata"] = $this->rmmdl->databrmreadtransaksi();
            $dt["stat"] = true;
            $dt["dtform"] = $this->load->view('layanan/pelayanan/rekam/berkas/proseskondisibrm', $dataform, TRUE);
            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function statustglsetor() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmmdl");
            $hasil = $this->rmmdl->getdifftwodates();
            $dt["stat"] = true;
            $dt["hasil"] = $hasil[0];
            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function prosesubahbrm() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("rmmdl");
            $notrans = $this->input->get("notrans");
            $dataubah = $this->rmmdl->ubahbrm();
            $data["brmdata"] = $this->rmmdl->databrmread($notrans);
            $dt["stat"] = $dataubah;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/rekam/berkas/kondisitdbrm', $data, TRUE);
            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    // form laporan brm inap
    public function formbrminap() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/rekam/berkas/formlapbrminap";
            $data['js'] = "pelayanan/rekam/untuklapbrm";
            $data['css'] = "pelayanan/rekam/kondisirm";
            $data['menusamping'] = "menurekammedik";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function brminap() {
        if($this->input->post("rp") != null) {
            $this->brminapruangrawat();
        } else if($this->input->post("dpjp") != null) {
            $this->brminapdpjp();
        } else if($this->input->post("jp") != null) {
            $this->brminapjenispelayanan();
        } else if($this->input->post("rpp") != null) {
            $this->brminapperpasien();
        }
    }

    public function brminapruangrawat() {
        $r = date("Ymd");
        $date = str_replace(' ', '-', $this->input->post("period"));
        $t = date('Y-m', strtotime($date));
        list($tahun, $bulan) = explode("-", $t, 2);
        $data["tahun"] = $tahun;
        $data["bulan"] = $bulan;
        // $this->load->library('pdf');
        // $this->pdf->setPaper('A4', 'landscape');
        // $this->pdf->filename = "brminapruangrawat".$r.".pdf";
        // $this->pdf->load_view('laporan/laporanrekammedik/brminapruangrawat', $data);
        // $this->pdf->render();
        // $this->pdf->output();
        $this->load->view('laporan/laporanrekammedik/brminapruangrawat', $data);

    }

    public function brminapdpjp() {
        $r = date("Ymd");
        $date = str_replace(' ', '-', $this->input->post("period"));
        $t = date('Y-m', strtotime($date));
        list($tahun, $bulan) = explode("-", $t, 2);
        $data["tahun"] = $tahun;
        $data["bulan"] = $bulan;
        // $this->load->library('pdf');
        // $this->pdf->setPaper('A4', 'landscape');
        // $this->pdf->filename = "brminapdpjp".$r.".pdf";
        // $this->pdf->load_view('laporan/laporanrekammedik/brminapdpjp', $data);
        // $this->pdf->render();
        // $this->pdf->output();
        $this->load->view('laporan/laporanrekammedik/brminapdpjp', $data);

    }

    public function brminapjenispelayanan() {
        $r = date("Ymd");
        $date = str_replace(' ', '-', $this->input->post("period"));
        $t = date('Y-m', strtotime($date));
        list($tahun, $bulan) = explode("-", $t, 2);
        $data["tahun"] = $tahun;
        $data["bulan"] = $bulan;
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "brminapjenispelayanan".$r.".pdf";
        $this->pdf->load_view('laporan/laporanrekammedik/brminapjenispelayanan', $data);
        $this->pdf->render();
        $this->pdf->output();
    }

    public function brminapperpasien() {
        $r = date("Ymd");
        $date = str_replace(' ', '-', $this->input->post("period"));
        $t = date('Y-m', strtotime($date));
        list($tahun, $bulan) = explode("-", $t, 2);
        $data["tahun"] = $tahun;
        $data["bulan"] = $bulan;
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "brminapperpasien".$r.".pdf";
        $this->pdf->load_view('laporan/laporanrekammedik/brminapperpasien', $data);
        $this->pdf->render();
        $this->pdf->output();
    }

    // form laporan brm jalan
    public function formbrmjalan() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/rekam/berkas/formlapbrmjalan";
            $data['js'] = "pelayanan/rekam/untuklapbrm";
            $data['css'] = "pelayanan/rekam/kondisirm";
            $data['menusamping'] = "menurekammedik";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function brmjalan() {
        if($this->input->post("rp") != null) {
            $this->brmjalanruangrawat();
        } else if($this->input->post("dpjp") != null) {
            $this->brmjalandpjp();
        } else if($this->input->post("jp") != null) {
            $this->brmjalanjenispelayanan();
        } else if($this->input->post("rpp") != null) {
            $this->brmjalanperpasien();
        }
    }

    public function brmjalanruangrawat() {
        $r = date("Ymd");
        $date = str_replace(' ', '-', $this->input->post("period"));
        $t = date('Y-m', strtotime($date));
        list($tahun, $bulan) = explode("-", $t, 2);
        $data["tahun"] = $tahun;
        $data["bulan"] = $bulan;
        // $this->load->library('pdf');
        // $this->pdf->setPaper('A4', 'landscape');
        // $this->pdf->filename = "brmjalanruangrawat".$r.".pdf";
        // $this->pdf->load_view('laporan/laporanrekammedik/brmjalanruangrawat', $data);
        // $this->pdf->render();
        // $this->pdf->output();
        $this->load->view('laporan/laporanrekammedik/brmjalanruangrawat', $data);

    }

    public function brmjalandpjp() {
        $r = date("Ymd");
        $date = str_replace(' ', '-', $this->input->post("period"));
        $t = date('Y-m', strtotime($date));
        list($tahun, $bulan) = explode("-", $t, 2);
        $data["tahun"] = $tahun;
        $data["bulan"] = $bulan;
        // $this->load->library('pdf');
        // $this->pdf->setPaper('A4', 'landscape');
        // $this->pdf->filename = "brmjalandpjp".$r.".pdf";
        // $this->pdf->load_view('laporan/laporanrekammedik/brmjalandpjp', $data);
        // $this->pdf->render();
        // $this->pdf->output();
        $this->load->view('laporan/laporanrekammedik/brmjalandpjp', $data);

    }

    public function brmjalanjenispelayanan() {
        $r = date("Ymd");
        $date = str_replace(' ', '-', $this->input->post("period"));
        $t = date('Y-m', strtotime($date));
        list($tahun, $bulan) = explode("-", $t, 2);
        $data["tahun"] = $tahun;
        $data["bulan"] = $bulan;
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "brmjalanjenispelayanan".$r.".pdf";
        $this->pdf->load_view('laporan/laporanrekammedik/brmjalanjenispelayanan', $data);
        $this->pdf->render();
        $this->pdf->output();
    }

    public function brmjalanperpasien() {
        $r = date("Ymd");
        $date = str_replace(' ', '-', $this->input->post("period"));
        $t = date('Y-m', strtotime($date));
        list($tahun, $bulan) = explode("-", $t, 2);
        $data["tahun"] = $tahun;
        $data["bulan"] = $bulan;
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "brmjalanperpasien".$r.".pdf";
        $this->pdf->load_view('laporan/laporanrekammedik/brmjalanperpasien', $data);
        $this->pdf->render();
        $this->pdf->output();
    }

    // form laporan brm ugd
    public function formbrmugd() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/rekam/berkas/formlapbrmugd";
            $data['js'] = "pelayanan/rekam/untuklapbrm";
            $data['css'] = "pelayanan/rekam/kondisirm";
            $data['menusamping'] = "menurekammedik";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function brmugd() {
        if($this->input->post("rp") != null) {
            $this->brmugdcetak();
        }
    }

    public function brmugdcetak() {
        $r = date("Ymd");
        $date = str_replace(' ', '-', $this->input->post("period"));
        $t = date('Y-m', strtotime($date));
        list($tahun, $bulan) = explode("-", $t, 2);
        $data["tahun"] = $tahun;
        $data["bulan"] = $bulan;
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "brmugdcetak".$r.".pdf";
        $this->pdf->load_view('laporan/laporanrekammedik/brmugdcetak', $data);
        $this->pdf->render();
        $this->pdf->output();
    }

    // form laporan berkas proses
    public function laporanberkasproses() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("golongan");
			$data["golongan"] = $this->golongan->full();
            $data['include'] = "layanan/pelayanan/rekam/berkas/formlaporanprosesberkas";
            $data['js'] = "pelayanan/rekam/untuklapproses";
            $data['css'] = "pelayanan/rekam/kondisirm";
            $data['menusamping'] = "menurekammedik";
            $data['backhome'] = "tiga";

            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function cetakbrmproses() {
        $r = date("Ymd");
        $mulai = str_replace(' ', '-', $this->input->post("tglmulai"));
        $tglmulai = date('d-m-Y', strtotime($mulai));
        $sampai = str_replace(' ', '-', $this->input->post("tglsampai"));
        $tglsampai = date('d-m-Y', strtotime($sampai));
        $data["tglmulai"] = $tglmulai;
        $data["tglsampai"] = $tglsampai;
        // $this->load->library('pdf');
        // $this->pdf->setPaper('A4', 'Potrait');
        // $this->pdf->filename = "brmdiproses".$r.".pdf";
        // $this->pdf->load_view('laporan/laporanrekammedik/brmdiprosescetak', $data);
        // $this->pdf->render();
        // $this->pdf->output();
        $this->load->view('laporan/laporanrekammedik/brmdiprosescetak', $data);
    }

    public function datadiagnosaread($id) {
		$this->db->select("`id`, `no_rm`, `tgl_masuk`, `type`, `diagnosa`, `nodaftar`, `nodtd`, `notransaksi`, `icdlatin`");
		$this->db->from("pdiagnosa");
		$this->db->where('notransaksi', $id);
		$this->db->order_by('type', "desc");
		$data = $this->db->get();
		return $data->result();
	}
    
}
