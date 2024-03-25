<?php
if ($formpilih == 0) {
    ?>
    <div class="modal-dialog modal-xl" style="width:1200px;" >
        <div class="modal-content " >
            <div class="form-horizontal">
                <div class="box box-default box-solid" id="kotakform">
                    <div class="modal-header">
                    	<h6 class="modal-title">Dropping</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="col-sm-12">
								<div class="col-sm-6">
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">Tanggal Ampra</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" name="tgla" id="tgla" disabled value="<?php echo $dtrow->tglorder?>">
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">Item Obat/BHP</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="obat" id="obat" disabled value="<?php echo $dtrow->namaobat?>">
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">Qty Ampra</label>
										<div class="col-sm-3">
											<input type="number" class="form-control" name="qtyampra" id="qtyampra" disabled value="<?php echo $dtrow->qtyampra?>">
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">Satuan</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" name="satuan" id="satuan" disabled value="<?php echo $dtrow->satuan?>">
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">Penggunaan</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" name="guna" id="guna" disabled value="<?php echo $dtrow->penggunaan?>">
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group row col-spacing-row">
		                                <label class="col-sm-4 control-label">Tanggal Drop</label>
		                                <div class="col-sm-3">
		                                	<input type="text" class="form-control" name="tgld" id="tgld" >
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">Item Drop</label>
										<div class="col-sm-8">
											<select class="form-control" style="width: 100%;" name="barang" id="barang" onchange="caribhpampra()">
												<option value="-">-- Pilih --</option>
												<?php
												foreach($dtobat as $row) {
													?>
													<option value="<?php echo $row->kodebarang . "_" . $row->id; ?>"><?php echo $row->namabarang.' | '.$row->satuan.' | '.$row->batch.' | '.$row->expire.' | '.($row->qty*$row->isisatuan-$row->keluar).' ('.$row->id.')'; ?></option>
													<?php
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">Qty. Drop</label>
										<div class="col-sm-3">
											<input type="number" class="form-control" name="qtyd" id="qtyd" value="0" />
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">Batch</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" name="batch" id="batch" disabled />
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">Expired</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" name="exp" id="exp" disabled />
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">Harga</label>
										<div class="col-sm-3">
											<input type="number" class="form-control" name="harga" id="harga" disabled />
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">No. Surat Jalan</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" name="sj" id="sj" disabled />
										</div>
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
        </div>
    </div>
    <script>
        function modalform() {
            $("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        }

        function modalformtutup() {
            $(".overlay").remove();
        }

		function caribhpampra() {
			var id = $("#barang").val();
			$.ajax({
				url: "<?php echo site_url();?>/fakturpelayanan_rt/cariampradetail",
				type: "GET",
				data : {id: id},
				success: function (ajaxData) {
					var pr = JSON.parse(ajaxData);
					$("#batch").val(pr.dtampra.batch);
					var dateexp = new Date(pr.dtampra.expire);
					$('#exp').datepicker({ autoclose: true, dateFormat: 'mm/dd/yy' }).datepicker("setDate", dateexp);
					$("#harga").val(pr.dtampra.harga);
					$("#sj").val(pr.dtampra.noterima);
					$("#satuan").val(pr.dtampra.satuan);
				}
			});
		}

        $(document).ready(function () {
            $('#barang').select2();
            $('#tgld').datepicker({ autoclose: true }).datepicker("setDate", "0");

            $("#simpan").click(function(e) {
                modalform();
				var tgl = $("#tgl").val();
				var tgld = $("#tgld").val();
				var barang = $("#barang").val();
                var barangtext = $("#barang option:selected").text();
				var qtyd = document.getElementById("qtyd").value;
				var exp = document.getElementById("exp").value;
                var batch = document.getElementById("batch").value;
                var sj = $("#sj").val();
				var harga = document.getElementById("harga").value;

                
                if ((tgld == "") || (barang == "-") || (qtyd == "") || (exp == "") || (batch == "") || (sj == "") || (harga == "")) {
                    kuranglengkap();
                    modalformtutup();
                    return;
                }

                $.ajax({
                    url: "<?php echo site_url();?>/fakturpelayanan_rt/simpanupdateampra",
                    type: "GET",
                    data : {
						tgl: tgl,
						kode: kodeunit,
						kodedrop: kodedrop,
                        tgld: tgld,
                        barang: barang,
                        barangtext: barangtext,
                        qtyd: qtyd,
                        exp: exp,
                        batch: batch,
                        sj: sj,
                        harga: harga
                    },
                    success: function (ajaxData){
						var dt = JSON.parse(ajaxData);
						if (dt.stat == true) {
							$("#kotakdetail").html(dt.dtview);
							modalformtutup();
                            tutupmodal();
						} else {
							$.notify("Data tidak dapat diproses","error");
							modalformtutup();
						}
                    },
                    error: function (ajaxData) {
                        modalformtutup();
                        gagalalert();
                    }
                });
            });
        });
    </script>
    <?php
} else if ($formpilih == 1) {
    ?>
	<div class="modal-dialog modal-xl" style="width:1200px;" >
        <div class="modal-content " >
            <div class="form-horizontal">
                <div class="box box-default box-solid" id="kotakform">
                    <div class="modal-header">
                    	<h6 class="modal-title">Dropping</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="col-sm-12 row col-spacing-row">
								<div class="col-sm-6">
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">Tanggal Ampra</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" name="tgla" id="tgla">
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">Item Obat/BHP</label>
										<div class="col-sm-8">
											<select class="form-control" style="width: 100%;" name="obat" id="obat" onchange="getobatoptiondropadd()">
												<option value="-">-- Pilih --</option>
												<?php
												foreach($dtbhp as $row) {
													?>
													<option value="<?php echo $row->kodeobat; ?>"><?php echo $row->namaobat; ?></option>
													<?php
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">Qty Ampra</label>
										<div class="col-sm-3">
											<input type="number" class="form-control" name="qty" id="qty" value="0">
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">Satuan</label>
										<div class="col-sm-3">
											<select class="form-control" style="width: 100%;" name="sat" id="sat">
												<option value="-">-- Pilih --</option>
												<?php
												foreach($dtsatuan as $row) {
													?>
													<option value="<?php echo $row->satuanobat; ?>"><?php echo $row->satuanobat; ?></option>
													<?php
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">Penggunaan</label>
										<div class="col-sm-3">
											<select class="form-control" style="width: 100%;" name="guna" id="guna">
												<option value="">--Pilih--</option>
												<option value="BPJS">BPJS</option>
												<option value="UMUM">UMUM</option>
												<option value="HIBAH">HIBAH</option>
												<option value="LAINNYA">LAINNYA</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group row col-spacing-row">
		                                <label class="col-sm-4 control-label">Tanggal Drop</label>
		                                <div class="col-sm-3">
		                                	<input type="text" class="form-control" name="tgld" id="tgld" >
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">Item Obat/BHP</label>
										<div class="col-sm-8">
											<select class="form-control" style="width: 100%;" name="barang" id="barang" onchange="caribhpampra()">
												<option value="-">-- Pilih --</option>
											</select>
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">Qty. Drop</label>
										<div class="col-sm-3">
											<input type="number" class="form-control" name="qtyd" id="qtyd" value="0" />
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">Batch</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" name="batch" id="batch" disabled />
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">Expired</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" name="exp" id="exp" disabled />
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">Harga</label>
										<div class="col-sm-3">
											<input type="number" class="form-control" name="harga" id="harga" disabled />
										</div>
									</div>
									<div class="form-group row col-spacing-row">
										<label class="col-sm-4 control-label">No. Surat Jalan</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" name="sj" id="sj" disabled />
										</div>
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
        </div>
    </div>
	<script>
        function modalform() {
            $("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        }

        function modalformtutup() {
            $(".overlay").remove();
        }

		function getobatoptiondropadd() {
            var id = $("#obat").val();
			$.ajax({
				url: "<?php echo site_url();?>/fakturpelayanan/getoptionobatbyidobat",
				type: "GET",
				data : {id: id},
				success: function (ajaxData) {
					modalformtutup();
					console.log(ajaxData);
					var pr = JSON.parse(ajaxData);
					$("select#barang").html(pr.dtview);
				},
				error: function (ajaxData) {
					modalformtutup();
					$("select#barang").html('<option value="-">-- Pilih --</option>');
					gagalalert();
				}
			});
        }

		function caribhpampra() {
			var id = $("#barang").val();
			$.ajax({
				url: "<?php echo site_url();?>/fakturpelayanan/cariampradetail",
				type: "GET",
				data : {id: id},
				success: function (ajaxData) {
					var pr = JSON.parse(ajaxData);
					$("#batch").val(pr.dtampra.batch);
					var dateexp = new Date(pr.dtampra.expire);
					$('#exp').datepicker({ autoclose: true, dateFormat: 'mm/dd/yy' }).datepicker("setDate", dateexp);
					$("#harga").val(pr.dtampra.harga);
					$("#sj").val(pr.dtampra.noterima);
				}
			});
		}

        $(document).ready(function () {
            // $('#barang').select2();
			$('#obat').select2();
            var tgl = $("#tgl").val();
			var tgl_order = new Date(tgl);
			$('#tgla').datepicker({ autoclose: true, dateFormat: "mm/dd/yyyy" }).datepicker("setDate", tgl_order);
			$('#tgld').datepicker({ autoclose: true }).datepicker("setDate", "0");

            $("#simpan").click(function(e) {
                modalform();
				var tgla = $("#tgla").val();
				var obat = $("#obat").val();
                var obattext = $("#obat option:selected").text();
				var qty = document.getElementById("qty").value;
				var satuan = $("#sat").val();
				var guna = $("#guna").val();

				var tgl = $("#tgl").val();
				var tgld = $("#tgld").val();
				var barang = $("#barang").val();
                var barangtext = $("#barang option:selected").text();
				var qtyd = document.getElementById("qtyd").value;
				var exp = document.getElementById("exp").value;
                var batch = document.getElementById("batch").value;
                var sj = $("#sj").val();
				var harga = document.getElementById("harga").value;

                
                if ((tgla == "") || (obat == "-") || (qty == "") || (satuan == "") || (guna == "") || (tgld == "") || (barang == "-") || (qtyd == "") || (exp == "") || (batch == "") || (sj == "") || (harga == "")) {
                    kuranglengkap();
                    modalformtutup();
                    return;
                }

                $.ajax({
                    url: "<?php echo site_url();?>/fakturpelayanan/simpantambahampra",
                    type: "GET",
                    data : {
						unit: unit,
						tgla: tgla,
						obat: obat,
						obattext: obattext,
						qty: qty,
						satuan: satuan,
						guna: guna,
						tgl: tgl,
						kode: kodeunit,
						kodedrop: kodedrop,
                        tgld: tgld,
                        barang: barang,
                        barangtext: barangtext,
                        qtyd: qtyd,
                        exp: exp,
                        batch: batch,
                        sj: sj,
                        harga: harga,
						id: idampra
                    },
                    success: function (ajaxData){
						var dt = JSON.parse(ajaxData);
						if (dt.stat == true) {
							$("#kotakdetail").html(dt.dtview);
							modalformtutup();
                            tutupmodal();
						} else {
							$.notify("Data tidak dapat diproses","error");
							modalformtutup();
						}
                    },
                    error: function (ajaxData) {
                        modalformtutup();
                        gagalalert();
                    }
                });
            });
        });
    </script>
    <?php
}
?>
