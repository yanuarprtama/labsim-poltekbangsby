@extends("sidebar")
@section("head")
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>LABSIMPOLTEKBANG | Lab</title>
    <link rel="shortcut icon" href="assets/img/plane-icon.jpg">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="assets/plugins/fontawesome-free-6.5.2-web/css/all.min.css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
@endsection
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Peminjaman Laboratorium</h1>
                </div>
                <div class="error-message">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <!-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Lab</li>
                    </ol>
                </div> -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Peminjaman</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('peminjamanlab-store') }}" method="post">
                                @csrf
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">NIT</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="nit_pengguna" value="{{ Auth::user()->nomorinduk }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="inputPassword4" name="nama_pengguna" value="{{ Auth::user()->name }}" readonly>
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Program Studi</label>
                                    <input type="text" class="form-control" id="inputAddress" name="" value="{{ Auth::user()->nama }}" readonly>
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
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Mata Kuliah</label>
                                    <input type="text" class="form-control" id="inputMatKul" name="mata_kuliah" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="time-start">Jam Mulai:</label>
                                    <input type="datetime-local" id="time-start" value="2024-05-08 08:15" class="form-control" name="waktu_mulai" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="time-start">Jam Selesai:</label>
                                    <input type="datetime-local" id="time-start" value="2024-05-08 08:15" class="form-control" name="waktu_selesai" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Dosen Pengajar</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="dosen_pengajar" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Praktikum</label>
                                    <input type="text" class="form-control" id="inputPassword4" name="praktikum"  required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" id="inputPassword4" name="jumlah_peserta"  required>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Data yang diisikan sudah benar
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
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