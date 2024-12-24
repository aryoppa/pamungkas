@extends('layouts.logged-navbar')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<div class="container p-2 mt-2">
    <div class="pt-4 pb-2">
        <a href="{{ redirect()->getUrlGenerator()->previous() }}" class="text-color-secondary">
            <h5><i class="bi bi-arrow-left-square"></i> kembali</h5>
        </a>
    </div>
    <div class="row">
        <div class="col-lg-9 col-sm-12">
            <h3 style="color: #3E6D81;">
                <b>
                    Detail Test
                </b>
            </h3>
            <p>
                Berikut adalah detail dari tes yang kamu buat.
            </p>
        </div>
        <div class="col-lg-3 col-sm-12">
            <div>
                @if(Auth::check())
                <a href="{{ url('cbt/select-question', $test->code) }}">
                    @else
                    <a href="{{ url('demo/cbt/select-question', $test->code) }}">
                        @endif
                        <button type="button" name="submit" id="add" class="btn btn-block text-light mt-4 float-end bg-color-primary">
                            <span style="display: inline-block; vertical-align: middle;">
                                <iconify-icon icon="uil:plus"></iconify-icon>
                            </span>
                            Tambah Soal
                        </button>
                    </a>
            </div>
            <div>
                <button class="btn mt-4 me-1 btn-warning float-end text-white" id="hide" onclick="disableButton()">
                    <span style="display: inline-block; vertical-align: middle;">
                        <iconify-icon icon="bxs:edit" style="font-size: 16px;"></iconify-icon>
                    </span>
                    Edit
                </button>
            </div>
        </div>
    </div>

    <hr>
    <form method="post" action="/cbt/cbt-dashboard/update-test/{{ $test->id }}">
        @csrf
        <table class="table table-borderless">
            <tr>
                <td width="15%">Nama Tes</td>
                <td>
                    <input hidden type="text" name="id" id="id" class="form-control" value="{{$test->id}}">
                    <input disabled style="background-color: white; border: none;" type="text" name="title" id="title" class="form-control" placeholder="Input Name" value="{{$test->title}}">
                </td>
            </tr>
            <tr>
                <td width="15%">Deskripsi Tes</td>
                <td>
                    <input disabled style="background-color: white; border: none;" type="text" name="description" id="description" class="form-control" placeholder="Input Name" value="{{$test->description}}">
                </td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>
                    <input disabled style="background-color: white; border: none;" type="date" name="date" id="date" class="form-control" placeholder="Input Name" value="{{$test->date}}">
                </td>
            </tr>
            <tr>
                <td>Waktu Mulai</td>
                <td>
                    <input disabled style="background-color: white; border: none;" type="time" name="start" id="start" class="form-control" placeholder="Input Name" value="{{$test->start_time}}">
                </td>
            </tr>
            <tr>
                <td>Waktu Selesai</td>
                <td>
                    <input disabled style="background-color: white; border: none;" type="time" name="end" id="end" class="form-control" placeholder="Input Name" value="{{$test->end_time}}">
                </td>
            </tr>
            <tr>
                <td>Kode</td>
                <td>
                    <input disabled style="background-color: white; border: none;" type="text" name="code" id="code" class="form-control" placeholder="Input Name" value="{{$test->code}}">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input disabled style="background-color: white; border: none;" type="text" name="password" id="password" class="form-control" placeholder="Input Name" value="{{$test->password}}">
                </td>
            </tr>
            <tr>
                <td>Tautan Ujian </td>
                <td style="padding-left: 20px;">
                    @php
                    $testLink = Auth::check() ? url('/cbt/test') . '/' . $test->code : url('/demo/cbt/test') . '/' . $test->code;
                    @endphp
                    <a class="text-primary" href="{{ $testLink }}" id="testLink">{{ $testLink }}</a>
                </td>
            </tr>
        </table>

        <div class="mb-4">
            <div style="display: block;" id="no_edit">
                @if (Auth::check())
                <a href="<?= url('cbt/list-result', $test->code); ?>">
                    @else
                    <a href="<?= url('demo/cbt/list-result', $test->code); ?>">
                        @endif
                        <button type="button" class="btn text-light mt-4 ps-5 pe-5 bg-color-secondary">Hasil Tes</button>
                    </a>
                    <a href="{{url('cbt/preview-test').'/'.$test->code}}">
                        <button type="button" class="btn text-light mt-4 ps-5 pe-5 bg-color-primary">Preview Tes</button>
                    </a>
            </div>
            <div id="edit" style="display: none;">
                <button type="button" class="btn text-light mt-4 ps-5 pe-5 bg-color-secondary" onclick="cancelButton()">
                    Batal
                </button>
                <button type="submit" name="submit" class="btn text-light mt-4 ps-5 pe-5 bg-color-primary">
                    Simpan
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    function disableButton() {
        var title = document.getElementById('title');
        var date = document.getElementById('date');
        var start = document.getElementById('start');
        var end = document.getElementById('end');
        var code = document.getElementById('code');
        var password = document.getElementById('password');
        var hide = document.getElementById('hide');
        var add = document.getElementById('add');
        var description = document.getElementById('description');
        title.disabled = false;
        date.disabled = false;
        start.disabled = false;
        end.disabled = false;
        password.disabled = false;
        description.disabled = false;
        hide.disabled = true;
        add.disabled = true;

        var no_edit = document.getElementById('no_edit');
        var edit = document.getElementById('edit');
        if (no_edit.style.display === "none") {
            no_edit.style.display = "block";
            edit.style.display = "none";
            hide_table.style.display = "none";
        } else {
            no_edit.style.display = "none";
            edit.style.display = "block";
            title.style.border = "1px solid lightgrey";
            date.style.border = "1px solid lightgrey";
            start.style.border = "1px solid lightgrey";
            end.style.border = "1px solid lightgrey";
            password.style.border = "1px solid lightgrey";
            description.style.border = "1px solid lightgrey";
        }
    }

    function cancelButton() {
        var title = document.getElementById('title');
        var date = document.getElementById('date');
        var start = document.getElementById('start');
        var end = document.getElementById('end');
        var code = document.getElementById('code');
        var password = document.getElementById('password');
        var hide = document.getElementById('hide');
        var add = document.getElementById('add');
        var description = document.getElementById('description');
        title.disabled = true;
        date.disabled = true;
        start.disabled = true;
        end.disabled = true;
        password.disabled = true;
        description.disabled = true;
        hide.disabled = false;
        add.disabled = false;

        var no_edit = document.getElementById('no_edit');
        var edit = document.getElementById('edit');
        if (no_edit.style.display === "none") {
            no_edit.style.display = "block";
            edit.style.display = "none";
            title.style.border = "none";
            date.style.border = "none";
            start.style.border = "none";
            end.style.border = "none";
            password.style.border = "none";
            description.style.border = "none";
        } else {
            no_edit.style.display = "block";
            edit.style.display = "none";
            hide_table.style.display = "none";
        }
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var endInput = document.getElementById('end');
        var link = document.getElementById('testLink');
        link.addEventListener('click', function() {
            var currentDate = new Date().toLocaleTimeString('en-US', {
                timeZone: 'Asia/Jakarta',
                hour12: false,
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            var endTime = endInput.value;
            sessionStorage.setItem('startTime', currentDate);
            sessionStorage.setItem('endTime', endTime);
        });
    });
</script>


@endsection