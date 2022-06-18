@extends('admin.index')

@section('head')
    <!-- jQuery -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.css') }}">
@endsection



@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Donasi Laznas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Donasi Laznas</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">


        {{-- Table --}}

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div id="fails_message"></div>
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title ">Donasi Laznas</h3>
                        </div>

                        <!-- /.card-header -->

                        <div class="card-body">

                            <div class="mb-3">

                                <a href="{{ route('donasi-admin.create') }}" class="btn btn-primary my-3"><i
                                        class="fas fa-info"></i> Tambah Data Donasi</a>


                            </div>



                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Mulai</th>
                                        <th>Berakhir</th>
                                        <th>Jumlah</th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->judul }}</td>
                                            <td>{{ $d->added_at }}</td>
                                            <td>{{ $d->ended_at }}</td>
                                            <td>@currency($d->jumlah)</td>
                                            <td>{{ $d->deskripsi }}</td>
                                            <td> <img src="{{ '/storage/' . $d->gambar }}" alt="" width="175px"
                                                    height="150px"></td>

                                            <td>
                                                <form action="{{ route('donasi-admin.destroy', $d->id) }}" method="post">
                                                    <a href="{{ route('donasi-admin.edit', $d->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-user-edit"></i> Edit
                                                    </a>
                                                    @csrf
                                                    @method('delete')
                                                        
                                                    <button type="submit" class="btn btn-danger btn-sm" id="Hapus"><i
                                                            class="far fa-trash-alt"></i>Hapus</button>
                                                </form>

                                                <form action="{{ $d->is_actived == 1 ? route('donasi.nonactive',$d->id) : route('donasi.active',$d->id)  }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    @if ($d->is_actived == 1)
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Pakah Anda Yakin Ingin Menonaktifkan Data Ini?')">
                                                        <i class="fa fa-exclamation"></i></button>
                                                    @else
                                                    <button type="submit" class="btn btn-primary"
                                                        onclick="return confirm('Pakah Anda Yakin Ingin Mengaktifkan Data Ini?')" >
                                                        <i class="fa fa-check"></i></button>
                                                    @endif
                                                </form>
                                             
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah Dana</th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
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

        {{-- End Table --}}
    </section>
    <!-- /.content -->
@endsection

@section('script')
    {{-- sweet ALert Github --}}
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <!-- InputMask/Moment JS -->
    <script src="{{ asset('AdminLTE/plugins/moment/moment.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


    <script>
        $(function() {

            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
@endsection
