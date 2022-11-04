<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductControllers;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//trang admin
Route::get('/admin', [DashboardController::class, 'show'])->name('showDashboard');

// Product admin
Route::get('admin/san-pham', [ProductControllers::class, 'show'])->name('products.show');

//trang chủ
Route::get('/', [HomeController::class, 'index'])->name('get.home');
//Route::post('/quickview', 'HomeController@quickView')->name('quickview');

//products
Route::get('products',  [ProductController::class, 'index'])->name('product');
Route::get('admin/them-san-pham', [ProductControllers::class, 'addProductView'])->name('products.addview');
Route::post('admin/them-san-pham', [ProductControllers::class, 'addProductHandle'])->name('products.addhandle');
Route::get('admin/xoa-san-pham/{id}', [ProductControllers::class, 'deleteProduct'])->name('products.del');
Route::get('admin/sua-san-pham/{slug}', [ProductControllers::class, 'editProductView'])->name('products.editview');
Route::post('admin/sua-san-pham/{id}', [ProductControllers::class, 'updateProduct'])->name('products.edithandle');
Route::get('/admin/cap-nhat-trang-thai', [ProductControllers::class, 'updateStatus'])->name('products.updatestatus');
