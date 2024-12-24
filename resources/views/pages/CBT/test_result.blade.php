@extends('layouts.logged-navbar')

@section('content')

<div class="container">
    <div class="p-5">
        <div class="card p-5">
            <div class="row">
                <div class="col">
                    <h2 class="text-color-primary ps-2">
                        <b>
                            Hasil Ujian
                        </b>
                    </h2>
                    <P class="ps-2">
                        Ini adalah nama ujian yang anda ikuti
                    </P>
                    <table class="mt-5" cellpadding="10">
                        <tr>
                            <td>
                                Nama
                            </td>
                            <td>
                                : {{$data->name}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tanggal
                            </td>
                            <td>
                                : {{ date('Y-m-d') }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Waktu Pengerjaan
                            </td>
                            <td>
                                : {{$data->time_spent}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nilai
                            </td>
                            <td>
                                : {{$data->score}}

                            </td>
                        </tr>
                    </table>
                    <a href="/cbt/detail-score/{{$data->id}}" class="ms-2 btn bg-color-primary text-white mt-4">Lihat Detail</a>
                    <a href="/" class="ms-2 btn bg-color-secondary text-white mt-4">Kembali ke Halaman Utama</a>
                </div>
                <div class="col">
                    <img src="{{ asset('/assets/images/exam.png') }}" class="d-flex justify-content-center align-items-center mx-auto" width="60%" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection