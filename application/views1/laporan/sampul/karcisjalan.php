<html>
	<head>
	<style type="text/css">

.style1 {
	font-size: 18px;
	font-weight: bold;
	font-family: Geneva, Arial, Helvetica, sans-serif;
}
.style16 {font-size: 12px}
.style21 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 11px; }
.style22 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 11px; font-weight: bold; }
.style23 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}

</style>

	</head>
  <body>
      <?php
      $qry2=$this->db->query("SELECT *,register.golongan as asuransi1 FROM register INNER JOIN pasien ON register.no_rm = pasien.no_rm INNER JOIN register_detail ON register.notransaksi =register_detail.notransaksi and register.id = '".$id."' LIMIT 1");;
            foreach ($qry2->result_array() as $brs2) {
              $xno_rm=$brs2['no_rm'];
              $xnama_pasien=$brs2['nama_pasien'];
              if ($brs2['sex']=='L') { $xsex='Laki-Laki' ;} else { $xsex='Perempuan';};					
              $xperawatan=$brs2['nama_unit'];
              $xtglm=$brs2['tgl_masuk'];
              $ctanggal=substr($xtglm,8,2).'-'.substr($xtglm,5,2).'-'.substr($xtglm,0,4);
              $xtgl_lahir=$brs2['tgl_lahir'];
              $xasuransi=$brs2['asuransi1'];
              $xnoasuransi=$brs2['no_askes'];
              if ($brs2['barulama']=='1') { $xkunjungan='Baru' ;} else { $xkunjungan='Lama';};					
              if ($brs2['barulama']=='1') { $xjenisKasus='Baru' ;} else { $xjenisKasus='Lama';};					
              $xcatatan=$brs2['catatan'];

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
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"><div align="center"><img src="assets/img/kopsurat.jpg" width="555" height="60" /></div></td>
  </tr>
  <tr>
    <td width="30%"><span class="style22">KARCIS RAWAT INAP <?php echo $xperawatan ;?></span></td>
    <td width="70%"><span class="style22">DATA TINDAKAN </span></td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="23%" class="style21">No.RM</td>
        <td width="1%">:</td>
        <td class="style21"><?php echo $xno_rm ;?></td>
      </tr>
      <tr>
        <td class="style21">Nama Pasien </td>
        <td>:</td>
        <td height="12" class="style21"><?php echo $xnama_pasien ;?></td>
      </tr>
      <tr>
        <td class="style21">Umur / JK </td>
        <td>:</td>
        <td height="12" class="style21"><?php echo $y.' Thn / '.$xsex;?></td>
      </tr>
      <tr>
        <td class="style21">Perawatan</td>
        <td>:</td>
        <td height="12"  class="style21"><?php echo $xperawatan ;?></td>
      </tr>
      <tr>
        <td class="style21">Tanggal</td>
        <td>:</td>
        <td height="12" class="style21"><?php echo $ctanggal ;?></td>
      </tr>
      <tr>
        <td class="style21">Asuransi</td>
        <td>:</td>
        <td height="12" class="style21"><?php echo $xasuransi ;?></td>
      </tr>
      <tr>
        <td class="style21">No. Asuransi </td>
        <td>:</td>
        <td height="12" class="style21"><?php echo $xnoasuransi ;?></td>
      </tr>
      <tr>
        <td class="style21">Kunjungan</td>
        <td>:</td>
        <td height="12" class="style21"><?php echo $xkunjungan ;?></td>
      </tr>
      <tr>
        <td class="style21">Jenis Kasus </td>
        <td>:</td>
        <td height="12" class="style21"><?php echo $xjenisKasus ;?></td>
      </tr>
      <tr>
        <td class="style21">Catatan</td>
        <td>:</td>
        <td height="12" class="style21"><?php echo $xcatatan ;?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3"><div align="center">(............................................)</div></td>
        </tr>
    </table></td>
    <td>
      <table width="100%"  border="1" cellspacing="0" cellpadding="2">
        <tr>
          <td height="25" width="70%" class="style21">1</td>
          <td width="30%" class="style21">Rp.</td>
        </tr>
        <tr>
          <td height="25" class="style21">2</td>
          <td class="style21">Rp.</td>
        </tr>
        <tr>
          <td height="25" class="style21">3</td>
          <td class="style21">Rp.</td>
        </tr>
        <tr>
          <td height="25" class="style21">4</td>
          <td class="style21">Rp.</td>
        </tr>
        <tr>
          <td height="25" class="style21">5</td>
          <td class="style21">Rp.</td>
        </tr>
        <tr>
          <td height="25" class="style22"><div align="right">TOTAL</div></td>
          <td height="25" class="style21">Rp.</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>


