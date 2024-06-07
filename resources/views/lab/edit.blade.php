@extends("sidebar")
@section("head")
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LABSIMPOLTEKBANG | Edit Lab</title>
  <link rel="shortcut icon" href="../assets/img/plane-icon.jpg">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css" />
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free-6.5.2-web/css/all.min.css" />
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
@endsection
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Laboratorium & Simulator</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="/lab">Daftar Lab</a></li>
                        <li class="breadcrumb-item active">Edit Lab</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Data Lab</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('updatelab',['id'=> $data['id']]) }}" method="POST">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="kode">Kode</label>
                      <input type="text" name="kode" class="form-control" id="kode" placeholder="Masukkan Kode" value="{{$data['kode']}}">
                    </div>
                    <div class="form-group">
                      <label for="Nama">Nama</label>
                      <input type="text" name="nama" class="form-control" id="Nama" placeholder="Nama" value="{{$data['nama']}}">
                    </div>
                    <div class="form-group">
                        <label for="Lokasi">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" id="Lokasi" placeholder="Lokasi" value="{{$data['lokasi']}}">
                      </div>
                      <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="Deskripsi" value="{{$data['deskripsi']}}">
                      </div>
                      <div class="form-group">
                        <label for="virtualtour">Virtual Tour URL</label>
                        <input type="text" name="virtualtour_url" class="form-control" id="virtualtour" placeholder="Virtualtour" value="{{$data['virtualtour_url']}}">
                      </div>
                      <div class="form-group">
                        <label for="prodi">Prodi</label>
                        <input type="text" name="prodi" class="form-control" id="prodi" placeholder="Prodi" value="{{$data['prodi']}}">
                      </div>
                      <div class="form-group">
                        <label for="status_ketersediaan">Status Ketersediaan</label>
                        <select name="status_ketersediaan" class="form-control" id="status_ketersediaan">
                          <option value="{{$data['status_ketersediaan']}}">{{$data['status_ketersediaan']}}</option>
                          <option value="TERSEDIA">TERSEDIA</option>
                          <option value="TIDAK TERSEDIA">TIDAK TERSEDIA</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" class="form-control" id="kategori">
                          <option value="{{$data['kategori']}}">{{$data['kategori']}}</option>
                          <option value="LABORATORIUM">LABORATORIUM</option>
                          <option value="SIMULATOR">SIMULATOR</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="Status">Status</label>
                        <select name="status" class="form-control" id="status">
                          <option value="{{$data['status']}}">{{$data['status']}}</option>
                          <option value="AKTIF">AKTIF</option>
                          <option value="NONAKTIF">NONAKTIF</option>
                        </select>
                      </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
  
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
</div>
@endsection
@section("footer")
<footer class="main-footer">
    <div class="float-right d-none d-sm-block"><b>Version</b> 3.2.0</div>
    <strong>Copyright &copy; 2014-2021
        <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/plugins/jszip/jszip.min.js"></script>
<script src="../assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1")
            .DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
            })
            .buttons()
            .container()
            .appendTo("#example1_wrapper .col-md-6:eq(0)");
        $("#example2").DataTable({
            paging: true,
            lengthChange: false,
            searching: false,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
        });
    });
</script>
</body>

</html>
@endsection