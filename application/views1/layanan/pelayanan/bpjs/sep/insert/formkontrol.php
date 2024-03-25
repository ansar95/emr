<div class="form-group">
    <label class="col-md-3 col-sm-3 col-xs-12 control-label" id="lblkontrol">No.Surat Kontrol/SKDP <label style="color:red;font-size:small">*</label></label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <input type="text" class="form-control" id="txtnosuratkontrol" placeholder="ketik nomor surat kontrol" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="6">
        <input type="hidden" id="txtidkontrol" />
        <input type="hidden" id="txtnosuratkontrollama" />
        <input type="hidden" id="txtpoliasalkontrol" />
        <input type="hidden" id="txttglsepasalkontrol" />
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 col-sm-3 col-xs-12 control-label">DPJP Pemberi Surat SKDP/SPRI <label style="color:red;font-size:small">*</label></label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <input type="text" class="form-control" id="txtnmdpjp" placeholder="ketik nama dokter DPJP Pemberi Surat SKDP/SPRI">
        <input type="hidden" id="txtkddpjp">
    </div>
</div>