<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>LABSIMPOLTEKBANG | Laporan Perawatan</title>
    <link rel="shortcut icon" href="assets/img/plane-icon.jpg">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="assets/plugins/fontawesome-free-6.5.2-web/css/all.min.css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css" />
</head>
            
                
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Laporan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{-- <button class="btn btn-success m-1" type="submit"><i class="fas fa-table"></i> Export Excel</button><button class="btn btn-danger m-1" type="submit"><i class="fas fa-file"></i> Export PDF</button> --}}
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Jenis Perawatan</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
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
            
        

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1")
            .DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: true,
                buttons: ["excel", "print", "colvis"],
            })
            .buttons()
            .container()
            .appendTo("#example1_wrapper .col-md-6:eq(0)");
        $("#example2").DataTable({
            paging: true,
            lengthChange: false,
            searching: false,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
        });
    });
</script>
</body>

</html>