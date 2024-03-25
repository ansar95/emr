<html>
<head>
<title>Cetak Resep</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
.style5 {font-size: 12px}
.style9 {font-family: Arial, Helvetica, sans-serif; font-size: 9px; }
.style10 {font-size: 10px; font-weight: bold; }
.style15 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9px; }
.style16 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9px; }
</style>
</head>



<body>
<?php 
  $noserep=$noresep;
  $qry2=$this->db->query("SELECT * FROM resep_header where noresep = '".$noserep."' LIMIT 1");
  foreach ($qry2->result_array() as $brs2) {
              $register=$brs2['notraksaksi'];
              $no_rm=$brs2['no_rm'];
              $pasien=$brs2['nama_umum'];
              $dokter=$brs2['nama_dokter'];
              $perawatan=$brs2['nama_unit'];
              $tanggal=$brs2['tglresep'];
  }            
?>
<table width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="style5">LIST RESEP PASIEN</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="15%" class="style15"><span class="style15">No.Registrasi</span></td>
        <td width="43%" class="style15">: <?php echo $register;?></td>
        <td width="12%" class="style15">No.Resep</td>
        <td width="20%" class="style15">: <?php echo $noserep;?></td>
      </tr>
      <tr>
        <td class="style15">Pasien</td>
        <td class="style15">: <?php echo $pasien;?></td>
        <td class="style15">No.RM</td>
        <td class="style15">: <?php echo $no_rm;?></td>
      </tr>
      <tr>
        <td class="style15">Perawatan</td>
        <td class="style15">: <?php echo $perawatan;?></td>
        <td class="style15">Tanggal</td>
        <td class="style15">: <?php echo tanggaldua($tanggal);?></td>
      </tr>
      <tr>
        <td class="style15">Dokter</td>
        <td class="style15">: <?php echo $dokter;?></td>
        <td class="style15">Petugas</td>
        <td class="style15">: <?php echo $this->session->userdata("nmuser");?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>.</td>

  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
          <!-- <tr class="style15">
            <td style='text-align:center'><span class="style16">No</span></td>
            <td height="11"><span class="style16">Nama Obat </span></td>
            <td style='text-align:center'><span class="style16">Qty</span></td>
          </tr> -->
        <?php
          $i=1;
          $total=0;
          $qry2=$this->db->query("SELECT * FROM resep_detail where noresep = '$noserep' ");
          foreach ($qry2->result_array() as $brs2) {
        ?>
          <tr class="style15">
            <td width="6%" style='text-align:center'><?php echo $i++;?></td>
            <td width="50%"><?php echo $brs2['namaobat'];?></td>
            <!-- <td width="8%" style='text-align:center'><?php echo $brs2['qty'];?></td> -->
            <td width="30%" style='text-align:center'><?php echo $brs2['dosis'];?></td>
          </tr>
         
        <?php } ?>

    </table></td>
  </tr>
</table>
</body>
</html>
