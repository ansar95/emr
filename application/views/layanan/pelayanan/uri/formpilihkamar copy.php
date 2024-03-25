<div class="modal-dialog">
    <div class="modal-content" >
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
                            <input type="text" id="id" value="<?php echo $dtidp?>" hidden disabled/>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Kamar </label>
                                <div class="col-sm-12">
                                    <select class="form-control" style="width: 100%;" name="kamarf" id="kamarf">
                                        <?php
                                        foreach($dtkamar as $row) {
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
        $(function () {
            $('#formmodal').modal('toggle');
        });
    }

    function tdsuksesalert() {
        $.notify("Sukses Input Data", "success");
    }

    function tdgagalalert() {
        $.notify("Gagal Input Data", "error");
    }

    $(function () {
        $('#kamarf').select2();
    });

    $(document).ready(function () {
        $("#simpandokter").click(function(e) {
            modalload();
            var id = document.getElementById("id").value;
            var kamarf = $("#kamarf").val();
            var kamarftext = $("#kamarf option:selected" ).text();
            var unit = document.getElementById("unitselect").value;
            var nrp = document.getElementById("nrp").value;

            $.ajax({
                url: "<?php echo site_url();?>/uri/simpankamarregis",
                type: "GET",
                data : {
                    id: id,
                    kamarf: kamarf,
                    kamarftext: kamarftext,
                    unit: unit,
                    nrp: nrp
                },
                success: function (ajaxData){
                    var t = $.parseJSON(ajaxData);

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


</script>
