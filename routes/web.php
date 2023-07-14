<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
Route::group(['prefix'=>'/'],function(){
    // route category
    Route::resource('category',CategoryController::class);
    Route::group(['prefix'=>'category'],function(){
        Route::get('/trash',[CategoryController::class,'trash'])->name('category.trash');
        Route::get('/restore/{id}',[CategoryController::class,'restore'])->name('category.restore');
        Route::get('/deleteforever/{id}',[CategoryController::class,'deleteforever'])->name('category.deleteforever');
    });
    // route product
    Route::resource('product',ProductController::class);
    Route::group(['prefix'=>'product'],function(){
        Route::get('/trash',[ProductController::class,'trash'])->name('product.trash');
        Route::get('/restore/{id}',[ProductController::class,'restore'])->name('product.restore');
        Route::get('/deleteforever/{id}',[ProductController::class,'deleteforever'])->name('product.deleteforever');
    });
    Route::resource('user',UserController::class);
    Route::group(['prefix'=>'user'],function(){
        Route::get('/trash',[UserController::class,'trash'])->name('user.trash');
        Route::get('/restore/{id}',[UserController::class,'restore'])->name('user.restore');
        Route::get('/deleteforever/{id}',[UserController::class,'deleteforever'])->name('user.deleteforever');
    });
    Route::get('login',[UserController::class,'login'])->name('user.login');
    Route::post('checkLogin',[UserController::class,'checkLogin'])->name('user.checkLogin');
    Route::get('register',[UserController::class,'register'])->name('user.register');
    Route::post('checkRegister',[UserController::class,'checkRegister'])->name('user.checkRegister');
});