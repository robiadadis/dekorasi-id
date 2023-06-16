@extends('layouts.main')
@section('container')

<div class="container">
    <div class="w-full mx-auto max-w-screen-xl justify-content-center">
        <div class="col-md-8">
            <form action="/checkout" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <a href="/products" class="inline-flex items-center my-5 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Back to products</a>
                <h1 class="text-2xl font-bold">{{ $product->title }}</h1>
                <p class="my-5">By <a href="#">{{ $product->user->name }}</a> in <a href="/products?category={{ $product->category->slug }}" class="text-red-500 font-semibold">{{ $product->category->name }}</a></p>
            
                @if ($product->image)
                    <div style="max-height: 350px; overflow:hidden">
                        <img src="{{ asset('storage/' . $product->image) }}" class="bg-no-repeat bg-center w-full" alt="{{ $product->category->name }}">
                    </div>
                @else
                    <img src="https://source.unsplash.com/random/1200x400?{{ $product->category->name }}" class="card-img-top img-fluid" alt="{{ $product->category->name }}">
                @endif

                <article class="my-3 fs-5">
                    {!! $product->body !!}
                </article>

                <p>${{ $product->price }}</p>
                {{-- <a href="/checkout" class="inline-flex items-center my-5 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Buy</a> --}}
                @if($product->stock > 0)
                    <button type="submit" class="inline-flex items-center my-5 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Checkout</button>
                @else
                     <button type="submit" class="inline-flex items-center my-5 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300" disabled>Sold out</button>
                @endif
            </form>
        </div>
    </div>
</div>
    
@endsection