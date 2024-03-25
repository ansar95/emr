<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitb extends CI_Controller {

	public function index() {
		if ($this->session->userdata("login") == TRUE) {
			$data['include'] = "layanan/pelayanan/sitb/listpasien";
			// $data['unit'] = $dtunit;
			$data['menusamping'] = "menusitb";
			$data['backhome'] = "tiga";
			$data['js'] = "pelayanan/sitb/jssitb";
			$data['css'] = "pelayanan/sitb/csssitb";
			$this->load->view('templatesidebar/content', $data);

			// $data["dtpasien"] = $dtpasien;
			// $this->load->view('layanan/pelayanan/sitb/listpasien', $data);
		} else {
			redirect('login');
		}
	}
	
	public function tampilkandata() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("sitbmdl");
            $data["dtpasientb"] = $this->sitbmdl->pasientb();
            $this->load->view('layanan/pelayanan/sitb/tdlistpasien', $data);

            // echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

	public function tampilkandata_rm() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("sitbmdl");
            $data["dtpasientb"] = $this->sitbmdl->pasientb_rm();
            $this->load->view('layanan/pelayanan/sitb/tdlistpasien', $data);

            // echo json_encode($dt);
        } else {
            redirect('login');
        }
    }
	

    //posting data TB

    public function postingdatatb() {
		if ($this->session->userdata("login") == TRUE) {
			$data['include'] = "layanan/pelayanan/sitb/postingdata";
			// $data['unit'] = $dtunit;
			$data['menusamping'] = "menusitb";
			$data['backhome'] = "tiga";
			$data['js'] = "pelayanan/sitb/jssitb";
			$data['css'] = "pelayanan/sitb/csssitb";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

    public function tampilkandataposting() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("sitbmdl");
            $data["dtpasientb"] = $this->sitbmdl->hasilposting();
            $this->load->view('layanan/pelayanan/sitb/tdpostingdata', $data);
            // echo json_encode($dt);
        } else {
            redirect('login');
        }
    }



    public function post2sitb(){
		// $curl = curl_init();
		// curl_setopt_array($curl, array(
		//   CURLOPT_URL => "http://192.168.1.202:773/ws/",
		//   CURLOPT_CUSTOMREQUEST => "GET",
		//   CURLOPT_HTTPHEADER => array(
		// 	"content-type: application/json",
		// 	"x-cid: 4301202030080005",
		// 	"x-mod: auth",
		// 	'x-secret: P@ssw0rd$luwuk',
		// 	"x-user: SIMRS@pemprov"
		//   ),
		// ));
		
		// $response = curl_exec($curl);
		// $err = curl_error($curl);
		
		// curl_close($curl);
		
		// if ($err) {
		//   echo "cURL Error #:" . $err;
		// } else {
		//   echo $response;
		// }
        
        //--flag=1
        $this->load->model("sitbmdl");
        $flag = $this->sitbmdl->isiflag();
        //--tampilkan hasil perubahan
        $data["dtpasientb"] = $this->sitbmdl->hasilposting();
        $this->load->view('layanan/pelayanan/sitb/tdpostingdata', $data);
	}	

    //Laporan SITB Unit
    public function laporansitb() {
        $this->load->model('unit');
        $this->load->model('golongan');
        $this->load->model('user');
        $data['user'] = $this->user->full();
        $data['unit'] = $this->unit->fullurj();
        $data['golongan'] = $this->golongan->full();
        $data['menusamping'] = "menusitb";
        $data['backhome'] = "tiga";
        $data['include'] = "layanan/pelayanan/sitb/formlaporansitb";
        $data['js'] = "pelayanan/sitb/jssitb";
        $data['css'] = "pelayanan/sitb/csssitb";
        $this->load->view('templatesidebar/content', $data);
    }

    
    public function panggilcetak() {
		// echo $this->input->post("cet");
		// echo $this->input->post("cete");
		if($this->input->post("cet") != null) {
			$this->laporanharian();
		} else if($this->input->post("cete") != null) {
			$this->laporanharianecel();
			// echo namafiletgl();
		}
	}

	public function laporanharian() {
		
		$r = date("Ymd");
		$this->load->model('sitbmdl');
		$lunit = $this->sitbmdl->datalaporan();
		$g = [];
		foreach($lunit as $row) {
			$y = $row->unit;
			$n = $row->nama_unit;
			$g[] = array (
				"unit" => $y,
				"nama_unit" => $n,
				"data" => $this->sitbmdl->ambildatalaporan($y)
			); 
		}
		$data['l'] = $g;
		
		// $this->load->library('pdf');
		// $this->pdf->setPaper('A4', 'landscape');
		// $this->pdf->filename = "laporan-sitb".$r.".pdf";
		// $this->pdf->load_view('laporan/laporansitb/laporansitbunit', $data);
		$this->load->view('laporan/laporansitb/laporansitbunit', $data);
		// $this->pdf->render();
		// $this->pdf->output();
	}

	public function laporanharianecel() {
		$this->load->model('sitbmdl');
		$lunit = $this->sitbmdl->datalaporan();
		$g = [];
		foreach($lunit as $row) {
			$y = $row->unit;
			$g[] = array (
				"unit" => $y,
				"data" => $this->sitbmdl->ambildatalaporan($y)
			); 
		}
		$data['l'] = $g;
		$this->load->view('laporan/laporansitb/excel/laporansitbunit', $data);
	}
	// =============
}
