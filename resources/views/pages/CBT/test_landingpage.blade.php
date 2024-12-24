@extends('layouts.logged-navbar')

@section('content')
<a class="bs-example floating-btn" href="/help?code=start-cbt">
    <button type="button" class="my-float" data-toggle="popover" title="Apa yang harus saya lakukan?"><b>?</b></button>
</a>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<div style="padding-top: 30px; padding-left: 30px;">
    @if(Auth::check())
        <a href="{{ asset('cbt') }}">
    @else
        <a href="{{ asset('demo/cbt') }}">
    @endif
        <button type="button" name="submit" class="btn btn-block text-light rounded-circle bg-color-primary">
            <i class="fas fa-arrow-left"></i> <!-- Ikon panah ke kiri -->
        </button>
    </a>
</div>
<div class="container p-4 pt-5 mt-5">
    <h3 style="color: #3E6D81;" class="pb-3">
        <b>
            Mulai Tes Sekarang.
        </b>
    </h3>
    <form method="post" action="{{url('cbt/test-verification/')}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label" style="color: #3E6D81; font-weight: bold;">Nama</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Input Name">
        </div>
        <div class="mb-3">
            <label for="testcode" class="form-label" style="color: #3E6D81; font-weight: bold;">Kode Tes</label>
            <input type="text" name="testcode" class="form-control" id="testcode" placeholder="Test Code">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label" style="color: #3E6D81; font-weight: bold;">Password Tes</label>
            <input type="text" name="password" class="form-control" id="password" placeholder="Input Password">
        </div>
        <div class="mb-2 mt-2">
            <button type="submit" name="submit" class="btn btn-block text-light mt-4 ps-5 pe-5" style="background-color: #3E6D81; float: right;">Selanjutnya</button>
        </div>
    </form>
</div>
@endsection
