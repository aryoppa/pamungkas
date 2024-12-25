@extends('layouts.logged-navbar')

@section('content')
<!-- <a class="bs-example floating-btn" href="/help?code=create-cbt">
    <button type="button" class="my-float" data-toggle="popover" title="Apa yang harus saya lakukan?"><b>?</b></button>
</a> -->
<div class="container-fluid p-1 vh-100" style="background-color: #3E6D81;">
    <div class="container">
        <h2 class="my-5 pt-3 text-center text-white fw-bold">
            Item Response Theory <br>
            Computer Based Test
        </h2>

        <img class="mx-auto d-block" width="15%" src="/assets/images/pronoun_reference.png" alt="Pronoun Reference">

        <p class="text-center my-4 py-3 text-white">
            Dalam tes ini, Anda akan diberikan 10 soal berjenis Error Identification yang disajikan secara berurutan. <br>
            Setiap soal berikutnya akan ditampilkan berdasarkan jawaban Anda pada soal sebelumnya. <br>
            Di akhir tes, Anda akan menerima kesimpulan mengenai kompetensi yang perlu ditingkatkan,<br> 
            sehingga Anda dapat melakukan evaluasi dan pembelajaran dengan lebih efektif. <br>
            Pastikan koneksi Anda stabil sebelum memulai tes, <br>Dan dimohon untuk tidak mengakses atau berpindah laman sebelum tes berakhir agar rekomendasi dapat dibuat secara maksimal
        </p>

        <div class="row mt-4 text-center justify-content-center">
            <div class="col-4">
                <a href="{{ Auth::check() ? url('irt/test') : url('demo/cbt/test-page') }}">
                    <button type="button" class="btn ps-4 pe-4 text-light fw-bold" style="background-color: #5E7B87;">
                        Mulai Tes
                    </button>
                </a>
            </div>
            <div class="col-4">
                <a href="{{ Auth::check() ? url('irt/result') : url('demo/cbt/test-page') }}">
                    <button type="button" class="btn ps-4 pe-4 text-light fw-bold" style="background-color: #5E7B87;">
                        Lihat Rekomendasi Terakhir
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
