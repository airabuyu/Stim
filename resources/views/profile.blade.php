@extends('layout.navbar')

@section('content')

  <body class="bg-secondary">

    @if($errors->has('Cpassword') || $errors->has('Npassword') || $errors->has('CNpassword') || $errors->has('fullname') || $errors->has('photo'))
        <div class="container">
            <div class="alert alert-danger alert-dismissible fade show ms-2 mt-2" role="alert">
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    @if($errors->has('Cpassword'))
                        <li>{{ $errors->first('Cpassword') }}</li>
                    @endif
                    @if($errors->has('Npassword'))
                        <li>{{ $errors->first('Npassword') }}</li>
                    @endif
                    @if($errors->has('CNpassword'))
                        <li>{{ $errors->first('CNpassword') }}</li>
                    @endif
                    @if($errors->has('fullname'))
                        <li>{{ $errors->first('fullname') }}</li>
                    @endif
                    @if($errors->has('photo'))
                        <li>{{ $errors->first('photo') }}</li>
                    @endif

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container bg-white mt-4">
        <div class="row">
            <div class="col-2 my-4 ms-2 border-end">
                <div class="row mb-2">
                    <div class="col-12">
                        <a href="/profile" class="btn btn-primary"><i class="bi bi-person-circle"></i> Profile</a>
                    </div>
                </div>
                @if(Auth::user()->role == "member")
                <div class="row mb-2">
                    <div class="col-12">
                        <a href="/friends" class="btn btn-outline-primary"><i class="bi bi-suit-heart"></i> Friends</a>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12">
                        <a href="/transactionHistory" class="btn btn-outline-primary"><i class="bi bi-bag"></i> Transaction History</a>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-9 mt-4">
                <div>
                    <h4>{{ $user->username }} Profile</h4>
                    <p>This information will be displayed publicly so be carfull what you share</p>
                </div>
                <div class="mb-4">
                    <div class="row">
                        <div class="col-10">
                            <div class="row">
                                <div class="col-8">
                                    <form action="/profile" method="POST"  enctype="multipart/form-data">
                                        @csrf
                                    <label for="Username" class="form-label">Username</label>
                                    <input placeholder="{{ $user->username }}" name="username" type="text" class="form-control" disabled readonly>
                                </div>
                                <div class="col-4">
                                    <label for="Level" class="form-label">Level</label>
                                    <input placeholder="{{ Auth::user()->level }}" name="level" type="text" class="form-control" disabled readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="Fullname" class="form-label">Fullname</label>
                                    <input name="fullname" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            Photo
                            <div class="image-upload">
                                <label for="file-input">
                                    <img src="images/{{ Auth::user()->profile_picture }}" alt="..." style="border-radius: 50%; height: 8rem; width: 8rem; overflow: hidden">

                                </label>

                                <input name="photo"style="display:none;"id="file-input" type="file" />
                              </div>
                         </div>

                    </div>
                    <div>
                        <label for="CPassword" class="form-label">Current Password</label>
                        <input name="Cpassword" type="password" class="form-control">
                    </div>
                    <div>
                        <label for="NPassword" class="form-label">New Password</label>
                        <input name="Npassword" type="password" class="form-control">
                    </div>
                    <div>
                        <label for="CNPassword" class="form-label">Confirm New Password</label>
                        <input name="CNpassword" type="password" class="form-control">
                    </div>

                    <div class="d-flex justify-content-end my-3">

                            <button type="submit" class="btn btn-success ms-2">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
