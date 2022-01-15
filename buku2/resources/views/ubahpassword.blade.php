
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BookStore') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="/css/carousel.css" rel="stylesheet">
    <style>
    .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 8%;
    color: white;
    }
     p.copyright {
        position: absolute;
        width: 100%;
        color: #fff;
        line-height: 20px;
        font-size: 0.9em;
        text-align: center;
        bottom:0;
    }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}" style="color:black">
                   <img class="mb-2" src="img/logo.png" alt="" width="200" height="50">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}" style="color:black"style="color:white">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color:black">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

            <li class="nav-item">
            <a class="nav-link" href="cart">View Cart</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="historytransaksi">View Transaksi History</a>
            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Hello,{{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                      <a class="dropdown-item" href="profil">
                                        Profile
                                    </a>
                                </div>
                            </li>



            @endguest
        </ul>
        </div>
        </div>
        </nav>

        <main class="py-4">
             <div class="row justify-content-center">
            <div class="card">
            <div class="card-body">
            <h1 class="card-title">Ubah Password</h1>
            <form method="post" action="/insertbuku">
            @csrf
             <div class="mb-3">
                <label for="passwordlama" class="form-label">Password Lama</label>
                @error('passwordlama')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                <input type="passwordlama" name="passwordlama"class="form-control"  @error('passwordlama') is-invalid @enderror  id="passwordlama" required value="{{old('passwordlama')}}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                @error('password')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                <input type="password" name="password"class="form-control"  @error('password') is-invalid @enderror  id="password" required value="{{old('password')}}">
            </div>

              <div class="mb-3">
                <label for="confirm" class="form-label">Confirm Password</label>
                @error('confirm')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                <input type="password" name="confirm"class="form-control"  @error('confirm') is-invalid @enderror  id="confirm" required value="{{old('confirm')}}">
            </div>


            <button type="submit" class="btn btn-primary">update</button>
            </form>
            </div>
            </div>
        </main>
    </div>


 <!-- FOOTER -->
<div class="footer">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
            <footer>
            <p>Current Date and Time : {{ date('Y-m-d H:i a') }}</p>
            <p class="copyright">Copyright &copy; 2021 Book Store</p>
            </footer>
        </nav>
</div>

</body>
</html>



