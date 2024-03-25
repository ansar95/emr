<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eklaim extends CI_Controller{
    protected $EKLAIM_URL = "";
	protected $EKLAIM_KEY = "";
	protected $KELAS_RS = '';//DS
    public function __construct() {

        $this->EKLAIM_URL = getenv('V_URL');
        $this->EKLAIM_KEY = getenv('V_KEY');
        $this->KELAS_RS = getenv('V_KELAS_RS');
        if (!$this->EKLAIM_URL) {
            echo "Url eklaim belum ada";die;
        }

        if (!$this->EKLAIM_KEY) {
            echo "Key eklaim belum ada";die;
        }

        if (!$this->KELAS_RS) {
            echo "Kelas Rumah Sakit eklaim belum ada";die;
        }

        parent::__construct();
        // if ($this->session->userdata("login") != TRUE) {
        //     redirect("login");
        // }
    }

    public function index()
    {
        $data['include'] = "layanan/pelayanan/eklaim/show";
        $data['js'] = "pelayanan/eklaim/index";
        $data['css'] = "pelayanan/eklaim/index";
        $data['menusamping'] = "menueklaim";
        $data['backhome'] = "tiga";
        $this->load->view('templatesidebar/content', $data);
    }

    public function tampilkanrekammedik() {
        $this->load->model("rmmdl");
        $data["hasil"] = $this->rmmdl->ambiltampilkan();

        $this->load->view('layanan/pelayanan/eklaim/berkas/list-data', $data);
    }

    public function carirekammedik() {
        $this->load->model("rmmdl");
        $data["hasil"] = $this->rmmdl->ambiltampilkanrm();

        $this->load->view('layanan/pelayanan/eklaim/berkas/list-data', $data);
    }

    function buat_klaim_baru(){	
        try {
            $this->load->model("inacbg");
            $response = [
                'status'=>false,
                'message'=>''
            ];

            $post = $this->input->post();
            $request = [
                "metadata" => [
                    "method" => "new_claim"
                ],
                "data"=>[
                    "nomor_kartu" => $post['no_askes'],
                    "nomor_sep" => $post['nosep'],
                    "nomor_rm" => $post['no_rm'],
                    "nama_pasien" => $post['nama'],
                    "tgl_lahir" => $post['tgl_lahir'],
                    "gender" => $post['sex']=='P'?'2':'1'
                ]
            ];
            $msg= inacbg_request(json_encode($request));
            if ($msg) {
                if($msg['metadata']['message']=="Ok"){
                    // InsertData2("inacbg_klaim_baru","'".$nomor_sep."','".$msg['response']['patient_id']."','".$msg['response']['admission_id']."','".$msg['response']['hospital_admission_id']."'");
                    $response['status'] = true;
                }
                $response['message'] = $msg['metadata']['message'];
            }
            // simpan log
            $this->inacbg->simpanKlaimBaru([
                'method' => "new_claim",
                'nomor_sep' => $post['nosep'],
                'request_body' => json_encode($request),
                'response_body' => json_encode($msg),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            echo json_encode($response);
            die;
        } catch (\Throwable $th) {
            echo json_encode([
                "status" => false,
                "message" => $th->getMessage()
            ]);
            die;
        }
        
	}

    public function klaim_data()
    {
        try {
            $method = 'set_claim_data';
            $this->load->model("inacbg");

            $response = [
                'status'=>false,
                'message'=>''
            ];
            $result = [];//query here
            $defaultKlaim = $this->inacbg->defaultDataKlaim();
            $post = $this->input->post();
            $result = $this->inacbg->getDataByIdTransaksi($post['notransaksi']);
            // dDebug($result);die;
            $result = array_merge($defaultKlaim, $result);
            $result['jenis_rawat'] = $post['jenis_rawat']; 
            // var_dump($result);die;
            if (empty($result)) {
                $response['message'] = "data tidak ditemukan";
                echo json_encode($response);
                die;
            }
            $request = [
                "metadata" => [
                    "method" => $method
                ],
                "data"=>[
                    "nomor_sep"=> $result['nomor_sep'],
                    "nomor_kartu"=> $result['nomor_kartu'],
                    "tgl_masuk"=> inacbg_date($result['tgl_masuk']),//"26/10/2016", ok
                    "tgl_pulang"=>inacbg_date($result['tgl_keluar']),// "26/10/2016", ok
                    "cara_masuk"=> inacbg_cara_masuk($result['cara_masuk']),// gp, mp, inp, born, psych, hosp-trans, outp, emd, nursing, rehab, other
                    "jenis_rawat"=> inacbg_jenis_rawat($result['jenis_rawat']),//1 = rawat inap, 2 = rawat jalan, 3 = rawat igd
                    "kelas_rawat"=> inacbg_kelas_rawat($result['kelas_rawat']),//3 = Kelas 3, 2 = Kelas 2, 1 = Kelas 1
                    "adl_sub_acute"=> $result['adl_sub_acute'],// 12 s/d 60
                    "adl_chronic"=> $result['adl_chronic'],// 12 s/d 60
                    "icu_indikator"=> $result['icu_indikator'],// 1, 0
                    "icu_los"=> inacbg_jumlah_hari_dirawat($result['tgl_masuk'],$result['tgl_keluar']),// $result['icu_los'], // 0 , jumlah hari dirawat
                    "ventilator_hour"=> $result['ventilator_hour'], // 0, jumlah jam pemakaian
                    "upgrade_class_ind"=>  $result['upgrade_class_ind'], // 1, 0
                    "upgrade_class_class"=> $result['upgrade_class_class'], // kelas_1, kelas_2, vip, vvip
                    "upgrade_class_los"=> $result['upgrade_class_los'],// ''
                    "add_payment_pct"=> $result['add_payment_pct'],//''
                    "birth_weight"=> $result['birth_weight'],//0
                    "discharge_status"=> inacbg_cara_keluar($result['discharge_status']),// cara pulang 
                    "diagnosa"=> $result['diagnosa'],
                    "procedure"=> $result['procedure'],
                    "diagnosa_inagrouper"=> $result['diagnosa_inagrouper'],
                    "procedure_inagrouper"=> $result['procedure_inagrouper'],
                    "tarif_rs"=> [
                        "prosedur_non_bedah"=> $result['tarif_rs']['prosedur_non_bedah'],
                        "prosedur_bedah"=> $result['tarif_rs']['prosedur_bedah'],
                        "konsultasi"=> $result['tarif_rs']['konsultasi'],
                        "tenaga_ahli"=> $result['tarif_rs']['tenaga_ahli'],
                        "keperawatan"=> $result['tarif_rs']['keperawatan'],
                        "penunjang"=> $result['tarif_rs']['penunjang'],
                        "radiologi"=> $result['tarif_rs']['radiologi'],
                        "laboratorium"=> $result['tarif_rs']['laboratorium'],
                        "pelayanan_darah"=> $result['tarif_rs']['pelayanan_darah'],
                        "rehabilitasi"=> $result['tarif_rs']['rehabilitasi'],
                        "kamar"=> $result['tarif_rs']['kamar'],//''($result['kamar']+$result['tarif_poli_eks']),
                        "rawat_intensif"=> $result['tarif_rs']['rawat_intensif'],
                        "obat"=> $result['tarif_rs']['obat'],
                        "obat_kronis"=> $result['tarif_rs']['obat_kronis'],
                        "obat_kemoterapi"=> $result['tarif_rs']['obat_kemoterapi'],
                        "alkes"=> $result['tarif_rs']['alkes'],
                        "bmhp"=> $result['tarif_rs']['bmhp'],
                        "sewa_alat"=> $result['tarif_rs']['sewa_alat']
                    ],
                    "tarif_poli_eks"=> $result['tarif_poli_eks'],
                    "nama_dokter"=> $result['nama_dokter'],
                    "kode_tarif"=> $this->KELAS_RS,
                    "payor_id"=> $result['payor_id'],
                    "payor_cd"=> $result['payor_cd'],
                    "cob_cd"=> $result['cob_cd'],
                    "coder_nik"=> $result['coder_nik'],// nomor NIK mandatory
                ]
            ];
            // print_r($request); die;
            // ddebug($request);
            $msg= inacbg_request(json_encode($request));
            
            if ($msg) {
                if($msg['metadata']['message']=="Ok"){
                    // InsertData2("inacbg_klaim_baru","'".$nomor_sep."','".$msg['response']['patient_id']."','".$msg['response']['admission_id']."','".$msg['response']['hospital_admission_id']."'");
                    $response['status'] = true;
                }
                $response['message'] = $msg['metadata']['message'];
            }
            // simpan log
            $this->inacbg->simpanKlaimBaru([
                'method' => $method,
                'nomor_sep' => $result['nomor_sep'],
                'request_body' => json_encode($request),
                'response_body' => json_encode($msg),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            echo json_encode($response);
            die;
        } catch (\Throwable $th) {
            ddebug($th);
            echo json_encode([
                "status" => false,
                "message" => $th->getMessage()
            ]);
            die;
        }
        // $request ='{
        //     "metadata": {
        //         "method": "set_claim_data",
        //         "nomor_sep": "'.$nomor_sep.'"
        //     },
        //     "data": {
        //         
        //     }
        // }';
    }
}