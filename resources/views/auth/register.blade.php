<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('colorib/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('colorib/css/style.css')}}">
    <script src="https://kit.fontawesome.com/bc2d8b57a2.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror" placeholder="Your Name"/>
                                @error('name')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror" placeholder="Your Email"/>
                                @error('email')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" class="@error('password') is-invalid @enderror" id="pass" placeholder="Password"/>
                                @error('password')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_confirmation" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" id="label-agree" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" id="label-term" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                {{-- <input type="submit" name="signup" id="signup" class="form-submit" value="Register"  {{ __('Register') }}/> --}}
                                <button type="submit" class="form-submit">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{asset('image/laznas.jpg')}}" alt="sing up image"></figure>
                        <a href="{{route('login')}}" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

      

    </div>

    
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<script>
    document.getElementById('register-form').addEventListener('submit', function(event){
    if(document.getElementById('agree-term').checked == false){
        event.preventDefault();
        alert("By signing up, you must accept our terms and conditions!");
        var element = document.getElementById("label-agree");
            element.style.color = 'red';

        var element2 = document.getElementById('label-term');
            element2.style.color ='red';
        return false;
    }
});
</script>
</html>