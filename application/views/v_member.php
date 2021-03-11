  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">Member</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Member</li>
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
                  <button id="btnTambah" class="btn btn-sm btn-success rounded">&plus; Tambah Member</button>
                </div>

                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">Jenis Kelamin</th>
                      <th scope="col">Telepon</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="tbodyMember">

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
          <h5>Tambah Member</h5>
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
                  <label for="inputTambahTelp">Telepon</label>
                  <input class="form-control" type="tel" id="inputTambahTelp" required>
                </div> 
                 
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="inputTambahJenisKelamin">Jenis Kelamin</label><br>
                  <div class="icheck-success icheck-inline">
                      <input type="radio" id="radioTambahLakiLaki" name="groupTambahJenisKelamin" value="L" required/>
                      <label for="radioTambahLakiLaki">Laki Laki</label>
                  </div>
                  <div class="icheck-success icheck-inline">
                      <input type="radio" id="radioTambahPerempuan" name="groupTambahJenisKelamin" value="P"/>
                      <label for="radioTambahPerempuan">Perempuan</label>
                  </div>
                </div>         
                
                <div class="form-group">
                  <label for="inputTambahAlamat">Alamat</label>
                  <textarea class="form-control" id="inputTambahAlamat" rows="3" required></textarea>
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
          <h5>Tambah Member</h5>
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
                  <label for="inputEditTelp">Telepon</label>
                  <input class="form-control" type="tel" id="inputEditTelp" required>
                </div> 
                 
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="inputEditJenisKelamin">Jenis Kelamin</label><br>
                  <div class="icheck-success icheck-inline">
                      <input type="radio" id="radioEditLakiLaki" name="groupEditJenisKelamin" value="L" required/>
                      <label for="radioEditLakiLaki">Laki Laki</label>
                  </div>
                  <div class="icheck-success icheck-inline">
                      <input type="radio" id="radioEditPerempuan" name="groupEditJenisKelamin" value="P"/>
                      <label for="radioEditPerempuan">Perempuan</label>
                  </div>
                </div>         
                
                <div class="form-group">
                  <label for="inputEditAlamat">Alamat</label>
                  <textarea class="form-control" id="inputEditAlamat" rows="3" required></textarea>
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
    refreshMember();

    function refreshMember(){
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>member/getmember',
        dataType: 'json',
        success: function(data) {
          var html = "";
          for (let a = 0; a < data.length; a++) {
              let attrs = " data-id='"+ data[a].id_member  +"' data-nama='"+ data[a].nama_member +"' data-alamat='"+ data[a].alamat +"' data-jenis-kelamin='"+ data[a].jenis_kelamin +"' data-telp='"+data[a].telp+"' ";
              (data[a].jenis_kelamin == "L") ? jenis_kelamin = `Laki-Laki`: jenis_kelamin = `Perempuan`
              html += `<tr>
                <th scope="row">`+(a+1)+`</th>
                <td>`+data[a].nama_member+`</td>
                <td>`+data[a].alamat+`</td>
                <td>`+jenis_kelamin+`</td>
                <td>`+data[a].telp+`</td>
                <td><button id="btnEdit" `+ attrs +` class="btn btn-primary btn-xs"><i class="nav-icon fas fa-edit"></i></button> <button id="btnHapusMember" class="btn btn-danger btn-xs" data-id="`+data[a].id_member+`"><i class="nav-icon fas fa-trash"></i></button></td>
              </tr>`
          }
          $('#tbodyMember').html(html);
        }
      })
    }

    $("#btnTambah").on("click", function(){
      $("#inputTambahNama").val("")
      $("#inputTambahTelp").val("")
      $("#inputTambahAlamat").val("")
      $("input[name='groupTambahJenisKelamin']").removeAttr('checked');
      $("#modalTambah").modal("show")
    })

    $("#btnSimpanTambah").on("click", function(){
      let nama = $("#inputTambahNama").val()
      let telp = $("#inputTambahTelp").val()
      let alamat = $("#inputTambahAlamat").val()
      let jenis_kelamin = $('input[name="groupTambahJenisKelamin"]:checked').val();
      
      if (nama != "" && telp != "" && alamat != "" && jenis_kelamin != ""){
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url() ?>member/createmember',
          dataType: 'json',
          data: {
            nama,
            alamat,
            jenis_kelamin,
            telp,
          },
          success: function(data) {
            refreshMember()
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
      let nama = $(this).data("nama")
      let telp = $(this).data("telp")
      let alamat = $(this).data("alamat")
      let jenis_kelamin = $(this).data("jenis-kelamin")

      $('#inputEditId').val(id)
      $("#inputEditNama").val(nama)
      $("#inputEditTelp").val(telp)
      $("#inputEditAlamat").val(alamat)
      if (jenis_kelamin == "L") {
        $("#radioEditLakiLaki").prop("checked", true) 
      } else{
        $("#radioEditPerempuan").prop("checked", true)
      } 
      $("#modalEdit").modal("show")
    })

    $(document).on("click", "#btnSimpanEdit", function(){
      let id = $("#inputEditId").val()
      let nama = $("#inputEditNama").val()
      let telp = $("#inputEditTelp").val()
      let alamat = $("#inputEditAlamat").val()
      let jenis_kelamin = $('input[name="groupEditJenisKelamin"]:checked').val()

      if (id != "" &&nama != "" && telp != "" && alamat != "" && jenis_kelamin != ""){
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url() ?>member/updatemember',
          dataType: 'json',
          data: {
            id,
            nama,
            alamat,
            jenis_kelamin,
            telp,
          },
          success: function(data) {
            refreshMember()
            SuccessSwal()
            $("#modalEdit").modal("hide")
          }
        })
      }else{
        ErrorRequiredSwal()
      }
    })

    $(document).on("click", "#btnHapusMember", function(){
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
            url: '<?php echo base_url() ?>member/deletemember',
            dataType: 'json',
            data: {
              id
            },
            success: function(data) {
              refreshMember()
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
