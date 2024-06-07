@extends("view")
@section("title")
    <title>LABSIMPOLTEKBANG | Laporan Perawatan</title>
@endsection
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Laporan Perawatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Laporan Perawatan</li>
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
                            <h3 class="card-title">Data Laporan Perawatan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('lgrouping') }}" method="POST">
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
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Jenis Perawatan</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Dokumentasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $dt)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$dt['namalab']}}</td>
                                        <td>{{$dt['tanggal']}}</td>
                                        <td>{{$dt['jenisperawatan']}}</td>
                                        <td>{{$dt['keterangan']}}</td>
                                        <td>{{$dt['status']}}</td>
                                        <td><img src="assets/img/perawatan/{{$dt['gambar']}}" alt="Dokumentasi Perawatan" style="width: 200px; height: 100px;"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Jenis Perawatan</th>
                                        <th>Keterangan</th>
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