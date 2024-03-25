<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css">

<div class="card">
	<div class="col-12 mt-4 ml-3">
		<div class="w-sm-100 mr-auto">
			<h6 class="mb-0" style="color: navy;">PARTOGRAPH</h6>
		</div>
	</div>
	<div class="col-12 mt-2">
		<div class="row">
			<div class="col-2" style="background-color: white;">
				<div class="card border-0">
					<div class="card-body">
						<label style="color: #59051E; font-size: 14px; font-weight: bold;">+ Tambahkan Gambar</label>
						<br>
						<button onclick="tambahlembar()" class="btn btn-sm btn-secondary ml-auto" id="tambahlembarbaru"
							name="tambahlembarbaru" style="background-color: #FF5733; color: white;">Upload SCAN Partograp</button>
					</div>
					<!-- <div class="table-responsive mt-2 table-hover table-scrollable" id="tabellembardiv"
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
					</div> -->
				</div>
			</div>
			<div class="col-4" style="background-color: white;">
				<div class="card border-0">
					<div class="col-md-12 mb-2" style="border: 0px solid #000;">
						<canvas id="myCanvas" width="1200" height="1400"></canvas>
						<button onclick="undo()">Undo</button>
						<button onclick="saveCanvasToDatabase()">Simpan Gambar</button>
					</div>
					<input type="hidden" id="nolembar">
				</div>
				<div class="form-group row col-spacing-row mt-3">
					<div class="col-6 text-left">
						<button onclick="savesoapfisio()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
					</div>
					<div class="col-6">
						<!-- <button onclick="Batal()" class="btn btn-danger">Batal Save</button> -->
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

	function bukalembarfisio_nolembar(nolembar) {
		$.ajax({
			url: "<?php echo site_url(); ?>/rme/bukalembarfisio",
			type: "GET",
			data: {
				nolembar: nolembar
			},
			success: function (ajaxData) {
				console.log(ajaxData);
				var dt = JSON.parse(ajaxData);
				

				var canvas = document.getElementById("myCanvas");
				var ctx = canvas.getContext("2d");
				var img = new Image();

				clearCanvas();

				img.src = dt.dtlambarsoapfisio.gambar;
				if (dt.dtlambarsoapfisio.gambar && dt.dtlambarsoapfisio.gambar !== '') {
					img.src = dt.dtlambarsoapfisio.gambar;
				} else {
					img.src = "../../assets/image/rm/partograph.jpeg";
				}

				img.onload = function () {
					ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
				};

				$("#vitalsign").prop("disabled", false);
				$("#riwayat").prop("disabled", false);
				$("#subjek").prop("disabled", false);
				$("#objek").prop("disabled", false);
				$("#asesmen").prop("disabled", false);
				$("#plan").prop("disabled", false);
				$("#diagfisio").prop("disabled", false);
			},
			error: function (ajaxData) {
				console.log(ajaxData);
			}
		});
	}

	function savesoapfisio() {
		var nolembar = document.getElementById("nolembar").value;
		var vitalsign = document.getElementById("vitalsign").value;
		var riwayat = document.getElementById("riwayat").value;
		var subjek = document.getElementById("subjek").value;
		var objek = document.getElementById("objek").value;
		var asesmen = document.getElementById("asesmen").value;
		var plan = document.getElementById("plan").value;
		var diagfisio = document.getElementById("diagfisio").value;
		$.ajax({
			url: "<?php echo site_url(); ?>/rme/simpansoapfisio",
			type: "GET",
			data: {
				nolembar: nolembar,
				vitalsign : vitalsign,
				riwayat : riwayat,
				subjek : subjek,
				objek : objek,
				asesmen : asesmen,
				plan : plan,
				diagfisio : diagfisio
			},
			success: function (ajaxData) {
				$("#vitalsign").prop("disabled", true);
				$("#riwayat").prop("disabled", true);
				$("#subjek").prop("disabled", true);
				$("#objek").prop("disabled", true);
				$("#asesmen").prop("disabled", true);
				$("#plan").prop("disabled", true);
				$("#diagfisio").prop("disabled", true);
			},
			error: function (ajaxData) {
				console.log(ajaxData);
			}
		});
	}


	
	function bukafisioperiksa(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/rme/bukafisioperiksa",
				type: "GET",
				data: {
					id: id
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
					modaldetailtutup();
				},
				error: function (ajaxData) {
					$.notify("Gagal Memproses Data", "error");
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
				ctx.clearRect(0, 0, canvas.width, canvas.height);
				ctx.drawImage(backgroundImg, 0, 0, canvas.width, canvas.height);
				ctx.putImageData(strokes[strokes.length - 1], 0, 0);
			} else if (strokes.length === 1) {
				ctx.clearRect(0, 0, canvas.width, canvas.height);
				ctx.drawImage(backgroundImg, 0, 0, canvas.width, canvas.height);
				strokes = [];
			}
        }

        function saveCanvasToDatabase() {
            var canvasData = canvas.toDataURL(); // Convert canvas to data URL
			var nolembar = document.getElementById("nolembar").value;

            // Send image data to the server using AJAX
            $.ajax({
                type: "POST",
				url: "<?php echo site_url(); ?>/rme/saveCanvasToDatabase",
                data: { 
					canvasData: canvasData,
					nolembar: nolembar
				 },
                success: function(response) {
                    console.log(response); // Display response from the server
                }
            });
        }
		
		function clearCanvas() {
			ctx.clearRect(0, 0, canvas.width, canvas.height);
		}
    </script>

    <!-- Make sure to include jQuery library -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->






