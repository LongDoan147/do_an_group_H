<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductControllers;
use App\Http\Controllers\PostsControllers;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\PostsController;
use App\Http\Controllers\Categoriesontroller;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;

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

//auth
Route::post('/admin/login', [LoginController::class,'postLogin'])->name('authlogin');
Route::get('/admin', [LoginController::class,'getLogin'])->name('auth.login');
Route::get('/admin/login', [LoginController::class,'logout'])->name('auth.logout');


Route::get('admin/reset-password', [LoginController::class,'resetPasswordview'])->name('viewinputmail');
Route::post('admin/send-mail-reset', [LoginController::class,'sendMailReset'])->name('sendmailreset');
Route::get('admin/reset-pasworods/{email}', [LoginController::class,'viewchangepassword'])->name('form-reset-password');
Route::post('admin/reset-pasworods/{email}', [LoginController::class,'handlerspw'])->name('handlerspw');


Route::get('admin/dashboard', [DashboardController::class,'show'])->name('showDashboard');


//trang admin
 //Route::get('/admin', [DashboardController::class, 'show'])->name('showDashboard');

// Product admin
Route::get('admin/san-pham', [ProductControllers::class, 'show'])->name('products.show');

// loai tin tức trang admin

Route::get('typepost', [PostsControllers::class, 'getTypePost'])->name('get.typepost'); //show all menu posts
Route::get('create-menupost', [PostsControllers::class, 'createMenuPost'])->name('create.menupost'); //add new menu posts
Route::post('save-menupost', [PostsControllers::class, 'saveMenuPost'])->name('save.menupost'); //save add new menu posts
Route::get('delete-menupost/{id}', [PostsControllers::class, 'deleteMenuPost'])->name('delete.menupost'); //delete menu posts
Route::get('edit-menupost/{id}', [PostsControllers::class, 'editMenuPost'])->name('edit.menupost'); //edit menu posts
Route::post('save-edit-menupost/{id}', [PostsControllers::class, 'saveeditMenuPost'])->name('save.edit.menupost'); //save edit menu posts
Route::get('active-menupost/{id}', [PostsControllers::class, 'activeMenuPost'])->name('active.menupost'); //active menu posts

// Tin tức trang admin:
Route::get('post', [PostsControllers::class, 'getPost'])->name('get.post'); //show all news post
Route::get('create-post', [PostsControllers::class, 'createPost'])->name('create.post'); //add news posts
Route::post('save-post', [PostsControllers::class, 'savePost'])->name('save.post'); //save news posts
Route::get('delete-post/{id}', [PostsControllers::class, 'deletePost'])->name('delete.post'); //delete new posts
Route::get('edit-post/{id}', [PostsControllers::class, 'editPost'])->name('edit.post'); //edit news posts
Route::post('save-edit-post/{id}', [PostsControllers::class, 'saveeditPost'])->name('save.edit.post'); //save news posts
Route::get('active-post/{id}', [PostsControllers::class, 'activePost'])->name('active.post'); //active and unactive news posts
Route::get('hot-post/{id}', [PostsControllers::class, 'hotPost'])->name('hot.post'); //hot news posts

//Admin category
Route::get('admin/category', [Categoriesontroller::class, 'index'])->name('category.show');
Route::get('admin/category-add', [Categoriesontroller::class, 'add'])->name('categories.addview');
Route::post('admin/category-adds', [Categoriesontroller::class, 'addhandle'])->name('categories.addhandle');
Route::get('admin/category-del/{id}', [Categoriesontroller::class, 'deletecat'])->name('categories.del');
Route::get('admin/category-edit/{slug}', [Categoriesontroller::class, 'edit'])->name('categories.editview');
Route::post('admin/category-edit/{id}', [Categoriesontroller::class, 'update'])->name('categories.edithandle');
Route::get('active-category/{id}', [Categoriesontroller::class, 'activeCategory'])->name('active.category');

// Admin Products
Route::get('products',  [ProductController::class, 'index'])->name('product');
Route::get('admin/them-san-pham', [ProductControllers::class, 'addProductView'])->name('products.addview');
Route::post('admin/them-san-pham', [ProductControllers::class, 'addProductHandle'])->name('products.addhandle');
Route::get('admin/xoa-san-pham/{id}', [ProductControllers::class, 'deleteProduct'])->name('products.del');
Route::get('admin/sua-san-pham/{slug}', [ProductControllers::class, 'editProductView'])->name('products.editview');
Route::post('admin/sua-san-pham/{id}', [ProductControllers::class, 'updateProduct'])->name('products.edithandle');
Route::post('/admin/cap-nhat-trang-thai', [ProductControllers::class, 'updateStatus'])->name('products.updatestatus');

//trang chủ
Route::get('/', [HomeController::class, 'index'])->name('get.home');

//Route::post('/quickview', 'HomeController@quickView')->name('quickview');

//tin tức
Route::get('posts',  [PostsController::class, 'index'])->name('get.posts');

//Detail Product
Route::get('detail/{p}',  [ProductController::class, 'detail'])->name('detail');

//coupon
// Route::group(['middleware' => ['auth', 'checkrole']], function () {
Route::get('coupon', [CouponController::class,'index'])->name('get.admin.coupon');
Route::get('addcoupon', [CouponController::class,'add'])->name('add.coupon');
Route::post('postcoupon', [CouponController::class,'post'])->name('post.coupon');
Route::get('show-coupon/{id}', [CouponController::class,'showCoupon'])->name('show.coupon');
Route::get('active-coupon/{id}', [CouponController::class,'activeCoupon'])->name('active.coupon');
Route::get('detailCoupon/{id}', [CouponController::class,'detailCoupon'])->name('get.detail.coupon');
Route::get('edit/{id}', [CouponController::class,'edit'])->name('get.edit');
Route::get('deletecoupon/{id}', [CouponController::class,'delete'])->name('delete.coupon');
Route::post('editpost/{id}', [CouponController::class,'editpost'])->name('edit.coupon');


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


// thêm phí vận chuyển

Route::get('van-chuyen', [ShippingController::class,'index'])->name('get.shipping');

Route::post('/priceprovince', [ShippingController::class,'post'])->name('post.province');
Route::post('/changefeeship', [ShippingController::class,'change'])->name('change.province');
Route::get('/getward/{district}', [ShippingController::class,'getWard'])->name('get.ward');
Route::get('/getprice/{id}', [ShippingController::class,'getPrice'])->name('get.price');
Route::get('/delprovince/{procode}', [ShippingController::class,'delProvince'])->name('del.feeprovince');


//danh sach tai khoan khach hang
Route::get('/customers', [CustomerController::class,'index'])->name('show.customer');
Route::get('/del_customers/{id}', [CustomerController::class,'delete'])->name('delete.customer');
Route::get('/status_customers/{id}', [CustomerController::class,'updateStatus'])->name('update.status.customer');
Route::get('/add_customers', [CustomerController::class,'add'])->name('get.add.customer');
Route::post('/save_customers', [CustomerController::class,'saveCustomer'])->name('get.save.customer');
Route::get('/edit_customers/{id}', [CustomerController::class,'getEditCustomer'])->name('get.edit.customer');
Route::post('/save_edit_customers{id}', [CustomerController::class,'saveEditCustomer'])->name('save.edit.customer');
Route::post('/sendmailcoupon', [CustomerController::class,'sendmailCustomer'])->name('sendmail.coupon');


//đăng nhập admin
Route::get('admin/thong-tin-tai-khoan', [DashboardController::class,'infologin'])->name('infologin');

Route::post('admin/doi-mat-khau', [DashboardController::class,'changepassw'])->name('changepass');
Route::get('admin/doi-mat-khaus', [DashboardController::class,'changepasswview'])->name('viewupdatepass');

Route::get('admin/phan-quyen', [RoleController::class,'index'])->name('roles.show');
Route::get('admin/phan-quyen/them-nv', [RoleController::class,'addview'])->name('roles.addview');
Route::post('admin/phan-quyen/them-nv', [RoleController::class,'addhandle'])->name('roles.addstaff');
Route::get('admin/phan-quyen/xoa-nv/{id}', [RoleController::class,'delstaff'])->name('del_staff');
Route::get('admin/phan-quyen/sua-nv/{id}', [RoleController::class,'edit'])->name('edithandle');
Route::post('admin/phan-quyen/sua-nv/{id}', [RoleController::class,'update'])->name('staff.edithandle');
