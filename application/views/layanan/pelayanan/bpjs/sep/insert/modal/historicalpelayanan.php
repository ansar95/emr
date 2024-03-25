<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Histori Pelayanan</h4>
        </div>
        <div class="modal-body">
            <div class="form-horizontal">
                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Tanggal</label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class='input-group date'>
                            <input type='text' class="form-control datepicker" id="txtTgl1" placeholder="yyyy-MM-dd" maxlength="10" />
                            <span class="input-group-addon">
                                <span class="fa fa-calendar">
                                </span>
                            </span>
                            <span class="input-group-addon">
                                s.d
                            </span>
                            <input type='text' class="form-control datepicker" id="txtTgl2" placeholder="yyyy-MM-dd" maxlength="10" />
                            <span class="input-group-addon">
                                <span class="fa fa-calendar">
                                </span>
                            </span>
                        </div>

                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">`
                        <button type="button" id="btnCariHistori" class="btn btn-primary pull-left"><i class="fa fa-search"></i> Cari</button>
                    </div>
                </div>

                <table class="table table-bordered table-striped" cellpadding="0" width="100%" id="tblHistori" style="font-size:small">
                    <thead>
                        <tr>
                            <th>No.SEP</th>
                            <th>RI/RJ</th>
                            <th>Tgl.SEP</th>
                            <th>Tgl.Pulang</th>
                            <th>Diagnosa</th>
                            <th>No.Rujukan</th>
                            <th>Spesialis/Subspesialis</th>
                            <th>PPK Pelayanan</th>
                        </tr>

                    </thead>
                </table>


            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>