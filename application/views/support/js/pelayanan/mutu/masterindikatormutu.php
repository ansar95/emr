<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script
    src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/jquery-confirm.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script
    src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/standalone/selectize.js"></script>

<script>
    function tambah() {
        $('#formIndikatorMutu')[0].reset();
        $(".select2-selection__choice").remove()
        // $('#type').val('tambah');
        // $('#id').val('');
        $("#indikatorModal").modal('show')
        $("#idindikator").attr('value','')
        $("#formIndikatorMutu").attr('action', '<?php echo site_url();?>/mutu/store')
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

    function hapusdata(e, id) {
        var txt = $(e).parents('tr').find("td:eq(3)").text()
        $.confirm({
            title : 'Hapus Data',
            content: 'Yakin menghapus ' + txt + '?',
            buttons: {
                batal: {
                    text: 'Batal',
                    btnClass: 'btn-red',
                    action: function(){

                    }
                },
                hapus: {
                    text: 'Hapus',
                    btnClass: 'btn-blue',
                    keys: ['enter'],
                    action: function(){
                        $.ajax({
                            url: "<?php echo site_url();?>/mutu/delete",
                            type: "GET",
                            data : {
                                id: id
                            },
                            success: function (response){
                                const resp = JSON.parse(response)
                                if (resp.status) {
                                    suksesalert(2)
                                } else {
                                    gagalalert()
                                }
                            },
                            error: function (ajaxData) {
                                gagalalert();
                            }
                        });
                    }
                }
            }
        })
    }

    function panggiledit(id) {
        $('#formIndikatorMutu')[0].reset();
        $(".select2-selection__choice").remove()
        $("#indikatorModal").modal('show')
        $("#formIndikatorMutu").attr('action', '<?php echo site_url();?>/mutu/update')
        $("#idindikator").attr('value',id)

        // alert(id)
        $.ajax({
            url: "<?php echo site_url();?>/mutu/detail",
            type: 'GET',
            data : {
                id: id
            },
            success: function(response) {
                var resp = JSON.parse(response)
                if (resp.status) {
                    console.log(resp)
                    var text = [];
                    var pelaksana = JSON.parse(resp.data.pelaksana)
                    $("#kode").val(resp.data.kode)
                    $("#nilai").val(resp.data.nilai)
                    $("#denominator").val(resp.data.denominator)
                    $("#numerator").val(resp.data.numerator)
                    $("#indikator_penilaian_mutu").val(resp.data.indikator_penilaian)
                    $("#indikator").val(resp.data.indikator)
                    $("#ukuran").val(resp.data.ukuran)
                    $("#id_pelaksana").val(pelaksana)
                    var arr_text = $("#id_pelaksana option:selected");
                    for(i=0;i < arr_text.length; i++) {
                        $(".select2-selection__rendered").append(`
                            <li class="select2-selection__choice" title="${arr_text[i]}"><span class="select2-selection__choice__remove" role="presentation">×</span>${arr_text[i].text} </li>
                        `)
                    }
                }
            },
            error: function(ajaxData) {
                gagalalert()
            }
        })
    }

    (function ($) {
        "use strict";
        $('select').each(function () {
            $(this).select2({
                theme: 'bootstrap4',
                width: 'style',
                placeholder: $(this).attr('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });
        });
    })(jQuery);

    function get(page) {
        $.ajax({
            url: "<?php echo site_url(); ?>/mutu/getdata/" + page,
            type: "GET",
            dataType: "json",
            success: function(response) {
                $("#tabledata").html(response.data)
                $("#pagination_link").html(response.pagination)
            }
        })
    }

    $("document").ready(function() {
        get(1)
        $(document).on("click", ".pagination li a", function(event) {
            event.preventDefault()
			var page = $(this).data("ci-pagination-page");
            get(page)
        })
    });
</script>