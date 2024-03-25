 <div class="modal-dialog modal-xl modal-dialog-centered" style="margin: 0 auto;">
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
			<div class="modal-header p-1 pl-3 align-text-bottom">
				<h6><span style="color: blue; font-weight: bold;">Form Pemeriksaan / Tindakan</span></h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" class="form-control" disabled name="idnya" id="idnya" value="<?php echo $dtfisioperiksa->id; ?>">
						<input type="hidden" class="form-control" disabled name="no_rm" id="no_rm" value="<?php echo $dtfisioperiksa->no_rm; ?>">
						<input type="hidden" class="form-control" disabled name="notransaksi" id="notransaksi" value="<?php echo $dtfisioperiksa->nolembar; ?>">
					<div>
					<div class="form-group row col-spacing-row">
											<label class="col-md-1 col-form-label">Tanggal</label>
											<div class="col-md-3">
												<input type="date" class="form-control"  name="tglperiksa" id="tglperiksa" value="<?php echo $dtfisioperiksa->tglperiksa; ?>">
											</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row col-spacing-row">
								<label class="col-md-1 col-form-label">Pemeriksaan</label>
								<div class="col-md-10">
									<textarea rows="5" name="jenis" id="jenis" class="form-control"><?php echo $dtfisioperiksa->jenis; ?></textarea>
								</div>
							</div>
						</div>				
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-1 col-form-label">Terapi</label>
						<div class="col-md-10">
							<textarea rows="5" name="terapi" id="terapi" class="form-control"><?php echo $dtfisioperiksa->terapi; ?></textarea>
						</div>
					</div> 
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row col-spacing-row">
								<label class="col-md-1 col-form-label">Diagnosa FT</label>
								<div class="col-md-10">
									<textarea rows="5" name="diagnosa" id="diagnosa" class="form-control"><?php echo $dtfisioperiksa->diagnosa; ?></textarea>
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
	var tglperiksa = document.getElementById("tglperiksa").value;
	var jenis = document.getElementById("jenis").value;
	var terapi = document.getElementById("terapi").value;
	var diagnosa = document.getElementById("diagnosa").value;

	$.ajax({
		url: "<?php echo site_url();?>/rme/simpandatapemeriksaan",
		type: "GET",
		data : {id: id,
				no_rm : no_rm,
				tglperiksa : tglperiksa,
				jenis : jenis,
				terapi : terapi,
				diagnosa : diagnosa
				},
		success: function (ajaxData){
			console.log(ajaxData);
			 var dt = JSON.parse(ajaxData);
                    $("#tabelpemeriksaan tbody tr").remove();
                    $("#tabelpemeriksaan tbody").append(dt.dtview);
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


	$.ajax({
		url: "<?php echo site_url();?>/rme/hapusdatapemeriksaan",
		type: "GET",
		data : {id: id,
				no_rm : no_rm
				},
		success: function (ajaxData){
			console.log(ajaxData);
			 var dt = JSON.parse(ajaxData);
                    $("#tabelpemeriksaan tbody tr").remove();
                    $("#tabelpemeriksaan tbody").append(dt.dtview);
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
