@extends('layouts.logged-navbar')

@section('content')
<div class="container-fluid">
    <div class="row p-4 pb-0 pt-3 text-center">
        <h3 class="mt-5 mb-5 text-bold text-color-primary">
            <b>
                Pilih Durasi Paket Premium
            </b>
        </h3>
    </div>

    <div class="container mb-5">
        <div class="row text-sm">
            {{-- <div class="col-lg-3 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="fw-bold" style="color: #646464">
                            FREE USER
                        </h4>
                        <h4 class="fw-bold mb-4 text-color-primary">
                            0k
                        </h4>
                        <p>
                            <iconify-icon inline icon="akar-icons:check" style="color: green; font-size: 20px;"></iconify-icon> Generate Question (5 max)
                        </p>
                        <p>
                            <iconify-icon inline icon="akar-icons:check" style="color: green; font-size: 20px;"></iconify-icon> Join Computer Based Test Simulation
                        </p>
                        <p>
                            <iconify-icon inline icon="akar-icons:cross" style="color: red;"></iconify-icon> Create Computer Based Test Simulation
                        </p>
                        <p>
                            <iconify-icon inline icon="akar-icons:cross" style="color: red;"></iconify-icon> Add question from Question Collection to CBT
                        </p>
                        <button class="btn mt-3 w-100 text-color-primary fw-bold">
                            It`s Free
                        </button>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-3 col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="fw-bold mt-4" style="color: #646464">
                            1 BULAN
                        </h5>
                        <h1 class="fw-bold my-3 text-color-primary">
                            Rp50.000
                        </h1>
                        <p class="text-secondary mt-4">IDR Rp50.000/bulan</p>
                        <form action="{{ url('/upgrade-account/plan-option') }}" method="post">
                            @csrf
                            <input type="hidden" name="plan" value="1-month">
                            <button type="submit" class="btn mt-3 w-100 bg-color-primary text-white fw-bold">
                                Upgrade Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="card">
                    <div class="card card-promo py-2 rounded" style="margin-bottom: 0; box-shadow: none; border:none;">
                        <h6><b>Hemat Rp30.000!</b></h6>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="fw-bold mt-2" style="color: #646464">
                            3 BULAN
                        </h5>
                        <h1 class="fw-bold my-3 text-color-primary">
                            Rp120.000
                        </h1>
                        <p class="text-secondary">IDR Rp40.000/bulan</p>
                        <form action="{{ url('/upgrade-account/plan-option') }}" method="post">
                            @csrf
                            <input type="hidden" name="plan" value="3-month">
                            <button type="submit" class="btn mt-3 w-100 bg-color-primary text-white fw-bold">
                                Upgrade Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="card">
                    <div class="card card-promo py-2 rounded" style="margin-bottom: 0; box-shadow: none; border:none;">
                        <h6><b>Hemat Rp120.000!</b></h6>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="fw-bold mt-2" style="color: #646464">
                            6 BULAN
                        </h5>
                        <h1 class="fw-bold my-3 text-color-primary">
                            Rp180.000
                        </h1>
                        <p class="text-secondary">IDR Rp30.000/bulan</p>
                        <form action="{{ url('/upgrade-account/plan-option') }}" method="post">
                            @csrf
                            <input type="hidden" name="plan" value="6-month">
                            <button type="submit" class="btn mt-3 w-100 bg-color-primary text-white fw-bold">
                                Upgrade Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="card">
                    <div class="card card-promo py-2 rounded" style="margin-bottom: 0; box-shadow: none; border:none;">
                        <h6><b>Hemat Rp360.000!</b></h6>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="fw-bold mt-2" style="color: #646464">
                            12 BULAN
                        </h5>
                        <h1 class="fw-bold my-3 text-color-primary">
                            Rp240.000
                        </h1>
                        <p class="text-secondary">IDR Rp20.000/bulan</p>
                        <form action="{{ url('/upgrade-account/plan-option') }}" method="post">
                            @csrf
                            <input type="hidden" name="plan" value="12-month">
                            <button type="submit" class="btn mt-3 w-100 bg-color-primary text-white fw-bold">
                                Upgrade Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-3 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="fw-bold" style="color: #646464">
                            YEARLY PREMIUM
                        </h4>
                        <h4 class="fw-bold mb-4 text-color-primary">
                            599k
                        </h4>
                        <p>
                            <iconify-icon inline icon="akar-icons:check" style="color: green; font-size: 20px;"></iconify-icon> Unlimited Generate Question
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
                        <a href="upgrade-account/account-information">
                            <button class="btn mt-3 w-100 bg-color-primary text-white fw-bold">
                                Upgrade Sekarang
                            </button>
                        </a>
                    </div>
                </div>
            </div> --}}

            <div class="col-12 my-5">
                <h3 class="text-bold text-color-primary text-center">
                    <b>Mengapa Harus Upgrade Ke Premium?</b>
                </h3>
            </div>

            <div class="col-lg-6 col-sm-12">
                <div class="card mb-3" style="max-width: 540px; box-shadow:none; border:none;">
                    <div class="row g-0">
                      <div class="col-md-4 d-flex justify-content-center">
                        <img src="/assets/images/premiumContent/generate.svg" class="img-fluid rounded-start" alt="">
                      </div>
                      <div class="col-md-8 d-flex align-items-center ">
                        <div class="card-body d-sm-text-center">
                          <h5 class="card-title"><b>Unlimited Generate Question</b></h5>
                          <p class="card-text">Dengan upgrade ke premium, kamu bebas melakukan generate soal tanpa batas!</p>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="card mb-3" style="max-width: 540px; box-shadow:none; border:none;">
                    <div class="row g-0">
                      <div class="col-md-4 d-flex justify-content-center">
                        <img src="/assets/images/premiumContent/savedQuestion.svg" class="img-fluid rounded-start" alt="">
                      </div>
                      <div class="col-md-8 d-flex align-items-center ">
                        <div class="card-body">
                          <h5 class="card-title"><b>Unlimited Save Question</b></h5>
                          <p class="card-text">Upgrade ke premium untuk menyimpan soal hasil generate tanpa batas!</p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="card mb-3" style="max-width: 540px; box-shadow:none; border:none;">
                    <div class="row g-0">
                      <div class="col-md-4 d-flex justify-content-center">
                        <img src="/assets/images/premiumContent/CBT.svg" class="img-fluid rounded-start" alt="">
                      </div>
                      <div class="col-md-8 d-flex align-items-center ">
                        <div class="card-body">
                          <h5 class="card-title"><b>Create Computer Based Test</b></h5>
                          <p class="card-text">Dapatkan akses untuk membuat Computer Based Test dengan upgrade ke premium!</p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="card mb-3" style="max-width: 540px; box-shadow:none; border:none;">
                    <div class="row g-0">
                      <div class="col-md-4 d-flex justify-content-center">
                        <img src="/assets/images/premiumContent/collectionQuestion.svg" class="img-fluid rounded-start" alt="">
                      </div>
                      <div class="col-md-8 d-flex align-items-center ">
                        <div class="card-body">
                          <h5 class="card-title"><b>Get Questions from Expert</b></h5>
                          <p class="card-text">Upgrade ke premium untuk mendapatkan koleksi soal dari para ahli untuk CBT-mu!</p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
