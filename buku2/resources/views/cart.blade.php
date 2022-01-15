
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

 @if(session()->has('success'))
         <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
@endif
<div class="col-lg-8 justify-content-center">

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul</th>
      <th scope="col">Penulis</th>
      <th scope="col">Harga</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Action</th>
    </tr>
  </thead>


  <tbody>
    @foreach ($order as $order )
    <tr>
      <th>{{ $loop->iteration }}</th>
      <td>{{ $order->judul}}</td>
      <td>{{ $order->penulis}}</td>
      <td>{{ $order->harga}}</td>
      <td>{{ $order->jumlah}}</td>
    <td>
     <a href="{{ url('cart/'.$order->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin di hapus  ?')">Delete</a>
      </td>
    </tr>
      @endforeach
  </tbody>
</table>

        <button class="btn-outline-info"><a class="button2" href="/bayar">Bayar</a></button>
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



