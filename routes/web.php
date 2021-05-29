<?php

use Illuminate\Support\Facades\Route;
use Admin\ProductController; 
use Admin\BandController; 
use Admin\orderController;
use Admin\orderdetailController;

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
    return view('/home');
});
//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
});
//Route for admin
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/dashboard', 'admin\AdminController@index');
    });
});

Route::resource('admin/product', ProductController::class);
Route::resource('admin/band', BandController::class);
Route::resource('admin/order', orderController::class);
Route::resource('admin/orderdetail', orderdetailController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

