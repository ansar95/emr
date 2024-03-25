
 <div class="modal-dialog modal-lg modal-dialog-centered" style="margin: 0 auto;">
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Diagnosa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="form-group row">
                <label for="username" class="col-sm-1 col-form-label text-left">Type</label>
                <div class="col-sm-9 d-flex align-items-center">
                    <input type="radio" id="diagnosa_utama" name="typediagnosa" value="1" checked>
                    <label for="diagnosa_utama" class="mb-0 ml-2">Diagnosa Utama</label>
                    <span style="margin-right: 15px;"></span>
                    <input type="radio" id="diagnosa_sekunder" name="typediagnosa" value="0">
                    <label for="diagnosa_sekunder" class="mb-0 ml-2">Diagnosa Sekunder</label>
                </div>
            </div>

            <div class="form-group row">
                    <label for="username" class="col-sm-1 col-form-label text-left">Diagnosa</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="width: 100%;" name="diagnosa" id="diagnosa">
                            <option value=""><?php echo "--- pilih diagnosa ---"; ?></option>
                            <?php
                            foreach ($dtdiagnosa as $row) {
                            ?>
                                <option value="<?php echo $row->icd_code?>"><?php echo $row->icd_code.'-'.$row->jenis_penyakit_local; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
            </div>

            <div class="form-group row"> 
                <div class="col-6">
                    <!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
                </div>
                <div class="col-6 text-right">
                    <button onclick="SaveDiagnosa()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>


    <script>

        $(document).ready(function() {
            $('#diagnosa').select2();
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


        function SaveDiagnosa() {
            modalform();
            var no_rm = document.getElementById("no_rm").value;
	        var kode_dokter = document.getElementById("kode_dokter").value;
	        var notransaksi = document.getElementById("notransaksi").value;
	        var tgl_masuk = document.getElementById("tgl_masuk").value;
            console.log(no_rm);
            console.log(kode_dokter);
            console.log(notransaksi);

            var type = $("input[name='typediagnosa']:checked").val();
            var diag = $("#diagnosa").val();
			var diagtext = $("#diagnosa option:selected").text();

            // alert(type+' '+diag+' '+diagtext)
            if ((diag == "") || (diagtext == "")) {
                kuranglengkap();
                modalloadtutup();
                return;
            }
            $.ajax({
                url: "<?php echo site_url(); ?>/rme/saveDiagnosaranap",
                type: "GET",
                data: {
                    type : type,
                    diag : diag,
                    diagtext : diagtext,
                    no_rm :no_rm,
                    kode_dokter : kode_dokter,
                    notransaksi : notransaksi,
                    tgl_masuk : tgl_masuk
                },
                success: function(ajaxData) {
                    console.log(ajaxData);
				    var dt = JSON.parse(ajaxData);
                    $("#orderdiag tbody tr").remove();
                    $("#orderdiag tbody").append(dt.dtview);
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
