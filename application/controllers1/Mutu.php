<?php

use Complex\Functions;

defined('BASEPATH') or exit('No direct script access allowed');
class Mutu extends CI_Controller
{

    protected $model;
    protected $jenisIndikatorModel;
    // public function __construct() {
    //     parent::__construct();
    //     if ($this->session->userdata("login") == false) {
    //         redirect('login');
    //     }
    //     $this->load->model('mutuModel');
    //     $this->model = $this->mutuModel;
    // }


    
    public function masterindikatormutu()
    {
        $data['include'] = "layanan/pelayanan/mutu/masterindikatormutu";
        $data['css'] = "pelayanan/mutu/stylemutu";
        $data['menusamping'] = "menumutu";
        $data['backhome'] = "tiga";
        $data['js'] = "pelayanan/mutu/masterindikatormutu";
        $this->load->model('jenisindikator');
        $this->load->model('unit');
        $data['jenis_indikator'] = $this->jenisindikator->get();
        $data['unit'] = $this->unit->unitbygroup();
        $this->load->view('templatesidebar/content', $data);
        
    }

    public function list_master_indikator()
    {
        $data['result'] = $this->model->all($this->input->get());
        $this->load->view('layanan/pelayanan/mutu/list_master_indikator', $data);
    }

    public function tambah()
    {
        try {
            $result = $this->model->store($this->input->post());
            if (!$result) {
                throw new Exception("terjadi kesalahan, gagal menambah data", 1);
            }
            echo json_encode([
                'status'=>true,
                'data'=>$result
            ]);
        } catch (\Throwable $th) {
            echo json_encode([
                'status'=>false,
                'message'=>$th->getMessage()
            ]);
        }
    }


    public function hapus()
    {
        try {
            $id = $this->input->post('id');
            $result  = $this->model->delete($id);
            if (!$result) {
                throw new Exception("terjadi kesalahan, gagal mengubah data", 1);
            }
            echo json_encode([
                'status'=>true,
                'data'=>$result
            ]);
        } catch (\Throwable $th) {
            echo json_encode([
                'status'=>false,
                'message'=>$th->getMessage()
            ]);
        }
    }

    public function get_mutu_by_id($id)
    {
        try {
            $data = $this->model->findById($id);
            echo json_encode([
                'status'=> true,
                'data'=> $data
            ]);
        } catch (\Throwable $th) {
            echo json_encode([
                'status'=> false,
                'message' => $th->getMessage()
            ]);
        }
    }
    

    public function indikatormutulayanan()
    {
        $this->load->model('unit');

        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/mutu/indikatormutulayanan";
            $data['css'] = "pelayanan/mutu/stylemutu";
            $data['menusamping'] = "menumutu";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/mutu/indikatormutu";
            $data['unit'] = $this->unit->unitbygroup();
            
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function rekapmutasiberkas()
    {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/mutu/rekapmutasiberkas";
            $data['css'] = "pelayanan/mutu/stylemutu";
            $data['menusamping'] = "menumutu";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/mutu/rekapmutasiberkas";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function laporanmutu(){
        $this->load->model('unit');
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "laporan/mutu/laporanmutu";
            $data['css'] = "pelayanan/mutu/stylemutu";
            $data['menusamping'] = "menumutu";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/mutu/laporanbulanan";
            $data['unit'] = $this->unit->unitbygroup();

            // $data['js'] = "pelayanan/mutu/laporanmutu";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function store() 
    {
        try {
            $data = [
                'kode'  => $this->input->post('kode'),
                'jenis' => $this->input->post('jenis'),
                'pelaksana' => json_encode($this->input->post('pelaksana')),
                'nilai' => $this->input->post('nilai'),
                'ukuran' => $this->input->post('ukuran'),
                'indikator' => $this->input->post('indikator'),
                'indikator_penilaian' => $this->input->post('indikator_penilaian_mutu'),
                'numerator' => $this->input->post('numerator'),
                'denominator' => $this->input->post('denominator')
            ];
            $this->load->model('mutumodel');
            $this->mutumodel->store($data);
            
            return redirect('/mutu/masterindikatormutu');

        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function getdata()
    {
        try {
            $this->load->model('mutumodel');
            $config = array();
            $config["base_url"] = "#";
            $config["total_rows"] = $this->mutumodel->count();
            $config["per_page"] = 5;
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
            $data = $this->mutumodel->find($config["per_page"], $start);
            echo json_encode([
                "status" => true,
                "data" => $data,
                "pagination" => $this->pagination->create_links()
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function delete()
    {
        try {
            $id = $this->input->get('id');
            $this->load->model('mutumodel');
            $this->mutumodel->delete($id);

            echo json_encode([
                'status' => true,
                'message' => 'Data berhasil dihapus'
            ]);

        } catch (\Throwable $th) {
            echo json_encode([
                'status'  => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function detail()
    {
        try {
            $id = $this->input->get('id');
            $this->load->model('mutumodel');
            $data = $this->mutumodel->detail($id);
            // dd($data);
            echo json_encode([
                'status' => true,
                'data'   => $data
            ]);

        } catch(\Throwable $th) {
            echo json_encode([
                'status'  => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function update()
    {
        try {
            $id = $this->input->post('id');
            $data = [
                'kode'  => $this->input->post('kode'),
                'jenis' => $this->input->post('jenis'),
                'pelaksana' => json_encode($this->input->post('pelaksana')),
                'nilai' => $this->input->post('nilai'),
                'ukuran' => $this->input->post('ukuran'),
                'indikator' => $this->input->post('indikator'),
                'indikator_penilaian' => $this->input->post('indikator_penilaian_mutu'),
                'numerator' => $this->input->post('numerator'),
                'denominator' => $this->input->post('denominator')
            ];
            $this->load->model('mutumodel');
            $this->mutumodel->update($id, $data);
            
            return redirect('/mutu/masterindikatormutu');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return $th->getMessage();
        }
    }

    public function getMutuByPelaksana()
    {
        try {
            $id = $this->input->get('id');
            $this->load->model('mutumodel');

            $data = $this->mutumodel->findByPelaksana($id);

            echo json_encode([
                'status'  => true,
                'message' => 'Successfully get data',
                'data'    => $data
            ]);
        } catch(\Throwable $th) {
            echo json_encode([
                'status'  => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function laporan()
    {
        try {
            $this->load->model('penilaianmutumodel');

            $data   = [];
            $report = [];
            $query  = [
                'bulan' => $this->input->get('bulan'),
                'tahun' => $this->input->get('tahun'),
                'indikator_mutu_id' => $this->input->get('indikator'),
                'unit_id' => $this->input->get('unit')
            ];

            $laporan = $this->penilaianmutumodel->find($query);

            $totalNumerator   = 0;
            $totalDenumerator = 0;
            
            foreach($laporan as $item) {
                $totalNumerator   += $item->nilai_numerator;
                $totalDenumerator += $item->nilai_denumerator;

                $report[] = [
                    'tanggal'          => $item->tanggal,
                    'nilai_numerator'  => $item->nilai_numerator,
                    'nilai_denumerator'=> $item->nilai_denumerator
                ];
            }

            $data = [
                'report'           => $report,
                'total_numerator'  => $totalNumerator,
                'total_denumerator'=> $totalDenumerator
            ];

            echo json_encode([
                'status'  => true,
                'message' => 'successfully get data',
                'data' => $data
            ]);
        } catch(\Throwable $th) {
            echo json_encode([
                'status'  => false,
                'message' => $th->getMessage()
            ]);
        }
    }
}