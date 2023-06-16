<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        'active' => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        'active' => 'about',
        "name" => "Robi Adadi Suparlan",
        "email" => "robiadadis@gmail.com"
    ]);
});

Route::get('/products', [ProductController::class, 'index']);

// Single Product Page
Route::get('products/{product:slug}', [ProductController::class, 'show']);

Route::get('/categories', function(){
    return view ('categories', [
        'title' => 'Product Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    return view ('products', [
        'title' => "Product By Category : $category->name",
        'active' => 'categories',
        'products' => $category->products
    ]);
});

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Register 
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Admin Dashboard
Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('isAdmin');
Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('isAdmin');
Route::get('/dashboard/products/checkSlug', [DashboardProductController::class, 'checkSlug'])->middleware('isAdmin');
Route::resource('/dashboard/products', DashboardProductController::class)->middleware('isAdmin');

// Account
Route::get('/account', [UserController::class, 'account'])->middleware('auth');

// Midtrans
Route::post('/checkout', [OrdersController::class, 'checkout'])->middleware('auth');
Route::get('/invoice/{id}', [OrdersController::class, 'invoice'])->middleware(['auth', 'checkUserAccess']);
