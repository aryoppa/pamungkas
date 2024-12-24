@extends('layouts.logged-navbar')

@section('content')
<div class="container mt-5">
    <div class="bs-example floating-btn">
        <button type="button" class="my-float" data-toggle="popover" title="Apa yang harus saya lakukan?"><b>?</b></button>
    </div>
    <div class="row py-4 text-center">
        <h4 style="color: #CA6035"><b>Halaman Demo</b></h4>
        <p>Ingin mencoba terlebih dahulu fitur-fitur yang ada? Silahkan pilih jenis demo yang ingin anda coba!</p>
    </div>
    <div class="row text-center mb-5 pb-4">
        <div class="col-lg-4 col-md-4 col-12 mb-4">
            <a href="/demo/generate" style="color: #3E6D81; text-decoration: none;">
                <div class="card h-100 hover-card">
                    <div class="card-body">
                        <img src="/assets/images/generate-icon.png" class="p-4 pb-1" width="50%" alt="">
                        <br>
                        <b class="text-color-secondary">
                            Demo Membuat Soal
                        </b>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-12 mb-4">
            <a href="/demo/question-collection" style="color: #3E6D81; text-decoration: none;">
                <div class="card h-100 hover-card">
                    <div class="card-body">
                        <img src="/assets/images/koleksi-icon.png" class="p-4 pb-1" width="50%" alt="">
                        <br>
                        <b class="text-color-secondary">
                            Demo Koleksi Soal
                        </b>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-12 mb-4">
            <a href="/demo/cbt" style="color: #3E6D81; text-decoration: none;">
                <div class="card h-100 hover-card">
                    <div class="card-body">
                        <img src="/assets/images/cbt-icon.png" class="p-4 pb-1" width="50%" alt="">
                        <br>
                        <b class="text-color-secondary">
                            Demo CBT
                        </b>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="my-5">
        <div class="card">
            <div class="card-body p-5">
                <div class="row reverse">
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
                            <button class="btn mt-2" style="background-color: #3E6D81; color: white;">Upgrade Sekarang</button>
                        </a>
                    </div>
                    <div class="col-lg-5 col-sm-12 d-flex justify-content-center">
                        <img src="{!! url('assets/images/Saly-1.png')!!}" width="60%" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover({
            placement: 'top',
            trigger: 'hover',
            content: 'Pada halaman ini Anda dapat memilih salah satu jenis demo akan dilakukan',
        });
    });
</script>
@endsection