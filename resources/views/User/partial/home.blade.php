@extends('User.web')

@section('head')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->

    <link rel="stylesheet"
        href="{{ asset('AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- jQuery -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/FeLaznas/cardArtikel.css') }}">
    <script>
        function getDay(d, i) {
            day = new Date(d);
            var daylist = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            document.getElementById("day" + i).innerHTML = daylist[day.getDay()];
        }

        function getDate(d, i) {
            day = new Date(d);
            var monthlist = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                "Oktober", "November", "Desember"
            ];
            document.getElementById("date" + i).innerHTML = day.getDate() + " " + monthlist[day.getMonth()] + " " + day
                .getFullYear();
        }
    </script>
@endsection
@section('content')
    <div class="container container">
        <section class="mt-3 banner">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md order">
                                <h1 class="title">Pendidikan</h1>
                                <p class="subtitle">Pendidikan merupakan proses yang dijalani oleh setiap manusia
                                    untuk bisa memahami dan mempelajari hal baru yang belum pernah ia ketahui sebelumnya.
                                    Oleh karena itu, pendidikan menjadi salah satu hal yang paling penting dalam kehidupan
                                    manusia agar bisa menjadi pribadi yang jauh lebih baik lagi ke depannya.</p>
                                <div class="d-flex justify-content-center d-md-block">

                                </div>
                            </div>
                            <div class="col-md order">
                                <img src="{{ asset('image/sekolah.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md order">
                                <h1 class="title">Dakwah</h1>
                                <p class="subtitle">Pendidikan merupakan proses yang dijalani oleh setiap manusia
                                    untuk bisa memahami dan mempelajari hal baru yang belum pernah ia ketahui sebelumnya.
                                    Oleh karena itu, pendidikan menjadi salah satu hal yang paling penting dalam kehidupan
                                    manusia agar bisa menjadi pribadi yang jauh lebih baik lagi ke depannya.
                                </p>
                                <div class="d-flex justify-content-center d-md-block">

                                </div>
                            </div>
                            <div class="col-md order">
                                <img src="{{ asset('image/dakwah2.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md order">
                                <h1 class="title">Kemanusiaan</h1>
                                <p class="subtitle">Kemanusiaan adalah tentang nilai-nilai yang dianut oleh manusia
                                    dalam kaitan hubungannya dengan sesama manusia, seperti toleransi, welas-asih,
                                    cinta-kasih, tolong-menolong, gotong-royong, mendahulukan kepentingan umum, dan banyak
                                    lainnya. Semua nilai-nilai itu adalah antara manusia dengan manusia</p>
                                <div class="d-flex justify-content-center d-md-block">

                                </div>
                            </div>
                            <div class="col-md order">
                                <img src="{{ asset('image/kemanusiaan2.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md order">
                                <h1 class="title">Kemitraan</h1>
                                <p class="subtitle">We strive to congregate at least once a weaek to discuss share and
                                    learn.</p>
                                <div class="d-flex justify-content-center d-md-block">

                                </div>
                            </div>
                            <div class="col-md order">
                                <img src="{{ asset('image/mitra2.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="quick-links">
            <div>
                <h4>Quick Links</h4>
                <button class="rounded-pill btn-show-details">Show all</button>
            </div>
            <div class="link-wrapper">
                <a href="" class="card-list">
                    <i class="fa-solid fa-house donate-icon"></i>
                    <p class="title">Home</p>
                    <p class="view-details">View Details</p>
                </a>
                <a href="" class="card-list">
                    <i class="fa-solid fa-address-card donate-icon"></i>
                    <p class="title">About Us</p>
                    <p class="view-details">View Details</p>
                </a>
                <a href="" class="card-list">
                    <i class="fa-solid fa-book donate-icon"></i>
                    <p class="title">Artikel</p>
                    <p class="view-details">View Details</p>
                </a>
                <a href="" class="card-list">
                    <i class="fas fa-hand-holding-usd donate-icon"></i>
                    <p class="title">Donasi</p>
                    <p class="view-details">View Details</p>
                </a>
                <a href="" class="card-list">
                    <i class="fa-solid fa-hand-holding-hand donate-icon"></i>
                    <p class="title">Service</p>
                    <p class="view-details">View Details</p>
                </a>

            </div>
        </section>

        <section class="prayer-times">
            <h4>Waktu Sholat</h4>
            <div class="row">
                <div class="col-md ps-5 ps-md-0">
                    <div class="float-md-end">
                        <h3>Jember,</h3>
                        <h5>Indonesia</h5>
                    </div>
                </div>
                <div class="col-md-7 px-5">
                    <h3>Jam</h3>
                    <h5><span id="time">--:--</span> WIB</h5>
                    <div class="row times mt-4">
                        <div class="col">
                            <img src="{{ asset('image/fajr.png') }}" alt="">
                            <h5>SUBUH</h5>
                            <h5 id="subuh">--:--</h5>
                        </div>
                        <div class="col">
                            <img src="{{ asset('image/zhur.png') }}" alt="">
                            <h5>ZUHUR</h5>
                            <h5 id="zuhur">--:--</h5>
                        </div>
                        <div class="col">
                            <img src="{{ asset('image/asr.png') }}" alt="">
                            <h5>ASAR</h5>
                            <h5 id="asar">--:--</h5>
                        </div>
                        <div class="col">
                            <img src="{{ asset('image/maghrib.png') }}" alt="">
                            <h5>MAGRIB</h5>
                            <h5 id="magrib">--:--</h5>
                        </div>
                        <div class="col">
                            <img src="{{ asset('image/isha.png') }}" alt="">
                            <h5>ISYA'</h5>
                            <h5 id="isya">--:--</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="event">
            <h4>Donasi</h4>
            <a href="{{ url('danate') }}"><button class="rounded-pill btn-show-details">Show all</button></a>
            <section><div class="progress-bar"></div>
              <div class="container">
                  <div class="row align-items-start">
                      @foreach ($data as $d )
                          
      
                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4  mt-2 mb-2 ">
                          {{-- <input type="text" value="{{$d->id}}"> --}}
                          <div class="card-donation">
                              <img src="{{'/storage/'.$d->gambar}}" alt="">
                              <p>Laznas</p>
              
                          <h2 class="title">{{$d->judul}}</h2>
                          <p> Dibutuhkan  @currency($d->jumlah)</p>
                          <p> Dana Masuk @currency($d->pemasukan)</p>
                          <div class="progress-donation" >
                              <div class="progress-donation-done" data-done=""  style="width:{{$d->total}}%; opacity: 1;" id="text">{{$d->total}}</div>
                          </div>
                          <a href="{{url('/donate/detail',$d->id)}}"><button class="rounded-pill btn-donation m-2">Donasi</button></a> 
      
                          </div>
                      </div>
                      @endforeach
                  </div>
                  
              </div>
          </section>
        </section>

        <section>
            <h4>Artikel</h4>
            <a href="{{ url('artikel') }}"><button class="rounded-pill btn-show-details">Show all</button></a>
            <div class="container">
                <div>
                    
                    <ul class="cards">
                        @foreach ($artikel as $d )
                        <li>
                            <a href="/artikel/{{$d->id}}" class="card">
                                <img src="{{ '/storage/'. $d->gambar }}" class="card__image" alt="" />
                                <div class="card__overlay">
                                    <div class="card__header">
                                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                                            <path />
                                        </svg>
                                        {{-- <img class="card__thumb" src="https://i.imgur.com/7D7I6dI.png" alt="" /> --}}
                                        <div class="card__header-text">
                                            <h3 class="card__title">{{$d->judul}}</h3>
                                            <span class="card__status">{{$d->tanggal}}</span>
                                        </div>
                                    </div>
                                    <p class="card__description">{{$d->deskripsi}}</p>
                                    <p class="card__description">Klik Artikel - Selengakpnya</p>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    </div>
    <section class="photo">
        <div class="container container">
            <h4>Photo Gallery</h4>
            {{-- <button class="rounded-pill btn-show-details">Show all</button> --}}
            <div class="row mt-5 pt-4">
                <div class="col-4">
                    <div class="rounded overflow-hidden image-wrapper">
                        <img src="{{ asset('image/masjid4.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-4">
                    <div class="rounded overflow-hidden image-wrapper">
                        <img src="{{ asset('image/masjid3.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-4">
                    <div class="rounded overflow-hidden image-wrapper">
                        <img src="{{ asset('image/masjid5.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="donation-subcribe text-center">
        <div class="donation-wrapper">
            <div class="donation">
                <h1>Bantu Kami Dalam Memberikan Pelayan Terbaik</h1>
                <p>Dengan Bantuan dan Do'a Masyarakat Kami Pengurus Laznas Akan Bekerja Semaksimal Mungkin Dalam Manyediakan
                    dan Memberikan Pelayanan </p>
                <a href="{{ url('donate') }}"> <button class="btn rounded-pill px-4">Donate Today!</button></a>
            </div>
        </div>


    </section>
@endsection

@section('script')
    <!-- InputMask/Moment JS -->
    <script src="{{ asset('AdminLTE/plugins/moment/moment.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    {{-- Jss Praytime --}}
    {{-- <script src="{{asset('js/FeMasjid/prayTime.js')}}"></script> --}}
    <script src="{{ asset('js/FeLaznas/api/PrayTime.js') }}"></script>

    <script>
        // const progress = document.querySelector('.progress-donation-done');
        // let text = progress.getAttribute('data-done');
        // document.getElementById("text").innerHTML = text + '%';

        // setTimeout(() => {

        //     progress.style.opacity = 1;
        //     progress.style.width = progress.getAttribute('data-done') + '%';
        // }, 500);
    </script>
@endsection
