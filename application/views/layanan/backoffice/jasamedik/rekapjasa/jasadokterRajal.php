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

    <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Pembagian Jasa Dokter Rawat Jalan</h4>
                        <!-- <button class="btn btn-primary" onclick="tambahdatatindakan()"><i class="fa fa-plus"></i> Tambah Data</button> -->
                        
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row spacing-row">
                                    <div class="col-md-6 col-6 col-sm-6">
                                        <div class="form-group row col-spacing-row">
                                            <div class="col-md-3">
                                                <label for="jspelayanan"> Jasa Pelayanan</label>
                                            </div>
                                            <div class="col-md-4  d-flex pull-left">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" class="custom-control-input" name="cekjasa" value="1" id="uncekjasa" onclick="jasacek()" checked>
                                                    <label class="custom-control-label" for="uncekjasa">Semua</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" class="custom-control-input" name="cekjasa" value="2" id="cekjasa" onclick="jasacek()">
                                                    <label class="custom-control-label" for="cekjasa">Pilihan</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control unit2" style="width: 100%;" id="jasa" name="jasa" disabled>
                                                    <option value="">-</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 col-sm-6">
                                        <div class="form-group row col-spacing-row">
                                            <div class="col-md-1">
                                                <label class="col-form-label">TMT</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group mb-3">
                                                    <input type="date" class="form-control pull-right" id="awal" name="awal" value="" required>
                                                </div>
                                            </div>
                                            <label class="col-form-label">s/d</label>
                                            <div class="col-md-4">
                                                <div class="input-group mb-3">
                                                    <input type="date" class="form-control pull-right" id="akhir" name="akhir" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button onclick="load_data_dokter()" class="btn btn-primary d-flex ">Tampilkan</button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card mt-2">    
                    <div class="card-body">
                        <div class="table-responsive table-scrollable" style="max-height: 450px;">
                            <table id="tabledokter" class="display table dataTable table-bordered ">
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Nama Dokter</th>
                                        <th rowspan="2">DPJP</th>
                                        <th rowspan="2">Operator Bedah</th>
                                        <th rowspan="2">Anastesi</th>
                                        <th rowspan="2">Konsul</th>
                                        <th rowspan="2">Rawat Bersama</th>
                                        <th rowspan="2">LAB-PK</th>
                                        <th rowspan="2">LAB-PA</th>
                                        <th rowspan="2">Radiologi</th>
                                        <th rowspan="2">Mikrobiologi</th>
                                        <th colspan="3">Jasa Medis</th>
                                        <th rowspan="2">Total</th>
                                    </tr>
                                    <tr>
                                        <th>Direct</th>
                                        <th>Indirect</th>
                                        <th>Reward</th>
                                    </tr>
                                   
                                </thead>
                                <tbody style="border: 1px solid gray ;">
                                   
                                </tbody>
                                <tfoot style="position:sticky; inset-block-end: 0; background-color:whitesmoke; border-top: 2px solid #ccc;">
                                <tr style="border:1px solid black;">
                                        
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- <button class="btn btn-secondary" onclick="rekapitulasi()">Lihat Rekapitulasi</button> -->
                    </div>
                </div>
                <!-- <div class="card mt-2">
                    <div class="card-body">
                    <div class="table-responsive table-scrollable" style="max-height: 450px;">
                            <table id="tabletotal" class="display table dataTable table-bordered ">
                                <thead>
                                    <tr>
                                        <th width="">Total</th>
                                        <td>dpjp</td>
                                        <td>dpjp</td>
                                        <td>dpjp</td>
                                        <td>dpjp</td>
                                        <td>dpjp</td>
                                        <td>dpjp</td>
                                        <td>dpjp</td>
                                        <td>dpjp</td>
                                        <td>dpjp</td>
                                        <td>dpjp</td>
                                        <td>dpjp</td>
                                        <td>dpjp</td>
                                        <td>dpjp</td>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</main>