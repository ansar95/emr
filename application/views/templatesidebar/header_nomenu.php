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
