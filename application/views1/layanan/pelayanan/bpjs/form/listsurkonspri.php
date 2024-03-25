<!-- START: Card Data-->
<main>
	<div class="container-fluid site-width">
		<!-- START: Breadcrumbs-->
		<div class="row ">
			<div class="col-12  align-self-center">
				<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
					</ol>
				</div>
			</div>
		</div>
		<!-- END: Breadcrumbs-->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<h4 class="mb-0">List Rencana Kontrol / SPRI</h4>
					</div>
					<div class="card-body">
							<div class="row mb-2">
								<div class="col-md-2">
									<label class="col-form-label">Periode Tanggal</label>
								</div>
                                <div class="col-md-2">
									<div class="input-group  mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
										</div>
										<input type="date" class="form-control pull-right" id="awal" name="awal" onchange="formatTanggal(this)" require autocomplete='off'>
									</div>
								</div>
								<input type="hidden" class="form-control pull-right" id="txtawal" name="txtawal">

								<div class="col-md-1 text-center">
									<label class="col-form-label">s/d</label>
								</div>
								<div class="col-md-2">
									<div class="input-group  mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
										</div>
										<input type="date" class="form-control pull-right" id="akhir" name="akhir" onchange="formatTanggal2(this)" require autocomplete='off'>
									</div>
								</div>
								<input type="hidden" class="form-control pull-right" id="txtakhir" name="txtakhir">
							</div>
							<div class="row mb-2">
								<div class="col-md-2">
										<label class="col-form-label">Filter</label>
								</div>
								<div class="col-md-9">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="bagian" value="1" id="cekentri" checked>
											<label class="custom-control-label" for="cekentri">Tanggal Entri</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="bagian" value="2" id="cekkontrol">
											<label class="custom-control-label" for="cekkontrol">Tanggal Rencana Kontrol</label>
										</div>
								</div>
								<div class="col-md-3">
								</div>
							</div>
							<div class="row mt-2">
								<div class="col-md-2">
								</div>
                                <div class="col-md-6 text-left">
                                    <button id="carijadwal"  class="btn btn-sm btn-primary">Cari Data</button>
                                </div>
							</div>
                            <br>
                            <div class="row spacing-row mt-2">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="datasurkon">
                                            <thead>
                                                <tr class='bg-success text-black'>
                                                    <th width='7%'>Nomor Kartu</th>
                                                    <th width='10%'>Nama Pasien</th>
                                                    <th width='10%'>Nomor Surat</th>
                                                    <th width='6%'>Jns.Kontrol</th>
                                                    <th width='7%'>Jns.Pelayanan</th>
                                                    <th width='6%'>Tgl.Kontrol</th>
                                                    <th width='6%'>Tgl.Terbit</th>
                                                    <th width='8%'>SEP Asal</th>
                                                    <th width='6%'>Tgl.SEP</th>
                                                    <th width='10%'>Poli Asal</th>
                                                    <th width='10%'>Poli Tujuan</th>
                                                    <th width='14%'>Dokter</th>                                                   
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>           
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
<script src="assets/jquery_web/jquery-3.5.1.min.js"></script>

<script>
$(document).ready(function() {
            // var maximumStack = 1000;
            $("#carijadwal").click(function(e) {
                var txtawal = document.getElementById("txtawal").value;
                var txtakhir = document.getElementById("txtakhir").value;
                var filter = $("input[name='bagian']:checked").val();
                console.log("Nilai Filter:", filter);

                $.ajax({
                    url: "<?php echo site_url(); ?>/bpjs/ceklistsurkonspri",
                    type: "GET",
                    data: {
                        txtawal: txtawal,
                        txtakhir: txtakhir,
                        filter: filter
                    },
                    success: function(ajaxData) {
                        console.log(ajaxData);
                        $("#datasurkon tbody tr").remove();
						$("#datasurkon tbody").append(ajaxData);
                    }
                });
            });
        });


function formatTanggal(input) {
  const tanggal = input.value; // Mendapatkan nilai tanggal dari input

  // Memisahkan tahun, bulan, dan tanggal
  const tahun = tanggal.substring(0, 4);
  const bulan = tanggal.substring(5, 7);
  const hari = tanggal.substring(8, 10);

  // Mengatur nilai input dengan format yyyy-mm-dd
  tglbaru = `${tahun}-${bulan}-${hari}`;
  $('#txtawal').val(tglbaru);
}

function formatTanggal2(input) {
  const tanggal = input.value; // Mendapatkan nilai tanggal dari input

  // Memisahkan tahun, bulan, dan tanggal
  const tahun = tanggal.substring(0, 4);
  const bulan = tanggal.substring(5, 7);
  const hari = tanggal.substring(8, 10);

  // Mengatur nilai input dengan format yyyy-mm-dd
  tglbaruakhir = `${tahun}-${bulan}-${hari}`;
  $('#txtakhir').val(tglbaruakhir);
}


</script>
