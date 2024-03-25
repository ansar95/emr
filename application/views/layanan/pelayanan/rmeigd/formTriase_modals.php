<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css">


<div class="modal-dialog modal-xl modal-dialog-centered" style="max-width: 1400px;">>
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">
                    <?php echo 'Triase' ?>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- =========== -->
                <div class="tab-pane fade show active" id="tabtriase" role="tabpanel">
                    <!-- <table border="1" width="100%"> -->
                    <table border="1" width="100%" style="border-color: black;">
                        <tr>
                            <td rowspan="2"></td>
                            <td colspan="2" width="36%"
                                style=" font-size: 15px; text-align: center; background-color: #F25E4C; color: white; height: 30px;">
                                PRIORITAS I</td>
                            <td colspan="2" width="36%"
                                style=" font-size: 15px; text-align: center; background-color: yellow; color: black;">
                                PRIORITAS II</td>
                            <td style=" font-size: 15px; text-align: center; background-color: green; color: white;">
                                PRIOROTAS III</td>
                        </tr>

                        <tr>
                            <td
                                style=" font-size: 13px; height:80px; background-color: #F25E4C; color: white; text-align: center;">
                                <input class="state icheckbox_square-red" type="checkbox" id="kategori1" <?php echo ($dttriase->kategori1 == 1) ? "checked" : ""; ?>> Kategori 1<br> Resusitasi<br> Respon
                                Time : 0
                            </td>
                            <td
                                style=" font-size: 13px; height:80px; background-color: #F25E4C; color: white; text-align: center;">
                                <input class="state icheckbox_square-red" type="checkbox" id="kategori2" <?php echo ($dttriase->kategori2 == 1) ? "checked" : ""; ?>> Kategori 2<br>Emergency / Gawat
                                Darurat<br> Respon Time : 1 - 3 Menit</td>
                            <td
                                style=" font-size: 13px; height:80px; background-color: yellow; color: black; text-align: center;">
                                <input class="state icheckbox_square-red" type="checkbox" id="kategori3" <?php echo ($dttriase->kategori3 == 1) ? "checked" : ""; ?>> Kategori 1 <br>Urgen / Darurat<br>
                                Respon Time : 3 - 5 Menit</td>
                            <td
                                style=" font-size: 13px; height:80px; background-color: yellow; color: black; text-align: center;">
                                <input class="state icheckbox_square-red" type="checkbox" id="kategori4" <?php echo ($dttriase->kategori4 == 1) ? "checked" : ""; ?>> Kategori 2<br>Semi Darurat</td>
                            <td
                                style=" font-size: 13px; height:80px; background-color: green; color: white; text-align: center;">
                                <input class="state icheckbox_square-red" type="checkbox" id="kategori5" <?php echo ($dttriase->kategori5 == 1) ? "checked" : ""; ?>> Tidak Darurat</td>
                        </tr>
                        <tr>
                            <td width="10%"
                                style=" font-size: 13px; padding-left: 15px; background-color: #CFD1CF; height:90px;">
                                AIRWAY</td>
                            <td width="18%"
                                style="font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white;">
                                <div style="margin-bottom: 6px;">
                                    <input class="state icheckbox_square-red" type="checkbox" id="airway11" <?php echo ($dttriase->airway11 == 1) ? "checked" : ""; ?> value="total"> Sumbatan Total
                                </div>
                                <div>
                                    <input class="state icheckbox_square-red" type="checkbox" id="airway12" <?php echo ($dttriase->airway12 == 1) ? "checked" : ""; ?> value="sebagian"> Sumbatan Sebagian
                                </div>
                            </td>

                            <td width="18%"
                                style="font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white;">
                                <div style="margin-bottom: 15px;">
                                    <input class="state icheckbox_square-red" type="checkbox" id="airway21" <?php echo ($dttriase->airway21 == 1) ? "checked" : ""; ?> value="total"
                                        style="font-size: 13px;"> Paten
                                </div>
                            </td>

                            <td width="18%"
                                style="font-size: 13px; padding-left: 30px; background-color: yellow; color: black;">
                                <div style="margin-bottom: 15px;">
                                    <input class="state icheckbox_square-red" type="checkbox" id="airway31" <?php echo ($dttriase->airway31 == 1) ? "checked" : ""; ?> value="total"> Paten
                                </div>
                            </td>

                            <td width="18%"
                                style="font-size: 13px; padding-left: 30px; background-color: yellow; color: black;">
                                <div style="margin-bottom: 15px;">
                                    <input class="state icheckbox_square-red" type="checkbox" id="airway41" <?php echo ($dttriase->airway41 == 1) ? "checked" : ""; ?> value="total"> Paten
                                </div>
                            </td>

                            <td width="18%"
                                style="font-size: 13px; padding-left: 30px; background-color: green; color: white;">
                                <div style="margin-bottom: 15px;">
                                    <input class="state icheckbox_square-red" type="checkbox" id="airway51" <?php echo ($dttriase->airway51 == 1) ? "checked" : ""; ?> value="total"> Paten
                                </div>
                            </td>


                        </tr>
                        <tr>
                            <td width="10%"
                                style=" font-size: 13px; padding-left: 15px; background-color: #CFD1CF; height:90px;">
                                BREATHING</td>

                            <td width="18%"
                                style="font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white; margin-top: 15px;">
                                Distres Pernapasan Berat<br>
                                <input class="state icheckbox_square-red" type="checkbox" id="breathing11" <?php echo ($dttriase->breathing11 == 1) ? "checked" : ""; ?> value="total"
                                    style="font-size: 13px; margin-bottom: 10px; margin-top: 10px;"> Sumbatan Total
                                <br>
                                <input class="state icheckbox_square-red" type="checkbox" id="breathing12" <?php echo ($dttriase->breathing12 == 1) ? "checked" : ""; ?> value="sebagian"> Sumbatan Sebagian
                            </td>

                            <td width="18%"
                                style="font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white; margin-top: 15px;">
                                Distres Pernapasan Sedang<br>
                                <input class="state icheckbox_square-red" type="checkbox" id="breathing21" <?php echo ($dttriase->breathing21 == 1) ? "checked" : ""; ?> value="total"
                                    style="font-size: 13px; margin-bottom: 10px; margin-top: 10px;"> RR > 30x / menit
                                <br>
                                <input class="state icheckbox_square-red" type="checkbox" id="breathing22" <?php echo ($dttriase->breathing22 == 1) ? "checked" : ""; ?> value="sebagian"> Penggunaan otot
                                bantu napas
                            </td>

                            <td width="18%"
                                style="font-size: 13px; padding-left: 30px; background-color: yellow; color: black; margin-top: 15px;">
                                Distres Pernapasan Ringan<br>
                                <input class="state icheckbox_square-red" type="checkbox" id="breathing31" <?php echo ($dttriase->breathing31 == 1) ? "checked" : ""; ?> value="total"
                                    style="font-size: 13px; margin-bottom: 10px; margin-top: 10px;"> RR > 30x / menit
                            </td>

                            <td width="18%"
                                style="font-size: 13px; padding-left: 30px; background-color: yellow; color: black; margin-top: 15px;">
                                Tidak ada Distres Pernapasan<br>
                                <input class="state icheckbox_square-red" type="checkbox" id="breathing41" <?php echo ($dttriase->breathing41 == 1) ? "checked" : ""; ?> value="total"
                                    style="font-size: 13px; margin-bottom: 10px; margin-top: 10px;"> RR > Normal
                            </td>

                            <td width="18%"
                                style="font-size: 13px; padding-left: 30px; background-color: green; color: white; margin-top: 15px;">
                                <br>
                                <input class="state icheckbox_square-red" type="checkbox" id="breathing51" <?php echo ($dttriase->breathing51 == 1) ? "checked" : ""; ?> value="total"
                                    style="font-size: 13px; margin-bottom: 10px; margin-top: 10px;"> RR > Normal
                            </td>


                        </tr>
                        <tr>
                            <td width="10%"
                                style=" font-size: 13px; padding-left: 15px; background-color: #CFD1CF; height:90px;">
                                CIRCULATION</td>
                            <td width="18%"
                                style=" font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white; margin-top: 15px;">
                                Gangguan Hemodinamik Berat<br>
                                <input class="state icheckbox_square-red" type="checkbox" id="circulation11" <?php echo ($dttriase->circulation11 == 1) ? "checked" : ""; ?> value="total"
                                    style=" font-size: 13px; margin-bottom: 10px; margin-top: 10px"> Nadi Tidak Teraba
                                <br>
                                <input class="state icheckbox_square-red" type="checkbox" id="circulation12" <?php echo ($dttriase->circulation12 == 1) ? "checked" : ""; ?> value="sebagian"> Pendarahan yang
                                tidak terkontrol / pendarahan aktif
                            </td>
                            <td width="18%"
                                style=" font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white; margin-top: 15px;">
                                Gangguan Hemodinamik Sedang<br>
                                <input class="state icheckbox_square-red" type="checkbox" id="circulation21" <?php echo ($dttriase->circulation21 == 1) ? "checked" : ""; ?> value="total"
                                    style=" font-size: 13px; margin-bottom: 10px; margin-top: 10px"> Nadi Tidak Teraba /
                                Sangat Halus
                                <br>
                                <input class="state icheckbox_square-red" type="checkbox" id="circulation22" <?php echo ($dttriase->circulation22 == 1) ? "checked" : ""; ?> value="sebagian"> Pendarahan
                                kapiler > 2 detik
                            </td>

                            <td width="18%"
                                style=" font-size: 13px; padding-left: 30px; background-color: yellow; color: b;lack margin-top: 15px;">
                                Gangguan Hemodinamik Ringan<br>
                                <input class="state icheckbox_square-red" type="checkbox" id="circulation31" <?php echo ($dttriase->circulation31 == 1) ? "checked" : ""; ?> value="total"
                                    style=" font-size: 13px; margin-bottom: 10px; margin-top: 10px"> Nadi Teraba (Lemah
                                - Kuat)
                                <br>
                                <input class="state icheckbox_square-red" type="checkbox" id="circulation32" <?php echo ($dttriase->circulation32 == 1) ? "checked" : ""; ?> value="sebagian"> Pendarahan
                                kapiler < 2 detik </td>

                            <td width="18%"
                                style=" font-size: 13px; padding-left: 30px; background-color: yellow; color: black; margin-top: 15px;">
                                Tidak ada gangguan Gangguan Hemodinamik<br>
                                <input class="state icheckbox_square-red" type="checkbox" id="circulation41" <?php echo ($dttriase->circulation41 == 1) ? "checked" : ""; ?> value="total"
                                    style=" font-size: 13px; margin-bottom: 10px; margin-top: 10px"> Nadi Teraba
                            </td>
                            <td width="18%"
                                style=" font-size: 13px; padding-left: 30px; background-color: green; color: white; margin-top: 15px;">
                                Tidak ada gangguan Gangguan Hemodinamik<br>
                                <input class="state icheckbox_square-red" type="checkbox" id="circulation51" <?php echo ($dttriase->circulation51 == 1) ? "checked" : ""; ?> value="total"
                                    style=" font-size: 13px; margin-bottom: 10px; margin-top: 10px"> Nadi Normal
                            </td>
                        </tr>
                        <tr>
                            <td width="10%"
                                style=" font-size: 13px; padding-left: 15px; background-color: #CFD1CF; height:90px;">
                                DISABILITY</td>
                            <td width="18%"
                                style="font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white;">
                                <input class="state icheckbox_square-red" type="checkbox" id="disability11" <?php echo ($dttriase->disability11 == 1) ? "checked" : ""; ?> value="total"> GCS &lt; 9
                            </td>

                            <td width="18%"
                                style="font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white;">
                                <input class="state icheckbox_square-red" type="checkbox" id="disability21" <?php echo ($dttriase->disability21 == 1) ? "checked" : ""; ?> value="total"> GCS 9 - 12
                            </td>

                            <td width="18%"
                                style="font-size: 13px; padding-left: 30px; background-color: yellow; color: black;">
                                <input class="state icheckbox_square-red" type="checkbox" id="disability31" <?php echo ($dttriase->disability31 == 1) ? "checked" : ""; ?> value="total"> GCS 12 - 14
                            </td>

                            <td width="18%"
                                style="font-size: 13px; padding-left: 30px; background-color: yellow; color: black;">
                                <input class="state icheckbox_square-red" type="checkbox" id="disability41" <?php echo ($dttriase->disability41 == 1) ? "checked" : ""; ?> value="total"> GCS 12 - 14
                            </td>

                            <td width="18%"
                                style="font-size: 13px; padding-left: 30px; background-color: green; color: white;">
                                <input class="state icheckbox_square-red" type="checkbox" id="disability51" <?php echo ($dttriase->disability51 == 1) ? "checked" : ""; ?> value="total"> GCS Normal
                            </td>
                        </tr>
                        <tr>
                            <td width="10%"
                                style=" font-size: 13px; padding-left: 15px; background-color: #CFD1CF; height:90px;">
                                CONTOH PASIEN</td>
                            <td colspan="2" width="36%"
                                style=" font-size: 13px; padding-left: 30px; background-color: #F25E4C; color: white;">
                                Syok, Gangguan pernapasan, cidera kepala dengan pupil anisokor<br>Gangguan jantung yang
                                mengancam, luka bakar > 50% di daerah toraks</td>
                            <td colspan="2" width="36%"
                                style=" font-size: 13px; padding-left: 30px; background-color: yellow; color: black;">
                                Korban resiko syok, fraktur multiple, aktur femur, luka bakar</td>
                            <td colspan="2" width="18%"
                                style=" font-size: 13px; padding-left: 30px; background-color: green; color: white;">
                                Fraktur minor, luka minor <br>atau tanpa luka</td>
                        </tr>
                    </table>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
                        </div>
                        <div class="col-6 text-right">
                            <button onclick="savetriase()" class="btn btn-primary"
                                data-bs-dismiss="modal">Simpan</button>

                        </div>
                    </div>

                </div>
                <!-- =========== -->
            </div>
        </div>
    </div>
</div>
<script>
    function modalform() {
        $("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
    }

    function modalformtutup() {
        $(".overlay").remove();
    }

    function tutupmodal() {
        $(function () {
            $("#formmodal").modal("toggle");
        });
    }

    function kuranglengkap() {
        $.notify("Data Kurang Lengkap", "error");
    }


    function savetriase() {
        var no_rm = document.getElementById("no_rm").value;
        var kode_dokter = document.getElementById("kode_dokter").value;
        var notransaksi = document.getElementById("notransaksi").value;

        var kategori1 = $("#kategori1").prop("checked") ? 1 : 0;
        var kategori2 = $("#kategori2").prop("checked") ? 1 : 0;
        var kategori3 = $("#kategori3").prop("checked") ? 1 : 0;
        var kategori4 = $("#kategori4").prop("checked") ? 1 : 0;
        var kategori5 = $("#kategori5").prop("checked") ? 1 : 0;
        var airway11 = $("#airway11").prop("checked") ? 1 : 0;
        var airway12 = $("#airway12").prop("checked") ? 1 : 0;
        var airway21 = $("#airway21").prop("checked") ? 1 : 0;
        var airway31 = $("#airway31").prop("checked") ? 1 : 0;
        var airway41 = $("#airway41").prop("checked") ? 1 : 0;
        var airway51 = $("#airway51").prop("checked") ? 1 : 0;
        var breathing11 = $("#breathing11").prop("checked") ? 1 : 0;
        var breathing12 = $("#breathing12").prop("checked") ? 1 : 0;
        var breathing21 = $("#breathing21").prop("checked") ? 1 : 0;
        var breathing22 = $("#breathing22").prop("checked") ? 1 : 0;
        var breathing31 = $("#breathing31").prop("checked") ? 1 : 0;
        var breathing41 = $("#breathing41").prop("checked") ? 1 : 0;
        var breathing51 = $("#breathing51").prop("checked") ? 1 : 0;
        var circulation11 = $("#circulation11").prop("checked") ? 1 : 0;
        var circulation12 = $("#circulation12").prop("checked") ? 1 : 0;
        var circulation21 = $("#circulation21").prop("checked") ? 1 : 0;
        var circulation22 = $("#circulation22").prop("checked") ? 1 : 0;
        var circulation31 = $("#circulation31").prop("checked") ? 1 : 0;
        var circulation32 = $("#circulation32").prop("checked") ? 1 : 0;
        var circulation41 = $("#circulation41").prop("checked") ? 1 : 0;
        var circulation51 = $("#circulation51").prop("checked") ? 1 : 0;
        var disability11 = $("#disability11").prop("checked") ? 1 : 0;
        var disability21 = $("#disability21").prop("checked") ? 1 : 0;
        var disability31 = $("#disability31").prop("checked") ? 1 : 0;
        var disability41 = $("#disability41").prop("checked") ? 1 : 0;
        var disability51 = $("#disability51").prop("checked") ? 1 : 0;
        $.ajax({
            url: "<?php echo site_url(); ?>/rme/savetriase",
            type: "GET",
            data: {
                no_rm: no_rm,
                kode_dokter: kode_dokter,
                notransaksi: notransaksi,
                kategori1: kategori1,
                kategori2: kategori2,
                kategori3: kategori3,
                kategori4: kategori4,
                kategori5: kategori5,
                airway11: airway11,
                airway12: airway12,
                airway21: airway21,
                airway31: airway31,
                airway41: airway41,
                airway51: airway51,
                breathing11: breathing11,
                breathing12: breathing12,
                breathing21: breathing21,
                breathing22: breathing22,
                breathing31: breathing31,
                breathing41: breathing41,
                breathing51: breathing51,
                circulation11: circulation11,
                circulation12: circulation12,
                circulation21: circulation21,
                circulation22: circulation22,
                circulation31: circulation31,
                circulation32: circulation32,
                circulation41: circulation41,
                circulation51: circulation51,
                disability11: disability11,
                disability21: disability21,
                disability31: disability31,
                disability41: disability41,
                disability51: disability51
            },
            success: function (ajaxData) {
                swal('Simpan Data Triase Berhasil');
            },
            error: function (ajaxData) {
                swal('Simpan Data Triase Gagal');
            }
        });
    }

</script>