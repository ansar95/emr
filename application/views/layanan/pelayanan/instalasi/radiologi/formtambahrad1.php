<?php
if ($formpilih == 0) {
    ?>
    <div class="modal-dialog" >
        <div class="modal-content" >
            <div class="form-horizontal">
                <div class="box box-default box-solid" id="kotakform">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Registrasi Pasien Instalasi Radiologi</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">No. RM</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="rm" id="rm" placeholder="No. RM" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Nama Pasien</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nmpas" id="nmpas" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Dari Unit</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" style="width: 100%;" name="unitdepan" type="text" id="unitdepan">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Golongan</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control pull-right" id="gol" name="gol" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" name="instgl" id="instgl" autocomplete="off">
									</div>
								</div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Dokter Pengirim</label>
                                    <div class="col-sm-6">
                                        <select class="form-control prov" style="width: 100%;" name="provinsi" id="dpengirim">
                                            <?php
                                            foreach($dtdokterpengirim as $row) {
                                                ?>
                                                <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Dokter Penerima</label>
                                    <div class="col-sm-6">
                                        <select class="form-control prov" style="width: 100%;" name="provinsi" id="dpemeriksa">
                                            <?php
                                            foreach($dtdokterpemeriksa as $row) {
                                                ?>
                                                <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Radiografer</label>
                                    <div class="col-sm-6">
                                        <select class="form-control prov" style="width: 100%;" name="radiografer" id="radiografer">
                                            <?php
                                            foreach($dtradiografer as $row) {
                                                ?>
                                                <option value="<?php echo $row->kode_dokter; ?>"><?php echo $row->nama_dokter; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a id="simpanpasien" class="btn btn-primary">Save</a>
                    </div>
                </div>
            </div>
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
            $.notify("Gagal Input Data", "error");
        }

        $(function () {
            $('#unitdepan').select2({ tags :true });
            $('#dpengirim').select2({ tags :true });
            $('#dpemeriksa').select2({ tags :true });
            $('#instgl').datepicker({ autoclose: true }).datepicker("setDate", "0");
            $('#radiografer').select2({ tags :true });
        });

        $(document).ready(function () {

            var dataunit;
            var dataadd;

            $("#rm").on('input',function(e){
                var rm = $("#rm").val();
                $.ajax({
                    url: "<?php echo site_url();?>/iradiologi/caridatarm",
                    type: "GET",
                    data : {rm: rm},
                }).then(function (data) {
                    $("#unitdepan option").remove();
                    var t = JSON.parse(data);
                    dataunit = t;
                    $("#nmpas").val(t[0].nama_pasien);
                    t.forEach(function(entry) {
                        var option = new Option(entry.nama_unit, entry.kode_unit, true, true);
                        $('#unitdepan').append(option).trigger('change');
                    });
                });
            });

            $("#unitdepan").change(function(e) {
                var dtunit = $("#unitdepan option:selected").text();
                dataunit.forEach(function(entry) {
                    if (entry.nama_unit == dtunit) {
                        $("#gol").val(entry.golongan);

                        dataadd = [entry.notransaksi, entry.kode_unit, entry.nama_unit];
                    }
                });
            });

            $("#simpanpasien").click(function(e) {
                e.preventDefault();
                // modalload();
                var nmpas = document.getElementById("nmpas").value;
                var rm = document.getElementById("rm").value;
                var gol = document.getElementById("gol").value;
                var unitdepan = document.getElementById("kdunit").value;
                var unitdepantext = document.getElementById("unit").value;
                var unitasal = $("#unitdepan").val();
                var dpengirim = $("#dpengirim").val();
                var dpengirimtext = $("#dpengirim option:selected").text();
                var dpemeriksa = $("#dpemeriksa").val();
                var dpemeriksatext = $("#dpemeriksa option:selected").text();
                var radiografer = $("#radiografer").val();
                var radiografertext = $("#radiografer option:selected").text();
                var instgl = document.getElementById("instgl").value;
                // console.log(dataadd);
                // if ((tdtgl == "") && (tdjam == "") && (tddokter == "") && (tdtindakan == "") && (tdjml == "")) {
                // 	modalloadtutup();
                // 	return;
                // }
                $.ajax({
                    url: "<?php echo site_url();?>/iradiologi/simpanregisinstalasirad",
                    type: "GET",
                    data : {
                        nmpas: nmpas,
                        dataadd: dataadd,
                        rm: rm,
                        gol: gol,
                        unitdepan: unitdepan,
                        unitdepantext: unitdepantext,
                        dpengirim: dpengirim,
                        dpengirimtext: dpengirimtext,
                        dpemeriksa: dpemeriksa,
                        dpemeriksatext: dpemeriksatext,
                        radiografer: radiografer,
                        radiografertext: radiografertext,
                        unitasal: unitasal,
                        instgl: instgl
                    },
                    success: function (ajaxData){
                        var t = $.parseJSON(ajaxData);

                        if (t.stat == true) {
                            suksesalert();
                            modalloadtutup();
                            tutupmodal(t.dtnotrans);
                            document.getElementById("caridata").click();
                        } else {
                            gagalalert();
                            modalloadtutup();
                        }
                    }
                });
            });

        });

    </script>
    <?php
} else if ($formpilih == 1) {
    ?>
    <div class="modal-dialog" >
        <div class="modal-content" >
            <div class="form-horizontal">
                <div class="box box-default box-solid" id="kotakform">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Edit Pasien Instalasi Radiologi</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">No. RM</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="rm" id="rm" placeholder="No. RM" disabled value="<?php echo $dt->no_rm;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Nama Pasien</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nmpas" id="nmpas" disabled value="<?php echo $dt->nama_pasien;?>">
                                    </div>
                                </div>
                                <!--
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Dari Unit</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control pull-right" id="unitdepan" name="unitdepan" disabled value="<?php echo $dt->nama_unitR;?>">
                                    </div>
                                </div>
                                -->

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Dari Unit</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" style="width: 100%;" name="unitdepan" type="text" id="unitdepan" disabled>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Golongan</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control pull-right" id="gol" name="gol" disabled value="<?php echo $dt->golongan;?>">
                                    </div>
                                </div>
                                <div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
									<div class="col-sm-3">
                                        <!-- <?php $xtglnya=substr($dt->tanggal,5,2).'/'.substr($dt->tanggal,8,2).'/'.substr($dt->tanggal,0,4);?> 
										<input type="text" class="form-control" name="tgli" id="tgli" value="<?php echo $xtglnya;?>">  -->
                                        <input type="text" class="form-control" name="tgli" id="tgli" disabled value="<?php echo $dt->tanggal;?>">
									</div>
								</div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Dokter Pengirim</label>
                                    <div class="col-sm-6">
                                        <select class="form-control prov" style="width: 100%;" name="dpengirim" id="dpengirim">
                                            <?php
                                            foreach($dtdokterpengirim as $row) {
                                                ?>
                                                <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dt->kode_dokter == $row->kode_dokter) { echo "selected"; }?>><?php echo $row->nama_dokter; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Dokter Penerima</label>
                                    <div class="col-sm-6">
                                        <select class="form-control prov" style="width: 100%;" name="dpemeriksa" id="dpemeriksa">
                                            <?php
                                            foreach($dtdokterpemeriksa as $row) {
                                                ?>
                                                <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dt->kode_dokter_periksa == $row->kode_dokter) { echo "selected"; }?>><?php echo $row->nama_dokter; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Radiografer</label>
                                    <div class="col-sm-6">
                                        <select class="form-control prov" style="width: 100%;" name="radiografer" id="radiografer">
                                            <?php
                                            foreach($dtradiografer as $row) {
                                                ?>
                                                <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dt->kode_radiografer == $row->kode_dokter) { echo "selected"; }?>><?php echo $row->nama_dokter; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a onclick="ubahdata(<?php echo $dt->id;?>)" class="btn btn-primary">Ubah</a>
                    </div>
                </div>
            </div>
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
            $.notify("Gagal Input Data", "error");
        }

        $(function () {
            $('#radiografer').select2({ tags :true });
            $('#dpengirim').select2({ tags :true });
            $('#dpemeriksa').select2({ tags :true });
            $('#tgli').datepicker({ autoclose: true }).datepicker();
        });

        $(document).ready(function () {

            var dataunit;
            var dataadd;

            var rm = $("#rm").val();
            $.ajax({
                url: "<?php echo site_url();?>/ilaboratorium/caridatarm",
                type: "GET",
                data : {rm: rm},
            }).then(function (data) {
                $("#unitdepan option").remove();
                var t = JSON.parse(data);
                dataunit = t;
                $("#nmpas").val(t[0].nama_pasien);
                t.forEach(function(entry) {
                    var option = new Option(entry.nama_unit, entry.kode_unit, true, true);
                    $('#unitdepan').append(option).trigger('change');
                });
            });
            
            $("#rm").on('input',function(e){
                var rm = $("#rm").val();
                $.ajax({
                    url: "<?php echo site_url();?>/iradiologi/caridatarm",
                    type: "GET",
                    data : {rm: rm},
                }).then(function (data) {
                    $("#unitdepan option").remove();
                    var t = JSON.parse(data);
                    dataunit = t;
                    $("#nmpas").val(t[0].nama_pasien);
                    t.forEach(function(entry) {
                        var option = new Option(entry.nama_unit, entry.kode_unit, true, true);
                        $('#unitdepan').append(option).trigger('change');
                    });
                });
            });


            $("#unitdepan").change(function(e) {
                var dtunit = $("#unitdepan option:selected").text();
                dataunit.forEach(function(entry) {
                    if (entry.nama_unit == dtunit) {
                        $("#gol").val(entry.golongan);

                        dataadd = [entry.notransaksi, entry.kode_unitR, entry.nama_unitR];
                    }
                });
            });

        });

        function ubahdata(id) {
            var dpengirim = $("#dpengirim").val();
            var dpengirimtext = $("#dpengirim option:selected").text();
            var dpemeriksa = $("#dpemeriksa").val();
            var dpemeriksatext = $("#dpemeriksa option:selected").text();
            var radiografer = $("#radiografer").val();
            var radiografertext = $("#radiografer option:selected").text();
            var tgli = document.getElementById("tgli").value;
            // console.log(dataadd);
            // if ((tdtgl == "") && (tdjam == "") && (tddokter == "") && (tdtindakan == "") && (tdjml == "")) {
            // 	modalloadtutup();
            // 	return;
            // }
            $.ajax({
                url: "<?php echo site_url();?>/iradiologi/ubahregisinstalasirad",
                type: "GET",
                data : {
                    id: id,
                    dpengirim: dpengirim,
                    dpengirimtext: dpengirimtext,
                    dpemeriksa: dpemeriksa,
                    dpemeriksatext: dpemeriksatext,
                    radiografer: radiografer,
                    radiografertext: radiografertext
                },
                success: function (ajaxData){
                    var t = $.parseJSON(ajaxData);

                    if (t.stat == true) {
                        suksesalert();
                        modalloadtutup();
                        suksees();
                        $(function () {
                            $('#formmodal').modal('toggle');
                        });
                        document.getElementById("caridata").click();
                    } else {
                        gagalalert();
                        modalloadtutup();
                    }
                }
            });
        }

    </script>
    <?php
}
?>

