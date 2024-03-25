<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/jquery-confirm.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('select').select2();
        load_data_dokter()
        get_golongan()
    });

    let total = {}
    function load_data_dokter() {
        let formData = {}
        formData.jasa_pelayanan = $('#cekjasa').is(':checked') ? $('select[name="jasa"]').val() : ''
        formData.tgl_masuk = $('input[name="awal"]').val()
        formData.tgl_keluar = $('input[name="akhir"]').val()
        load_data_total()
        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/rekap_jasa_ranap_dokter",
            method: "POST",
            dataType: "json",
            data : formData,
            success: function(data) {
            
                html = ""

                console.log(data.list_dokter)

                if (data.list_dokter) {
                    let list_dokter = JSON.parse(data.list_dokter)
                    console.log(list_dokter)
                    $.each(list_dokter, function(index, value) {
                        html += '<tr class="position-relative">'
                        html += `<td>${value.nomor}</td>`
                        html += `<td>${value.nama_dokter}</td>`
                        for (let i = 1; i < 10; i++) {
                            let nilai_kolom = `<td>0</td>`
                            value.list_jasa.forEach((nilai) => {
                                if (Object.keys(nilai)[0] == i) {
                                    nilai_kolom = `<td>${Object.values(nilai)[0].toLocaleString()}</td>`
                                }
                            })
                            html += nilai_kolom

                        }
                        let direct, indirect, reward, total = '0'
                        value.list_jasa.forEach((nilai) => {
                            if (Object.keys(nilai)[0] == 'indirect') indirect = `<td>${nilai.indirect.toLocaleString()}</td>`
                            if (Object.keys(nilai)[0] == 'direct') direct = `<td>${nilai.direct.toLocaleString()}</td>`
                            if (Object.keys(nilai)[0] == 'reward') reward = `<td>${nilai.reward.toLocaleString()}</td>`
                            if (Object.keys(nilai)[0] == 'sub_total_jasa_dokter') total = `<td>${nilai.sub_total_jasa_dokter.toLocaleString()}</td>`
                        })
                        html += direct
                        html += indirect
                        html += reward
                        html += total
                        html += `</tr>`
                    })
                } else {
                    html += `<tr><td colspan="100%" class="text-center table-empty">Tidak ada data ditemukan!</td></tr>`
                }
                $('#tabledokter tbody').html(html)
            },
            error: function(error) {
                console.log(error.responseText)
            }
        });
    }

    function load_data_total(){
        let formData = {}
        formData.jasa_pelayanan = $('#cekjasa').is(':checked') ? $('select[name="jasa"]').val() : ''
        formData.tgl_masuk = $('input[name="awal"]').val()
        formData.tgl_keluar = $('input[name="akhir"]').val()

        $.ajax({
            url: "<?php echo site_url(); ?>/Jasamedikrawatinap/rekap_jasa_ranap_dokter",
            method: "POST",
            dataType: "json",
            data : formData,

            success:function(data){
                
                console.log(data)
                html = ""
                html += `<tr style="border:1px solid black;">
                                        <th colspan="2">Total</th>
                                        <td>${data.total_dpjp.toLocaleString()}</td>
                                        <td>${data.total_operator.toLocaleString()}</td>
                                        <td>${data.total_anastesi.toLocaleString()}</td>
                                        <td>${data.total_konsul.toLocaleString()}</td>
                                        <td>${data.total_rawat_bersama.toLocaleString()}</td>
                                        <td>${data.total_lab_pk.toLocaleString()}</td>
                                        <td>${data.total_lab_pa.toLocaleString()}</td>
                                        <td>${data.total_radiologi.toLocaleString()}</td>
                                        <td>${data.total_mikrobiologi.toLocaleString()}</td>
                                        <td>${data.total_direct.toLocaleString()}</td>
                                        <td>${data.total_indirect.toLocaleString()}</td>
                                        <td>${data.total_reward.toLocaleString()}</td>
                                        <td>${data.total_jasa.toLocaleString()}</td>
                                    </tr>`

                    

               
                 $('#tabledokter tfoot').html(html)
            },
             error: function(error) {
                console.log(error.responseText)
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
               
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    function jasacek() {
        if (document.getElementById('cekjasa').checked) {
            document.getElementById('jasa').disabled = false;
        } else
            document.getElementById('jasa').disabled = true;
    }
</script>