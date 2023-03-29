@extends('layout.navbar')

@section('content')

  <body class="bg-secondary">

    @if($errors->has('cardName') || $errors->has('expiredDate') || $errors->has('year') || $errors->has('cvc'))
        <div class="alert alert-danger alert-dismissible fade show mx-2 mt-2" role="alert">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                @if($errors->has('cardName'))
                    <li>{{ $errors->first('cardName') }}</li>
                @endif
                @if($errors->has('expiredDate'))
                    <li>{{ $errors->first('expiredDate') }}</li>
                @endif
                @if($errors->has('year'))
                    <li>{{ $errors->first('year') }}</li>
                @endif
                @if($errors->has('cvc'))
                    <li>{{ $errors->first('cvc') }}</li>
                @endif
                @if($errors->has('zip'))
                    <li>{{ $errors->first('zip') }}</li>
                @endif

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container my-2">
        <h1>Transaction Informations</h1>
    </div>

    <div class="container">
        <form action="/checkout" method="POST">
            @csrf
            <div class="mb-3">
                <label for="cardName" class="form-label">Card Name</label>
                <input name="cardName" type="text" class="form-control" id="cardName" placeholder="Card Name">
            </div>
            <div class="mb-3">
                <label for="cardNumber" class="form-label">Card Number</label>
                <input name="cardNumber"type="text" class="form-control" id="cardNumber" placeholder="0000 0000 0000 0000">
                <div class="form-text text-dark">VISA or Master Card</div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="container p-0 me-1">
                    <label for="cardNumber" class="form-label">Expired Date</label>
                    <input name="expiredDate"type="text" class="form-control" id="MM" placeholder="MM">
                </div>
                <div class="d-flex align-items-end container p-0 mx-3">
                    <input name="year" type="text" class="form-control" id="YYYY" placeholder="YYYY">
                </div>
                <div class="container p-0 ms-1">
                    <label for="CVC" class="form-label">CVC / CVV</label>
                    <input name="cvc" type="text" class="form-control" id="CVC" placeholder="3 or 4 digit number">
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-8">
                        <label for="country" class="form-label">Country</label>
                        <input name="country" type="text" class="form-control" placeholder="Indonesia">
                    </div>
                    <div class="col-4">
                        <label for="zip" class="form-label">ZIP</label>
                        <input name="zip" type="text" class="form-control" placeholder="ZIP">
                    </div>
                </div>
            </div>
    </div>

    <div class="d-flex justify-content-between container">
        <div>
            <p>Total price: <b>Rp. {{ $total }}</b></p>
        </div>
        <div class="d-flex">
            <a href="/shoppingCart/{{ Auth::user()->id }}" class="btn btn-danger me-2">Cancel</a>

                <input type="hidden" name="total" value="{{ $total }}">
                <button type="submit" class="btn btn-success ms-2"><i class="bi bi-truck"></i> Checkout</button>
            </form>
        </div>
    </div>

    @endsection
