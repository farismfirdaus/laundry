  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">User</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">User</li>
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
                  <button id="btnTambah" class="btn btn-sm btn-success rounded">&plus; Tambah User</button>
                </div>

                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Username</th>
                      <th scope="col">Outlet</th>
                      <th scope="col">Role</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="tbodyUser">

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
  <div id="modalTambah" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5>Tambah User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="m-3">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="inputTambahNama">Nama</label>
                  <input class="form-control" type="text" id="inputTambahNama" required>
                </div>

                <div class="form-group">
                  <label for="inputTambahUsername">Username</label>
                  <input class="form-control" type="text" id="inputTambahUsername" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="selectTambahOutlet">Outlet</label>
                  <select class="form-control" id="selectTambahOutlet"></select>
                </div>

                <div class="form-group">
                  <label for="selectTambahRole">Role</label>
                  <select class="form-control" id="selectTambahRole">
                    <option value="Admin">Admin</option>
                    <option value="Kasir">Kasir</option>
                    <option value="Owner">Owner</option>
                  </select>
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

  <div id="modalEdit" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5>Edit User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="m-3">
            <div class="row">
              <div class="col-6">
                <input type="hidden" id="inputEditId">
                <div class="form-group">
                  <label for="inputEditNama">Nama</label>
                  <input class="form-control" type="text" id="inputEditNama" required>
                </div>

                <div class="form-group">
                  <label for="inputEditUsername">Username</label>
                  <input class="form-control" type="text" id="inputEditUsername" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="selectEditOutlet">Outlet</label>
                  <select class="form-control" id="selectEditOutlet"></select>
                </div>

                <div class="form-group">
                  <label for="selectEditRole">Role</label>
                  <select class="form-control" id="selectEditRole">
                    <option value="Admin">Admin</option>
                    <option value="Kasir">Kasir</option>
                    <option value="Owner">Owner</option>
                  </select>
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
    refreshUser();

    function refreshUser(){
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>user/getuser',
        dataType: 'json',
        success: function(data) {
          var html = "";
          for (let a = 0; a < data.length; a++) {
              let attrs = " data-id='"+ data[a].id_user  +"' data-nama='"+ data[a].nama +"' data-username='"+ data[a].username +"' data-id-outlet='"+ data[a].id_outlet +"' data-role='"+data[a].role+"' ";
              html += `<tr>
                <th scope="row">`+(a+1)+`</th>
                <td>`+data[a].nama+`</td>
                <td>`+data[a].username+`</td>
                <td>`+data[a].nama_outlet+`</td>
                <td>`+data[a].role+`</td>
                <td><button id="btnEdit" `+ attrs +` class="btn btn-primary btn-xs"><i class="nav-icon fas fa-edit"></i></button> <button id="btnHapusUser" class="btn btn-danger btn-xs" data-id="`+data[a].id_user+`"><i class="nav-icon fas fa-trash"></i></button></td>
              </tr>`
          }
          $('#tbodyUser').html(html);
        }
      })
    }

    $("#btnTambah").on("click", function(){
      setSelectOutlet()
      $("#inputTambahNama").val("")
      $("#inputTambahUsername").val("")
      $("#modalTambah").modal("show")
    })

    $("#btnSimpanTambah").on("click", function(){
      let nama = $("#inputTambahNama").val()
      let username = $("#inputTambahUsername").val()
      let id_outlet = $("#selectTambahOutlet").val()
      let role = $("#selectTambahRole").val()
      
      if (nama != "" && username != "" && id_outlet != "" && role != ""){
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url() ?>user/createuser',
          dataType: 'json',
          data: {
            nama,
            username,
            id_outlet,
            role,
          },
          success: function(data) {
            refreshUser()
            SuccessSwal()
            $("#modalTambah").modal("hide")
          }
        })
      }else{
        ErrorRequiredSwal()
      }
    })

    $(document).on("click", "#btnEdit", function(){
      setSelectOutlet()

      let id = $(this).data("id")
      let nama = $(this).data("nama")
      let username = $(this).data("username")
      let id_outlet = $(this).data("id-outlet")
      let role = $(this).data("role")

      $('#inputEditId').val(id)
      $("#inputEditNama").val(nama)
      $("#inputEditUsername").val(username)
      $('#selectEditOutlet').val(id_outlet)
      $('#selectEditRole').val(role)
      $("#modalEdit").modal("show")
    })

    $(document).on("click", "#btnSimpanEdit", function(){
      let id = $("#inputEditId").val()
      let nama = $("#inputEditNama").val()
      let username = $("#inputEditUsername").val()
      let id_outlet = $("#selectEditOutlet").val()
      let role = $("#selectEditRole").val()
      
      if (nama != "" && username != "" && id_outlet != "" && role != ""){
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url() ?>user/updateuser',
          dataType: 'json',
          data: {
            id,
            nama,
            username,
            id_outlet,
            role,
          },
          success: function(data) {
            refreshUser()
            SuccessSwal()
            $("#modalEdit").modal("hide")
          }
        })
      }else{
        ErrorRequiredSwal()
      }
    })

    $(document).on("click", "#btnHapusUser", function(){
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
            url: '<?php echo base_url() ?>user/deleteuser',
            dataType: 'json',
            data: {
              id
            },
            success: function(data) {
              refreshUser()
              SuccessDeleteSwal()
            }
          })
        }
      })
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
