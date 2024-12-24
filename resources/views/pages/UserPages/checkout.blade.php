@extends('layouts.logged-navbar')

@section('content')


<div class="container container-payment mt-5 pt-5">
    <div class="row row-container-payment">
        <div class="d-flex justify-content-center">
            <div class="card card-payment" style="min-width: 20rem;">
                <div class="card-body py-3">
                    <h5 class="text-center m-3"><b>Detail pesanan</b></h5>
                    <table class="my-5 mx-3">
                        <tr>
                            <td>email</td>
                            <td>: {{$request->email}}</td>
                        </tr>
                        <tr>
                            <td>jumlah</td>
                            <td>: {{$request->balance}}</td>
                        </tr>
                        <tr>
                            <td>status</td>
                            <td>: {{$request->payment_request}}</td>
                        </tr>
                    </table>
                    <button class="btn btn-full-size bg-color-primary text-white fw-bold my-2 w-100" id="pay-button">Bayar sekarang</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- midtrans --}}

<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{$snapToken}}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
        //   alert("payment success!"); console.log(result);
        window.location.href = 'invoice/{{$order->id}}'
        },
        onPending: function(result){
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result);
        },
        onError: function(result){
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
        },
        onClose: function(){
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      })
    });
</script>

@endsection
