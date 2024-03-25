<div class="box-header with-border">
	<div class="d-flex justify-content-between box-tools pull-right" style="padding-top: 4px;">
		<b class="box-title" id="unitname"></b>
		<button onclick="panggiltambahdrop()" class="btn btn-sm btn-primary" id="tambahdetail">
			<i class='fas fa-plus'></i> Tambah Data
		</button>
	</div>
</div>
<div class="box-body">
	<div class="row">
		<div class="col-sm-12" id="tablenamaunit">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Item Obat/BHP.</th>
						<th>Qty Ampra</th>
						<th>Satuan</th>
						<th>Tgl. Order</th>
						<th>Qty Drop</th>
						<th>Tgl. Drop</th>
						<th>Batch No.</th>
						<th>Expire</th>
						<th>Harga Satuan</th>
						<th width="17%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ($hasil == null) {
					?>
						<tr>
							<td colspan="10" class="text-center">
								Tidak Ada Data
							</td>
						</tr>
					<?php
					} else {
						$nob = 0;
						foreach ($hasil as $row) {
							echo "<tr>";
							echo "<td>" . $row->namaobat . "</td>";
							echo "<td>" . $row->qtyampra . "</td>";
							echo "<td></td>";
							echo "<td>" . $row->tglorder . "</td>";
							echo "<td>" . $row->qtydrop . "</td>";
							echo "<td>" . $row->tgldrop . "</td>";
							echo "<td>" . $row->batch . "</td>";
							echo "<td>" . $row->expire . "</td>";
							echo "<td>" . $row->harga . "</td>";
							echo '<td>
							<button onclick="panggildrop(`' . $row->id . '`)" class="btn-sm btn-primary btn">Drop</button>
							<button onclick="panggilhapusdropping(`' . $row->id . '`)" class="btn-sm btn-danger btn">Hapus</button>
							</td>';
							echo "</tr>";
							$unitnya = $row->kode_unit;
						}
					}
					?>
				</tbody>
			</table>
			<!-- <div class="box-tools pull-left" style="padding-top: 4px;"> -->
			<button onclick="cetakdroping('<?php echo $unitnya; ?>')" class="btn btn-sm btn-success" id="cetakdroping">
				<i class='fas fa-print'></i> Cetak Form Droping
				<!-- </div>	 -->
				</button>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$("#unitname").html(unit);
	});
</script>