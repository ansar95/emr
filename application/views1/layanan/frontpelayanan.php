<!DOCTYPE html>
<html lang="en">
    <!-- START: Head-->
    <head>
        <meta charset="UTF-8">
        <title>SIMRS</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/template_baru/dist/images/favicon.ico" />
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <!-- START: Template CSS-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-ui/jquery-ui.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-ui/jquery-ui.theme.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/flags-icon/css/flag-icon.min.css">
        <!-- END Template CSS-->

        <!-- START: Page CSS-->
        <link rel="stylesheet"  href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/chartjs/Chart.min.css">
        <!-- END: Page CSS-->

        <!-- START: Page CSS-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/morris/morris.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/weather-icons/css/pe-icon-set-weather.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/chartjs/Chart.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/starrr/starrr.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.css">
        <!-- END: Page CSS-->
        <?php
		if(isset($css)){
			$this->load->view('support/css/'.$css);
		}
		?>
        <!-- START: Custom CSS-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/css/main.css">
        <!-- END: Custom CSS-->
    </head>
    <!-- END Head-->

    <!-- START: Body-->
    <body id="main-container" class="default horizontal-menu">

        <!-- START: Pre Loader-->
        <div class="se-pre-con">
            <div class="loader"></div>
        </div>
        <!-- END: Pre Loader-->

        <!-- START: Main Content-->
        <main>
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                <div class="row">
                    <div class="col-12  align-self-center">
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row mt-5">
                    <div class="col-12 col-lg-12 ">
                        <div class="card overflow-hidden">
                            <div class="card-content">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <?php
                                        if ($this->session->userdata("FO") == 1) {
                                        ?>
                                            <div class="card bg-primary rounded-0 col-12 col-md-4 col-lg-3"> 
												<a href="<?php echo site_url();?>/<?php echo "applayanan/apppfrontoffice";?>">
													<div class="card-body">
														<div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
															<i class="fas fa-info-circle card-liner-icon mt-2 text-white"></i>
															<div class='card-liner-content'>
																<h2 class="card-liner-title text-white">Front Office</h2>
																<h7 class="card-liner-subtitle text-white">Informasi Pasien</h7>
															</div>
														</div>
													</div>
												</a>
                                            </div>
                                        <?php 
                                        } 
		                                if ($this->session->userdata("REGIS") == 1) {
                                        ?>
                                            <div class="card bg-info  rounded-0 col-12 col-md-4 col-lg-3">
												<a href="<?php echo site_url();?>/<?php echo "applayanan/apppregistrasi";?>">
                                                    <div class="card-body">
                                                        <div class='d-flex px-0 px-lg-2 py-3 align-self-center'>
                                                            <i class="fas fa-address-card card-liner-icon mt-2 text-white"></i>
                                                            <div class='card-liner-content'>
                                                                <h2 class="card-liner-title text-white">Registrasi</h2>
                                                                <h6 class="card-liner-subtitle text-white">Pendaftaran Pasien</h6>
                                                            </div>
                                                        </div>
                                                    </div>  
												</a>
                                            </div>
                                        <?php 
                                        } 
		                                if ($this->session->userdata("RM") == 1) {
                                        ?> 
											<div class="card bg-danger  rounded-0 col-12 col-md-4 col-lg-3">
												<a href="<?php echo site_url();?>/<?php echo "applayanan/apprekam";?>">
                                                    <div class="card-body">
                                                        <div class='d-flex px-0 px-lg-2 py-3 align-self-center'>
                                                            <i class="fas fa-folder card-liner-icon mt-2 text-white"></i>
                                                            <div class='card-liner-content'>
                                                                <h2 class="card-liner-title text-white">Rekam Medik</h2>
                                                                <h6 class="card-liner-subtitle text-white">BRM dan Laporan</h6>
                                                            </div>
                                                        </div>
                                                    </div>
												</a>
                                            </div>
                                        <?php 
                                        } 
		                                if ($this->session->userdata("LP") == 1) {
                                        ?>    
											<div class="card bg-dark  rounded-0 col-12 col-md-4 col-lg-3">
												<a href="<?php echo site_url();?>/<?php echo "applayanan/appbilling";?>">
													<div class="card-body">
														<div class='d-flex px-0 px-lg-2 py-3 align-self-center'>
															<i class="fas fa-cash-register card-liner-icon mt-2 text-white"></i>
															<div class='card-liner-content'>
																<h2 class="card-liner-title text-white">Billing</h2>
																<h6 class="card-liner-subtitle text-white">Loket Pembayaran</h6>
															</div>
														</div>
													</div>
												</a>	
                                            </div>
                                            <!-- baris 2 -->
                                        <?php 
                                        } 
		                                if ($this->session->userdata("UGD") == 1) {
                                        ?>
                                            <div class="card bg-secondary rounded-0 col-12 col-md-4 col-lg-3"> 
												<!-- <a href="<?php echo site_url();?>/<?php echo "applayanan/apppugd";?>"> -->
												<a href="<?php echo site_url();?>/<?php echo "ugd";?>">
													<div class="card-body">
														<div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
															<i class="fas  fa-stethoscope card-liner-icon mt-2 text-white"></i>
															<div class='card-liner-content'>
																<h2 class="card-liner-title text-white">IGD</h2>
																<h7 class="card-liner-subtitle text-white">Instalasi Gawat Darurat</h7>
															</div>
														</div>
													</div>
												</a>
                                            </div>
                                        <?php 
                                        } 
		                                if ($this->session->userdata("RJ") == 1) {
                                        ?>     
                                            <div class="card bg-warning  rounded-0 col-12 col-md-4 col-lg-3">
												<!-- <a href="<?php echo site_url();?>/<?php echo "applayanan/apppurj";?>"> -->
												<a href="<?php echo site_url();?>/<?php echo "urj";?>">
                                                    <div class="card-body">
                                                        <div class='d-flex px-0 px-lg-2 py-3 align-self-center'>
                                                            <i class="fas fa-book-medical card-liner-icon mt-2 text-white"></i>
                                                            <div class='card-liner-content'>
                                                                <h2 class="card-liner-title text-white">Rawat Jalan</h2>
                                                                <h6 class="card-liner-subtitle text-white">Poliklinik</h6>
                                                            </div>
                                                        </div>
                                                    </div>
												</a>
                                            </div>
                                        <?php 
                                        } 
		                                if ($this->session->userdata("RI") == 1) {
                                        ?>
											<div class="card bg-success  rounded-0 col-12 col-md-4 col-lg-3">
                                                <!-- <a href="<?php echo site_url();?>/<?php echo "applayanan/apppuri";?>"> -->
                                                <a href="<?php echo site_url();?>/<?php echo "uri";?>">
                                                    <div class="card-body">
                                                        <div class='d-flex px-0 px-lg-2 py-3 align-self-center'>
                                                            <i class="fas fa-hospital card-liner-icon mt-2 text-white"></i>
                                                            <div class='card-liner-content'>
                                                                <h2 class="card-liner-title text-white">Rawat Inap</h2>
                                                                <h6 class="card-liner-subtitle text-white">Kamar Perawatan</h6>
                                                            </div>
                                                        </div>
                                                    </div>
												</a>
                                            </div>
                                        <?php 
                                        } 
		                                if ($this->session->userdata("RINS") == 1) {
                                        ?>
											<div class="card bg-info  rounded-0 col-12 col-md-4 col-lg-3">
												<a href="<?php echo site_url();?>/<?php echo "applayanan/appinstalasi";?>">
													<div class="card-body">
														<div class='d-flex px-0 px-lg-2 py-3 align-self-center'>
															<i class="fas fa-comment-medical card-liner-icon mt-2 text-white"></i>
															<div class='card-liner-content'>
																<h2 class="card-liner-title text-white">Instalasi</h2>
																<h6 class="card-liner-subtitle text-white">Instalasi Penunjang</h6>
															</div>
														</div>
													</div>
												</a>	
                                            </div>
                                            <!-- baris 3 -->
                                        <?php 
                                        } 
		                                if ($this->session->userdata("APT") == 1) { 
                                        ?>
                                            <div class="card bg-info rounded-0 col-12 col-md-4 col-lg-3"> 
												<!-- <a href="<?php echo site_url();?>/<?php echo "applayanan/appapotik";?>"> -->
												<a href="<?php echo site_url();?>/<?php echo "depoapotik/listresepobat";?>">
													<div class="card-body">
														<div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
															<i class="fas fa-laptop-medical card-liner-icon mt-2 text-white"></i>
															<div class='card-liner-content'>
																<h2 class="card-liner-title text-white">Depo Apotik</h2>
																<h7 class="card-liner-subtitle text-white">Resep Obat</h7>
															</div>
														</div>
													</div>
												</a>
                                            </div>
                                        <?php 
                                        } 
		                                if ($this->session->userdata("FARM") == 1) {
                                        ?>
                                            <div class="card bg-danger  rounded-0 col-12 col-md-4 col-lg-3">
												<a href="<?php echo site_url();?>/<?php echo "applayanan/appgudang";?>">

                                                    <div class="card-body">
                                                        <div class='d-flex px-0 px-lg-2 py-3 align-self-center'>
                                                            <i class="fas fa-list-ul card-liner-icon mt-2 text-white"></i>
                                                            <div class='card-liner-content'>
                                                                <h2 class="card-liner-title text-white">Farmasi</h2>
                                                                <h6 class="card-liner-subtitle text-white">Gudang Obat / BHP</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        <?php 
                                        } 
		                                if ($this->session->userdata("AMP") == 1) {
                                        ?>     
											<div class="card bg-primary  rounded-0 col-12 col-md-4 col-lg-3">
												<a href="<?php echo site_url();?>/<?php echo "applayanan/appampra";?>">

                                                <div class="card-body">
                                                    <div class='d-flex px-0 px-lg-2 py-3 align-self-center'>
                                                        <i class="fas fa-list-ol card-liner-icon mt-2 text-white"></i>
                                                        <div class='card-liner-content'>
                                                            <h2 class="card-liner-title text-white">Ampra</h2>
                                                            <h6 class="card-liner-subtitle text-white">Ampra Unit</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php 
                                        } 
		                                if ($this->session->userdata("GIZI") == 1) {
                                        ?>
											<div class="card bg-secondary  rounded-0 col-12 col-md-4 col-lg-3">
												<a href="<?php echo site_url();?>/<?php echo "applayanan/appgizi";?>">
													<div class="card-body">
														<div class='d-flex px-0 px-lg-2 py-3 align-self-center'>
															<i class="fas fa-utensils card-liner-icon mt-2 text-white"></i>
															<div class='card-liner-content'>
																<h2 class="card-liner-title text-white">Gizi</h2>
																<h6 class="card-liner-subtitle text-white">Instalasi Gizi</h6>
															</div>
														</div>
													</div>
												</a>	
                                            </div>
										<!-- baris 4 -->
                                        <?php 
                                        } 
		                                if ($this->session->userdata("RT") == 1) {
                                        ?>    
											<div class="card bg-success  rounded-0 col-12 col-md-4 col-lg-3">
												<a href="<?php echo site_url();?>/<?php echo "applayanan/apprumahtangga";?>">
													<div class="card-body">
														<div class='d-flex px-0 px-lg-2 py-3 align-self-center'>
															<i class="fas fa-tags card-liner-icon mt-2 text-white"></i>
															<div class='card-liner-content'>
																<h2 class="card-liner-title text-white">Rumah Tangga </h2>
																<h6 class="card-liner-subtitle text-white">BHP Non Medis</h6>
															</div>
														</div>
													</div>
												</a>	
                                            </div>
                                        <?php 
                                        } 
		                                if ($this->session->userdata("SEPBPJS") == 1) {
                                        ?>
                                            <div class="card bg-secondary  rounded-0 col-12 col-md-4 col-lg-3">
												<a href="<?php echo site_url();?>/<?php echo "applayanan/appbpjs";?>">
                                                    <div class="card-body">
                                                        <div class='d-flex px-0 px-lg-2 py-3 align-self-center'>
                                                            <i class="fas fa-vote-yea card-liner-icon mt-2 text-white"></i>
                                                            <div class='card-liner-content'>
                                                                <h2 class="card-liner-title text-white">VClaim</h2>
                                                                <h6 class="card-liner-subtitle text-white">Bridging VCLAIM</h6>
                                                            </div>
                                                        </div>
                                                    </div>
												</a>	
                                            </div>
                                        <?php 
                                        } 
		                                if ($this->session->userdata("BRIDGING") == 1) {
                                        ?>    
											<div class="card bg-info rounded-0 col-12 col-md-4 col-lg-3">
                                                <a href="<?php echo site_url();?>/<?php echo ".";?>">
                                                    <div class="card-body">
                                                        <div class='d-flex px-0 px-lg-2 py-3 align-self-center'>
                                                            <i class="fas fa-calculator card-liner-icon mt-2 text-white"></i>
                                                            <div class='card-liner-content'>
                                                                <h2 class="card-liner-title text-white">E-Klaim</h2>
                                                                <h6 class="card-liner-subtitle text-white">Bridging INACBG's</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <a href="<?php echo site_url();?>/<?php echo "applayanan/menuapppelayanan";?>">
                                            </div>
                                        <?php 
                                        } 
		                                if ($this->session->userdata("RT") == 1) {
                                        ?>    
											<div class="card bg-dark  rounded-0 col-12 col-md-4 col-lg-3">
												<a href="<?php echo site_url();?>/<?php echo "applayanan/appsitb";?>">
													<div class="card-body">
														<div class='d-flex px-0 px-lg-2 py-3 align-self-center'>
															<i class="fas fa-tags card-liner-icon mt-2 text-white"></i>
															<div class='card-liner-content'>
																<h2 class="card-liner-title text-white">SITB </h2>
																<h6 class="card-liner-subtitle text-white">Bridging SITB</h6>
															</div>
														</div>
													</div>
												</a>	
                                            </div>
                                        <?php 
                                        } 
		                                if ($this->session->userdata("MD") == 1) {
                                        ?>    
                                            <div class="card bg-warning  rounded-0 col-12 col-md-4 col-lg-3">
												<a href="<?php echo site_url();?>/<?php echo "applayanan/appmaster";?>">
													<div class="card-body">
														<div class='d-flex px-0 px-lg-2 py-3 align-self-center'>
															<i class="fas fa-swatchbook card-liner-icon mt-2 text-white"></i>
															<div class='card-liner-content'>
																<h2 class="card-liner-title text-white">Master Data</h2>
																<h6 class="card-liner-subtitle text-white">Master Data</h6>
															</div>
														</div>
													</div>
												</a>	
                                            </div>
                                            <?php 
                                        } 
                                        if ($this->session->userdata("PPI") == 1) {
                                            ?>    
                                                <div class="card bg-primary  rounded-0 col-12 col-md-4 col-lg-3">
                                                    <a href="<?php echo site_url();?>/<?php echo "applayanan/appppi";?>">
                                                        <div class="card-body">
                                                            <div class='d-flex px-0 px-lg-2 py-3 align-self-center'>
                                                                <i class="fas fa-swatchbook card-liner-icon mt-2 text-white"></i>
                                                                <div class='card-liner-content'>
                                                                    <h2 class="card-liner-title text-white">PPI</h2>
                                                                    <h6 class="card-liner-subtitle text-white">Surveilens</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>	
                                                </div>
                                                <?php 
                                        } 
                                        if ($this->session->userdata("MUTU") == 1) {
                                            ?>    
                                                <div class="card bg-danger  rounded-0 col-12 col-md-4 col-lg-3">
                                                    <a href="<?php echo site_url();?>/<?php echo "applayanan/appmutu";?>">
                                                        <div class="card-body">
                                                            <div class='d-flex px-0 px-lg-2 py-3 align-self-center'>
                                                                <i class="fas fa-swatchbook card-liner-icon mt-2 text-white"></i>
                                                                <div class='card-liner-content'>
                                                                    <h2 class="card-liner-title text-white">MUTU</h2>
                                                                    <h6 class="card-liner-subtitle text-white">Manajemen Mutu</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>	
                                                </div>
                                                <?php 
                                        }  
                                        if ($this->session->userdata("BILLALL") == 1) {
                                            ?>    
                                                <div class="card bg-success rounded-0 col-12 col-md-4 col-lg-3">
                                                    <a href="<?php echo site_url();?>/<?php echo "applayanan/cekbilling";?>">
                                                        <div class="card-body">
                                                            <div class='d-flex px-0 px-lg-2 py-3 align-self-center'>
                                                                <i class="fas fa-cash-register card-liner-icon mt-2 text-white"></i>
                                                                <div class='card-liner-content'>
                                                                    <h2 class="card-liner-title text-white">CEK BILLING</h2>
                                                                    <h6 class="card-liner-subtitle text-white">Cek Billing</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>	
                                                </div>
                                                <?php 
                                        }  
                                        ?>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Card DATA-->
            </div>
        </main>
        <!-- END: Content-->




        <!-- START: Back to top-->
        <a href="#" class="scrollup text-center">
            <i class="icon-arrow-up"></i>
        </a>
        <!-- END: Back to top-->


        <!-- START: Template JS-->
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/moment/moment.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/slimscroll/jquery.slimscroll.min.js"></script>
        <!-- END: Template JS-->

        <!-- START: APP JS-->
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/js/app.js"></script>
        <!-- END: APP JS-->

        <!-- START: Page Vendor JS-->
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/raphael/raphael.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/morris/morris.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/chartjs/Chart.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/starrr/starrr.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-flot/jquery.canvaswrapper.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-flot/jquery.colorhelpers.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-flot/jquery.flot.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-flot/jquery.flot.saturated.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-flot/jquery.flot.browser.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-flot/jquery.flot.drawSeries.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-flot/jquery.flot.uiConstants.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-flot/jquery.flot.legend.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-flot/jquery.flot.pie.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/chartjs/Chart.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-jvectormap/jquery-jvectormap-world-mill.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-jvectormap/jquery-jvectormap-de-merc.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-jvectormap/jquery-jvectormap-us-aea.js"></script>
        <script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/apexcharts/apexcharts.min.js"></script>
        <!-- END: Page Vendor JS-->

        <!-- START: Page JS-->
        <!-- <script src="<?php echo base_url(); ?>assets/template_baru/dist/js/home.script.js"></script> -->
        <!-- END: Page JS-->
    </body>
    <!-- END: Body-->
</html>
