<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/3fca9e9386.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/FeLaznas/style.css')}}">
    <script src="https://kit.fontawesome.com/bc2d8b57a2.js" crossorigin="anonymous"></script>
    <title>Laznas</title>
    
    @yield('head')
</head>

<body>
    <header>
    @include('User.partial.header')
    </header>

    <main>
    @yield('content')
    </main>


    <footer class="mt-4">
     @include('User.partial.footer')
      </footer>

    <div class="search-wrapper d-none" id="search-wrapper">
        <div class="search">
            <input type="text" class="form-control search-input" placeholder="Search" aria-label="Cari"
                aria-describedby="basic-addon2">

            <div class="float-end search-action">
                <button type="button" class="btn btn-outline-light mx-2 submit-search">Search</button>
                <a class="cancel-search" href="" id="cancel-search">Cancel</a>
            </div>
        </div>
    </div>
    
    @yield('script')
    <!-- jQuery -->
    <script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{asset('js/FeLaznas/script.js')}}"></script>
    
</body>

</html>
