<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableOrderController;


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

//Route::get('/', function () {
 //   return view('home');
//});

Route::get('/', 'App\Http\Controllers\TableOrderController@showTableOrderData');

Route::post('update-cart', [TableOrderController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [TableOrderController::class, 'removeCart'])->name('cart.remove');
Route::post('order', [TableOrderController::class, 'orderCart'])->name('cart.order');
Route::post('clear', [TableOrderController::class, 'clearAllCart'])->name('cart.clear');
Route::get('cart', [TableOrderController::class, 'cartList'])->name('cart.list');
Route::post('cart', [TableOrderController::class, 'addToCart'])->name('cart.store');
//Route::get('login', [AuthController::class, 'login'])->name('login');
//Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');

//login and registration apis starts
Route::get('logout', 'App\Http\Controllers\Auth\AuthController@logout')->name('logout');
Route::get('login', 'App\Http\Controllers\Auth\AuthController@login')->name('login');
Route::post('post-login', 'App\Http\Controllers\Auth\AuthController@postLogin')->name('login.post'); 
Route::get('registration', 'App\Http\Controllers\Auth\AuthController@registration')->name('register');;
Route::post('post-registration', 'App\Http\Controllers\Auth\AuthController@postRegistration')->name('register.post');
//login and registration apis ends

/**Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); **/

Route::get('dashboard', 'App\Http\Controllers\Auth\AuthController@dashboard'); 
Route::get('view-orders', 'App\Http\Controllers\TableOrderController@viewOrderData');

//categories starts
Route::get('categories', 'App\Http\Controllers\CategoryController@showCategoryData');
Route::get('add-category', 'App\Http\Controllers\CategoryController@showCreateCategory');
Route::post('create-category', 'App\Http\Controllers\CategoryController@createCategoryData'); 
Route::get('edit-category/{id}', 'App\Http\Controllers\CategoryController@showEditCategory');
Route::put('update-category/{id}', 'App\Http\Controllers\CategoryController@updateCategoryData'); 
Route::get('delete-category/{id}', 'App\Http\Controllers\CategoryController@showDeleteCategory');
//categories ends

//posts starts
Route::get('posts', 'App\Http\Controllers\PostController@showPostData');
Route::put('update-post/{id}', 'App\Http\Controllers\PostController@updatePostData'); 
Route::post('create-post', 'App\Http\Controllers\PostController@createPostData'); 
Route::get('edit-post/{id}', 'App\Http\Controllers\PostController@showEditPost');
Route::get('add-post', 'App\Http\Controllers\PostController@showCreatePost');
Route::get('delete-post/{id}', 'App\Http\Controllers\PostController@deletePostData');
//posts ends



