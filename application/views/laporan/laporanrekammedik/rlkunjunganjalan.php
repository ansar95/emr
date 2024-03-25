<?php
// header("Content-type: application/vnd-ms-excel");
// header("Content-Disposition: attachment; filename=".$nmfile."".namafiletgl().".xls");
?>

<html>
<head>
<title>RL.52</title>
<style type="text/css">
.style2 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 16px;
}
.style28 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; }
.style31 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }
.style33 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
}
</style>
</head>

<body>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="35" rowspan="2"><img src="../rsudpemprov/assets/img/logokes.jpg" width="46" height="61"></td>
    <td width="500" valign="bottom"><span class="style33">Formulir RL. 5.2 </span></td>
  </tr>
  <tr>
    <td><span class="style33" valign="top">KUNJUNGAN RAWAT JALAN </span></td>
  </tr>
</table>
<br>
<table width="550" border="0" cellspacing="0" cellpadding="0">
 
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="17%"><span class="style28">Kode RS </span></td>
        <td width="81%"><div class="style28">
          <div>: 7202015</div>
        </div></td>
      </tr>
      <tr>
        <td><span class="style28">Nama RS </span></td>
        <td><span class="style28">: <?php echo ' '.getenv('V_NAMARS'); ?> </span></td>
      </tr>
      <tr>
        <td><span class="style28">Bulan</span></td>
        <td><span class="style28">: <?php echo nama_bulan_indonesia($bulan); ?></span></td>
      </tr>
      <tr>
        <td><span class="style28">Tahun</span></td>
        <td><span class="style28">: <?php echo $tahun; ?></span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="71%"><table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td width="12%"><div align="center" class="style31">NO</div></td>
            <td width="65%"><div align="center" class="style31">JENIS KEGIATAN </div></td>
            <td width="23%"><div align="center" class="style31">JUMLAH</div></td>
          </tr>

          <?php
            $totaljumlahpasien=0;
            $q2="select jenislayanan,rl52 from mjenislayanan where 1  group by rl52";
            $qry2=$this->db->query($q2);;
            foreach ($qry2->result_array() as $d) {
                $jenislayanan=trim($d['jenislayanan']);
                $rl52=trim($d['rl52']);
                if ( $rl52 ==29) {
                    $jenislayanan="LAIN LAIN";
                }
                
                // hitung jumlahnya masing2 pelayanan 
                $q2="select no_rm from register where jenislayanan='$jenislayanan' and (bagian='JALAN' or (bagian='IGD' and kode_keluarpada='IGDD')) and MONTH(register.tgl_masuk)='$bulan'  and YEAR(register.tgl_masuk)='$tahun'";
                $qry2=$this->db->query($q2);
                $jumlahpasien = $qry2->num_rows();
                $totaljumlahpasien= $totaljumlahpasien + $jumlahpasien;

            ?>



                <tr>
                    <td><div align="center" class="style31"><?php echo $rl52; ?></div></td>
                    <td><span class="style31"><?php echo $jenislayanan; ?></span></td>
                    <td><div align="center" class="style31"><?php echo $jumlahpasien; ?></div></td>
                </tr>
          

            <?php  
                }
            ?>

        </table></td>
        <td width="29%">&nbsp;</td>
      </tr>
      <tr>
        <td><table width="100%" border="1" cellspacing="0" cellpadding="0">
          
          <tr>
            <td width="12%"><div align="center" class="style31"></div></td>
            <td width="65%"><span class="style31">TOTAL</span></td>
            <td width="23%"><div align="center" class="style31"><?php echo $totaljumlahpasien; ?></div></td>
          </tr>


        </table></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
