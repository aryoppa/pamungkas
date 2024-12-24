@extends('layouts.logged-navbar')

@section('content')
<div class="container-fluid p-1 vh-100" style="background-color: #3E6D81; display: flex; justify-content: center; align-items: center;">
    <div class="container p-5" style="background-color: #ffffff; border-radius: 15px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
        <h2 class="mb-4 text-center text-primary fw-bold" style="font-family: 'Roboto', sans-serif;">
            Rekomendasi
        </h2>

        <p class="text-dark text-center" style="font-size: 18px; line-height: 1.6;">
            {{ $rekomendasi['recommendation'] }}
        </p>
    </div>
</div>
@endsection
