<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=".$nmfile."".namafiletgl().".xls");
?>
<html>
<head>
<title>RL. 4A</title>
<style type="text/css">

.style3 {font-family: Arial, Helvetica, sans-serif; font-size: 9px; }

.style28 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; }
.style33 {font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 16px;
}

</style>
</head>

<body>
<!-- <table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="35" rowspan="2"><img src=".../rsudpemprov/assets/img/logorl.png" width="35" height="46"></td>
    <td width="500" valign="bottom"><span class="style33">Formulir RL. 5.4 </span></td>
  </tr>
  <tr>
    <td><span class="style33" valign="top">DAFTAR 10 BESAR PENYAKIT RAWAT JALAN</span></td>
  </tr>
</table>
<br>   -->
<table width="700" cellpadding="0" cellspacing="0" border="0">
  
  <tr>
    <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      
      
      <tr>
        <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="5%" rowspan="3"><img src="../rsudpemprov/assets/img/logokes.jpg" width="35" height="46"></td>
            <td width="95%" valign="bottom"><span class="style33">Formulir RL. 4.A </span></td>
          </tr>
          <tr>
            <td valign="top"><span class="style33">DATA KEADAAN MORBIDITAS  PASIEN RAWAT INAP RUMAH SAKIT</span></td>
          </tr>
          <tr>
            <td valign="top"><span class="style33">PENYEBAB KECELAKAAN</span></td>
          </tr>
          <!-- <tr>
            <td colspan="2"><hr /></td>
          </tr> -->
        </table></td>
      </tr> 
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
        <td><span class="style28">Tahun</span></td>
        <td><span class="style28">: <?php echo $tahun; ?></span></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="700" cellpadding="0" cellspacing="0" border="1">
  <tr>
    <td rowspan="3" width="19"><div align="center"><span class="style3">No. Urut</span></div></td>
    <td rowspan="3" width="28"><div align="center"><span class="style3">No. DTD</span></div></td>
    <td rowspan="3" width="50"><div align="center"><span class="style3">No.Daftar terperinci</span></div></td>
    <td rowspan="3" width="130"><div align="center"><span class="style3">Golongan sebab penyakit</span></div></td>
    <td colspan="18"><div align="center"><span class="style3">Jumlah Pasien Hidup dan    Mati menurut Golongan Umur &amp; Jenis Kelamin</span></div></td>
    <td colspan="2"><div align="center"><span class="style3">Pasien Keluar (Hidup &amp;    Mati) Menurut Jenis Kelamin</span></div></td>
    <td rowspan="3" ><div align="center"><span class="style3">Jumlah Pasien Keluar Hidup (23+24)</span></div></td>
    <td rowspan="3" width="30"><div align="center"><span class="style3">Jumlah Pasien Keluar Mati</span></div></td>
  </tr>
  <tr height="25">
    <td colspan="2" ><div align="center"><span class="style3">0-6 hr</span></div></td>
    <td colspan="2"><div align="center"><span class="style3">7-28hr</span></div></td>
    <td colspan="2"><div align="center"><span class="style3">28hr-&lt;1th</span></div></td>
    <td colspan="2"><div align="center"><span class="style3">1-4th</span></div></td>
    <td colspan="2"><div align="center"><span class="style3">5-14th</span></div></td>
    <td colspan="2"><div align="center"><span class="style3">15-24th</span></div></td>
    <td colspan="2"><div align="center"><span class="style3">25-44th</span></div></td>
    <td colspan="2"><div align="center"><span class="style3">45-64th</span></div></td>
    <td colspan="2"><div align="center"><span class="style3">&gt; 65</span></div></td>
    <td rowspan="2" width="30"><div align="center"><span class="style3">LK</span></div></td>
    <td rowspan="2" width="30"><div align="center"><span class="style3">PR</span></div></td>
  </tr>
  <tr height="25">
    <td width="20"><div align="center"><span class="style3">L</span></div></td>
    <td width="20"><div align="center"><span class="style3">P</span></div></td>
    <td width="20"><div align="center"><span class="style3">L</span></div></td>
    <td width="20"><div align="center"><span class="style3">P</span></div></td>
    <td width="20"><div align="center"><span class="style3">L</span></div></td>
    <td width="20"><div align="center"><span class="style3">P</span></div></td>
    <td width="20"><div align="center"><span class="style3">L</span></div></td>
    <td width="20"><div align="center"><span class="style3">P</span></div></td>
    <td width="20"><div align="center"><span class="style3">L</span></div></td>
    <td width="20"><div align="center"><span class="style3">P</span></div></td>
    <td width="20"><div align="center"><span class="style3">L</span></div></td>
    <td width="20"><div align="center"><span class="style3">P</span></div></td>
    <td width="20"><div align="center"><span class="style3">L</span></div></td>
    <td width="20"><div align="center"><span class="style3">P</span></div></td>
    <td width="20"><div align="center"><span class="style3">L</span></div></td>
    <td width="20"><div align="center"><span class="style3">P</span></div></td>
    <td width="20"><div align="center"><span class="style3">L</span></div></td>
    <td width="20"><div align="center"><span class="style3">P</span></div></td>
  </tr>
  <tr height="21" bgcolor="#CCCCCC">
    <td><div align="center"><span class="style3">1</span></div></td>
    <td><div align="center"><span class="style3">2</span></div></td>
    <td><div align="center"><span class="style3">3</span></div></td>
    <td><div align="center"><span class="style3">4</span></div></td>
    <td><div align="center"><span class="style3">5</span></div></td>
    <td><div align="center"><span class="style3">6</span></div></td>
    <td><div align="center"><span class="style3">7</span></div></td>
    <td><div align="center"><span class="style3">8</span></div></td>
    <td><div align="center"><span class="style3">9</span></div></td>
    <td><div align="center"><span class="style3">10</span></div></td>
    <td><div align="center"><span class="style3">11</span></div></td>
    <td><div align="center"><span class="style3">12</span></div></td>
    <td><div align="center"><span class="style3">13</span></div></td>
    <td><div align="center"><span class="style3">14</span></div></td>
    <td><div align="center"><span class="style3">15</span></div></td>
    <td><div align="center"><span class="style3">16</span></div></td>
    <td><div align="center"><span class="style3">17</span></div></td>
    <td><div align="center"><span class="style3">18</span></div></td>
    <td><div align="center"><span class="style3">19</span></div></td>
    <td><div align="center"><span class="style3">20</span></div></td>
    <td><div align="center"><span class="style3">21</span></div></td>
    <td><div align="center"><span class="style3">22</span></div></td>
    <td><div align="center"><span class="style3">23</span></div></td>
    <td><div align="center"><span class="style3">24</span></div></td>
    <td><div align="center"><span class="style3">25</span></div></td>
    <td><div align="center"><span class="style3">26</span></div></td>
  </tr>
  <?php
  $user=$this->session->userdata("nmuser");
      // $this->db->query("DELETE from z10penyakitjalan where user='$user'");
      $q2="select * from prl4 where kecelakaan=1 order by nourut ";
      $qry2=$this->db->query($q2);
      $data=$qry2->result_array();
      foreach ($data as $d) {
        $hidup=$d['hiduplk']+$d['hiduppr'];
        $mati=$d['matilk']+$d['matipr'];
  ?>
      <tr height="21">
        <td><div align="center"><span class="style3"><?php echo $d['nourut']; ?></span></div></td>
        <td><div align="left"><span class="style3"><?php echo $d['nodtd']; ?></span></div></td>
        <td><div align="left"><span class="style3"><?php echo $d['nodaftarterperinci']; ?></span></div></td>
        <td><div align="left"><span class="style3"><?php echo $d['golongan']; ?></span></div></td>

        <td><div align="center"><span class="style3"><?php echo $d['6lk']; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $d['6pr']; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $d['28lk']; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $d['28pr']; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $d['1lk']; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $d['1pr']; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $d['4lk']; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $d['4pr']; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $d['14lk']; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $d['14pr']; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $d['24lk']; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $d['24pr']; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $d['44lk']; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $d['44pr']; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $d['64lk']; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $d['64pr']; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $d['65lk']; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $d['65pr']; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $d['hiduplk']; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $d['hiduppr']; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $hidup; ?></span></div></td>
        <td><div align="center"><span class="style3"><?php echo $mati; ?></span></div></td>

      </tr>
  <?php
      }
    ?>

</table>
</body>
</html>
