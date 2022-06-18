@extends('admin.index')


@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Home</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
              {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   
    <section class="content">
    
      {{-- Pemasukan  --}}
      <div class="row">
        <div class="col-md-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Saldo Kas Masjid</h3>
  
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
  
<h2>  @currency($saldo->saldo + $home->sum('pemasukan') - $home->sum('pengeluaran')) </h2>

              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        {{-- Pengeluaran  --}}
        <div class="col-md-4">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Saldo Kas Sosial</h3>
  
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             
              {{-- <h2>{{ $home->sum('pengeluaran') }}</h2> --}}
             
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        {{-- Pengguna Sistem  --}}
        <div class="col-md-4">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Pengguna Sistem</h3>
  
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <h2 class="text-center">{{$user->count()}}</h2>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->




@endsection
 