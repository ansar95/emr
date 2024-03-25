<div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title" id="headRujukan"></h3>
        </div>
        <form class="form-horizontal">
            <div class="modal-body">
                <div class="form-group" id="divRujukanKartu">
                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">No.Kartu</label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <input class="form-control" id="txtrujukan_kartu" placeholder="ketik no.kartu" maxlength="13">
                    </div>
                </div>
                <div class="form-group" id="divRujukanTanggal">
                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Tanggal</label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class='input-group date'>
                            <input type='text' class="form-control datepicker" id="txtrujukan_tanggal" placeholder="yyyy-MM-dd" maxlength="10" />
                            <span class="input-group-addon">
                                <span class="fa fa-calendar">
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-12"></div>
                    <div class="col-md-3 col-sm-3 col-xs-12">

                        <button class="btn btn-danger" id="btnpopup_carirujukan" type="button" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing Order"><i class="fa fa-search"></i> Cari</button>
                    </div>
                </div>


                <table class="table table-striped table-bordered" cellpadding="0" width="100%" id="tblPopup_Rujukan" style="font-size:small">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No.Rujukan</th>
                            <th>Tgl.Rujukan</th>
                            <th>No.Kartu</th>
                            <th>Nama</th>
                            <th>PPK Perujuk</th>
                            <th>Sub/Spesialis</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </form>
    </div>

</div>