<div class="container-fluid site-width">
	<!-- START: Breadcrumbs-->
	<div class="row ">
		<div class="col-12  align-self-center">
			<div class="sub-header mt-5 py-3 align-self-center d-sm-flex w-100 rounded">
				</ol>
			</div>
		</div>
	</div>
	<!-- END: Breadcrumbs-->
	<div class="row">
		<div class="col-12">
			<div class="card" style="background-color: #808000;">
				<div class="row spacing-row">
					<div class="col-md-11">
						<div class="card-body">
							<p>
								<span style="display: inline; font-weight: bold; font-size: 20px; color: white;"><?php echo $dataPasien->no_rm.' | '.$nama_pasien; ?></span><br>
								<span style="display: inline;font-weight: bold; font-size: 14px; color: white;"><?php echo $dataPasien->golongan.' | No.Kartu : '.$dataPasien->no_askes.' | NIK : '.$dataPasien->nik.' | Alamat : '.$dataPasien->alamat.' | No.Antrian : '.$dataPasien->no_antrian; ?></span><br>
							</p>
						</div>
					</div>
					<div class="col-md-1">
							<button class="btn btn-light mt-4" onclick="kembaliKeRmeNew()">Kembali</button>
            		</div>
            	</div>
            </div>
			<div class="card">
				<div class="row spacing-row mb-1">
					<div class="col-md-8">
						<nav>
							<div class="nav nav-tabs font-weight-bold border-bottom ml-3" id="nav-tab-pasien" role="tablist">
								<a class="nav-item nav-link active font-weight-bold mt-2 text-danger" id="tindakan" data-toggle="tab" href="#navtindakan" role="tab" aria-controls="navtindakan" aria-selected="true" style="font-size: 12px;">Tindakan</a>
								<a class="nav-item nav-link mt-2 text-primary" id="laboratorium" data-toggle="tab" href="#navlaboratorium" role="tab" aria-controls="navlaboratorium" aria-selected="false" style="color: brown; font-size: 12px;">Laboratorium</a>
								<a class="nav-item nav-link mt-2 text-Info" id="radiologi" data-toggle="tab" href="#navradiologi" role="tab" aria-controls="navradiologi" aria-selected="false" style="color: green; font-size: 12px;">Radiologi</a>
								<a class="nav-item nav-link mt-2  text-dark" id="resep" data-toggle="tab" href="#navresep" role="tab" aria-controls="navresep" aria-selected="false" style="color: red; font-size: 12px;">Resep</a>
							</div>
						</nav>
					</div>
					<div class="col-md-4">
						<label class="col-sm-3 col-form-label" style="font-size: 18px;"></label>
					</div>
				</div>
			</div>
	</div>
</div>	

<script>
function kembaliKeRmeNew() {
	var url= "<?php echo site_url(); ?>/rme/rme_new";
    window.location.href = url;
}
</script>
