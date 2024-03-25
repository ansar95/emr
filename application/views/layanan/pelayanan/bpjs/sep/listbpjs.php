<main>  
    <!-- START: Card Data-->
    <div class="row px-4">
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h6>Pencarian</h6>
                </div>      
            
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form align="center">   
                                <div class="form-group row">
                                   <label for="username" class="col-1 col-form-label">No SEP</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="nama"/>
                                                    </div>

                                    
                                    <!-- <label class="col-1 col-form-label">s/d </label> -->

                                    <!-- <div class="form-group col-sm-3 mb-1"> 
                                        <input type="date" class="form-control" id="dt"> 
                                    </div> -->
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 ml-1">
                                          <div class="btn-group col-sm-5">
                                    <button type="button" class="btn btn-primary">Cari</button>
                            </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  
        </div>


        <div class="card mt-4">
                <div class="card-header">
                    <h6>Surat Eligibilitas Peserta</h6>
                </div>      
            
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <!-- <form align="center">   
                                <div class="form-group row">
                                   <label for="username" class="col-1 col-form-label">No SEP</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="nama"/>
                                                    </div>

                                    
                                   

                                    <div class="form-group col-sm-3 mb-1"> 
                                        <input type="date" class="form-control" id="dt"> 
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 ml-1">
                                          <div class="btn-group col-sm-5">
                                    <button type="button" class="btn btn-primary">Cari</button>
                            </div>
                                    </div>
                                </div>
                            </form> -->
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</main>

<!-- <div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="card-header">
                <h6 class="card-title">Billing</h6>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="form-horizontal">
                    <div class="box-body"> -->
                        <!-- <form target="_blank" action="<?php echo site_url();?>/billing/panggilcetak" method="post">
                        <table class="table table-borderless">
                            <tr>
                                <td class="text-right" width="30%" ><b>Periode Tanggal:<b></td>
                                <td colspan="3">
                                    <div class="col-sm-3">
                                        <div class="input-group date">

                                            <input type="text" class="form-control pull-right" id="awal" name="tglmulai" required autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                    s/d
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group date">
                                            <input type="text" class="form-control pull-right" id="akhir" name="tglakhir" required autocomplete="off">
                                        </div>
                                    </div>
                                </td>
                            </tr> -->
                            <!-- <tr>
                                <td class="text-right">
                                    <b>Shift:</b>
                                </td>
                                <td width="15%">
                                    <input type="radio" name="shif" value="semua" id="uncekshif" onclick="javascript:shifcek();" checked> Semua
                                </td>
                                <td width="8%">
                                    <input type="radio" name="shif" value="pilih" id="cekshif" onclick="javascript:shifcek();"> Pilihan
                                </td>
                                <td>
                                    <div class="col-sm-6">
                                        <select class="form-control shif2" style="width: 100%;" id="shifyes" disabled name="shifpilih">
                                            <option value="PAGI">PAGI</option>
                                            <option value="SIANG">SIANG</option>
                                            <option value="MALAM">MALAM</option>
                                        </select>
                                    </div>
                                </td>
                            </tr> -->
                            <!-- <tr>
                                <td class="text-right">
                                    <b>User:</b>
                                </td>
                                <td width="15%">
                                    <input type="radio" name="pengguna" value="semua" id="uncekpengguna" onclick="javascript:penggunacek();" checked> Semua
                                </td>
                                <td width="8%">
                                    <input type="radio" name="pengguna" value="pilih" id="cekpengguna" onclick="javascript:penggunacek();"> Pilihan
                                </td>
                                <td>
                                    <div class="col-sm-6">
                                        <select class="form-control pengguna2" style="width: 100%;" id="penggunayes" disabled name="penggunapilih">
                                        <?php
                                            foreach($us as $row) {
                                            ?>
                                            <option value="<?php echo $row->username; ?>"><?php echo $row->username; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                            </tr> -->

                            <!-- tambahan  -->
                            <!-- <tr>
                                <td class="text-right">
                                    <b>Cara Bayar :</b>
                                </td>
                                <td width="15%">
                                    <input type="radio" name="cbayar" value="semua" id="uncekcbayar" onclick="javascript:cbayarcek();" checked> Semua
                                </td>
                                <td width="8%">
                                    <input type="radio" name="cbayar" value="pilih" id="cekcbayar" onclick="javascript:cbayarcek();"> Pilihan
                                </td>
                                <td>
                                    <div class="col-sm-6">
                                        <select class="form-control cbayar2" style="width: 100%;" id="cbayaryes" disabled name="cbayarpilih">
                                        <?php
                                            foreach($gol as $row) {
                                            ?>
                                            <option value="<?php echo $row->golongan; ?>"><?php echo $row->golongan; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                            </tr> -->
                            <!-- end of tambahan -->

                            <!-- <tr>
                                <td colspan="4">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="30%"></td>
                                            <td width="20%">
                                                <div class="input-group col-sm-12">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-print"></i>
                                                    </div>
                                                    <input class="btn-sm btn-block" type="submit" name="cbil" value="Cetak">
                                                </div>
                                            </td>
                                            <td width="50%">
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> -->
                        <!-- </table>
                        </form>
                        <div class="form-group">
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
 -->