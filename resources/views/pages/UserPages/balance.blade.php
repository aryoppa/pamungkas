@extends('layouts.logged-navbar')

@section('content')

<div class="container pt-5">
    <a class="bs-example floating-btn" href="/help?code=generate">
        <button type="button" class="my-float" data-toggle="popover" title="Apa yang harus saya lakukan?"><b>?</b></button>
    </a>
    <div class="row">
        <div class="col-lg-4 col-sm-12">
            <div class="card p-2 text-white" style="background-color: #3E6D81; height: 150px;">
                {{-- <iconify-icon inline icon="material-symbols:edit-square-outline-rounded" style="color: white; font-size: 1.5rem;" class="ms-auto"></iconify-icon> --}}
                <div class="row">
                    <div class="col-5 d-flex justify-content-center" style="border-right: 0.5px solid rgb(145, 145, 145)">
                        <iconify-icon icon="healthicons:ui-user-profile" style="color: white; font-size: 7rem;" class="mx-auto pt-3"></iconify-icon>
                    </div>
                    <div class="col">
                        <h4 class="pt-3">
                            <b>{{Auth::user()->name}}</b>
                        </h4>
                        <p>
                            {{Auth::user()->email}}
                        </p>
                        <h5>
                            @if (Auth::user()->userBalance->is_premium == 0)
                            <span class="badge bg-secondary">Basic</span>
                            @else
                            <span class="badge badge-pill px-3" style="background-color: #F79327">Premium</span>
                            {{-- {{$userBalance['expired_at']}} --}}
                            @endif
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-3 col-sm-12">
            <div class="card" style="height: 150px;">
                <div class="card-body">
                    <p><b> riwayat top-up</b></p>
                </div>
            </div>
        </div> --}}
        <div class="col-lg-8 col-sm-12">
            <div class="card px-3 pt-3" style="height: 150px;">
                <div class="card-body">
                    <h5><iconify-icon icon="ion:wallet-outline"></iconify-icon> Saldo</h5>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2>Rp{{ number_format(Auth::user()->userBalance->balance, 0, ',', '.') }}</h2>
                        <a href="<?= url('top-up') ?>">
                            <button class="btn bg-color-primary text-white fw-bold px-3">Top-up</button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        {{-- upgrade container --}}
        <div class="container">
            <div class="card p-3">
                <div class="card-body">
                    <div class="row reverse">
                        @if (Auth::user()->userBalance->is_premium == 1 )
                            <div class="col-lg-7 col-sm-12">
                                <h2 style="color: #CA6035;" class="pt-4 heading-responsive">
                                    <b>
                                        Selamat, akunmu premium hingga {{date('d M Y', strtotime(Auth::user()->userBalance->expired_at))}}
                                    </b>
                                </h2>
                                <p class="paragraph-responsive">
                                    Manfaatkan semua fitur tanpa batas!
                                </p>
                                <a href="<?= url('upgrade-account') ?>" class="centered-button pt-2">
                                    <button class="btn bg-color-primary text-white fw-bold px-3 mt-2">Perpanjang</button>
                                </a>
                            </div>
                        @else
                            <div class="col-lg-7 col-sm-12">
                                <h2 style="color: #CA6035;" class="pt-4 heading-responsive">
                                    <b>
                                        Upgrade akun-mu sekarang!
                                    </b>
                                </h2>
                                <p class="paragraph-responsive">
                                    Dapatkan akses ke semua fitur tanpa batas yang ada di Smart EngTest
                                    dengan mengupgrade akunmu ke premium!
                                </p>
                                <a href="<?= url('upgrade-account') ?>" class="centered-button pt-2">
                                    <button class="btn bg-color-primary text-white fw-bold px-3 mt-2">Upgrade Sekarang</button>
                                </a>
                            </div>
                        @endif
                        <div class="col-lg-5 col-sm-12 d-flex justify-content-center">
                            <img src="assets/images/Saly-1.png" width="60%" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <h2 style="color: #CA6035;" class="py-3 heading-responsive">
                Akses Cepat
            </h2>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <a href="{{url('generate')}}">
                        <div class="card bg-white p-4" style="height: 300px;">
                            <img src="/assets/images/premiumContent/savedQuestion.svg" alt="">
                            <b class="text-color-secondary py-3 text-center">
                                Generate Soal
                            </b>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6">
                    <a href="{{url('/question-collection')}}">
                        <div class="card bg-white p-4" style="height: 300px;">
                            <img src="/assets/images/premiumContent/vocabulary.png" alt="">
                            <b class="text-color-secondary py-2 text-center">
                                Koleksi Saya
                            </b>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6">
                    <a href="{{url('cbt')}}">
                        <div class="card bg-white" style="height: 300px;">
                            <img src="/assets/images/premiumContent/CBT.svg" class="mt-4" alt="">
                            <b class="text-color-secondary pt-4 text-center">
                                Computer Based Test
                            </b>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6">
                    <a href="/learn">
                        <div class="card bg-white p-4" style="height: 300px;">
                            <img src="/assets/images/premiumContent/collectionQuestion.svg" alt="">
                            <b class="text-color-secondary py-3 text-center">
                                Lihat Rekomendasi
                            </b>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
