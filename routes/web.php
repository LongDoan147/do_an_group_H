<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductControllers;
use App\Http\Controllers\PostsControllers;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\PostsController;
use App\Http\Controllers\Categoriesontroller;
use App\Http\Controllers\frontend\RegisterController;
use App\Http\Controllers\frontend\LoginSocialController;

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


//đăng kí 
Route::get('register', [RegisterController::class,'index'])->name('get.register');
Route::post('Pregister', [RegisterController::class,'register'])->name('post.register');
Route::get('active/{customer}/{token}', [RegisterController::class,'active'])->name('register.active');
Route::get('reActive/{email}', [RegisterController::class,'reSendMail'])->name('re.sendMail');


//logout
Route::post('/admin/login', [LoginController::class,'postLogin'])->name('authlogin');
Route::get('/admin', [LoginController::class,'getLogin'])->name('auth.login');
Route::get('/admin/login', [LoginController::class,'logout'])->name('auth.logout');
Route::get('/logout', [LoginSocialController::class,'logout'])->name('logout');

//đăng nhập
Route::post('loginAcc', [LoginSocialController::class,'loginAcc'])->name('post.login');

Route::get('x', 'RegisterController@get');


//resetpassword admin
Route::get('admin/reset-password', 'LoginController@resetPasswordview')->name('viewinputmail');
Route::post('admin/send-mail-reset', 'LoginController@sendMailReset')->name('sendmailreset');
Route::get('admin/reset-pasworods/{email}', 'LoginController@viewchangepassword')->name('form-reset-password');
Route::post('admin/reset-pasworods/{email}', 'LoginController@handlerspw')->name('handlerspw');

//Dashboard
Route::get('admin/dashboard',[DashboardController::class,'show'])->name('showDashboard');
Route::get('admin/thong-tin-tai-khoan', [DashboardController::class,'infologin'])->name('infologin');
Route::get('admin/doi-mat-khaus', [DashboardController::class,'changepasswview'])->name('viewupdatepass');


//roles
Route::group(['middleware' => ['checkrole', 'auth']], function () {
    Route::get('admin/phan-quyen', [RoleController::class,'index'])->name('roles.show');
    Route::get('admin/phan-quyen/them-nv', [RoleController::class,'addview'])->name('roles.addview');
    Route::post('admin/phan-quyen/them-nv', [RoleController::class,'addhandle'])->name('roles.addstaff');
    Route::get('admin/phan-quyen/xoa-nv/{id}', [RoleController::class,'delstaff'])->name('del_staff');
    Route::get('admin/phan-quyen/sua-nv/{id}', [RoleController::class,'edit'])->name('edithandle');
    Route::post('admin/phan-quyen/sua-nv/{id}', [RoleController::class,'update'])->name('staff.edithandle');

Route::get('admin/cap-nhat-thong-tin', [RoleController::class,'editinfo'])->name('updateinfo.view');
Route::post('admin/cap-nhat-thong-tin/{id}', [RoleController::class,'updateinfo'])->name('updateinfo.handle');
});

    // //quên mật khẩu 
    // Route::post('forgetPassword', 'LoginSocialController@loginAcc')->name('post.login');
    // Route::post('forget-password', 'RegisterController@postforgetPasss')->name('post.forget');
    // Route::get('/get-password/{customer}/{token}', 'RegisterController@getPass')->name('get.pass');
    // Route::post('/get-password/{customer}', 'RegisterController@postPass')->name('post.pass');

    // Route::get('/changepassword', 'AccountController@changePass')->name('change.pass');
    // Route::post('/updatePass', 'AccountController@changePassPost')->name('post.change.pass');