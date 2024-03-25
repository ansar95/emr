<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="form-horizontal">
            <div class="box box-default box-solid" id="proseskotak">
                <div class="modal-header">
                    <h5 class="modal-title">Pilih Kamar Rawat Inap</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="col-sm-12">
                            <input type="hidden" id="id" value="<?php echo $dtidp ?>" readonly />
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-12 control-label">Kamar yang ditempati</label>
                                <div class="col-sm-8">
                                    <select class="form-control" style="width: 100%;" name="kamarf" id="kamarf">
                                        <?php
                                        foreach ($dtkamar as $row) {
                                            if ($row->kode_kamar == $dtkode) {
                                        ?>
                                                <option value="<?php echo $row->kode_kamar; ?>" selected><?php echo $row->nama_kamar; ?></option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="<?php echo $row->kode_kamar; ?>"><?php echo $row->nama_kamar; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-12">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="cektitipan" id="cektitipan">
                                    <label class="custom-control-label" for="cektitipan">Pasien Titipan, dari Unit/Kamar (Pilih sesuai Hak Kelas)</label>
                                </div>
                            </div>
                            <!-- unit dan kamarnya -->

                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-1 col-form-label">Unit</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" style="width: 100%;" name="pkunit" id="pkunit" disabled onchange="carikamar() ">
                                            <option value="">--pilihan--</option>
                                            <?php
                                            foreach ($dtunit as $row) {
                                            ?>
                                                <!-- <option value="<?php echo $row->kode_unit . "_" . $row->kode_kelas . "_" . $row->nama_unit; ?>"><?php echo $row->nama_kelas; ?></option> -->
                                                <option value="<?php echo $row->kode_unit . "_" . $row->kode_kelas . "_" . $row->nama_unit; ?>"><?php echo $row->nama_kelas; ?></option>
                                            <?php
                                            }
                                            ?>
                                            <!-- <option value="<?php echo '0249' . "_" . '' . "_" . 'KAMAR BERSALIN'; ?>"><?php echo 'KAMAR BERSALIN'; ?></option>	 -->
                                        </select>
                                    </div>
                                    <label class="col-sm-1 col-form-label">Kamar</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" style="width: 100%;" name="kamar" type="text" id="kamar" disabled>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="simpandokter" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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

    $(function() {
        $('#kamarf').select2();
        $('#pkunit').select2();
        $('#kamar').select2();
    });
    var kode_kamar = '';
    function getTitipan(id) {
        $.ajax({
            url: "<?php echo site_url(); ?>/uri/gettitipan",
            type: "POST",
            data: {
                id: id,
            },
            success: function(data) {
                let titip = JSON.parse(data).dtkodekelashak
                if (titip) {
                    let kode_kelas_hak = titip.kode_kelas_hak;
                    let kode_unit = titip.kode_unit;
                    let kode_kelas = titip.kode_kelas;
                    let nama_unit = titip.nama_unit;
                    kode_kamar = titip.kode_kamar;
                    $('#cektitipan').prop('checked', true).trigger('change');
                    $('#pkunit').val(`${kode_unit}_${kode_kelas}_${nama_unit}`).trigger('change');
                }
            }
        });
    }

    $(document).ready(function() {
        let id = document.getElementById("id").value;
        getTitipan(id)
        $("#simpandokter").click(function(e) {
            modalload();
            let kamarf = $("#kamarf").val();
            let kamarftext = $("#kamarf option:selected").text();
            let unit = document.getElementById("unitselect").value;
            let nrp = document.getElementById("nrp").value;

            let cektitipan = $("#cektitipan").prop('checked');
            let pkunithak = $("#pkunit").val();
            let kamarhak = $("#kamar").val();
            // alert(cektitipan);
            // alert(pkunithak);
            if (kamarhak == null) {
                let kamarhak = '';
                // alert('kosong...'+kamarhak);
            } else {
                // alert(kamarhak);
            }

            $.ajax({
                url: "<?php echo site_url(); ?>/uri/simpankamarregis",
                type: "GET",
                data: {
                    id: id,
                    kamarf: kamarf,
                    kamarftext: kamarftext,
                    unit: unit,
                    nrp: nrp,
                    pkunithak: pkunithak,
                    kamarhak: kamarhak,
                    cektitipan: cektitipan
                },
                success: function(ajaxData) {
                    let t = $.parseJSON(ajaxData);

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
                }
            });
        });

    });

    function carikamar() {
        let pkunit = $("#pkunit").val();
        $.ajax({
            url: "<?php echo site_url(); ?>/registrasipasien/ambilpindahkamar",
            type: "GET",
            data: {
                pkunit: pkunit
            },
        }).then(function(data) {
            $("#kamar option").remove();
            let t = JSON.parse(data);
            let op = new Option("--Pilih--", "-", true, true);
            $('#kamar').append(op).trigger('change');
            t.forEach(function(entry) {
                let option = new Option(entry.nama_kamar, entry.kode_kamar, false, false);
                $('#kamar').append(option);
            });
            console.log(kode_kamar)
            if(kode_kamar.length >0) $('#kamar').val(kode_kamar).trigger('change');
        });
    }

    $('#cektitipan').change(function() {
        if ($(this).is(":checked")) {
            $('#pkunit').prop('disabled', false);
            $('#kamar').prop('disabled', false);
            $('#kamar').prop('required', true);
        } else {
            $('#pkunit').prop('disabled', true);
            $('#kamar').prop('disabled', true);
            $('#kamar').prop('required', false);
        }
    });
</script>