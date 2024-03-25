<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>SIMRS</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<!-- START: Template CSS-->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template_baru/dist/vendors/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template_baru/dist/vendors/jquery-ui/jquery-ui.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template_baru/dist/vendors/jquery-ui/jquery-ui.theme.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template_baru/dist/vendors/simple-line-icons/css/simple-line-icons.css">        
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template_baru/dist/vendors/flags-icon/css/flag-icon.min.css">         
        <!-- END Template CSS-->

        <!-- START: Page CSS-->
        <link rel="stylesheet"  href="<?php echo base_url();?>assets/template_baru/dist/vendors/chartjs/Chart.min.css">
        <!-- END: Page CSS-->

        <!-- START: Page CSS-->   
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template_baru/dist/vendors/morris/morris.css"> 
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template_baru/dist/vendors/weather-icons/css/pe-icon-set-weather.min.css"> 
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template_baru/dist/vendors/chartjs/Chart.min.css"> 
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template_baru/dist/vendors/starrr/starrr.css"> 
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template_baru/dist/vendors/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template_baru/dist/vendors/ionicons/css/ionicons.min.css"> 
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template_baru/dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.css">
        <!-- END: Page CSS-->

        <!-- START: Custom CSS-->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template_baru/dist/css/main.css">
		<?php
		if(isset($css)){
			$this->load->view('support/css/'.$css);
		}
		?>
		<style>
			.table th, .table td { 
				border-top: none !important; 
			}
			td {
				font-size: 11px;
			}
		</style>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/font/darifontsgoogleapis.css">
	</head>
	<body id="main-container" class="default">
		<!-- START: Pre Loader-->
        <div class="se-pre-con">
            <div class="loader"></div>
        </div>
        <!-- END: Pre Loader-->
		<!-- START: Header-->
        <div id="header-fix" class="header fixed-top">
            <div class="site-width">
                <nav class="navbar navbar-expand-lg  p-0">
                    <div class="navbar-right ml-auto h-100">
                        <ul class="ml-auto p-0 m-0 list-unstyled d-flex top-icon h-100">
                            
                            <li class="dropdown user-profile align-self-center d-inline-block">
                                <a href="#" class="nav-link py-0" data-toggle="dropdown" aria-expanded="false"> 
								<span class="hidden-xs"><?php echo $this->session->userdata("nama");?></span>
                                </a>

                                <div class="dropdown-menu border dropdown-menu-right p-0">
                                    <a href="<?php echo site_url();?>/users/ubahpassglobal" class="dropdown-item px-2 align-self-center d-flex">
                                        <span class="icon-pencil mr-2 h6 mb-0"></span> Ganti Password</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="<?php echo site_url();?>/login/keluar" class="dropdown-item px-2 text-danger align-self-center d-flex">
                                        <span class="icon-logout mr-2 h6  mb-0"></span> Sign Out</a>
                                </div>

                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- END: Header-->
		
