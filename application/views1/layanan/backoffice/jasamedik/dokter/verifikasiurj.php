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
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Cek Data Rawat Jalan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="row spacing-row">
                                    <div class="col-md-6 col-6 col-sm-6">
                                        <div class="form-group row col-spacing-row">
                                            <div class="col-md-3">
                                                <label for="jspelayanan"> Jasa Pelayanan</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select class="form-control unit2" style="width: 100%;" id="jasa" name="jasa">
                                                    <option value="4">Umum</option>
                                                    <option value="6">BPJS</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 col-sm-6">
                                        <div class="form-group row col-spacing-row">
                                            <div class="col-md-3">
                                                <label class="col-form-label">Tgl.Keluar</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control pull-right datepick" id="awal" name="awal" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <label class="col-form-label">s/d</label>
                                            <div class="col-md-4">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control pull-right datepick" id="akhir" name="akhir" autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row spacing-row">
                                    <div class="col-md-6 col-6 col-sm-6">
                                        <div class="form-group row col-spacing-row">
                                            <div class="col-md-3">
                                                <label for="tampildata">Unit</label>
                                            </div>
                                            <div class="col-md-4 d">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" class="custom-control-input" name="cekunit" id="uncekunit" onclick="unitcek()" checked>
                                                    <label class="custom-control-label" for="uncekunit">Semua</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" class="custom-control-input" name="cekunit" onclick="unitcek()" id="cekunit">
                                                    <label class="custom-control-label" for="cekunit">Unit</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control unit2" style="width: 100%;" id="unit" name="unit" disabled>
                                                    <option value="">-</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-6 col-sm-6">
                                        <div class="row col-spacing-row col ">
                                            <div class="custom-control custom-checkbox custom-control-inline col-3">
                                                <input type="checkbox" class="custom-control-input " checked="checked" id="filterm">
                                                <label class="custom-control-label" for="filterm"><B>Filter RM</B></label>
                                            </div>
                                            <div class="col-md-6 ml-n3">
                                                <input type="text" class="form-control pull-right" id="rm" name="rm" autocomplete="off">
                                            </div>
                                            <button onclick="load_data_urj()" class="btn btn-primary ">Tampilkan</button>
                                            <div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cardBpjs">
                    <div class="card-body">
                        <div class="sort-panel">
                            <div class="form-group row ">
                                <label for="sortingField" class="col-sm-2 col-form-label">Cari Nama Pasien</label>
                                <div class="col-sm-3 d-flex">
                                    <input type="text" name="crnama" id="crnama" class="form-control">
                                    <button type="button" class="btn btn-primary ml-2" onclick="load_data_urj()" id="sort">Cari</button>

                                </div>
                                <div class="col-sm-7">
                                    <button class="btn btn-primary" style="float:right !important;" onclick="tambahVerifikasiUrj()"><i class="fa fa-plus"></i> Tambah Data</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive mt-2 table-scrollable mb-4" style="max-height: 400px;">
                            <table id="tabelmedikbpjs" class="display table dataTable table-bordered" style="width: 180%;">
                                <thead class="position-relative z-0">
                                    <tr>
                                        <th rowspan="2" width="5%">Kode</th>
                                        <th rowspan="2" width="5%">No. RM</th>
                                        <th rowspan="2">Nama Pasien</th>
                                        <th rowspan="2" width="8%">Tgl. Masuk</th>
                                        <th rowspan="2" width="8%">Tgl Keluar</th>
                                        <th rowspan="2" width="7%">No.SEP</th>
                                        <th rowspan="2" width="7%">Klaim</th>
                                        <th rowspan="2" width="7%">Billing RS</th>
                                        <th rowspan="2" width="7%">Selisih</th>
                                        <th rowspan="2" width="7%">Ttl. Jasa Pelayanan</th>
                                        <th colspan="3" class="text-center">Jasa Medik</th>
                                        <th rowspan="2" class="text-center">Jasa Medik Non-Medis</th>
                                        <th rowspan="2" width="8%" class="position-sticky bg-white border-left" style="right:0; z-index:4">Aksi</th>
                                    </tr>
                                    <tr>
                                        <th width="4%">Direct</th>
                                        <th width="4%">Indirect</th>
                                        <th width="4%">Reward</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="100%" class="text-center">Data tidak ditemukan!</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-secondary mr-2" onclick="rekapitulasi()">Lihat Rekapitulasi</button>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">Upload</button>
                        </div>
                    </div>
                </div>
                <div id="cardNonbpjs">
                    <div class="card-body">
                        <div class="sort-panel">
                            <div class="form-group row ">
                                <label for="sortingField" class="col-sm-2 col-form-label">Cari Nama Pasien</label>
                                <div class="col-sm-3 d-flex">
                                    <input type="text" name="crnama" id="crnama" class="form-control">
                                    <button type="button" class="btn btn-primary ml-2" onclick="load_data_urj()" id="sort">Cari</button>
                                </div>
                                <div class="col-sm-7">
                                    <button class="btn btn-primary" style="float:right !important;" onclick="tambahVerifikasiUrj()"><i class="fa fa-plus"></i> Tambah Data</button>

                                </div>
                            </div>
                        </div>
                        <div class="table-responsive mt-2 table-scrollable mb-4" style="max-height: 400px;">
                            <table id="tabelmediknonbpjs" class="display table dataTable table-bordered" style="width: 110%;">
                                <thead class="position-relative z-0">
                                    <tr>
                                        <th rowspan="2" width="5%">Kode</th>
                                        <th rowspan="2" width="5%">No. RM</th>
                                        <th rowspan="2">Nama Pasien</th>
                                        <th rowspan="2" width="8%">Tgl. Masuk</th>
                                        <th rowspan="2" width="8%">Tgl Keluar</th>
                                        <th rowspan="2" width="10%">Jasa Pelayanan</th>
                                        <th colspan="2" class="text-center">Jasa Medik</th>
                                        <th rowspan="2" width="10%" class="text-center">Jasa Medik Non-Medis</th>
                                        <th rowspan="2" width="10%" class="position-sticky bg-white border-left" style="right:0; z-index:4">Aksi</th>
                                    </tr>
                                    <tr>
                                        <th width="10%">Direct</th>
                                        <th width="10%">Indirect</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="100%" class="text-center">Data tidak ditemukan!</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-secondary mr-2" onclick="rekapitulasi()">Lihat Rekapitulasi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Rekapitulasi-->
        <div class="modal fade" id="rekapitulasiModal" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rekapitulasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <div id="rekapBpjs">
                            <p class="font-weight-bold">Jasa BPJS</p>
                            <table id="tabelrekapitulasibpjs" class="display table dataTable table-bordered">
                                <thead class="position-relative z-0">
                                    <tr>
                                        <th>Klaim INACBG</th>
                                        <th>Obat</th>
                                        <th>Alkes</th>
                                        <th>BHP</th>
                                        <th>Jasa Pelayanan</th>
                                        <th>Jasa Medis</th>
                                        <th>Jasa Direct</th>
                                        <th>Jasa Indirect</th>
                                        <th>Jasa Reward</th>
                                        <th>Jasa Nonmedis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="100%" class="text-center">Data tidak ditemukan!</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="rekapNonbpjs">
                            <p class="font-weight-bold mt-4">Jasa Non-BPJS</p>
                            <table id="tabelrekapitulasinonbpjs" class="display table dataTable table-bordered">
                                <thead class="position-relative z-0">
                                    <tr>
                                        <th>Klaim RS</th>
                                        <th>Obat</th>
                                        <th>Alkes</th>
                                        <th>BHP</th>
                                        <th>Jasa Pelayanan</th>
                                        <th>Jasa Medis</th>
                                        <th>Jasa Direct</th>
                                        <th>Jasa Indirect</th>
                                        <th>Jasa Reward</th>
                                        <th>Jasa Nonmedis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="100%" class="text-center">Data tidak ditemukan!</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Jasa-->
        <div class="modal fade" id="rincianjasaModal" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rincian Jasa Per Ruangan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex">
                        </div>
                        <div class="d-flex justify-content-between">
                            <b class="rincianpasien"></b>
                            <button class="btn btn-primary ml-auto mb-2" onclick="tambahjasa()" type="button">Tambah</button>
                        </div>
                        <div class="collapse multi-collapse" id="tambahJasa">
                            <div class="card card-body">
                                <form id="tambahUnit">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Nama Unit</label>
                                                <div class="col-12 col-md-9">
                                                    <select name="kode_unit" class="form-control">
                                                        <option value="U0001">Unit Contoh</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Tgl Keluar</label>
                                                <div class="col-12 col-md-9">
                                                    <div class="input-group">
                                                        <input type="text" name="tgl_keluar" class="form-control pull-right datepick" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Hari Rawat Unit</label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="hari_rawat_unit" class="form-control" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Hari Rawat RS</label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="hari_rawatrs" class="form-control" readonly />
                                                </div>
                                            </div> -->

                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Tgl Masuk</label>
                                                <div class="col-12 col-md-9">
                                                    <div class="input-group">
                                                        <input type="text" name="tgl_masuk" class="form-control pull-right datepick" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Nilai</label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="nilai" class="form-control" readonly />
                                                </div>
                                            </div> -->

                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-primary" onclick="simpanjasa()">Simpan</button>
                                        <button class="btn btn-danger" data-toggle="collapse" data-target="#tambahJasa" aria-expanded="false" aria-controls="tambahJasa">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collapse multi-collapse" id="editJasa">
                            <div class="card card-body">
                                <form id="editUnit">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Nama Unit</label>
                                                <div class="col-12 col-md-9">
                                                    <select name="kode_unit" class="form-control">
                                                        <option value="U0001">Unit Contoh</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Tgl Keluar</label>
                                                <div class="col-12 col-md-9">
                                                    <div class="input-group">
                                                        <input type="text" name="tgl_keluar" class="form-control pull-right datepick" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Hari Rawat Unit</label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="hari_rawat_unit" class="form-control" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Hari Rawat RS</label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="hari_rawatrs" class="form-control" readonly />
                                                </div>
                                            </div> -->

                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Tgl Masuk</label>
                                                <div class="col-12 col-md-9">
                                                    <div class="input-group">
                                                        <input type="text" name="tgl_masuk" class="form-control pull-right datepick" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Nilai</label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="nilai" class="form-control" readonly />
                                                </div>
                                            </div> -->

                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-primary" id="updatejasaBtn">Ubah</button>
                                        <button class="btn btn-danger" data-toggle="collapse" data-target="#editJasa" aria-expanded="false" aria-controls="editJasa">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table-scrollable" style="max-height: 200px">
                            <table id="tabelrincianjasa" class="display table dataTable table-bordered" style="width: 150%;">
                                <thead>
                                    <tr class="position-relative">
                                        <th width="8%">No. RM</th>
                                        <th width="14%">Nama Unit</th>
                                        <th width="11%">Hari Rawat Unit</th>
                                        <th width="10%">Hari Rawat RS</th>
                                        <th width="5%">Nilai</th>
                                        <th width="10%">Tgl Masuk</th>
                                        <th width="10%">Tgl Keluar</th>
                                        <th width="10%">Tgl Masuk RS</th>
                                        <th width="10%">Tgl Keluar RS</th>
                                        <th class="column-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-warning">Finalisasi</button>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary ml-auto mt-4 my-2" onclick="tambahdokter()" type="button">Tambah</button>
                        </div>

                        <div class="collapse multi-collapse" id="tambahDokter">
                            <div class="card card-body">
                                <form id="tambahdokter">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Nama Dokter</label>
                                                <div class="col-12 col-md-9">
                                                    <select name="kode_dokter" class="form-control">
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Qty</label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="qty" class="form-control" />
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <!-- <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Jumlah Qty</label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="jml_qty" class="form-control" readonly />
                                                </div>
                                            </div> -->
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Type</label>
                                                <div class="col-12 col-md-9">
                                                    <select name="type" id="type" class="form-control">
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Jml Jasa Dibagi</label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="jasa_dibagi" class="form-control" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Jasa Diterima</label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="jasa_diterima" class="form-control" readonly />
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-primary" onclick="simpandokter()">Simpan</button>
                                        <button class="btn btn-danger" data-toggle="collapse" data-target="#tambahDokter" aria-expanded="false" aria-controls="tambahDokter">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collapse multi-collapse" id="editDokter">
                            <div class="card card-body">
                                <form id="editdokter">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Nama Dokter</label>
                                                <div class="col-12 col-md-9">
                                                    <select name="kode_dokter" class="form-control">
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Qty</label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="qty" class="form-control" />
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <!-- <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Jumlah Qty</label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="jml_qty" class="form-control" readonly />
                                                </div>
                                            </div> -->
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Type</label>
                                                <div class="col-12 col-md-9">
                                                    <select name="type" id="type" class="form-control">
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Jml Jasa Dibagi</label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="jasa_dibagi" class="form-control" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Jasa Diterima</label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="jasa_diterima" class="form-control" readonly />
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-primary" id="updatedokterBtn">Simpan</button>
                                        <button class="btn btn-danger" data-toggle="collapse" data-target="#editDokter" aria-expanded="false" aria-controls="editDokter">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table-scrollable" style="max-height: 400px">
                            <table id="tabelrinciandokter" class="display table dataTable table-bordered">
                                <thead>
                                    <th>Nama Dokter</th>
                                    <th width="7%">Type</th>
                                    <th width="15%">Jumlah Jasa Dibagi</th>
                                    <th width="14%">Jasa Diterima</th>
                                    <th width="7%" class="mx-auto">Aksi</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="button" onclick="prosesDokter()" class="btn btn-warning">Finalisasi</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Jasa-->
        <div class="modal fade" id="rincianjasaNonbpjsModal" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rincian Jasa Per Ruangan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex">
                        </div>
                        <div class="d-flex justify-content-between">
                            <b class="rincianpasien"></b>
                            <button class="btn btn-primary ml-auto mt-4 my-2" onclick="tambahdokter()" type="button">Tambah</button>
                        </div>

                        <div class="collapse multi-collapse" id="tambahDokterNon">
                            <div class="card card-body">
                                <form id="tambahdokternon">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Nama Dokter</label>
                                                <div class="col-12 col-md-9">
                                                    <select name="kode_dokter" class="form-control">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Nama Unit</label>
                                                <div class="col-12 col-md-9">
                                                    <select name="kode_unit" class="form-control">
                                                        <option value="U0001">Unit Contoh</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <!-- <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Jumlah Qty</label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="jml_qty" class="form-control" readonly />
                                                </div>
                                            </div> -->
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Type</label>
                                                <div class="col-12 col-md-9">
                                                    <select name="type" id="type" class="form-control">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Nilai</label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="nilai" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-primary" onclick="simpandokter()">Simpan</button>
                                        <button class="btn btn-danger" data-toggle="collapse" data-target="#tambahDokterNon" aria-expanded="false" aria-controls="tambahDokterNon">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collapse multi-collapse" id="editDokterNon">
                            <div class="card card-body">
                                <form id="editdokternon">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Nama Dokter</label>
                                                <div class="col-12 col-md-9">
                                                    <select name="kode_dokter" class="form-control">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Nama Unit</label>
                                                <div class="col-12 col-md-9">
                                                    <select name="kode_unit" class="form-control">
                                                        <option value="U0001">Unit Contoh</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <!-- <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Jumlah Qty</label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="jml_qty" class="form-control" readonly />
                                                </div>
                                            </div> -->
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Type</label>
                                                <div class="col-12 col-md-9">
                                                    <select name="type" id="type" class="form-control">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row col-spacing-row">
                                                <label for="" class="col-12 col-md-3 col-form-label">Nilai</label>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="nilai" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-primary" id="updatedokterBtn">Simpan</button>
                                        <button class="btn btn-danger" data-toggle="collapse" data-target="#editDokter" aria-expanded="false" aria-controls="editDokter">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table-scrollable" style="max-height: 400px">
                            <table id="tabelrinciandokternon" class="display table dataTable table-bordered">
                                <thead>
                                    <th>Nama Dokter</th>
                                    <th width="7%">Unit</th>
                                    <th width="7%">Type</th>
                                    <th width="15%">Jumlah Jasa Dibagi</th>
                                    <th width="14%">Jasa Diterima</th>
                                    <th width="7%" class="mx-auto">Aksi</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="button" onclick="prosesDokter()" class="btn btn-warning">Finalisasi</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Tambah Data-->
        <div class="modal fade" id="tambahModal" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="tambahUrj">
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">No RM</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="no_rm" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Nama Pasien</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="nama_pasien" class="form-control" readonly />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Tgl Masuk RS</label>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="text" name="tgl_masuk" class="form-control pull-right datepick" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Tgl Keluar RS</label>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="text" name="tgl_keluar" class="form-control pull-right datepick" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">No Sep</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="nosep" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Golongan</label>
                                <div class="col-12 col-md-9">
                                    <select type="text" name="kode_golongan" class="form-control">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row klaim">
                                <label for="" class="col-12 col-md-3 col-form-label">Klaim</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="klaim_inacbg" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row billing">
                                <label for="" class="col-12 col-md-3 col-form-label ">Billing RS</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="klaim_rs" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row kodetindakan">
                                <label for="" class="col-12 col-md-3 col-form-label ">Kode Tindakan</label>
                                <div class="col-12 col-md-9">
                                    <select type="text" name="kode_tindakan" class="form-control">
                                        <option value="RJ">Rawat Jalan</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Validasi Tindakan</label>
                                <div class="col-12 col-md-9">
                                    <select type="text" name="referensi_tindakan" class="form-control">
                                        <option value>-</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Register</label>
                                <div class="col-12 col-md-9">
                                    <input type="number" name="register" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Obat</label>
                                <div class="col-12 col-md-9">
                                    <input type="number" name="obat" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Alkes</label>
                                <div class="col-12 col-md-9">
                                    <input type="number" name="alkes" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">BHP</label>
                                <div class="col-12 col-md-9">
                                    <input type="number" name="bhp" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Diagnosa</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="diagnosa" class="form-control" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="simpanUrj()" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Edit Modal-->
        <div class="modal fade" id="editModal" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editUrj">
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">No RM</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="no_rm" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Nama Pasien</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="nama_pasien" class="form-control" readonly />
                                </div>
                            </div>

                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Tgl Masuk RS</label>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="text" name="tgl_masuk" class="form-control pull-right datepick" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Tgl Keluar RS</label>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="text" name="tgl_keluar" class="form-control pull-right datepick" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">No Sep</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="nosep" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Golongan</label>
                                <div class="col-12 col-md-9">
                                    <select type="text" name="kode_golongan" class="form-control">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row klaim">
                                <label for="" class="col-12 col-md-3 col-form-label">Klaim</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="klaim_inacbg" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row billing">
                                <label for="" class="col-12 col-md-3 col-form-label">Billing RS</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="klaim_rs" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row kodetindakan">
                                <label for="" class="col-12 col-md-3 col-form-label">Kode Tindakan</label>
                                <div class="col-12 col-md-9">
                                <select type="text" name="kode_tindakan" class="form-control">
                                        <option value="RJ">Rawat Jalan</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Validasi Tindakan</label>
                                <div class="col-12 col-md-9">
                                    <select type="text" name="referensi_tindakan" class="form-control">
                                        <option value>-</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Register</label>
                                <div class="col-12 col-md-9">
                                    <input type="number" name="register" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Obat</label>
                                <div class="col-12 col-md-9">
                                    <input type="number" name="obat" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Alkes</label>
                                <div class="col-12 col-md-9">
                                    <input type="number" name="alkes" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">BHP</label>
                                <div class="col-12 col-md-9">
                                    <input type="number" name="bhp" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Diagnosa</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="diagnosa" class="form-control" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="updateUrj()" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Upload-->
        <div class="modal fade" id="uploadModal" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formUpload">
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Periode</label>
                                <div class="col-12 col-md-4">
                                    <input type="month" id="periode" class="form-control" name="periode" value="">
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">File</label>
                                <div class="col-12 col-md-9">
                                    <input type="file" name="format_fpk" accept=".csv, .xls,.xlsx" />
                                </div>
                            </div>
                        </form>
                        <div class="row mb-4">
                            <div class="col-12">
                                <button type="button" onclick="uploadfpk()" class="btn btn-primary">Upload FPK</button>
                            </div>
                        </div>
                        <div class="table-responsive" style="max-height: 400px">
                            <table id="tableUpload" class="display table dataTable table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2" width="7%">No RM</th>
                                        <th rowspan="2">Nama Pasien</th>
                                        <th rowspan="2">No. SEP</th>
                                        <th colspan="4" class="text-center">Klaim INACBG</th>
                                        <th rowspan="2">Info</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2" width="10%">Diinput</th>
                                        <th rowspan="2" width="10%">Diajukan</th>
                                        <th rowspan="2" width="10%">Disetujui</th>
                                        <th rowspan="2" width="10%">Tgl Verifikasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="100%" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
</main>