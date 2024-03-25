<style>
	.example-modal .modal {
		position: relative;
		top: auto;
		bottom: auto;
		right: auto;
		left: auto;
		display: block;
		z-index: 1;
	}

	.example-modal .modal {
		background: transparent !important;
	}

    .nav-tabs.tabs-left {
        border: none;
        border-right: 1px solid #ddd;
    }
    .nav-tabs.tabs-left > li {
        float: none;
        margin-bottom: 0;
        margin-right: -1px;
    }
    .nav-tabs.tabs-left > li > a {
        margin-right: 0;
        margin-bottom: 2px;
        border: 1px solid transparent;
        border-radius: 4px 0 0 4px;
    }
    .nav-tabs.tabs-left > li.active > a {
        border: 1px solid #ddd;
        border-left-color: #3c8dbc;
    }
    .nav-tabs-custom>.nav-tabs.tabs-left>li.active {
        border-left-color: #3c8dbc;
    }
    td,th{
        font-size:11px !important;
        padding: 2px !important;
    }

    .kanan{
        background-color:#CCC;
        color:#000;
        width:200px;
        height:20px;
        left:400px;
        top:200px;
        position:fixed;
        text-align:center;
        border:1px solid #000;
    }
</style>
<link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/select2/css/select2.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/select2/css/select2-bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/jquery-confirm.min.css">
