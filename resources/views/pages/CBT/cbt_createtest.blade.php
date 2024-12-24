@extends('layouts.logged-navbar')

@section('content')
<div class="container p-4 pt-5">
    <div style="color: #CA6035;" class="mb-4 text-center">
        <h3>
            <b>
                Buat Tes Baru
            </b>
        </h3>
        <p style="color: black;">
            Disini kamu bisa membuat tes baru! Silahkan isi form dibawah ini.
        </p>
    </div>
    <form method="post" action="{{url('store-create-test')}}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label" style="color: #3E6D81; font-weight: bold;">Judul Tes</label>
            <input required type="text" name="title" class="form-control" id="title" placeholder="Input Title">
        </div>
        <div class="mb-3">
            <label for="tipe" class="form-label" style="color: #3E6D81; font-weight: bold;">Deskripsi Tes</label>
            <input required type="text" name="description" class="form-control" id="tipe" placeholder="Description" maxlength="100">
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="date" class="form-label" style="color: #3E6D81; font-weight: bold;">Tanggal</label>
                    <input required type="date" name="date" class="form-control" id="start">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="mb-3">
                    <label for="start" class="form-label" style="color: #3E6D81; font-weight: bold;">Waktu Mulai</label>
                    <input required type="time" name="start_time" class="form-control" id="start">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="mb-3">
                    <label for="end" class="form-label" style="color: #3E6D81; font-weight: bold;">Waktu Selesai</label>
                    <input required type="time" name="end_time" class="form-control" id="end">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label" style="color: #3E6D81; font-weight: bold;">Password Tes</label>
            <input required type="text" name="password" class="form-control" id="password" placeholder="Password Test">
        </div>

        <div class="mb-5 mt-2 text-center">
            <button type="button" name="" class="btn btn-block text-white btn-danger mt-4 ps-5 pe-5 fw-bold" style=" width: 30%">Batal</button>
            @if(Auth::check())
                <a href="/cbt/cbt-dashboard">
            @else
                <a href="/demo/cbt/cbt-dashboard">
            @endif
            <button type="submit" name="submit" class="btn btn-block text-light mt-4 ps-5 pe-5 fw-bold" style="background-color: #3E6D81; width: 30%">Buat Tes</button>
            </a>
        </div>
    </form>
</div>
@endsection
