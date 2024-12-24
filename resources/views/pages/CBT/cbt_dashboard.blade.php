@extends('layouts.logged-navbar')

@section('content')
<a class="bs-example floating-btn" href="/help?code=create-cbt">
    <button type="button" class="my-float" data-toggle="popover" title="Apa yang harus saya lakukan?"><b>?</b></button>
</a>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div class="container mt-2">

    <div class="row pt-4 px-5">
        <div class="col">
            <div class="pt-4">
                <a href="{{ redirect()->getUrlGenerator()->previous() }}" class="text-color-secondary">
                    <h5><i class="bi bi-arrow-left-square"></i> kembali</h5>
                </a>
            </div>
            <div class="col_cbt_dashboard col-gx-4">
                <h1 style="color: #CA6035;" class="mt-2">
                    <b>
                        Computer Based Test
                    </b>
                </h1>
                <p>Anda memiliki akses penuh untuk mengelola seluruh koleksi ujian yang telah Anda buat di sini. Dengan mudah, Anda dapat melihat detail tes yang telah dibuat dan melakukan perubahan jika diperlukan. Bahkan, Anda dapat menambahkan soal tambahan ke dalam ujian tertentu sesuai kebutuhan. Jika Anda ingin membuat ujian baru, cukup kunjungi halaman "Buat Tes" untuk memulainya. Dan ketika semuanya siap, Anda bahkan bisa mencetak ujian tersebut secara langsung. Dengan fitur-fitur yang disediakan, pengelolaan ujian menjadi lebih praktis dan terstruktur, memastikan bahwa setiap aspek ujian Anda dapat diatur dengan efisien.</p>
                @if(Auth::check())
                <a href="/cbt/create-test">
                    @else
                    <a href="/demo/cbt/create-test">
                        @endif
                        <button type="button" name="submit" class="btn bg-color-primary text-white fw-bold px-4"><i class="bi bi-plus-lg px-2"></i>Buat tes</button>
                    </a>
            </div>
        </div>
        <div class="col-3 d-flex justify-content-end items-center align-items-center">
            <img src="{{ asset('/assets/images/test_img.png') }}" alt="Home" class="" width="60%">
        </div>
    </div>
    <div class="row mt-5 px-5">
        @if(count($tests) > 0)
        @foreach ($tests as $test)
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card p-2" style="min-height: 200px;">
                <div class="px-3 pt-2">
                    <div class="row">
                        <div class="col pt-1">
                            <b>
                                {{$test->title}}
                            </b>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-sm bg-color-secondary float-end text-white" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $test->id }}">
                                <iconify-icon icon="ep:delete-filled" style="font-size: 13px"></iconify-icon>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal-{{ $test->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">{{ $test->title }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body pt-3 pb-3">
                                            Apakah anda yakin ingin menghapus tes ini?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="/cbt/cbt-dashboard/delete-test/{{ $test->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <hr>
                    <p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; line-clamp: 1; -webkit-box-orient: vertical;">
                        {{$test->description}}
                    </p>
                    <p style="font-size: small;">
                        {{$test->date}}
                        <br>
                        {{$test->start_time}} - {{$test->end_time}}
                    </p>
                </div>
                @if(Auth::check())
                <a href="{{ url('cbt/admin-test-detail', $test->code) }}">
                @else
                <a href="{{ url('demo/cbt/admin-test-detail', $test->code) }}">
                    @endif
                    <div class="button btn w-100 mx-auto bg-color-primary text-white fw-bold hover-btn">
                        Lihat Ujian
                    </div>
                </a>
                    <!-- <a href="{{ url('cbt/print-question', $test->code) }}"> -->
                    <!-- <a href="#">
                        <div class="button btn w-100 hover-btn-secondary mt-1" style="border: 1px solid #CA6035;">
                            Cetak Ujian
                        </div>
                    </a> -->
            </div>
            <!-- </a> -->
        </div>
        @endforeach
        @else
        <div class="col text-center">
            <iframe src="https://lottie.host/?file=2036daa4-08af-4034-acd1-0e7ff2264b71/xpudVqbxti.json"></iframe>
            <h5 class="text-secondary my-3">Kamu tidak memiliki tes,
                @if(Auth::check())
                <a href="/cbt/create-test" class="text-secondary"> buat sekarang!</a>
                @else
                <a href="/demo/cbt/create-test" class="text-secondary"> buat sekarang! </a>
                @endif
            </h5>
        </div>
        @endif
    </div>
</div>

@endsection