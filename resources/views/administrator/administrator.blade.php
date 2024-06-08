@extends("view")
@section("title")
    <title>LABSIMPOLTEKBANG | Administrator</title>
@endsection
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Administrator</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Admin</li>
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
                            @if (Auth::user()->role == 'Super Admin')
                                <a href="/tambahadmin" class="btn btn-primary mb-3">Tambah</a>
                            @endif
                            
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nomor Induk</th>
                                        <th>Nama</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $dt)
                                    <tr>
                                        <td>{{$dt['nomorinduk']}}</td>
                                        <td>{{$dt['name']}}</td>
                                        <td>{{$dt['role']}}</td>
                                        @if (Auth::user()->role == 'Super Admin')
                                        <td><a href="{{ route('editadministrator',['id'=> $dt['id']]) }}" class="btn btn-warning"><i class="fa-solid fa-edit"></i></a> | <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$dt['id']}}"><i class="fa-solid fa-trash"></i></button> | <a href="{{ route('detailadministrator',['id'=> $dt['id']]) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a></td>
                                        @else
                                            <td><a href="{{ route('detailadministrator',['id'=> $dt['id']]) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a></td>
                                        @endif
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
                                                <form action="{{ route('hapusadministrator',['id'=> $dt['id']]) }}" method="POST">
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
                                        <th>Nomor Induk</th>
                                        <th>Nama</th>
                                        <th>Role</th>
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
