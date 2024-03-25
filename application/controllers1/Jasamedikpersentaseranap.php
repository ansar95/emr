<?php
/*
    aplication: simrs
    owner: dedy jamal
    Author_page: haris
    created_at: 04-08-2022
*/

defined('BASEPATH') or exit('No direct script access allowed');
class Jasamedikpersentaseranap extends CI_Controller
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
        $this->load->model("Jasamedikpersentaseranapmdl");
        $result = $this->Jasamedikpersentaseranapmdl->get();

        echo json_encode($result);
    }

    public function get_by_id()
    {
        if (! $this->input->post('id')) 
        {
            echo json_encode(['error_code'=>202, 'error_desc'=>'ID tidak boleh kosong!']);
            exit;
        }

        $this->load->model("Jasamedikpersentaseranapmdl");
        $result = $this->Jasamedikpersentaseranapmdl->get_by_id($this->input->post('id'));

        echo json_encode($result);
    }

    public function get_tindakan()
    {
        $this->load->model("Jasamedikrefmdl");
        $result = $this->Jasamedikrefmdl->get_tindakan('RANAP');
        return $result;
    }

    public function create()
    {
        $this->load->model("Jasamedikpersentaseranapmdl");
        $model = $this->Jasamedikpersentaseranapmdl;

        $data = array();

        $qbagian = $model->get_jenis_tindakan();
        $dtbagian = array();
        foreach ($qbagian as $key=>$val)
        {
            $dtbagian[] = [
                'id' => $key,
                'deskripsi' => $val
            ];
        }

        $data['bagian'] = $dtbagian;
        $data['jenis'] = $this->get_tindakan();
        echo json_encode($data);
    }

    public function store()
    {
        if(! $this->input->post()) {
            echo json_encode(['error_code'=>201, 'error_desc'=>'form tidak boleh kosong!']);
            exit;
        }

        $validate = $this->validate($this->input->post());
        
        if ($validate['error_code']!='0')
        {
            echo json_encode($validate);
            exit;
        }

        $this->load->model("Jasamedikpersentaseranapmdl");
        $save = $this->Jasamedikpersentaseranapmdl->store();
        
        if ($save)
        {
            $result = ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil menyimpan!'];
        } else {
            $result = ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal menyimpan!'];
        }

        echo json_encode($save);
    }

    public function edit()
    {
        if (! $this->input->post('id'))
        {
            echo json_encode(['error_code'=>202, 'error_desc'=>'ID tidak boleh kosong!']);
            exit;
        }

        $this->load->model("Jasamedikpersentaseranapmdl");
        $model = $this->Jasamedikpersentaseranapmdl;

        $data = array();

        $qbagian = $model->get_jenis_tindakan();
        $dtbagian = array();
        foreach ($qbagian as $key=>$val)
        {
            $dtbagian[] = [
                'id' => $key,
                'deskripsi' => $val
            ];
        }

        $data['data'] = $model->get_by_id($this->input->post('id'));
        $data['bagian'] = $dtbagian;
        $data['jenis'] = $this->get_tindakan();

        echo json_encode($data);
    }

    public function update()
    {
        if(! $this->input->post()) {
            echo json_encode(['error_code'=>201, 'error_desc'=>'form tidak boleh kosong!']);
            exit;
        }

        if(! $this->input->post('id')) {
            echo json_encode(['error_code'=>201, 'error_desc'=>'id tidak boleh kosong!']);
            exit;
        }

        $validate = $this->validate($this->input->post());
        
        if ($validate['error_code']!='0')
        {
            echo json_encode($validate);
            exit;
        }

        $this->load->model("Jasamedikpersentaseranapmdl");
        $save = $this->Jasamedikpersentaseranapmdl->update();
        
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

        $this->load->model("Jasamedikpersentaseranapmdl");
        $delete = $this->Jasamedikpersentaseranapmdl->delete();
        if ($delete)
        {
            $result = ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil menghapus!'];
        } else {
            $result = ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal menghapus!'];
        }
        echo json_encode($result);
    }

    public function validate($data)
    {
        if (!isset($data['type']) || !isset($data['jenis']) || !isset($data['pendapatan']) || !isset($data['pembagian']) || !isset($data['direct']) || !isset($data['indirect']) || !isset($data['reward']))
        {
            return ['error_code'=>301, 'error_desc'=>'inputan tidak lengkap', 'data'=>''];
        }

        $result = array();
        $result['error_code'] = '0';
        $result['error_desc'] = '';
        $result_data = array();

        if (! $data['type'] || $data['type']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Type tidak boleh kosong!';
        }

        if (! $data['jenis'] || $data['jenis']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Jenis tidak boleh kosong!';
        }

        if ($data['pendapatan']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Pendapatan tidak boleh kosong!';
        }

        if ($data['pembagian']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Pembagian tidak boleh kosong!';
        }

        if ($data['direct']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Direct tidak boleh kosong!';
        }

        if ($data['indirect']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Indirect tidak boleh kosong!';
        }

        if ($data['reward']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Reward tidak boleh kosong!';
        }

        $result['data'] = $result_data;

        return $result;
    }

}