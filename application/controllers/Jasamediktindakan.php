<?php
/*
    aplication: simrs
    owner: dedy jamal
    Author_page: haris
    created_at: 04-08-2022
*/

defined('BASEPATH') or exit('No direct script access allowed');
class Jasamediktindakan extends CI_Controller
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
        echo 'no-access';
    }

    private function validate($data)
    {
        if (!isset($data['kode_referensi_tindakan']) || !isset($data['jenis']) || !isset($data['listdpjp']))
        {
            return ['error_code'=>400, 'error_desc'=>'inputan tidak lengkap', 'data'=>''];
        }

        $result = array();
        $result['error_code'] = '0';
        $result['error_desc'] = '';
        $result_data = array();
        
        if (! $data['kode_referensi_tindakan'] || $data['kode_referensi_tindakan']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Kode Referensi tidak boleh kosong!';
        }

        if (! $data['jenis'] || $data['jenis']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Jenis Kode Tindakan tidak boleh kosong!';
        }

        if (! $data['listdpjp'] || $data['listdpjp']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Dpjp Tindakan tidak boleh kosong!';
        }

        $result['data'] = $result_data;

        return $result;
    }

    public function get()
    {
        // if (! $this->input->post('jenis_tindakan'))
        // {
        //     echo json_encode(['error_code'=>201, 'error_desc'=>'jenis tindakan tidak ditemukan','data'=>'']);
        //     exit;
        // }

        $this->load->model("Jasamedikrefmdl");
        $result = $this->Jasamedikrefmdl->get_tindakan_ref();
        echo json_encode($result);
    }

    public function create()
    {
        if (! $this->input->post('jenis_rawat'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'Jenis Rawat tidak ditemukan','data'=>'']);
            exit;
        }

        $this->load->model("Jasamedikrefmdl");
    
        $data = array();
        // $data['jenis'] = $this->Jasamedikrefmdl->get_tindakan($this->input->post('jenis_rawat'));
		$data['jenis'] = $this->Jasamedikrefmdl->get_tindakan_master($this->input->post('jenis_rawat'));
        $data['list_dpjp'] = $this->Jasamedikrefmdl->get_tipe_pemeriksaan($this->input->post('jenis_rawat'));

        echo json_encode($data);
    }

	public function get_jenis_tindakan()
	{
		if(! $this->input->post('jenis_rawat')) {
            echo "jenis rawat boleh kosong";
            exit;
        }

        $this->load->model("Jasamedikrefmdl");

		$data['list_dpjp'] = $this->Jasamedikrefmdl->get_tipe_pemeriksaan($this->input->post('jenis_rawat'));

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

        $this->load->model("Jasamedikrefmdl");
        $save = $this->Jasamedikrefmdl->store_referensi_tindakan($this->input->post());
        
        echo json_encode($save);
    }

    public function edit()
    {
        if (! $this->input->post('id'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'id tidak ditemukan','data'=>'']);
            exit;
        }

        if (! $this->input->post('jenis_rawat'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'Jenis Rawat tidak ditemukan','data'=>'']);
            exit;
        }

        // var_dump($this->input->post());
        // exit;

		$arr_jenis_rawat = [
			'BD' => 'RANAP',
			'NB' => 'RANAP',
			'RJ' => 'RAJAL'
		];

		$jenis_rawat = $arr_jenis_rawat[$this->input->post('jenis_rawat')];

        $this->load->model("Jasamedikrefmdl");
    
        $data = array();
        $data['jenis'] = $this->Jasamedikrefmdl->get_tindakan_master($jenis_rawat);
        $data['list_dpjp'] = $this->Jasamedikrefmdl->get_tipe_pemeriksaan($jenis_rawat);

        $data['data'] = $this->Jasamedikrefmdl->get_tindakan_ref($this->input->post('id'));

        echo json_encode($data);
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

        $this->load->model("Jasamedikrefmdl");
        $save = $this->Jasamedikrefmdl->update_referensi_tindakan($this->input->post());
        
        echo json_encode($save);

    }

    public function delete()
    {
        if (! $this->input->post('id'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'id tidak ditemukan','data'=>'']);
            exit;
        }

        $this->load->model("Jasamedikrefmdl");
        $delete = $this->Jasamedikrefmdl->delete_referensi_tindakan($this->input->post());
        
        echo json_encode($delete);
    }
}
