
<div class="modal-dialog modal-xl" style="width:1000px;" >
	<div class="modal-content" >
		<form class="form-horizontal" id="kotakform">
			<div class="box box-default box-solid">
				<div class="modal-header">
                    <h6 class="modal-title">Pembayaran Resep Apotik</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					
				</div>
				<div class="modal-body">
					<div class="box-body row col-spacing-row">
						<div class="col-sm-6">
							<div class="form-group row col-spacing-row">
								<label for="inputEmail3" class="col-sm-4 control-label">No. Transaksi</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="trx" id="trx" value="<?php echo $hasil->notraksaksi;?>" disabled>
								</div>
							</div>  
                            <div class="form-group row col-spacing-row">
                                <label for="inputEmail3" class="col-sm-4 control-label">No. RM</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="rm" id="rm" value="<?php echo $hasil->no_rm;?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="inputEmail3" class="col-sm-4 control-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nm" id="nm" disabled value="<?php echo $hasil->nama_umum;?>">
                                </div>
                            </div>
                            <div class="form-grou row col-spacing-row">
                                <label for="inputEmail3" class="col-sm-4 control-label">Dokter</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="dpjp" id="dpjp" disabled value="<?php echo $hasil->nama_dokter;?>">
                                </div>
                            </div>
						</div>
                        <div class="col-sm-6">
                            <div class="form-group row col-spacing-row">
								<label for="inputEmail3" class="col-sm-6 control-label">No. Resep</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="noresep" id="noresep" value="<?php echo $hasil->noresep;?>" disabled>
								</div>
							</div>
                            <div class="form-group row col-spacing-row">
                                <label for="inputEmail3" class="col-sm-6 control-label">Tgl. Resep</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="tglresep" id="tglresep" disabled value="<?php echo tgl_format_indo($hasil->tglresep);?>">
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="inputEmail3" class="col-sm-6 control-label">Cara Bayar</label>
                                <div class="col-sm-6">
                                    <input type="text"  class="form-control" name="carabayar" id="carabayar" disabled value="Bayar Umum">
                                </div>
                            </div>   
                            <div class="form-group row col-spacing-row">
                                <label class="col-sm-6 control-label">Jumlah yang harus dibayar</label>
                                <div class="col-sm-3">
                                    <?php if ($bayar->jumhargaresep == NULL) { $xtotalhargaresep = 0; } else { $xtotalhargaresep = $bayar->jumhargaresep; } ?>
                                    <input type="text" class="form-control text-right" name="bayar" id="bayar" disabled value="<?php echo formatuang($xtotalhargaresep);?>">
                                </div>
                            </div>    
                            
                        </div>
					</div>
				</div>
                
				<div class="modal-footer">
					<div class="row">
						<div class="col-sm-12">
                            <!-- <button type="button" onclick="callkwitansi();" class="btn btn-primary btn-flat" style= "float: left;">Kwitansi</button> -->
                            <button type="button" onclick="aksibayarapotik();" class="btn btn-primary btn-flat">Bayar</button>
						</div>
					</div>
				</div>
			</div>
		<form>
	</div>
</div>
<script>

	function modalload() {
		$("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function modalloadtutup() {
		$(".overlay").remove();
	}

	function suksesalert() {
		$.notify("Sukses Proses Data", "success");
	}

	function gagalalert() {
		$.notify("Gagal Proses Data", "error");
	}

    function aksibayarapotik() {
        modalload();
        var shift = $("#shif").val();
        var shifttext = $("#shif option:selected").text();
        var trx = document.getElementById("trx").value;
        var rm = document.getElementById("rm").value;
        var dpjp = document.getElementById("dpjp").value;
        var noresep = document.getElementById("noresep").value;
        var tglresep = document.getElementById("tglresep").value;
        var carabayar = document.getElementById("carabayar").value;
        var bayar = document.getElementById("bayar").value;
        $.ajax({
            url: "<?php echo site_url();?>/billing/aksibayarapotik",
            type: "GET",
            data : {
                shift: shift,
                shifttext: shifttext,
                rm: rm,
                trx: trx,
                dpjp: dpjp,
                noresep: noresep,
                tglresep: tglresep,
                carabayar: carabayar,
                bayar: bayar
            },
            success: function (ajaxData){
                var t = JSON.parse(ajaxData);
                if (t.stat == true) {
                    load_data(1);
                    suksesalert();
                    modalloadtutup();
                } else {
                    gagalalert();
                    modalloadtutup();
                }
            },
            error: function (ajaxData) {
                hapusload();
            }
        });
    }

	$(document).ready(function () {

	});

    function callkwitansi() {
        var trx = document.getElementById("trx").value;
        var rm = document.getElementById("rm").value;
        window.open("<?php echo site_url();?>/billing/cetakbayarkwitansi/"+trx+"/"+rm+"", '_blank');
    }

</script>

