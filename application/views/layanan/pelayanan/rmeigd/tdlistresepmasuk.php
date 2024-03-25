																<tr style="background-color: #ccc;">
																	<th style="width: 25%; text-align: center; font-size: 14px;" height="35px">Nama Obat</th>
																	<th style="width: 24%; text-align: center; font-size: 14px;">Aturan Pakai</th>
																	<th style="width: 24%; text-align: center; font-size: 14px;">Tindak Lanjut</th>
																	<th style="width: 24%; text-align: center; font-size: 14px;">Perubahan Aturan Pakai</th>
																	<th style="width: 3%; text-align: center; font-size: 14px;">#</th>
																</tr>
																<?php
																	if ($dtobatmasuk == NULL) {
																		?>
																		<tr>
																			<td colspan="100%" class="text-center">
																				Belum Ada Data
																			</td>
																		</tr>
																	<?php } else {
																		$no = 1;
																		$jmlt = 0;
																		foreach ($dtobatmasuk as $row) {
																			?>
																			<tr>
																				<td style="font-size: 13px;" height="35px"><?php echo $row->nama_obat; ?></td>
																				<td style="font-size: 13px;"><?php echo $row->aturanpakai; ?></td>
																				<td style="font-size: 13px;"><?php echo $row->tindaklanjuttext; ?></td>
																				<td style="font-size: 13px;"><?php echo $row->perubahan; ?></td>
																				<td style="font-size: 13px;">
																					<button onclick="hapusobatmasuk(<?php echo $row->id; ?>)" class="btn btn-danger"
																					data-bs-dismiss="modal">Hapus</button>
																				</td>
																			</tr>
																				
																				<?php
																		}
																	}
																	?>

<script>
function hapusobatmasuk(id) {
		var no_rm = document.getElementById('no_rm').value;
		var notransaksi = document.getElementById('notransaksi').value;
        $.ajax({
			url: "<?php echo site_url(); ?>/rme/hapusobatmasuk",
            method: 'GET',
            data: {
				id : id,
                no_rm: no_rm,
                notransaksi: notransaksi
            },
            success: function(ajaxData) {
				$("#namaobat").val("");
				$("#aturanpakai").val("");
				$("#tindaklanjut").val("0");
				$("#perubahan").val("");
				console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#obatmasuk tbody tr").remove();
					$("#obatmasuk tbody").append(dt.dtview);
            },
            error: function() {
                // Handle jika terjadi kesalahan pada AJAX request
                alert('Terjadi kesalahan saat mengirim data');
            }
        });
    }

</script>
