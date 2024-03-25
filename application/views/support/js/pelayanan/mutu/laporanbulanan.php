<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/standalone/selectize.js"></script>

<script>
     $.fn.datepicker.noConflict()

     $("document").ready(function() {
          $("#unit").click(function() {
               var id = $("#unit").val()
               $.ajax({
                    url: "<?php echo site_url();?>/mutu/getMutuByPelaksana",
                    type: 'GET',
                    data : {
                         id: id
                    },
                    success: function(response) {
                         var json = JSON.parse(response)
                         if (json.status) {
                         var data = json.data
                         console.log(data)
                         $("#indikator option").remove();
                         $("#indikator").append(`
                              <option value="">--Silahkan Pilih--</option>
                         `)
                         for (let i=0; i < data.length; i++) {
                         $("#indikator").append(`
                              <option value="${data[i].id}">${data[i].kode} - ${data[i].indikator}</option>
                         `)
                         }
                         denumeratorVal = "sdacsa"
                         }
                    }
               })
          })

          $("#proses").click(function() {
               var unit   = $("#unit").val()
               var indikator =  $("#indikator").val()
               var bulan = $("#bulan").val()
               var tahun = $("#tahun").val()

               $.ajax({
                    url: "<?php echo site_url();?>/mutu/laporan",
                    type: 'GET',
                    data : {
                         unit: unit,
                         indikator: indikator,
                         bulan: bulan,
                         tahun: tahun
                    },
                    success: function(response) {
                         var resp = JSON.parse(response)
                         var data = resp.data

                         if (resp.status) {
                              var reports = resp.data.report
                              var total_numerator = resp.data.total_numerator
                              var total_denumerator = resp.data.total_denumerator

                              if (reports.length < 1) {
                                   $("#alertInfo").text(`
                                        Lap. Penilaian Mutu tidak tersedia 
                                   `)
                                   $("#alertInfo").show()
                                   $("#tbody tr").hide()
                                   $("#firstTr").show()

                              } else {
                                   $("#firstTr").hide()
                                   $("#tbody tr").hide()
                                   $("#alertInfo").hide()

                                   for (let i=0; i < reports.length; i++) {
                                        $("#tbody").append(`
                                             <tr>
                                                  <td>${reports[i].tanggal}</td>
                                                  <td class="text-center">${reports[i].nilai_numerator}</td>
                                                  <td class="text-center">${reports[i].nilai_denumerator}</td>
                                             </tr>
                                        `);
                                   }
                              }
                              

                              $("#totalNumerator").text(data.total_numerator)
                              $("#totalDenumerator").text(data.total_denumerator)
                         }
                    }
               })

          });
     })
</script>