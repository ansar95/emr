<?php
if ($dtracikandokter_perkode == null) {
?>
	<tr>
		<td class="text-center">
			Belum Ada Order
		</td>
	</tr>
<?php
} else {	
	$i=0;
	foreach($dtracikandokter_perkode as $row) {
?>														
		<tr>
			<td width="67%"><?php echo $row->nama_obat ; ?></td>
			<td width="10%"><?php echo $row->qty ; ?></td>
			<td width="13%"><?php echo $row->satuan ; ?></td>
			<td width="10%"><button onclick="hapusitemracik(<?php echo $row->id;?>)" class="btn btn-danger">Hapus</button></td>
		</tr>
<?php			
	}
}
?>

<script>
		function hapusitemracik(id) {
            $.confirm({
                title: 'Hapus Data',
                // content: 'Yakin menghapus ' + trim(nama_obat) + '?',
                content: 'Yakin menghapus data ini ?',
                buttons: {
                    batal: {
                        text: 'Batal',
                        btnClass: 'btn-red',
                        action: function(){

                        }
                    },
                    hapus: {
                        text: 'Hapus',
                        btnClass: 'btn-blue',
                        keys: ['enter'],
                        action: function(){
                            var no_rm = document.getElementById("no_rm").value;
							var kode_dokter = document.getElementById("kode_dokter").value;
							var koderacikan = document.getElementById("koderacikan").value;
							$.ajax({ 
								url: "<?php echo site_url(); ?>/rme/hapusDetailRacikan",
								type: "GET",
								data: {
									no_rm :no_rm,
									kode_dokter : kode_dokter,
									koderacikan : koderacikan,
									id : id
								},
								success: function(ajaxData) {
									console.log(ajaxData);
									var dt = JSON.parse(ajaxData);
									$("#tabelRacik tbody tr").remove();
									$("#tabelRacik tbody").append(dt.dtview);
									// modalformtutup();
									// tutupmodal();
									},
								error: function(ajaxData) {
									modalformtutup();
									// gagalalert();
								}
							});
                        }
                    }
                }
            });
    	}

</script>
