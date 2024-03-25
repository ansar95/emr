
<html>
<head>
<title>Lap.Reg.RJ</title>
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
        <td><span class="style5">LAPORAN REGISTER PASIEN RAWAT JALAN </span></td>
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
    <td colspan="9"><span class="style5"><?php echo $baris["unit"]; ?></span></td>
  </tr>
  <tr>
    <td colspan="9"><table width="100%"  border="1" cellspacing="0" cellpadding="2">
      <tr>
        <td width="7%"><div align="center"><span class="style3">Tgl. Kunjungan </span></div></td>
        <td width="3%" class="style3"><div align="right">No.</div></td>
        <td width="5%" class="style3"><div align="center">No.RM</div></td>
        <td width="15%" class="style3"><div align="center">Nama Pasien </div></td>
        <td width="2%" class="style3"><div align="center">JK</div></td>
        <td class="style3">Alamat</td>
        <td width="4%" class="style3"><div align="center">ICD 10</div></td>
        <td width="25%" class="style3"><div align="center">Diagnosa</div></td>
        <td width="6%" class="style3"><div align="center">Golongan</div></td>
        <td width="5%" class="style3"><div align="center">Kunjungan</div></td>
        <td width="10%" class="style3"><div align="center">Trx</div></td>
        </tr>
        
    <?php 
        $i = 1; 
        if ($l == null) {?>
				<tr>
					<td colspan="7">Data Kosong</td>
				</tr>
				<?php } else {

					foreach($baris["data"] as $row) {
            $notransaksi=$row->notransaksi;
            //cari diagnosa dulu
            $noicd='';
            $namadiagnosa='';

            $qry1 = $this->db->query("SELECT nodaftar,diagnosa,icdlatin FROM pdiagnosa WHERE notransaksi='$notransaksi' and type=1 LIMIT 1 ");
            foreach ($qry1->result_array() as $brs9) {
                $noicd=$brs9['nodaftar'];
                $namadiagnosa=$brs9['diagnosa'];
                if ($namadiagnosa == '') {
                  $namadiagnosa=$brs9['icdlatin'];
                }
            }
				?>
				<tr>
					<td class="style3"><div align="center"><?php echo $row->tgl;?></td>
					<td class="style3"><div align="right"><?php echo $i;?></td>
					<td class="style3"><div align="center"><?php echo $row->norm;?></td>
					<td class="style3"><?php echo $row->nama;?></td>
					<td class="style3"><div align="center"><?php echo substr($row->sex,0,1);?></td>
					<td class="style3"><?php echo $row->alamat;?></td>
					<td class="style3"><div align="center"><?php echo $noicd;?></td>
					<td class="style3"><?php echo $namadiagnosa;?></td>
					<td class="style3"><?php echo $row->golongan;?></td>
					<?php if ($row->barulama=='2'){$cbl='Lama';} else {$cbl='Baru';} ?>
					<td class="style3"><div align="center"><?php echo $cbl;?></td>
					<td class="style3"><div align="center"><?php echo $row->notransaksi;?></td>
				</tr>
				
		  <?php
				  	if ($row->sex=='L') {
						  $jumlaki++;
					}

					// if ($row->barulama=='1'){$jumbaru++;}
          if ($row->tgl == $row->tgl_daftar) {
              $jumbaru++;
          }

          $jumpasien++;
          $i++;

          if( $row->golongan == 'UMUM') {
            $umum++;
          } elseif($row->golongan == 'JAMKESDA') {
            $jamkesda++;
          } elseif($row->golongan == 'INHEALT' || $row->golongan == 'IOM') {
            $inhealt++;
          } elseif($row->golongan == 'BPJS') {
            $bpjs++;
          } elseif($row->golongan == 'JS.RAHARJA') {
            $jasaraharja++;
          } else {  
            $lainlain++;
          }
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
        <td width="10%" class="style31"><div align="right">BPJS :</div></td>
        <td width="7%" class="style31"><?php echo $bpjs; ?></td>
        <td width="10%" class="style31"><div align="right">UMUM :</div></td>
        <td width="7%" class="style31"><?php echo $umum; ?></td>
        <td width="10%" class="style31"><div align="right">JAMKESDA :</div></td>
        <td width="7%" class="style31"><?php echo $jamkesda; ?></td>
        <td >&nbsp;</td>
      </tr>
      <tr>
        <td class="style31">&nbsp;</td>
        <td class="style31"><div align="right">Perempuan : </div></td>
        <td class="style31"><?php echo $jumperempuan; ?></td>
        <td class="style31"><div align="right">Pasien Lama :</div></td>
        <td class="style31"><?php echo $jumlama; ?></td>
        <td class="style31"><div align="right">IOM/INHEALT :</div></td>
        <td class="style31"><?php echo $inhealt; ?></td>
        <td class="style31"><div align="right">JS.Raharja :</div></td>
        <td class="style31"><?php echo $jasaraharja; ?></td>
        <td class="style31"><div align="right">Lainnya :</div></td>
        <td class="style31"><?php echo $lainlain; ?></td>
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
