

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/guest/signup.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title>Laravel</title>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
    <a class="navbar-brand" href="#">Laravel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{URL::to('login')}}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{URL::to('signup')}}">Register</a>
            </li>
        </ul>

    </div>
    </div>
</nav>

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Register</div>
                        <div class="card-body">
                            <form action="{{URL::to('user/signup')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                    <div class="col-md-6">
                                        <p class="signup_errors">{{$errors->first('firstname')}}</p>
                                        <input type="text" value="{{ old('firstname') }}" id="full_name" class="form-control" name="firstname">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                    <div class="col-md-6">
                                        <p class="signup_errors">{{$errors->first('lastname')}}</p>
                                        <input type="text" value="{{ old('lastname') }}" id="full_name" class="form-control" name="lastname">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                                    <div class="col-md-6">
                                        <p class="signup_errors">{{$errors->first('phonenumber')}}</p>
                                        <input type="text" value="{{ old('phonenumber') }}" id="phone_number" name="phonenumber" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nid_number" class="col-md-4 col-form-label text-md-right"><abbr
                                                title="National Id Card">Age</abbr></label>
                                    <div class="col-md-6">
                                        <p class="signup_errors">{{$errors->first('age')}}</p>
                                        <input type="number" value="{{ old('age') }}" id="nid_number" class="form-control" name="age">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="present_address" class="col-md-4 col-form-label text-md-right">Address</label>
                                    <div class="col-md-6">
                                        <p class="signup_errors">{{$errors->first('address')}}</p>
                                        <input type="text" value="{{ old('address') }}" id="present_address" class="form-control" name="address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <p class="signup_errors">{{$errors->first('email')}}</p>
                                        <input type="text" value="{{ old('email') }}" id="email_address" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <p class="signup_errors">{{$errors->first('password')}}</p>
                                        <input type="password" id="email_address" class="form-control" name="password">
                                    </div>
                                </div>
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                        Register
                                        </button>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</main>
<script src="{{asset('js/guest/signup.js')}}"></script>
</body>
</html>