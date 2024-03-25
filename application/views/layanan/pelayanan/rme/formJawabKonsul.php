
 <div class="modal-dialog modal-lg modal-dialog-centered" style="margin: 0 auto;">
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Lembar Jawab Konsul</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row col-spacing-row">
					<label class="col-md-2 col-form-label">Tanggal</label>
					<div class="col-md-3">
						<input type="date" class="form-control"  name="tanggal" id="tanggal" value="<?php echo $dtkonsulid->tanggal;?>" disabled>
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label class="col-md-2 col-form-label">Jam</label>
					<div class="col-md-3">
						<input type="time" class="form-control"  name="jam" id="jam" value="<?php echo $dtkonsulid->jam;?>" disabled>
					</div>
				</div>
                <div class="form-group row col-spacing-row">
					<label class="col-md-2 col-form-label">Dokter</label>
					<div class="col-md-6">
						<input type="text" class="form-control"  name="kode_dokter" id="kode_dokter" value="<?php echo $dtkonsulid->nama_dokter;?>" disabled>
					</div>
				</div>
            <div class="form-group row col-spacing-row">
				<label class="col-md-6 col-form-label">Isi Konsul</label>
			</div>
            <div class="col-md-12">
				<textarea rows="7" name="konsul" id="konsul" class="form-control" readonly><?php echo $dtkonsulid->konsul;?></textarea>
			</div>
			<div class="form-group row col-spacing-row mt-3">
				<label class="col-md-6 col-form-label">Isi Jawaban Konsul</label>
			</div>
            <div class="form-group row col-spacing-row">
					<label class="col-md-2 col-form-label">Tanggal</label>
					<div class="col-md-3">
						<input type="date" class="form-control"  name="tanggaljawab" id="tanggaljawab" value="<?php echo $dtkonsulid->tanggaljawab;?>">
					</div>
				</div>
				<div class="form-group row col-spacing-row">
					<label class="col-md-2 col-form-label">Jam</label>
					<div class="col-md-3">
						<input type="time" class="form-control"  name="jamjawab" id="jamjawab" value="<?php echo $dtkonsulid->jamjawab;?>">
					</div>
				</div>
            <div class="form-group row col-spacing-row">
				<label class="col-md-6 col-form-label">Jawaban</label>
			</div>
            <div class="col-md-12">
				<textarea rows="7" name="jawaban" id="jawaban" class="form-control"><?php echo $dtkonsulid->jawaban;?></textarea>
			</div>
            <input type="hidden" class="form-control" id="idnya" value="<?php echo $dtkonsulid->id;?>">

            <div class="form-group row mt-2"> 
                <div class="col-6 text-left">
                    <button onclick="saveisikonsul()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                    <!-- <button onclick="saveKonsul()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button> -->
                </div>
                <div class="col-6 text-right">
                    <!-- <button onclick="hapusisikonsul('<?php echo $dtkonsulid->id;?>')" class="btn btn-danger" data-bs-dismiss="modal">Hapus</button> -->
                    <!-- <button onclick="saveKonsul()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button> -->
                </div>
            </div>
        </div>
    </div>
</div>


    <script>
        $(document).ready(function() {
            $('#kode_dokter_tujuan').select2();
        });

        function modalform() {
            $("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        }

        function modalformtutup() {
            $(".overlay").remove();
        }

        function tutupmodal() {
            $(function () {
                $("#formmodal").modal("toggle");
            });
        }

        function kuranglengkap() {
            $.notify("Data Kurang Lengkap", "error");
        }


        function saveisikonsul() {
            modalform();
            var id = document.getElementById("idnya").value;
            var no_rm = document.getElementById("no_rm").value;
            var kode_dokter = document.getElementById("kode_dokter").value;
            var nama_dokter = document.getElementById("nama_dokter").value;
            var notransaksi = document.getElementById("notransaksi").value;
            var kode_unit = document.getElementById("kode_unit").value;
            var nama_unit = document.getElementById("nama_unit").value;
            var tanggal = document.getElementById("tanggal").value;
            var jam = document.getElementById("jam").value;
            var konsul = document.getElementById("konsul").value;
            var kode_dokter_tujuan = $("#kode_dokter_tujuan").val();
			var nama_dokter_tujuan = $("#kode_dokter_tujuan option:selected").text();
            var jawaban = document.getElementById("jawaban").value;
            var tanggaljawab = document.getElementById("tanggaljawab").value;
            var jamjawab = document.getElementById("jamjawab").value;
            $.ajax({
                url: "<?php echo site_url(); ?>/rme/savejawabkonsulranap",
                type: "GET",
                data: {
                    id : id,
                    no_rm : no_rm,
                    kode_dokter : kode_dokter,
                    nama_dokter : nama_dokter,
                    notransaksi : notransaksi,
                    kode_unit : kode_unit,
                    nama_unit : nama_unit,
				    tanggal : tanggal,
				    jam : jam,
				    konsul : konsul,
				    kode_dokter_tujuan : kode_dokter_tujuan,
				    nama_dokter_tujuan : nama_dokter_tujuan,
				    jawaban : jawaban,
                    tanggaljawab : tanggaljawab,
				    jamjawab : jamjawab
                },
                success: function(ajaxData) {
                    console.log(ajaxData);
				    var dt = JSON.parse(ajaxData);
                    $("#tabellembarkonsul tbody tr").remove();
                    $("#tabellembarkonsul tbody").append(dt.dtview);
                    modalformtutup();
                    tutupmodal();
                    },
                error: function(ajaxData) {
                    modalformtutup();
                    // gagalalert();
                }
            });
        }

        function saveJawabanKonsulxx() {
            modalform();
            var id = document.getElementById("idnya").value;
            var kode_dokter_jawab = document.getElementById("kode_dokter").value;
            var nama_dokter_jawab = document.getElementById("nama_dokter").value;
            var tanggal = document.getElementById("tgl_masuk").value;
            var jawaban = document.getElementById("jawaban").value;
            $.ajax({
                url: "<?php echo site_url(); ?>/rme/saveJawabKonsul",
                type: "GET",
                data: {
                    id : id,
                    kode_dokter_jawab : kode_dokter,
                    nama_dokter_jawab : nama_dokter,
				    tanggal : tanggal,
				    jawaban : jawaban
                },
                success: function(ajaxData) {
                    console.log(ajaxData);
				    var dt = JSON.parse(ajaxData);
                    $("#tabellembarkonsul tbody tr").remove();
                    $("#tabellembarkonsul tbody").append(dt.dtview);
                    modalformtutup();
                    tutupmodal();
                    },
                error: function(ajaxData) {
                    modalformtutup();
                    // gagalalert();
                }
            });
        }

        function hapusisikonsul(id) {
            $.confirm({
                title: 'Hapus Data',
                // content: 'Yakin menghapus ' + trim(nama_obat) + '?',
                content: 'Yakin menghapus data ini ?',
                buttons: {
                    batal: {
                        text: 'Batal',
                        btnClass: 'btn-red',
                        action: function(){

                        }
                    },
                    hapus: {
                        text: 'Hapus',
                        btnClass: 'btn-blue',
                        keys: ['enter'],
                        action: function(){
                            var no_rm = document.getElementById("no_rm").value;
							var kode_dokter = document.getElementById("kode_dokter").value;
                            var kode_unit = document.getElementById("kode_unit").value;
                            var notransaksi = document.getElementById("notransaksi").value;
							$.ajax({ 
								url: "<?php echo site_url(); ?>/rme/hapusisikonsulranap",
								type: "GET",
								data: {
									id :id,
                                    kode_unit : kode_unit,
                                    no_rm : no_rm,
                                    notransaksi : notransaksi
								},
								success: function(ajaxData) {
                                    console.log(ajaxData);
                                    var dt = JSON.parse(ajaxData);
                                    $("#tabellembarkonsul tbody tr").remove();
                                    $("#tabellembarkonsul tbody").append(dt.dtview);
                                    modalformtutup();
                                    tutupmodal();
                                    },
								error: function(ajaxData) {
									modalformtutup();
									// gagalalert();
								}
							});
                        }
                    }
                }
            });
    	}

    </script>
