
<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css" >
<div class="card">
	<div class="col-12 mt-4 ml-3">
		<div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color: navy;">FILE</h6></div>
	</div>

	<div class="table-responsive table-hover table-scrollable" id="tabelasuhan1" style="max-height: 600px; overflow-y: auto;">
		<table class="table" id="tabelasuhan">
			<tbody>
				<?php
				if ($dtfile== NULL) {
				?>
					<tr>
						<td colspan="100%" class="text-left">
							Belum Ada Data
						</td>
					</tr>
				<?php } else {
					foreach ($dtfile as $row) {
				?>																
					<tr>
						<td width="3%">
						</td>
						<td width="97%">
						<?php 
							if ($row->type == 'application/pdf') {echo 'PDF | ';} 
							if ($row->type == 'image/jpeg') {echo 'JPEG | ';} 
							if ($row->type == 'video/mp4') {echo 'MP4 | ';} 
							echo '<strong>' . $row->keterangan . '<br></strong>';
							echo "<br>";								
						?>
						</td>
					<tr>
				<?php
					}
				}
				?>
			</tbody>
		</table>
	</div>
</div>

