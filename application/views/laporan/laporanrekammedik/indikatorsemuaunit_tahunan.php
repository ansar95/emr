<html>
	<head>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/report/tablereport_dedy.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/report/fontreport_dedy.css">
		<!-- <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet"> -->
		<!-- <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel="stylesheet"> -->
		<!-- <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet"> -->
	<style>
	
	</style>

</head>

	<body>
		<?php
		$bulannya=$bulan;
		$tahunnya=$tahun;
		// $bulannya = '06';   
        // $tahunnya = '2021';
		$keluarigd='IGDD';
		date_default_timezone_set('Asia/Jakarta');
        $tanggal= mktime(date("m"),date("d"),date("Y"));
        // $tgl = date("Y-m-d", $tanggal);
        // $tgl = "2021-06-03";
        // $tgl1 = "2021-06-03";
        $tgl_ina = date("d-m-Y", $tanggal);
        $tanggalnya=$tgl_ina;	
        $tahun=date("Y", $tanggal);

        $tanggalawal=$tahunnya.'-'.$bulannya.'-01';
        $tgl_pertama = date('Y-m-01', strtotime($tanggalawal));
        $tgl_terakhir = date('Y-m-t', strtotime($tanggalawal));
        $tglterakhirbulan= date('d', strtotime($tgl_terakhir));



        $keluarigd='IGDD';
        $keluarigdp='IGDP';
        $keluarkmb='KMBS';


        //-------------------INDIKATOR RUMAH SAKIT ----------------------------
        //-hitung lama rawat dan jumlah mati
        //-Hitung Jumlah Lama Dirawat (LD) berhubungan dengan pasien pulang/ hanya pasien pulang saja yang dihitung --> 

        $xlamarawat=0;
        $xpasienkeluar=0;
        $xmatilebih48jam=0;
        $xmatikurang48jam=0;
        $nhari=0;

        //-lama rawat adalah selisih tgl keluar dan tgl masuk dari psien yg keluar pada tanggal tersebut
        // $sql="SELECT tgl_masuk,tgl_keluar,kondisi_keluar,keluarpada from register_tahunan where (bagian='INAP' or bagian='IGD') and YEAR(tgl_keluar)='$tahunnya' and status=1 and kode_keluarpada<>'$keluarigd' and kode_keluarpada<>'$keluarigdp' and kode_keluarpada<>'$keluarkmb' order by tgl_keluar ";

        $sql="SELECT tgl_masuk,tgl_keluar,kondisi_keluar,keluarpada from register_tahunan where (bagian='INAP' or bagian='IGD') and YEAR(tgl_keluar)='$tahunnya' and kode_keluarpada<>'$keluarigd' and kode_keluarpada<>'$keluarigdp' and kode_keluarpada<>'$keluarkmb' order by tgl_keluar ";

		$qry2=$this->db->query($sql);
		foreach ($qry2->result_array() as $d) {
			$tgl1 = strtotime($d['tgl_masuk']); 
			$tgl2 = strtotime($d['tgl_keluar']); 
			$jarak = $tgl2 - $tgl1;
			$nhari = $jarak / 60 / 60 / 24;

			// $nhari=$tglk-$tglm;
			if ($nhari < 1) { $nhari = 1; }
			$xlamarawat=$xlamarawat+$nhari; 
			$xpasienkeluar++;
			if ( $d['kondisi_keluar'] == 'MATI > 48 JAM') {
				$xmatilebih48jam++;
			}
			if ( $d['kondisi_keluar'] == 'MATI < 48 Jam') {
				$xmatikurang48jam++;
			}
        }

        // echo "tgl akhir : ".$tglterakhirbulan;
        // consol.log("Pasien Keluar  : ".$xpasienkeluar);
        // consol.log( "lama rawat  : ".$xlamarawat);
        // consol.log( "mati>48 jam : ".$xmatilebih48jam);
        // consol.log( "mati<48 jam : ".$xmatikurang48jam);

        //-Hitung Jumlah Hari Rawat (HD) / hari perawatan adalah jumlah pasien yg dirawat pada hari itu
        //- jumlah hari dalam 1 bulan
        // consol.log($jumlahhari); //dari atas

        $jumlahharirawat=0;
        $harirawat1=0;
        //masuk bulan 6 keluar bulan 6
        // $sql="SELECT tgl_masuk,tgl_keluar,kondisi_keluar,keluarpada from register_tahunan where (bagian='INAP' or bagian='IGD') and YEAR(tgl_keluar)='$tahunnya' and pulang>0 and kode_keluarpada<>'$keluarigd' and kode_keluarpada<>'$keluarkmb' ";
        $sql="SELECT tgl_masuk,tgl_keluar,kondisi_keluar,keluarpada from register_tahunan where (bagian='INAP' or bagian='IGD') and YEAR(tgl_keluar)='$tahunnya' and kode_keluarpada<>'$keluarigd' and kode_keluarpada<>'$keluarkmb' ";
		$qry2=$this->db->query($sql);
		foreach ($qry2->result_array() as $d) {
			$tglm=new DateTime($d['tgl_masuk']);
            $tglk=new DateTime($d['tgl_keluar']);
            $harirawat2 = $tglk->diff($tglm)->days ;
			$harirawat1 = $harirawat2 + 1;
			// $tglk = date('d', strtotime($d['tgl_keluar']));
			// $tglm = date('d', strtotime($d['tgl_masuk']));
			// $harirawat1=$tglk-$tglm+1;
            // $harirawat1=$d['tgl_keluar']-$d['tgl_masuk']+1;
            $jumlahharirawat=$jumlahharirawat+$harirawat1;
        }

        // //masuk bulan 6 belum keluar ????????????????
        // $sql="SELECT tgl_masuk,tgl_keluar,saat_keluar,kondisi_keluar, keluarpada from register_tahunan where (bagian='INAP' or bagian='IGD')  and YEAR(tgl_masuk)='$tahunnya' and tgl_keluar='0000-00-00' and pulang=0 ";
		// $qry2=$this->db->query($sql);
		// foreach ($qry2->result_array() as $d) {
        //         $tglm=$d['tgl_masuk'];
        //         $tgl_masuknya = date('d', strtotime($tglm));
        //         $f= $tglterakhirbulan-$tgl_masuknya+1;
        //         $jumlahharirawat=$jumlahharirawat+$f;
        // }


        //keluar bulan 6 masuk bulan sebelumnya
        // $sql="SELECT tgl_keluar,saat_keluar,kondisi_keluar, keluarpada from register where (bagian='INAP' or bagian='IGD') and YEAR(tgl_keluar)='$tahunnya'  and YEAR(tgl_masuk)<'$tahunnya' and pulang>0 and kode_keluarpada<>'$keluarigd' and kode_keluarpada<>'$keluarkmb' ";
		// $qry2=$this->db->query($sql);
		// foreach ($qry2->result_array() as $d) {
        //         $tglk=$d['tgl_keluar'];
        //         $tgl_keluarnya = date('d', strtotime($tglk));
        //         $f= $tgl_keluarnya;
        //         $jumlahharirawat=$jumlahharirawat+$f;
        // }

        // consol.log( "Hari Perawatan :".$jumlahharirawat);

        $xharirawat=$jumlahharirawat;

        //-jumlah t4 tidur

        $sql="SELECT SUM(mkamar.t4tidur) as njumlaht4tidur from mkamar,mkelas where mkamar.kode_kelas=mkelas.kode_kelas and mkelas.kode_unit<>'$keluarigd' and mkelas.kode_unit<>'keluarkmb'  ";
		$qry2=$this->db->query($sql);
		foreach ($qry2->result_array() as $d) {
            $xjumlaht4tidur=trim($d['njumlaht4tidur']);    
        }

        // consol.log( "Jumlah t4 Tidur :".$xjumlaht4tidur);


        //***********************MULAI HITUNG INDIKATOR ***********************
        //BOR = (jumlah hari perawatan/(jumlah t4tidur*jumlah hari periode))*100%
        //jumlah hari periode=1
        $jumhariperiode= 365;
        $xbor=( $xharirawat/($xjumlaht4tidur*$jumhariperiode))*100;
        // consol.log( "BOR :".$xbor);

        //AVLOS=jumlah lama rawat/pasien keluar(hidup dan mati)
          //TOI  = ((jumlah t4tidur x periode) - hari perawatan)/pasien keluar(hidup dan mati)
        if ($xpasienkeluar == 0){
            $xavlos=0;  
             $xtoi =0;  
        } else {
        $xavlos=$xlamarawat / $xpasienkeluar;
        $xtoi  = (($xjumlaht4tidur*$jumhariperiode) - $xharirawat) / $xpasienkeluar;
        }
        // consol.log( "AVLOS :".$xavlos);
        // consol.log( "TOI :".$xtoi);


        //BTO = jumlah pasien keluar / jumlah t4tidur
        $xbto= ($xpasienkeluar / $xjumlaht4tidur);
        // consol.log( "BTO :".$xbto);


        //NDR = (jumlah pasien mati>48 jam/pasien keluar )* 1000
        //GDR = (jumlah pasien mati seluruhnya / jumlah pasien keluar) x 1000
        if ($xpasienkeluar == 0){
            $xndr=0;  
            $xgdr =0;  
        } else {
            $xndr= ($xmatilebih48jam / $xpasienkeluar) * 1000;
            $jumpasienmati= $xmatilebih48jam + $xmatikurang48jam;
            $xgdr=($jumpasienmati / $xpasienkeluar) * 1000;
        }

        // consol.log( "NDR :".$xndr);
        // consol.log( "GDR :".$xgdr);
		?>
		
		<div class="namars"><?php echo ' '.getenv('V_NAMARS'); ?></div>
		<div class="judul">INDIKATOR RUMAH SAKIT</div>
		<br>
		<div class="judul"><?php echo 'PERIODE TAHUN : '.$tahunnya;?></div>
	
		<table class="isi" width="100%"  cellspacing="10" cellpadding="0">
			<tr>
				<td width="23%">Lama Rawat</td>
				<td style="text-align:right" width="10%"><?php echo $xlamarawat;?></td>
				<td width="80%"></td>
			</tr>
			<tr>
				<td>Hari Rawat</td>
				<td style="text-align:right" ><?php echo  $xharirawat;?></td>
			</tr>
			<tr>
				<td>Pasien Keluar</td>
				<td style="text-align:right" ><?php echo  $xpasienkeluar;?></td>
			</tr>
			<tr>
				<td>Mati Lebih dari 48 Jam</td>
				<td style="text-align:right" ><?php echo  $xmatilebih48jam;?></td>
			</tr>
			<tr>
				<td>Mati Kurang dari 48 Jam</td>
				<td style="text-align:right" ><?php echo  $xmatikurang48jam;?></td>
			</tr>
			<tr>
				<td>Jumlah Tempat Tidur</td>
				<td style="text-align:right" ><?php echo  $xjumlaht4tidur;?></td>
			</tr>
   	 	</table>
		<br>
		<table class="isi" width="100%"  cellspacing="10" cellpadding="0">
			<tr>
				<td width="23%">BOR</td>
				<td style="text-align:right" width="10%"><?php echo number_format($xbor,2);?></td>
				<td width="80%"></td>
			</tr>
			<tr>
				<td width="23%">LOS</td>
				<td style="text-align:right" width="10%"><?php echo number_format($xavlos,2);?></td>
				<td width="80%"></td>
			</tr>
			</tr>
			<tr>
				<td width="23%">BTO</td>
				<td style="text-align:right" width="10%"><?php echo number_format($xbto,2);?></td>
				<td width="80%"></td>
			</tr>
			</tr>
			<tr>
				<td width="23%">TOI</td>
				<td style="text-align:right" width="10%"><?php echo number_format($xtoi,2);?></td>
				<td width="80%"></td>
			</tr>
			</tr>
			<tr>
				<td width="23%">NDR</td>
				<td style="text-align:right" width="10%"><?php echo number_format($xndr,2);?></td>
				<td width="80%"></td>
			</tr>
			</tr>
			<tr>
				<td width="23%">GDR</td>
				<td style="text-align:right" width="10%"><?php echo number_format($xgdr,2);?></td>
				<td width="80%"></td>
			</tr>
   	 	</table>
	</body>
</html>
