@extends("view")
@section("title")
    <title>LABSIMPOLTEKBANG | Laporan Kerusakan</title>
@endsection
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Laporan Kerusakan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Laporan Kerusakan</li>
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
                            <h3 class="card-title">Data Laporan Kerusakan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="/tambahkerusakan" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah</a>
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No Laporan</th>
                                        <th>Kode Item</th>
                                        <th>Tanggal</th>
                                        <th>Kategori Kerusakan</th>
                                        <th>Uraian</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $dt)
                                    
                                    <tr>
                                        <td>{{$dt['nomor_laporan']}}</td>
                                        <td>{{$dt['kode_item']}}</td>
                                        <td>{{$dt['tanggal']}}</td>
                                        <td>{{$dt['kategori']}}</td>
                                        <td>{{$dt['uraian']}}</td>
                                        <td><img style="width: 200px; height: 100px;" src="assets/img/laporanKerusakan/{{$dt['gambar']}}" alt="Gambar Alat"></td>
                                        <td><a href="{{ route('editkerusakan',['id'=> $dt['id']]) }}" class="btn btn-warning"><i class="fa-solid fa-edit"></i></a> | <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$dt['id']}}"><i class="fa-solid fa-trash"></i></button></td>
                                    </tr>
                                    <div class="modal fade" id="modal-danger{{$dt['id']}}">
                                        <div class="modal-dialog">
                                          <div class="modal-content bg-danger">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Hapus Data?</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <p>Anda yakin ingin menghapus data <b>{{$dt['nomor_laporan']}}</b> ?&hellip;</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <form action="{{ route('hapuskerusakan',['id'=> $dt['id']]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-outline-light">Yakin</button>
                                                </form>
                                            </div>
                                          </div>
                                          <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                      </div>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                      <th>No Laporan</th>
                                      <th>Kode Item</th>
                                      <th>Tanggal</th>
                                      <th>Kategori Kerusakan</th>
                                      <th>Uraian</th>
                                      <th>Gambar</th>
                                      <th>Aksi</th>
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