<div class="modal-dialog  modal-l" role="document">
    <div class="modal-content">
        <div class="form-horizontal">
            <div class="box box-default box-solid" id="proseskotak">
                <div class="modal-header">
                    <h5 class="modal-title">Tarik data Pasien dari Ruangan Lain</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group row ml-1">
                            <div class="col-md-4">
                                <label for="inputEmail3" class=" col-form-label">No. RM </label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="norm" autocomplete='off'>
                            </div>
                        </div>
                        <div class="form-group row ml-1">
                            <div class="col-md-4">
                                <label for="inputEmail3" class="control-label">Asal Perawatan </label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-control" style="width: 100%;" name="kamarf" id="kamarf">
                                    <?php
                                    foreach ($dtunit as $row) {
                                    ?>
                                        <option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row ml-1">
                            <label for="inputEmail3" class="col-md-4 control-label">Tanggal Pindah</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control pull-right" id="tglp" name="tglp" required autocomplete='off'>
                            </div>
                        </div>
                        <div class="bootstrap-timepicker">
                            <div class="form-group row ml-2">
                                <label for="inputEmail3" class="col-md-4 control-label">Jam Pindah</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="tdwaktu" id="tdwaktu" required autocomplete='off'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="tarikdatapasien" class="btn btn-primary" style="color: fff;">Tarik Pasien</button>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(function() {
        $('#tglp').datepicker({
            autoclose: true,
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+00"
        }).datepicker("setDate", "0");
        $('#tdwaktu').timepicker({
            showInputs: false,
            minuteStep: 1,
            showMeridian: false
        });
    });

    function modalload() {
        $("#proseskotak").append('<div id="oload" class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
    }

    function modalloadtutup() {
        $("#oload").remove();
    }

    function tutupmodal() {
        $(function() {
            $('#formmodal').modal('toggle');
        });
    }

    function tdsuksesalert() {
        $.notify("Sukses Input Data", "success");
    }

    function tdgagalalert() {
        $.notify("Gagal Input Data", "error");
    }

    function tdkadaalert() {
        $.notify("data dimaksud tidak ada", "error");
    }

    $(function() {
        $('#kamarf').select2();
    });
    $(document).ready(function() {
        $("#tarikdatapasien").click(function(e) {
            modalload();
            // var id = document.getElementById("id").value;
            var kamarf = $("#kamarf").val();
            var kamarftext = $("#kamarf option:selected").text();
            var unit = document.getElementById("unitselect").value;
            var nrp = document.getElementById("norm").value;
            var tglp1 = document.getElementById("tglp").value;
            var tdjam = document.getElementById("tdwaktu").value;

            $.ajax({
                // url: "<?php echo site_url(); ?>/uri/simpankamarregis",
                url: "<?php echo site_url(); ?>/uri/simpantarikpasien",
                type: "GET",
                data: {
                    kamarf: kamarf,
                    kamarftext: kamarftext,
                    unit: unit,
                    nrp: nrp,
                    tglp1: tglp1,
                    tdjam: tdjam
                },
                success: function(ajaxData) {
                    console.log(ajaxData)
                    var t = $.parseJSON(ajaxData);
                    if (t.dtcek == 1) {
                        if (t.dtubah == true) {
                            tdsuksesalert();
                            $("#barispasien tbody tr").remove();
                            $("#barispasien tbody").append(t.dtview);
                            modalloadtutup();
                            tutupmodal();
                        } else {
                            tdgagalalert();
                            modalloadtutup();
                        }
                    } else {
                        tdkadaalert();
                        modalloadtutup();
                    }
                }
            });
        });

    });
</script>