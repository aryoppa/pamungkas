@extends('layouts.logged-navbar')

@section('content')
<div class="container mt-5 pt-4">
    <a href="/learn">
        <button class="btn bg-color-primary text-white mb-3">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </button>
    </a>
    @foreach ($learning as $learn)
    <div class="row">
        <h3 class="text-color-primary">
            <b>
                {{$learn->title}}
            </b>
        </h3>
        <p style="color: #CA6035">
            {{$learn->description}}
        </p>
    </div>
    <div class="row mt-3 custom-content">
        {!! $learn->content !!}
    </div>
    <div class="row mt-3 mb-5">
        {!! $learn->video !!}
    </div>
    @endforeach
</div>
@endsection