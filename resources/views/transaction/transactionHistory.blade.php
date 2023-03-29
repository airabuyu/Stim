@extends('layout.navbar')

@section('content')

<div class="container bg-white my-4">
    <div class="row">
        <div class="col-2 my-4 ms-2 border-end">
            <div class="row mb-2">
                <div class="col-12">
                    <a href="/profile" class="btn btn-outline-primary"><i class="bi bi-person-circle"></i> Profile</a>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12">
                    <a href="/friends" class="btn btn-outline-primary"><i class="bi bi-suit-heart"></i> Friends</a>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12">
                    <a href="/transactionHistory" class="btn btn-primary"><i class="bi bi-bag"></i> Transaction History</a>
                </div>
            </div>
        </div>

        <div class="col-9 mt-4">
            <div class="container my-2">
                <h4>Transaction History</h5>
            </div>

            <div class="container mb-4">
                @if ($histories->count())
                @foreach ($histories as $history)
                <?php $total = 0; ?>
                <p class="mb-0">Transaction ID: {{ $history->id }}</p>
                <p>Purchased Date: {{ $history->created_at }}</p>

                <div class="row">
                    @foreach ($history->detaiTransaction as $item)
                    <div class="col-md-4 mb-3">
                        <img src="/games/{{ $item->game->cover }}" class="card-img-top" alt="" />
                    </div>
                        <?php $total += $item->game->price; ?>
                    @endforeach
                </div>

                <div class="border-bottom border-secondary">
                    <p>Total Price <b>{{ number_format($total)}}</b></p>
                </div>
                @endforeach
                @else
                Your transation history is empty
                @endif
            </div>

        </div>
    </div>
</div>

    @endsection

