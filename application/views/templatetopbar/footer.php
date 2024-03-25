<footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.5.0
      </div>
      <!-- <strong>Copyright &copy; 2023 <a href="">ELITE INDONESIA</a>.</strong> All rights reserved. -->
      <strong>Copyright &copy; 2023 <a href=""></a>.</strong> All rights reserved.
    </div>
  </footer>
</div>
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<?php
if(isset($js)){
    $this->load->view('support/js/'.$js);
}
?>
