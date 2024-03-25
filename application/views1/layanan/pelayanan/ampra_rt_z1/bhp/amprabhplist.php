<style>
    table.scroll {
        /* width: 100%; */ /* Optional */
        /* border-collapse: collapse; */
        /*border-spacing: 0;*/
    }

    table.scroll tbody,
    table.scroll thead { display: block; }

    thead tr th {
        height: 30px;
        line-height: 30px;
        /* text-align: left; */
    }

    table.scroll tbody {
        height: 100px;
        overflow-y: auto;
        overflow-x: hidden;
    }
    .selected {
        background-color: brown;
        color: #FFF;
    }
</style>
<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Form Ampra BHP Non Medis</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="padding-top: 4px;">Unit</label>
                                <div class="col-sm-9">
                                    <select class="form-control" style="width: 100%;" name="unit" id="unit" onchange="gantiunit();">
                                        <?php
                                        foreach($unit as $row) {
                                            ?>
                                            <option value="<?php echo $row->kode_unit; ?>"><?php echo $row->nama_unit; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="padding-top: 4px;">Periode</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="period" id="period" autocomplete="off"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <div class="col-sm-10" style="padding-top: 4px;">
                                    <a class="btn-sm btn-primary" onclick="lanjutproses()">Lanjut</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box" id="kotakdetail">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Ampra</h3>
                <div class="box-tools pull-right" style="padding-top: 4px;">
                    <a onclick="addampra()" class="btn-sm btn-primary" id="tambahruang">
                        <i class='glyphicon glyphicon-plus'></i> Tambah Data
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-1" id="tabletanggal">
                        <table class="table table-bordered scroll">
                            <thead>
                            <tr>
                                <th>Tanggal Order</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-11" id="tableampra">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th colspan="3">Order</th>
                                <th colspan="5">Dropping</th>
                            </tr>
                            <tr>
                                <th>Tgl. Order</th>
                                <th>Nama Item Obat/BHP</th>
                                <th>Qty Ampra</th>
                                <th>Qty Drop</th>
                                <th>Tgl. Drop</th>
                                <th>Batch No.</th>
                                <th>Expire</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="9" class="text-center">
                                    Tidak Ada Data
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="box-footer clearfix">
                <div align="right" id="pagination_link"></div>
            </div>
        </div>
    </section>
</div>
