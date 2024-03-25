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
    <div class="row col-md-12 mt-4 ml-3">
		<div class="col-md-8">
			<div class="table-responsive table-hover table-scrollable" id="tabelupload1">
				<table class="table" id="tabelupload">
					<tbody>
						<?php
						if ($dtfile == NULL) {
						?>
							<tr>
								<td width="3%">
								</td>
								<td width="4%">
								</td>
								<td width="80%">
									Belum Ada Data
								</td>
								<td width="13%">
								</td>
							</tr>
						<?php } else {
							foreach ($dtfile as $row) {
						?>
								<tr>
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
									<td width="80%" style="font-size: 14px; vertical-align:  bottom;" onclick="redirectToFile('<?php echo $row->namafile; ?>')">
										<?php
										echo '<br>';
										echo '<strong>' . $row->keterangan . '<br></strong>';
										echo "<br>";
										?>
									</td>
									<td width="13%">
										<button onclick="hapusfileupload('<?php echo $row->id;?>')" class="btn btn-sm" id="hapusfileupload" name="hapusfileupload" style="background-color: #FFFFFF; color: #330066;"><i class="fa fa-trash" style="font-size: 14px;"></i></button>
									</td>
								</tr>
						<?php
							}
						}
						?>
					</tbody>
				</table>
				<br>
				<br>
			</div>
		</div>
		<!-- <div class="col-md-4 mt-3" style="background-color: white;"> -->
		<div class="col-md-4" style="background-color: white; border-left: 1px solid #969698;;">
			<?= form_open_multipart('upload/do_upload'); ?>
			<!-- <input type="file" id="userfile" name="userfile" /> -->
			<div class="form-group row col-spacing-row mt-3">
				<div class="col-md-12" style="color: #954706;">
					klik tombol pilih file untuk proses upload data
				</div>
				<div class="col-md-12 mt-2">
					<label class="btn btn-secondary">Pilih File <input type="file" id="userfile" style="display: none;" onchange="displayFileName()"></label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label><div id="fileNameDisplay"></div></label>
				</div>
			</div>
			<div class="form-group row col-spacing-row mt-1 mb-5">
				<label for="nama_file" class="col-md-3 col-form-label text-right">Keterangan</label>
				<div class="col-md-6">
					<input type="text" id="keterangan" name="keterangan" class="form-control" style="border-width: 1px; border-color: gray; display: inline;" onkeypress="return event.keyCode != 13;" placeholder="jelaskan isi file di sini...">

					<input type="hidden" name="no_rm" value=<?php echo $dtno_rm; ?> />
					<input type="hidden" name="notransaksi" value=<?php echo $dtnotransaksi; ?> />
				</div>
				<div class="col-1 text-left">
					<input type="button" value="Upload" class="btn btn-info" onclick="uploadFile();" />
					<!-- <button onclick="savefileupload()" id="uploadfile" class="btn btn-info" data-bs-dismiss="modal">Upload File</button> -->
				</div>
				<br>
			</div>
			<?= form_close(); ?>
		</div>
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

    function uploadFile() {
        // Mengambil nilai input dari form
        var formData = new FormData();
        formData.append('userfile', document.getElementById('userfile').files[0]);
        formData.append('keterangan', document.getElementsByName('keterangan')[0].value);
        formData.append('no_rm', document.getElementsByName('no_rm')[0].value);
        formData.append('notransaksi', document.getElementsByName('notransaksi')[0].value);


        // Mengirim data form secara asinkron menggunakan AJAX
        $.ajax({
            url: "<?php echo site_url('upload/do_upload'); ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(ajaxData) {
                // console.log(ajaxData);
				document.getElementById('userfile').value = ''; // Mengosongkan input file
            	document.getElementsByName('keterangan')[0].value = ''; // Mengosongkan input keterangan
       			var fileNameDisplay = document.getElementById('fileNameDisplay');
				fileNameDisplay.textContent = '';

				var dt = JSON.parse(ajaxData);
				$("#tabelupload tbody tr").remove();
				$("#tabelupload tbody").append(dt.dtview);
            },
            error: function(ajaxData) {
                console.log("Error:", ajaxData);
                swal('Simpan Data Gagal');
            }
        });
    }

	function hapusfileupload(id) {
	$.confirm({
		title: "Hapus File ",
		content: "Yakin akan mengahapus file ?",
		buttons: {
			batal: {
				text: "Batal",
				btnClass: "btn-blue",
				action: function () {},
			},
			hapus: {
				text: "Hapus",
				btnClass: "btn-red",
				keys: ["enter"],
				action: function () {
				var no_rm = document.getElementById("no_rm").value;
				var notransaksi = document.getElementById("notransaksi").value;
				$.ajax({
						url: "<?php echo site_url(); ?>/rme/hapusFileUpload",
						type: "GET",
						data: {
							id : id,
							no_rm : no_rm,
							notransaksi : notransaksi
						},
						success: function(ajaxData) {
							console.log(ajaxData);
							var dt = JSON.parse(ajaxData);
							$("#tabelupload tbody tr").remove();
							$("#tabelupload tbody").append(dt.dtview);
						},
						error: function(ajaxData) {
							$.notify("Gagal Menghapus  Data", "error");
						}
					});
				}		
			}
		}	
	})
}
</script>