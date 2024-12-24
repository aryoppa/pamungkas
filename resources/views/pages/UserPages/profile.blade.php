@extends('layouts.logged-navbar')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-lg-4 col-sm-12 text-white text-center">
            <div class="card p-5" style="background-color: #3E6D81;">
                <iconify-icon inline icon="material-symbols:edit-square-outline-rounded" style="color: white; font-size: 1.5rem;" class="ms-auto"></iconify-icon>
                <iconify-icon inline icon="healthicons:ui-user-profile" style="color: white; font-size: 7rem;" class="mx-auto pt-3"></iconify-icon>
                <h4 class="pt-4">
                    <b>{{Auth::user()->name}}</b>
                </h4>
                <p>
                    {{Auth::user()->email}}
                </p>
            </div>
        </div>
        <div class="col-lg-8 col-sm-12">
            <div class="card p-5">
                <div class="row">
                    <h3 class="text-color-secondary">
                        <b>
                            Your Account is
                            @if(Auth::user()->is_premium == 0)
                            Not Premium
                            @else
                            Premium
                            @endif
                        </b>
                    </h3>
                    <p class="pt-1"> Your Statistics </p>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card p-3" style="box-shadow: none;">
                            <b class="text-color-primary">
                                Remaining quota <br />
                            </b>
                            <hr>
                            <h4>
                                <b>
                                    {{ Auth::user()->generate_counter }}
                                </b>
                            </h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card p-3" style="box-shadow: none;">
                            <b class="text-color-primary">
                                Your Question <br />
                            </b>
                            <hr>
                            <h4>
                                <b>
                                    {{ Auth::user()->generate_counter }}
                                </b>
                            </h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card p-3" style="box-shadow: none;">
                            <b class="text-color-primary">
                                Your CBT`s <br />
                            </b>
                            <hr>
                            <h4>
                                <b>
                                    {{ Auth::user()->generate_counter }}
                                </b>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection