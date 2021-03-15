  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Transaksi</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Transaksi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="mb-3">
                <?php if($this->session->userdata("role") != "Owner") : ?>
                  <button id="btnTambah" class="btn btn-sm btn-success rounded mr-1">&plus; Tambah Transaksi</button>
                <?php endif; ?>
                  <button onclick="location.href='<?php echo base_url('transaksi/generatelaporan') ?>'" class="btn btn-sm btn-danger rounded"><i class="fas fa-file-pdf mr-2"></i> Generate Laporan</button>
                </div>
                <div style="overflow-x:auto;">
                  <table class="table table-hover table-nowrap w-100">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Invoice</th>
                        <th scope="col">Nama Member</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Batas Waktu</th>
                        <th scope="col">Tanggal Bayar</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="tbodyTransaksi">

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div id="modalTambah" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5>Tambah Transaksi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="m-3">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="selectTambahMember">Pilih Member</label>
                  <select class="form-control" id="selectTambahMember">
                  </select>
                </div>                            
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label for="inputTambahTgl">Tanggal</label>
                  <input type="date" class="form-control" readonly id="inputTambahTgl" value="<?php echo $date = date("Y-m-d") ?>">
                </div>                            
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="inputTambahBatasWaktu">Batas Waktu</label>
                  <input type="date" class="form-control" readonly id="inputTambahBatasWaktu" value="<?php echo date('Y-m-d', strtotime($date. ' + 2 days')); ?>">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="checkPembayaran">Pembayaran</label>
                  <div class="icheck-primary icheck-pad">
                    <input type="checkbox" id="checkLunas" name="checkLunas[]" value="lunas" />
                    <label for="checkLunas">Lunas</label>
                  </div>
                </div>                            
              </div>
            </div>
            <div class="row">
              <div class="col-5">
                <div class="form-group">
                  <label for="selectTambahPaket">Pilih Paket</label>
                  <select class="form-control" id="selectTambahPaket">
                  </select>
                </div>  
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="inputQty">Qty</label>
                  <input class="form-control" type="number" id="inputQty" min="1">
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="inputKeterangan">Keterangan</label>
                  <input class="form-control" type="text" id="inputKeterangan">
                </div>
              </div>
              <div class="col-1">
                <div class="form-group">
                  <label for="tambahPaket" style="visibility:hidden;"> Q</label>
                  <button id="tambahPaket" class="btn btn-success form-control" id="addDetail">&plus;</button>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <table class="table w-100 tb-detail-paket">
                  <thead>
                    <tr>
                      <th>*</th>
                      <th>Nama Paket</th>
                      <th>Harga satuan</th>
                      <th>Qty</th>
                      <th>Harga</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody id="tbodyAddDetail">

                  </tbody>                 
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="btnSimpanTambah" type="button" class="btn btn-success">Simpan</button>
        </div>
      </div>
    </div>
  </div>

  <div id="modalDetailTransaksi" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5>Detail Transaksi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="m-1">
            <div class="row">
              <div class="col-12">
                <table class="table-detail w-100 mb-4">
                  <tr>
                    <td>Kode Invoice</td>
                    <td id="textKodeInvoice">TR-100-20/02/2020</td>
                  </tr>
                  <tr>
                    <td>Nama Member</td>
                    <td id="textNamaMember">Ragil Azis</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Tanggal</td>
                    <td id="textTanggal">2020-02-10 04:00:00	</td>
                  </tr>
                  <tr>
                    <td>Batas Waktu</td>
                    <td id="textBatasWaktu">2020-02-20 19:00:00	</td>
                  </tr>
                  <tr>
                    <td>Tanggal Bayar</td>
                    <td id="textTanggalBayar">2020-02-18 13:00:00	</td>
                  </tr>
                </table>

                <table class="table w-100 tb-detail-paket">
                  <thead>
                    <tr>
                      <th>*</th>
                      <th>Nama Paket</th>
                      <th>Harga satuan</th>
                      <th>Qty</th>
                      <th>Harga</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody id="tbodyDetailTransaksi">

                  </tbody>                 
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- Sweet Alert 2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function(){
    $("#modalEditStatus").modal("show")

    var detailtrx
    var total
    var biaya_tambahan
    var pajak
    var diskon

    refreshTransaksi()

    function refreshTransaksi(){
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>transaksi/gettransaksi',
        dataType: 'json',
        success: function(data) {
          var html = "";
          for (let a = 0; a < data.length; a++) {
              var paid, disabled
              // (data[a].tgl_bayar == null && data[a].status == "menunggu diambil") ? disabled = " disabled " : ""; 
              (data[a].status == "selesai") ? disabled = " disabled " : disabled = "";
              (data[a].tgl_bayar == null) ? paid = "<button class='btn btn-warning btn-sm' id='btnBayar' data-id='"+ data[a].id_transaksi +"'>Bayar</button>" : paid = data[a].tgl_bayar ;
              let attrs = `data-id="`+ data[a].id_transaksi +`" data-kode-invoice="`+ data[a].kode_invoice +`" data-nama-member="`+ data[a].nama_member +`" data-tgl="`+ data[a].tgl +`" data-batas-waktu="`+ data[a].batas_waktu +`" data-tgl-bayar="`+ data[a].tgl_bayar +`" data-biaya-tambahan="`+ data[a].biaya_tambahan +`" data-diskon="`+ data[a].diskon +`" data-pajak="`+ data[a].pajak +`"`;
              let attrStatus = `data-id="`+ data[a].id_transaksi +`" data-kode-invoice="`+ data[a].kode_invoice +`" data-status="`+ data[a].status +`"`
              html += `<tr>
                <th scope="row">`+(a+1)+`</th>
                <td><a id="detailTransaksi" `+ attrs +` href="#">`+data[a].kode_invoice+`</a></td>
                <td>`+data[a].nama_member+`</td>
                <td>`+data[a].tgl+`</td>
                <td>`+data[a].batas_waktu+`</td>
                <td>`+paid+`</td>
                <td>`+data[a].status+`</td>
                <td><button id="btnUbahStatus" `+ attrStatus +` class="btn btn-info btn-xs" `+ disabled +`+><i class="nav-icon fas fa-edit"></i> Ubah Status</button> <button id="btnHapusTransaksi" class="btn btn-danger btn-xs" data-id="`+data[a].id_transaksi+`"><i class="nav-icon fas fa-trash"></i></button></td>
              </tr>`
          }
          $('#tbodyTransaksi').html(html);
        }
      })
    }

    $(document).on("click", "#detailTransaksi", function(e) {
      id = $(this).data("id")
      $("#textKodeInvoice").html($(this).data("kode-invoice"))
      $("#textNamaMember").html(nama_member = $(this).data("nama-member"))
      $("#textTanggal").html($(this).data("tgl"))
      $("#textBatasWaktu").html($(this).data("batas-waktu"))
      $("#textTanggalBayar").html(($(this).data("tgl-bayar") == null) ? "<span class='badge badge-warning'>unpaid</span>" : $(this).data("tgl-bayar"))

      let biaya_tambahan = $(this).data("biaya-tambahan")
      let diskon = $(this).data("diskon")
      let pajak = $(this).data("pajak")

      $.ajax({
        type: "GET",
        url: "<?php echo base_url('transaksi/getdetailtransaksibyid/') ?>" + id,
        dataType: "json",
        success: function(data) {
          var html = "";
          var total = 0;
          for (let a = 0; a < data.length; a++) {
            var harga_satuan = parseInt(data[a].harga)
            var qty = parseInt(data[a].qty)
            var harga = harga_satuan * qty
            total += harga
              
              html += `<tr>
                <th scope="row">`+(a+1)+`</th>
                <td>`+ data[a].nama_paket +`</td>
                <td>`+ getNumberWithCommas(data[a].harga) +`</td>
                <td>`+ data[a].qty +`</td>
                <td class="text-right">`+ getNumberWithCommas(harga) +`</td>
                <td>`+ data[a].keterangan +`</td>
              </tr>`
          }

          total = total + biaya_tambahan + pajak - diskon

            html += `<tr>
              <td colspan="4">Biaya Tambahan</td>
              <td class="text-right">`+ getNumberWithCommas(biaya_tambahan) +`</td>
              <td></td>
            </tr>
            <tr>
              <td colspan="4">Pajak</td>
              <td class="text-right">`+ getNumberWithCommas(pajak) +`</td>
              <td></td>
            </tr>
            <tr>
              <td colspan="4">Diskon</td>
              <td class="text-right">`+ getNumberWithCommas(diskon) +`</td>
              <td></td>
            </tr>
            <tr>
              <td colspan="4">Total</td>
              <td class="text-right">`+ getNumberWithCommas(total) +`</td>
              <td></td>
            </tr>
            `

          $('#tbodyDetailTransaksi').html(html);
        }
      })

      $("#modalDetailTransaksi").modal("show")

      e.preventDefault()
    })
 
    $("#btnTambah").on("click", function(){
      getMember()
      getPaket()
      detailtrx = []
      total = 0
      refreshPaket()
      $("#modalTambah").modal("show")
    })

    $("#tambahPaket").on("click", function(){
      id = $("#selectTambahPaket").val()
      nama_paket = $("#selectTambahPaket").find(':selected').data('nama-paket')
      harga = $("#selectTambahPaket").find(':selected').data('harga')
      qty = $("#inputQty").val()
      keterangan = $("#inputKeterangan").val()

      if (qty > 0 && id != "0"){
        detailtrxsingle = {id, nama_paket, harga, qty, keterangan} 
        detailtrx.push(detailtrxsingle)

        $("#selectTambahPaket").val("0").change()
        $("#inputQty").val("")
        refreshPaket()
      }else{
        NotValid()
      }
    })

    function refreshPaket() {
      html = ""
      for (let a = 0; a < detailtrx.length; a++) {
        var harga_satuan = parseInt(detailtrx[a].harga)
        var qty = parseInt(detailtrx[a].qty)
        var harga = harga_satuan * qty
        total += harga
          
        html += `<tr>
          <th scope="row">`+(a+1)+`</th>
          <td>`+ detailtrx[a].nama_paket +`</td>
          <td>`+ getNumberWithCommas(detailtrx[a].harga) +`</td>
          <td>`+ detailtrx[a].qty +`</td>
          <td class="text-right">`+ getNumberWithCommas(harga) +`</td>
          <td>`+ detailtrx[a].keterangan +`</td>
        </tr>`
      }

      biaya_tambahan = 0
      pajak = total * 0.01
      diskon = 0

      total = total + biaya_tambahan + pajak - diskon

      html += `<tr>
        <td colspan="4">Biaya Tambahan</td>
        <td class="text-right">`+ getNumberWithCommas(biaya_tambahan) +`</td>
        <td></td>
      </tr>
      <tr>
        <td colspan="4">Pajak</td>
        <td class="text-right">`+ getNumberWithCommas(pajak) +`</td>
        <td></td>
      </tr>
      <tr>
        <td colspan="4">Diskon</td>
        <td class="text-right">`+ getNumberWithCommas(diskon) +`</td>
        <td></td>
      </tr>
      <tr>
        <td colspan="4">Total</td>
        <td class="text-right">`+ getNumberWithCommas(total) +`</td>
        <td></td>
      </tr>
      `
      $('#tbodyAddDetail').html(html);    
    }

    $(document).on("click", "#btnSimpanTambah", function() {
      if(detailtrx.length > 0){
        id_member = $("#selectTambahMember").val()
        lunas = $('input[name="checkLunas[]"]:checked').length > 0;

        $.ajax({
          type: "POST",
          url: "<?php echo base_url('transaksi/createtransaksi') ?>",
          dataType: 'json',
          data: {
            id_member,
            lunas,
            biaya_tambahan,
            pajak,
            diskon,
            total,
            detailtrx,
          },
          success: function() {
            refreshTransaksi()
            Success()
            $("#modalTambah").modal("hide")
          }
        })

      }else{
        NoPaket()
      }
    })

    $(document).on("click", "#btnHapusTransaksi", function(){
      let id = $(this).data("id")

      Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data akan terhapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Batal',
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: 'POST',
            url: '<?php echo base_url() ?>transaksi/deletetransaksi',
            dataType: 'json',
            data: {
              id
            },
            success: function(data) {
              refreshTransaksi()
              SuccessDeleteSwal()
            }
          })
        }
      })
    })

    $(document).on("click", "#btnBayar", function() {
      let id = $(this).data("id")

      Swal.fire({
        title: 'Bayar sekarang?',
        text: "Pastikan uang yang diterima sesuai!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Batal',
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: 'POST',
            url: '<?php echo base_url() ?>transaksi/bayartransaksi',
            dataType: 'json',
            data: {
              id
            },
            success: function(data) {
              refreshTransaksi()
              SuccessBayarSwal()
            }
          })
        }
      })
    })

    $(document).on("click", "#btnUbahStatus", function() {
      let id = $(this).data("id")
      let kode_invoice = $(this).data("kode-invoice")
      let status = $(this).data("status")
      let status_after_update

      switch(status) {
        case "baru" : status_after_update = "proses"; break;
        case "proses" : status_after_update = "menunggu diambil"; break;
        case "menunggu diambil" : status_after_update = "selesai"; break;
        default : break;
      }

      Swal.fire({
        title: kode_invoice,
        text: "Ubah status menjadi " + status_after_update,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Batal',
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: 'POST',
            url: '<?php echo base_url() ?>transaksi/ubahstatustransaksi',
            dataType: 'json',
            data: {
              id,
              "status": status_after_update,
            },
            success: function(data) {
              refreshTransaksi()
              SuccessStatusSwal()
            }
          })
        }
      })
    })

    function getPaket() {
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>paket/getpaket',
        dataType: 'json',
        success: function(data) {
          $("#selectTambahPaket")
            .find('option')
            .remove()
            .end()

          $('#selectTambahPaket').append("<option value='0'>Pilih salah satu paket ...</option");

          for (i = 0; i < data.length; i++) {
            $('#selectTambahPaket').append("<option value='" + data[i].id_paket + "' data-harga='"+ data[i].harga +"' data-nama-paket='"+ data[i].nama_paket +"'>" + data[i].nama_paket + "</option");
          }
        }
      })
    }
    

    function getMember(){
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>member/getmember',
        dataType: 'json',
        success: function(data) {
          $("#selectTambahMember")
            .find('option')
            .remove()
            .end()

          for (i = 0; i < data.length; i++) {
            $('#selectTambahMember').append("<option value='" + data[i].id_member + "' >" + data[i].nama_member + "</option");
          }
        }
      })
    }

    function getNumberWithCommas(number) {
      return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    function Success(){
      Toast.fire({
        icon: 'success',
        title: "Data berhasil tersimpan!"
      })
    }

    function SuccessStatusSwal() {
      Toast.fire({
        icon: 'success',
        title: "Status berhasil diubah!"
      })
    }


    function SuccessDeleteSwal() {
      Toast.fire({
        icon: 'success',
        title: "Data berhasil dihapus!"
      })
    }

    function SuccessBayarSwal() {
      Toast.fire({
        icon: 'success',
        title: "Pembayaran berhasil!"
      })
    }

    function NotValid(){
      Toast.fire({
        icon: 'warning',
        title: "Paket tidak valid!"
      })
    }

    function NoPaket(){
      Toast.fire({
        icon: 'warning',
        title: "Anda belum memilih paket!"
      })
    }
  })
</script>
</body>
</html>
