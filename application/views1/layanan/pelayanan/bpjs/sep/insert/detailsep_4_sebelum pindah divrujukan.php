<main>
		<div class="card mt-4">
            <div class="card-body">
                    <div class="box-header with-border">
                        <h4 class="box-title">Surat Eligibilitas Peserta</h4>
                    </div>
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
                            <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><label class="pull-right" style="font-size:larger" id="lblnosep"></label> </h3>
                                        <label class="pull-right" style="font-size:larger" id="lbljenpel"></label>
                                        <input type="hidden" id="txtjenpel" />
                                    </div>
                                    <form class="form-horizontal" id="theform">
                                        <input type="hidden" id="txtprsklaimsep"/>
                                        <div class="box-body">
                                            <div>
                                                <label style="color:red;font-size:small">* Wajib Diisi</label>
                                            </div>
                                            <div class="form-group row" id="divPoli">
                                                <div class="col-md-2">
                                                    <label class="control-label  col-form-label ">Spesialis/SubSpesialis <label style="color:red;font-size:small">*</label></label>
                                                </div>
                                                    <div class="col-md-2  col-form-label ">
                                                        <input type="checkbox" id="chkpoliesekutif" name="chkpoliesekutif"> Eksekutif
                                                    </div>    
                                                    <div class="col-md-7">
                                                        <select class="form-control"name="txtnmpoli" id="txtnmpoli">
                                                        </select>
                                                    </div>    
                                                    <input type="hidden" class="form-control" id="txtkdpoli">
                                            </div>
                                            <?php
                                            if ($cetakan == null) {
                                            } else if ((int)$cetakan[0]->cetakan != 1) {
                                            ?>
                                                <div class="form-group">
                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">No. Surat Kontrol/SKDP <label style="color:red;font-size:small">*</label></label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" class="form-control" id="txtnoskdp" name="txtnoskdp" placeholder="ketik nomor Surat" maxlength="25">
                                                    </div>
                                                </div>
                                                <div class="form-group" id="divDPJP">
                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">DPJP Pemberi Surat SKDP/SPRI<label style="color:red;font-size:small">*</label></label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select class="form-control" style="width: 100%;" name="txtnmdpjp" id="txtnmdpjp">
                                                        </select>
                                                    </div>
                                                </div>
                                            <?php
                                            } 
                                            ?>
                                            <div id="divRujukan">
                                                <?php
                                                if ($viewrujukan != null) {
                                                    echo $viewrujukan;
                                                }
                                                ?>
                                            </div>
                                            <div>
                                                <?php
                                                if ($additional != null) {
                                                    echo $additional;
                                                }
                                                ?>
                                            </div>
                                            <!-- kontrol -->
                                            <div id="divkontrol">
                                                
                                            </div>
                                            <!-- end kontrol -->
                                            <div class="clearfix"></div>
                                            <!-- sep -->
                                            <div class="form-group">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label"><label style="color:gray;font-size:x-small">(yyyy-mm-dd)</label>  Tgl. SEP</label>
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <div class='input-group date'>
                                                        <input type='text' class="form-control datepicker" id="txttglsepkode" placeholder="yyyy-MM-dd" maxlength="10" value="<?php echo $txtTanggal?>" disabled />
                                                        <input type="hidden" id="txttglsep" name="txttglsep" value="<?php echo $txtTanggal?>" />
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-calendar">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">No. MR <label style="color:red;font-size:small">*</label></label>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="txtnomr" id="txtnomr" placeholder="ketik nomor MR" maxlength="10" value="<?php echo $peserta['peserta']['mr']['noMR']?>">
                                                        <span class="input-group-addon">
                                                            <label><input type="checkbox" id="chkCOB" name="chkCOB" disabled> Peserta COB</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="divkelasrawat">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Diagnosa <label style="color:red;font-size:small">*</label></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <select class="form-control" style="width: 100%;" name="txtnmdiagnosa" id="txtnmdiagnosa">
                                                    </select>
                                                    <label id="lblDxSpesialistik" style="color:red"></label>
                                                    <input type="hidden" class="form-control" id="txtkddiagnosa">
                                                </div>
                                            </div>
                                            
                                            <?php 
                                            $this->load->view('layanan/pelayanan/bpjs/sep/insert/formkatarak');
                                            ?>

                                            <div class="form-group">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">No. Telepon <label style="color:red;font-size:small">*</label></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" class="form-control" id="txtnotelp" name="txtnotelp" placeholder="ketik nomor telepon yang dapat dihubungi"
                                                        onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="15" value="<?php echo $peserta['peserta']['mr']['noTelepon']?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Catatan</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <textarea class="form-control" id="txtcatatan" name="txtcatatan" rows="2" placeholder="ketik catatan apabila ada"></textarea>
                                                </div>
                                            </div>
                                            <div id="divkatarak">
                                                
                                            </div>

                                            <!--  lakalantas-->
                                            <div class="form-group">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Status Kecelakaan <label style="color:red;font-size:small">*</label></label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <select class="form-control " id="cbstatuskll" name="cbstatuskll" onchange="jaminan()">
                                                        <option value="">-- Silahkan Pilih --</option>
                                                        <option value="0" title="Kasus bukan akibat kecelakaan lalu lintas dan kerja">Bukan Kecelakaan</option>
                                                        <option value="1" title="Kasus KLL Tidak Berhubungan dengan Pekerjaan">Kecelakaan LaluLintas dan Bukan Kecelakaan Kerja</option>
                                                        <option value="2" 
                                                                title="1).Kasus KLL Berhubungan dengan Pekerjaan. 2).Kasus KLL Berangkat dari Rumah menuju tempat Kerja. 3).Kasus KLL Berangkat dari tempat Kerja menuju rumah.">Kecelakaan LaluLintas dan Kecelakaan Kerja</option>
                                                        <option value="3" 
                                                                title="1).Kasus Kecelakaan Berhubungan dengan pekerjaan. 2).Kasus terjadi di tempat kerja.Kasus terjadi pada saat kerja.">Kecelakaan Kerja</option>
                                                    </select>
                                                    
                                                </div>                                
                                            </div>

                                            <div id="divJaminanHistori">
                                            </div>
                                            <div id="divJaminan">                       
                                            </div>
                                            <!-- end lakalantas-->
                                            
                                        </div>
                                        <div class="box-footer">
                                            <div id="divSimpan">
                                                <button type="button" id="btnSimpan" onclick="submitinsertSEP()" class="btn btn-success pull-left"><i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                            <!-- <div id="divEditSEP">
                                                <button type="button" id="btnEdit" class="btn btn-info pull-left col-md-1 col-sm-1 col-xs-12">Edit</button>
                                                <button type="button" id="btnHapus" class="btn btn-danger pull-left col-md-1 col-sm-1 col-xs-12">Hapus</button>
                                                <button type="button" id="btnCetak" class="btn btn-warning pull-left col-md-1 col-sm-1 col-xs-12">Cetak</button>
                                            </div> -->
                                            <!-- <button type="button" id="btnBatal" class="btn btn-danger pull-right">Batal</button> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

</main>


<script>
    $(document).ready(function(){
        bagiandetailinsert()
    });
</script>