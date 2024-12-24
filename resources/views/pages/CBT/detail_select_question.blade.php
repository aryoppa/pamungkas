@extends('layouts.logged-navbar')

@section('content')
<?php
$questions;
// dd($questions);
?>
<div class="container ">
    <div class="row pt-5 mt-3 text-justify">
        <h4 class="text-center mb-3 text-md">
            <b>
                {{$passage->title}}
            </b>
        </h4>
        <div class="card no-gutters justify-content-center p-3">
            <div style="height: 300px; overflow-y: scroll;">
                <p class="p-3">
                    {!!$passage->passage!!}
                </p>
            </div>
        </div>
        <div class="col px-0">
            <input type="checkbox" name="check-all" id="check-all" onclick="checkAllQuestions()">
            <label class="fw-bold text-color-primary">&nbsp;Pilih Semua Soal</label>
        </div>
        {{ Form::open(array('url' => 'cbt/select-question/save', 'method' => 'POST', 'class'=>'px-0')) }}
        @csrf
        @php $i = 0; @endphp
        @foreach ($questions as $question)
        <input type="hidden" class="form-control" name="questionCode" value="{{$questions->first()->code}}">
        <input type="hidden" class="form-control" name="testCode" value="{{$testCode}}">
        <div class="card p-4 shadow-md" style="color: #555555;">
            <div class="row">
                <div class="col">
                    {{ $i+1 }}. {!!$question->question!!}
                    @if ($questions->first()->category != "5W+1H")
                    <div class="row ps-3">
                        A. {{$question->option1}} <br>
                        B. {{$question->option2}} <br>
                        C. {{$question->option3}} <br>
                        D. {{$question->option4}} <br>
                    </div>
                    @endif
                    <div class="row">
                        <b class="pt-2 ps-3">
                            <button class="mt-1 text-color-secondary" type="button" style="background-color: transparent; border: none; margin-left: -6px;" onclick="reveal_answer({{$question->id}})">Lihat Jawaban</button>
                            <div id="view-answer-{{$question->id}}" style="display: none;" class="mb-3">
                                Jawaban: {{$question->answer}}
                            </div>
                        </b>
                    </div>
                </div>
                <div class="col-2">
                    <input class="form-check-input ms-2" type="checkbox" value="{{$question->id}}" id="checkedQuestion" name="checked[]" style="float: right;">
                    <span style="float: right;" class="text-color-secondary"> Pilih Soal </span>
                </div>
            </div>
        </div>
        <?php $i++; ?>
        @endforeach
        <div class="mb-5">.</div>
        <nav class="nav bg-light fixed-bottom p-5 pt-4 pb-4 bg-white" style="box-shadow: 0px 0px 10px 3px rgb(0,0,0,0.10);">
            <div class="ms-auto">
                <div class="row">
                    <div class="col">
                        <a href="{{ redirect()->getUrlGenerator()->previous() }}" style="text-decoration: none; color: white;">
                            <button class="btn bg-color-secondary" type="button" style="width: 150px; color: white;">
                                <b>
                                    Kembali
                                </b>
                            </button>
                        </a>
                    </div>
                    <div class="col">
                        <button class="btn bg-color-primary" type="submit" style="float: right; width: 150px; color: white;">
                            <b>
                                Pilih
                            </b>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
        {{ Form::close() }}
    </div>
</div>
    <script>
        function reveal_answer(id) {
            var get_id = "view-answer-";
            get_id += id;
            console.log(get_id);
            var x = document.getElementById(get_id);
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function checkAllQuestions() {
            const checkboxes = document.getElementsByName('checked[]');
            const checkAllCheckbox = document.getElementById('check-all');
            checkboxes.forEach(checkbox => {
                checkbox.checked = checkAllCheckbox.checked;
            });
        }
    </script>

    @endsection