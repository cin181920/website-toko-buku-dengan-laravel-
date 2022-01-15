
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
                <a class="navbar-brand" href="{{ url('/') }}" style="color:black">
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

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
          <button class="btn btn-primary" type="submit">Search</button>
        </form>
         <br>
        <button class="btn btn-primary" type="submit">Clear Filter</button>

@if($buku->count()>0)
  <div class="container mt-3 ">
      <div class="row justify-content-center">
         @foreach($buku as $book)
          <div class="col-md-2 mb-4 ">
            <div class="card" >
                <img src="{{ $book->gambar }}" class="card-img-top" alt="banner">
                <div class="card-body">
                  <h5 class="card-title">{{ $book->judul}}</h5>
                  <p class="card-text">BY:{{$book->penulis}}</p>
                   <p class="card-text">IDR{{$book->harga}}</p>
                  <a href="detail/{{$book->id}}" class="btn btn-primary">Read More</a>
                </div>
              </div>
          </div>
          @endforeach
      </div>
  </div>
   @else
    <p class="text-center">No Book Found..</p>
@endif

<nav aria-label="Page navigation">
  <ul class="pagination justify-content-center">

    {{ $buku->links() }}
</ul>
</nav>

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



