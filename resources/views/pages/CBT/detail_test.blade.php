@extends('layouts.logged-navbar')

@section('content')
<div class="container p-4 pt-5 mt-5">
    <h3 style="color: #3E6D81;" class="pb-3">
        <b>
            Detail Tes.
        </b>
    </h3>
    <form method="post" action="/">
        <table class="table">
            <tr>
                <td>Nama Peserta : </td>
                <td>
                    <input disabled style="background-color: white; border: none;" type="text" name="name" class="form-control" id="name" placeholder="Input Name" value="{{$username}}">
                </td>
            </tr>
            <tr>
                <td width="15%">Nama Tes : </td>
                <td>
                    <?php $test = $tests[0] ?>
                    <input disabled style="background-color: white; border: none;" type="text" name="name" class="form-control" id="name" placeholder="Input Name" value="{{$test->title}}">
                </td>
            </tr>
            <tr>
                <td>Tanggal :</td>
                <td>
                    <input disabled style="background-color: white; border: none;" type="text" name="name" class="form-control" id="name" placeholder="Input Name" value="{{$test->date}}">
                </td>
            </tr>
            <tr>
                <td>Waktu Mulai :</td>
                <td>
                    <input disabled style="background-color: white; border: none;" type="text" name="name" class="form-control" id="name" placeholder="Input Name" value="{{$test->start_time}}">
                </td>
            </tr>
            <tr>
                <td>Waktu Selesai :</td>
                <td>
                    <input disabled style="background-color: white; border: none;" type="text" name="name" class="form-control" id="name" placeholder="Input Name" value="{{$test->end_time}}">
                </td>
            </tr>
        </table>

        <div class="mb-2 mt-2">
            @if(Auth::check())
                <a href="<?= url("cbt/test/" . $test->code); ?>">
            @else
                <a href="<?= url("demo/cbt/test/" . $test->code); ?>">
            @endif
                <button type="button" name="submit" class="btn btn-block text-light mt-4 ps-5 pe-5" style="background-color: #3E6D81; float: right;">Mulai Tes</button>
            </a>
        </div>
    </form>
</div>
@endsection