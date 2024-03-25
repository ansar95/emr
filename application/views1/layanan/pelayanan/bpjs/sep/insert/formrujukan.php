<div class="row spacing-row mt-1">
    <div class="col-md-12">
        <div class="row form-group">
            <label class="col-md-2 col-sm-3 col-xs-12 col-form-label">Asal Rujukan</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" id="cbasalrujukan" name="cbasalrujukan">
                    <option value="1">Faskes Tingkat 1</option>
                    <option value="2">Faskes Tingkat 2</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row spacing-row">
    <div class="col-md-12">
        <div class="row form-group">
            <label class="col-md-2 col-sm-2 col-xs-12 col-form-label">PPK Asal Rujukan <label style="color:red;font-size:small">*</label></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" style="width: 100%;" name="txtppkasalrujukankode" id="txtppkasalrujukankode" disabled>
                    <option value="<?php echo $ppk?>"><?php echo $ppkText?></option>
                </select>
                <input type="hidden" class="form-control" id="txtppkasalrujukantxt" name="txtppkasalrujukantxt" value="<?php echo $ppkText?>">
                <input type="hidden" class="form-control" id="txtppkasalrujukan" name="txtppkasalrujukan" value="<?php echo $ppk?>">
            </div>
        </div>
    </div>
</div>

<div class="row spacing-row">
    <div class="col-md-12">
        <div class="row form-group">
            <label class="col-md-2 col-sm-3 col-xs-12 col-form-label"><label style="color:gray;font-size:x-small">(yyyy-mm-dd)</label> Tgl.Rujukan</label>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class='input-group date'>
                    <input type='date' class="form-control datepicker" id="txttglrujukan" name="txttglrujukan" placeholder="yyyy-MM-dd" maxlength="10" />
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row spacing-row">
    <div class="col-md-12">
        <div class="row form-group">
            <label class="col-md-2 col-sm-3 col-xs-12 col-form-label">No. Rujukan <label style="color:red;font-size:small">*</label></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" class="form-control" id="txtnorujukan" name="txtnorujukan" placeholder="ketik nomor rujukan" maxlength="19">
            </div>
        </div>
    </div>
</div>

