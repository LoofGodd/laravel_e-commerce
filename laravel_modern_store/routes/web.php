<?php

use App\Http\Controllers\CartsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PageController::class, 'home']);

Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/register', [PageController::class, 'register']);
Route::get('/cart', [PageController::class, 'cart'])->middleware('auth');


Route::post('/pay', [PaymentController::class, 'pay'])->name('payment');
Route::get('/success', [PaymentController::class, 'success']);
Route::get('/error', [PaymentController::class, 'error']);


Route::get('/hidden_route', [PageController::class, 'doing_product'])->name('hidden_route');
Route::post('/handle_product', [ProductController::class, 'handleProduct'])->name('handleProducts');
Route::get('/{page}', [PageController::class,'pages'])->whereIn('category', ['shop', 'about','contact', 'address']);
Route::get('/product/{slug}', [PageController::class, 'product_detail']);
Route::get('/product/{slug}', [PageController::class, 'product_detail']);

Route::post('/redirect', [PageController::class,'redirect_category']);
Route::post('/redirect_search', [PageController::class,'redirect_search']);

Route::post('/users/create', [UsersController::class, 'register']);
Route::post('/users/logout', [UsersController::class, 'logout']);
Route::post('/users/authentication', [UsersController::class, 'authentication']);

Route::post('/cart/increase_count', [CartsController::class,'increment_count'])->middleware('auth');
Route::post('/cart/decrease_count', [CartsController::class,'decrement_count'])->middleware('auth');
Route::post('/cart/delete', [CartsController::class,'delete'])->middleware('auth');
Route::post('/cart/add', [CartsController::class,'add'])->middleware('auth');
