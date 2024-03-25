<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/jquery-confirm.min.js"></script>


<script type="text/javascript">
    $.fn.datepicker.noConflict();
    let nomor_rm_klik = ""
    let id_ranap
    let no_rm
    $(function() {
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
        $('select').select2();
        get_golongan()
        get_unit()
        get_dokter()
        get_tipe()
        get_tindakan()
        load_data_uri()
    });
    $('#tambahUri input[name="no_rm"]').on('keypress', function(e) {
        if (e.which == 13) {
            let el = $(this)
            nameByRm(el, 'tambah')
        }
    });
    $('#tambahUri input[name="no_rm"]').blur(function() {
        let el = $(this)
        nameByRm(el, 'tambah')
    });
    $('#editUri input[name="no_rm"]').on('keypress', function(e) {
        if (e.which == 13) {
            let el = $(this)
            nameByRm(el, 'edit')
        }
    });
    $('#editUri input[name="no_rm"]').blur(function() {
        let el = $(this)
        nameByRm(el, 'edit')
    });


    function nameByRm(el, action) {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/get_pasien",
            method: "POST",
            dataType: "json",
            data: {
                no_rm: $(el).val()
            },
            success: function(data) {
                html = ""
                console.log("ubah rm")
                if (data.length > 0) {
                    action == 'tambah' ? $('#tambahUri input[name="nama_pasien"]').val(data[0].nama_pasien) : $('#editUri input[name="nama_pasien"]').val(data[0].nama_pasien)
                } else {
                    action == 'tambah' ? $('#tambahUri input[name="nama_pasien"]').val("") : $('#editUri input[name="nama_pasien"]').val("")
                    $('#tambahUri input[name="nama_pasien"]').val("")

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

    function jasacek() {
        if (document.getElementById('cekjasa').checked) {
            document.getElementById('jasa').disabled = false;
        } else
            document.getElementById('jasa').disabled = true;
    }

    $(document).on('click', '#tabelmedikuri tbody tr', function() {
        if (!$('.table-empty').length) {
            clearselectedrow('tabelmedikuri')
            $(this).addClass('tr-clicked')
            nomor_rm_klik = $(this).find('td:nth-child(1)').attr('data-id')
        }
    });

    function simpanUri() {
        let data = $('#tambahUri').serializeArray();
        let formData = {}
        data.map((item) => {
            formData[item.name] = item.value
        })
        formData.nama_golongan = $('#tambahUri select[name="kode_golongan"] option:selected').text()
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/store",
            method: "POST",
            data: formData,
            dataType: "json",
            success: function(data) {
                if (data.error_code == "0") {
                    $.notify("Sukses Input Data", "success");
                    $('#tambahUri')[0].reset()
                    $('#tambahModal').modal('hide')
                    load_data_uri()
                } else {
                    $.notify("Gagal Input Data", "error");
                }
                $('#tambahUri select').trigger('change')
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
        formData.id_ranap = id_ranap
        formData.no_rm = no_rm
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/store_rincian_ranap_unit",
            method: "POST",
            data: formData,
            dataType: "json",
            success: function(data) {
                if (data.error_code == "0") {
                    $.notify("Sukses Input Data", "success");
                    $('#tambahUnit')[0].reset()
                    $('#tambahJasa').collapse('hide')
                    rincianJasaUri(parseInt(id_ranap))
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
        let data = $('#tambahdokter').serializeArray();
        let formData = {}
        data.map((item) => {
            formData[item.name] = item.value
        })
        formData.id_ranap = id_ranap
        formData.no_rm = no_rm
        console.log(formData)
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/store_rincian_ranap_dokter",
            method: "POST",
            data: formData,
            dataType: "json",
            success: function(data) {
                if (data.error_code == "0") {
                    $.notify("Sukses Input Data", "success");
                    $('#tambahdokter')[0].reset()
                    $('#tambahDokter').collapse('hide')
                    $('#tambahDokter select[name="kode_dokter"]').trigger('change');
                    $('#tambahDokter select[name="type"]').trigger('change');
                    rincianJasaUri(parseInt(id_ranap))
                    load_data_uri()
                } else {
                    $.notify("Gagal Input Data", "error");
                }
            },
            error: function(error) {
                $.notify("Gagal Input Data", "error");
            }
        });
    }

    function updateUri() {
        let data = $('#editUri').serializeArray();
        let formData = {}
        let id = parseInt($('#editModal').attr('data-id'))
        data.map((item) => {
            formData[item.name] = item.value
        })
        formData.id = id
        console.log(formData)
        $.ajax({
            url: `<?php echo site_url(); ?>/Jasamedikrawatinap/update/${id}`,
            method: "post",
            data: formData,
            dataType: "json",
            success: function(data) {
                if (data.error_code == 0) {
                    $.notify("Sukses Update Data", "success");
                    $('#editUri')[0].reset()
                    $('#editModal').modal('hide')
                    load_data_uri()
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
        formData.id_ranap = id_ranap
        formData.no_rm = no_rm
        console.log(formData)
        $.ajax({
            url: `<?php echo site_url(); ?>/Jasamedikrawatinap/update_rincian_ranap_dokter`,
            method: "post",
            data: formData,
            dataType: "json",
            success: function(data) {
                if (data.error_code == 0) {
                    $.notify("Sukses Update Data", "success");
                    $('#editdokter')[0].reset()
                    $('#editDokter').collapse('hide')
                    $('#editdokter select[name="kode_dokter"]').trigger('change');
                    $('#editdokter select[name="type"]').trigger('change');
                    rincianJasaUri(parseInt(id_ranap))
                    load_data_uri()
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
        formData.id_ranap = id_ranap
        formData.no_rm = no_rm
        $.ajax({
            url: `<?php echo site_url(); ?>/Jasamedikrawatinap/update_rincian_ranap_unit`,
            method: "post",
            data: formData,
            dataType: "json",
            success: function(data) {
                if (data.error_code == 0) {
                    $.notify("Sukses Update Data", "success");
                    $('#editUnit')[0].reset()
                    $('#editJasa').collapse('hide')
                    rincianJasaUri(parseInt(id_ranap))

                } else {

                    $.notify("Gagal Update Data", "error");
                }
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function deleteUri(id, txt) {
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
                            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/delete",
                            type: "post",
                            data: {
                                id: id
                            },
                            success: function(ajaxData) {
                                $.notify("Data berhasil di hapus", "success");
                                load_data_uri()
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
                            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/delete_rincian_ranap_unit",
                            type: "post",
                            data: {
                                id: id
                            },
                            success: function(ajaxData) {
                                $.notify("Data berhasil di hapus", "success");
                                rincianJasaUri(parseInt(id_ranap))
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
                            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/delete_rincian_ranap_dokter",
                            type: "post",
                            data: {
                                id: id
                            },
                            success: function(ajaxData) {
                                $.notify("Data berhasil di hapus", "success");
                                rincianJasaUri(parseInt(id_ranap))
                                load_data_uri()
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
    function load_data_uri() {
        let formData = {}
        formData.no_rm = $('#filterm').is(':checked') ? $('input[name="rm"]').val() : ''
        formData.nama_pasien = $('input[name="crnama"]').val()
        formData.kode_unit = $('#cekunit').is(':checked') ? $('select[name="unit"]').val() : ''
        formData.jasa_pelayanan = $('#cekjasa').is(':checked') ? $('select[name="jasa"]').val() : ''
        formData.tgl_masuk = $('input[name="awal"]').val()
        formData.tgl_keluar = $('input[name="akhir"]').val()
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/get",
            method: "POST",
            dataType: "json",
            data: formData,
            success: function(data) {
                html = ""
                console.log(data)
                if (data.length > 0) {
                    $.each(data, function(index, value) {
                        html += `<tr class="position-relative">
                    <td data-id="${value.id_ranap}">${value.dpjp_ok ? '<div class="d-flex justify-content-center"><span class="bg-success px-3 py-1 rounded-lg">'+value.dpjp_ok+'</span></div>' : ''}</td>
                    <td>${value.no_rm}</td>
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
                           <button class="btn btn-info" onclick="rincianJasaUri(${value.id_ranap})">J</button>
                           <button class="btn btn-primary" onclick="editVerifikasiUri(${value.id_ranap})"><i class="fa fa-edit"></i></button>
                           <button onclick="deleteUri('${value.id_ranap}','${value.nama_pasien}')" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                    </tr>`
                    });
                } else {
                    html += `<tr><td colspan="100%" class="text-center table-empty">Tidak ada data ditemukan!</td></tr>`
                }
                // $('input[name="rm"]').val("")
                // $('input[name="crnama"]').val("")
                $('#tabelmedikuri tbody').html(html)
            },
            error: function(error) {
                console.log(error)
            }
        });
    }


    function get_unit() {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/get_unit",
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
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function get_golongan() {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/get_golongan",
            method: "POST",
            dataType: "json",
            success: function(data) {
                html = ""
                if (data.length > 0) {
                    $.each(data, function(index, value) {
                        html += `<option value="${value.idgolongan}">${value.golongan}</option>`

                    });
                } else {
                    html += `<option value="">-</option>`
                }

                $('#jasa').html(html)
                $('#tambahUri select[name="kode_golongan"]').html(html)
                $('#editUri select[name="kode_golongan"]').html(html)
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function get_dokter() {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/get_dokter",
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
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function get_tipe() {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/get_tipe_pemeriksaan",
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
                $('#tambahUri select[name="kode_tindakan"]').append(html)
                $('#editUri select[name="kode_tindakan"]').append(html)
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    // function ubahtindakantambah(selector) {
    //     get_validasitindakan(selector, '#tambahUri select[name="referensi_tindakan"]')
    // }

    // function ubahtindakanedit(selector) {
    //     get_validasitindakan(selector, '#editUri select[name="referensi_tindakan"]')
    // }

    // function get_validasitindakan(selector, select) {
    //     $.ajax({
    //         url: "<?php echo site_url(); ?>/Jasamediktindakan/get",
    //         method: "POST",
    //         dataType: "json",
    //         data: {
    //             jenis_tindakan: $(selector).val()
    //         },
    //         success: function(data) {
    //             html = ""
    //             if (data.length > 0) {
    //                 $.each(data, function(index, value) {
    //                     html += `<option value="${value.id}">${value.kode_tindakan}</option>`
    //                 });
    //             } else {
    //                 html += `<option value="">-</option>`
    //             }
    //             $(select).append(html)
    //         },
    //         error: function(error) {
    //             console.log(error)
    //         }
    //     });
    // }

    function rincianJasaUri(id) {
        console.log(id)
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/get_rincian_ranap",
            method: "POST",
            dataType: "json",
            data: {
                id_ranap: id,
                key: 'all'
            },
            success: function(data) {
                console.log(data)
                if (data) {
                    $('#rincianjasaModal input[name="no_rm"]').val(data.no_rm)
                    $('#rincianpasien').text(data.no_rm + '-' + data.nama_pasien)
                    id_ranap = id
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
                                <input type="hidden" name="id_ranap[]" value="${value.id_ranap}"/>
                                <input type="hidden" name="id_type[]" value="${value.id_type}"/>
                                <input type="hidden" name="jasa_dibagi[]" value="${value.jasa_dibagi}"/>
                                <input type="hidden" name="jasa_diterima[]" value="${value.jasa_diterima}"/>
                                <input type="hidden" name="jasa_direct[]" value="${value.jasa_direct}"/>
                                <input type="hidden" name="jasa_indirect[]" value="${value.jasa_indirect}"/>
                                <input type="hidden" name="jasa_non_medis[]" value="${value.jasa_non_medis}"/>
                                <input type="hidden" name="jasa_reward[]" value="${value.jasa_reward}"/>
                                    <td>${value.nama_dokter}</td>
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
                    $('#tabelrincianjasa tbody').html(jasahtml)
                    $('#tabelrinciandokter tbody ').html(dokterhtml)
                    $('#rincianjasaModal').modal('show')
                    $('#rincianjasaModal').attr('data-id', id)
                } else {

                }

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
            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/rekap_jasa_ranap",
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
                    if (!$('#uncekjasa').is(':checked')) {
                        if ($('#jasa').val() == '6') {
                            $('#rekapBpjs').show()
                            $('#rekapNonbpjs').hide()
                        } else {
                            $('#rekapNonbpjs').show()
                            $('#rekapBpjs').hide()
                        }
                    } else {
                        $('#rekapNonbpjs').show()
                            $('#rekapBpjs').show()
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
    function tambahVerifikasiUri() {
        $('#tambahModal').modal('show')
    }

    $('.modal').on('hidden.bs.modal', function() {
        let form = $(this).find('form')[0]
        if (form) {
            form.reset()
            $('#' + form.id + ' select').trigger('change')
        }
    });

    $('.collapse').on('hidden.bs.collapse', function() {
        let form = $(this).find('form')[0]
        if (form) {
            form.reset()
            $('#' + form.id + ' select').trigger('change')
        }
    })

    // FUNGSI BUKA MODAL EDIT
    function editVerifikasiUri(id) {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/edit",
            method: "POST",
            dataType: "json",
            data: {
                id: id
            },
            success: function(data) {

                if (data) {
                    console.log(data)
                    $('#editUri input[name="no_rm"]').val(data.no_rm).trigger('blur');
                    $('#editUri input[name="obat"]').val(data.obat)
                    $('#editUri input[name="alkes"]').val(data.alkes)
                    $('#editUri input[name="bhp"]').val(data.bhp)
                    $('#editUri input[name="tgl_masuk"]').val(data.tgl_masuk)
                    $('#editUri input[name="tgl_keluar"]').val(data.tgl_keluar)
                    $('#editUri input[name="nosep"]').val(data.nosep)
                    $('#editUri select[name="kode_golongan"]').val(data.kode_golongan).trigger('change');
                    $('#editUri input[name="klaim_inacbg"]').val(data.klaim_inacbg)
                    $('#editUri input[name="klaim_rs"]').val(data.klaim_rs)
                    $('#editUri input[name="diagnosa"]').val(data.diagnosa)
                    $('#editUri select[name="kode_tindakan"]').val(data.kodetindakan).trigger('change');
                    // ubahtindakanedit('#editUri select[name="kode_tindakan"]')
                    // setTimeout(function() {
                    //     $('#editUri select[name="referensi_tindakan"]').val(data.kode_tindakan_ref).trigger('change');
                    // }, 2000)
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
    function prosesDokter() {
        let arr_id = []
        let arr_dokter = []
        let arr_idranap = []
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
        $('input[name="id_ranap[]"]').map((i, v) => {
            arr_idranap.push(v.value)
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
            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/proses_jasa_dokter",
            method: "POST",
            data: {
                id: arr_id,
                kode_dokter: arr_dokter,
                id_ranap: arr_idranap,
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
                    load_data_uri()
                } else {
                    $.notify("Gagal Update Data", "error");
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
            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/edit_rincian_ranap_unit",
            method: "POST",
            dataType: "json",
            data: {
                id: id
            },
            success: function(data) {
                if (data) {

                    $('#editUnit input[name="tgl_masuk"]').val(data.tgl_masuk)
                    $('#editUnit input[name="tgl_keluar"]').val(data.tgl_keluar)
                    $('#editUnit select[name="kode_unit"]').val(data.kode_unit).trigger('change');
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
        $('#tambahDokter').collapse('toggle')
    }
    // FUNGSI EDIT JASA PERUANGAN
    function editdokter(id) {
        $('#updatedokterBtn').attr(`onclick`, `updatedokter(${id})`)
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/edit_rincian_ranap_dokter",
            method: "POST",
            dataType: "json",
            data: {
                id: id
            },
            success: function(data) {
                if (data) {

                    $('#editdokter select[name="kode_dokter"]').val(data.kode_dokter).trigger('change');
                    $('#editdokter select[name="type"]').val(data.type).trigger('change');
                    // $('#editdokter input[name="qty"]').val(data.qty)
                    $('#editDokter').collapse('toggle')

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