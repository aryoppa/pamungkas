@extends('layouts.logged-navbar')

@section('content')
<div class="container mt-4">
    <div class="row p-5 pb-5">
        <h3 class="text-center text-color-primary"><b>Checkout</b></h3>
    </div>
    {{-- <div class="Timeline pb-4 mb-5 flex">
        <div class="event1">
            <svg height="30" width="120">
                <circle cx="60" cy="12" r="7" fill="#CA6035" />
            </svg>
            <div class="timeline-text">Account information</div>
        </div>
        <svg height="5" width="200">
            <line x1="0" y1="0" x2="200" y2="0" style="stroke:#CA6035; stroke-width:15" />
        </svg>

        <div class="event1">
            <svg height="30" width="120">
                <circle cx="60" cy="12" r="7" fill="#CA6035" />
            </svg>
            <div class="timeline-text">Plan Option</div>
        </div>
        <svg height="5" width="200">
            <line x1="0" y1="0" x2="200" y2="0" style="stroke:#D9D9D9; stroke-width:15" />
        </svg>

        <div class="event1">
            <svg height="30" width="120">
                <circle cx="60" cy="12" r="7" fill="#D9D9D9" />
            </svg>
            <div class="timeline-text">Checkout</div>
        </div>
        <svg height="5" width="200">
            <line x1="0" y1="0" x2="200" y2="0" style="stroke:#D9D9D9; stroke-width:15" />
        </svg>

        <div class="event1">
            <svg height="30" width="120">
                <circle cx="60" cy="12" r="7" fill="#D9D9D9" />
            </svg>
            <div class="timeline-text">Finish</div>
        </div>
    </div> --}}
    <div class="row mb-5 pb-5">
        <div class="col-lg-6 col-sm-12">
            <div class="card m-3 mt-0 p-3">
                <div class="card-body">
                    <h5 class="fw-bold text-center text-color-primary ">
                        Upgrade Premium {{$selectedPlan}}
                    </h5>
                    <hr>
                    <p>
                        <iconify-icon inline icon="akar-icons:check" style="color: green; font-size: 20px;"></iconify-icon> Generate Question (5 max)
                    </p>
                    <p>
                        <iconify-icon inline icon="akar-icons:check" style="color: green; font-size: 20px;"></iconify-icon> Join Computer Based Test Simulation
                    </p>
                    <p>
                        <iconify-icon inline icon="akar-icons:check" style="color: green; font-size: 20px;"></iconify-icon> Create Computer Based Test Simulation
                    </p>
                    <p>
                        <iconify-icon inline icon="akar-icons:check" style="color: green; font-size: 20px;"></iconify-icon> Add question from Question Collection to CBT
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <form action="/upgrade-account/store-upgrade" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row px-1">
                <input hidden name="user_id" value="{{ Auth::user()->id }}">
                <input type="text" hidden name="duration" value="{{$selectedPlan}}">
                <div class="my-2">
                    {{-- <label for="basic-url" class="form-label">Your vanity URL</label> --}}
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon3"><b>Harga</b></span>
                        <input type="text" disabled class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4" value="{{$prize}}">
                    </div>
                </div>

                <div class="my-2">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon3"><b>Start Plan</b></span>
                        <input type="date" disabled class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4" value="{{$date = date('Y-m-d')}}">
                    </div>
                </div>
                <div class="my-2">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon3"><b>End Plan</b></span>
                        <input type="date" readonly class="form-control" name="expired_at" value="{{$endDate}}">
                    </div>
                    {{-- <label class="form-label fw-bold text-color-primary">End Plan</label>
                    <input type="date" class="form-control" disabled name="end" value="{{ $endDate }}"> --}}
                </div>
                <div class="my-2">
                    <h5>Pilih Metode Pembayaran</h5>
                    <select class="form-select my-3" name="payment_method" aria-label="Default select example" onchange="showRekeningNumber()" required>
                        <option selected disabled>Pilih Opsi Pembayaran</option>
                        <option value="BNI">BNI (Bank Negara Indonesia)</option>
                        <option value="BCA">BCA (Bank Central Asia)</option>
                        <option value="QRIS">QRIS</option>
                    </select>
                    <div id="rekeningNumber"></div>
                    <div class="my-4">
                        <label for="formFile" class="form-label">Upload Bukti Pembayaran</label>
                        <input class="form-control" type="file" name="upgrade_receipt" id="formFile" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-full-size bg-color-primary text-white fw-bold float-end px-3">Upgrade</button>

            </div>
            </form>
        </div>
    </div>
    <nav class="nav bg-light fixed-bottom p-5 pt-4 pb-4 bg-white" style="box-shadow: 0px 0px 10px 3px rgb(0,0,0,0.10);">
        <div class="container ms-auto">
            <div class="row">
                <div class="col-6">
                    <a href="/upgrade-account/account-information">
                        <button class="btn bg-color-secondary ps-5 pe-5 text-white">Back</button>
                    </a>
                </div>
                <div class="col-6">
                    <a href="/upgrade-account/payment">
                        <button class="btn bg-color-secondary text-white ps-5 pe-5" style="float: right;">Next</button>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>

<script>
    function showRekeningNumber() {
        const selectElement = document.querySelector('.form-select');
        const selectedValue = selectElement.value;
        const rekeningNumberDiv = document.getElementById('rekeningNumber');

        switch (selectedValue) {
            case 'BNI':
                rekeningNumberDiv.textContent = 'Nomor Rekening BNI: 1234567890';
                break;
            case 'BCA':
                rekeningNumberDiv.textContent = 'Nomor Rekening BCA: 9876543210';
                break;
            case 'QRIS':
                rekeningNumberDiv.textContent = 'Pembayaran melalui QRIS';
                break;
            default:
                rekeningNumberDiv.textContent = '';
                break;
        }
    }
</script>

@endsection
