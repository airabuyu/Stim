@extends('layout.navbar')

@section('content')

  <body class="bg-secondary">

    <div class="container my-2">
        <h1>Shopping Cart</h1>
    </div>

    <div class="container">

        @foreach ($carts as $cart)


        <div class="container bg-white py-3 border-bottom border-secondary">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <a href="/gameDetail/{{ $cart->game->id }}">
                        <img src="/games/{{ $cart->game->cover }}" alt="" style="width: 20rem; height: 9rem">
                    </a>
                    <div class="ms-3">
                        <div class="d-flex">
                            <h5>{{ $cart->game->game_name }}</h5>
                            <h5 class="bg-dark text-light px-2 py-1 ms-2" style="border-radius: 15px">{{ $cart->game->category }}</h5>
                        </div>
                        <div>
                            <i class="bi bi-tag"></i> Rp {{ number_format($cart->game->price) }}
                        </div>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-trash-fill"></i> Delete
                    </button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-exclamation-triangle text-danger"></i> Delete Cart</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this game from your shopping
                    cart ? All of your data will be permanently removed. This action
                    cannot be undone.
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>

                  <form action="/shoppingCart/{{ $cart->id }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i> Delete</button>
                  </form>

                </div>
              </div>
            </div>
          </div>
        @endforeach
    </div>


    @if ($carts->count())

    <div class="container mb-4">
        <div class="container bg-white py-3">
            <p>Total price: <b>Rp {{ number_format($carts->sum('game_sum_price')) }}</b></p>
                <a href="/transactionInformation" class="btn btn-success"><i class="bi bi-truck"></i> Checkout</a>
        </div>
    </div>
    @else
    <div class="container">
        No Data
    </div>
    @endif
    @endsection
