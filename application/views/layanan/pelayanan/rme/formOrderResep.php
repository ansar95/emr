
 <div class="modal-dialog modal-lg modal-dialog-centered" style="margin: 0 auto;">
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Resep Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Dokter</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="width: 100%;" name="dokterf" id="dokterf">
						<?php
						foreach ($dtDPJP as $row) {
							if ($row->kode_dokter == $kode_dokter_cek) {
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


                    <br>
                    <div class="row">
                        <div class="col-6">
                            <!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
                        </div>
                        <div class="col-6 text-right">
                            <button onclick="SaveOrderHeader()" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>

                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
    <script>

        $(document).ready(function() {
            $('#dokterf').select2();
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



        function SaveOrderHeader() {
            modalform();
            var no_rm = document.getElementById("no_rm").value;
	        var notransaksi = document.getElementById("notransaksi").value;
	        var dokterf = document.getElementById("dokterf").value;
			var dokterftext = $("#dokterf option:selected").text();
	        var kode_unit = document.getElementById("kode_unit").value;
            var nama_unit = document.getElementById("nama_unit").value;

            console.log(no_rm);
            console.log(notransaksi);
            console.log(dokterf);
            console.log(dokterftext);
            console.log(kode_unit);
            console.log(nama_unit);

            $.ajax({
                url: "<?php echo site_url(); ?>/rme/saveOrderHeader",
                type: "GET",
                data: {
                    no_rm :no_rm,
                    notransaksi : notransaksi,
                    dokterf : dokterf,
                    dokterftext : dokterftext,
                    kode_unit : kode_unit,
                    nama_unit : nama_unit
                },
                success: function(ajaxData) {
                    console.log(ajaxData);
				    var dt = JSON.parse(ajaxData);
                    $("#orderresep tbody tr").remove();
                    $("#orderresep tbody").append(dt.dtview);
                    modalformtutup();
                    tutupmodal();


                    },
                error: function(ajaxData) {
                    modalformtutup();
                    // gagalalert();
                }
            });
        }

    </script>
