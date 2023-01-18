<?php

use App\Http\Controllers\Backend\AdminAuthController;
use App\Http\Controllers\Backend\AdminHomeController;
use App\Http\Controllers\Backend\ProductController;
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


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'as' => 'admin.'], function() {
    Route:: get('/', [AdminHomeController::class, 'dashboard'])->name('dashboard');
    Route:: resource('brand', 'BrandController');
    Route:: resource('category', 'CategoryController');
    Route:: resource('sub-category', 'SubCategoryController');
    Route:: resource('product', 'ProductController');
    Route:: get('product/find-sub-category/{id}', [ProductController::class, 'findSubCategory'])->name('product.find_sub_category');
});
