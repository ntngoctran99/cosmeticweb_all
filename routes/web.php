<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProductImageController as AdminProductImageController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\CustomAuthController;

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

/*Route::get('/', function () {
    return view('app');
});*/
Route::get('/', 'App\Http\Controllers\HomePageController@listProducts')->name('homepage');
Route::get('/search', [ProductController::class, 'search'])->name('product.search');
Route::get('/registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');

Route::prefix('products')->group(function() {
    Route::get('/{id}', [ProductController::class, 'detailProduct']);
    Route::get('/shop/{id}', [ProductController::class, 'getProductByType']);
    Route::get('/brand/shop', [ProductController::class, 'getProductBrand']);
});

Route::prefix('cart')->group(function() {
    Route::post('/add', [CartController::class, 'add']);
    Route::post('/check', [CartController::class, 'checkCart']);
    Route::get('/detail', [CartController::class, 'index']);
    Route::get('/checkout', [CartController::class, 'checkoutBill']);
    Route::post('/remove', [CartController::class, 'remove']);
    Route::post('/remove/session', [CartController::class, 'forgetSession']);
    Route::post('/update', [CartController::class, 'updateQuantity']);
});

Route::get('/order', [OrderController::class, 'index']);

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/postlogin', [UserController::class, 'postLogin']);
Route::get('/logout', [UserController::class, 'logout']);

// Route::get('{any}', function () {
//     return view('app');
// })->where('any', '.*');


Route::group(['middleware' => 'checklogin'], function() {
    Route::prefix('admin')->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('/', [DashboardController::class, 'filter'])->name('admin.dashboard.filter');

        Route::prefix('supplier')->group(function() {
            Route::get('/', [SupplierController::class, 'index'])->name('admin.supplier.index');

            Route::get('/create', [SupplierController::class, 'create'])->name('admin.supplier.create');
            Route::post('/create', [SupplierController::class, 'store'])->name('admin.supplier.store');

            Route::get('/{id}/edit', [SupplierController::class, 'edit'])->name('admin.supplier.edit');
            Route::post('/{id}/edit', [SupplierController::class, 'update'])->name('admin.supplier.update');
        });

        Route::prefix('product-types')->group(function() {
            Route::get('/', [ProductTypeController::class, 'index'])->name('admin.product_type.index');

            Route::get('/create', [ProductTypeController::class, 'create'])->name('admin.product_type.create');
            Route::post('/create', [ProductTypeController::class, 'store'])->name('admin.product_type.store');

            Route::get('/{id}/edit', [ProductTypeController::class, 'edit'])->name('admin.product_type.edit');
            Route::post('/{id}/edit', [ProductTypeController::class, 'update'])->name('admin.product_type.update');

            Route::post('/{id}/delete', [ProductTypeController::class, 'destroy'])->name('admin.product_type.destroy');
        });

        Route::prefix('products')->group(function() {
            Route::get('/', [AdminProductController::class, 'index'])->name('admin.product.index');

            Route::get('/create', [AdminProductController::class, 'create'])->name('admin.product.create');
            Route::post('/create', [AdminProductController::class, 'store'])->name('admin.product.store');

            Route::get('/{id}', [AdminProductController::class, 'show'])->name('admin.product.show');

            Route::get('/{id}/edit-info', [AdminProductController::class, 'editInfo'])->name('admin.product.edit_info');
            Route::post('/{id}/edit-info', [AdminProductController::class, 'updateInfo'])->name('admin.product.update_info');

            Route::post('/{id}/delete', [AdminProductController::class, 'destroy'])->name('admin.product.destroy');

            Route::prefix('{id}/edit-image')->group(function() {
                Route::get('/', [AdminProductImageController::class, 'index'])->name('admin.product.image.index');

                Route::post('/avatar', [AdminProductImageController::class, 'updateAvatar'])->name('admin.product.image.update.avatar');

                Route::post('/default-image', [AdminProductImageController::class, 'updateDefaultImage'])->name('admin.product.image.update.default_image');
            });
        });

        Route::prefix('blog')->group(function() {
            Route::get('/', [AdminBlogController::class, 'index'])->name('admin.blog.index');

            Route::get('/create', [AdminBlogController::class, 'create'])->name('admin.blog.create');
            Route::post('/create', [AdminBlogController::class, 'store'])->name('admin.blog.store');

            Route::get('/{id}/edit', [AdminBlogController::class, 'edit'])->name('admin.blog.edit');
            Route::post('/{id}/edit', [AdminBlogController::class, 'update'])->name('admin.blog.update');

            Route::post('/{id}/delete', [AdminBlogController::class, 'destroy'])->name('admin.blog.destroy');
        });

        Route::prefix('orders')->group(function() {
            Route::get('/', [AdminOrderController::class, 'index'])->name('admin.order.index');

            Route::get('/{id}', [AdminOrderController::class, 'show'])->name('admin.order.show');

            Route::get('/{id}/update-status/{status}', [AdminOrderController::class, 'updateStatus'])->name('admin.order.update.status');

        });

        Route::prefix('reports')->group(function() {
            Route::get('/', [AdminReportController::class, 'index'])->name('admin.report.index');
            Route::post('/', [AdminReportController::class, 'filter']);

        });

    });
});




Route::prefix('blog')->group(function() {
    Route::get('/', [BlogController::class, 'index']);
    Route::get('/blog-detail/{id}', [BlogController::class, 'detail'])->name('blog.detail');
});

Route::prefix('contact')->group(function() {
    Route::get('/', [ContactController::class, 'index'])->name('contact');
    Route::post('/sendMail', [ContactController::class,'sendMail'])->name('sendMail');
});

Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribe');

