<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Jasamedik extends CI_Controller
{

    public function jasamedikverifikasiurj()
    {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('menuapp');
            // $menu = $this->menuapp->subpelayanan(1);
            // $data['include'] = "layanan/pelayanan/instalasi/laboratorium/plaboratorium";
            $data['include'] = "layanan/backoffice/jasamedik/dokter/verifikasiurj";
            // $data['menu'] = $menu;
            $data['css'] = "backoffice/jasamedik/jasamedik";
            $data['menusamping'] = "menujasamedik";
            $data['backhome'] = "dua";
            $data['js'] = "backoffice/jasamedik/verifikasiurj";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }
    public function jasamedikverifikasiuri()
    {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('menuapp');
            // $menu = $this->menuapp->subpelayanan(1);
            // $data['include'] = "layanan/pelayanan/instalasi/laboratorium/plaboratorium";
            $data['include'] = "layanan/backoffice/jasamedik/dokter/verifikasiuri";
            // $data['menu'] = $menu;
            $data['css'] = "backoffice/jasamedik/jasamedik";
            $data['menusamping'] = "menujasamedik";
            $data['backhome'] = "dua";
            $data['js'] = "backoffice/jasamedik/verifikasiuri";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }
    public function jasamedikpersentaseranap()
    {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('menuapp');
            // $menu = $this->menuapp->subpelayanan(1);
            // $data['include'] = "layanan/pelayanan/instalasi/laboratorium/plaboratorium";
            $data['include'] = "layanan/backoffice/jasamedik/masterdata/persentaseranap";
            // $data['menu'] = $menu;
            $data['css'] = "backoffice/jasamedik/jasamedik";
            $data['menusamping'] = "menujasamedik";
            $data['backhome'] = "dua";
            // $data['js'] = "backoffice/jasamedik/verifikasiuri";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function jasamedikpersentaserajal()
    {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('menuapp');
            // $menu = $this->menuapp->subpelayanan(1);
            // $data['include'] = "layanan/pelayanan/instalasi/laboratorium/plaboratorium";
            $data['include'] = "layanan/backoffice/jasamedik/masterdata/persentaserajal";
            // $data['menu'] = $menu;
            $data['css'] = "backoffice/jasamedik/jasamedik";
            $data['menusamping'] = "menujasamedik";
            $data['backhome'] = "dua";
            // $data['js'] = "backoffice/jasamedik/verifikasiuri";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }
    
    public function jasamedikdtpegawai()
    {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('menuapp');
            // $menu = $this->menuapp->subpelayanan(1);
            // $data['include'] = "layanan/pelayanan/instalasi/laboratorium/plaboratorium";
            $data['include'] = "layanan/backoffice/jasamedik/jasa/dtpegawai";
            // $data['menu'] = $menu;
            $data['css'] = "backoffice/jasamedik/jasamedik";
            $data['menusamping'] = "menujasamedik";
            $data['backhome'] = "dua";
            $data['js'] = "backoffice/jasamedik/dtpegawai";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }
    
    public function jasamediktindakan()
    {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('menuapp');
            // $menu = $this->menuapp->subpelayanan(1);
            // $data['include'] = "layanan/pelayanan/instalasi/laboratorium/plaboratorium";
            $data['include'] = "layanan/backoffice/jasamedik/masterdata/jasamediktindakan";
            // $data['menu'] = $menu;
            $data['css'] = "backoffice/jasamedik/jasamedik";
            $data['menusamping'] = "menujasamedik";
            $data['backhome'] = "dua";
            $data['js'] = "backoffice/jasamedik/jasamediktindakan";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function jasadokter(){
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('menuapp');
            // $menu = $this->menuapp->subpelayanan(1);
            // $data['include'] = "layanan/pelayanan/instalasi/laboratorium/plaboratorium";
            $data['include'] = "layanan/backoffice/jasamedik/rekapjasa/jasadokter";
            // $data['menu'] = $menu;
            $data['css'] = "backoffice/jasamedik/jasamedik";
            $data['menusamping'] = "menujasamedik";
            $data['backhome'] = "dua";
            $data['js'] = "backoffice/jasamedik/jasadokter";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function jasadokterRajal(){
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('menuapp');
            // $menu = $this->menuapp->subpelayanan(1);
            // $data['include'] = "layanan/pelayanan/instalasi/laboratorium/plaboratorium";
            $data['include'] = "layanan/backoffice/jasamedik/rekapjasa/jasadokterRajal";
            // $data['menu'] = $menu;
            $data['css'] = "backoffice/jasamedik/jasamedik";
            $data['menusamping'] = "menujasamedik";
            $data['backhome'] = "dua";
            $data['js'] = "backoffice/jasamedik/jasadokterRajal";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }
    
    
    public function dtverifikasiurj() {
		$this->load->model("jasarajal");
		$dturj =  $this->jasarajal->full();;
		echo json_encode($dturj);
	}
    public function dtverifikasiuri() {
		$this->load->model("jasaranap");
		$dturi =  $this->jasaranap->full();;
		echo json_encode($dturi);
	}
}
