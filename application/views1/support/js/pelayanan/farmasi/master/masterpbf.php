<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">

    <script type="text/javascript">
        
        function load_data(page) {
            modaltable();
            var key1 = document.getElementById("keyword").value;
            console.log(key1);
            var cari = document.getElementById("cari");
            cari.addEventListener('click', function(){
                var key1 = document.getElementById("keyword").value;
                console.log(key1);
                    $.ajax({
                        url:"<?php echo site_url();?>/masterfarmasi/paginationpbf/"+"1",
                        method:"GET",
                        data: {key1: key1},
                        dataType:"json",
                        success:function(data) {
                            $('#tablepbf').html(data.obat);
                            $('#pagination_link').html(data.pagination_link);
                            modaltabletutup();
                        },
                        error: function(data) {
                            gagalalert();
                            modaltabletutup();
                        }
                    });
            })
            $.ajax({
                url:"<?php echo site_url();?>/masterfarmasi/paginationpbf/"+page,
                method:"GET",
                data: {key1: key1},
                dataType:"json",
                success:function(data) {
                    $('#tablepbf').html(data.obat);
                    $('#pagination_link').html(data.pagination_link);
                    modaltabletutup();
                },
                error: function(data) {
                    gagalalert();
                    modaltabletutup();
                }
                
            });
        }
        
        function load_dataxx(page) {
            $.ajax({
                url:"<?php echo site_url();?>/masterfarmasi/paginationpbf/"+page,
                method:"GET",
                dataType:"json",
                success:function(data) {
                    $('#tablepbf').html(data.obat);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
        }

        $(document).ready(function(){
            load_data(1);

            $(document).on("click", ".pagination li a", function(event){
                event.preventDefault();
                var page = $(this).data("ci-pagination-page");
                load_data(page);
            });
        });

        $(document).ready(function () {

            $("#tambahpbf").click(function(e) {
                modaltable();
                $.ajax({
                    url: "<?php echo site_url();?>/masterfarmasi/panggiltambahpbf",
                    type: "GET",
                    success: function (ajaxData){
                        $("#formmodal").html(ajaxData);
                        $("#formmodal").modal('show',{backdrop: 'true'});
                        modaltabletutup();
                    }
                });
            });

        });

        function modaltable() {
            $("#kotaktable").append('<div class="overlayt"><i class="fa fa-refresh fa-spin"></i></div>');
        }

        function modaltabletutup() {
            $(".overlayt").remove();
        }

        function tutupmodal() {
            $(function () {
                $('#formmodal').modal('toggle');
            });
            suksesalert();
            load_data(1);
        }

        function suksesalert(kode) {
            if (kode == 0) {
                $.notify("Sukses Input Data", "success");
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

        function panggiledit(id) {
            modaltable();
            $.ajax({
                url: "<?php echo site_url();?>/masterfarmasi/panggileditpbf",
                type: "GET",
                data: {id: id},
                success: function (ajaxData) {
                    $("#formmodal").html(ajaxData);
                    $("#formmodal").modal('show', {backdrop: 'true'});
                    modaltabletutup();
                },
                error: function (data) {
                    gagalalert();
                    modalloadtutup();
                }
            });
        }
    </script>
