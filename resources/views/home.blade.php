@extends('layout.navbar')

@section('content')

<body class="bg-secondary">

<div class="container mt-4">
    <div class="row">
        @if ($games->count())
            @foreach ($games as $game)
                <div class="col-md-3 mb-3">
                  <a href="/gameDetail/{{ $game->id }}" class="text-decoration-none" style="color: inherit">
                    <div class="card">
                        <img src="games/{{ $game->cover }}" class="card-img-top" alt="" style="height: 10rem" />
                        <div class="card-body">
                          <h6 class="card-text">{{ $game->game_name}}</h6>
                          <p class="card-text">{{ $game->category }}</p>
                        </div>
                      </div>
                  </a>
                </div>
            @endforeach
        @else
        No Data
        @endif
    </div>
</div>
@if ($tes == 1)
<div class="container">
    {{$games->links('pagination::bootstrap-4')}}
</div>

@endif

@endsection
