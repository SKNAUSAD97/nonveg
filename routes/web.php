<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\subcategoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\userController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\googleController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin-login', [App\Http\Controllers\adminController::class, 'adminLogin'])->name('admin-login');
Route::post('admin-login', [App\Http\Controllers\adminController::class, 'loginSubmit'])->name('admin-login');

Route::get('owner-login', [App\Http\Controllers\PropertyownerController::class, 'ownerLogin'])->name('owner-login');
Route::post('owner-login', [App\Http\Controllers\PropertyownerController::class, 'ownerSubmit'])->name('owner-login');
Route::post('owner-register', [App\Http\Controllers\PropertyownerController::class, 'ownerRegister'])->name('owner-register');

Route::middleware('auth:owner')->group(function(){
    Route::get('owner-dashboard', [App\Http\Controllers\PropertyownerController::class, 'ownerDashboard'])->name('owner-dashboard');
});

Route::middleware('auth:admin')->group(function(){
    Route::get('dashboard', [App\Http\Controllers\adminController::class, 'dashboard'])->name('dashboard');
    Route::get('users', [App\Http\Controllers\adminController::class, 'allUsers'])->name('users');
    Route::get('dashboard1', [App\Http\Controllers\adminController::class, 'dashboard1'])->name('dashboard1');
    Route::get('dashboard2', [App\Http\Controllers\adminController::class, 'dashboard2'])->name('dashboard2');
    Route::get('dashboard3', [App\Http\Controllers\adminController::class, 'dashboard3'])->name('dashboard3');
    Route::get('dashboard4', [App\Http\Controllers\adminController::class, 'dashboard4'])->name('dashboard4');
    Route::get('dashboard5', [App\Http\Controllers\adminController::class, 'dashboard5'])->name('dashboard5');
    Route::get('dashboard6', [App\Http\Controllers\adminController::class, 'dashboard6'])->name('dashboard6');
    Route::get('admin-logout', [App\Http\Controllers\adminController::class, 'logout'])->name('admin-logout');
    //Route...
    Route::get('routes/index', [App\Http\Controllers\routeController::class, 'index'])->name('routes/index');
    Route::get('routes/create', [App\Http\Controllers\routeController::class, 'create'])->name('routes/create');
    Route::post('routes/create', [App\Http\Controllers\routeController::class, 'create'])->name('routes/create');
    Route::get('routes/delete/{id}', [App\Http\Controllers\routeController::class, 'delete'])->name('routes/delete');
    
    //categories...
    Route::get('category/index', [App\Http\Controllers\categoryController::class, 'index'])->name('category/index');
    Route::get('category/create', [App\Http\Controllers\categoryController::class, 'create'])->name('category/create');
    Route::post('category/create', [App\Http\Controllers\categoryController::class, 'create'])->name('category/create');
    Route::get('category/delete/{id}', [App\Http\Controllers\categoryController::class, 'delete'])->name('category/delete/{id}');

    //Sub categories...
    Route::get('sub-category/index', [App\Http\Controllers\subcategoryController::class, 'index'])->name('sub-category/index');
    Route::get('sub-category/create', [App\Http\Controllers\subcategoryController::class, 'create'])->name('sub-category/create');
    Route::post('sub-category/create', [App\Http\Controllers\subcategoryController::class, 'create'])->name('sub-category/create');
    Route::get('sub-category/delete/{id}', [App\Http\Controllers\subcategoryController::class, 'delete'])->name('sub-category/delete/{id}');

    //Products...
    Route::get('product/index', [App\Http\Controllers\productController::class, 'index'])->name('product/index');
    Route::get('product/create', [App\Http\Controllers\productController::class, 'create'])->name('product/create');
    Route::post('product/create', [App\Http\Controllers\productController::class, 'create'])->name('product/create');
    Route::get('get-subcategory', [App\Http\Controllers\productController::class, 'getSubcat'])->name('get-subcategory');
    Route::get('product/delete/{id}', [App\Http\Controllers\productController::class, 'delete'])->name('product/delete/{id}');
    
    //User...
    Route::get('users/index', [App\Http\Controllers\userController::class, 'index'])->name('users/index');
    Route::get('users/create', [App\Http\Controllers\userController::class, 'create'])->name('users/create');
    Route::post('users/create', [App\Http\Controllers\userController::class, 'create'])->name('users/create');
    Route::get('users/delete/{id}', [App\Http\Controllers\userController::class, 'delete'])->name('users/delete/{id}');


});

// Forgot Password...
Route::get('forgot-password', [adminController::class, 'forgotPassword'])->name('forgot-password');
Route::post('forgot-password', [adminController::class, 'forgotPasswordSubmit'])->name('forgot-password');
Route::get('reset-password/{token}', [adminController::class, 'resetPassword'])->name('reset-password/{token}');
Route::post('reset-password/{id}', [adminController::class, 'upatePassword'])->name('reset-password');

//Frontend
Route::get('home',[App\Http\Controllers\homeController::class,'home'])->name('home');
Route::get('products',[App\Http\Controllers\homeController::class,'products'])->name('products');

//Login
Route::post('user-login',[App\Http\Controllers\homeController::class,'loginSubmit'])->name('user-login');
// Route::post('admin-login',[App\Http\Controllers\homeController::class,'adminSubmit'])->name('admin-login');
//Register
Route::post('register',[App\Http\Controllers\homeController::class,'register'])->name('register');

//google login
Route::get('google-login',[App\Http\Controllers\googleController::class,'loginwithGoogle'])->name('google-login');
Route::any('google-login-callback',[App\Http\Controllers\googleController::class,'callbackFromGoogle'])->name('google-login-callback');


