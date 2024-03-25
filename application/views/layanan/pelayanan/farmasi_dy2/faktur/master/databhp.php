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

    <div class="row">
        <section class="content col-12">
            <div class="card" id="kotaktable">
                <div class=" card-header with-border d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Data BHP</h5>
                    <div class="card-tools pull-right">
                        <button class="btn btn-primary" id="tambahbhp">
                            <i class='fa fa-plus'></i> &nbsp;Tambah Data
                        </button>
                    </div>
                </div>

                
                <div class="row my-2 mx-1">
                    <div class="col-md-6">
                        <form action="" method="post" class= "form-group row col-spacing-row">
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Cari..." name="keyword" id="keyword" autocomplete="off" >
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-sm btn-dark" name="cari" id="cari" >Tampilkan</button>
                            </div>	
                        </form>	
                    </div>
                </div>
                
                <div class="card-body">
                    <div id="tablebhp"></div>
                </div>
                <div class="card-footer clearfix">
                    <div align="right" id="pagination_link"></div>
                </div>
            </div>
        </section>
    </div>
</main>

