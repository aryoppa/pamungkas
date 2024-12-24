@extends('layouts.logged-navbar')

@section('content')
<a class="bs-example floating-btn" href="/help?code=generate">
    <button type="button" class="my-float" data-toggle="popover" title="Apa yang harus saya lakukan?"><b>?</b></button>
</a>
<div style="background-color: #3E6D81;" class="pb-5">
    <div class="container-fluid pb-5">
        <div class="row p-5">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 flex">
                <img src="assets/images/header-img.png" width="60%" alt="">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12" style="display: flex; align-items: center">
                <div class="wrap-text">
                    <div class="row" style="color: white;">
                        <br><br>
                        <h1 class="welcome-text"><b>SmartEngTest</b></h1>
                        <p class="paragraph-responsive">
                            SmartEngTest merupakan sebuah platform cerdas yang dapat
                            menghasilkan beberapa varian soal tes Bahasa Inggris secara otomatis.
                            Untuk menghasilkan soal, pengguna cukup memasukan tautan berita sebagai
                            data input. Disamping itu, sistem ini juga menyediakan layanan CBT
                            (Computer Based Test) yang terintegrasi dengan mesin penghasil soal,
                            untuk membantu proses pembelajaran Bahasa Inggris.
                            Adapun tipe-tipe soal yang tersedia merupakan tipe soal yang
                            sering muncul dalam tes/ujian Bahasa Inggris.
                        </p>
                    </div>
                    @if(Auth::guest())
                    <a href="/home">
                        <button id="scrappingBtn" type="submit" name="submit" class="btn bg-color-secondary text-white float-start px-4 mt-2 fw-bold">Coba Sekarang</button>
                    </a>
                    @else
                    <a href="/cbt">
                        <button id="scrappingBtn" type="submit" name="submit" class="btn bg-color-secondary text-white float-start px-4 mt-2">Coba Sekarang</button>
                    </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container hidden-items">
    <section class="row">
        <div class="col-1">
            <div class="prev-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-width="2" d="m15 6l-6 6l6 6" />
                </svg>
            </div>
        </div>
        <div class="col-10">
            <div class="swiper mySwiper container px-0 mx-0">
                <div class="swiper-wrapper content px-0 mx-0">
                    <div class="swiper-slide card ps-0">
                        <a href="/detail/question?type=error-identification">
                            <h5 class="fw-bold card-content">
                                <img src="{{ asset('assets/images/error_idn.png')}}" class="d-flex justify-content-center align-items-center mx-auto mb-3" style="width: 22%;" alt="">
                                <span class="text-color-secondary">
                                    Error
                                </span>
                                <span style="color: grey;">
                                    Identification
                                </span>
                            </h5>
                        </a>
                    </div>
                    <div class="swiper-slide card">
                        <a href="/detail/question?type=vocabulary">
                            <h5 class="fw-bold card-content">
                                <img src="{{ asset('assets/images/vocab.png')}}" class="d-flex justify-content-center align-items-center mx-auto mb-3" style="width: 20%;" alt="">
                                <span class="text-color-secondary">
                                    Vocabulary
                                </span>
                                <span style="color: grey;">
                                    Question
                                </span>
                            </h5>
                        </a>
                    </div>
                    <div class="swiper-slide card">
                        <a href="/detail/question?type=sentence-completion">
                            <h5 class="fw-bold card-content">
                                <img src="{{ asset('assets/images/sentence_comp.png')}}" class="d-flex justify-content-center align-items-center mx-auto mb-3" style="width: 24%;" alt="">
                                <span class="text-color-secondary">
                                    Sentence
                                </span>
                                <span style="color: grey;">
                                    Completion
                                </span>
                            </h5>
                        </a>
                    </div>
                    <div class="swiper-slide card">
                        <a href="/detail/question?type=5W1H">
                            <h5 class="fw-bold card-content">
                                <img src="{{ asset('assets/images/5w1h.png')}}" class="d-flex justify-content-center align-items-center mx-auto mb-3" style="width: 20%;" alt="">
                                <span class="text-color-secondary">
                                    5W + 1H
                                </span>
                                <span style="color: grey;">
                                    Question
                                </span>
                            </h5>
                        </a>
                    </div>
                    <div class="swiper-slide card">
                        <a href="/detail/question?type=pronoun">
                            <h5 class="fw-bold card-content">
                                <img src="{{ asset('assets/images/pronoun.png')}}" class="d-flex justify-content-center align-items-center mx-auto mb-3" style="width: 22%;" alt="">
                                <span class="text-color-secondary">
                                    Pronoun
                                </span>
                                <span style="color: grey;">
                                    Question
                                </span>
                            </h5>
                        </a>
                    </div>
                    <div class="swiper-slide card">
                        <a href="/detail/question?type=summary">
                            <h5 class="fw-bold card-content">
                                <img src="{{ asset('assets/images/summary.png')}}" class="d-flex justify-content-center align-items-center mx-auto mb-3" style="width: 23%;" alt="">
                                <span class="text-color-secondary">
                                    Summary
                                </span>
                                <span style="color: grey;">
                                    Question
                                </span>
                            </h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1">
            <div class="ms-3 next-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M10 6L8.59 7.41L13.17 12l-4.58 4.59L10 18l6-6z" />
                </svg>
            </div>
        </div>
        <!-- <div class="swiper-button-prev"></div> -->
        <!-- <div class="next-btn me-5"></div>
        <div class="swiper-button-prev ms-5"></div> -->
    </section>
</div>

<div class="box p-3 pt-5">
    <h1 class="text-center pt-5">
        <b style="color: #CA6035;">
            Layanan Kami
        </b>
    </h1>
    <div class="container mx-auto">
        <div class="row feature-text">
            <i class="text-center mt-3">
                Berikut adalah alur sistem SmartEngTest. Aplikasi kami menggunakan teknologi Machine Learning dan juga NLP (Natural Language Processing) untuk mengubah artikel yang Anda miliki menjadi soal-soal tes Bahasa Inggris dengan format tertentu.
            </i>
            <img src="{{ asset('assets/images/alur.png')}}" class="my-3 d-flex justify-content-center align-items-center mx-auto pt-5" style="width:100%" alt="">
        </div>
        <div class="container timeline-box" style="padding: 0; margin: 0">
            <img src="/assets/timeline-banner1.png" alt="" class="timeline-banner1">
            <div class="timeline">
                <div class="containerr right">
                    <div class="content-right pb-4">
                        <h4 class="text-color-secondary">
                            <b>
                                Generator Soal
                            </b>
                        </h4>
                        <p class="paragraph-responsive mt-3" style="text-align: justify;">
                            Generator soal bertujuan untuk menghasilkan pertanyaan yang valid dan lancar sesuai dengan bagian yang diberikan dan jawaban yang ditargetkan dari beberapa kalimat atau teks yang dimasukkan. Pertanyaan dapat digunakan dalam banyak skenario, seperti sistem bimbingan otomatis, meningkatkan kinerja model Question Answerer, mengaktifkan chatbot untuk memimpin percakapan, dan membuat pertanyaan ujian.
                        </p>
                    </div>
                </div>
                <div class="containerr left">
                    <div class="content-left pb-4">
                        <h4 class="text-color-secondary">
                            <b>
                                Computer Based Test
                            </b>
                        </h4>
                        <p class="paragraph-responsive" style="text-align: justify;">
                            CBT atau Computer Based Test adalah suatu tes dengan sistem pelaksanaannya menggunakan komputer sebagai media untuk melakukan tes. Penyajian dan pemilihan soal CBT Komputer dilakukan secara komputerisasi sehingga setiap peserta yang mengikuti tes mendapatkan paket soal yang berbeda. Sistem CBT akan menekan biaya pelaksanaan karena tentunya tidak perlu lagi mencetak lembar soal dan jawaban dengan kertas, membagikan soal, serta menekan biaya koreksi hasil ujian dengan scan LJK dan penskoran yang memakan waktu lebih lama.
                        </p>
                    </div>
                </div>
                <div class="containerr right">
                    <div class="content-right pb-4">
                        <h4 class="text-color-secondary">
                            <b>
                                Sistem Rekomendasi
                            </b>
                        </h4>
                        <p class="paragraph-responsive" style="text-align: justify;">
                            Saat ini sistem rekomendasi sedang dalam tahap pengembangan. Fitur ini nantinya akan memberikan rekomendasi tipe soal mana yang harus kamu pelajari lebih lanjut. Dengan begitu, kamu bisa lebih fokus pada kelemahanmu dan kamu dapat terus meningkatkan kemampuan Bahasa Inggrismu!.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row pt-5 d-flex justify-content-center align-items-center reverse">
            <div class="col">
                <b class="text-color-secondary heading-size">Generate Question</b>
                <p class="paragraph-responsive mt-3" style="text-align: justify;">
                    Question Generation bertujuan untuk menghasilkan pertanyaan yang valid dan lancar sesuai dengan bagian yang diberikan dan jawaban yang ditargetkan dari beberapa kalimat atau teks yang dimasukkan. Pertanyaan dapat digunakan dalam banyak skenario, seperti sistem bimbingan otomatis, meningkatkan kinerja model Question Answerer, mengaktifkan chatbot untuk memimpin percakapan, dan membuat pertanyaan ujian.
                </p>
            </div>
        </div>
        <div class="row pt-5 mt-5 row pt-5 d-flex justify-content-center align">
            <div class="col">
                <p class="text-color-secondary heading-size" style="text-align: right;"> <b>Computer Based Test</b> </p>
                <p class="paragraph-responsive" style="text-align: justify;">
                    CBT atau Computer Based Test adalah suatu tes dengan sistem pelaksanaannya menggunakan komputer sebagai media untuk melakukan tes. Penyajian dan pemilihan soal CBT Komputer dilakukan secara komputerisasi sehingga setiap peserta yang mengikuti tes mendapatkan paket soal yang berbeda. Sistem CBT akan menekan biaya pelaksanaan karena tentunya tidak perlu lagi mencetak lembar soal dan jawaban dengan kertas, membagikan soal, serta menekan biaya koreksi hasil ujian dengan scan LJK dan penskoran yang memakan waktu lebih lama.
                </p>
            </div>
        </div>
        <div class="row pt-5 mt-5 row pt-5 d-flex justify-content-center align">
            <div class="col">
                <p class="text-color-secondary heading-size"> <b>Sistem Rekomendasi</b> </p>
                <p class="paragraph-responsive" style="text-align: justify;">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium voluptatibus inventore nihil porro accusantium sapiente sit nobis ducimus assumenda cupiditate, placeat ad quos nesciunt quisquam voluptatum, blanditiis aliquam. Suscipit, consequatur. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sequi tenetur quas, error consectetur nisi temporibus minima perferendis quasi id possimus totam distinctio, fugit sit laborum saepe quisquam similique laudantium vero?
                </p>
            </div>
        </div> -->
    </div>
</div>
<div class="container mb-5 mt-5">
    <h3 style="color: #CA6035;" class="py-4 heading-responsive text-center">
        <b>
            Ingin mulai membuat soal?
        </b>
    </h3>
    <div class="row">
        <div class="col">
            <div class="card" style="height: 270px;">
                <div class="card-body p-4">
                    <div class="row reverse">
                        <div class="col-lg-7 col-sm-12">
                            <b class="text-color-secondary fs-5">
                                Upgrade akun-mu sekarang!
                            </b>
                            <br><br>
                            <p class="paragraph-responsive">
                                Dapatkan akses ke semua fitur tanpa batas yang ada di Smart EngTest dengan mengupgrade akunmu ke premium!
                            </p>
                            <a href="<?= url('upgrade-account') ?>" class="centered-button pt-2">
                                <button class="btn mt-2 fw-bold" style="background-color: #3E6D81; color: white; width: 100%;">Langganan Bulanan</button>
                            </a>
                        </div>
                        <div class="col-lg-5 col-sm-12">
                            <img src="assets/images/Saly-1.png" width="100%" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1 d-flex align-items-center justify-content-center">
            <p style="text-align: center;">atau</p>
        </div>
        <div class="col">
            <div class="card" style="height: 270px;">
                <div class="card-body p-4">
                    <div class="row reverse">
                        <div class="col-lg-7 col-sm-12">
                            <b class="text-color-secondary fs-5">
                                Isi saldomu sekarang!
                            </b>
                            <br><br>
                            <p class="paragraph-responsive">
                                Dapatkan akses untuk melakukan pembuatan soal dengan harga yang lebih terjangkau!
                            </p><br>
                            <a href="<?= url('top-up') ?>" class="centered-button pt-2">
                                <button class="btn mt-2 fw-bold" style="background-color: #3E6D81; color: white; width: 100%;">Top-Up Saldo</button>
                            </a>
                        </div>
                        <div class="col-lg-5 col-sm-12">
                            <img src="assets/images/Saly-2.png" width="100%" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="foooter" style="background-color: #F1F1F1;">
    <div class="row m-5 mb-0 mt-0">
        <div class="col-lg-8 col-md-8 col-sm-12 footer-padding" style="text-align: left;">
            <div class="row pb-2 pt-3">
                <!-- <div class=" col-lg-4 col-md-4 col-sm-6 col-6">
                    <a href="/about">About SmartEngTest</a> <br><br>
                    <a href="/upgrade-account">Upgrade Account</a> <br><br>
                    <a href="/user-guide">User Guide</a> <br><br>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                    <a href="/cbt">Computer Based Test</a> <br><br>
                    <a href="/generate">Generate Question</a> <br><br>
                    <a href="/demo">Demo</a> <br><br>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                    <a href="/question-collection">Question Collection</a> <br><br>
                    <a href="/cbt/cbt-dashboard">Test Collection</a> <br><br>
                </div> -->
                <h5 class="mb-3 text-color-primary">
                    <b>
                        Tentang Kami
                    </b>
                </h5>
                <p>
                    SmartEngTest merupakan salah satu produk yang dikembangkan oleh Team Data Science Research, Program Studi Ilmu Komputer Universitas Pendidikan Indonesia. Aplikasi ini mulai dikembangkan pada tahun 2022 dengan melibatkan mitra dari bidang Bahasa Inggris, yaitu PT. Scada Prima Cipta dan Travelia Pratama.
                    <br><br>
                    <span>
                        Alamat: Jl. Dr. Setiabudhi No. 229 Bandung 40154. Jawa Barat - Indonesia <br>
                        Telp. 022-2013163. Fax. 022-2013651.
                    </span>
                </p>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 p-5 mt-5 hidden-items">
            <img src="{{ asset('assets/images/logo-upi.svg')}}" class="mt-5" width="20%" alt="">
            &emsp;
            <img src="{{ asset('assets/images/bigsize-logo.png')}}" class="mt-5" width="60%" alt="">
        </div>
    </div>
    <div class="fooooter" style="background-color: white;">
        <p class="p-3 mb-0 text-center" style="font-size: 13px">
            ©2023 SmartEngTest. All Rights Reserved.
        </p>
    </div>
</div>
@endsection
