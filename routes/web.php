<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\ProductController;
use App\Http\Controllers\AuthenticationController;

Route::get('login',[AuthenticationController::class,'login'])->name('login');
Route::post('login',[AuthenticationController::class,'postLogin'])->name('postLogin');
Route::get('logout',[AuthenticationController::class,'logout'])->name('logout');
Route::get('register',[AuthenticationController::class,'register'])->name('register');
Route::post('post-register',[AuthenticationController::class,'postRegister'])->name('postRegister');



//Admin
// Route::group([
//     'prefix' => 'admin',
//     'as' => 'admin.'
// ],function(){
//     Route::group([
//         'prefix' => 'products',
//         'as' => 'products.'
//     ],function(){
        
//     });
// });
Route::get('list-product', function () {
    return view('admin.products.list-product');
});
// Route::resource('admin/products', 'Admin\ProductController');
Route::get('view', function () {
    return view('users.home');
});
// Route::get('/', [ProductController::class, 'home'])->name('users.home');
// Route::get('/', [ProductController::class, 'home'])->name('users.home');
