<div class="content-wrapper">
    <section class="content">
        <div class="box" id="kotaktable">
            <div class="box-header with-border">
                <h3 class="box-title">Data PBF</h3>
                <div class="box-tools pull-right">
                    <a class="btn btn-primary" id="tambahpbf">
                        <i class='glyphicon glyphicon-plus'></i> &nbsp;Tambah Data
                    </a>
                </div>
            </div>
            <div class="row">
				<div class="col-md-6">
					<form action="" method="post">
						<div class="col-md-8">
							<input type="text" class="form-control" placeholder="cari..." name="keyword" id="keyword" autocomplete="off" >
						</div>
						<div class="col-md-4">
							<button type="button" class="btn-sm btn-dark" name="cari" id="cari" >Tampilkan</button>
						</div>	
					</form>	
				</div>
			</div>
            <div class="box-body">
                <div id="tablepbf"></div>
            </div>
            <div class="box-footer clearfix">
                <div align="right" id="pagination_link"></div>
            </div>
        </div>
    </section>
</div>
