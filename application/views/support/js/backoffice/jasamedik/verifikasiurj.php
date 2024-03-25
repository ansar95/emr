<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/jquery-confirm.min.js"></script>


<script type="text/javascript">
    $.fn.datepicker.noConflict();
    let nomor_rm_klik = ""
    let id_rajal
    let no_rm
    let statusBpjs = false
    let cardBpjs = $('#cardBpjs').html()
    let cardNonbpjs = $('#cardNonbpjs').html()
    let kolomnonbpjs = ''
    $('#cardBpjs').empty()
    $('#cardNonbpjs').empty()
    $(function() {
        $('select').select2({
            tags: true
        });
        $('.datepick').datepicker({
            autoclose: true,
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+00",
            container: $(this).parent(),
        })
        $('.datepick').prop('readonly', true)
        $('.datepick').css('background-color', '#fff')
        get_golongan()
        get_unit()
        get_dokter()
        get_tipe()
        // get_tindakan()
    });

    $('#tambahUrj input[name="no_rm"]').on('keypress', function(e) {
        if (e.which == 13) {
            let el = $(this)
            nameByRm(el, 'tambah')
        }
    });
    $('#tambahUrj input[name="no_rm"]').blur(function() {
        let el = $(this)
        nameByRm(el, 'tambah')
    });
    $('#editUrj input[name="no_rm"]').on('keypress', function(e) {
        if (e.which == 13) {
            let el = $(this)
            nameByRm(el, 'edit')
        }
    });
    $('#editUrj input[name="no_rm"]').blur(function() {
        let el = $(this)
        nameByRm(el, 'edit')
    });


    function nameByRm(el, action) {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatjalan/get_pasien",
            method: "POST",
            dataType: "json",
            data: {
                no_rm: $(el).val()
            },
            success: function(data) {
                html = ""
                console.log("ubah rm")
                if (data.length > 0) {
                    action == 'tambah' ? $('#tambahUrj input[name="nama_pasien"]').val(data[0].nama_pasien) : $('#editUrj input[name="nama_pasien"]').val(data[0].nama_pasien)
                } else {
                    action == 'tambah' ? $('#tambahUrj input[name="nama_pasien"]').val("") : $('#editUrj input[name="nama_pasien"]').val("")
                    $('#tambahUrj input[name="nama_pasien"]').val("")

                }
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    $('#filterm').change(function() {
        let el = $(this)
        if ($(el).is(':checked')) {
            $('input[name="rm').attr('disabled', false)
        } else {
            $('input[name="rm').attr('disabled', true)
        }
    });

    function unitcek() {
        if (document.getElementById('cekunit').checked) {
            document.getElementById('unit').disabled = false;
        } else
            document.getElementById('unit').disabled = true;
    }

    $(document).on('click', '#tabelmedikurj tbody tr', function() {
        if (!$('.table-empty').length) {
            clearselectedrow('tabelmedikurj')
            $(this).addClass('tr-clicked')
            nomor_rm_klik = $(this).find('td:nth-child(1)').attr('data-id')
        }
    });


    function simpanUrj() {
        let data = $('#tambahUrj').serializeArray();
        let formData = {}
        data.map((item) => {
            formData[item.name] = item.value
        })
        formData.nama_golongan = $('#tambahUrj select[name="kode_golongan"] option:selected').text()
        console.log(formData)
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatjalan/store",
            method: "POST",
            data: formData,
            dataType: "json",
            success: function(data) {
                if (data.error_code == "0") {
                    $.notify("Sukses Input Data", "success");
                    $('#tambahUrj')[0].reset()
                    $('#tambahModal').modal('hide')
                    load_data_urj()
                } else {
                    $.notify("Gagal Input Data", "error");
                }
            },
            error: function(error) {
                $.notify("Gagal Input Data", "error");
            }
        });
    }

    function simpanjasa() {
        let data = $('#tambahUnit').serializeArray();
        let formData = {}
        data.map((item) => {
            formData[item.name] = item.value
        })
        formData.id_rajal = id_rajal
        formData.no_rm = no_rm
        console.log(formData)
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatjalan/store_rincian_rajal_unit",
            method: "POST",
            data: formData,
            dataType: "json",
            success: function(data) {

                if (data.error_code == "0") {

                    $.notify("Sukses Input Data", "success");
                    $('#tambahUnit')[0].reset()
                    $('#tambahJasa').collapse('hide')
                    rincianJasaUrj(parseInt(id_rajal))
                } else {
                    $.notify("Gagal Input Data", "error");
                }
            },
            error: function(error) {
                $.notify("Gagal Input Data", "error");
            }
        });
    }

    function simpandokter() {
        let data
        statusBpjs ? data = $('#tambahdokter').serializeArray() : data = $('#tambahdokternon').serializeArray()
        let formData = {}
        data.map((item) => {
            formData[item.name] = item.value
            console.log(item)
        })
        formData.id_rajal = id_rajal
        formData.no_rm = no_rm
        statusBpjs ? formData.kode_golongan = '6' : formData.kode_golongan = '4'
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatjalan/store_rincian_rajal_dokter",
            method: "POST",
            data: formData,
            dataType: "json",
            success: function(data) {

                if (data.error_code == "0") {
                    $.notify("Sukses Input Data", "success");
                    if (statusBpjs) {
                        $('#tambahdokter')[0].reset()
                        $('#tambahDokter').collapse('hide')
                    } else {
                        $('#tambahdokternon')[0].reset()
                        $('#tambahDokterNon').collapse('hide')
                    }
                    rincianJasaUrj(parseInt(id_rajal))
                } else {
                    $.notify("Gagal Input Data", "error");
                }
            },
            error: function(error) {
                $.notify("Gagal Input Data", "error");
            }
        });
    }

    function updateUrj() {
        let data = $('#editUrj').serializeArray();
        let formData = {}
        let id = parseInt($('#editModal').attr('data-id'))
        data.map((item) => {
            formData[item.name] = item.value
        })
        formData.id = id
        console.log(formData)
        $.ajax({
            url: `<?php echo site_url(); ?>/Jasamedikrawatjalan/update/${id}`,
            method: "post",
            data: formData,
            dataType: "json",
            success: function(data) {
                if (data.error_code == 0) {
                    $.notify("Sukses Update Data", "success");
                    $('#editUrj')[0].reset()
                    $('#editModal').modal('hide')
                    load_data_urj()
                } else {
                    $.notify("Gagal Update Data", "error");
                }
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function updatedokter(id) {
        let data = $('#editdokter').serializeArray();
        let formData = {}
        data.map((item) => {
            formData[item.name] = item.value
        })
        formData.id = id
        formData.id_rajal = id_rajal
        formData.no_rm = no_rm
        console.log(formData)
        $.ajax({
            url: `<?php echo site_url(); ?>/Jasamedikrawatjalan/update_rincian_rajal_dokter`,
            method: "post",
            data: formData,
            dataType: "json",
            success: function(data) {
                if (data.error_code == 0) {
                    $.notify("Sukses Update Data", "success");
                    $('#editdokter')[0].reset()
                    $('#editDokter').collapse('hide')
                    rincianJasaUrj(parseInt(id_rajal))

                } else {

                    $.notify("Gagal Update Data", "error");
                }
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function updatejasa(id) {
        let data = $('#editUnit').serializeArray();
        let formData = {}
        data.map((item) => {
            formData[item.name] = item.value
        })
        formData.id = id
        formData.id_rajal = id_rajal
        formData.no_rm = no_rm
        console.log(formData)
        $.ajax({
            url: `<?php echo site_url(); ?>/Jasamedikrawatjalan/update_rincian_rajal_unit`,
            method: "post",
            data: formData,
            dataType: "json",
            success: function(data) {
                if (data.error_code == 0) {
                    $.notify("Sukses Update Data", "success");
                    $('#editUnit')[0].reset()
                    $('#editJasa').collapse('hide')
                    rincianJasaUrj(parseInt(id_rajal))

                } else {

                    $.notify("Gagal Update Data", "error");
                }
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function deleteUrj(id, txt) {
        $.confirm({
            title: 'Hapus Data',
            content: 'Yakin menghapus ' + txt + '?',
            buttons: {
                batal: {
                    text: 'Batal',
                    btnClass: 'btn-red',
                    action: function() {

                    }
                },
                hapus: {
                    text: 'Hapus',
                    btnClass: 'btn-blue',
                    keys: ['enter'],
                    action: function() {
                        $.ajax({
                            url: "<?php echo site_url(); ?>/Jasamedikrawatjalan/delete",
                            type: "post",
                            data: {
                                id: id
                            },
                            success: function(ajaxData) {
                                $.notify("Data berhasil di hapus", "success");
                                load_data_urj()
                            },
                            error: function(ajaxData) {
                                $.notify("Data gagal di hapus", "error");
                            }
                        });
                    }
                }
            }
        });

    }

    function deletejasa(id, txt) {
        $.confirm({
            title: 'Hapus Data',
            content: 'Yakin menghapus ' + txt + '?',
            buttons: {
                batal: {
                    text: 'Batal',
                    btnClass: 'btn-red',
                    action: function() {

                    }
                },
                hapus: {
                    text: 'Hapus',
                    btnClass: 'btn-blue',
                    keys: ['enter'],
                    action: function() {
                        $.ajax({
                            url: "<?php echo site_url(); ?>/Jasamedikrawatjalan/delete_rincian_rajal_unit",
                            type: "post",
                            data: {
                                id: id
                            },
                            success: function(ajaxData) {
                                $.notify("Data berhasil di hapus", "success");
                                rincianJasaUrj(parseInt(id_rajal))
                            },
                            error: function(ajaxData) {
                                $.notify("Data gagal di hapus", "error");

                            }
                        });
                    }
                }
            }
        });

    }

    function deletedokter(id, txt) {
        $.confirm({
            title: 'Hapus Data',
            content: 'Yakin menghapus ' + txt + '?',
            buttons: {
                batal: {
                    text: 'Batal',
                    btnClass: 'btn-red',
                    action: function() {

                    }
                },
                hapus: {
                    text: 'Hapus',
                    btnClass: 'btn-blue',
                    keys: ['enter'],
                    action: function() {
                        $.ajax({
                            url: "<?php echo site_url(); ?>/Jasamedikrawatjalan/delete_rincian_rajal_dokter",
                            type: "post",
                            data: {
                                id: id
                            },
                            success: function(ajaxData) {
                                $.notify("Data berhasil di hapus", "success");
                                rincianJasaUrj(parseInt(id_rajal))
                            },
                            error: function(ajaxData) {
                                $.notify("Data gagal di hapus", "error");

                            }
                        });
                    }
                }
            }
        });

    }

    // FUNGSI BUKA MODAL & GET JASA
    function load_data_urj() {
        $('#jasa').val() == '6' ? statusBpjs = true : statusBpjs = false
        let formData = {}
        formData.no_rm = $('#filterm').is(':checked') ? $('input[name="rm"]').val() : ''
        formData.nama_pasien = $('input[name="crnama"]').val()
        formData.kode_unit = $('#cekunit').is(':checked') ? $('select[name="unit"]').val() : ''
        formData.kode_golongan = $('select[name="jasa"]').val()
        formData.tgl_masuk = $('input[name="awal"]').val()
        formData.tgl_keluar = $('input[name="akhir"]').val()
        if ($('input[name="awal"]').val().length > 0) {
            $.ajax({
                url: "<?php echo site_url(); ?>/Jasamedikrawatjalan/get",
                method: "POST",
                dataType: "json",
                data: formData,
                beforeSend: function() {
                    if (statusBpjs) {
                        $('#cardBpjs').addClass('card')
                        $('#cardBpjs').html(cardBpjs)
                        $('#cardNonbpjs').removeClass('card')
                        $('#cardNonbpjs').empty()
                    } else {
                        $('#cardNonbpjs').addClass('card')
                        $('#cardNonbpjs').html(cardNonbpjs)
                        $('#cardBpjs').removeClass('card')
                        $('#cardBpjs').empty()
                    }
                    get_golongan()
                },
                success: function(data) {
                    let html = ""
                    if (data.length > 0) {
                        console.log(data)
                        $.each(data, function(index, value) {
                            if (statusBpjs) {
                                html += `<tr class="position-relative">
                                    <td data-id="${value.id_rajal}">${value.dpjp_ok ? '<div class="d-flex justify-content-center"><span class="bg-success px-3 py-1 rounded-lg">'+value.dpjp_ok+'</span></div>' : ''}</td>
                                <td data-id="${value.id_rajal}">${value.no_rm}</td>
                                <td>${value.nama_pasien}</td>
                                <td>${value.tgl_masuk}</td>
                                <td>${value.tgl_keluar}</td>
                                <td>${value.nosep}</td>
                                <td class="text-right">${Number(value.klaim_inacbg).toLocaleString()}</td>
                                <td class="text-right">${Number(value.klaim_rs).toLocaleString()}</td>
                                <td class="text-right">${value.selisih > 0 ? '<span class="text-success">' + Number(value.selisih).toLocaleString()+'</span>'  : '<span class="text-danger">' + Number(Math.abs(value.selisih)).toLocaleString()+'</span>'}</td>
                                <td class="text-right">${Number(value.jasapelayanan).toLocaleString()}</td>
                                <td class="text-right">${Number(value.direct).toLocaleString()}</td>
                                <td class="text-right">${Number(value.indirect).toLocaleString()}</td>
                                <td class="text-right">${Number(value.reward).toLocaleString()}</td>
                                <td class="text-right">${Number(value.non_medis).toLocaleString()}</td>
                                <td class="position-sticky bg-white border-left" style="right:0;">  
                                    <button class="btn btn-info" onclick="rincianJasaUrj(${value.id_rajal})">J</button>
                                    <button class="btn btn-primary" onclick="editVerifikasiUrj(${value.id_rajal})"><i class="fa fa-edit"></i></button>
                                    <button onclick="deleteUrj('${value.id_rajal}','${value.nama_pasien}')" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                                </tr>`
                            } else {
                                html += `<tr class="position-relative">
                                    <td data-id="${value.id_rajal}">${value.dpjp_ok ? '<div class="d-flex justify-content-center"><span class="bg-success px-3 py-1 rounded-lg">'+value.dpjp_ok+'</span></div>' : ''}</td>
                                <td data-id="${value.id_rajal}">${value.no_rm}</td>
                                <td>${value.nama_pasien}</td>
                                <td>${value.tgl_masuk}</td>
                                <td>${value.tgl_keluar}</td>
                                <td class="text-right">${Number(value.jasapelayanan).toLocaleString()}</td>
                                <td class="text-right">${Number(value.direct).toLocaleString()}</td>
                                <td class="text-right">${Number(value.indirect).toLocaleString()}</td>
                                <td class="text-right">${Number(value.non_medis).toLocaleString()}</td>
                                <td class="position-sticky bg-white border-left" style="right:0;">  
                                    <button class="btn btn-info" onclick="rincianJasaUrj(${value.id_rajal})">J</button>
                                    <button class="btn btn-primary" onclick="editVerifikasiUrj(${value.id_rajal})"><i class="fa fa-edit"></i></button>
                                    <button onclick="deleteUrj('${value.id_rajal}','${value.nama_pasien}')" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                                </tr>`
                            }
                        })
                    } else {
                        html += `<tr><td colspan="100%" class="text-center table-empty">Tidak ada data ditemukan!</td></tr>`
                    }
                    // $('input[name="rm"]').val("")
                    // $('input[name="crnama"]').val("")
                    statusBpjs ? $('#tabelmedikbpjs tbody').html(html) : $('#tabelmediknonbpjs tbody').html(html)
                },
                error: function(error) {
                    console.log(error)
                }
            });
        } else {
            $.notify("Periode tanggal wajib diisi", "error");
        }
    }

    $('.modal').on('hidden.bs.modal', function() {
        let form = $(this).find('form')[0]
        form.reset()
        $('#' + form.id + ' select').trigger('change')
    });

    $('.collapse').on('hidden.bs.collapse', function() {
        let form = $(this).find('form')[0]
        form.reset()
        $('#' + form.id + ' select').trigger('change')
    })

    function get_golongan() {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatjalan/get_golongan",
            method: "POST",
            dataType: "json",
            success: function(data) {
                html = ""
                kolomnonbpjs = ""
                if (data.length > 0) {
                    kolomnonbpjs += `<tr>
                                    <th rowspan="2" width="5%">Kode</th>
                                        <th rowspan="2" >No. RM</th>
                                        <th rowspan="2">Nama Pasien</th>`
                    $.each(data, function(index, value) {
                        if (statusBpjs) {
                            if (value.idgolongan == '6') html += `<option value="${value.idgolongan}">${value.golongan}</option>`
                        } else {
                            if (value.idgolongan != '6') html += `<option value="${value.idgolongan}">${value.golongan}</option>`
                        }
                        if (value.idgolongan != '6') kolomnonbpjs += `<th rowspan="2" class="text-capitalize">${value.golongan}</th>`
                    });
                    kolomnonbpjs += `<th rowspan="2" >Tgl. Masuk</th>
                                        <th rowspan="2" >Tgl Keluar</th>
                                        <th rowspan="2" ">Nama Unit</th>
                                        <th rowspan="2" ">Nama Dokter</th>
                                        <th rowspan="2" >Ttl. Jasa Pelayanan</th>
                                        <th colspan="3" class="text-center">Jasa Medik</th>
                                        <th rowspan="2" class="text-center">Jasa Medik Non-Medis</th>
                                        <th rowspan="2" width="6%" class="position-sticky bg-white border-left" style="right:0; z-index:4">Aksi</th></tr>
                                        <tr>
                                        <th width="4%">Direct</th>
                                        <th width="4%">Indirect</th>
                                        <th width="4%">Reward</th>
                                    </tr>`
                } else {
                    html += `<option value="">-</option>`
                }

                // $('#jasa').html(html)
                $('#tambahUrj select[name="kode_golongan"]').html(html)
                $('#editUrj select[name="kode_golongan"]').html(html)
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function get_unit() {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatjalan/get_unit",
            method: "POST",
            dataType: "json",
            success: function(data) {
                html = ""
                if (data.length > 0) {
                    $.each(data, function(index, value) {
                        html += `<option value="${value.kode_unit}">${value.nama_unit}</option>`

                    });
                } else {
                    html += `<option value="">-</option>`
                }

                $('#unit').html(html)
                $('#tambahJasa select[name="kode_unit"]').html(html)
                $('#editJasa select[name="kode_unit"]').html(html)
                $('#tambahdokternon select[name="kode_unit"]').html(html)
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function get_dokter() {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatjalan/get_dokter",
            method: "POST",
            dataType: "json",
            success: function(data) {
                html = ""
                if (data.length > 0) {
                    $.each(data, function(index, value) {
                        html += `<option value="${value.kode_dokter}">${value.nama_dokter}</option>`

                    });
                } else {
                    html += `<option value="">-</option>`
                }

                $('#tambahDokter select[name="kode_dokter"]').html(html)
                $('#editDokter select[name="kode_dokter"]').html(html)
                $('#editdokternon select[name="kode_dokter"]').html(html)
                $('#tambahdokternon select[name="kode_dokter"]').html(html)
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function get_tipe() {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatjalan/get_tipe_pemeriksaan",
            method: "POST",
            dataType: "json",
            success: function(data) {
                html = ""
                if (data.length > 0) {
                    $.each(data, function(index, value) {
                        html += `<option value="${value.id}">${value.deskripsi}</option>`

                    });
                } else {
                    html += `<option value="">-</option>`
                }
                $('#tambahDokter select[name="type"]').html(html)
                $('#tambahdokternon select[name="type"]').html(html)
                $('#editdokternon select[name="type"]').html(html)
                $('#editDokter select[name="type"]').html(html)
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function get_tindakan() {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/get_tindakan",
            method: "POST",
            dataType: "json",
            success: function(data) {
                html = ""
                if (data.length > 0) {
                    $.each(data, function(index, value) {
                        html += `<option value="${value.id}">${value.deskripsi}</option>`

                    });
                } else {
                    html += `<option value="">-</option>`
                }
                $('#tambahUrj select[name="kode_tindakan"]').append(html)
                $('#editUrj select[name="kode_tindakan"]').append(html)
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function ubahtindakantambah(selector) {
        get_validasitindakan(selector, '#tambahUrj select[name="referensi_tindakan"]')
    }

    function ubahtindakanedit(selector) {
        get_validasitindakan(selector, '#editUrj select[name="referensi_tindakan"]')
    }

    function get_validasitindakan(selector, select) {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamediktindakan/get",
            method: "POST",
            dataType: "json",
            data: {
                jenis_tindakan: $(selector).val()
            },
            success: function(data) {
                html = ""
                if (data.length > 0) {
                    $.each(data, function(index, value) {
                        html += `<option value="${value.id}">${value.kode_tindakan}</option>`
                    });
                } else {
                    html += `<option value="">-</option>`
                }
                $(select).append(html)
            },
            error: function(error) {
                console.log(error)
            }
        });
    }


    function rincianJasaUrj(id) {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatjalan/get_rincian_rajal",
            method: "POST",
            dataType: "json",
            data: {
                id_rajal: id,
                key: 'all',
                kode_golongan: statusBpjs ? '6' : '4'
            },
            success: function(data) {
                console.log(data)
                if (data) {
                    $('#rincianjasaModal input[name="no_rm"]').val(data.no_rm)
                    $('.rincianpasien').text(data.no_rm + '-' + data.nama_pasien)
                    id_rajal = id
                    no_rm = data.no_rm
                    let jasahtml = ""
                    let dokterhtml = ""
                    if (data.data_rincian_unit) {
                        if (data.data_rincian_unit.length > 0) {
                            $.each(data.data_rincian_unit, function(index, value) {
                                jasahtml += `<tr class="position-relative">
                                    <td>${value.no_rm}</td>
                                    <td>${value.nama_unit}</td>
                                    <td>${value.jumlah_hari_rawat_unit}</td>
                                    <td>${value.jumlah_hari_rawat_rs}</td>
                                    <td></td>
                                    <td>${value.tgl_masuk}</td>
                                    <td>${value.tgl_keluar}</td>
                                    <td>${value.tgl_masuk_rs}</td>
                                    <td>${value.tl_keluar_rs}</td>
                                    <td class="column-right bg-white">
                                        <button class="btn btn-primary" onclick="editjasa(${value.id})"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger" onclick="deletejasa(${value.id},'${value.nama_unit}')"><i class="fa fa-trash"></i></button></tr>`
                            });
                        } else {
                            jasahtml += `<tr><td colspan="100%" class="text-center table-empty">Tidak ada data ditemukan!</td></tr>`
                        }
                    } else {
                        jasahtml += `<tr><td colspan="100%" class="text-center table-empty">Tidak ada data ditemukan!</td></tr>`
                    }
                    if (data.data_rincian_dokter) {
                        if (data.data_rincian_dokter.length > 0) {
                            $.each(data.data_rincian_dokter, function(index, value) {
                                dokterhtml += `<tr>
                                <input type="hidden" name="id[]" value="${value.id}"/>
                                <input type="hidden" name="kode_dokter[]" value="${value.kode_dokter}"/>
                                <input type="hidden" name="id_rajal[]" value="${value.id_rajal}"/>
                                <input type="hidden" name="id_type[]" value="${value.id_type}"/>
                                <input type="hidden" name="jasa_dibagi[]" value="${value.jasa_dibagi}"/>
                                <input type="hidden" name="jasa_diterima[]" value="${value.jasa_diterima}"/>
                                <input type="hidden" name="jasa_direct[]" value="${value.jasa_direct}"/>
                                <input type="hidden" name="jasa_indirect[]" value="${value.jasa_indirect}"/>
                                <input type="hidden" name="jasa_non_medis[]" value="${value.jasa_non_medis}"/>
                                <input type="hidden" name="jasa_reward[]" value="${value.jasa_reward}"/>
                                    <td>${value.nama_dokter}</td>
                                    ${statusBpjs ? '':'<td>'+value.nama_unit+'</td>'}
                                    <td>${value.type}</td>
                                    <td>${Number(value.jasa_dibagi).toLocaleString()}</td>
                                    <td>${Number(value.jasa_diterima).toLocaleString()}</td>
                                    <td>
                                        <button class="btn btn-danger" onclick="deletedokter(${value.id},'${value.nama_dokter}')"><i class="fa fa-trash"></i></button></tr>`
                            });
                        } else {
                            dokterhtml += `<tr><td colspan="100%" class="text-center table-empty">Tidak ada data ditemukan!</td></tr>`
                        }
                    } else {
                        dokterhtml += `<tr><td colspan="100%" class="text-center table-empty">Tidak ada data ditemukan!</td></tr>`
                    }
                    if (statusBpjs) {
                        $('#tabelrincianjasa tbody').html(jasahtml)
                        $('#tabelrinciandokter tbody').html(dokterhtml)
                        $('#rincianjasaModal').modal('show')
                        $('#rincianjasaModal').attr('data-id', id)
                    } else {
                        $('#tabelrincianjasanon tbody').html(jasahtml)
                        $('#tabelrinciandokternon tbody').html(dokterhtml)
                        $('#rincianjasaNonbpjsModal').modal('show')
                        $('#rincianjasaNonbpjsModal').attr('data-id', id)
                    }
                } else {

                }

            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function prosesDokter() {
        let arr_id = []
        let arr_dokter = []
        let arr_idrajal = []
        let arr_type = []
        let arr_dibagi = []
        let arr_diterima = []
        let arr_direct = []
        let arr_indirect = []
        let arr_reward = []
        let arr_non_medis = []
        $('input[name="id[]"]').map((i, v) => {
            arr_id.push(v.value)
        })
        $('input[name="kode_dokter[]"]').map((i, v) => {
            arr_dokter.push(v.value)
        })
        $('input[name="id_rajal[]"]').map((i, v) => {
            arr_idrajal.push(v.value)
        })
        $('input[name="id_type[]"]').map((i, v) => {
            arr_type.push(v.value)
        })
        $('input[name="jasa_dibagi[]"]').map((i, v) => {
            arr_dibagi.push(v.value)
        })
        $('input[name="jasa_diterima[]"]').map((i, v) => {
            arr_diterima.push(v.value)
        })
        $('input[name="jasa_direct[]"]').map((i, v) => {
            arr_direct.push(v.value)
        })
        $('input[name="jasa_indirect[]"]').map((i, v) => {
            arr_indirect.push(v.value)
        })
        $('input[name="jasa_non_medis[]"]').map((i, v) => {
            arr_non_medis.push(v.value)
        })
        $('input[name="jasa_reward[]"]').map((i, v) => {
            arr_reward.push(v.value)
        })
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatjalan/proses_jasa_dokter",
            method: "POST",
            data: {
                id: arr_id,
                kode_dokter: arr_dokter,
                id_rajal: arr_idrajal,
                id_type: arr_type,
                jasa_dibagi: arr_dibagi,
                jasa_diterima: arr_diterima,
                jasa_direct: arr_direct,
                jasa_indirect: arr_indirect,
                jasa_non_medis: arr_non_medis,
                jasa_reward: arr_reward,
            },
            success: function(data) {
                if (parseInt(data) > 0) {
                    $.notify("Sukses Update Data", "success");

                } else {
                    $.notify("Gagal Update Data", "error");
                }

            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function uploadfpk() {
        const formData = new FormData();
        const periode = $('#formUpload input[name="periode"]').val().split("-");
        formData.append("format_fpk", $('#formUpload input[name="format_fpk"]').prop('files')[0]);
        formData.append("tahun", periode[0])
        formData.append("bulan", periode[1])
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatjalan/upload_fpk",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                let html = ""
                data = JSON.parse(data)
                if (data.length > 0) {
                    $.each(data, function(index, value) {
                        html += `<tr>
                    <td>${value.no_rm}</td>
                    <td>${value.nama_pasien}</td>
                    <td>${value.no_sep}</td>
                    <td class="text-right">${Number(value.klaim_inacbg_diinput).toLocaleString()}</td>
                    <td class="text-right">${Number(value.klaim_inacbg_diajukan).toLocaleString()}</td>
                    <td class="text-right">${Number(value.klaim_inacbg_disetuji).toLocaleString()}</td>
                    <td class="text-center">${value.tgl_verifikasi}</td>
                    <td class="d-flex justify-content-center">${value.ada_sep ? '<span><i class="fa fa-check text-success"></i></span>': '<span><i class="fa fa-times text-danger"></i></span>' }</td>
                    </tr>`
                    });
                } else {
                    html += `<tr><td colspan="100%" class="text-center table-empty">Data tidak ditemukan!</td></tr>`
                }
                $('#formUpload')[0].reset()
                $('#tableUpload tbody').html(html)
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    // FUNGSI BUKA MODAL REKPITULASI
    function rekapitulasi() {
        let formData = {}
        if ($('#awal').val().length > 0) formData.tgl_masuk = $('#awal').val()
        if ($('#akhir').val().length > 0) formData.tgl_keluar = $('#akhir').val()
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatjalan/rekap_jasa_rajal",
            method: "post",
            data: formData,
            success: function(data) {
                data = JSON.parse(data)
                if (data) {
                    if (data.jasa_bpjs) {
                        let html = `<tr class="position-relative">
                    <td class="text-right">${Number(data.jasa_bpjs.total_klaim_inacbg).toLocaleString()}</td>
                    <td class="text-right">${data.jasa_bpjs.total_obat}</td>
                    <td class="text-right">${data.jasa_bpjs.total_alkes}</td>
                    <td class="text-right">${data.jasa_bpjs.total_bhp}</td>
                    <td class="text-right">${Number(data.jasa_bpjs.total_jasa_pelayanan).toLocaleString()}</td>
                    <td class="text-right">${Number(data.jasa_bpjs.total_jasa_medis).toLocaleString()}</td>
                    <td class="text-right">${Number(data.jasa_bpjs.total_jasa_direct).toLocaleString()}</td>
                    <td class="text-right">${Number(data.jasa_bpjs.total_jasa_indirect).toLocaleString()}</td>
                    <td class="text-right">${Number(data.jasa_bpjs.total_jasa_reward).toLocaleString()}</td>
                    <td class="text-right">${Number(data.jasa_bpjs.total_jasa_non_medis).toLocaleString()}</td>
                     </tr>`
                        $('#tabelrekapitulasibpjs tbody').html(html)
                    }
                    if (data.jasa_non_bpjs) {
                        let html = `<tr class="position-relative">
                    <td class="text-right">${Number(data.jasa_non_bpjs.total_klaim_rs).toLocaleString()}</td>
                    <td class="text-right">${data.jasa_non_bpjs.total_obat}</td>
                    <td class="text-right">${data.jasa_non_bpjs.total_alkes}</td>
                    <td class="text-right">${data.jasa_non_bpjs.total_bhp}</td> 
                    <td class="text-right">${Number(data.jasa_non_bpjs.total_jasa_pelayanan).toLocaleString()}</td>
                    <td class="text-right">${Number(data.jasa_non_bpjs.total_jasa_medis).toLocaleString()}</td>
                    <td class="text-right">${Number(data.jasa_non_bpjs.total_jasa_direct).toLocaleString()}</td>
                    <td class="text-right">${Number(data.jasa_non_bpjs.total_jasa_indirect).toLocaleString()}</td>
                    <td class="text-right">${Number(data.jasa_non_bpjs.total_jasa_reward).toLocaleString()}</td>
                    <td class="text-right">${Number(data.jasa_non_bpjs.total_jasa_non_medis).toLocaleString()}</td>
                     </tr>`
                        $('#tabelrekapitulasinonbpjs tbody').html(html)
                    }
                    if ($('#jasa').val() == '6') {
                        $('#rekapBpjs').show()
                        $('#rekapNonbpjs').hide()
                    } else {
                        $('#rekapNonbpjs').show()
                        $('#rekapBpjs').hide()
                    }
                    $('#rekapitulasiModal').modal('show')

                } else {
                    $.notify("Gagal Mengambil Data", "error");
                }
            },
            error: function(error) {
                console.log(error)
            }
        });

    }

    // FUNGSI BUKA MODAL TAMBAH
    function tambahVerifikasiUrj() {
        if (statusBpjs) {
            $('#tambahUrj input[name="klaim_inacbg"]').attr('disabled', false)
            $('#tambahUrj .klaim').addClass('d-flex')
            $('#tambahUrj input[name="klaim_rs"]').attr('disabled', false)
            $('#tambahUrj .billing').addClass('d-flex')
            $('#tambahUrj select[name="kode_tindakan"]').attr('disabled', false)
            $('#tambahUrj .kodetindakan').addClass('d-flex')
        } else {
            $('#tambahUrj input[name="klaim_inacbg"]').attr('disabled', true)
            $('#tambahUrj .klaim').addClass('d-none')
            $('#tambahUrj input[name="klaim_rs"]').attr('disabled', true)
            $('#tambahUrj .billing').addClass('d-none')
            $('#tambahUrj select[name="kode_tindakan"]').attr('disabled', true)
            $('#tambahUrj .kodetindakan').addClass('d-none')
        }
        $('#tambahModal').modal('show')
    }

    // FUNGSI BUKA MODAL EDIT
    function editVerifikasiUrj(id) {
        if (statusBpjs) {
            $('#editUrj input[name="klaim_inacbg"]').attr('disabled', false)
            $('#editUrj .klaim').addClass('d-none')
            $('#editUrj input[name="klaim_rs"]').attr('disabled', false)
            $('#editUrj .billing').addClass('d-flex')
            $('#editUrj select[name="kode_tindakan"]').attr('disabled', false)
            $('#editUrj .kodetindakan').addClass('d-flex')
        } else {
            $('#editUrj input[name="klaim_inacbg"]').attr('disabled', true)
            $('#editUrj .klaim').addClass('d-none')
            $('#editUrj input[name="klaim_rs"]').attr('disabled', true)
            $('#editUrj .billing').addClass('d-none')
            $('#editUrj select[name="kode_tindakan"]').attr('disabled', true)
            $('#editUrj .kodetindakan').addClass('d-none')
        }
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatjalan/edit",
            method: "POST",
            dataType: "json",
            data: {
                id: id
            },
            success: function(data) {

                if (data) {
                    $('#editUrj input[name="no_rm"]').val(data.no_rm).trigger('blur');
                    $('#editUrj input[name="register"]').val(data.register)
                    $('#editUrj input[name="obat"]').val(data.obat)
                    $('#editUrj input[name="alkes"]').val(data.alkes)
                    $('#editUrj input[name="bhp"]').val(data.bhp)
                    $('#editUrj input[name="tgl_masuk"]').val(data.tgl_masuk)
                    $('#editUrj input[name="tgl_keluar"]').val(data.tgl_keluar)
                    $('#editUrj input[name="nosep"]').val(data.nosep)
                    $('#editUrj select[name="kode_golongan"]').val(data.kode_golongan).trigger('change');
                    if (statusBpjs) {
                        $('#editUrj input[name="klaim_inacbg"]').val(data.klaim_inacbg)
                        $('#editUrj input[name="klaim_rs"]').val(data.klaim_rs)
                        $('#editUrj select[name="kode_tindakan"]').val(data.kodetindakan).trigger('change');
                    }
                    $('#editUrj input[name="diagnosa"]').val(data.diagnosa)
                    $('#editModal').modal('show')
                    $('#editModal').attr('data-id', id)
                } else {

                    $.notify("Gagal Mengambil Data", "error");

                }

            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    // FUNGSI TAMBAH JASA PERUANGAN
    function tambahjasa() {
        $('#tambahJasa').collapse('toggle')
    }
    // FUNGSI EDIT JASA PERUANGAN
    function editjasa(id) {
        $('#updatejasaBtn').attr(`onclick`, `updatejasa(${id})`)
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatjalan/edit_rincian_rajal_unit",
            method: "POST",
            dataType: "json",
            data: {
                id: id
            },
            success: function(data) {
                if (data) {

                    $('#editUnit input[name="tgl_masuk"]').val(data.tgl_masuk)
                    $('#editUnit input[name="tgl_keluar"]').val(data.tgl_keluar)
                    $('#editUnit select[name="kode_unit"]').val(data.kode_unit)
                    // $('#editUnit input[name="hari_rawat_unit"]').val(data.jumlah_hari_rawat_unit)
                    // $('#editUnit input[name="hari_rawat_rs"]').val(data.jumlah_hari_rawat_rs)
                    $('#editJasa').collapse('toggle')

                } else {

                    $.notify("Gagal Mengambil Data", "error");

                }

            },
            error: function(error) {
                console.log(error)
            }
        });
    }
    // FUNGSI TAMBAH JASA PERUANGAN
    function tambahdokter() {
        statusBpjs ? $('#tambahDokter').collapse('toggle') : $('#tambahDokterNon').collapse('toggle')
    }
    // FUNGSI EDIT JASA PERUANGAN
    function editdokter(id) {
        $('#updatedokterBtn').attr(`onclick`, `updatedokter(${id})`)
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatjalan/edit_rincian_rajal_dokter",
            method: "POST",
            dataType: "json",
            data: {
                id: id
            },
            success: function(data) {
                if (data) {
                    if (statusBpjs) {
                        $('#editdokter select[name="kode_dokter"]').val(data.kode_dokter)
                        $('#editdokter select[name="type"]').val(data.type)
                        $('#editdokter input[name="qty"]').val(data.qty)
                        // $('#editdokter input[name="jasa_dibagi"]').val(data.kode_unit)
                        // $('#editdokter input[name="jasa_diterima"]').val(data.kode_unit)
                        $('#editDokter').collapse('toggle')
                    } else {
                        $('#editdokternon select[name="kode_dokter"]').val(data.kode_dokter)
                        $('#editdokternon select[name="type"]').val(data.type)
                        $('#editdokternon input[name="qty"]').val(data.qty)
                        // $('#editdokter input[name="jasa_dibagi"]').val(data.kode_unit)
                        // $('#editdokter input[name="jasa_diterima"]').val(data.kode_unit)
                        $('#editDokterNon').collapse('toggle')
                    }

                } else {

                    $.notify("Gagal Mengambil Data", "error");

                }

            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function clearselectedrow(id) {
        $(`#${id} tbody tr`).each(function(index, tr) {
            if ($(this).hasClass('tr-clicked')) {
                $(this).removeClass('tr-clicked')
            }
        });
    }
</script>