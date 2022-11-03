<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
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

//trang chủ
Route::get('/', [HomeController::class, 'index'])->name('get.home');
//Route::post('/quickview', 'HomeController@quickView')->name('quickview');


//products
Route::get('products',  [ProductController::class, 'index'])->name('product');
