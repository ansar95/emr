<!-- <footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>Version</b> 1.0.0
	</div>
	<strong>Copyright &copy; 2021 <a href="">Aistech Global Solution</a>.</strong> All rights reserved.
</footer> -->
<div class="control-sidebar-bg"></div>

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
<!-- <script src="dist/js/home.script.js"></script> -->

<?php
if (isset($addjs)) {
	$this->load->view('support/js/' . $addjs);
}
?>