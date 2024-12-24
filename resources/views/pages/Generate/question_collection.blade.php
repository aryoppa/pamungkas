@extends('layouts.logged-navbar')

@section('content')
<a class="bs-example floating-btn" href="/help?code=lihat-koleksi">
    <button type="button" class="my-float" data-toggle="popover" title="Apa yang harus saya lakukan?"><b>?</b></button>
</a>
@if ($questions->count() == 0)
<div class="container mt-5 pt-5">
    <div class="card">
        <div class="card-body p-5">
            <div class="row">
                <div class="col-lg-5 col-sm-12">
                    <img src="{{ asset('assets/images/error-404.png') }}" width="70%" alt="">
                </div>
                <div class="col-lg-7 col-sm-12 mt-3">
                    <h1 style="color: #3E6D81;" class="pt-5 heading-responsive">
                        <b>
                            <span style="color: #CA6035;">OOPS,</span> Kamu tidak memiliki soal.
                        </b>
                    </h1>
                    <p class="paragraph-responsive">
                        Kamu bisa menambahkan soal dengan menekan tombol di bawah ini.
                    </p>
                    @if(Auth::check())
                    <a href="/generate" class="centered-button">
                        @else
                        <a href="/demo/generate" class="centered-button">
                            @endif
                            <button class="btn mt-2 px-4" style="background-color: #3E6D81; color: white;">
                                Generate Sekarang
                            </button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container mb-5">
    <div style="color: #CA6035;" class="row pb-0 pt-5 text-center">
        <h3 class="pt-4">
            <b>
                Koleksi Soal
            </b>
        </h3>
        <p style="color: black;" class="paragraph-responsive py-4 text-center">
            Berikut koleksi soal yang anda miliki. Anda dapat mengelola soal serta menambahkan kedalam tes sesuai dengan kebutuhan anda  Dengan mengumpulkan beragam jenis soal, Anda dapat menciptakan tes yang lebih komprehensif dan sesuai dengan tujuan pembelajaran Anda. Ini adalah alat yang efisien untuk membantu Anda dalam menyusun ujian atau latihan yang berkualitas dalam pemahaman Bahasa Inggris.
        </p>
        <!-- <a href="/question-collection/print">
            <button type="button" name="submit" class="btn bg-color-primary text-white mt-3 ps-4 pe-4" style="background-color: #3E6D81; float: right;">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M16 8V5H8v3H6V3h12v5ZM4 10h16H6Zm14 2.5q.425 0 .712-.288q.288-.287.288-.712t-.288-.713Q18.425 10.5 18 10.5t-.712.287Q17 11.075 17 11.5t.288.712q.287.288.712.288ZM16 19v-4H8v4Zm2 2H6v-4H2v-6q0-1.275.875-2.137Q3.75 8 5 8h14q1.275 0 2.138.863Q22 9.725 22 11v6h-4Zm2-6v-4q0-.425-.288-.713Q19.425 10 19 10H5q-.425 0-.713.287Q4 10.575 4 11v4h2v-2h12v2Z" />
                </svg> Dokumen Cetak
            </button>
        </a> -->
    </div>
    @foreach ($questions as $question)
    @if(Auth::check())
    <a href="/detail-collection/{{ $question->code }}">
        @else
        <a href="/demo/detail-collection/{{ $question->code }}">
            @endif
            <div class="card p-4 mt-3 shadow-md hover-card" style="color: #555555;">
                <div class="row">
                    <div class="col-1 flex justify-content-center align-items-center">
                        @switch($question->category)
                        @case('Vocabulary')
                        <img src=" {{ asset('assets/images/vocabulary-icon.png') }}" width="100%" alt="">
                        @break
                        @case('Sentence Completion')
                        <img src=" {{ asset('assets/images/sentence_completion-icon.png') }}" width="100%" alt="">
                        @break
                        @case('Error Identification')
                        <img src=" {{ asset('assets/images/error_identification-icon.png') }}" width="100%" alt="">
                        @break
                        @case('5W+1H')
                        <img src=" {{ asset('assets/images/5w1h-icon.png') }}" width="100%" alt="">
                        @break
                        @case('Pronoun Reference')
                        <img src=" {{ asset('assets/images/pronoun_reference-icon.png') }}" width="100%" alt="">
                        @break
                        @case('Summary')
                        <img src=" {{ asset('assets/images/summary-icon.png') }}" width="100%" alt="">
                        @break
                        @endswitch
                    </div>
                    <div class="col-11">
                        <h5 class="pt-2">
                            <b> {{ $question->title }} </b>
                        </h5>
                        <p>
                            {{ $question->code }}
                            <br>
                            {{ $question->created_at }}
                        </p>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
</div>
@endif
@if (Auth::guest())
<div class="container my-5">
    <div class="card">
        <div class="card-body p-5">
            <div class="row reverse">
                <div class="col-lg-7 col-sm-12">
                    <h2 style="color: #CA6035;" class="pt-4 heading-responsive">
                        <b>
                            Upgrade akun-mu sekarang!
                        </b>
                    </h2>
                    <p class="paragraph-responsive">
                        Dapatkan akses ke semua fitur tanpa batas yang ada di Smart EngTest
                        dengan mengupgrade akunmu ke premium!
                    </p>
                    <a href="<?= url('upgrade-account') ?>" class="centered-button pt-2">
                        <button class="btn mt-2" style="background-color: #3E6D81; color: white;">Upgrade Sekarang</button>
                    </a>
                </div>
                <div class="col-lg-5 col-sm-12 d-flex justify-content-center">
                    <img src="{!! url('assets/images/Saly-1.png')!!}" width="60%" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="text-center my-5">
    @if (Auth::guest())
        <a href="{{ url('/')}}" class="text-color-secondary"><h5><i class="bi bi-arrow-left-square"></i> kembali</h5></a>
    @else
    <a href="{{ url('/home')}}" class="text-color-secondary"><h5><i class="bi bi-arrow-left-square"></i> kembali</h5></a>
    @endif
</div>



<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
</script>
@endsection
