<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">

<script type="text/javascript">

    $(document).ready(function(){
        
    });

	function forFormDetail(diagnosaPlaceHolder) {
		$('#txtnmdiagnosa').select2({
            placeholder: diagnosaPlaceHolder,
            minimumInputLength: 3,            
            allowClear: true,
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambilldiagnosainsert",
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
	}

    function cariSep() {
        $form = $("#formsearch").serializeArray()
        var formData = new FormData();
        $.each($form,function(key,input){
            formData.append(input.name,input.value);
        });
        // formData.append("jenForm", jenForm)
        $.ajax({
            url: "<?php echo site_url();?>/bpjs/loadsep",
            type: "POST",
            data: formData,
            success: function (ajaxData){
                var t = $.parseJSON(ajaxData);
                if (t.stat == true) {
                    // tdsuksesalert(0);
                    $("#tablesep").html(t.dtview);
                    // modalloadtutup();
                } else {
                    $("#tablesep").html("");
                    // tdgagalalert();
                    // modalloadtutup();
                }
            },
            error: function(data) {
                $.notify('Server Error', 'error')                
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }

    function panggilDetailSep(id) {
		// prosesload();
		$.ajax({
			url: "<?php echo site_url();?>/bpjs/modaldetail",
			type: "GET",
			data : {no: id},
			success: function (ajaxData){
				// hapusload();
				$("#formmodal").html(ajaxData);
				$("#formmodal").modal('show',{backdrop: 'true'});
			}
		});
	}

    function panggilUbahSep(id) {
		// prosesload();
		$.ajax({
			url: "<?php echo site_url();?>/bpjs/modalubah",
			type: "GET",
			data : {no: id},
			success: function (ajaxData){
				// hapusload();
				$("#formmodal").html(ajaxData);
				$("#formmodal").modal('show',{backdrop: 'true'});
			}
		});
	}

	function jaminan() {
        var valu = $("#cbstatuskll").val();
        $.ajax({
            url: "<?php echo site_url();?>/bpjs/getjaminan?statusjaminan="+valu+"",
            type: "GET",
            success: function (ajaxData){
                var dt = JSON.parse(ajaxData);
                if (dt.stat == true) {
                    $("#divJaminan").html(dt.dtview);
                } else {
                }
            },
            error: function(data) {
                
            }
        });
    }

	function submitupdateSEP() {
        $form = $("#theform").serializeArray()
        var formData = new FormData();
        $.each($form,function(key,input){
            // $.notify('' + input.name + ' kosong', 'error');
            // return false
            formData.append(input.name,input.value);
        });

        $.ajax({
            url: "<?php echo site_url();?>/bpjs/ubahsep",
            type: "POST",
            data: formData,
            success: function (ajaxData){
                var dt = JSON.parse(ajaxData);
				console.log(ajaxData)
                if (dt.stat == true) {
                    $.notify(dt.message, 'success')
                } else {
                    $.notify(dt.message, 'error')
                }
            },
            error: function(data) {
                $.notify('Server Error', 'error')                
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }

	function submitupdateSEPUGD() {
        $form = $("#theform").serializeArray()
        var formData = new FormData();
        $.each($form,function(key,input){
            // $.notify('' + input.name + ' kosong', 'error');
            // return false
            formData.append(input.name,input.value);
        });

        $.ajax({
            url: "<?php echo site_url();?>/bpjs/ubahsepugd",
            type: "POST",
            data: formData,
            success: function (ajaxData){
                var dt = JSON.parse(ajaxData);
				console.log(ajaxData)
                if (dt.stat == true) {
                    $.notify(dt.message, 'success')
                } else {
                    $.notify(dt.message, 'error')
                }
            },
            error: function(data) {
                $.notify('Server Error', 'error')                
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }

    function panggilHapusSep(no) {
        $.confirm({
			title: 'Hapus SEP',
			content: 'Yakin Hapus SEP no. ' + no + ' ?',
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
							url: "<?php echo site_url();?>/bpjs/hapussep",
							type: "GET",
							data : {
								no: no
							},
							success: function (ajaxData){
								var t = $.parseJSON(ajaxData);
								if (t.stat == true) {
									$.notify(t.msg, 'success')
                                    cariSep()
								} else {
                                    $.notify(t.msg, 'error')
								}
							},
							error: function (ajaxData) {
                                $.notify(t.msg, 'error')
							}
						});
					}
				}
			}
		});
    }

    function panggilPulangSep(no) {
        $.confirm({
			title: 'Set Tanggal Pulang SEP',
			content: 'Yakin Set tanggal Pulang SEP no. ' + no + ' ?',
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
							url: "<?php echo site_url();?>/bpjs/pulangsep",
							type: "GET",
							data : {
								no: no
							},
							success: function (ajaxData){
								var t = $.parseJSON(ajaxData);
								if (t.stat == true) {
									$.notify(t.msg, 'success')
                                    cariSep()
								} else {
                                    $.notify(t.msg, 'error')
								}
							},
							error: function (ajaxData) {
                                $.notify(t.msg, 'error')
							}
						});
					}
				}
			}
		});
    }

	function panggilCetakSep(no) {
        $.confirm({
			title: 'Cetak SEP',
			content: 'Yakin cetak SEP no. ' + no + ' ?',
			buttons: {
				batal: {
					text: 'Batal',
					btnClass: 'btn-red',
					action: function(){
						
					}
				},
				cetak: {
					text: 'Cetak',
					btnClass: 'btn-blue',
					keys: ['enter'],
					action: function(){
						var url = "<?php echo site_url();?>/bpjs/cetakseprud/" + no + ""
						newwindow = window.open(url,'Cetakan SEP','height=1000,width=800');
						if (window.focus) {newwindow.focus()}
						return false;
					}
				}
			}
		});
    }
	
</script>
