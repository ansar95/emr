<main>

    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row">
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
                        <h4 class="mb-0">Unit Rawat Inap</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="inputState">Unit Perawatan</label>
                                <?php
                                $id = $this->session->userdata("idx");
                                if (ceksess("PIL", $id) == FALSE) {
                                    $units = json_decode(stripslashes($this->session->userdata("kodeunit")));
                                ?>
                                    <select class="form-control" style="width: 100%;" name="unit" id="unitselect">
                                        <?php
                                        foreach ($unit as $row) {
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
                                    <select class="form-control" valign="center" style="width: 100%;" name="unit" id="unitselect">
                                        <!-- <option value="000">--Pilih Unit--</option> -->
                                        <?php
                                        foreach ($unit as $row) {
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
                            <div class="form-group col-md-2 d-flex align-items-start flex-column">
                                <button class='btn  btn-primary mt-auto' type='button' id="caridata" />Tampilkan</button>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputRM">No. RM</label>
                                <input type="text" class="form-control" id="nrp">
                            </div>
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-primary mt-4" id="caridata1">Proses</button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-left ml-0 mt-3">
                            <div>
                                <h6>Daftar Pasien</h6>
                                <p class="">Background Abu-abu : pasien pindah ruangan | kuning : pasien pulang</p>
                            </div>
                            <div>
                                <button onclick="tarikdata()" class="btn btn-primary float-right" id="tambahpasien">
                                    <i class='icon-plus'></i> &nbsp;Tambah Pasien
                                </button>
                            </div>
                        </div>
                        <hr size="1" nonshade="nonshade" />
                        <table id="barispasien" class="display table dataTable table-hover table-bordered" style="overflow-x:scroll;">
                            <thead>
                                <tr>
                                    <th width='1%'>No. RM</th>
                                    <th width='1%'>Ttl</th>
                                    <th width='8%'>Nama Pasien</th>
                                    <th width='7%'>Kamar</th>
                                    <th width='6%'>Kelas</th>
                                    <th width='4%'>Msk. Kamar</th>
                                    <th width='3%'>Golongan</th>
                                    <th width='3%'>No. Trans</th>
                                    <th width="4%" style='text-align:right'>Billing</th>
                                    <th width='4%' style='text-align:right'>Est. Tarif</th>
                                    <th width="7%" style="text-align:center">Proses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="px-0">
                                    <td colspan="17" class="text-center">
                                        Tidak Ada Data
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</main>