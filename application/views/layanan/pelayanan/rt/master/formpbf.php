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
                        <h4 class="modal-title">Tambah Data Master PBF</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kode</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="rm" id="kd" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama Produk</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nm" id="nm" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="al" id="al" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Telp.</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="telp" id="telp" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama Kontak</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="kontak" id="kontak" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Jenis</label>
                                    <div class="col-sm-3">
                                        <select class="form-control prov" style="width: 100%;" name="jenis" id="jenis">
                                            <option value="UTAMA">UTAMA</option>
                                            <option value="LAIN-LAIN">LAIN-LAIN</option>
                                            <option value="KHUSUS">KHUSUS</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a id="simpanpbf" class="btn btn-primary">Simpan</a>
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

        $(document).ready(function () {

            $("#jenis").select2();

            $("#simpanpbf").click(function(e) {
                modalform();
                var kd = document.getElementById("kd").value;
                var nm = document.getElementById("nm").value;
                var al = document.getElementById("al").value;
                var telp = document.getElementById("telp").value;
                var kontak = document.getElementById("kontak").value;
                var jenis = $("#jenis").val();
                var jenistext = $("#jenis option:selected").text();
                $.ajax({
                    url: "<?php echo site_url();?>/masterfarmasi/simpandatapbf",
                    type: "GET",
                    data: {
                        kd: kd,
                        nm: nm,
                        jenis: jenis,
                        jenistext: jenistext,
                        al: al,
                        telp: telp,
                        kontak: kontak
                    },
                    success: function (ajaxData){
                        if (ajaxData == "1") {
                            modalformtutup();
                            tutupmodal();
                        } else {
                            modalformtutup();
                            gagalalert();
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
                        <h4 class="modal-title">Edir Master PBF</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kode</label>
                                    <div class="col-sm-3">
                                        <input disabled type="text" class="form-control" name="rm" id="kd" value="<?php echo $dtpbf->kode;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama Produk</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nm" id="nm" value="<?php echo $dtpbf->nama;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="al" id="al" value="<?php echo $dtpbf->alamat;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Telp.</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="telp" id="telp" value="<?php echo $dtpbf->hp;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama Kontak</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="kontak" id="kontak" value="<?php echo $dtpbf->kontak;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Jenis</label>
                                    <div class="col-sm-3">
                                        <select class="form-control prov" style="width: 100%;" name="jenis" id="jenis">
                                            <option value="UTAMA" <?php if($dtpbf->jenis == "UTAMA") { echo "selected";}?>>UTAMA</option>
                                            <option value="LAIN-LAIN" <?php if($dtpbf->jenis == "LAIN-LAIN") { echo "selected";}?>>LAIN-LAIN</option>
                                            <option value="KHUSUS" <?php if($dtpbf->jenis == "KHUSUS") { echo "selected";}?>>KHUSUS</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a onclick="editdata(<?php echo $id?>)" class="btn btn-primary">Ubah</a>
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

        function editdata(id) {
            modalform();
            var kd = document.getElementById("kd").value;
            var nm = document.getElementById("nm").value;
            var al = document.getElementById("al").value;
            var telp = document.getElementById("telp").value;
            var kontak = document.getElementById("kontak").value;
            var jenis = $("#jenis").val();
            var jenistext = $("#jenis option:selected").text();
            $.ajax({
                url: "<?php echo site_url();?>/masterfarmasi/editdatapbf",
                type: "GET",
                data: {
                    id: id,
                    kd: kd,
                    nm: nm,
                    jenis: jenis,
                    jenistext: jenistext,
                    al: al,
                    telp: telp,
                    kontak: kontak
                },
                success: function (ajaxData){
                    if (ajaxData == "1") {
                        modalformtutup();
                        tutupmodal();
                    } else {
                        modalformtutup();
                        gagalalert();
                    }
                }
            });
        }

        $(document).ready(function () {

            $("#jenis").select2();

        });
    </script>
    <?php
}
?>
