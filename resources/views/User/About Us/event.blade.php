@extends('User.web')

@section('content')
    <script>
        function getDay(d, i) {
            day = new Date(d);
            var daylist = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            document.getElementById("day"+i).innerHTML = daylist[day.getDay()];
        }

        function getDate(d, i) {
            day = new Date(d);
            var monthlist = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            document.getElementById("date"+i).innerHTML = day.getDate() + " " + monthlist[day.getMonth()] + " " + day.getFullYear();
        }
    </script>

    <section class="donation-subcribe text-center">
        <div class="donation-wrapper">
            <div class="donation">
                <h1>Event/Acara Dapat Berubah Sewaktu-waktu</h1>
                <p>"Informasi Lebih Lanjut Hubungi Customer Service"</p>

            </div>
        </div>
    </section>

    <section class="m-0">
        <div class="hal-event ">
            <div class="event-carousel">
                <div class="container">
                    <div class="m-auto row shadow rounded-3 bg-white">
                        <div class="col-md my-3 ">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    {{-- <div class="carousel-item active">
                                        <img src="{{ asset('image/foto_takmir.jpg') }}" class="d-block w-100" alt="...">
                                    </div> --}}

                                    @foreach ($data as $d)
                                        @foreach ($d->photo as $key => $photo)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">


                                                <img src="{{ '/storage/' . $photo->photo_event_path }}"
                                                    class="d-block w-100" alt="">

                                            </div>
                                        @endforeach
                                    @endforeach

                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md my-3">
                            @foreach ($data as $d)

                                <h4>Judul </h4>
                                <h5> {{ $d->judul }} </h5>
                                <h4> Tanggal </h4>
                                <h5> @datetime($d->tanggal) </h5>
                                <h4> Deskripsi </h4>
                                <h5> {{ $d->deskripsi }} </h5>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>


            <div class="container event">
                <div class="row mt-5 mx-auto">
                    @foreach ($event as $i => $e)
                        <div class="col-lg-6 pe-4">
                            <div class="row p-4 border align-items-center mb-3 rounded event-box">
                                <div class="col">
                                    <div class="border-end">
                                        <h5 class="day" id={{"day".$i}}><script>getDay("{{$e->tanggal}}", "{{$i}}")</script></h5>
                                        <p class="date" id={{"date".$i}}><script>getDate("{{$e->tanggal}}", "{{$i}}")</script></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5>{{ $e->judul }}</h5>
                                    <p>{{ $e->deskripsi }}, Laznas Al-Irsyad Jember</p>
                                </div>
                                <div class="col">
                                    <a href="{{('/event/'.$e->id)}}">  <button class="rounded-pill btn-show-details">View Details</button></a> 
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{ $event->links('pagination::bootstrap-4')  }}


            </div>
        </div>

    </section>

    <section>

    </section>
@endsection
