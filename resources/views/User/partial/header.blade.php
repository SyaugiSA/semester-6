

<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid container-lg py-2">
        <a class="navbar-brand" href="#">
            <img src="{{asset('image/laznas.jpg')}}" style="width: 50px" alt="">
            <p class="m-0 d-inline">
                Laznas Al-Irsyad Jember
            </p>
        </a>
        <div>
            <i class="fas fa-search d-lg-none d-inline-block btn-search"></i>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0 justify-content-center">
                <li class="nav-item mx-lg-4">
                     <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a class="nav-link" href="{{url('/about')}}">About Us</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a class="nav-link" href="{{url('/artikel')}}">Artikel</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a class="nav-link" href="{{url('/donate')}}">Donate</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a class="nav-link" href="{{url('/service')}}">Service</a>
                </li>
            </ul>
            {{-- <i class="fas fa-search me-xl-5 me-lg-3 d-none d-lg-inline-block btn-search"></i> --}}
            {{-- <button class="rounded-pill w-100 get-involved">
                Get Involved
            </button> --}}
            <div class="right-nav">
                @if (Auth::check())
                <a style="color: red" href="{{ route('logout') }}"><i class="fa-solid fa-right-to-bracket" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

                <a href="{{url('/seting')}}"><i class="fa-solid fa-gear"></i></a>
                @else

                <a href="{{route('login')}}" ><i class="fa-solid fa-right-to-bracket"></i></a>

                @endif

            </div>


        </div>
    </div>
</nav>


