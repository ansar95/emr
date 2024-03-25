<main>
	<div class="container-fluid site-width">
		<!-- START: Breadcrumbs-->
		<div class="row">
			<div class="col-12  align-self-center">
				<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				</ol>
			</div>
		</div>
	</div>
	<!-- END: Breadcrumbs-->
	<div class="row">
	<section class="content col-12">
		<div class="card" id="kotaktable">
			<div class="card-header with-border d-flex justify-content-between align-items-center">
				<h6 class="card-title">Data Bahan Makanan</h6>
				<div class="d-flex justify-content-between align-items-center pull-right">
                    <?php
                    $id = $this->session->userdata("idx");
                    if (ceksess("NEW", $id) == TRUE) {
                        ?>
                        <button class="btn btn-primary" id="tambahbahan">
                            <i class='icon-plus'></i> &nbsp;Tambah Data
                        </button>
                        <?php
                    }
                    ?>
				</div>
			</div>
			<div class="card-body">
				<div id="tablebahan"></div>
			</div>
			<div class="box-footer clearfix">
				<div align="right" id="pagination_link"></div>
            </div>
		</div>
	</section>
</div>
</main>

