@extends('layout.navbar')

@section('content')

  <body class="bg-secondary">

      <div class="container mt-5" style="border: solid 1px">
        <div class="d-flex justify-content-center">
            <img src="/games/{{ $game->cover }}" alt="" style="height: 10rem">
        </div>


        <p class="text-center fs-5">CONTENT IN THIS PRODUCT MAY NOT APPROPRIATE FOR ALL AGES, OR MAY NOT BE APPROPRIATE FOR VIEWING AT WORK.</p>


        <div class="shadow-lg container mb-4" style="background-color: rgba(255, 255, 255, 0.315)">
            <p class="text-center">please enter your birth date to continue:</p>

        <div class="d-flex justify-content-center">
            <form action="/gameDetail/{{ $game->id }}" method="post">
                @csrf
                <input type="date" id="birthday" name="birthday">
        </div>

        <div class="d-flex justify-content-center mt-2">
                <button type="submit" class="btn btn-primary m-2">View Page</button>
            </form>
                <a href="/home" class="btn btn-light m-2">Cancel</a>
        </div>
      </div>
    </div>

  @endsection
