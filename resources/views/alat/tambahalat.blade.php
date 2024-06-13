@extends("sidebar")
@section("head")
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LABSIMPOLTEKBANG | Tambah Alat</title>
  <link rel="shortcut icon" href="assets/img/plane-icon.jpg">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css" />
  <link rel="stylesheet" href="assets/plugins/fontawesome-free-6.5.2-web/css/all.min.css" />
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
@endsection
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Alat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="/alat">Daftar alat</a></li>
                        <li class="breadcrumb-item active">Tambah Alat</li>
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
                  <h3 class="card-title">Tambah Data Alat</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/prosestambahalat" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="Nama">Nama</label>
                      <input type="text" name="nama" class="form-control" id="Nama" placeholder="Nama">
                    </div>
                      <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="Deskripsi">
                      </div>
                      <div class="form-group">
                        <label for="Status">Status</label>
                        <select name="status" class="form-control" id="status">
                          <option>----------------- status ----------------------</option>
                          <option value="TERSEDIA">TERSEDIA</option>
                          <option value="TIDAK TERSEDIA">TIDAK TERSEDIA</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" name="stok" class="form-control" id="stok" placeholder="Stok">
                      </div>
                      <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="gambar" id="gambar">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="inputState" class="form-label">Laboratorium</label>
                        <select id="inputState" class="form-select" name="namalab" required>
                            <option selected disabled>Choose...</option>
                            @foreach($lab as $l)
                            <option value="{{ $l->id }}">{{ $l->nama }}</option>
                            @endforeach
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
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
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