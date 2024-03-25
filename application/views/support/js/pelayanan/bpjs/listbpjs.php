<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/select2/js/select2.full.min.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/template_baru/dist/js/select2.script.js"></script> -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/jquery-confirm.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/salert.js"></script>

<div class="modal fade" id="formmodal" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">

	<script type="text/javascript">

function modaldetail() {
        $("#kotakdetail").append('<div class="overlay" id="detailmodal"><div class="d-flex justify-content-center py-5"><i class="fa fa-lock"></i></div>');
    }

    function modaldetailtutup() {
        $("#detailmodal").remove();
    }

		$(function() {
			$('#period').datepicker( {
				format: "MM yyyy",
				viewMode: "months",
				minViewMode: "months",
				autoclose: true
			});

			$('#period').on('dp.hide', function(event){
				setTimeout(function(){
					// $('#period').data('DateTimePicker').viewMode('months').format("MM yyyy");
					$('#period').datepicker( {
						format: "MM yyyy",
						viewMode: "months",
						minViewMode: "months",
						autoclose: true
					});
				},1);
			});
		});

		// $(function() {
		// 	$('pelayanan').select2({
		// 		tags: true
		// 	});
		// });

		function prosesload() {
			$("#kotak").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
		}

		function hapusload() {
			$(".overlay").remove();
		}

		

		$(document).ready(function() {
			$("#caridata1").click(function(e) {
				prosesload();
				var unit = document.getElementById("unitselect").value;
				var nrp = document.getElementById("nrp").value;
				var dokter = document.getElementById("dokter").value;
				var tglp = document.getElementById("tglp").value;
				console.log(dokter);

				if ((unit == "") && (nrp == "")) {
					hapusload();
					return;
				}
				$.ajax({
					url: "<?php echo site_url(); ?>/urj/caripasienurj",
					type: "GET",
					data: {
						unit: unit,
						nrp: nrp,
						dokter : dokter,
						tglp1 : tglp
					},
					success: function(ajaxData) {
						$("#barispasien tbody tr").remove();
						$("#barispasien tbody").append(ajaxData);
						hapusload();
					}
				});

			});
		});


		function lanjutproses() {
			var period = $("#period").val();
			if (period == "" ) {
				// kuranglengkap();
				return;
			}
			$.ajax({
				url: "<?php echo site_url();?>/bpjs/listPersetujuan",
				type: "GET",
				data: {
					period: period
				},
				success: function (ajaxData){
					// swal(ajaxData);
					var dt = JSON.parse(ajaxData);
					if (dt.code !=200) {
						swal(dt.message);
					} else {
						// $("#tabletanggal").html(dt.dtview);
						// $("#tableampra tbody").html('<tr><td colspan="9" class="text-center">Tidak Ada Data</td></tr>');
						// modaldetailtutup();
					}
				},
				error: function(data) {
					gagalalert();
					modaldetailtutup();
				}
			});
		}

		function addpersetujuan() {
			modaldetail();
			var period = $("#period").val();

			$.ajax({
				url: "<?php echo site_url();?>/bpjs/tambahpersetujuan",
				type: "GET",
				data: {
					period: period
				},
				success: function (ajaxData) {
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {backdrop: 'true'});
					modaldetailtutup();
				},
				error: function (data) {
					gagalalert();
					modaldetailtutup();
				}
			});
		}

		function panggildokter(id) {
			prosesload();
			var unit = $("#unitselect").val();
			$.ajax({
				url: "<?php echo site_url(); ?>/urj/panggilurjdokterform",
				type: "GET",
				data: {
					id: id,
					unit: unit
				},
				success: function(ajaxData) {
					hapusload();
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
				}
			});
		}

		function panggilantrian(id) {
			var dt = id.split("_");
			var noantriannya = dt[1];
			var namanya = dt[2];
			var idnya = dt[0];

			var unit = $("#unitselect").val();
			var tglp1 = document.getElementById("tglp").value;

			$.ajax({
				url: "<?php echo site_url(); ?>/urj/prosesantrian",
				type: "GET",
				data: {
					id: id,
					unit: unit,
					idnya: idnya,
					tglp1: tglp1
				},
				success: function(ajaxData) {
					swal("Anda Memanggil Antrian " + noantriannya, namanya);
					$("#barispasien tbody tr").remove();
					$("#barispasien tbody").append(ajaxData);
				}
			});
		}

		function cekproses(id) {
			$.ajax({
				url: "<?php echo site_url(); ?>/urj/panggilurjdokterform",
				type: "GET",
				data: {
					id: id,
					unit: unit
				},
				success: function(ajaxData) {
					hapusload();
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
				}
			});
		}

		function berkassampai(id) {
			var dt = id.split("_");
			var idreg = dt[0];
			var namanya = dt[1];
			// var unit = document.getElementById("unit").value;
			var unit = document.getElementById("unitselect").value;
			var tglp = document.getElementById("tglp").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/urj/berkassampaipoli",
				type: "GET",
				data: {
					idreg: idreg,
					nama_pasien: namanya,
					unit: unit,
					tglp1 : tglp
				},
				success: function(ajaxData) {
					swal("Berkas " + namanya, "sudah diterima poli...");
					$("#barispasien tbody tr").remove();
					$("#barispasien tbody").append(ajaxData);
				}
			});
		}

		function berkaskembali(id) {
			var dt = id.split("_");
			var idreg = dt[0];
			var namanya = dt[1];
			var unit = document.getElementById("unitselect").value;
			var tglp = document.getElementById("tglp").value;
			$.ajax({
				url: "<?php echo site_url(); ?>/urj/berkaskembalikerm",
				type: "GET",
				data: {
					idreg: idreg,
					nama_pasien: namanya,
					unit: unit,
					tglp1 : tglp
				},
				success: function(ajaxData) {
					swal("Berkas " + namanya, "dikembalikan...");
					$("#barispasien tbody tr").remove();
					$("#barispasien tbody").append(ajaxData);
				}
			});
		}

		//SOAP
		function panggilsoap(id) {
			var dt = id.split("_");
			if (dt[1] == "") {
				$.alert({
					title: 'Rawat Jalan',
					content: "Isi Nama Dokter Terlebih Dahulu",
				})
				return;
			}

			prosesload();
			var unit = $("#unitselect").val();
			$.ajax({
				url: "<?php echo site_url(); ?>/urj/panggilsoap",
				type: "GET",
				data: {
					notrans: dt[0],
					unit: unit,
					no_rm: dt[2]
				},
				success: function(ajaxData) {
					hapusload();
					$("#formmodal").html(ajaxData);
					$("#formmodal").modal('show', {
						backdrop: 'true'
					});
				}
			});
		}

		//proses data soap

		function getDokterPoli(kodePoli, cb = () => {}) {
			$.ajax({
				url: "<?php echo site_url(); ?>/urj/dokterPoli",
				type: "GET",
				data: {
					kodePoli
				},
				success: function(result) {
					hapusload();
					cb(null, JSON.parse(result))
				},
				error: function(error) {
					console.log('Error : ', error);
					cb(error, null)
				}
			});
		}

		function setDropdownDokter(selector, data) {
			if (Array.isArray(data)) {
				$(selector).find('option:not(:first)').remove();
				data.forEach((item) => {
					$(selector).append(
						$("<option>").val(item.kode_dokter).html(`${item.nama_dokter}`)
					)
				})
			}
		}

		


	
		$('#unitselect').on('change', function() {
			const unit = $('#unitselect').val();
			getDokterPoli(unit, function(error, data) {
				setDropdownDokter('#dokter', data)
			})
		})

		$(document).ready(function() {
			const unit = $('#unitselect').val();
			getDokterPoli(unit, function(error, data) {
				setDropdownDokter('#dokter', data)
			})
		});


		$(document).ready(function() {
            // var maximumStack = 1000;
            $("#simpantglpulang").click(function(e) {
                // alert('masuk simpan');
                var nosep = document.getElementById("nosep").value;
                var nama = document.getElementById("nama").value;
                var noka = document.getElementById("noka").value;
                var pelayanan = document.getElementById("pelayanan").value;
				if ( pelayanan != 3) {
                	var tglmeninggal = '';
                	var nosurat = '';
				} else {
					var tglmeninggal = document.getElementById("txttglmeninggal").value;
                	var nosurat = document.getElementById("nosurat").value;
				}	
                var txtpelayanan = document.getElementById("txtpelayanan").value;
                var tglpulang = document.getElementById("txttglpulang").value;
				console.log(nosep+' '+nama+' '+noka+' '+pelayanan+' '+tglmeninggal+' '+nosurat+' '+tglpulang)
                $.ajax({
                    url: "<?php echo site_url(); ?>/bpjs/simpantglpulang",
                    type: "GET",
                    data: {
                        nosep: nosep,
                        nama: nama,
                        noka: noka,
                        pelayanan: pelayanan,
                        txtpelayanan: txtpelayanan,
                        nosurat: nosurat,
                        tglmeninggal: tglmeninggal,
                        tglpulang: tglpulang
                    },
                    success: function(ajaxData) {
                        console.log(ajaxData);
                        var t = JSON.parse(ajaxData)
                        if (t.stat == true) {
                            // var t = JSON.parse(ajaxData)
                            var tx='Pasien '+nama+' Telah di pulangkan..';
                            swal(tx);
                            modalloadtutup();
                            tutupmodalform();
                            // var nosepnya=t.datasep.no_sep;
                            // var win = window.open("<?php echo site_url(); ?>/bpjs/cetaksepigd/" + nosepnya, '_blank');
                        } else {
                            console.log(ajaxData);
                            var t = JSON.parse(ajaxData)
                            var tx=t.code+' '+t.message;
                            swal(tx);
                            modalloadtutup();
                        }
                    }
                });
            });

			$("#simpanrujukan").click(function(e) {
                var notrx = document.getElementById("notrx").value;
                var nosep = document.getElementById("nosep").value;
                var nama = document.getElementById("nama").value;
                var noka = document.getElementById("noka").value;
				var txttglrujukan = document.getElementById("txttglrujukan").value;
                var txttglkunjungan = document.getElementById("txttglkunjungan").value;
                var pelayanan = $('#pelayanan').val();
				var tipeRujukan = $("input[name='title']:checked").val();
                var diagRujukan = document.getElementById("txtkddiagnosa").value;
                var ppkDirujuk = document.getElementById("txtppkdirujuk").value;
                var poliRujukan = document.getElementById("txtkdpoli").value;
                var catatan = document.getElementById("txtcatatan").value;
				// alert(pelayanan);
                $.ajax({
                    url: "<?php echo site_url(); ?>/bpjs/simpanrujukan",
                    type: "GET",
                    data: {
                        notrx: notrx,
                        nosep: nosep,
                        nama: nama,
                        noka: noka,
                        txttglrujukan: txttglrujukan,
                        txttglkunjungan: txttglkunjungan,
                        pelayanan: pelayanan,
                        tipeRujukan: tipeRujukan,
                        diagRujukan: diagRujukan,
                        ppkDirujuk: ppkDirujuk,
                        catatan: catatan,
						poliRujukan : poliRujukan
                    },
                    success: function(ajaxData) {
                        var t = JSON.parse(ajaxData)
                        if (t.stat == true) {
                            var t = JSON.parse(ajaxData)
							console.log(t)
							// xrujukan=t.dataspri.rujukan;
							// console.log(xrujukan)
							// x=encodeURIComponent('rujukanx');
							// console.log(x)	
                            modalloadtutup();
                            // tutupmodalform();
                            var norujukan=t.dataspri.rujukan.noRujukan;
							console.log(norujukan);
                            var win = window.open("<?php echo site_url(); ?>/bpjs/cetakrujukan/" + norujukan, '_blank');
                        } else {
                            console.log(ajaxData);
                            var t = JSON.parse(ajaxData)
                            var tx=t.code+' '+t.message;
                            swal(tx);
                            modalloadtutup();
                        }
                    }
                });
            });

			$("#updaterujukan").click(function(e) {
                var notrx = document.getElementById("notrx").value;
                var isinorujukan = document.getElementById("norujukanedit").value;
                var nosep = document.getElementById("nosep").value;
                var nama = document.getElementById("nama").value;
                var noka = document.getElementById("noka").value;
				var txttglrujukan = document.getElementById("txttglrujukan").value;
                var txttglkunjungan = document.getElementById("txttglkunjungan").value;
                var pelayanan = $('#pelayanan').val();
				var tipeRujukan = $("input[name='title']:checked").val();
                var diagRujukan = document.getElementById("txtkddiagnosa").value;
                var namadiagRujukan = document.getElementById("txtnmdiagnosa").value;
                var ppkDirujuk = document.getElementById("txtppkdirujuk").value;
                var namappkDirujuk = document.getElementById("ppkdirujuk").value;
                var poliRujukan = document.getElementById("txtkdpoli").value;
                var namapoliRujukan = document.getElementById("txtnmpoli").value;
                var catatan = document.getElementById("txtcatatan").value;
				// alert(pelayanan);
                $.ajax({
                    url: "<?php echo site_url(); ?>/bpjs/updaterujukan",
                    type: "GET",
                    data: {
                        notrx: notrx,
                        norujukan: isinorujukan,
                        nosep: nosep,
                        nama: nama,
                        noka: noka,
                        txttglrujukan: txttglrujukan,
                        txttglkunjungan: txttglkunjungan,
                        pelayanan: pelayanan,
                        tipeRujukan: tipeRujukan,
                        diagRujukan: diagRujukan,
                        namadiagRujukan: namadiagRujukan,
                        ppkDirujuk: ppkDirujuk,
                        namappkDirujuk: namappkDirujuk,
                        catatan: catatan,
						poliRujukan : poliRujukan,
						namapoliRujukan : namapoliRujukan
                    },
                    success: function(ajaxData) {
                        var t = JSON.parse(ajaxData)
                        if (t.stat == true) {
                            var t = JSON.parse(ajaxData)
							console.log(t)
							// xrujukan=t.dataspri.rujukan;
							// console.log(xrujukan)
							// x=encodeURIComponent('rujukanx');
							// console.log(x)	
                            modalloadtutup();
                            // tutupmodalform();
                            var norujukan=t.dataspri.rujukan.noRujukan;
							console.log(norujukan);
                            var win = window.open("<?php echo site_url(); ?>/bpjs/cetakrujukan/" + norujukan, '_blank');
                        } else {
                            console.log(ajaxData);
                            var t = JSON.parse(ajaxData)
                            var tx=t.code+' '+t.message;
                            swal(tx);
                            modalloadtutup();
                        }
                    }
                });
            });

			$("#cetakrujukan").click(function(e) {
                var notrx = document.getElementById("notrx").value;
                var norujukan = document.getElementById("norujukanedit").value;
				var win = window.open("<?php echo site_url(); ?>/bpjs/cetakrujukan/" + norujukan, '_blank');
            });

			$("#editrujukan").click(function(e) {
                document.getElementById("simpanrujukan").hidden=true;

                document.getElementById("tglrujukan").disabled=false;
                document.getElementById("tglkunjungan").disabled=false;
                document.getElementById("pelayanan").disabled=false;
                document.getElementById("txtnmdiagnosa").disabled=false;
                document.getElementById("ppkdirujuk").disabled=false;
                document.getElementById("txtnmpoli").disabled=false;
                document.getElementById("txtcatatan").disabled=false;

                document.getElementById("updaterujukan").hidden=false;
                document.getElementById("editrujukan").hidden=true;
                document.getElementById("hapusrujukan").hidden=true;
                document.getElementById("cetakrujukan").hidden=true;
            });
// ============sampai sini hapus ==============
			$("#hapusrujukan").click(function(e) {
				var txt = $(e).parents('tr').find("td:eq(1)").text();
				$.confirm({
					title: 'Hapus Data',
					content: 'Rujukan ini mau dihapus ?',
					buttons: {
						batal: {
							text: 'Batal',
							btnClass: 'btn-blue',
							action: function () {

							}
						},
						kembali: {
							text: 'Hapus',
							btnClass: 'btn-red',
							keys: ['enter'],
							action: function () {
								var norujukan = document.getElementById("norujukanedit").value;
								$.ajax({
									url: "<?php echo site_url(); ?>/bpjs/hapusrujukan",
									type: "GET",
									data: {
										norujukan: norujukan
									},
									success: function(ajaxData) {
									var t = JSON.parse(ajaxData)
									if (t.stat == true) {
										var t = JSON.parse(ajaxData)
										console.log(t)
										swal('Rujukan '+norujukan+' sudah dihapus');
										location.reload();
										modalloadtutup();
										
									} else {
										console.log(ajaxData);
										var t = JSON.parse(ajaxData)
										var tx=t.code+' '+t.message;
										swal(tx);
										modalloadtutup();
									}
								}
								});
							}
						}
					}
				});
			});


        }); //end dokumen rready


		$(document).ready(function() {
        $('#txtnmdiagnosa').select2({
            placeholder: 'Pilih Diagnosa',
            minimumInputLength: 3,            
            allowClear: true,
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambilldiagnosainsert",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data.items
                    };
                }
            }
            });
	});

	$('#txtnmprocedure').select2({
            placeholder: 'Pilih Procedure',
            minimumInputLength: 3,            
            allowClear: true,
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambilprocedure",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
					console.log(data);
                    return {
                        results: data.items
                    };
                }
            }
    });

	$('#txtnmruangrawat').select2({
            placeholder: 'Pilih Ruang Rawat',
            minimumInputLength: 3,            
            allowClear: true,
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambilruangrawat",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data.items
                    };
                }
            }
    });

	$('#txtnmkelasrawat').select2({
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambilkelasrawat",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data.items
                    };
                }
            }
    });

	$('#txtnmspesialistik').select2({
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambilspesialistik",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data.items
                    };
                }
            }
    });

	$('#txtnmcarakeluar').select2({
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambilcarakeluar",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data.items
                    };
                }
            }
    });


	$('#txtnmkondisipulang').select2({
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambilpascapulang",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data.items
                    };
                }
            }
    });

	$('#txtnmdokter').select2({
            placeholder: 'Pilih Spesialis',
            minimumInputLength: 3,            
            allowClear: true,
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambilldpjpinsert",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        rawat: '1',
                        tgl: '2023-05-04',
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    console.log(data.items);
                    return {
                        results: data.items
                    };
                }
            }
            });

        


	$(document).ready(function() {
        $('#ppkdirujuk').select2({
            placeholder: 'Pilih Faskes Rujuk',
            minimumInputLength: 3,            
            allowClear: true,
            ajax: {
                url: "<?php echo site_url();?>/bpjs/ambilfaksesdirujuk",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results: data.items
                    };
                }
            }
        });

		

		$('#txtnmpoli').select2({
                placeholder: 'pilih poli',
                minimumInputLength: 3,
                allowClear: true,
                ajax: {
                    url: "<?php echo site_url(); ?>/bpjs/ambillpoliinsert",
                    dataType: 'json',
                    data: function(params) {
                        var query = {
                            search: params.term,
                            type: 'public'
                        }
                        return query;
                    },
                    processResults: function(data) {
                        return {
                            results: data.items
                        };
                    }
                }
            });
	});


	

	</script>