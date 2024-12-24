@extends('layouts.logged-navbar')

@section('content')

<div class="container px-5 pt-5 mt-4">
    <h2 class="text-color-primary text-center">
        <b>
            Hasil Ujian
        </b>
    </h2>
    <div class="row px-5 pt-5">
        <a href="{{ url()->previous() }}">
            <div class="button btn hover-btn" style="border: 1px solid #3E6D81;">
                kembali
            </div>
        </a>
        <div class="col">
            <div class="card">
                <div class="card-body p-4">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th style="color: #CA6035;"> No </th>
                                <th style="color: #CA6035;"> time </th>
                                <th style="color: #CA6035;"> Name </th>
                                <th style="color: #CA6035;"> Score </th>
                                <th style="color: #CA6035;"> Time Spent </th>
                                <th style="color: #CA6035;"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testResults as $index => $result) <!-- Tambahkan variabel index -->
                                <tr>
                                    <td>{{ $index + 1 }}</td> <!-- Tampilkan nomor urut -->
                                    <td>{{ $result->created_at }}</td>
                                    <td>{{ $result->name }}</td>
                                    <td>{{ $result->score }}</td>
                                    <td>{{ $result->time_spent }}</td>
                                    <td>
                                        <a href="/cbt/detail-score/{{$result->id}}" class="ms-2 btn bg-color-primary text-white">Lihat Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
