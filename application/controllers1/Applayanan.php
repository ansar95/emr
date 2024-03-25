<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applayanan extends CI_Controller {

	public function index() {
		//tes
		
	}
	public function menuapp() {
		if ($this->session->userdata("login") == TRUE) {
            $this->load->model('menuapp');
            $menu = $this->menuapp->depan();
            $data['include'] = "layanan/frontuser";
            $data['menu'] = $menu;
            $data['backhome'] = "satu";
            $this->load->view('templatetopbar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function menuapppelayanan() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			$menu = $this->menuapp->pelayanan();
			$data['include'] = "layanan/frontpelayanan";
			$data['menu'] = $menu;
			$data['backhome'] = "dua";
			$this->load->view('templatetopbar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function apppfrontoffice() {
		if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/frontoffice/pfrontoffice";
            $data['menusamping'] = "menufrontoffice";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function apppregistrasi() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			$menu = $this->menuapp->subpelayanan(1);
			$data['include'] = "layanan/pelayanan/registrasi/pregister";
			$data['menu'] = $menu;
			$data['menusamping'] = "menuregistrasi";
			$data['backhome'] = "tiga";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function apppugd() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			$menu = $this->menuapp->subpelayanan(1);
			$data['include'] = "layanan/pelayanan/ugd/pugd";
			$data['menu'] = $menu;
			$data['menusamping'] = "menuugd";
			$data['backhome'] = "tiga";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function apppurj() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			$menu = $this->menuapp->subpelayanan(1);
			$data['include'] = "layanan/pelayanan/urj/prawatjalan";
			$data['menu'] = $menu;
			$data['menusamping'] = "menuurj";
			$data['backhome'] = "tiga";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function apppuri() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			$menu = $this->menuapp->subpelayanan(1);
			$data['include'] = "layanan/pelayanan/uri/prawatinap";
			$data['menu'] = $menu;
			$data['menusamping'] = "menuuri";
			$data['backhome'] = "tiga";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function appbpjs() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			$menu = $this->menuapp->subpelayanan(1);
			$data['include'] = "layanan/pelayanan/bpjs/pbpjs";
			$data['menu'] = $menu;
			$data['menusamping'] = "menubpjs";
			$data['backhome'] = "tiga";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	// instlasi
	public function appinstalasi() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			$menu = $this->menuapp->subpelayanan(7);
			$data['include'] = "layanan/pelayanan/instalasi/frontinstalasi";
			$data['menu'] = $menu;
			// $data['backhome'] = "dua";
            $data['backhome'] = "tiga";
			$this->load->view('templatetopbar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function appinstalasilaboratorium() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			// $menu = $this->menuapp->subpelayanan(1);
			$data['include'] = "layanan/pelayanan/instalasi/laboratorium/plaboratorium";
			// $data['menu'] = $menu;
			$data['menusamping'] = "menulab";
			$data['backhome'] = "inst";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function appinstalasiradiologi() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			// $menu = $this->menuapp->subpelayanan(1);
			$data['include'] = "layanan/pelayanan/instalasi/radiologi/pradiologi";
			// $data['menu'] = $menu;
			$data['menusamping'] = "menurad";
			$data['backhome'] = "inst";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function appinstalasihemodialisa() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			// $menu = $this->menuapp->subpelayanan(1);
			$data['include'] = "layanan/pelayanan/instalasi/hemodialisa/phemodialisa";
			// $data['menu'] = $menu;
			$data['menusamping'] = "menuhem";
			$data['backhome'] = "inst";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function appinstalasijenazah() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			// $menu = $this->menuapp->subpelayanan(1);
			$data['include'] = "layanan/pelayanan/instalasi/jenazah/pjenazah";
			// $data['menu'] = $menu;
			$data['menusamping'] = "menujen";
			$data['backhome'] = "inst";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function appinstalasiambulan() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			// $menu = $this->menuapp->subpelayanan(1);
			$data['include'] = "layanan/pelayanan/instalasi/ambulan/pambulan";
			// $data['menu'] = $menu;
			$data['menusamping'] = "menuamb";
			$data['backhome'] = "inst";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function appinstalasibersalin() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			// $menu = $this->menuapp->subpelayanan(1);
			$data['include'] = "layanan/pelayanan/instalasi/bersalin/pbsr";
			// $data['menu'] = $menu;
			$data['menusamping'] = "menubsr";
			$data['backhome'] = "inst";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function appinstalasioperasi() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			// $menu = $this->menuapp->subpelayanan(1);
			$data['include'] = "layanan/pelayanan/instalasi/operasi/popr";
			// $data['menu'] = $menu;
			$data['menusamping'] = "menuopr";
			$data['backhome'] = "inst";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}
	// =============

	// untuk Apotik
	public function appapotik() {
		if ($this->session->userdata("login") == TRUE) {
			$data['include'] = "layanan/pelayanan/apotik/papotik";
			$data['menusamping'] = "menuapotik";
			$data['backhome'] = "tiga";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}
	// ===========

    // Untuk Gudang Farmasi
    public function appgudang() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('menuapp');
            $menu = $this->menuapp->subpelayanan(12);
            $data['include'] = "layanan/pelayanan/farmasi/frontfarmasi";
            $data['menu'] = $menu;
            $data['backhome'] = "tiga";
            $this->load->view('templatetopbar/content', $data);
        } else {
            redirect('login');
        }
    }
//gudang farmasi old
public function appgudangfaktur_1() {
	if ($this->session->userdata("login") == TRUE) {
		$this->load->model('menuapp');
		$data['include'] = "layanan/pelayanan/farmasi/faktur/pfaktur";
		$data['menusamping'] = "menufakturobat";
		$data['backhome'] = "gudang";
		$this->load->view('templatesidebar/content', $data);
	} else {
		redirect('login');
	}
}

public function appgudangpelayanan_1() {
	if ($this->session->userdata("login") == TRUE) {
		$this->load->model('menuapp');
		$data['include'] = "layanan/pelayanan/farmasi/pelayanan/ppelayanan";
		$data['menusamping'] = "menuampraobat";
		$data['backhome'] = "gudang";
		$this->load->view('templatesidebar/content', $data);
	} else {
		redirect('login');
	}
}

//=====gudang farmasi new
public function appgudangfaktur() {
	if ($this->session->userdata("login") == TRUE) {
		$this->load->model('menuapp');
		$data['include'] = "layanan/pelayanan/farmasi/faktur/pfaktur";
		$data['menusamping'] = "menufakturobat";
		$data['backhome'] = "gudang";
		$this->load->view('templatesidebar/content', $data);
	} else {
		redirect('login');
	}
}

public function appgudangpelayanan() {
	if ($this->session->userdata("login") == TRUE) {
		$this->load->model('menuapp');
		$data['include'] = "layanan/pelayanan/farmasi/pelayanan/ppelayanan";
		$data['menusamping'] = "menuampraobat";
		$data['backhome'] = "gudang";
		$this->load->view('templatesidebar/content', $data);
	} else {
		redirect('login');
	}
}

public function appgudangfakturbhp() {
	if ($this->session->userdata("login") == TRUE) {
		$this->load->model('menuapp');
		$data['include'] = "layanan/pelayanan/farmasi/faktur/pfaktur";
		$data['menusamping'] = "menufakturbhp";
		$data['backhome'] = "gudang";
		$this->load->view('templatesidebar/content', $data);
	} else {
		redirect('login');
	}
}

public function appgudangpelayananbhp() {
	if ($this->session->userdata("login") == TRUE) {
		$this->load->model('menuapp');
		$data['include'] = "layanan/pelayanan/farmasi/pelayanan/ppelayanan";
		$data['menusamping'] = "menuamprabhp";
		$data['backhome'] = "gudang";
		$this->load->view('templatesidebar/content', $data);
	} else {
		redirect('login');
	}
}
// ==============


	// untuk administartor
	public function menuappadm() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			$menu = $this->menuapp->administrasi();
			$data['include'] = "layanan/adm/frontadm";
			$data['menu'] = $menu;
			$data['backhome'] = "dua";
			$this->load->view('templatetopbar/content', $data);
		} else {
			redirect('login');
		}
	}
	// =============

	// untuk master data
	public function menuappmaster() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			$menu = $this->menuapp->subpelayanan(15);
			$data['include'] = "layanan/pelayanan/master/frontmaster";
			$data['menu'] = $menu;
			$data['backhome'] = "tiga";
			$this->load->view('templatetopbar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function appmaster() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			// $menu = $this->menuapp->subpelayanan(1);
			$data['include'] = "layanan/pelayanan/master/pmaster";
			// $data['menu'] = $menu;
			$data['menusamping'] = "menumasterdata";
			$data['backhome'] = "tiga";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function appppi() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			// $menu = $this->menuapp->subpelayanan(1);
			$data['include'] = "layanan/pelayanan/ppi/pppi";
			// $data['menu'] = $menu;
			$data['menusamping'] = "menuppi";
			$data['backhome'] = "tiga";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}
	// =============

    // Untuk Gizi
    public function appgizi() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('menuapp');
            $menu = $this->menuapp->subpelayanan(14);
            $data['include'] = "layanan/pelayanan/gizi/frontgizi";
            $data['menu'] = $menu;
            $data['backhome'] = "tiga";
            $this->load->view('templatetopbar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function apppelyanangizi() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('menuapp');
            $data['include'] = "layanan/pelayanan/gizi/pelayanan/pgizi";
            $data['menusamping'] = "menugizi";
            $data['backhome'] = "gizi";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function appgudanggizi() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('menuapp');
            $data['include'] = "layanan/pelayanan/gizi/gudang/pgudanggizi";
            $data['menusamping'] = "menugizigudang";
            $data['backhome'] = "gizi";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }
    // ==============

    // untuk Ampra
    public function appampra() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/ampra/pampra";
            $data['menusamping'] = "menuampra";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }
    // ===========

    // untuk Rekam Medik
    public function apprekam() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/rekam/prekammedik";
            $data['menusamping'] = "menurekammedik";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }
    // ===========

    // untuk Billing
    public function appbilling() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/billing/pbilling";
            $data['menusamping'] = "menubilling";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

	 // untuk Cek Billing
	 public function cekbilling() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/billing/cekpbilling";
            $data['menusamping'] = "menucekbilling";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    // ===========

    // untuk Rumah Tangga
    public function apprumahtangga() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('menuapp');
            $data['include'] = "layanan/pelayanan/rt/prt";
            $data['menusamping'] = "menurt";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }
	// ===========

    // untuk BackOffice
    public function menuappbackoffice_old_keuangan() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('menuapp');
            $menu = $this->menuapp->backoffice();
            $data['include'] = "layanan/backoffice/frontback";
            $data['menu'] = $menu;
            $data['backhome'] = "dua";
            $this->load->view('templatetopbar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function appkeuangan() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('menuapp');
            $data['include'] = "layanan/backoffice/akuntansi/pkeuangan";
            $data['menusamping'] = "menukeuangan";
            $data['backhome'] = "bo";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }
    // =============
    // =============

	public function menuappbackoffice() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('menuapp');
            $menu = $this->menuapp->backoffice();
            $data['include'] = "layanan/backoffice/frontback";
            $data['menu'] = $menu;
            $data['backhome'] = "dua";
            $this->load->view('templatetopbar/content', $data);
        } else {
            redirect('login');
        }
    }

	public function appjasamedik() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			// $menu = $this->menuapp->subpelayanan(1);
			// $data['include'] = "layanan/pelayanan/instalasi/laboratorium/plaboratorium";
            $data['include'] = "layanan/backoffice/jasamedik/pjasamedik";
			// $data['menu'] = $menu;
			$data['menusamping'] = "menujasamedik";
			$data['backhome'] = "dua";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function appsitb() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model('menuapp');
			// $menu = $this->menuapp->subpelayanan(1);
			// $data['include'] = "layanan/pelayanan/instalasi/laboratorium/plaboratorium";
            $data['include'] = "layanan/pelayanan/psitb";
			// $data['menu'] = $menu;
			$data['menusamping'] = "menusitb";
			$data['backhome'] = "dua";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	//untuk mutu
	public function appmutu() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/mutu/pmutu";
            $data['menusamping'] = "menumutu";
            $data['backhome'] = "dua";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }
}
