<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TypeProductController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\ReviewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/type_products', [TypeProductController::class, 'index']);
Route::post('/type_products', [TypeProductController::class, 'store']);
Route::get('/type_products/{id}', [TypeProductController::class, 'show']);
Route::put('/type_products/{id}', [TypeProductController::class, 'update']);
Route::delete('/type_products/{id}', [TypeProductController::class, 'destroy']);

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

Route::get('/orders', [OrderController::class, 'index']);
Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders/{id}', [OrderController::class, 'show']);
Route::put('/orders/{id}', [OrderController::class, 'update']);
Route::delete('/remove/orders', [OrderController::class, 'destroy']);

Route::get('/carts', [CartController::class, 'index']);
Route::post('/add/carts', [CartController::class, 'store']);
Route::post('/check/carts', [CartController::class, 'checkCart']);
Route::get('/carts/{id}', [CartController::class, 'show']);

Route::get('/suppliers', [SupplierController::class, 'index']);

// Review
Route::get('/review', [ReviewController::class, 'index']);
Route::post('/add/review', [ReviewController::class, 'store']);
