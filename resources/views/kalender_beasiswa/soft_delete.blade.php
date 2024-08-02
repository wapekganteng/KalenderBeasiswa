<!-- resources/views/soft_delete.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soft Deleted Kalender Beasiswa</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
</head>

<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Soft Deleted Kalender Beasiswa</div>

                    <div class="card-body">
                        @if ($trash->isEmpty())
                            <p>No soft deleted Kalender Beasiswa found.</p>
                        @else
                            @php $no = 1; @endphp
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tingkat Studi</th>
                                        <th>Negara</th>
                                        <th>Tanggal Registrasi</th>
                                        <th>Deadline</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Jenis Beasiswa</th>
                                        <th>Keuntungan</th>
                                        <th>Umur</th>
                                        <th>GPA</th>
                                        <th>Tes English</th>
                                        <th>Tes Bahasa Lain</th>
                                        <th>Tes Standard</th>
                                        <th>Dokumen</th>
                                        <th>Lainnya</th>
                                        <th>Status Tampil</th>
                                        <th>Tanggal Di Hapus</th>
                                        <th>Sisa Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trash as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                @foreach ($item->tingkat_studi as $tingkat)
                                                    {{ $tingkat->nama }}<br>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($item->negara as $negara)
                                                    {{ $negara->nama }}<br>
                                                @endforeach
                                            </td>
                                            <td>{{ date('d-m-Y', strtotime($item->tanggal_registrasi)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->deadline)) }}</td>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td>{{ $item->jenis_beasiswa }}</td>
                                            <td>{{ $item->keuntungan }}</td>
                                            <td>{{ $item->umur }}</td>
                                            <td>{{ $item->gpa }}</td>
                                            <td>{{ $item->tes_english }}</td>
                                            <td>{{ $item->tes_bahasa_lain }}</td>
                                            <td>{{ $item->tes_standard }}</td>
                                            <td>{{ $item->dokumen }}</td>
                                            <td>{{ $item->lainnya }}</td>
                                            <td>{{ $item->status_tampil }}</td>
                                            <td>{{ $item->deleted_at->format('d-m-Y H:i:s') }}</td>
                                            <td>{{ $item->deleted_at->addDays(30)->diffForHumans(null, true) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('kalender_beasiswa.index') }}" class="btn btn-primary">Back to Kalender Beasiswa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>
