@extends('layouts.logged-navbar')

@section('content')
<div class="container container-payment mt-5 pt-5">
    <a class="bs-example floating-btn" href="/help?code=generate">
        <button type="button" class="my-float" data-toggle="popover" title="Apa yang harus saya lakukan?"><b>?</b></button>
    </a>
    <div class="row row-container-payment">
        <div class="d-flex justify-content-center">
            <div class="card card-payment p-4">
                <div class="card-body mx-2">
                    <div>
                        <div class="text-center mb-5">
                            <h5><b>Top Up Pengguna</b></h5>
                        </div>
                        <form action="/checkout" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <h5>Mau top-up berapa?</h5>
                                <input hidden name="user_id" value="{{ Auth::user()->id }}">
                                <div class="input-group my-3">
                                    <span class="input-group-text">email</span>
                                    <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly>
                                </div>
                                <div class="input-group my-3">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" class="form-control" name="balance" min="10000" required>
                                </div>
                                <div class="form-text"><small>*Minimal top-up Rp10.000</small></div>
                                <input type="text" hidden name="payment_request" value="request">
                                <input hidden name="payment_receipt" value="-">
                            </div>
                            <div class=" mt-4">
                                <button type="submit" class="btn btn-full-size bg-color-primary text-white fw-bold px-3 w-100">Checkout</button>
                            </div>
                        </form>
                        {{-- <form action="/upgrade-account/store-payment" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <h5>Mau top-up berapa?</h5>
                                <input hidden name="user_id" value="{{ Auth::user()->id }}">
                                <div class="input-group my-3">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" class="form-control" name="balance" min="10000" required>
                                </div>
                                <div class="form-text">*Minimal top-up Rp10.000</div>
                            </div>
                            <div class=" mt-4">
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
                                    <input class="form-control" type="file" name="payment_receipt" id="formFile" required>
                                </div>

                                <button type="submit" class="btn btn-full-size bg-color-primary text-white fw-bold float-end px-3">Top Up</button>
                            </div>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
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
