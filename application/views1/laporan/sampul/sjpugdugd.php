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

        $xnama_unit=$brs2['nama_unit'];
        $xkode_kamar=$brs2['kode_kamar'];
        $xnosep=$brs2['nosep'];
        $xpisat=$brs2['pisat'];
        $xfaskes1=$brs2['nmppkrujukan'];
        $xtglr=$brs2['tglrujukan'];
        $ctglrujukan=substr($xtglr,8,2).'-'.substr($xtglr,5,2).'-'.substr($xtglr,0,4);
        $xdiagnosarujukan=$brs2['diag'];
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
    <td><table width="548" border="1" cellspacing="0">
      <tr>
        <td width="124"><table width="122" border="0" cellspacing="2">
          <tr>
            <td height="18"><span class="style59">No. Rekam Medik </span></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="155" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $xno_rm ;?></span></td>
          </tr>
        </table></td>
        <td width="96"><table width="95" border="0" cellspacing="2">
          <tr>
            <td><span class="style59">Tgl. Pemeriksaan</span></td>
          </tr>
        </table></td>
        <td width="81"><table width="80" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $ctanggal.' '.$xjammasuk ;?></span></td>
          </tr>
        </table></td>
        <td width="70"><table width="69" border="0" cellspacing="2">
          <tr>
            <td><span class="style59">Cara Pulang</span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="124"><table width="122" border="0" cellspacing="2">
          <tr>
            <td height="18"><span class="style59">Asuransi &amp; No.Asuransi </span></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="155" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $xasuransi.'/'.$xnoasuransi ;?></span></td>
          </tr>
        </table></td>
        <td><table width="95" border="0" cellspacing="2">
          <tr>
            <td><span class="style59">Poli Tujuan</span></td>
          </tr>
        </table></td>
        <td><table width="80" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $xnama_unit ;?></span></td>
          </tr>
        </table></td>
        <td><table width="69" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">1. Sembuh</span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="122" border="0" cellspacing="2">
          <tr>
            <td><span class="style59">Nama</span></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="155" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $xnama_pasien ;?></span></td>
          </tr>
        </table></td>
        <td><table width="95" border="0" cellspacing="2">
          <tr>
            <td><span class="style59">No.SEP</span></td>
          </tr>
        </table></td>
        <td><table width="80" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $xnosep ;?></span></td>
          </tr>
        </table></td>
        <td><table width="69" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">2. Dirujuk </span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="122" border="0" cellspacing="2">
          <tr>
            <td height="18"><span class="style59">Tanggal Lahir </span></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="155" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $ctgl_lahir ;?></span></td>
          </tr>
        </table></td>
        <td><table width="95" border="0" cellspacing="2">
          <tr>
            <td><span class="style59">P/I/S/A/T</span></td>
          </tr>
        </table></td>
        <td><table width="80" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $xpisat ;?></span></td>
          </tr>
        </table></td>
        <td><table width="69" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">3. Pulang </span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="122" border="0" cellspacing="2">
          <tr>
            <td height="18"><span class="style59">Jenis Kelamin  </span></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="155" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $xsex ;?></span></td>
          </tr>
        </table></td>
        <td><table width="95" border="0" cellspacing="2">
          <tr>
            <td><span class="style59">FASKES I</span></td>
          </tr>
        </table></td>
        <td><table width="80" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $xfaskes1 ;?></span></td>
          </tr>
        </table></td>
        <td><table width="69" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">4. Dirawat </span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="122" border="0" cellspacing="2">
          <tr>
            <td height="18"><span class="style59">Agama</span></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="155" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $xagama ;?></span></td>
          </tr>
        </table></td>
        <td><table width="95" border="0" cellspacing="2">
          <tr>
            <td><span class="style59">Tgl. Rujukan </span></td>
          </tr>
        </table></td>
        <td><table width="80" border="0" cellspacing="2">
          <tr>
            <td><span class="style62"><?php echo $ctglrujukan ;?></span></td>
          </tr>
        </table></td>
        <td><table width="69" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">5. Meninggal </span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="6"><table width="536" border="0" cellspacing="0">
          <tr>
            <td><div align="left"><span class="style59">Anamnesa UGD : </span></div></td>
          </tr>
          <tr>
            <td height="60"><div align="center"></div></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td colspan="3"><table width="277" border="0" cellspacing="2">
          <tr>
            <td height="18"><div align="center"><span class="style59">DIAGNOSA (Ditulis dengan Huruf Kapital) </span></div></td>
          </tr>
        </table></td>
        <td width="96"><table width="95" border="0" cellspacing="2">
          <tr>
            <td><span class="style59">KODE ICD 10 </span></td>
          </tr>
        </table></td>
        <td colspan="2" rowspan="3"><table width="149" height="60" border="0" cellspacing="2">
          <tr>
            <td height="18"><div align="center"><span class="style59">TTD &amp; NAMA DOKTER</span></div></td>
          </tr>
          <tr>
            <td height="45" valign="bottom"><div align="center">(................................)</div></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td><table width="122" border="0" cellspacing="2">
          <tr>
            <td height="18"><div align="center"><span class="style59">Primer</span></div></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="155" border="0" cellspacing="2">
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td><table width="122" border="0" cellspacing="2">
          <tr>
            <td height="18"><div align="center"><span class="style59">Sekunder</span></div></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="155" border="0" cellspacing="2">
          <tr>
            <td height="18"><span class="style62">1.</span></td>
          </tr>
        </table></td>
        <td><table width="95" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">1.</span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><table width="155" border="0" cellspacing="2">
          <tr>
            <td height="18"><span class="style62">2.</span></td>
          </tr>
        </table></td>
        <td><table width="95" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">2.</span></td>
          </tr>
        </table></td>
        <td colspan="2" rowspan="4"><table width="149" height="80" border="0" cellspacing="1">
          <tr>
            <td height="18"><div align="center"><span class="style59">TTD PASIEN </span></div></td>
          </tr>
          <tr>
            <td height="70" valign="bottom"><div align="center">(................................)</div></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><table width="155" border="0" cellspacing="2">
          <tr>
            <td height="18"><span class="style62">3.</span></td>
          </tr>
        </table></td>
        <td><table width="95" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">3.</span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><table width="155" border="0" cellspacing="2">
          <tr>
            <td height="18"><span class="style62">4.</span></td>
          </tr>
        </table></td>
        <td><table width="95" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">4.</span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><table width="155" border="0" cellspacing="2">
          <tr>
            <td height="18"><span class="style62">5.</span></td>
          </tr>
        </table></td>
        <td><table width="95" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">5.</span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td colspan="6"><table width="536" border="0" cellspacing="0">
          <tr>
            <td><div align="center"><span class="style59">TINDAKAN DAN PEMERIKSAAN PENUNJANG</span></div></td>
          </tr>
          <tr>
            <td><div align="center"><span class="style59">(Ditulis dengan Huruf Kapital)</span></div></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td><table width="122" border="0" cellspacing="2">
          <tr>
            <td height="18"><div align="center"><span class="style59">TINDAKAN</span></div></td>
          </tr>
        </table></td>
        <td width="68"><table width="64" border="0" cellspacing="1">
          <tr>
            <td><div align="center"><span class="style59">Paraf Petugas </span></div></td>
          </tr>
        </table></td>
        <td width="83"><table width="81" border="0" cellspacing="1">
          <tr>
            <td width="81"><div align="center"><span class="style59">PENUNJANG</span></div></td>
          </tr>
        </table></td>
        <td><table width="95" border="0" cellspacing="2">
          <tr>
            <td><div align="center"><span class="style59">Paraf Petugas </span></div></td>
          </tr>
        </table></td>
        <td colspan="2"><table width="149" border="0" cellspacing="2">
          <tr>
            <td><div align="center"><span class="style59">KODE ICD 9 CM </span></div></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td><table width="64" border="0" cellspacing="1">
          <tr>
            <td height="18"><span class="style62">1.</span></td>
          </tr>
        </table></td>
        <td width="68"><table width="64" border="0" cellspacing="1">
          <tr>
            <td><span class="style62">1.</span></td>
          </tr>
        </table></td>
        <td width="83"><table width="64" border="0" cellspacing="1">
          <tr>
            <td><span class="style62">6.</span></td>
          </tr>
        </table></td>
        <td><table width="95" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">6.</span></td>
          </tr>
        </table></td>
        <td><table width="80" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">1.</span></td>
          </tr>
        </table></td>
        <td><table width="69" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">6. </span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="64" border="0" cellspacing="1">
          <tr>
            <td height="18"><span class="style62">2.</span></td>
          </tr>
        </table></td>
        <td><table width="64" border="0" cellspacing="1">
          <tr>
            <td><span class="style62">2.</span></td>
          </tr>
        </table></td>
        <td><table width="64" border="0" cellspacing="1">
          <tr>
            <td><span class="style62">7.</span></td>
          </tr>
        </table></td>
        <td><table width="95" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">7.</span></td>
          </tr>
        </table></td>
        <td><table width="80" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">2.</span></td>
          </tr>
        </table></td>
        <td><table width="69" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">7. </span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="64" border="0" cellspacing="1">
          <tr>
            <td height="18"><span class="style62">3.</span></td>
          </tr>
        </table></td>
        <td><table width="64" border="0" cellspacing="1">
          <tr>
            <td><span class="style62">3.</span></td>
          </tr>
        </table></td>
        <td><table width="64" border="0" cellspacing="1">
          <tr>
            <td><span class="style62">8.</span></td>
          </tr>
        </table></td>
        <td><table width="95" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">8.</span></td>
          </tr>
        </table></td>
        <td><table width="80" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">3.</span></td>
          </tr>
        </table></td>
        <td><table width="69" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">8. </span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="64" border="0" cellspacing="1">
          <tr>
            <td height="18"><span class="style62">4.</span></td>
          </tr>
        </table></td>
        <td><table width="64" border="0" cellspacing="1">
          <tr>
            <td><span class="style62">4.</span></td>
          </tr>
        </table></td>
        <td><table width="64" border="0" cellspacing="1">
          <tr>
            <td><span class="style62">9.</span></td>
          </tr>
        </table></td>
        <td><table width="95" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">9.</span></td>
          </tr>
        </table></td>
        <td><table width="80" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">4.</span></td>
          </tr>
        </table></td>
        <td><table width="69" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">9. </span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="64" border="0" cellspacing="1">
          <tr>
            <td height="18"><span class="style62">5.</span></td>
          </tr>
        </table></td>
        <td><table width="64" border="0" cellspacing="1">
          <tr>
            <td><span class="style62">5.</span></td>
          </tr>
        </table></td>
        <td><table width="64" border="0" cellspacing="1">
          <tr>
            <td><span class="style62">10.</span></td>
          </tr>
        </table></td>
        <td><table width="95" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">10.</span></td>
          </tr>
        </table></td>
        <td><table width="80" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">5.</span></td>
          </tr>
        </table></td>
        <td><table width="69" border="0" cellspacing="2">
          <tr>
            <td><span class="style62">10. </span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="36" colspan="3"><table width="122" border="0" cellspacing="2">
          <tr>
            <td><span class="style59">Biaya Rill RS Rp. </span></td>
          </tr>
        </table></td>
        <td colspan="3"><table width="200" border="0" cellspacing="2">
          <tr>
            <td><span class="style59">Tarif INA CBG Rp.  </span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="3"><table width="200" border="0" align="center" cellspacing="2">
          <tr>
            <td><div align="center"><span class="style59">PETUGAS PPATRS </span></div></td>
          </tr>
        </table></td>
        <td colspan="3"><table width="210" border="0" align="center" cellspacing="2">
          <tr>
            <td><div align="center"><span class="style59">VERIFIKATOR BPJS KESEHATAN </span></div></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="3"><table width="200" border="0" align="center" cellspacing="2">
          <tr>
            <td height="60" valign="bottom"><div align="center"><span class="style59">(.................................) </span></div></td>
          </tr>
        </table></td>
        <td colspan="3"><table width="200" border="0" align="center" cellspacing="2">
          <tr>
            <td height="60" valign="bottom"><div align="center"><span class="style59">(.................................)</span></div></td>
          </tr>
        </table></td>
      </tr>

    </table></td>
  </tr>
</table>
	</body>
</html>
