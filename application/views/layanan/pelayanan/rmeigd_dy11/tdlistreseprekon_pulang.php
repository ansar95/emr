																<tr style="background-color: #ccc;">
																	<th style="width: 25%; text-align: center; font-size: 14px;" height="35px">Nama Obat</th>
																	<th style="width: 19%; text-align: center; font-size: 14px;">Aturan Pakai</th>
																	<th style="width: 19%; text-align: center; font-size: 14px;">Tindak Lanjut</th>
																	<th style="width: 19%; text-align: center; font-size: 14px;">Aturan Pakai Obat Saat Pulang</th>
																	<th style="width: 12%; text-align: center; font-size: 14px;">Rute</th>
																	<th style="width: 6%; text-align: center; font-size: 14px;">#</th>
																</tr>
																<?php
																	if ($dtobatpulang == NULL) {
																		?>
																		<tr>
																			<td colspan="100%" class="text-center">
																				Belum Ada Data
																			</td>
																		</tr>
																	<?php } else {
																		$no = 1;
																		$jmlt = 0;
																		foreach ($dtobatpulang as $row) {
																			?>
																			<tr>
																				<td style="font-size: 13px;" height="35px"><?php echo $row->nama_obat; ?></td>
																				<td style="font-size: 13px;"><?php echo $row->aturanpakai; ?></td>
																				<td style="font-size: 14px;">
																					<select id="tindaklanjut_<?php echo $row->id; ?>" style="width: 100%; height: 30px; border: none;">
																						<option value="0" style="border: none;" <?php if ($row->tindaklanjut == 0) echo 'selected'; ?>></option>
																						<option value="1" style="border: none;" <?php if ($row->tindaklanjut == 1) echo 'selected'; ?>>Lanjut aturan pakai yang sama</option>
																						<option value="2" style="border: none;" <?php if ($row->tindaklanjut == 2) echo 'selected'; ?>>Lanjut dengan aturan pakai berubah</option>
																						<option value="3" style="border: none;" <?php if ($row->tindaklanjut == 3) echo 'selected'; ?>>Stop</option>
																					</select>
																				</td>
																				<!-- <td style="font-size: 13px;"><?php echo $row->perubahan; ?></td> -->
																				<td style="font-size: 13px;"><input type="text" id="perubahan_<?php echo $row->id; ?>" style="width: 100%; height: 30px; border: none;" value="<?php echo $row->perubahan; ?>"></td>
																				<td style="font-size: 14px;">
																					<select id="rute_<?php echo $row->id; ?>" style="width: 100%; height: 30px; border: none;">
																						<option value="0" style="border: none;" <?php if ($row->rute == 0) echo 'selected'; ?>></option>
																						<option value="1" style="border: none;" <?php if ($row->rute == 1) echo 'selected'; ?>>Oral</option>
																						<option value="2" style="border: none;" <?php if ($row->rute == 2) echo 'selected'; ?>>Parenteral</option>
																						<option value="3" style="border: none;" <?php if ($row->rute == 3) echo 'selected'; ?>>Topikal</option>
																						<option value="4" style="border: none;" <?php if ($row->rute == 4) echo 'selected'; ?>>Supositoria</option>
																						<option value="5" style="border: none;" <?php if ($row->rute == 5) echo 'selected'; ?>>Sublingual</option>
																						<option value="6" style="border: none;" <?php if ($row->rute == 6) echo 'selected'; ?>>Bukal</option>
																						<option value="7" style="border: none;" <?php if ($row->rute == 8) echo 'selected'; ?>>Lainnya</option>
																					</select>
																				</td>
																				<td style="font-size: 13px;">
																					<button onclick="saveperubahanpulang1('<?php echo $row->id;?>')" class="btn btn-success" data-bs-dismiss="modal">s</button>
																					<button onclick="hapusobatpulang('<?php echo $row->id;?>')" class="btn btn-danger" data-bs-dismiss="modal">x</button>
																					<input type="hidden" id="idnya" style="width: 100%; height: 30px; border: none;" value="<?php echo $row->id; ?>">
																				</td>
																			</tr>
																				
																				<?php
																		}
																	}
																	?>


<script>

function saveperubahanpulang1(id) {
		var tindaklanjut = document.getElementById('tindaklanjut_' + id).value;
		var tindaklanjuttext = $("#tindaklanjut option:selected").text();
		var perubahan = document.getElementById('perubahan_' + id).value;
		var perubahantext = $("#perubahan option:selected").text();
		var rute = document.getElementById('rute_' + id).value;
		var rutetext = $("#rute option:selected").text();

        // Kirim data menggunakan AJAX
        $.ajax({
			url: "<?php echo site_url(); ?>/rme/updateData",
            method: 'POST',
            dataType: 'json',
            data: {
                id: id,
                tindaklanjut: tindaklanjut,
                tindaklanjuttext: tindaklanjuttext,
                perubahan: perubahan,
                perubahantext: perubahantext,
                rute: rute,
                rutetext: rutetext
            },
            success: function(response) {
                if (response.success) {
                    // alert('Data berhasil diperbarui');
                } else {
                    // alert('Gagal memperbarui data');
                }
            },
            error: function() {
                // Handle jika terjadi kesalahan pada AJAX request
                alert('Terjadi kesalahan saat mengirim data');
            }
        });
    }

	function hapusobatpulang(id) {
		var no_rm = document.getElementById('no_rm').value;
		var notransaksi = document.getElementById('notransaksi').value;
        $.ajax({
			url: "<?php echo site_url(); ?>/rme/hapusobatpulang",
            method: 'GET',
            data: {
				id : id,
                no_rm: no_rm,
                notransaksi: notransaksi
            },
            success: function(ajaxData) {
				console.log(ajaxData);
				var dt = JSON.parse(ajaxData);
				$("#obatpulang tbody tr").remove();
				$("#obatpulang tbody").append(dt.dtview);
            },
            error: function() {
                // Handle jika terjadi kesalahan pada AJAX request
                alert('Terjadi kesalahan saat mengirim data');
            }
        });
    }
</script>	