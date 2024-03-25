<style type="text/css">

.style1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style9 {	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style91 {	
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 12px ;
}
.style2 {font-family: Arial, Helvetica, sans-serif}
.style4 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; }
.style5 {font-size: 10px}
.style7 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; font-weight: bold; }

</style>

<?php
    $tgl1=strtotime($tgl);
    $mulai=date('Y-m-d',$tgl1);
    $ctmulai=date('d-m-Y',$tgl1);
    $tgl2=strtotime($tgl2);
    $sampai=date('Y-m-d',$tgl2);
    $ctsampai=date('d-m-Y',$tgl2);
    $waktu1=$waktu;
    if ($tgl1 == $tgl2 ) {
      $periode= $ctsampai;
      // tgl_format_indo_huruf($tgl1);
    } else {
      $periode=$ctmulai.' sampai '.$ctsampai;
    }

    $qry2=$this->db->query("SELECT nama_unit FROM munit where hapus=0 ");
      foreach ($qry2->result_array() as $brs2) {
        $nama_unit=$brs2['nama_unit'];
      }  
?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <!-- <tr>
    <td><img src="../rsudpemprov/assets/img/logosurat.jpg" alt="ss" width="700" height="105" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr> -->
  <tr>
    <td><div align="center"><span class="style9">INSTALASI GIZI </span></div></td>
  </tr>
  <tr>
    <td><div align="center"><span class="style1">REKAPITULASI PERMINTAAN  MAKANAN PASIEN RAWAT INAP </span></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style91"><?php echo 'Periode : '.$periode.'   |    Waktu Penyajian : '. $waktu1;?></span></td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="2">
    <tr>
        <td height='23px'class="style7"><div align="center"><span class="style4">No.</span></div></td>
        <td class="style7"><span class="style4">UNIT PERAWATAN </span></td>
        <td class="style7"><div align="center" class="style4">MB</div></td>
        <td class="style7"><div align="center">BB</div></td>
        <td class="style7"><div align="center">DL</div></td>
        <td class="style7"><div align="center">TKTP</div></td>
        <td class="style7"><div align="center">RG</div></td>
        <td class="style7"><div align="center">DM</div></td>
        <td class="style7"><div align="center">DH</div></td>
        <td class="style7"><div align="center">RL</div></td>
        <td class="style7"><div align="center">RPT</div></td>
        <td class="style7"><div align="center">RPR</div></td>
        <td class="style7"><div align="center">RCOL</div></td>
        <td class="style7"><div align="center">DJ1</div></td>
        <td class="style7"><div align="center">DJ2</div></td>
        <td class="style7"><div align="center">DJ3</div></td>
        <td class="style7"><div align="center">DJ4</div></td>
        <td class="style7"><div align="center">LB</div></td>
        <td class="style7"><div align="center">DD</div></td>
        <td class="style7"><div align="center">BK</div></td>
        <td class="style7"><div align="center">BS</div></td>
        <td class="style7"><div align="center">JML.PASIEN</div></td>
      </tr>
    <?php 
      $jummb=0;
      $jumbb=0;
      $jumdl=0;
      $jumtktp=0;
      $jumrg=0;
      $jumdm=0;
      $jumdh=0;
      $jumrl=0;
      $jumrpt=0;
      $jumrpr=0;
      $jumrcol=0;
      $jumdj1=0;
      $jumdj2=0;
      $jumdj3=0;
      $jumdj4=0;
      $jumlb=0;
      $jumdd=0;
      $jumbk=0;
      $jumbs=0;
      $jumpasien=0;
      $i=1;
      $qry2=$this->db->query("SELECT nama_unit,kode_unit FROM munit where hapus=0 and (inap=1 or ilahir=1) and kode_unit<>'DARCOV' and kode_unit<>'RROOM' order by nama_unit");
          foreach ($qry2->result_array() as $brs2) {
            $nama_unit=$brs2['nama_unit'];
            $kode_unit=$brs2['kode_unit'];
            $jumlahpasienunit=0;
      ?>     
      <tr>
        <td width="3%" height='18px'><div align="center"><span class="style4"><?php echo $i++;?></span></div></td>
        <td width="15%"><span class="style4"><?php echo $nama_unit;?></span></td>
        <?php
          $kodemkn='MB';
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdpagi='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jump = $qry3->num_rows();} else { $jump = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdsiang='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jums = $qry3->num_rows();} else { $jums = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdmalam='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jumm = $qry3->num_rows();} else { $jumm = 0;}
      
          if ($waktu == 'PAGI') {
            $jumnya=$jump;
          } elseif ($waktu == 'SIANG') {
            $jumnya=$jums;
          } else {
            $jumnya=$jumm;
          }

          $jummb=$jummb+$jumnya;
          $jumpasien= $jumpasien+$jumnya;
          $jumlahpasienunit=$jumlahpasienunit+$jumnya;
        ?>
        <td width="4%"><div align="center" class="style4"><?php echo $jumnya;?></div></td>
        <?php
          $kodemkn='BB';
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdpagi='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jump = $qry3->num_rows();} else { $jump = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdsiang='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jums = $qry3->num_rows();} else { $jums = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdmalam='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jumm = $qry3->num_rows();} else { $jumm = 0;}
          //$jumnya=$jump+$jums+$jumm;
          if ($waktu == 'PAGI') {
            $jumnya=$jump;
          } elseif ($waktu == 'SIANG') {
            $jumnya=$jums;
          } else {
            $jumnya=$jumm;
          }          
          $jumbb=$jumbb+$jumnya;
          $jumpasien= $jumpasien+$jumnya;
          $jumlahpasienunit=$jumlahpasienunit+$jumnya;
        ?>
        <td width="4%"><div align="center" class="style4"><?php echo $jumnya;?></div></td>
        <?php
          $kodemkn='DL';
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdpagi='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jump = $qry3->num_rows();} else { $jump = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdsiang='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jums = $qry3->num_rows();} else { $jums = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdmalam='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jumm = $qry3->num_rows();} else { $jumm = 0;}
          //$jumnya=$jump+$jums+$jumm;
          if ($waktu == 'PAGI') {
            $jumnya=$jump;
          } elseif ($waktu == 'SIANG') {
            $jumnya=$jums;
          } else {
            $jumnya=$jumm;
          }          
          $jumdl=$jumdl+$jumnya;
          $jumpasien= $jumpasien+$jumnya;
          $jumlahpasienunit=$jumlahpasienunit+$jumnya;
        ?>
        <td width="4%"><div align="center" class="style4"><?php echo $jumnya;?></div></td>

        <?php
          $kodemkn='TKTP';
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdpagi='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jump = $qry3->num_rows();} else { $jump = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdsiang='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jums = $qry3->num_rows();} else { $jums = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdmalam='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jumm = $qry3->num_rows();} else { $jumm = 0;}
          //$jumnya=$jump+$jums+$jumm;
          if ($waktu == 'PAGI') {
            $jumnya=$jump;
          } elseif ($waktu == 'SIANG') {
            $jumnya=$jums;
          } else {
            $jumnya=$jumm;
          }          
          $jumtktp=$jumtktp+$jumnya;
          $jumpasien= $jumpasien+$jumnya;
          $jumlahpasienunit=$jumlahpasienunit+$jumnya;
        ?>
        <td width="4%"><div align="center" class="style4"><?php echo $jumnya;?></div></td>

        <?php
          $kodemkn='RG';
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdpagi='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jump = $qry3->num_rows();} else { $jump = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdsiang='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jums = $qry3->num_rows();} else { $jums = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdmalam='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jumm = $qry3->num_rows();} else { $jumm = 0;}
          //$jumnya=$jump+$jums+$jumm;
          if ($waktu == 'PAGI') {
            $jumnya=$jump;
          } elseif ($waktu == 'SIANG') {
            $jumnya=$jums;
          } else {
            $jumnya=$jumm;
          }          
          $jumrg=$jumrg+$jumnya;
          $jumpasien= $jumpasien+$jumnya;
          $jumlahpasienunit=$jumlahpasienunit+$jumnya;
        ?>
        <td width="4%"><div align="center" class="style4"><?php echo $jumnya;?></div></td>

        <?php
          $kodemkn='DM';
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdpagi='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jump = $qry3->num_rows();} else { $jump = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdsiang='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jums = $qry3->num_rows();} else { $jums = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdmalam='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jumm = $qry3->num_rows();} else { $jumm = 0;}
          //$jumnya=$jump+$jums+$jumm;
          if ($waktu == 'PAGI') {
            $jumnya=$jump;
          } elseif ($waktu == 'SIANG') {
            $jumnya=$jums;
          } else {
            $jumnya=$jumm;
          }          
          $jumdm=$jumdm+$jumnya;
          $jumpasien= $jumpasien+$jumnya;
          $jumlahpasienunit=$jumlahpasienunit+$jumnya;
        ?>
        <td width="4%"><div align="center" class="style4"><?php echo $jumnya;?></div></td>

        
        <?php
          $kodemkn='DH';
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdpagi='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jump = $qry3->num_rows();} else { $jump = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdsiang='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jums = $qry3->num_rows();} else { $jums = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdmalam='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jumm = $qry3->num_rows();} else { $jumm = 0;}
          //$jumnya=$jump+$jums+$jumm;
          if ($waktu == 'PAGI') {
            $jumnya=$jump;
          } elseif ($waktu == 'SIANG') {
            $jumnya=$jums;
          } else {
            $jumnya=$jumm;
          }          
          $jumdh=$jumdh+$jumnya;
          $jumpasien= $jumpasien+$jumnya;
          $jumlahpasienunit=$jumlahpasienunit+$jumnya;
        ?>
        <td width="4%"><div align="center" class="style4"><?php echo $jumnya;?></div></td>

        <?php
          $kodemkn='RL';
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdpagi='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jump = $qry3->num_rows();} else { $jump = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdsiang='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jums = $qry3->num_rows();} else { $jums = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdmalam='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jumm = $qry3->num_rows();} else { $jumm = 0;}
          //$jumnya=$jump+$jums+$jumm;
          if ($waktu == 'PAGI') {
            $jumnya=$jump;
          } elseif ($waktu == 'SIANG') {
            $jumnya=$jums;
          } else {
            $jumnya=$jumm;
          }          
          $jumrl=$jumrl+$jumnya;
          $jumpasien= $jumpasien+$jumnya;
          $jumlahpasienunit=$jumlahpasienunit+$jumnya;
        ?>
        <td width="4%"><div align="center" class="style4"><?php echo $jumnya;?></div></td>

        <?php
          $kodemkn='RPT';
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdpagi='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jump = $qry3->num_rows();} else { $jump = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdsiang='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jums = $qry3->num_rows();} else { $jums = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdmalam='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jumm = $qry3->num_rows();} else { $jumm = 0;}
          //$jumnya=$jump+$jums+$jumm;
          if ($waktu == 'PAGI') {
            $jumnya=$jump;
          } elseif ($waktu == 'SIANG') {
            $jumnya=$jums;
          } else {
            $jumnya=$jumm;
          }          
          $jumrpt=$jumrpt+$jumnya;
          $jumpasien= $jumpasien+$jumnya;
          $jumlahpasienunit=$jumlahpasienunit+$jumnya;
        ?>
        <td width="4%"><div align="center" class="style4"><?php echo $jumnya;?></div></td>
        
        <?php
          $kodemkn='RPR';
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdpagi='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jump = $qry3->num_rows();} else { $jump = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdsiang='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jums = $qry3->num_rows();} else { $jums = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdmalam='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jumm = $qry3->num_rows();} else { $jumm = 0;}
          //$jumnya=$jump+$jums+$jumm;
          if ($waktu == 'PAGI') {
            $jumnya=$jump;
          } elseif ($waktu == 'SIANG') {
            $jumnya=$jums;
          } else {
            $jumnya=$jumm;
          }          
          $jumrpr=$jumrpr+$jumnya;
          $jumpasien= $jumpasien+$jumnya;
          $jumlahpasienunit=$jumlahpasienunit+$jumnya;
        ?>
        <td width="4%"><div align="center" class="style4"><?php echo $jumnya;?></div></td>

        <?php
          $kodemkn='RCOL';
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdpagi='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jump = $qry3->num_rows();} else { $jump = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdsiang='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jums = $qry3->num_rows();} else { $jums = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdmalam='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jumm = $qry3->num_rows();} else { $jumm = 0;}
          //$jumnya=$jump+$jums+$jumm;
          if ($waktu == 'PAGI') {
            $jumnya=$jump;
          } elseif ($waktu == 'SIANG') {
            $jumnya=$jums;
          } else {
            $jumnya=$jumm;
          }          
          $jumrcol=$jumrcol+$jumnya;
          $jumpasien= $jumpasien+$jumnya;
          $jumlahpasienunit=$jumlahpasienunit+$jumnya;
        ?>
        <td width="4%"><div align="center" class="style4"><?php echo $jumnya;?></div></td>

        <?php
          $kodemkn='DJ1';
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdpagi='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jump = $qry3->num_rows();} else { $jump = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdsiang='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jums = $qry3->num_rows();} else { $jums = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdmalam='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jumm = $qry3->num_rows();} else { $jumm = 0;}
          //$jumnya=$jump+$jums+$jumm;
          if ($waktu == 'PAGI') {
            $jumnya=$jump;
          } elseif ($waktu == 'SIANG') {
            $jumnya=$jums;
          } else {
            $jumnya=$jumm;
          }          
          $jumdj1=$jumdj1+$jumnya;
          $jumpasien= $jumpasien+$jumnya;
          $jumlahpasienunit=$jumlahpasienunit+$jumnya;
        ?>
        <td width="4%"><div align="center" class="style4"><?php echo $jumnya;?></div></td>

        <?php
          $kodemkn='DJ2';
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdpagi='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jump = $qry3->num_rows();} else { $jump = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdsiang='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jums = $qry3->num_rows();} else { $jums = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdmalam='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jumm = $qry3->num_rows();} else { $jumm = 0;}
          //$jumnya=$jump+$jums+$jumm;
          if ($waktu == 'PAGI') {
            $jumnya=$jump;
          } elseif ($waktu == 'SIANG') {
            $jumnya=$jums;
          } else {
            $jumnya=$jumm;
          }          
          $jumdj2=$jumdj2+$jumnya;
          $jumpasien= $jumpasien+$jumnya;
          $jumlahpasienunit=$jumlahpasienunit+$jumnya;
        ?>
        <td width="4%"><div align="center" class="style4"><?php echo $jumnya;?></div></td>

        <?php
          $kodemkn='DJ3';
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdpagi='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jump = $qry3->num_rows();} else { $jump = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdsiang='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jums = $qry3->num_rows();} else { $jums = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdmalam='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jumm = $qry3->num_rows();} else { $jumm = 0;}
          //$jumnya=$jump+$jums+$jumm;
          if ($waktu == 'PAGI') {
            $jumnya=$jump;
          } elseif ($waktu == 'SIANG') {
            $jumnya=$jums;
          } else {
            $jumnya=$jumm;
          }          
          $jumdj3=$jumdj3+$jumnya;
          $jumpasien= $jumpasien+$jumnya;
          $jumlahpasienunit=$jumlahpasienunit+$jumnya;
        ?>
        <td width="4%"><div align="center" class="style4"><?php echo $jumnya;?></div></td>
        
        <?php
          $kodemkn='DJ4';
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdpagi='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jump = $qry3->num_rows();} else { $jump = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdsiang='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jums = $qry3->num_rows();} else { $jums = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdmalam='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jumm = $qry3->num_rows();} else { $jumm = 0;}
          //$jumnya=$jump+$jums+$jumm;
          if ($waktu == 'PAGI') {
            $jumnya=$jump;
          } elseif ($waktu == 'SIANG') {
            $jumnya=$jums;
          } else {
            $jumnya=$jumm;
          }          
          $jumdj4=$jumdj4+$jumnya;
          $jumpasien= $jumpasien+$jumnya;
          $jumlahpasienunit=$jumlahpasienunit+$jumnya;
        ?>
        <td width="4%"><div align="center" class="style4"><?php echo $jumnya;?></div></td>

        <?php
          $kodemkn='LB';
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdpagi='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jump = $qry3->num_rows();} else { $jump = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdsiang='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jums = $qry3->num_rows();} else { $jums = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdmalam='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jumm = $qry3->num_rows();} else { $jumm = 0;}
          //$jumnya=$jump+$jums+$jumm;
          if ($waktu == 'PAGI') {
            $jumnya=$jump;
          } elseif ($waktu == 'SIANG') {
            $jumnya=$jums;
          } else {
            $jumnya=$jumm;
          }          
          $jumlb=$jumlb+$jumnya;
          $jumpasien= $jumpasien+$jumnya;
          $jumlahpasienunit=$jumlahpasienunit+$jumnya;
        ?>
        <td width="4%"><div align="center" class="style4"><?php echo $jumnya;?></div></td>

        <?php
          $kodemkn='DD';
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdpagi='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jump = $qry3->num_rows();} else { $jump = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdsiang='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jums = $qry3->num_rows();} else { $jums = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdmalam='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jumm = $qry3->num_rows();} else { $jumm = 0;}
          //$jumnya=$jump+$jums+$jumm;
          if ($waktu == 'PAGI') {
            $jumnya=$jump;
          } elseif ($waktu == 'SIANG') {
            $jumnya=$jums;
          } else {
            $jumnya=$jumm;
          }          
          $jumdd=$jumdd+$jumnya;
          $jumpasien= $jumpasien+$jumnya;
          $jumlahpasienunit=$jumlahpasienunit+$jumnya;
        ?>
        <td width="4%"><div align="center" class="style4"><?php echo $jumnya;?></div></td>

        <?php
          $kodemkn='BK';
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdpagi='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jump = $qry3->num_rows();} else { $jump = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdsiang='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jums = $qry3->num_rows();} else { $jums = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdmalam='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jumm = $qry3->num_rows();} else { $jumm = 0;}
          //$jumnya=$jump+$jums+$jumm;
          if ($waktu == 'PAGI') {
            $jumnya=$jump;
          } elseif ($waktu == 'SIANG') {
            $jumnya=$jums;
          } else {
            $jumnya=$jumm;
          }          
          $jumbk=$jumbk+$jumnya;
          $jumpasien= $jumpasien+$jumnya;
          $jumlahpasienunit=$jumlahpasienunit+$jumnya;
        ?>
        <td width="4%"><div align="center" class="style4"><?php echo $jumnya;?></div></td>

        <?php
          $kodemkn='BS';
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdpagi='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jump = $qry3->num_rows();} else { $jump = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdsiang='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jums = $qry3->num_rows();} else { $jums = 0;}
          $query="SELECT pgizi.no_rm as jum FROM pgizi where kode_unit='$kode_unit' and pgizi.kdmalam='$kodemkn' and pgizi.tanggal>='$mulai' and pgizi.tanggal<='$sampai' ";
          $qry3=$this->db->query($query);
          if ($qry3->num_rows()>0) { $jumm = $qry3->num_rows();} else { $jumm = 0;}
          //$jumnya=$jump+$jums+$jumm;
          if ($waktu == 'PAGI') {
            $jumnya=$jump;
          } elseif ($waktu == 'SIANG') {
            $jumnya=$jums;
          } else {
            $jumnya=$jumm;
          }          
          $jumbs=$jumbs+$jumnya;
          $jumpasien= $jumpasien+$jumnya;
          $jumlahpasienunit=$jumlahpasienunit+$jumnya;
        ?>
        <td width="4%"><div align="center" class="style4"><?php echo $jumnya;?></div></td>

        <td width="6%"><div align="center" class="style4"><?php echo $jumlahpasienunit;?></div></td>
      </tr>
    <?php } ?> 

      
      <tr>
        <td colspan="2"><div align="right"><span class="style7">JUMLAH</span></div></td>
        <td class="style7"><div align="center"><?php echo $jummb;?></div></td>
        <td class="style7"><div align="center"><?php echo $jumbb;?></div></td>
        <td class="style7"><div align="center"><?php echo $jumdl;?></div></td>
        <td class="style7"><div align="center"><?php echo $jumtktp;?></div></td>
        <td class="style7"><div align="center"><?php echo $jumrg;?></div></td>
        <td class="style7"><div align="center"><?php echo $jumdm;?></div></td>
        <td class="style7"><div align="center"><?php echo $jumdh;?></div></td>
        <td class="style7"><div align="center"><?php echo $jumrl;?></div></td>
        <td class="style7"><div align="center"><?php echo $jumrpt;?></div></td>
        <td class="style7"><div align="center"><?php echo $jumrpr;?></div></td>
        <td class="style7"><div align="center"><?php echo $jumrcol;?></div></td>
        <td class="style7"><div align="center"><?php echo $jumdj1;?></div></td>
        <td class="style7"><div align="center"><?php echo $jumdj2;?></div></td>
        <td class="style7"><div align="center"><?php echo $jumdj3;?></div></td>
        <td class="style7"><div align="center"><?php echo $jumdj4;?></div></td>
        <td class="style7"><div align="center"><?php echo $jumlb;?></div></td>
        <td class="style7"><div align="center"><?php echo $jumdd;?></div></td>
        <td class="style7"><div align="center"><?php echo $jumbk;?></div></td>
        <td class="style7"><div align="center"><?php echo $jumbs;?></div></td>
        <td class="style7"><div align="center"><?php echo $jumpasien;?></div></td>
      </tr>
      
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
