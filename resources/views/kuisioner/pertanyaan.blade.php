@extends("view")
@section("title")
    <title>LABSIMPOLTEKBANG | Kuesioner</title>
@endsection
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pertanyaan Kuesioner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="/pertanyaan">Kuesioner</a></li>
                        <li class="breadcrumb-item active">Pertanyaan</li>
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
                          <h3 class="card-title">Data Pertanyaan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <a href="/tambahpertanyaan" class="btn btn-primary mb-3">Tambah</a>
                          <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Type</th>
                                <th style="width: 80px;">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $dt)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$dt['pertanyaan']}}</td>
                                    <td>{{$dt['type']}}</td>
                                    <td style="width: 80px;"><a href="{{ route('editpertanyaan',['id'=> $dt['id']]) }}" class="btn btn-warning"><i class="fa-solid fa-edit"></i></a> | <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$dt['id']}}"><i class="fa-solid fa-trash"></i></button></td>
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
                                            <form action="{{ route('hapuspertanyaan',['id'=> $dt['id']]) }}" method="POST">
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
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Type</th>
                                <th style="width: 80px;">Aksi</th>
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