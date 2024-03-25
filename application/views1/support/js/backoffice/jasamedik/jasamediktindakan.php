<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/jquery-confirm.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('select').select2({
            tags: true
        });
        load_data_tindakan()
        get_jenis_tindakan()
    });
    // let lastOption = ""

    // FUNGSI BUKA MODAL TAMBAH
    function tambahdatatindakan() {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamediktindakan/create",
            method: "POST",
            dataType: "json",

            data: {
                jenis_rawat: "RANAP"
            },
            success: function(data) {
                $('#tambahModal').modal('show')
                console.log(data)
                if (data.jenis) {
                    let jenis = ""
                    $.each(data.jenis, function(key, value) {
                        jenis += `<option value="${value.id}">${value.deskripsi}</option>`
                    });
                    $("#jenistindakan").html(jenis)
                }
                if (data.list_dpjp) {
                    let list_dpjp = ""
                    $.each(data.list_dpjp, function(key, value) {
                        list_dpjp += `<div class="d-flex justify-content-between">
                   <div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="check${value.id}" name="listdpjp[]" value="${value.id}">
														<label class="custom-control-label checkbox-primary" for="check${value.id}">${value.deskripsi}</label>                                       
													</div>
                                                    <input type="text"  name="valuedpjp[]" class="form-control pull-right ml-2 col-6" autocomplete="off" required>

                               </div> `
                    });
                    $("#dpjp_utama").html(list_dpjp)
                }
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    $("#jenistindakan").change(function() {
        console.log("dina cantik")
        console.log($("#jenistindakan").val())
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamediktindakan/get_jenis_tindakan",
            method: "POST",
            dataType: "json",

           data:{
                jenis_rawat : $("#jenistindakan").val() ==="RJ" ?  'RAJAL' : 'RANAP'
           },

            success: function(data) {
               console.log(data)
                if (data.list_dpjp) {
                    let list_dpjp = ""
                    $.each(data.list_dpjp, function(key, value) {
                        list_dpjp += `<div class="d-flex justify-content-between">
                   <div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="check${value.id}" name="listdpjp[]" value="${value.id}">
														<label class="custom-control-label checkbox-primary" for="check${value.id}">${value.deskripsi}</label>                                       
													</div>
                                                    <input type="text"  name="valuedpjp[]" class="form-control pull-right ml-2 col-6" autocomplete="off" required>

                               </div> `
                    });
                    $("#dpjp_utama").html(list_dpjp)
                }
            },
            error: function(error) {
                console.log(error)
            }
        });
    })

    $('#editRefrensi select[name="jenistindakan"]').change(function() {
        console.log("dina cantik")
        console.log($("#jenistindakanedit").val())
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamediktindakan/get_jenis_tindakan",
            method: "POST",
            dataType: "json",

           data:{
                jenis_rawat : $("#jenistindakanedit").val() ==="RJ" ?  'RAJAL' : 'RANAP'
           },

            success: function(data) {
               console.log(data)
                if (data.list_dpjp) {
                    let list_dpjp = ""
                    $.each(data.list_dpjp, function(key, value) {
                        list_dpjp += `<div class="d-flex justify-content-between">
                   <div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="check${value.id}" name="listdpjp[]" value="${value.id}">
														<label class="custom-control-label checkbox-primary" for="check${value.id}">${value.deskripsi}</label>                                       
													</div>
                                                    <input type="text"  name="valuedpjp[]" class="form-control pull-right ml-2 col-6" autocomplete="off" required>

                               </div> `
                    });
                    $("#dpjp_utamaedit").html(list_dpjp)
                }
            },
            error: function(error) {
                console.log(error)
            }
        });
    })

    // function get_jenis_tindakan(){
    //     $.ajax({
    //         url: "<?php echo site_url(); ?>/Jasamediktindakan/get_jenis_tindakan",
    //         method: "POST",
    //         dataType: "json",

    //        data:{
    //             jenis_rawat : $("#jenistindakan").val() ==="RJ" ?  'RAJAL' : 'RANAP'
    //        },

    //        success:function(data){
    //         html = ""
    //          if (data.jenis.length > 0 ) {
    //                 let jenis = ""
    //                 $.each(data.jenis, function(key, value) {
    //                     jenis += `<option value="${value.id}">${value.deskripsi}</option>`
    //                 });
    //                 $("#jenistindakan").html(jenis)
    //                 $("#jenistindakanedit").html(jenis)
    //             } else {
    //                 html += `<option value="">-</option>`
    //             }

    //             $('#editRefrensi select[name="tmt"]').html(html)
    //             $('#tambahModal select[name="tmt"]').html(html)
    //        },
    //        error: function(error) {
    //             console.log(error)
    //         }

    //     });
    // }

    function editdatatindakan(id,jenis) {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamediktindakan/edit",
            method: "POST",
            dataType: "json",

            data: {
                id : id,
                jenis_rawat :  jenis
           
            },
            
            success: function(data) {
                console.log(data)
                if (data.jenis) {
                    let jenis = ""
                    $.each(data.jenis, function(key, value) {
                        jenis += `<option value="${value.id}">${value.deskripsi}</option>`
                    });
                    $("#jenistindakanedit").html(jenis)
                    $('#editRefrensi select[name="jenistindakan"]').val(data.data[0].jenis)
                    if (data.list_dpjp) {
                    let list_dpjp = ""
                    $.each(data.list_dpjp, function(key, value) {
                        list_dpjp += `<div class="d-flex justify-content-between">
                   <div class="custom-control custom-checkbox custom-control-inline">
														<input type="checkbox"  class="custom-control-input" id="check${value.id}" name="listdpjp[]" value="${value.id}">
														<label class="custom-control-label checkbox-primary" for="check${value.id}">${value.deskripsi}</label>                                       
													</div>
                                                    <input type="text"  name="valuedpjp[]" class="form-control pull-right ml-2 col-6" autocomplete="off" required>

                               </div> `
                    });
                    $("#dpjp_utamaedit").html(list_dpjp)
                    $('#editRefrensi input[name="tmt"]').val(data.data[0].kode_tindakan)
                }
                    $('#editModal').modal('show')
                    $('#editModal').attr('data-id', id)

                }
              
               
            },
            error: function(error) {
                console.log(error)
                console.log(data)
            }
        });
    }



    function simpandatatindakan() {

        let arr_valuedpjp = []
        let arr_listdpjp = []
        $('#tambahRefrensi input[name="valuedpjp[]"]').map((i, v) => {
            if (v.value.length > 0) {
                arr_valuedpjp.push(v.value)
            }
        })
        $('#tambahRefrensi input[name="listdpjp[]"]:checked').map((i, v) => {
            arr_listdpjp.push(v.value)
        })
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamediktindakan/store",
            method: "POST",
            data: {
                jenis: $(`#tambahRefrensi select[name="jenistindakan"]`).val(),
                kode_referensi_tindakan: $(`#tambahRefrensi input[name="tmt"]`).val(),
                valuedpjp: arr_valuedpjp,
                listdpjp: arr_listdpjp,
            },
            success: function(data) {
                data = JSON.parse(data.replace('/\t/g', ''))
                console.log(data)

                if (data.error_code == "0") {

                    $.notify("Sukses Input Data", "success");
                    
                    $('#tambahRefrensi')
                    $('#tambahRefrensi').collapse('hide')
                    $(`#tambahRefrensi input[name="tmt"]`).val("")
                } else {
                    $.notify("Gagal Input Data", "error");
                }

            },
            error: function(error) {
                $.notify("Gagal Input Data", "error");
            }
        });
    }

    function load_data_tindakan() {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamediktindakan/get",
            method: "POST",
            dataType: "json",

            // data: {jenis_tindakan:'RANAP'},
            success: function(data) {
                html = ""

                console.log(data)
                if (data.length > 0) {
                    $.each(data, function(index, value) {
                        html += `<tr class="position-relative">
                                       <td>${value.jenis}</td>
                                       <td>${value.kode_tindakan}</td>
                                       <td>${value.dpjp_wajib.map((item)=>{return '<ul>'+Object.keys(item)+' = '+[0]+Object.values(item)[0]+ '</ul>'}).join('')}</td>
                                       <td><button class="btn btn-primary" onclick="editdatatindakan(${value.id}, '${value.jenis}')"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                                    </tr>`
                    });
                } else {
                    html += `<tr><td colspan="100%" class="text-center table-empty">Tidak ada data ditemukan!</td></tr>`
                }

                $('#tabletindakan tbody').html(html)
            },
            error: function(error) {
                console.log(error.responseText)
            }
        });
    }
</script>