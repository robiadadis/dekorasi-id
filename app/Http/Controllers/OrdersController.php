<?php

namespace App\Http\Controllers;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function checkout(Request $request){
        $request->merge(['status' => 'unpaid']);
        $request->merge(['user_id' => auth()->user()->id]);

        // Mendapatkan nilai produk yang sesuai (asumsi menggunakan ID produk dari permintaan)
        $product = Product::find($request->product_id);

        if ($product && $product->stock > 0) {
            $order = Orders::create([
                'id' => Str::random(10),
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'price' => $product->price,
                'status' => $request->status
            ]);
        
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;
        
            $params = [
                'transaction_details' => [
                    'order_id' => $order->id,
                    'gross_amount' => $product->price,
                ],
                'customer_details' => [
                    'user_id' => auth()->user()->id,
                    'first_name' => auth()->user()->name,
                    'last_name' => '',
                    'email' => auth()->user()->email
                ],
            ];
        
            $snapToken = \Midtrans\Snap::getSnapToken($params);
        
            return view('checkout', compact('snapToken', 'order'));
        } else {
            // Handle jika stok habis atau produk tidak ditemukan
            return redirect()->back()->with('error', 'Maaf, stok produk habis.');
        }        
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $order = Orders::find($request->order_id);
                $order->update(['status' => 'paid']);

                // Mengurangi stok produk jika pembelian berhasil
                $product = Product::find($order->product_id);
                if ($product) {
                    $product->decrement('stock');
                }
            } else if ($request->transaction_status == 'cancel') {
                $order = Orders::find($request->order_id);
                $order->update(['status' => 'cancelled']);
            } else if ($request->transaction_status == 'expire') {
                $order = Orders::find($request->order_id);
                $order->update(['status' => 'expired']);
            }
        }
    }

    public function invoice($id){
        $order = Orders::find($id);
        return view('invoice', compact('order'));
    }
}
