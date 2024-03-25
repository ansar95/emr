 <div class="modal-dialog modal-xl modal-dialog-centered" style="margin: 0 auto;">
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
			<div class="modal-header p-1 pl-3 align-text-bottom">
				<h6><span style="color: blue; font-weight: bold;">Form Pemberian Obat / Infus</span></h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" class="form-control" disabled name="idnya" id="idnya" value="<?php echo $dtobatinfusid->id; ?>">
						<input type="hidden" class="form-control" disabled name="no_rm" id="no_rm" value="<?php echo $dtobatinfusid->no_rm; ?>">
						<input type="hidden" class="form-control" disabled name="notransaksi" id="notransaksi" value="<?php echo $dtobatinfusid->notransaksi; ?>">
					<div>
					<div class="form-group row col-spacing-row">
											<label class="col-md-2 col-form-label">Tanggal</label>
											<div class="col-md-3">
												<input type="date" class="form-control"  name="tanggal" id="tanggal" value="<?php echo $dtobatinfusid->tanggal; ?>">
											</div>
					</div>
					<div class="form-group row col-spacing-row">
											<label class="col-md-2 col-form-label">Jam</label>
											<div class="col-md-3">
												<input type="time" class="form-control"  name="jam" id="jam" value="<?php echo $dtobatinfusid->jam; ?>">
											</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row col-spacing-row">
								<label class="col-md-2 col-form-label">Nama Obat / Infus</label>
								<div class="col-md-10">
									<textarea rows="1" name="namaobat" id="namaobat" class="form-control"><?php echo $dtobatinfusid->namaobat; ?></textarea>
								</div>
							</div>
						</div>				
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-2 col-form-label">Dosis</label>
						<div class="col-md-10">
							<input type="text" class="form-control"  name="dosis" id="dosis" value="<?php echo $dtobatinfusid->dosis; ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row col-spacing-row">
								<label class="col-md-2 col-form-label">Oral/IV/IM/IC/SC</label>
								<div class="col-md-10">
									<textarea rows="1" name="oral" id="oral" class="form-control"><?php echo $dtobatinfusid->oral; ?></textarea>
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
	var namaobat = document.getElementById("namaobat").value;
	var dosis = document.getElementById("dosis").value;
	var oral = document.getElementById("oral").value;

	$.ajax({
		url: "<?php echo site_url();?>/rme/simpandataobatinfus",
		type: "GET",
		data : {id: id,
				no_rm : no_rm,
				notransaksi : notransaksi,
				tanggal : tanggal,
				jam : jam,
				namaobat : namaobat,
				dosis : dosis,
				oral : oral
				},
		success: function (ajaxData){
			console.log(ajaxData);
			 var dt = JSON.parse(ajaxData);
                    $("#tabelobatinfus tbody tr").remove();
                    $("#tabelobatinfus tbody").append(dt.dtview);
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
		url: "<?php echo site_url();?>/rme/hapusdataobatinfus",
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
                    $("#tabelobatinfus tbody tr").remove();
                    $("#tabelobatinfus tbody").append(dt.dtview);
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
