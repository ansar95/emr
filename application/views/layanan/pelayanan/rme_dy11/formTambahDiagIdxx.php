
 <div class="modal-dialog modal-lg modal-dialog-centered" style="margin: 0 auto;">
    <div class="modal-content">
        <div class="box box-default box-solid" id="kotakform">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Obat Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<div class="col-md-5">
                    <div class="col-sm-12">
						<div class="form-group row col-spacing-row">
							<label for="select-tools" class=" col-sm-2">Diagnosa </label>
							<div class="col-sm-12">
								<select id="select-tools" multiple data-allow-clear="1">
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <button onclick="Batal()" class="btn btn-danger">Batal</button>
                        </div>
                        <div class="col-6 text-right">
                            <button onclick="SaveDetail()" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>

                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
    <script>

        $(document).ready(function() {
            $('#produk').select2();
        });

        function modalform() {
            $("#kotakform").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        }

        function modalformtutup() {
            $(".overlay").remove();
        }

        function tutupmodal() {
            $(function () {
                $("#formmodal").modal("toggle");
            });
        }

        function kuranglengkap() {
            $.notify("Data Kurang Lengkap", "error");
        }


        $('#select-tools').selectize({
		maxItems: null,
		valueField: 'icd_code',
		labelField: 'icd_code',
		searchField: 'icd_code',
		options: [
			<?php
			foreach($dtdiagnosa as $row) {
				?>
				{icd_code: '<?php echo $row->icd_code;?>', diagnosa: '<?php echo $row->diagnosa;?>'},
				<?php
			}
			?>
		],
		create: false
	});

// assets/js/diagnosa.js

document.addEventListener('DOMContentLoaded', function() {
    const inputElement = document.getElementById('caridiagnosa');
    const produk = document.getElementById('produk');

    // Menangani perubahan pada input teks
    inputElement.addEventListener('input', function() {
        const keyword = inputElement.value.trim();
        
        // Jika karakter mencapai 3, panggil fungsi pencarian
        if (keyword.length === 3) {
            search(keyword);
        } else {
            // Jika kurang dari 3 karakter, kosongkan hasil
            clearResults();
        }
    });

    // Fungsi untuk melakukan pencarian dengan AJAX
    function search(keyword) {
        // Ganti URL sesuai dengan alamat controller dan method Anda
        const url = "<?php echo site_url(); ?>/DiagnosaController/search";
        fetch(url, {
            method: 'POST',
            body: `caridiagnosa=${keyword}`,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        })
            .then(response => response.json())
            .then(data => {
                // Hapus semua elemen dalam <select>
                clearResults();

                // Tambahkan hasil pencarian ke dalam <select>
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.icd_code;
                    option.textContent = item.jenis_penyakit_local;
                    produk.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    // Fungsi untuk menghapus semua elemen dalam <select>
    function clearResults() {
        while (produk.firstChild) {
            produk.removeChild(produk.firstChild);
        }
    }
});

</script>

