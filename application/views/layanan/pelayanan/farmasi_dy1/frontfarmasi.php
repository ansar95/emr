<!DOCTYPE html>
<html lang="en">
<!-- START: Head-->

<head>
    <meta charset="UTF-8">
    <title>SIMRS</title>
    <!-- <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/template_baru/dist/images/favicon.ico" /> -->
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- START: Template CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-ui/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/flags-icon/css/flag-icon.min.css">
    <!-- END Template CSS-->

    <!-- START: Page CSS-->
    <!-- <link rel="stylesheet"  href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/chartjs/Chart.min.css"> -->
    <!-- END: Page CSS-->

    <!-- START: Page CSS-->
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/morris/morris.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/weather-icons/css/pe-icon-set-weather.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/chartjs/Chart.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/starrr/starrr.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.css"> -->
    <!-- END: Page CSS-->
    <?php
    if (isset($css)) {
        $this->load->view('support/css/' . $css);
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
                    <!-- <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Menu Utama</h4> 
							<p>menu akan tampil sesuai level anda</p></div>
                        </div> -->
                </div>
            </div>
            <!-- END: Breadcrumbs-->

            <!-- START: Card Data-->
            <div class="row mt-5">
                <!-- <div class="col-12  mt-5"> -->
                <!-- <div class="card outline-badge-primary"> -->
                <!-- <div class="card-content"> -->
                <!-- <div class="card-body p-2">
                                    <div class="d-md-flex">
                                        <p class="mb-0 my-auto font-w-500 tx-s-12">Pastikan anda masuk dalam sistem menggunakan username anda.</p>
                                        <div class="my-auto ml-auto">
                                            <a href="#" class="btn btn-outline-primary font-w-600 my-auto text-nowrap"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div>

                                </div> -->
                <!-- </div> -->
                <!-- </div> -->
                <!-- </div> -->
                <div class="col-12 col-lg-12">
                    <h3 class="my-2">Gudang Farmasi</h3>
                </div>
                <div class="col-12 col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body p-0">
                                <div class="row">
                                    <!-- <div class="col-12 col-lg-12 d-block d-md-flex d-lg-block"> -->
                                    <?php
                                    $i = 0;
                                    $color = ['primary', 'success', 'info', 'warning', 'danger'];
                                    foreach ($menu as $row) {
                                    ?>
                                        <?php
                                        $id = $this->session->userdata("idx");
										$menunya=$row->kodemenu;

                                        // print_r ($row);
                                        if (ceksess($row->kodemenu, $id) == TRUE && $this->session->userdata('login') == TRUE) {
											if ( $this->session->userdata("$menunya") == 1) {

                                        ?>
                                            <div class="card bg-<?php echo $color[$i] ?> rounded-0 col-12 col-md-4 col-lg-3">
                                                <a href="<?php echo site_url(); ?>/<?php echo $row->link; ?>">
                                                    <div class="card-body">
                                                        <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                                            <i class="fas fa-book-medical card-liner-icon mt-2 text-white"></i>
                                                            <div class='card-liner-content'>
                                                                <h2 class="card-liner-title text-white mt-2"><?php echo ucwords(strtolower($row->menu)) ?></h2>
                                                                <!-- <h7 class="card-liner-subtitle text-white"> </h7> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!-- <a href="<?php echo site_url(); ?>/<?php echo $row->link; ?>">
												<img src="<?php echo base_url(); ?>assets/img/<?php echo $row->img; ?>" width="100%" />
											</a> -->
                                            </div>
                                    <?php
                                            $i++;
                                            }
                                        }
                                    }
                                    ?>

                                    <!-- </div> -->
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

</body>
<!-- END: Body-->

</html>