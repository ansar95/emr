<!-- 
/**
 * Created by PhpStorm.
 * User: alifupoenya
 * Date: 29/03/18
 * Time: 06.30
 */ -->


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
        <div class="namars"><?php echo ' '.getenv('V_NAMARS'); ?> </div>
            <div class="judul">INDIKATOR RUMAH SAKIT</div>
            <!-- <div class="judul">PERIODE : Juli 2021</div> -->
            <div class="judul"><?php echo 'PERIODE : '.nama_bulan_indonesia($bulan).' '.$tahun;?></div>
            
		<br>
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
        $keluarkmb='KMBS';

        $sqlu="SELECT kode_unit,nama_unit from munit where kelompok_unit='RUANGAN' order by kode_unit ";
		$qry2u=$this->db->query($sqlu);
		foreach ($qry2u->result_array() as $u) 
        {
            $kode_unitnya=$u['kode_unit'];
            $nama_unitnya=$u['nama_unit'];
            ?>
            
            <?php
            //-------------------INDIKATOR RUMAH SAKIT ----------------------------
            //-hitung lama rawat dan jumlah mati
            //-Hitung Jumlah Lama Dirawat (LD) berhubungan dengan pasien pulang/ hanya pasien pulang saja yang dihitung --> 


            $xlamarawat=0;
            $xpasienkeluar=0;
            $xmatilebih48jam=0;
            $xmatikurang48jam=0;
            $nhari=0;
            
            //-lama rawat adalah selisih tgl keluar dan tgl masuk dari psien yg keluar pada tanggal tersebut

            $sql="SELECT tgl_masuk_kamar,tgl_keluar_kamar from register_detail where MONTH(tgl_keluar_kamar)='$bulannya' and YEAR(tgl_keluar_kamar)='$bulannya' and status=1 and kode_unit='$kode_unitnya' ";
            
            $qry2=$this->db->query($sql);
            foreach ($qry2->result_array() as $d) {
                $nhari=$d['tgl_keluar_kamar']-$d['tgl_masuk_kamar'];
                if ($nhari == 0) { $nhari = 1; }
                $xlamarawat=$xlamarawat+$d['nhari']; 
                $xpasienkeluar++;
            }

            $jumlahharirawat=0;
            $harirawat1=0;
            //masuk bulan 6 keluar bulan 6
            $sql="SELECT tgl_masuk_kamar,tgl_keluar_kamar from register_detail where MONTH(tgl_keluar_kamar)='$bulannya' and YEAR(tgl_keluar_kamar)='$tahunnya' and MONTH(tgl_masuk_kamar)='$bulannya' and YEAR(tgl_masuk_kamar)='$tahunnya' and status=1 and kode_unit='$kode_unitnya' ";
            $qry2=$this->db->query($sql);
            foreach ($qry2->result_array() as $d) {
                $tglk = date('d', strtotime($d['tgl_keluar_kamar']));
                $tglm = date('d', strtotime($d['tgl_masuk_kamar']));
                $harirawat1=$tglk-$tglm+1;
                $jumlahharirawat=$jumlahharirawat+$harirawat1;
            }

            //masuk bulan 6 belum keluar ????????????????
            $sql="SELECT tgl_masuk_kamar,tgl_keluar_kamar from register_detail where MONTH(tgl_masuk_kamar)='$bulannya' and YEAR(tgl_masuk_kamar)='$tahunnya' and status=0 and pulang=0 and kode_unit='$kode_unitnya' ";
            $qry2=$this->db->query($sql);
            foreach ($qry2->result_array() as $d) {
                    $tglm=$d['tgl_masuk_kamar'];

                    $tgl_masuknya = date('d', strtotime($tglm));
                    $f= $tglterakhirbulan-$tgl_masuknya+1;
                    $jumlahharirawat=$jumlahharirawat+$f;
            }
            

            //keluar bulan 6 masuk bulan sebelumnya
            $sql="SELECT tgl_keluar_kamar from register_detail where MONTH(tgl_keluar_kamar)='$bulannya' and YEAR(tgl_keluar_kamar)='$tahunnya' and MONTH(tgl_masuk_kamar)<>'$bulannya' and YEAR(tgl_masuk_kamar)<>'$tahunnya'  and status=1 and  kode_unit='$kode_unitnya'  ";
            $qry2=$this->db->query($sql);
            foreach ($qry2->result_array() as $d) {
                    $tglk=$d['tgl_keluar_kamar'];
                    $tgl_keluarnya = date('d', strtotime($tglk));
                    $f= $tgl_keluarnya;
                    $jumlahharirawat=$jumlahharirawat+$f;
            }

            // consol.log( "Hari Perawatan :".$jumlahharirawat);

            $xharirawat=$jumlahharirawat;

            //-jumlah t4 tidur

            $sql="SELECT SUM(mkamar.t4tidur) as njumlaht4tidur from mkamar,mkelas,munit where mkamar.kode_kelas=mkelas.kode_kelas and mkelas.kode_unit<>'$keluarigd' and mkelas.kode_unit<>'keluarkmb' and mkelas.kode_unit=munit.kode_unit and munit.kode_unit='$kode_unitnya' ";
            $qry2=$this->db->query($sql);
            foreach ($qry2->result_array() as $d) {
                $xjumlaht4tidur=trim($d['njumlaht4tidur']);    
            }

            // consol.log( "Jumlah t4 Tidur :".$xjumlaht4tidur);


            //***********************MULAI HITUNG INDIKATOR ***********************
            //BOR = (jumlah hari perawatan/(jumlah t4tidur*jumlah hari periode))*100%
            //jumlah hari periode=1
            $jumhariperiode= $tglterakhirbulan;
            if ($xjumlaht4tidur==0) { $xbor=0;} else {
            $xbor=( $xharirawat/($xjumlaht4tidur*$jumhariperiode))*100; }
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
            if ($xjumlaht4tidur==0) { $xbto=0;} else {
            $xbto= ($xpasienkeluar / $xjumlaht4tidur); }
            // consol.log( "BTO :".$xbto);


            //NDR = (jumlah pasien mati>48 jam/pasien keluar )* 1000
            //GDR = (jumlah pasien mati seluruhnya / jumlah pasien keluar) x 1000
            // if ($xpasienkeluar == 0){
            //     $xndr=0;  
            //     $xgdr =0;  
            // } else {
            //     $xndr= ($xmatilebih48jam / $xpasienkeluar) * 1000;
            //     $jumpasienmati= $xmatilebih48jam + $xmatikurang48jam;
            //     $xgdr=($jumpasienmati / $xpasienkeluar) * 1000;
            // }

            // consol.log( "NDR :".$xndr);
            // consol.log( "GDR :".$xgdr);
            if ($xbor != 0) {
            ?>
            
            
            <div class="judul2"><?php echo 'PERAWATAN '.$nama_unitnya;?></div>
            <table class="minimalistBlack2" width="100%"  cellspacing="0" cellpadding="0">
                <tr>
                    <td style="text-align:center" width="15%">Lama Rawat</td>
                    <td style="text-align:center" width="15%">Hari Rawat</td>
                    <td style="text-align:center" width="15%">Pasien Keluar</td>
                    <!-- <td style="text-align:center" width="16%">Mati Kurang 48 Jam</td>
                    <td style="text-align:center" width="16%">Mati Lebih 48 Jam</td> -->
                    <td style="text-align:center" width="15%">T.Tidur </td>
                </tr>
                <tr>
                    <td style="text-align:center" ><?php echo $xlamarawat;?></td>
                    <td style="text-align:center" ><?php echo  $xharirawat;?></td>
                    <td style="text-align:center" ><?php echo  $xpasienkeluar;?></td>
                    <!-- <td style="text-align:center" ><?php echo  $xmatilebih48jam;?></td>
                    <td style="text-align:center" ><?php echo  $xmatikurang48jam;?></td> -->
                    <td style="text-align:center" ><?php echo  $xjumlaht4tidur;?></td>
            </table>

            <table class="minimalistBlack2" width="100%"  cellspacing="0" cellpadding="0">
                <tr>
                    <td style="text-align:center" width="15%">BOR</td>
                    <td style="text-align:center" width="15%">LOS</td>
                    <td style="text-align:center" width="15%">BTO</td>
                    <td style="text-align:center" width="15%">TOI</td>
                    <!-- <td style="text-align:center" width="16%">NDR</td>
                    <td style="text-align:center" width="15%">GDR </td> -->
                </tr>
                <tr>
                    <td style="text-align:center" ><?php echo number_format($xbor,2);?></td>
                    <td style="text-align:center" ><?php echo number_format($xavlos,2);?></td>
                    <td style="text-align:center" ><?php echo number_format($xbto,2);?></td>
                    <td style="text-align:center" ><?php echo number_format($xtoi,2);?></td>
                    <!-- <td style="text-align:center" ><?php echo number_format($xndr,2);?></td>
                    <td style="text-align:center" ><?php echo number_format($xgdr,2);?></td> -->
            </table>
            <br>

        <?php }} ?> 
	</body>
</html>