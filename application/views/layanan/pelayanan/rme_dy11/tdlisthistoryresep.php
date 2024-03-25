
																<?php
																if ($dtresepdetail == NULL) {
																?>
																	<tr">
																		<td colspan="100%" class="text-center">
																			Belum Ada Data Resep
																		</td>
																	</tr>
																	<?php } else {
																	$no = 1;
																	$jmlt = 0;
																	$noresep_uji='';
																	$cek=0;
																	foreach ($dtresepdetail as $row) {
																		$kode_dokter_resep=$row->kode_dokter;
																		if ($noresep_uji != $row->noresep){
																	?>		
																			<tr>
																				<td colspan="2">
																				<?php
																					if ($cek != 0) {
																						echo '<br>';
																						$cek=1;
																					}	
																					echo '<strong style="color: navy; font-size: 14px; height: 20px; display: inline-block; line-height: 20px; margin-left: 5px;">'. tanggaldua($row->tglresep).' | '.$row->noresep.'</strong>';
																					echo '<strong style="color: green; font-size: 14px; height: 20px; display: inline-block; line-height: 20px; margin-left: 5px;">';
																					echo ($row->jamselesai !== NULL) ? '&nbsp;&nbsp;&nbsp;==> SELESAI' : '';
																					echo '</strong>';
																					echo '<br>';
																					echo '<strong style="color: black;font-size: 12px; margin-left: 5px;">'.$row->nama_dokter.'</strong>';
																				?>
																				<td>	
																			</tr>
																	<?php		
																			$noresep_uji = $row->noresep;
																		}

																	?>

																		<tr onclick="addResep_2('<?php echo $row->id; ?>', '<?php echo $row->kodeobat; ?>')">
                                                                    
																		 	<td width="5%">
																			</td>
																			<td width="95%">
																				<?php
																				echo '<strong style="color: red; font-size: 12px;">' . $row->namaobat.'</strong>'.'| '.$row->qty.' '.$row->satuanpakai.'<br>';
																				echo 'Aturan Pakai : ';
																				if ($row->pagi != '') {
																					echo "Pagi : ".$row->pagi;
																				}
																				if ($row->siang != '') {
																					echo " Siang : ".$row->siang;
																				}
																				if ($row->malam != '') {
																					echo " Malam : ".$row->malam;
																				}
																				if ($row->keterangan != '') {
																					echo " === ".$row->keterangan;
																				}
																				if ($row->caramakan != '') {
																					echo " ".$row->caramakan.' Makan';
																				}
																				if ($row->catatanracikan != ''  || $row->catatanracikan != NULL ) {
																					echo "<br>".$row->catatanracikan;
																				}	
																				?>
																			<td>	
																		</tr>
																		
																	<?php
																		}}
																 ?>


<script>
    function addResep_2(id,kode_obat) {
	var no_rm = document.getElementById("no_rm").value;
	var kode_dokter = document.getElementById("kode_dokter").value;
	var nama_dokter = document.getElementById("nama_dokter").value;
	var notransaksi = document.getElementById("notransaksi").value;
	var kode_unit = document.getElementById("kode_unit").value;

	if (kode_dokter != 'XXXXXX') {
		console.log(no_rm);
		console.log(kode_dokter);
		console.log(notransaksi);
		$.ajax({
				url: "<?php echo site_url(); ?>/rme/pilihObatId_ranap",
				type: "GET",
				data: {
					id: id,
					kode_obat : kode_obat,
					no_rm : no_rm,
					kode_dokter : kode_dokter,
					nama_dokter : nama_dokter,
					notransaksi : notransaksi,
					kode_unit : kode_unit
				},
				success: function(ajaxData) {
					console.log(ajaxData);
					var dt = JSON.parse(ajaxData);
					$("#orderresep tbody tr").remove();
					$("#orderresep tbody").append(dt.dtview);
					$.ajax({
                        url: "<?php echo site_url(); ?>/rme/refreshhistoryresep",
                        method: 'GET', // Atau POST sesuai dengan pengaturan server Anda
                        data: {
                                no_rm: no_rm
                            },
                        success: function(ajaxData2) {
                            console.log('masuk refresh tabel history resep');
                            console.log(ajaxData2);
                            var dt = JSON.parse(ajaxData2);
                            $("#tabelresep tbody tr").remove();
                            $("#tabelresep tbody").append(dt.dtview);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
				},
				error: function(ajaxData) {
					$.notify("Gagal Memproses Data", "error");
				}
			});
	} else {
		// swal('Order Resep dari History hanya untuk User Dokter')
		swal({
			text: "Order Resep dari History hanya untuk User Dokter",
			icon: "error",
			button: true
		});
	}
}
</script>

