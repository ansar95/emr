
 <div class="modal-dialog modal-lg modal-dialog-centered" style="margin: 0 auto;">
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel"><?php echo 'Hapus Data Order Radiologi' ?></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-6">
                        <?php echo '<span style="font-size: 20px;">' . $dtDetailRad->namatindakan . '</span> Ingin Dihapus ?'; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-right">
                        <button onclick="hapusrad(<?php echo $dtDetailRad->id; ?>)" class="btn btn-danger">Hapus</button>
                    </div>
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
                $("#formmodal").modal("toggle");
            });
        }

        function kuranglengkap() {
            $.notify("Data Kurang Lengkap", "error");
        }


        function hapusrad(id) {
            modalform();
            var no_rm = document.getElementById("no_rm").value;
	        var kode_dokter = document.getElementById("kode_dokter").value;
	        var notransaksi = document.getElementById("notransaksi").value;
            console.log(no_rm);
            console.log(kode_dokter);
            console.log(notransaksi);
            // var kodeobat = $("#kodeobat").val();
            $.ajax({
                url: "<?php echo site_url(); ?>/rme/hapusRadRme",
                type: "GET",
                data: {
                    id: id,
                    // kodeobat: kodeobat,
                    no_rm :no_rm,
                    kode_dokter : kode_dokter,
                    notransaksi : notransaksi
                },
                success: function(ajaxData) {
                    console.log(ajaxData);
				    var dt = JSON.parse(ajaxData);
                    // console.log(dt);

                    $("#orderrad tbody tr").remove();
                    $("#orderrad tbody").append(dt.dtview);
                    modalformtutup();
                    tutupmodal();
                    },
                error: function(ajaxData) {
                    modalformtutup();
                    tutupmodal();
                }
            });
        }

    </script>
