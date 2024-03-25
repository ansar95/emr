<div class="modal-dialog" >
    <div class="modal-content" >
        <form class="form-horizontal" id="kotakform">
            <div class="box box-default box-solid">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Anggaran</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Kode Anggaran</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="kd" id="kd" value="<?php echo $data->kodeanggaran?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Nama Anggaran</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nm" id="nm" value="<?php echo $data->namaanggaran?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" onclick="" class="btn btn-primary">Simpan</button>
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

    function ubahdata(id) {
        var kd = document.getElementById("kd").value;
        var nm = document.getElementById("nm").value;
        $.ajax({
            url: "<?php echo site_url();?>/keuangan/ubahanggaranrek",
            type: "GET",
            data : {
                id: id,
                kd: kd,
                nm: nm
            },
            success: function (ajaxData){
                var t = $.parseJSON(ajaxData);
                if (t.stat == true) {
                    suksesalert();
                    modalloadtutup();
                    $(function () {
                        $('#formmodal').modal('toggle');
                    });
                } else {
                    gagalalert();
                    modalloadtutup();
                }
            }
        });
    }

</script>

