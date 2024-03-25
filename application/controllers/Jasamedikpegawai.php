<?php
/*
    aplication: simrs
    owner: dedy jamal
    Author_page: haris
    created_at: 12-08-2022
*/

defined('BASEPATH') or exit('No direct script access allowed');
class Jasamedikpegawai extends CI_Controller
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
        echo 'no access';
    }

    public function get()
    {
        $whr = array();
        if ($this->input->post('nama_pegawai'))
            $whr[] = "nama LIKE '%".$this->input->post('nama_pegawai')."%'";

        $strwhr = ($whr) ? "WHERE (" . implode(' OR ', $whr)  . ")" : "";

        $this->load->model("Jasamedikpegawaimdl");
        $result = $this->Jasamedikpegawaimdl->get($strwhr);

        echo json_encode($result);
    }

    public function get_referensi()
    {
        $id = $this->input->post('aplikasi');
        $this->load->model("Jasamedikrefmdl");
        $data['referensi'] = $this->Jasamedikrefmdl->get_referensi_pegawai($id);
        echo json_encode($data);
    }

    public function get_posisi()
    {
        $this->load->model("Jasamedikrefmdl");
        $result = $this->Jasamedikrefmdl->get_kategori();

        echo json_encode($result);
    }

    public function get_unit()
    {
        $this->load->model("Jasamedikrefmdl");
        $result = $this->Jasamedikrefmdl->get_unit();

        echo json_encode($result);
    }
    public function get_pendidikan()
    {
        $this->load->model("Jasamedikrefmdl");
        $result = $this->Jasamedikrefmdl->get_pendidikan();

        echo json_encode($result);
    }

    public function create()
    {
        $this->load->model("Jasamedikrefmdl");
        
        $data['unit'] = $this->Jasamedikrefmdl->get_unit();
        $data['posisi'] = $this->Jasamedikrefmdl->get_kategori();
        $data['gol'] = $this->Jasamedikrefmdl->get_referensi_pegawai(1);
        $data['pangkat'] = $this->Jasamedikrefmdl->get_referensi_pegawai(2);
        $data['jabatan'] = $this->Jasamedikrefmdl->get_referensi_pegawai(3);
        $data['pendidikan'] = $this->Jasamedikrefmdl->get_pendidikan();

        echo json_encode($data);
    }

    public function store()
    {
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
        
        $this->load->model("Jasamedikpegawaimdl");
        $save = $this->Jasamedikpegawaimdl->store();
        
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

        $this->load->model("Jasamedikpegawaimdl");
        $result = $this->Jasamedikpegawaimdl->edit();
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

        $this->load->model("Jasamedikpegawaimdl");
        $save = $this->Jasamedikpegawaimdl->update();
        
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

        $this->load->model("Jasamedikpegawaimdl");
        $delete = $this->Jasamedikpegawaimdl->delete();
        if ($delete)
        {
            $result = ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil menghapus!'];
        } else {
            $result = ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal menghapus!'];
        }
        echo json_encode($result);
    }

    private function validate($data)
    {
        if (!isset($data['nip']) || !isset($data['nama_pegawai']) || !isset($data['tmt']) || !isset($data['gol']) || !isset($data['posisi']) || !isset($data['pangkat']) || !isset($data['kode_unit']) || !isset($data['jabatan']) || !isset($data['sex']) || !isset($data['pendidikan']))
        {
            return ['error_code'=>400, 'error_desc'=>'inputan tidak lengkap', 'data'=>''];
        }

        $result = array();
        $result['error_code'] = '0';
        $result['error_desc'] = '';
        $result_data = array();

        if (! $data['nip'] || $data['nip']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Nip tidak boleh kosong!';
        }

        if (! $data['nama_pegawai'] || $data['nama_pegawai']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Nama pegawai tidak boleh kosong!';
        }

        if (! $data['tmt'] || $data['tmt']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'TMT tidak boleh kosong!';
        }

        if (! $data['gol'] || $data['gol']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Golongan pegawai tidak boleh kosong!';
        }

        if (! $data['posisi'] || $data['posisi']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Posisi pegawai tidak boleh kosong!';
        }

        if (! $data['pangkat'] || $data['pangkat']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Pangkat pegawai tidak boleh kosong!';
        }

        if (! $data['kode_unit'] || $data['kode_unit']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Unit pegawai tidak boleh kosong!';
        }

        if (! $data['jabatan'] || $data['jabatan']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Jabatan pegawai tidak boleh kosong!';
        }

        if (! $data['sex'] || $data['sex']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Jenis Kelamin tidak boleh kosong!';
        }

        if (! $data['pendidikan'] || $data['pendidikan']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Pendidikan pegawai tidak boleh kosong!';
        }

        $result['data'] = $result_data;

        return $result;
    }

}