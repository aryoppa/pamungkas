@extends('layouts.logged-navbar')

@section('content')
<div class="container mt-5">
    <div class="row">
        <h3 class="text-color-secondary text-center">
            <b>
                Cetak Dokumen
            </b>
        </h3>
    </div>
    <div class="row">
        <div class="card p-3">
            <?php $i = 1; ?>
            <?php foreach ($question as $question) : ?>
                {{$i}}. {{$question->question}}
            <?php endforeach; ?>
            <?php $i++; ?>
        </div>
    </div>
</div>
@endsection