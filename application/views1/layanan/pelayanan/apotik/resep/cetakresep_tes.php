<html>
<head>
<title>Cetak Resep</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
.style5 {font-size: 9px}
.style9 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; }
.style10 {font-size: 10px; font-weight: bold; }
.style15 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9px; }
.style16 {font-size: 9px}
</style>
</head>



<body>
<?php 
//  foreach($resepheader as $row) {
  // echo "no ;".$id;
//  } 
?>
<table width="50%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td class="style10">INSTALASI FARMASI <?php echo ' '.getenv('V_NAMARS'); ?> </td>
  </tr>
  <tr>
    <td class="style5">BUKTI TRANSAKSI APOTIK</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="17%" class="style15"><span class="style15">No.Registrasi</span></td>
        <td width="48%" class="style15"><span class="style16"></span>: </td>
        <td width="15%" class="style15">No.Resep</td>
        <td width="20%" class="style15"><span class="style16"></span></td>
      </tr>
      <tr>
        <td class="style15"><span class="style15">No.RM</span></td>
        <td class="style15"><span class="style16"></span></td>
        <td class="style15">&nbsp;</td>
        <td class="style15"><span class="style16"></span></td>
      </tr>
      <tr>
        <td class="style15"><span class="style15">Pasien</span></td>
        <td class="style15"><span class="style16"></span></td>
        <td class="style15">Perawatan</td>
        <td class="style15"><span class="style16"></span></td>
      </tr>
      <tr>
        <td><span class="style15"> Dokter </span></td>
        <td><span class="style16"></span></td>
        <td class="style15">Tanggal</td>
        <td><span class="style16"></span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      
      <tr class="style9">
        <td colspan="6"><table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr class="style9">
            <td width="5%" height="17" valign="middle"><div align="center" class="style15">No</div></td>
            <td width="52%" height="17" valign="middle"><div align="center" class="style15">Nama Obat </div></td>
            <td width="8%" height="17" valign="middle"><span class="style15">Satuan</span></td>
            <td width="7%" height="17" valign="middle"><div align="right" class="style15">Qty</div></td>
            <td width="13%" height="17" valign="middle"><div align="right" class="style15">Harga</div></td>
            <td width="14%" height="17" valign="middle"><div align="right" class="style15">Jumlah</div></td>
          </tr>
          
        </table></td>
        </tr>
      <tr class="style9">
        <td width="5%">&nbsp;</td>
        <td width="52%">&nbsp;</td>
        <td width="8%">&nbsp;</td>
        <td width="7%">&nbsp;</td>
        <td width="13%">&nbsp;</td>
        <td width="14%">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
