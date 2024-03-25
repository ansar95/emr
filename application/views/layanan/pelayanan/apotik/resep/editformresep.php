<!-- START: Card Data-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-2 py-3 align-self-center d-sm-flex w-100 rounded">
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="my-auto">Resep</h4>
                        <form action="<?php echo site_url() ?>/depoapotik/cetakresep" method="POST" target="_blank">
                            <div class=" row">
                                <label for="username" class="col-md-1 col-form-label">Shift</label>
                                <div class="col-md-2">
                                    <input class="form-control" type="text" id="shift" name="shift" disabled value="<?php echo $dtheader->shift ?>" />
                                </div>
                                <label for="username" class="col-md-1 col-form-label">Depo</label>
                                <div class="col-md-2">
                                    <input type="text" id="depo" name="depo" disabled hidden value="<?php echo $dtheader->kode_depo ?>" />
                                    <input type="text" class="form-control" id="depotext" name="depotext" value="<?php echo $dtheader->nama_depo ?>" disabled />
                                </div>
                                <label for="username" class="col-md-2 col-form-label">No. Resep</label>
                                <div class="col-md-3">
                                    <input class="form-control" type="text" id="norep" name="norep" value="<?php echo $dtheader->noresep ?>" readonly />
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-print"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">Tipe</label>
                                    <div class="col-md-8">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" name="tipe" value="Umum" id="tipe1" onclick="statuspasien(this)" <?php if ($dtheader->type == 'Umum') {
                                                                                                                                                                    echo 'checked';
                                                                                                                                                                } ?>>
                                            <label class="custom-control-label" for="tipe1">Umum</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" name="tipe" value="Jaminan" id="tipe2" onclick="statuspasien(this)" <?php if ($dtheader->type == 'Jaminan') {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    } ?>>
                                            <label class="custom-control-label" for="tipe2">Jaminan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">No. RM</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="norm" name="norm" disabled oninput="carirm()" value="<?php echo $dtheader->no_rm ?>" autocomplete="off" />
                                    </div>
                                </div>
                                <?php
                                    if ($dtheader->type == 'Umum') { 
                                        $namanya=$dtheader->nama_umum;
                                    } else {
                                        $namanya=$dtheader->nama;
                                    }
                                ?>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">Nama</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $namanya ?>" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">No. Kartu</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="kartu" name="kartu" disabled value="<?php echo $dtheader->nosjp ?>" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-md-4 col-form-label">Golongan</label>
                                    <div class="col-md-8">
                                        <select class="form-control" style="width: 100%;" name="gol" id="gol" disabled>
                                            <?php
                                            foreach ($golongan as $row) {
                                            ?>
                                                <!-- <option value="<?php echo $row->idgolongan; ?>" <?php if ($dtheader->idgolongan == $row->idgolongan) {
                                                                                                            echo 'selected';
                                                                                                        } ?>><?php echo $row->golongan; ?></option> -->
                                                <option value="<?php echo $row->golongan; ?>" <?php if ($dtheader->golongan == $row->golongan) {
                                                                                                    echo 'selected';
                                                                                                } ?>><?php echo $row->golongan; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">Tanggal Resep</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="tglresep" name="tglresep" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">Unit/Poli</label>
                                    <div class="col-md-8">
                                        <select class="form-control" style="width: 100%;" name="unit" id="unit">
                                            <?php
                                            foreach ($unit as $row) {
                                            ?>
                                                <option value="<?php echo $row->kode_unit; ?>" <?php if ($dtheader->kode_unit == $row->kode_unit) {
                                                                                                    echo 'selected';
                                                                                                } ?>><?php echo $row->nama_unit; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">No. Transaksi</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="sjp" name="sjp" disabled value="<?php echo $dtheader->notraksaksi ?>" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">Dokter</label>
                                    <div class="col-md-8">
                                        <select class="form-control" style="width: 100%;" name="dokter" id="dokter">
                                            <option value="--">--</option>   
                                            <?php
                                                foreach ($dokter as $row) {
                                                ?>
                                                    <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dtheader->kode_dokter == $row->kode_dokter) {
                                                                                                            echo 'selected';
                                                                                                        } ?>><?php echo $row->nama_dokter; ?></option>
                                                <?php
                                                }
                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="form-group row col-spacing-row">
                                    <label class="col-md-4 col-form-label">Racik</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="racik" name="racik" value="<?php echo $dtheader->racik ?>" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-md-4 col-form-label">Non Racik</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="nonracik" name="nonracik" value="<?php echo $dtheader->nonracik ?>" autocomplete="off" />
                                    </div>
                                </div> -->

                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <button class="btn-sm btn-warning btn pull-right" onclick="javascript:history.back();"><i class="fa fa-arrow-left"></i> Kembali Ke Daftar</button>
                                <button class="btn-sm btn-primary btn pull-right" onclick="prosesheader_edit()"><i class="fas fa-cog"></i> Proses</button>
                            </div>
                        </div>
                        <hr class="border-top-hr my-4 bg-secondary"/>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="d-flex justify-content-between">
                                    <b>Daftar Resep</b>
                                    <button onclick="addresep()" class="btn btn-sm btn-primary" id="tambahruang">
                                        <i class='fas fa-plus'></i> Tambah Data
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" id="tabledetailresep">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="2%">No.</th>
                                        <th>Nama Produk</th>
                                        <th width="18%">
                                            <div align="left">Catatan dari Unit</div>
                                        </th>
                                        <th width="3%">
                                            <div align="right">Qty</div>
                                        </th>
                                        <th width="5%"> Satuan</th>
                                        <th width="5%">
                                            <div align="right">Harga</div>
                                        </th>
                                        <th width="6%">
                                            <div align="right">Jumlah</div>
                                        </th>
                                        <th width="18%">Dosis Farmasi</th>
                                        <th width="4%">
                                            <div align="center">Dana</div>
                                        </th>
                                        <th width="4%">
                                            <div align="center">Klaim</div>
                                        </th>
                                        <th width="14%">
                                            <div align="center"> Action</div>
                                        </th>
                                        <th width="4%">
                                            <div align="center">Proses</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        if ($dtdetail == null) {
                                        ?>
                                    <tr>
                                        <td colspan="10" class="text-center">
                                            Tidak Ada Data
                                        </td>
                                    </tr>
                                    <?php
                                        } else {
                                            $nob = 1;
                                            $jum = 0;

                                            foreach ($dtdetail as $row) {
                                                echo "<tr><td>" . $nob++ . ".</td>";
                                                echo "<td>" . $row->namaobat . "</td>";
                                                echo "<td>" . $row->dosis.'<br>'.$row->catatanresep. "</td>";
                                                echo "<td style='text-align:right'>" . $row->qty . "</td>";
                                                echo "<td>" . $row->satuanpakai . "</td>";
                                                echo "<td style='text-align:right'>" . formatuang($row->hargapakai) . "</td>";
                                                // echo "<td style='text-align:right'>".formatuang($row->tuslag)."</td>";
                                                echo "<td style='text-align:right'>" . formatuang($row->jumlah) . "</td>";
                                                $dosisnya = '';
                                                if ($row->pagi <> '') {
                                                    $dosisnya = $dosisnya . ' Pagi:' . trim($row->pagi) . ' ' . trim($row->takaran) . ', ';
                                                }
                                                if ($row->siang <> '') {
                                                    $dosisnya = $dosisnya . ' Siang:' . trim($row->siang) . ' ' . trim($row->takaran) . ', ';
                                                }
                                                if ($row->malam <> '') {
                                                    $dosisnya = $dosisnya . ' Malam:' . trim($row->malam) . ' ' . trim($row->takaran) . ' ';
                                                }
                                                if ($row->keterangan <> '') {
                                                    $dosisnya = $dosisnya . trim($row->keterangan) . ' ';
                                                }
                                                if ($row->caramakan <> '') {
                                                    $dosisnya = $dosisnya . trim($row->caramakan) . ' Makan';
                                                }
                                                echo "<td>" . $dosisnya . "</td>";
                                                echo "<td>" . $row->pendanaan . "</td>";
                                                echo "<td style='text-align:center'>" . $row->noninacbg . "</td>";
                                    ?>
                                        <td class="text-center">
                                            <button class="btn-sm btn-primary btn" onclick="panggileditdetail('<?php echo $row->idnoresep ?>')"><i class="fas fa-edit"></i></button>
                                            <button class="btn-sm btn-danger btn" onclick="panggilhapusdetail('<?php echo $row->idnoresep ?>')"><i class="fas fa-trash"></i></button>
                                            <button class="btn-sm btn-warning btn" onclick="panggilcekdetail('<?php echo $row->idnoresep ?>')"><i class="fas fa-book"></i></button>
                                            <button class="btn-sm btn-success btn" onclick="cetaketiketobat('<?php echo $row->idnoresep ?>')"><i class="fas fa-print"></i></button>
                                        </td>
                                <?php
                                                if ($row->proses == 1) {
                                                    $prosestext = 'Proses';
                                                } else {
                                                    $prosestext = ' ';
                                                }
                                                echo "<td style='text-align:center'>" . $prosestext . "</td>";
                                                echo "</tr>";
                                                $jum = $jum + $row->jumlah;
                                            }
                                            echo "<tr>";
                                            echo "<td colspan='6' align='right' >";
                                            echo "TOTAL HARGA ";
                                            echo "</td>";
                                            echo "<td colspan='1' bgcolor='#C0C011' style='text-align:right'>";
                                            echo formatuang($jum);
                                            echo "</td>";
                                            echo "<td colspan='5'>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                ?>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12 ">
                                <button onclick="cetaketiketsemua()" class="btn btn-sm btn-success" id="cetaketiketnya">
                                    <i class='fas fa-print'></i> Print Semua Etiket
                                </button>
                            </div>
                        </div>
                        <div id="pagination_link" class="d-flex flex-row-reverse">
                        </div>

                    </div>
                </div>
            </div>
        </div>

</main>
<!-- END -->