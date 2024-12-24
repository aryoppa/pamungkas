@extends('layouts.admin-navbar')

@section('content')
<div>
    <div class="card">
        <div class="card-body p-5">
            <div class="row reverse">
                <div class="col-lg-7 col-sm-12 mt-5">
                    <p style="color: #CA6035;" class="pt-5 fs-1 lh-1">
                        <b>
                            Welcome Admin
                        </b>
                    </p>
                    <p class="lh-1">
                        You can manage the website from this page
                    </p>
                </div>
                <div class="col-lg-5 col-sm-12 d-flex justify-content-center">
                    <img src="assets/images/admin.png" width="70%" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection