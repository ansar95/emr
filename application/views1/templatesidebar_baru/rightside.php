<!-- START: Main Menu-->
<div class="sidebar">
            <div class="site-width">
                <!-- START: Menu-->
            <ul id="side-menu" class="sidebar-menu">
			<!-- <img src="<?php echo base_url();?>assets/img/zlogokiri.png" height="48px" width="218px;" > -->
			<?php
			if(isset($menusamping)){
				$this->load->view('templatesidebar/menu/'.$menusamping);
			}
			?>
			</ul>
                <!-- END: Menu-->
                
            </div>
        </div>
        <!-- END: Main Menu-->
