@extends('layouts.logged-navbar')

@section('content')
<div class="container mt-5">
    <a class="bs-example floating-btn" href="/help?code=generate">
        <button type="button" class="my-float" data-toggle="popover" title="Apa yang harus saya lakukan?"><b>?</b></button>
    </a>
    <div class="row py-4 text-center">
        <h4 style="color: #CA6035"><b>Generator Soal Bahasa Inggris</b></h4>
        <p class="pt-4">Dengan Generator Soal Bahasa Inggris kami, Anda dapat memilih jenis soal yang ingin dibuat secara otomatis sesuai kebutuhan Anda Diantaranya identifikasi kesalahan, melengkapi kalimat, ringkasan, pertanyaan 5W + 1H, referensi pengucapan, dan pengayaan kosakata. Dengan beragam opsi ini, Anda dapat menciptakan latihan yang bervariasi dan mendalam dalam pemahaman Bahasa Inggris serta menguji keterampilan berbagai aspek dalam pembelajaran Bahasa Inggris. Ini adalah alat yang memudahkan Anda untuk menciptakan berbagai macam soal Bahasa Inggris dengan cepat dan efisien, membantu dalam proses pembelajaran dan evaluasi. </p>
    </div>
    <div class="row text-center mb-5 pb-4">
        <div class="col-lg-4 col-md-4 col-12 mb-4">
            @if(Auth::check())
            <a href="/generate/Vocabulary/input-passage" style="color: #3E6D81; text-decoration: none;">
                @else
                <a href="/demo/generate/Vocabulary/input-passage" style="color: #3E6D81; text-decoration: none;">
                    @endif
                    <div class="card h-100 hover-card">
                        <div class="card-body">
                            <img src="/assets/images/icon-vocabulary.png" class="p-4 pb-1" width="45%" alt="">
                            <br>
                            <b class="text-color-secondary">
                                Vocabulary
                            </b>
                        </div>
                    </div>
                </a>
        </div>
        <div class="col-lg-4 col-md-4 col-12 mb-4">
            @if(Auth::check())
            <a href="/generate/Error Identification/input-passage" style="color: #3E6D81; text-decoration: none;">
                @else
                <a href="/demo/generate/Error Identification/input-passage" style="color: #3E6D81; text-decoration: none;">
                    @endif
                    <div class="card h-100 hover-card">
                        <div class="card-body">
                            <img src="/assets/images/icon-error.png" class="p-4 pb-1" width="50%" alt="">
                            <br>
                            <b class="text-color-secondary">
                                Error Identification
                            </b>
                        </div>
                    </div>
                </a>
        </div>
        <div class="col-lg-4 col-md-4 col-12 mb-4">
            @if(Auth::check())
            <a href="/generate/Sentence Completion/input-passage" style="color: #3E6D81; text-decoration: none;">
                @else
                <a href="/demo/generate/Sentence Completion/input-passage" style="color: #3E6D81; text-decoration: none;">
                    @endif
                    <div class="card h-100 hover-card" style="cursor: default;">
                        <div class="card-body">
                            <img src="/assets/images/icon-sentence.png" class="p-4 pb-1" width="50%" alt="">
                            <br>
                            <b class="text-color-secondary">
                                Sentence Completion
                            </b>
                        </div>
                    </div>
                </a>
        </div>
        <div class="col-lg-4 col-md-4 col-12 mb-4">
            @if(Auth::check())
            <a href="#" style="color: #3E6D81; text-decoration: none;">
                @else
                <a href="#" style="color: #3E6D81; text-decoration: none;">
                    @endif
                    <div class="card h-100 hover-card" style="background-color: #eeeeee; cursor: default;">
                        <div class="card-body">
                            <img src="/assets/images/icon-pronoun.png" class="p-4 pb-1" width="50%" alt="">
                            <br>
                            <b class="text-color-secondary">
                                Pronoun Reference
                            </b>
                        </div>
                    </div>
                </a>
        </div>
        <div class="col-lg-4 col-md-4 col-12 mb-4">
            @if(Auth::check())
            <a href="/generate/5W+1H/input-passage" style="color: #3E6D81; text-decoration: none;">
                @else
                <a href="/demo/generate/5W+1H/input-passage" style="color: #3E6D81; text-decoration: none;">
                    @endif
                    <div class="card h-100 hover-card" style="color: #3E6D81; text-decoration: none;">
                        <div class="card-body">
                            <img src="/assets/images/icon-5w1h.png" class="p-4 pb-1" width="45%" alt="">
                            <br>
                            <b class="text-color-secondary">
                                5W+1H
                            </b>
                        </div>
                    </div>
                </a>
        </div>
        <div class="col-lg-4 col-md-4 col-12 mb-4">
            @if(Auth::check())
            <a href="#" style="color: #3E6D81; text-decoration: none;">
                @else
                <a href="#" style="color: #3E6D81; text-decoration: none;">
                    @endif
                    <div class="card h-100 hover-card" style="background-color: #eeeeee; cursor: default;">
                        <div class="card-body">
                            <img src="/assets/images/icon-summary.png" class="p-4 pb-1" width="50%" alt="">
                            <br>
                            <b class="text-color-secondary">
                                Summary
                            </b>
                        </div>
                    </div>
                </a>
        </div>
    </div>
    <div class="text-center my-5">
        @if (Auth::guest())
            <a href="{{ url('/')}}" class="text-color-secondary"><h5><i class="bi bi-arrow-left-square"></i> kembali</h5></a>
        @else
        <a href="{{ url('/home')}}" class="text-color-secondary"><h5><i class="bi bi-arrow-left-square"></i> kembali</h5></a>
        @endif
    </div>
    <!--
    IF POIN SISTEM HABIS
    <div class="row">
        <div class="card">
            <div class="card-body p-5">
                <div class="row">
                    <div class="col-lg-5 col-sm-12">
                        <img src="assets/images/error-404.png" width="70%" alt="">
                    </div>
                    <div class="col-lg-7 col-sm-12 mt-3">
                        <h1 style="color: #CA6035;" class="pt-5 heading-responsive">
                            <b>
                                Mohon Maaf
                            </b>
                        </h1>
                        <p class="paragraph-responsive">
                            Poin anda tidak mencukupi untuk menggunakan fitur ini. Silahkan upgrade akun anda untuk menggunakan fitur ini.
                        </p>
                        <a href="<?= url('upgrade-account') ?>" class="centered-button">
                            <button class="btn mt-2 px-4" style="background-color: #3E6D81; color: white;">Upgrade Now</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
@endsection
