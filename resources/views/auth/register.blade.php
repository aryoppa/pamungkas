@extends('layouts.auth-navbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <h1 class="text-color-primary text-center fw-bold">
                SIGN UP
            </h1>
            @if(Session::has('status'))
            <div class="alert alert-success mt-3" role="alert">
                {{Session::get('message')}}
            </div>
            @endif
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row mb-3 mt-3">
                    <label for="name">{{ __('Name') }}</label>
                    <div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email">{{ __('Email Address') }}</label>
                    <div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password">{{ __('Password') }}</label>
                    <div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="repeat-password">{{ __('Repeat Password') }}</label>
                    <div>
                        <input id="repeat-password" type="password" class="form-control @error('password') is-invalid @enderror" name="repeat-password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary bg-color-primary mt-2" style="width: 100%;">
                    {{ __('Register') }}
                </button>
            </form>
            <div class="text-center mt-3 text-color-primary">
                Sudah punya akun?<a href="/login"> Masuk </a>
            </div>
        </div>
    </div>
</div>
@endsection