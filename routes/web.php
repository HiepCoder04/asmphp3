<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\User\UserController;
Route::get('login',[AuthenticationController::class,'login'])->name('login');
Route::post('login',[AuthenticationController::class,'postLogin'])->name('postLogin');
Route::post('logout',[AuthenticationController::class,'logout'])->name('logout');
Route::get('register',[AuthenticationController::class,'register'])->name('register');
Route::post('post-register',[AuthenticationController::class,'postRegister'])->name('postRegister');



//Admin
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'checkAdmin'
],function(){
    Route::group([
        'prefix' => 'product',
        'as' => 'product.'
    ],function(){
        Route::get('/',[ProductController::class,'listProduct'])->name('listProduct');
        Route::get('add-product',[ProductController::class,'addProduct'])->name('addProduct');
        Route::post('add-product',[ProductController::class,'addPostProduct'])->name('addPostProduct');
        // Route::delete('delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
        Route::delete('delete-product',[ProductController::class,'deleteProduct'])->name('deleteProduct');
        Route::get('update-product/{idProduct}',[ProductController::class,'updateProduct'])->name('updateProduct');
        Route::patch('update-product/{idProduct}',[ProductController::class,'updatePatchProduct'])->name('updatePatchProduct');



    });
});
// Route::get('list-product', function () {
//     return view('admin.products.list-product');
// });
// Route::resource('admin/products', 'Admin\ProductController');
Route::group([
    'prefix' => 'users',
    'as' => 'users.'
], function () {
    Route::get('/', [UserController::class, 'home'])->name('home');
});
// Route::get('view', function () {
//     return view('users.product.home');
// });
// Route::get('/', [ProductController::class, 'home'])->name('users.home');
// Route::get('/', [ProductController::class, 'home'])->name('users.home');
