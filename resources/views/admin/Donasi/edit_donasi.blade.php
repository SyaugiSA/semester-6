@extends('admin.index')

@section('head')
    <!-- jQuery -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.css') }}">
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Artikel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Edit Artikel</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Artikel</h3>
                        </div>
                        <div class="card-body">
                            <!-- Date -->
                            <div class="col-6">
                                <form action="{{route('donasi-admin.update',$edit->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="Judul">Judul</label>
                                        <input type="text"
                                            class="form-control @error('judul')
                                            is-invalid
                                        @enderror"
                                            id="Judul"  aria-describedby="emailHelp"
                                            placeholder="Judul Donasi" name="judul" value="{{$edit->judul}}">
                                        @error('judul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                   
                                    <!-- Date -->
                                    <div class="form-group">
                                        <label>Tanggal Mulai</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input  @error('added_at')
                                            is-invalid
                                        @enderror"
                                                data-target="#reservationdate" name="added_at" value="{{date('d/m/Y', strtotime($edit->added_at));}}"/>
                                            <div class="input-group-append" data-target="#reservationdate"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                            @error('added_at')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        </div>
                                       
                                    </div>
                                    <!-- Date -->
                                    <div class="form-group">
                                        <label>Tanggal Berakhir:</label>
                                        <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input  @error('ended_at')
                                            is-invalid
                                        @enderror"
                                                data-target="#reservationdate2" name="ended_at" value="{{date('d/m/Y', strtotime($edit->ended_at));}}" />
                                            <div class="input-group-append" data-target="#reservationdate2"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                            @error('ended_at')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <label for="pemasukan">Jumlah Dana yang dibutuhkan</label>
                                        <input type="text" class="form-control" id="jumlah_donasi" name="jumlah"
                                            placeholder="Dana yang dibutuhkan" value="{{$edit->jumlah}}">
            
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control @error('deskripsi')
                                        is-invalid
                                    @enderror " rows="3" placeholder="Deskripsi ..."
                                            name="deskripsi">{{$edit->deskripsi }} </textarea>
                                           
                                            @error('deskripsi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" accept="image/png, image/jpeg" class="custom-file-input" id="exampleInputFile" name="image" >
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">

                                        <img src="{{'/storage/'.$edit->gambar}}" width="175px" height="150px" alt="">
                                    </div>




                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.card -->


                    </div>

                </div>

                {{-- /. Row --}}
            </div>
            <!-- /.container-fluid -->
        </div>
    </section>


@endsection


@section('script')

    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- InputMask/Moment JS -->
    <script src="{{ asset('AdminLTE/plugins/moment/moment.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
      <script src="{{asset('js/FeLaznas/formatRp.js')}}"></script>
      <!-- bs-custom-file-input -->
      <script src="{{ asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
      <script>
      $(function () {
        bsCustomFileInput.init();
      });
      </script>
    <script>
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'DD/MM/YYYY'
        });

        $('#reservationdate2').datetimepicker({
            format: 'DD/MM/YYYY'
        });
    </script>
@endsection
