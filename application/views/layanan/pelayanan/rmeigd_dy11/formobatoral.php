 <div class="modal-dialog modal-xl modal-dialog-centered" style="margin: 0 auto;">
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
			<div class="modal-header p-1 pl-3 align-text-bottom">
				<h6><span style="color: blue; font-weight: bold;">Form Pemberian Obat Pasien Rawat Inap</span></h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" class="form-control" disabled name="idnya" id="idnya" value="<?php echo $dtobatoralid->id; ?>">
						<input type="hidden" class="form-control" disabled name="no_rm" id="no_rm" value="<?php echo $dtobatoralid->no_rm; ?>">
						<input type="hidden" class="form-control" disabled name="notransaksi" id="notransaksi" value="<?php echo $dtobatoralid->notransaksi; ?>">
					<div>
					<div class="form-group row col-spacing-row">
											<label class="col-md-2 col-form-label">Tanggal</label>
											<div class="col-md-3">
												<input type="date" class="form-control"  name="tanggal" id="tanggal" value="<?php echo $dtobatoralid->tanggal; ?>">
											</div>
					</div>
					<div class="form-group row col-spacing-row">
											<label class="col-md-2 col-form-label">Jam</label>
											<div class="col-md-3">
												<input type="time" class="form-control"  name="jam" id="jam" value="<?php echo $dtobatoralid->jam; ?>">
											</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row col-spacing-row">
								<label class="col-md-2 col-form-label">Nama Obat</label>
								<div class="col-md-10">
									<textarea rows="1" name="namaobat" id="namaobat" class="form-control"><?php echo $dtobatoralid->namaobat; ?></textarea>
								</div>
							</div>
						</div>				
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-2 col-form-label">Kekuatan/Sediaan</label>
						<div class="col-md-10">
							<input type="text" class="form-control"  name="kekuatan" id="kekuatan" value="<?php echo $dtobatoralid->kekuatan; ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row col-spacing-row">
								<label class="col-md-2 col-form-label">Rute</label>
								<div class="col-md-10">
									<textarea rows="1" name="rute" id="rute" class="form-control"><?php echo $dtobatoralid->rute; ?></textarea>
								</div>
							</div>
						</div>				
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row col-spacing-row">
								<label class="col-md-2 col-form-label">Frekwensi</label>
								<div class="col-md-10">
									<textarea rows="1" name="frekwensi" id="frekwensi" class="form-control"><?php echo $dtobatoralid->frekwensi; ?></textarea>
								</div>
							</div>
						</div>				
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row col-spacing-row">
								<label class="col-md-2 col-form-label">Dokter Penulis</label>
								<div class="col-md-10">
									<textarea rows="1" name="nama_dokter_penulis" id="nama_dokter_penulis" class="form-control"><?php echo $dtobatoralid->nama_dokter; ?></textarea>
								</div>
							</div>
						</div>				
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row col-spacing-row">
								<label class="col-md-2 col-form-label">Petugas</label>
								<div class="col-md-10">
									<textarea rows="1" name="petugas" id="petugas" class="form-control"><?php echo $dtobatoralid->petugas; ?></textarea>
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
	var kekuatan = document.getElementById("kekuatan").value;
	var rute = document.getElementById("rute").value;
	var frekwensi = document.getElementById("frekwensi").value;
	var nama_dokter_penulis = document.getElementById("nama_dokter_penulis").value;
	var petugas = document.getElementById("petugas").value;
	$.ajax({
		url: "<?php echo site_url();?>/rme/simpandataobatoral",
		type: "GET",
		data : {id: id,
				no_rm : no_rm,
				notransaksi : notransaksi,
				tanggal : tanggal,
				jam : jam,
				namaobat : namaobat,
				kekuatan : kekuatan,
				rute : rute,
				frekwensi : frekwensi,
				nama_dokter : nama_dokter_penulis,
				petugas : petugas
				},
		success: function (ajaxData){
			console.log(ajaxData);
			 var dt = JSON.parse(ajaxData);
                    $("#tabelobatoral tbody tr").remove();
                    $("#tabelobatoral tbody").append(dt.dtview);
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
		url: "<?php echo site_url();?>/rme/hapusdataobatoral",
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
                    $("#tabelobatoral tbody tr").remove();
                    $("#tabelobatoral tbody").append(dt.dtview);
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
