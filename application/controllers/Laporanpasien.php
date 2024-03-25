<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanpasien extends CI_Controller {

    // pasien keluar
    public function laporanpasienkeluar() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('unit');
            $this->load->model('golongan');
            $this->load->model('kondisi');
            $this->load->model('icddata');
        
            $data['unit'] = $this->unit->full();
            $data['golongan'] = $this->golongan->full();
            $data['kondisi'] = $this->kondisi->ambilkondisi();
            $data['diagnosa'] = $this->icddata->ambilicd();
            $data['include'] = "laporan/laporanpasienkeluar";
            $data['js'] = "laporan/laporanpasienkeluar/laporanpasienkeluar";
            $data['css'] = "laporan/datepickerselectdua";
            $data['menusamping'] = "menurekammedik";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function panggilcetakpasienkeluar() {
        if ($this->session->userdata("login") == TRUE) {
            if($this->input->post("cet") != null) {
                $this->pasienkeluar();
            } else if($this->input->post("cete") != null) {
                $this->pasienkeluarexcel();
            } 
        } else {
            redirect('login');
        }
    }

    public function panggilcetakpasienkeluar_old_lengkap() {
        if ($this->session->userdata("login") == TRUE) {
            if($this->input->post("cpasien") != null) {
                $this->pasienkeluar();
            } else if($this->input->post("cpasienexcel") != null) {
                $this->pasienkeluarexcel();
            } else if($this->input->post("cruang") != null) {
                $this->ruangpasienkeluar();
            } else if($this->input->post("cruangexcel") != null) {
                $this->ruangpasienkeluarexcel();
            }
        } else {
            redirect('login');
        }
    }


    public function pasienkeluar() {
        if ($this->session->userdata("login") == TRUE) {

            $data["tglmulai"] = $this->input->post("tglmulai");
            $data["tglakhir"] = $this->input->post("tglakhir");
            $data["jenis"] = $this->input->post("jenis");
            $data["bagian"] = $this->input->post("bagian");
            $data["unit"] = $this->input->post("unit");
            $data["unitpilih"] = $this->input->post("unitpilih");
            $data["golongan"] = $this->input->post("golongan");
            $data["golpilih"] = $this->input->post("golpilih");
            $data["user"] = $this->input->post("user");
            $data["userpilih"] = $this->input->post("userpilih");
            $data["kunjungan"] = $this->input->post("kunjungan");
            $data["diag"] = $this->input->post("diag");
            $data["diagpilih"] = $this->input->post("diagpilih");
            $data["urut"] = $this->input->post("urut");
            if ($this->input->post("urut")=='tanggal') {
                $this->load->view('laporan/laporanpasienkeluar/laporanpasienkeluar', $data);
            } else {    
                $this->load->view('laporan/laporanpasienkeluar/laporanpasienkeluar_diag', $data);
            }
        } else {
            redirect('login');
        }
    }

    public function pasienkeluar_old() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('lappasienkeluar');
            $lunit = $this->lappasienkeluar->ambildaftar();
            // echo json_encode($lunit);
            $data['l'] = $lunit;
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "laporanpasienkeluar.pdf";
            // $this->pdf->load_view('laporan/laporanpasienkeluar/laporanpasienkeluar', $data);
            $this->load->view('laporan/laporanpasienkeluar/laporanpasienkeluar', $data);
            // $this->pdf->render();
            // $this->pdf->output();
        } else {
            redirect('login');
        }
    }


    public function pasienkeluarexcel() {
        if ($this->session->userdata("login") == TRUE) {
            $data["tglmulai"] = $this->input->post("tglmulai");
            $data["tglakhir"] = $this->input->post("tglakhir");
            $data["jenis"] = $this->input->post("jenis");
            $data["bagian"] = $this->input->post("bagian");
            $data["unit"] = $this->input->post("unit");
            $data["unitpilih"] = $this->input->post("unitpilih");
            $data["golongan"] = $this->input->post("golongan");
            $data["golpilih"] = $this->input->post("golpilih");
            $data["user"] = $this->input->post("user");
            $data["userpilih"] = $this->input->post("userpilih");
            $data["kunjungan"] = $this->input->post("kunjungan");
            $data["diag"] = $this->input->post("diag");
            $data["diagpilih"] = $this->input->post("diagpilih");
            $data["urut"] = $this->input->post("urut");
            if ($this->input->post("urut")=='tanggal') {
                $this->load->view('laporan/laporanpasienkeluar/excel/laporanpasienkeluar', $data);
            } else {    
                $this->load->view('laporan/laporanpasienkeluar/excel/laporanpasienkeluar_diag', $data);
            }
        } else {
            redirect('login');
        }
    }


    // public function laporanharianecel() {
    //     $this->load->model('lapregrawatjalan');
    //     $lunit = $this->lapregrawatjalan->ambilunit();
    //     $g = [];
    //     foreach($lunit as $row) {
    //         $y = $row->unit;
    //         $g[] = array (
    //             "unit" => $y,
    //             "data" => $this->lapregrawatjalan->ambilgol($y)
    //         ); 
    //     }
    //     $data['l'] = $g;
    //     $this->load->view('laporan/laporanregrawatjalan/excel/laporanharian', $data);
    // }


    public function ruangpasienkeluar() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('lappasienkeluar');
            $lunit = $this->lappasienkeluar->ambilunit();
            $g = [];
            foreach($lunit as $row) {
                $y = $row->unit;
                $yk = $row->kode_unit;
                $g[] = array (
                    "unit" => $y,
                    "data" => $this->lappasienkeluar->ambilruangan($yk)
                );
            }
            // echo json_encode($g);
            $data['l'] = $g;
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            // $this->pdf->filename = "laporanpasienkeluarperpasien.pdf";
            // $this->pdf->load_view('laporan/laporanpasienkeluar/laporanpasienkeluarperpasien', $data);
            $this->load->view('laporan/laporanpasienkeluar/laporanpasienkeluarperpasien', $data);
            // $this->pdf->render();
            // $this->pdf->output();
        } else {
            redirect('login');
        }
    }

    public function ruangpasienkeluarexcel() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('lappasienkeluar');
            $lunit = $this->lappasienkeluar->ambilunit();
            $g = [];
            foreach($lunit as $row) {
                $y = $row->unit;
                $yk = $row->kode_unit;
                $g[] = array (
                    "unit" => $y,
                    "data" => $this->lappasienkeluar->ambilruangan($yk)
                );
            }
            // echo json_encode($g);
            $data['l'] = $g;
            $this->pdf->view('laporan/laporanpasienkeluar/laporanpasienkeluarperpasien', $data);
        } else {
            redirect('login');
        }
    }

    // pasien di rawat
    public function laporanpasiendirawat() {
        $this->load->model('unit');
        $this->load->model('golongan');
        $data['unit'] = $this->unit->full();
        $data['golongan'] = $this->golongan->full();
        $data['include'] = "laporan/laporanpasienrawat";
        $data['js'] = "laporan/laporanpasienrawat/laporanpasien";
        $data['css'] = "laporan/datepickerselectdua";
        $data['menusamping'] = "menurekammedik";
        $data['backhome'] = "tiga";
        $this->load->view('templatesidebar/content', $data);
    }

    public function panggilcetakdirawat() {
        if($this->input->post("cpasien") != null) {
            $this->pasiendirawat();
        } else if($this->input->post("cpasienexcel") != null) {
            $this->pasiendirawatexcel();
        }
    }

    public function pasiendirawat() {
        $this->load->model('lappasienrawat');
        $lunit = $this->lappasienrawat->ambilunit();
        $g = [];
        foreach($lunit as $row) {
            $y = $row->unit;
            $yk = $row->kode_unit;
            $g[] = array (
                "unit" => $y,
                "data" => $this->lappasienrawat->ambilruangan($yk)
            );
        }
        // echo json_encode($g);
        $data['l'] = $g;
        // $this->load->library('pdf');
        // $this->pdf->setPaper('A4', 'potrait');
        // $this->pdf->filename = "laporan-petanikode.pdf";
        // $this->pdf->load_view('laporan/laporanpasienrawat/laporanpasien', $data);
        $this->load->view('laporan/laporanpasienrawat/laporanpasien', $data);
        // $this->pdf->render();
        // $this->pdf->output();
    }

    public function pasiendirawatexcel() {
        $this->load->model('lappasienrawat');
        $lunit = $this->lappasienrawat->ambilunit();
        $g = [];
        foreach($lunit as $row) {
            $y = $row->unit;
            $yk = $row->kode_unit;
            $g[] = array (
                "unit" => $y,
                "data" => $this->lappasienrawat->ambilruangan($yk)
            );
        }
        // echo json_encode($g);
        $data['l'] = $g;
        $this->pdf->view('laporan/laporanpasienrawat/laporanpasien', $data);
    }

    // untuk laporan rawat inap
    public function laporanregisterinap() { 
        $this->load->model('unit');
        $this->load->model('golongan');
        $data['unit'] = $this->unit->fulluri();
        $data['golongan'] = $this->golongan->full();
        $data['menusamping'] = "menurekammedik";
        $data['backhome'] = "tiga";
        $data['include'] = "laporan/laporanregrawatinap";
        $data['js'] = "laporan/laporanregrawatinap/laporanharian";
        $data['css'] = "laporan/datepickerselectdua";
        $this->load->view('templatesidebar/content', $data);
    }

        // untuk laporan rawat inap
        public function laporanregisterugd() { 
            $this->load->model('unit');
            $this->load->model('golongan');
            $this->load->model('user');
            $data['user'] = $this->user->full();
            $data['unit'] = $this->unit->fulligd();
            $data['golongan'] = $this->golongan->full();
            $data['menusamping'] = "menurekammedik";
            $data['backhome'] = "tiga";
            $data['include'] = "laporan/laporanregrawatugd";
            $data['js'] = "laporan/laporanregrawatugd/laporanharian";
            $data['css'] = "laporan/datepickerselectdua";
            $this->load->view('templatesidebar/content', $data);
        }

    // untuk Laporan rawat jalan
    public function laporanregisterjalan() {
        $this->load->model('unit');
        $this->load->model('golongan');
        $this->load->model('user');
        $this->load->model('icddata');
        
        $data['user'] = $this->user->full();
        $data['unit'] = $this->unit->fullurj();
        $data['golongan'] = $this->golongan->full();
        $data['diagnosa'] = $this->icddata->ambilicd();
        $data['menusamping'] = "menurekammedik";
        $data['backhome'] = "tiga";
        $data['include'] = "laporan/laporanregrawatjalan";
        $data['js'] = "laporan/laporanregrawatjalan/laporanharian";
        $data['addjs'] = "laporan/regrawatjalan";
        $data['css'] = "laporan/datepickerselectdua";
        $this->load->view('templatesidebar/content', $data);
    }

    // form laporan indikator
    public function formindikatorrs() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/rekam/laporan/formlapindikatorrs";
            $data['js'] = "pelayanan/rekam/untuklapbrm";
            $data['css'] = "pelayanan/rekam/kondisirm";
            $data['menusamping'] = "menurekammedik";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function indkatorcetak() {
        if($this->input->post("rp") != null) {
            $this->indikatorsemuaunit();
        } else if($this->input->post("dpjp") != null) {
            $this->indikatorperunit();
        }
    }

    public function indikatorsemuaunit() {
        $r = date("Ymd");
        $date = str_replace(' ', '-', $this->input->post("period"));
        $t = date('Y-m', strtotime($date));
        
        list($tahun, $bulan) = explode("-", $t, 2);
        
        $data["tahun"] = $tahun;
        $data["bulan"] = $bulan;
        
        // $this->load->library('pdf');
        // $this->pdf->setPaper('A4', 'potrait');
        // $this->pdf->filename = "indikatorsemuaunit".$r.".pdf";
        // $this->pdf->load_view('laporan/laporanrekammedik/indikatorsemuaunit', $data);
        $this->load->view('laporan/laporanrekammedik/indikatorsemuaunit', $data);
        // $this->pdf->render();
        // $this->pdf->output();
    }

    public function indikatorperunit() {
        $r = date("Ymd");
        $date = str_replace(' ', '-', $this->input->post("period"));
        $t = date('Y-m', strtotime($date));
        list($tahun, $bulan) = explode("-", $t, 2);
        $data["tahun"] = $tahun;
        $data["bulan"] = $bulan;
        // $this->load->library('pdf');
        // $this->pdf->setPaper('A4', 'potrait');
        // $this->pdf->filename = "indikatorperunit".$r.".pdf";
        // $this->pdf->load_view('laporan/laporanrekammedik/indikatorperunit', $data);
        // $this->pdf->render();
        // $this->pdf->output();
        $this->load->view('laporan/laporanrekammedik/indikatorperunit', $data);


    }

    // untuk RL
    public function formrlpengunjung() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/rekam/laporan/formrlpengunjung";
            $data['js'] = "pelayanan/rekam/untuklapbrm";
            $data['css'] = "pelayanan/rekam/kondisirm";
            $data['menusamping'] = "menurekammedik";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function cetakrlpengunjung_ok() {
        if ($this->session->userdata("login") == TRUE) {
            $date = str_replace(' ', '-', $this->input->post("period"));
            $t = date('Y-m', strtotime($date));
            list($tahun, $bulan) = explode("-", $t, 2);
            $data["tahun"] = $tahun;
            $data["bulan"] = $bulan;
            $data["nmfile"] = $this->input->post("nm");
            $this->load->view('laporan/laporanrekammedik/rlpengunjung', $data);
        } else {
            redirect('login');
        }
    }
  
    public function cetakrlpengunjung() {
        if ($this->session->userdata("login") == TRUE) {
            $date = str_replace(' ', '-', $this->input->post("period"));
            $t = date('Y-m', strtotime($date));
            list($tahun, $bulan) = explode("-", $t, 2);
            $data["tahun"] = $tahun;
            $data["bulan"] = $bulan;
            $data["nmfile"] = $this->input->post("nm");
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "laporanpasienkeluar.pdf";
            $this->pdf->load_view('laporan/laporanrekammedik/rlpengunjung', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }


    public function formrlrawatjalan() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/rekam/laporan/formrlkunjunganjalan";
            $data['js'] = "pelayanan/rekam/untuklapbrm";
            $data['css'] = "pelayanan/rekam/kondisirm";
            $data['menusamping'] = "menurekammedik";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function cetakrlrawatjalan_old() {
        if ($this->session->userdata("login") == TRUE) {
            $date = str_replace(' ', '-', $this->input->post("period"));
            $t = date('Y-m', strtotime($date));
            list($tahun, $bulan) = explode("-", $t, 2);
            $data["tahun"] = $tahun;
            $data["bulan"] = $bulan;
            $data["nmfile"] = $this->input->post("nm");
            $this->load->view('laporan/laporanrekammedik/rlkunjunganjalan', $data);
        } else {
            redirect('login');
        }
    }

    public function cetakrlrawatjalan() {
        if ($this->session->userdata("login") == TRUE) {
            $date = str_replace(' ', '-', $this->input->post("period"));
            $t = date('Y-m', strtotime($date));
            list($tahun, $bulan) = explode("-", $t, 2);
            $data["tahun"] = $tahun;
            $data["bulan"] = $bulan;
            $data["nmfile"] = $this->input->post("nm");
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "laporanpasienkeluar.pdf";
            $this->pdf->load_view('laporan/laporanrekammedik/rlkunjunganjalan', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }


    public function formrlpenyakitbesar() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/rekam/laporan/formrlpenyakitinap";
            $data['js'] = "pelayanan/rekam/untuklapbrm";
            $data['css'] = "pelayanan/rekam/kondisirm";
            $data['menusamping'] = "menurekammedik";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function cetakrlpenyakitbesar() {
        if ($this->session->userdata("login") == TRUE) {
            $date = str_replace(' ', '-', $this->input->post("period"));
            $t = date('Y-m', strtotime($date));
            list($tahun, $bulan) = explode("-", $t, 2);
            $data["tahun"] = $tahun;
            $data["bulan"] = $bulan;
            $data["nmfile"] = $this->input->post("nm");
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $data["nmfile"] = $this->input->post("nm");
            $this->pdf->load_view('laporan/laporanrekammedik/rlpenyakitinap', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }


    public function cetakrlpenyakitbesar_old() {
        if ($this->session->userdata("login") == TRUE) {
            $date = str_replace(' ', '-', $this->input->post("period"));
            $t = date('Y-m', strtotime($date));
            list($tahun, $bulan) = explode("-", $t, 2);
            $data["tahun"] = $tahun;
            $data["bulan"] = $bulan;
            $data["nmfile"] = $this->input->post("nm");
            $this->load->view('laporan/laporanrekammedik/rlpenyakitinap', $data);
        } else {
            redirect('login');
        }
    }

    public function formrlpenyakitjalan() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/rekam/laporan/formrlpenyakitjalan";
            $data['js'] = "pelayanan/rekam/untuklapbrm";
            $data['css'] = "pelayanan/rekam/kondisirm";
            $data['menusamping'] = "menurekammedik";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function cetakrlpenyakitjalan_old() {
        if ($this->session->userdata("login") == TRUE) {
            $date = str_replace(' ', '-', $this->input->post("period"));
            $t = date('Y-m', strtotime($date));
            list($tahun, $bulan) = explode("-", $t, 2);
            $data["tahun"] = $tahun;
            $data["bulan"] = $bulan;
            $data["nmfile"] = $this->input->post("nm");
            $this->load->view('laporan/laporanrekammedik/rlpenyakitjalan', $data);
        } else {
            redirect('login');
        }
    }

    public function cetakrlpenyakitjalan() {
        if ($this->session->userdata("login") == TRUE) {
            $date = str_replace(' ', '-', $this->input->post("period"));
            $t = date('Y-m', strtotime($date));
            list($tahun, $bulan) = explode("-", $t, 2);
            $data["tahun"] = $tahun;
            $data["bulan"] = $bulan;
            $data["nmfile"] = $this->input->post("nm");
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $data["nmfile"] = $this->input->post("nm");
            $this->pdf->load_view('laporan/laporanrekammedik/rlpenyakitjalan', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }

    //===============untuk rl 4A



    public function formrl4a() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/rekam/laporan/formrl4a";
            $data['js'] = "pelayanan/rekam/untuklapbrm4";
            $data['css'] = "pelayanan/rekam/kondisirm";
            $data['menusamping'] = "menurekammedik";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function panggilcetakrl4() {
		// echo $this->input->post("tglmulai");
		if($this->input->post("rl4a") != null) {
			$this->cetakrl4a();
		} else if($this->input->post("rl4akec") != null) {
			$this->cetakrl4akecelakaan();
		} else if($this->input->post("rl4b") != null) {
			$this->cetakrl4b();
		} else if($this->input->post("rl4bkec") != null) {
			$this->cetakrl4bkecelakaan();
		}
	}

    public function cetakrl4a() {
        if ($this->session->userdata("login") == TRUE) {
            $data["tahun"] = $this->input->post("period");
            $data["nmfile"] = $this->input->post("nm");
            $this->load->view('laporan/laporanrekammedik/rl4a', $data);
        } else {
            redirect('login');
        }
    }

    public function cetakrl4akecelakaan() {
        if ($this->session->userdata("login") == TRUE) {
            $data["tahun"] = $this->input->post("period");
            $data["nmfile"] = $this->input->post("nm");
            $this->load->view('laporan/laporanrekammedik/rl4akecelakaan', $data);
        } else {
            redirect('login');
        }
    }

    public function cetakrl4b() {
        if ($this->session->userdata("login") == TRUE) {
            $data["tahun"] = $this->input->post("period");
            $data["nmfile"] = $this->input->post("nm");
            $this->load->view('laporan/laporanrekammedik/rl4b', $data);
        } else {
            redirect('login');
        }
    }

    public function cetakrl4bkecelakaan() {
        if ($this->session->userdata("login") == TRUE) {
            $data["tahun"] = $this->input->post("period");
            $data["nmfile"] = $this->input->post("nm");
            $this->load->view('laporan/laporanrekammedik/rl4bkecelakaan', $data);
        } else {
            redirect('login');
        }
    }

    //===============untuk rl 3

    public function formrl3() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/rekam/laporan/formrl3";
            $data['js'] = "pelayanan/rekam/untuklapbrm4";
            $data['css'] = "pelayanan/rekam/kondisirm";
            $data['menusamping'] = "menurekammedik";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }
    public function panggilcetakrl3() {
		// echo $this->input->post("tglmulai");
		if($this->input->post("rl31") != null) {
			$this->cetakrl31();
		} else if($this->input->post("rl32") != null) {
			$this->cetakrl32();
		} else if($this->input->post("rl33") != null) {
			$this->cetakrl33();
		} else if($this->input->post("rl34") != null) {
			$this->cetakrl34();
		} else if($this->input->post("rl35") != null) {
			$this->cetakrl35();
		} else if($this->input->post("rl36") != null) {
			$this->cetakrl36();
		} else if($this->input->post("rl37") != null) {
			$this->cetakrl37();
		} else if($this->input->post("rl38") != null) {
			$this->cetakrl38();
		} else if($this->input->post("rl39") != null) {
			$this->cetakrl39();
		} else if($this->input->post("rl310") != null) {
			$this->cetakrl310();
		} else if($this->input->post("rl311") != null) {
			$this->cetakrl311();
		} else if($this->input->post("rl312") != null) {
			$this->cetakrl312();
		} else if($this->input->post("rl313") != null) {
			$this->cetakrl313();
		} else if($this->input->post("rl314") != null) {
			$this->cetakrl314();
		} else if($this->input->post("rl315") != null) {
			$this->cetakrl315();
		} 
	}

    public function cetakrl31() {
        if ($this->session->userdata("login") == TRUE) {
            $data["tahun"] = $this->input->post("period");
            $data["nmfile"] = $this->input->post("nm");
            $this->load->view('laporan/laporanrekammedik/rl31', $data);
        } else {
            redirect('login');
        }
    }

 //===============untuk rl 1



    public function formrl1() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/rekam/laporan/formrl1";
            $data['js'] = "pelayanan/rekam/untuklapbrm4";
            $data['css'] = "pelayanan/rekam/kondisirm";
            $data['menusamping'] = "menurekammedik";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function panggilcetakrl1() {
        if($this->input->post("rl11") != null) {
            $this->cetakrl11();
        } else if($this->input->post("rl12") != null) {
            $this->cetakrl12();
        } else if($this->input->post("rl13") != null) {
            $this->cetakrl13();
        }
    }


    public function cetakrl11_old() {
        if ($this->session->userdata("login") == TRUE) {
            $data["tahun"] = $this->input->post("period");
            $data["nmfile"] = $this->input->post("nm");
            $this->load->view('laporan/laporanrekammedik/rl11', $data);
        } else {
            redirect('login');
        }
    }

    public function cetakrl11() {
        if ($this->session->userdata("login") == TRUE) {
            $data["tahun"] = $this->input->post("period");
            $data["nmfile"] = $this->input->post("nm");
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "laporanpasienkeluar.pdf";
            $this->pdf->load_view('laporan/laporanrekammedik/rl11', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }

    public function cetakrl12() {
        if ($this->session->userdata("login") == TRUE) {
            $data["tahun"] = $this->input->post("period");
            $data["nmfile"] = $this->input->post("nm");
            $this->load->view('laporan/laporanrekammedik/rl12', $data);
        } else {
            redirect('login');
        }
    }

    public function cetakrl13() {
        if ($this->session->userdata("login") == TRUE) {
            $data["tahun"] = $this->input->post("period");
            $data["nmfile"] = $this->input->post("nm");
            $this->load->view('laporan/laporanrekammedik/rl13', $data);
        } else {
            redirect('login');
        }
    }


    public function datars() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/rekam/laporan/datars";
            $data['js'] = "pelayanan/rekam/untuklapbrm4";
            $data['css'] = "pelayanan/rekam/kondisirm";
            $data['menusamping'] = "menurekammedik";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    //Laporan di registrasi
    public function laporanregis_all() {
        $this->load->model('unit');
        $this->load->model('golongan');
        $this->load->model('user');
        $this->load->model('icddata');
        
        $data['user'] = $this->user->full();
        // $data['unit'] = $this->unit->fullurj();
        $data['unit'] = $this->unit->full_all();
        $data['golongan'] = $this->golongan->full();
        $data['diagnosa'] = $this->icddata->ambilicd();
        $data['menusamping'] = "menuregistrasi";
        $data['backhome'] = "tiga";
        $data['include'] = "laporan/laporanreg_all";
        $data['js'] = "laporan/laporanregrawatjalan/laporanharian";
        $data['addjs'] = "laporan/regrawatjalan";
        $data['css'] = "laporan/datepickerselectdua";
        $this->load->view('templatesidebar/content', $data);
    }

    public function laporanregis_all_rekammedik() {
        $this->load->model('unit');
        $this->load->model('golongan');
        $this->load->model('user');
        $this->load->model('icddata');
        
        $data['user'] = $this->user->full();
        // $data['unit'] = $this->unit->fullurj();
        $data['unit'] = $this->unit->full_all();
        $data['golongan'] = $this->golongan->full();
        $data['diagnosa'] = $this->icddata->ambilicd();
        $data['menusamping'] = "menurekammedik";
        $data['backhome'] = "tiga";
        $data['include'] = "laporan/laporanreg_all";
        $data['js'] = "laporan/laporanregrawatjalan/laporanharian";
        $data['addjs'] = "laporan/regrawatjalan";
        $data['css'] = "laporan/datepickerselectdua";
        $this->load->view('templatesidebar/content', $data);
    }

     //Register Rajal 
    public function laporanregisRajal() {
        $this->load->model('unit');
        $this->load->model('golongan');
        $this->load->model('user');
        $data['user'] = $this->user->full();
        $data['unit'] = $this->unit->fullurj();
        $data['golongan'] = $this->golongan->full();
        $data['menusamping'] = "menuregistrasi";
        $data['backhome'] = "tiga";
        $data['include'] = "laporan/laporanregrawatjalan";
        $data['js'] = "laporan/laporanregrawatjalan/laporanharian";
        $data['addjs'] = "laporan/regrawatjalan";
        $data['css'] = "laporan/datepickerselectdua";
        $this->load->view('templatesidebar/content', $data);
    }


    //Registrasi Ranap
    public function laporanregisRanap() { 
        $this->load->model('unit');
        $this->load->model('golongan');
        $data['unit'] = $this->unit->fulluri();
        $data['golongan'] = $this->golongan->full();
        $data['menusamping'] = "menuregistrasi";
        $data['backhome'] = "tiga";
        $data['include'] = "laporan/laporanregrawatinap";
        $data['js'] = "laporan/laporanregrawatinap/laporanharian";
        $data['css'] = "laporan/datepickerselectdua";
        $this->load->view('templatesidebar/content', $data);
    }

    //Registrasi UGD
    public function laporanregiUGD() { 
        $this->load->model('unit');
        $this->load->model('golongan');
        $this->load->model('user');
        $data['user'] = $this->user->full();
        $data['unit'] = $this->unit->fulligd();
        $data['golongan'] = $this->golongan->full();
        $data['menusamping'] = "menuregistrasi";
        $data['backhome'] = "tiga";
        $data['include'] = "laporan/laporanregrawatugd";
        $data['js'] = "laporan/laporanregrawatugd/laporanharian";
        $data['css'] = "laporan/datepickerselectdua";
        $this->load->view('templatesidebar/content', $data);
    }

    //PasienKeluar
    public function laporanpasienkeluar_regis() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('unit');
            $this->load->model('golongan');
            $this->load->model('kondisi');
            $data['unit'] = $this->unit->full();
            $data['golongan'] = $this->golongan->full();
            $data['kondisi'] = $this->kondisi->ambilkondisi();
            $data['include'] = "laporan/laporanpasienkeluar";
            $data['js'] = "laporan/laporanpasienkeluar/laporanpasienkeluar";
            $data['css'] = "laporan/datepickerselectdua";
            $data['menusamping'] = "menuregistrasi";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    //Pasien dirawat
    public function laporanpasiendirawat_regis() {
        $this->load->model('unit');
        $this->load->model('golongan');
        $data['unit'] = $this->unit->full();
        $data['golongan'] = $this->golongan->full();
        $data['include'] = "laporan/laporanpasienrawat";
        $data['js'] = "laporan/laporanpasienrawat/laporanpasien";
        $data['css'] = "laporan/datepickerselectdua";
        $data['menusamping'] = "menuregistrasi";
        $data['backhome'] = "tiga";
        $this->load->view('templatesidebar/content', $data);
    }

    //indikator Pasien
    public function formindikator_regis() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/rekam/laporan/formlapindikatorrs";
            $data['js'] = "pelayanan/rekam/untuklapbrm";
            $data['css'] = "pelayanan/rekam/kondisirm";
            $data['menusamping'] = "menuregistrasi";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }


    //tambahan gabungan
    public function panggilcetak_all() {
		if($this->input->post("cet") != null) {
			$this->laporanharian();
		} else if($this->input->post("cete") != null) {
			$this->laporanharianecel();
		}
	}

	public function laporanharian() {
        $data["tglmulai"] = $this->input->post("tglmulai");
        $data["tglakhir"] = $this->input->post("tglakhir");
        $data["jenis"] = $this->input->post("jenis");
        $data["bagian"] = $this->input->post("bagian");
        $data["unit"] = $this->input->post("unit");
        $data["unitpilih"] = $this->input->post("unitpilih");
        $data["golongan"] = $this->input->post("golongan");
        $data["golpilih"] = $this->input->post("golpilih");
        $data["user"] = $this->input->post("user");
        $data["userpilih"] = $this->input->post("userpilih");
        $data["kunjungan"] = $this->input->post("kunjungan");
        $data["diag"] = $this->input->post("diag");
        $data["diagpilih"] = $this->input->post("diagpilih");
        $data["urut"] = $this->input->post("urut");
		$this->load->view('laporan/laporanregrawatjalan/laporanharian', $data);
	}

	public function laporanharianecel() {
		$data["tglmulai"] = $this->input->post("tglmulai");
        $data["tglakhir"] = $this->input->post("tglakhir");
        $data["jenis"] = $this->input->post("jenis");
        $data["bagian"] = $this->input->post("bagian");
        $data["unit"] = $this->input->post("unit");
        $data["unitpilih"] = $this->input->post("unitpilih");
        $data["golongan"] = $this->input->post("golongan");
        $data["golpilih"] = $this->input->post("golpilih");
        $data["user"] = $this->input->post("user");
        $data["userpilih"] = $this->input->post("userpilih");
        $data["kunjungan"] = $this->input->post("kunjungan");
        $data["diag"] = $this->input->post("diag");
        $data["diagpilih"] = $this->input->post("diagpilih");
        $data["urut"] = $this->input->post("urut");
		// $this->load->view('laporan/laporanregrawatjalan/laporanharian', $data);
		$this->load->view('laporan/laporanregrawatjalan/excel/laporanharian', $data);
	}

    public function indikatorsemuaunit_tahunan() {
        $data["tahun"] = '2022';
        $data["bulan"] = '12';
        $this->load->view('laporan/laporanrekammedik/indikatorsemuaunit_tahunan', $data);
    }
}
