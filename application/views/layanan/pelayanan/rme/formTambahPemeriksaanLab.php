
 <div class="modal-dialog modal-lg modal-dialog-centered" style="margin: 0 auto;">
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
            <div class="modal-header">
                <?php 
                    $ket='';
                    if ($pilihlab == 1) {$ket='Laboratorium Patologi Klinik';}
                    if ($pilihlab == 2) {$ket='Laboratorium Patologi Anatomi';}
                    if ($pilihlab == 3) {$ket='Laboratorium Mikrobiologi';}
                ?>
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $ket ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <input type="hidden" class="form-control" name="notransaksi_INx" id="notransaksi_INx" value="<?php echo $notransaksi_IN;?>">
                <input type="hidden" class="form-control" name="pilihlab" id="pilihlab" value="<?php echo $pilihlab;?>">
            <div class="modal-body">
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Pemeriksaan</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="width: 100%;" name="tindakan" id="tindakan"">
                            <option value=""><?php echo "--- pilih Item ---"; ?></option>
                            <?php
                            foreach ($dtpemeriksaanlab as $row) {
                            ?>
                                <option value="<?php echo $row->kode_tindakan . "_" . $row->tindakan. "_" . $row->jasas; ?>"><?php echo $row->tindakan; ?></option>
                            <?php
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
                            <button onclick="SaveDetailLab()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>

                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
    <script>

        $(document).ready(function() {
            $('#tindakan').select2();
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


        function SaveDetailLab() {
            modalform();
	        var no_rm = document.getElementById("no_rm").value;
	        var notransaksi = document.getElementById("notransaksi").value;
	        var notransaksi_IN = document.getElementById("notransaksi_INx").value;
           

            var tindakan = $("#tindakan").val();
            var hasilPemisahan = tindakan.split("_");
            var kode_tindakan = hasilPemisahan[0]; 
            var nama_tindakan = hasilPemisahan[1]; 
            var jasas = hasilPemisahan[2];

            console.log('save tindakan :');
            console.log(no_rm);
            console.log(notransaksi);
            console.log(notransaksi_IN);
            console.log(kode_tindakan);
            console.log(nama_tindakan);
            console.log(jasas);

            if (kode_tindakan == "" || nama_tindakan == "" || notransaksi_IN == "")  {
                modalformtutup();
                kuranglengkap();
                return;
            }
            $.ajax({
                url: "<?php echo site_url(); ?>/rme/saveItemLab",
                type: "GET",
                data: {
                    no_rm: no_rm,
                    notransaksi: notransaksi,
                    notransaksi_IN: notransaksi_IN,
                    kode_tindakan: kode_tindakan,
                    nama_tindakan: nama_tindakan,
                    jasas: jasas
                },
                success: function(ajaxData) {
                    // console.log(ajaxData);
				    var dt = JSON.parse(ajaxData);
                    $("#orderlab tbody tr").remove();
                    $("#orderlab tbody").append(dt.dtview);
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
