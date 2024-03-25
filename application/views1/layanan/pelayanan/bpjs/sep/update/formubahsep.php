<div class="modal-dialog" style="width:1200px;">
	<div class="modal-content" >
		<div class="form-horizontal">
			<div class="box box-default box-solid" id="kotakform">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Ubah SEP</h4>
				</div>
				<div class="modal-body">
					<div class="box-body">
						<div class="col-sm-12">
							<form class="form-horizontal" id="theform">
								<input type="hidden" id="txtprsklaimsep" />
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
												<select class="form-control" style="width: 100%;" name="txtnmpoli" id="txtnmpoli">
												</select>
												<input type="hidden" class="form-control" id="txtkdpoli">
											</div>
										</div>
									</div>
									<?php
									if ((int)$cetakan->cetakan != 1) {
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
										// if ($additional != null) {
										// 	echo $additional;
										// }
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
												<input type="text" class="form-control" name="txtnomr" id="txtnomr" placeholder="ketik nomor MR" maxlength="10" value="">
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
												onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="15" value="">
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
										<button type="button" id="btnSimpan" onclick="" class="btn btn-success pull-left"><i class="fa fa-save"></i> Simpan</button>
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
				<div class="modal-footer">
					<a id="simpanunit" class="btn btn-primary">Simpan</a>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
function bagiandetailinsert() {
        $('#txttglrujukan').datepicker({ autoclose: true }).datepicker("setDate", "0");

        $('#txtnmdiagnosa').select2({
            placeholder: 'Enter Diagnosa',
            minimumInputLength: 3,            
            allowClear: true,
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambilldiagnosainsert",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data.items
                    };
                }
            }
        });

        $('#txtnmpoli').select2({
            placeholder: 'Enter Poli',
            minimumInputLength: 3,            
            allowClear: true,
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambillpoliinsert",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data.items
                    };
                }
            }
        });

        $('#txtnmdpjp').select2({
            placeholder: 'Enter DPJP',
            minimumInputLength: 3,            
            allowClear: true,
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambilldpjpinsert",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        rawat: _2pelayanan,
                        tgl: _2tglPelayanan,
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data.items
                    };
                }
            }
        });

    }

    $(document).ready(function(){
        bagiandetailinsert()
        $('#txtTanggal_0').datepicker({ autoclose: true }).datepicker("setDate", "0");
        $('#txtTanggal').datepicker({ autoclose: true }).datepicker("setDate", "0");

        
        $('#txtppkasalrujukan_OL').select2({
            placeholder: 'Enter PPK',
            minimumInputLength: 3,            
            allowClear: true,
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambillppk",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        param: $("#cbpelayanan_1").val(),
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data.items
                    };
                }
            }
        });
    });

	function jaminan() {
        var valu = $("#cbstatuskll").val();
        $.ajax({
            url: "<?php echo site_url();?>/bpjs/getjaminan?statusjaminan="+valu+"",
            type: "GET",
            success: function (ajaxData){
                var dt = JSON.parse(ajaxData);
                if (dt.stat == true) {
                    $("#divJaminan").html(dt.dtview);
                } else {
                }
            },
            error: function(data) {
                
            }
        });
    }

</script>