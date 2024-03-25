<?php
if ($dtmasterracikdokter == null) {
	?>
		<tr>
			<td class="text-center">
				Belum Ada Order
			</td>
		</tr>
	<?php
		} else {
			$koderaciktampil='';
			foreach($dtmasterracikdokter as $row) {
				if ( $koderaciktampil != $row->kodeobatracikan ) {
	?>			
					<tr>
						<td colspan="2">
							<?php
																					echo '<span style="margin-left: 2ch;"></span> <strong style="color: red;font-size: 12px;">'.'> ' . strtoupper($row->nama_racikan).'</strong>';
																				?>
																				<button onclick="editDataRacik('<?php echo $row->kodeobatracikan;?>')" class="btn btn-sm ml-1" id="tomboleditRacikan" name="tomboleditRacikan" style="background-color: #330066; color: #FFFFFF;"><i class="far fa-edit"></i></button><br>
							<td>	
					</tr>
	<?php 	
					$koderaciktampil=$row->kodeobatracikan;
				} 
	?>
				<tr onclick="bukaFormRacik('<?php echo $row->idheader; ?>')">
					<td width="10%">
					</td>
					<td width="90%">
						<?php 
							echo '<strong style="color: #000066; font-size: 12px;">' . trim($row->nama_obat).'</strong>'.'<br>';
							echo 'Qty : '.$row->qty .' '. $row->satuan.'<br>';
						?>
					</td>	
				</tr>
	<?php			
		}
	}
	?>

	<script>
		
function editDataRacik(kode_racikan) {
	var kode_dokter = document.getElementById("kode_dokter").value;
    $.ajax({
			url: "<?php echo site_url(); ?>/rme/editMasterRacikan",
			type: "GET",
			data: {
				kode_dokter : kode_dokter,
				kode_racikan : kode_racikan
			},
			success: function(ajaxData) {
				$("#formmodal").html(ajaxData);
                    $("#formmodal").modal('show', {
                        backdrop: 'true'
                    });
                    modaldetailtutup();
			},
			error: function(ajaxData) {
				$.notify("Gagal Memproses Data", "error");
			}
		});

}
	</script>