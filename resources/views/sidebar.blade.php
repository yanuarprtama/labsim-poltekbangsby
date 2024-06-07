@yield("head")

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
                                {{-- <li class="nav-item">
                                    <a href="/jawaban" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jawaban</p>
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="/kritiksaran" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kritik & Saran</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link {{ Route::is('halaman') ? 'active' : '' }}{{ Route::is('slider') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Konten
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/halaman" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Halaman</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/slider" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Slider</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
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
                                <li class="nav-item">
                                    <a href="/kerusakan" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan Kerusakan</p>
                                    </a>
                                </li>
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
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        @yield("content")
        @yield("footer")