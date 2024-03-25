<!-- START: Template CSS-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-ui/jquery-ui.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jquery-ui/jquery-ui.theme.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/simple-line-icons/css/simple-line-icons.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/flags-icon/css/flag-icon.min.css">
<!-- END Template CSS-->

<!-- START: Page CSS-->

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/vendors/chartjs/Chart.min.css">
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

<!-- START: Custom CSS-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template_baru/dist/css/main.css">
<!-- END: Custom CSS-->

<?php
$this->load->view('templatetopbar/header');
// $this->load->view('templatetopbar/topside');
$this->load->view($include);
// $this->load->view('templatetopbar/footer');
if (isset($js)) {
    $this->load->view('support/js/' . $js);
}
?>
</body>

</html>
<!-- cek kembali -->