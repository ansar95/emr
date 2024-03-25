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
                        <h4 class="mb-0">Persentase Ranap</h4>
                        <button class="btn btn-primary" onclick=""><i class="fa fa-plus"></i> Tambah Data</button>

                    </div>
                    <div class="card-body">
                        <div class="sort-panel">
                            <div class="form-group row ">
                                <!-- <label for="sortingField" class="col-sm-2 col-form-label">Cari Nama Pasien</label>
                                <div class="col-sm-3 d-flex">
                                    <input type="text" name="crnama" id="crnama" class="form-control">
                                    <button type="button" class="btn btn-primary ml-2" onclick="load_data_uri()" id="sort">Cari</button>

                                </div> -->
                            </div>
                        </div>

                        <div class="table-responsive mt-2 table-scrollable" style="max-height: 400px;">
                            <table id="tabelmedikuri" class="display table dataTable table-bordered" style="width: 120%">
                                <thead class="position-relative">
                                    <tr class="position-relative">
                                        <th width="5%" class="column-left bg-white">Kode Tindakan</th>
                                        <th width="5%">DPJP Utama</th>
                                        <th width="5%">DPJP/ Operator</th>
                                        <th width="5%">Anestesi 1</th>
                                        <th width="5%">DPJP/ Operator 2</th>
                                        <th width="5%">Anestesi 2</th>
                                        <th width="5%">Konsul Double lumen</th>
                                        <th width="5%">Konsul intra OP</th>
                                        <th width="5%">Konsul I</th>
                                        <th width="5%">Konsul II</th>
                                        <th width="5%">Konsul III</th>
                                        <th width="5%">Konsul IV</th>
                                        <th width="5%">Konsul V</th>
                                        <th width="5%">Rawat Bersama I</th>
                                        <th width="5%">Rawat Bersama II</th>
                                        <th width="5%">Rawat Bersama III</th>
                                        <th width="5%">Rawat Bersama IV</th>
                                        <th width="5%">LAB PK</th>
                                        <th width="5%">LAB PA</th>
                                        <th width="5%">Rad</th>
                                        <th width="5%">Jumlah</th>
                                        <th width="5%">Non Medis</th>
                                        <th width="5%"> </th>
                                        <th width="6%">Swakelola</th>
                                        <th width="5%">Supporting Staf</th>
                                        <th width="5%">Casemix</th>
                                        <th width="5%">Jumlah</th>
                                        <th class="column-right bg-white" width="5%">Aksi</th>
                                    </tr>
                                   
                                </thead>
                                <tbody>
                                    <tr class="position-relative">
                                        <td class="column-left bg-white">TDK-RJL01</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td>10%</td>
                                        <td width="7%">10%</td>
                                        <td class="column-right bg-white" width="5%">10%</td>
                                        <td class="column-right bg-white"> <button class="btn btn-primary mb-1"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        <!-- <button class="btn btn-secondary" onclick="rekapitulasi()">Lihat Rekapitulasi</button> -->
                    </div>
                </div>
            </div>
        </div>
</main>