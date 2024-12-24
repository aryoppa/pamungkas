@extends('layouts.logged-navbar')

@section('content')
<div class="container">
    <div class="row pb-0 pt-5">
        <h4 style="color: #CA6035;" class="text-center">
            <b>
                Add Manual Question
            </b>
        </h4>

        <div class="row ps-4 pt-4">
            <form action="" method="post">
                <label for="Question Type">Question Type</label>
                <select class="form-select mb-3" aria-label="Default select example">
                    <option value="summary">Summary</option>
                    <option value="short_answer_question">Short Answer Question</option>
                    <option value="fill_in_the_blank">Fill In The Blank</option>
                    <option value="trueorfalse">True Or False</option>
                    <option value="multiple_choice">Multiple Choice</option>
                </select>

                <label for="Passage">Passage</label>
                <textarea class="form-control mb-3" type="text" name="passage_id" id="passage_id" rows="7"></textarea>
            </form>
            <a href="<?= url('generate/add-question-test'); ?>">
                <button type="button" class="btn btn-block text-light mt-4 ps-5 pe-5" style="background-color: #3E6D81; float: right;">Next</button>
            </a>
        </div>
    </div>
</div>
@endsection