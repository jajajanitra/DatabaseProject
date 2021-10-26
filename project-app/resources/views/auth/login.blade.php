<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/loginSty.css') }}" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Hello!') }}</div>
                <div class="card-subheader">{{ __('login to store') }}</div>
                <div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div> 
                            <div>
                                <input id="username" type="text" class="usersty" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus Placeholder="Username">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="password" type="password" class="pswsty" name="password" required autocomplete="current-password" Placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                                <button type="submit" class="login_btn">
                                    {{ __('Login') }}
                                </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
