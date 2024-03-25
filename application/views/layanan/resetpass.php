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
    yy <?php
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
            <div class="row mt-5 justify-content-center">
                <div class="col-12 col-md-6">
                    <h6 class="box-title my-4">Ubah Password</h6>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Password Lama</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="pl" name="pl" placeholder="" autocomplete='off'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Password Baru</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="pb" name="pb" placeholder="" autocomplete='off'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Konfirmasi Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="up" name="up" placeholder="" autocomplete='off'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <button type="submit" class="btn btn-info pull-right" onclick="kirim()">Ubah</button>
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