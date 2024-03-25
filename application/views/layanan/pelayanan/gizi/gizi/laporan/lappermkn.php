<style type="text/css">

.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}

</style>

<?php
    $tgl1=strtotime($tgl);
    $tglnya=date('Y-m-d',$tgl1);
    $kode_unit1=$kode_unit;
    $waktu1=$waktu;

    $qry2=$this->db->query("SELECT nama_unit FROM munit where kode_unit='$kode_unit' LIMIT 1");
      foreach ($qry2->result_array() as $brs2) {
        $nama_unit=$brs2['nama_unit'];
      }  
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <!-- <td><div align="center">&lt;logo&gt;</div></td> -->
    <!-- <td><img src="../rsudpemprov/assets/img/logosuratrad.jpg" alt="ss" width="700" height="105" /></td> -->
    <td><img src="../rsudpemprov/assets/img/logosurat.jpg" alt="ss" width="700" height="105" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center" class="style1">FORMULIR PERMINTAAN MAKANAN PASIEN RAWAT INAP </div></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td width="16%" class="style2"><span class="style2">UNIT PERAWATAN </span></td>
        <td width="41%" class="style2">: <?php echo $nama_unit;?></td>
        <td width="41%" div align="right" class="style2"><?php echo 'Waktu Penyajian : '.$waktu1;?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="3">
      <tr>
        <td width="5%" rowspan="2"><div align="center" class="style2">NO</div></td>
        <td width="45%" rowspan="2"><div align="center" class="style2">JENIS DIET </div></td>
        <td colspan="5"><div align="center" class="style2">KELAS PERAWATAN </div></td>
        </tr>
      <tr>
        <td width="10%"><div align="center" class="style2">VIP</div></td>
        <td width="10%"><div align="center" class="style2">KELAS I </div></td>
        <td width="10%"><div align="center" class="style2">KELAS II </div></td>
        <td width="10%"><div align="center" class="style2">KELAS III </div></td>
        <td width="10%"><div align="center" class="style2">NON KELAS </div></td>
      </tr>
      <?php
          $i=1;
          $jumvip=0;
          $jumkls1=0;
          $jumkls2=0;
          $jumkls3=0;
          $jumlain=0;
            $qry2=$this->db->query("SELECT kode_makanan,nama_makanan FROM mgizi_makanan where hapus=0 and kode_makanan<>'00' order by id");
            foreach ($qry2->result_array() as $brs2) {
              $kode_makanan=$brs2['kode_makanan'];
              $nama_makanan=$brs2['nama_makanan'];
              if ($waktu == 'PAGI') {
                $query="SELECT pgizi.no_rm as vip FROM pgizi,mkamar,mkelas where pgizi.kode_kamar=mkamar.kode_kamar and mkamar.kode_kelas=mkelas.kode_kelas and mkelas.kelastarif='V' and pgizi.kdpagi='$kode_makanan' and pgizi.tanggal='$tglnya' and pgizi.kode_unit= '$kode_unit1' ";
                $qry3=$this->db->query($query);
                if ($qry3->num_rows()>0) { $vip = $qry3->num_rows(); $jvip=$jvip+$vip;} else { $vip = 0;}

                $query="SELECT pgizi.no_rm as vip FROM pgizi,mkamar,mkelas where pgizi.kode_kamar=mkamar.kode_kamar and mkamar.kode_kelas=mkelas.kode_kelas and mkelas.kelastarif='1' and pgizi.kdpagi='$kode_makanan' and tanggal='$tglnya' and pgizi.kode_unit= '$kode_unit1'";
                $qry3=$this->db->query($query);
                if ($qry3->num_rows()>0) { $kls1 = $qry3->num_rows(); $jumkls1=$jumkls1+$kls1;} else { $kls1 = 0;}

                $query="SELECT pgizi.no_rm as vip FROM pgizi,mkamar,mkelas where pgizi.kode_kamar=mkamar.kode_kamar and mkamar.kode_kelas=mkelas.kode_kelas and mkelas.kelastarif='2' and pgizi.kdpagi='$kode_makanan' and tanggal='$tglnya' and pgizi.kode_unit= '$kode_unit1'";
                $qry3=$this->db->query($query);
                if ($qry3->num_rows()>0) { $kls2 = $qry3->num_rows(); $jumkls2=$jumkls2+$kls2;} else { $kls2 = 0;}

                $query="SELECT pgizi.no_rm as vip FROM pgizi,mkamar,mkelas where pgizi.kode_kamar=mkamar.kode_kamar and mkamar.kode_kelas=mkelas.kode_kelas and mkelas.kelastarif='3' and pgizi.kdpagi='$kode_makanan' and tanggal='$tglnya' and pgizi.kode_unit= '$kode_unit1'";
                $qry3=$this->db->query($query);
                if ($qry3->num_rows()>0) { $kls3 = $qry3->num_rows(); $jumkls3=$jumkls3+$kls3; } else { $kls3 = 0;}

                $query="SELECT pgizi.no_rm as vip FROM pgizi,mkamar,mkelas where pgizi.kode_kamar=mkamar.kode_kamar and mkamar.kode_kelas=mkelas.kode_kelas and mkelas.kelastarif<>'1' and mkelas.kelastarif<>'2' and mkelas.kelastarif<>'3' and pgizi.kdpagi='$kode_makanan' and tanggal='$tglnya' and pgizi.kode_unit= '$kode_unit1'";
                $qry3=$this->db->query($query);
                if ($qry3->num_rows()>0) { $lain = $qry3->num_rows(); $jumlain=$jumlain+$lain;} else { $lain = 0;}
                
                $query="SELECT pgizi.no_rm as vip FROM pgizi where kode_unit='KMBS' and pgizi.kdpagi='$kode_makanan' and tanggal='$tglnya' ";
                $qry3=$this->db->query($query);
                if ($qry3->num_rows()>0) { $lainkmbs = $qry3->num_rows(); $jumlain=$jumlain+$lainkmbs;} else { $lainkmbs = 0;}
              }

              if ($waktu == 'SIANG') {
                $query="SELECT pgizi.no_rm as vip FROM pgizi,mkamar,mkelas where pgizi.kode_kamar=mkamar.kode_kamar and mkamar.kode_kelas=mkelas.kode_kelas and mkelas.kelastarif='V' and pgizi.kdsiang='$kode_makanan' and pgizi.tanggal='$tglnya' and pgizi.kode_unit= '$kode_unit1' ";
                $qry3=$this->db->query($query);
                if ($qry3->num_rows()>0) { $vip = $qry3->num_rows(); $jvip=$jvip+$vip;} else { $vip = 0;}

                $query="SELECT pgizi.no_rm as vip FROM pgizi,mkamar,mkelas where pgizi.kode_kamar=mkamar.kode_kamar and mkamar.kode_kelas=mkelas.kode_kelas and mkelas.kelastarif='1' and pgizi.kdsiang='$kode_makanan' and tanggal='$tglnya' and pgizi.kode_unit= '$kode_unit1'";
                $qry3=$this->db->query($query);
                if ($qry3->num_rows()>0) { $kls1 = $qry3->num_rows(); $jumkls1=$jumkls1+$kls1;} else { $kls1 = 0;}

                $query="SELECT pgizi.no_rm as vip FROM pgizi,mkamar,mkelas where pgizi.kode_kamar=mkamar.kode_kamar and mkamar.kode_kelas=mkelas.kode_kelas and mkelas.kelastarif='2' and pgizi.kdsiang='$kode_makanan' and tanggal='$tglnya' and pgizi.kode_unit= '$kode_unit1'";
                $qry3=$this->db->query($query);
                if ($qry3->num_rows()>0) { $kls2 = $qry3->num_rows(); $jumkls2=$jumkls2+$kls2;} else { $kls2 = 0;}

                $query="SELECT pgizi.no_rm as vip FROM pgizi,mkamar,mkelas where pgizi.kode_kamar=mkamar.kode_kamar and mkamar.kode_kelas=mkelas.kode_kelas and mkelas.kelastarif='3' and pgizi.kdsiang='$kode_makanan' and tanggal='$tglnya' and pgizi.kode_unit= '$kode_unit1'";
                $qry3=$this->db->query($query);
                if ($qry3->num_rows()>0) { $kls3 = $qry3->num_rows(); $jumkls3=$jumkls3+$kls3; } else { $kls3 = 0;}

                $query="SELECT pgizi.no_rm as vip FROM pgizi,mkamar,mkelas where pgizi.kode_kamar=mkamar.kode_kamar and mkamar.kode_kelas=mkelas.kode_kelas and mkelas.kelastarif<>'1' and mkelas.kelastarif<>'2' and mkelas.kelastarif<>'3' and pgizi.kdsiang='$kode_makanan' and tanggal='$tglnya' and pgizi.kode_unit= '$kode_unit1'";
                $qry3=$this->db->query($query);
                if ($qry3->num_rows()>0) { $lain = $qry3->num_rows(); $jumlain=$jumlain+$lain;} else { $lain = 0;}

                $query="SELECT pgizi.no_rm as vip FROM pgizi where pgizi.kode_unit='KMBS' and pgizi.kdsiang='$kode_makanan' and tanggal='$tglnya' and pgizi.kode_unit= '$kode_unit1'";
                $qry3=$this->db->query($query);
                if ($qry3->num_rows()>0) { $lainkmbs = $qry3->num_rows(); $jumlain=$jumlain+$lainkmbs;} else { $lainkmbs = 0;}

              }

              if ($waktu == 'MALAM') {
                $query="SELECT pgizi.no_rm as vip FROM pgizi,mkamar,mkelas where pgizi.kode_kamar=mkamar.kode_kamar and mkamar.kode_kelas=mkelas.kode_kelas and mkelas.kelastarif='V' and pgizi.kdmalam='$kode_makanan' and pgizi.tanggal='$tglnya' and pgizi.kode_unit= '$kode_unit1' ";
                $qry3=$this->db->query($query);
                if ($qry3->num_rows()>0) { $vip = $qry3->num_rows(); $jvip=$jvip+$vip;} else { $vip = 0;}

                $query="SELECT pgizi.no_rm as vip FROM pgizi,mkamar,mkelas where pgizi.kode_kamar=mkamar.kode_kamar and mkamar.kode_kelas=mkelas.kode_kelas and mkelas.kelastarif='1' and pgizi.kdmalam='$kode_makanan' and tanggal='$tglnya' and pgizi.kode_unit= '$kode_unit1'";
                $qry3=$this->db->query($query);
                if ($qry3->num_rows()>0) { $kls1 = $qry3->num_rows(); $jumkls1=$jumkls1+$kls1;} else { $kls1 = 0;}

                $query="SELECT pgizi.no_rm as vip FROM pgizi,mkamar,mkelas where pgizi.kode_kamar=mkamar.kode_kamar and mkamar.kode_kelas=mkelas.kode_kelas and mkelas.kelastarif='2' and pgizi.kdmalam='$kode_makanan' and tanggal='$tglnya' and pgizi.kode_unit= '$kode_unit1'";
                $qry3=$this->db->query($query);
                if ($qry3->num_rows()>0) { $kls2 = $qry3->num_rows(); $jumkls2=$jumkls2+$kls2;} else { $kls2 = 0;}

                $query="SELECT pgizi.no_rm as vip FROM pgizi,mkamar,mkelas where pgizi.kode_kamar=mkamar.kode_kamar and mkamar.kode_kelas=mkelas.kode_kelas and mkelas.kelastarif='3' and pgizi.kdmalam='$kode_makanan' and tanggal='$tglnya' and pgizi.kode_unit= '$kode_unit1'";
                $qry3=$this->db->query($query);
                if ($qry3->num_rows()>0) { $kls3 = $qry3->num_rows(); $jumkls3=$jumkls3+$kls3; } else { $kls3 = 0;}

                $query="SELECT pgizi.no_rm as vip FROM pgizi,mkamar,mkelas where pgizi.kode_kamar=mkamar.kode_kamar and mkamar.kode_kelas=mkelas.kode_kelas and mkelas.kelastarif<>'1' and mkelas.kelastarif<>'2' and mkelas.kelastarif<>'3' and pgizi.kdmalam='$kode_makanan' and tanggal='$tglnya' and pgizi.kode_unit= '$kode_unit1'";
                $qry3=$this->db->query($query);
                if ($qry3->num_rows()>0) { $lain = $qry3->num_rows(); $jumlain=$jumlain+$lain;} else { $lain = 0;}

                $query="SELECT pgizi.no_rm as vip FROM pgizi,mkamar,mkelas where pgizi.kode_unit='KMBS' and pgizi.kdmalam='$kode_makanan' and tanggal='$tglnya' and pgizi.kode_unit= '$kode_unit1'";
                $qry3=$this->db->query($query);
                if ($qry3->num_rows()>0) { $lainkmbs = $qry3->num_rows(); $jumlain=$jumlain+$lainkmbs;} else { $lainkmbs = 0;}
              }
          ?>   
      <tr>
        <td><div align="center" class="style2"><?php echo $i++;?></div></td>
        <td><div align="left" class="style2"><?php echo $nama_makanan;?></td>
        <td><div align="center" class="style2"><?php echo $vip;?></td>
        <td><div align="center" class="style2"><?php echo $kls1;?></td>
        <td><div align="center" class="style2"><?php echo $kls2;?></td>
        <td><div align="center" class="style2"><?php echo $kls3;?></td>
        <td><div align="center" class="style2"><?php echo $lain+$lainkmbs;?></td>
      </tr>
      <?php } ?>
      <tr>
        <td height=25px><div align="center" class="style2"></div></td>
        <td><div align="left" class="style2">JUMLAH</td>
        <td><div align="center" class="style2"><?php echo $jumvip;?></td>
        <td><div align="center" class="style2"><?php echo $jumkls1;?></td>
        <td><div align="center" class="style2"><?php echo $jumkls2;?></td>
        <td><div align="center" class="style2"><?php echo $jumkls3;?></td>
        <td><div align="center" class="style2"><?php echo $jumlain;?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%">&nbsp;</td>
        <td width="35%">&nbsp;</td>
        <td width="20%">&nbsp;</td>
        <td width="35%" class="style2">Tanggal, <?php echo tgl_format_indo_huruf($tglnya);?></td>
        <td width="5%">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="center" class="style2">MENGETAHUI</div></td>
        <td>&nbsp;</td>
        <td><div align="center" class="style2">PJ. GIZI RUANGAN </div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="center" class="style2">KEPALA RUANGAN </div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="center" class="style2">(........................................................................)</div></td>
        <td>&nbsp;</td>
        <td><div align="center" class="style2">(........................................................................)</div></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
