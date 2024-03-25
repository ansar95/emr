<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">

    <script type="text/javascript">

        $(document).ready(function () {



        });

        function modaltable() {
            $("#boxpass").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        }

        function modaltabletutup() {
            $(".overlay").remove();
        }

        function tutupmodal() {
            $(function () {
                $('#formmodal').modal('toggle');
            });
            suksesalert();
        }

        function suksesalert(kode) {
            if (kode == 0) {
                $.notify("Password Lama Salah", "success");
            } else if (kode == 1) {
                $.notify("Sukses Ubah Data", "success");
            } else if (kode == 2) {
                $.notify("Sukses Hapus Data", "success");
            }
        }

        function gagalalert() {
            $.notify("Gagal Memproses Data", "error");
        }

        function kuranglengkap() {
            $.notify("Data Kurang Lengkap", "error");
        }

        function kirim() {
            modaltable();
            var pl = document.getElementById("pl").value;
            var pb = document.getElementById("pb").value;
            var up = document.getElementById("up").value;
            if ((pb == null) || (pb == "")) {
                $.notify("Password baru tidak boleh kosong", "error");
                modaltabletutup();
                return;
            }
            if (up != pb) {
                $.notify("Konfirmasi password tidak sama dengan password baru", "error");
                modaltabletutup();
                return;
            }

            var formdata = new FormData();
            formdata.append('pl', pl);
            formdata.append('pb', pb);
            formdata.append('up', up);
            $.ajax({
                url: "<?php echo site_url();?>/users/prosespass",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data : formdata,
                type: "post",
                success: function (ajaxData) {
                    var t = JSON.parse(ajaxData);
                    if (t.dtsimpan == "n") {
                        suksesalert(0)
                    } else if (t.dtsimpan == true) {
                        suksesalert(1)
                    } else {
                        gagalalert()
                    }
                    modaltabletutup();
                },
                error: function (data) {
                    gagalalert();
                    modaltabletutup();
                }
            });
        }
    </script>
