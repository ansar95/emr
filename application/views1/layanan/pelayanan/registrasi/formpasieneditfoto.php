<style>
    .errorClass { border:  1px solid red; }
    #image-preview{
        display:block;
        width : 250px;
        height : 300px;
    }
</style>
<div class="modal-dialog" >
    <div class="modal-content" >
        <div class="form-horizontal">
            <div class="box box-default box-solid" id="kotakform">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Edit Foto Pasien</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body" >
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Foto</label>
                                <div class="col-sm-9">
                                    <input id="id" name="id" type="text" value="<?php echo $pasien->id;?>" hidden/>
                                    <input type="file" name="foto" id="foto" onchange="previewImage();">
                                    <p class="help-block">Max. 2 MB</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-9">
                                    <img id="image-preview" src="<?php echo base_url();?>/assets/upload/pasien/<?php echo $pasien->foto;?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" onclick="ubahpasien();">Save changes</a>
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

    function gagalalert(info = "Gagal Input Data") {
        $.notify(info, "error");
    }

    $(function () {

    });

    function previewImage() {
        document.getElementById("image-preview").style.display = "block";
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("foto").files[0]);

        oFReader.onload = function(oFREvent) {
        document.getElementById("image-preview").src = oFREvent.target.result;
        };
    };

    function ubahpasien() {
        // modalload();
        var id = $("input[name='id']:text").val();
        var filedata = $('#foto').prop('files')[0];
        
        var formdata = new FormData();
        formdata.append('id', id);
        formdata.append('filedata', filedata);
        $.ajax({
            url: "<?php echo site_url();?>/registrasipasien/prosesubahpasienfoto",
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            data : formdata,
            success: function (ajaxData){
                var t = $.parseJSON(ajaxData);

                if (t.dtsukses == true) {
                    suksesalert();
                    modalloadtutup();
                    tutupmodalfoto(t.norm);
                } else {
                    gagalalert(t.norm);
                    // modalloadtutup();
                }
            },
            error: function (ajaxData) {
                gagalalert();
                modalloadtutup();
            }
        });
    }

</script>

