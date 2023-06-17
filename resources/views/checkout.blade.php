@extends('layouts.main')
@section('container')

<div class="container">
    <div class="w-full mx-auto max-w-screen-xl justify-content-center">
        <div class="col-md-8">
            <h1>Detail Pesanan</h1>
            <table>
                <tr>
                    <td>User id</td>
                    <td> : {{ $order->user_id }}</td>
                </tr>
                <tr>
                    <td>Product id</td>
                    <td> : {{ $order->product_id }}</td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td> : {{ $order->price }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td> : {{ $order->status }}</td>
                </tr>
            </table>
            <button id="pay-button">Pay Now!</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
          // alert("payment success!");
          // window.location.href = '/invoice/{{ $order->id }}'
          window.location.href = '/account'
          console.log(result);
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