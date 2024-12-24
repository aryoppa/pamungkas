@extends('layouts.logged-navbar')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<div style="padding-top: 30px; padding-left: 20px;">
    <a href="{{ asset('cbt/cbt-dashboard') }}">
        <button type="button" name="submit" class="btn btn-block text-light ps-3 pe-3" style="background-color: #3E6D81; border-radius: 50%;">
            <i class="fas fa-arrow-left"></i> <!-- Ikon panah ke kiri -->
        </button>
    </a>
</div>
<div class="container pt-3 my-3">
    <a href="/cbt/print-question/print/FAF0XU" class="btn bg-color-secondary text-white mb-3">Cetak Test</a>
    <div class="card p-4">
        <b class="px-2">
            Nama: <br>
            Kelas: <br>
            Sekolah: <br>
        </b>
        <div class="container my-3">
            <div class="row mb-4 text-justify">
                @php $i = 1; @endphp
                @foreach ($passages as $passage)
                <p>
                    {{ $passage->passage }}
                </p>
                @foreach ($questions as $question)
                <div class="m-1">
                    {{ $i++ }}. {{ $question->question }} <br>
                    <div class="ms-3">
                        A. {{ $question->option1 }} <br>
                        B. {{ $question->option2 }} <br>
                        C. {{ $question->option3 }} <br>
                        D. {{ $question->option4 }} <br>
                    </div>
                </div>
                <br>
                @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
