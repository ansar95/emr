<html>
<head>
<!-- <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> -->
<title>RM11 Hal.1</title>
<style type="text/css">

.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 18px; font-weight: bold; }
.style3 {font-family: Verdana, Arial, Helvetica, sans-serif}

.style4 {font-size: 12px}
.style5 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; font-weight: bold; }

td {
   line-height:18px;
}
</style>
</head>


<body>
<?php
      $qry2=$this->db->query("SELECT *,register.golongan as asuransi1,pasien.status as kawin FROM register INNER JOIN pasien ON register.no_rm = pasien.no_rm INNER JOIN register_detail ON register.notransaksi =register_detail.notransaksi and register.id = '".$id."' LIMIT 1");;
            foreach ($qry2->result_array() as $brs2) {
              $xno_rm=$brs2['no_rm'];
              $notrxnya=$brs2['notransaksi'];
              $xnama_pasien=$brs2['nama_pasien'];
              $xtempat_lahir=$brs2['tempat_lahir'];
              if ($brs2['sex']=='L') { $xsex=1 ;} else { $xsex=2;};					
                  $xperawatan=$brs2['nama_unit'];
                  //$xkelas=$brs2['nama_kelas'];
                  $xtglm=$brs2['tgl_masuk'];
                  $ctanggal=substr($xtglm,8,2).'-'.substr($xtglm,5,2).'-'.substr($xtglm,0,4);
                  $xtgll=$brs2['tgl_lahir'];
                  $xtgl_lahir=substr($xtgll,8,2).'-'.substr($xtgll,5,2).'-'.substr($xtgll,0,4);

                  $xasuransi=$brs2['asuransi1'];
                  $xnoasuransi=$brs2['no_askes'];
                  $xkamar=$brs2['kode_kamar'];

              if ($brs2['barulama']=='1') { $xkunjungan='Baru' ;} else { $xkunjungan='Lama';};					
              if ($brs2['barulama']=='1') { $xjenisKasus='Baru' ;} else { $xjenisKasus='Lama';};					
                  $xcatatan=$brs2['catatan'];
                  $xjenislayanan=$brs2['jenislayanan'];
                  $xalamat=$brs2['alamat'];
                  $xdesa=$brs2['desa'];
                  $xkecamatan=$brs2['kecamatan'];
                  $xkota=$brs2['kota'];
                  $xprovinsi=$brs2['provinsi'];
                  $xtelepon=$brs2['hp'];
                  $xnik=$brs2['nik'];
                  $xstatus=$brs2['status'];
                  $xsuku=$brs2['suku'];
                  $xnegara=$brs2['negara'];
                  $xagama=$brs2['agama'];
                  $xpendidikan=$brs2['pendidikan'];
                  $xpekerjaan=$brs2['pekerjaan']; 
                  $xnama_ortu=$brs2['nama_ortu']; 
                  $xpekerjaan_ayahibu=$brs2['pekerjaan_ayahibu']; 
                  $xalamat_ayahibu=$brs2['pekerjaan_suamiistri']; 

                  // CATATAN PERUBAHAN FUNGSI FIELD FILE PASIEN
                  // pekerjaan suami istri difungsikan menjadi alamat suami istri
                  // telpon untuk mencatat telp pasien difungsikan menjadi pekerjaan kaluarga
                  $xnama_keluarga=$brs2['nama_klg']; 
                  $xpekerjaan_keluarga=$brs2['telp']; 
                  $xalamat_keluarga=$brs2['pekerjaan_suamiistri']; 

                  $xtgl_masuk=$brs2['tgl_masuk']; 
                  $xjam_masuk=$brs2['jam_masuk']; 
                  $xdiagnosa=$brs2['ketdiagawal']; 

                  $xfaskes=$brs2['nmppkrujukan']; 
                  $xprosedurmasuk=$brs2['rujukan']; 
                  $xcara_masuk=$brs2['cara_masuk']; 
                  $xkelas=$brs2['kelashak']; 
                  $xnamapenjamin=$brs2['nama_png'];

                  // $xstatusperkawinan=$brs2['kawin'];
                  // $xnamapenjamin=$brs2['nama_png'];
                  // $xjenispelayanan=$brs2['jenislayanan'];
                  // $xnama_dokter=$brs2['nama_dokter'] ;
                  // //dicari dgn cara melihat posisi kode_unitR nama_unitR, cari kode unirR di munit,
                  // $xcaraterima='';
                  // //nama unit dan nama kamar
                  // $xnama_unit=$brs2['nama_unit'];
                  // $xkode_kamar=$brs2['kode_kamar'];

            }
              //tanggal lahir
              //$birthDt = $xtgl_lahir;
              $ctgl_lahir=substr($xtgl_lahir,8,2).'-'.substr($xtgl_lahir,5,2).'-'.substr($xtgl_lahir,0,4);
              $birthDt = new DateTime($xtgl_lahir);
              //tanggal hari ini
              $today = new DateTime('today');
              //tahun
              $y = $today->diff($birthDt)->y;
              //bulan
              $m = $today->diff($birthDt)->m;
              //hari
              $d = $today->diff($birthDt)->d; 
              $xusia =  $y . " Tahun " . $m . " Bulan " . $d . " Hari";

              $qry3=$this->db->query("SELECT nama_unit  FROM register_detail where notransaksi = '$notrxnya' order by id LIMIT 1");;
              foreach ($qry3->result_array() as $brs3) {
                $xruangan=$brs2['nama_unit']; 
              }
       


      ?>

<table width="536" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="536"><img src="../rsudpemprov/assets/img/logosurat.jpg" alt="ss" width="735" height="105" /></td>
  </tr>
</table>
<table width="540" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="538" height="40" bgcolor="#E6E6E6"><div align="center"><span class="style5" style="border: s 1px black">CATATAN MASUK DAN KELUAR RUMAH SAKIT </span></div></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="13%">&nbsp;</td>
        <td width="55%" class="style1"><div align="right">No. RM &nbsp;: </div></td>
        <td width="32%" height="30" class="style2"> &nbsp;<?php echo $xno_rm ;?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="22" class="style1"><div align="center"><span class="style3">1.</span></div></td>
        <td width="147" class="style1">Nama Lengkap </td>
        <td width="10" class="style1">:</td>
        <td width="179" height="20" class="style1"><?php echo $xnama_pasien ;?></td>
        <td class="style1"><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td width="12" class="style4"><table width="100%" height="12" border="1" cellpadding="1" cellspacing="0">
              <tr>
              <td><?php if($xsex==1){echo 'X';} else { ?> &nbsp; <?php } ?></td>
              </tr>
            </table></td>
            <td width="67" class="style4">Laki-laki</td>
            <td width="12" class="style4"><table width="100%" height="12" border="1" cellpadding="1" cellspacing="0">
              <tr>
                <td><?php if($xsex==2){echo 'X';} else { ?> &nbsp; <?php } ?></td>
              </tr>
            </table></td>
                <td width="68" class="style4">Perempuan</td>
          </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="22" class="style3"><div align="center" class="style4">2.</div></td>
        <td width="146" class="style4">TEMPAT / TANGGAL LAHIR</td>
        <td width="10" class="style4">:</td>
        <td width="212" class="style4"><?php echo $xtempat_lahir.' / '.$xtgl_lahir ;?></td>
        <td width="146" class="style4">Umur : <?php echo $xusia?> </td>
      </tr>
      <tr>
        <td class="style3"><div align="center" class="style4">3.</div></td>
        <td width="145" class="style4">ALAMAT</td>
        <td class="style4">:</td>
        <td colspan="2" class="style4"><?php echo $xalamat?></td>
        </tr>
      <tr>
        <td><div align="center"></div></td>
        <td class="style4">Desa / Kelurahan</td>
        <td class="style4">:</td>
        <td class="style4"><?php echo $xdesa?></td>
        <td class="style4">&nbsp;</td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
        <td class="style4">Kecamatan - Kabupaten / Kota</td>
        <td class="style4">:</td>
        <td class="style4"><?php echo $xkecamatan.' - '.$xkota ;?></td>
        <td class="style4">Propinsi : Sulawesi Tengah</td>
      </tr>
      
      <tr>
        <td class="style4"><div align="center">4.</div></td>
        <td class="style4">NO. TELP/HP</td>
        <td class="style4">:</td>
        <td colspan="2" class="style4"><?php echo $xtelepon?></td>
        </tr>
      <tr>
        <td class="style4"><div align="center">5.</div></td>
        <td class="style4">NO.KTP/IDENTITAS LAIN</td>
        <td class="style4">:</td>
        <td colspan="2" class="style4"><?php echo $xnik?></td>
        </tr>
      <tr>
        <td class="style4"><div align="center">6.</div></td>
        <td class="style4">STATUS PERKAWINAN</td>
        <td class="style4">:</td>
        <td colspan="2" class="style4"><?php echo $xstatus?></td>
        </tr>
      <tr>
        <td class="style4"><div align="center">7.</div></td>
        <td class="style4">SUKU/BANGSA</td>
        <td class="style4">:</td>
        <td colspan="2" class="style4"><?php echo $xsuku.' - '.$xnegara ;?></td>
        </tr>
      <tr>
        <td class="style4"><div align="center">8.</div></td>
        <td class="style4">AGAMA</td>
        <td class="style4">:</td>
        <td colspan="2" class="style4"><?php echo $xagama?></td>
        </tr>
      <tr>
        <td class="style4"><div align="center">9</div></td>
        <td class="style4">PENDIDIKAN</td>
        <td class="style4">:</td>
        <td colspan="2" class="style4"><?php echo $xpendidikan?></td>
        </tr>
      <tr>
        <td class="style4"><div align="center">10</div></td>
        <td class="style4">PEKERJAAN</td>
        <td class="style4">:</td>
        <td colspan="2" class="style4"><?php echo $xpekerjaan?></td>
        </tr>
    </table></td>
  </tr>
  <tr>

    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="22" class="style4"><div align="center">11</div></td>
        <td colspan="2" class="style4">NAMA AYAH /IBU / SUAMI / ISTRI</td>
        <td width="10" class="style4">:</td>
        <td class="style4"><?php echo $xnama_ortu?></td>
      </tr>
      <tr>
        <td class="style4"><div align="center"></div></td>
        <td width="45" class="style4">&nbsp;</td>
        <td width="99" class="style4"><span style="padding-right: 30px">Pekerjaan </span></td>
        <td class="style4">:</td>
        <td class="style4"><?php echo $xpekerjaan_ayahibu?></td>
      </tr>
      <tr>
        <td class="style4"><div align="center"></div></td>
        <td class="style4">&nbsp;</td>
        <td class="style4"><span style="padding-right: 30px">Alamat</span></td>
        <td class="style4">:</td>
        <td class="style4"><?php echo $xalamat_ayahibu?></td>
      </tr>

      <tr>
        <td class="style4"><div align="center">12</div></td>
        <td colspan="2" class="style4">NAMA KELUARGA/KENALAN</td>
        <td class="style4">:</td>
        <td class="style4"><?php echo $xnama_keluarga?></td>
      </tr>
      <tr>
        <td class="style4"><div align="center"></div></td>
        <td class="style4">&nbsp;</td>
        <td class="style4"><span style="padding-right: 30px">Pekerjaan </span></td>
        <td class="style4">:</td>
        <td class="style4"><?php echo $xpekerjaan_keluarga?></td>
      </tr>
      <tr>
        <td class="style4"><div align="center"></div></td>
        <td class="style4">&nbsp;</td>
        <td class="style4"><span style="padding-right: 30px">Alamat</span></td>
        <td class="style4">:</td>
        <td class="style4"><?php echo $xalamat_keluarga?></td>
      </tr>
    </table></td>
  </tr>


  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="22" class="style4"><div align="center">13.</div></td>
        <td width="146" class="style4">NAMA PENANGGUNG BIAYA</td>
        <td width="10">:</td>
        <?php if ($xasuransi != 'UMUM') { ?>
        <td class="style4"><?php echo $xasuransi;?></td>
        <?php } else { ?><td class="style4"><?php echo '$xnamapenjamin'?></td> <?php } ?>
      </tr>
      <tr>
        <td class="style4">&nbsp;</td>
        <td class="style4">No. Askes/Asuransi</td>
        <td>:</td>
        <?php if ($xasuransi != 'UMUM') { ?>
        <td class="style4"><?php echo $xnoasuransi;?></td>
        <?php } else { ?><td class="style4"><?php echo 'Pasien Umum';?></td> <?php } ?>
        <!-- <td class="style4">noaskes</td> -->
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="22" class="style4"><div align="center">14.</div></td>
        <td width="146" class="style4">MASUK RS </td>
        <td width="8" class="style4">:</td>
        <td width="50" class="style4">Tanggal</td>
        <td width="10" class="style4">:</td>
        <td width="110" class="style4"><?php echo $xtgl_masuk;?></td>
        <td width="33" class="style4">Pukul</td>
        <td width="10" class="style4">:</td>
        <td class="style4"><?php echo $xjam_masuk;?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td class="style4">&nbsp;</td>
        <td class="style4">&nbsp;</td>
        <td class="style4">Ruangan</td>
        <td class="style4">:</td>
        <td class="style4"><?php echo $xruangan;?></td>
        <td class="style4">Kelas</td>
        <td class="style4">:</td>
        <td class="style4"><?php echo $xkelas;?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td class="style4">Dikirim Oleh Dokter / Puskes / RS </td>
        <td class="style4">:</td>
        <td colspan="6" class="style4"><?php echo $xfaskes;?></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td class="style4">Alamat Dokter / Puskes / RS</td>
        <td class="style4">:</td>
        <td colspan="6" class="style4"></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td class="style4">Dengan Diagnosis </td>
        <td class="style4">:</td>
        <td colspan="6" class="style4"><?php echo $xdiagnosa;?></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td class="style4">Prosedure Masuk </td>
        <td class="style4">:</td>
        <td colspan="6" class="style4"><?php echo $xprosedurmasuk;?></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td class="style4">Cara Masuk </td>
        <td class="style4">:</td>
        <td colspan="6" class="style4"><?php echo $xcara_masuk;?></td>
        </tr>
      
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="2">
      <tr>
        <td width="4%" rowspan="4" valign="top" class="style4"><div align="center">15.</div></td>
        <td width="28%" rowspan="4" valign="top" class="style4">DIPINDAHKAN Ke - </td>
        <td width="21%" class="style4"><div align="center">Tanggal</div></td>
        <td width="18%" class="style4"><div align="center">Waktu (pukul) </div></td>
        <td width="29%" class="style4"><div align="center">Ruang / Kelas </div></td>
      </tr>
      <tr>
        <td class="style4">1. </td>
        <td class="style4">&nbsp;</td>
        <td class="style4">&nbsp;</td>
      </tr>
      <tr>
        <td class="style4">2.</td>
        <td class="style4">&nbsp;</td>
        <td class="style4">&nbsp;</td>
      </tr>
      <tr>
        <td class="style4">3.</td>
        <td class="style4">&nbsp;</td>
        <td class="style4">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="22" class="style4"><div align="center">16.</div></td>
        <td width="145" class="style4">KELUAR RS </td>
        <td width="10" class="style4">:</td>
        <td class="style4">&nbsp;</td>
      </tr>
      <tr>
        <td class="style4"><div align="center">17.</div></td>
        <td class="style4">LAMA PERAWATAN </td>
        <td class="style4">:</td>
        <td class="style4">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="20" class="style4"><div align="center">18.</div></td>
        <td width="146" class="style4">RIWAYAT: ALERGI Terhadap</td>
        <td width="10" class="style4">:</td>
        <td class="style4">&nbsp;</td>
      </tr>
      <tr>
        <td class="style4"><div align="center">19.</div></td>
        <td class="style4">JENIS KASUS</td>
        <td class="style4">:</td>
        <td class="style4">&nbsp;</td>
      </tr>
      <tr>
        <td class="style4"><div align="center">20.</div></td>
        <td class="style4">DOKTER YANG MERAWAT</td>
        <td class="style4">:</td>
        <td class="style4">&nbsp;</td>
      </tr>
      <tr>
        <td class="style4"><div align="center">21</div></td>
        <td class="style4">DOKTER OPERATOR</td>
        <td class="style4">:</td>
        <td class="style4">&nbsp;</td>
      </tr>
      <tr>
        <td class="style4"><div align="center">22</div></td>
        <td class="style4">ANESTESI</td>

      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
