<div class="col-md-12 mb-2" style="border: 0px solid #000;">
	<canvas id="myCanvas" width="500" height="300"></canvas>
	<button onclick="undo()">Undo</button>
	<button onclick="saveCanvasToDatabase()">Simpan Gambar</button>
</div>
<div class="form-group row col-spacing-row">
	<label class="col-spacing-row">Riwayat Penyakit Sebelumnya / Keluarga</label>
</div>
<div class="form-group row col-spacing-row">
	<div class="col-md-4">
		<textarea rows="3" name="riwayat" id="riwayat"
			class="form-control"><?php echo $dtasawalrajal->keluhanutama; ?></textarea>
	</div>
</div>


<script>
  var canvas = document.getElementById("myCanvas");
  var ctx = canvas.getContext("2d");
  var painting = false;
  var backgroundImg = new Image();
  var strokes = [];

//   backgroundImg.src = "../../assets/image/rm/bodyfull.jpeg";
  backgroundImg.src = "../../assets/image/rm/fisio.png";

  backgroundImg.onload = function () {
    ctx.drawImage(backgroundImg, 0, 0, canvas.width, canvas.height);
  };




// fetch('<?php echo site_url("canvascontroller/getBackgroundImage"); ?>')
//         .then(response => response.json())
//         .then(data => {
//             // Menggunakan URL gambar dari respons server
//             backgroundImg.src = data.backgroundImage;
// 			console.log(backgroundImg.src);
// 			console.log('URL Gambar:', backgroundImg.src);
// 			// document.getElementById("gambarBase64").src = dataGambarBase64;
// 			// document.getElementById("myCanvas").src = dataGambarBase64;


//             backgroundImg.onload = function () {
//                 ctx.drawImage(backgroundImg, 0, 0, canvas.width, canvas.height);
//             };
//         })
//         .catch(error => {
//             console.error('Gagal mengambil data gambar dari server:', error);
//         });


  canvas.addEventListener("mousedown", function (e) {
    painting = true;
    draw(e);
  });

  canvas.addEventListener("mouseup", function () {
    painting = false;
    ctx.beginPath();
    saveStroke();
  });

  canvas.addEventListener("mousemove", function (e) {
    if (!painting) return;
    draw(e);
  });

  function draw(e) {
    ctx.lineWidth = 5;
    ctx.lineCap = "round";
    ctx.strokeStyle = "red";

    ctx.lineTo(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top);
    ctx.stroke();
    ctx.beginPath();
    ctx.moveTo(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top);
  }

  function saveStroke() {
    var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
    strokes.push(imageData);
  }

  function undo() {
    if (strokes.length > 1) {
      strokes.pop();
      ctx.putImageData(strokes[strokes.length - 1], 0, 0);
    } else if (strokes.length === 1) {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      ctx.drawImage(backgroundImg, 0, 0, canvas.width, canvas.height);
      strokes = [];
    }

	
  }