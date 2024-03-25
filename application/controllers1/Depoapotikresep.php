<?php
/*
    aplication: simrs
    owner: dedy jamal
    Author_page: haris
    created_at: 03-08-2022
*/

defined('BASEPATH') or exit('No direct script access allowed');
class Depoapotikresep extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if (! $this->session->userdata("login") ) {
        //     redirect('login');
        // }
    }

    public function index()
    {

    }

    public function listresepobat() {
        if ($this->session->userdata("login") == TRUE) {
            $idUser = $this->session->userdata("idx");
			if (ceksess("PIL", $idUser) == FALSE) {
				$this->load->model("unit");
				$dtunit = $this->unit->fulldepo();
			} else {
				$this->load->model("unit");
				$dtunit = $this->unit->fulldepo();
			}

            // $this->load->model("unit");
            // $dtunit = $this->unit->fulldepo();

            $data['include'] = "layanan/pelayanan/apotik/resep/listreseppotongan";
            $data['menusamping'] = "menuapotik";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/apotik/listresep";
            $data['css'] = "pelayanan/apotik/listresep";
            $data['dtunit'] = $dtunit;
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function resepobat($shift, $depo, $depotext) 
    {
        $this->load->model("unit");
        $dtunit = $this->unit->fulldepo();
        $this->load->model("golongan");
        $this->load->model("unit");
        $this->load->model("dokter");
        $this->load->model("potongan");

        $data['include'] = "layanan/pelayanan/apotik/resep/formresepdepo";
        $data['menusamping'] = "menuapotik";
        $data['backhome'] = "tiga";
        $data['js'] = "pelayanan/apotik/resepobat";
        $data['css'] = "pelayanan/apotik/resepobat";
        $data['dtunit'] = $dtunit;
        $data['golongan'] = $this->golongan->full();
        $data['unit'] = $this->unit->unitumum();
        $data['dokter'] = $this->dokter->datadokter();
        $data['shift'] = $shift;
        $data['depo'] = $depo;
        $data['depotext'] = str_replace('%20', ' ', $depotext);

        
        $data['potongan'] = $this->potongan->get();

        //var_dump($data['unit']);
        //exit;

        $this->load->view('templatesidebar/content', $data);
    }

    public function editresepobat($id) {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("unit");
            $dtunit = $this->unit->fulldepo();
            $this->load->model("golongan");
            $this->load->model("unit");
            $this->load->model("dokter");
            $this->load->model("apotik");
            $this->load->model("potongan");
            $dtheader = $this->apotik->ambildataresepheader($id);
            $dtdetail = $this->apotik->ambildataresepdetail($dtheader->noresep);
            $dtpotongan = $this->potongan->ambilpotongan($dtheader->noresep);

            $data['include'] = "layanan/pelayanan/apotik/resep/editformresepdepo";
            $data['menusamping'] = "menuapotik";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/apotik/editresepobat";
            $data['css'] = "pelayanan/apotik/resepobat";
            $data['dtunit'] = $dtunit;
            $data['golongan'] = $this->golongan->full();
            $data['unit'] = $this->unit->unitumum();
            $data['dokter'] = $this->dokter->datadokter();
            $data['dtheader'] = $dtheader;
            $data['dtdetail'] = $dtdetail;
            $data['dtpotongan'] = $dtpotongan;

            $data['potongan'] = $this->potongan->get();

            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function tambahobat() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("apotik");

            $data['dtobat'] = $this->bhp->obatdanbhporder();
            $data['dttakaran'] = $this->apotik->pilihtakaran();
            $data['dtdosis'] = $this->apotik->ambildosis();
            $data['dtcaramkn'] = $this->apotik->pilihcaramakan();
            $data['dtpendanaan'] = $this->apotik->pilihpendanaan();
            $data["formpilih"] = 0;
            $this->load->view('layanan/pelayanan/apotik/resep/formresepdepodetail', $data);
        } else {
            redirect('login');
        }
    }

    public function editobat() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("apotik");
            $data['dtobat'] = $this->bhp->obatdanbhporder();
            $data['dtedit'] = $this->apotik->ambileditresepdetail();
            $data['dtdosis'] = $this->apotik->ambildosis();
            $data['dttakaran'] = $this->apotik->pilihtakaran();
            $data['dtcaramkn'] = $this->apotik->pilihcaramakan();
            $data['dtpendanaan'] = $this->apotik->pilihpendanaan();
            $data["formpilih"] = 1;
            $this->load->view('layanan/pelayanan/apotik/resep/formresepdepodetail', $data);
        } else {
            redirect('login');
        }
    }

    public function simpandepo() {
        if ($this->session->userdata("login") == TRUE) {

            $this->load->model("apotik");
            $this->load->model("potongan");
            $dtnotrans = $this->apotik->ambilnoresep();
            $dtresep = $this->apotik->simpanresep($dtnotrans);
            $dtpotongan = $this->potongan->simpan_potongan_resep($dtnotrans);

            $id = $dtresep["noresep"];
            $detail = $this->apotik->ambildetail($id);
            $detailpotongan = $this->potongan->ambilpotongan($id);
            $data["hasil"] = $detail;
            $data["potongan"] = $detailpotongan;
            $dt["stat"] = $dtresep;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/apotik/resep/tabledetailreseppotongan', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function editdepo() {
        if ($this->session->userdata("login") == TRUE) {

            $this->load->model("apotik");
            $this->load->model("potongan");
            $dtresep = $this->apotik->ubahresep($this->input->get('id'));

            $detail = $this->apotik->ambildetail($this->input->get('norep'));
            $detailpotongan = $this->potongan->ambilpotongan($this->input->get('norep'));

            $data["hasil"] = $detail;
            $data["potongan"] = $detailpotongan;
            $dt["stat"] = $dtresep;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/apotik/resep/tabledetailreseppotongan', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function hapusdepo() {
        if ($this->session->userdata("login") == TRUE) {

            $this->load->model("apotik");
            $this->load->model("potongan");
            $dtresep = $this->apotik->hapusdetailresep();

            $detail = $this->apotik->ambildetail($this->input->get('norep'));
            $detailpotongan = $this->potongan->ambilpotongan($this->input->get('norep'));

            $data["hasil"] = $detail;
            $data["potongan"] = $detailpotongan;
            $dt["stat"] = $dtresep;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/apotik/resep/tabledetailreseppotongan', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function datalistresep() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("apotik");
            $dtlist = $this->apotik->ambilresep();
            $dt["dtstatus"] = false;
            $data["hasil"] = $dtlist;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/apotik/resep/tablereseppotongan', $data, TRUE);
            echo json_encode($dt);

        } else {
            redirect('login');
        }
    }

    

}