@extends('layouts.logged-navbar')

@section('content')

@php
if (Auth::check()) {
$userBalance = Auth::user()->userBalance;
$isBalanceSufficient = $userBalance->balance >= 500 || $userBalance->is_premium >= 1;
$isPremium = $userBalance->is_premium;
}
@endphp

<?php

use Illuminate\Support\Facades\Cookie;

$qtype = Cookie::get('qtype');
$originalText = Cookie::get('originalText');
$title = Cookie::get('title');

?>
<div class="container mt-4">
    <a class="bs-example floating-btn" href="/help?code=generate">
        <button type="button" class="my-float" data-toggle="popover" title="Apa yang harus saya lakukan?"><b>?</b></button>
    </a>
    <h4 class="text-center pt-3 my-5" style="color: #CA6035"><b>Pratinjau Artikel</b></h4>
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show m-1 mb-3 p-3 ps-1 pb-0" role="alert">
        <button type="button" class="btn float-end bg-light close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ol>
            @foreach ($errors->all() as $error)
            <li>
                @if($error == "The title field is required.") Judul tidak boleh kosong
                @elseif($error == "The passage field is required.") Passage tidak boleh kosong
                @else {{$error}}
                @endif
            </li>
            @endforeach
        </ol>
    </div>
    @endif

    {{ Form::open(array('url' => '/generate/store-passage', 'method' => 'POST')) }}
    @csrf
    <div class="row px-3">
        <input type="hidden" class="form-control" name="qtype" value="{{$qtype}}">
        <input type="hidden" class="form-control" name="demo" value="FALSE">
        <input type="text" name="title" class="form-control mb-3" value="{{$title}} ">
        <textarea class="form-control" name="passage" id="passage" style="width:100%" rows="13">
        {{$originalText}}
        </textarea>
    </div>
    <div class="row justify-content-end mb-5">
        <div class="col">
            <a href="{{ redirect()->getUrlGenerator()->previous() }}" style="text-decoration: none; color: white;">
                <button class="btn bg-color-secondary text-white fw-bold float-start mt-4 px-5" type="button">
                    <b>
                        Kembali
                    </b>
                </button>
            </a>
            @if (Auth::check())
            @if (!$isBalanceSufficient)
            <div class="float-end mt-3 text-center">
                <p class="fw-bold text-danger">Saldo tidak mencukupi</p>
                <a href="{{url('balance')}}" class="btn bg-color-primary text-white fw-bold px-5">Top-up/Upgrade</a>
            </div>
            @else
            <button type="button" class="btn bg-color-primary text-white fw-bold float-end px-5 mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal" @if (!$isBalanceSufficient) disabled @endif>
                Buat Soal
            </button>
            @endif
            @else
            <button type="button" class="btn bg-color-primary text-white fw-bold float-end px-5 mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Buat Soal
            </button>
            @endif
        </div>

        {{-- confirmation modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Yakin untuk generate?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="card-text ml-auto">
                            @if (Auth::check())
                            @if (Auth::user()->userBalance->is_premium == 0)
                            Saldo anda: Rp{{ number_format(Auth::user()->userBalance->balance, 0, ',', '.') }}<br>
                            Biaya Generate: Rp1.000
                            @else
                            Anda merupakan user premium hingga {{date('d M Y', strtotime(Auth::user()->userBalance->expired_at))}}
                            @endif
                            @else
                            Apakah anda yakin ingin melakukan demo generate soal?
                            @endif
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" id="scrappingBtn" name="submit_passage" class="btn bg-color-primary text-white float-end fw-bold px-4">Ya</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of confirmation modal --}}
    </div>
    {{ Form::close() }}
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover({
            placement: 'left',
            trigger: 'hover',
            content: 'Pada halaman ini Anda dapat mengubah passage yang akan digunakan untuk membuat soal',
        });
    });
</script>

{{-- change to loader for button script --}}
<script>
    $(document).ready(function() {
        // Handle form submission
        $('form').on('submit', function() {
            // Disable the button and change the text to the Bootstrap loader icon
            $('#scrappingBtn')
                .prop('disabled', true)
                .html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
        });
    });
</script>
@endsection
