
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
				<label class="col-md-6 col-form-label">Lembar Konsul</label>
			</div>
            <div class="col-md-12">
				<textarea readonly rows="5" name="konsul" id="konsul" class="form-control"><?php echo $dtkonsulid->konsul;?></textarea>
			</div>
            <input type="hidden" class="form-control" id="idnya" value="<?php echo $dtkonsulid->id;?>">

            <div class="form-group row col-spacing-row">
				<label class="col-md-6 col-form-label">Jawaban Konsul</label>
			</div>
            <div class="col-md-12">
				<textarea rows="5" name="jawaban" id="jawaban" class="form-control"><?php echo $dtkonsulid->jawaban;?></textarea>
			</div>
            <div class="form-group row mt-2"> 
                <div class="col-6">
                    <!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
                </div>
                <div class="col-6 text-right">
                    <button onclick="savejawabankonsul()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                    <!-- <button onclick="saveKonsul()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button> -->

                </div>
            </div>
        </div>
    </div>
</div>


    <script>

        $(document).ready(function() {
            $('#kode_unit_tujuan').select2();
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


        function savejawabankonsul() {
            modalform();
            var no_rm = document.getElementById("no_rm").value;
            var id = document.getElementById("idnya").value;
            var kode_dokter_jawab = document.getElementById("kode_dokter").value;
            var nama_dokter_jawab = document.getElementById("nama_dokter").value;
            var tanggal = document.getElementById("tgl_masuk").value;
            var jawaban = document.getElementById("jawaban").value;
            var kode_unit = document.getElementById("kode_unit").value;
            // alert(kode_dokter_jawab+' '+nama_dokter_jawab+' '+jawaban+' '+id);
            $.ajax({
                url: "<?php echo site_url(); ?>/rme/savejawabkonsul",
                type: "GET",
                data: {
                    no_rm : no_rm,
                    id : id,
                    kode_dokter_jawab : kode_dokter_jawab,
                    nama_dokter_jawab : nama_dokter_jawab,
                    kode_unit : kode_unit,
				    tanggal : tanggal,
				    jawaban : jawaban
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

        function saveJawabanKonsulxx() {
            modalform();
            var id = document.getElementById("idnya").value;
            var kode_dokter_jawab = document.getElementById("kode_dokter").value;
            var nama_dokter_jawab = document.getElementById("nama_dokter").value;
            var tanggal = document.getElementById("tgl_masuk").value;
            var jawaban = document.getElementById("jawaban").value;
            $.ajax({
                url: "<?php echo site_url(); ?>/rme/saveJawabKonsul",
                type: "GET",
                data: {
                    id : id,
                    kode_dokter_jawab : kode_dokter,
                    nama_dokter_jawab : nama_dokter,
				    tanggal : tanggal,
				    jawaban : jawaban
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
