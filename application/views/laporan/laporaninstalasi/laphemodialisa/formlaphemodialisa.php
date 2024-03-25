<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Laporan Penjualan Hemodialisa</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-body pad table-responsive">
                            <form target="_blank" action="<?php echo site_url();?>/laporanpasien/indkatorcetak" method="post">
                                <table class="table text-left" bordercolor="#ffffff" >
                                    <tr >
                                        <td width="5%">
                                            <label>Periode</label>
                                        </td>
                                        <td width="20%">
                                            <input id="period" type="text" name="period" class=" col-sm-7" required autocomplete="off">
                                        </td>
                                        <td width="75%"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <div class="input-group col-sm-12">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-print"></i>
                                                </div>
                                                <input class="btn-sm btn-block" type="submit" name="rp" value="Indikator Rumah Sakit Semua Unit">
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <div class="input-group col-sm-12">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-print"></i>
                                                </div>
                                                <input class="btn-sm btn-block" type="submit" name="dpjp" value="Indikator Rumah sakit per Unit">
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
