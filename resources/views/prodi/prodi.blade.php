@extends("view")
@section("title")
    <title>LABSIMPOLTEKBANG | Prodi</title>
@endsection
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Program Studi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Prodi</li>
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
                            <h3 class="card-title">Data Admin</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="/tambahprodi" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah</a>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Gambar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $dt)
                                    <tr>
                                        <td>{{$dt['kode']}}</td>
                                        <td>{{$dt['nama']}}</td>
                                        <td><img style="width: 100px; height: 80px;" src="assets/img/prodi/{{$dt['gambar']}}" alt="gambar"></td>
                                        <td>{{$dt['status']}}</td>
                                        <td><a href="{{ route('editprodi',['id'=> $dt['id']]) }}" class="btn btn-warning"><i class="fa-solid fa-edit"></i></a> | <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$dt['id']}}"><i class="fa-solid fa-trash"></i></button> | <a href="{{ route('detailprodi',['id'=> $dt['id']]) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a></td>
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
                                              <p>Anda yakin ingin menghapus data <b>{{$dt['nama']}}</b> ?&hellip;</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <form action="{{ route('hapusprodi',['id'=> $dt['id']]) }}" method="POST">
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
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Gambar</th>
                                        <th>Status</th>
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