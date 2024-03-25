<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css">
<script>
    function redirectToFile(fileName) {
        // var fileURL = "../../assets/upload/" + fileName;
        var fileURL = "<?php echo base_url();?>/assets/upload/" + fileName;
		window.open(fileURL, '_blank');
    }
</script>

<div class="col-12 mt-4 ml-3">
    <!-- Menggunakan form_open_multipart() untuk membuka form -->
    <?php echo form_open_multipart('controller/do_upload'); ?>
    
    <!-- Input file untuk mengunggah file -->
    <input type="file" id="userfile" name="userfile" accept=".pdf, .jpeg, .jpg, .mp4, .png">
    
    <!-- Input untuk keterangan file -->
    <label for="nama_file">Keterangan:</label>
    <input type="text" name="keterangan" />
    
    <!-- Input tersembunyi untuk menyimpan nomor rekam medis dan nomor transaksi -->
    <input type="hidden" name="no_rm" value=<?php echo $dtno_rm; ?> />
    <input type="hidden" name="notransaksi" value=<?php echo $dtnotransaksi; ?> />

    <!-- Tombol submit untuk mengirimkan form -->
    <input type="submit" value="Upload" />
    
    <!-- Menutup form setelah selesai -->
    <?php echo form_close(); ?>
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
