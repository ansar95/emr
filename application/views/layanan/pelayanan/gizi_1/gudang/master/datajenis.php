<div class="content-wrapper">
	<section class="content">
		<div class="box" id="kotaktable">
			<div class="box-header with-border">
				<h3 class="box-title">Data Jenis Makanan</h3>
				<div class="box-tools pull-right">
                    <?php
                    $id = $this->session->userdata("idx");
                    if (ceksess("NEW", $id) == TRUE) {
                        ?>
                        <a class="btn btn-primary" id="tambahjenis">
                            <i class='glyphicon glyphicon-plus'></i> &nbsp;Tambah Data
                        </a>
                        <?php
                    }
                    ?>
				</div>
			</div>
			<div class="box-body">
				<div id="tablejenis"></div>
			</div>
			<div class="box-footer clearfix">
				<div align="right" id="pagination_link"></div>
            </div>
		</div>
	</section>
</div>
