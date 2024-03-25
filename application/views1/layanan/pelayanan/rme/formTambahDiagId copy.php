
 <div class="modal-dialog modal-lg modal-dialog-centered" style="margin: 0 auto;">
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Obat Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Item</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="width: 100%;" name="produk" id="produk" onchange="caridiag()">
                            <option value=""><?php echo "--- pilih obat ---"; ?></option>
                            <?php
                            foreach ($dtdiagnosa as $row) {
                            ?>
                                <option value="<?php echo $row->kodeobat . "_" . $row->id; ?>"><?php echo $row->namaobat; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
					<div class="form-group row col-spacing-row">
						<div class="custom-control custom-checkbox custom-control-inline">
							<input type="checkbox" class="custom-control-input" name="diagutama" id="diagutama" />
							<label class="custom-control-label" for="diagutama">Diagnosa Utama</label>
						</div>
					</div>
				</div>
				<div class="col-md-5">
			        <div class="form-group row col-spacing-row">
						<label class="col-md-3 col-form-label">Kode ICD</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="daftar" name="daftar" disabled>
					    </div>
					</div>
					<div class="form-group row col-spacing-row">
					<label class="col-md-3 col-form-label">No. DTD</label>
					<div class="col-md-9">
						<input type="text" class="form-control" id="dtd" name="dtd" disabled>
					</div>
				</div>
				</div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <button onclick="Batal()" class="btn btn-danger">Batal</button>
                        </div>
                        <div class="col-6 text-right">
                            <button onclick="SaveDetail()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>

                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
    <script>

        $(document).ready(function() {
            $('#produk').select2();
        });

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

        function kuranglengkap() {
            $.notify("Data Kurang Lengkap", "error");
        }

    </script>
