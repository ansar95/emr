<style>
	#select-tools {
		padding: 0px;
		margin: 0;
	}
</style>


<div class="modal-dialog modal-xl modal-dialog-centered" style="margin: 0 auto;">
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
			<div class="modal-header p-1 pl-3 align-text-bottom">
				<h6><span style="color: blue; font-weight: bold;">Tindakan Terintegrasi</span></h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" class="form-control" disabled name="idnya" id="idnya" value="<?php echo $dttindakanid->id; ?>">
						<input type="hidden" class="form-control" disabled name="no_rm" id="no_rm" value="<?php echo $dttindakanid->no_rm; ?>">
						<input type="hidden" class="form-control" disabled name="notransaksi" id="notransaksi" value="<?php echo $dttindakanid->notransaksi; ?>">
					<div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-1 col-form-label">Tanggal</label>
						<div class="col-md-3">
							<input type="date" class="form-control"  name="tanggal" id="tanggal" value="<?php echo $dttindakanid->tanggal; ?>">
						</div>
					</div>
					<div class="form-group row col-spacing-row">
						<label class="col-md-1 col-form-label">Jam</label>
						<div class="col-md-3">
							<input type="time" class="form-control"  name="jam" id="jam" value="<?php echo $dttindakanid->jam; ?>">
						</div>
					</div>
					<div class="form-group row col-spacing-row">
						<!-- <label for="select-tools" class=" col-sm-1">Oleh</label> -->
						<label class="col-md-1 col-form-label">Oleh</label>
						<div class="col-sm-10">
							<select id="select-tools" multiple data-allow-clear="1">							
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group row col-spacing-row">
								<label class="col-md-1 col-form-label">Tindakan</label>
								<div class="col-md-10">
									<textarea rows="5" name="tindakan" id="tindakan" class="form-control"><?php echo $dttindakanid->tindakan; ?></textarea>
								</div>
							</div>
						</div>				
					</div>

					<div class="row">
                        <div class="col-md-6 text-left">
                            <button onclick="simpandata()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                        </div>
						<div class="col-md-6 text-right">
                            <button onclick="hapusdata()" class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
				</div>
					
			</div>
		</div>
	</div>
</div>


<script src="<?php echo base_url();?>assets/dist/js/standalone/selectize.js"></script>


<script>

	
	$(document).ready(function() {
	var olehData = <?php echo json_encode($dttindakanid->oleh); ?>; // Ambil data 'oleh' dari hasil model

	if (olehData != "") {
					var olehDataTampil = JSON.parse(olehData);
					console.log(olehData);

					var $select = $("#select-tools").selectize();
					var selectize = $select[0].selectize;
					selectize.setValue(olehDataTampil);
	}		

    });

				//contoh dari form user
				// if (t.dtuser.kode_unit != "") {
				// 	var dataUnit = JSON.parse(t.dtuser.kode_unit);
				// 	console.log(dataUnit);

				// 	var $select = $("#select-tools").selectize();
				// 	var selectize = $select[0].selectize;
				// 	selectize.setValue(dataUnit);
				// }

	$('#select-tools').selectize({
		maxItems: null,
		valueField: 'id',
		labelField: 'title',
		searchField: 'title',
		options: [
			<?php
			foreach($dtperawat as $row) {
				?>
				{id: '<?php echo $row->nama_dokter;?>', title: '<?php echo $row->nama_dokter;?>'},
				<?php
			}
			?>
		],
		create: false
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


function simpandata() {
	modalform();
	var id = document.getElementById("idnya").value;
	var no_rm = document.getElementById("no_rm").value;
	var notransaksi = document.getElementById("notransaksi").value;
	var tanggal = document.getElementById("tanggal").value;
	var jam = document.getElementById("jam").value;
	// var oleh = document.getElementById("select-tools").value;
	var tindakan = document.getElementById("tindakan").value;
	var oleh = JSON.stringify($('select.selectized,input.selectized').val());

	$.ajax({
		url: "<?php echo site_url();?>/rme/simpandata",
		type: "GET",
		data : {id: id,
				no_rm : no_rm,
				notransaksi : notransaksi,
				tanggal : tanggal,
				jam : jam,
				oleh : oleh,
				tindakan : tindakan
				},
		success: function (ajaxData){
			console.log(ajaxData);
			 var dt = JSON.parse(ajaxData);
                    $("#tabeltindakan tbody tr").remove();
                    $("#tabeltindakan tbody").append(dt.dtview);
                    modalformtutup();
                    tutupmodal();
		},
		error: function (ajaxData) {
			// modalloadtutup();
			console.log(ajaxData);
		}
	});	
	}

	function hapusdata() {
	modalform();
	var id = document.getElementById("idnya").value;
	var no_rm = document.getElementById("no_rm").value;
	var notransaksi = document.getElementById("notransaksi").value;
	// var tanggal = document.getElementById("tanggal").value;
	// var jam = document.getElementById("jam").value;
	// var oleh = document.getElementById("oleh").value;
	// var tindakan = document.getElementById("tindakan").value;

	$.ajax({
		url: "<?php echo site_url();?>/rme/hapusdata",
		type: "GET",
		data : {id: id,
				no_rm : no_rm,
				notransaksi : notransaksi
				// tanggal : tanggal,
				// jam : jam,
				// oleh : oleh,
				// tindakan : tindakan
				},
		success: function (ajaxData){
			console.log(ajaxData);
			 var dt = JSON.parse(ajaxData);
                    $("#tabeltindakan tbody tr").remove();
                    $("#tabeltindakan tbody").append(dt.dtview);
                    modalformtutup();
                    tutupmodal();
		},
		error: function (ajaxData) {
			// modalloadtutup();
			console.log(ajaxData);
		}
	});	
	}

</script>



