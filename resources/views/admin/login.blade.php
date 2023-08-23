@extends('layout.master2')

@section('content')
    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-6 col-xl-4 mx-auto">
                <div class="card border-radius-card">
                    <div class="row row-login">

                        <div class="col-md-12 ps-md-0">
                            <div class="auth-form-wrapper px-4 py-5">
                                <div style="text-align:center">
                                    <img style="width:30%;    margin-bottom: 25px; "
                                        src="{{ asset('frontend/img/Logo Png-01.png') }}" alt="">
                                    <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                                </div>

                                <form method="POST" class="forms-sample" action="{{ route('postLogin') }}">
                                    @csrf
                                    <div style="padding:10px 10px 10px 20px">
                                        <div class="mb-3">
                                            <label for="userEmail" class="form-label">Email address</label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="userPassword" class="form-label">Password</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                            
                                    </div>
                                    <div style="text-align:center">
                                        <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0">
                                           Sign In
                                        </button>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                    <!-- <a href="{{ url('/auth/register') }}" class="d-block mt-3 text-muted">Not a user? Sign up</a> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
