@extends('layout.navbar')

@section('content')

  <body class="bg-secondary">

    <div class="container my-2">
        <h1>Transaction Receipt</h1>
    </div>

    <div class="container">
        <div class="container">
            <div class="container bg-white border-bottom border-secondary">
                <p class="mb-0 pt-2">Transaction ID: dd64175f-678b-47dd-a220-15335bf8aea1</p>
                <p>Purchased Date: 21-05-2021 07:20:40</p>
            </div>
    </div>


        <div class="container">

            @foreach ($carts as $cart)

            <div class="container bg-white py-3 border-bottom border-secondary">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="/games/{{ $cart->game->cover }}" alt="">
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
                    </div>
                </div>
            </div>
            @endforeach
        </div>

            <div class="container mb-4">
                <div class="container bg-white py-3">
                    <p>Total price: <b>Rp {{ number_format($carts->sum('game_sum_price')) }}</b></p>
                </div>
            </div>
        </div>
    @endsection
