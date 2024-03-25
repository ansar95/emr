<div class="content-wrapper">
	<section class="content">
        <div class="box" id="kotakdetail">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Obat</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped" id="obat">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Obat</th>
                                <th>Satuan</th>
                                <th>Harga Obat</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $n = 0;
                                foreach($obat as $row) {
                                    echo "<tr>";
                                    echo "<td>".++$n."</td>";
                                    echo "<td>".$row->namaobat."</td>";
                                    echo "<td>".$row->satuanpakai."</td>";
                                    echo "<td>".$row->hargapakai."</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
	</section>
</div>
