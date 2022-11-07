<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductControllers;
use App\Http\Controllers\PostsControllers;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\PostsController;

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

// loai tin tức trang admin
// all
Route::get('typepost', [PostsControllers::class, 'getTypePost'])->name('get.typepost'); //show all menu posts
//add menu posts
Route::get('create-menupost', [PostsControllers::class, 'createMenuPost'])->name('create.menupost'); //add new menu posts
Route::post('save-menupost', [PostsControllers::class, 'saveMenuPost'])->name('save.menupost'); //save add new menu posts
//delete
Route::get('delete-menupost/{id}', [PostsControllers::class, 'deleteMenuPost'])->name('delete.menupost'); //delete menu posts
//edit
Route::get('edit-menupost/{id}', [PostsControllers::class, 'editMenuPost'])->name('edit.menupost'); //edit menu posts
Route::post('save-edit-menupost/{id}', [PostsControllers::class, 'saveeditMenuPost'])->name('save.edit.menupost'); //save edit menu posts
//active
Route::get('active-menupost/{id}', [PostsControllers::class, 'activeMenuPost'])->name('active.menupost'); //active menu posts

// Tin tức trang admin:
// all
Route::get('post', [PostsControllers::class, 'getPost'])->name('get.post'); //show all news post

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
Route::post('/admin/cap-nhat-trang-thai', [ProductControllers::class, 'updateStatus'])->name('products.updatestatus');

//tin tức
Route::get('posts',  [PostsController::class, 'index'])->name('get.posts');


