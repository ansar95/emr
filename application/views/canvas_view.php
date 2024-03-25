<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Canvas Drawing</title>
    <style>
        #canvas {
            border: 1px solid #000;
        }
    </style>
</head>
<body>

    <h2>Canvas Drawing</h2>

    <!-- Canvas untuk coretan -->
    <canvas id="canvas" width="500" height="500"></canvas>

    <!-- Tombol Simpan -->
    <button onclick="saveDrawing1()">Simpan</button>

    <!-- Elemen gambar untuk menampilkan hasil gambar yang disimpan -->
    <img id="savedImage" style="display: none;">


    <script src="<?php echo base_url();?>/assets/jquery_web/jquery-3.6.4.min.js"></script>
    <!-- <script src="<?php echo base_url();?>assets/template_baru/dist/vendors/jquery/jquery-3.3.1.min.js"></script> -->

    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    <script>
        $(document).ready(function() {
            var canvas = document.getElementById('canvas');
            var context = canvas.getContext('2d');
            var isDrawing = false;

            canvas.addEventListener('mousedown', function(e) {
                isDrawing = true;
                context.beginPath();
                context.moveTo(e.clientX - canvas.offsetLeft, e.clientY - canvas.offsetTop);
            });

            canvas.addEventListener('mousemove', function(e) {
                if (isDrawing) {
                    context.lineTo(e.clientX - canvas.offsetLeft, e.clientY - canvas.offsetTop);
                    context.stroke();
                }
            });

            canvas.addEventListener('mouseup', function() {
                isDrawing = false;
            });

            canvas.addEventListener('mouseleave', function() {
                isDrawing = false;
            });

            function saveDrawing1() {
                // Mengambil data gambar dari canvas dalam format base64
                var imageData = canvas.toDataURL('image/png');

                // Mengatur atribut src elemen gambar dengan data URL hasil gambar yang disimpan
                $('#savedImage').attr('src', imageData);

                // Menampilkan elemen gambar
                $('#savedImage').show();

                // Mengirim data gambar ke server untuk disimpan
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url("CanvasController/saveDrawing"); ?>',
                    data: { imageData: imageData },
                    dataType: 'json',
                    success: function(response) {
                        alert(response.message);
                    }
                });
            }
        });
    </script>

</body>
</html>
