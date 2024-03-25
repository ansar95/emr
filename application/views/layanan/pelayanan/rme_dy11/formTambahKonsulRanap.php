
 <div class="modal-dialog modal-lg modal-dialog-centered" style="margin: 0 auto;">
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lembar Konsul</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="form-group row col-spacing-row">
											<label class="col-md-2 col-form-label">Tanggal</label>
											<div class="col-md-3">
												<input type="date" class="form-control"  name="tanggal" id="tanggal">
											</div>
					</div>
					<div class="form-group row col-spacing-row">
											<label class="col-md-2 col-form-label">Jam</label>
											<div class="col-md-3">
												<input type="time" class="form-control"  name="jam" id="jam" >
											</div>
					</div>
            <div class="form-group row mt-1">
                    <label for="kode_unit_tujuan" class="col-sm-2 col-form-label text-left">Dari Dokter</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="width: 100%;" name="kode_dokter_asal" id="kode_dokter_asal">
                            <option value=""><?php echo "--- pilih ---"; ?></option>
                            <?php
                            foreach ($dtdokter as $row) {
                            ?>
                                <!-- <option value="<?php echo $row->kode_dokter?>" ><?php echo $row->nama_dokter;?></option> -->
                                <option value="<?php echo $row->kode_dokter?>" <?php if ($kode_dokter==trim($row->kode_dokter)) {echo "selected";} ?>><?php echo $row->nama_dokter;?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
            </div>
            <div class="form-group row col-spacing-row">
				<label class="col-md-6 col-form-label">Isi Lembar Konsul</label>
			</div>
            <div class="col-md-12">
				<textarea rows="7" name="konsul" id="konsul" class="form-control"></textarea>
			</div>
            <div class="form-group row mt-3">
                    <label for="kode_unit_tujuan" class="col-sm-2 col-form-label text-left">Dokter Tujuan</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="width: 100%;" name="kode_dokter_tujuan" id="kode_dokter_tujuan">
                            <option value=""><?php echo "--- pilih ---"; ?></option>
                            <?php
                            foreach ($dtdokter as $row) {
                            ?>
                                <option value="<?php echo $row->kode_dokter?>"><?php echo $row->nama_dokter;?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
            </div>
            
            <div class="form-group row mt-2"> 
                <div class="col-6 text-left">
                    <button onclick="saveKonsul()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                </div>
                <div class="col-6">
                    <!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
                </div>
            </div>
        </div>
    </div>
</div>


    <script>

        $(document).ready(function() {
            $('#kode_dokter_asal').select2();
            $('#kode_dokter_tujuan').select2();
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


        function saveKonsul() {
            modalform();
            var no_rm = document.getElementById("no_rm").value;
            var kode_dokter = document.getElementById("kode_dokter_asal").value;
            var nama_dokter = $("#kode_dokter_asal option:selected").text();
            var notransaksi = document.getElementById("notransaksi").value;
            var kode_unit = document.getElementById("kode_unit").value;
            var nama_unit = document.getElementById("nama_unit").value;
            var tanggal = document.getElementById("tanggal").value;
            var jam = document.getElementById("jam").value;
            var konsul = document.getElementById("konsul").value;
            var kode_dokter_tujuan = $("#kode_dokter_tujuan").val();
			var nama_dokter_tujuan = $("#kode_dokter_tujuan option:selected").text();

            // alert(notransaksi+' '+tanggal)
            if ((kode_dokter_tujuan == "") || (nama_dokter_tujuan == "")) {
                kuranglengkap();
                modalloadtutup();
                return;
            }
            $.ajax({
                url: "<?php echo site_url(); ?>/rme/saveKonsulRanap",
                type: "GET",
                data: {
                    no_rm : no_rm,
                    kode_dokter : kode_dokter,
                    nama_dokter : nama_dokter,
                    notransaksi : notransaksi,
                    kode_unit : kode_unit,
                    nama_unit : nama_unit,
				    tanggal : tanggal,
				    jam : jam,
				    konsul : konsul,
				    kode_dokter_tujuan : kode_dokter_tujuan,
				    nama_dokter_tujuan : nama_dokter_tujuan
                },
                success: function(ajaxData) {
                    console.log(ajaxData);
				    var dt = JSON.parse(ajaxData);
                    $("#tabellembarkonsul tbody tr").remove();
                    $("#tabellembarkonsul tbody").append(dt.dtview);
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
