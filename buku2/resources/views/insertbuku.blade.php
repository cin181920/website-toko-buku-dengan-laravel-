
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

.card {
            width:50rem !important;
            flex:none !important;
          }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                BookStore Admin



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
                    <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Manage
                                </a>

                                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/insertbuku">
                                       Insert Buku
                                    </a>

                                     <a class="dropdown-item" href="/insertgenre">
                                       Insert Genre
                                    </a>

                                     <a class="dropdown-item" href="/userpage">
                                       user page
                                    </a>

                                </div>
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
                                </div>
                            </li>



            @endguest
        </ul>
        </div>
        </div>
        </nav>

 @if(session()->has('success'))
         <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
        @endif
        <main class="py-4">
            <div class="row justify-content-center">
            <div class="card">
            <div class="card-body">
            <h1 class="card-title">Insert Buku</h1>
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
                  <label for="genre" class="form-label">Genre</label>
                <div class="col-md-6">
                @foreach($genre as $genre)
                {{-- <input type="checkbox" name="genre" > {{ $genre->name }} --}}
                 <tr>
                     <th>{{$loop->iteration}}.</th>
                     <th>{{ $genre->name }}</th>
                 </tr>
               @endforeach
                <input type="number" name="genre_id"class="form-control"  @error('genre_id') is-invalid @enderror  id="genre_id" required value="{{old('genre_id')}}" placeholder="pilih nomor genre yang di insert">

                </div>
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
                <label for="gambar" class="form-label">Gambar</label>
                @error('gambar')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                <input type="text" name="gambar"class="form-control"  @error('gambar') is-invalid @enderror  id="gambar" required value="{{old('gambar')}}" placeholder="using link add gambar">
            </div>

            <button type="submit" class="btn btn-primary">Insert</button>
            </form>
            </div>
            </div>


        </main>
    </div>



    <hr>

<div class="col-lg-8 justify-content-center">

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul</th>
        <th scope="col">Penulis</th>
        <th scope="col">Sinopsis</th>
         <th scope="col">Genre</th>
        <th scope="col">Harga</th>
        <th scope="col">Action</th>
    </tr>
  </thead>


  <tbody>
    @foreach ($buku as $buku )
    <tr>
      <th>{{ $loop->iteration }}</th>
      <td>{{ $buku->judul}}</td>
      <td>{{ $buku->penulis}}</td>
      <td>{{ $buku->sinopsis}}</td>
      <td>{{ $buku->genre->name}}</td>
      <td>{{ $buku->harga}}</td>
    <td>

     <a href="detail/{{$buku->id}}">Detail</a>
     <a href="{{ url('insertbuku/'.$buku->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin di hapus  ?')">Delete</a>
      </td>
    </tr>
      @endforeach

  </tbody>
</table>

<ul>
        <button type="button" class="btn-outline-success"><a class="button2" href="/admin-home">Back</a></button>
</ul>


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



