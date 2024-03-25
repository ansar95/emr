<html>
<head>
<style type="text/css">
.style5 {font-family: Arial, Helvetica, sans-serif; font-size: 13px; }
.style6 {font-size: 10px}
.style7 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; }
.style8 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
</style>
</head>

<body>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="2">
      <tr>
         <td width="18%" rowspan="2"><img src="<?php echo base_url('assets/img/logo_bpjs_sep.jpg')?>" width="168" height="40"></td>
        <td width="73%"><span class="style8">SURAT ELEGIBILITAS PESERTA </span></td>
      </tr>
      <tr>
        <td><span class="style8"><?php echo ' '.getenv('V_NAMARS'); ?> </span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="15">&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="15%"><span class="style5">No.SEP</span></td>
        <td width="1%"><span class="style5">:</span></td>
        <td width="43%"><span class="style5"><?php echo $sep->no_sep;?></span></td>
        <td width="13%"><span class="style6"></span></td>
        <td width="1%"><span class="style6"></span></td>
        <td width="27%"><span class="style6"></span></td>
      </tr>
      <tr>
        <td><span class="style5">Tgl.SEP</span></td>
        <td><span class="style5"> :</span></td>
        <td><span class="style5"><?php echo $sep->tgl_sep;?></span></td>
        <td><span class="style5">Peserta</span></td>
        <td><span class="style5">:</span></td>
        <td><span class="style5"><?php echo $sep->peserta_jns_peserta;?></span></td>
      </tr>
      <tr>
        <td><span class="style5">No.Kartu</span></td>
        <td><span class="style5">:</span></td>
        <td><span class="style5"><?php echo $sep->peserta_no_kartu. ' ('.$sep->peserta_no_mr.')';?></span></td>
        <td><span class="style5">COB</span></td>
        <td><span class="style5">:</span></td>
        <td><span class="style6">-</span></td>
      </tr>
      <tr>
        <td><span class="style5">Nama Peserta </span></td>
        <td><span class="style5">:</span></td>
        <td class="style5"><?php echo $sep->peserta_nama;?></td>
        <td><span class="style5">Jns.Rawat</span></td>
        <td><span class="style5">:</span></td>
        <td><span class="style5"><?php echo $sep->jns_pelayanan;?></span></td>
      </tr>
      <tr>
        <td><span class="style5">Tgl.Lahir</span></td>
        <td><span class="style5">:</span></td>
        <td><span class="style5"><?php echo $sep->peserta_tgl_lahir.'  Kelamin : '.$sep->peserta_kelamin ;?></span></td>
        <td><span class="style5">Kls.Rawat</span></td>
        <td><span class="style5">:</span></td>
        <td><span class="style5"><?php echo $sep->peserta_hak_kelas;?></span></td>
      </tr>
      <tr>
        <td><span class="style5">No.Telepon</span></td>
        <td><span class="style5">:</span></td>
        <td><span class="style6">(peserta_no_telp)</span></td>
        <td><span class="style5">Penjamin</span></td>
        <td><span class="style5">:</span></td>
        <td><span class="style5"><?php echo $sep->penjamin;?></span></td>
      </tr>
      <tr>
        <td><span class="style5">Sub/Spesialis</span></td>
        <td><span class="style5">:</span></td>
        <td class="style5"><?php echo $sep->poli;?></td>
        <td><span class="style6"></span></td>
        <td><span class="style6"></span></td>
        <td><span class="style6"></span></td>
      </tr>
      <tr>
        <td><span class="style5">Faskes Perujuk </span></td>
        <td><span class="style5">:</span></td>
        <td><span class="style5"><?php echo $sep->ppk_rujukan_nama;?></span></td>
        <td><span class="style6"></span></td>
        <td><span class="style6"></span></td>
        <td><span class="style6"></span></td>
      </tr>
      <tr>
        <td><span class="style5">Diagnosa Awal </span></td>
        <td><span class="style5">:</span></td>
        <td><span class="style5"><?php echo $sep->diagnosa;?></span></td>
        <td><span class="style6"></span></td>
        <td><span class="style6"></span></td>
        <td><span class="style6"></span></td>
      </tr>
      <tr>
        <td><span class="style5">Catatan</span></td>
        <td><span class="style5">:</span></td>
        <td><span class="style5"><?php echo $sep->catatan;?></span></td>
        <td><span class="style6"></span></td>
        <td><span class="style6"></span></td>
        <td><span class="style6"></span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="68%" class="style7">* Saya menyetujui BPJS Kesehatan menggunakan informasi medis pasien jika diperlukan </td>
        <td width="32%" class="style5">Pasien/Keluarga Pasien</td>
      </tr>
      <tr>
        <td class="style7">* SEP bukan sebagai bukti penjamin peserta </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>___________________</td>
      </tr>
      <tr>
        <td class="style7">Cetakan ke &lt;cetakan&gt; &lt;tgl_cetak&gt; &lt;jam_cetak&gt; </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
