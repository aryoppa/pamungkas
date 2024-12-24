@extends('layouts.logged-navbar')

@section('content')
<div class="container">
    <div style="color: #CA6035;" class="row pb-0 pt-5 text-center">
        <h3 class="pt-4">
            <b>
                Koleksi Soal
            </b>
        </h3>
        <p style="color: black;" class="paragraph-responsive pb-4 text-center">
            Berikut adalah koleksi soal anda. Anda dapat menambahkan soal yang telah dihasilkan oleh generator ke dalam tes.
        </p>
        <!-- <a href="/generate/add-question-manual">
            <button type="button" name="submit" class="btn btn-sm btn-block text-light mt-4 ps-4 pe-4" style="background-color: #3E6D81; float: right;">Add Manual Question</button>
        </a> -->
    </div>
    @foreach ($testCollections as $testCollection)
    <div class="mb-5">
        @if(Auth::check())
            <a href="/cbt/select-question/{{$testCode}}/{{$testCollection->code}}">
        @else
            <a href="/demo/cbt/select-question/{{$testCode}}/{{$testCollection->code}}">
        @endif
            <div class="card p-4 mt-3 shadow-md" style="color: #555555;">
                <div class="row">
                    <div class="col-1 flex justify-content-center align-items-center">
                        @switch($testCollection->category)
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
                            <b> {{ $testCollection->code }} </b>
                        </h5>
                        <p>
                            {{ $testCollection->title }}
                        </p>
                        <p>
                            {{ $testCollection->created_at }}
                        </p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
    <div class="mb-5">.</div>
    <nav class="nav bg-light fixed-bottom p-5 pt-4 pb-4 bg-white" style="box-shadow: 0px 0px 10px 3px rgb(0,0,0,0.10);">
        <div class="container ms-auto">
            <div class="row">
                <div class="col">
                    <a href="/cbt/admin-test-detail/{{$testCode}}" style="text-decoration: none; color: white;">
                        <button class="btn bg-color-secondary" type="button" style="width: 150px; color: white;">
                            <b>
                                Kembali
                            </b>    
                        </button>
                    </a>
                </div>
                <div class="col">
                    @if(Auth::check())
                        <a class="btn bg-color-primary" href="/cbt/admin-test-detail/{{$testCode}}" type="submit" style="float: right; width: 150px; color: white;">
                    @else
                        <a class="btn bg-color-primary" href="/demo/cbt/admin-test-detail/{{$testCode}}" type="submit" style="float: right; width: 150px; color: white;">
                    @endif
                        Selesai
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>
<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
</script>
@endsection