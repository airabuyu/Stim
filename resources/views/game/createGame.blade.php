@extends('layout.navbar')

@section('content')
    <body class="bg-secondary">

        @if($errors->has('game_name') || $errors->has('descreption') || $errors->has('LDescreption') || $errors->has('developer') || $errors->has('publisher') || $errors->has('price') || $errors->has('cover') || $errors->has('trailer'))
            <div class="alert alert-danger alert-dismissible fade show ms-2 mt-2" role="alert">
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    @if($errors->has('game_name'))
                        <li>{{ $errors->first('game_name') }}</li>
                    @endif
                    @if($errors->has('descreption'))
                        <li>{{ $errors->first('descreption') }}</li>
                    @endif
                    @if($errors->has('LDescreption'))
                        <li>{{ $errors->first('LDescreption') }}</li>
                    @endif
                    @if($errors->has('developer'))
                        <li>{{ $errors->first('developer') }}</li>
                    @endif
                    @if($errors->has('publisher'))
                        <li>{{ $errors->first('publisher') }}</li>
                    @endif
                    @if($errors->has('price'))
                        <li>{{ $errors->first('price') }}</li>
                    @endif
                    @if($errors->has('cover'))
                        <li>{{ $errors->first('cover') }}</li>
                    @endif
                    @if($errors->has('trailer'))
                        <li>{{ $errors->first('trailer') }}</li>
                    @endif

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container my-2">
            <h1>Create Games</h1>
        </div>
<form action="/createGame" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="container">
          <div class="mb-3">
            <label for="gameName" class="form-label">Game Name</label>
            <input name="game_name" type="text" class="form-control">
          </div>

          <div class="mb-3">
            <label for="gameDesc" class="form-label">Game Description</label>
            <textarea name="descreption" class="form-control" rows="2"></textarea>
          </div>

          <div class="mb-3">
            <label for="gameLongDesc" class="form-label">Game Long Description</label>
            <textarea name="LDescreption" class="form-control" rows="3"></textarea>
          </div>

          <div class="mb-3">
            <label for="disabledSelect" class="form-label text-dark">Game Category</label>
            <select name="category" class="form-select">
              <option selected value="Idle">Idle</option>
              <option value="Horror">Horror</option>
              <option value="Adventure">Adventure</option>
              <option value="Action">Action</option>
              <option value="Sports">Sports</option>
              <option value="Strategy">Strategy</option>
              <option value="Role-Playing">Role-Playing</option>
              <option value="Puzzle">Puzzle</option>

            </select>
        </div>

          <div class="mb-3">
            <label for="gameDev" class="form-label">Game Developer</label>
            <input name="developer" type="text" class="form-control">
          </div>

          <div class="mb-3">
            <label for="gamePublisher" class="form-label">Game Publisher</label>
            <input name="publisher" type="text" class="form-control">
          </div>

          <div class="mb-3">
            <label for="gamePrice" class="form-label">Game Price</label>
            <input name="price" type="text" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label" for="gameCover">Game Cover</label>
            <input name="cover" type="file" class="form-control" id="customFile" />
          </div>
          <div class="mb-3">
            <label class="form-label" for="gameTrailer">Game Trailer</label>
            <input name="trailer" type="file" class="form-control" id="customFile" />
          </div>

          <div class="form-check mb-3">
            <input name="adult" class="form-check-input" type="checkbox" value="1"/>
            <label class="form-check-label" for="onlyForAdult">
              Only for adult ?
            </label>
          </div>

          <div class="d-flex justify-content-end mb-3">
            <a href="" class="btn btn-danger me-2">Cancel</a>
            <button type="submit" class="btn btn-success ms-2"><i class="bi bi-truck"></i>Save</button>
        </form>
        </div>

    </div>

    @endsection
