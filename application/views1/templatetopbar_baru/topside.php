<header class="main-header">
	<nav class="navbar navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<?php
				if ($backhome == "dua") {
				?>
				<a href="<?php echo site_url();?>/applayanan/menuapp" class="navbar-brand">
					<i class="fa fa-home"></i> Menu Utama
				</a>
				<?php
				} else if ($backhome == "tiga") {
				?>
				<a href="<?php echo site_url();?>/applayanan/menuapppelayanan" class="navbar-brand">
					<i class="fa fa-home"></i> Menu Pelayanan
				</a>
				<?php
				} else if ($backhome == "empat") {
				?>
				<a href="javascript:history.back();" class="navbar-brand">
					<i class="fa fa-arrow-left"></i> Kembali
				</a>
                <?php
                } else if ($backhome == "pass") {
                    ?>
                    <a href="javascript:history.back();" class="navbar-brand">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
				<?php
				}
				?>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<i class="fa fa-bars"></i>
				</button>
			</div>
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<!-- <img src="<?php echo base_url();?>assets/dist/img/avatar5.png" class="user-image" alt="User Image"> -->
							<span class="hidden-xs"><?php echo $this->session->userdata("nmuser");?></span>
						</a>
						<ul class="dropdown-menu">
							<li class="user-header">
								<!-- <img src="<?php echo base_url();?>assets/dist/img/avatar5.png" class="img-circle" alt="User Image"> -->
								<p>
								<?php echo $this->session->userdata("nmuser");?>
								</p>
							</li>
							<li class="user-footer">
								<div class="pull-left">
									<a href="<?php echo site_url();?>/users/ubahpassglobal" class="btn btn-default btn-flat">Ganti Password</a>
								</div>
								<div class="pull-right">
									<a href="<?php echo site_url();?>/login/keluar" class="btn btn-default btn-flat">Sign out</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
