<div class="modal-dialog" role="document">
	<div class="modal-content">
		<!-- <div class="box box-default box-solid" id="proseskotak"> -->
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Dokter Bertugas</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="form-group row">
				<label for="username" class="col-sm-3 col-form-label">Nama Dokter</label>
				<input type="text" id="id" value="<?php echo $dtidp ?>" hidden disabled />
				<div class="col-sm-9">
					<select class="form-control" style="width: 100%;" name="dokterf" id="dokterf">
						<?php
						foreach ($dtdokter as $row) {
							if ($row->kode_dokter == $dtkode) {
						?>
								<option value="<?php echo $row->kode_dokter; ?>" selected><?php echo $row->nama_dokter; ?></option>
							<?php
							} else {
							?>
								<option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
						<?php
							}
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button id="simpandokter" class="btn btn-primary">Simpan</button>
		</div>
		<!-- </div> -->
	</div>
</div>
<script>
	function modalload() {
		$("#proseskotak").append('<div id="oload" class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	}

	function modalloadtutup() {
		$("#oload").remove();
	}

	function tutupmodal() {
		$(function() {
			$('#formmodal').modal('toggle');
		});
	}

	function tdsuksesalert() {
		$.notify("Sukses Input Data", "success");
	}

	function tdgagalalert() {
		$.notify("Gagal Input Data", "error");
	}

	$(function() {
		$('#dokterf').select2();
	});

	$(document).ready(function() {
		$("#simpandokter").click(function(e) {
			modalload();
			var id = document.getElementById("id").value;
			var dokterf = $("#dokterf").val();
			var dokterftext = $("#dokterf option:selected").text();
			var unit = document.getElementById("unitselect").value;
			var nrp = document.getElementById("nrp").value;
			var tglp1 = document.getElementById("tglp").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/urj/simpandkterregis",
				type: "GET",
				data: {
					id: id,
					dokterf: dokterf,
					dokterftext: dokterftext,
					unit: unit,
					nrp: nrp,
					tglp1 : tglp1
				},
				success: function(ajaxData) {
					var t = $.parseJSON(ajaxData);

					if (t.dtubah == true) {
						tdsuksesalert();
						$("#barispasien tbody tr").remove();
						$("#barispasien tbody").append(t.dtview);
						modalloadtutup();
						tutupmodal();
					} else {
						tdgagalalert();
						modalloadtutup();
					}
				}
			});
		});

	});
</script>
