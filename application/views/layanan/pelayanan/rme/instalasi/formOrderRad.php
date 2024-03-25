
<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css">

 <div class="modal-dialog modal-lg modal-dialog-centered" style="margin: 0 auto;">
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Radiologi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<input type="hidden" class="form-control"  name="rirj" id="rirj" value="<?php echo $rirj; ?>">
				<input type="hidden" class="form-control"  name="tgl_masuk" id="tgl_masuk" value="<?php echo $tgl_masuk; ?>">
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Dokter</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="width: 100%; border: 1px solid gray;" name="dokterf" id="dokterf">
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
                <div class="form-group row col-spacing-row">
					<label class="col-md-2 col-form-label">Tanggal</label>
					<div class="col-md-3">
						<input type="date" class="form-control"  name="tanggal" id="tanggalorder" style="border: 1px solid gray;" value="<?= date('Y-m-d'); ?>">
					</div>
					<label class="col-md-1 col-form-label">Jam</label>
					<div class="col-md-3">
						<input type="time" class="form-control"  name="jam" id="jamorder" style="border: 1px solid gray;" value="<?= date('H:i:s'); ?>">
					</div>
				</div>
                <div class="form-group row col-spacing-row mt-2">
					<label class="col-md-2 col-form-label">Diagnosa</label>
					<div class="col-md-9">
                        <input type="text" class="form-control" name="diagnosa" id="diagnosa" style="border: 1px solid gray;">
					</div>
				</div>
                <br>
                <div class="row">
                    <div class="col-6">
                        <!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
                    </div>
                    <div class="col-6 text-right">
                        <button onclick="SaveOrderHeaderRad()" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
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



        function SaveOrderHeaderRad() {
            modalform();
            var no_rm = document.getElementById("no_rm").value;
	        var notransaksi = document.getElementById("notransaksi").value;
	        var dokterf = document.getElementById("dokterf").value;
			var dokterftext = $("#dokterf option:selected").text();
	        var kode_unit = document.getElementById("kode_unit").value;
            var nama_unit = document.getElementById("nama_unit").value;
            var kode_kelas = document.getElementById("kode_kelas").value;
            var nama_kelas = document.getElementById("nama_kelas").value;
            var kode_kamar = document.getElementById("kode_kamar").value;
            var diagnosa = document.getElementById("diagnosa").value;
            var rirj = document.getElementById("rirj").value;
            var tgl_masuk = document.getElementById("tgl_masuk").value;
		    var pilihunitlab = $("input[name='pilihunitlab']:checked").val();

            
            console.log(no_rm);
            console.log(notransaksi);
            console.log(dokterf);
            console.log(dokterftext);
            console.log(kode_unit);
            console.log(nama_unit);
            console.log(pilihunitlab);

            if (dokterf == "" || dokterftext == "" || diagnosa == "" || pilihunitlab == 0)  {
                modalformtutup();
                kuranglengkap();
                return;
            }
            $.ajax({
                url: "<?php echo site_url(); ?>/rme/saveOrderHeaderRad",
                type: "GET",
                data: {
                    no_rm :no_rm,
                    notransaksi : notransaksi,
                    dokterf : dokterf,
                    dokterftext : dokterftext,
                    kode_unit : kode_unit,
                    nama_unit : nama_unit,
                    kode_kelas : kode_kelas,
                    nama_kelas : nama_kelas,
                    kode_kamar : kode_kamar,
                    diagnosa : diagnosa,
                    rirj : rirj,
                    tgl_masuk : tgl_masuk,
                    pilihunitlab : pilihunitlab
                },
                success: function(ajaxData) {
                    console.log(ajaxData);
				    var dt = JSON.parse(ajaxData);
                    $("#orderrad tbody tr").remove();
                    $("#orderrad tbody").append(dt.dtview);
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
