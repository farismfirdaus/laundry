  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">Paket</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Paket</li>
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
                <div class="mb-2">
                  <button id="btnTambah" class="btn btn-sm btn-success rounded">&plus; Tambah Paket</button>
                </div>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Outlet</th>
                      <th scope="col">Jenis</th>
                      <th scope="col">Nama Paket</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="tbodyPaket">

                  </tbody>
                </table>
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

  <div id="modalTambah" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5>Tambah Paket</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="m-3">
            <div class="row">
              <div class="col-12">

                <div class="form-group">
                  <label for="selectTambahOutlet">Pilih Outlet</label>
                  <select class="form-control" id="selectTambahOutlet">

                  </select>
                </div>

                <div class="form-group">
                  <label for="selectTambahJenis">Pilih Jenis</label>
                  <select class="form-control" id="selectTambahJenis">
                    <option value="kiloan">Kiloan</option>
                    <option value="selimut">Selimut</option>
                    <option value="bed_cover">Bed Cover</option>
                    <option value="kaos">Kaos</option>
                    <option value="lain">Lain-lain</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="inputTambahNamaPaket">Nama Paket</label>
                  <input class="form-control" type="text" id="inputTambahNamaPaket" required>
                </div>

                <div class="form-group">
                  <label for="inputTambahHarga">Harga</label>
                  <input class="form-control" type="number" id="inputTambahHarga" required>
                </div>                

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

  <div id="modalEdit" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5>Edit Paket</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="m-3">
            <div class="row">
              <div class="col-12">
                <input type="hidden" id="id">

                <div class="form-group">
                  <label for="selectEditOutlet">Pilih Outlet</label>
                  <select class="form-control" id="selectEditOutlet">

                  </select>
                </div>

                <div class="form-group">
                  <label for="selectEditJenis">Pilih Jenis</label>
                  <select class="form-control" id="selectEditJenis">
                    <option value="kiloan">Kiloan</option>
                    <option value="selimut">Selimut</option>
                    <option value="bed_cover">Bed Cover</option>
                    <option value="kaos">Kaos</option>
                    <option value="lain">Lain-lain</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="inputEditNamaPaket">Nama Paket</label>
                  <input class="form-control" type="text" id="inputEditNamaPaket" required>
                </div>

                <div class="form-group">
                  <label for="inputEditHarga">Harga</label>
                  <input class="form-control" type="number" id="inputEditHarga" required>
                </div>                

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="btnSimpanEdit" type="button" class="btn btn-success">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- Sweet Alert 2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  $(document).ready(function(){
    refreshPaket();
    setSelectOutlet()

    function refreshPaket(){
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>paket/getpaket',
        dataType: 'json',
        success: function(data) {
          var html = "";
          for (let a = 0; a < data.length; a++) {
              let attrs = " data-id='"+ data[a].id_paket  +"' data-id-outlet='"+ data[a].id_outlet +"' data-jenis='"+ data[a].jenis +"' data-nama-paket='"+ data[a].nama_paket +"' data-harga='"+data[a].harga+"' ";
              html += `<tr>
                <th scope="row">`+(a+1)+`</th>
                <td>`+data[a].nama_outlet+`</td>
                <td>`+data[a].jenis+`</td>
                <td>`+data[a].nama_paket+`</td>
                <td>`+data[a].harga+`</td>
                <td><button id="btnEdit" `+ attrs +` class="btn btn-primary btn-xs"><i class="nav-icon fas fa-edit"></i></button> <button id="btnHapusPaket" class="btn btn-danger btn-xs" data-id="`+data[a].id_paket+`"><i class="nav-icon fas fa-trash"></i></button></td>
              </tr>`
          }
          $('#tbodyPaket').html(html);
        }
      })
    }

    $("#btnTambah").on("click", function(){
      $("#inputTambahNamaPaket").val("")
      $("#inputTambahNamaHarga").val("")
      $("#modalTambah").modal("show")
    })

    function setSelectOutlet(){
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>outlet/getoutlet',
        dataType: 'json',
        success: function(data) {
          $("#selectTambahOutlet")
            .find('option')
            .remove()
            .end()

          $("#selectEditOutlet")
            .find('option')
            .remove()
            .end()

          for (i = 0; i < data.length; i++) {
            $('#selectTambahOutlet').append("<option value='" + data[i].id_outlet + "' >" + data[i].nama_outlet + "</option");
            $('#selectEditOutlet').append("<option value='" + data[i].id_outlet + "' >" + data[i].nama_outlet + "</option");
          }
        }
      })
    }

    $("#btnSimpanTambah").on("click", function(){
      let id_outlet = $("#selectTambahOutlet").val()
      let jenis = $("#selectTambahJenis").val()
      let nama = $("#inputTambahNamaPaket").val()
      let harga = $("#inputTambahHarga").val()
      
      if (id_outlet != "" && jenis != "" && nama != "" && harga != ""){
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url() ?>paket/createpaket',
          dataType: 'json',
          data: {
            id_outlet,
            jenis,
            nama,
            harga,
          },
          success: function(data) {
            refreshPaket()
            SuccessSwal()
            $("#modalTambah").modal("hide")
          }
        })
      }else{
        ErrorRequiredSwal()
      }
    })

    $(document).on("click", "#btnEdit", function(){
      let id = $(this).data("id")
      let id_outlet = $(this).data("id-outlet")
      let jenis = $(this).data("jenis")
      let nama = $(this).data("nama-paket")
      let harga = $(this).data("harga")

      $("#id").val(id)
      $("#selectEditOutlet").val(id_outlet)
      $("#selectEditJenis").val(jenis)
      $("#inputEditNamaPaket").val(nama)
      $("#inputEditHarga").val(harga)
      $("#modalEdit").modal("show")
    })

    $(document).on("click", "#btnSimpanEdit", function(){
      let id = $("#id").val()
      let id_outlet = $("#selectEditOutlet").val()
      let jenis = $("#selectEditJenis").val()
      let nama = $("#inputEditNamaPaket").val()
      let harga = $("#inputEditHarga").val()

      if (id != "" && id_outlet != "" && jenis != "" && nama != "" && harga != ""){
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url() ?>paket/updatepaket',
          dataType: 'json',
          data: {
            id,
            id_outlet,
            jenis,
            nama,
            harga,
          },
          success: function(data) {
            refreshPaket()
            SuccessSwal()
            $("#modalEdit").modal("hide")
          }
        })
      }else{
        ErrorRequiredSwal()
      }
    })

    $(document).on("click", "#btnHapusPaket", function(){
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
            url: '<?php echo base_url() ?>paket/deletepaket',
            dataType: 'json',
            data: {
              id
            },
            success: function(data) {
              refreshPaket()
              SuccessDeleteSwal()
            }
          })
        }
      })
    })

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    function SuccessSwal() {
      Toast.fire({
        icon: 'success',
        title: "Data berhasil disimpan!"
      })
    }

    function SuccessDeleteSwal() {
      Toast.fire({
        icon: 'success',
        title: "Data berhasil dihapus!"
      })
    }
 
    function ErrorRequiredSwal() {
      Toast.fire({
        icon: 'warning',
        title: "Ada data yang belum diisi!"
      })
    }
  })
</script>
</body>
</html>
