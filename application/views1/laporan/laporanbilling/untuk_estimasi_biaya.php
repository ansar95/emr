
        $xnotransaksi=$notrx;
        $xnotransaksi1=$notrx;
        $xno_rm=$norm;

        
        $qry2=$this->db->query("SELECT register.golongan as golongan,register.status as xstatusregister FROM register where notransaksi='".$xnotransaksi."' AND no_rm='".$xno_rm."' LIMIT 1");

        foreach ($qry2->result_array() as $brs9) {
            $xgil9=$brs9['golongan'];
            $xgolongannya=trim($xgil9);
            $xstatusregister=$brs9['xstatusregister'];
        }

        $qry1=$this->db->query("SELECT *, register_detail.id as idnya, register_detail.status as xstatusnya,register.bagian as bagian FROM register_detail INNER JOIN pasien ON register_detail.no_rm=pasien.no_rm INNER JOIN register ON register.notransaksi = register_detail.notransaksi WHERE register_detail.notransaksi='".$xnotransaksi."' AND register_detail.no_rm='".$xno_rm."'  ORDER BY register_detail.tgl_keluar_kamar ASC, register_detail.id ASC");
        
        foreach ($qry1->result_array() as $brs1) {
            $xkode_kamar=$brs1['kode_kamar'];
            $xtglmsk=$brs1['tgl_masuk_kamar'];
            $pecahkan = explode('-', $xtglmsk);
            $xtglmsk1=$pecahkan[0] . '-' . $pecahkan[1] . '-' . $pecahkan[2];
            $xtglklr=$brs1['tgl_keluar_kamar'];
            $pecahkan1 = explode('-', $xtglklr);
            $xtglklr1=$pecahkan1[0] . '-' . $pecahkan1[1] . '-' . $pecahkan1[2];

            $xkode_unit=$brs1['kode_unit'];
            $xkode_kelas=$brs1['kode_kelas'];
            $xno_rm1=$brs1['no_rm'];
            $xregisterdetailstatus=$brs1['xstatusnya'];
            $xidnya=$brs1['idnya'];

            //coba ambil ini $brs1['bagian'] dari register
            $xpelayanannya=$brs1['bagian'];

            if ($xpelayanannya=='JALAN'){
                $xtglklr=$brs1['tgl_masuk_kamar'];
                $pecahkan = explode('-', $xtglklr);
                $xtglklr1=$pecahkan[0] . '-' . $pecahkan[1] . '-' . $pecahkan[2];
            }
            
            if ($xtglklr1=='0000-00-00') {
                $xtglklr=date("Y-m-d");
                $pecahkan = explode('-', $xtglklr);
                $xtglklr1=$pecahkan[0] . '-' . $pecahkan[1] . '-' . $pecahkan[2];
            }

            $xnama_pasien = "";
            $xnama_unit = "";

            $xnotransaksi=$brs1['notransaksi'];
            $xno_transaksi_secondary=$brs1['no_transaksi_secondary'];

            //=======RAWAT INAP=======
            if ($xpelayanannya<>'JALAN' and $xnotransaksi==$xno_transaksi_secondary) {
                //*-------------------kamar perawatan
                $xjasas=0;
                $qry2=$this->db->query("SELECT * FROM mkamar WHERE kode_kamar = '".$xkode_kamar."' LIMIT 1");               
                foreach ($qry2->result_array() as $brs2) {
                    $xnama_kamar=$brs2['nama_kamar'];
                    $xjasas=$brs2['harga'];
                }
                $qry31=$this->db->query("SELECT * FROM munit WHERE kode_unit = '". $xkode_unit."' LIMIT 1");               
                foreach ($qry31->result_array() as $brs31) {
                    $xilahir=$brs31['ILAHIR'];
                    $xigd=$brs31['IGD'];
                }

                $xnotransaksi=$brs1['notransaksi'];
                $xnama_pasien=$brs1['nama_pasien'];
                $xtanggal=$brs1['tgl_masuk'];
                

                $xtgl_masuknya=$brs1['tgl_masuk_kamar'];

                if ($xregisterdetailstatus <> 0){
                    $qry19=$this->db->query("SELECT tgl_keluar_kamar,(tgl_keluar_kamar-tgl_masuk_kamar) as xqty FROM register_detail WHERE id='".$xidnya."'");
                    foreach ($qry19->result_array() as $brs19) {
                        $xqty=$brs19['xqty'];
                        $xtgl_keluarnya=$brs19['tgl_keluar_kamar'];                       
                    }  
                } else {    
                    $qry19=$this->db->query("SELECT (CURDATE()-tgl_masuk_kamar) as xqty FROM register_detail WHERE id='".$xidnya."'");
                    foreach ($qry19->result_array() as $brs19) {
                        $xqty=$brs19['xqty'];
                        $xtgl_keluarnya=date("Y-m-d");
                    }                  
                }
                
                $xket1=substr($xtgl_masuknya,8,2).'-'.substr($xtgl_masuknya,5,2).'-'.substr($xtgl_masuknya,0,4).' s/d '.substr($xtgl_keluarnya,8,2).'-'.substr($xtgl_keluarnya,5,2).'-'.substr($xtgl_keluarnya,0,4);

                if (($xilahir<>'1' or $xigd<>'1') and  $xqty==0) {$xqty=1;} 
                
                $totalbilling=$totalbilling+($xjasas*$xqty)
             
                
              


                //*-------------------visite
                //$qry2=$this->db->query("SELECT * FROM t_visite WHERE tanggal = '".$xkode_kelas."' ");
                
                $qry3=$this->db->query("select * from t_visite where tanggal>='".$xtglmsk."' and tanggal<='".$xtglklr."' and kode_unit='".$xkode_unit."' and notransaksi='".$xnotransaksi."' order by tanggal");
                // $qry3=$this->db->query("select * from t_visite where tanggal>='2018-05-21' and tanggal<='2018-05-21' and kode_unit='".$xkode_unit."' and notransaksi='".$xnotransaksi."' order by tanggal");
                //$qry3=$this->db->query("select * from t_visite where notransaksi='".$xnotransaksi."' and kode_unit='".$xkode_unit."' order by tanggal");
                
                foreach ($qry3->result_array() as $brs3) {
                    //$xnama_kelas=$brs3['nama_kelas'];  hA RUS DITAU NAMA KELASNYA UNTUK DIAMBIL BILAINYA
                    
                    $xnotransaksi=$brs3['notransaksi'];
                    $xtanggal=$brs3['tanggal'];
                    $xket1=$brs3['visite'];
                    $xqty2=1;
                    $xket2=$brs3['nama_dokter'];
                    $xkode2=1;
                    $xrincian='KUNJUNGAN DOKTER';
                    
                
                    //mencari nilai dari kunjungan dokter
                    
                    $xvis=0;
                    $xkds=0;
                    $xkdu=0;
                    $xkdc=0;
                    $xkdss=0;
                    $xkdi=0;

                    $qry31=$this->db->query("SELECT * FROM mkelas WHERE kode_kelas = '". $xkode_kelas."' LIMIT 1");
                    //$qry31=$this->db->query("SELECT * FROM mkelas WHERE kode_kelas = '02' LIMIT 1 ");
                    foreach ($qry31->result_array() as $brs31) {
                        //$xnama_kamar=$brs31['nama_kamar'];
                        $xvis=$brs31['vis'];
                        $xkds=$brs31['kds'];
                        $xkdu=$brs31['kdu'];
                        $xkdc=$brs31['kdc'];
                        $xkdss=$brs31['kdss'];
                        $xkdi=$brs31['kdi'];
                    }

                    //cari nilai kunjungan dokter...
                    
                    $xjasas=0;
                    
                    if($xket1=='VISITE') {$xjasas=$xvis;}
                    if($xket1=='KONSUL SPESIALIS') {$xjasas=$xkds;}
                    if($xket1=='DOKTER UGD') {$xjasas=$xkdi;}
                    if($xket1=='DOKTER UMUM') {$xjasas=$xkdu;}
                    if($xket1=='KONSUL SUB SPESIALIS') {$xjasas=$xkdss;}
                    if($xket1=='KONSUL CYTO-DOKTER IGD') {$xjasas=$xkdc;}
                /*
                    if($xket2=='VISITE') {$xjasas=100;}
                    if($xket2=='KONSUL SPESIALIS') {$xjasas=200;}
                    if($xket2=='DOKTER UGD') {$xjasas=80;}
                    if($xket2=='DOKTER UMUM') {$xjasas=90;}
                    if($xket2=='KONSUL SUB SPESIALIS') {$xjasas=200;}
                    if($xket2=='KONSUL CYTO-DOKTER IGD') {$xjasas=130;}
                    */
                    $data = array('no_rm'=>$xno_rm,
                                    'nama_pasien'=>$xnama_pasien,
                                    'tanggal'=>$xtanggal,
                                    'ket1'=>$xket1,
                                    'qty'=>$xqty2,
                                    'ket2'=>$xket2,
                                    'kode'=>$xkode2,
                                    'rincian'=>$xrincian,
                                    'jasas'=>$xjasas,
                                    'kode_unit'=>$xkode_unit,
                                    'nama_unit'=>$xnama_unit,
                                    'notransaksi'=>$xnotransaksi);
                    $this->db->insert('billing',$data);				
                } 

                //*-------------------tindakan keperawatan
                
                $qry4=$this->db->query("select * from ptindakanperawat where tanggal>='".$xtglmsk."' and tanggal<='".$xtglklr."' and kode_unit='".$xkode_unit."' and no_rm='".$xno_rm1."' order by tanggal");
                
                foreach ($qry4->result_array() as $brs4) {
                    
                    $xjasas=$brs4['jasas'];				
                    $xnotransaksi=$brs4['notransaksi'];
                    $xtanggal=$brs4['tanggal'];
                    $xket1=$brs4['tindakan'];
                    $xqty2=$brs4['qty'];
                    $xket2=$brs4['nama_dokter'];
                    $xkode2=2;
                    $xrincian1='TINDAKAN KEPERAWATAN';
                    $xjasas=$brs4['jasas'];
                    $xjasap=$brs4['jasap'];
                    $xnonasuransi=$brs4['nonasuransi'];
                    $xdiskon=$brs4['diskon'];

                
                    $data = array('no_rm'=>$xno_rm,
                                    'nama_pasien'=>$xnama_pasien,
                                    'tanggal'=>$xtanggal,
                                    'ket1'=>$xket1,
                                    'qty'=>$xqty2,
                                    'ket2'=>$xket2,
                                    'kode'=>$xkode2,
                                    'rincian'=>$xrincian1,
                                    'jasas'=>$xjasas,
                                    'jasap'=>$xjasap,
                                    'kode_unit'=>$xkode_unit,
                                    'nama_unit'=>$xnama_unit,
                                    'notransaksi'=>$xnotransaksi,
                                    'nonasuransi'=>$xnonasuransi,
                                    'diskon'=>$xdiskon);
                    $this->db->insert('billing',$data);	             			
                }		
            } else {

                //*-------------------tindakan poli                
                //$qry4=$this->db->query("select * from ptindakan where tanggal>='".$xtglmsk1."' and tanggal<='".$xtglklr1."' and kode_unit='".$xkode_unit."' and no_rm='".$xno_rm1."' order by tanggal");
                //diganti karena lebih mudah dgn nomor transaksi
                $qry4=$this->db->query("select * from ptindakan where (notransaksi='".$xnotransaksi."' or notransaksi='".$xno_transaksi_secondary."') and kode_unit='".$xkode_unit."' and no_rm='".$xno_rm1."' order by tanggal");
                
                foreach ($qry4->result_array() as $brs4) {
                    
                    $xjasas=$brs4['jasas'];				
                    //$xnotransaksi=$brs4['notransaksi']; diarahkan ke $xnotransaks1
                    $xtanggal=$brs4['tanggal'];
                    $xket1=$brs4['tindakan'];
                    $xqty2=$brs4['qty'];
                    $xket2=$brs4['nama_dokter'];
                    $xkode2=2;
                    $xrincian1='TINDAKAN';
                    $xjasas=$brs4['jasas'];
                    $xjasap=$brs4['jasap'];
                    $xnonasuransi=$brs4['nonasuransi'];


                    $xdiskon=$brs4['diskon']*($xjasas+$xjasap)/100;
                    $xnama_unit=$brs4['nama_unit'];

                
                    $data = array('no_rm'=>$xno_rm,
                                    'nama_pasien'=>$xnama_pasien,
                                    'tanggal'=>$xtanggal,
                                    'ket1'=>$xket1,
                                    'qty'=>$xqty2,
                                    'ket2'=>$xket2,
                                    'kode'=>$xkode2,
                                    'rincian'=>$xrincian1,
                                    'jasas'=>$xjasas,
                                    'jasap'=>$xjasap,
                                    'kode_unit'=>$xkode_unit,
                                    'nama_unit'=>$xnama_unit,
                                    'notransaksi'=>$xnotransaksi1,
                                    'nonasuransi'=>$xnonasuransi,
                                    'diskon'=>$xdiskon);
                    $this->db->insert('billing',$data);	             			
                }


            }

            // //*-------------------BHP
            // // 8 meret 2020 coba di hapus dulu ini karena pembacaannya dibuat secara keseluruhan saja
            // $qry6=$this->db->query("select * from pbhp where nonbill=0 and notransaksi='".$xnotransaksi."' and kode_unit='".$xkode_unit."' order by tanggal");

            // foreach ($qry6->result_array() as $brs6) {
            //     $xnotransaksi=$brs6['notransaksi'];
            //     $xtanggal=$brs6['tanggal'];
            //     $xket1=$brs6['namaobat'];
            //     $xqty2=$brs6['qty'];
            //     $xket2='' ;//$brs6['satuanpakai'];
            //     $xkode2=3;
            //     $xrincian1='PEMAKAIAN BHP';
            //     $xjasas=$brs6['hargapakai'];
            //     $xjasap=0;

            //     $data = array('no_rm'=>$xno_rm,
            //                     'nama_pasien'=>$xnama_pasien,
            //                     'tanggal'=>$xtanggal,
            //                     'ket1'=>$xket1,
            //                     'qty'=>$xqty2,
            //                     'ket2'=>$xket2,
            //                     'kode'=>$xkode2,
            //                     'rincian'=>$xrincian1,
            //                     'jasas'=>$xjasas,
            //                     'jasap'=>$xjasap,
            //                     'kode_unit'=>$xkode_unit,
            //                     'nama_unit'=>$xnama_unit,
            //                     'notransaksi'=>$xnotransaksi);
            //     $this->db->insert('billing',$data);
            // }      
                
            //*-------------------O2
            //$qry2=$this->db->query("SELECT * FROM t_visite WHERE tanggal = '".$xkode_kelas."' ");				
            $qry5=$this->db->query("select * from po2 where tgl_pakai>='".$xtglmsk."' and tgl_pakai<='".$xtglklr."' and kode_unit='".$xkode_unit."' and no_rm='".$xno_rm1."' order by tgl_pakai");
            
            foreach ($qry5->result_array() as $brs5) {
                $xnotransaksi=$brs5['notransaksi'];
                $xtanggal=$brs5['tgl_pakai'];
                $xket1='PEMAKAIAN O2';
                $xqty2=$brs5['qty'];
                $xket2='';
                $xkode2=4;
                $xrincian1='PEMAKAIAN O2';
                //ambil harga 02
                $xhargaO2=0;
                $qry31=$this->db->query("SELECT * FROM mharga02 LIMIT 1");
                foreach ($qry31->result_array() as $brs31) {
                    //$xnama_kamar=$brs31['nama_kamar'];
                    $xhargaO2=$brs31['liter'];
                }
                $xjasas=$xhargaO2;
                $xjasap=0;             
                $data = array('no_rm'=>$xno_rm,
                                'nama_pasien'=>$xnama_pasien,
                                'tanggal'=>$xtanggal,
                                'ket1'=>$xket1,
                                'qty'=>$xqty2,
                                'ket2'=>$xket2,
                                'kode'=>$xkode2,
                                'rincian'=>$xrincian1,
                                'jasas'=>$xjasas,
                                'jasap'=>$xjasap,
                                'kode_unit'=>$xkode_unit,
                                'nama_unit'=>$xnama_unit,
                                'notransaksi'=>$xnotransaksi);
                $this->db->insert('billing',$data);           				
            }		
          
            
        } //end billing process looping kamar
        	

        //*-------------------LABORATORIUM
        // $qry6=$this->db->query("select * from ptindakan_instalasi where tanggal>='".$xtglmsk1."' and tanggal<='".$xtglklr1."' and kode_unit='0301' and no_rm='".$xno_rm1."' order by tanggal");
        $qry6=$this->db->query("select * from ptindakan_instalasi where (notransaksi='".$xnotransaksi."' or notransaksi='".$xno_transaksi_secondary."') and kode_unit='LABS' and no_rm='".$xno_rm1."' order by tanggal");

        foreach ($qry6->result_array() as $brs6) {
            $xnotransaksi=$brs6['notransaksi'];
            $xnotransaksi_IN=$brs6['notransaksi_IN'];
            $xtanggal=$brs6['tanggal'];
            $xkode_tindakan=$brs6['tindakan'];
            $qry21=$this->db->query("SELECT * FROM mtindakan WHERE kode_tindakan = '".$xkode_tindakan."' LIMIT 1");
            $xtindakan='';
            foreach ($qry21->result_array() as $brs21) {
                $xtindakan=$brs21['tindakan'];
            }
            $nama_dokter_periksa1='';
            $qry22=$this->db->query("SELECT * FROM register_instalasi WHERE notransaksi_IN = '".$xnotransaksi_IN."' LIMIT 1");
            foreach ($qry22->result_array() as $brs22) {
                $nama_dokter_periksa1=$brs22['nama_dokter_periksa'];
                $nama_dokter_pemesan=$brs22['nama_dokter'];
                $nama_unit_pemesan=$brs22['nama_unitR'];
            }

            $xket1=strtoupper($xtindakan);
            $xqty2=$brs6['qty'];
            $xket2=$nama_dokter_periksa1;
            $xkode2=5;
            $xrincian1='LABORATORIUM';
            $xjasas=$brs6['jasas'];
            $xjasap=$brs6['jasap'];
            $kdun=$brs6['kode_unit'];
            $xnonasuransi=$brs6['nonasuransi'];
            $xdiskon=$brs6['diskon']*($xjasas+$xjasap)/100;


            $data = array('no_rm'=>$xno_rm,
                            'nama_pasien'=>$xnama_pasien,
                            'tanggal'=>$xtanggal,
                            'ket1'=>$xket1,
                            'qty'=>$xqty2,
                            'ket2'=>$xket2,
                            'ket3'=>$nama_unit_pemesan,
                            'ket4'=>$xnotransaksi_IN,
                            'kode'=>$xkode2,
                            'rincian'=>$xrincian1,
                            'jasas'=>$xjasas,
                            'jasap'=>$xjasap,
                            'kode_unit'=>$kdun,
                            'nama_unit'=>$xrincian1, 
                            'notransaksi'=>$xnotransaksi,
                            'nonasuransi'=>$xnonasuransi,
                            'diskon'=>$xdiskon);
            $this->db->insert('billing',$data);
        }

        //*-------------------RADIOLOGI
        $qry7=$this->db->query("select * from ptindakan_instalasi where (notransaksi='".$xnotransaksi."' or notransaksi='".$xno_transaksi_secondary."') and kode_unit='RDLG' and no_rm='".$xno_rm1."' order by tanggal");
        foreach ($qry7->result_array() as $brs7) {
            $xnotransaksi=$brs7['notransaksi'];
            $xnotransaksi_IN=$brs7['notransaksi_IN'];
            $xtanggal=$brs7['tanggal'];
            $xkode_tindakan=$brs7['tindakan'];
            $qry21=$this->db->query("SELECT * FROM mtindakan WHERE kode_tindakan = '".$xkode_tindakan."' LIMIT 1");
            foreach ($qry21->result_array() as $brs21) {
                $xtindakan=$brs21['tindakan'];
            }
            $nama_dokter_periksa1='';
            $qry22=$this->db->query("SELECT * FROM register_instalasi WHERE notransaksi_IN = '".$xnotransaksi_IN."' LIMIT 1");
            foreach ($qry22->result_array() as $brs22) {
                $nama_dokter_periksa1=$brs22['nama_dokter_periksa'];
                $nama_dokter_pemesan=$brs22['nama_dokter'];
                $nama_unit_pemesan=$brs22['nama_unitR'];
            }

            $xket1=$xtindakan;
            $xqty2=$brs7['qty'];
            $xket2=$nama_dokter_periksa1;
            $xkode2=6;
            $xrincian1='RADIOLOGI';
            $xjasas=$brs7['jasas'];
            $xjasap=$brs7['jasap'];
            $kdun=$brs7['kode_unit'];
            $xnonasuransi=$brs7['nonasuransi'];
            $xdiskon=$brs7['diskon']*($xjasas+$xjasap)/100;

            $data = array('no_rm'=>$xno_rm,
                            'nama_pasien'=>$xnama_pasien,
                            'tanggal'=>$xtanggal,
                            'ket1'=>$xket1,
                            'qty'=>$xqty2,
                            'ket2'=>$xket2,
                            'ket3'=>$nama_unit_pemesan,
                            'ket4'=>$xnotransaksi_IN,
                            'kode'=>$xkode2,
                            'rincian'=>$xrincian1,
                            'jasas'=>$xjasas,
                            'jasap'=>$xjasap,
                            'kode_unit'=>$kdun,
                            'nama_unit'=>$xrincian1,
                            'notransaksi'=>$xnotransaksi,
                            'nonasuransi'=>$xnonasuransi,
                            'diskon'=>$xdiskon);
            $this->db->insert('billing',$data);
        }


        
        //*-------------------TINDAKAN BANK DARAH ????????????????????????????????
        //$qry2=$this->db->query("SELECT * FROM t_visite WHERE tanggal = '".$xkode_kelas."' ");
        $qry7=$this->db->query("select * from ptindakan_instalasi where tanggal>='".$xtglmsk."' and tanggal<='".$xtglklr."' and kode_unit='DARAH' and no_rm='".$xno_rm1."' order by tanggal");

        foreach ($qry7->result_array() as $brs7) {
            $xnotransaksi=$brs7['notransaksi'];
            $xtanggal=$brs7['tanggal'];
            $xket1=$brs7['tindakan'];
            $xqty2=$brs7['qty'];
            $xket2='';
            $xkode2=7;
            $xrincian1='UTDRS';
            $xjasas=$brs7['jasas'];
            $xjasap=$brs7['jasap'];
            $xnonasuransi=$brs7['nonasuransi'];
            $xdiskon=$brs7['diskon']*($xjasas+$xjasap)/100;
            $data = array('no_rm'=>$xno_rm,
                            'nama_pasien'=>$xnama_pasien,
                            'tanggal'=>$xtanggal,
                            'ket1'=>$xket1,
                            'qty'=>$xqty2,
                            'ket2'=>$xket2,
                            'kode'=>$xkode2,
                            'rincian'=>$xrincian1,
                            'jasas'=>$xjasas,
                            'jasap'=>$xjasap,
                            'kode_unit'=>$xkode_unit,
                            'nama_unit'=>$xnama_unit,
                            'notransaksi'=>$xnotransaksi,
                            'nonasuransi'=>$xnonasuransi,
                            'diskon'=>$xdiskon);
            $this->db->insert('billing',$data);
        }



        //*-------------------HEMODIALISA
        $qry7=$this->db->query("select * from ptindakan_instalasi where tanggal>='".$xtglmsk1."' and tanggal<='".$xtglklr1."' and kode_unit='0314' and no_rm='".$xno_rm1."' order by tanggal");
        foreach ($qry7->result_array() as $brs7) {
            $xnotransaksi=$brs7['notransaksi'];
            $xnotransaksi_IN=$brs7['notransaksi_IN'];
            $xtanggal=$brs7['tanggal'];
            $xkode_tindakan=$brs7['tindakan'];
            $qry21=$this->db->query("SELECT * FROM mtindakan WHERE kode_tindakan = '".$xkode_tindakan."' LIMIT 1");
            foreach ($qry21->result_array() as $brs21) {
                $xtindakan=$brs21['tindakan'];
            }
            $nama_dokter_periksa1='';
            $qry22=$this->db->query("SELECT * FROM register_instalasi WHERE notransaksi_IN = '".$xnotransaksi_IN."' LIMIT 1");
            foreach ($qry22->result_array() as $brs22) {
                $nama_dokter_periksa1=$brs22['nama_dokter_periksa'];
            }

            $xket1=$xtindakan;
            $xqty2=$brs7['qty'];
            $xket2=$nama_dokter_periksa1;
            $xkode2=8;
            $xrincian1='HEMODIALISA';
            $xjasas=$brs7['jasas'];
            $xjasap=$brs7['jasap'];
            $kdun=$brs7['kode_unit'];
            $xnonasuransi=$brs7['nonasuransi'];
            $xdiskon=$brs7['diskon']*($xjasas+$xjasap)/100;

            $data = array('no_rm'=>$xno_rm,
                            'nama_pasien'=>$xnama_pasien,
                            'tanggal'=>$xtanggal,
                            'ket1'=>$xket1,
                            'qty'=>$xqty2,
                            'ket2'=>$xket2,
                            'kode'=>$xkode2,
                            'rincian'=>$xrincian1,
                            'jasas'=>$xjasas,
                            'jasap'=>$xjasap,
                            'kode_unit'=>$kdun,
                            'nama_unit'=>$xrincian1,
                            'notransaksi'=>$xnotransaksi,
                            'nonasuransi'=>$xnonasuransi,
                            'diskon'=>$xdiskon);
            $this->db->insert('billing',$data);
        }


        //*-------------------KAMAR OPERASI 
        
        
        // //*--ruang operasi ---> ruamg operasi diahapus krn thn 2017 dipakai skrg tidak
        // $xadaoperasi=0;
        // $qry71=$this->db->query("select * from register_instalasi where tanggal>='".$xtglmsk."' and tanggal<='".$xtglklr."' and kode_unit='0313' and no_rm='".$xno_rm1."' and notransaksi='".$xnotransaksi."' order by tanggal");
        // foreach ($qry71->result_array() as $brs71) {
        //     $xadaoperasi=1;
        //     //ambil harga kamar iperasi
        //     $hargakamaroperasi=1200000;
        //     //masukkan penggunaan kamar operasi
        //    //*-------------------kamar perawatan
        //    $xnotransaksi=$brs71['notransaksi'];
        //    $xnama_pasien=$brs71['nama_pasien'];
        //    $xtanggal=$brs71['tanggal'];
           
          
        //    $xket1=$brs71['tanggal'];
           
        //    $xqty=1;               
        //    $xket2='Opr';
        //    $xkode=0;
        //    $xrincian='KAMAR OPERASI';
        //    $xnama_unit=$brs71['nama_unit'];
           
        //    $data = array('no_rm'=>$xno_rm,
        //                    'nama_pasien'=>$xnama_pasien,
        //                    'tanggal'=>$xtanggal,
        //                    'ket1'=>$xket1,
        //                    'qty'=>$xqty,
        //                    'ket2'=>$xket2,
        //                    'kode'=>$xkode,
        //                    'rincian'=>$xrincian,
        //                    'jasas'=>$hargakamaroperasi,
        //                    'kode_unit'=>$xkode_unit,
        //                    'nama_unit'=>$xnama_unit,
        //                    'notransaksi'=>$xnotransaksi);
        //    $this->db->insert('billing',$data);              
        // }

        //tindakan kamar operasi
        // $qry72=$this->db->query("select * from ptindakanopr where tgl_periksa>='".$xtglmsk."' and tgl_periksa<='".$xtglklr."' and no_rm='".$xno_rm1."' and notransaksi='".$xnotransaksi."' order by tgl_periksa ");
        $qry72=$this->db->query("select * from ptindakanopr where no_rm='".$xno_rm1."' and notransaksi='".$xnotransaksi."' order by tgl_periksa ");
        foreach ($qry72->result_array() as $brs72) {
            $xnotransaksi=$brs72['notransaksi'];
            $xtanggal=$brs72['tgl_periksa'];
            $kode_tindakan=$brs72['tindakan'];
            $xket1='';
            $qry2=$this->db->query("SELECT tindakan FROM mtindakan WHERE kode_tindakan = '".$kode_tindakan."' LIMIT 1");          
            foreach ($qry2->result_array() as $brs2) {
                $xket1=$brs2['tindakan'];
            }
            $xqty2=1;
            $xket2=$brs72['nama_dokter'];
            $xkode2=9;
            $xrincian1='KAMAR OPERASI';
            $xjasas=$brs72['jasas'];
            $xjasap=$brs72['jasap'];
            $xkode_unit=$brs72['kode_unit'];
            $xnama_unit=$brs72['nama_unit'];
            $xdiskon=$brs72['diskon']*($xjasas+$xjasap)/100;
            $data = array('no_rm'=>$xno_rm,
                            'nama_pasien'=>$xnama_pasien,
                            'tanggal'=>$xtanggal,
                            'ket1'=>$xket1,
                            'qty'=>$xqty2,
                            'ket2'=>$xket2,
                            'kode'=>$xkode2,
                            'rincian'=>$xrincian1,
                            'jasas'=>$xjasas,
                            'jasap'=>$xjasap,
                            'kode_unit'=>$xkode_unit,
                            'nama_unit'=>$xnama_unit,
                            'notransaksi'=>$xnotransaksi,
                            'nonasuransi'=>$xnonasuransi,
                            'diskon'=>$xdiskon);
            $this->db->insert('billing',$data);
        }

         //*-------------------BHP KESELURUHAN
            // $xkode_unitcek='0313';
            // $qry6=$this->db->query("select * from pbhp where notransaksi='".$xnotransaksi."' and kode_unit='".$xkode_unitcek."' order by tanggal");
            // 8 maret 2020 dibuka secara keseluruhan untuk penggabungan satu kali baca
            $qry6=$this->db->query("select * from pbhp where nonbill=0 and notransaksi='".$xnotransaksi."' order by tanggal");
            

            foreach ($qry6->result_array() as $brs6) {
                $xnotransaksi=$brs6['notransaksi'];
                $xtanggal=$brs6['tanggal'];
                $xket1=$brs6['namaobat'];
                $xqty2=$brs6['qty'];
                $xket2='' ;//$brs6['satuanpakai'];
                $xkode2=3;
                $xrincian1='PEMAKAIAN BHP';
                $xjasas=$brs6['hargapakai'];
                $xjasap=0;
                $xkode_unit_all=$brs6['kode_unit'];
                $xnama_unit_all=$brs6['nama_unit'];

                $data = array('no_rm'=>$xno_rm,
                                'nama_pasien'=>$xnama_pasien,
                                'tanggal'=>$xtanggal,
                                'ket1'=>$xket1,
                                'qty'=>$xqty2,
                                'ket2'=>$xket2,
                                'kode'=>$xkode2,
                                'rincian'=>$xrincian1,
                                'jasas'=>$xjasas,
                                'jasap'=>$xjasap,
                                'kode_unit'=>$xkode_unit_all,
                                'nama_unit'=>$xnama_unit_all,
                                'notransaksi'=>$xnotransaksi);
                $this->db->insert('billing',$data);
            }      

        //*-------------------APOTIK
        $qry8=$this->db->query("select * from resep_header where tglresep>='".$xtglmsk1."' and tglresep<='".$xtglklr1."' and no_rm='".$xno_rm1."' order by tglresep,noresep ");
        foreach ($qry8->result_array() as $brs8) {
            $xnoresep=$brs8['noresep'];
            $xtanggal=$brs8['tglresep'];
            $xket1=$brs8['noresep'];
            $xqty2=1;
            $xket2=$brs8['nama_dokter'];
            $xkode2=12;
            $xrincian1='APOTIK';
            $xkode_unit=$brs8['kode_depo'];
            // $xnama_unit=$brs8['nama_depo'];
            $xnama_unit='APOTIK FARMASI';
            //--hitung jumlah nilai obat dan r
            $qry24=$this->db->query("SELECT sum(qty*hargapakai) as xjumhrg,sum(tuslag) as xjumr FROM resep_detail WHERE noresep = '".$xnoresep."' group by noresep ");
            foreach ($qry24->result_array() as $brs24) {
                $xjasas=$brs24['xjumhrg'];
                $xjasap=$brs24['xjumr'];
            }


            $data = array('no_rm'=>$xno_rm,
                            'nama_pasien'=>$xnama_pasien,
                            'tanggal'=>$xtanggal,
                            'ket1'=>$xket1,
                            'qty'=>$xqty2,
                            'ket2'=>$xket2,
                            'kode'=>$xkode2,
                            'rincian'=>$xrincian1,
                            'jasas'=>$xjasas,
                            'jasap'=>$xjasap,
                            'kode_unit'=>$xkode_unit,
                            'nama_unit'=>$xnama_unit,
                            'notransaksi'=>$xnotransaksi);
            $this->db->insert('billing',$data);
        }

        //-------------------Administrasi Loket
        
        $qry2=$this->db->query("SELECT tgl_keluar FROM register WHERE notransaksi = '".$xnotransaksi1."' LIMIT 1");          
            foreach ($qry2->result_array() as $brs2) {
                $xtgl_keluar_rs=$brs2['tgl_keluar'];
            }
            $xtanggal=$xtgl_keluar_rs;

            if ($xtanggal == '0000-00-00'){ 
                // ambil tgl terakhir billing
                $qry25=$this->db->query("SELECT tanggal FROM billing WHERE notransaksi = '".$xnotransaksi1."' order by tanggal desc LIMIT 1");          
                foreach ($qry25->result_array() as $brs25) {
                    $xtgl_nya=$brs25['tanggal'];
                }
                $xtanggal=$xtgl_nya; 
            }
            
            
            $xket1='Administrasi Loket';
            $xqty2=1;
            $xket2='';
            $xkode2=99;
            $xrincian1='Loket';
            $xjasas=0;

            if ($xpelayanannya=='JALAN'){ $xid=2; } else  { $xid=1; }


            $qry27=$this->db->query("SELECT * FROM madminloket where id=".$xid." Limit 1");
            foreach ($qry27->result_array() as $brs27) {
                $xtarifloket=$brs27['tarif'];
            }        
            $xjasas=$xtarifloket;
            $xjasap=0;
            $xkode_unit='';
            $xnama_unit='Administrasi RJ/RI';

            $data = array('no_rm'=>$xno_rm,
                            'nama_pasien'=>$xnama_pasien,
                            'tanggal'=>$xtanggal,
                            'ket1'=>$xket1,
                            'qty'=>$xqty2,
                            'ket2'=>$xket2,
                            'kode'=>$xkode2,
                            'rincian'=>$xrincian1,
                            'jasas'=>$xjasas,
                            'jasap'=>$xjasap,
                            'kode_unit'=>$xkode_unit,
                            'nama_unit'=>$xnama_unit,
                            'notransaksi'=>$xnotransaksi1);
            $this->db->insert('billing',$data);
        
        //masukkan non asuransi untuk semua yg golongan umum
        // if ($xgolongannya == "UMUM      ") {
        if ($xgolongannya == "UMUM") {
            $qry1=$this->db->query("update billing set nonasuransi='1' where notransaksi='".$xnotransaksi1."' AND no_rm='".$xno_rm."'");
            //$qry1=$this->db->query("update billing set nonasuransi='1'");
        }

    
            // $qry1=$this->db->query("update billing set nonasuransi='1'");
    

        //hitung total billing
        $qry21 = $this->db->query("SELECT sum(jasas*qty) as jumbil from billing WHERE notransaksi = '".$xnotransaksi1."' LIMIT 1 ");
        $qry21row = $qry21->row();
        if ($qry21row->jumbil == null) { $xtotalbillling = 0; } else { $xtotalbillling = $qry21row->jumbil; }

        //hitung total asuransi
        $qry22 = $this->db->query("SELECT sum(jasas*qty) as jumbil from billing WHERE notransaksi = '".$xnotransaksi1."' AND nonasuransi = 0 LIMIT 1 ");
        $qry22row = $qry22->row();
        if ($qry22row->jumbil == null) { $xtotalbilllingasuransi = 0; } else { $xtotalbilllingasuransi = $qry22row->jumbil; }

        //hitung total nonasuransi
        $qry23 = $this->db->query("SELECT sum(jasas*qty) as jumbil from billing WHERE notransaksi = '".$xnotransaksi1."' AND nonasuransi = 1 LIMIT 1 ");
        $qry23row = $qry23->row();
        if ($qry23row->jumbil == null) { $xtotalbilllingnonasuransi = 0; } else { $xtotalbilllingnonasuransi = $qry23row->jumbil; }
        
        // get golongan
        $qry24 = $this->db->query("SELECT asuransi, golongan from register WHERE notransaksi = '".$xnotransaksi1."' LIMIT 1");
        $qry24row = $qry24->row();
        $xgolongan = $qry24row->golongan;

        $tanggungasuransi = 0;
        if ($xgolongan == 'BPJS') { $tanggungasuransi = $xtotalbillling; } else { $tanggungasuransi = $xtotalbilllingasuransi; }
        // $sisabayar = $xtotalbillling - $tanggungasuransi;

        return array($xtotalbilllingnonasuransi, $xtotalbillling, $tanggungasuransi);
        //end billing process END