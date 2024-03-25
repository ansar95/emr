 <div class="modal-dialog modal-xl modal-dialog-centered" style="margin: 0 auto;">
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
			<div class="modal-header p-1 pl-3 align-text-bottom">
				<h6><span style="color: blue; font-weight: bold;">Form Terapi / Tindakan</span></h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" class="form-control" disabled name="idnya" id="idnya" value="<?php echo $dttindakanid->id; ?>">
						<input type="hidden" class="form-control" disabled name="no_rm" id="no_rm" value="<?php echo $dttindakanid->no_rm; ?>">
						<input type="hidden" class="form-control" disabled name="notransaksi" id="notransaksi" value="<?php echo $dttindakanid->notransaksi; ?>">
					<div>
					<div class="form-group row col-spacing-row">
											<label class="col-md-1 col-form-label">Tanggal</label>
											<div class="col-md-3">
												<input type="date" class="form-control"  name="tanggal" id="tanggal" value="<?php echo $dttindakanid->tanggal; ?>">
											</div>
					</div>
					<div class="form-group row col-spacing-row">
											<label class="col-md-1 col-form-label">Jam</label>
											<div class="col-md-3">
												<input type="time" class="form-control"  name="jam" id="jam" value="<?php echo $dttindakanid->jam; ?>">
											</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row col-spacing-row">
								<label class="col-md-1 col-form-label">Terapi / Tindakan</label>
								<div class="col-md-10">
									<textarea rows="5" name="terapi" id="terapi" class="form-control"><?php echo $dttindakanid->terapi; ?></textarea>
								</div>
							</div>
						</div>				
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-1 col-form-label">Oleh</label>
						<div class="col-md-5">
							<input type="text" class="form-control"  name="oleh" id="oleh" value="<?php echo $dttindakanid->oleh; ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row col-spacing-row">
								<label class="col-md-1 col-form-label">Evaluasi</label>
								<div class="col-md-10">
									<textarea rows="5" name="evaluasi" id="evaluasi" class="form-control"><?php echo $dttindakanid->evaluasi; ?></textarea>
								</div>
							</div>
						</div>				
					</div>
					<div class="row">
                        <div class="col-md-6 text-left">
                            <button onclick="simpandata()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                        </div>
						<div class="col-md-6 text-right">
                            <button onclick="hapusdata()" class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
				</div>
					
			</div>
		</div>
	</div>
</div>

<script>

function modalform() {
            $("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        }

function modalformtutup() {
            $(".overlay").remove();
        }

function tutupmodal() {
            $(function () {
                $("#formmodal").modal("toggle");
            });
        }


function simpandata() {
	modalform();
	var id = document.getElementById("idnya").value;
	var no_rm = document.getElementById("no_rm").value;
	var notransaksi = document.getElementById("notransaksi").value;
	var tanggal = document.getElementById("tanggal").value;
	var jam = document.getElementById("jam").value;
	var oleh = document.getElementById("oleh").value;
	var terapi = document.getElementById("terapi").value;
	var evaluasi = document.getElementById("evaluasi").value;

	$.ajax({
		url: "<?php echo site_url();?>/rme/simpandataterapi",
		type: "GET",
		data : {id: id,
				no_rm : no_rm,
				notransaksi : notransaksi,
				tanggal : tanggal,
				jam : jam,
				oleh : oleh,
				terapi : terapi,
				evaluasi : evaluasi
				},
		success: function (ajaxData){
			console.log(ajaxData);
			 var dt = JSON.parse(ajaxData);
                    $("#tabelterapi tbody tr").remove();
                    $("#tabelterapi tbody").append(dt.dtview);
                    modalformtutup();
                    tutupmodal();
		},
		error: function (ajaxData) {
			// modalloadtutup();
			console.log(ajaxData);
		}
	});	
	}

	function hapusdata() {
	modalform();
	var id = document.getElementById("idnya").value;
	var no_rm = document.getElementById("no_rm").value;
	var notransaksi = document.getElementById("notransaksi").value;
	// var tanggal = document.getElementById("tanggal").value;
	// var jam = document.getElementById("jam").value;
	// var oleh = document.getElementById("oleh").value;
	// var te = document.getElementById("tindakan").value;

	$.ajax({
		url: "<?php echo site_url();?>/rme/hapusdataterapi",
		type: "GET",
		data : {id: id,
				no_rm : no_rm,
				notransaksi : notransaksi,
				// tanggal : tanggal,
				// jam : jam,
				// oleh : oleh,
				// tindakan : tindakan
				},
		success: function (ajaxData){
			console.log(ajaxData);
			 var dt = JSON.parse(ajaxData);
                    $("#tabelterapi tbody tr").remove();
                    $("#tabelterapi tbody").append(dt.dtview);
                    modalformtutup();
                    tutupmodal();
		},
		error: function (ajaxData) {
			// modalloadtutup();
			console.log(ajaxData);
		}
	});	
	}

</script>
