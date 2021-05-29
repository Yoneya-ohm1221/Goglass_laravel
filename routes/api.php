<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//user
Route::post('user/login', 'API\UsersController@login');
Route::post('user/regis', 'API\UsersController@create');
Route::get('user/{id}', 'API\UsersController@view');
Route::get('hash/{id}', 'API\UsersController@Hashpassword');
Route::put('user/{id}', 'API\UsersController@update');
Route::put('userPass/{id}', 'API\UsersController@updatePass');
Route::post('user/{id}', 'API\UsersController@update');//fake update
Route::put('address/{id}', 'API\UsersController@updateadd');
Route::post('address/{id}', 'API\UsersController@updateadd');

//product
Route::get('product', 'API\ProductController@shop');
Route::get('product/{id}', 'API\ProductController@shop');
Route::get('product/view/{id}', 'API\ProductController@view');
Route::get('recomentproduct', 'API\ProductController@Recommentproduct');
Route::get('lens', 'API\LensController@index');
Route::get('band', 'API\BandController@index');
Route::get('productType', 'API\ProductTypeController@index');
Route::get('productType', 'API\ProductTypeController@index');
Route::put('updateStock/{id}', 'API\ProductController@updateStock');
Route::post('updateStock/{id}', 'API\ProductController@updateStock');


//Review
Route::get('review', 'API\ReviewController@index');
Route::get('review/{id}', 'API\ReviewController@index');
Route::get('review/count/{id}', 'API\ReviewController@count');
Route::post('addComment', 'API\ReviewController@insertcomment');
Route::post('addlikes', 'API\LikesController@insertlike');
Route::get('countlike/{id}', 'API\LikesController@countlikes');
Route::get('likes/', 'API\LikesController@view');
Route::get('userlike/', 'API\LikesController@userLike');
Route::delete('likes/delete', 'API\LikesController@delete');
Route::get('countLike/{id}', 'API\LikesController@countLike');

//order-orderdetail
Route::get('Order/{id}', 'API\orderController@index');
Route::get('Orderdate', 'API\orderController@getdate');
Route::get('adminOrder', 'API\orderController@indexadmin');
Route::get('OrderDetail/{id}', 'API\Order_detailController@viewdetail');
Route::post('addorderdetail', 'API\Order_detailController@addorderdetail');
Route::post('addorder', 'API\orderController@addorder');
Route::get('getorderID/{id}', 'API\orderController@GetOrderID');
Route::get('countOrderdetail/{id}', 'API\orderController@count');
Route::put('updatestatus/{id}', 'API\orderController@updatestatus');
Route::post('updatestatus/{id}', 'API\orderController@updatestatus');
Route::put('updateship/{id}', 'API\orderController@updateship');//
Route::post('updateship/{id}', 'API\orderController@updateship');//
Route::put('updateshiped/{id}', 'API\orderController@updateshiped');//
Route::post('updateshiped/{id}', 'API\orderController@updateshiped');//

//cart
Route::post('cart/insert/', 'API\CartController@insert');
Route::get('cart/viewcart/{id}', 'API\CartController@viewcart');
Route::get('cart/countcart/{id}', 'API\CartController@countcart');
Route::delete('cart/delete/{id}', 'API\CartController@deleteCart');
Route::put('addamount/{id}', 'API\CartController@updatequaty');
Route::post('addamount/{id}', 'API\CartController@updatequaty');
Route::delete('deleteallCart/{id}', 'API\CartController@deleteallCart');

//payment
Route::post('payment', 'API\PaymentController@payment');
Route::get('allpayment/{id}', 'API\PaymentController@index');

//report
Route::get('report/monthlySale/', 'API\ReportController@monthlySale');
Route::get('report/topFiveProduct/', 'API\ReportController@topFiveProduct');




