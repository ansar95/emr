<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>SIM</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">
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
	
	