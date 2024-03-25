<li class="dropdown active"><a href="#"> Manajemen MUTU</a>
	<ul>
		<li>
			<a href="<?php echo site_url();?>/mutu/dashboard">
				<i class="fa fa-home"></i><span>Dashboard</span>
			</a>
		</li>
        <li>
			<a href="<?php echo site_url();?>/mutu/indikatormutulayanan">
				<i class="fa fa-pen"></i><span>Data</span>
			</a>
		</li>
		<li class="dropdown"><a href="#"><i class="fa fa-folder"></i>Laporan</a>
			<ul class="sub-menu">
				<li><a href="<?php echo site_url();?>/mutu/laporanmutu?periode=bulan"><i class="fa fa-circle-o"></i> Bulan</a></li>
				<li><a href="<?php echo site_url();?>/mutu/laporanmutu?periode=triwulan"><i class="fa fa-circle-o"></i> Triwulan</a></li>
				<li><a href="<?php echo site_url();?>/mutu/laporanmutu?periode=semester"><i class="fa fa-circle-o"></i> Semester</a></li>
				<li><a href="<?php echo site_url();?>/mutu/laporanmutu?periode=tahun"><i class="fa fa-circle-o"></i> Tahun</a></li>
			</ul>
		</li>
		<li>
			<a href="<?php echo site_url();?>/mutu/masterindikatormutu">
				<i class="fa fa-cog"></i><span>Master Data Indikator</span>
			</a>
		</li>
	</ul>
</li>
