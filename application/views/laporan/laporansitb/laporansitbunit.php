
<html>
<head>
<title>Lap. TB</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">

.style3 {font-family: Arial, Helvetica, sans-serif; font-size: 9px; }
.style31 {font-family: Arial, Helvetica, sans-serif; font-size: 11px; }
.style32 {font-family: Arial, Helvetica, sans-serif; font-size: 11px;font-weight: bold; }
.style4 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 14px;
}
.style5 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}

</style>
</head>

<body>
<table width="100%" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td colspan="9"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><span class="style4"><?php echo ' '.getenv('V_NAMARS'); ?>  </span></td>
      </tr>
      <tr>
        <td><span class="style5">LAPORAN PASIEN TB </span></td>
      </tr>
    </table></td>
  </tr>
  <?php 
					  $jumlaki=0;
					  $jumpasien=0;
					  $jumbaru=0;
            $umum=0;
            $jamkesda=0;
            $inhealt=0;
            $bpjs=0;
            $jasaraharja=0;
            $lainlain=0;
		foreach($l as $baris) {
		?>
  <tr>
    <td colspan="9"><span class="style5"><?php echo $baris["nama_unit"]; ?></span></td>
  </tr>
  <tr>
    <td colspan="9"><table width="100%"  border="1" cellspacing="0" cellpadding="2">
      <tr>
        <td width="6%"><div align="center"><span class="style3">Tanggal </span></div></td>
        <td width="3%" class="style3"><div align="center">No.</div></td>
        <td width="6%" class="style3"><div align="center">No.RM</div></td>
        <td width="15%" class="style3"><div align="center">Nama Pasien </div></td>
        <td width="3%" class="style3"><div align="center">JK</div></td>
        <td class="style3">Alamat</td>
        <td width="6%" class="style3"><div align="center">Golongan</div></td>
        <td width="5%" class="style3"><div align="center">Kunjungan</div></td>
        <td width="4%" class="style3"><div align="center">ICD.10</div></td>
        <td width="30%" class="style3"><div align="center">Nama Diagnosa</div></td>
        </tr>
        
    <?php 
        $i = 1; 
        if ($l == null) {?>
				<tr>
					<td colspan="7">Data Kosong</td>
				</tr>
				<?php } else {

					foreach($baris["data"] as $row) {
				?>
				<tr>
					<td class="style3"><div align="center"><?php echo $row->tgl_keluar;?></td>
					<td class="style3"><div align="center"><?php echo $i;?></td>
					<td class="style3"><div align="center"><?php echo $row->no_rm;?></td>
					<td class="style3"><?php echo $row->nama_pasien;?></td>
					<td class="style3"><div align="center"><?php echo substr($row->sex,0,1);?></td>
					<td class="style3"><?php echo $row->alamat;?></td>
					<td class="style3"><div align="center"><?php echo $row->golongan;?></div></td>
					<?php if ($row->barulama=='2'){$cbl='Lama';} else {$cbl='Baru';} ?>
					<td class="style3"><div align="center"><?php echo $cbl;?></td>
					<td class="style3"><div align="center"><?php echo $row->icd;?></td>
					<td class="style3"><div align="left"><?php echo $row->diagnosa;?></td>
				</tr>
				
		  <?php
				  	if ($row->sex=='L') {
						  $jumlaki++;
					}

					// if ($row->barulama=='1'){$jumbaru++;}
          if ($row->tgl_masuk == $row->tgl_daftar) {
              $jumbaru++;
          }

          $jumpasien++;
          $i++;

        }} 
		?>


    </table></td>
  </tr>
  
  <?php
		}
		$jumperempuan= $jumpasien-$jumlaki;
		$jumlama=$jumpasien-$jumbaru;
		?>
  <tr>
  
    <td colspan="9"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10%" class="style31"><strong>REKAPITULASI</strong></td>
        <td width="10%" class="style31"><div align="right">Laki Laki : </div></td>
        <td width="7%" class="style31"><?php echo  $jumlaki; ?></td>
        <td width="10%" class="style31"><div align="right">Pasien Baru :</div></td>
        <td width="7%" class="style31"><?php echo $jumbaru; ?></td>
        <td >&nbsp;</td>
      </tr>
      <tr>
        <td class="style31">&nbsp;</td>
        <td class="style31"><div align="right">Perempuan : </div></td>
        <td class="style31"><?php echo $jumperempuan; ?></td>
        <td class="style31"><div align="right">Pasien Lama :</div></td>
        <td class="style31"><?php echo $jumlama; ?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="style32">&nbsp;</td>
        <td class="style32"><div align="right">Jumlah Pasien : </div></td>
        <td class="style32"><?php echo $jumpasien; ?></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>

</table>
<table width="100%"  border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
