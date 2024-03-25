<html>
	<head>
	<style type="text/css">

.style59 {font-size: 11px; font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; }
.style60 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: large;
}
.style61 {font-size: small}
.style54 {font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; }
.style62 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px;}

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
        $xnama_ortu=$brs2['nama_ortu'] ;
        $xpekerjaanortu='';
        $xnamasuamiistri='';
        $xpekerjaansuamiistri='';
        //dicari dgn cara melihat posisi kode_unitR nama_unitR, cari kode unirR di munit,
        $xcaraterima='';
        //nama unit dan nama kamar
        $xnama_unit=$brs2['nama_unit'];
        $xkode_kamar=$brs2['kode_kamar'];

      


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

	<table width="546" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="assets/img/kopsurat.jpg" width="544" height="60" align="top" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="546" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="4"><table width="540" border="0" cellspacing="2">
          <tr>
            <td><div align="right"><span class="style59">ODP 1/2/R.J/2</span></div></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td colspan="2"><table width="354" border="0" cellspacing="2">
          <tr>
            <td><div align="center"><span class="style60">RINGKASAN PASIEN POLIKLINIK </span></div></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="177" border="0" cellspacing="2">
          <tr>
            <td><div align="center"><span class="style60"><span class="style61">NO.RM</span> <?php echo $xno_rm ;?> </span></div></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td width="179"><table width="177" border="0" cellspacing="2">
          <tr>
            <td height="16"><span class="style59">NAMA</span></td>
          </tr>
        </table></td>
        <td colspan="3"><table width="354" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $xnama_pasien ;?></span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td><table width="177" border="0" cellspacing="2">
          <tr>
            <td height="16"><span class="style54"><span class="style59">TEMPAT &amp; TGL.LAHIR </span></span></td>
          </tr>
        </table></td>
        <td width="179"><table width="177" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $ctgl_lahir ;?></span></td>
          </tr>
        </table></td>
        <td><table width="94" border="0" cellspacing="2">
          <tr>
            <td><span class="style59">STATUS</span></td>
          </tr>
        </table></td>
        <td><table width="78" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $xstatusperkawinan ;?></span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="177" border="0" cellspacing="2">
          <tr>
            <td height="16"><span class="style59">UMUR</span></td>
          </tr>
        </table></td>
        <td><table width="177" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $xusia ;?></span></td>
          </tr>
        </table></td>
        <td><table width="94" border="0" cellspacing="2">
          <tr>
            <td><span class="style59">JENIS KELAMIN </span></td>
          </tr>
        </table></td>
        <td><table width="78" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $xsex ;?></span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="177" border="0" cellspacing="2">
          <tr>
            <td height="16"><span class="style59">ALAMAT &amp; NO.TELP </span></td>
          </tr>
        </table></td>
        <td colspan="3"><table width="354" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $xalamat.' / '.$xtelepon ;?></span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="177" border="0" cellspacing="2">
          <tr>
            <td height="16"><span class="style59">PEKERJAAN</span></td>
          </tr>
        </table></td>
        <td colspan="3"><table width="354" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $xpekerjaan ;?></span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="177" border="0" cellspacing="2">
          <tr>
            <td height="16"><span class="style59">AGAMA</span></td>
          </tr>
        </table></td>
        <td colspan="3"><span class="style62"><?php echo $xagama ;?></span></td>
        </tr>
      <tr>
        <td><table width="177" border="0" cellspacing="2">
          <tr>
            <td height="16"><span class="style59">NAMA AYAH / IBU </span></td>
          </tr>
        </table></td>
        <td><table width="177" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $xnama_ortu ;?></span></td>
          </tr> 
        </table></td>
        <td colspan="2"><table width="177" border="0" cellspacing="2">
          <tr>
            <td><span class="style59">PEKERJAAN : </span><span class="style62"><span class="style62"><?php echo $xpekerjaanortu ;?></span></span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="177" border="0" cellspacing="2">
          <tr>
            <td height="16"><span class="style59">NAMA SUAMI / ISTRI </span></td>
          </tr>
        </table></td>
        <td><table width="177" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $xnamasuamiistri ;?></span></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="177" border="0" cellspacing="2">
          <tr>
            <td><span class="style59">PEKERJAAN : </span><span class="style62"><span class="style62"><?php echo $xpekerjaansuamiistri ;?></span></span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="177" border="0" cellspacing="2">
          <tr>
            <td height="16"><span class="style59">CARA BAYAR </span></td>
          </tr>
        </table></td>
        <td><table width="177" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $xasuransi ;?></span></td>
          </tr>
        </table></td>
        <td width="97"><table width="94" border="0" cellspacing="2">
          <tr>
            <td><span class="style59">NO ASURANSI </span></td>
          </tr>
        </table></td>
        <td width="81"><table width="78" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $xnoasuransi ;?></span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="177" border="0" cellspacing="2">
          <tr>
            <td height="16"><span class="style59">TANGGAL MASUK </span></td>
          </tr>
        </table></td>
        <td><table width="177" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $ctanggal ;?></span></td>
          </tr>
        </table></td>
        <td><table width="94" border="0" cellspacing="2">
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td><table width="78" border="0" cellspacing="2">
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="4"><table width="540" border="0" cellspacing="2">
          <tr>
            <td height="16"><div align="center"><span class="style59">PERUBAHAN ALAMAT </span></div></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td colspan="2"><table width="354" border="0" cellspacing="2">
          <tr>
            <td height="22"><span class="style59">I.</span></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="177" border="0" cellspacing="2">
          <tr>
            <td><span class="style59">III.</span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="2"><table width="354" border="0" cellspacing="2">
          <tr>
            <td height="22"><span class="style59">II.</span></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="177" border="0" cellspacing="2">
          <tr>
            <td><span class="style59">IV.</span></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="546" border="1" cellspacing="0">
      <tr>
        <td width="84"><div align="center"><span class="style59">TANGGAL KUNJUNGAN </span></div></td>
        <td width="105"><div align="center"><span class="style59">POLIKLINIK TUJUAN </span></div></td>
        <td width="179"><div align="center"><span class="style59">DIAGNOSA, KONSULTASI, TINDAKAN/OPERASI</span></div></td>
        <td width="92"><div align="center"><span class="style59">TTD DOKTER POLIKLINIK</span></div></td>
        <td width="64"><div align="center"><span class="style59">KODE ICD</span></div></td>
      </tr>
      <tr>
        <td height="22">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="22">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="22">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="22">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="22">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="28">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="22">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="22">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="22">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="22">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="22">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="22">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="22">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
	</body>
</html>
