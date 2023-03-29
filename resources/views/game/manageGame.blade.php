@extends('layout.navbar')

@section('content')

<script type="text/javascript">
    function onlyOne(checkbox) {
         var checkboxes = document.getElementsByName('check')
         checkboxes.forEach((item) => {
         if (item !== checkbox) item.checked = false
     })
 }
 </script>

  <body class="bg-secondary">

    <div class="container my-2">
        <h1>Manage Games</h1>
    </div>

    <div class="container mt-3">
        <h5>Filter by Games Name</h5>
        <div class="row">
            <div class="col-4">

                <form method="GET" action="/manageGame" enctype="multipart/form-data">
                    @csrf
                    <input name="cari" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            </div>
        </div>
    </div>

    <div class="container">
        <h5>Filter by Games Category</h5>
        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div class="col-2">
                        <div class="form-check">
                            <input name="check" class="form-check-input" onclick="onlyOne(this)" type="checkbox" value="Idle" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Idle
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input name="check" class="form-check-input" onclick="onlyOne(this)" type="checkbox" value="Horror" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Horror
                            </label>
                          </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input name="check" class="form-check-input" onclick="onlyOne(this)" type="checkbox" value="Adventure" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Adventure
                            </label>
                          </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input name="check" class="form-check-input" onclick="onlyOne(this)" type="checkbox" value="Action" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Action
                            </label>
                          </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input name="check" class="form-check-input" onclick="onlyOne(this)" type="checkbox" value="Sports" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Sports
                            </label>
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-check">
                            <input name="check" class="form-check-input" onclick="onlyOne(this)" type="checkbox" value="Strategy" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Strategy
                            </label>
                          </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input name="check" class="form-check-input" onclick="onlyOne(this)" type="checkbox" value="Role-Playing" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Role-Playing
                            </label>
                          </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input name="check" class="form-check-input" onclick="onlyOne(this)" type="checkbox" value="Puzzle" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Puzzle
                            </label>
                          </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input name="check" class="form-check-input" onclick="onlyOne(this)" type="checkbox" value="Simulation" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Simulation
                            </label>
                          </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-dark my-2">Search</button>
    </form>
    </div>

    <div class="container">
        <div class="row">
            @if ($games->count())
                @foreach ($games as $game)
                <div class="col-xl-3 col-lg-6 mb-3">
                    <a href="/gameDetail/{{ $game->id }}" class="text-decoration-none" style="color: inherit">
                        <div class="card">
                          <img src="/games/{{ $game->cover }}" class="card-img-top" alt="" style="height: 10rem"/>
                          <div class="card-body">
                            <h6 class="card-text">{{ $game->game_name }}</h6>
                            <p class="card-text">{{ $game->category }}</p>
                            <div class="d-grid gap-2 d-md">
                                <a href="/updateGame/{{ $game->id }}" class="btn btn-success" type="button"><i class="bi bi-pencil"></i> Update</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </div>
                          </div>
                        </div>
                    </a>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-exclamation-triangle text-danger"></i> Delete Games</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this game? All of your data will
                            be permanently removed from our servers forever. This action
                            cannot be undone.
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>

                        <form action="/deleteGame/{{ $game->id }}" method="POST">
                            @csrf
                            <div class="d-grid gap-2 d-md">
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
                            </div>
                        </form>

                        </div>
                      </div>
                    </div>
                </div>
                @endforeach
            @else
                No Data
            @endif
        </div>
    </div>

    <div class="container">
        {{$games->links('pagination::bootstrap-4')}}
    </div>


    <div class="d-flex justify-content-end m-4">
        <a href="/createGame" class="btn btn-primary btn-circle btn-lg"><i class="bi bi-file-earmark-plus"></i></a>
    </div>

    @endsection
