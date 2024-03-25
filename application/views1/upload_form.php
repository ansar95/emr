<!-- Form untuk upload file -->
<!-- Form untuk upload file -->
<?= form_open_multipart('upload/do_upload'); ?>
    <input type="file" name="userfile" />
    <label for="nama_file">Keterangan:</label>
    <input type="text" name="keterangan" />
    <select name="jenis">
        <option value="operasi">Operasi</option>
        <option value="ranap">Ranap</option>
        <option value="rajal">Rajal</option>
        <option value="igd">IGD</option>
        <option value="igdobgin">IGD Obgin</option>
    </select>
    <input type="submit" value="Upload" />
<?= form_close(); ?>



<!-- List file yang berada di /assets/upload -->
<?php
$dir = './assets/upload/';
$files = array_diff(scandir($dir), array('..', '.'));

if (count($files) > 0) {
    echo "<h2>Daftar File:</h2>";
    echo "<ul>";
    foreach ($files as $file) {
        echo "<li><a href='" . base_url('assets/upload/' . $file) . "'>$file</a></li>";
    }
    echo "</ul>";
} else {
    echo "Tidak ada file.";
}