<html>
	<head>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/report/tablereport_dedy.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/report/fontreport.css">
	</head>

<style type="text/css">
.style22 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	/* font-weight: bold; */
	/* font-style: italic; */
	font-size: 14px;
}
.style23 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	/* font-weight: bold; */
	font-size: 14px;
}
.style19 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; }
.style5 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; }
.style51 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; }
.style24 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
</style>

<body>
	<?php
		$idnya=$id; 
		$phasil="SELECT * from  ptindakan_instalasi where id='".$idnya."' limit 1";
		$qry=$this->db->query($phasil);
		
		foreach ($qry->result_array() as $row) {
			$trxnya=$row["notransaksi_IN"];
			$kode_tindakan=$row["tindakan"];
			$hasil=$row["hasil_pemeriksaan"];
			$kesan=$row["kesan"];

		}	
			$jud="SELECT judulrad from mtindakan where kode_tindakan='$kode_tindakan' limit 1";
			$qry2=$this->db->query($jud);
			foreach ($qry2->result_array() as $rowrad) {
				$judul=$rowrad["judulrad"];
			}

			$pax="SELECT * from register_instalasi where notransaksi_IN='".$trxnya."' limit 1";
				 $qry=$this->db->query($pax);
				 foreach ($qry->result_array() as $row) {
					$tgldaftar = date('d-m-Y',strtotime($row["tanggal"]));	
					$tglselesai = date('d-m-Y',strtotime($row["tgl_selesai"]));			
					$dokterpengirim = $row["nama_dokter"];			
					$unitasal = $row["nama_unitR"];			
					$nama_pasien = $row["nama_pasien"];			
					$dokterpemeriksa = $row["nama_dokter_periksa"];	
					$no_rm = $row["no_rm"];	
					$radiografer = $row["nama_radiografer"];	
				 }
		?>

		<table width="100%"  border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td><div align="left"><span class="style5"><?php echo ' '.getenv('V_NAMARS'); ?></span></div></td>
			</tr>
			<tr>
				<td><div align="left"><span class="style5">INSTALASI RADIOLOGI</span></div></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><div align="center"><span class="style51">HASIL PEMERIKSAAN</span></div></td>
			</tr>  
			<br><br>
		</table>
		
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="13%"><span class="style19">No. Order </span></td>
			<td width="1%"><span class="style19">:</span></td>
			<td width="40%"><span class="style19"><?php echo $trxnya;?></span></td>
			<td><span class="style19">No. RM </span></td>
			<td><span class="style19">:</span></td>
			<td><span class="style19"><?php echo $no_rm;?></span></td>
			
		</tr><br>
		<tr>
			<td><span class="style19">Tanggal  </span></td>
			<td><span class="style19">:</span></td>
			<td><span class="style19"><?php echo $tgldaftar;?></span></td>
			<td><span class="style19">Nama Pasien </span></td>
			<td><span class="style19">:</span></td>
			<td><span class="style19"><?php echo $nama_pasien;?></span></td>
		</tr>
		<tr>
			<td><span class="style19">Dokter Pengirim </span></td>
			<td><span class="style19">:</span></td>
			<td><span class="style19"><?php echo $dokterpengirim ;?></span></td>
			<td width="12%"><span class="style19">Ruang Pengirim </span></td>
			<td width="1%"><span class="style19">:</span></td>
			<td width="34%"><span class="style19"><?php echo $unitasal;?></span></td>

		</tr>
		<tr>
			<td><span class="style19">Dokter Pemeriksa </span></td>
			<td><span class="style19">:</span></td>
			<td><span class="style19"><?php echo $dokterpemeriksa;?></span></td>
			<td><span class="style19">Radiografer </span></td>
			<td><span class="style19">:</span></td>
			<td><span class="style19"><?php echo $radiografer ;?></span></td>
		</tr>

		</table>
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td>&nbsp;</td>
			</tr>
			
			<tr>
				<?php if (trim($judul) !='') {?>
					<td><span class="style22"><?php echo $judul.' :';?></span></td>
				<?php } else {?>
					<td><span class="style22">&nbsp;</span></td>
				<?php }?>	
			</tr>
			<tr>
				<?php if (trim($hasil) != '') { ?>
					<td><pre><span class="style22"><?php echo $hasil.' :';?></span></pre></td>
				<?php } else { ?>
					<td><span class="style22">&nbsp;</span></td>
				<?php } ?>   
			</tr>
			
			<tr>
				<?php if (trim($kesan) !='') {?>
					<td><span class="style22">Kesan : </span></td>
				<?php } else {?>
					<td><span class="style22">&nbsp;</span></td>
				<?php }?>	
			</tr>
			<tr>
				<?php if (trim($kesan) !='') {?>
					<td><pre><span class="style22"><?php echo $kesan;?><pre></span></td>
				<?php } else {?>
					<td><span class="style22">&nbsp;</span></td>
				<?php }?>	
			</tr>

			<tr>
			  <td>&nbsp;</td>
		  </tr>
		</table>

	    <!-- <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="57%">&nbsp;</td>
            <td width="43%"><span class="style24">Dokter Pemeriksa,</span></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span class="style24"><?php echo $dokterpemeriksa;?></span></td>
          </tr>
        </table> -->
		<table>
			<tr>
			<td style="font-family: Arial, sans-serif; font-size: 9px; font-style: italic; vertical-align: top;">* Hasil diatas sudah sesuai dengan yang di tulis oleh dokter pemeriksa.</td>
		</tr>
		<tr>
			<td style="font-family: Arial, sans-serif; font-size: 9px; font-style: italic; vertical-align: top;">* Lembar ini hanya untuk kebutuhan melihat hasil, bukan untuk cetakan hasil resmi radiologi.</td>
		</tr>
		</table>
    <p>&nbsp;</p>
	    <p>&nbsp;</p>
</body>
</html>
