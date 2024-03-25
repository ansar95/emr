<?php
// header("Content-type: application/vnd-ms-excel");
// header("Content-Disposition: attachment; filename=".$nmfile."".namafiletgl().".xls");
?>

<html>
<head>
<title>RL.53</title>
<style type="text/css">

.style3 {font-family: Arial, Helvetica, sans-serif; font-size: 11px; }
.style28 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; }
.style33 {font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 16px;
}

</style>
</head>

<body>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <!-- <td width="35" rowspan="2"><img src="../rsudpemprov/assets/img/logokes.jpg" width="46" height="61"></td> -->
    <td width="500" valign="bottom"><span class="style33">Formulir RL. 5.3 </span></td>
  </tr>
  <tr>
    <td><span class="style33" valign="top">DAFTAR 10 BESAR PENYAKIT RAWAT INAP</span></td>
  </tr>
</table>
<br>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="12%"><span class="style28">Kode RS </span></td>
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
    <td colspan="3"><table width="100%" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <td width="6%" rowspan="2" valign="middle"><div align="center" class="style3">No. Urut </div></td>
        <td width="8%" rowspan="2"><div align="center" class="style3">KODE ICD 10 </div></td>
        <td width="41%" rowspan="2" valign="middle"><div align="center"><span class="style3">DESKRIPSI</span></div></td>
        <td height="25" colspan="2"><div align="center" class="style3">Pasien Keluar Hidup Menurut Jenis Kelamin </div></td>
        <td colspan="2"><div align="center" class="style3">Pasien Keluar Mati Menurut Jenis Kelamin </div></td>
        <td width="10%" rowspan="2"><div align="center" class="style3">Total (Hidup &amp; Mati) </div></td>
      </tr>
      <tr>
        <td width="8%" height="16"><div align="center" class="style3">LK</div></td>
        <td width="10%"><div align="center" class="style3">PR</div></td>
        <td width="9%"><div align="center" class="style3">LK</div></td>
        <td width="8%"><div align="center" class="style3">PR</div></td>
      </tr>

      <?php
      $hidupLK=0;
      $hidupPR=0;
      $matiLK=0;
      $matiPR=0;
      $jumlah=0;
      $user=$this->session->userdata("nmuser");
      $this->db->query("DELETE from z10penyakit where user='$user'");
      $q2="select pdiagnosa.nodaftar, pdiagnosa.diagnosa, pdiagnosa.icdlatin, pasien.sex as sex, register.cara_keluar as cara_keluar from pdiagnosa,register,pasien where pdiagnosa.notransaksi=register.notransaksi and pdiagnosa.no_rm=pasien.no_rm and pdiagnosa.type=1 and register.pulang=1 and (bagian='INAP' or (bagian='IGD' and kode_keluarpada<>'IGDD')) and  MONTH(register.tgl_keluar)='$bulan' and YEAR(register.tgl_keluar)='$tahun' and register.cara_keluar<>'Batal Pelayanan'";
      $qry2=$this->db->query($q2);
      $data=$qry2->result_array();
      foreach ($data as $d) {
          $nodaftar=trim($d['nodaftar']);
          $diagnosa1=trim($d['diagnosa']);
          $x="'";
          $y=" ";
          $diagnosa=str_replace($x,$y,$diagnosa1);
          // $diagnosa=preg_replace("#[^A-Za-z0-9\ ]+#'", '.', $diagnosa1);
          

          $latin1=trim($d['icdlatin']);
          $latin=str_replace($x,$y,$latin1);
          $hidupLK=0; $hidupPR=0; $matiLK=0; $matiPR=0;
          if ($d['cara_keluar'] != 'Meninggal Dunia'){
            if ($d['sex'] == 'L') { $hidupLK=1; $hidupPR=0; } else {$hidupPR=1; $hidupLK=0;}
          } else {
            if ($d['sex'] == 'L') { $matiLK=1; $matiPR=0; } else {$matiPR=1; $matiLK=0;}
          }
          // $jumlah=$jumlah+$hidupLK+$hidupPR+$matiLK+$matiPR;
          $q3="INSERT INTO z10penyakit(diagnosa,latin,nodaftar,hiduplk,hiduppr,matilk,matipr,jumlah,user) VALUES ('$diagnosa','$latin','$nodaftar',$hidupLK,$hidupPR,$matiLK,$matiPR,$jumlah,'$user')";
          $this->db->query($q3);
      }

      $q2="select diagnosa, latin, nodaftar, sum(hiduplk) as hiduplk, sum(hiduppr) as hiduppr, sum(matilk) as matilk, sum(matipr) as matipr, sum(hiduplk+hiduppr+matilk+matipr) as jumlahnya from z10penyakit where user='$user' group by nodaftar order by jumlahnya desc limit 10";
      $qry2=$this->db->query($q2);
      $data=$qry2->result_array();
      $i=1;
      foreach ($data as $d) {
        $nodaftar=trim($d['nodaftar']);
        $diagnosa=trim($d['diagnosa']);
        $latin=trim($d['latin']);
        $hiduplk=$d['hiduplk'];
        $hiduppr=$d['hiduppr'];
        $matilk=$d['matilk'];
        $matipr=$d['matipr'];
        $jumlah=$d['jumlahnya'];
      ?>
      <tr>
        <td height="16"><div align="center" class="style3"><?php echo $i++; ?></div></td>
        <td><div align="center" class="style3"><?php echo $nodaftar; ?></div></td>
        <td><span class="style3"><?php echo $diagnosa; ?></span></td>
        <td><div align="center" class="style3"><?php echo $hiduplk; ?></div></td>
        <td><div align="center" class="style3"><?php echo $hiduppr; ?></div></td>
        <td><div align="center" class="style3"><?php echo $matilk; ?></div></td>
        <td><div align="center" class="style3"><?php echo $matipr; ?></div></td>
        <td><div align="center" class="style3"><?php echo $jumlah; ?></div></td>
      </tr>
      <?php
      }
      ?>
    </table></td>
  </tr>
</table>
</body>
</html>
