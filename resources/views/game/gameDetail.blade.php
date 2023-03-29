@extends('layout.navbar')

@section('content')


  <body class="bg-secondary">

    @if(session()->has('errorCart'))

    <div class="alert alert-danger alert-dismissible fade show container" role="alert">
        <i class="bi bi-x-circle-fill"></i> <strong class="ms-1">There were 1 errors with your submission</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <ul>
            <li class="ms-2">
                {{ session('errorCart') }}
            </li>
        </ul>
      </div>
    @endif

    <div class="d-flex justify-content-center">
        <div class="container mt-4 d-flex mx-0">
          <div class="row">
            <div class="col-xxl-8 mb-4" style="width: 52rem; height: auto">
                <video width="100%" height="auto" controls>
                    <source src="{{ $game->trailer }}" type="video/webm">
                  Your browser does not support the video tag.
                </video>
            </div>

            <div class="col-xxl-4">
                <div>
                  <img src="/games/{{ $game->cover }}" alt="." style="width: 30rem; height:15rem">
                </div>
                <div>
                  <h5 class="mt-2">{{ $game->game_name }}</h5>
                  {{ $game->description }}
                </div>
                <div class="mb-2">
                    <div class="d-flex">
                        <h6 class="me-2">Genre: </h6> {{ $game->category }}
                    </div>
                    <div class="d-flex">
                        <h6 class="me-2">Release Date: </h6> {{ $game->created_at }}
                    </div>
                    <div class="d-flex">
                        <h6 class="me-2">Developer: </h6> {{ $game->developer }}
                    </div>
                    <div class="d-flex">
                        <h6 class="me-2">Publihser: </h6> {{ $game->publisher }}
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>


    @if($inLibrary == 0 && Auth::user()->role == 'member')
    <div class="container mt-2">
          <p class="shadow fs-5 p-4" style="background-color: rgba(255, 255, 255, 0.315)">Buy {{ $game->game_name }}</p>
          <div class="d-flex justify-content-end">
              @auth

                <form action="/addToCart/{{ $game->id }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">Rp {{ number_format($game->price) }} | <i class="bi bi-cart3"></i> ADD TO CART</button>
                </form>
              @endauth

              @guest
              <a href="/login" type="submit" class="btn btn-primary">Rp {{ number_format($game->price) }} | <i class="bi bi-cart3"></i> ADD TO CART</a>
              @endguest
          </div>
    </div>
    @endif
    <div class="container">
        <h1>ABOUT THIS GAME</h1>
        <p>
            {{ $game->long_description }}
        </p>
    </div>
    </body>

@endsection
