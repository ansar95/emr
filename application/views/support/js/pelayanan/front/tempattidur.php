<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/js/select2.script.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">

    <script type="text/javascript">
        function load_data(page) {
            modaltable();
            $.ajax({
                url:"<?php echo site_url();?>/frontoffice/paginationtempat/"+page,
                method:"GET",
                dataType:"json",
                success:function(data) {
                    $('#tablekamar').html(data.pasien);
                    $('#pagination_link').html(data.pagination_link);
                    modaltabletutup();
                },
                error: function () {
                    modaltabletutup();
                }
            });
        }

        function loadkamar() {
            modaltable();
            $.ajax({
                url:"<?php echo site_url();?>/frontoffice/refreshtempat",
                method:"GET",
                dataType:"json",
                success:function(data) {        
                    $('#tablekamar').html(data.pasien);
                    $('#pagination_link').html(data.pagination_link); 
                    modaltabletutup();
                    load_data(1);
                },
                error: function () {
                    modaltabletutup();
                }
            });
        }

        function muatulang() {
            $("#nm").val("");
            $("#al").val("");
            load_data(1)
        }

        $(document).ready(function(){
            load_data(1);

            $(document).on("click", ".pagination li a", function(event){
                event.preventDefault();
                var page = $(this).data("ci-pagination-page");
                load_data(page);
            });

            $(document).on("click", ".paginationx li a", function(event){
                event.preventDefault();
                var page = $(this).data("ci-pagination-page");
                load_data_cari(page);
            });
        });

        function modaltable() {
            $("#kotaktable").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        }

        function modaltabletutup() {
            $(".overlay").remove();
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

    </script>
