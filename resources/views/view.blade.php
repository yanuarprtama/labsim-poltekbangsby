<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @yield('title')
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css" />
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ Route::is('detaillab') ? '../' : ''}}{{ Route::is('editlab') ? '../' : ''}}{{Route::is('editadministrator') ? '../' : '' }}{{Route::is('detailadministrator') ? '../' : '' }}{{Route::is('editprodi') ? '../' : '' }}{{Route::is('detailprodi') ? '../' : '' }}{{Route::is('detailalat') ? '../' : '' }}{{Route::is('editalat') ? '../' : ''}}{{Route::is('editslider') ? '../' : ''}}{{Route::is('editpertanyaan') ? '../' : ''}}{{Route::is('konfirmasipeminjaman') ? '../' : ''}}{{Route::is('editperawatan') ? '../' : '' }}{{Route::is('konfirmasi') ? '../' : ''}}{{Route::is('editkerusakan') ? '../' : ''}}{{Route::is('editperbaikanalat') ? '../' : '' }}assets/img/poltekbang.png" alt="AdminLTELogo" height="300" width="450" />
        </div>

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <span>
                        <a href="/" class="nav-link font-weight-bold">POLTEKBANG SURABAYA</a>
                    </span>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" role="button" href="/logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/dashboard" class="brand-link">
                <img src="{{ Route::is('detaillab') ? '../' : ''}}{{ Route::is('editlab') ? '../' : ''}}{{Route::is('editadministrator') ? '../' : '' }}{{Route::is('detailadministrator') ? '../' : '' }}{{Route::is('editprodi') ? '../' : '' }}{{Route::is('detailprodi') ? '../' : '' }}{{Route::is('detailalat') ? '../' : '' }}{{Route::is('editalat') ? '../' : ''}}{{Route::is('editslider') ? '../' : ''}}{{Route::is('editpertanyaan') ? '../' : ''}}{{Route::is('konfirmasipeminjaman') ? '../' : ''}}{{Route::is('editperawatan') ? '../' : '' }}{{Route::is('konfirmasi') ? '../' : ''}}{{Route::is('editkerusakan') ? '../' : ''}}{{Route::is('editperbaikanalat') ? '../' : '' }}assets/img/poltekbang.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
                <span class="brand-text font-weight-bold">LAB & SIM</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ Route::is('detaillab') ? '../' : ''}}{{ Route::is('editlab') ? '../' : ''}}{{Route::is('editadministrator') ? '../' : '' }}{{Route::is('detailadministrator') ? '../' : '' }}{{Route::is('editprodi') ? '../' : '' }}{{Route::is('detailprodi') ? '../' : '' }}{{Route::is('detailalat') ? '../' : '' }}{{Route::is('editalat') ? '../' : ''}}{{Route::is('editslider') ? '../' : ''}}{{Route::is('editpertanyaan') ? '../' : ''}}{{Route::is('konfirmasipeminjaman') ? '../' : ''}}{{Route::is('editperawatan') ? '../' : '' }}{{Route::is('konfirmasi') ? '../' : ''}}{{Route::is('editkerusakan') ? '../' : ''}}{{Route::is('editperbaikanalat') ? '../' : '' }}assets/img/default-user.png" class="img-circle elevation-2 mr-3" alt="User Image" />
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}<br />{{ Auth::user()->role }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ Route::is('peminjamanlab') ? 'active' : '' }}{{ Route::is('peminjamanalat') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-diagram-project"></i>
                                <p>
                                    peminjaman
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/peminjamanlab" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Peminjaman Lab</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/peminjamanAlat" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Peminjaman Alat</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ Route::is('pengembalianlab') || Route::is('pengembalianalat') ? 'active' : ''  }}">
                                <i class="nav-icon fa-solid fa-diagram-project"></i>
                                <p>
                                    Pengembalian
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/pengembalianLab" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pengembalian Lab</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/pengembalianAlat" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pengembalian Alat</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @if (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin')
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ Route::is('lab') ? 'active' : '' }}{{ Route::is('alat') ? 'active' : '' }}{{ Route::is('prodi') ? 'active' : '' }}{{ Route::is('administrator') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Master Data
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/lab" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Daftar Lab</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/alat" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Daftar Alat</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/prodi" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Daftar Prodi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/administrator" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Daftar User</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file-pen"></i>
                                <p>
                                    Kuisioner
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/pertanyaan" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pertanyaan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kritiksaran" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kritik & Saran</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ Route::is('perawatan')||Route::is('kerusakan') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-gear"></i>
                                <p>
                                    Maintenance
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/perawatan" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Perawatan Lab</p>
                                    </a>
                                </li>
                                @if (Auth::user()->role == 'Super Admin'|| Auth::user()->role == 'Admin')
                                <li class="nav-item">
                                    <a href="/kerusakan" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan Kerusakan</p>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ Route::is('laporan')||Route::is('lperawatan') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-folder-open"></i>
                                <p>
                                    Laporan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/laporan" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan Peminjaman</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/laporanPerawatan" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan Perawatan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    @endif
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        
        @yield("content")

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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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