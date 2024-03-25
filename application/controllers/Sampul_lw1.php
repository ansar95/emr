<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sampul extends CI_Controller {

    //jalan

	public function karcisunitjalan($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('A4', 'potrait');
			$this->pdf->filename = "karcisjalan".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/sampul/karcisjalan', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function tracerunitjalan($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			// $this->pdf->setPaper('A4', 'potrait');
			$this->pdf->setPaper('tracer', 'potrait');
			$this->pdf->filename = "tracerjalan".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/sampul/tracerjalan', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function antrianpoli($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			// $this->pdf->setPaper('A4', 'potrait');
			$this->pdf->setPaper('tracer', 'potrait');
			$this->pdf->filename = "antrianpoli".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/sampul/cetakantrianpoli', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

    public function opdunitjalan($id) {
        if ($this->session->userdata("login") == TRUE) {
            $r = date("Ymd");
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "opdjalan".$r.".pdf";
            $data["id"] = $id;
            $this->pdf->load_view('laporan/sampul/opdjalan', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }

    public function sjpunitjalan($id) {
        if ($this->session->userdata("login") == TRUE) {
            $r = date("Ymd");
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "sjpjalan".$r.".pdf";
            $data["id"] = $id;
            $this->pdf->load_view('laporan/sampul/sjpjalan', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }

	public function gelangunitjalan($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('gelang', 'potrait');
			$this->pdf->filename = "gelangjalan".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/sampul/gelangjalan', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function gelangbayi($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('gelang', 'potrait');
			$this->pdf->filename = "gelangjalan".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/sampul/gelangbayi', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function printbuktirinap($id) {
		if ($this->session->userdata("login") == TRUE) {
			$logoPath = base_url('/assets/img/logo-banggai.png');
			$typeFile = pathinfo($logoPath, PATHINFO_EXTENSION);
			$logoFile = file_get_contents($logoPath);
			$data['logo'] = 'data:image/' . $typeFile . ';base64,' . base64_encode($logoFile);
			
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('A4', 'potrait');
			$this->pdf->filename = "buktiranap".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/sampul/printbuktirinap', $data);
			// $this->load->view('laporan/sampul/printbuktirinap', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	//inap
	public function karcisunitinap($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('A4', 'potrait');
			$this->pdf->filename = "karcisinap".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/sampul/karcisinap', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function tracerunitinap($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('tracer', 'potrait');
			$this->pdf->filename = "tracerinap".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/sampul/tracerinap', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function mrduaunitinap($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('A4', 'potrait');
			$this->pdf->filename = "mrduainap".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/sampul/mrduainap', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function cetakr11($id) {
		if ($this->session->userdata("login") == TRUE) {
			$logoPath = base_url('/assets/img/kop_billing.jpg');
            $typeFile = pathinfo($logoPath, PATHINFO_EXTENSION);
            $logoFile = file_get_contents($logoPath);
            $data['kop_billing'] = 'data:image/' . $typeFile . ';base64,' . base64_encode($logoFile);

			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('legal', 'potrait');
			$this->pdf->filename = "formulirinap".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/sampul/rm11hal1', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function cetakr12($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('legal', 'potrait');
			$this->pdf->filename = "formulirinap".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/sampul/rm11hal2', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function cetakr11_inap($id) {
		if ($this->session->userdata("login") == TRUE) {
			$logoPath = base_url('/assets/img/kop_billing.jpg');
            $typeFile = pathinfo($logoPath, PATHINFO_EXTENSION);
            $logoFile = file_get_contents($logoPath);
            $data['kop_billing'] = 'data:image/' . $typeFile . ';base64,' . base64_encode($logoFile);

			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('legal', 'potrait');
			$this->pdf->filename = "formulirinap".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/sampul/rm11hal1_inap', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function cetakr12_inap($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('legal', 'potrait');
			$this->pdf->filename = "formulirinap".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/sampul/rm11hal2_inap', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function formulirunitinap($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('legal', 'potrait');
			$this->pdf->filename = "formulirinap".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/sampul/formulirinap', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function gelangunitinap($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('gelang', 'potrait');
			$this->pdf->filename = "formulirinap".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/sampul/gelanginap', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function gelangunitinap_tes($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$data["id"] = $id;
			$this->load->view('laporan/sampul/gelanginap', $data);
			// $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
	}

	//ugd
	// public function karcisunitugd($id, $kd) {
	// 	if ($this->session->userdata("login") == TRUE) {
	// 		$r = date("Ymd");
	// 		$this->load->library('pdf');
	// 		$this->pdf->setPaper('A4', 'potrait');
	// 		$this->pdf->filename = "karcisugd".$r.".pdf";
	// 		$data["id"] = $id;
    //         $data["kd"] = $kd;
	// 		$this->pdf->load_view('laporan/sampul/karcisugd', $data);
	// 		$this->pdf->render();
	// 		$this->pdf->output();
    //     } else {
    //         redirect('login');
    //     }
	// }

	public function karcisunitugd($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('A4', 'potrait');
			$this->pdf->filename = "karcisugd".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/sampul/karcisugd', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	// public function tracerunitugd($id, $kd) {
	// 	if ($this->session->userdata("login") == TRUE) {
	// 		$r = date("Ymd");
	// 		$this->load->library('pdf');
	// 		$this->pdf->setPaper('A4', 'potrait');
	// 		$this->pdf->filename = "tracerugd".$r.".pdf";
	// 		$data["id"] = $id;
    //         $data["kd"] = $kd;
	// 		$this->pdf->load_view('laporan/sampul/tracerugd', $data);
	// 		$this->pdf->render();
	// 		$this->pdf->output();
    //     } else {
    //         redirect('login');
    //     }
	// }

	public function gelangunitugd($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('gelang', 'potrait');
			$this->pdf->filename = "formulirugd".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/sampul/gelangugd', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function buktiregisigd($id) {
		if ($this->session->userdata("login") == TRUE) {
			$logoPath = base_url('/assets/img/logo-banggai.png');
			$typeFile = pathinfo($logoPath, PATHINFO_EXTENSION);
			$logoFile = file_get_contents($logoPath);
			$data['logo'] = 'data:image/' . $typeFile . ';base64,' . base64_encode($logoFile);

			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('gelang', 'potrait');
			$this->pdf->filename = "buktiregis".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/sampul/buktiregisigd', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function tracerunitugd($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			// $this->pdf->setPaper('A4', 'potrait');
			$this->pdf->setPaper('tracer', 'potrait');
			$this->pdf->filename = "tracerugd".$r.".pdf";
			$data["id"] = $id;;
			$this->pdf->load_view('laporan/sampul/tracerugd', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

    // public function opdunitugd($id, $kd) {
    //     if ($this->session->userdata("login") == TRUE) {
    //         $r = date("Ymd");
    //         $this->load->library('pdf');
    //         $this->pdf->setPaper('A4', 'potrait');
    //         $this->pdf->filename = "opdugd".$r.".pdf";
    //         $data["id"] = $id;
    //         $data["kd"] = $kd;
    //         $this->pdf->load_view('laporan/sampul/opdugd', $data);
    //         $this->pdf->render();
    //         $this->pdf->output();
    //     } else {
    //         redirect('login');
    //     }
    // }

	public function opdunitugd($id) {
        if ($this->session->userdata("login") == TRUE) {
            $r = date("Ymd");
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "opdugd".$r.".pdf";
            $data["id"] = $id;
            $this->pdf->load_view('laporan/sampul/opdugd', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
	}
	
    public function sjpunitugd($id, $kd) {
        if ($this->session->userdata("login") == TRUE) {
            $r = date("Ymd");
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "sjpugd".$r.".pdf";
            $data["id"] = $id;
            $data["kd"] = $kd;
            $this->pdf->load_view('laporan/sampul/sjpugd', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }

    // public function sjpugdunitugd($id, $kd) {
    //     if ($this->session->userdata("login") == TRUE) {
    //         $r = date("Ymd");
    //         $this->load->library('pdf');
    //         $this->pdf->setPaper('A4', 'potrait');
    //         $this->pdf->filename = "sjpugdugd".$r.".pdf";
    //         $data["id"] = $id;
    //         $data["kd"] = $kd;
    //         $this->pdf->load_view('laporan/sampul/sjpugdugd', $data);
    //         $this->pdf->render();
    //         $this->pdf->output();
    //     } else {
    //         redirect('login');
    //     }
    // }

	public function sjpugdunitugd($id) {
        if ($this->session->userdata("login") == TRUE) {
            $r = date("Ymd");
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "sjpugdugd".$r.".pdf";
            $data["id"] = $id;
            $this->pdf->load_view('laporan/sampul/sjpugdugd', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }

// ========== RESEP ETIKET ================

	public function cetaketiket($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('etiket', 'potrait');
			$this->pdf->filename = "etiket".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/etiket/etiketresep', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function cetaketiketsemua($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('etiket', 'potrait');
			$this->pdf->filename = "etiket".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/etiket/etiketresepsemua', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

// ========== GIZI ETIKET ================
	public function cetaketiketpagi($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('etiket', 'potrait');
			$this->pdf->filename = "etiket".$r.".pdf";
			$data["id"] = $id;
			$data["waktu"] = 'PAGI';
			$this->pdf->load_view('laporan/etiketgizi/etiketgizi', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function cetaketiketsiang($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('etiket', 'potrait');
			$this->pdf->filename = "etiket".$r.".pdf";
			$data["id"] = $id;
			$data["waktu"] = 'SIANG';
			$this->pdf->load_view('laporan/etiketgizi/etiketgizi', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function cetaketiketmalam($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('etiket', 'potrait');
			$this->pdf->filename = "etiket".$r.".pdf";
			$data["id"] = $id;
			$data["waktu"] = 'MALAM';
			$this->pdf->load_view('laporan/etiketgizi/etiketgizi', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function cetaketiketpagisemua($ruang,$tglx) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('etiket', 'potrait');
			$this->pdf->filename = "etiket".$r.".pdf";
			// $data["id"] = $id;
			$data["ruang"] = $ruang;
			$data["tglx"] = $tglx;
			$data["waktu"] = 'PAGI';
			$this->pdf->load_view('laporan/etiketgizi/etiketgizisemua', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function cetaketiketsiangsemua($ruang,$tglx) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('etiket', 'potrait');
			$this->pdf->filename = "etiket".$r.".pdf";
			// $data["id"] = $id;
			$data["ruang"] = $ruang;
			$data["tglx"] = $tglx;
			$data["waktu"] = 'SIANG';
			$this->pdf->load_view('laporan/etiketgizi/etiketgizisemua', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}


	public function cetaketiketmalamsemua($ruang,$tglx) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('etiket', 'potrait');
			$this->pdf->filename = "etiket".$r.".pdf";
			// $data["id"] = $id;
			$data["ruang"] = $ruang;
			$data["tglx"] = $tglx;
			$data["waktu"] = 'MALAM';
			$this->pdf->load_view('laporan/etiketgizi/etiketgizisemua', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function cetaketiketsnack($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('etiket', 'potrait');
			$this->pdf->filename = "etiket".$r.".pdf";
			$data["id"] = $id;
			$data["waktu"] = 'PAGI';
			$this->pdf->load_view('laporan/etiketgizi/etiketgizisnack', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function cetaketiketsnacksemua($ruang,$tglx) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			$this->pdf->setPaper('etiket', 'potrait');
			$this->pdf->filename = "etiket".$r.".pdf";
			// $data["id"] = $id;
			$data["ruang"] = $ruang;
			$data["tglx"] = $tglx;
			$data["waktu"] = 'MALAM';
			$this->pdf->load_view('laporan/etiketgizi/etiketgizisemuasnack', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}


	// billing============
	public function billinginap($id) {
		if ($this->session->userdata("login") == TRUE) {
			$logoPath = base_url('/assets/img/kop_billing.jpg');
            $typeFile = pathinfo($logoPath, PATHINFO_EXTENSION);
            $logoFile = file_get_contents($logoPath);
            $data['kop_billing'] = 'data:image/' . $typeFile . ';base64,' . base64_encode($logoFile);

			// $r = date("Ymd");
			// $this->load->library('pdf');
			// $this->pdf->setPaper('A4', 'potrait');
			// $this->pdf->filename = "billing".$r.".pdf";
			// $data["id"] = $id;
			// $this->pdf->load_view('laporan/sampul/billinginap', $data);
			// $this->pdf->render();
			// $this->pdf->output();
			$this->load->view('laporan/sampul/billinginap', $data);

        } else {
            redirect('login');
        }
	}
}
