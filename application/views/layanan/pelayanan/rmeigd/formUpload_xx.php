<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css">
<script>
    function redirectToFile(fileName) {
        var fileURL = "<?php echo base_url();?>/assets/upload/" + fileName;
		window.open(fileURL, '_blank');
    }
</script>


<div class="card">
    <div class="col-12 mt-4 ml-3">
        <div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color: navy;">FILE</h6></div>
    </div>

	<div class="form-group row col-spacing-row ml-5 mt-3">
		<div class="col-md-3">
			<label class="btn btn-secondary">Pilih File <input type="file" id="userfile" style="display: none;" onchange="displayFileName()"></label>&nbsp;&nbsp;&nbsp;&nbsp;
			<label><div id="fileNameDisplay"></div></label>
			<input type="text" id="namafile" name="namafile">
			<input type="text" id="typefile" name="typefile">
    	</div>
		<label class="col-md-1 col-form-label text-right">Keterangan</label>
		<div class="col-md-3">
			<input type="text" id="keterangan" name="keterangan" class="form-control" style="border-width: 1px; border-color: gray; display: inline;">
    	</div>
		<div class="col-1 text-left">
			<button onclick="savefileupload()" id="uploadfile" class="btn btn-info" data-bs-dismiss="modal">Upload File</button>
		</div>
    </div>


    <div class="table-responsive table-hover table-scrollable mt-4" id="tabelupload1" style="max-height: 600px; overflow-y: auto;">
        <table class="table" id="tabelupload">
            <tbody>
                <?php
                if ($dtfile == NULL) {
                ?>
                    <tr>
                        <td colspan="100%" class="text-left">
                            Belum Ada Data
                        </td>
                    </tr>
                <?php } else {
                    foreach ($dtfile as $row) {
                ?>
                        <tr onclick="redirectToFile('<?php echo $row->namafile; ?>')">
                            <td width="3%">
                            </td>
							<td width="4%">
								<?php if ($row->type == 'application/pdf') { ?>
									<img src="<?php echo base_url();?>/assets/image/logogambar/logopdf.jpeg" alt="Logo Gambar" style="max-width: 70%; height: auto;">
								<?php } else if ($row->type == 'image/jpeg') { ?>
									<img src="<?php echo base_url();?>/assets/image/logogambar/logojpeg.jpeg" alt="Logo Gambar" style="max-width: 70%; height: auto;">
								<?php } else if ($row->type == 'video/mp4') { ?>
									<img src="<?php echo base_url();?>/assets/image/logogambar/logomp4.jpeg" alt="Logo Gambar" style="max-width: 70%; height: auto;">
								<?php } else  { ?>
									<img src="<?php echo base_url();?>/assets/image/logogambar/logokosong.jpeg" alt="Logo Gambar" style="max-width: 70%; height: auto;">
								<?php } ?>
                            </td>
                            <td width="93%" style="font-size: 14px; vertical-align:  bottom;">
                                <?php
                                echo '<br>';
                                echo '<strong>' . $row->keterangan . '<br></strong>';
                                // echo '<strong>' . $row->tglupload . '<br></strong>';
                                echo "<br>";
                                ?>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<script>
    function displayFileName() {
        var fileInput = document.getElementById('userfile');
        var fileNameDisplay = document.getElementById('fileNameDisplay');
        
        // Periksa apakah pengguna telah memilih file
        if (fileInput.files.length > 0) {
            // Tampilkan nama file yang dipilih
            fileNameDisplay.textContent = fileInput.files[0].name;
			fileType = fileInput.files[0].type;
        } else {
            // Jika tidak ada file yang dipilih, kosongkan tampilan nama file
            fileNameDisplay.textContent = '';
			fileType = '';

        }
		$("#namafile").val(fileInput.files[0].name);
		$("#typefile").val(fileInput.files[0].type);
    }

	function savefileupload() {
			var no_rm = document.getElementById("no_rm").value;
			var notransaksi = document.getElementById("notransaksi").value;
			var keterangan = document.getElementById("keterangan").value;
			var namafile = document.getElementById("namafile").value;
			var type = document.getElementById("typefile").value;
			console.log(no_rm);
			console.log(notransaksi);
			console.log(keterangan);

			$.ajax({
				url: "<?php echo site_url(); ?>/upload/do_upload",
				type: "GET",
				data: {
					no_rm : no_rm,
					notransaksi : notransaksi,
					keterangan : keterangan,
					namafile : namafile,
					type : type,
					userfile : namafile
				},
				success: function(ajaxData) {
					console.log(ajaxData);
					// var dt = JSON.parse(ajaxData);
					// $("#tabelupload tbody tr").remove();
					// $("#tabelupload tbody").append(dt.dtview);
					},
				error: function(ajaxData) {
					swal('Simpan Data Gagal');
				}
			});
		}

</script>
