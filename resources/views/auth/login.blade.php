@extends('layouts.loginLayout')

@section('content')

<div class="d-flex justify-content-center py-5">

    <img src="{{asset('image/logo.png')}}"
                    alt="No Image" style="height: 100px">

</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="text-bold text-dark text-uppercase">Welcome Back!</h5>
                    <p>Enter your credentials to login</p>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf


                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Email Address">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group">

                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            {{-- <div>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div> --}}
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary btn-block">
                                Login <i class="fas fa-sign-in-alt"></i>
                            </button>
                        </div>

                        {{-- <hr>

                        Don't have account? <a href="{{ route('register') }}">{{ __('Sign Up') }}</a> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
