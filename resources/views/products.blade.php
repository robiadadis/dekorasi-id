@extends('layouts.main')
@section('container')
    {{-- <h1 class="mb-3 text-center">{{ $title }}</h1> --}}

    {{-- Search Feature --}}
    <div class="w-full mx-auto max-w-screen-xl">
        <form action="/products" class="my-5">  
            @csrf
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                {{-- Search Logo --}}
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" name="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search products..." value="{{ request('search') }}">
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
        </form>
    </div>
    
    @if ($products->count())
    {{-- Product Card --}}
    <div class="flex flex-wrap gap-5 w-full mx-auto max-w-screen-xl">
        @foreach ($products as $product)
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
            @if ($product->image)
            <img class="rounded-t-lg" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->category->name }}" />
            @else
            <img src="https://source.unsplash.com/random/1200×500?{{ $product->category->name }}" alt="{{ $product->category->name }}">
            @endif
            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ $product->title }}</h5>
                <p class="my-2">
                    <small>
                        By dekorasi.id in <a href="/products?category={{ $product->category->slug }}">{{ $product->category->name }}</a> {{ $product->created_at->diffForHumans()}}
                    </small>
                </p>
                <p class="mb-3 font-normal text-gray-700 ">{{ $product->excerpt }}</p>
                <a href="/products/{{ $product->slug }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Read more
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    
    @else
        <p class="text-center fs-4">Product not found.</p>
    @endif
  
    <div class="d-flex justify-content-end">
        {{ $products->links() }}
    </div>

@endsection
