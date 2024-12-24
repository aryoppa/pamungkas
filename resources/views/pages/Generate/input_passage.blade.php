@extends('layouts.logged-navbar')

@section('content')
<div class="container mt-4">
    <a class="bs-example floating-btn" href="/help?code=generate">
        <button type="button" class="my-float" data-toggle="popover" title="Apa yang harus saya lakukan?"><b>?</b></button>
    </a>
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p>
            @foreach ($errors->all() as $error)
            @if ($error == "The link field is required.")
            Link tidak boleh kosong
            @else
            {{ $error }}
            @endif
            @endforeach
        </p>
        <button type="button" class="btn-close btn-sm p-3 m-2 float-end bg-light close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
    @endif
    <?php

    use Illuminate\Support\Facades\Cookie;
    $qtype = $qtype? $qtype : Cookie::get('qtype');
    ?>
    <div class="row p-5 pb-5">
        <h4 class="text-center" style="color: #CA6035"><b>Buat Soal {{$qtype}}</b></h4>
    </div>
    <p style="text-align: justify">
        <?php
        if ($qtype == 'Vocabulary') {
            echo "Vocabulary merupakan jenis pertanyaan yang meminta seseorang untuk memahami atau
            menggunakan kata-kata tertentu dalam konteks tertentu.
            Dalam tes bahasa Inggris, siswa mungkin diminta untuk menentukan arti
            kata yang tidak biasa atau kata yang jarang digunakan dalam suatu kalimat.
            Pada ujian masuk perguruan tinggi, siswa mungkin diminta untuk memilih kata yang
            paling tepat untuk melengkapi kalimat yang diberikan.";
        } else if ($qtype == 'Error Identification') {
            echo "Error identification merupakan salah satu jenis soal yang paling sering muncul di
            ujian-ujian Bahasa Inggris. Pada tipe soal ini, seseorang akan diminta untuk
            mengidentifikasi kesalahan atau kesalahan dalam sebuah teks, seperti tata bahasa,
            ejaan, atau penggunaan kata yang tidak tepat. Dalam tes bahasa Inggris, siswa mungkin
            diminta untuk mengidentifikasi kesalahan dalam kalimat tertentu dan memilih opsi yang
            benar untuk memperbaikinya. Tujuan dari tipe soal ini adalah untuk membantu seseorang
            meningkatkan kemampuan bahasa mereka dengan mengidentifikasi dan memperbaiki kesalahan
            dalam tulisan mereka atau bahasa mereka secara keseluruhan.";
        } else if ($qtype == 'Sentence Completion') {
            echo "Sentence completion merupakan tipe soal yang meminta seseorang untuk melengkapi
            bagian yang hilang dalam kalimat yang diberikan.
            Dalam tes bahasa Inggris, siswa mungkin diminta untuk melengkapi kalimat dengan
            kata yang paling tepat untuk membuat kalimat menjadi sempurna.";
        }
        ?>
    </p>
    <div class=" row pt-3 mb-5">
        <div class="pb-1">
            <label for="option" class="form-label fw-bold text-color-primary">Input Method</label>
            <select class="form-select" aria-label="option" id="option_form" name="option_form" onchange="showDiv(this)">
                <option value="link">Link</option>
                <option value="file">File</option>
            </select>
        </div>
        <div style="display:block;" id="hidden_link">
            {{ Form::open(array('url' => 'scrapping', 'method' => 'POST')) }}
            @csrf
            <input type="hidden" class="form-control" name="demo" value="FALSE">
            <input type="hidden" class="form-control" name="qtype" value='{{$qtype}}'>
            <? $option_form = "link"; ?>
            <div class="mt-3">
                <label for="article" class="form-label fw-bold text-color-primary">Input Link</label>
                @if(Auth::check())
                <input type="text" class="form-control" name="link" placeholder="Masukan tautan berita">
                @else
                <select class="form-select" name="link">
                    <option selected disabled>Pilih tautan berita yang akan dibuat soal</option>
                    <option value=https://www.bbc.com/sport/football/64920773>https://www.bbc.com/sport/football/64920773</option>
                    <option value=https://edition.cnn.com/2023/03/14/politics/new-mexico-voting-rights-bill/index.html>https://edition.cnn.com/2023/03/14/politics/new-mexico-voting-rights-bill/index.html</option>
                    <option value=https://edition.cnn.com/travel/article/flight-cancellations-delays-winter-storm/index.html>https://edition.cnn.com/travel/article/flight-cancellations-delays-winter-storm/index.html</option>
                </select>
                @endif
            </div>
            <a href="{{ redirect()->getUrlGenerator()->previous() }}" style="text-decoration: none; color: white;">
                <button class="btn bg-color-secondary text-white fw-bold float-start mt-5 px-5" type="button">
                    <b>
                        Kembali
                    </b>
                </button>
            </a>
            <button id="scrappingBtn" type="submit" name="submit" class="btn bg-color-primary text-white float-end fw-bold ps-5 pe-5 mt-5">Ambil Artikel</button>

            {{ Form::close() }}
        </div>
        <div style="display:none;" id="hidden_file">
            {{ Form::open(array('url' => 'process-file', 'method' => 'POST', 'enctype' => 'multipart/form-data')) }}
            @csrf
            <input type="hidden" class="form-control" name="demo" value="FALSE">
            <input type="hidden" class="form-control" name="qtype" value='{{$qtype}}'>
            <? $option_form = "link"; ?>
            <div class="mt-3">
                <label for="exampleFormControlInput1" class="form-label fw-bold text-color-primary">Input File</label>
                <input class="form-control" type="file" name="file" accept=".txt" required>
            </div>
            <button type="submit" name="submit" class="btn bg-color-primary text-white float-end ps-5 pe-5 mt-5">Pratinjau</button>
            {{ Form::close() }}
        </div>
    </div>

    <script type="text/javascript">
        var name = document.getElementById('firstName').value;
        window.localStorage.setItem('name', name);

        function showDiv(select) {
            if (select.value == "file") {
                document.getElementById('hidden_file').style.display = "block";
                document.getElementById('hidden_link').style.display = "none";
            } else {
                document.getElementById('hidden_file').style.display = "none";
                document.getElementById('hidden_link').style.display = "block";
            }
        }
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
</div>
@endsection
