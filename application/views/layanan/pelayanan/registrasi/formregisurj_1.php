<?php
if ($formpilih == 0) {
?>
    <div class="modal-dialog" style="width:1200px;" >
        <div class="modal-content" >
            <form class="form-horizontal" id="kotakform">
                <div class="box box-default box-solid">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Registrasi Unit Rawat Jalan</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Data Pasien</h3>
                            </div>
                            <div class="box-body">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">No. RM</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="rm" id="rm" value="<?php echo $dtpasien->no_rm;?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"  value="<?php echo $dtpasien->nama_pasien;?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?php echo $dtpasien->alamat;?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Golongan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?php echo $dtpasien->golongan;?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Asuransi</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?php echo $dtpasien->asuransi;?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Hak Kelas</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?php echo $dtpasien->kelashak;?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">No. Kartu</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?php echo $dtpasien->no_askes;?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Registrasi</h3>
                            </div>
                            <div class="box-body">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Tgl. Masuk*</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="tglmasuk" id="tglmasuk">
                                        </div>
                                    </div>
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <label   class="col-sm-3 control-label">Jam Masuk*</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="jammasuk" id="jammasuk">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Kunjungan*</label>
                                        <div class="col-sm-9">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="kunjungan" id="kunjungan2" value="2" checked>
                                                    Lama
                                                </label> &nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="kunjungan" id="kunjungan" value="1">
                                                    Baru
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Tujuan Perawatan*</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" style="width: 100%;" name="tp" id="tp" onchange="filterdokter(1)">
                                                <?php
                                                foreach($tujuanperawatan as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Penjamin*</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" style="width: 100%;" name="gol" id="gol" onchange="changegol(1);">
                                                <option value="">--Pilih--</option>
                                                <?php
                                                foreach($golongan as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->golongan; ?>" <?php if ($dtpasien->golongan == $row->golongan) { echo "selected";}?> > <?php echo $row->golongan; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label"></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" style="width: 100%;" name="goldet" id="goldet">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Rujukan*</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" style="width: 100%;" name="rujukan" id="rujukan">
                                                <?php
                                                foreach($rujukan as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->rujukan; ?>"><?php echo $row->rujukan; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Faskes</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" style="width: 100%;" name="faskes" id="faskes">
                                                <?php
                                                foreach($dtfaskes as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->kode_faskes; ?>" ><?php echo $row->faskes; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Cara Masuk*</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" style="width: 100%;" name="cm" id="cm">
                                                <option value="LOKET">LOKET</option>
                                                <option value="POLI">POLI</option>
                                                <option value="UGD">UGD</option>
                                            </select>
                                        </div>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Rujukan Dokter</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" style="width: 100%;" name="dokterluar" id="dokterluar">
                                                <?php
                                                foreach($dtdokterluar as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->kode; ?>" ><?php echo $row->nama; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>


                                    
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Tgl. Rujukan*</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="tglrujuk" id="tglrujuk">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Keluhan Awal</label>
                                        <div class="col-sm-9">
                                            <textarea rows="3" class="form-control" name="keluhan" id="keluhan"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Jenis Pelayanan*</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" style="width: 100%;" name="jp" id="jp">
                                                <?php
                                                foreach($jnspelayanan as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->jenislayanan; ?>" ><?php echo $row->jenislayanan; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Diagnosa*</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" style="width: 100%;" name="icd" id="icd">
                                                <?php
                                                foreach($dticd as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->icd_code; ?>" ><?php echo $row->icd_code . " - " . $row->jenis_penyakit_local; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">No. SEP</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="sep" id="sep">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">DPJP*</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" style="width: 100%;" name="dokter" id="dokter">
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Catatan</label>
                                        <div class="col-sm-9">
                                            <!--                                    <input type="text" class="form-control" name="cat" id="cat">-->
                                            <textarea rows="3" class="form-control" name="cat" id="cat"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="row text-right">
                                    <div class="col-sm-12">
                                        <a id="simpanregis" class="btn btn-primary">Simpan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row text-left">
                            <div class="box-body">

                            </div>
                        </div>
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

        function kuranglengkap() {
            $.notify("Data Kurang Lengkap", "error");
        }

        $(function () {
            $('#tglmasuk').datepicker({ autoclose: true }).datepicker("setDate", "0");
            $('#tglrujuk').datepicker({ autoclose: true }).datepicker("setDate", "0");
            $('#jammasuk').timepicker({
                showInputs: false,
                minuteStep: 1,
                showMeridian: false
            })
            $('#tp').select2({ tags :true });
            $('#kp').select2({ tags :true });
            // $('#gol').select2({ tags :true });
            // $('#rujukan').select2({ tags :true });
            $('#jp').select2({ tags :true });
            $('#icd').select2({
                placeholder: 'Enter ICD',
                minimumInputLength: 3,            
                allowClear: true,
                ajax: {
                    url: "<?php echo site_url();?>/registrasipasien/cariicd",
                    dataType: 'json',
                    data: function (params) {
                        var query = {
                            search: params.term,
                            type: 'public'
                        }
                        return query;
                    },
                    processResults: function (data) {
                        return {
                            results: data.items
                        };
                    }
                }
            });
            $('#dokter').select2({ tags :true });
            $('#dokterluar').select2({ tags :true });
            $('#faskes').select2({ tags :true });

            changegol(0);
            filterdokter(0);
        });

        function filterdokter(status) {
            $.getJSON('<?php echo site_url();?>/registrasipasien/caridokter/' + $("#tp").val(), function(data) {
                var temp = [];
                $.each(data, function(key, value) {
                    temp.push({v:value, k: key});
                });
                temp.sort(function(a,b){
                    if(a.v > b.v){ return 1}
                    if(a.v < b.v){ return -1}
                    return 0;
                });
                $('#dokter').empty();
                $('#dokter').append('<option value="0">--Pilih--</option>');
                $.each(temp, function(key, obj) {
                    if (status == 0) {
                        $('#dokter').append('<option value="' + obj.k +'">' + obj.v + '</option>');
                    } else {
                        $('#dokter').append('<option value="' + obj.k +'">' + obj.v + '</option>');
                    }
                });
            });
        }

        function changegol(status) {
            $.getJSON('<?php echo site_url();?>/registrasipasien/cariasuransi/' + $("#gol").val(), function(data) {
                var temp = [];
                $.each(data, function(key, value) {
                    temp.push({v:value, k: key});
                });
                temp.sort(function(a,b){
                    if(a.v > b.v){ return 1}
                    if(a.v < b.v){ return -1}
                    return 0;
                });
                $('#goldet').empty();
                $('#goldet').append('<option value="0">--Pilih--</option>');
                $.each(temp, function(key, obj) {
                    if (status == 0) {
                        $('#goldet').append('<option value="' + obj.k +'">' + obj.v + '</option>');
                    } else {
                        $('#goldet').append('<option value="' + obj.k +'">' + obj.v + '</option>');
                    }
                });
            });
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
                var goldet = $("#goldet").val();
                var goldettext = $("#goldet option:selected").text();
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
                var dokterluar = $("#dokterluar").val();
                var dokterluartext = $("#dokterluar option:selected").text();
                var faskes = $("#faskes").val();
                var faskestext = $("#faskes option:selected").text();
                var keluhan = $("#keluhan").val();
                var cm = $("#cm").val();
                if ((gol == '') || (gol == null) || (goldet == '') || (goldet == null)) {
                    kuranglengkap;
                    return;
                }
                modalload;
                $.ajax({
                    url: "<?php echo site_url();?>/registrasipasien/simpanregisurj",
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
                        goldet: goldet,
                        goldettext: goldettext,
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
                        dokterluar: dokterluar,
                        dokterluartext: dokterluartext,
                        faskes: faskes,
                        faskestext: faskestext,
                        keluhan: keluhan,
                        cat: cat,
                        cm: cm
                    },

                    success: function (ajaxData){
                        var tx = JSON.parse(ajaxData);
                        console.log(tx);
                        if (tx.stat == true) {
                            suksesalert();
                            modalloadtutup();
                            tutupmodal(tx.dtnotrans);

                        } else if (tx.stat == "ada") {
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




    <?php
} else if ($formpilih == 1) {
    ?>
    <div class="modal-dialog" style="width:1200px;" >
        <div class="modal-content" >
            <form class="form-horizontal" id="kotakform">
                <div class="box box-default box-solid">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Registrasi Unit Rawat Jalan</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Data Pasien</h3>
                            </div>
                            <div class="box-body">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">No. RM</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="rm" id="rm" value="<?php echo $dtpasien->no_rm;?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"  value="<?php echo $dtpasien->nama_pasien;?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?php echo $dtpasien->alamat;?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Golongan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?php echo $dtpasien->golongan;?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Asuransi</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?php echo $dtpasien->asuransi;?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Hak Kelas</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?php echo $dtpasien->kelashak;?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">No. Kartu</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?php echo $dtpasien->no_askes;?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Registrasi</h3>
                            </div>
                            <div class="box-body">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Tgl. Masuk</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="tglmasuk" id="tglmasuk">
                                        </div>
                                    </div>
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <label   class="col-sm-3 control-label">Jam Masuk</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="jammasuk" id="jammasuk" value="<?php echo $regis->jam_masuk;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Kunjungan</label>
                                        <div class="col-sm-9">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="kunjungan" id="kunjungan" value="2" <?php if ($regis->barulama == 2) echo 'checked'; ?>>
                                                    Lama
                                                </label> &nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="kunjungan" id="kunjungan" value="1" <?php if ($regis->barulama == 1) echo 'checked'; ?>>
                                                    Baru
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Tujuan Perawatan</label>
                                        <div class="col-sm-9">
                                            <!-- <select class="form-control" style="width: 100%;" name="tp" id="tp" onchange="filterdokter(1);"> -->
                                            <select class="form-control" style="width: 100%;" name="tp" id="tp">
                                                <?php
                                                foreach($tujuanperawatan as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->kode_unit; ?>" <?php if ($regisdetail->kode_unit == $row->kode_unit) echo 'selected'; ?>><?php echo $row->nama_unit; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Penjamin</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" style="width: 100%;" name="gol" id="gol" onchange="changegol(1);">
                                                <option value="">--Pilih--</option>
                                                <?php
                                                foreach($golongan as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->golongan; ?>" <?php if ($regis->golongan == $row->golongan) echo "selected"; ?> ><?php echo $row->golongan; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label"></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" style="width: 100%;" name="goldet" id="goldet">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Rujukan</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" style="width: 100%;" name="rujukan" id="rujukan">
                                                <?php
                                                foreach($rujukan as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->rujukan; ?>" <?php if ($regis->rujukan == $row->rujukan) echo 'selected'; ?> ><?php echo $row->rujukan; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Faskes</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" style="width: 100%;" name="faskes" id="faskes">
                                                <?php
                                                foreach($dtfaskes as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->kode_faskes; ?>" <?php if ($regis->ppkrujukan == $row->kode_faskes) echo 'selected'; ?> ><?php echo $row->faskes; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Cara Masuk</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" style="width: 100%;" name="cm" id="cm">
                                                <option value="LOKET" <?php if ($regis->cara_masuk == "LOKET") echo 'selected'; ?>>LOKET</option>
                                                <option value="POLI" <?php if ($regis->cara_masuk == "POLI") echo 'selected'; ?>>POLI</option>
                                                <option value="UGD" <?php if ($regis->cara_masuk == "UGD") echo 'selected'; ?>>UGD</option>
                                            </select>
                                        </div>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Rujukan Dokter</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" style="width: 100%;" name="dokterluar" id="dokterluar">
                                                <?php
                                                foreach($dtdokterluar as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->kode; ?>" <?php if ($regis->kode_dokter_luar == $row->kode) echo 'selected'; ?> ><?php echo $row->nama; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>


                                    
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Tgl. Rujukan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="tglrujuk" id="tglrujuk">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Keluhan Awal</label>
                                        <div class="col-sm-9">
                                            <textarea rows="3" class="form-control" name="keluhan" id="keluhan"><?php echo $regis->keluhanawal;?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Jenis Pelayanan</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" style="width: 100%;" name="jp" id="jp">
                                                <?php
                                                foreach($jnspelayanan as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->jenislayanan; ?>" <?php if ($regis->jenislayanan == $row->jenislayanan) echo 'selected'; ?> ><?php echo $row->jenislayanan; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Diagnosa</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" style="width: 100%;" name="icd" id="icd">
                                                <?php
                                                foreach($dticd as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->icd_code; ?>" <?php if ($regis->diagawal == $row->icd_code) echo 'selected'; ?> ><?php echo $row->icd_code . " - " . $row->jenis_penyakit_local; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">No. SEP</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="sep" id="sep" disabled value="<?php echo $regis->nosep?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">DPJP</label>
                                        <div class="col-sm-9">
                                        <select class="form-control" style="width: 100%;" name="dokter" id="dokter">
                                                    <?php
                                                    foreach($dtdokter as $row) {
                                                        ?>
                                                        <option value="<?php echo $row->kode_dokter; ?>" <?php if ($regis->kode_dokter == $row->kode_dokter) echo 'selected'; ?> ><?php echo $row->nama_dokter; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label   class="col-sm-3 control-label">Catatan</label>
                                        <div class="col-sm-9">
                                            <textarea rows="3" class="form-control" name="cat" id="cat"><?php echo $regis->catatan;?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="row text-right">
                                    <div class="col-sm-12">
                                        <a onclick="ubah(<?php echo $regis->id?>)" class="btn btn-primary">Ubah</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row text-left">
                            <div class="box-body">

                            </div>
                        </div>
                    </div>
                </div>
                <form>
        </div>
    </div>


    <script>

        // var datadetail = "<?php echo $regisdetail->kode_unit;?>"
        var datadetail = "<?php echo $regisdetail->id;?>"

        $(document).ready(function () {
            tglmasuk();
        });

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
            $('#tglmasuk').datepicker({ autoclose: true }).datepicker("setDate", "0");
            $('#tglrujuk').datepicker({ autoclose: true }).datepicker("setDate", "0");
            $('#jammasuk').timepicker({
                showInputs: false,
                minuteStep: 1,
                showMeridian: false
            })
            $('#tp').select2({ tags :true });
            $('#kp').select2({ tags :true });
            // $('#gol').select2({ tags :true });
            // $('#rujukan').select2({ tags :true });
            $('#jp').select2({ tags :true });
            $('#icd').select2({
                placeholder: 'Enter ICD',
                minimumInputLength: 3,            
                allowClear: true,
                ajax: {
                    url: "<?php echo site_url();?>/registrasipasien/cariicd",
                    dataType: 'json',
                    data: function (params) {
                        var query = {
                            search: params.term,
                            type: 'public'
                        }
                        return query;
                    },
                    processResults: function (data) {
                        return {
                            results: data.items
                        };
                    }
                }
            });
            $('#dokter').select2({ tags :true });
            $('#faskes').select2({ tags :true });
            $('#tglmasuk').datepicker({ autoclose: true }).datepicker("setDate", "<?php echo date_format(date_create($regis->tgl_masuk), "m/d/Y");?>");
            $('#tglrujuk').datepicker({ autoclose: true }).datepicker("setDate", "<?php echo date_format(date_create($regis->tglrujukan), "m/d/Y");?>");

            changegol(0);
            filterdokter(1);
        });

        // function filterdokter(status) {
        //     $.getJSON('<?php echo site_url();?>/registrasipasien/caridokter/' + $("#tp").val(), function(data) {
        //         var temp = [];
        //         $.each(data, function(key, value) {
        //             temp.push({v:value, k: key});
        //         });
        //         temp.sort(function(a,b){
        //             if(a.v > b.v){ return 1}
        //             if(a.v < b.v){ return -1}
        //             return 0;
        //         });
        //         $('#dokter').empty();
        //         $('#dokter').append('<option value="0">--Pilih--</option>');
        //         $.each(temp, function(key, obj) {
        //             if (status == 0) {
        //                 $('#dokter').append('<option value="' + obj.k +'">' + obj.v + '</option>');
        //             } else {
        //                 $('#dokter').append('<option value="' + obj.k +'">' + obj.v + '</option>');
        //             }
        //         });
        //     });
        // }

        function changegol(status) {
            $.getJSON('<?php echo site_url();?>/registrasipasien/cariasuransi/' + $("#gol").val(), function(data) {
                var temp = [];
                $.each(data, function(key, value) {
                    temp.push({v:value, k: key});
                });
                temp.sort(function(a,b){
                    if(a.v > b.v){ return 1}
                    if(a.v < b.v){ return -1}
                    return 0;
                });
                $('#goldet').empty();
                $('#goldet').append('<option value="0">--Pilih--</option>');
                $.each(temp, function(key, obj) {
                    if (status == 0) {
                        if (obj.k == "<?php echo $regis->asuransi;?>") {
                            $('#goldet').append('<option value="' + obj.k +'" selected>' + obj.v + '</option>');
                        } else {
                            $('#goldet').append('<option value="' + obj.k +'">' + obj.v + '</option>');
                        }
                    } else {
                        $('#goldet').append('<option value="' + obj.k +'">' + obj.v + '</option>');
                    }
                });
            });
        }

        function ubah(id) {
            var rm = document.getElementById("rm").value;
            var tglmasuk = document.getElementById("tglmasuk").value;
            var jammasuk = document.getElementById("jammasuk").value;
            var kunjungan = $("input[name='kunjungan']:checked").val();
            var tp = $("#tp").val();
            var tptext = $("#tp option:selected").text();
            var gol = $("#gol").val();
            var goltext = $("#gol option:selected").text();
            var goldet = $("#goldet").val();
            var goldettext = $("#goldet option:selected").text();
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
            var dokterluar = $("#dokterluar").val();
            var dokterluartext = $("#dokterluar option:selected").text();
            var faskes = $("#faskes").val();
            var faskestext = $("#faskes option:selected").text();
            var keluhan = $("#keluhan").val();
            var cm = $("#cm").val();

            var tglp = document.getElementById("tglregis").value;
            var nrp = document.getElementById("nrp").value;
            $.ajax({
                url: "<?php echo site_url();?>/registrasipasien/prosesubahregisurj",
                type: "GET",
                data : {
                    id: id,
                    rm: rm,
                    tglmasuk: tglmasuk,
                    jammasuk: jammasuk,
                    kunjungan: kunjungan,
                    tp: tp,
                    tptext: tptext,
                    gol: gol,
                    goltext: goltext,
                    goldet: goldet,
                    goldettext: goldettext,
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
                    dokterluar: dokterluar,
                    dokterluartext: dokterluartext,
                    faskes: faskes,
                    faskestext: faskestext,
                    keluhan: keluhan,
                    cat: cat,
                    cm: cm,
                    tglp: tglp,
                    nrp: nrp,
                    datadetail
                },
                success: function (ajaxData){
                    var dt = JSON.parse(ajaxData);
                    if (dt.stat == true) {
                        suksesalert();
                        modalloadtutup();
                        $("#barispasien tbody tr").remove();
                        $("#barispasien tbody").append(dt.dtview);
                        $('#formmodal').modal('toggle');
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