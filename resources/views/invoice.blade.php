@extends('layouts.main')
@section('container')

<div class="container">
    <div class="w-full mx-auto max-w-screen-xl justify-content-center">
        <div class="col-md-8">
            <h1>Invoice</h1>
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
        </div>
    </div>
</div>
@endsection