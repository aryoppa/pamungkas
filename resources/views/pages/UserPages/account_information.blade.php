@extends('layouts.logged-navbar')

@section('content')
<div class="container mt-5">
    <div class="row p-4 pb-0">
        <h3 class="text-center text-color-primary"><b>Account Information</b></h3>
    </div>

    <div class="Timeline mt-5 mb-5 flex">
        <div class="event1">
            <svg height="30" width="120">
                <circle cx="60" cy="12" r="7" fill="#CA6035" />
            </svg>
            <div class="timeline-text">Account information</div>
        </div>
        <svg height="5" width="200">
            <line x1="0" y1="0" x2="200" y2="0" style="stroke:#D9D9D9; stroke-width:15" />
        </svg>

        <div class="event1">
            <svg height="30" width="120">
                <circle cx="60" cy="12" r="7" fill="#D9D9D9" />
            </svg>
            <div class="timeline-text">Plan Option</div>
        </div>
        <svg height="5" width="200">
            <line x1="0" y1="0" x2="200" y2="0" style="stroke:#D9D9D9; stroke-width:15" />
        </svg>

        <div class="event1">
            <svg height="30" width="120">
                <circle cx="60" cy="12" r="7" fill="#D9D9D9" />
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
    <div class="row pt-3">
        <div class="mt-3">
            <label class="form-label fw-bold text-color-primary">Name</label>
            <input type="text" class="form-control" disabled value="{{ @Auth::user()->name }}" name="name">
        </div>
        <div class="mt-3">
            <label class="form-label fw-bold text-color-primary">Email</label>
            <input type="email" class="form-control" disabled value="{{ @Auth::user()->email }}" name="email">
        </div>
    </div>
    <nav class="nav bg-light fixed-bottom p-5 pt-4 pb-4" style="box-shadow: 0px 0px 10px 3px rgb(0,0,0,0.10)">
        <div class="container ms-auto">
            <div class="row">
                <div class="col-6">
                    <a href="/upgrade-account">
                        <button class="btn bg-color-secondary ps-5 pe-5 text-white">Back</button>
                    </a>
                </div>
                <div class="col-6">
                    <a href="/upgrade-account/plan-option">
                        <button class="btn bg-color-secondary text-white ps-5 pe-5" style="float: right;">Next</button>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>
@endsection