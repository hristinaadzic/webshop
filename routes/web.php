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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get("/", [\App\Http\Controllers\HomeController::class, "index"])->name("home");
Route::get("/home", [\App\Http\Controllers\HomeController::class, "index"])->name("home");
Route::get("/about", [\App\Http\Controllers\AboutController::class, "index"])->name("about");
Route::get("/products", [\App\Http\Controllers\ProductsController::class, "index"])->name("products");
Route::get("/products/{product}", [\App\Http\Controllers\ProductsController::class, "show"])->name("products.show");
Route::get("/contact", [\App\Http\Controllers\ContactController::class, "index"])->name("contact");
Route::post('/login', [\App\Http\Controllers\AuthController::class, "login"])->name('doLogin');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, "logout"])->name('logout');
Route::get('/login-form', [\App\Http\Controllers\AuthController::class, "loginForm"])->name('login-form');
Route::post('/users', [\App\Http\Controllers\UserController::class, 'store'])->name('doRegister');
Route::get('/users/create', [\App\Http\Controllers\UserController::class, 'create'])->name('register');
Route::get('/admin/brands', [\App\Http\Controllers\BrandController::class, 'index'])->name('admin-brands');
Route::get('/brand/create', [\App\Http\Controllers\BrandController::class, 'create'])->name('create-brand');
Route::get('/brand/{brand}', [\App\Http\Controllers\BrandController::class, 'edit'])->name('brand.edit');
Route::post('/brand/store', [\App\Http\Controllers\BrandController::class, 'store'])->name('brand.store');
