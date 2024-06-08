@extends("view")
@section("title")
    <title>LABSIMPOLTEKBANG | Laporan Peminjaman</title>
@endsection
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Laporan Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Laporan Peminjaman</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Laporan Peminjaman</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('grouping') }}" method="POST">
                                @csrf
                                <div>
                                    <label for="start_date">Tanggal Mulai:</label>
                                    <input type="date" id="start_date" name="start_date" required>
                                
                                    <label for="end_date">Tanggal Selesai:</label>
                                    <input type="date" id="end_date" name="end_date" required>

                                    <button class="btn btn-primary" type="submit">Generate</button>
                                </div>
                                
                            </form>
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode Peminjaman</th>
                                        <th>Mata Kuliah</th>
                                        <th>Program Study</th>
                                        <th>Nama Pengguna</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $dt)
                                    <tr>
                                    
                                        <td>{{$dt['nomor_peminjaman']}}</td>
                                        <td>{{$dt['mata_kuliah']}}</td>
                                        <td>{{$dt['course']}}</td>
                                        <td>{{$dt['nama_pengguna']}}</td>
                                        <td>{{$dt['status']}} </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Kode Peminjaman</th>
                                        <th>Mata Kuliah</th>
                                        <th>Program Study</th>
                                        <th>Nama Pengguna</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>
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