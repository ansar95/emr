<div class="modal-dialog modal-xl" id="myModal2" role="document">
	<div class="modal-content">
		<!-- <div class="box box-default box-solid" id="proseskotak"> -->
		<div class="modal-header p-1 pl-3 align-text-bottom">
			<?php
			foreach ($dtproseslab as $row) {
				// $tindakannya = $row->kode_tindakan; //array
				$nama_pasien = $row->nama_pasien;
				$labtgl = $row->tanggal;
				$notransin = $row->notransaksi_IN;
				$notrans = $row->notransaksi;
				$rm = $row->no_rm;
				$diagnosa = $row->diagnosa;
			}
			?>
			<b class="modal-title" id="exampleModalLabel">Pemeriksaan Laboratorium | <?php echo $rm . ' ' . $nama_pasien; ?></b>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="row">
				<input type="text" name="noinst" id="noinst" value="<?php echo $notransin; ?>" hidden>
				<label for="inputEmail3" class="col-sm-3 control-label">Diagnosa </label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="diag" id="diag" value="<?php echo $diagnosa ?>">
				</div>
			</div>
			<hr>
			<b class="my-4">Item Pemeriksaan</b>
			<div class="row">
				<div class="col-sm-12">
					<input type="text" placeholder="Cari" class="form-control" name="cari_item_pemeriksaan" id="cari_item_pemeriksaan" />
				</div>
			</div>
			<div class="table-scrollable p-2">
				<div style="max-height: 500px; min-height: 500px;">
					<div class="row" id="formtindakan">
						<?php
						foreach ($dttindakan as $row) {
							$checkedStatus = "";
							$dtchecklabArr = explode(",", $dtpilihantind);
							if (in_array($row->kode_tindakan, $dtchecklabArr)) {
								$checkedStatus = "checked";
							}
						?>
							<div class="col-md-3 lab-checkbox">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input type="checkbox" class="custom-control-input" id="<?php echo $row->kode_tindakan; ?>" name="tnd" <?php echo $checkedStatus; ?> value="<?php echo $row->kode_tindakan; ?>">
									<label class="custom-control-label" for="<?php echo $row->kode_tindakan; ?>"><?php echo $row->tindakan; ?></label>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<!-- <a onclick="batallab();" class="btn btn-danger pull-left"><?php echo $labtgl; ?></a> -->
					<!-- <a onclick="batallab();" class="btn btn-danger pull-left"><?php echo $notransin; ?></a> -->
					<button onclick="batallab();" class="btn btn-danger ">Batal</button>
					<button onclick="simpandatatindakanlab();" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function batallab() {
		$('#myModal2').modal('toggle');
		// $("#myModalutama").modal('show',{backdrop: 'true'});
		// $("#formmodal").modal('show',{backdrop: 'true'});
	}


	//belum di uji 	
	function simpandatatindakanlab() {
		var noinst = $("#noinst").val();
		var diag = $("#diag").val();

		var markedCheckbox = document.getElementsByName('tnd');
		var hasil = '';
		for (var checkbox of markedCheckbox) {
			if (checkbox.checked) {
				document.body.append(checkbox.value + ' ');
				hasil = hasil + (checkbox.value + '_');
			}
		}
		// console.log(noinst);
		console.log(hasil);

		// if ((hasil == '')) {
		// 	// modalloadtutup();
		// 	kuranglengkap();
		// 	return;
		// }

		$.ajax({
			url: "<?php echo site_url(); ?>/urj/simpanlab",
			type: "GET",
			data: {
				noinst: noinst,
				hasil: hasil,
				diag: diag
			},
			success: function(ajaxData) {
				console.log(ajaxData);
				$('#myModal2').modal('toggle');
			},
			error: function(ajaxData) {
				tdgagalalert();
				modalloadtutup();
			}
		});
	}
	// search 
	$("#cari_item_pemeriksaan").on("keyup", function() {
		let value = $(this).val();

		$(".lab-checkbox").each(function(index, elem) {
			let label = $(elem).find('label').text()

			if (label.toLowerCase().includes(value.toLowerCase())) {
				$(elem).show()
			} else {
				$(elem).hide()
			}
		});
	});
</script>