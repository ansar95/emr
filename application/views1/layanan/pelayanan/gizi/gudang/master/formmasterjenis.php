<?php
if ($formpilih == 0) {
?>

<div class="modal-dialog" >
	<div class="modal-content" >
		<div class="form-horizontal">
			<div class="box box-default box-solid" id="kotakform">
				<div class="modal-header">
					<h6 class="modal-title">Tambah Data Master Jenis</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					
				</div>
				<div class="modal-body">
					<div class="box-body">
						<div class="col-sm-12">
							<div class="form-group row col-spacing-row">
								<label class="col-sm-5 control-label">Kode Jenis</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" name="rm" id="kd" >
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label for="inputEmail3" class="col-sm-5 control-label">Nama Makanan</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="nm" id="nm" >
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

		$("#simpanunit").click(function(e) {
			modalform();
			var kd = document.getElementById("kd").value;
			var nm = document.getElementById("nm").value;
			$.ajax({
				url: "<?php echo site_url();?>/gizi/simpandatajenis",
				type: "GET",
				data: {
					kd: kd,
					nm: nm
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
					<h6 class="modal-title">Ubah Data Master Jenis</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="box-body">
						<div class="col-sm-12">
							<div class="form-group row col-spacing-row">
								<label class="col-sm-4 control-label">Kode Unit</label>
								<div class="col-sm-3">
									<input disabled type="text" class="form-control" name="rm" id="kd" value="<?php echo $dtjenis->kode_makanan;?>">
								</div>
							</div>
							<div class="form-group row col-spacing-row">
								<label for="inputEmail3" class="col-sm-4 control-label">Nama Unit</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="nmpas" id="nm" value="<?php echo $dtjenis->nama_makanan;?>">
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

	function ubahdata(id) {
        modalform();
        var kd = document.getElementById("kd").value;
        var nm = document.getElementById("nm").value;
        $.ajax({
            url: "<?php echo site_url();?>/gizi/editdatajenis",
            type: "GET",
            data: {
                id: id,
                kd: kd,
				nm: nm
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
