<html>
	<head>


		<style type="text/css">
.style24 {
	font-size: 37px;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style25 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 60px;
	font-weight: bold;
}
.style33 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; }
.style40 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 17px; font-weight: bold; }
.style46 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 20px; }
.style47 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 20px; font-weight: bold; }
.style48 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 21px; font-weight: bold; }

		</style>

		</head>
	<body>
	<?php
      $qry2=$this->db->query("SELECT *,register.golongan as asuransi1,register_detail.nama_unit as nama_unitnya FROM register INNER JOIN pasien ON register.no_rm = pasien.no_rm INNER JOIN register_detail ON register.notransaksi =register_detail.notransaksi and register_detail.id = '".$id."' LIMIT 1");;
            foreach ($qry2->result_array() as $brs2) {
              $xno_rm=$brs2['no_rm'];
              $xnama_pasien=$brs2['nama_pasien'];
              if ($brs2['sex']=='L') { $xsex='Laki-Laki' ;} else { $xsex='Perempuan';};					
			  $xperawatan=$brs2['nama_unitnya'];
			  $xkelas=$brs2['nama_kelas'];
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
        $xnama_dokter=$brs2['nama_dokter'];

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
<table width="555" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center"><img src="assets/img/kopsurat.jpg" width="555" height="60" /></div></td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center" class="style24">FORMULIR RAWAT INAP </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center" class="style25">NO.RM : <?php echo $xno_rm ;?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td><table width="553" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="56">&nbsp;</td>
        <td width="155" height="35" class="style47">NAMA</td>
        <td><span class="style46">: <?php echo $xnama_pasien ;?></span></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="35" class="style47">TGL.LAHIR</td>
        <td width="342"><span class="style46">: <?php echo $ctgl_lahir ;?></span></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="35" class="style47">USIA</td>
        <td><span class="style46">: <?php echo $xusia ;?></span></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="35" class="style47">ALAMAT</td>
        <td><span class="style46">: <?php echo $xalamat ;?></span></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="35" class="style47">TGL.MASUK</td>
        <td><span class="style46">: <?php echo $ctanggal ;?></span></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="35" class="style47">JENIS LAYANAN </td>
        <td><span class="style46">: <?php echo $xjenislayanan ;?></span></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="35" class="style47">TYPE</td>
        <td><span class="style46">: <?php echo $xasuransi ;?></span></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="35" class="style47">PERAWATAN/KELAS</td>
        <td><span class="style46">: <?php echo $xperawatan.' / '.$xkelas ;?></span></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="35" class="style47">KAMAR</td>
        <td><span class="style46">: <?php echo $xkamar ;?></span></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="35" class="style47">TGL. KELUAR </td>
        <td class="style46">:</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="40" class="style40">&nbsp;</td>
        <td><br /></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="35" class="style48">DOKTER : </td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><table width="496" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="29" class="style33"><div align="right" class="style48">
              <div align="center">1. </div>
            </div></td>
            <td width="467" height="35" class="style33"><?php echo $xnama_dokter ;?></td>
          </tr>
          <tr>
            <td class="style33"><div align="right" class="style48">
              <div align="center">2.</div>
            </div></td>
            <td height="35" class="style33">__________________________________________________</td>
          </tr>
          <tr>
            <td class="style33"><div align="right" class="style48">
              <div align="center">3.</div>
            </div></td>
            <td height="35" class="style33">__________________________________________________</td>
          </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
</table>
	</body>
</html>
