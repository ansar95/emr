<main>

    <section class="content col-12">
        <div class="card mt-2">    
            <div class="card-body">
                <div class="box-header with-border">
                    <h4 class="box-title">Surat Eligibilitas Peserta</h4>
                </div>
                <div class="box-body">
                    <div id="divDetail">
                        <div class="row spacing-row">
                            <div class="col-md-3">
                                <!-- Profile Image -->
                                <div class="box box-widget widget-user-2">
                                    <div class="widget-user-header bg-aqua-active">
                                        <div class="widget-user-image">
                                            <?php 
                                            if ($peserta["peserta"]["sex"] == "P") {
                                            ?>
                                            <!-- <img class="img-circle" src="/VClaim/image/female.png" alt="User Avatar" id="imgFemale"> -->
                                            <?php 
                                            } else {
                                            ?>
                                            <!-- <img class="img-circle" src="/VClaim/image/male.png" alt="User Avatar" id="imgMale"> -->
                                            <?php 
                                            }
                                            ?>
                                        </div>
                                        <h6 class="widget-user-username" id="lblnama"><?php echo $peserta["peserta"]["nama"]?></h6>
                                        <h6 class="widget-user-desc" id="lblnoka"><?php echo $peserta["peserta"]["noKartu"]?></h6>
                                        <input type="hidden" id="txtkelamin" value="<?php echo $peserta['peserta']['sex']?>"/>
                                        <input type="hidden" id="txtkdstatuspst" value="<?php echo $peserta['peserta']['statusPeserta']['keterangan']?>"/>

                                    </div>

                                    
                                    <!-- /.box-body -->
                                    

                                    <!-- /.box -->
                                    <!-- About Me Box -->
                                    
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a title="Profile Peserta" href="#tab_1" data-toggle="tab"><span class="fa fa-user"></span></a></li>
                                                <li><a href="#tab_2" title="COB" data-toggle="tab"><span class="fa fa-building"></span></a></li>
                                                <li><a href="#tab_3" title="Histori" data-toggle="tab" id="tabHistori"><span class="fa fa-list"></span></a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_1">
                                                    <ul class="list-group list-group-unbordered">
                                                        <li class="list-group-item">
                                                            <span class="fa fa-sort-numeric-asc"></span> <a title="NIK" class="pull-right-container" id="lblnik"><?php echo $peserta["peserta"]["nik"]?></a>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span class="fa fa-credit-card"></span> <a title="No.Kartu Bapel JKK" class="pull-right-container" id="lblnokartubapel">NOKARTUBAPEL</a>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span class="fa fa-calendar"></span> <a title="Tanggal Lahir" class="pull-right-container" id="lbltgllahir"><?php echo $peserta["peserta"]["tglLahir"]?></a>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span class="fa fa-user"></span> <a title="PISA" class="pull-right-container" id="lblpisa"><?php echo $peserta["peserta"]["pisa"]?></a>
                                                        </li>

                                                        <li class="list-group-item">
                                                            <span class="fa fa-hospital-o"></span> <a title="Hak Kelas Rawat" class="pull-right-container" id="lblhakkelas"><?php echo $peserta["peserta"]["hakKelas"]["keterangan"]?></a>
                                                            <input type="hidden" id="txtpisa" name="txtpisa" value="<?php echo $peserta['peserta']['pisa']?>" />
                                                            <input type="hidden" id="txtkdklspst" name="txtkdklspst" value="<?php echo $peserta['peserta']['hakKelas']['kode']?>"/>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span class="fa fa-stethoscope"></span>  <a title="Faskes Tingkat 1" class="pull-right-container" id="lblfktp">fktp</a>
                                                            <input type="hidden" id="txtppkasalpst" />
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span class="fa fa-calendar"></span>  <a title="TMT dan TAT Peserta" class="pull-right-container" id="lbltmt_tat">tmt/tat</a>
                                                            <input id="txttmtpst" type="hidden" />
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span class="fa fa-calendar"></span>  <a title="Jenis Peserta" class="pull-right-container" id="lblpeserta"><?php echo $peserta["peserta"]["jenisPeserta"]["keterangan"]?></a>
                                                            <input type="hidden" id="txtjnspst" />
                                                        </li>

                                                    </ul>
                                                </div>
                                                <!-- /.tab-pane -->
                                                <div class="tab-pane" id="tab_2">
                                                    <ul class="list-group list-group-unbordered">
                                                        <li class="list-group-item">
                                                            <span class="fa fa-sort-numeric-asc"></span> <a title="No. Asuransi" class="pull-right-container" id="lblnoasu">Asuransi</a>
                                                            <input type="hidden" id="txtkdasu" />
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span class="fa fa-windows"></span> <a title="Nama Asuransi" class="pull-right-container" id="lblnmasu">Nama Asuransi</a>

                                                        </li>
                                                        <li class="list-group-item">
                                                            <span class="fa fa-calendar"></span> <a title="TMT dan TAT Asuransi" class="pull-right-container" id="lbltmt_tatasu">TMT/TAT</a>
                                                            <input type="hidden" id="txttmtasu" />
                                                            <input type="hidden" id="txttatasu" />
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span class="fa fa-bank"></span> <a title="Nama Badan Usaha" class="pull-right-container" id="lblnamabu">Nama BU</a>
                                                            <input type="hidden" id="txtkdbu" />
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane" id="tab_3">
                                                    <div id="divHistori" class="list-group">
                                                    </div>
                                                    <div>
                                                        <button type="button" id="btnHistori" class="btn btn-xs btn-default btn-block"><span class="fa fa-cubes"></span> Histori</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.tab-content -->
                                        </div>
                                        <div id="divriwayatKK">
                                            <button type="button" id="btnRiwayatKK" class="btn btn-danger btn-block"><span class="fa fa-th-list"></span> Pasien Memiliki Riwayat KLL/KK/PAK <br /><i>(klik lihat data)</i></button>
                                        </div>

                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                            <div class="col-md-9">
                                7371122501700005
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </section>

</main>


<script>
    $(document).ready(function(){
        bagiandetailinsert()
    });
</script>