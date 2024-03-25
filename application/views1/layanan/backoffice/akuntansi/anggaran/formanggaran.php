<div class="modal-dialog" style="width:1000px;" >
    <div class="modal-content" >
        <form class="form-horizontal" id="kotakform">
            <div class="box box-default box-solid">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Form Realisasi Anggaran</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Kode</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pb" id="pb">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Anggaran</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pb" id="pb">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Saldo Awal</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pb" id="pb">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Januari</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pb" id="pb">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Februari</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pb" id="pb">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Maret</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pb" id="pb">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">April</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pb" id="pb">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Mei</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pb" id="pb">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Juni</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pb" id="pb">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Juli</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pb" id="pb">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Agustus</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pb" id="pb">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">September</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pb" id="pb">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Oktober</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pb" id="pb">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">November</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pb" id="pb">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Desember</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pb" id="pb">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Sisa Anggaran</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pb" id="pb">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label"></label>
                                <div class="col-sm-8 ">
                                    <button class="btn-sm btn-danger" type="button" >Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--					<div class="row">-->
                    <!--						<div class="col-sm-12">-->
                    <!--							<button type="button" onclick="cetakposting()" class="btn btn-primary">Cetak</button>-->
                    <!--						</div>-->
                    <!--					</div>-->
                </div>
            </div>
            <form>
    </div>
</div>
<script>

    function modalload() {
        $("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
    }

    function modalloadtutup() {
        $(".overlay").remove();
    }

    function suksesalert() {
        $.notify("Sukses Input Data", "success");
    }

    function gagalalert() {
        $.notify("Gagal Proses Data", "error");
    }

    $(function () {
        // $('#tglmasuk').datepicker({ autoclose: true }).datepicker("setDate", "0");
        // $('#tglrujuk').datepicker({ autoclose: true }).datepicker("setDate", "0");
        // $('#jammasuk').timepicker({
        // showInputs: false,
        // minuteStep: 1,
        // showMeridian: false
        // })
        // $('#tp').select2({ tags :true });
        // $('#kp').select2({ tags :true });
        // $('#gol').select2({ tags :true });
        // $('#rujukan').select2({ tags :true });
        // $('#jp').select2({ tags :true });
        // $('#icd').select2({ tags :true });
        // $('#dokter').select2({ tags :true });
    });

    function hitungdata() {
        var res = document.getElementById("res").value;
        var rm = document.getElementById("rm").value;
        $.ajax({
            url: "<?php echo site_url();?>/billing/prosesbillingpostingapotik",
            type: "GET",
            data : {
                rm: rm,
                res: res
            },
            success: function (ajaxData){
                console.log(ajaxData);
                // var t = JSON.parse(ajaxData);
                // if (t.stat == true) {
                //     suksesalert();
                //     modalloadtutup();
                //     tutupmodal(t.dtnotrans);
                // } else if (t.stat == "ada") {
                //     gagalalert();
                //     modalloadtutup();
                //     tutupmodalada();
                // } else {
                //     gagalalert();
                //     modalloadtutup();
                // }
            }
        });
    }

    function bayardata() {
        var res = document.getElementById("res").value;
        var rm = document.getElementById("rm").value;
        var cat = document.getElementById("cat").value;
        var nr = document.getElementById("nr").value;
        var pb = document.getElementById("pb").value;
        $.ajax({
            url: "<?php echo site_url();?>/billing/bayarbillingpostingapotik",
            type: "GET",
            data : {
                rm: rm,
                res: res,
                cat: cat,
                nr: nr,
                pb: pb
            },
            success: function (ajaxData){
                console.log(ajaxData);
                // var t = JSON.parse(ajaxData);
                // if (t.stat == true) {
                //     suksesalert();
                //     modalloadtutup();
                //     tutupmodal(t.dtnotrans);
                // } else if (t.stat == "ada") {
                //     gagalalert();
                //     modalloadtutup();
                //     tutupmodalada();
                // } else {
                //     gagalalert();
                //     modalloadtutup();
                // }
            }
        });
    }

    function cetakposting() {
        var res = document.getElementById("res").value;
        var rm = document.getElementById("rm").value;
        window.open("<?php echo site_url();?>/billing/cetakpostingbillingapotik/"+res+"/"+rm+"", '_blank');
    }

    $(document).ready(function () {

        $("#simpanregis").click(function(e) {
            var rm = document.getElementById("rm").value;
            var tglmasuk = document.getElementById("tglmasuk").value;
            var jammasuk = document.getElementById("jammasuk").value;
            var kunjungan = $("input[name='kunjungan']:checked").val();
            var tp = $("#tp").val();
            var tptext = $("#tp option:selected").text();
            var gol = $("#gol").val();
            var goltext = $("#gol option:selected").text();
            var rujukan = $("#rujukan").val();
            var rujukantext = $("#rujukan option:selected").text();
            var tglrujuk = document.getElementById("tglrujuk").value;
            var sep = document.getElementById("sep").value;
            var jp = $("#jp").val();
            var jptext = $("#jp option:selected").text();
            var icd = $("#icd").val();
            var icdtext = $("#icd option:selected").text();
            var cat = $("#cat").val();
            var dokter = $("#dokter").val();
            var doktertext = $("#dokter option:selected").text();
            var keluhan = $("#keluhan").val();
            var cm = $("#cm").val();
            $.ajax({
                url: "<?php echo site_url();?>/registrasipasien/simpanregisugd",
                type: "GET",
                data : {
                    rm: rm,
                    tglmasuk: tglmasuk,
                    jammasuk: jammasuk,
                    kunjungan: kunjungan,
                    tp: tp,
                    tptext: tptext,
                    gol: gol,
                    goltext: goltext,
                    rujukan: rujukan,
                    rujukantext: rujukantext,
                    tglrujuk: tglrujuk,
                    sep: sep,
                    jp: jp,
                    jptext: jptext,
                    icd: icd,
                    icdtext: icdtext,
                    dokter: dokter,
                    doktertext: doktertext,
                    keluhan: keluhan,
                    cat: cat,
                    cm: cm
                },
                success: function (ajaxData){
                    var t = JSON.parse(ajaxData);
                    if (t.stat == true) {
                        suksesalert();
                        modalloadtutup();
                        tutupmodal(t.dtnotrans);
                    } else if (t.stat == "ada") {
                        gagalalert();
                        modalloadtutup();
                        tutupmodalada();
                    } else {
                        gagalalert();
                        modalloadtutup();
                    }
                }
            });
        });
    });

</script>

