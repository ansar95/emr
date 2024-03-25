<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penilaianmutu extends CI_Controller 
{
    public function getdata() 
    {
        try {
            $bulan = $this->input->get('bulan');
            $tahun = $this->input->get('tahun');
            $unit  = $this->input->get('unit');
            $indikator = $this->input->get('indikator');

            if ($unit == null || $indikator == null) {
                echo json_encode([
                    'status'  => false,
                    'message' => 'Gagal Memproses data'
                ]);
            } else {
                $query = [
                    'unit_id' => $this->input->get('unit'),
                    'indikator_mutu_id' => $this->input->get('indikator'),
                    'tahun' => $this->input->get('tahun'),
                    'bulan' => $this->input->get('bulan')
                ];
    
                $this->load->model('penilaianmutumodel');
                $data = [];
                $penilaian = $this->penilaianmutumodel->find($query);
                
                if (count($penilaian) < 1) {
                    $dateString = "$tahun-$bulan-01";
                    $date = new DateTime($dateString);
                    $lastDay = $date->format('t');
                    
                    for ($i=1; $i <= $lastDay; $i++) {
                        $tanggal = "$tahun-$bulan";
                        $tanggal .= "-".$i;
                        $dateTmp = strtotime($tanggal);
                        $rows[] = [
                            'unit_id'           => $this->input->get('unit'),
                            'indikator_mutu_id' => $this->input->get('indikator'),
                            'nilai_numerator'   => 0,
                            'nilai_denumerator' => 0,
                            'tanggal'           => date("Y-m-d", $dateTmp),
                        ];  
                    }
                    $this->penilaianmutumodel->store($rows);
                    $data = $this->penilaianmutumodel->find($query);
    
                } else {
                    $data = $penilaian;
                }
    
                echo json_encode([
                    "status"  => true,
                    "message" => "successfully get data",
                    "data" => $data
                ]);
            }

        } catch (\Throwable $th) {
            echo json_encode([
                "status"  => false,
                "message" => $th->getMessage()
            ]);
        }
    }

    public function update()
    {
        try {
            $id = $this->input->post('id');
            $data = [
                'nilai_numerator'   => $this->input->post('nilaiNumerator'),
                'nilai_denumerator' => $this->input->post('nilaiDenumerator')
            ];

            $this->load->model('penilaianmutumodel');

            $this->penilaianmutumodel->update($id, $data);

            echo json_encode([
                'status'  => true,
                'message' => 'Berhasil mengubah data'
            ]);
        } catch(\Throwable $th) {
            echo json_encode([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
}