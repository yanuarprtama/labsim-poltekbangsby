@extends("view")
@section("title")
    <title>LABSIMPOLTEKBANG | Halaman</title>
@endsection
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Laboratorium & Simulator</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="/halaman">Konten</a></li>
                        <li class="breadcrumb-item active">Halaman</li>
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
                          <h3 class="card-title">Data Halaman</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th>Gambar</th>
                              <th>Judul</th>
                              <th>Dibaca</th>
                              <th>Penulis</th>
                              <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $dt)
                                <tr>
                                    <td><img src="assets/img/halaman/small-{{$dt['gambar']}}" style="width:100px; height:100px;" alt=""></td>
                                    <td>{{$dt['judul']}}</td>
                                    <td>{{$dt['dibaca']}}</td>
                                    @if ($dt['penulis'] == 1)
                                        <td>Super Admin</td>
                                    @else
                                        <td>Admin Poltekbang</td>
                                    @endif
                                    @if ($dt['status'] == 1)
                                        <td>Published</td>
                                    @else
                                        <td>Not Published</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Dibaca</th>
                                <th>Penulis</th>
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