<div class="modal-dialog modal-xl" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">History Pasien</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div id="tablehistory"></div>
			<div id="pagination_link_history" class="d-flex flex-row-reverse mt-3">
			</div>
			<br>
			<div id="tabledetail"></div>
			<br>

			<div class="row">
				<div class="col-12 text-right">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Keluar</button>
				</div>
			</div>
		</div>
	</div>
	<script>
		function load_data_history(page) {
			$.ajax({
				url: "<?php echo site_url(); ?>/registrasipasien/paginationhistorypasien/" + page,
				method: "GET",
				dataType: "json",
				data: {
					id: dataid
				},
				success: function(data) {
					hapusload();
					$('#tablehistory').html(data.pasien);
					$('#pagination_link_history').html(data.pagination_link);
				}
			});
		}
		$(document).ready(function() {
			load_data_history(1);
			console.log("jalan");
			$(document).on("click", "#hist li a", function(event) {
				event.preventDefault();
				var page = $(this).data("ci-pagination-page");
				load_data_history(page);
			});

		});

		function ambildetail(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/registrasipasien/lihatdetailregis/" + id,
				method: "GET",
				dataType: "json",
				success: function(data) {
					hapusload();
					$('#tabledetail').html(data.pasien);
				}
			});
		}
	</script>