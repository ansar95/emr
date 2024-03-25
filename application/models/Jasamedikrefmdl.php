<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jasamedikrefmdl extends CI_Model {
    public function get_pasien()
    {
        $no_rm = ($this->input->post('no_rm')) ? $this->input->post('no_rm') : '00';

        $this->db->from("pasien");
        $this->db->select('id,no_rm,nama_pasien,tempat_lahir,tgl_lahir');
        if ($no_rm)
            $this->db->where('no_rm',$no_rm);

        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_golongan()
    {
        $idgolongan = ($this->input->post('id_golongan')) ? $this->input->post('id_golongan') : '';

        $this->db->from("golongan");
        $this->db->select('idgolongan,golongan');
        if ($idgolongan)
            $this->db->where('idgolongan',$idgolongan);

        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_unit($kelompok=null)
    {
        $kode_unit = ($this->input->post('kode_unit')) ? $this->input->post('kode_unit') : '';

        $this->db->from("munit");
        $this->db->select('kode_unit,nama_unit');
        if ($kode_unit)
            $this->db->where('kode_unit',$kode_unit);

        if ($kelompok) {
			if (is_array($kelompok)) {
				$this->db->where_in('kelompok_unit', $kelompok);
			} else {
				$this->db->where('kelompok_unit',$kelompok);
			}
		}

        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_tindakan($jenis)
    {
        if ($jenis=='RANAP')
        {
            return [
                0 => [
                    'id' => 'NB',
                    'deskripsi' => 'Non Bedah'
                ],
                1 => [
                    'id' => 'BD',
                    'deskripsi' => 'Bedah'
				]
            ];
        } elseif ($jenis=='RAJAL') {
            return [
                0 => [
                    'id' => 'RJ',
                    'deskripsi' => 'Rawat Jalan'
                ]
            ];
        }
        
    }

	public function get_tindakan_master()
    {
        return [
			0 => [
				'id' => 'NB',
				'deskripsi' => 'Non Bedah'
			],
			1 => [
				'id' => 'BD',
				'deskripsi' => 'Bedah'
			],
			2 => [
				'id' => 'RJ',
				'deskripsi' => 'Rawat Jalan'
			]
		];
    }

    public function get_tindakan_ref($id=null, $jenis_rawat=null)
    {
        $this->db->from("jasa_ref_tindakan");
        $this->db->select('id,jenis,kode_tindakan,dpjp_wajib');
        if ($this->input->post('jenis_tindakan'))
            $this->db->where('jenis',$this->input->post('jenis_tindakan'));
        if ($id) $this->db->where('id',$id);
        $this->db->order_by('kode_tindakan','asc');

        $q = $this->db->get()->result_array();

        $db_ref = $this->db->select("id,deskripsi")
            ->from("jasa_ref_jenis_tindakan");
        if ($jenis_rawat) $db_ref->where("jenis_rawat",$jenis_rawat);
        $db_ref = $db_ref->get();
        $w_ref = $db_ref->result_array();
        $arr_referensi = array();
        foreach ($w_ref as $w)
        {
            $arr_referensi[$w['id']] = $w['deskripsi'];
        }

        $result = array();
        
        foreach ($q as $w)
        {
            $dpjp = json_decode($w['dpjp_wajib'], true);
            
            $list_dpjp = array();
            if ($dpjp) {
                foreach ($dpjp as $key=>$val)
                {
                    if (isset($arr_referensi[$key]))
                    {
                        $list_dpjp[] = [
                            $arr_referensi[$key] => $val
                        ];
                    } else {
                        $list_dpjp[] = [
                            '-' => '-'
                        ];
                    }
                    

                }
            }

            $result[] = [
                'id' => $w['id'],
                'jenis' => $w['jenis'],
                'kode_tindakan' => $w['kode_tindakan'],
                'dpjp_wajib' => $list_dpjp,
                // 'tes_dpjp' => $list_dpjp
            ];
        }

        return $result;
    }

    public function get_dokter()
    {
        $this->db->from("mdokter");
        $this->db->where('kategori','DOKTER');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_tipe_pemeriksaan($jenis)
    {
        // $this->db->from("mtipepemeriksaan");
        // $result = $this->db->get();
        // return $result->result_array();
        $this->db->from("jasa_ref_jenis_tindakan");
        $this->db->where('jenis_rawat',$jenis);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_pendidikan()
    {
        $this->db->from("mpendidikan");
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_kategori()
    {
        $this->db->from("mkategori");
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_referensi_pegawai($aplikasi = null , $idkepala = null)
    {
        $this->db->from("jasa_mreferensi");
        $this->db->select('id,deskripsi');
        if ($aplikasi) $this->db->where('aplikasi', $aplikasi);
        if ($idkepala) $this->db->where('id_kepala', $idkepala);

        $result = $this->db->get();

        return $result->result_array();
    }



    ///////////////////////////////////////////////////////////////////// page to store //////////////////////////////////////////

    public function store_referensi_tindakan($data)
    {
        $dpjp_wajib = array();
        $dpjp_wajib = array_combine($data['listdpjp'],array_map('intval',$data['valuedpjp']));
		ksort($dpjp_wajib, SORT_STRING);
        
        $db = $this->db->from("jasa_ref_tindakan");
        $db = $db->where('kode_tindakan', $data['kode_referensi_tindakan']);
        $db = $db->limit(1);
        $db = $db->get()->row();
        
        if (! $db)
        {
            $dt = array();
            $dt['jenis'] = $data['jenis'];
            $dt['kode_tindakan'] = $data['kode_referensi_tindakan'];
            $dt['dpjp_wajib'] = json_encode($dpjp_wajib, true);

            $result = $this->db->insert("jasa_ref_tindakan", $dt);

            if ($result)
            {
                return ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil menyimpan!'];
            } else {
                return ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal menyimpan!'];
            }
        } else {
            return ['error_code'=>500, 'error_desc'=>'', 'data'=>'Kode Tindakan sudah digunakan!'];
        }

        return false;
    }

    public function update_referensi_tindakan($data)
    {
        $dpjp_wajib = array();
        $dpjp_wajib = array_combine($data['listdpjp'],$data['valuedpjp']);

        $db = $this->db->from("jasa_ref_tindakan");
        $db = $db->where('kode_tindakan', $data['kode_referensi_tindakan']);
        // $db = $db->where('id', $data['id']);
        $db = $db->limit(1);
        $db = $db->get()->row();
        
        if (! $db)
        {
            // if ($db->id==$data['id']) 
            // {
                $dt['jenis'] = $data['jenis'];
                $dt['kode_tindakan'] = $data['kode_referensi_tindakan'];
                $dt['dpjp_wajib'] = json_encode($dpjp_wajib, true);
                
                $this->db->from('jasa_ref_tindakan');
                $this->db->where("id", $data['id']);
                $this->db->limit(1);
                $result = $this->db->update("jasa_ref_tindakan", $dt);
                
                if ($result)
                {
                    return ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil menyimpan!'];
                } else {
                    return ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal menyimpan!'];
                }
            // }

            return ['error_code'=>500, 'error_desc'=>'', 'data'=>'Kode Tindakan sudah digunakan!'];
            
        } else {
            if ($db->id==$data['id']) 
            {
                $dt['jenis'] = $data['jenis'];
                $dt['kode_tindakan'] = $data['kode_referensi_tindakan'];
                $dt['dpjp_wajib'] = json_encode($dpjp_wajib, true);
                
                $this->db->from('jasa_ref_tindakan');
                $this->db->where("id", $data['id']);
                $this->db->limit(1);
                $result = $this->db->update("jasa_ref_tindakan", $dt);
                
                if ($result)
                {
                    return ['error_code'=>'0', 'error_desc'=>'', 'data'=>'Berhasil menyimpan!'];
                } else {
                    return ['error_code'=>500, 'error_desc'=>'', 'data'=>'Gagal menyimpan!'];
                }
            } else {
                return ['error_code'=>500, 'error_desc'=>'', 'data'=>'Kode Tindakan sudah digunakan!'];
            }
        }
        
        return false;
    }

    public function delete_referensi_tindakan($data)
    {
        $id = $data["id"];
        $this->db->from('jasa_ref_tindakan');
        $this->db->where("id", $id);
        $this->db->limit(1);
        $db = $this->db->get()->row();
        if ($db)
        {
            $result = $this->db->delete();
            return $result;
        }
		
        return false;
    }

}
