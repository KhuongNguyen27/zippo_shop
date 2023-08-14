<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\NotesController;
use App\Models\User;   
use Illuminate\Support\Facades\App;
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

    // login admin
    Route::get('/',[AuthController::class,'login'])->name('home');
    Route::get('/login',[AuthController::class,'login'])->name('auth.login');
    Route::post('/checkLogin',[AuthController::class,'checkLogin'])->name('auth.checkLogin');
    Route::get('/register',[AuthController::class,'register'])->name('auth.register');
    Route::post('/checkRegister',[AuthController::class,'checkRegister'])->name('auth.checkRegister');

    //shop
    Route::group(['prefix'=>'zipposhop','middleware' => 'preventhistory'],function(){
        Route::get('/login',[ShopController::class,'login'])->name('zipposhop.login');
        Route::post('/checkLogin',[ShopController::class,'checkLogin'])->name('zipposhop.checkLogin');
        Route::get('/logout',[ShopController::class,'logout'])->name('zipposhop.logout');
        
        // giỏ hàng
        Route::get('/cart',[ShopController::class,'cart'])->name('zipposhop.cart');
        Route::get('/addtocart/{id}',[ShopController::class,'addtocart'])->name('zipposhop.addtocart');
        Route::put('/updatecart', [ShopController::class, 'update'])->name('zipposhop.updatecart');
        Route::delete('/removefromcart', [ShopController::class, 'delete'])->name('zipposhop.removefromcart');
        Route::get('/checkouts', [ShopController::class, 'checkouts'])->name('zipposhop.checkouts')->middleware('auth.shop');
        Route::get('/storeorder',[ShopController::class,'storeorder'])->name('zipposhop.storeorder');
        Route::get('/follow_order',[ShopController::class,'follow_order'])->name('zipposhop.follow_order');

        // lấy lại mk customer bằng email
        Route::get('/forgotpassword',[CustomerController::class,'forgotpassword'])->name('zipposhop.forgotpassword');
        Route::post('/postforgot',[CustomerController::class,'postforgot'])->name('zipposhop.postforgot');
    }); 
    Route::resource('zipposhop',ShopController::class); 
    
    // Xuất excel
    Route::get('/user/export',[ExportController::class,'user_export'])->name('user.export');
    Route::get('/customer/export',[ExportController::class,'customer_export'])->name('customer.export');
    
    // xuất pdf
    // Route::get('order/notes', [NotesController::class,'order_notes'])->name('order.notes');
    Route::get('order/pdf/{id}', [NotesController::class,'order_pdf'])->name('order.pdf');
    
    // lấy lại mk user bằng email
    Route::get('/forgotpassword',[UserController::class,'forgotpassword'])->name('user.forgotpassword');
    Route::post('/postforgot',[UserController::class,'postforgot'])->name('user.postforgot');

    // admin
    Route::middleware(['auth','preventhistory'])->group(function(){
        Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');
        Route::get('/search',[AuthController::class,'search'])->name('auth.search');
        
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
        Route::resource('customer',CustomerController::class);

        // route order
        Route::group(['prefix'=>'order'],function(){
            Route::get('/trash',[OrderController::class,'trash'])->name('order.trash');
            Route::get('/restore/{id}',[OrderController::class,'restore'])->name('order.restore');
            Route::get('/deleteforever/{id}',[OrderController::class,'deleteforever'])->name('order.deleteforever');
        });
        Route::resource('order',OrderController::class);

        // route order detail
        Route::group(['prefix'=>'orderdetail'],function(){
            Route::get('/', [OrderDetailController::class, 'index'])->name('orderdetail.index');
            Route::get('/create/{order_id}', [OrderDetailController::class, 'create'])->name('orderdetail.create');
            Route::post('/store', [OrderDetailController::class, 'store'])->name('orderdetail.store');
            Route::get('/show/{id}', [OrderDetailController::class, 'show'])->name('orderdetail.show');
            Route::get('/edit/{id}', [OrderDetailController::class, 'edit'])->name('orderdetail.edit');
            Route::put('/update/{id}', [OrderDetailController::class, 'update'])->name('orderdetail.update');
            Route::delete('/destroy/{id}', [OrderDetailController::class, 'destroy'])->name('orderdetail.destroy');
            Route::get('/trash',[OrderDetailController::class,'trash'])->name('orderdetail.trash');
            Route::get('/restore/{id}',[OrderDetailController::class,'restore'])->name('orderdetail.restore');
            Route::get('/deleteforever/{id}',[OrderDetailController::class,'deleteforever'])->name('orderdetail.deleteforever');
        });
        // Route::resource('orderdetail',OrderDetailController::class);

        // route user
        Route::group(['prefix'=>'user'],function(){
            Route::get('/trash',[UserController::class,'trash'])->name('user.trash');
            Route::get('/restore/{id}',[UserController::class,'restore'])->name('user.restore');
            Route::get('/deleteforever/{id}',[UserController::class,'deleteforever'])->name('user.deleteforever');
        });
        Route::resource('user',UserController::class);
        
        Route::group(['prefix'=>'group'],function(){
            Route::get('/permission/{id}',[GroupController::class,'permission'])->name('group.permission');
            Route::post('/grantpermission',[GroupController::class,'grantpermission'])->name('group.grantpermission');
        });
        Route::resource('group',GroupController::class);
    });

    