<?php
// header("Content-type: application/vnd-ms-excel");
// header("Content-Disposition: attachment; filename=".$nmfile."".namafiletgl().".xls");
?>

<html>
<head>
<title>RL.54</title>
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
    <td width="500" valign="bottom"><span class="style33">Formulir RL. 5.4 </span></td>
  </tr>
  <tr>
    <td><span class="style33" valign="top">DAFTAR 10 BESAR PENYAKIT RAWAT JALAN</span></td>
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
            <td height="25" colspan="2"><div align="center" class="style3">KASUS BARU MENURUT JENIS KELAMIN </div></td>
            <td width="10%" rowspan="2"><div align="center"><span class="style3">JUMLAH KASUS BARU (4+5) </span></div></td>
            <td width="10%" rowspan="2"><div align="center" class="style3">JUMLAH KUNJUNGAN  </div></td>
        </tr>
        <tr>
            <td width="8%" height="16"><div align="center" class="style3">LK</div></td>
            <td width="10%"><div align="center" class="style3">PR</div></td>
        </tr>
        <tr>
            <td height="16" bgcolor="#CCCCCC"><div align="center"><span class="style3">1 </span></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><span class="style3">2 </span></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><span class="style3">3 </span></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><span class="style3">4 </span></div></td>
            <td bgcolor="#CCCCCC"><div align="center"><span class="style3">5 </span></div></td>
            <td bgcolor="#CCCCCC">&nbsp;</td>
            <td bgcolor="#CCCCCC"><div align="center"><span class="style3">7 </span></div></td>
        </tr>


      <?php
      
      $baruLK=0;
      $baruPR=0;
      $kunjungan=0;
      $user=$this->session->userdata("nmuser");
      $this->db->query("DELETE from z10penyakitjalan where user='$user'");
      $q2="select pdiagnosa.nodaftar, pdiagnosa.diagnosa, pdiagnosa.icdlatin, pasien.sex as sex, register.cara_keluar as cara_keluar, register.tgl_masuk as tgl_masuk, pasien.tgl_daftar as tgl_daftar, MONTH(register.tgl_masuk) as bulanmasuk, YEAR(register.tgl_masuk) as tahunmasuk, MONTH(pasien.tgl_daftar) as bulandaftar, YEAR(pasien.tgl_daftar) as tahundaftar from pdiagnosa,register,pasien where pdiagnosa.notransaksi=register.notransaksi and pdiagnosa.no_rm=pasien.no_rm and pdiagnosa.type=1 and register.pulang=1 and (bagian='JALAN' or (bagian='IGD' and kode_keluarpada='IGDD')) and  MONTH(register.tgl_keluar)='$bulan' and YEAR(register.tgl_keluar)='$tahun' and register.cara_keluar<>'Batal Pelayanan'";
      $qry2=$this->db->query($q2);
      $data=$qry2->result_array();
      foreach ($data as $d) {
          $nodaftar=trim($d['nodaftar']);
          $diagnosa1=trim($d['diagnosa']);
          $x="'";
          $y=" ";
          $diagnosa=str_replace($x,$y,$diagnosa1);
          $latin1=trim($d['icdlatin']);
          $latin=str_replace($x,$y,$latin1);
          $tgl_reg=$d['tahunmasuk'].$d['bulanmasuk'];
          $tgl_daf=$d['tahundaftar'].$d['bulandaftar'];
            //jika kasus baru maka
            if ($tgl_reg == $tgl_daf) {
                if ($d['sex'] == 'L') { $baruLK=1; $baruPR=0; } else {$baruPR=1; $baruLK=0;}    
            }
            // $kunjungan diisingan langsung 1 krn 1 pasien dianggap 1 kunjungan, 
            // tp perlu diperhatikan karena bisa saja 1 pasien 2 poli, tetapi dianggap 2 poli berarti 2 kunjungan
          $q3="INSERT INTO z10penyakitjalan(diagnosa,latin,nodaftar,barulk,barupr,kunjungan,user) VALUES ('$diagnosa','$latin','$nodaftar',$baruLK,$baruPR,1,'$user')";
          $this->db->query($q3);
      }

      $q2="select diagnosa, latin, nodaftar, sum(barulk) as barulk, sum(barupr) as barupr, sum(kunjungan) as kunjungan from z10penyakitjalan where user='$user' group by nodaftar order by kunjungan desc limit 10";
      $qry2=$this->db->query($q2);
      $data=$qry2->result_array();
      $i=1;
      foreach ($data as $d) {
        $nodaftar=trim($d['nodaftar']);
        $diagnosa=trim($d['diagnosa']);
        $latin=trim($d['latin']);
        $barulk=$d['barulk'];
        $barupr=$d['barupr'];
        $barulkpr=$d['barulk']+$d['barupr'];
        $kunjungan=$d['kunjungan'];
      ?>

      
      <tr>
        <td height="16"><div align="center" class="style3"><?php echo $i++; ?></div></td>
        <td><div align="center" class="style3"><?php echo $nodaftar; ?></div></td>
        <td><span class="style3"><?php echo $diagnosa; ?></span></td>
        <td><div align="center" class="style3"><?php echo $barulk; ?></div></td>
        <td><div align="center" class="style3"><?php echo $barupr; ?></div></td>
        <td><div align="center"><span class="style3"><?php echo $barulkpr; ?></span></div></td>
        <td><div align="center" class="style3"><?php echo $kunjungan; ?></div></td>
      </tr>
      
      <?php
      }
      ?>
    </table></td>
  </tr>
</table>
</body>
</html>
