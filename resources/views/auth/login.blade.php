@extends('layouts.auth-navbar')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <h1 class="text-color-primary text-center fw-bold">
                MASUK
            </h1>
            @if(Session::has('status'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('message')}}
            </div>
            @endif
            <form method="POST" action="">
                @csrf
                <div class="row mb-3">
                    <label for="email">{{ __('Alamat Email') }}</label>
                    <div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password">{{ __('Password') }}</label>
                    <div id="show_hide_password">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="row">
                            <div class="col-6">
                                <input type="checkbox" class="mt-3" onclick="myFunction()">&nbsp;Tampilkan Password
                            </div>
                            <div class="col-6 text-color-primary" style="text-align: right;">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link mt-1" href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary bg-color-primary mt-2" style="width: 100%;">
                    {{ __('Masuk') }}
                </button>
            </form>
            <div class="text-center mt-3 text-color-primary">
                Belum punya akun?<a href="/register"> Register </a>
            </div>
        </div>
    </div>
    @endsection