<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jasamedikrawatinapmdl extends CI_Model {
    // public function get($strwhre = null)
    // {
    //     $whr = array();

    //     if ($this->input->post('jasa_pelayanan'))
    //         $whr[] = "kode_golongan = '".$this->input->post('jasa_pelayanan')."'";
    //     if ($this->input->post('kode_unit'))
    //         $whr[] = "kode_unit= '".$this->input->post('kode_unit')."'";
    //     if ($this->input->post('tgl_masuk'))
    //         $whr[] = "tgl_masuk = '".$this->input->post('tgl_masuk')."'";
    //     if ($this->input->post('tgl_keluar'))
    //         $whr[] = "tgl_keluar= '".$this->input->post('tgl_keluar')."'";

    //     $strwhr = ($whr) ? "WHERE " . implode(' AND ', $whr) : "";

    //     $query = $this->db->query("SELECT rj.id AS id_ranap,rj.tgl_masuk,rj.tgl_keluar,rj.kode_golongan,rj.no_rm,rj.nosep,rj.kode_unit,rj.nama_unit,
    //             rj.klaim_inacbg,rj.klaim_rs,rj.jasapelayanan,ps.nama_pasien,tdk.sub_type,tdk.persentase_pendapatan,tdk.json_pelayanan  
    //         FROM (SELECT * FROM jasa_ranap $strwhr) rj
    //         JOIN pasien ps ON ps.no_rm=rj.no_rm 
    //         LEFT JOIN 
    //         (SELECT tdk.id,tdk.idgolongan,tdk.kode_tindakan,tdk.sub_type,tj.persentase_pendapatan,tj.json_pelayanan 
    //             FROM jasa_ref_tindakan tdk
    //             JOIN jasa_ref_type_jaspel tj ON tj.id=tdk.type
    //         ) tdk ON tdk.kode_tindakan=rj.kodetindakan AND tdk.idgolongan=rj.kode_golongan
    //         $strwhre
    //         ORDER BY rj.tgl_masuk");
        
    //     $result = $query->result_array();
    //     $data = array();
    //     foreach ($result as $key => $w)
    //     {   
    //         $klaim_inacbg = $w['klaim_inacbg'];
    //         $persentase_pendapatan = ($w['persentase_pendapatan']) ? $w['persentase_pendapatan'] : 0;
    //         $hasil_pendapatan = ($klaim_inacbg * $persentase_pendapatan) / 100;

    //         $sub_type = $w['sub_type'];
    //         $pelayanan = ($w['json_pelayanan']) ? json_decode($w['json_pelayanan'], true) : '';
    //         $persen = ($w['json_pelayanan']) ? $pelayanan[$sub_type]['pelayanan'] : 0;

    //         $jasapelayanan = ($klaim_inacbg * $persen) / 100;

    //         $data[] = [
    //             "id_ranap" => $w['id_ranap'],
    //             "tgl_masuk" => $w['tgl_masuk'],
    //             "tgl_keluar" => $w['tgl_keluar'],
    //             "kode_golongan" => $w['kode_golongan'],
    //             "no_rm" => $w['no_rm'],
    //             "nosep" => $w['nosep'],
    //             "kode_unit" => $w['kode_unit'],
    //             "nama_unit" => $w['nama_unit'],
    //             "klaim_inacbg" => $w['klaim_inacbg'],
    //             "klaim_rs" => $w['klaim_rs'],
    //             "jasapelayanan" => $jasapelayanan,
    //             "nama_pasien" => $w['nama_pasien'],
    //             "sub_type" => $w['sub_type'],
    //             "json_pelayanan" => $jasapelayanan
    //         ];
    //     }

    //     return $data;
    //     // exit;
    //     // return $query->result_array();
    // }

    public function get($strwhre = null)
    {
        // $whr = array();

        // if ($this->input->post('jasa_pelayanan'))
        //     $whr[] = "kode_golongan = '".$this->input->post('jasa_pelayanan')."'";
        // if ($this->input->post('kode_unit'))
        //     $whr[] = "kode_unit= '".$this->input->post('kode_unit')."'";
        // if ($this->input->post('tgl_masuk') && $this->input->post('tgl_keluar'))
        //     $whr[] = "(tgl_keluar BETWEEN '".$this->input->post('tgl_masuk')."' AND '".$this->input->post('tgl_keluar')."')";
        // if ($this->input->post('tgl_keluar'))
        //     $whr[] = "tgl_keluar= '".$this->input->post('tgl_keluar')."'";

        // $strwhr = ($whr) ? "WHERE " . implode(' AND ', $whr) : "";

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

        // var_dump($referensi_tindakan);

        $query = $this->db->query("SELECT js.id as id_ranap,js.no_rm,ps.nama_pasien,js.tgl_masuk,js.tgl_keluar,js.kode_golongan,js.nama_golongan,js.kode_unit,js.nama_unit,
                js.nosep,js.klaim_inacbg,js.klaim_inacbg_fix,js.klaim_rs,js.klaim_rs,js.obat,js.alkes,js.bhp,
                CONCAT('[\"',GROUP_CONCAT(DISTINCT jsd.type ORDER BY jsd.type ASC SEPARATOR '\",\"'),'\"]') json,
                z.json_dpjp,
                -- (SELECT 
                --     JSON_KEYS(dpjp_wajib)
                --     FROM jasa_ref_tindakan WHERE jenis=js.kodetindakan AND id=js.kode_tindakan_ref
                -- ) dpjp,
                CASE
                WHEN jsd.id IS NOT NULL
                THEN
                    CASE
                    WHEN SUM(CASE WHEN jsd.type = '2' THEN 1 ELSE 0 END) >= 2
                    THEN
                        (SELECT 
                            CONCAT('[',
                                GROUP_CONCAT(JSON_OBJECT(
                                    'id',id,'parameter',parameter,'pendapatan',persentase_pendapatan,'pelayanan',persentase_pelayanan,'pelayanan_non_medis',persentase_pelayanan_non_medis,'direct',persentase_direct,'indirect',persentase_indirect,'reward',persentase_reward
                                ) ORDER BY JSON_EXTRACT(parameter, '$.8') DESC LIMIT 1),']') AS Param 
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
                                ) ORDER BY JSON_EXTRACT(parameter, '$.8') DESC LIMIT 1),']') AS Param 
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
                            ) ORDER BY JSON_EXTRACT(parameter, '$.8') DESC LIMIT 1),']') AS Param 
                        FROM jasa_ref_type_jaspel
                        WHERE jenis=js.kodetindakan AND periode=js.periode
                    )
                END sk
                -- (SELECT DISTINCT
                --     kode_tindakan
                --     FROM jasa_ref_tindakan WHERE jenis=js.kodetindakan AND id=js.kode_tindakan_ref
                --     AND JSON_CONTAINS(JSON_KEYS(dpjp_wajib),CONCAT('[\"',GROUP_CONCAT(DISTINCT jsd.type ORDER BY jsd.type ASC SEPARATOR '\",\"'),'\"]'),'$') 
                -- ) dpjp_ok
            FROM jasa_ranap js
            JOIN pasien ps ON ps.no_rm=js.no_rm 
            LEFT JOIN (
                SELECT rjd.id,rjd.id_ranap,rjd.kode_dokter,rjd.qty,rjd.type
                FROM jasa_ranap_dokter rjd
            ) jsd ON jsd.id_ranap=js.id
            LEFT JOIN (
                SELECT z.id_ranap,
                    CONCAT(
                        '{',
                            GROUP_CONCAT( DISTINCT
                                CONCAT('\"',z.type, '\":',z.jumlah_type,'')
                            ),
                        '}'
                    ) json_dpjp
                FROM
                    (SELECT jsd.id_ranap,jsd.type,count(jsd.type) jumlah_type 
                        FROM jasa_ranap_dokter jsd 
                        GROUP BY jsd.id_ranap,jsd.type
                    ) z GROUP BY z.id_ranap
            ) z ON z.id_ranap=js.id
            $strwhre
            GROUP BY js.id
            ORDER BY js.nosep,js.tgl_masuk");

        $result = $query->result_array();
        $data = array();

        // var_dump($result);
        // exit;
        $total_klaim_inacbg = 0;
        $total_klaim_rs = 0;
        $total_jasa_pelayanan = 0;
       
        foreach ($result as $key => $w)
        {
            $fkp_ok = '';
            $dpjp_ok = '';
            
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

                if ($w['klaim_inacbg_fix'] >= 1 && $w['klaim_inacbg_fix']!=$w['klaim_inacbg'])
                    $fkp_ok = false;
            }

            $jasapelayanan = 0;
            $persentase_pendapatan = 0;
            $persentase_pelayanan = 0;
            $persentase_pelayanan_non_medis = 0;
            $persentase_direct = 0;
            $persentase_indirect = 0;
            $persentase_reward = 0;
            $sk = json_decode($w['sk'],true);
            if (isset($sk[0]))
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

            // warning dpjp
            // $all_dpjp = json_decode($w['json'], true);
            // $search_dpjp = json_decode($w['dpjp'], true);
            // if ($all_dpjp!=NULL && $search_dpjp==NULL) {
            //     $dpjp_ok = '';
            // }elseif ($all_dpjp!=NULL && $search_dpjp!=NULL) {
            //     if ($all_dpjp==$search_dpjp) {
            //         $dpjp_ok = $w['dpjp_ok'] ;
            //     }
            // }else{
            //     $dpjp_ok = '';
            // }

            $dpjp_ok = (isset($referensi_tindakan[$w['json_dpjp']])) ? $referensi_tindakan[$w['json_dpjp']] : '';

            $data[] = [
                "id_ranap" => $w['id_ranap'],
                "tgl_masuk" => $w['tgl_masuk'],
                "tgl_keluar" => $w['tgl_keluar'],
                "kode_golongan" => $w['kode_golongan'],
                "no_rm" => $w['no_rm'],
                "nosep" => $w['nosep'],
                "kode_unit" => $w['kode_unit'],
                "nama_unit" => $w['nama_unit'],
                "klaim_inacbg" => $klaim_inacbg,
                "klaim_rs" => $w['klaim_rs'],
                "selisih" => (int)$klaim_inacbg - (int)$w['klaim_rs'],
                "pendapatan" => ceil($pendapatan),
                "jasapelayanan" => ceil($jasapelayanan),
                "nama_pasien" => $w['nama_pasien'],
                "json_pelayanan" => ceil($jasapelayanan),
                "pengurang" => $w['klaim_inacbg_fix'],
                "direct" => ceil($jasa_direct),
                "indirect" => ceil($jasa_indirect),
                "reward" => ceil($jasa_reward),
                "non_medis" => ceil($jasa_non_medis),
                // "total_klaim_inacbg" => $total_klaim_inacbg,
                // "total_klaim_rs" => $total_klaim_rs,
                // "total_jasa_pelayanan" => $total_jasa_pelayanan,
                "fkp_ok" => $fkp_ok,
                "dpjp_ok" => $dpjp_ok
            ];
        }

        return $data;
    }

    // public function get_rincian_all()
    // {
    //     $id = $this->input->post("id_ranap");

    //     $query = $this->db->query("SELECT rj.id,rj.no_rm,ps.nama_pasien,rj.tgl_masuk,rj.tgl_keluar,rj.kode_unit,rj.nama_unit,rj.kode_golongan,rj.nama_golongan,
    //         rj.kodetindakan,rj.jasapelayanan,rj.klaim_inacbg,rj.klaim_rs,tdk.sub_type,tdk.persentase_pendapatan,tdk.json_pelayanan,tdk.json_persentase_bagian, 
    //         CASE
    //         WHEN rincian.id IS NOT NULL
    //         THEN
    //             CONCAT(
    //             '[',
    //                 GROUP_CONCAT(DISTINCT
    //                     JSON_OBJECT(    
    //                         'id', rincian.id,
    //                         'id_ranap', rincian.id_ranap,
    //                         'no_rm', rincian.no_rm,
    //                         'kode_unit', rincian.kode_unit,
    //                         'nama_unit', rincian.nama_unit,
    //                         'tgl_masuk', rincian.tgl_masuk,
    //                         'tgl_keluar', rincian.tgl_keluar,
    //                         'jumlah_hari_rawat_unit', rincian.hari_rawat_unit,
    //                         'tgl_masuk_rs', rj.tgl_masuk,
    //                         'tl_keluar_rs', rj.tgl_keluar,
    //                         'jumlah_hari_rawat_rs', DATEDIFF(rj.tgl_keluar,rj.tgl_masuk)
    //                     ) SEPARATOR ','
    //                 )
    //             ,']'
    //         )
    //         END rawat_inap_rincian,
    //         CASE 
    //         WHEN dokter.id IS NOT NULL
    //         THEN
    //             CONCAT(
    //                 '[',
    //                     GROUP_CONCAT(DISTINCT
    //                         JSON_OBJECT(    
    //                             'id', dokter.id,
    //                             'id_ranap', dokter.id_ranap,
    //                             'kode_dokter', dokter.kode_dokter,
    //                             'nama_dokter', dokter.nama_dokter,
    //                             'qty', dokter.qty,
    //                             'id_type', dokter.id_type,
    //                             'type', dokter.type
    //                         ) ORDER BY dokter.id_type ASC SEPARATOR ','
    //                     )
    //                 ,']'
    //             )
    //         END rawat_inap_dokter
    //     FROM jasa_ranap rj
    //     JOIN pasien ps ON ps.no_rm=rj.no_rm
    //     LEFT JOIN (
    //         SELECT rjr.id,rjr.id_ranap,rjr.no_rm,rjr.kode_unit,unt.nama_unit,rjr.tgl_masuk,rjr.tgl_keluar,DATEDIFF(rjr.tgl_keluar,rjr.tgl_masuk) hari_rawat_unit 
    //         FROM jasa_ranap_rincian rjr
    //         JOIN (SELECT kode_unit,nama_unit FROM munit WHERE kelompok_unit='RUANGAN') unt ON unt.kode_unit=rjr.kode_unit
    //     ) rincian ON rincian.id_ranap=rj.id
    //     LEFT JOIN (
    //         SELECT rjd.id,rjd.id_ranap,rjd.kode_dokter,dkter.nama_dokter,rjd.qty,rjd.type as id_type,rjt.deskripsi AS type FROM jasa_ranap_dokter rjd
    //         JOIN (SELECT id,kode_dokter,nama_dokter FROM mdokter WHERE kategori='DOKTER') dkter ON dkter.kode_dokter=rjd.kode_dokter
    //         JOIN (SELECT * FROM jasa_ref_jenis_tindakan WHERE jenis_rawat='RANAP') rjt ON rjt.id=rjd.type
    //     ) dokter ON dokter.id_ranap=rj.id
    //     LEFT JOIN 
    //         (SELECT tdk.id,tdk.idgolongan,tdk.kode_tindakan,tdk.sub_type,tj.persentase_pendapatan,tj.json_pelayanan,tdk.json_persentase_bagian
    //             FROM jasa_ref_tindakan tdk
    //             JOIN jasa_ref_type_jaspel tj ON tj.id=tdk.type
    //         ) tdk ON tdk.kode_tindakan=rj.kodetindakan AND tdk.idgolongan=rj.kode_golongan
    //     WHERE rj.id='$id'
    //     GROUP BY rj.id
    //     ORDER BY rj.tgl_masuk");

    //     $w = $query->result_array();

    //     $result = array();
    //     foreach ($w as $item)
    //     {
    //         $klaim_inacbg = $item['klaim_inacbg'];
    //         $persentase_pendapatan = $item['persentase_pendapatan'];
    //         $hasil_pendapatan = ($klaim_inacbg * $persentase_pendapatan) / 100;

    //         $sub_type = $item['sub_type'];
    //         $pelayanan = ($item['json_pelayanan']) ? json_decode($item['json_pelayanan'], true) : '';
    //         $persen = ($item['json_pelayanan']) ? $pelayanan[$sub_type]['pelayanan'] : 0;
    //         $jasapelayanan = ($klaim_inacbg * $persen) / 100;

    //         $persen_direct = ($item['json_pelayanan']) ? $pelayanan[$sub_type]['bagian']['direct'] : 0;
    //         $jasadibagi = ($jasapelayanan * $persen_direct) / 100;


    //         $get_persen_bagian = ($item['json_persentase_bagian']) ? json_decode($item['json_persentase_bagian'], true) : array();
            
    //         $wdokter = json_decode($item['rawat_inap_dokter'], true);
    //         $resultdokter = array();
    //         if ($wdokter)
    //         {
    //             foreach ($wdokter as $d)
    //             {
    //                 $jasaditerima = 0;
    //                 $id_type = $d['id_type'];

    //                 $persen_bagian = (count($get_persen_bagian)>0) ? $get_persen_bagian[$id_type] : 0;
    //                 $jasaditerima = ($jasadibagi * $persen_bagian) / 100;

    //                 $resultdokter[] = [
    //                     "id" => $d['id'],
    //                     "id_ranap" => $d['id_ranap'],
    //                     "kode_dokter" => $d['kode_dokter'],
    //                     "nama_dokter" => $d['nama_dokter'],
    //                     "qty" => $d['qty'],
    //                     "id_type" => $d['id_type'],
    //                     "type" => $d['type'],
    //                     "jasa_dibagi" => $jasadibagi,
    //                     "jasa_diterima" => $jasaditerima
    //                 ];
    //             }
    //         }

    //         $result['id_ranap'] = $item['id'];
    //         $result['no_rm'] = $item['no_rm'];
    //         $result['nama_pasien'] = $item['nama_pasien'];
    //         $result['data_rincian_unit'] = json_decode($item['rawat_inap_rincian']);
    //         $result['data_rincian_dokter'] = $resultdokter;
    //         // $result['persentase_bagian'] = $persentase_bagian;
    //     }

    //     return $result;
    // }

    public function get_rincian_all()
    {
        $id = $this->input->post("id_ranap");

        $query = $this->db->query("SELECT js.id AS id_ranap,js.no_rm,ps.nama_pasien,js.tgl_masuk,js.tgl_keluar,js.kode_golongan,js.nama_golongan,
                js.nosep,js.klaim_inacbg,js.klaim_inacbg_fix,js.klaim_rs,js.obat,js.alkes,js.bhp,
                CASE
                WHEN rincian.id IS NOT NULL
                THEN
					CONCAT(
					'[',
						GROUP_CONCAT(DISTINCT
							JSON_OBJECT(    
								'id', rincian.id,
								'id_ranap', rincian.id_ranap,
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
                END rawat_inap_rincian,
                CASE 
                WHEN jsd.id IS NOT NULL
                THEN
					CONCAT(
						'[',
							GROUP_CONCAT(DISTINCT
								JSON_OBJECT(    
									'id', jsd.id,
									'id_ranap', jsd.id_ranap,
									'kode_dokter', jsd.kode_dokter,
									'nama_dokter', jsd.nama_dokter,
									'qty', jsd.qty,
									'type', jsd.type,
									'nama_type', jsd.nama_type
								) ORDER BY jsd.type SEPARATOR ','
							)
						,']'
					)
                END rawat_inap_dokter,
                CONCAT('[\"',GROUP_CONCAT(DISTINCT jsd.type ORDER BY jsd.type ASC SEPARATOR '\",\"'),'\"]') json,
                CASE
                WHEN jsd.id IS NOT NULL
                THEN
                    CASE
                    WHEN SUM(CASE WHEN jsd.type = '2' THEN 1 ELSE 0 END) >= 2
                    THEN
                        (SELECT 
                            CONCAT('[',
                                GROUP_CONCAT(JSON_OBJECT(
                                    'id',id,'parameter',parameter,'pendapatan',persentase_pendapatan,'pelayanan',persentase_pelayanan,'direct',persentase_direct,'indirect',persentase_indirect,'reward',persentase_reward,'pelayanan_non_medis',persentase_pelayanan_non_medis
                                ) ORDER BY JSON_EXTRACT(parameter, '$.8') DESC LIMIT 1),']') AS Param 
                            FROM jasa_ref_type_jaspel
                            WHERE jenis=js.kodetindakan AND periode=js.periode
                                AND JSON_CONTAINS(JSON_KEYS(parameter),CONCAT('[\"',GROUP_CONCAT(DISTINCT jsd.type ORDER BY jsd.type ASC SEPARATOR '\",\"'),'\"]'),'$') 
                                AND op_lebih_dari_dua = 1
                        )
                    ELSE
                        (SELECT 
                            CONCAT('[',
                                GROUP_CONCAT(JSON_OBJECT(
                                    'id',id,'parameter',parameter,'pendapatan',persentase_pendapatan,'pelayanan',persentase_pelayanan,'direct',persentase_direct,'indirect',persentase_indirect,'reward',persentase_reward,'pelayanan_non_medis',persentase_pelayanan_non_medis
                                ) ORDER BY JSON_EXTRACT(parameter, '$.8') DESC LIMIT 1),']') AS Param 
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
                                'id',id,'parameter',parameter,'pendapatan',persentase_pendapatan,'pelayanan',persentase_pelayanan,'direct',persentase_direct,'indirect',persentase_indirect,'reward',persentase_reward,'pelayanan_non_medis',persentase_pelayanan_non_medis
                            ) ORDER BY JSON_EXTRACT(parameter, '$.8') DESC LIMIT 1),']') AS Param 
                        FROM jasa_ref_type_jaspel
                        WHERE jenis=js.kodetindakan AND periode=js.periode
                    )
                END sk
            FROM jasa_ranap js
            JOIN pasien ps ON ps.no_rm=js.no_rm 
            LEFT JOIN (
                SELECT rjr.id,rjr.id_ranap,rjr.no_rm,rjr.kode_unit,unt.nama_unit,rjr.tgl_masuk,rjr.tgl_keluar,DATEDIFF(rjr.tgl_keluar,rjr.tgl_masuk) hari_rawat_unit 
                FROM jasa_ranap_rincian rjr
                JOIN (SELECT kode_unit,nama_unit FROM munit WHERE kelompok_unit='RUANGAN') unt ON unt.kode_unit=rjr.kode_unit
            ) rincian ON rincian.id_ranap=js.id 
            LEFT JOIN (
                SELECT rjd.id,rjd.id_ranap,rjd.kode_dokter,dkter.nama_dokter,rjd.qty,rjd.type,rjt.nama_type
                FROM jasa_ranap_dokter rjd
                JOIN (SELECT id,kode_dokter,nama_dokter FROM mdokter WHERE kategori='DOKTER') dkter ON dkter.kode_dokter=rjd.kode_dokter
                JOIN (SELECT id,deskripsi as nama_type FROM jasa_ref_jenis_tindakan WHERE jenis_rawat='RANAP') rjt ON rjt.id=rjd.type
            ) jsd ON jsd.id_ranap=js.id
            WHERE js.id='$id'
            GROUP BY js.no_rm,kode_golongan,tgl_keluar
            ORDER BY js.tgl_masuk , js.tgl_keluar");

        $q = $query->result_array();
        $result = array();
        foreach ($q as $w)
        {
            $klaim_inacbg = $w['klaim_inacbg'];
            $pengurang = (int)$w['obat'] + (int)$w['alkes'] + (int)$w['bhp'];

            if ($w['kode_golongan']!='6') {
                $klaim_inacbg = $klaim_inacbg - $pengurang;
            } elseif ($w['nama_golongan']=='6') {
                $klaim_inacbg = ($w['klaim_inacbg_fix'] >=1 )  ? $w['klaim_inacbg_fix'] : $klaim_inacbg;
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
                $persentase_direct = $sk[0]['direct'];
                $persentase_indirect = $sk[0]['indirect'];
                $persentase_reward = $sk[0]['reward'];
                $parameter = json_decode($sk[0]['parameter'], true);
            }

            $pendapatan = ($klaim_inacbg * $persentase_pendapatan) / 100;
            $jasapelayanan = ($klaim_inacbg * $persentase_pelayanan) / 100;
			$jasa_non_medis = ($klaim_inacbg * $persentase_pelayanan_non_medis) / 100;

            if ($w['kode_golongan']!='6') {
                $persentase_direct = $persentase_direct + $persentase_reward;
				$persentase_reward = 0;
            }

			// get direct
			$jasa_direct = ($jasapelayanan * $persentase_direct) / 100;
			// get indirect
			$jasa_indirect = ($jasapelayanan * $persentase_indirect) / 100;
			// get reward
			// if ($selisih>0) 
				$jasa_reward = ($jasapelayanan * $persentase_reward) / 100;

            $wdokter = json_decode($w['rawat_inap_dokter'], true);
			// return $wdokter;

			$get_count_dokter = ($wdokter) ? call_user_func_array('array_merge_recursive', $wdokter) : [];
			// return $get_count_dokter;
			if (isset($get_count_dokter['type'])) {
				$arr_count_dpjp = (is_array($get_count_dokter['type'])) ? array_count_values($get_count_dokter['type']) : null;
			} else {
				$arr_count_dpjp = null;
			}
			

			$jumlah_opt_bedah = (isset($arr_count_dpjp[2])) ? $arr_count_dpjp[2] : 0;
			$jumlah_opt_anastesi = (isset($arr_count_dpjp[3])) ? $arr_count_dpjp[3] : 0;
			
            $resultdokter = array();
            if ($wdokter)
            {
                //mencari sisa persen untuk dpjp dan operator
                $p = 0;
                foreach ($wdokter as $d)
                {
                    $persen_terpakai = (isset($parameter[$d['type']])) ? $parameter[$d['type']] : 0;

					if ($d['type']==2) {
						$persen_terpakai = ($jumlah_opt_bedah!=0) ? $persen_terpakai / $jumlah_opt_bedah : $persen_terpakai;
					} elseif ($d['type']==3) {
						$persen_terpakai = ($jumlah_opt_anastesi!=0) ? $persen_terpakai / $jumlah_opt_anastesi : $persen_terpakai;
					} 
					
                    if (! in_array($d['type'],[1]))
                    {
                        $p = $p + $persen_terpakai;
                    }
                }

				// return $p ;

                //batas mencari sisa persen untuk dpjp dan operator
                $jasadibagi = 0;
                $jasaditerima = 0;
                foreach ($wdokter as $d)
                {
                    $jasadibagi = ($jasapelayanan * $persentase_direct) / 100;
                    $persentase_diterima = (isset($parameter[$d['type']])) ? $parameter[$d['type']] : 0;
                    if ($d['type']==1) {
                        $sisa_persen = (isset($parameter[$d['type']])) ? $parameter[$d['type']] - $p : $p;
                        $jasaditerima = ($jasadibagi * $sisa_persen) / 100;
					} elseif ($d['type']==2) {
						$jasaditerima = ($jumlah_opt_bedah!=0) ? ($jasadibagi * ($persentase_diterima / $jumlah_opt_bedah)) / 100 : ($jasadibagi * $persentase_diterima) / 100;
					} elseif ($d['type']==3) {
						$jasaditerima = ($jumlah_opt_anastesi!=0) ? ($jasadibagi * ($persentase_diterima / $jumlah_opt_anastesi)) / 100 : ($jasadibagi * $persentase_diterima) / 100;
                    } else {
                        $jasaditerima = ($jasadibagi * $persentase_diterima) / 100;
                    }

                    $resultdokter[] = [
                        "id" => $d['id'],
                        "id_ranap" => $d['id_ranap'],
                        "kode_dokter" => $d['kode_dokter'],
                        "nama_dokter" => $d['nama_dokter'],
                        "qty" => $d['qty'],
                        "id_type" => $d['type'],
                        "type" => $d['nama_type'],
                        "jasa_dibagi" => ceil($jasadibagi),
                        "jasa_diterima" => ceil($jasaditerima),
						"jasa_direct" => ceil($jasa_direct),
						"jasa_indirect" => ceil($jasa_indirect),
						"jasa_reward" => ceil($jasa_reward),
						"jasa_non_medis" => ceil($jasa_non_medis),
                    ];
                }
            }

            $result['id_ranap'] = $w['id_ranap'];
            $result['no_rm'] = $w['no_rm'];
            $result['nama_pasien'] = $w['nama_pasien'];
            $result['data_rincian_unit'] = json_decode($w['rawat_inap_rincian']);
            $result['data_rincian_dokter'] = $resultdokter;
			$result['klaim_inacbg'] = $klaim_inacbg;
			$result['klaim_rs'] = $klaim_rs;
			$result['selisih'] = $selisih;

        }

        return $result;
    }

    public function get_rincian_unit()
    {
        $id_ranap = $this->input->post('id_ranap');

        $query = $this->db->query("SELECT rjr.id,rjr.id_ranap,rjr.no_rm,rjr.kode_unit,unt.nama_unit,rjr.tgl_masuk,rjr.tgl_keluar,DATEDIFF(rjr.tgl_keluar,rjr.tgl_masuk) hari_rawat_unit,rj.tgl_masuk as tgl_masuk_rs,rj.tgl_keluar as tgl_keluar_rs,DATEDIFF(rj.tgl_keluar,rj.tgl_masuk) hari_rawat_rs
            FROM jasa_ranap_rincian rjr
            JOIN (SELECT kode_unit,nama_unit FROM munit WHERE kelompok_unit='RUANGAN') unt ON unt.kode_unit=rjr.kode_unit
            JOIN (SELECT id,tgl_masuk,tgl_keluar FROM jasa_ranap) rj ON rj.id=rjr.id_ranap
            WHERE rjr.id_ranap='$id_ranap'");

        return $query->result_array();
    }

    public function get_rincian_dokter()
    {
        $id_ranap = $this->input->post('id_ranap');

        $this->db->from("jasa_ranap_dokter");
        $this->db->where("id_ranap", $id_ranap);
        $result = $this->db->get();
        return $result->result_array();
    }

	public function get_rekap_ranap_old($strwhr='') {
		$query = $this->db->query("SELECT sum(klaim_inacbg) 
			FROM jasa_ranap js 
			LEFT JOIN (
				SELECT rjd.id,rjd.id_ranap,rjd.kode_dokter,rjd.qty,rjd.type
				FROM jasa_ranap_dokter rjd
			) jsd ON jsd.id_ranap=js.id
			$strwhr
			GROUP BY js.no_rm,kode_golongan,tgl_keluar
			ORDER BY js.nosep,js.tgl_masuk");
		$q = $query->result_array();

		var_dump($q);
	}

    public function get_rekap_ranap($strwhr='')
    {
        $query = $this->db->query("SELECT js.id as id_ranap,js.nosep,js.klaim_inacbg,js.klaim_inacbg_fix,js.klaim_rs,js.obat,js.alkes,js.bhp,js.kode_golongan,js.nama_golongan,
						CASE
						WHEN jsd.id IS NOT NULL
						THEN
								CASE
								WHEN SUM(CASE WHEN jsd.type = '2' THEN 1 ELSE 0 END) >= 2
								THEN
										(SELECT 
												CONCAT('[',
														GROUP_CONCAT(JSON_OBJECT(
																'id',id,'parameter',parameter,'pendapatan',persentase_pendapatan,'pelayanan',persentase_pelayanan,'pelayanan_non_medis',persentase_pelayanan_non_medis,'direct',persentase_direct,'indirect',persentase_indirect,'reward',persentase_reward
														) ORDER BY JSON_EXTRACT(parameter, '$.8') DESC LIMIT 1),']') AS Param 
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
														) ORDER BY JSON_EXTRACT(parameter, '$.8') DESC LIMIT 1),']') AS Param 
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
												) ORDER BY JSON_EXTRACT(parameter, '$.8') DESC LIMIT 1),']') AS Param 
										FROM jasa_ref_type_jaspel
										WHERE jenis=js.kodetindakan AND periode=js.periode
								)
						END sk
						FROM jasa_ranap js
						LEFT JOIN (
								SELECT rjd.id,rjd.id_ranap,rjd.kode_dokter,rjd.qty,rjd.type
								FROM jasa_ranap_dokter rjd
						) jsd ON jsd.id_ranap=js.id
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
        $data['klaim_inacbg'] = (int)$this->input->post('klaim_inacbg');
        $data['klaim_rs'] = (int)$this->input->post('klaim_rs');
        $data['jasapelayanan'] = ($this->input->post('jasa_pelayanan')) ? $this->input->post('jasa_pelayanan') : 0;
        $data['kodetindakan'] = ($this->input->post('kode_tindakan')) ? $this->input->post('kode_tindakan') : '';
        $data['kode_tindakan_ref'] = ($this->input->post('referensi_tindakan:')) ? $this->input->post('referensi_tindakan:') : 0 ;
        $data['kode_dokter_dpjp'] = ($this->input->post('kode_dokter_dpjp')) ? $this->input->post('kode_dokter_dpjp') : '';
        $data['nama_dokter_dpjp'] = ($this->input->post('nama_dokter_dpjp')) ? $this->input->post('nama_dokter_dpjp') : '';
        $data['obat'] = ($this->input->post('obat')) ? (int)$this->input->post('obat') : 0;
        $data['alkes'] = ($this->input->post('alkes')) ? (int)$this->input->post('alkes') : 0;
        $data['bhp'] = ($this->input->post('bhp')) ? (int)$this->input->post('bhp') : 0;
        $data['periode'] = ($this->input->post('tgl_keluar')) ? date('Y',strtotime($this->input->post('tgl_keluar'))) : '1900';
        $data['diagnosa'] = ($this->input->post('diagnosa')) ? $this->input->post('diagnosa') : '';
        $data['tutup'] = 0;

        $result = $this->db->insert("jasa_ranap", $data);

		return $result;
    }

    public function store_rincian_ranap_unit($dt)
    {
        $data = array();
        $data['id_ranap'] = $dt['id_ranap'];
        $data['no_rm'] = $dt['no_rm'];
        $data['kode_unit'] = $dt['kode_unit'];
        $data['tgl_masuk'] = date('Y-m-d',strtotime($dt['tgl_masuk']));
        $data['tgl_keluar'] = date('Y-m-d',strtotime($dt['tgl_keluar']));
        $data['user1'] = '';
        $data['user2'] = '';

        $result = $this->db->insert("jasa_ranap_rincian", $data);

        return $result;
    }

    public function store_rincian_ranap_dokter($dt)
    {
        $data = array();
        $data['id_ranap'] = $dt['id_ranap'];
        $data['no_rm'] = $dt['no_rm'];
        $data['kode_dokter'] = $dt['kode_dokter'];
        $data['type'] = $dt['type'];
        $data['qty'] = 1;
        $data['user1'] = '';
        $data['user2'] = '';

        $result = $this->db->insert("jasa_ranap_dokter", $data);

        return $result;
    }

    public function store_proses_jasa_dokter($dt)
    {
        $data = array();
		$data_layanan = array();
        $id_ranap = $dt['id_ranap'][0];
        
         foreach ($dt['id'] as $key=>$val)
        {
            $data[] = [
                'id_rincian_ranap_dokter' => $val,
                'id_ranap' => $dt['id_ranap'][$key],
                'kode_dokter' => $dt['kode_dokter'][$key],
                'id_type' => $dt['id_type'][$key],
                'jumlah_jasa_dibagi' => (float)$dt['jasa_dibagi'][$key],
                'jumlah_jasa_diterima' => (float)$dt['jasa_diterima'][$key],
            ];

			$data_layanan = [
				'id_ranap' => $dt['id_ranap'][$key],
				'direct' => $dt['jasa_direct'][$key],
				'indirect' => $dt['jasa_indirect'][$key],
				'reward' => $dt['jasa_reward'][$key],
				'non_medis' => $dt['jasa_non_medis'][$key]
			];
        }

        if (count($data)>0)
        {
            $this->db->from('jasa_ranap_diterima_dokter');
            $this->db->where("id_ranap", $id_ranap);
            // $this->db->limit(1);
            $delete = $this->db->delete();
        }
        $result = $this->db->insert_batch("jasa_ranap_diterima_dokter", $data);

		if (count($data_layanan)>0)
		{
			$d = $this->db->from('jasa_ranap_pelayanan');
			$d = $d->where('id_ranap', $id_ranap);
			$del = $d->delete();
		}
		$result2 = $this->db->insert("jasa_ranap_pelayanan", $data_layanan);

        return $result;
    }

    public function edit()
    {
        $id = $this->input->post("id");
		$this->db->from("jasa_ranap");
		$this->db->where("id", $id);
		$this->db->limit(1);
		$data = $this->db->get();
        return $data->row();
    }

    public function edit_rincian_ranap_unit()
    {
        $id = $this->input->post("id");
        $this->db->from("jasa_ranap_rincian");
        $this->db->select("id,id_ranap,no_rm,kode_unit,tgl_masuk,tgl_keluar");
		$this->db->where("id", $id);
		$this->db->limit(1);
		$data = $this->db->get();
        return $data->row();
    }

    public function edit_rincian_ranap_dokter()
    {
        $id = $this->input->post("id");
        $this->db->from("jasa_ranap_dokter");
        $this->db->select("id,id_ranap,no_rm,kode_dokter,type,qty");
		$this->db->where("id", $id);
		$this->db->limit(1);
		$data = $this->db->get();
        return $data->row();
    }

    public function update()
    {
        $id = $this->input->post("id");

        $data = array();
        $data['kode_golongan'] = ($this->input->post('kode_golongan')) ? $this->input->post('kode_golongan') : '';
        $data['nama_golongan'] = ($this->input->post('nama_golongan')) ? $this->input->post('nama_golongan') : '';
        $data['tgl_masuk'] = date('Y-m-d', strtotime($this->input->post('tgl_masuk')));
        $data['tgl_keluar'] = date('Y-m-d', strtotime($this->input->post('tgl_keluar')));
        $data['klaim_inacbg'] = (int)$this->input->post('klaim_inacbg');
        $data['klaim_rs'] = (int)$this->input->post('klaim_rs');
        $data['nosep'] = ($this->input->post('nosep')) ? $this->input->post('nosep') : '';
        $data['jasapelayanan'] = ($this->input->post('jasa_pelayanan')) ? $this->input->post('jasa_pelayanan') : 0;
        $data['kodetindakan'] = ($this->input->post('kode_tindakan')) ? $this->input->post('kode_tindakan') : 0;
        $data['kode_tindakan_ref'] = ($this->input->post('referensi_tindakan')) ? $this->input->post('referensi_tindakan') : 0 ;
        $data['obat'] = ($this->input->post('obat')) ? (int)$this->input->post('obat') : 0;
        $data['alkes'] = ($this->input->post('alkes')) ? (int)$this->input->post('alkes') : 0;
        $data['bhp'] = ($this->input->post('bhp')) ? (int)$this->input->post('bhp') : 0;
        $data['periode'] = ($this->input->post('tgl_keluar')) ? date('Y',strtotime($this->input->post('tgl_keluar'))) : '1900';
        $data['diagnosa'] = ($this->input->post('diagnosa')) ? $this->input->post('diagnosa') : '';

        $this->db->from('jasa_ranap');
        $this->db->where("id", $id);
        $this->db->limit(1);
		$result = $this->db->update("jasa_ranap", $data);
		return $result;
    }

    public function update_rincian_ranap_unit()
    {
        $id = $this->input->post("id");

        $data = array();
        $data['kode_unit'] = $this->input->post('kode_unit');
        $data['tgl_masuk'] = $this->input->post('tgl_masuk');
        $data['tgl_keluar'] = $this->input->post('tgl_keluar');

        $this->db->from('jasa_ranap_rincian');
        $this->db->where("id", $id);
        $this->db->limit(1);
		$result = $this->db->update("jasa_ranap_rincian", $data);
		return $result;
    }

    public function update_rincian_ranap_dokter()
    {
        $id = $this->input->post("id");

        $data = array();
        $data['kode_dokter'] = $this->input->post('kode_dokter');
        $data['type'] = $this->input->post('type');
        $data['qty'] = $this->input->post('qty');

        $this->db->from('jasa_ranap_dokter');
        $this->db->where("id", $id);
        $this->db->limit(1);
		$result = $this->db->update("jasa_ranap_dokter", $data);
		return $result;
    }

    public function delete()
    {
        $id = $this->input->post("id");
        $this->db->from('jasa_ranap');
        $this->db->where("id", $id);
        $this->db->limit(1);
		$result = $this->db->delete();
		return $result;
    }

    public function delete_rincian_ranap_unit()
    {
        $id = $this->input->post("id");
        $this->db->from('jasa_ranap_rincian');
        $this->db->where("id", $id);
        $this->db->limit(1);
		$result = $this->db->delete();
		return $result;
    }

    public function delete_rincian_ranap_dokter()
    {
        $id = $this->input->post("id");
        $this->db->from('jasa_ranap_dokter');
        $this->db->where("id", $id);
        $this->db->limit(1);
		$result = $this->db->delete();
		return $result;
    }

    public function get_rekap_jasa_dokter()
    {
        $total_dpjp = 0;
        $total_operator = 0;
        $total_anastesi = 0;
        $total_konsul = 0;
        $total_rawat_bersama = 0;
        $total_lab_pk = 0;
        $total_lab_pa = 0;
        $total_radiologi = 0;
        $total_mikrobiologi = 0;
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

        if ($this->input->post('jasa_pelayanan') != "") {
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

		// var_dump($src_gol);
		// exit;

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
						FROM jasa_ranap_diterima_dokter jdd
						JOIN jasa_ranap js ON js.id=jdd.id_ranap
						$whr_str_indirect
						GROUP BY jdd.kode_dokter,id_type 
						ORDER BY jdd.kode_dokter
					) js ON js.kode_dokter=dk.kode_dokter
				WHERE dk.kategori='DOKTER' AND dk.bagian!='' AND dk.type_dokter='1'
				GROUP BY dk.id ) d_tamu WHERE selisih > 0
			) AS jumlah_dokter_tamu_untung,
			(SELECT COUNT(ref.id) FROM jasa_referensi_struktural ref JOIN mdokter d ON d.id=ref.id_dokter WHERE d.kategori='DOKTER') AS jumlah_struktural,
			(SELECT SUM(jsp.indirect) 
				FROM jasa_ranap_pelayanan jsp
				JOIN jasa_ranap js ON js.id=jsp.id_ranap
				$whr_str_indirect
			) AS jumlah_jasa_indirect,
			(SELECT SUM(jsp.reward) 
				FROM jasa_ranap_pelayanan jsp
				JOIN jasa_ranap js ON js.id=jsp.id_ranap
				$whr_str_indirect
			) AS jumlah_jasa_reward,
			(SELECT SUM(jsp.non_medis) 
				FROM jasa_ranap_pelayanan jsp
				JOIN jasa_ranap js ON js.id=jsp.id_ranap
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
                FROM jasa_ranap_diterima_dokter jdd
                JOIN jasa_ranap js ON js.id=jdd.id_ranap
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

		$marks = array(1, 2, 3, 4, 5, 6, 7, 8, 10);

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

                    $total_dpjp = ($item['id_type']==1) ? $total_dpjp + $item['jumlah_jasa'] : $total_dpjp + 0;
                    $total_operator = ($item['id_type']==2) ? $total_operator + $item['jumlah_jasa'] : $total_operator + 0;
                    $total_anastesi = ($item['id_type']==3) ? $total_anastesi + $item['jumlah_jasa'] : $total_anastesi + 0;
                    $total_konsul = ($item['id_type']==4) ? $total_konsul + $item['jumlah_jasa'] : $total_konsul + 0;
                    $total_rawat_bersama = ($item['id_type']==5) ? $total_rawat_bersama + $item['jumlah_jasa'] : $total_rawat_bersama + 0;
                    $total_lab_pk = ($item['id_type']==6) ? $total_lab_pk + $item['jumlah_jasa'] : $total_lab_pk + 0;
                    $total_lab_pa = ($item['id_type']==7) ? $total_lab_pa + $item['jumlah_jasa'] : $total_lab_pa + 0;
                    $total_radiologi = ($item['id_type']==8) ? $total_radiologi + $item['jumlah_jasa'] : $total_radiologi + 0;
                    $total_mikrobiologi = ($item['id_type']==10) ? $total_mikrobiologi + $item['jumlah_jasa'] : $total_mikrobiologi + 0;
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
            'total_operator' => ceil($total_operator),
            'total_anastesi' => ceil($total_anastesi),
            'total_konsul' => ceil($total_konsul),
            'total_rawat_bersama' => ceil($total_rawat_bersama),
            'total_lab_pk' => ceil($total_lab_pk),
            'total_lab_pa' => ceil($total_lab_pa),
            'total_radiologi' => ceil($total_radiologi),
            'total_mikrobiologi' => ceil($total_mikrobiologi),
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
