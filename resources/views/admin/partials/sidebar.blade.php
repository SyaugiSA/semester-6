 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href=" {{ url('/admin') }} " class="brand-link">
         <img src="{{asset('image/laznas.jpg')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Laznas</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 {{-- <img src="{{'/storage/'.Auth::user()->profile_photo_path}}" class="img-circle elevation-2"
                     alt="User Image"> --}}
                     <img src="#" alt="">
             </div>
             <div class="info">
                 {{-- <a href="#" class="d-block">{{Auth::user()->name}}</a> --}}
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href=" {{ url('/admin') }}" class="nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Home
                         </p>
                     </a>
                 </li>
                 {{-- @if (Auth::user()->role == 'admin')                     --}}
                 <li class="nav-item">

                     <a href="{{route('donasi-admin.index')}}" class="nav-link">

                         <i class="fas fa-user-tie"></i>
                         <p>
                             Tambah Donasi
                         </p>
                     </a>
                 </li>
                 {{-- @endif --}}
                 <li class="nav-item">

                    <a href="{{ route('artikel-admin.index') }}" class="nav-link">

                        <i class="fas fa-calendar-alt"></i>
                        <p>
                            Tambah Artikel
                        </p>
                    </a>
                </li>


                 <li class="nav-item">
                     <a href="{{route('transaksi.index')}}" class="nav-link">
                        <i class="fas fa-money-bill-alt"></i>
                         <p>
                             Transaksi Donasi
                         </p>
                     </a>
                 </li>

               





                   <li class="nav-item">
                     <a href="{{ url('admin/profile-setting') }}" class="nav-link">
                         <i class="fas fa-user-cog"></i>
                         <p>
                             Profile Setting
                         </p>
                     </a>
                 </li>



                 <li class="nav-item">
                         <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                             <i class="fas fa-sign-out-alt"></i>
                             {{ __('Logout') }}

                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                 </li>




         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
