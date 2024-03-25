<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jasamedikrawatjalanmdl extends CI_Model {
    public function store()
    {
        $data = array();
        $data['kode_golongan'] = ($this->input->post('kode_golongan')) ? $this->input->post('kode_golongan') : '';
        $data['nama_golongan'] = ($this->input->post('nama_golongan')) ? $this->input->post('nama_golongan') : '';
        $data['tgl_masuk'] = date('Y-m-d', strtotime($this->input->post('tgl_masuk')));
        $data['tgl_keluar'] = ($this->input->post('tgl_keluar')) ? date('Y-m-d',strtotime($this->input->post('tgl_keluar'))) : '1900-01-01';
        $data['no_rm'] = $this->input->post('no_rm');
        $data['nosep'] = ($this->input->post('nosep')) ? $this->input->post('nosep') : '';
        $data['kode_unit'] = ($this->input->post('kode_unit')) ? $this->input->post('kode_unit') : '';
        $data['nama_unit'] = ($this->input->post('nama_unit')) ? $this->input->post('nama_unit') : '';
        $data['klaim_inacbg'] = ($this->input->post('klaim_inacbg')) ? (int)$this->input->post('klaim_inacbg') : 0;
        $data['klaim_rs'] = ($this->input->post('klaim_rs')) ? (int)$this->input->post('klaim_rs') : 0;
        $data['jasapelayanan'] = ($this->input->post('jasa_pelayanan')) ? $this->input->post('jasa_pelayanan') : 0;
        // $data['kodetindakan'] = ($this->input->post('kode_tindakan')) ? $this->input->post('kode_tindakan') : '';
        $data['kodetindakan'] = 'RJ';
        $data['kode_dokter_dpjp'] = ($this->input->post('kode_dokter_dpjp')) ? $this->input->post('kode_dokter_dpjp') : '';
        $data['nama_dokter_dpjp'] = ($this->input->post('nama_dokter_dpjp')) ? $this->input->post('nama_dokter_dpjp') : '';
        $data['register'] = ($this->input->post('register')) ? (int)$this->input->post('register') : 0;
        $data['obat'] = ($this->input->post('obat')) ? (int)$this->input->post('obat') : 0;
        $data['bhp'] = ($this->input->post('bhp')) ? (int)$this->input->post('bhp') : 0;
        $data['alkes'] = ($this->input->post('alkes')) ? (int)$this->input->post('alkes') : 0;
        $data['diagnosa'] = ($this->input->post('diagnosa')) ? $this->input->post('diagnosa') : '';
        $data['periode'] = ($this->input->post('tgl_keluar')) ? date('Y',strtotime($this->input->post('tgl_keluar'))) : '1900';
        $data['tutup'] = 0;

        $result = $this->db->insert("jasa_rajal", $data);
        // if ($result) {
        //     $dataRincianUnit = array();
        //     $dataRincianUnit['id_rajal'] = $this->db->insert_id();
        //     $dataRincianUnit['no_rm'] = $this->input->post('no_rm');
        //     $dataRincianUnit['kode_unit'] = ($this->input->post('kode_unit')) ? $this->input->post('kode_unit') : '';
        //     $dataRincianUnit['tgl_masuk'] = date('Y-m-d', strtotime($this->input->post('tgl_masuk')));
        //     $dataRincianUnit['tgl_keluar'] = '1900-01-01';

        //     $save_rincian = $this->store_rincian_unit($dataRincianUnit);
        // }

		return $result;
    }

    public function store_rincian_rajal_unit($dt)
    {
        $data = array();
        $data['id_rajal'] = $dt['id_rajal'];
        $data['no_rm'] = $dt['no_rm'];
        $data['kode_unit'] = $dt['kode_unit'];
        $data['tgl_masuk'] = date('Y-m-d',strtotime($dt['tgl_masuk']));
        $data['tgl_keluar'] = date('Y-m-d',strtotime($dt['tgl_keluar']));
        $data['user1'] = '';
        $data['user2'] = '';

        $result = $this->db->insert("jasa_rajal_rincian", $data);

        return $result;
    }

    public function store_rincian_rajal_dokter_bpjs($dt)
    {
        $data_dokter = array();
        $data_dokter['id_rajal'] = $dt['id_rajal'];
        $data_dokter['no_rm'] = $dt['no_rm'];
        $data_dokter['kode_dokter'] = $dt['kode_dokter'];
        $data_dokter['type'] = $dt['type'];
        $data_dokter['qty'] = 1;
        $data_dokter['user1'] = '';
        $data_dokter['user2'] = '';
 
        $result_dokter = $this->db->insert("jasa_rajal_dokter", $data_dokter);

        $result = ['result_dokter' => $result_dokter, 'result_unit' => $result_dokter];

        return $result;
    }

    public function store_rincian_rajal_dokter_non_bpjs($dt)
    {
        $data_dokter = array();
        $data_dokter['id_rajal'] = $dt['id_rajal'];
        $data_dokter['no_rm'] = $dt['no_rm'];
        $data_dokter['kode_dokter'] = $dt['kode_dokter'];
        $data_dokter['kode_unit'] = $dt['kode_unit'];
        $data_dokter['kode_golongan'] = $dt['kode_golongan'];
        $data_dokter['type'] = $dt['type'];
        $data_dokter['qty'] = 1;
        $data_dokter['jumlah_jasa'] = ($dt['nilai']) ? $dt['nilai'] : 0;
        $data_dokter['user1'] = '';
        $data_dokter['user2'] = '';
 
        $result_dokter = $this->db->insert("jasa_rajal_dokter", $data_dokter);

        $result = ['result_dokter' => $result_dokter, 'result_unit' => $result_dokter];

        return $result;
    }

    public function store_proses_jasa_dokter($dt)
    {
        $data = array();
		$data_layanan = array();
        $id_rajal = $dt['id_rajal'][0];
        
        foreach ($dt['id'] as $key=>$val)
        {
            $data[] = [
                'id_rincian_rajal_dokter' => $val,
                'id_rajal' => $dt['id_rajal'][$key],
                'kode_dokter' => $dt['kode_dokter'][$key],
                'id_type' => $dt['id_type'][$key],
                'jumlah_jasa_dibagi' => (float)$dt['jasa_dibagi'][$key],
                'jumlah_jasa_diterima' => (float)$dt['jasa_diterima'][$key],
            ];

			$data_layanan = [
				'id_rajal' => $dt['id_rajal'][$key],
				'direct' => $dt['jasa_direct'][$key],
				'indirect' => $dt['jasa_indirect'][$key],
				'reward' => $dt['jasa_reward'][$key],
				'non_medis' => $dt['jasa_non_medis'][$key]
			];
        }

        if (count($data)>0)
        {
            $this->db->from('jasa_rajal_diterima_dokter');
            $this->db->where("id_rajal", $id_rajal);
            $delete = $this->db->delete();
        }
        $result = $this->db->insert_batch("jasa_rajal_diterima_dokter", $data);

		if (count($data_layanan)>0)
		{
			$d = $this->db->from('jasa_rajal_pelayanan');
			$d = $d->where('id_rajal', $id_rajal);
			$del = $d->delete();
		}
		$result2 = $this->db->insert("jasa_rajal_pelayanan", $data_layanan);

        return $result;
    }

    public function get($strwhre = null)
    {
        $query = $this->db->query("SELECT js.id as id_rajal,js.no_rm,ps.nama_pasien,js.tgl_masuk,js.tgl_keluar,js.kode_golongan,js.kode_unit,js.nama_unit,
                js.nosep,js.klaim_inacbg,js.klaim_rs,
                CONCAT('[\"',GROUP_CONCAT(DISTINCT jsd.type ORDER BY jsd.type ASC SEPARATOR '\",\"'),'\"]') json,
                CASE
                WHEN jsd.id IS NOT NULL
                THEN
                    (SELECT 
                        CONCAT('[',
                            GROUP_CONCAT(JSON_OBJECT(
                                'id',id,'parameter',parameter,'pendapatan',persentase_pendapatan,'pelayanan',persentase_pelayanan,'direct',persentase_direct
                            ) ORDER BY JSON_EXTRACT(parameter, '$.16') DESC LIMIT 1),']') AS Param 
                        FROM jasa_ref_type_jaspel
                        WHERE jenis=js.kodetindakan AND periode=js.periode
                            AND JSON_CONTAINS(JSON_KEYS(parameter),CONCAT('[\"',GROUP_CONCAT(DISTINCT jsd.type ORDER BY jsd.type ASC SEPARATOR '\",\"'),'\"]'),'$') 
                            AND op_lebih_dari_dua = 0
                    )
                ELSE
                    (SELECT 
                        CONCAT('[',
                            GROUP_CONCAT(JSON_OBJECT(
                                'id',id,'parameter',parameter,'pendapatan',persentase_pendapatan,'pelayanan',persentase_pelayanan,'direct',persentase_direct
                            ) ORDER BY JSON_EXTRACT(parameter, '$.16') DESC LIMIT 1),']') AS Param 
                        FROM jasa_ref_type_jaspel
                        WHERE jenis=js.kodetindakan AND periode=js.periode
                    )
                END sk
            FROM jasa_rajal js
            JOIN pasien ps ON ps.no_rm=js.no_rm 
            LEFT JOIN (
                SELECT rjd.id,rjd.id_rajal,rjd.kode_dokter,rjd.qty,rjd.type
                FROM jasa_rajal_dokter rjd
            ) jsd ON jsd.id_rajal=js.id
            $strwhre
            GROUP BY js.id
            ORDER BY js.nosep,js.tgl_masuk");
        
        $result = $query->result_array();
        $data = array();
        foreach ($result as $key => $w)
        { 
            $klaim_inacbg = $w['klaim_inacbg'];

            $jasapelayanan = 0;
            $persentase_pendapatan = 0;
            $persentase_pelayanan = 0;
            $sk = json_decode($w['sk'],true);
            if (isset($sk[0]))
            {
                $persentase_pendapatan = $sk[0]['pendapatan'];
                $persentase_pelayanan = $sk[0]['pelayanan'];
            }

            $pendapatan = ($klaim_inacbg * $persentase_pendapatan) / 100;
            $jasapelayanan = ($klaim_inacbg * $persentase_pelayanan) / 100;
            $data[] = [
                "id_rajal" => $w['id_rajal'],
                "tgl_masuk" => $w['tgl_masuk'],
                "tgl_keluar" => $w['tgl_keluar'],
                "kode_golongan" => $w['kode_golongan'],
                "no_rm" => $w['no_rm'],
                "nosep" => $w['nosep'],
                "kode_unit" => $w['kode_unit'],
                "nama_unit" => $w['nama_unit'],
                "klaim_inacbg" => $klaim_inacbg,
                "klaim_rs" => $w['klaim_rs'],
                "jasapelayanan" => ceil($jasapelayanan),
                "nama_pasien" => $w['nama_pasien'],
                "json_pelayanan" => ceil($jasapelayanan)
            ];
        }
        return $data;
    }

    public function get_bpjs($strwhr)
    {
		$db_ref = $this->db->select("kode_tindakan,dpjp_wajib");
        $db_ref = $db_ref->from("jasa_ref_tindakan");
        $db_ref = $db_ref->get();
        $db_ref = $db_ref->result_array();

        $referensi_tindakan = array();
        foreach ($db_ref as $w)
        {
            $dpjp = str_replace(' ','',$w['dpjp_wajib']);
            $referensi_tindakan[$dpjp] = $w['kode_tindakan'];
        }

        $data = array();

        $query = $this->db->query("SELECT js.id as id_rajal,js.no_rm,ps.nama_pasien,js.tgl_masuk,js.tgl_keluar,js.kode_golongan,js.nama_golongan,js.kode_unit,js.nama_unit,
            js.nosep,js.klaim_inacbg,js.klaim_inacbg_fix,js.klaim_rs,js.obat,js.alkes,js.bhp,
            CONCAT('[\"',GROUP_CONCAT(DISTINCT jsd.type ORDER BY jsd.type ASC SEPARATOR '\",\"'),'\"]') json,
            z.json_dpjp,
            CASE
            WHEN jsd.id IS NOT NULL
            THEN
                CASE
                WHEN SUM(CASE WHEN jsd.type = '13' THEN 1 ELSE 0 END) >= 2
                THEN
                    (SELECT 
                        CONCAT('[',
                            GROUP_CONCAT(JSON_OBJECT(
                                'id',id,'parameter',parameter,'pendapatan',persentase_pendapatan,'pelayanan',persentase_pelayanan,'pelayanan_non_medis',persentase_pelayanan_non_medis,'direct',persentase_direct,'indirect',persentase_indirect,'reward',persentase_reward
                            ) ORDER BY JSON_EXTRACT(parameter, '$.16') DESC LIMIT 1),']') AS Param 
                        FROM jasa_ref_type_jaspel
                        WHERE jenis=js.kodetindakan AND periode=js.periode
                            AND JSON_CONTAINS(JSON_KEYS(parameter),CONCAT('[\"',GROUP_CONCAT(DISTINCT jsd.type ORDER BY jsd.type ASC SEPARATOR '\",\"'),'\"]'),'$') 
                            AND op_lebih_dari_dua = 1
                    )
                ELSE
                    (SELECT 
                        CONCAT('[',
                            GROUP_CONCAT(JSON_OBJECT(
                                'id',id,'parameter',parameter,'pendapatan',persentase_pendapatan,'pelayanan',persentase_pelayanan,'pelayanan_non_medis',persentase_pelayanan_non_medis,'direct',persentase_direct,'indirect',persentase_indirect,'reward',persentase_reward
                            ) ORDER BY JSON_EXTRACT(parameter, '$.16') DESC LIMIT 1),']') AS Param 
                        FROM jasa_ref_type_jaspel
                        WHERE jenis=js.kodetindakan AND periode=js.periode
                            AND JSON_CONTAINS(JSON_KEYS(parameter),CONCAT('[\"',GROUP_CONCAT(DISTINCT jsd.type ORDER BY jsd.type ASC SEPARATOR '\",\"'),'\"]'),'$') 
                            AND op_lebih_dari_dua = 0
                    )
                END
            ELSE
                (SELECT 
                    CONCAT('[',
                        GROUP_CONCAT(JSON_OBJECT(
                            'id',id,'parameter',parameter,'pendapatan',persentase_pendapatan,'pelayanan',persentase_pelayanan,'pelayanan_non_medis',persentase_pelayanan_non_medis,'direct',persentase_direct,'indirect',persentase_indirect,'reward',persentase_reward
                        ) ORDER BY JSON_EXTRACT(parameter, '$.16') DESC LIMIT 1),']') AS Param 
                    FROM jasa_ref_type_jaspel
                    WHERE jenis=js.kodetindakan AND periode=js.periode
                )
            END sk
        FROM jasa_rajal js
        LEFT JOIN pasien ps ON ps.no_rm=js.no_rm 
        LEFT JOIN (
            SELECT rjd.id,rjd.id_rajal,rjd.kode_dokter,rjd.qty,rjd.type
            FROM jasa_rajal_dokter rjd
        ) jsd ON jsd.id_rajal=js.id
        LEFT JOIN (
            SELECT z.id_rajal,
                CONCAT(
                    '{',
                        GROUP_CONCAT( DISTINCT
                            CONCAT('\"',z.type, '\":',z.jumlah_type,'')
                        ),
                    '}'
                ) json_dpjp
            FROM
                (SELECT jsd.id_rajal,jsd.type,count(jsd.type) jumlah_type 
                    FROM jasa_rajal_dokter jsd 
                    GROUP BY jsd.id_rajal,jsd.type
                ) z GROUP BY z.id_rajal
        ) z ON z.id_rajal=js.id
        $strwhr
        GROUP BY js.id,js.nosep
        ORDER BY js.nosep,js.tgl_masuk");

        $result = $query->result_array();

        foreach ($result as $key => $w)
        {
            $jasa_pelayanan = 0;
            $jasa_direct = 0;
            $jasa_indirect = 0;
            $jasa_reward = 0;
            $jasa_non_medis = 0;

            $klaim_inacbg = ($w['klaim_inacbg_fix'] <= 0 ) ? $w['klaim_inacbg'] : $w['klaim_inacbg_fix'];
            $terbayar = ($w['klaim_inacbg_fix'] <= 0) ? false : true;
            $klaim_rs = $w['klaim_rs'];
            $selisih = $klaim_inacbg - $klaim_rs;

            $persentase_pendapatan = 0;
            $persentase_pelayanan = 0;
            $persentase_pelayanan_non_medis = 0;
            $persentase_direct = 0;
            $persentase_indirect = 0;
            $persentase_reward = 0;
            $sk = ($w['sk']) ? json_decode($w['sk'],true) : null;
            if (isset($sk[0]))
            {
                $persentase_pendapatan = $sk[0]['pendapatan'];
                $persentase_pelayanan = $sk[0]['pelayanan'];
                $persentase_pelayanan_non_medis = $sk[0]['pelayanan_non_medis'];
                $persentase_direct = $sk[0]['direct'] ;
                $persentase_indirect = $sk[0]['indirect'];
                $persentase_reward = $sk[0]['reward'];
            }

            $pendapatan = ($klaim_inacbg * $persentase_pendapatan) / 100;
            $jasapelayanan = ($klaim_inacbg * $persentase_pelayanan) / 100;
            $jasa_non_medis = ($klaim_inacbg * $persentase_pelayanan_non_medis) / 100;

            $jasa_direct = ($jasapelayanan * $persentase_direct) / 100;
            $jasa_indirect = ($jasapelayanan * $persentase_indirect) / 100;
            $jasa_reward = ($jasapelayanan * $persentase_reward) / 100;

			$dpjp_ok = (isset($referensi_tindakan[$w['json_dpjp']])) ? $referensi_tindakan[$w['json_dpjp']] : '';

            $data[] = [
                "id_rajal" => $w['id_rajal'],
                "tgl_masuk" => $w['tgl_masuk'],
                "tgl_keluar" => $w['tgl_keluar'],
                "kode_golongan" => $w['kode_golongan'],
                "no_rm" => $w['no_rm'],
                "nama_pasien" => $w['nama_pasien'],
                "nosep" => $w['nosep'],
                "terbayar" => $terbayar,
                "klaim_inacbg" => $klaim_inacbg,
                "klaim_rs" => $klaim_rs,
                "selisih" => $selisih,
                "jasapelayanan" => ceil($jasapelayanan),
                "direct" => ceil($jasa_direct),
                "indirect" => ceil($jasa_indirect),
                "reward" => ceil($jasa_reward),
                "non_medis" => ceil($jasa_non_medis),
				"dpjp_ok" => $dpjp_ok
            ];
        }

        return $data;
    }

    public function get_non_bpjs($strwhr)
    {
		$db_ref = $this->db->select("kode_tindakan,dpjp_wajib");
        $db_ref = $db_ref->from("jasa_ref_tindakan");
        $db_ref = $db_ref->get();
        $db_ref = $db_ref->result_array();

        $referensi_tindakan = array();
        foreach ($db_ref as $w)
        {
            $dpjp = str_replace(' ','',$w['dpjp_wajib']);
            $referensi_tindakan[$dpjp] = $w['kode_tindakan'];
        }

        $data = array();
        $query = $this->db->query("SELECT js.id AS id_rajal,js.kode_golongan,js.nama_golongan,js.tgl_masuk,js.tgl_keluar,js.no_rm,ps.nama_pasien,COALESCE(sum(jsd.jumlah_jasa),0) AS klaim,js.register,js.obat,js.alkes,js.bhp,
            z.json_dpjp,
			CASE
            WHEN jsd.id IS NOT NULL
            THEN
                (SELECT 
                    CONCAT('[',
                        GROUP_CONCAT(JSON_OBJECT(
                            'id',id,'parameter',parameter,'pendapatan',persentase_pendapatan,'pelayanan',persentase_pelayanan,'pelayanan_non_medis',persentase_pelayanan_non_medis,'direct',persentase_direct,'indirect',persentase_indirect,'reward',persentase_reward
                        ) ORDER BY JSON_EXTRACT(parameter, '$.16') DESC LIMIT 1),']') AS Param 
                    FROM jasa_ref_type_jaspel
                    WHERE jenis=js.kodetindakan AND periode=js.periode
                        AND JSON_CONTAINS(JSON_KEYS(parameter),CONCAT('[\"',GROUP_CONCAT(DISTINCT jsd.type ORDER BY jsd.type ASC SEPARATOR '\",\"'),'\"]'),'$') 
                        AND op_lebih_dari_dua = 0
                )
            END sk
            FROM jasa_rajal js
            JOIN pasien ps ON ps.no_rm=js.no_rm
            LEFT JOIN (
                SELECT rjd.id,rjd.id_rajal,rjd.kode_dokter,rjd.qty,rjd.type,rjd.jumlah_jasa
                FROM jasa_rajal_dokter rjd
            ) jsd ON jsd.id_rajal=js.id
			LEFT JOIN (
				SELECT z.id_rajal,
					CONCAT(
						'{',
							GROUP_CONCAT( DISTINCT
								CONCAT('\"',z.type, '\":',z.jumlah_type,'')
							),
						'}'
					) json_dpjp
				FROM
					(SELECT jsd.id_rajal,jsd.type,count(jsd.type) jumlah_type 
						FROM jasa_rajal_dokter jsd 
						GROUP BY jsd.id_rajal,jsd.type
					) z GROUP BY z.id_rajal
			) z ON z.id_rajal=js.id
            $strwhr
            GROUP BY js.id");
        
        $result = $query->result_array();

        foreach ($result as $key => $w)
        {
            $jasa_pelayanan = 0;
            $jasa_direct = 0;
            $jasa_indirect = 0;
            $jasa_reward = 0;
            $jasa_non_medis = 0;

            $klaim_inacbg = $w['klaim'];

            $persentase_pendapatan = 0;
            $persentase_pelayanan = 0;
            $persentase_pelayanan_non_medis = 0;
            $persentase_direct = 0;
            $persentase_indirect = 0;
            $persentase_reward = 0;
            $sk = ($w['sk']) ? json_decode($w['sk'],true) : null;
            if (isset($sk[0]))
            {
                $persentase_pendapatan = $sk[0]['pendapatan'];
                $persentase_pelayanan = $sk[0]['pelayanan'];
                $persentase_pelayanan_non_medis = $sk[0]['pelayanan_non_medis'];
                $persentase_direct = $sk[0]['direct'] + $sk[0]['reward'];
                $persentase_indirect = $sk[0]['indirect'];
                $persentase_reward = $sk[0]['reward'];
            }

            $pendapatan = ($klaim_inacbg * $persentase_pendapatan) / 100;
            $jasapelayanan = ($klaim_inacbg * $persentase_pelayanan) / 100;
            $jasa_non_medis = ($klaim_inacbg * $persentase_pelayanan_non_medis) / 100;

            $jasa_direct = ($jasapelayanan * $persentase_direct) / 100;
            $jasa_indirect = ($jasapelayanan * $persentase_indirect) / 100;
            $jasa_reward = ($jasapelayanan * $persentase_reward) / 100;

            $jasa_direct = $jasa_direct + $jasa_reward;
            $jasa_reward = 0;

			$dpjp_ok = (isset($referensi_tindakan[$w['json_dpjp']])) ? $referensi_tindakan[$w['json_dpjp']] : '';

            $data[] = [
                "id_rajal" => $w['id_rajal'],
                "tgl_masuk" => $w['tgl_masuk'],
                "tgl_keluar" => $w['tgl_keluar'],
                "kode_golongan" => $w['kode_golongan'],
                "no_rm" => $w['no_rm'],
                "nama_pasien" => $w['nama_pasien'],
                "klaim_inacbg" => (int)$klaim_inacbg,
                "klaim_rs" => (int)$klaim_inacbg,
                "selisih" => 0,
                "jasapelayanan" => ceil($jasapelayanan),
                "direct" => ceil($jasa_direct),
                "indirect" => ceil($jasa_indirect),
                "reward" => ceil($jasa_reward),
                "non_medis" => ceil($jasa_non_medis),
				"dpjp_ok" => $dpjp_ok
            ];
        }

        return $data;
    }

    public function get_rekap_dokter_non_bpjs($strwhr)
    {
        $data = array();

        $query = $this->db->query("SELECT dk.id AS id_dokter,dk.kode_dokter,dk.nama_dokter,
        CASE WHEN js.kode_dokter IS NOT NULL
        THEN
            CONCAT(
                '[',
                    GROUP_CONCAT(DISTINCT
                        JSON_OBJECT(    
                                'golongan',js.golongan,'jumlah_jasa',js.jumlah_jasa
                        ) ORDER BY js.kode_golongan SEPARATOR ','
                    )
                ,']'
            )
        END jasa,
        (SELECT 
            CONCAT('[',
                GROUP_CONCAT(JSON_OBJECT(
                    'id',id,'parameter',parameter,'pendapatan',persentase_pendapatan,'pelayanan',persentase_pelayanan,'pelayanan_non_medis',persentase_pelayanan_non_medis,'direct',persentase_direct,'indirect',persentase_indirect,'reward',persentase_reward
                ) ORDER BY JSON_EXTRACT(parameter, '$.16') DESC LIMIT 1),']') AS Param 
            FROM jasa_ref_type_jaspel
            WHERE jenis=js.kodetindakan AND periode=js.periode
        ) sk
        FROM mdokter dk 
        LEFT JOIN (SELECT jd.kode_dokter,jd.jumlah_jasa,jd.kode_golongan,g.golongan,js.kodetindakan,js.periode,js.tgl_keluar
            FROM jasa_rajal_dokter_umum jd
            JOIN golongan g ON g.idgolongan=jd.kode_golongan
            JOIN jasa_rajal js ON js.id=jd.id_rajal
            WHERE g.golongan!='BPJS'
        ) js ON js.kode_dokter=dk.kode_dokter
        $strwhr
        GROUP BY dk.kode_dokter,js.kode_golongan");

        $result = $query->result_array();

        var_dump($result);
        exit;
        foreach ($result as $key => $w)
        {
            $data[] = [
                "id_rajal" => $w['id_rajal'],
                "tgl_masuk" => $w['tgl_masuk'],
                "tgl_keluar" => $w['tgl_keluar'],
                "kode_golongan" => $w['kode_golongan'],
                "no_rm" => '',
                "nama_pasien" => '',
                "nosep" => '',
                "terbayar" => '',
                "klaim_inacbg" => '',
                "klaim_rs" => '',
                "selisih" => '',
                "jasa_pelayanan" => '',
                "direct" => '',
                "indirect" => '',
                "reward" => '',
                "non_medis" => '',
            ];
        }

        return $data;
    }

    public function get_rincian_all($table_rajal_dokter = '')
    {
        $id = $this->input->post("id_rajal");
        $query = $this->db->query("SELECT js.id AS id_rajal,js.no_rm,ps.nama_pasien,js.tgl_masuk,js.tgl_keluar,js.kode_golongan,
					js.nosep,js.klaim_inacbg,js.klaim_rs,js.klaim_inacbg_fix,COALESCE(sum(jsd.jumlah_jasa),0) AS klaim,
                CASE
                WHEN rincian.id IS NOT NULL
                THEN
                    CONCAT(
                    '[',
                        GROUP_CONCAT(DISTINCT
                            JSON_OBJECT(    
                                'id', rincian.id,
                                'id_rajal', rincian.id_rajal,
                                'no_rm', rincian.no_rm,
                                'kode_unit', rincian.kode_unit,
                                'nama_unit', rincian.nama_unit,
                                'tgl_masuk', rincian.tgl_masuk,
                                'tgl_keluar', rincian.tgl_keluar,
                                'jumlah_hari_rawat_unit', rincian.hari_rawat_unit,
                                'tgl_masuk_rs', js.tgl_masuk,
                                'tl_keluar_rs', js.tgl_keluar,
                                'jumlah_hari_rawat_rs', DATEDIFF(js.tgl_keluar,js.tgl_masuk)
                            ) ORDER BY js.tgl_masuk SEPARATOR ','
                        )
                    ,']'
                )
                END rawat_jalan_rincian,
                CASE 
                WHEN jsd.id IS NOT NULL
                THEN
                    CONCAT(
                        '[',
                            GROUP_CONCAT(DISTINCT
                                JSON_OBJECT(    
                                        'id', jsd.id,
                                        'id_rajal', jsd.id_rajal,
                                        'kode_dokter', jsd.kode_dokter,
                                        'nama_dokter', jsd.nama_dokter,
                                        'nama_unit',jsd.nama_unit,
                                        'qty', jsd.qty,
                                        'type', jsd.type,
                                        'nama_type', jsd.nama_type,
										'jumlah_jasa', jsd.jumlah_jasa
                                ) ORDER BY jsd.type SEPARATOR ','
                            )
                        ,']'
                    )
                END rawat_jalan_dokter,
                CONCAT('[\"',GROUP_CONCAT(DISTINCT jsd.type ORDER BY jsd.type ASC SEPARATOR '\",\"'),'\"]') json,
                CASE
                WHEN jsd.id IS NOT NULL
                THEN
                    (SELECT 
                        CONCAT('[',
                            GROUP_CONCAT(JSON_OBJECT(
                                'id',id,'parameter',parameter,'pendapatan',persentase_pendapatan,'pelayanan',persentase_pelayanan,'pelayanan_non_medis',persentase_pelayanan_non_medis,'direct',persentase_direct,'indirect',persentase_indirect,'reward',persentase_reward,'pelayanan_non_medis',persentase_pelayanan_non_medis
                            ) ORDER BY JSON_EXTRACT(parameter, '$.16') DESC LIMIT 1),']') AS Param 
                        FROM jasa_ref_type_jaspel
                        WHERE jenis=js.kodetindakan AND periode=js.periode
                            AND JSON_CONTAINS(JSON_KEYS(parameter),CONCAT('[\"',GROUP_CONCAT(DISTINCT jsd.type ORDER BY jsd.type ASC SEPARATOR '\",\"'),'\"]'),'$') 
                            AND op_lebih_dari_dua = 0
                    )
                ELSE
                    (SELECT 
                        CONCAT('[',
                            GROUP_CONCAT(JSON_OBJECT(
                                'id',id,'parameter',parameter,'pendapatan',persentase_pendapatan,'pelayanan',persentase_pelayanan,'pelayanan_non_medis',persentase_pelayanan_non_medis,'direct',persentase_direct,'indirect',persentase_indirect,'reward',persentase_reward,'pelayanan_non_medis',persentase_pelayanan_non_medis
                            ) ORDER BY JSON_EXTRACT(parameter, '$.16') DESC LIMIT 1),']') AS Param 
                        FROM jasa_ref_type_jaspel
                        WHERE jenis=js.kodetindakan AND periode=js.periode
                    )
                END sk
            FROM jasa_rajal js
            JOIN pasien ps ON ps.no_rm=js.no_rm 
            LEFT JOIN (
                SELECT rjr.id,rjr.id_rajal,rjr.no_rm,rjr.kode_unit,unt.nama_unit,rjr.tgl_masuk,rjr.tgl_keluar,DATEDIFF(rjr.tgl_keluar,rjr.tgl_masuk) hari_rawat_unit 
                FROM jasa_rajal_rincian rjr
                JOIN (SELECT kode_unit,nama_unit FROM munit WHERE kelompok_unit IN ('POLI','PENUNJANG')) unt ON unt.kode_unit=rjr.kode_unit
            ) rincian ON rincian.id_rajal=js.id 
            LEFT JOIN (
                SELECT rjd.id,rjd.id_rajal,rjd.kode_dokter,dkter.nama_dokter,rjd.qty,rjd.type,rjt.nama_type,unt.nama_unit,rjd.jumlah_jasa
                FROM jasa_rajal_dokter rjd
                JOIN (SELECT id,kode_dokter,nama_dokter FROM mdokter WHERE kategori='DOKTER') dkter ON dkter.kode_dokter=rjd.kode_dokter
                JOIN (SELECT id,deskripsi as nama_type FROM jasa_ref_jenis_tindakan WHERE jenis_rawat='RAJAL') rjt ON rjt.id=rjd.type
                LEFT JOIN munit unt ON unt.kode_unit=rjd.kode_unit
            ) jsd ON jsd.id_rajal=js.id
            WHERE js.id='$id'
            GROUP BY js.no_rm
            ORDER BY js.tgl_masuk , js.tgl_keluar");

        $q = $query->result_array();
    
		// var_dump($q);
		// exit;
        $result = array();
        foreach ($q as $w)
        {
            if ($w['kode_golongan']=='6') {
                $klaim_inacbg = ($w['klaim_inacbg_fix'] <= 0 ) ? $w['klaim_inacbg'] : $w['klaim_inacbg_fix'];
            } else {
                $klaim_inacbg = $w['klaim'];
            }

			$klaim_rs = $w['klaim_rs'];
			$selisih = $klaim_inacbg - $klaim_rs;

			$jasa_direct = 0;
			$jasa_indirect = 0;
			$jasa_reward = 0;
            
            $jasapelayanan = 0;
            $persentase_pendapatan = 0;
            $persentase_pelayanan = 0;
            $persentase_pelayanan_non_medis = 0;
            $persentase_direct = 0;
            $persentase_indirect = 0;
            $persentase_reward = 0;
            $parameter = [];
            $sk = json_decode($w['sk'],true);
            if (isset($sk[0]))
            {
                $persentase_pendapatan = $sk[0]['pendapatan'];
                $persentase_pelayanan = $sk[0]['pelayanan'];
                $persentase_pelayanan_non_medis = $sk[0]['pelayanan_non_medis'];
				if ($w['kode_golongan']=='6') {
					$persentase_direct = $sk[0]['direct'];
					$persentase_reward = $sk[0]['reward'];
				} else {
                	$persentase_direct = $sk[0]['direct'] + $sk[0]['reward'];
				}
                $persentase_indirect = $sk[0]['indirect'];
                $parameter = json_decode($sk[0]['parameter'], true);
            }

            $pendapatan = ($klaim_inacbg * $persentase_pendapatan) / 100;
            $jasapelayanan = ($klaim_inacbg * $persentase_pelayanan) / 100;
			$jasa_non_medis = ceil(($klaim_inacbg * $persentase_pelayanan_non_medis) / 100);

			// get direct
			$jasa_direct = ceil(($jasapelayanan * $persentase_direct) / 100);
			// get indirect
			$jasa_indirect = ceil(($jasapelayanan * $persentase_indirect) / 100);
			// get reward
			// if ($selisih>0) 
			$jasa_reward = ceil(($jasapelayanan * $persentase_reward) / 100);

            $wdokter = json_decode($w['rawat_jalan_dokter'], true);
            $resultdokter = array();
            if ($wdokter)
            {
                //mencari sisa persen untuk dpjp dan operator
                $p = 0;
                foreach ($wdokter as $d)
                {
                    $persen_terpakai = (isset($parameter[$d['type']])) ? $parameter[$d['type']] : 0;
                    if (! in_array($d['type'],[11]))
                    {
                        $p = $p + $persen_terpakai;
                    }
                }
                //batas mencari sisa persen untuk dpjp dan operator
                $jasadibagi = 0;
                $jasaditerima = 0;
                foreach ($wdokter as $d)
                {
					if ($w['kode_golongan']=='6') {
                    	$jasadibagi = ceil(($jasapelayanan * $persentase_direct) / 100);
						$jasabelumdibagi = $jasadibagi;
					} else {
						$jasabelumdibagi = ($d['jumlah_jasa'] * $persentase_pelayanan) / 100;
						$jasadibagi = ceil(($jasabelumdibagi * $persentase_direct) / 100);
					}

                    $persentase_diterima = (isset($parameter[$d['type']])) ? $parameter[$d['type']] : 0;
                    if ($d['type']==11)
                    {
						if ($w['kode_golongan']==6) {
							$sisa_persen = (isset($parameter[$d['type']])) ? $parameter[$d['type']] - $p : 0;
                        	$jasaditerima = ($jasadibagi * $sisa_persen) / 100;
						} else {
							$sisa_persen = (isset($parameter[$d['type']])) ? $parameter[$d['type']] - $p : 0;
                        	$jasaditerima = ($jasadibagi * 100) / 100;
						}
                        
                    } else {
						if ($w['kode_golongan']==6) {
							$jasaditerima = ceil(($jasadibagi * $persentase_diterima) / 100);
						} else {
							$jasaditerima = ceil(($jasadibagi * 100) / 100);
						}
                    }

                    $resultdokter[] = [
                        "id" => $d['id'],
                        "id_rajal" => $d['id_rajal'],
                        "kode_dokter" => $d['kode_dokter'],
                        "nama_dokter" => $d['nama_dokter'],
                        "nama_unit" => $d['nama_unit'],
                        "qty" => $d['qty'],
                        "id_type" => $d['type'],
                        "type" => $d['nama_type'],
                        "jasa_dibagi" => ceil($jasabelumdibagi),
                        "jasa_diterima" => ceil($jasaditerima),
						"jasa_direct" => ceil($jasa_direct),
						"jasa_indirect" => ceil($jasa_indirect),
						"jasa_reward" => ceil($jasa_reward),
						"jasa_non_medis" => ceil($jasa_non_medis),
						"persentase_direct" => $persentase_diterima,
                    ];
                }
            }

            $result['id_rajal'] = $w['id_rajal'];
            $result['no_rm'] = $w['no_rm'];
            $result['nama_pasien'] = $w['nama_pasien'];
            $result['data_rincian_unit'] = json_decode($w['rawat_jalan_rincian']);
            $result['data_rincian_dokter'] = $resultdokter;
        }

        return $result;
    }

    public function get_rincian_unit()
    {
        $id_rajal = $this->input->post('id_rajal');

        $query = $this->db->query("SELECT rjr.id,rjr.id_rajal,rjr.no_rm,rjr.kode_unit,unt.nama_unit,rjr.tgl_masuk,rjr.tgl_keluar,DATEDIFF(rjr.tgl_keluar,rjr.tgl_masuk) hari_rawat_unit,rj.tgl_masuk as tgl_masuk_rs,rj.tgl_keluar as tgl_keluar_rs,DATEDIFF(rj.tgl_keluar,rj.tgl_masuk) hari_rawat_rs
            FROM jasa_rajal_rincian rjr
            JOIN (SELECT kode_unit,nama_unit FROM munit WHERE kelompok_unit IN ('POLI','PENUNJANG')) unt ON unt.kode_unit=rjr.kode_unit
            JOIN (SELECT id,tgl_masuk,tgl_keluar FROM jasa_rajal) rj ON rj.id=rjr.id_rajal
            WHERE rjr.id_rajal='$id_rajal'");

        return $query->result_array();
    }

    public function get_rincian_dokter()
    {
        $id_rajal = $this->input->post('id_rajal');

        $this->db->from("jasa_rajal_dokter");
        $this->db->where("id_rajal", $id_rajal);
        $this->db->get();

        return  $result->result_array();
    }

    public function get_golongan_by_rajal($id_rajal)
    {
        $this->db->select('kode_golongan');
        $this->db->from("jasa_rajal");
        $this->db->where("id", $id_rajal);
        $this->db->limit(1);
        $w = $this->db->get()->row();

        if (! $w) {
            $this->db->from('jasa_rajal_dokter_umum');
            $this->db->where("id", $id_rajal);
            $this->db->limit(1);

            $w = $this->db->get()->row();
        }
        if ($w)
            return $w->kode_golongan;

        return 0;
    }

    public function edit()
    {
        $id = $this->input->post("id");
		$this->db->from("jasa_rajal");
		$this->db->where("id", $id);
		$this->db->limit(1);
		$data = $this->db->get();
        return $data->row();
    }

    public function edit_rincian_rajal_unit()
    {
        $id = $this->input->post("id");
        $this->db->from("jasa_rajal_rincian");
        $this->db->select("id,id_rajal,no_rm,kode_unit,tgl_masuk,tgl_keluar");
		$this->db->where("id", $id);
		$this->db->limit(1);
		$data = $this->db->get();
        return $data->row();
    }

    public function edit_rincian_rajal_dokter()
    {
        $id = $this->input->post("id");
        $this->db->from("jasa_rajal_dokter");
        $this->db->select("id,id_rajal,no_rm,kode_dokter,type,qty");
		$this->db->where("id", $id);
		$this->db->limit(1);
		$data = $this->db->get();
        return $data->row();
    }

    public function update()
    {
        $id = $this->input->post("id");

        $data = array();
        $data['tgl_masuk'] = date('Y-m-d', strtotime($this->input->post('tgl_masuk')));
        $data['klaim_inacbg'] = (int)$this->input->post('klaim_inacbg');
        $data['klaim_rs'] = (int)$this->input->post('klaim_rs');
        $data['nosep'] = ($this->input->post('nosep')) ? $this->input->post('nosep') : '';
        $data['jasapelayanan'] = ($this->input->post('jasa_pelayanan')) ? $this->input->post('jasa_pelayanan') : 0;
        $data['kodetindakan'] = ($this->input->post('kode_tindakan')) ? $this->input->post('kode_tindakan') : 'RJ';
        $data['register'] = ($this->input->post('register')) ? (int)$this->input->post('register') : 0;
        $data['obat'] = ($this->input->post('obat')) ? (int)$this->input->post('obat') : 0;
        $data['bhp'] = ($this->input->post('bhp')) ? (int)$this->input->post('bhp') : 0;
        $data['alkes'] = ($this->input->post('alkes')) ? (int)$this->input->post('alkes') : 0;
        $data['diagnosa'] = ($this->input->post('diagnosa')) ? $this->input->post('diagnosa') : '';
		$data['tgl_keluar'] = ($this->input->post('tgl_keluar')) ? date('Y-m-d',strtotime($this->input->post('tgl_keluar'))) : '1900-01-01';

        $this->db->from('jasa_rajal');
        $this->db->where("id", $id);
        $this->db->limit(1);
		$result = $this->db->update("jasa_rajal", $data);
		return $result;
    }

    public function update_rincian_rajal_unit()
    {
        $id = $this->input->post("id");

        $data = array();
        $data['kode_unit'] = $this->input->post('kode_unit');
        $data['tgl_masuk'] = $this->input->post('tgl_masuk');
        $data['tgl_keluar'] = $this->input->post('tgl_keluar');

        $this->db->from('jasa_rajal_rincian');
        $this->db->where("id", $id);
        $this->db->limit(1);
		$result = $this->db->update("jasa_rajal_rincian", $data);
		return $result;
    }

    public function update_rincian_rajal_dokter()
    {
        $id = $this->input->post("id");

        $data = array();
        $data['kode_dokter'] = $this->input->post('kode_dokter');
        $data['kode_unit'] = ($dt['kode_unit']) ? $dt['kode_unit'] : '';
        $data['jumlah_jasa'] = ($dt['nilai']) ? $dt['nilai'] : 0;
        $data['type'] = $this->input->post('type');
        $data['qty'] = $this->input->post('qty');

        $this->db->from('jasa_rajal_dokter');
        $this->db->where("id", $id);
        $this->db->limit(1);
		$result = $this->db->update("jasa_rajal_dokter", $data);
		return $result;
    }

    public function delete()
    {
        $id = $this->input->post("id");
        $this->db->from('jasa_rajal');
        $this->db->where("id", $id);
        $this->db->limit(1);
		$result = $this->db->delete();
		return $result;
    }

    public function delete_rincian_rajal_unit()
    {
        $id = $this->input->post("id");
        $this->db->from('jasa_rajal_rincian');
        $this->db->where("id", $id);
        $this->db->limit(1);
		$result = $this->db->delete();
		return $result;
    }

    public function delete_rincian_rajal_dokter()
    {
        $id = $this->input->post("id");

        $this->db->from('jasa_rajal_dokter');
        $this->db->where("id", $id);
        $this->db->limit(1);

		$result = $this->db->delete();
		return $result;
    }

    public function render_file($sheet_data)
    {
        $result = array();
        foreach($sheet_data as $key => $val) {
            if($key > 1) {
                $result[$val[1]] = [
                    'tgl_verifikasi' => $val[2],
                    'rill_rs' => str_replace(',','',$val[3]),
                    'diajukan' => str_replace(',','',$val[4]),
                    'disetujui' => str_replace(',','',$val[5])
                ];
            }
        }
        return $result;
    }

	private function render_table($data)
	{
		$result = array();
		foreach ($data as $w)
		{
			$result[$w['nosep']] = [
				'id' => $w['id'],
				'no_rm' => $w['no_rm'],
				'nama_pasien' => $w['nama_pasien'],
				'klaim_inacbg' => $w['klaim_inacbg']
			];
		}
		return $result;
	}

	public function proses_data_sep($bulan,$tahun,$data_excel)
    {
        $this->db->select('rj.id,rj.no_rm,ps.nama_pasien,rj.nosep,rj.klaim_inacbg');
        $this->db->from('jasa_rajal as rj');
        $this->db->join('pasien as ps', 'ps.no_rm  = rj.no_rm');  
        $this->db->where('MONTH(rj.tgl_keluar)',$bulan);
        $this->db->where('YEAR(rj.tgl_keluar)',$tahun);
        $this->db->where('rj.nama_golongan','BPJS');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
			$table_data = $this->render_table($query->result_array());

            $data = array();
            $data_to_update = array();
			$data_to_insert = array();

            foreach ($data_excel as $key => $val) 
            {
				$validasi = (isset($table_data[$key])) ? $table_data[$key] : 'no sep tidak ada' ;
				$ada_sep = (isset($table_data[$key])) ? true : false ;

                $data[] = [
                    'no_rm' => (isset($table_data[$key]['no_rm'])) ? $table_data[$key]['no_rm'] : null,
                    'nama_pasien' => (isset($table_data[$key]['nama_pasien'])) ? $table_data[$key]['nama_pasien'] : null,
                    'no_sep' => $key,
                    'ada_sep' => $ada_sep,
                    'klaim_inacbg_diinput' => (isset($table_data[$key]['klaim_inacbg'])) ? $table_data[$key]['klaim_inacbg'] : null,
                    'klaim_inacbg_diajukan' => $val['diajukan'],
                    'klaim_inacbg_disetuji' => $val['disetujui'],
                    'tgl_verifikasi' => $val['tgl_verifikasi'],
                    'validasi' => $validasi
                ];

				if (isset($table_data[$key])) {
                    $data_to_update[] = [
                        'id' => $table_data[$key]['id'],
                        'klaim_inacbg_fix' => $val['disetujui']
                    ];
                } else {
					$data_to_insert[] = [
						'kode_golongan' => 6,
						'nama_golongan' => 'BPJS',
						'tgl_masuk' => "$tahun-$bulan-01",
						'tgl_keluar' => "$tahun-$bulan-01", 
						'no_rm' => '00',
						'nosep' => $key,
						'kode_unit' => '',
						'nama_unit' => '',
						'klaim_inacbg' => $val['disetujui'],
						'klaim_rs' => $val['rill_rs'],
						'klaim_inacbg_fix' => $val['disetujui'],
						'jasapelayanan' => 0,
						'kodetindakan' => 'RJ',
						'kode_dokter_dpjp' => '',
						'nama_dokter_dpjp' => '',
						'register' => 0,
						'obat' => 0,
						'bhp' => 0,
						'alkes' => 0,
						'diagnosa' => '',
						'periode' => $tahun,
						'tutup' => 0
					];
				}
            }

			$this->db->update_batch('jasa_rajal',$data_to_update, 'id'); 

			$this->db->insert_batch('jasa_rajal', $data_to_insert); 

            return $data;
        } else {
            return [];
        }
    }

    public function proses_data_sep_old($bulan,$tahun,$data_excel)
    {
        $this->db->select('rj.id,rj.no_rm,ps.nama_pasien,rj.nosep,rj.klaim_inacbg');
        $this->db->from('jasa_rajal as rj');
        $this->db->join('pasien as ps', 'ps.no_rm  = rj.no_rm');  
        $this->db->where('MONTH(rj.tgl_keluar)',$bulan);
        $this->db->where('YEAR(rj.tgl_keluar)',$tahun);
        $this->db->where('rj.nama_golongan','BPJS');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = array();
            $data_to_update = array();
            foreach ($query->result_array() as $val) 
            {
                $validasi = (isset($data_excel[$val['nosep']])) ? $data_excel[$val['nosep']] : 'no sep tidak ada' ;
                $ada_sep = (isset($data_excel[$val['nosep']])) ? true : false ;
                $klaim_inacbg_diajukan = (isset($data_excel[$val['nosep']])) ? $data_excel[$val['nosep']]['diajukan'] : 0 ;
                $klaim_inacbg_disetujui = (isset($data_excel[$val['nosep']])) ? $data_excel[$val['nosep']]['disetujui'] : 0 ;
                $tgl_verifikasi = (isset($data_excel[$val['nosep']])) ? $data_excel[$val['nosep']]['tgl_verifikasi'] : '-' ;

                $data[] = [
                    'no_rm' => $val['no_rm'],
                    'nama_pasien' => $val['nama_pasien'],
                    'no_sep' => $val['nosep'],
                    'ada_sep' => $ada_sep,
                    'klaim_inacbg_diinput' => $val['klaim_inacbg'],
                    'klaim_inacbg_diajukan' => $klaim_inacbg_diajukan,
                    'klaim_inacbg_disetuji' => $klaim_inacbg_disetujui,
                    'tgl_verifikasi' => $tgl_verifikasi,
                    'validasi' => $validasi
                ];

                if (isset($data_excel[$val['nosep']])) {
                    $data_to_update[] = [
                        'id' => $val['id'],
                        'klaim_inacbg_fix' => $data_excel[$val['nosep']]['disetujui']
                    ];
                }
            }

            $this->db->update_batch('jasa_rajal',$data_to_update, 'id'); 

            return $data;
        } else {
            return [];
        }
    }

	public function get_rekap_rajal($strwhr='')
    {
        $query = $this->db->query("SELECT js.id as id_rajal,js.nosep,js.klaim_inacbg,js.klaim_inacbg_fix,js.klaim_rs,js.obat,js.alkes,js.bhp,js.kode_golongan,js.nama_golongan,
						CASE
						WHEN jsd.id IS NOT NULL
						THEN
								
							(SELECT 
									CONCAT('[',
											GROUP_CONCAT(JSON_OBJECT(
													'id',id,'parameter',parameter,'pendapatan',persentase_pendapatan,'pelayanan',persentase_pelayanan,'pelayanan_non_medis',persentase_pelayanan_non_medis,'direct',persentase_direct,'indirect',persentase_indirect,'reward',persentase_reward
											) ORDER BY JSON_EXTRACT(parameter, '$.16') DESC LIMIT 1),']') AS Param 
									FROM jasa_ref_type_jaspel
									WHERE jenis=js.kodetindakan AND periode=js.periode
											AND JSON_CONTAINS(JSON_KEYS(parameter),CONCAT('[\"',GROUP_CONCAT(DISTINCT jsd.type ORDER BY jsd.type ASC SEPARATOR '\",\"'),'\"]'),'$') 
											AND op_lebih_dari_dua = 0
							)
						ELSE
								(SELECT 
										CONCAT('[',
												GROUP_CONCAT(JSON_OBJECT(
														'id',id,'parameter',parameter,'pendapatan',persentase_pendapatan,'pelayanan',persentase_pelayanan,'pelayanan_non_medis',persentase_pelayanan_non_medis,'direct',persentase_direct,'indirect',persentase_indirect,'reward',persentase_reward
												) ORDER BY JSON_EXTRACT(parameter, '$.16') DESC LIMIT 1),']') AS Param 
										FROM jasa_ref_type_jaspel
										WHERE jenis=js.kodetindakan AND periode=js.periode
								)
						END sk
						FROM jasa_rajal js
						LEFT JOIN (
								SELECT rjd.id,rjd.id_rajal,rjd.kode_dokter,rjd.qty,rjd.type
								FROM jasa_rajal_dokter rjd
						) jsd ON jsd.id_rajal=js.id
						$strwhr
						GROUP BY js.id
						ORDER BY js.nosep,js.tgl_masuk");
        
        $total_klaim_inacbg_bpjs = 0;
        $total_obat_bpjs = 0;
        $total_alkes_bpjs = 0;
        $total_bhp_bpjs = 0;
        $total_jasa_pelayanan_bpjs = 0;
        $total_jasa_medis_bpjs = 0;
        $total_jasa_direct_bpjs = 0;
        $total_jasa_indirect_bpjs = 0;
        $total_jasa_reward_bpjs = 0;
        $total_jasa_non_medis_bpjs = 0;

        $total_klaim_inacbg_non_bpjs = 0;
        $total_obat_non_bpjs = 0;
        $total_alkes_non_bpjs = 0;
        $total_bhp_non_bpjs = 0;
        $total_jasa_pelayanan_non_bpjs = 0;
        $total_jasa_medis_non_bpjs = 0;
        $total_jasa_direct_non_bpjs = 0;
        $total_jasa_indirect_non_bpjs = 0;
        $total_jasa_reward_non_bpjs = 0;
        $total_jasa_non_medis_non_bpjs = 0;

        $q = $query->result_array();
        $result = array();

        foreach ($q as $w)
        {
            $jasa_direct = 0;
            $jasa_indirect = 0;
            $jasa_reward = 0;
            $jasa_non_medis = 0;

            $klaim_inacbg = $w['klaim_inacbg'];
            $pengurang = (int)$w['obat'] + (int)$w['alkes'] + (int)$w['bhp'];

            if ($w['kode_golongan']!='6') {
                $klaim_inacbg = $klaim_inacbg - $pengurang;
            } elseif ($w['kode_golongan']=='6') {
                $klaim_inacbg = ($w['klaim_inacbg_fix'] >=1 )  ? $w['klaim_inacbg_fix'] : $klaim_inacbg;
            }

            $obat = (int)$w['obat'];
            $alkes = (int)$w['alkes'];
            $bhp = (int)$w['bhp'];

            $jasapelayanan = 0;
            $persentase_pendapatan = 0;
            $persentase_pelayanan = 0;
            $persentase_direct = 0;
            $persentase_indirect = 0;
            $persentase_reward = 0;
            $sk = json_decode($w['sk'],true);
            if ($sk[0])
            {
                $persentase_pendapatan = $sk[0]['pendapatan'];
                $persentase_pelayanan = $sk[0]['pelayanan'];
                $persentase_pelayanan_non_medis = $sk[0]['pelayanan_non_medis'];
                $persentase_direct = $sk[0]['direct'];
                $persentase_indirect = $sk[0]['indirect'];
                $persentase_reward = $sk[0]['reward'];
                
            }

            $pendapatan = ($klaim_inacbg * $persentase_pendapatan) / 100;
            $jasapelayanan = ($klaim_inacbg * $persentase_pelayanan) / 100;
            $jasa_non_medis = ($klaim_inacbg * $persentase_pelayanan_non_medis) / 100;

            if ($w['kode_golongan']!='6') {
                $persentase_direct = $persentase_direct + $persentase_reward;
                $persentase_reward = 0 ;
            }
			

            $jasa_direct = ($jasapelayanan * $persentase_direct) / 100;
            $jasa_indirect = ($jasapelayanan * $persentase_indirect) / 100;
            $jasa_reward = ($jasapelayanan * $persentase_reward) / 100;


            if ($w['kode_golongan']=='6') {
                $total_klaim_inacbg_bpjs = $total_klaim_inacbg_bpjs + $klaim_inacbg;
                $total_obat_bpjs = $total_obat_bpjs + $obat;
                $total_alkes_bpjs = $total_alkes_bpjs + $alkes;
                $total_bhp_bpjs = $total_bhp_bpjs + $bhp;
                $total_jasa_pelayanan_bpjs = $total_jasa_pelayanan_bpjs + $pendapatan;
                $total_jasa_medis_bpjs = $total_jasa_medis_bpjs + $jasapelayanan;
                $total_jasa_non_medis_bpjs = $total_jasa_non_medis_bpjs + $jasa_non_medis;
                $total_jasa_direct_bpjs = $total_jasa_direct_bpjs + $jasa_direct;
                $total_jasa_indirect_bpjs = $total_jasa_indirect_bpjs + $jasa_indirect;
                // $total_jasa_reward_bpjs = round($total_jasa_reward_bpjs + $jasa_reward);
                $total_jasa_reward_bpjs = $total_jasa_reward_bpjs + $jasapelayanan - ($jasa_direct + $jasa_indirect);
            } else {
                $total_klaim_inacbg_non_bpjs = $total_klaim_inacbg_non_bpjs + $klaim_inacbg;
                $total_obat_non_bpjs = $total_obat_non_bpjs + $obat;
                $total_alkes_non_bpjs = $total_alkes_non_bpjs + $alkes;
                $total_bhp_non_bpjs = $total_bhp_non_bpjs + $bhp;
                $total_jasa_pelayanan_non_bpjs = $total_jasa_pelayanan_non_bpjs + $pendapatan;
                $total_jasa_medis_non_bpjs = $total_jasa_medis_non_bpjs + $jasapelayanan;
                $total_jasa_non_medis_non_bpjs = $total_jasa_non_medis_non_bpjs + $jasa_non_medis;
                $total_jasa_direct_non_bpjs = $total_jasa_direct_non_bpjs + ($jasa_direct + $jasa_reward);
                $total_jasa_indirect_non_bpjs = $total_jasa_indirect_non_bpjs + $jasa_indirect;
                // $total_jasa_reward_non_bpjs = round($total_jasa_reward_non_bpjs + $jasa_reward);
                $total_jasa_reward_non_bpjs = 0;
            }
        }

        $result = [
            'jasa_bpjs' => [
                'total_klaim_inacbg' => ceil($total_klaim_inacbg_bpjs),
                'total_obat' => ceil($total_obat_bpjs),
                'total_alkes' => ceil($total_alkes_bpjs),
                'total_bhp' => ceil($total_bhp_bpjs),
                'total_jasa_pelayanan' => ceil($total_jasa_pelayanan_bpjs),
                'total_jasa_medis' => ceil($total_jasa_medis_bpjs),
                'total_jasa_direct' => ceil($total_jasa_direct_bpjs),
                'total_jasa_indirect' => ceil($total_jasa_indirect_bpjs),
                'total_jasa_reward' => ceil($total_jasa_reward_bpjs),
                'total_jasa_non_medis' => ceil($total_jasa_non_medis_bpjs)
            ],
            'jasa_non_bpjs' => [
                'total_klaim_rs' => ceil($total_klaim_inacbg_non_bpjs),
                'total_obat' => ceil($total_obat_non_bpjs),
                'total_alkes' => ceil($total_alkes_non_bpjs),
                'total_bhp' => ceil($total_bhp_non_bpjs),
                'total_jasa_pelayanan' => ceil($total_jasa_pelayanan_non_bpjs),
                'total_jasa_medis' => ceil($total_jasa_medis_non_bpjs),
                'total_jasa_direct' => ceil($total_jasa_direct_non_bpjs),
                'total_jasa_indirect' => ceil($total_jasa_indirect_non_bpjs),
                'total_jasa_reward' => ceil($total_jasa_reward_non_bpjs),
                'total_jasa_non_medis' => ceil($total_jasa_non_medis_non_bpjs),
                // 'persen_reward' => $w['nama_golongan']
            ]
        ];
        return $result;
    }

	public function get_rekap_jasa_dokter()
    {
        $total_dpjp = 0;
        $total_anastesi = 0;
        $total_konsul = 0;
        $total_lab_pk = 0;
        $total_lab_pa = 0;
        $total_radiologi = 0;
        $total_ct_scan = 0;

        $total_direct = 0;
        $total_indirect = 0;
        $total_reward = 0;
        $total_jasa_dokter = 0;

        $whr = array();
		$whr_str_indirect = '';
		$src_gol = '';
		$tgl = date('m');

        $whr[] = "dk.kategori='DOKTER'";
		$whr[] = "dk.status='1'";

        if ($this->input->post('jasa_pelayanan')) {
			// $whr[] = "js.kode_golongan = '".$this->input->post('jasa_pelayanan')."'";
			$src_gol = "js.kode_golongan='".$this->input->post('jasa_pelayanan')."'";
		}
        if ($this->input->post('kode_unit'))
            $whr[] = "js.kode_unit= '".$this->input->post('kode_unit')."'";
        if ($this->input->post('tgl_masuk') && $this->input->post('tgl_keluar')) {
			$whr_str_indirect = "(js.tgl_keluar BETWEEN '".date('Y-m-d',strtotime($this->input->post('tgl_masuk')))."' AND '".date('Y-m-d',strtotime($this->input->post('tgl_keluar')))."')";
			$tgl = date('m', strtotime('tgl_masuk'));
		}
            

        if ($this->input->post('nama_dokter'))
            $whr[] = "(dk.nama_dokter LIKE '%".$this->input->post('nama_dokter')."%')";

        $strwhr = ($whr) ? "WHERE " . implode(' AND ', $whr) : "";

		$whr_str_indirect = ($whr_str_indirect!='') ? 'WHERE ' . $whr_str_indirect : '';
		$whr_str_indirect = ($src_gol!='') ? $whr_str_indirect . ' AND ' . $src_gol : $whr_str_indirect;

		//var_dump($whr_str_indirect);
		//exit;

        $query = $this->db->query("SELECT dk.id AS id_dokter,dk.kode_dokter,dk.nama_dokter,dk.kualifikasi,dk.type_dokter,
			COALESCE(sum(js.klaim_inacbg),0) as total_klaim_inacbg,COALESCE(sum(js.klaim_inacbg_fix),0) as total_klaim_inacbg_fix,COALESCE(sum(js.klaim_rs),0) as total_klaim_rs,
			CASE WHEN ref.id_dokter IS NOT NULL THEN 1 ELSE 0 END dapat_reward, 
			CASE WHEN ref.id_dokter IS NOT NULL THEN ref.persentase ELSE 0 END persen_reward, 
			(SELECT COUNT(id) FROM mdokter WHERE kualifikasi='SPESIALIS' AND kategori='DOKTER' AND bagian!='') AS jumlah_spesialis,
			(SELECT COUNT(id) FROM mdokter WHERE kualifikasi='UMUM' AND kategori='DOKTER' AND bagian!='') AS jumlah_umum,
			(SELECT COUNT(id) FROM mdokter WHERE kategori='DOKTER' AND bagian!='' AND type_dokter='1') AS jumlah_dokter_tamu,
			(SELECT COUNT(*)
				FROM (
					SELECT dk.id,dk.kode_dokter,dk.nama_dokter,sum(js.klaim_inacbg) as klaim_inacbg,sum(js.klaim_rs) as klaim_rs, 
						(sum(js.klaim_inacbg) - sum(js.klaim_rs)) as selisih
					FROM mdokter dk
					LEFT JOIN (
						SELECT js.nama_golongan,js.kode_unit,js.klaim_inacbg,js.klaim_inacbg_fix,js.klaim_rs,
							js.tgl_masuk,js.tgl_keluar,jdd.kode_dokter
						FROM jasa_rajal_diterima_dokter jdd
						JOIN jasa_rajal js ON js.id=jdd.id_rajal
						$whr_str_indirect
						GROUP BY jdd.kode_dokter,id_type 
						ORDER BY jdd.kode_dokter
					) js ON js.kode_dokter=dk.kode_dokter
				WHERE dk.kategori='DOKTER' AND dk.bagian!='' AND dk.type_dokter='1'
				GROUP BY dk.id ) d_tamu WHERE selisih > 0
			) AS jumlah_dokter_tamu_untung,
			(SELECT COUNT(ref.id) FROM jasa_referensi_struktural ref JOIN mdokter d ON d.id=ref.id_dokter WHERE d.kategori='DOKTER') AS jumlah_struktural,
			(SELECT SUM(jsp.indirect) 
				FROM jasa_rajal_pelayanan jsp
				JOIN jasa_rajal js ON js.id=jsp.id_rajal
				$whr_str_indirect
			) AS jumlah_jasa_indirect,
			(SELECT SUM(jsp.reward) 
				FROM jasa_rajal_pelayanan jsp
				JOIN jasa_rajal js ON js.id=jsp.id_rajal
				$whr_str_indirect
			) AS jumlah_jasa_reward,
			(SELECT SUM(jsp.non_medis) 
				FROM jasa_rajal_pelayanan jsp
				JOIN jasa_rajal js ON js.id=jsp.id_rajal
				$whr_str_indirect
			) AS jumlah_jasa_non_medis,
            CASE WHEN js.kode_dokter IS NOT NULL
            THEN
                CONCAT(
                    '[',
                        GROUP_CONCAT(DISTINCT
                            JSON_OBJECT(    
                                'id_type',js.id_type,'jumlah_jasa',js.jasa
                            ) ORDER BY js.id_type SEPARATOR ','
                        )
                    ,']'
                ) 
            END jasa
            FROM mdokter dk 
            LEFT JOIN (SELECT js.kode_golongan,js.nama_golongan,js.kode_unit,js.klaim_inacbg,js.klaim_inacbg_fix,js.klaim_rs,js.tgl_masuk,js.tgl_keluar,jdd.kode_dokter,jdd.id_type,jdd.jumlah_jasa_diterima,COALESCE(sum(jumlah_jasa_diterima),0) jasa
                FROM jasa_rajal_diterima_dokter jdd
                JOIN jasa_rajal js ON js.id=jdd.id_rajal
				$whr_str_indirect
                GROUP BY jdd.kode_dokter,id_type 
                ORDER BY jdd.kode_dokter
            ) js ON js.kode_dokter=dk.kode_dokter
			LEFT JOIN jasa_referensi_struktural ref ON ref.id_dokter=dk.id
            $strwhr
            GROUP BY dk.kode_dokter");
        
        $q = $query->result_array();

		// var_dump($q);
		// exit;
        $list_dokter = array();
        $n = 0;

		// persentase
		$persen_spesialis = 70;
		$persen_umum = 30;

		$persen_reward_dokter_tamu = 21;
		// $persen_reward_komite_medik = 8;
		// $persen_reward_komite_etik = 8;
		// $persen_reward_spi = 12;
		// $persen_reward_casemix = 40;

		$jumlah_indirect = 0;
		$jumlah_spesialis = 0;
		$jumlah_umum = 0;
		$jasa_spesialis = 0;
		$jasa_umum = 0;
		$jasa_reward = 0;

		$marks = array(11, 12, 13, 14, 15, 16, 17);

		foreach ($q as $w)
        {
            $direct = 0;
			$indirect = 0;
            $reward = 0;
            $n++;
			// indirect dan reward
			$jumlah_indirect = $w['jumlah_jasa_indirect'];
			$jumlah_reward = $w['jumlah_jasa_reward'];

			$jumlah_spesialis = $w['jumlah_spesialis'];
			$jumlah_umum = $w['jumlah_umum'];
			$jumlah_struktural = $w['jumlah_struktural'];
			$jumlah_dokter_tamu = $w['jumlah_dokter_tamu'];
			$jumlah_dokter_tamu_untung = $w['jumlah_dokter_tamu_untung'];

			// cari jasa indirect spesialis dan umum 
			$jasa_indirect_spesialis = ($jumlah_indirect * $persen_spesialis) / 100;
			$jasa_indirect_umum = ($jumlah_indirect * $persen_umum) / 100;

			// cari reward
			if ($w['type_dokter']=='1') { //dokter part timer
				$selisih = $w['total_klaim_inacbg'] - $w['total_klaim_rs'];
				$jasa_reward = ($jumlah_reward * $persen_reward_dokter_tamu) / 100; //21% untuk part timer
				// $reward = $jasa_reward / $jumlah_dokter_tamu;
				if ($selisih > 0)
					$reward = $jasa_reward / $jumlah_dokter_tamu_untung;
			} else {
				// cek jika dokter masuk sebagai komite , spi, casemix
				if ($w['dapat_reward']==1) {
					$jasa_reward = ($jumlah_reward * $w['persen_reward']) / 100; //masing - masing sesuai persentase dari table `jasa_referensi_struktural`
					$reward = $jasa_reward;
				}
			}


			if ($w['kualifikasi']=='SPESIALIS') {
				$indirect = $jasa_indirect_spesialis / $jumlah_spesialis;
			} elseif ($w['kualifikasi']=='UMUM' || $w['kualifikasi']=='GIGI') {
				$indirect = $jasa_indirect_umum / $jumlah_umum;
			}

            $list_jasa = ($w['jasa']) ? json_decode($w['jasa'], true) : null;
            $list_jasa_diterima = array();

            if ($list_jasa)
            {
                foreach ($list_jasa as $item)
                {

                    $direct = (in_array($item['id_type'], $marks)) ? $direct + $item['jumlah_jasa'] : $direct + 0;

                    $list_jasa_diterima[] = [
                        $item['id_type'] => $item['jumlah_jasa']
                    ];

                    $total_dpjp = ($item['id_type']==11) ? $total_dpjp + $item['jumlah_jasa'] : $total_dpjp + 0;
                    $total_anastesi = ($item['id_type']==13) ? $total_anastesi + $item['jumlah_jasa'] : $total_anastesi + 0;
                    $total_konsul = ($item['id_type']==12) ? $total_konsul + $item['jumlah_jasa'] : $total_konsul + 0;
                    $total_lab_pk = ($item['id_type']==14) ? $total_lab_pk + $item['jumlah_jasa'] : $total_lab_pk + 0;
                    $total_lab_pa = ($item['id_type']==15) ? $total_lab_pa + $item['jumlah_jasa'] : $total_lab_pa + 0;
                    $total_radiologi = ($item['id_type']==16) ? $total_radiologi + $item['jumlah_jasa'] : $total_radiologi + 0;
                    $total_ct_scan = ($item['id_type']==17) ? $total_ct_scan + $item['jumlah_jasa'] : $total_ct_scan + 0;
                }

                $list_jasa_diterima[]['direct'] = ceil($direct);
                $total_direct = $total_direct + $direct;
            } else {
				$list_jasa_diterima[]['direct'] = 0;
                $total_direct = $total_direct + 0;
			}

            $list_jasa_diterima[]['indirect'] = ceil($indirect);
            $total_indirect = $total_indirect + $indirect;

            $list_jasa_diterima[]['reward'] = ceil($reward);
            $total_reward = $total_reward + $reward;

            $sub_total_jasa_dokter = ceil($direct + $indirect + $reward);
            $list_jasa_diterima[]['sub_total_jasa_dokter'] = $sub_total_jasa_dokter;
            $total_jasa_dokter = ceil($total_jasa_dokter + $sub_total_jasa_dokter);

            $list_dokter[] = [
                'nomor' => $n,
                'nama_dokter' => $w['nama_dokter'],
                'list_jasa' => $list_jasa_diterima
            ];
        }

        $result = [
            'total_dpjp' => ceil($total_dpjp),
            // 'total_operator' => ceil($total_operator),
            'total_anastesi' => ceil($total_anastesi),
            'total_konsul' => ceil($total_konsul),
            // 'total_rawat_bersama' => ceil($total_rawat_bersama),
            'total_lab_pk' => ceil($total_lab_pk),
            'total_lab_pa' => ceil($total_lab_pa),
            'total_radiologi' => ceil($total_radiologi),
            'total_ct_scan' => ceil($total_ct_scan),
            'total_direct' => ceil($total_direct),
            'total_indirect' => ceil($total_indirect),
			'jasa_indirect' => ceil($jumlah_indirect),
			'jasa_reward' => ceil($jumlah_reward),
			'jasa_spesialis' => ceil($jasa_indirect_spesialis),
			'jasa_umum' => ceil($jasa_indirect_umum),
			'jumlah_dokter_spesialis' => ceil($jumlah_spesialis),
			'jumlah_dokter_umum' => ceil($jumlah_umum),
			'jumlah_dokter_tamu_untung' => ceil($jumlah_dokter_tamu_untung),
			'jumlah_dokter_tamu' => ceil($jumlah_dokter_tamu),
            'total_reward' => ceil($total_reward),
            'total_jasa' => ceil($total_jasa_dokter),
            'list_dokter' => json_encode($list_dokter)
        ];

        return $result;
    }
}
