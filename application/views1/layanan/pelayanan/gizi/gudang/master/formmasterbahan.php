<?php
if ($formpilih == 0) {
?>
<div class="modal-dialog" >
	<div class="modal-content" >
		<div class="form-horizontal">
			<div class="box box-default box-solid" id="kotakform">
				<div class="modal-header">
					<h6 class="modal-title">Tambah Data Master Bahan Makanan</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="box-body">
						<div class="col-sm-12">
							<div class="form-group row col-spacing-row">
								<label class="col-sm-3 control-label">Kode Bahan</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" name="rm" id="kd" >
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label for="inputEmail3" class="col-sm-3 control-label">Nama Bahan</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="nm" id="nm" >
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label for="inputEmail3" class="col-sm-3 control-label">Satuan</label>
								<div class="col-sm-3">
									<select class="form-control prov" style="width: 100%;" name="satuan" id="satuan">
										<?php
										foreach($dtsatuan as $row) {
										?>
										<option value="<?php echo $row->satuanobat; ?>"><?php echo $row->satuanobat; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div> 
							<div class="form-group row col-spacing-row">
								<label for="inputEmail3" class="col-sm-3 control-label">Jenis</label>
								<div class="col-sm-3">
									<select class="form-control prov" style="width: 100%;" name="jenis" id="jenis">
										<option value="BASAH">BASAH</option>
                                        <option value="KERING">KERING</option>
                                        <option value="BUAH">BUAH</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button id="simpanunit" class="btn btn-primary">Simpan</button>
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

	$(document).ready(function () {
		$("#jenis").select2();
		$("#satuan").select2();
	});

	$(document).ready(function () {

		$("#simpanunit").click(function(e) {
			modalform();
			var kd = document.getElementById("kd").value;
			var nm = document.getElementById("nm").value;
			var satuan = $("#satuan").val();
			var satuantext = $("#satuan option:selected").text();
			var jenis = $("#jenis").val();
			var jenistext = $("#jenis option:selected").text();
			
			$.ajax({
				url: "<?php echo site_url();?>/gizi/simpandatabahan",
				type: "GET",
				data: {
					kd: kd,
					nm: nm,
					satuan: satuan,
					satuantext: satuantext,
					jenis: jenis,
					jenistext: jenistext
				},
				success: function (ajaxData){
					if (ajaxData == "1") {
						modalformtutup();
						tutupmodal();
					} else {
						modalformtutup();
						gagalalert();
					}
				}
			});
		});
	});
</script>
<?php
} else if ($formpilih == 1) {
?>
<div class="modal-dialog" >
	<div class="modal-content" >
		<div class="form-horizontal">
			<div class="box box-default box-solid" id="kotakform">
				<div class="modal-header">
					<h6 class="modal-title">Tambah Data Master Unit</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="box-body">
						<div class="col-sm-12 ">
							<div class="form-group row col-spacing-row">
								<label class="col-sm-3 control-label">Kode Unit</label>
								<div class="col-sm-3">
									<input disabled type="text" class="form-control" name="rm" id="kd" value="<?php echo $dtbahan->kode_bahan;?>">
								</div>
							</div>
							<div class="form-group  row col-spacing-row">
								<label for="inputEmail3" class="col-sm-3 control-label">Nama Unit</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="nmpas" id="nm" value="<?php echo $dtbahan->nama_bahan;?>">
								</div>
							</div>
							<div class="form-group  row col-spacing-row">
								<label for="inputEmail3" class="col-sm-3 control-label">Satuan</label>
								<div class="col-sm-3">
									<select class="form-control prov" style="width: 100%;" name="satuan" id="satuan">
										<?php
										foreach($dtsatuan as $row) {
										?>
										<option value="<?php echo $row->satuanobat; ?>" <?php if ($dtbahan->satuan == $row->satuanobat) { echo "selected"; }?>><?php echo $row->satuanobat; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group  row col-spacing-row">
								<label for="inputEmail3" class="col-sm-3 control-label">Jenis</label>
								<div class="col-sm-3">
									<select class="form-control prov" style="width: 100%;" name="jenis" id="jenis">
										<?php
										foreach($dtjenis as $row) {
										?>
										<option value="<?php echo $row->kode_makanan; ?>" <?php if ($dtbahan->jenis == $row->nama_makanan) { echo "selected"; }?> ><?php echo $row->nama_makanan; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button onclick="ubahdata(<?php echo $id;?>)" class="btn btn-primary">Simpan</button>
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

	$(document).ready(function () {
		$("#jenis").select2();
		$("#satuan").select2();
	});

	function ubahdata(id) {
        modalform();
        var kd = document.getElementById("kd").value;
        var nm = document.getElementById("nm").value;
        var satuan = $("#satuan").val();
		var satuantext = $("#satuan option:selected").text();
		var jenis = $("#jenis").val();
		var jenistext = $("#jenis option:selected").text();
        $.ajax({
            url: "<?php echo site_url();?>/gizi/editdatabahan",
            type: "GET",
            data: {
                id: id,
                kd: kd,
                nm: nm,
                satuan: satuan,
				satuantext: satuantext,
				jenis: jenis,
				jenistext: jenistext
            },
            success: function (ajaxData){
                if (ajaxData == "1") {
                    modalformtutup();
                    tutupmodal();
                } else {
                    modalformtutup();
                    gagalalert();
                }
            }
        });
    }
</script>
<?php
}
?>
