@extends('layouts.admin-navbar')

@section('content')
<div>
    <div class="row">
        <div class="col">
            <h1 style="color: #3E6D81;">
                <b>
                    Learning Collection
                </b>
            </h1>
            <p>
                Koleksi materi pembelajaran
            </p>
        </div>
        <div class="col">
            <button type="submit" class="btn text-white px-3 mt-3" style="float: right; background-color:#3E6D81">+ Add</button>
        </div>
    </div>

    <table class="table mt-5">
        <thead>
            <tr>
                <th style="color: #CA6035;"> No </th>
                <th style="color: #CA6035;"> Time </th>
                <th style="color: #CA6035;"> Title </th>
                <th style="color: #CA6035;"> Description </th>
                <th style="color: #CA6035;"> Content </th>
                <th style="color: #CA6035; text-align: center;"> Action </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($learning as $learn)
            <tr>
                <td>
                    -
                </td>
                <td>
                    {{ $learn->created_at }}
                </td>
                <td>
                    {{ $learn->title }}
                </td>
                <td>
                    {{ $learn->description }}
                </td>
                <td>
                    {{ substr($learn->content, 0, 50) }} ...
                    <!-- {{ $learn->content }} -->
                </td>
                <td style="text-align: center;">
                    <button type="button" class="btn text-white p-2" style="background-color: #3E6D81;" data-bs-toggle="modal" data-bs-target="#updateModal-{{ $learn->id }}">
                        <iconify-icon inline icon="bx:bx-edit"></iconify-icon>
                    </button>
                    <button type="button" class="btn text-white p-2" style="background-color: #CA6035;" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $learn->id }}">
                        <iconify-icon inline icon="bx:bx-trash"></iconify-icon>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection