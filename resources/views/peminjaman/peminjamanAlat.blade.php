@extends("view")
@section("title")
    <title>LABSIMPOLTEKBANG | Peminjaman Alat</title>
@endsection
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Peminjaman Alat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Peminjaman Alat</li>
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
                            <h3 class="card-title">Peminjaman Alat</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('formPeminjamanAlat') }}" class="btn btn-primary">Tambah</a>
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
                                        <td>{{ $dt['nomor_peminjaman'] }}</td>
                                        <td>{{ $dt['alat_item'] }}</td>
                                        <td>{{ $dt['nama_pengguna'] }}</td>
                                        <td>{{ $dt['waktu_mulai'] }}</td>
                                        <td>{{ $dt['waktu_selesai'] }}</td>
                                        <td>{{ $dt['kondisi'] }}</td>
                                        <td>
                                            @if($dt['status'] == 'DITERIMA')
                                                <span class="badge text-bg-primary">{{ $dt['status'] }}</span>
                                                <a href="{{ route('kembalikanPeminjamanAlat', ['id' => $dt['id']]) }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#returnModal-{{ $dt->nomor_peminjaman }}" data-id="{{ $dt->nomor_peminjaman }}">Kembalikan</a>
                                            @elseif($dt['status'] == 'DIKEMBALIKAN')
                                                <span class="badge text-bg-success">{{ $dt['status'] }}</span>
                                            @elseif($dt['status'] == 'PENDING')
                                                <span class="badge text-bg-warning">{{ $dt['status'] }}</span>
                                            @elseif($dt['status'] == 'DITOLAK')
                                                <span class="badge text-bg-danger">{{ $dt['status'] }}</span>
                                            @elseif($dt['status'] == 'KADALUWARSA')
                                                <span class="badge text-bg-secondary">{{ $dt['status'] }}</span>
                                            @else
                                                <span class="badge text-bg-dark">{{ $dt['status'] }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('konfirmasipeminjamanalat',['id'=> $dt['id']]) }}" class="btn btn-info">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </td>
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

        <!-- Modal -->
        @foreach ($data as $dt)
        <div class="modal fade" id="returnModal-{{ $dt->nomor_peminjaman }}" tabindex="-1" role="dialog" aria-labelledby="returnModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="returnModalLabel">Kuesioner Kritik dan Saran {{ $dt->nomor_peminjaman }}</h5>
                        {{ $dt['nomor_peminjaman'] }}
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('kritiksaran') }}">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="nomor_peminjaman" id="nomor_peminjaman" value="{{ $dt->nomor_peminjaman }}">
                            <div class="form-group">
                                <label for="kritik">Kritik</label>
                                <textarea class="form-control" id="kritik" name="kritik" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="saran">Saran</label>
                                <textarea class="form-control" id="saran" name="saran" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </section>
    <!-- /.content -->
</div>
@endsection

@section('scripts')
<script>
    $('#returnModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var peminjamanId = button.data('id'); // Extract info from data-* attributes
        var modal = $(this);
        modal.find('.modal-body #nomor_peminjaman').val(peminjamanId);
    });
</script>
@endsection