<!DOCTYPE html>
<html>
<head>
    <style>
        canvas {
            border: 1px solid #000;
        }
    </style>
</head>
<body>
    <canvas id="drawingCanvas" width="800" height="400"></canvas>
    <button id="saveButton">Simpan Gambar</button>

    <script>
        const canvas = document.getElementById('drawingCanvas');
        const context = canvas.getContext('2d');
        context.strokeStyle = 'red'; // Atur warna garis ke merah
        context.lineWidth = 5; // Atur ketebalan garis ke 5px
        let isDrawing = false;
        let lastX = 0;
        let lastY = 0;

        // Fungsi untuk menggambar gambar latar belakang
        function drawBackground() {
            const backgroundImage = new Image();
            backgroundImage.src = '../../assets/image/rm/fisio.png'; // Ganti dengan URL gambar latar belakang Anda
            backgroundImage.onload = function () {
                context.drawImage(backgroundImage, 0, 0, canvas.width, canvas.height);
            };
        }

        // Fungsi untuk memulai menggambar
        function startDrawing(e) {
            isDrawing = true;
            [lastX, lastY] = [e.clientX - canvas.offsetLeft, e.clientY - canvas.offsetTop];
        }

        // Fungsi untuk menggambar garis
        function draw(e) {
            if (!isDrawing) return;
            context.lineJoin = 'round';
            context.lineCap = 'round';
            context.beginPath();
            context.moveTo(lastX, lastY);
            context.lineTo(e.clientX - canvas.offsetLeft, e.clientY - canvas.offsetTop);
            context.stroke();
            [lastX, lastY] = [e.clientX - canvas.offsetLeft, e.clientY - canvas.offsetTop];
        }

        // Fungsi untuk menghentikan menggambar
        function stopDrawing() {
            isDrawing = false;
        }

        // Fungsi untuk menyimpan gambar
        function saveCanvas() {
            const dataURL = canvas.toDataURL('image/png'); // Konversi canvas ke data URL
            const a = document.createElement('a');
            a.href = dataURL;
            a.download = 'gambar_canvas.png'; // Nama file yang akan diunduh
            a.click();
        }

        // Memuat gambar latar belakang saat halaman dimuat
        window.addEventListener('load', drawBackground);

        canvas.addEventListener('mousedown', startDrawing);
        canvas.addEventListener('mousemove', draw);
        canvas.addEventListener('mouseup', stopDrawing);
        canvas.addEventListener('mouseout', stopDrawing);

        const saveButton = document.getElementById('saveButton');
        saveButton.addEventListener('click', saveCanvas);
    </script>
</body>
</html>
