@extends('layouts.logged-navbar')

@section('content')
<div class="container my-5 pt-4">
    <a class="bs-example floating-btn" href="/help?code=generate">
        <button type="button" class="my-float" data-toggle="popover" title="Apa yang harus saya lakukan?"><b>?</b></button>
    </a>
    <div class="row mx-5">
        <div class="col mb-4">
            <h3 class="text-color-secondary">
                <b>
                    Materi Belajar
                </b>
            </h3>
            <p>
                Kesulitan dalam mengerjakan Computer Based Test? Tenang saja! Kami juga menyediakan bahan ajar yang dapat Anda akses untuk mempelajari kembali materi serta meningkatkan kemampuan Anda dalam berbahasa Inggris.
            </p>
        </div>
    </div>
    <div class="row mx-5">
        @foreach ($learning as $learn)
        <div class="col-lg-3 col-md-4 col-sm-6 col-6 px-3">
            <div class="card" style="min-height: 300px">
                <img src="/assets/images/learn/{{$learn->image}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">{{$learn->title}}</h6>
                    <p class="card-text fs-6" style="text-align: justify;">{{$learn->description}}</p>
                    <a href="/learn/view-details/{{$learn->id}}" class="btn bg-color-secondary text-white w-100 fw-bold">Belajar Sekarang</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
