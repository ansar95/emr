<?php
/*
    aplication: simrs
    owner: dedy jamal
    Author_page: haris
    created_at: 04-08-2022
*/

defined('BASEPATH') or exit('No direct script access allowed');
class Jasamedikrawatinap extends CI_Controller
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
        if (!isset($data['no_rm']) || !isset($data['nosep']) || !isset($data['tgl_masuk']) || !isset($data['kode_tindakan']))
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

        if (! $data['nosep'] || $data['nosep']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'Nosep tidak boleh kosong!';
        }

        if (! $data['tgl_masuk'] || $data['tgl_masuk']=='')
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

        $result['data'] = $result_data;

        return $result;
    }

    private function validate_rincian_ranap_unit($data)
    {
        if (!isset($data['no_rm']) || !isset($data['id_ranap']) || !isset($data['tgl_masuk']) || !isset($data['kode_unit']) || !isset($data['tgl_keluar']))
        {
            return ['error_code'=>400, 'error_desc'=>'inputan tidak lengkap', 'data'=>''];
        }

        $result = array();
        $result['error_code'] = '0';
        $result['error_desc'] = '';
        $result_data = array();

        if (! $data['id_ranap'] || $data['id_ranap']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'ID Ranap tidak boleh kosong!';
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

    private function validate_rincian_ranap_dokter($data)
    {
        if (!isset($data['id_ranap']) || !isset($data['no_rm']) || !isset($data['kode_dokter']) || !isset($data['type']))
        {
            return ['error_code'=>400, 'error_desc'=>'inputan tidak lengkap', 'data'=>''];
        }

        $result = array();
        $result['error_code'] = '0';
        $result['error_desc'] = '';
        $result_data = array();
        
        if (! $data['id_ranap'] || $data['id_ranap']=='')
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'ID Ranap tidak boleh kosong!';
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

    private function validate_proses_jasa_dokter($data)
    {
        if (!isset($data['id']) || !isset($data['id_ranap']) || !isset($data['kode_dokter']) || !isset($data['id_type']) || !isset($data['jasa_dibagi']) || !isset($data['jasa_diterima']))
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
            $result_data[] = 'ID Ranap Dokter tidak boleh kosong!';
        }

        if (! $data['id_ranap'] || $data['id_ranap']=='' || count(array_filter($data['id_ranap']))==0)
        {
            $result['error_code'] = 201;
            $result['error_desc'] = 'data tidak boleh kosong!';
            $result_data[] = 'ID Ranap tidak boleh kosong!';
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
        $result = $this->Jasamedikrefmdl->get_unit('RUANGAN');

        echo json_encode($result);
    }

    public function get_tindakan()
    {
        $this->load->model("Jasamedikrefmdl");
        $result = $this->Jasamedikrefmdl->get_tindakan('RANAP');

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
        $result = $this->Jasamedikrefmdl->get_tipe_pemeriksaan('RANAP');

        echo json_encode($result);
    }

    public function tes_array()
    {
        $tes = 
        [
            1 => 29,
            2 => 29,
            3 => 14,
            4 => 4,
            5 => 10,
            6 => 7,
            7 => 0,
            8 => 7,
            9 => 0,

            // [] => [
            //     'id_jenis_tindakan' => 1,
            //     'persen' => 29
            // ],
            // [] => [
            //     'id_jenis_tindakan' => 2,
            //     'persen' => 29
            // ],
            // [] => [
            //     'id_jenis_tindakan' => 4,
            //     'persen' => 4
            // ],
            // [] => [
            //     'id_jenis_tindakan' => 5,
            //     'persen' => 10
            // ],
            // [] => [
            //     'id_jenis_tindakan' => 3,
            //     'persen' => 14
            // ],
            // [] => [
            //     'id_jenis_tindakan' => 9,
            //     'persen' => 0
            // ],
            // [] => [
            //     'id_jenis_tindakan' => 6,
            //     'persen' => 7
            // ],
            // [] => [
            //     'id_jenis_tindakan' => 7,
            //     'persen' => 0
            // ],
            // [] => [
            //     'id_jenis_tindakan' => 8,
            //     'persen' => 7
            // ]
        ];

        // $tes = [
        //     'A' => [
        //         'deskripsi' => 'DOKTER NON BEDAH',
        //         'pelayanan' => 25,
        //         'bagian' => [
        //             'direct' => 75,
        //             'indirect' => 20,
        //             'reward' => 5
        //         ]
        //     ],
        //     'B' => [
        //         'deskripsi' => 'DOKTER BEDAH',
        //         'pelayanan' => 25,
        //         'bagian' => [
        //             'direct' => 75,
        //             'indirect' => 20,
        //             'reward' => 5
        //         ]
        //     ],
        //     'C' => [
        //         'deskripsi' => 'PERAWAT dan MANAJEMEN',
        //         'pelayanan' => 10
        //     ]
        // ];


        

        echo json_encode($tes);
    }

    public function get()
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
			// $whr[] = "MONTH(js.tgl_keluar)='".date('m', strtotime($this->input->post('tgl_keluar')))."'" ;
		} else {
			$whr[] = "js.tgl_keluar BETWEEN '".date('Y-m-01')."' AND '".date('Y-m-d')."'";
		}

        $strwhr = ($whr) ? "WHERE " . implode(' AND ', $whr)  . "" : "";

		$strwhr = $strwhr . $src;

		// var_dump($strwhr);
		// exit;

        $this->load->model("Jasamedikrawatinapmdl");
        $result = $this->Jasamedikrawatinapmdl->get($strwhr);

        echo json_encode($result);
    }

    public function get_rincian_ranap()
    {
        if (! $this->input->post('id_ranap'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'id ranap tidak ditemukan','data'=>'']);
            exit;
        }

        if (! $this->input->post('key'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'kata kunci tidak ditemukan','data'=>'']);
            exit;
        }

        $key = $this->input->post('key');

        $this->load->model("Jasamedikrawatinapmdl");

        $result = [];

        if ($key=='all' || $key=='')
            $result = $this->Jasamedikrawatinapmdl->get_rincian_all();

        if ($key=='unit')
            $result = $this->Jasamedikrawatinapmdl->get_rincian_unit();

        if ($key=='dokter')
            $result = $this->Jasamedikrawatinapmdl->get_rincian_dokter();


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
        
        $this->load->model("Jasamedikrawatinapmdl");
        $save = $this->Jasamedikrawatinapmdl->store();
        
        if ($save)
        {
            $result = ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil menyimpan!'];
        } else {
            $result = ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal menyimpan!'];
        }

        echo json_encode($result);
    }

    public function store_rincian_ranap_unit()
    {
        if(! $this->input->post()) 
        {
            echo "form tidak boleh kosong";
            exit;
        }

        $validate = $this->validate_rincian_ranap_unit($this->input->post());
        
        if ($validate['error_code']!='0')
        {
            echo json_encode($validate);
            exit;
        }
        
        $this->load->model("Jasamedikrawatinapmdl");
        $save = $this->Jasamedikrawatinapmdl->store_rincian_ranap_unit($this->input->post());
        
        if ($save)
        {
            $result = ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil menyimpan!'];
        } else {
            $result = ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal menyimpan!'];
        }

        echo json_encode($result);
    }

    public function store_rincian_ranap_dokter()
    {
        if(! $this->input->post()) 
        {
            echo "form tidak boleh kosong";
            exit;
        }

        $validate = $this->validate_rincian_ranap_dokter($this->input->post());
        
        if ($validate['error_code']!='0')
        {
            echo json_encode($validate);
            exit;
        }
        
        $this->load->model("Jasamedikrawatinapmdl");
        $save = $this->Jasamedikrawatinapmdl->store_rincian_ranap_dokter($this->input->post());
        
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

        $this->load->model("Jasamedikrawatinapmdl");
        $result = $this->Jasamedikrawatinapmdl->edit();
        echo json_encode($result);
    }

    public function edit_rincian_ranap_unit()
    {
        if (! $this->input->post('id'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'id tidak ditemukan','data'=>'']);
            exit;
        }

        $this->load->model("Jasamedikrawatinapmdl");
        $result = $this->Jasamedikrawatinapmdl->edit_rincian_ranap_unit();
        echo json_encode($result);
    }

    public function edit_rincian_ranap_dokter()
    {
        if (! $this->input->post('id'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'id tidak ditemukan','data'=>'']);
            exit;
        }

        $this->load->model("Jasamedikrawatinapmdl");
        $result = $this->Jasamedikrawatinapmdl->edit_rincian_ranap_dokter();
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
        
        $this->load->model("Jasamedikrawatinapmdl");
        $save = $this->Jasamedikrawatinapmdl->update();
        
        if ($save)
        {
            $result = ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil mengubah!'];
        } else {
            $result = ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal mengubah!'];
        }
        echo json_encode($result);
    }

    public function update_rincian_ranap_unit()
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

        $validate = $this->validate_rincian_ranap_unit($this->input->post());
        
        if ($validate['error_code']!='0')
        {
            echo json_encode($validate);
            exit;
        }
        
        $this->load->model("Jasamedikrawatinapmdl");
        $save = $this->Jasamedikrawatinapmdl->update_rincian_ranap_unit();
        
        if ($save)
        {
            $result = ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil mengubah!'];
        } else {
            $result = ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal mengubah!'];
        }
        echo json_encode($result);
    }

    public function update_rincian_ranap_dokter()
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

        $validate = $this->validate_rincian_ranap_dokter($this->input->post());
        
        if ($validate['error_code']!='0')
        {
            echo json_encode($validate);
            exit;
        }
        
        $this->load->model("Jasamedikrawatinapmdl");
        $save = $this->Jasamedikrawatinapmdl->update_rincian_ranap_dokter();
        
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

        $this->load->model("Jasamedikrawatinapmdl");
        $delete = $this->Jasamedikrawatinapmdl->delete();
        if ($delete)
        {
            $result = ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil menghapus!'];
        } else {
            $result = ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal menghapus!'];
        }
        echo json_encode($result);
    }

    public function delete_rincian_ranap_unit()
    {
        if (! $this->input->post('id'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'id tidak ditemukan','data'=>'']);
            exit;
        }

        $this->load->model("Jasamedikrawatinapmdl");
        $delete = $this->Jasamedikrawatinapmdl->delete_rincian_ranap_unit();
        if ($delete)
        {
            $result = ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil menghapus!'];
        } else {
            $result = ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal menghapus!'];
        }
        echo json_encode($result);
    }

    public function delete_rincian_ranap_dokter()
    {
        if (! $this->input->post('id'))
        {
            echo json_encode(['error_code'=>201, 'error_desc'=>'id tidak ditemukan','data'=>'']);
            exit;
        }

        $this->load->model("Jasamedikrawatinapmdl");
        $delete = $this->Jasamedikrawatinapmdl->delete_rincian_ranap_dokter();
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

        $this->load->model("Jasamedikrawatinapmdl");
        $save = $this->Jasamedikrawatinapmdl->store_proses_jasa_dokter($this->input->post());

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

    public function rekap_jasa_ranap()
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

        $this->load->model("Jasamedikrawatinapmdl");
        $result = $this->Jasamedikrawatinapmdl->get_rekap_ranap($strwhr);

        echo json_encode($result);
    }

    public function rekap_jasa_ranap_dokter()
    {
        $this->load->model("Jasamedikrawatinapmdl");
        $result = $this->Jasamedikrawatinapmdl->get_rekap_jasa_dokter();

        echo json_encode($result);
    }

}
