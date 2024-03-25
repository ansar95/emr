<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css">
 
 <div class="modal-dialog modal-xl modal-dialog-centered" style="margin: 0 auto;">
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
			<div class="modal-header p-1 pl-3 align-text-bottom" style="height: 30px;">
				<h6><span style="color: blue; font-weight: bold;">Form SOAP</span></h6>
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
							<input type="date" class="form-control" style="border: 1px solid #929293;" name="tanggal" id="tanggal" value="<?php echo $dttindakanid->tanggal; ?>">
						</div>
						<div class="col-md-3">
    						<input class="state icheckbox_square-red" type="checkbox" id="sbar" name="sbar" class="form-check-input"  <?php if ($dttindakanid->sbar == 1) {echo "checked";} ?> style="border: 1px solid #929293;"> <span style="font-size: 15px;">&nbsp;SBAR</span>
						</div>
					</div>

					<div class="form-group row col-spacing-row">
											<label class="col-md-1 col-form-label">Jam</label>
											<div class="col-md-3">
												<input type="time" class="form-control"  style="border: 1px solid #929293;" name="jam" id="jam" value="<?php echo $dttindakanid->jam; ?>">
											</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row col-spacing-row">
								<label class="col-md-1 col-form-label">Profesi</label>
								<div class="col-md-10">
									<input type="text" class="form-control"  style="border: 1px solid #929293;" name="profesi" id="profesi" value="<?php echo $dttindakanid->profesi; ?>">
								</div>
							</div>
						</div>				
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row col-spacing-row">
								<label class="col-md-1 col-form-label">Subjek</label>
								<div class="col-md-10">
									<textarea rows="5" style="border: 1px solid #929293;" name="subjek" id="subjek" class="form-control"><?php echo $dttindakanid->subjek; ?></textarea>
								</div>
							</div>
						</div>				
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-1 col-form-label">Objek</label>
						<div class="col-md-10">
							<!-- <input type="text" class="form-control"  name="objek" id="objek" value="<?php echo $dttindakanid->objek; ?>"> -->
							<textarea rows="5" style="border: 1px solid #929293;" name="objek" id="objek" class="form-control"><?php echo $dttindakanid->objek; ?></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row col-spacing-row">
								<label class="col-md-1 col-form-label">Analisis</label>
								<div class="col-md-10">
									<textarea rows="5" style="border: 1px solid #929293;" name="analisis" id="analisis" class="form-control"><?php echo $dttindakanid->analisis; ?></textarea>
								</div>
							</div>
						</div>				
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row col-spacing-row">
								<label class="col-md-1 col-form-label">Plan</label>
								<div class="col-md-10">
									<textarea rows="5"  style="border: 1px solid #929293;" name="plan" id="plan" class="form-control"><?php echo $dttindakanid->plan; ?></textarea>
								</div>
							</div>
						</div>				
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row col-spacing-row">
								<label class="col-md-1 col-form-label">Instruksi</label>
								<div class="col-md-10">
									<textarea rows="5" style="border: 1px solid #929293;" name="instruksi" id="instruksi" class="form-control"><?php echo $dttindakanid->instruksi; ?></textarea>
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
	var profesi	 = document.getElementById("profesi").value;
	var subjek = document.getElementById("subjek").value;
	var objek = document.getElementById("objek").value;
	var analisis = document.getElementById("analisis").value;
	var plan = document.getElementById("plan").value;
	var instruksi = document.getElementById("instruksi").value;
	var sbarx = $("input[name='sbar']:checked").val();
	console.log(sbarx);
    if (sbarx == 'on') { sbar=1;} else {sbar=0;}
	console.log(sbar);

	$.ajax({
		url: "<?php echo site_url();?>/rme/simpandatasoap_ranap",
		type: "GET",
		data : {id: id,
				no_rm : no_rm,
				notransaksi : notransaksi,
				tanggal : tanggal,
				jam : jam,
				profesi : profesi,
				subjek : subjek,
				objek : objek,
				analisis : analisis,
				plan : plan,
				instruksi : instruksi,
				sbar : sbar
				},
		success: function (ajaxData){
			// console.log(ajaxData);
			 var dt = JSON.parse(ajaxData);
                    $("#tabelsoap tbody tr").remove();
                    $("#tabelsoap tbody").append(dt.dtview);
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

	$.ajax({
		url: "<?php echo site_url();?>/rme/hapusdatasoap",
		type: "GET",
		data : {id: id,
				no_rm : no_rm,
				notransaksi : notransaksi
				},
		success: function (ajaxData){
			// console.log(ajaxData);
			 var dt = JSON.parse(ajaxData);
                    $("#tabelsoap tbody tr").remove();
                    $("#tabelsoap tbody").append(dt.dtview);
                    modalformtutup();
                    tutupmodal();
		},
		error: function (ajaxData) {
			console.log(ajaxData);
		}
	});	
	}

</script>
