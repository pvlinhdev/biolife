<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/product', [HomeController::class, 'show_product'])->name('product');
Route::get('/product-detail/{slug}', [HomeController::class, 'product_detail'])->name('product_detail');
Route::get('/category/{slug}', [HomeController::class, 'category_detail'])->name('category_detail');


Route::get('blog', function () {
    return view('blog');
});
Route::get('/show-blog', function () {
    return view('blogDetail');
});
// Route::get('/cart', function () {
//     return view('cart');
// });

Route::group(['prefix'=>'/admin'],function(){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index');
    // Route::get('/category/create', function () {
    //     return view('admin.category.create');
    // });

    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('admin.category.store');

});

Auth::routes();

/**
 * cart
 */

Route::group(['middleware' => ['auth']], function(){
    Route::post('product/add-to-cart',[CartController::class, 'addToCart'])->name('addToCart');
    Route::get('cart', [CartController::class, 'viewCart'])->name('cart');
    Route::get('update-cart', [CartController::class, 'updateCart'])->name('update_cart');
    // Route::post('cart/delete', [CartController::class, 'deleteOrderDetail'])->name('cart.delete');
    // Route::post('cart/update', [CartController::class, 'updateOrderDetail'])->name('cart.update');
    // Route::get('cart/create',[CartController::class, 'create'])->name('cart.create');
    // Route::post('/cart', [CartController::class, 'store'])->name('cart.store');

    Route::get('/cart-empty', function () {
        return view('cart-empty');
    });
  });
  
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
