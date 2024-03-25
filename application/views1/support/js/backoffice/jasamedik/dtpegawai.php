<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/jquery-confirm.min.js"></script>
<script>
    $(function() {
        $('select').select2({
            tags: true
        });
        get_posisi()
        get_unit()
        get_pendidikan()
        get_golongan()
        get_jabatan()
        get_pangkat()
        load_data_pegawai()
    });

    function unitcek() {
        if (document.getElementById('cekunit').checked) {
            document.getElementById('unit').disabled = false;
        } else
            document.getElementById('unit').disabled = true;

    }

    function posisicek() {
        if (document.getElementById('cekposisi').checked) {
            document.getElementById('posisi').disabled = false;
        } else
            document.getElementById('posisi').disabled = true;


    }

    function get_posisi() {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikpegawai/get_posisi",
            method: "POST",
            dataType: "json",
            success: function(data) {
                html = ""
                if (data.length > 0) {
                    $.each(data, function(index, value) {
                        html += `<option value="${value.id}">${value.kategori}</option>`

                    });
                } else {
                    html += `<option value="">-</option>`
                }
                $('#tambahPegawai select[name="posisi"]').html(html)
                $('#editPegawai select[name="posisi"]').html(html)
                $('#posisi').html(html)
            },
            error: function(error) {
                console.log(error)
            }
        });

    }

    function get_pangkat() {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikpegawai/get_referensi",
            method: "POST",
            dataType: "json",
            data: {
                aplikasi: 2
            },
            success: function(data) {
                html = ""
                if (data.referensi.length > 0) {
                    $.each(data.referensi, function(index, value) {
                        html += `<option value="${value.id}">${value.deskripsi}</option>`

                    });
                } else {
                    html += `<option value="">-</option>`
                }
                $('#tambahPegawai select[name="pangkat"]').html(html)
                $('#editPegawai select[name="pangkat"]').html(html)
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function get_jabatan() {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikpegawai/get_referensi",
            method: "POST",
            dataType: "json",
            data: {
                aplikasi: 3
            },
            success: function(data) {
                html = ""
                console.log(data)
                if (data.referensi.length > 0) {
                    $.each(data.referensi, function(index, value) {
                        html += `<option value="${value.id}">${value.deskripsi}</option>`

                    });
                } else {
                    html += `<option value="">-</option>`
                }
                $('#tambahPegawai select[name="jabatan"]').html(html)
                $('#editPegawai select[name="jabatan"]').html(html)
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function get_golongan() {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikpegawai/get_referensi",
            method: "POST",
            dataType: "json",
            data: {
                aplikasi: 1
            },
            success: function(data) {
                html = ""
                console.log(data)
                if (data.referensi.length > 0) {
                    $.each(data.referensi, function(index, value) {
                        html += `<option value="${value.id}">${value.deskripsi}</option>`

                    });
                } else {
                    html += `<option value="">-</option>`
                }
                $('#tambahPegawai select[name="gol"]').html(html)
                $('#editPegawai select[name="gol"]').html(html)
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function get_pendidikan() {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikpegawai/get_pendidikan",
            method: "POST",
            dataType: "json",
            success: function(data) {
                html = ""
                if (data.length > 0) {
                    $.each(data, function(index, value) {
                        html += `<option value="${value.idpendidikan}">${value.pendidikan}</option>`

                    });
                } else {
                    html += `<option value="">-</option>`
                }
                $('#tambahPegawai select[name="pendidikan"]').html(html)
                $('#editPegawai select[name="pendidikan"]').html(html)
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function get_unit() {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikpegawai/get_unit",
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
                $('#tambahPegawai select[name="kode_unit"]').html(html)
                $('#editPegawai select[name="kode_unit"]').html(html)
                $('#unit').html(html)
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    // FUNGSI BUKA MODAL & GET JASA
    function load_data_pegawai() {
        let formData = {}
        formData.posisi = $('#cekposisi').is(":checked") == true ? $('#posisi').val() : ''
        formData.kode_unit = $('#cekunit').is(":checked") == true ? $('#unit').val() : ''
        formData.nama_pegawai = $('#crnama').val()
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikpegawai/get",
            method: "POST",
            dataType: "json",
            data: formData,
            success: function(data) {
                html = ""
                console.log(data)
                if (data.length > 0) {
                    $.each(data, function(index, value) {
                        html += `<tr>
                    <td data-id="${value.id}">${value.nip}</td>
                    <td>${value.nama}</td>
                    <td> ${value.tmt}</td>
                    <td>${value.gol}</td>
                    <td>${value.posisi}</td>
                    <td>${value.pangkat}</td>
                    <td>${value.nama_unit}</td>
                    <td>${value.jabatan}</td>
                    <td>${value.sex}</td>
                    <td>${value.pendidikan}</td>
                    <td>${value.no_rekening}</td>
                    <td>${value.nama_pemilik_rekening}</td>
                    <td>${value.aktip == "1" ? 'Aktif' : 'Tidak Aktif'}</td>
                    <td>
                           <button class="btn btn-primary" onclick="editpegawai(${value.id})"><i class="fa fa-edit"></i></button>
                           <button onclick="deletePegawai('${value.id}','${value.nip}')" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                    </tr>`
                    });
                } else {
                    html += `<tr><td colspan="100%" class="text-center table-empty">Tidak ada data ditemukan!</td></tr>`
                }
                $('#countPegawai').text(data.length)
                $('#tabelmedikpegawai tbody').html(html)
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    // FUNGSI BUKA MODAL TAMBAH
    function tambahpegawai() {
        $('#tambahModal').modal('show')
    }

    function simpanPegawai() {
        let data = $('#tambahPegawai').serializeArray();
        let formData = {}
        data.map((item) => {
            formData[item.name] = item.value
        })
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikpegawai/store",
            method: "POST",
            data: formData,
            dataType: "json",
            success: function(data) {
                if (data.error_code == "0") {
                    $.notify("Sukses Input Data", "success");
                    $('#tambahPegawai')[0].reset()
                    $('#tambahModal').modal('hide')
                    load_data_pegawai()
                } else {
                    $.notify("Gagal Input Data", "error");
                }
            },
            error: function(error) {
                $.notify("Gagal Input Data", "error");
            }
        });
    }

    // FUNGSI BUKA MODAL EDIT
    function editpegawai(id) {
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikpegawai/edit",
            method: "POST",
            dataType: "json",
            data: {
                id: id
            },
            success: function(data) {
                if (data) {
                    $('#editPegawai input[name="nip"]').val(data.nip);
                    $('#editPegawai input[name="nama_pegawai"]').val(data.nama);
                    $('#editPegawai input[name="tmt"]').val(data.tmt);
                    $('#editPegawai select[name="sex"]').select2("val", data.sex);
                    $('#editPegawai select[name="posisi"]').select2("val", data.idposisi);
                    $('#editPegawai select[name="gol"]').select2("val", data.idgolongan);
                    $('#editPegawai select[name="pangkat"]').select2("val", data.idpangkat);
                    // $('#editPegawai select[name="kode_unit"]').select2("val", data.kode_unit);
                    // $('#editPegawai select[name="jabatan"]').select2("val", data.idjabatan)
                    $('#editPegawai select[name="aktif"]').select2("val", data.aktip);
                    $('#editPegawai select[name="pendidikan"]').select2("val", data.idpendidikan);
                    $('#editPegawai input[name="no_rekening"]').val(data.no_rekening);
                    $('#editPegawai input[name="nama_pemilik"]').val(data.nama_pemilik_rekening);
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

    function updatePegawai() {
        let data = $('#editPegawai').serializeArray();
        let formData = {}
        let id = parseInt($('#editModal').attr('data-id'))
        data.map((item) => {
            formData[item.name] = item.value
        })
        formData.id = id
        formData.nama = formData.nama_pegawai
        $.ajax({
            url: `<?php echo site_url(); ?>/Jasamedikpegawai/update/${id}`,
            method: "post",
            data: formData,
            dataType: "json",
            success: function(data) {
                if (data.error_code == 0) {
                    $.notify("Sukses Update Data", "success");
                    $('#editPegawai')[0].reset()
                    $('#editModal').modal('hide')
                    load_data_pegawai()
                } else {
                    $.notify("Gagal Update Data", "error");
                }
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function deletePegawai(id, txt) {
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
                            url: "<?php echo site_url(); ?>/Jasamedikpegawai/delete",
                            type: "post",
                            data: {
                                id: id
                            },
                            success: function(ajaxData) {
                                $.notify("Data berhasil di hapus", "success");
                                load_data_pegawai()
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
</script>