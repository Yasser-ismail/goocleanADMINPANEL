<!DOCTYPE html>

<html lang="en" dir="rtl">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>CoreUI Pro Bootstrap Admin Template</title>

    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pace.min.css') }}" rel="stylesheet">


</head>
<body class="c-app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">

                        <form action="{{ route('login') }}" method="post">

                            @csrf

                            <h1>{{ __('login.login') }}</h1>
                            <p class="text-muted">{{ __('login.Sign In to your account') }}</p>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">

                                    </span>
                                </div>
                                <input class="form-control @error('email') is-invalid @enderror" name="email"
                                       type="text"
                                       value="{{ old('email') }}"
                                       placeholder="{{ __('login.email') }}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">

                                    </span>
                                </div>
                                <input class="form-control @error('password') is-invalid @enderror" name="password" type="password"
                                       placeholder="{{ __('login.password') }}">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary px-4" type="submit">{{ __('login.login') }}</button>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-link px-0" type="button">Forgot password?</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/pace.min.js') }}"></script>
<script src="{{ asset('js/coreui.bundle.min.js') }}"></script>

</body>
</html>
