<?php 
if ($form == 0) {
?>
<div class="col-sm-12">
    <form class="form-horizontal" id="theform">
        <input type="hidden" id="nosep" name="nosep" value="<?php echo $hasil['noRujukan'] ?>"/>
        <div class="box-body">
            <div>
                <label style="color:red;font-size:small">* Wajib Diisi</label>
            </div>
            <div class="form-group" id="divPoli">
                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Spesialis/SubSpesialis <label style="color:red;font-size:small">*</label></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <label><input type="checkbox" id="chkpoliesekutif" name="chkpoliesekutif"> Eksekutif</label>
                        </span>
                        <input type='text' class="form-control datepicker" id="txttglsepkode" maxlength="10" value="<?php echo $hasil['poli']?>" disabled />
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 control-label"><label style="color:gray;font-size:x-small">(yyyy-mm-dd)</label>  Tgl. SEP</label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class='input-group date'>
                        <input type='text' class="form-control datepicker" id="txttglsepkode" maxlength="10" value="<?php echo $hasil['tglSep']?>" disabled />
                        <input type="hidden" id="txttglsep" name="txttglsep" value="" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 control-label">No. MR <label style="color:red;font-size:small">*</label></label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="input-group">
                        <input type="text" class="form-control" name="txtnomr" id="txtnomr" placeholder="ketik nomor MR" maxlength="10" value="<?php echo $hasil['peserta']['noMr']?>">
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
                    <input type="hidden" class="form-control" id="txtkddiagnosa" value="<?php echo $rujukan['rujukan']['diagnosa']['kode']?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 control-label">No. Telepon <label style="color:red;font-size:small">*</label></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" id="txtnotelp" name="txtnotelp" maxlength="15" value="<?php echo $rujukan['rujukan']['peserta']['mr']['noTelepon']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Catatan</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <textarea class="form-control" id="txtcatatan" name="txtcatatan" rows="2" placeholder="ketik catatan apabila ada"><?php echo $hasil['catatan']?></textarea>
                </div>
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
    </form>
    <div class="box-footer text-right">
        <div id="divEditSEP">
            <a onclick="submitupdateSEPUGD()" class="btn-sm btn-warning btn-flat">Ubah</i></a>
            <a onclick="panggilHapusSep('<?php echo $hasil['noSep'];?>');" class="btn-sm btn-danger btn-flat">Hapus</i></a>
            <a onclick="panggilCetakSep('<?php echo $hasil['noSep'];?>');" class="btn-sm btn-success btn-flat">Cetak</i></a>
        </div>
        <!-- <button type="button" id="btnBatal" class="btn btn-danger pull-right">Batal</button> -->
    </div>
</div>

<script>

    $(document).ready(function(){
        forFormDetail("<?php echo $rujukan['rujukan']['diagnosa']['nama']?>")
    });

</script>
<?php
} else {
?>
<div class="col-sm-12">
    <form class="form-horizontal" id="theform">
        <input type="hidden" id="nosep" name="nosep" value="<?php echo $hasil['noRujukan'] ?>"/>
        <div class="box-body">
            <div>
                <label style="color:red;font-size:small">* Wajib Diisi</label>
            </div>
            <div id="divRujukan">
                <?php
                if ($viewrujukan != null) {
                    echo $viewrujukan;
                }
                ?>
            </div>
            <div id="divkontrol">
                
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 control-label"><label style="color:gray;font-size:x-small">(yyyy-mm-dd)</label>  Tgl. SEP</label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class='input-group date'>
                        <input type='text' class="form-control datepicker" id="txttglsepkode" maxlength="10" value="<?php echo $hasil['tglSep']?>" disabled />
                        <input type="hidden" id="txttglsep" name="txttglsep" value="" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 control-label">No. MR <label style="color:red;font-size:small">*</label></label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="input-group">
                        <input type="text" class="form-control" name="txtnomr" id="txtnomr" placeholder="ketik nomor MR" maxlength="10" value="<?php echo $hasil['peserta']['noMr']?>">
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
                    <input type="hidden" class="form-control" id="txtkddiagnosa" value="<?php echo $rujukan['rujukan']['diagnosa']['kode']?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 control-label">No. Telepon <label style="color:red;font-size:small">*</label></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" id="txtnotelp" name="txtnotelp" maxlength="15" value="<?php echo $rujukan['rujukan']['peserta']['mr']['noTelepon']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Catatan</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <textarea class="form-control" id="txtcatatan" name="txtcatatan" rows="2" placeholder="ketik catatan apabila ada"><?php echo $hasil['catatan']?></textarea>
                </div>
            </div>
            <div id="divkatarak">
            <?php 
            // $this->load->view('layanan/pelayanan/bpjs/sep/insert/formkatarak');
            ?>
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
    </form>
    <div class="box-footer text-right">
        <div id="divEditSEP">
            <a onclick="submitupdateSEP()" class="btn-sm btn-warning btn-flat">Ubah</i></a>
            <a onclick="panggilHapusSep('<?php echo $hasil['noSep'];?>');" class="btn-sm btn-danger btn-flat">Hapus</i></a>
            <a onclick="panggilCetakSep('<?php echo $hasil['noSep'];?>');" class="btn-sm btn-success btn-flat">Cetak</i></a>
        </div>
        <!-- <button type="button" id="btnBatal" class="btn btn-danger pull-right">Batal</button> -->
    </div>
</div>

<script>

    $(document).ready(function(){
        forFormDetail("<?php echo $rujukan['rujukan']['diagnosa']['nama']?>")
    });

</script>
<?php 
}
?>