@extends('layouts.logged-navbar')

@section('content')
<div class="container mt-4">
    <h4 class="text-center pt-3 my-5" style="color: #CA6035"><b>Pratinjau Passage</b></h4>
    {{ Form::open(array('url' => '/generate/store-passage', 'method' => 'POST')) }}
    @csrf
    <div class="row px-3">
        <input type="hidden" class="form-control" name="demo" value="FALSE">
        <input type="hidden" class="form-control" name="qtype" value="{{$qtype}}">
        <input type="text" name="title" class="form-control mb-3" value="{{$title}}">
        <textarea class="form-control" name="passage" id="passage" rows="13">
        {{ $content }}
        </textarea>
    </div>
    <button type="submit" name="submit_passage" class="btn mb-5 bg-color-primary text-white float-end w-100 mt-3 fw-bold">Generate</button>
    {{ Form::close() }}
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover({
            placement: 'left',
            trigger: 'hover',
            content: 'Pada halaman ini Anda dapat mengubah passage yang akan digunakan untuk membuat soal',
        });
    });
</script>
@endsection