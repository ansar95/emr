<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
  /* Mengatur ukuran gambar dalam opsi menjadi 10% */
  .select2-container .select2-selection__rendered img.img-select {
    width: 10%;
    height: auto;
  }
</style>

<div class="container mt-5">
    <div class="form-group">
        <h1>Pilih Gambar:</h1>
        <select id="gambarSelect" class="form-control select2" style="width: 200px;" >
            <option value="gambar3" data-image="<?php echo site_url();?>/../assets/image/rm/fisio_kecil.png"></option>
            <option value="gambar1" data-image="<?php echo site_url();?>/../assets/image/rm/fisio.png">Pilihan 1</option>
            <option value="gambar2" data-image="<?php echo site_url();?>/../assets/image/rm/nyeri.png">Pilihan 2</option>

        </select>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#gambarSelect').select2({
        templateResult: formatGambar, // Fungsi untuk menampilkan gambar dalam opsi
        templateSelection: formatGambarSelection, // Fungsi untuk menampilkan gambar yang dipilih
        escapeMarkup: function (markup) { return markup; }
    });

    // Fungsi untuk menampilkan gambar dalam opsi
    function formatGambar(gambar) {
        if (!gambar.id) {
            return gambar.text;
        }
        var $gambar = $(
            '<span><img src="' + gambar.element.getAttribute('data-image') + '" class="img-select" /> ' + gambar.text + '</span>'
        );
        return $gambar;
    }

    // Fungsi untuk menampilkan gambar yang dipilih
    function formatGambarSelection(gambar) {
        return gambar.text;
    }
});
</script>
