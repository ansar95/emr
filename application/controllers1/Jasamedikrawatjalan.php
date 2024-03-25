<?php
/*
    aplication: simrs
    owner: dedy jamal
    Author_page: haris
    created_at: 03-08-2022
*/

defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Jasamedikrawatjalan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if (! $this->session->userdata("login") ) {
        //     redirect('login');
        // }
    }

    private function validate($data)
    {
        if (!isset($data['no_rm']) || !isset($data['tgl_masuk']) || !isset($data['tgl_keluar']))
        {
            return ['error_code'=>400, 'error_desc'=>'inputan tidak lengkap', 'data'=>''];
        }

        $result = array();
        $result['error_code'] = '0';
        $result['error_desc'] = '';
        $result_data = array();
        
        if (! $data['no_rm'] || $data['no_rm']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Nomor RM tidak boleh kosong!';
        }

        if ($data['kode_golongan']=='6'){
            if (! $data['nosep'] || $data['nosep']=='')
            {
                $result['error_code'] = 201;
                $result['error_desc'] = 'data tidak boleh kosong!';
                $result_data[] = 'Nosep tidak boleh kosong!';
            }

            if (! $data['kode_tindakan'] || $data['kode_tindakan']=='')
            {
                $result['error_code'] = 201;
                $result['error_desc'] = 'data tidak boleh kosong!';
                $result_data[] = 'Tindakan tidak boleh kosong!';
            }

        }

        if (! $data['tgl_masuk'] || $data['tgl_masuk']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Tgl Masuk tidak boleh kosong!';
        }

        if (! $data['tgl_keluar'] || $data['tgl_keluar']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Tgl Keluar tidak boleh kosong!';
        }
        

        $result['data'] = $result_data;

        return $result;
    }

    private function validate_rincian_rajal_unit($data)
    {
        if (!isset($data['no_rm']) || !isset($data['id_rajal']) || !isset($data['tgl_masuk']) || !isset($data['kode_unit']) || !isset($data['tgl_keluar']))
        {
            return ['error_code'=>400, 'error_desc'=>'inputan tidak lengkap', 'data'=>''];
        }

        $result = array();
        $result['error_code'] = '0';
        $result['error_desc'] = '';
        $result_data = array();

        if (! $data['id_rajal'] || $data['id_rajal']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'ID Rajal tidak boleh kosong!';
        }
        
        if (! $data['no_rm'] || $data['no_rm']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Nomor RM tidak boleh kosong!';
        }

        if (! $data['kode_unit'] || $data['kode_unit']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Kode Unit tidak boleh kosong!';
        }

        if (! $data['tgl_masuk'] || $data['tgl_masuk']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Tanggal Masuk tidak boleh kosong!';
        }

        if (! $data['tgl_keluar'] || $data['tgl_keluar']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Tanggal Keluar tidak boleh kosong!';
        }

        $result['data'] = $result_data;

        return $result;
    }

    private function validate_rincian_rajal_dokter($data)
    {
        if (!isset($data['id_rajal']) || !isset($data['no_rm']) || !isset($data['kode_dokter']) || !isset($data['type']))
        {
            return ['error_code'=>400, 'error_desc'=>'inputan tidak lengkap', 'data'=>''];
        }

        $result = array();
        $result['error_code'] = '0';
        $result['error_desc'] = '';
        $result_data = array();
        
        if (! $data['id_rajal'] || $data['id_rajal']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'ID Rajal tidak boleh kosong!';
        }

        if (! $data['no_rm'] || $data['no_rm']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Nomor RM tidak boleh kosong!';
        }

        if (! $data['kode_dokter'] || $data['kode_dokter']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Dokter tidak boleh kosong!';
        }

        if (! $data['type'] || $data['type']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Type tidak boleh kosong!';
        }

        $result['data'] = $result_data;

        return $result;
    }

    private function validate_rincian_rajal_dokter_umum($data)
    {
        if (!isset($data['id_rajal']) || !isset($data['no_rm']) || !isset($data['kode_dokter']) || !isset($data['type']) || !isset($data['kode_unit']) || !isset($data['kode_golongan']))
        {
            return ['error_code'=>400, 'error_desc'=>'inputan tidak lengkap', 'data'=>''];
        }

        $result = array();
        $result['error_code'] = '0';
        $result['error_desc'] = '';
        $result_data = array();
        
        if (! $data['id_rajal'] || $data['id_rajal']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'ID Rajal tidak boleh kosong!';
        }

        if (! $data['no_rm'] || $data['no_rm']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Nomor RM tidak boleh kosong!';
        }

        if (! $data['kode_dokter'] || $data['kode_dokter']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Dokter tidak boleh kosong!';
        }

        if (! $data['type'] || $data['type']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Type tidak boleh kosong!';
        }

        if (! $data['kode_unit'] || $data['kode_unit']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Kode Unit tidak boleh kosong!';
        }

        if (! $data['kode_golongan'] || $data['kode_golongan']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Kode Golongan tidak boleh kosong!';
        }

        $result['data'] = $result_data;

        return $result;
    }

    private function validate_proses_jasa_dokter($data)
    {
        if (!isset($data['id']) || !isset($data['id_rajal']) || !isset($data['kode_dokter']) || !isset($data['id_type']) || !isset($data['jasa_dibagi']) || !isset($data['jasa_diterima']))
        {
            return ['error_code'=>400, 'error_desc'=>'inputan tidak lengkap', 'data'=>''];
        }

        $result = array();
        $result['error_code'] = '0';
        $result['error_desc'] = '';
        $result_data = array();

        // array_filter($_POST['product_price'])
        
        if (! $data['id'] || $data['id']=='' || count(array_filter($data['id']))==0)
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'ID Rajal Dokter tidak boleh kosong!';
        }

        if (! $data['id_rajal'] || $data['id_rajal']=='' || count(array_filter($data['id_rajal']))==0)
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'ID Rajal tidak boleh kosong!';
        }

        if (! $data['kode_dokter'] || $data['kode_dokter']=='' || count(array_filter($data['kode_dokter']))==0)
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Kode Dokter tidak boleh kosong!';
        }

        if (! $data['id_type'] || $data['id_type']=='' || count(array_filter($data['id_type']))==0)
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Id Type tidak boleh kosong!';
        }

        if (! $data['jasa_dibagi'] || $data['jasa_dibagi']=='' || count(array_filter($data['jasa_dibagi']))==0)
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'jasa dibagi tidak boleh kosong!';
            $result_data[] = 'jasa dibagi tidak boleh kosong!';
        }

        if (! $data['jasa_diterima'] || $data['jasa_diterima']=='' || count(array_filter($data['jasa_diterima']))==0)
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'jasa diterima tidak boleh kosong!';
            $result_data[] = 'jasa diterima tidak boleh kosong!';
        }

        $result['data'] = $result_data;

        return $result;
    }

    public function get_pasien()
    {
        $this->load->model("Jasamedikrefmdl");
        $result = $this->Jasamedikrefmdl->get_pasien();

        echo json_encode($result);
    }

    public function get_golongan()
    {
        $this->load->model("Jasamedikrefmdl");
        $result = $this->Jasamedikrefmdl->get_golongan();

        echo json_encode($result);
    }

    public function get_unit()
    {
        $this->load->model("Jasamedikrefmdl");
        $result = $this->Jasamedikrefmdl->get_unit(['POLI','PENUNJANG']);

        echo json_encode($result);
    }

    public function get_tindakan()
    {
        $this->load->model("Jasamedikrefmdl");
        $result = $this->Jasamedikrefmdl->get_tindakan('RAJAL');

        echo json_encode($result);
    }

    public function get_dokter()
    {
        $this->load->model("Jasamedikrefmdl");
        $result = $this->Jasamedikrefmdl->get_dokter();

        echo json_encode($result);
    }

    public function get_tipe_pemeriksaan()
    {
        $this->load->model("Jasamedikrefmdl");
        $result = $this->Jasamedikrefmdl->get_tipe_pemeriksaan('RAJAL');

        echo json_encode($result);
    }

    public function get()
    {
        $golongan = ($this->input->post('kode_golongan')) ? $this->input->post('kode_golongan') : false; 

        if (! $golongan)
        {
            echo 'golongan wajib diisi!';
            exit;
        }

        if (!$this->input->post('tgl_masuk') && !$this->input->post('tgl_keluar'))
        {
            echo 'periode tanggal wajib diisi!';
            exit;
        }

        $whr = array();
        $src = '';
        if ($this->input->post('no_rm'))
            $whr[] = "ps.no_rm like '%".$this->input->post('no_rm')."%'";
        if ($this->input->post('nama_pasien'))
            $src = " AND (ps.nama_pasien like '%".$this->input->post('nama_pasien')."%')";

        if ($this->input->post('kode_unit'))
            $whr[] = "js.kode_unit= '".$this->input->post('kode_unit')."'";
        if ($this->input->post('tgl_masuk') && $this->input->post('tgl_keluar')) {
            $whr[] = "(js.tgl_keluar BETWEEN '".date('Y-m-d',strtotime($this->input->post('tgl_masuk')))."' AND '".date('Y-m-d',strtotime($this->input->post('tgl_keluar')))."')";
		} else {
			$whr[] = "(js.tgl_keluar BETWEEN '".date('Y-m-01')."' AND '".date('Y-m-d')."')";
		}

        $this->load->model("Jasamedikrawatjalanmdl");

        if ($golongan=='6' || $golongan=='BPJS')
        {
            $whr[] = "js.kode_golongan='".$golongan."'";

            $strwhr = ($whr) ? "WHERE " . implode(' AND ', $whr) : "";

			$strwhr = $strwhr . $src;
            
            $result = $this->Jasamedikrawatjalanmdl->get_bpjs($strwhr);
        } else {
            $whr[] = "js.kode_golongan!='6'";
            $strwhr = ($whr) ? "WHERE (" . implode(' AND ', $whr)  . ")" : "";

			$strwhr = $strwhr . $src;
			
            $result = $this->Jasamedikrawatjalanmdl->get_non_bpjs($strwhr);
        }
        
        echo json_encode($result);
    }

    public function get_rincian_rajal()
    {
        $golongan = ($this->input->post('kode_golongan')) ? $this->input->post('kode_golongan') : false; 

        if (! $this->input->post('id_rajal'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'id rajal tidak ditemukan','data'=>'']);
            exit;
        }

        if (! $this->input->post('key'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'kata kunci tidak ditemukan','data'=>'']);
            exit;
        }

        $key = $this->input->post('key');

        $this->load->model("Jasamedikrawatjalanmdl");

        // ambil kode golongan berdasarkan id_rajal
        // $kode_golongan = $this->Jasamedikrawatjalanmdl->get_golongan_by_rajal($this->input->post('id_rajal'));
        // if ($kode_golongan=='6') {
        //     $table = 'jasa_rajal_dokter';
        // } else {
        //     $table = 'jasa_rajal_dokter_umum';
        // }

        $result = [];

        if ($key=='all' || $key=='')
            $result = $this->Jasamedikrawatjalanmdl->get_rincian_all();

        if ($key=='unit')
            $result = $this->Jasamedikrawatjalanmdl->get_rincian_unit();

        if ($key=='dokter')
            $result = $this->Jasamedikrawatjalanmdl->get_rincian_dokter();

        echo json_encode($result);
    }

    public function store()
    {
        // if(! $this->input->is_ajax_request()) {
        //     echo "something's wrong! code : 3";
        //     exit;
        // }

        if(! $this->input->post()) {
            echo "form tidak boleh kosong";
            exit;
        }

        $validate = $this->validate($this->input->post());
        
        if ($validate['error_code']!='0')
        {
            echo json_encode($validate);
            exit;
        }
        
        $this->load->model("Jasamedikrawatjalanmdl");
        $save = $this->Jasamedikrawatjalanmdl->store();
        
        if ($save)
        {
            $result = ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil menyimpan!'];
        } else {
            $result = ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal menyimpan!'];
        }

        echo json_encode($result);
    }

    public function store_rincian_rajal_unit()
    {
        if(! $this->input->post()) 
        {
            echo "form tidak boleh kosong";
            exit;
        }

        $validate = $this->validate_rincian_rajal_unit($this->input->post());
        
        if ($validate['error_code']!='0')
        {
            echo json_encode($validate);
            exit;
        }
        
        $this->load->model("Jasamedikrawatjalanmdl");
        $save = $this->Jasamedikrawatjalanmdl->store_rincian_rajal_unit($this->input->post());
        
        if ($save)
        {
            $result = ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil menyimpan!'];
        } else {
            $result = ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal menyimpan!'];
        }

        echo json_encode($result);
    }

    public function store_rincian_rajal_dokter()
    {
        $golongan = ($this->input->post('kode_golongan')) ? $this->input->post('kode_golongan') : false; 

        if(! $this->input->post()) 
        {
            echo "form tidak boleh kosong";
            exit;
        }
        if ($golongan=='6' || $golongan=='BPJS')
        {
            $validate = $this->validate_rincian_rajal_dokter($this->input->post());
        } else {
            $validate = $this->validate_rincian_rajal_dokter_umum($this->input->post());
        }

        if ($validate['error_code']!='0')
        {
            echo json_encode($validate);
            exit;
        }
        
        $this->load->model("Jasamedikrawatjalanmdl");

        if ($golongan=='6' || $golongan=='BPJS')
        {
            $save = $this->Jasamedikrawatjalanmdl->store_rincian_rajal_dokter_bpjs($this->input->post());
        } else {
            $save = $this->Jasamedikrawatjalanmdl->store_rincian_rajal_dokter_non_bpjs($this->input->post());
        }
        
        if ($save)
        {
            $result = ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil menyimpan!'];
        } else {
            $result = ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal menyimpan!'];
        }

        echo json_encode($result);
    }

    public function edit()
    {
        if (! $this->input->post('id'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'id tidak ditemukan','data'=>'']);
            exit;
        }

        $this->load->model("Jasamedikrawatjalanmdl");
        $result = $this->Jasamedikrawatjalanmdl->edit();
        echo json_encode($result);
    }

    public function edit_rincian_rajal_unit()
    {
        if (! $this->input->post('id'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'id tidak ditemukan','data'=>'']);
            exit;
        }

        $this->load->model("Jasamedikrawatjalanmdl");
        $result = $this->Jasamedikrawatjalanmdl->edit_rincian_rajal_unit();
        echo json_encode($result);
    }

    public function edit_rincian_rajal_dokter()
    {
        if (! $this->input->post('id'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'id tidak ditemukan','data'=>'']);
            exit;
        }

        $this->load->model("Jasamedikrawatjalanmdl");
        $result = $this->Jasamedikrawatjalanmdl->edit_rincian_rajal_dokter();
        echo json_encode($result);
    }

    public function update()
    {
        if(! $this->input->post()) {
            echo "form tidak boleh kosong";
            exit;
        }

        if (! $this->input->post('id'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'id tidak ditemukan','data'=>'']);
            exit;
        }

        $validate = $this->validate($this->input->post());
        
        if ($validate['error_code']!='0')
        {
            echo json_encode($validate);
            exit;
        }
        
        $this->load->model("Jasamedikrawatjalanmdl");
        $save = $this->Jasamedikrawatjalanmdl->update();
        
        if ($save)
        {
            $result = ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil mengubah!'];
        } else {
            $result = ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal mengubah!'];
        }
        echo json_encode($result);
    }

    public function update_rincian_rajal_unit()
    {
        if(! $this->input->post()) {
            echo "form tidak boleh kosong";
            exit;
        }

        if (! $this->input->post('id'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'id tidak ditemukan','data'=>'']);
            exit;
        }

        $validate = $this->validate_rincian_rajal_unit($this->input->post());
        
        if ($validate['error_code']!='0')
        {
            echo json_encode($validate);
            exit;
        }
        
        $this->load->model("Jasamedikrawatjalanmdl");
        $save = $this->Jasamedikrawatjalanmdl->update_rincian_rajal_unit();
        
        if ($save)
        {
            $result = ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil mengubah!'];
        } else {
            $result = ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal mengubah!'];
        }
        echo json_encode($result);
    }

    public function update_rincian_rajal_dokter()
    {
        if(! $this->input->post()) {
            echo "form tidak boleh kosong";
            exit;
        }

        if (! $this->input->post('id'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'id tidak ditemukan','data'=>'']);
            exit;
        }

        $validate = $this->validate_rincian_rajal_dokter($this->input->post());
        
        if ($validate['error_code']!='0')
        {
            echo json_encode($validate);
            exit;
        }
        
        $this->load->model("Jasamedikrawatjalanmdl");
        $save = $this->Jasamedikrawatjalanmdl->update_rincian_rajal_dokter();
        
        if ($save)
        {
            $result = ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil mengubah!'];
        } else {
            $result = ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal mengubah!'];
        }
        echo json_encode($result);
    }

    public function delete()
    {
        if (! $this->input->post('id'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'id tidak ditemukan','data'=>'']);
            exit;
        }

        $this->load->model("Jasamedikrawatjalanmdl");
        $delete = $this->Jasamedikrawatjalanmdl->delete();
        if ($delete)
        {
            $result = ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil menghapus!'];
        } else {
            $result = ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal menghapus!'];
        }
        echo json_encode($result);
    }

    public function delete_rincian_rajal_unit()
    {
        if (! $this->input->post('id'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'id tidak ditemukan','data'=>'']);
            exit;
        }

        $this->load->model("Jasamedikrawatjalanmdl");
        $delete = $this->Jasamedikrawatjalanmdl->delete_rincian_rajal_unit();
        if ($delete)
        {
            $result = ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil menghapus!'];
        } else {
            $result = ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal menghapus!'];
        }
        echo json_encode($result);
    }

    public function delete_rincian_rajal_dokter()
    {
        if (! $this->input->post('id'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'id tidak ditemukan','data'=>'']);
            exit;
        }

        $this->load->model("Jasamedikrawatjalanmdl");
        $delete = $this->Jasamedikrawatjalanmdl->delete_rincian_rajal_dokter();
        if ($delete)
        {
            $result = ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil menghapus!'];
        } else {
            $result = ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal menghapus!'];
        }
        echo json_encode($result);
    }

    public function proses_jasa_dokter()
    {
        if(! $this->input->post()) {
            echo "form tidak boleh kosong";
            exit;
        }

        // var_dump($this->input->post());
        // exit;
        $validate = $this->validate_proses_jasa_dokter($this->input->post());
        
        if ($validate['error_code']!='0')
        {
            echo json_encode($validate);
            exit;
        }

        $this->load->model("Jasamedikrawatjalanmdl");
        $save = $this->Jasamedikrawatjalanmdl->store_proses_jasa_dokter($this->input->post());

        echo json_encode($save);
        exit;
        
        if ($save)
        {
            $result = ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil menyimpan!'];
        } else {
            $result = ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal menyimpan!'];
        }

        echo json_encode($result);
    }

    public function upload_fpk()
    {
        if (! isset($_FILES['format_fpk']))
        {
            echo "file tidak boleh kosong";
            exit;
        }

        if (! isset($_REQUEST['bulan']))
        {
            echo "bulan tidak boleh kosong";
            exit;
        }

        if (! isset($_REQUEST['tahun']))
        {
            echo "tahun tidak boleh kosong";
            exit;
        }


        $bulan = $_REQUEST['bulan'];
        $tahun = $_REQUEST['tahun'];

        $ext = pathinfo($_FILES['format_fpk']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
        $tmp_file = $_FILES['format_fpk']['tmp_name'];

        if ('csv' == $ext) {
            $reader 	= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } elseif('xlsx' == $ext) {
            $reader 	= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        } else {

        }

        $spreadsheet 	= $reader->load($tmp_file);
		$sheet_data 	= $spreadsheet->getActiveSheet()->toArray();

        $this->load->model("Jasamedikrawatjalanmdl");
        $data_excel = $this->Jasamedikrawatjalanmdl->render_file($sheet_data);
        
        $data_rajal = $this->Jasamedikrawatjalanmdl->proses_data_sep($bulan,$tahun,$data_excel);
        

        echo json_encode($data_rajal);
    }

    public function rekap_jasa_rajal()
    {
		$whr = array();
		$src = '';
        if ($this->input->post('no_rm'))
            $whr[] = "ps.no_rm LIKE '%".$this->input->post('no_rm')."%'";
        
		if ($this->input->post('nama_pasien'))
            $src = " AND (ps.nama_pasien LIKE '%".$this->input->post('nama_pasien')."%')";

        if ($this->input->post('jasa_pelayanan'))
            $whr[] = "js.kode_golongan = '".$this->input->post('jasa_pelayanan')."'";
        if ($this->input->post('kode_unit'))
            $whr[] = "js.kode_unit= '".$this->input->post('kode_unit')."'";
        if ($this->input->post('tgl_masuk') && $this->input->post('tgl_keluar')) {
			$whr[] = "js.tgl_keluar BETWEEN '".date('Y-m-d',strtotime($this->input->post('tgl_masuk')))."' AND '".date('Y-m-d',strtotime($this->input->post('tgl_keluar')))."'";
		} else {
			$whr[] = "js.tgl_keluar BETWEEN '".date('Y-m-01')."' AND '".date('Y-m-d')."'";
		}

        $strwhr = ($whr) ? "WHERE " . implode(' AND ', $whr)  . "" : "";

		$strwhr = $strwhr . $src;

		// var_dump($strwhr);
		// exit;

        $this->load->model("Jasamedikrawatjalanmdl");
        $result = $this->Jasamedikrawatjalanmdl->get_rekap_rajal($strwhr);

        echo json_encode($result);
    }

	public function rekap_jasa_rajal_dokter()
    {
        $this->load->model("Jasamedikrawatjalanmdl");
        $result = $this->Jasamedikrawatjalanmdl->get_rekap_jasa_dokter();

        echo json_encode($result);
    }
}
