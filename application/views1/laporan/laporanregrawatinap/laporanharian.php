<html>
	<head>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/report/tablereport_dedy.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/report/fontreport_dedy.css">
		<!-- <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet"> -->
		<!-- <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel="stylesheet"> -->

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
		
		<div class="namars"><?php echo ' '.getenv('V_NAMARS'); ?> </div>
		<div class="judul">LAPORAN HARIAN PASIEN RAWAT INAP</div>

		<table class="minimalistBlack">
			<thead>
				<tr>
					<th width="7%"><div align="center">Tanggal</div></th>
					<th width="4%"><div align="center">No.</div></th>
					<th width="7%"><div align="center">NO RM</div></th>
					<th width="15%">NAMA PASIEN</th>
					<th width="4%"><div align="center">UMUR</div></th>
					<th width="3%"><div align="center">JK</div></th>
					<th>ALAMAT</th>
					<th width="8%"><div align="center">GOLONGAN</div></th>
					<th width="8%"><div align="center">KUNJUNGAN</div></th>
					<th width="13%">UNIT MASUK</th>
					<th width="17%">UNIT KELUAR</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($l == null) {?>
				<tr>
					<td colspan="10">Data Kosong</td>
				</tr>
				<?php } else {
					$i = 1;
					$jumlaki=0;
					$jumpasien=0;
					$jumbaru=0;
					$umum=0;
					$jamkesda=0;
					$inhealt=0;
					$bpjs=0;
					$jasaraharja=0;
					$lainlain=0;
					foreach($l as $row) {
						if ($row->tgl == $row->tgl_daftar) {
							$barulama='Baru';	
						} else {
							$barulama='Lama';	
						}
				?>
				<tr>
					<td align= "center"><?php echo $row->tgl;?></td>
					<td align= "center"><?php echo $i;?></td>
					<td align= "center"><?php echo $row->norm;?></td>
					<td><?php echo $row->nama;?></td>
					<td align= "center"><?php echo hitungumur($row->tgl_lahir);?></td>
					<td align= "center"><?php echo  substr($row->sex,0,1);?></td>
					<td><?php echo $row->alamat;?></td>
					<td align= "center"><?php echo $row->golongan;?></td>
					<td align= "center"><?php echo $barulama;?></td>
					<td><?php echo $row->unit;?></td>
					<td><?php echo $row->unitkeluar;?></td>
				</tr>
				
				<?php
				 	if (substr($row->sex,0,1) == 'L') {
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
					$jumperempuan= $jumpasien-$jumlaki;
					$jumlama=$jumpasien-$jumbaru;
					?>

			</tbody>
		</table>
		<br>
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
