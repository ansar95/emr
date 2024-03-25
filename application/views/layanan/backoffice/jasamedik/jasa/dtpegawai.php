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
                        <h4 class="mb-0">Kelola Data Pegawai</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-8 col-12">
                                            <div class="form-group row col-spacing-row">
                                                <div class="col-md-3">
                                                    <label for="jspelayanan"> Unit</label>
                                                </div>
                                                <div class="col-md-4  d-flex pull-left">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" name="cekunit" value="1" id="uncekunit" onclick="unitcek()" checked>
                                                        <label class="custom-control-label" for="uncekunit">Semua</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" name="cekunit" value="2" id="cekunit" onclick="unitcek()">
                                                        <label class="custom-control-label" for="cekunit">Pilihan</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-control unit2" style="width: 100%;" id="unit" name="unit" disabled>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="row col-spacing-row">
                                                <label class=" col-5" for="customCheck2">Jumlah Pegawai : </label>
                                                <label class="col-2 align-left"><B id="countPegawai">0</B></label>
                                                <div class="col-5">
                                                    <button class=" btn btn-primary" onclick="load_data_pegawai()">Tampilkan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row spacing-row">
                                        <div class="col-md-8 col-12">
                                            <div class="form-group row col-spacing-row">
                                                <div class="col-md-3">
                                                    <label for="tampildata">Posisi</label>
                                                </div>
                                                <div class="col-md-4 d">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" name="cekposisi" id="uncekposisi" onclick="posisicek()" checked>
                                                        <label class="custom-control-label" for="uncekposisi">Semua</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" name="cekposisi" onclick="posisicek()" id="cekposisi">
                                                        <label class="custom-control-label" for="cekposisi">Pilihan</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-control unit2" style="width: 100%;" id="posisi" name="posisi" disabled>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="sort-panel">
                            <div class="form-group row ">
                                <label for="sortingField" class="col-sm-2 col-form-label">Cari Nama Pegawai</label>
                                <div class="col-sm-3 d-flex">
                                    <input type="text" name="crnama" id="crnama" class="form-control">
                                    <button type="button" class="btn btn-primary ml-2" id="sort" onclick="load_data_pegawai()">Cari</button>

                                </div>
                                <div class="col-sm-7">
                                    <button class="btn btn-primary" style="float:right !important;" onclick="tambahpegawai()"><i class="fa fa-plus"></i> Tambah Data</button>

                                </div>
                            </div>
                        </div>

                        <div class=" mt-2 table-scrollable" style="max-height: 400px; width: 100%;">
                            <table id="tabelmedikpegawai" class="display table dataTable table-bordered" style="width: 130%;">
                                <thead>
                                    <th>NIP</th>
                                    <th>Nama Pegawai</th>
                                    <th>TMT</th>
                                    <th>Gol</th>
                                    <th>Posisi</th>
                                    <th>Pangkat</th>
                                    <th>Unit Kerja</th>
                                    <th>Jabatan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Pendidikan</th>
                                    <th>No. Rek</th>
                                    <th>Nama Pemilik</th>
                                    <th>Status</th>
                                    <th class="mx-auto">Aksi</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="100%" class="text-center">Data tidak ditemukan!</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal tambah Modal-->

        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="tambahPegawai">

                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">NIP</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="nip" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Nama Pegawai</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="nama_pegawai" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-12 col-md-9">
                                    <select name="sex" class="form-control unit2" style="width: 100%;">
                                        <option value="L">Laki Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Posisi</label>
                                <div class="col-12 col-md-9">
                                    <select name="posisi" class="form-control unit2" style="width: 100%;">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">TMT</label>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="date" name="tmt" class="form-control pull-right" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Pangkat/Gol</label>
                                <div class="col-5">
                                    <div class="input-group">
                                        <select name="pangkat" class="form-control unit2" style="width: 100%;">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group">
                                        <select name="gol" class="form-control unit2" style="width: 100%;">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Unit Kerja</label>
                                <div class="col-12 col-md-9">
                                    <select name="kode_unit" class="form-control unit2" style="width: 100%;">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Jabatan</label>
                                <div class="col-12 col-md-9">
                                    <select name="jabatan" class="form-control unit2" style="width: 100%;">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">No. Rek Bank</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="no_rekening" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Pemilik Rek</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="nama_pemilik" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Pendidikan</label>
                                <div class="col-12 col-md-9">
                                    <select name="pendidikan" id="" class="form-control unit2" style="width: 100%;">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Status Aktif</label>
                                <div class="col-12 col-md-9">
                                    <select name="aktif" id="" class="form-control unit2" style="width: 100%;">
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="simpanPegawai()">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal edit Modal-->

        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editPegawai">

                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">NIP</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="nip" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Nama Pegawai</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="nama_pegawai" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-12 col-md-9">
                                    <select name="sex" class="form-control unit2" style="width: 100%;">
                                        <option value="L">Laki Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Posisi</label>
                                <div class="col-12 col-md-9">
                                    <select name="posisi" class="form-control unit2" style="width: 100%;">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">TMT</label>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <input type="date" name="tmt" class="form-control pull-right" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Pangkat/Gol</label>
                                <div class="col-5">
                                    <div class="input-group">
                                        <select name="pangkat" class="form-control unit2" style="width: 100%;">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group">
                                        <select name="gol" class="form-control unit2" style="width: 100%;">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Unit Kerja</label>
                                <div class="col-12 col-md-9">
                                    <select name="kode_unit" class="form-control unit2" style="width: 100%;">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Jabatan</label>
                                <div class="col-12 col-md-9">
                                    <select name="jabatan" class="form-control unit2" style="width: 100%;">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">No. Rek Bank</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="no_rekening" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Pemilik Rek</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="nama_pemilik" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Pendidikan</label>
                                <div class="col-12 col-md-9">
                                    <select name="pendidikan" id="" class="form-control unit2" style="width: 100%;">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row col-spacing-row">
                                <label for="" class="col-12 col-md-3 col-form-label">Status Aktif</label>
                                <div class="col-12 col-md-9">
                                    <select name="aktif" id="" class="form-control unit2" style="width: 100%;">
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="updatePegawai()">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>