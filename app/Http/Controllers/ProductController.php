<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;


class ProductController extends Controller
{
    public function index(){

        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title =' in ' . $category->name;
        }
        return view('products', [
            "title" => "All Products" . $title,
            "active" => 'products',
            'products' => Product::filter(request(['search', 'category']))->paginate(5)->withQueryString()
        ]);
    }

    public function show(Product $product){
        return view('product', [
            "title" => "Single product",
            "active" => 'products',
            "product" => $product
        ]);
    }
}
    
