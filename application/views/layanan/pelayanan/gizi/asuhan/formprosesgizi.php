<div class="modal-dialog" >
	<div class="modal-content" >
		<div class="form-horizontal">
			<div class="box box-default box-solid" id="kotakform">
				<div class="modal-header">
					<h6 class="modal-title">Proses Diet Pasien</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="box-body">
						<div class="col-sm-12">
							<div class="form-group row col-spacing-row">
								<label class="col-sm-4 control-label">No. RM</label>
								<div class="col-sm-3">
									<input disabled type="text" class="form-control" name="norm" id="norm" value="<?php echo $dtdiet->no_rm;?>">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label for="inputEmail3" class="col-sm-4 control-label">Bentuk Makanan</label>
								<div class="col-sm-8">
									<select class="form-control" style="width: 100%;" name="bentuk" id="bentuk">
										<?php
										foreach($dtbentuk as $row) {
											if ($row->kode_bentuk == $dtkdbentuk) {
										?>
										<option value="<?php echo $row->kode_bentuk; ?>" selected><?php echo $row->nama_bentuk; ?></option>
										<?php
											} else {
										?>
										<option value="<?php echo $row->kode_bentuk; ?>"><?php echo $row->nama_bentuk; ?></option>
										<?php
											}
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label for="inputEmail3" class="col-sm-4 control-label">Pagi</label>
								<div class="col-sm-8">
									<select class="form-control" style="width: 100%;" name="pagi" id="pagi">
										<?php
										foreach($dtmakanan as $row) {
											if ($row->kode_makanan == $dtkdpagi) {
										?>
										<option value="<?php echo $row->kode_makanan; ?>" selected><?php echo $row->nama_makanan; ?></option>
										<?php
											} else {
										?>
										<option value="<?php echo $row->kode_makanan; ?>"><?php echo $row->nama_makanan; ?></option>
										<?php
											}
										}
										?>
									</select>
								</div>
							</div>

							<div class="form-group row col-spacing-row">
								<label for="inputEmail3" class="col-sm-4 control-label">Siang</label>
								<div class="col-sm-8">
									<select class="form-control" style="width: 100%;" name="siang" id="siang">
										<?php
										foreach($dtmakanan as $row) {
											if ($row->kode_makanan == $dtkdsiang) {
										?>
										<option value="<?php echo $row->kode_makanan; ?>" selected><?php echo $row->nama_makanan; ?></option>
										<?php
											} else {
										?>
										<option value="<?php echo $row->kode_makanan; ?>"><?php echo $row->nama_makanan; ?></option>
										<?php
											}
										}
										?>
									</select>
								</div>
							</div>

							<div class="form-group row col-spacing-row">
								<label for="inputEmail3" class="col-sm-4 control-label">Malam</label>
								<div class="col-sm-8">
									<select class="form-control" style="width: 100%;" name="malam" id="malam">
										<?php
										foreach($dtmakanan as $row) {
											if ($row->kode_makanan == $dtkdmalam) {
										?>
										<option value="<?php echo $row->kode_makanan; ?>" selected><?php echo $row->nama_makanan; ?></option>
										<?php
											} else {
										?>
										<option value="<?php echo $row->kode_makanan; ?>"><?php echo $row->nama_makanan; ?></option>
										<?php
											}
										}
										?>
									</select>
								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="modal-footer text-right">
					<button onclick="ubahdatadiet(<?php echo $dtdiet->id;?>)" class="btn btn-primary">Simpan</button>
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
			$('#formmodal').modal('toggle');
		});
		suksesalert(0);
		// load_country_data(1);
	}
	function tdsuksesalert() {
		$.notify("Sukses Input Data", "success");
	}
	function ubahdatadiet(id) {
        modalform();
		var tanggal = document.getElementById("tgl").value;
		var kode_unit = document.getElementById("ruang").value;
		console.log(tanggal);
		var kdbentuk = $("#bentuk").val();
		var bentuk = $("#bentuk option:selected" ).text();
		// console.log(tanggal);
		var kdpagi = $("#pagi").val();
		var nmpagi = $("#pagi option:selected" ).text();
		var kdsiang = $("#siang").val();
		var nmsiang = $("#siang option:selected" ).text();
		var kdmalam = $("#malam").val();
		var nmmalam = $("#malam option:selected" ).text();
        $.ajax({
            url: "<?php echo site_url();?>/gizi/editdatadiet",
            type: "GET",
            data: {
                id: id,
				kdbentuk : kdbentuk,
				bentuk : bentuk,
                kdpagi: kdpagi,
				nmpagi: nmpagi,
				kdsiang: kdsiang,
				nmsiang: nmsiang,
				kdmalam: kdmalam,
				nmmalam: nmmalam,
				tanggal:tanggal,
				kode_unit:kode_unit
            },
			success: function (ajaxData){
					var t = $.parseJSON(ajaxData);
					
					if (t.dtsimpan == true) {
						console.log(t.dtview);
						// modalformtutup();
						tutupmodal();
						$("#barispasien tbody tr").remove();
						$("#barispasien tbody").append(t.dtview);
						
					} else {
						tdgagalalert();
						modalformtutup();
					}
				}
        });
    }
</script>
