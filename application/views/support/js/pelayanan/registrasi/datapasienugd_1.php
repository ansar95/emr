<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/js/select2.script.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/jquery-confirm.min.js"></script>


<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false"></div>



<script type="text/javascript">
    $.fn.datepicker.noConflict();
    $(function() {
        $('#tglregis').datepicker({
            autoclose: true,
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            yearRange: "-10:+00"
        }).datepicker("setDate", "0");
    });

    function prosesload() {
        $("#kotak").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
    }

    function hapusload() {
        $(".overlay").remove();
    }

    $(document).ready(function() {
        $("#tambahdata").click(function(e) {
            $.ajax({
                url: "<?php echo site_url(); ?>/registrasipasien/inputpasien",
                type: "GET",
                success: function(ajaxData) {
                    // console.log(ajaxdata);
                    $("#formmodal").html(ajaxData);
                    $("#formmodal").modal('show', {
                        backdrop: 'true'
                    });
                },
                error: function(ajaxData) {

                }
            });
        });
    });

    function tglmasuk() {
        prosesload();
        var tglp = document.getElementById("tglregis").value;
        $("#nrp").val("");
        $.ajax({
            url: "<?php echo site_url(); ?>/registrasipasien/caripasienugd",
            type: "GET",
            data: {
                tglp: tglp
            },
            success: function(ajaxData) {
                $("#barispasien tbody tr").remove();
                $("#barispasien tbody").append(ajaxData);
                hapusload();
            },
            error: function(ajaxData) {
                hapusload();
            }
        });
    }

    function caridatarm() {
        prosesload();
        var tglp = document.getElementById("tglregis").value;
        var nrp = document.getElementById("nrp").value;
        // if ((np == "") && (pp == "") && (nap == "") && (nrp == "")) {
        // 	hapusload();
        // 	return;
        // }
        $.ajax({
            url: "<?php echo site_url(); ?>/registrasipasien/caripasienugd",
            type: "GET",
            data: {
                tglp: tglp,
                nrp: nrp
            },
            success: function(ajaxData) {
                $("#barispasien tbody tr").remove();
                $("#barispasien tbody").append(ajaxData);
                hapusload();
            },
            error: function(ajaxData) {
                hapusload();
            }
        });
    }

    $(document).ready(function() {
        tglmasuk();
    });

    var dataid = "";

    function panggillihat(id) {
        dataid = id;
        $.ajax({
            url: "<?php echo site_url(); ?>/registrasipasien/lihatdatapasien",
            type: "GET",
            data: {
                id: id
            },
            success: function(ajaxData) {
                // console.log(ajaxdata);
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show', {
                    backdrop: 'true'
                });
            },
            error: function(ajaxData) {

            }
        });
    }

    function sampul(id) {
        $.confirm({
            closeIcon: true,
            title: 'Sampul',
            content: '' +
                '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<div class="col-sm-10">' +
                '<div class="col-sm-4">' +
                '<div class="radio"><label><input type="radio" id="p" name="p" value="UGD"/> UGD</label></div>' +
                '</div>' +
                '<div class="col-sm-4">' +
                '<div class="radio"><label><input type="radio" id="p" name="p" value="Inap"/> INAP</label></div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</form>',
            buttons: {
                formKarcis: {
                    text: 'Karcis',
                    btnClass: 'btn-blue',
                    action: function() {
                        var name = this.$content.find('input[name="p"]:checked').val();
                        if (!name) {
                            $.alert('Pilih salah satu');
                            return false;
                        }
                        var win = window.open("<?php echo site_url(); ?>/sampul/karcisunitugd/" + id + "/" + name, '_blank');
                        win.focus();
                    }
                },
                formTracer: {
                    text: 'Tracer',
                    btnClass: 'btn-blue',
                    action: function() {
                        var name = this.$content.find('input[name="p"]:checked').val();
                        if (!name) {
                            $.alert('Pilih salah satu');
                            return false;
                        }
                        var win = window.open("<?php echo site_url(); ?>/sampul/tracerunitugd/" + id + "/" + name, '_blank');
                        win.focus();
                    }
                },
                formOpd: {
                    text: 'OPD',
                    btnClass: 'btn-blue',
                    action: function() {
                        var name = this.$content.find('input[name="p"]:checked').val();
                        if (!name) {
                            $.alert('Pilih salah satu');
                            return false;
                        }
                        var win = window.open("<?php echo site_url(); ?>/sampul/opdunitugd/" + id + "/" + name, '_blank');
                        win.focus();
                    }
                },
                formSjp: {
                    text: 'SJP',
                    btnClass: 'btn-blue',
                    action: function() {
                        var name = this.$content.find('input[name="p"]:checked').val();
                        if (!name) {
                            $.alert('Pilih salah satu');
                            return false;
                        }
                        var win = window.open("<?php echo site_url(); ?>/sampul/sjpunitugd/" + id + "/" + name, '_blank');
                        win.focus();
                    }
                },
                formSjpugd: {
                    text: 'SJP UGD',
                    btnClass: 'btn-blue',
                    action: function() {
                        var name = this.$content.find('input[name="p"]:checked').val();
                        if (!name) {
                            $.alert('Pilih salah satu');
                            return false;
                        }
                        var win = window.open("<?php echo site_url(); ?>/sampul/sjpugdunitugd/" + id + "/" + name, '_blank');
                        win.focus();
                    }
                },
            },
            onContentReady: function() {
                // bind to events
                var jc = this;
                this.$content.find('form').on('submit', function(e) {
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click');
                });
            }
        });
    }

    function panggilhapusregis(id) {
        $.confirm({
            title: 'Hapus Registrasi',
            buttons: {
                hapus: {
                    text: 'Hapus',
                    btnClass: 'btn btn-danger',
                    keys: ['enter', 'shift'],
                    action: function() {
                        prosesload();
                        var tglp = document.getElementById("tglregis").value;
                        var nrp = document.getElementById("nrp").value;
                        $.ajax({
                            url: "<?php echo site_url(); ?>/registrasipasien/hapusregisugd",
                            type: "GET",
                            data: {
                                id: id,
                                tglp: tglp,
                                nrp: nrp
                            },
                            success: function(ajaxData) {
                                var dt = JSON.parse(ajaxData);
                                console.log(dt);
                                if (dt.stat == true) {
                                    hapusload()
                                    $("#barispasien tbody tr").remove();
                                    $("#barispasien tbody").append(dt.dtview);
                                    $.notify("Berhasil Menghapus Data", "success");
                                } else {
                                    $.notify("Data tidak dapat dihapus, sudah ada proses pelayanan", "error");
                                    hapusload();
                                }
                            },
                            error: function(data) {
                                $.notify("Gagal Memproses Data", "error");
                                hapusload();
                            }
                        });
                    }
                },
                batal: {
                    text: 'Batal',
                    btnClass: 'btn btn-primary',
                    action: function() {}
                }
            }
        });
    }

    function panggileditregis(id) {
        prosesload();
        $.ajax({
            url: "<?php echo site_url(); ?>/registrasipasien/editregisugd",
            type: "GET",
            data: {
                id: id
            },
            success: function(ajaxData) {
                $("#formmodal").html(ajaxData);
                $("#formmodal").modal('show', {
                    backdrop: 'true'
                });
                hapusload();
            },
            error: function(data) {
                hapusload();
            }
        });
    }

    function cetakkarcis(id) {
        var win = window.open("<?php echo site_url(); ?>/sampul/karcisunitugd/" + id, '_blank');
        win.focus();
    }

    function cetaktracer(id) {
        var win = window.open("<?php echo site_url(); ?>/sampul/tracerunitugd/" + id, '_blank');
        win.focus();
    }

    function cetakopd(id) {
        var win = window.open("<?php echo site_url(); ?>/sampul/opdunitugd/" + id, '_blank');
        win.focus();
    }

    function cetaksjp(id) {
        var win = window.open("<?php echo site_url(); ?>/sampul/sjpugdunitugd/" + id, '_blank');
        win.focus();
    }

    function cetaksr1(id) {
        var win = window.open("<?php echo site_url(); ?>/sampul/cetakr11/" + id, '_blank');
        win.focus();
    }

    function cetaksr2(id) {
        var win = window.open("<?php echo site_url(); ?>/sampul/cetakr12/" + id, '_blank');
        win.focus();
    }

    function cetakgelang(id) {
        var win = window.open("<?php echo site_url(); ?>/sampul/gelangunitugd/" + id, '_blank');
        win.focus();
    }

    function cetakregis(id) {
        var win = window.open("<?php echo site_url(); ?>/sampul/cetakregisigd/", +id '_blank');
        win.focus();
    }
</script>