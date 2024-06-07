@extends("view")
@section("title")
    <title>LABSIMPOLTEKBANG | Pengembalian Lab</title>
@endsection
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengembalian Lab</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Pengembalian Lab</li>
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
                            <h3 class="card-title">Pengembalian Lab</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No Peminjaman</th>
                                        <th>Item</th>
                                        <th>Nama Pengguna</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Kondisi</th>
                                        <th>Status</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $dt)
                                    <tr>
                                        <td>{{$dt['nomor_peminjaman']}}</td>
                                        <td>{{$dt['kode_item']}}</td>
                                        <td>{{$dt['nama_pengguna']}}</td>
                                        <td>{{$dt['tanggal_pinjam']}}</td>
                                        <td>{{$dt['tanggal_kembali']}}</td>
                                        <td>{{$dt['kondisi']}}</td>
                                        @php
                                            if($dt['status'] == 'DITERIMA'){
                                                echo "<td><span class='badge text-bg-primary'>".$dt['status']."</span></td>";
                                            }else if($dt['status'] == 'DIKEMBALIKAN'){
                                                echo "<td><span class='badge text-bg-success'>".$dt['status']."</span></td>";
                                            }else if($dt['status'] == 'PENDING'){
                                                echo "<td><span class='badge text-bg-warning'>".$dt['status']."</span></td>";
                                            }else if($dt['status'] == 'DITOLAK'){
                                                echo "<td><span class='badge text-bg-danger'>".$dt['status']."</span></td>";
                                            }else if($dt['status'] == 'KADALUWARSA'){
                                                echo "<td><span class='badge text-bg-secondary'>".$dt['status']."</span></td>";
                                            }else{
                                                echo "<tr>";
                                            }
                                        @endphp
                                        <td><button class="btn btn-info"><i class="fa-solid fa-eye"></i></button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No Peminjaman</th>
                                        <th>Item</th>
                                        <th>Nama Pengguna</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Kondisi</th>
                                        <th>Status</th>
                                        <th>Detail</th>
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