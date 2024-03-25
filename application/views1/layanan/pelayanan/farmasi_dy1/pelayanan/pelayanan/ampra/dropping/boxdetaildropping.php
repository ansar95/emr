<div class="d-flex justify-content-between">
	<b class="box-title" id="unitname"></b>
	<div class="box-tools pull-right" style="padding-top: 4px;">
		<button onclick="panggiltambahdrop()" role="button" class="btn btn-sm btn-primary mb-2" id="tambahdetail">
			<i class='glyphicon glyphicon-plus'></i> Tambah Data
		</button>
	</div>
</div>
<div class="box-body">
	<div class="row">
		<div class="col-sm-12" id="tablenamaunit" style="overflow-x: auto;">
			<table class="table table-bordered" style="width: 110%;">
				<thead>
					<tr>
						<th>Item Obat/BHP.</th>
						<th width="6%">Qty Ampra</th>
						<th width="6%">Satuan</th>
						<th width="7%">Tgl. Order</th>
						<th width="6%">Qty Drop</th>
						<th width="7%">Tgl. Drop</th>
						<th width="8%">Batch No.</th>
						<th width="7%">Expire</th>
						<th width="8%">Hrg Satuan</th>
						<th width="6%">Pendanaan</th>
						<th width="15%">Aksi</th>
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
							echo "<td>" . $row->penggunaan . "</td>";
							echo '<td>
							<button role="button" onclick="panggildrop(`' . $row->id . '`)" class="btn-sm btn-primary btn">Drop</button>
							<button role="button" onclick="panggilhapusdropping(`' . $row->id . '`)" class="btn-sm btn-danger btn">Hapus</button>
							</td>';
							echo "</tr>";
							$unitnya = $row->kode_unit;
						}
					}
					?>
				</tbody>
			</table>
		</div>
		<?php
		if ($hasil != null) { ?>
			<!-- <div class="box-tools pull-left" style="padding-top: 4px;"> -->
			<button onclick="cetakdroping('<?php echo $unitnya; ?>')" role="button" class="btn btn-sm btn-success mt-4" id="cetakdroping">
				<i class='glyphicon glyphicon-print'></i> Cetak Form Droping
				<!-- </div>	 -->
			</button>
		<?php } ?>
	</div>
</div>
<script>
	$(document).ready(function() {
		$("#unitname").html(unit);
	});
</script>