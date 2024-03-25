<main>
    <div class="row px-4">
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Surat Eligibilitas Peserta</h6> 
                </div>

                <div class ="card-content">
                    <div class="card-body">
                        <div class="form-group" id="div_rdpilih">
                            <div class="row col-12">
                             <div class="col-2 custom-control">
                                <span>
                                    Pilih
                                </span>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline col-1 ml-3">
                                <input type="radio" onclick="pilihform()" name="rdpilih" value="2" class="custom-control-input" id="outrujukan" checked>
                                <label class="custom-control-label checkbox-primary" for="outrujukan">Rujukan</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline col-3">
                                <input type="radio" onclick="pilihform()" checked  name="rdpilih" name="rdpilih"  value="0" class="custom-control-input" id="outmanual">
                                <label class="custom-control-label checkbox-primary" for="outmanual">Rujukan Manual/IGD </label>
                            </div>
                        </div>
                    </div>
                    
                    <div id="divCariRujukan" class=" form-group">
                        <div class="row">
                            <div class="col-2 custom-control">
                                <span>
                                    Tgl. SEP
                                </span>
                            </div> 

                            <div class="input-group mb-3 col-3">
                                <input type="date" class="form-control" id="tglsep">
                            </div>
                        </div>

                        <div class="row">
                           <div class="col-2 custom-control">
                            <span>
                                Asal  Rujukan
                            </span>
                        </div> 

                        <div class="input-group mb-3 col-3">
                            <select id="asalrujukan" class="form-control">
                                <option value="faskes1">Faskes Tingkat 1</option>
                                <option value="faskes2">Faskes Tingkat 2</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2 custom-control">
                            <span>
                                No Rujukan
                            </span>
                        </div> 

                        <div class="input-group mb-3 col-3">
                            <input type="name" class="form-control" id="tglse"> 

                        </div>
                        <div class="form-group col-md-2">
                           <button align="left" type="submit" class="btn btn-secondary">No Kartu</button>
                       </div>
                   </div>
               </div>


               <div id="divCarikartu" class="form-groupo">
                <div class="row">
                   <div class="col-2 custom-control">
                    <span>
                        Pelayanan
                    </span>
                </div>
                <div class="input-group mb-3 col-3">
                    <select id="asalrujukan" class="form-control">
                        <option value="1">Rawat Jalan</option>
                        <option value="2">Rawat Inap</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-2 custom-control">
                    <span>
                        Tgl. SEP
                    </span>
                </div> 

                <div class="input-group mb-3 col-3">
                    <input type="date" class="form-control" id="tglsep">
                </div>
            </div>

            <div class="row">
                <div class="col-2 custom-control">
                    <span>
                        PPK Asal Peserta <label style="color:red;font-size:small">*</label>
                    </span>
                </div>
                <div class="input-group col-3">
                    <select class="form-control" name="txtppkasalrujukan_OL" id="txtppkasalrujukan_OL">
                    </select>
                    <input type="hidden" class="form-control" id="txtkdppkasalrujukan_OL">
                    <input type="hidden" class="form-control" id="txtjarkom">
                    <input type="hidden" class="form-control" id="txtpascainap">
                </div>
                </div>
                <div class="input-group mb-3 col-3">
            </div>
                            <!-- rujukan online -->
                            <!-- <div class="form-group">
                                <label class="col-md-2 col-sm-2 col-xs-12 control-label">PPK Asal Peserta <label style="color:red;font-size:small">*</label></label>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <select class="form-control" style="width: 100%;" name="txtppkasalrujukan_OL" id="txtppkasalrujukan_OL">
                                    </select>
                                    <input type="hidden" class="form-control" id="txtkdppkasalrujukan_OL">
                                    <input type="hidden" class="form-control" id="txtjarkom">
                                    <input type="hidden" class="form-control" id="txtpascainap">
                                </div>
                            </div> -->
                            <!-- end rujukan online -->
                            <div class="row">

                             <div class="col-2 custom-control">
                                <span>
                                    Nomor
                                </span>
                            </div> 

                            <div class="input-group mb-3 col-3">
                                <input placeholder="Ketik Nomor" maxlength="16" type="name" class="form-control"
                                id="txtNokartu" name="txtNokartu" > 
                            </div>

                            <span class="input-group-addon">

                             <div class="custom-control custom-radio custom-control-inline col-2 ml-3">
                                <input type="radio" onclick="" name="rbnomor" value="1" class="custom-control-input radio-primary" id="outbpjs">
                                <label class="custom-control-label checkbox-primary" for="outbpjs">BPJS</label></div>

                                <div class="custom-control custom-radio custom-control-inline col-6 ml-3">
                                    <input type="radio" onclick=""   name="rbnomor" name="rbnomor"  value="0" class="custom-control-input radio-primary" id="outnik">
                                    <label checked class="custom-control-label checkbox-primary" for="outnik">NIK /eKTP </label>
                                </div>
                            </span>
                        </div>

                        <div class="alert alert-info  center ml-1 mr-1 alert-dismissible" id="divInfoJarkom">
                            <h6><i class="icon fa fa-commenting-o"></i> Pembuatan SEP rawat jalan menggunakan no.kartu hanya bisa :</h6>
                            <p>
                                1. Untuk PPK yang tidak menggunakan jaringan komunikasi dapat manual.<br />
                                2. Untuk PPK yang mempunyai jaringan komunikasi data hanya bisa menerbitkan SEP Gawat Darurat.
                            </p>

                        </div>

                       <!--  <div class="custom-control custom-radio custom-control-inline col-1 ml-3">
                                    <input type="radio"  name="rbnomor" value="0" class="custom-control-input" id="rbnmr" checked>
                                    <label class="custom-control-label checkbox-primary" for="rbnmr">BPJS</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline col-3">
                                    <input type="radio"  checked  name="rdpilih" name="rbnomor"  value="1" class="custom-control-input" id="rbout">
                                    <label class="custom-control-label checkbox-primary" for="rbout">NIK/ e-KTP </label>
                                </div>
                            -->
                              <!--   <label class="col-md-2 col-sm-2 col-xs-12 control-label">Nomor</label>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="txtNokartu" name="txtNokartu" placeholder="ketik nomor" maxlength="13">
                                        <span class="input-group-addon">
                                            <label><input type="radio" name="rbnomor" value="0" checked> BPJS</label>
                                            <label><input type="radio" name="rbnomor" value="1"> NIK(eKTP)</label>
                                            <label><input type="radio" name="rbnomor" value="2"> eKTP-Reader</label> -->
                                        </span>
                                    </div>
                                </div> 
                            </div>
                            <div class="row col-12">
                                <div class="form-group col-md-12 ml-2" >
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>

                        </div>

                        
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>

<div class="box-body">


</div>
</div>