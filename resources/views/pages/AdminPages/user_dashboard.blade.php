@extends('layouts.admin-navbar')

@section('content')
<div>
    <h1 style="color: #3E6D81;">
        <b>
            User Data
        </b>
    </h1>
    <p>
        list of user data information
    </p>

    <table class="table mt-5">
        <thead>
            <tr>
                <th style="color: #CA6035;"> No </th>
                <th style="color: #CA6035;"> Name </th>
                <th style="color: #CA6035;"> Email </th>
                <th style="color: #CA6035;"> Account </th>
                <th style="color: #CA6035;"> Action </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>
                    -
                </td>
                <td>
                    {{ $user->name }}
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    @if ($user->userBalance)
                        @if ($user->userBalance->is_premium == 1)
                            <span class="badge badge-pill badge-success p-2 px-4">Premium</span>
                        @else
                            <span class="badge badge-pill badge-warning p-2 px-4">Basic</span>
                        @endif
                    @else
                        <span class="badge badge-pill badge-warning p-2 px-4">Basic</span>
                    @endif
                </td>
                <td>
                    <button type="button" class="btn text-white" style="background-color: #3E6D81;" data-bs-toggle="modal" data-bs-target="#updateModal-{{ $user->id }}">
                        <iconify-icon inline icon="material-symbols:edit"></iconify-icon>
                    </button>
                    <button type="button" class="btn text-white" style="background-color: #CA6035;" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $user->id }}">
                        <iconify-icon inline icon="ic:baseline-delete-forever"></iconify-icon>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- <div class="my-4">
        {{ $users->links() }}
    </div> -->
</div>
@endsection
