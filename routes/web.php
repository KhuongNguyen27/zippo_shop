<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
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

// Route::group(['prefix'=>'category'],function(){
//     Route::get('/', [CategoryController::class, 'index'])->name('category.index');
//     Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
//     Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
//     Route::get('/show/{id}', [CategoryController::class, 'show'])->name('category.show');
//     Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
//     Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
//     Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
// });

    // route category
    Route::group(['prefix'=>'category'],function(){
        Route::get('/trash',[CategoryController::class,'trash'])->name('category.trash');
        Route::get('/restore/{id}',[CategoryController::class,'restore'])->name('category.restore');
        Route::get('/deleteforever/{id}',[CategoryController::class,'deleteforever'])->name('category.deleteforever');
    });
    Route::resource('category',CategoryController::class);

    // route product
    Route::group(['prefix'=>'product'],function(){
        Route::get('/trash',[ProductController::class,'trash'])->name('product.trash');
        Route::get('/restore/{id}',[ProductController::class,'restore'])->name('product.restore');
        Route::get('/deleteforever/{id}',[ProductController::class,'deleteforever'])->name('product.deleteforever');
    });
    Route::resource('product',ProductController::class);

    // route customer
    Route::group(['prefix'=>'customer'],function(){
        Route::get('/trash',[CustomerController::class,'trash'])->name('customer.trash');
        Route::get('/restore/{id}',[CustomerController::class,'restore'])->name('customer.restore');
        Route::get('/deleteforever/{id}',[CustomerController::class,'deleteforever'])->name('customer.deleteforever');
    });
    Route::resource('customer',CustomerController::class);

    // route order
    Route::group(['prefix'=>'order'],function(){
        Route::get('/trash',[OrderController::class,'trash'])->name('order.trash');
        Route::get('/restore/{id}',[OrderController::class,'restore'])->name('order.restore');
        Route::get('/deleteforever/{id}',[OrderController::class,'deleteforever'])->name('order.deleteforever');
    });
    Route::resource('order',OrderController::class);

    Route::group(['prefix'=>'ordersdetail'],function(){
        Route::get('/trash',[OrdersDetailController::class,'trash'])->name('ordersdetail.trash');
        Route::get('/restore/{id}',[OrdersDetailController::class,'restore'])->name('ordersdetail.restore');
        Route::get('/deleteforever/{id}',[OrdersDetailController::class,'deleteforever'])->name('ordersdetail.deleteforever');
    });
    Route::resource('ordersdetail',OrdersDetailController::class);

    // Route::group(['prefix'=>'user'],function(){
        //     Route::get('/trash',[UserController::class,'trash'])->name('user.trash');
        //     Route::get('/restore/{id}',[UserController::class,'restore'])->name('user.restore');
        //     Route::get('/deleteforever/{id}',[UserController::class,'deleteforever'])->name('user.deleteforever');
        //     Route::get('login',[UserController::class,'login'])->name('user.login');
        //     Route::post('checkLogin',[UserController::class,'checkLogin'])->name('user.checkLogin');
        //     Route::get('register',[UserController::class,'register'])->name('user.register');
        //     Route::post('checkRegister',[UserController::class,'checkRegister'])->name('user.checkRegister');
        // });
        // Route::resource('user',UserController::class);