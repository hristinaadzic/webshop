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


//base routes
Route::get("/", [\App\Http\Controllers\HomeController::class, "index"])->name("home");
Route::get("/home", [\App\Http\Controllers\HomeController::class, "index"])->name("home");
Route::get("/about", [\App\Http\Controllers\AboutController::class, "index"])->name("about");
Route::get("/products", [\App\Http\Controllers\ProductsController::class, "index"])->name("products");
Route::get("/products/{product}", [\App\Http\Controllers\ProductsController::class, "show"])->name("products.show");
Route::get("/contact", [\App\Http\Controllers\ContactController::class, "index"])->name("contact");

//authentication
Route::post('/login', [\App\Http\Controllers\AuthController::class, "login"])->name('doLogin');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, "logout"])->name('logout');
Route::get('/login-form', [\App\Http\Controllers\AuthController::class, "loginForm"])->name('login-form');

//users
Route::post('/users', [\App\Http\Controllers\UserController::class, 'store'])->name('doRegister');
Route::get('/users/create', [\App\Http\Controllers\UserController::class, 'create'])->name('register');
Route::get('/users/{user}/edit', [\App\Http\Controllers\UserController::class, 'create'])->name('users.edit');
Route::get('/admin/users', [\App\Http\Controllers\UserController::class, 'index'])->name('admin-users');

//brands
Route::get('/admin/brands', [\App\Http\Controllers\BrandController::class, 'index'])->name('admin-brands');
Route::get('/brands/create', [\App\Http\Controllers\BrandController::class, 'create'])->name('brands.create');
Route::get('/brands/{brand}/edit', [\App\Http\Controllers\BrandController::class, 'edit'])->name('brands.edit');
Route::post('/brands/store', [\App\Http\Controllers\BrandController::class, 'store'])->name('brands.store');

//categories
Route::get('/admin-categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('admin-categories');
Route::get('/categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
