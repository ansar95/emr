<div class="form-group">
    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Asal Rujukan</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <select class="form-control" id="cbasalrujukan" name="cbasalrujukan" disabled>
            <option value="1" <?php if ($faskes == "1") { echo "selected"; }?>>Faskes Tingkat 1</option>
            <option value="2" <?php if ($faskes == "2") { echo "selected"; }?>>Faskes Tingkat 2</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 col-sm-3 col-xs-12 control-label">PPK Asal Rujukan <label style="color:red;font-size:small">*</label></label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <input type="text" class="form-control" id="txtppkasalrujukantxt" name="txtppkasalrujukantxt" value="<?php echo $ppkText?>" disabled>
        <input type="hidden" class="form-control" id="txtppkasalrujukan" name="txtppkasalrujukan" value="<?php echo $ppk?>">
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 col-sm-3 col-xs-12 control-label"><label style="color:gray;font-size:x-small">(yyyy-mm-dd)</label> Tgl.Rujukan</label>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class='input-group date'>
            <input type='text' class="form-control datepicker" id="txttglrujukan" name="txttglrujukan" placeholder="yyyy-MM-dd" maxlength="10" value="<?php echo $txtTanggal?>" disabled/>
            <span class="input-group-addon">
                <span class="fa fa-calendar">
                </span>
            </span>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 col-sm-3 col-xs-12 control-label">No. Rujukan <label style="color:red;font-size:small">*</label></label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <input type="text" class="form-control" id="txtnorujukan" name="txtnorujukan" placeholder="ketik nomor rujukan" maxlength="19" value="<?php echo $norujukan?>" disabled />
    </div>
</div>