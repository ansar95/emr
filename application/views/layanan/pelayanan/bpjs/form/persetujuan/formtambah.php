<?php
if ($formpilih == 0) {
?>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="box box-default box-solid" id="proseskotak"> -->
            <div class="modal-header p-1 pl-3 align-text-bottom">
                <b class="modal-title" id="exampleModalLabel">Isi Pengajuan</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Tanggal SEP</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="tglsepkode" id="tglsepkode" onchange="rubahtgl()" value="<?php echo $txtTanggal?>">
                                <input type="hidden" id="txttglsep" name="txttglsep" value="<?php echo $txtTanggal?>"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">No.Kartu</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="noka" id="noka" />
                            </div>
                            <div class="col-sm-2">
                                <button onclick="carinama()" class="btn btn-sm btn-success" id="cari">Cari</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama" id="nama" disabled />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Pelayanan</label>
                            <div class="col-sm-8">
                                <select class="form-control" style="width: 100%;" name="pelayanan" id="pelayanan">
                                    <option value="1">Rawat Inap</option>
                                    <option value="2">Rawat Jalan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Pilih</label>
                            <div class="col-sm-8">
                                <select class="form-control" style="width: 100%;" name="pilih" id="pilih">
                                    <option value="1">Persetujuan Tanggal Backdate</option>
                                    <option value="2">Persetujuan Fingerprint</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Keterangan</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="simpan" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
    <script>
        function modalform() {
            $("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        }

        function modalformtutup() {
            $(".overlay").remove();
        }

        function tutupmodalform() {
			$(function() {
				$('#formmodal').modal('toggle');
			});
		}

        function suksesalert() {
            $.notify("Sukses Input Data", "success");
        }

        function gagalalert() {
            $.notify("Gagal Proses Data", "error");
        }

        function kuranglengkap() {
            $.notify("Data Kurang Lengkap", "error");
        }

  
        $(document).ready(function() {
            
            $('#tglsepkode1').datepicker({
                autoclose: true
            }).datepicker("setDate", "0");

            $("#simpan").click(function(e) {
                modalform();
                var noKartu = document.getElementById("noka").value;
                var tglSep = document.getElementById("txttglsep").value;
                var jnsPelayanan = $("#pelayanan").val();
                var jnsPengajuan = $("#pilih").val();
                var keterangan = document.getElementById("keterangan").value;


                $.ajax({
                    url: "<?php echo site_url(); ?>/bpjs/persetujuanSEP",
                    type: "GET",
                    data: {
                        noKartu: noKartu,
                        tglSep: tglSep,
                        jnsPelayanan: jnsPelayanan,
                        jnsPengajuan: jnsPengajuan,
                        keterangan: keterangan
                    },
                    success: function(ajaxData) {
                        var dt = JSON.parse(ajaxData);
                        console.log(dt);
                        if (dt.stat == true) {
                           swal(dt.message);
                        } else {
                            // modalformtutup();
                           swal(dt.message);
                            
                        }
                    },
                    error: function(ajaxData) {
                        modalformtutup();
                        gagalalert();
                    }
                });
            });
        });

        
        function rubahtgl() {
            var tglsep = document.getElementById("tglsepkode").value;
            // result = tglsep.substring(6, 4)+'-'+tglsep.substring(3, 2)+'-'+tglsep.substring(0, 2);
            $('#txttglsep').val(tglsep);
        }

        function carinama() {
			var noka = $("#noka").val();

			$.ajax({
				url: "<?php echo site_url();?>/bpjs/carinama",
				type: "GET",
				data: {
					noka: noka
				},
				success: function (ajaxData) {
                    // alert(ajaxData);
					$("#nama").val(ajaxData);
				},
				error: function (data) {
					// gagalalert();
				}
			});
		}

    </script>
<?php
} 
?>