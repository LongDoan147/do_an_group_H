<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductControllers;
use App\Http\Controllers\PostsControllers;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\PostsController;
use App\Http\Controllers\Categoriesontroller;
use App\Http\Controllers\OrderController;
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
//add news posts:
Route::get('create-post', [PostsControllers::class, 'createPost'])->name('create.post'); //add news posts
Route::post('save-post', [PostsControllers::class, 'savePost'])->name('save.post'); //save news posts
//delete
Route::get('delete-post/{id}', [PostsControllers::class, 'deletePost'])->name('delete.post'); //delete new posts
//edit
Route::get('edit-post/{id}', [PostsControllers::class, 'editPost'])->name('edit.post'); //edit news posts
Route::post('save-edit-post/{id}', [PostsControllers::class, 'saveeditPost'])->name('save.edit.post'); //save news posts
//active
Route::get('active-post/{id}', [PostsControllers::class, 'activePost'])->name('active.post'); //active and unactive news posts
//hot
Route::get('hot-post/{id}', [PostsControllers::class, 'hotPost'])->name('hot.post'); //hot news posts

//Admin category
Route::get('admin/category', [Categoriesontroller::class, 'index'])->name('category.show');
Route::get('admin/category-add', [Categoriesontroller::class, 'add'])->name('categories.addview');
Route::post('admin/category-adds', [Categoriesontroller::class, 'addhandle'])->name('categories.addhandle');
Route::get('admin/category-del/{id}', [Categoriesontroller::class, 'deletecat'])->name('categories.del');
Route::get('admin/category-edit/{slug}', [Categoriesontroller::class, 'edit'])->name('categories.editview');
Route::post('admin/category-edit/{id}', [Categoriesontroller::class, 'update'])->name('categories.edithandle');
Route::get('active-category/{id}', [Categoriesontroller::class, 'activeCategory'])->name('active.category');

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



//xử lí đơn hàng

// Route::group(['middleware' => ['salestaff', 'checkrole', 'auth']], function () {
    Route::get('order/{orderStatus}', [OrderController::class,'index'])->name('get.order');
    Route::get('delorder/{id}', [OrderController::class,'del'])->name('get.del');
    Route::get('viewDetail/{id}', [OrderController::class,'viewDetail'])->name('get.viewDetail');
    Route::get('action/{action}/{id}', [OrderController::class,'action'])->name('get.action');
    Route::get('update/{madh}', [OrderController::class,'update'])->name('get.update');
    Route::get('actionPayment/{action}/{id}', [OrderController::class,'actionPayment'])->name('get.actionPayment');
    Route::get('print-order/{madh}', [OrderController::class,'print_order'])->name('print.order');
    Route::post('cancel-order/{id}', [OrderController::class,'calcelOrder'])->name('cancel.order');
    Route::get('confirm-order/{id}', [OrderController::class,'confirmOrder'])->name('confirm.order');
    Route::post('dels', [OrderController::class,'dels'])->name('dels');
    // tao mo don hang
    Route::get('createOrder', [OrderController::class,'createOrder'])->name('create.order');
    Route::get('getCustomer', [OrderController::class,'getCustomer'])->name('get.customer');
    Route::post('createcart', [OrderController::class,'createcart'])->name('post.createcart');
    Route::post('deleteCartAd', [OrderController::class,'deleteCartAd'])->name('post.deletecart');
    Route::post('saveOrderAd', [OrderController::class,'saveOrderAd'])->name('post.saveOrderAd');
    Route::post('updateCartAd', [OrderController::class,'upCartAd'])->name('post.upCartAd');
    Route::get('checkProductExist', [OrderController::class,'checkProductExist'])->name('get.checkProductExist');
// });