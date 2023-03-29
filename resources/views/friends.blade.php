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
                        <a href="/friends" class="btn btn-primary"><i class="bi bi-suit-heart"></i> Friends</a>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12">
                        <a href="/transactionHistory" class="btn btn-outline-primary"><i class="bi bi-bag"></i> Transaction History</a>
                    </div>
                </div>
            </div>
            <div class="col-9 mt-4">
                <div class="mb-4">
                    <h4>Friends</h4>
                </div>
                <div>
                    <b>Add Friends</b>
                    <form class="d-flex mt-2" method="post" action="/addFriend">
                        @csrf
                        <input name="add_user" class="form-control me-2" type="username" placeholder="Username" aria-label="Username">
                        <button class="btn btn-outline-success" type="submit">Add</button>
                    </form>
                </div>
                <div class="container mt-4">
                    <b>Incoming Friend Request</b>
                    <div class="row">

                    @if ($user->friendsIncoming->count())
                        @foreach($user->friendsIncoming as $u)

                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="images/{{ $u->profile_picture }}" class="card-img-top" alt="" />                              <div class="card-body">
                                <h5 class="card-text">{{ $u->fullname }}</h5>
                                <div class="d-flex">
                                  <p class="card-text">{{ $u->role }}</p>
                                  <p class="ms-3 text-light bg-success px-1" style="border-radius: 70%">{{ $u->level }}</p>
                                </div>
                                <div class="d-grid gap-2 d-md-block">
                                    <form action="/acceptIncoming/{{ $u->id }}" method="post">
                                        @csrf
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-success" type="submit"><i class="bi bi-person-plus"></i> Accept</button>
                                        </form>
                                            <form action="/deleteIncoming/{{ $u->id }}" method="post">
                                                @csrf
                                            <button class="btn btn-danger" type="submit"><i class="bi bi-person-dash"></i> Reject</button>
                                        </form>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                    @else
                    <div class="container">
                        There is no incoming friend request
                    </div>
                    @endif
                    </div>
                </div>

                <div class="container mt-4">
                    <b>Pending Friend Request</b>
                    <div class="row">

                    @if ($user->friendsPending->count())
                        @foreach($user->friendsPending as $u)

                            <div class="col-md-4 mb-3">
                              <div class="card">
                                <img src="images/{{ $u->profile_picture }}" class="card-img-top" alt="" />
                                <div class="card-body">
                                  <h5 class="card-text">{{ $u->fullname }}</h5>
                                  <div class="d-flex">
                                    <p class="card-text">{{ $u->role }}</p>
                                    <p class="ms-3 text-light bg-success px-1" style="border-radius: 70%">{{ $u->level }}</p>
                                  </div>
                                  <div class="d-grid gap-2 d-md-block">
                                      <form action="/deletePending/{{ $u->id }}" method="post">
                                          @csrf
                                      <button class="btn btn-danger" type="submit"><i class="bi bi-person-dash"></i> Cancel</button>
                                      </form>
                                    </div>
                                </div>
                              </div>
                            </div>
                        @endforeach
                    @else
                    <div class="container">
                        There is no pending friend request
                    </div>
                    @endif

                    </div>
                </div>

                <div class="container mt-4">
                    <b>Your Friends </b>
                    <div class="row">

                        @if ($user->friendsB->count() || $user->friendsA->count())
                        @foreach ($user->friendsB as $u)

                        <div class="col-md-4">
                            <div class="card">
                                <img src="images/{{ $u->profile_picture }}" class="card-img-top" alt="" />
                                <div class="card-body">
                                  <h5 class="card-title">{{ $u->fullname}}</h5>
                                  <div class="d-flex">
                                    <p class="card-text">{{ $u->role }}</p>
                                    <p class="ms-3 text-light bg-success px-1" style="border-radius: 70%">{{ $u->level }}</p>
                                  </div>
                                </div>
                            </div>
                        </div>

                        @endforeach

                        @foreach ($user->friendsA as $u)

                        <div class="col-md-4">
                            <div class="card">
                                <img src="images/{{ $u->profile_picture }}" class="card-img-top" alt="" />
                                <div class="card-body">
                                  <h5 class="card-title">{{ $u->fullname }}</h5>
                                  <div class="d-flex">
                                    <p class="card-text">{{ $u->role }}</p>
                                    <p class="ms-3 text-light bg-success px-1" style="border-radius: 70%">{{ $u->level }}</p>
                                  </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                        @else
                        <div class="container mb-2">
                            There is no friend
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

