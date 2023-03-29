<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
  </head>

  <style>
      .container{
        width: 100%;
        margin:0px;
        padding: 0px;
        max-width: unset;
      }
  </style>

  <body style="height: 100%; overflow: hidden;">
    <div class="container">
        <div class="row">
            <div class="col" style="background-color: darkblue">
                @if($errors->has('username') || $errors->has('password'))
                    <div class="alert alert-danger alert-dismissible fade show ms-2 mt-2" role="alert">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                            @if($errors->has('username'))
                                <li>{{ $errors->first('username') }}</li>
                            @endif
                            @if($errors->has('password'))
                                <li>{{ $errors->first('password') }}</li>
                            @endif
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- form --}}
                <div class="container-fluid mt-5">
                    <h1 class="mb-5" style="color: white">Login Page</h1>

                    <form action="/login" method="post">
                        @csrf
                        <div class="mb-3">
                            <label style="color: white" class="form-label">Username</label>
                            <input name="username" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label style="color: white" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control">
                        </div>
                        <div class="mb-4 form-check">
                        <input style="color: white" name="remember_me" type="checkbox" class="form-check-input">
                        <label style="color: white" class="form-check-label">Remember me</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div style="text-align: right" class="mt-4">
                            <a href="/register" style="text-decoration: none">Don't have account</a>
                          </div>
                    </form>
                </div>
                {{-- akhir form --}}
            </div>
            <div class="col p-0">
               <img style="width: 100%" src="img/background.jpg" alt="">
            </div>
        </div>

    </div>
    {{-- script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
