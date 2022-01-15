{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <!--Bootstrap icon-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="css/footers.css" rel="stylesheet">
    <link href="css/banner.css" rel="stylesheet">

     <!-- Bootstrap 4 JS CDN Links -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <title>Halaman Order</title>

</head>
<body>


  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
   <h1 class="h2">Order Buku</h1>
  </div>

<div class="col-lg-8">

 <form method="post" action="/order">
  @csrf
  <form method="post" action="/insertbuku">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku</label>
                @error('judul')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                <input type="text" name="judul"class="form-control"  @error('judul') is-invalid @enderror  id="judul" required value="{{old('judul')}}">
            </div>

            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                @error('penulis')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                <input type="text" name="penulis"class="form-control"  @error('penulis') is-invalid @enderror  id="penulis" required value="{{old('penulis')}}">
            </div>

            <div class="mb-3">
                <label for="sinopsis" class="form-label">Sinopsis</label>
                @error('sinopsis')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                <input type="text" name="sinopsis"class="form-control"  @error('sinopsis') is-invalid @enderror  id="sinopsis" required value="{{old('sinopsis')}}">
            </div>

              <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                @error('harga')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                <input type="number" name="harga"class="form-control"  @error('harga') is-invalid @enderror  id="harga" required value="{{old('harga')}}">
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                @error('jumlah')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                <input type="number" name="jumlah"class="form-control"  @error('jumlah') is-invalid @enderror  id="jumlah" required value="{{old('jumlah')}}">
            </div>

            <button type="submit" class="btn btn-primary">Order</button>
</form>


</div>


</body>
</html> --}}



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
 <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <!--Bootstrap icon-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="css/footers.css" rel="stylesheet">
    <link href="css/banner.css" rel="stylesheet">

     <!-- Bootstrap 4 JS CDN Links -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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

<div class="col-lg-8">

 <form method="post" action="/order">
  @csrf
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku</label>
                @error('judul')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                <input type="text" name="judul"class="form-control"  @error('judul') is-invalid @enderror  id="judul" required value="{{old('judul')}}">
            </div>

            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                @error('penulis')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                <input type="text" name="penulis"class="form-control"  @error('penulis') is-invalid @enderror  id="penulis" required value="{{old('penulis')}}">
            </div>

            <div class="mb-3">
                <label for="sinopsis" class="form-label">Sinopsis</label>
                @error('sinopsis')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                <input type="text" name="sinopsis"class="form-control"  @error('sinopsis') is-invalid @enderror  id="sinopsis" required value="{{old('sinopsis')}}">
            </div>

              <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                @error('harga')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                <input type="number" name="harga"class="form-control"  @error('harga') is-invalid @enderror  id="harga" required value="{{old('harga')}}">
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                @error('jumlah')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                <input type="number" name="jumlah"class="form-control"  @error('jumlah') is-invalid @enderror  id="jumlah" required value="{{old('jumlah')}}">
            </div>

            <button type="submit" class="btn btn-primary">Order</button>
</form>


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





