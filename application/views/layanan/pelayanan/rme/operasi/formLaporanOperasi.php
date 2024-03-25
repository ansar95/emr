<link rel="stylesheet" href="../../assets/template_baru/dist/vendors/icheck/skins/all.css">
<div class="card">
	<div class="col-12 mt-4">
		<div class="w-sm-100 mr-auto"><h6 class="mb-0" style="color: red;">LAPORAN OPERASI</h6></div>
	</div>
	<div class="col-md-12">
		<div class="form-group row col-spacing-row mt-4">
			<label class="col-md-1 col-form-label">Ahli Bedah</label>
			<div class="col-md-6">
				<select class="form-control" style="width: 100%;" name="kode_dokter_opr" id="kode_dokter_opr">
					<option value="">--Pilih--</option>
                    <?php
                    foreach ($dtdokter as $row) {
                    ?>
                        <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dtlaporanopr->kode_dokter_opr == $row->kode_dokter) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->nama_dokter; ?></option>
                    <?php
                    }
                    ?>
				</select>
			</div>
		</div>
	</div> 
	<div class="col-md-12">
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Ahli Anastesi</label>
			<div class="col-md-6">
				<select class="form-control" style="width: 100%;" name="kode_anastesi" id="kode_anastesi">
					<option value="">--Pilih--</option>
                    <?php
                    foreach ($dtdokter as $row) {
                    ?>
                        <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dtlaporanopr->kode_anastesi == $row->kode_dokter) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->nama_dokter; ?></option>
                    <?php
                    }
                    ?>
				</select>
			</div>
		</div>
	</div> 

	<div class="col-md-12">
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Asisten Operasi</label>
			<div class="col-md-6">
				<select class="form-control" style="width: 100%;" name="kode_asisten" id="kode_asisten">
					<option value="">--Pilih--</option>
                    <?php
                    foreach ($dtdokterasisten as $row) {
                    ?>
                        <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dtlaporanopr->kode_asisten == $row->kode_dokter) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->nama_dokter; ?></option>
                    <?php
                    }
                    ?>
				</select>
			</div>
		</div>
	</div> 
	<div class="col-md-12">
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Penata Anastesi</label>
			<div class="col-md-6">
				<select class="form-control" style="width: 100%;" name="kode_penata" id="kode_penata">
					<option value="">--Pilih--</option>
                    <?php
                    foreach ($dtpenata as $row) {
                    ?>
                        <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dtlaporanopr->kode_penata == $row->kode_dokter) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->nama_dokter; ?></option>
                    <?php
                    }
                    ?>
				</select>
			</div>
		</div>
	</div> 
	<div class="col-md-12">
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Jenis Anastesi</label>
			<div class="col-md-10">
				<input type="text" id="jenis_anastesi" name="jenis_anastesi" class="form-control border-secondary" value="<?php echo $dtlaporanopr->jenis_anastesi; ?>">
			</div>
		</div>
	</div> 
	<div class="col-md-12">
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Nama Perawat</label>
			<div class="col-md-6">
				<select class="form-control" style="width: 100%;" name="kode_perawat" id="kode_perawat">
					<option value="">--Pilih--</option>
                    <?php
                    foreach ($dtperawat as $row) {
                    ?>
                        <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dtlaporanopr->kode_perawat == $row->kode_dokter) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->nama_dokter; ?></option>
                    <?php
                    }
                    ?>
				</select>
			</div>
		</div>
	</div> 
	<div class="col-md-12">
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Nama Omloop</label>
			<div class="col-md-6">
				<select class="form-control" style="width: 100%;" name="kode_omlop" id="kode_omlop">
					<option value="">--Pilih--</option>
                    <?php
                    foreach ($dtperawat as $row) {
                    ?>
                        <option value="<?php echo $row->kode_dokter; ?>" <?php if ($dtlaporanopr->kode_omlop == $row->kode_dokter) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $row->nama_dokter; ?></option>
                    <?php
                    }
                    ?>
				</select>
			</div>
		</div>
	</div> 
	<div class="col-md-12">
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Jenis Operasi</label>
			<div class="col-md-6">
				<select class="form-control" style="width: 100%;" name="jenis_operasi" id="jenis_operasi">
					<option value='0' <?php if ($dtlaporanopr->jenis_operasi == '0') {echo "selected";} ?>>--Pilih--</option>
					<option value="1" <?php if ($dtlaporanopr->jenis_operasi == '1') {echo "selected";} ?>>Besar</option>
					<option value="2" <?php if ($dtlaporanopr->jenis_operasi == '2') {echo "selected";} ?>>Sedang</option>
					<option value="3" <?php if ($dtlaporanopr->jenis_operasi == '3') {echo "selected";} ?>>Kecil</option>
					<option value="4" <?php if ($dtlaporanopr->jenis_operasi == '4') {echo "selected";} ?>>Khusus</option>
					<option value="5" <?php if ($dtlaporanopr->jenis_operasi == '5') {echo "selected";} ?>>Emergency</option>
				</select>
			</div>
		</div>
	</div> 
	<div class="col-md-12">
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Diag. Pre Operasi</label>
			<div class="col-md-10">
				<input type="text" id="diagpreoperasilap" name="diagpreoperasilap" class="form-control border-secondary" value="<?php echo $dtlaporanopr->diagpreoperasi; ?>">
			</div>
		</div>
	</div> 
	<div class="col-md-12">
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Diag. Post Operasi</label>
			<div class="col-md-10">
				<input type="text" id="diagnosapostlap" name="diagnosapostlap" class="form-control border-secondary" value="<?php echo $dtlaporanopr->diagnosapost; ?>">
			</div>
		</div> 
	</div> 
	<div class="col-md-12">
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Jaringan yang di eksisi/insisi</label>
			<div class="col-md-10">
				<textarea class="form-control border-secondary" id="jaringan" name="jaringan" rows="5"><?php echo $dtlaporanopr->jaringan?></textarea>
			</div>
		</div>
	</div> 
	<div class="col-md-12">
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Pemeriksaan PA</label>
			<div class="col-md-9">
				<label><input type="radio" class="state iradio_square-red" id="pa1" name="pa" value="1" <?php if ($dtlaporanopr->pa == 1) {echo "checked";} ?>> Ya</label>
				<label><input type="radio" class="state iradio_square-red ml-3" id="pa2" name="pa" value="2" <?php if ($dtlaporanopr->pa == 2) {echo "checked";} ?>> Tidak</label>
			</div>
		</div> 
	</div> 
	<div class="col-md-12">
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Nama Tindakan</label>
			<div class="col-md-10">
				<textarea class="form-control border-secondary" id="tindakan" name="tindakan" rows="3"><?php echo $dtlaporanopr->tindakan?></textarea>
			</div>
		</div>
	</div> 
	<div class="col-md-12">
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Tanggal Operasi</label>
			<div class="col-md-2">
				<input type="date" id="tgloperasi" name="tgloperasi" class="form-control border-secondary" value="<?php echo $dtlaporanopr->tgloperasi; ?>">
			</div>
			<label class="col-md-1 col-form-label">Jam Mulai</label>
			<div class="col-md-2">
				<input type="time" id="jamoperasimulai" name="jamoperasimulai" class="form-control border-secondary" value="<?php echo $dtlaporanopr->jamoperasimulai; ?>">
			</div>
			<label class="col-md-1 col-form-label">Jam Selesai</label>
			<div class="col-md-2">
				<input type="time" id="jamoperasiselesai" name="jamoperasiselesai" class="form-control border-secondary" value="<?php echo $dtlaporanopr->jamoperasiselesai; ?>">
			</div>
		</div> 
	</div> 
	<div class="col-md-12">
		<div class="form-group row col-spacing-row mt-2">
			<label class="col-md-1 col-form-label">Laporan Operasi</label>
			<div class="col-md-10">
				<textarea class="form-control border-secondary" id="laporanoperasi" name="laporanoperasi" rows="12"><?php echo $dtlaporanopr->laporanoperasi?></textarea>
			</div>
		</div>
	</div> 
	<div class="col-md-12 text-left mt-4">
		<button onclick="savelaporanoperasi()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
		<button onclick="cetaklaporanoperasi()" class="btn btn-secondary" data-bs-dismiss="modal">Cetak</button>
	</div>
		<br>
		<br>
</div>

<script>
	
	$("#kode_dokter_opr").select2();	
		$("#kode_asisten").select2();	
		$("#kode_perawat").select2();	
		$("#kode_omlop").select2();	
		$("#kode_anastesi").select2();	
		$("#kode_penata").select2();	
		$("#jenis_operasi").select2();	
		
function kuranglengkap() {
	$.notify("Data Kurang Lengkap", "error");
}


function savelaporanoperasi() {
		var no_rm = document.getElementById("no_rm").value;
		var notransaksi = document.getElementById("notransaksi").value;
		var notransaksi_IN = document.getElementById("notransaksi_IN").value;
		  
		var kode_dokter_opr = document.getElementById("kode_dokter_opr").value;
		var nama_dokter_opr = $("#kode_dokter_opr option:selected").text();

		var kode_asisten = document.getElementById("kode_asisten").value;
		var nama_asisten = $("#kode_asisten option:selected").text();

		var kode_perawat = document.getElementById("kode_perawat").value;
		var nama_perawat = $("#kode_perawat option:selected").text();

		var kode_omlop = document.getElementById("kode_omlop").value;
		var nama_omlop = $("#kode_omlop option:selected").text();

		var kode_anastesi = document.getElementById("kode_anastesi").value;
		var nama_anastesi = $("#kode_anastesi option:selected").text();

		var kode_penata = document.getElementById("kode_penata").value;
		var nama_penata = $("#kode_penata option:selected").text();

		var jenis_anastesi = document.getElementById("jenis_anastesi").value;
		var jenis_operasi = document.getElementById("jenis_operasi").value;
		var jaringan = document.getElementById("jaringan").value;
		var pa = $("input[name='pa']:checked").val();
		var tindakan = document.getElementById("tindakan").value;
		var tgloperasi = document.getElementById("tgloperasi").value;
		var jamoperasimulai = document.getElementById("jamoperasimulai").value;
		var jamoperasiselesai = document.getElementById("jamoperasiselesai").value;
		var laporanoperasi = document.getElementById("laporanoperasi").value;

		var diagpreoperasi = document.getElementById("diagpreoperasilap").value;
		var diagnosapost = document.getElementById("diagnosapostlap").value;

		$.ajax({
			url: "<?php echo site_url(); ?>/rme/savelaporanoperasi",
			type: "GET",
			data: {
				no_rm: no_rm,
				notransaksi: notransaksi,
				notransaksi_IN: notransaksi_IN,

				kode_dokter_opr: kode_dokter_opr,
				nama_dokter_opr: nama_dokter_opr,
				kode_asisten: kode_asisten,
				nama_asisten: nama_asisten,
				kode_perawat: kode_perawat,
				nama_perawat: nama_perawat,
				kode_omlop: kode_omlop,
				nama_omlop: nama_omlop,
				kode_anastesi: kode_anastesi,
				nama_anastesi: nama_anastesi,
				jenis_anastesi : jenis_anastesi,
				kode_penata: kode_penata,
				nama_penata: nama_penata,
				jenis_operasi : jenis_operasi,
				jaringan : jaringan,
				pa : pa,
				tindakan : tindakan,
				tgloperasi : tgloperasi,
				jamoperasimulai : jamoperasimulai,
				jamoperasiselesai : jamoperasiselesai,
				laporanoperasi : laporanoperasi,

				diagpreoperasi : diagpreoperasi,
				diagnosapost : diagnosapost
			},
			success: function (ajaxData) {
				swal('Simpan Data Berhasil');
			},
			error: function (ajaxData) {
				swal('Simpan Data Gagal');
			}
		});
	}


	function cetaklaporanoperasi() {
		var no_rm = document.getElementById("no_rm").value;
		var notransaksi = document.getElementById("notransaksi").value;
		var notransaksi_IN = document.getElementById("notransaksi_IN").value;
		// var kode_dokter = document.getElementById("kode_dokter").value;
        window.open("<?php echo site_url();?>/rme/cetakLaporanOperasi/"+no_rm+"/"+notransaksi+"/"+notransaksi_IN+"", '_blank');
    }


	</script>


