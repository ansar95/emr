<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/notify.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery-confirm.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/standalone/selectize.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jsgrid/jsgrid.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/jsgrid/dbmutu.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/datatable/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/datatable/editor/mindmup-editabletable.js"></script>
<script src="<?php echo base_url(); ?>assets/template_baru/dist/vendors/datatable/editor/numeric-input-example.js"></script>

<script>
    var test

    (function ($) {
      "use strict";
          $('#example').editableTableWidget({editor: $('<textarea>')});
        $('#example').DataTable({    
            responsive: true
        });
      
        $('#bootstraptable').editableTableWidget({editor: $('<textarea>')});
    })(jQuery);

  function edit(index, id) {
      $("#indikatorModal").modal('show')
      const row = $("tr").eq(index+1); // Change the index to select the desired row
      const rowData = [];
      row.find("td").each(function () {
          rowData.push($(this).text());
      });

      test = row
      $("#tanggal").val(rowData[0])
      $("#numeratorModal").attr('value', rowData[1])
      $("#denumeratorModal").val(rowData[3])
      $("#nilaiNumeratorModal").val(rowData[2])
      $("#nilaiDenumeratorModal").val(rowData[4])
      $("#idPenilaian").val(id)
  }

  function tutupmodal(numerator, denumerator) {
    index = 0
    test.find('td').each(function() {
       if (index == 2) {
         $(this).text(numerator)
          index++
        } else if(index == 4) {
          $(this).text(denumerator)
          index++
        } else {
         index++
       }
    });
    $(function () {
      $("#indikatorModal").modal("toggle");
    });
  }
  
  function update() {
    var id = $("#idPenilaian").val()
    var nilaiNumerator   = $("#nilaiNumeratorModal").val()
    var nilaiDenumerator = $("#nilaiDenumeratorModal").val()
    $.ajax({
        url: "<?php echo site_url();?>/penilaianmutu/update",
        type: 'POST',
        data : {
          id: id,
          nilaiNumerator: nilaiNumerator,
          nilaiDenumerator: nilaiDenumerator
        },
        success: function(response) {
          const resp = JSON.parse(response)
          if (resp.status) {
              suksesalert(2)
              tutupmodal(nilaiNumerator, nilaiDenumerator)
          } else {
              gagalalert()
          }
        },
        error: function(ajaxData) {
            gagalalert()
        }
    });
  }

  function suksesalert(kode) {
		if (kode == 0) {
			$.notify("Sukses Input Data", "success");
		} else if (kode == 1) {
			$.notify("Sukses Ubah Data", "success");
		} else if (kode == 2) {
			$.notify("Sukses Hapus Data", "success");
		}
	}

  function gagalalert() {
		$.notify("Gagal Memproses Data", "error");
	}

  $(document).ready(function() {
    
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

    $("#indikator").click(function() {
      var id = $("#indikator").val()
      $.ajax({
        url: "<?php echo site_url();?>/mutu/detail",
        type: 'GET',
        data : {
          id: id
        },
        success: function(response) {
          var json = JSON.parse(response)
          if (json.status) {
            $("#denumerator").attr('value',json.data.denominator)
            $("#numerator").attr('value', json.data.numerator)
            $("#nilai").attr('value', json.data.nilai)
            $("#ukuran").attr('value', json.data.ukuran)
          }
        }
      })
    })

    $("#proses").click(function() {
      var unit = $("#unit").val()
      var indikator = $("#indikator").val()
      var bulan = $("#bulan").val()
      var tahun = $("#tahun").val()

      $.ajax({
        url: "<?php echo site_url();?>/penilaianmutu/getdata",
        type: 'GET',
        data: {
          'unit' : unit,
          'indikator': indikator,
          'bulan': bulan,
          'tahun' : tahun
        },
        success: function(response) {
          var json = JSON.parse(response)

          if (json.status) {
            var data = json.data

            $("#firstTr").remove()
            $("tbody tr").remove()
            for (let i=0; i < data.length; i++) {
              $("#tbody").append(`
                  <tr>
                    <td>${data[i].tanggal}</td>
                    <td>${data[i].numerator}</td>
                    <td>${data[i].nilai_numerator}</td>
                    <td>${data[i].denominator}</td>
                    <td>${data[i].nilai_denumerator}</td>
                    <td>
                      <a role="button" onclick="edit(${i}, ${data[i].id})" class="btn-sm btn-info btn"><i class="fa fa-edit text-white"></i></a>
                    </td>
                  </tr>
              `)
            }
          } else {
            gagalalert()
          }
        }
      })
    })
  })
</script>