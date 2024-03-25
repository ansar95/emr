<div class="modal" tabindex="-1" role="dialog" id="formmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <strong class="modal-title">Indikator Mutu</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="">
			<div class="form-group">
				<label for="">Jenis</label>
				<select name="" id="" class="form-control">
					<option value="">-- Pilih --</option>
				</select>
			</div>
			<div class="form-group">
				<label for="">Penilaian</label>
				<select name="" id="" class="form-control">
					<option value="">-- Pilih --</option>
				</select>
			</div>
			<div class="form-group">
				<label for="">Target</label>
				<input type="number" class="form-control" value="0">
			</div>
			<div class="form-group">
				<label for="">Pelaksana</label>
				<select name="" id="" class="form-control" multiple>
					<optgroup label="Rawat Inap">
						<option>1</option>
						<option>2</option>
					</optgroup>
				</select>
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
    // const formmodal = $("#formmodal")

    // $("document").ready(function() {
    //     $("#add").click(function() {
    //         formmodal.modal('show', {backdrop: 'true'})
    //     }) 
    // })
</script>