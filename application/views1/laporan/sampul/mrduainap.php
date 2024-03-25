<html>
	<head>
	<style type="text/css">

.style59 {font-size: 11px; font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; }
.style55 {	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style52 {font-size: 14px; font-family: Verdana, Arial, Helvetica, sans-serif;}
.style56 {
	font-size: 24px;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style54 {font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; }
.style60 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px;}

</style>
	</head>
	<body>

	<?php
      $qry2=$this->db->query("SELECT *,register.golongan as asuransi1,pasien.status as kawin FROM register INNER JOIN pasien ON register.no_rm = pasien.no_rm INNER JOIN register_detail ON register.notransaksi =register_detail.notransaksi and register.id = '".$id."' LIMIT 1");;
            foreach ($qry2->result_array() as $brs2) {
              $xno_rm=$brs2['no_rm'];
              $xnama_pasien=$brs2['nama_pasien'];
              if ($brs2['sex']=='L') { $xsex='Laki-Laki' ;} else { $xsex='Perempuan';};					
			  $xperawatan=$brs2['nama_unit'];
			  //$xkelas=$brs2['nama_kelas'];
              $xtglm=$brs2['tgl_masuk'];
              $ctanggal=substr($xtglm,8,2).'-'.substr($xtglm,5,2).'-'.substr($xtglm,0,4);
              $xtgl_lahir=$brs2['tgl_lahir'];
              $xasuransi=$brs2['asuransi1'];
			  $xnoasuransi=$brs2['no_askes'];
			  $xkamar=$brs2['kode_kamar'];
              if ($brs2['barulama']=='1') { $xkunjungan='Baru' ;} else { $xkunjungan='Lama';};					
              if ($brs2['barulama']=='1') { $xjenisKasus='Baru' ;} else { $xjenisKasus='Lama';};					
			  $xcatatan=$brs2['catatan'];
			  $xjenislayanan=$brs2['jenislayanan'];
			  $xalamat=$brs2['alamat'];
        $xrujukan=$brs2['rujukan'];
        $xpendidikan='';
        $xpekerjaan=$brs2['pekerjaan'];
        $xtelepon=$brs2['telp'].' '.$brs2['hp'];
        $xstatusperkawinan=$brs2['kawin'];
        $xagama=$brs2['agama'];
        $xnamapenjamin=$brs2['nama_png'];
        $xjenispelayanan=$brs2['jenislayanan'];
        $xpekerjaan=$brs2['pekerjaan'];        
        $xalamatkeluarga=$brs2['alamat_klg'];
        $xjammasuk=$brs2['jam_masuk'];
        $xnama_dokter=$brs2['nama_dokter'] ;
        //dicari dgn cara melihat posisi kode_unitR nama_unitR, cari kode unirR di munit,
        $xcaraterima='';
        //nama unit dan nama kamar
        $xnama_unit=$brs2['nama_unit'];
        $xkode_kamar=$brs2['kode_kamar'];
        $qry21=$this->db->query("SELECT nama_kamar,mkelas.kode_kelas,namatarif FROM mkamar INNER JOIN mkelas ON (mkamar.kode_kelas = mkelas.kode_kelas) where kode_kamar = '".$xkode_kamar."' LIMIT 1");;
        foreach ($qry21->result_array() as $brs3) { 
          $xnama_kamar=$brs3['nama_kamar'];
          $xkode_kelas=$brs3['kode_kelas'];
          $xkelas=$brs3['namatarif'];
        }
        $xruangrawat=$xnama_unit.' '.$xnama_kamar ;


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
      ?>


	<table width="548" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="assets/img/kopsurat.jpg" width="548" height="60" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="548" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <td height="18" colspan="7" valign="middle"><div align="right"><span class="style59">MR2/2 /R.I/2014</span></div></td>
        </tr>
      <tr>
        <td width="144"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><div align="center" class="style55">RINGKASAN</div></td>
          </tr>
          <tr>
            <td><div align="center" class="style55">PASIEN</div></td>
          </tr>
          <tr>
            <td><div align="center" class="style55">RAWAT INAP </div></td>
          </tr>
        </table></td>
        <td colspan="2"><div align="center"><span class="style52">NO.REKAM MEDIS</span> </div></td>
        <td colspan="2"><div align="center" class="style56"><?php echo $xno_rm ;?></div></td>
        <td colspan="2"><div align="center"><span class="style52">DIRAWAT KE : </span></div></td>
      </tr>
      <tr>
        <td width="144"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">NAMA</span></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style60"><?php echo $xnama_pasien ;?></span></td>
          </tr>
        </table></td>
        <td colspan="4"><table width="241" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">PESERTA JAMINAN : </span><span class="style60"><?php echo $xasuransi ;?></span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="144"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style54"><span class="style59">TGL.LAHIR / USIA </span></span></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style60"><?php echo  $ctgl_lahir.' / '. $xusia ;?></span></span></td>
          </tr>
        </table></td>
        <td colspan="4"><table width="241" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">NO. </span><span class="style60"><?php echo $xnoasuransi ;?></span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="144"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style54"><span class="style59">JENIS KELAMIN </span></span></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style60"><?php echo $xsex ;?></span></td>
          </tr>
        </table></td>
        <td colspan="4" rowspan="3"><table width="241" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">CARA PENERIMAAN MELALUI : </span></td>
          </tr>
          <tr>
            <td><span class="style60"><?php echo $xcaraterima ;?></span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td width="144"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style54"><span class="style59">PENDIDIKAN</span></span></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style60"><?php echo $xpendidikan ;?></span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td width="144"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style54"><span class="style59">PEKERJAAN</span></span></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style60"><?php echo $xpekerjaan ;?></span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td width="144"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">ALAMAT</span></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style60"><?php echo $xalamat ;?></span></td>
          </tr>
        </table></td>
        <td colspan="4" rowspan="3"><table width="241" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">CARA MASUK RUMAH SAKIT : </span></td>
          </tr>
          <tr>
            <td><span class="style60"><?php echo $xrujukan ;?></span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="144"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style54"><span class="style59">TELEPON / HP</span></span></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style60"><?php echo $xtelepon ;?></span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td width="144"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style54"><span class="style59">STATUS PERKAWINAN </span></span></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style60"><?php echo $xstatusperkawinan ;?></span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td width="144"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style54"><span class="style59">AGAMA</span></span></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style60"><?php echo $xagama ;?></span></td>
          </tr>
        </table></td>
        <td colspan="4" rowspan="2"><table width="241" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><div align="center"><span class="style59">TGL. MASUK </span></div></td>
          </tr>
          <tr>
            <td><div align="center"><span class="style60"><?php echo $ctanggal ;?></span></div></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="144"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style54"><span class="style59">NAMA PENJAMIN</span></span></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style60"><?php echo $xnamapenjamin ;?></span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td width="144"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style54"><span class="style59">NAMA / ALAMAT KELUARGA </span></span></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style60"><?php echo $xalamatkeluarga ;?></span></td>
          </tr>
        </table></td>
        <td colspan="4"><table width="241" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">JAM : </span><span class="style60"><span class="style60"><?php echo $xjammasuk ;?></span></span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="144" rowspan="2"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">BAG / SPESIALIS </span></td>
          </tr>
          <tr>
            <td height="30" valign="bottom"><span class="style60"><?php echo $xjenispelayanan ;?></span></td>
          </tr>
        </table></td>

        <td width="74" rowspan="2"><table width="72" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><div align="center"><span class="style59">RUANG RAWAT</span></div></td>
          </tr>
          <tr>
            <td height="30" valign="bottom"><div align="center"><span class="style60"><?php echo $xruangrawat ;?></span></div></td>
          </tr>
        </table></td>
        <td width="72" rowspan="2"><table width="68" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><div align="center"><span class="style59">KELAS</span></div></td>
          </tr>
          <tr>
            <td height="30" valign="bottom"><div align="center"><span class="style60"><?php echo $xkelas ;?></span></div></td>
          </tr>
        </table></td>
        <td width="71" rowspan="2"><table width="70" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><span class="style59">DIPINDAHKAN KE RUANG </span></td>
          </tr>
        </table></td>
        <td width="57" rowspan="2"><table width="57" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td width="57"><table width="57" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div align="center"><span class="style59">TGL</span></div></td>
          </tr>
        </table></td>
        <td width="57"><table width="57" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div align="center"><span class="style59">BULAN</span></div></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="57" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td width="57"><table width="57" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="3" rowspan="3"><table width="290" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="87" valign="top"><span class="style59">DIAGNOSA MASUK : R00.1 </span></td>
          </tr>
        </table></td>
        <td rowspan="3"><table width="70" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><span class="style59">TGL.KELUAR / MENINGGAL </span></td>
          </tr>
        </table></td>
        <td><table width="57" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div align="center"><span class="style59">TGL</span></div></td>
          </tr>
        </table></td>
        <td><table width="57" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div align="center"><span class="style59">BULAN</span></div></td>
          </tr>
        </table></td>
        <td><table width="57" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div align="center"><span class="style59">TAHUN</span></div></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="57" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="35">&nbsp;</td>
          </tr>
        </table></td>
        <td><table width="57" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td><table width="57" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="45" colspan="3"><table width="170" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="40" valign="top"><span class="style59">JAM :</span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td colspan="3"><table width="290" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">Taksiran Lama Rawat : </span></td>
          </tr>
        </table></td>
        <td colspan="3"><table width="183" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="112"><span class="style59">Lama Dirawat : </span></td>
            <td width="71"><span class="style59">Hari :</span></td>
          </tr>
        </table></td>
        <td><table width="57" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><div align="center"><span class="style59">No. Kode</span></div></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">DIAGNOSA UTAMA / AKHIR </span></td>
          </tr>
          <tr>
            <td height="30" valign="top"><span class="style59">( Ditulis dengan Huruf balok )</span></td>
          </tr>
        </table></td>
        <td colspan="5">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td rowspan="3"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">KOMPLIKASI</span></td>
          </tr>
        </table></td>
        <td colspan="5">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">Penyebab Cedera &amp; Keracunan/Monologi Neoplasma </span></td>
          </tr>
        </table></td>
        <td colspan="2">&nbsp;</td>
        <td colspan="3">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">Nama Oerasi Tindakan</span></td>
          </tr>
        </table></td>
        <td><table width="72" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><div align="center"><span class="style59">Gol. Operasi</span></div></td>
          </tr>
        </table></td>
        <td><table width="70" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><div align="center"><span class="style59">Jenis Anastesi </span></div></td>
          </tr>
        </table></td>
        <td colspan="3"><table width="183" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><div align="center"><span class="style59">TANGGAL </span></div></td>
            </tr>
        </table></td>
        <td><table width="57" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><div align="center"><span class="style59">No. Kode</span></div></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">1.</span></td>
          </tr>
        </table></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="3">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">2.</span></td>
          </tr>
        </table></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="3">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">3.</span></td>
          </tr>
        </table></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="3">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">Infeksi Nosokomial : </span></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td colspan="2"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">Penyebab Infeksi : </span></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td colspan="4"><table width="241" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">Imunisasi yang diperoleh selama dirawat : </span></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td colspan="3"><table width="290" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="30" valign="middle"><span class="style59">Pengobatan Kemoterafi : </span></td>
          </tr>
        </table></td>
        <td colspan="4"><table width="241" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="135"><span class="style59">Transfusi Darah : </span></td>
            <td width="106"><span class="style59">CC/Gol : </span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td width="144" rowspan="5"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">Keadaan Keluar : </span></td>
          </tr>
          <tr>
            <td height="56">&nbsp;</td>
          </tr>
        </table></td>
        <td colspan="2"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">1. Sembuh</span></td>
          </tr>
        </table></td>
        <td colspan="4" rowspan="5"><table width="241" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">Cara Keluar : </span></td>
          </tr>
          <tr>
            <td height="56">&nbsp;</td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td colspan="2"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">2. Membaik </span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td colspan="2"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">3. Belum Sembuh </span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td colspan="2"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">4. Mati &lt; 48 Jam </span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td colspan="2"><table width="142" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">5. Mati &gt; 48 Jam </span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td colspan="3"><table width="286" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">Dokter yang Merawat </span></td>
          </tr>
          <tr>
            <td height="35" valign="bottom"><span class="style60"><?php echo $xnama_dokter ;?></span></td>
          </tr>
        </table></td>
        <td colspan="4"><table width="241" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><span class="style59">Tanda Tangan </span></td>
          </tr>
          <tr>
            <td height="40">&nbsp;</td>
          </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
</table>
	</body>
</html>
