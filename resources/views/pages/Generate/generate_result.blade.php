@extends('layouts.logged-navbar')

@section('content')

@php
if (Auth::check()) {
    $isBalanceSufficient = Auth::user()->userBalance->balance >= 500;
    $isPremium = Auth::user()->userBalance->is_premium;
}
@endphp

<div class="container mt-4">
    <a class="bs-example floating-btn" href="/help?code=generate">
        <button type="button" class="my-float" data-toggle="popover" title="Apa yang harus saya lakukan?"><b>?</b></button>
    </a>
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show p-2 ps-1 mt-5" role="alert">
        <button type="button" class="btn float-end bg-light close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p class="p-2 pb-0">
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
        </p>
    </div>
    @endif
    <div class="row p-3">
        <h4 class="text-center mt-4" style="color: #CA6035"><b>Pratinjau Hasil Generate Soal</b></h4>
        <h6 class="text-center mb-3 text-md">
            <b>
                {{$passage->title}}
            </b>
        </h6>
        <div class="card p-4">
            <div style="height: 400px; overflow-y: scroll;">
                <p style="white-space: pre-wrap;">
                    {!! nl2br(e($passage->passage)) !!}
                </p>
            </div>
        </div>
    </div>
    {{ Form::open(array('url' => 'save-generate-result', 'method' => 'POST', 'id' => 'questionForm')) }}
    @csrf
    <input type="hidden" class="form-control" name="demo" value='FALSE'>
    <input type="hidden" class="form-control" name="qtype" value="{{$questions[0]->category}}">
    <?php $i = 0; ?>
    <div class="row">
        <div class="col">
            <input class="form-check-input" type="checkbox" name="check-all" id="check-all" onclick="checkAllQuestions()">
            <label class="fw-bold text-color-primary">&nbsp;Pilih Semua Soal</label>
        </div>
        <divc class="col">
        @if (Auth::check())
            <a href="/generate/regenerate" class="btn bg-color-primary float-end text-white ps-5 pe-5 fw-bold">Buat Ulang</a>
        @else
            <a href="/demo/generate/regenerate" class="btn bg-color-primary float-end text-white ps-5 pe-5 fw-bold">Buat Ulang</a>
        @endif
        </divc>
    </div>
    <?php foreach ($questions as $question) { ?>
        <div class="card p-4" style="box-shadow:none;">
            <div class="row">
                <div class="col">
                    <div class="btn text-color-primary p-0">
                        <input class="form-check-input" type="checkbox" name="checked[]" value="{{$i}}">
                        <label class="fw-bold text-color-primary">&nbsp;Pilih Soal</label>
                    </div>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#editQuestion-{{$i}}" style="background-color: #3E6D81;">
                        <iconify-icon inline icon="akar-icons:edit" style="color: white; font-size: 17px;"></iconify-icon>
                    </button>
                </div>
            </div>
            <div class="row">
                <p class="mb-1">{{$i+1}}. {!!$question->question!!}</p>
                @if ($questions[0]->category != "5W+1H")
                <div class="option ms-4 ps-1 mt-0">
                    A. {{$question->option1}}<br>
                    <Input type="hidden" name="option0[]" value="{{$question->option1}}">
                    B. {{$question->option2}}<br>
                    <Input type="hidden" name="option1[]" value="{{$question->option2}}">
                    C. {{$question->option3}}<br>
                    <Input type="hidden" name="option2[]" value="{{$question->option3}}">
                    D. {{$question->option4}}<br>
                    <Input type="hidden" name="option3[]" value="{{$question->option4}}">
                </div>
                @endif

                <Input type="hidden" name="answer[]" value="{{$question->answeropt}}">
                <Input type="hidden" name="user_id" value="{{Auth::id()}}">
                <Input type="hidden" name="question[]" value="{{$question->question}}">
                <Input type="hidden" name="passageId" value="{{$question->passageId}}">

                <b class="mt-2 ms-4 ps-1">
                    <button class="text-color-secondary mb-0 pb-0" type="button" style="background-color: transparent; border: none; margin-left: -6px;" onclick="view_function({{$i}}, this)">Lihat Jawaban</button>
                    <div id="view-answer-{{$i}}" class="ps-0 pt-0 mt-0" style="display: none;">
                        Jawaban: <?= $question->answeropt ?>
                    </div>
                </b>
            </div>
            <?php $i = $i + 1 ?>
        </div>
    <?php } ?>

</div>
<div class="container">
    <div class="row justify-content-end px-3">
        <div class="col">
            <button type="button" id="myButton" class="btn bg-color-primary text-white float-end ps-5 pe-5 mt-3 me-2 mb-5 fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal" disabled>Simpan</button>
            @if (Auth::check())
                <a href="/generate/preview-passage" class="btn bg-color-secondary text-white float-start ps-5 pe-5 mt-3 me-2 mb-5 fw-bold">Kembali</a>
            @else
                <a href="/demo/generate/preview-passage" class="btn bg-color-secondary text-white float-start ps-5 pe-5 mt-3 me-2 mb-5 fw-bold">Kembali</a>
            @endif
            </div>
        {{-- confirmation modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Yakin untuk bayar & simpan?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if (Auth::check())
                            @if (Auth::user()->userBalance->is_premium == 1 )
                            <p class="card-text ml-auto">Total Harga:Gratis (Premium Benefit)</p>
                            @else
                            <p class="card-text ml-auto">Total Harga: <span id="counter"></span></p>
                            <p class="card-text ml-auto">Saldo: Rp{{ number_format(Auth::user()->userBalance->balance, 0, ',', '.') }}
                            </p>
                            @endif
                        @else
                            <p class="card-text ml-auto">Total Harga:Gratis (Demo Generator Soal)</p>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="submit" class="btn bg-color-primary text-white float-end fw-bold px-4">Ya</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of confirmation modal --}}

    </div>
</div>


{{-- <button type="submit" class="btn bg-color-primary text-white float-end ps-5 pe-5 mt-3 me-2 mb-5 fw-bold">Simpan</button> --}}
{{ Form::close() }}
<?php $i = 0 ?>
<?php foreach ($questions as $key => $question) {
    $modalQuestion = str_replace('<b><u>', '', $question->question);
    $modalQuestion = str_replace('</u></b>', '', $modalQuestion);
?>
    <div class="modal fade" id="editQuestion-{{$i}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pertanyaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{ Form::open(array('url' => 'edit-generated-question', 'method' => 'POST')) }}
                @csrf
                <input type="hidden" name="id" value="{{$question->id}}" />
                <div class="modal-body" style="text-align: justify">
                    <table class="table">
                        <tr>
                            <td>
                                Soal
                            </td>
                            <td>
                                <textarea name="question" id="" rows="5" class="form-control">{{$modalQuestion}}</textarea>
                            </td>
                        </tr>
                        @if ($questions[0]->category != "5W+1H")
                        <tr>
                            <td>
                                Opsi A
                            </td>
                            <td>
                                <input type="text" name="option1" class="form-control" value="{{$question->option1}}" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Opsi B
                            </td>
                            <td>
                                <input type="text" name="option2" class="form-control" value="{{$question->option2}}" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Opsi C
                            </td>
                            <td>
                                <input type="text" name="option3" class="form-control" value="{{$question->option3}}" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Opsi D
                            </td>
                            <td>
                                <input type="text" name="option4" class="form-control" value="{{$question->option4}}" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jawaban
                            </td>
                            <td>
                                <!-- <input type="text" name="answeropt" class="form-control" value="{{$question->answeropt}}" /> -->
                                <?php
                                $answer = '';
                                if ($question->answeropt == 'A') {
                                    $answer = 'A';
                                } else if ($question->answeropt == 'B') {
                                    $answer = 'B';
                                } else if ($question->answeropt == 'C') {
                                    $answer = 'C';
                                } else if ($question->answeropt == 'D') {
                                    $answer = 'D';
                                }
                                ?>
                                <select type="text" name="answeropt" class="form-select" aria-label="Default select example">
                                    <option value="A" {{$answer == 'A' ? 'selected' : ''}}>{{$question->option1}}</option>
                                    <option value="B" {{$answer == 'B' ? 'selected' : ''}}>{{$question->option2}}</option>
                                    <option value="C" {{$answer == 'C' ? 'selected' : ''}}>{{$question->option3}}</option>
                                    <option value="D" {{$answer == 'D' ? 'selected' : ''}}>{{$question->option4}}</option>
                                </select>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td>
                                Jawaban
                            </td>
                            <td>
                                <input type="text" name="answeropt" class="form-control" value="{{$question->answeropt}}" />
                            </td>
                        </tr>
                        @endif

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-color-secondary text-white" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn bg-color-primary text-white">Simpan Perubahan</button>
                </div>
                {{ Form::close() }}
            </div>
            {{ Form::open(array('url' => 'edit-generated-question', 'method' => 'POST')) }}
            @csrf
            <input type="hidden" name="id" value="{{$question->id}}" />
            <div class="modal-body" style="text-align: justify">
            </div>
        </div>
    </div>
    <?php $i = $i + 1 ?>
<?php } ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.6/jstz.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    var timezone = jstz.determine().name();
    var input = document.createElement("input");
    input.setAttribute("type", "hidden");
    input.setAttribute("name", "timezone");
    input.setAttribute("value", timezone);
    var form = document.getElementById("questionForm"); // Replace "your-form-id" with the actual ID of your form
    form.appendChild(input);

    function view_function(id, btnElement) {
        var get_id = "view-answer-" + id;
        var x = document.getElementById(get_id);
        if (x.style.display === "none") {
            x.style.display = "block";
            btnElement.textContent = "Sembunyikan Jawaban";
        } else {
            x.style.display = "none";
            btnElement.textContent = "Lihat Jawaban";
        }
    }

    function checkAllQuestions() {
    const checkboxes = document.getElementsByName('checked[]');
    const checkAllCheckbox = document.getElementById('check-all');
    checkboxes.forEach(checkbox => {
        checkbox.checked = checkAllCheckbox.checked;
    });

    // Toggle the button state (true to false, false to true)
    const myButton = document.getElementById('myButton');
    myButton.disabled = !myButton.disabled;
}

</script>

<script>

    $(document).ready(function() {
        // Initialize the counter variable
        let counter = 0;

        // Update the value in the paragraph
        $('#counter').text(counter);

        // Handle checkbox change event
        $('.form-check-input').on('change', function() {
            // Check if the checkbox is checked
            if ($(this).is(':checked')) {
                // Increment the counter
                counter += 500;
                $('#myButton').prop('disabled', false);
            } else {

                counter -= 500;
            }
            if (counter == 0) {
                $('#myButton').prop('disabled', true);
            }
            // Update the value in the paragraph
            $('#counter').text(counter);
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Initialize the counter variable
        let counter = 0;

        // Update the value in the paragraph
        $('#counter').text(counter);

        // Handle checkbox change event
        $('.form-check-input').on('change', function() {
            // Check if the checkbox is checked
            if ($(this).is(':checked')) {
                // Increment the counter by 500
                counter += 500;
                $('#myButton').prop('disabled', false);
            } else {
                // Decrement the counter by 500
                counter -= 500;
            }

            // If "Pilih Semua Soal" is checked, set the counter to 1500
            if ($('#check-all').is(':checked')) {
                counter = 1500;
            }

            // Update the value in the paragraph
            $('#counter').text(counter);

            // Enable/disable the "Simpan" button based on the counter
            if (counter == 0) {
                $('#myButton').prop('disabled', true);
            }
        });

        // Handle "Pilih Semua Soal" checkbox change event
        $('#check-all').on('change', function() {
            if ($(this).is(':checked')) {
                // If "Pilih Semua Soal" is checked, set the counter to 1500
                counter = 1500;
            } else {
                // If "Pilih Semua Soal" is unchecked, reset the counter to 0
                counter = 0;
            }

            // Update the value in the paragraph
            $('#counter').text(counter);

            // Enable/disable the "Simpan" button based on the counter
            $('#myButton').prop('disabled', counter == 0);
        });
    });
</script>


@endsection
