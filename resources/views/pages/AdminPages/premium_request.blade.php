@extends('layouts.admin-navbar')

@section('content')
<?php
// dd($datas);
?>
<div>
    <h1 style="color: #3E6D81;" class="my-3">
        <b>
            Premium Upgrade List
        </b>
    </h1>

    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Requests
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <table class="table mt-2">
                    <thead>
                        <tr>
                            <th style="color: #CA6035;"> No </th>
                            <th style="color: #CA6035;"> Time </th>
                            <th style="color: #CA6035;"> Name </th>
                            <th style="color: #CA6035;"> Email </th>
                            <th style="color: #CA6035;"> Status upgrade </th>
                            <th style="color: #CA6035;"> duration </th>
                            <th style="color: #CA6035;"> receipt </th>
                            <th style="color: #CA6035;"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        @if ($data->upgrade_request == 'request')
                            <tr>
                                <td>
                                    -
                                </td>
                                <td>
                                    {{ $data->created_at }}
                                </td>
                                <td>
                                    {{ $data->name }}
                                </td>
                                <td>
                                    {{ $data->email }}
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-warning p-2 px-4">
                                        {{ $data->upgrade_request }}
                                    </span>
                                </td>
                                <td>
                                    {{ $data->duration }}
                                </td>
                                <td>
                                    @if ($data->upgrade_receipt)
                                    <a href="{{ asset('storage/' . $data->upgrade_receipt) }}" target="_blank">Lihat</a>
                                    @else
                                    No Receipt
                                    @endif
                                </td>
                                <td>
                                    {{-- accept --}}
                                    <button type="button" class="btn text-white" style="background-color: #3E6D81;" data-bs-toggle="modal" data-bs-target="#updateModal-{{ $data->id }}">
                                        <iconify-icon inline icon="ic:round-check"></iconify-icon> Accept
                                    </button>
                                    <div class="modal fade" id="updateModal-{{ $data->id }}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateModalLabel">{{ $data->email }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body pt-3">
                                                    Are you sure want to accept request upgrade this user?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="/accept-request-premium" method="post">
                                                        @csrf
                                                        <input type="hidden" class="form-control" name="prid" value="{{$data->id}}">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-success">Accept</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- decline --}}
                                    <button type="button" class="btn text-white" style="background-color: #CA6035;" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $data->id }}">
                                        <iconify-icon inline icon="radix-icons:cross-2"></iconify-icon> Decline
                                    </button>
                                    <div class="modal fade" id="deleteModal-{{ $data->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">{{ $data->email }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body pt-3 pb-3">
                                                    Are you sure want to decline request upgrade this user?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="decline-request/" method="post">
                                                        @csrf
                                                        <input type="hidden" class="form-control" name="prid" value="{{$data->id}}">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Decline</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Success
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">

                <table class="table mt-2">
                    <thead>
                        <tr>
                            <th style="color: #CA6035;"> No </th>
                            <th style="color: #CA6035;"> Time </th>
                            <th style="color: #CA6035;"> Name </th>
                            <th style="color: #CA6035;"> Email </th>
                            <th style="color: #CA6035;"> Status upgrade </th>
                            <th style="color: #CA6035;"> durasi </th>
                            <th style="color: #CA6035;"> receipt </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        @if ($data->upgrade_request == 'success')
                            <tr>
                                <td>
                                    -
                                </td>
                                <td>
                                    {{ $data->created_at }}
                                </td>
                                <td>
                                    {{ $data->name }}
                                </td>
                                <td>
                                    {{ $data->email }}
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-success p-2 px-4">
                                        {{ $data->upgrade_request }}
                                    </span>
                                </td>
                                <td>
                                    {{ $data->duration }}
                                </td>
                                <td>
                                    @if ($data->upgrade_receipt)
                                    <a href="{{ asset('storage/' . $data->upgrade_receipt) }}" target="_blank">Lihat</a>
                                    @else
                                    No Receipt
                                    @endif
                                </td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Decline
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">

                <table class="table mt-2">
                    <thead>
                        <tr>
                            <th style="color: #CA6035;"> No </th>
                            <th style="color: #CA6035;"> Time </th>
                            <th style="color: #CA6035;"> Name </th>
                            <th style="color: #CA6035;"> Email </th>
                            <th style="color: #CA6035;"> Status upgrade </th>
                            <th style="color: #CA6035;"> durasi </th>
                            <th style="color: #CA6035;"> receipt </th>
                            <th style="color: #CA6035;"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        @if ($data->upgrade_request == 'failed')
                            <tr>
                                <td>
                                    -
                                </td>
                                <td>
                                    {{ $data->created_at }}
                                </td>
                                <td>
                                    {{ $data->name }}
                                </td>
                                <td>
                                    {{ $data->email }}
                                </td>
                                <td>
                                    @if ($data->upgrade_request == 'request')
                                    <span class="badge badge-pill badge-warning p-2 px-4">
                                        {{ $data->upgrade_request }}
                                    </span>
                                    @elseif ($data->upgrade_request == 'failed')
                                    <span class="badge badge-pill badge-danger p-2 px-4">
                                        {{ $data->upgrade_request }}
                                    </span>
                                    @else
                                    <span class="badge badge-pill badge-success p-2 px-4">
                                        {{ $data->upgrade_request }}
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    @if ($data->upgrade_receipt)
                                    <a href="{{ asset('storage/' . $data->upgrade_receipt) }}" target="_blank">Lihat</a>
                                    @else
                                    No Receipt
                                    @endif
                                </td>
                                <td>
                                    {{-- accept --}}
                                    <button type="button" class="btn text-white" style="background-color: #3E6D81;" data-bs-toggle="modal" data-bs-target="#updateModal-{{ $data->id }}">
                                        <iconify-icon inline icon="ic:round-check"></iconify-icon> Accept
                                    </button>
                                    <div class="modal fade" id="updateModal-{{ $data->id }}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateModalLabel">{{ $data->email }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body pt-3">
                                                    Are you sure want to accept request upgrade this user?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="/accept-request" method="post">
                                                        @csrf
                                                        <input type="hidden" class="form-control" name="prid" value="{{$data->id}}">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-success">Accept</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- decline --}}
                                    <button type="button" class="btn text-white" style="background-color: #CA6035;" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $data->id }}">
                                        <iconify-icon inline icon="radix-icons:cross-2"></iconify-icon> Decline
                                    </button>
                                    <div class="modal fade" id="deleteModal-{{ $data->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">{{ $data->email }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body pt-3 pb-3">
                                                    Are you sure want to decline request upgrade this user?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="decline-request/" method="post">
                                                        @csrf
                                                        <input type="hidden" class="form-control" name="prid" value="{{$data->id}}">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Decline</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
</div>

<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
</script>
@endsection
