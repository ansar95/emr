<li class="dropdown active"><a href="#">
		<!-- <i class="icon-layers mr-1"></i> -->
		Registrasi Pasien
	</a>
	<ul>
		<li>
			<a href="<?php echo site_url(); ?>/registrasipasien">
				<i class="fa fa-user"></i> <span>Data Pasien</span>
			</a>
		</li>
		<li class="dropdown"><a href="#"><i class="fa fa-edit"></i> <span>Register Pelayanan</span></a>
			<ul class="sub-menu">
				<li><a href="<?php echo site_url(); ?>/registrasipasien/dataregistrasiurj"><i class="fa fa-pencil"></i> Rawat Jalan</a></li>
				<li><a href="<?php echo site_url(); ?>/registrasipasien/dataregistrasiuri"><i class="fa fa-pencil"></i> Rawat Inap</a></li>
				<li><a href="<?php echo site_url(); ?>/registrasipasien/dataregistrasiugd"><i class="fa fa-pencil"></i> IGD</a></li>
			</ul>
		</li>
		<li>
			<a href="<?php echo site_url(); ?>/registrasipasien/pengelolaanpasien">
				<i class="fa  fa-user"></i> <span>Pengelolaan Pasien</span>
			</a>
		</li>
		<li>
			<a href="<?php echo site_url(); ?>/registrasipasien/statusrm">
				<i class="fa fa-user"></i> <span>Status RM</span>
			</a>
		</li>
	</ul>
</li>