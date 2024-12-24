@extends('layouts.logged-navbar')

@section('content')
<div class="p-5 pb-3 font-poppins">
    <p id="demo" style="color: #3e6d81; font-size: 20px; font-weight: 600; text-align: right;"></p>
    <div class="row mb-2 mt-2 gap-4">
        @php
        $question = $questions[$id-1];
        @endphp

        <div class="col-lg-9 col-md-9 col-12" style="height: 400px; overflow-y: scroll; text-align: justify; box-shadow: 0px 0px 10px -2px rgba(0, 0, 0, 0.35);">
            <p class="p-3">
                {{$question->passage}}
            </p>
        </div>
        <div class="col-lg col-md col p-4" style="height: 400px; overflow-y: scroll; background-color: white;text-align: justify; box-shadow: 0px 0px 10px -2px rgba(0, 0, 0, 0.35);">
            <div class="row row-cols-5 gap-3" style="text-align: center;">
                @php
                $total_question = $questions->count();
                @endphp
                <?php for ($x = 1; $x <= $total_question; $x++) { ?>
                    <a style="background-color: white;" class="page-link py-2 rounded shadow-sm border-2" href="<?php echo $x ?>">
                        <?php echo $x; ?>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="mb-4">
        <div class="row">
            <div class="card">
                <div class="row p-4">
                    {{$question->question}}
                    <br>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="option" value="A" />
                        {{$question->option1}}
                        <label class="form-check-label">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="option" value="B" />
                        {{$question->option2}}
                        <label class="form-check-label">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="option" value="C" />
                        {{$question->option3}}
                        <label class="form-check-label">
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="option" value="D" />
                        {{$question->option4}}
                        <label class="form-check-label">
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-4">.</div>
    <nav class="nav bg-light fixed-bottom py-4 bg-white" style="box-shadow: 0px 0px 10px 3px rgb(0,0,0,0.10);">
        <div class="container-fluid ps-4 pe-4">
            <div class="row">
                <div class="col-6">
                    @if ($id == 1)
                        <a href="{{ url()->previous() }}"   >
                    @else
                        <a href="{{ $id - 1 }}">
                    @endif
                        <button class="btn bg-color-secondary" style="width: 150px; color: white;">
                            Kembali
                        </button>
                    </a>
                </div>
                <div class="col-6">
                    @if ($id != $total_question)
                    <a href="{{ $id + 1 }}">
                        <button class="btn bg-color-primary" style="float: right; width: 150px; color: white;">
                            Selanjutnya
                        </button>
                    </a>
                @else
                    <a href="{{ url('cbt/admin-test-detail', $code) }}">
                        <button class="btn bg-color-primary" style="float: right; width: 150px; color: white;">
                            Selesai
                        </button>
                    </a>
                @endif

                </div>
            </div>
        </div>
    </nav>
</div>
@endsection
