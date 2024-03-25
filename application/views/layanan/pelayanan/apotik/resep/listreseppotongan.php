<!-- START: Card Data-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Resep Obat</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Shift</label>
                                <select class="form-control" style="width: 100%;" name="shift" id="shift">
                                    <option value="PAGI">PAGI</option>
                                    <option value="SIANG">SIANG</option>
                                    <option value="MALAM">MALAM</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Depo</label>
                                <?php
                                $id = $this->session->userdata("idx");
                                if (ceksess("PIL", $id) == FALSE) {
                                    $units = json_decode(stripslashes($this->session->userdata("kodeunit")));
                                ?>
                                    <select class="form-control" style="width: 100%;" name="depo" id="depo">
                                        <?php
                                        foreach ($dtunit as $row) {
                                            foreach ($units as $r) {
                                                if ($row->kode_unit == $r) {
                                        ?>
                                                    <option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                <?php
                                } else {
                                ?>
                                    <select class="form-control" style="width: 100%;" name="depo" id="depo">
                                        <!-- <option value="000">--Pilih Unit--</option> -->
                                        <?php
                                        foreach ($dtunit as $row) {
                                        ?>
                                            <option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Tanggal</label>
                                <input type="text" class="form-control pull-right" id="tgl" name="tgl" required>
                            </div>
                            <!-- </div> -->
                            <div class="form-group col-md-1 d-flex align-items-end flex-column">
                                <button class='btn  btn-primary mt-auto' type='button' onclick="ambildata2()" />Tampilkan</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Daftar Resep</b>
                            </div>
                        </div>
                        <div class="row mt-2 mb-4">
                            <div class="col">
                                <button onclick="addreseppotongan()" class="btn-sm btn-warning btn"><i class='glyphicon glyphicon-plus'></i> Resep Baru</button>
                                <button onclick="addresepunit()" class="btn-sm btn-danger btn"><i class='glyphicon glyphicon-plus'></i> Resep Input dari Unit</button>
                            </div>
                        </div>
                        <div class="table-responsive" id="tableresep">
                        <table class="table table-bordered table-stripped">
                            <tr>
                                <th width="7%">Resep Unit</th>
                                <th width="3%">No.</th>
                                <th width="5%">Type</th>
                                <th width="5%">No. RM</th>
                                <th width="15%">Nama</th>
                                <th>Alamat</th>
                                <th width="7%">Telp.</th>
                                <th width="10%">Unit</th>
                                <th width="17%">Dokter</th>
                                <th width="8%">No. Resep</th>
                                <th width="7%">
                                    <div align="center">Action</div>
                                </th>
                            </tr>
                            <tr>
                                <td colspan="11" class="text-center">
                                    Tidak Ada Data
                                </td>
                            </tr>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- END -->
<script type="text/javascript">
    function addreseppotongan() {
        var shift = $('#shift').val();
        var depo = $('#depo').val();
        var depotext = $("#depo option:selected" ).text();
        window.open('<?php echo site_url()?>/depoapotikresep/resepobat' + '/' + shift + '/' + depo + '/' + depotext + '', '_self');
    }

    function ambildata2() {
		modaldetail();
        var shift = $('#shift').val();
        var depo = $('#depo').val();
        var tgl = document.getElementById("tgl").value;
        $.ajax({
            url: "<?php echo site_url();?>/depoapotikresep/datalistresep",
            type: "GET",
            data: {
                shift: shift,
                depo: depo,
	            tgl: tgl
            },
            success: function (ajaxData){
                var dt = JSON.parse(ajaxData);
                modaldetailtutup();
                $("#tableresep").html(dt.dtview);
                $.notify("Sukses Proses Data", "success");
            },
            error: function(data) {
                gagalalert();
                modaldetailtutup();
            }
        });
    }
</script>