
<?php 
// echo $notransaksi_IN;

$qry2=$this->db->query("SELECT register_instalasi.tanggal, register_instalasi.no_rm,register_instalasi.nama_pasien, pasien.alamat, pasien.provinsi, pasien.kota, pasien.kecamatan, pasien.desa, register_instalasi.nama_dokter, register_instalasi.nama_unitR, register_instalasi.diagnosa, register_instalasi.no_lab, pasien.tgl_lahir, register_instalasi.jamkirim, register.golongan, pasien.sex FROM register_instalasi INNER JOIN pasien ON register_instalasi.no_rm = pasien.no_rm INNER JOIN register ON register_instalasi.notransaksi =register.notransaksi and register_instalasi.notransaksi_IN = '".$notransaksi_IN."' LIMIT 1");;

foreach ($qry2->result_array() as $brs2) {
    $no_rm=$brs2['no_rm'];
    $nama_pasien=$brs2['nama_pasien'];
    $alamat=$brs2['alamat'];
    $provinsi=$brs2['provinsi'];
    $kota=$brs2['kota'];
    $kecamatan=$brs2['kecamatan'];
    $desa=$brs2['desa'];
    $nama_dokter=$brs2['nama_dokter'];
    $nama_unitR=$brs2['nama_unitR'];
    $diagnosa=$brs2['diagnosa'];
    $no_lab=$brs2['no_lab'];
    $tgl_lahir=$brs2['tgl_lahir'];
    $tanggal=$brs2['tanggal'];
    $sex1=$brs2['sex'];
    if ($sex1 == 'L') {
        $sex='Laki - Laki';
    } else if ($sex1 == 'P') {
        $sex='Perempuan';
    } else {
        $sex='';
    }
    $jamkirim=$brs2['jamkirim'];
    $golongan=$brs2['golongan'];
    //hitung umur
    $tgl_lahir_obj = new DateTime($tgl_lahir);
    $tanggal_obj = new DateTime($tanggal);
    $umur = $tanggal_obj->diff($tgl_lahir_obj)->y;
}  
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4" style="font-family: Arial, sans-serif; font-size: 14px;">RSUD KOTA MAKASSAR</td>
  </tr>
  <tr>
    <td colspan="4" style="font-family: Arial, sans-serif; font-size: 16px;">HASIL PEMERIKSAAN LABORATORIUM PATOLOGI ANATOMI</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td width="15%" style="font-family: Arial, sans-serif; font-size: 11px;">Nama Pasien</td>
    <td width="45%" style="font-family: Arial, sans-serif; font-size: 11px;">: <?php echo $nama_pasien?></td>
    <td width="15%" style="font-family: Arial, sans-serif; font-size: 11px;"></td>
    <td width="25%"  style="font-family: Arial, sans-serif; font-size: 11px;"></td>
  </tr>

  <tr>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">No. RM</td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">: <?php echo $no_rm?></td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">Status Pasien</td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">: <?php echo $golongan?></td>
  </tr>
  <tr>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">Tgl. Lahir</td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">: <?php echo $tgl_lahir?></td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">Umur / J.Kelamin</td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">: <?php echo $umur.'T / '.$sex?></td>
  </tr>

  <tr>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">Alamat</td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">: <?php echo trim($alamat).' '.trim($desa)?></td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">Tgl.Terima</td>
    <td style="font-family: Arial, sans-serif; font-size: 11px;">: <?php echo trim($jamkirim)?>;</td>
  </tr>
  <tr>
      <td>&nbsp;</td>
      <td style="font-family: Arial, sans-serif; font-size: 11px;" >: <?php echo trim($kecamatan).' '.trim($kota).' '.trim($provinsi)?></td>
      <td style="font-family: Arial, sans-serif; font-size: 11px;">Tgl.Jawab</td>
      <td style="font-family: Arial, sans-serif; font-size: 11px;">: <?php echo trim($jamkirim)?></td>
  </tr>
  <tr>
      <td style="font-family: Arial, sans-serif; font-size: 11px;">Dokter</td>
      <td style="font-family: Arial, sans-serif; font-size: 11px;">: <?php echo trim($nama_dokter)?></td>
      <td style="font-family: Arial, sans-serif; font-size: 11px;">Jenis Pemeriksaan</td>
      <td style="font-family: Arial, sans-serif; font-size: 11px;">: <?php echo date('Y-m-d')?></td>
  </tr>
  <tr>
      <td style="font-family: Arial, sans-serif; font-size: 11px;">Unit</td>
      <td style="font-family: Arial, sans-serif; font-size: 11px;">: <?php echo trim($nama_unitR)?></td>
      <td>&nbsp;</td>
      <td style="font-family: Arial, sans-serif; font-size: 11px;">&nbsp;</td>
  </tr>
</tabel>
<br>
<?php 
    $qry222=$this->db->query("SELECT * from resdt_text where notransaksi_IN='$notransaksi_IN'");
    $jumlah_baris = $qry222->num_rows();
    if ( $jumlah_baris <= 0) {
        $nosediaan='';
        $tglsample='';
        $pemeriksaan='';
        $cairan='';
        $diagnosaklinik='';
        $keterangan='';

        $makroskopik='';
        $mikroskopik='';
        $kesimpulan='';
        $icd10='';
        $catatan='';
    } 
    foreach ($qry222->result_array() as $brs222) {
        $nosediaan=$brs222['nosediaan'];
        $tglsample=$brs222['tglsample'];
        $pemeriksaan=$brs222['pemeriksaan'];
        $cairan=$brs222['cairan'];
        $diagnosaklinik=$brs222['diagnosaklinik'];
        $keterangan=$brs222['keterangan'];

        $makroskopik=$brs222['makroskopik'];
        $mikroskopik=$brs222['mikroskopik'];
        $kesimpulan=$brs222['kesimpulan'];
        $icd10=$brs222['icd10'];
        $catatan=$brs222['catatan'];
    }
?>


  
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40%" style="height: 20px;"><span style="font-family: Arial, sans-serif; font-size: 11px;">Tanggal Pengambilan Sampel</span></td>

    <td width="1%" ><span style="font-family: Arial, sans-serif; font-size: 11px">:</span></td>
    <td width="59%"><span style="font-family: Arial, sans-serif; font-size: 11px;"><?php echo $tglsample ?></span></td>
  </tr>
  <tr>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px;">Pemeriksaan/Asal Sediaan</span></td>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px">:</span></td>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px;"><?php echo $pemeriksaan ?></span></td>
  </tr>
  <tr>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px;">Cairan Fiksasi</span></td>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px">:</span></td>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px;"><?php echo $cairan ?></span></td>
  </tr>
</table>
<br>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="30%"><span style="font-family: Arial, sans-serif; font-size: 11px">Diagnosa Klinik</span></td>
    <td width="1%"><span style="font-family: Arial, sans-serif; font-size: 11px">:</span></td>
    <td width="69%"><span style="font-family: Arial, sans-serif; font-size: 11px;"><?php echo nl2br($diagnosaklinik) ?></span></td>
  </tr>
  <tr>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px;">Keterangan Klinik</span></td>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px">:</span></td>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px;"><?php echo nl2br($keterangan) ?></span></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="30%"><span style="font-family: Arial, sans-serif; font-size: 11px;">Makroskopik</span></td>
    <td width="1%"><span style="font-family: Arial, sans-serif; font-size: 11px">:</span></td>
    <td width="69%"><span style="font-family: Arial, sans-serif; font-size: 11px;"><?php echo nl2br($makroskopik) ?></span></td>
  </tr>
  <tr>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px;">Mikroskopik</span></td>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px">:</span></td>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px;"><?php echo nl2br($mikroskopik) ?></span></td>
  </tr>
  <tr>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px">Kesimpulan</span></td>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px">:</span></td>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px;"><?php echo nl2br($kesimpulan) ?></span></td>
  </tr>
  <tr>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px;">ICD-10</span></td>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px">:</span></td>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px;"><?php echo nl2br($icd10) ?></span></td>
  </tr>
  <tr>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px">Catatan</span></td>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px">:</span></td>
    <td><span style="font-family: Arial, sans-serif; font-size: 11px;"><?php echo nl2br($catatan) ?></span></td>
  </tr>
</table>

