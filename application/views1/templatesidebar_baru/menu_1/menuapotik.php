<li>
	<a href="<?php echo site_url();?>/applayanan/appapotik">
		<i class="fa fa-dashboard"></i> <span>Dashboard</span>
	</a>
</li>
<li class="header">Menu Utama</li>
<li>
	<a href="<?php echo site_url();?>/depoapotik/listresepobat">
		<i class="fa fa-dashboard"></i> <span>Resep Obat</span>
	</a>
</li>
<li>
<!-- <a href="<?php echo site_url();?>/depoapotik/laporandepo">
		<i class="fa fa-dashboard"></i> <span>Laporan Rekapitulasi Resep</span>
	</a>
</li> -->
<li class="treeview" >
	<a href="#">
		<i class="fa fa-edit"></i> <span>Laporan</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
		<li><a href="<?php echo site_url();?>/depoapotik/laporandepo"><i class="fa fa-pencil"></i> Resep</a></li>
		<li><a href="<?php echo site_url();?>/depoapotik/laporanrekapobat"><i class="fa fa-pencil"></i> Rekap Obat</a></li>
		<li><a href="<?php echo site_url();?>/depoapotik/laporanperpasien"><i class="fa fa-pencil"></i> Resep Pasien</a></li>
		<li><a href="<?php echo site_url();?>/depoapotik/laporandepobulanan"><i class="fa fa-pencil"></i> Rekap Resep Periode</a></li>
	</ul>
</li>

<li>
	<a href="<?php echo site_url();?>/depoapotik/datapasien">
		<i class="fa fa-dashboard"></i> <span>Data Pasien</span>
	</a>
</li>