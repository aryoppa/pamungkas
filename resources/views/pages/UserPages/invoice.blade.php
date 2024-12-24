@extends('layouts.logged-navbar')

@section('content')

<div class="container container-payment mt-5 pt-5">
    <div class="row row-container-payment">
        <div class="d-flex justify-content-center">
            <div class="card card-payment">
                <div class="card-body py-3">
                    <h5 class="text-center m-3"><b>Invoice</b></h5>
                    <table class="my-5 mx-3">
                        <tr>
                            <td>email</td>
                            <td>: {{$order->email}}</td>
                        </tr>
                        <tr>
                            <td>jumlah</td>
                            <td>: {{$order->balance}}</td>
                        </tr>
                        <tr>
                            <td>status</td>
                            <td>: {{$order->payment_request}}</td>
                        </tr>
                    </table>
                    <a href="/home">
                        <button class="btn btn-full-size bg-color-primary text-white fw-bold my-2 w-100">Back Home</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
