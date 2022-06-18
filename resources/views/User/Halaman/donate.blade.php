@extends('User.web')

@section('content')

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
                        <div class="progress-donation-done" data-done="" style="width:{{$d->total}}%; opacity: 1;" id="text">{{$d->total}}%</div>
                    </div>
                    <a href="{{url('/donate/detail',$d->id)}}"><button class="rounded-pill btn-donation m-2">Donasi</button></a> 

                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
    </section>

  
    <script>



        // const progress = document.querySelector('.progress-donation-done');
        // let text = progress.getAttribute('data-done');
        // document.getElementById("text").innerHTML = text + '%'; 

        // setTimeout(() => {
            
        //     progress.style.opacity = 1;
        //     progress.style.width = progress.getAttribute('data-done') + '%' ;
        // }, 500);

        

    </script>
@endsection