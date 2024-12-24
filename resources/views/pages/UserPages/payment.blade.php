@extends('layouts.logged-navbar')

@section('content')
<div class="container mt-4">
    <div class="row p-5 pb-5">
        <h3 class="text-center text-color-primary">
            <b>
                Checkout
            </b>
        </h3>
    </div>
    <div class="Timeline pb-3 mb-5 flex">
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
            <line x1="0" y1="0" x2="200" y2="0" style="stroke:#CA6035; stroke-width:15" />
        </svg>

        <div class="event1">
            <svg height="30" width="120">
                <circle cx="60" cy="12" r="7" fill="#CA6035" />
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
    </div>
    <div class="row mb-5 pb-5">
        <div class="col-lg-4 col-sm-12">
            <div class="card p-4 ps-0">
                <div class="card-body">
                    <div class="form-check mb-3">
                        <label class="form-check-label">
                            <img src="/assets/images/bca.png" alt="" style="width: 50px;">
                        </label>
                        <input name="type" class="form-check-input float-end" type="radio" id="payment" value="payment" style="vertical-align:middle; cursor: pointer;">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <img src="/assets/images/qris.png" alt="" style="width: 50px;">
                        </label>
                        <input name="type" class="form-check-input float-end" type="radio" id="payment2" value="payment2" style="vertical-align:middle; cursor: pointer;">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group p-2 pb-1" id="payment1_select" style="display: none;">
                            <h5>
                                Transfer to this account:
                            </h5>
                            <p class="pt-2">
                                <strong>BCA</strong> 1234567890 a/n Smart EngTest <br>
                                <span class="text-danger">
                                    Please add note with your name and email for verification when you transfer.
                                </span>
                            </p>
                        </div>
                        <div class="form-group" id="payment2_select" style="display: none;">
                            <img src="/assets/images/qr.png" alt="" style="width: 200px;">
                        </div>
                        <div class="form-group pb-5 pt-3 ps-3" id="payment3_select">
                            <p class="pb-2">
                                Choose Payment.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="nav bg-light fixed-bottom p-5 pt-4 pb-4 bg-white" style="box-shadow: 0px 0px 10px 3px rgb(0,0,0,0.10);">
        <div class="container ms-auto">
            <div class="row">
                <div class="col-6">
                    <a href="/upgrade-account/plan-option">
                        <button class="btn bg-color-secondary ps-5 pe-5 text-white">Back</button>
                    </a>
                </div>
                <div class="col-6">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn bg-color-secondary text-white ps-3 pe-3" style="float: right;">Request Upgrade Account</button>
                </div>
            </div>
        </div>
    </nav>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <p>
                        Are you sure to request upgrade account?
                    </p>
                </div>

                <div class="row">
                    <b>
                        Plan Details
                    </b>
                    <p>
                        Yearly Premium
                    </p>
                </div>

                <div class="row">
                    <b>
                        Account
                    </b>
                    <p>
                        {{ Auth::user()->email }}
                    </p>
                </div>

                <b>
                    Subtotal
                </b>
                <p>
                    Rp. 599.000,-
                </p>
            </div>
            <div class="modal-footer">
                <form action="/upgrade-account/store-payment" method="post">
                    @csrf
                    <input hidden name="user_id" value="{{ Auth::user()->id }}">
                    <!-- <input hidden name="upgrade_request" value="request"> -->
                    <button type="button" class="btn text-white bg-color-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn text-white bg-color-primary">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("input[name=type]").change(function() {

            if ($("#payment").is(':checked')) {
                $("#payment1_select").show();
                $("#payment2_select").hide();
                $("#payment3_select").hide();
            } else if ($("#payment2").is(':checked')) {
                $("#payment1_select").hide();
                $("#payment2_select").show();
                $("#payment3_select").hide();
            } else {
                $("#payment1_select").hide();
                $("#payment2_select").hide();
                $("#payment3_select").show();
            }
        });
    });
</script>
@endsection