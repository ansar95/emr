<!DOCTYPE html>
<html lang="en">
    <!-- START: Head-->
    <head>
        <meta charset="UTF-8">
        <title>SIMRS</title>
        <link rel="shortcut icon" href="dist/images/favicon.ico" />
        <meta name="viewport" content="width=device-width,initial-scale=1"> 

        <!-- START: Template CSS-->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template_baru/dist/vendors/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-ui/jquery-ui.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-ui/jquery-ui.theme.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/simple-line-icons/css/simple-line-icons.css">        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/flags-icon/css/flag-icon.min.css"> 
        <!-- END Template CSS-->     

        <!-- START: Page CSS-->   
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/social-button/bootstrap-social.css"/>   
        <!-- END: Page CSS-->

        <!-- START: Custom CSS-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/css/main.css">
        <!-- END: Custom CSS-->
      
    </head>
    <!-- END Head-->

    <!-- START: Body-->
    <!-- <body id="main-container" class="bg-image" style=" background-image: url('<?php echo site_url();?>/../assets/img/backgroundLB.jpg'); background-size: cover;"> -->
    <!-- <body id="main-container" class="bg-image" style=" background-image: url('<?php echo site_url();?>/../assets/img/backgroundbarru.jpg'); background-size: cover;"> -->

    <!-- <body id="main-container"> -->
    <!-- <body id="main-container" class="bg-image" style=" background-image: url('<?php echo site_url();?>/../assets/img/backgroundbarru.jpg'); background-size: cover;"> -->
        <!-- START: Main Content-->
        <div class="container" >
            <div class="row vh-100 justify-content-between align-items-center">
                <div class="col-12">
                    <form action="<?php echo site_url();?>/login/masuk" method="post" class="row row-eq-height lockscreen  mt-5 mb-5">
                        <div class="lock-image col-12 col-sm-5 p-4"><img src="<?php echo site_url();?>/../assets/image/logorsuddaya_login.png"  width="180" height="250" /></div>
                        <!-- <div class="lock-image col-12 col-sm-5 p-4"><img src="<?php echo site_url();?>/../assets/img/logobarru.png"  width="210" height="250" /></div> -->
                        <!-- <div class="lock-image col-12 col-sm-5 p-4"><img src="<?php echo site_url();?>/../assets/img/LOGO244_300.png"  width="210" height="250" /></div> -->

                        <div class="login-form col-12 col-sm-7">
                            <div class="form-group mb-3">
                                <label>REKAM MEDIK ELEKTRONIK</label>
                            </div>
                            <div class="form-group mb-3">
                                <label for="emailaddress">Username</label>
                                <input class="form-control" type="text" id="us" name="us" required="" placeholder="Enter your email">
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" required="" id="ps" name="ps" placeholder="Enter your password">
                            </div>

                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked="">
                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <button class="btn btn-primary" type="submit"> Log In </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
    <!-- END: Body-->
</html>
