@extends('User.web')


@section('head')
    <link rel="stylesheet" href="{{asset('css/FeLaznas/cardArtikel.css')}}">
@endsection
@section('content')


<section>
    <div class="container">
        <div>
            <ul class="cards">
                @foreach ($data as $val)
                    <li>
                        <a href="/artikel/{{$val->id}}" class="card">
                            <img src="{{'/storage/'.$val->gambar}}" class="card__image" alt="" />
                            <div class="card__overlay">
                            <div class="card__header">
                                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>
                                {{-- <img class="card__thumb" src="{{$val->gambar}}" alt="" /> --}}
                            <div class="card__header-text">
                              <h3 class="card__title">{{$val->judul}}</h3>
                              <span class="card__status">{{$val->created_at}}</span>
                            </div>
                          </div>
                          <p class="card__description">{{$val->deskripsi}}</p>
                          <p class="card__description">Klik Artikel - Selengakpnya</p>
                        </div>
                      </a>
                    </li>
                @endforeach
              </ul>
        </div>
    </div>
</section>



@endsection
