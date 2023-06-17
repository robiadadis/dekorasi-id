@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h2>{{ $product->title }}</h2>
            
            <a href="/dashboard/products" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all my products</a>
            <a href="/dashboard/products/{{ $product->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form action="/dashboard/products/{{ $product->slug }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
            </form>

            @if ($product->image)
                <div style="max-height: 350px; overflow:hidden">
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid mt-3" alt="{{ $product->category->name }}">
                </div>
            @else
                <img src="https://source.unsplash.com/random/1200x400?{{ $product->category->name }}" class="card-img-top img-fluid mt-3" alt="{{ $product->category->name }}">
            @endif
            

            <article class="my-3 fs-5">
                {!! $product->body !!}
            </article>

        </div>
    </div>
</div>
@endsection