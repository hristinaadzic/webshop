<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//authentication
Route::post('/login', [\App\Http\Controllers\AuthController::class, "login"])->name('doLogin');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, "logout"])->name('logout');
Route::get('/login-form', [\App\Http\Controllers\AuthController::class, "loginForm"])->name('login-form');

//users
Route::post('/users', [\App\Http\Controllers\UserController::class, 'store'])->name('doRegister');
Route::get('/users/create', [\App\Http\Controllers\UserController::class, 'create'])->name('register');


Route::middleware(["isAdmin"])->group(function(){
    Route::get('/admin/brands', [\App\Http\Controllers\BrandController::class, 'index'])->name('admin-brands');
    Route::get('/admin/users', [\App\Http\Controllers\UserController::class, 'index'])->name('admin-users');
    Route::get('/brands/create', [\App\Http\Controllers\BrandController::class, 'create'])->name('brands.create');
    Route::get('/brands/{brand}/edit', [\App\Http\Controllers\BrandController::class, 'edit'])->name('brands.edit');
    Route::post('/brands/store', [\App\Http\Controllers\BrandController::class, 'store'])->name('brands.store');
    Route::put('/brands/{brand}', [\App\Http\Controllers\BrandController::class, 'update'])->name('brands.update');
    Route::patch('/brands/{brand}', [\App\Http\Controllers\BrandController::class, 'destroy'])->name('brands.destroy');
    Route::get('/admin-categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('admin-categories');
    Route::get('/categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
    Route::get('/categories/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/store', [\App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
    Route::patch('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/admin/products', [\App\Http\Controllers\ProductsController::class, 'adminIndex'])->name('admin-products');
    Route::get('/products/create', [\App\Http\Controllers\ProductsController::class, 'create'])->name('products.create');
    Route::post('/products/store', [\App\Http\Controllers\ProductsController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [\App\Http\Controllers\ProductsController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [\App\Http\Controllers\ProductsController::class, 'update'])->name('products.update');
    Route::post('/products/{product}', [\App\Http\Controllers\ProductsController::class, 'destroy'])->name('products.destroy');
    Route::get('/admin/volumes', [\App\Http\Controllers\VolumeController::class, 'index'])->name('admin-volumes');
    Route::get('/volumes/create', [\App\Http\Controllers\VolumeController::class, 'create'])->name('volumes.create');
    Route::post('/volumes/store', [\App\Http\Controllers\VolumeController::class, 'store'])->name('volumes.store');
    Route::get('/volumes/{volume}/edit', [\App\Http\Controllers\VolumeController::class, 'edit'])->name('volumes.edit');
    Route::put('/volumes/{volume}', [\App\Http\Controllers\VolumeController::class, 'update'])->name('volumes.update');
    Route::post('/volumes/{volume}', [\App\Http\Controllers\VolumeController::class, 'destroy'])->name('volumes.destroy');
    Route::post('/users/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/admin/prices', [\App\Http\Controllers\PriceController::class, 'index'])->name('admin-prices');
    Route::get('/prices/create', [\App\Http\Controllers\PriceController::class, 'create'])->name('prices.create');
    Route::post('/prices/store', [\App\Http\Controllers\PriceController::class, 'store'])->name('prices.store');
    Route::get('/admin/orders', [\App\Http\Controllers\OrdersController::class, 'index'])->name('admin-orders');
    Route::get('/admin/messages', [\App\Http\Controllers\MessageController::class, 'index'])->name('admin-messages');
});

Route::middleware(['isLoggedIn'])->group(function(){
    Route::get('/users/{user}/edit', [\App\Http\Controllers\UserController::class, 'create'])->name('users.edit');
    Route::post('/cart/add', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('addtocart');
    Route::post('order',[\App\Http\Controllers\OrdersController::class, 'store'])->name('order');
});

//base routes
Route::get("/", [\App\Http\Controllers\HomeController::class, "index"])->name("home");
Route::get("/home", [\App\Http\Controllers\HomeController::class, "index"])->name("home");
Route::get("/author", [\App\Http\Controllers\HomeController::class, "author"])->name("author");
Route::get("/about", [\App\Http\Controllers\AboutController::class, "index"])->name("about");
Route::get("/products", [\App\Http\Controllers\ProductsController::class, "index"])->name("products");
Route::get("/products/{product}", [\App\Http\Controllers\ProductsController::class, "show"])->name("products.show");
Route::get("/contact", [\App\Http\Controllers\ContactController::class, "index"])->name("contact");
Route::post("/contact/store", [\App\Http\Controllers\ContactController::class, "store"])->name("contact.store");
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
