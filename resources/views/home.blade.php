@extends('layouts.logged-navbar')

@section('content')
<div style="background-color: #3E6D81;">
    <div class="container-fluid pb-5">
        <div class="row p-5">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 flex">
                <img src="assets/images/header-img.png" width="65%" alt="">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12" style="display: flex; align-items: center">
                <div class="wrap">
                    <div class="row" style="color: white;">
                        <br><br>
                        <h1 class="welcome-text"><b>Smart EngTest</b></h1>
                        <p class="paragraph-responsive">Smart EngTest is a website that can generate English test questions only from an article or text saved in .txt format. Smart EngTest also provides CBT services to facilitate the English exam process</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container hidden-items">
    <section>
        <div class="swiper mySwiper container">
            <div class="swiper-wrapper content">
                <div class="swiper-slide card">
                    <div class="card-content mt-3 mb-4">
                        <span class="text-color-secondary">
                            Error
                        </span>
                        <span style="color: grey;">
                            Identification
                        </span>
                    </div>
                </div>
                <div class="swiper-slide card">
                    <div class="card-content mt-3 mb-4">
                        <span class="text-color-secondary">
                            Vocabulary
                        </span>
                        <span style="color: grey;">
                            Question
                        </span>
                    </div>
                </div>
                <div class="swiper-slide card">
                    <div class="card-content mt-3 mb-4">
                        <span class="text-color-secondary">
                            Sentence
                        </span>
                        <span style="color: grey;">
                            Completion
                        </span>
                    </div>
                </div>
                <div class="swiper-slide card">
                    <div class="card-content mt-3 mb-4">
                        <span class="text-color-secondary">
                            Summary
                        </span>
                        <span style="color: grey;">
                            Question
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-button-next" style="margin-left: 100px;"></div>
        <div class="swiper-button-prev"></div>
        <!-- <div class="swiper-pagination"></div> -->
    </section>
</div>

<div class="box p-3 pt-5 pb-5">
    <h1 class="text-center pt-2">
        <b style="color: #CA6035;">
            Our Feature
        </b>
    </h1>
    <div class="container mx-auto">
        <div class="row pt-5 d-flex justify-content-center align-items-center reverse">
            <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                <p class="text-color-secondary heading-size">Generate Question</p>
                <p class="paragraph-responsive" style="text-align: justify;">
                    Question Generation aims to generate valid and fluent questions according to
                    the given passage and targeted answers from several sentences or texts entered.
                    Questions can be used in many scenarios, such as automated tutoring systems,
                    improving the performance of the Question Answerer model, enabling chatbots
                    to lead conversations, and generating test questions.
                </p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-12 m-2">
                <img src="assets/images/generate.png" class="flex img-responsive" alt="">
            </div>
        </div>
        <div class="row pt-5 mt-5 row pt-5 d-flex justify-content-center align">
            <div class="col-lg-3 col-md-6 col-sm-12 col-12 m-2">
                <img src="assets/images/cbt.png" class="flex img-responsive" alt="">
            </div>
            <div class="col-lg-7 col-md-6 col-sm-12 col-12">
                <p class="text-color-secondary heading-size">Computer Based Test</p>
                <p class="paragraph-responsive" style="text-align: justify;">
                    CBT or Computer Based Test is a test with an implementation system using a
                    computer as a medium for conducting tests. The presentation and selection
                    of Computer CBT questions is done computerized so that each participant
                    who takes the test gets a different package of questions. The CBT system
                    will reduce implementation costs because of course there is no need to print
                    questions and answer sheets with paper, distribute questions, and reduce the
                    cost of correcting exam results by scanning LJK and scoring which takes longer.
                </p>
            </div>
        </div>
    </div>
</div>
@if (Auth::user()->is_premium == 0)
<div class="container" style="padding-top: 10%; padding-bottom: 10%;">
    <div class="card">
        <div class="card-body p-5">
            <div class="row reverse">
                <div class="col-lg-7 col-sm-12">
                    <h1 style="color: #CA6035;" class="pt-5 heading-responsive">
                        <b>
                            Upgrade to premium
                        </b>
                    </h1>
                    <p class="paragraph-responsive">
                        Get the most out of SmartEngTest now!
                    </p>
                    <a href="<?= url('upgrade-account') ?>" class="centered-button">
                        <button class="btn mt-2" style="background-color: #3E6D81; color: white;">Upgrade Account</button>
                    </a>
                </div>
                <div class="col-lg-5 col-sm-12 d-flex justify-content-center">
                    <img src="assets/images/Saly-1.png" width="70%" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="foooter" style="background-color: #F1F1F1;">
    <hr style="height:2px; width:100%; border-width:0; color:#3E6D81; background-color:#3E6D81"/>
    <div class="row m-5 mb-0 mt-0">
        <div class="col-lg-8 col-md-8 col-sm-12 footer-padding" style="text-align: left;">
            <div class="row pb-2 pt-3">
                <div class=" col-lg-4 col-md-4 col-sm-6 col-6">
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
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 p-5 hidden-items">
            <img src="{{ asset('assets/images/bigsize-logo.png')}}" class="mt-4" width="70%" alt="">
        </div>
    </div>
    <div class="fooooter" style="background-color: white;">
        <p class="p-3 mb-0 text-center" style="font-size: 13px">
            ©2023 SmartEngtest. All Rights Reserved.
        </p>
    </div>
</div>
@endsection
