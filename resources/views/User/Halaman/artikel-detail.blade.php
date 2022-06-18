@extends('User.web')

@section('content')

        <div class="container">
            <div class="foto-donasi">
                <img src="{{'/storage/'.$data->gambar}}" alt="">
            </div>
            <h2 class="title-detail-donation">{{$data->judul}}</h2>

            <h2> Deskripsi</h2>


            <p> {{$data->deskripsi}}</p>

        </div>

@endsection
