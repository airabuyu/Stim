<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <title>ReXSteam</title>
  </head>

  <body class="bg-secondary">
      @auth
      @if (Auth::user()->role == 'member')
      <header class="p-3 mb-3 border-bottom bg-dark">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a class="navbar-brand text-light" href="/home">ReXsteam</a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="/home" class="nav-link px-2 link-light">Home</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" method="GET" action="/home">
                @csrf
              <input name="cari" type="search" class="form-control" placeholder="Search..." aria-label="Search">
              <button type="submit" style="display: none"></button>
            </form>

            <div class="dropdown text-end d-flex">
                <a href="/shoppingCart/{{ Auth::user()->id }}"><i class="bi bi-cart3 text-light mx-3"></i></a>
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="/images/{{ Auth::user()->profile_picture }}" alt="mdo" width="32" height="32" class="rounded-circle">
              </a>
              <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                <li><a class="dropdown-item" href="/friends">Friends</a></li>
                <li><a class="dropdown-item" href="/transactionHistory">Transaction History</a></li>
                <li>
                    <form method="post" action="/logout">
                        @csrf
                        <button type="submit" class="dropdown-item">Sign Out</button>
                    </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </header>



      @else
      <header class="p-3 mb-3 border-bottom bg-dark">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a class="navbar-brand text-light" href="/home">ReXsteam</a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="/home" class="nav-link px-2 link-light">Home</a></li>
              <li><a href="/manageGame" class="nav-link px-2 link-light">Manage Game</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" method="GET" action="/home">
                @csrf
              <input name="cari" type="search" class="form-control" placeholder="Search..." aria-label="Search">
              <button type="submit" style="display: none"></button>
            </form>

            <div class="dropdown text-end d-flex">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="/images/{{ Auth::user()->profile_picture }}" alt="mdo" width="32" height="32" class="rounded-circle">
              </a>
              <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                <li>
                    <form method="post" action="/logout">
                        @csrf
                        <button type="submit" class="dropdown-item">Sign Out</button>
                    </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </header>

      @endif
      @endauth

      @guest
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="/home">ReXsteam</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/home">Home</a>
              </li>
            </ul>
            <form class="d-flex" method="GET" action="/home">
                @csrf
              <input name="cari" type="search" class="form-control" placeholder="Search..." aria-label="Search">
              <button type="submit" style="display: none"></button>
              <a class="btn btn-outline-light mx-2" href="/login">Login</a>
              <a class="btn btn-outline-light" href="/register">Register</a>
            </form>
          </div>
        </div>
      </nav>

      @endguest

    @yield('content')

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-4 border-top bg-dark">
        <div class="col-md-4 d-flex align-items-center">
          <span class="text-light ms-4">&copy; 2021 ReXsteam. All rights reserved</span>
        </div>
        <div class="d-flex justify-content-evenly">
            <a href="https://www.facebook.com/Steam"><i class="bi bi-facebook text-light me-2 fs-5"></i></a>
            <a href="https://twitter.com/Steam?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><i class="bi bi-twitter text-light fs-5"></i></a>
            <a href="https://www.valvesoftware.com/en/"><i class="bi bi-link-45deg text-light ms-2 me-4 fs-5"></i></a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
