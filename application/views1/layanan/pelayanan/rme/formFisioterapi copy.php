<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css">

<div class="card">
	<div class="col-12 mt-4 ml-3">
		<div class="w-sm-100 mr-auto">
			<h6 class="mb-0" style="color: navy;">FISIOTERAPI</h6>
		</div>
	</div>
	<div class="col-12 mt-2">
		<div class="row">
			<div class="col-2" style="background-color: white;">
				<div class="card border-0">
					<div class="card-body">
						<label style="color: #59051E; font-size: 14px; font-weight: bold;">+ Nomor Lembar</label>
						<br>
						<button onclick="tambahlembar()" class="btn btn-sm btn-secondary ml-auto" id="tambahlembarbaru"
							name="tambahlembarbaru" style="background-color: #FF5733; color: white;">Tambah</button>
					</div>
					<div class="table-responsive mt-2 table-hover table-scrollable" id="tabellembardiv"
						style="max-height: 400px; overflow-y: auto;">
						<table class="table" id="tabellembar">
							<tbody>
								<?php
								if ($dtlambarfisio == NULL) {
									?>
									<tr>
										<td colspan="100%" class="text-center">
											Belum Ada Data
										</td>
									</tr>
								<?php } else {
									$no = 1;
									$jmlt = 0;
									foreach ($dtlambarfisio as $row) {
										?>
										<tr
											onclick="bukalembarfisio_nolembar('<?php echo $row->nolembar; ?>')">
											<td width="10%" valign="top">
											</td>
											<td width="90%" valign="top">
												<?php
												echo '<strong style="color: Navy; font-size: 13px;">' . tanggaldua($row->tgllembar) . ' | ' . $row->nolembar . '</strong><br>';
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
			</div>
			<div class="col-4" style="background-color: white;">
				<div class="card border-0">
					<div class="card-body">
						<label style="color: bluw; font-size: 14px; font-weight: bold;">+ Lembar SOAP</label>
					</div>
					<div class="col-md-12 mb-2" style="border: 0px solid #000;">
						<canvas id="myCanvas" width="500" height="300" ></canvas>
						<button onclick="undo()">Undo</button>
						<button onclick="saveCanvasToDatabase()">Simpan Gambar</button>
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-spacing-row">Riwayat Penyakit Sebelumnya / Keluarga</label>
					</div>		
					<div class="form-group row col-spacing-row">
						<div class="col-md-4">
							<textarea rows="3" name="riwayat" id="riwayat" class="form-control"><?php echo $dtasawalrajal->keluhanutama;?></textarea>
						</div>
					</div>

				</div>
			</div>
			<div class="col-6" style="background-color: white;">
				<div class="card border-0">
					<div class="card-body">
						<label style="color: green; font-size: 14px; font-weight: bold;">+ Lembar Pemeriksaan</label>
						<button onclick="tambahpemeriksaan()" class="btn btn-sm btn-secondary ml-auto"
							id="tambahpemeriksaan" name="tambahpemeriksaan"
							style="background-color: #FF5733; color: white;">Tambah</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
</div>


<script>

	function tambahlembar() {
		var no_rm = document.getElementById("no_rm").value;
		var notransaksi = document.getElementById("notransaksi").value;
		var kode_dokter = document.getElementById("kode_dokter").value;

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/addlembarfisio",
			type: "GET",
			data: {
				no_rm: no_rm,
				notransaksi: notransaksi,
				kode_dokter: kode_dokter,
			},
			success: function (ajaxData) {
				console.log(ajaxData);
				var dt = JSON.parse(ajaxData);
				$("#tabellembar tbody tr").remove();
				$("#tabellembar tbody").append(dt.dtview);
			},
			error: function (ajaxData) {
				console.log(ajaxData);
			}
		});
	}

</script>



<!-- ============ GAMBAR ========= -->
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
